<?php
require 'vendor/autoload.php';
$authenticator = new PHPGangsta_GoogleAuthenticator();
//$secret = $authenticator->createSecret();
$secret = 'GVL3YGGZG4J2EJQB';
echo "Secret: ".$secret."\n";;


$website = 'http://consulta.salud.gob.sv/'; //Your Website
$title= 'Sistema de consulta publica de abastecimiento';
$qrCodeUrl = $authenticator->getQRCodeGoogleUrl($title, $secret,$website);
echo "Open this link in browser & scan with Google Authenticator App \n";
echo $qrCodeUrl."\n";

?>
<br>
 <img src="<?php echo $qrCodeUrl; ?>"> 
