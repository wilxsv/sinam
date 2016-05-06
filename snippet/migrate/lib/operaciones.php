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

require '../data/vars.php';

function iterar_servidor() {
     $xml = simplexml_load_file("./data/establecimiento.xml");
 foreach ($xml->nodo_hijo as $nodo) 
	{
	echo $nodo->valor;
	}
} 
