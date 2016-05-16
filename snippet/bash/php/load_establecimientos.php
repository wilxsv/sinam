<?php

class LoadEstablecimiento {
	var $host = ''; 
	var $dbname = '';
	var $dbuser = '';
	var $dbpass = '';

	var $ehost = '';
	var $edbname = '';
	var $edbuser = '';
	var $edbpass = '';

	function __construct( $host, $dbname, $dbuser, $dbpass, $ehost, $edbname, $edbuser, $edbpass ) {
		$this->host = $host;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;

		$this->ehost = $ehost;
		$this->edbname = $edbname;
		$this->edbuser = $edbuser;
		$this->edbpass = $dbpass;
	}

	function carga_establecimiento(){
	$count = 0;
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM ctl_establecimiento";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
        $dbh = NULL;
        $dbh = new PDO("pgsql:dbname=$this->edbname;host=$this->ehost", $this->edbuser, $this->edbpass );
		$sql = "SELECT * FROM ctl_establecimiento WHERE id > $total_local";
		$str = "INSERT INTO ctl_establecimiento(id, id_tipo_establecimiento, nombre, direccion, telefono, latitud, longitud, id_municipio, id_nivel_minsal, activo, id_establecimiento_padre, tipo_farmacia, id_institucion) VALUES (";
		$insert = '';
		//Si existen datos mayores al id en el maestro se ingresaran al sistema
		//se crea la sentencia de insercion
		foreach ($dbh->query($sql) as $row){
			$lat = ($row['latitud'] > 0) ? $row['latitud'] : 13.701430;
			$lon = ($row['longitud'] > 0) ? $row['longitud'] : -89.225007;
			$id_nivel_minsal = ($row['id_nivel_minsal'] > 0) ? $row['id_nivel_minsal'] : 'NULL';
			$tipo_farmacia = ($row['tipo_farmacia'] > 0) ? $row['tipo_farmacia'] : 'NULL';
			$insert = $insert.$str."'".$row['id']."',"."'".$row['id_tipo_establecimiento']."',"."'".$row['nombre']."',"."'".$row['direccion']."',"."'".$row['telefono']."',".$lat.",".$lon.","."'".$row['id_municipio']."',".$id_nivel_minsal.",'".$row['activo']."',"."'".$row['id_establecimiento_padre']."',".$tipo_farmacia.","."'".$row['id_institucion']."');";
		}

		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($insert);
			//echo $count;
			$dbh = null;
			return $count;
		}
    }
    catch(PDOException $e)
    {
    	return 0;
    }
		return $count;
	}
}

$obj = new LoadEstablecimiento( $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8] );

echo $obj->carga_establecimiento();