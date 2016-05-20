<?php

	

class LoadSinab {
	var $host = ''; 
	var $dbname = '';
	var $dbuser = '';
	var $dbpass = '';

	var $ehost = '';
	var $edbname = '';
	var $edbuser = '';
	var $edbpass = '';

	function __construct( $host, $dbname, $dbuser, $dbpass, $ehost, $eport, $edbname, $edbschm, $edbuser, $edbpass ) {
		$this->host = $host;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;

		$this->ehost = $ehost;
		$this->eport = $eport;
		$this->edbname = $edbname;
		$this->edbschm = $edbschm;
		$this->edbuser = $edbuser;
		$this->edbpass = $edbpass;
	}

	function pf( $str ) { return ucfirst( strtolower( trim( str_replace("'", "''", $str ) ) ) ); }

	function carga_departamento(){
	$count = '0';
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM sab_cat_departamentos";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_DEPARTAMENTOS WHERE IDDEPARTAMENTO > $total_local;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$insert = '';
            	$str = 'INSERT INTO "sab_cat_departamentos" ("id","codigodepartamento", "nombre", "estasincronizada") VALUES (';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = $this->pf( $row->NOMBRE );
        		    $insert = $insert.$str."$row->IDDEPARTAMENTO,'$row->CODIGODEPARTAMENTO','$nom',$row->ESTASINCRONIZADA);";
        	    }
            }
        }

        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($insert);
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

	function carga_medicamento(){
	$count = '0';
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM sab_cat_catalogoproductos";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_CATALOGOPRODUCTOS WHERE IDPRODUCTO > $total_local;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {

            	$insert = '';
            	$str = 'INSERT INTO "sab_cat_catalogoproductos" ("id","codigo", "id_tipoproducto", "id_unidadmedida", "nombre", "niveluso", "concentracion", "formafarmaceutica", "presentacion", "pertenecelistadooficial","estadoproducto","observacion", "estasincronizada", "clasificacion") VALUES (';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = "'".$this->pf( $row->NOMBRE )."'";
        	    	$con = ( $row->CONCENTRACION ) ? "'".$this->pf( $row->CONCENTRACION )."'" : 'NULL';
        	    	$for = ( $row->FORMAFARMACEUTICA ) ? "'".$this->pf( $row->FORMAFARMACEUTICA )."'" : 'NULL';
        	    	$pre = ( $row->PRESENTACION ) ? "'".$this->pf( $row->PRESENTACION )."'" : 'NULL';
        	    	$cla = ( $row->CLASIFICACION ) ? "'".$this->pf( $row->CLASIFICACION )."'" : 'NULL';
        	    	$obs = ( $row->OBSERVACION ) ? "'".$this->pf( $row->OBSERVACION )."'" : 'NULL';
        		    $insert = $insert.$str."$row->IDPRODUCTO,'$row->CODIGO', $row->IDTIPOPRODUCTO, $row->IDUNIDADMEDIDA, $nom, $row->NIVELUSO, $con, $for, $pre, $row->PERTENECELISTADOOFICIAL, $row->ESTADOPRODUCTO, $obs, $row->ESTASINCRONIZADA, $cla); \n";
        	    }
            }
        }
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($insert);
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

	function carga_municipio(){
	$count = '0';
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM sab_cat_municipios";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_MUNICIPIOS WHERE IDMUNICIPIO > $total_local;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$insert = '';
            	$str = 'INSERT INTO "sab_cat_municipios" ("id", "codigomunicipio", "id_departamento", "nombre", "estasincronizada") VALUES (';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = $this->pf( $row->NOMBRE );
        		    $insert = $insert.$str."$row->IDMUNICIPIO,'$row->CODIGOMUNICIPIO',$row->IDDEPARTAMENTO,'$nom',$row->ESTASINCRONIZADA);";
        	    }
            }
        }

        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($insert);
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

	function carga_almacen(){
	$count = '0';
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM sab_cat_almacenes";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_ALMACENES WHERE IDALMACEN > $total_local;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$insert = '';
            	$str = 'INSERT INTO "sab_cat_almacenes" ("id", "nombre", "direccion", "telefono", "esfarmacia", "estasincronizada", "estadoalmacen") VALUES (';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = "'".$this->pf( $row->NOMBRE )."'";
        	    	$dir = ( $row->DIRECCION ) ? "'".$this->pf( $row->DIRECCION )."'" : 'NULL';
        	    	$tel = ( $row->TELEFONO ) ? "'".$this->pf( $row->TELEFONO )."'" : 'NULL';
        	    	$far = ( $row->ESFARMACIA >= 0 ) ? "'".$this->pf( $row->ESFARMACIA )."'" : 0;
        	    	$est = ( $row->ESTADOALMACEN ) ? "'".$this->pf( $row->ESTADOALMACEN )."'" : 'NULL';
        		    $insert = $insert.$str."$row->IDALMACEN,$nom,$dir,$tel,$far,$row->ESTASINCRONIZADA, $est);";
        	    }
            }
        }


            	echo "insertando almcenes $total_local : $insert";

        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($insert);
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

$obj = new LoadSinab( $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10] );

//$r = $obj->carga_departamento();
//$r = $obj->carga_municipio();
//$r = $obj->carga_medicamento();

$r = $obj->carga_almacen();
echo $r;
//$r = $obj->carga_medicamento();