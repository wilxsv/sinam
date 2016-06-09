<?php 

$tiempo = 1;

if ((date("i") % $tiempo) == 0){
	actualiza();
}

function actualiza(){
	while (@ ob_end_flush()); // end all output buffers if any
	$cmd = 'pwd';
	$proc = popen($cmd, 'r');
	echo '<pre>';
	while (!feof($proc)){
	    echo fread($proc, 4096);
	    @ flush();
	}
	echo '</pre>';
}