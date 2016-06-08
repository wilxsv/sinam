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
        $sql = $dbh->query($sql);
        if ( $sql )
        {
            foreach ($sql as $row){
                $total_local = $row['total'];
            }
        }
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = "SELECT * FROM vv_CATALOGOPRODUCTOS WHERE IDPRODUCTO > $total_local;";
            $sql = mssql_query($sql);
            if (FALSE){//!mssql_num_rows($sql)) {
            	return 0;
            } else {

            	$insert = '';
            	$str = 'INSERT INTO "sab_cat_catalogoproductos" ("idpro","codigo", "id_tipoproducto", "id_unidadmedida", "nombre", "niveluso", "concentracion", "formafarmaceutica", "presentacion", "pertenecelistadooficial","estadoproducto", "estasincronizada", "clasificacion") VALUES ';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = "'".$this->pf( $row->DESCLARGO )."'";
        	    	$cla = ( $row->CLASIFICACION ) ? "'".$this->pf( $row->CLASIFICACION )."'" : 'NULL';
        		    $insert = $insert."($row->IDPRODUCTO,'$row->CORRPRODUCTO', $row->IDSUBGRUPO, $row->IDUNIDADMEDIDA, $nom, $row->IDNIVELUSO, NULL, NULL, NULL, $row->PERTENECELISTADOOFICIAL, $row->ESTADOPRODUCTO, 0, $cla),\n";
        	    }
            }
        }
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
            $insert = substr($insert, 0, -2);
    		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($str.$insert);
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

	function carga_establecimiento(){
	$count = '0';
	try {
		//total de datos en la base local del sistema de consulta
		$total_local = 0;
		$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
		$sql = "SELECT MAX(id) AS total FROM sab_cat_establecimientos";		
		foreach ($dbh->query($sql) as $row){
			$total_local = $row['total'];
		}
		$total_local = ($total_local) ? $total_local : 0;
        $dbh = NULL;
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_ESTABLECIMIENTOS WHERE IDESTABLECIMIENTO > $total_local;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$str = 'INSERT INTO "sab_cat_establecimientos" ("id", "codigoestablecimiento", "id_municipio", "id_tipoestablecimiento", "id_zona", "id_institucion", "nombre", "direccion", "telefono", "idpadre", "nivel", "estasincronizada", "idmaestro")VALUES';
                $insert ='';
        	    while ($row = mssql_fetch_object($sql)) {
        	    	$nom = "'".$this->pf( $row->NOMBRE )."'";
        	    	$cod = ( $row->CODIGOESTABLECIMIENTO ) ? "'".$this->pf( $row->CODIGOESTABLECIMIENTO )."'" : 'NULL';
        	    	$dir = ( $row->DIRECCION ) ? "'".$this->pf( $row->DIRECCION )."'" : 'NULL';
        	    	$tel = ( $row->TELEFONO ) ? "'".$this->pf( $row->TELEFONO )."'" : 'NULL';
        	    	$est = ( $row->IDPADRE ) ? $this->pf( $row->IDPADRE ) : 'NULL';
        	    	$niv = ( $row->NIVEL ) ? $this->pf( $row->NIVEL ) : 'NULL';
        	    	$mae = ( $row->IDMAESTRO ) ? $this->pf( $row->IDMAESTRO ) : 'NULL';
        		    $insert = $insert."($row->IDESTABLECIMIENTO,$cod,$row->IDMUNICIPIO,$row->IDTIPOESTABLECIMIENTO,$row->IDZONA,$row->IDINSTITUCION,$nom,$dir,$tel,$est,$niv,$row->ESTASINCRONIZADA, $mae),";
        	    }
            }
        }
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
            $insert = substr($insert, 0, -1);
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec($str.$insert);
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

	function carga_alternativa(){
	$count = '0';
	try {
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_ALTERNATIVASPRODUCTO;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$str = 'INSERT INTO sab_cat_alternativasproducto (id, id_producto, multiplicador, divisor, estasincronizada) VALUES ';
                $insert = '';
        	    while ($row = mssql_fetch_object($sql)) {
        		    $insert = $insert."($row->IDALTERNATIVA,$row->IDPRODUCTO,$row->MULTIPLICADOR,$row->DIVISOR,$row->ESTASINCRONIZADA),";
        	    }
            }
        }
        
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
            $insert = substr($insert, 0, -1);
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec("DELETE FROM sab_cat_alternativasproducto;");
			$count = $dbh->exec($str.$insert);
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

	function carga_almacenestablecimiento(){
	$count = '0';
	try {
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_CAT_ALMACENESESTABLECIMIENTOS;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$insert = 'INSERT INTO sab_cat_almacenesestablecimientos (id_establecimiento, id_almacen, esprincipal, estasincronizada) VALUES ';
        	    while ($row = mssql_fetch_object($sql)) {
        		    $insert = $insert."($row->IDESTABLECIMIENTO,$row->IDALMACEN,$row->ESPRINCIPAL,$row->ESTASINCRONIZADA),";
        	    }
            }
        }
        $insert = substr($insert, 0, -1);
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec("DELETE FROM sab_cat_almacenesestablecimientos;");
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

	function carga_existenciasalmacenes(){
	$count = '0';
	try {
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );
        $insert = '';
        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_ALM_EXISTENCIASALMACENES;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
        	    while ($row = mssql_fetch_object($sql)) {
        		    $insert = $insert."($row->IDALMACEN,$row->IDPRODUCTO,$row->CANTIDADDISPONIBLE,$row->CANTIDADNODISPONIBLE,$row->CANTIDADRESERVADA,$row->CANTIDADVENCIDA,$row->ESTASINCRONIZADA),";
        	    }
            }
        }
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
            $insert = substr($insert, 0, -1);
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$count = $dbh->exec("DELETE FROM sab_alm_existenciasalmacenes;");
			$count = $dbh->exec('INSERT INTO sab_alm_existenciasalmacenes (id_almacen, id_producto, cantidaddisponible, cantidadnodisponible, cantidadreservada, cantidadvencida, estasincronizada) VALUES '.$insert);
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

	function carga_existenciahistorica(){
	$count = '0';
	try {
        $dbh = mssql_connect("$this->ehost:$this->eport", $this->edbuser, $this->edbpass );

        if (!$dbh || !mssql_select_db($this->edbname, $dbh)) {
            die('Something went wrong while connecting to MSSQL');
        } else {
        	$sql = mssql_query("SELECT * FROM SAB_ALM_EXISTENCIAHISTORICA;");
            if (!mssql_num_rows($sql)) {
            	return 0;
            } else {
            	$insert = 'INSERT INTO sab_alm_existenciahistorica (id_almacen, id_producto, fecha, cantidaddisponible, cantidadnodisponible, cantidadreservada, cantidadtemporal, cantidadvencida) VALUES ';
        	    while ($row = mssql_fetch_object($sql)) {
        		    $insert = $insert."($row->IDALMACEN,$row->IDPRODUCTO,$row->FECHA,$row->CANTIDADDISPONIBLE,$row->CANTIDADNODISPONIBLE,$row->CANTIDADRESERVADA,$row->CANTIDADTEMPORAL,$row->CANTIDADVENCIDA),";
        	    }
            }
        }
        $insert = substr($insert, 0, -1);
        mssql_free_result($sql);
        $dbh = NULL;
		if ( $insert != '' ){
			$dbh = new PDO("pgsql:dbname=$this->dbname;host=$this->host", $this->dbuser, $this->dbpass );
			$count = $dbh->exec("DELETE FROM sab_alm_existenciahistorica;");
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