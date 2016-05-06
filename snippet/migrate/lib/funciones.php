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

require(dirname(__FILE__).'/../data/vars.php');
require(dirname(__FILE__).'/extrae_siap.php');

function conecta_pgsql( $host, $dbname, $user, $passwd, $port ) {
	$strg = "host=$host dbname=$dbname user=$user password=$passwd";
	return pg_connect($strg);
} 

function verifica_modelo( ) {
	return TRUE;
} 

function decriptar_variables( ) {
	return TRUE;
} 

function extrae_siap($source, $target){
	inicia_extraccion_siap($source, $target);
	return TRUE;
}
