<?php

$tiempo = 10;
 if ( (date("i") % $tiempo) == 0  AND isset($_GET['inside']) && $_GET['inside'] == 'g3nEr4t3')
 	genera();
 elseif ((date("i") % $tiempo+$tiempo) == 0  && isset($_POST['otp']))
 	valida( $_POST['otp'] );
elseif ((date("i") % $tiempo) == 0)
	muestra();


function genera(){
	require 'vendor/autoload.php';
	$authenticator = new PHPGangsta_GoogleAuthenticator();
	$secret = 'GVL3YGGZG4J2EJQB';
	$website = 'http://consulta.salud.gob.sv/';
	$title= 'Sistema de consulta publica de abastecimiento';
	$qrCodeUrl = $authenticator->getQRCodeGoogleUrl($title, $secret,$website);
	echo "<h1>Escanea este codigo: <img src=\"$qrCodeUrl\" ></h1>";
}

function valida( $otp ){
	echo $otp;
	require 'vendor/autoload.php';
	$authenticator = new PHPGangsta_GoogleAuthenticator();
	$secret = 'GVL3YGGZG4J2EJQB';
	$tolerance = 0;
	$checkResult = $authenticator->verifyCode($secret, $otp, $tolerance);
	if ($checkResult)
		actualiza();
	else
		echo 'Acceso restringido';
}

function muestra(){
	echo '<form action="update.php" method="post">Ingrese el codigo:<br><input type="text" name="otp"></form>';
}

function actualiza(){
	echo "updated";
}