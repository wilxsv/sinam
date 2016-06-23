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

<?php 

$tiempo = 1;

if ((date("i") % $tiempo) == 0){
        actualiza();
}

function actualiza(){
        $repo1 = '/var/www/sistemas/sinam/nightly/';
        $repo2 = '/var/www/sistemas/sinam/master/';
        while (@ ob_end_flush()); // end all output buffers if any
        $cmd = "cd $repo1 && git pull && rm -r symfony/app/cache/* & cd $repo2 && git pull && rm -r symfony/app/cache/*";
echo $cmd;
        $proc = popen($cmd, 'r');
        echo '<pre>';
        while (!feof($proc)){
            echo fread($proc, 4096);
            @ flush();
        }
        echo '</pre>';
}

