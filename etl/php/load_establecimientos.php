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

	function pf( $str ) { return ucfirst( strtolower( trim( str_replace("'", "''", $str ) ) ) ); }

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
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = new PDO("pgsql:dbname=$this->edbname;host=$this->ehost", $this->edbuser, $this->edbpass );
		$sql = "SELECT * FROM ctl_establecimiento WHERE id > $total_local";
		$str = "INSERT INTO ctl_establecimiento(id, id_tipo_establecimiento, nombre, direccion, telefono, latitud, longitud, id_municipio, id_nivel_minsal, activo, id_establecimiento_padre, tipo_farmacia, id_institucion) VALUES ";
		$insert = '';
		//Si existen datos mayores al id en el maestro se ingresaran al sistema
		//se crea la sentencia de insercion
		echo date('Y-m-d H:i:s')." Iniciando consulta de establecimientos\n";
		foreach ($dbh->query($sql) as $row){
			$nombre = $this->pf( $row['nombre'] );
			$direccion = ($row['direccion']) ? "'".$row['direccion']."'" : 'NULL';
			$direccion = ($row['direccion']) ? "'".$row['direccion']."'" : 'NULL';
			$lat = ($row['latitud'] > 0) ? $row['latitud'] : 'NULL';
			$lon = ($row['longitud'] > 0) ? $row['longitud'] : 'NULL';
			$id_nivel_minsal = ($row['id_nivel_minsal'] > 0) ? $row['id_nivel_minsal'] : 'NULL';
			$tipo_farmacia = ($row['tipo_farmacia'] > 0) ? $row['tipo_farmacia'] : 'NULL';
			$telefono = ($row['telefono']) ? $row['telefono'] : 'NULL';
			$id_establecimiento_padre = ($row['id_establecimiento_padre'] > 0) ? $row['id_establecimiento_padre'] : 'NULL';
			$id_municipio = ($row['id_municipio'] > 0) ? $row['id_municipio'] : 'NULL';
			$activo = ($row['activo']) ? "'t'" : "'f'";
			$insert = $insert."(".$row['id'].",".$row['id_tipo_establecimiento'].","."'".$nombre."',".$direccion.",".$telefono.",".$lat.",".$lon.",".$id_municipio.",".$id_nivel_minsal.",".$activo.",".$id_establecimiento_padre.",".$tipo_farmacia.",".$row['id_institucion']."),";
		}
		if ( $insert != '' ){
			$insert = substr($insert, 0, -1);
			echo date('Y-m-d H:i:s')." Iniciando insercion de establecimientos\n";
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$count = $dbh->exec($str.$insert);
			echo date('Y-m-d H:i:s')." Insertando [$count] registros\n";
			$dbh = null;
			return $count;
		}
    }
    catch(PDOException $e)
    {
    	echo date('Y-m-d H:i:s')." $e \n";
    	return 0;
    }
		return $count;
	}
}

//$obj = new LoadEstablecimiento( $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8] );

//echo $obj->carga_establecimiento();
