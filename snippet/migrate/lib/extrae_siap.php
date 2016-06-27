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

function inicia_extraccion_siap($source, $target){
	extrae_establecimiento($source, $target);
}

function extrae_mnt_areafarmaciaxestablecimiento($source, $target){

}

function extrae_lotes($source, $target){

}

function extrae_establecimiento($source, $target){
	if (!$source) {
		registro_error('enlace a base siap');
	exit;
	}
	$result = pg_query($source, "SELECT * FROM ctl_establecimiento");
	echo $source;
	echo $target;
	if (!$result) {
		registro_error('Datos no disponibles en base SIAP');
	    exit;
	}
	while ($row = pg_fetch_assoc($result)) {
		if ( $row['id_municipio']!='' && !consulta_establecimiento_siap($target, $row['nombre'], $row['id_municipio'], $row['id_tipo_establecimiento'], $row['id_institucion']) ){
			$q = "INSERT INTO ctl_establecimiento ";
			$q = $q.'("id_tipo_establecimiento", "nombre", "direccion", "telefono", "fax", "latitud", "longitud", "id_municipio", "id_nivel_minsal", "cod_ucsf", "activo", "configurado", "tipo_farmacia", "id_institucion")';
			$q = $q." VALUES ( id_tipo_establecimiento, nombre, direccion, telefono, fax, latitud, longitud, id_municipio, id_nivel_minsal, cod_ucsf, activo, configurado, tipo_farmacia, id_institucion )";
			if ( pg_query($target, $q) )
			echo 'Se ingreso el establecimiento: '.$row['nombre'].'\n';
			else
			echo 'Se intento el ingreso el establecimiento: '.$row['nombre'].'\n';
		}
	}
}

function consulta_establecimiento_siap($source, $data, $municipio, $establecimiento, $institucion){
	if (!$source) {
		registro_error('enlace a base sinam');
	exit;
	}
	$result = pg_query($source, "SELECT * FROM ctl_establecimiento WHERE nombre='$data' AND id_municipio='$municipio' AND id_tipo_establecimiento='$establecimiento' AND id_institucion='$institucion'");
	if ($result)
		return TRUE;
	else
		return FALSE;
}
