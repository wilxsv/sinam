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

//Error
$error_email = 'wilx.sv@yandex.com';
//Conex
$conexion_path = dirname(__FILE__).'/establecimiento.xml';
//target
$tar_driver = 'PDO_PGSQL';
$tar_host = '127.0.0.1';
$tar_user = 'acrasame';
$tar_passwd = 'acrasame';
$tar_port = '5432';
$tar_name = 'sinam-test';
//query sinam
//qyery siap
//query sinab
