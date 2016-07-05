<?php

class LoadSiap {
	var $limit = 100;
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

	function carga_historico(){
	$count = 0;
	try {
		//total de datos en la base local del sistema de consulta
		echo date('Y-m-d H:i:s')." Iniciando insercion de recetas\n";
		$total_local = 0;
		$max = $this->get_establecimiento();
		$dbhi = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(secuencia_local) AS total FROM farm_medicinarecetada WHERE idestablecimiento = $max;";
		foreach ($dbhi->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = new PDO("pgsql:dbname=$this->edbname;host=$this->ehost", $this->edbuser, $this->edbpass );
		$sql = "SELECT * FROM farm_medicinarecetada WHERE id > $total_local";
		$str = "INSERT INTO farm_medicinarecetada(idmedicina, cantidad, fechaentrega, idestablecimiento, secuencia_local) VALUES ";
		$insert = '';
		$i = 0;
		foreach ($dbh->query($sql) as $row){
			++$i;
			$insert = $insert."(".$row['idmedicina'].", ".$row['cantidad'].", '".$row['fechaentrega']."', ".$row['idestablecimiento'].", ".$row['id']."),";
			if ($i % $this->limit == 0){
				if ( $insert != '' ){
					$insert = substr($insert, 0, -1);
					$count += $dbhi->exec($str.$insert);
					$insert = '';
				}
			}
		}
    }
    catch(PDOException $e)
    {
    	echo date('Y-m-d H:i:s')." $e \n";
    	$dbh = null;
    	return 0;
    }
    	echo "Ingresando $count de establecimiento $max en catalogo de recetas \n";
		$dbh = null;
		$dbhi = null;
		return $count;
	}

	function get_establecimiento(){
	$count = 0;
	try {
        $dbh = new PDO("pgsql:dbname=$this->edbname;host=$this->ehost", $this->edbuser, $this->edbpass );
		$sql = "SELECT idestablecimiento AS total FROM farm_medicinaexistenciaxarea GROUP BY idestablecimiento;";		
		foreach ($dbh->query($sql) as $row){
			$count = $row['total'];
		}
		$dbh = null;
		return $count;
    }
    catch(PDOException $e)
    {
    	echo date('Y-m-d H:i:s')." $e \n";
    	$dbh = null;
    	return 0;
    }
		$dbh = null;
		return $count;
	}

	function calcula_consumo(){
	$count = 0;
	try {
        $dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT calcula_consumo_mes();";
		foreach ($dbh->query($sql) as $row){
			$count = $row['calcula_consumo_mes'];
		}
		$dbh = null;
		return $count;
    }
    catch(PDOException $e)
    {
    	echo date('Y-m-d H:i:s')." $e \n";
    	$dbh = null;
    	return 0;
    }
		$dbh = null;
		return $count;
	}
}