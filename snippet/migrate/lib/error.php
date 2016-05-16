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

function registro_error( $mensaje ) {
    error_log($mensaje, 0);
} 

function panic_error( $mensaje ) {
    error_log($mensaje, 1, $error_email);
} 
