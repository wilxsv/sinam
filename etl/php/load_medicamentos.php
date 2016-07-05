<?php

class LoadMedicamento {
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
		$this->edbpass = $edbpass;
	}

	function carga_medicamento(){
	$count = 0;
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM farm_catalogoproductos";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = new PDO("pgsql:dbname=$this->edbname;host=$this->ehost", $this->edbuser, $this->edbpass );
		$sql = "SELECT * FROM farm_catalogoproductos WHERE id > $total_local";
		$str = "INSERT INTO farm_catalogoproductos(id, codigo, idtipoproducto, idunidadmedida, nombre, concentracion, formafarmaceutica, presentacion, idestablecimiento, idterapeutico, cuantificable) VALUES ";
		$insert = '';
		//Si existen datos mayores al id en el maestro se ingresaran al sistema
		//se crea la sentencia de insercion
		echo date('Y-m-d H:i:s')." Iniciando consulta de medicamentos\n";
		foreach ($dbh->query($sql) as $row){
			$presentacion = ($row['presentacion'] >= 0) ? "'".$row['presentacion']."'" : 'NULL';
			$cuantificable = ($row['cuantificable']) ? $row['cuantificable'] : 1;
			$idestablecimiento = ($row['idestablecimiento']) ? $row['idestablecimiento'] : 'NULL';
			$insert = $insert."(".$row['id'].","."'".$row['codigo']."',".$row['idtipoproducto'].",".$row['idunidadmedida'].","."'".$row['nombre']."',"."'".$row['concentracion']."',"."'".$row['formafarmaceutica']."',".$presentacion.",".$idestablecimiento.",".$row['idterapeutico'].",".$cuantificable."),";
		}
		if ( $insert != '' ){
			$insert = substr($insert, 0, -1);
			echo date('Y-m-d H:i:s')." Iniciando insercion de medicamentos\n";
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($str.$insert);
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

//$obj = new LoadMedicamento( $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8] );

//echo $obj->carga_medicamento();