<?php
/**
 * Rutina de consulta, extraccion y carga de datos de diferentes 
 * fuentes de datos a usando el estandar SQL:2008.
 * El objetivo es mantener un repositorio de registros de bases SIAP y
 * la actualizacion de registros consultados del SINAB
 * 
 * @author		minsal
 * @deprecated
 * @param
 * @return
 * @throws
 * @see
 * @version
 */
/*if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1','::1',)) 		 ) {
    header('HTTP/1.0 403 Forbidden');
    exit('error_');
}*/
//Error
$error_email = 'wilx.sv@yandex.com';
//Conex
$path_nodos = dirname(__FILE__).'/db/establecimiento.xml';
$path_maestros = dirname(__FILE__).'/db/maestros.xml';
//Variables de entorno y librerias
require 'php/load_establecimientos.php';
require 'php/load_medicamentos.php';
require 'php/load_sinab.php';


//decriptar_variables();
if ( date('N') >= 10 && date('N') <= 5 ){
	iterar_siaps($path_maestros, $path_nodos);
}	elseif ( date('N') >= 5 && date('N') <= 6 ) {
	iterar_sinab($path_maestros);
}	elseif ( date('j') < 6 &&date('N') >= 5 && date('N') <= 6 ) {
	carga_historico_siap($path_maestros, $path_nodos);
}


function iterar_siaps($maestro, $cliente) {
    $xml = simplexml_load_file($cliente);
 foreach ($xml->nodo_establecimiento as $nodo) 
	{
		if ($nodo->system == 'SIAP' && $nodo->driver == 'PDO_PGSQL'){
			$DUMP_FILE = uniqid();
			$DUMP_TMP = uniqid();
			$comando = "PGPASSWORD=$nodo->passwd pg_dump $nodo->name --host $nodo->host --port $nodo->port --username $nodo->user --format plain --data-only --disable-triggers --encoding UTF8 --no-owner\
	    --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file \"$DUMP_FILE\" --table \"farm_medicinaexistenciaxarea\" --table \"mnt_areafarmaciaxestablecimiento\"";
			$output = shell_exec($comando);
			$comando = "echo \"SET search_path = last, pg_catalog;\" > $DUMP_TMP && echo \"SELECT last.limpia_tablas_finales();\" >> $DUMP_TMP && ";
			$comando = $comando." cat $DUMP_FILE | grep -v 'SET search_path = public' >> $DUMP_TMP && cat $DUMP_TMP > $DUMP_FILE && rm $DUMP_TMP";
			$output = shell_exec($comando);

			$xmlm = simplexml_load_file($maestro);
			foreach ($xmlm->maestro as $nodom) {
				if ($nodom->system == 'SINAM'){
					$comando = "PGPASSWORD=$nodom->passwd psql -d $nodom->name -f $DUMP_FILE -U $nodom->user && rm $DUMP_FILE && PGPASSWORD=$nodom->passwd psql -d $nodom->name -U $nodom->user -c 'SELECT prepara_tablas();' && PGPASSWORD=$nodom->passwd psql -d $nodom->name -U $nodom->user -c 'SELECT carga_datos();'";
					$output = shell_exec($comando);
				}
			}
			$output = shell_exec("rm $DUMP_FILE");
		} elseif ($nodo->system == 'SINAB' && $nodo->driver == 'PDO_SQLSRV' ){
		} elseif ($nodo->driver == 'PDO_MYSQL'){
		}
	}
}

function iterar_sinab($maestro) {
    $xml = simplexml_load_file($maestro);
 foreach ($xml->maestro as $l) {
	if ($l->system == 'SINAM'){
		$xmlm = simplexml_load_file($maestro);
		foreach ($xmlm->maestro as $e) {
			if ($e->system == 'SINAB'){
					$obj = new LoadSinab( $l->host, $l->name, $l->user, $l->passwd, $e->host, $e->port, $e->name, $e->schema, $e->user, $e->passwd );
					//$r = $obj->carga_departamento();
					//$r = $obj->carga_municipio();
					//$r = $obj->carga_medicamento();
					//$r = $obj->carga_almacen();
					//$r = $obj->carga_establecimiento();
					$r = $obj->carga_alternativa();
					//$r = $obj->carga_almacenestablecimiento();
					$r = $obj->carga_existenciasalmacenes();
				}
			}//$r = $obj->carga_existenciahistorica();
		}
	}
}

function carga_historico_siap($maestro, $cliente){
    $xml = simplexml_load_file($cliente);
    foreach ($xml->nodo_establecimiento as $nodo) 
	{
		if ($nodo->system == 'SIAP' && $nodo->driver == 'PDO_PGSQL'){
			$DUMP_FILE = uniqid();
			$DUMP_TMP = uniqid();
			$comando = "PGPASSWORD=$nodo->passwd pg_dump $nodo->name --host $nodo->host --port $nodo->port --username $nodo->user --format plain --data-only --disable-triggers --encoding UTF8\
	    --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file \"$DUMP_FILE\" --table \"farm_medicinaexistenciaxarea\" --table \"mnt_areafarmaciaxestablecimiento\"";
			$output = shell_exec($comando);
			$comando = "echo \"SET search_path = last, pg_catalog;\" > $DUMP_TMP && echo \"SELECT last.limpia_tablas_finales();\" >> $DUMP_TMP && ";
			$comando = $comando." cat $DUMP_FILE | grep -v 'SET search_path = public' >> $DUMP_TMP && cat $DUMP_TMP > $DUMP_FILE && rm $DUMP_TMP";
			$output = shell_exec($comando);

			$xmlm = simplexml_load_file($maestro);
			foreach ($xmlm->maestro as $nodom) {
				if ($nodom->system == 'SINAM'){
					$comando = "PGPASSWORD=$nodom->passwd psql -d $nodom->name -f $DUMP_FILE -U $nodom->user && rm $DUMP_FILE && PGPASSWORD=$nodom->passwd psql -d $nodom->name -U $nodom->user -c 'SELECT prepara_tablas();' && PGPASSWORD=$nodom->passwd psql -d $nodom->name -U $nodom->user -c 'SELECT carga_datos();'";
					$output = shell_exec($comando);
				}
			}
		} 
	}
}