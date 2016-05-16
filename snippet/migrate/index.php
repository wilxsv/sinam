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
if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1','::1',)) 		 ) {
    header('HTTP/1.0 403 Forbidden');
    exit('error_');
}
//Variables de entorno y librerias
require(dirname(__FILE__).'/data/vars.php');
require 'lib/error.php';
require 'lib/funciones.php';

decriptar_variables();
iterar_servidor();

function iterar_servidor() {
	 $url = $GLOBALS['conexion_path'];
     $xml = simplexml_load_file($url);
     $conn = null;
 foreach ($xml->nodo_establecimiento as $nodo) 
	{
		if ($nodo->system == 'SIAP' && $nodo->driver == 'PDO_PGSQL'){
			if ( conecta_pgsql($nodo->host, $nodo->name, $nodo->user, $nodo->passwd, $nodo->port) ){
				$conn = conecta_pgsql($nodo->host, $nodo->name, $nodo->user, $nodo->passwd, $nodo->port);
				extrae_siap($conn, conecta_pgsql($GLOBALS['tar_host'], $GLOBALS['tar_name'], $nodo->user, $GLOBALS['tar_user'], $GLOBALS['tar_passwd'], $GLOBALS['tar_port']) );
			}
			else{
			    panic_error('Base de datos: '.$nodo->name.' no disponible');
			}
		} elseif ($nodo->driver == 'PDO_MYSQL'){
		} elseif ($nodo->driver == 'PDO_SQLSRV'){
		}
	}
} 
