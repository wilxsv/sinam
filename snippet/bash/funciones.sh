#!/bin/bash
#
# Rutina de consulta, extraccion y carga de datos de diferentes 
# fuentes de datos a usando el estandar SQL:2008.
# El objetivo es mantener un repositorio de registros de bases SIAP y
# la actualizacion de registros consultados del SINAB
# 
# @author		Ministerio de Salud de El Salvador
# @deprecated
# @param		-v verbose -d debug
# @return
# @throws
# @see
# @version		0.5
# @licence		GPL 3.0  

source $(dirname $0)/vars.sh

function set_path_database(){
	echo "SET search_path = $SCHEMA_TMP, pg_catalog;" > $DUMP_TMP
	echo "SELECT last.limpia_tablas_finales();" >> $DUMP_TMP
	cat $DUMP_FILE | grep -v 'SET search_path = public' >> $DUMP_TMP
	cat $DUMP_TMP > $DUMP_FILE
	rm $DUMP_TMP

}

function load_database(){
	drivers=($(cat $XML_MASTER | grep -oP '(?<=driver>)[^<]+'))
	hosts=($(cat $XML_MASTER | grep -oP '(?<=host>)[^<]+'))
	users=($(cat $XML_MASTER | grep -oP '(?<=user>)[^<]+'))
	passwds=($(cat $XML_MASTER | grep -oP '(?<=passwd>)[^<]+'))
	ports=($(cat $XML_MASTER | grep -oP '(?<=port>)[^<]+'))
	names=($(cat $XML_MASTER | grep -oP '(?<=name>)[^<]+'))
	systems=($(cat $XML_MASTER | grep -oP '(?<=system>)[^<]+'))

	DB_NAME=NULL
	DB_USER=NULL
	DB_PASSWD=NULL

	for i in ${!drivers[*]}
	do
      if [ ${systems[$i]} == SINAM ]
      then
    	DB_NAME=${names[$i]}
	    DB_USER=${users[$i]}
	    DB_PASSWD=${passwds[$i]}
      fi
	done
	PGPASSWORD=$DB_PASSWD psql -d $DB_NAME -f $DUMP_FILE -U $DB_USER && rm $DUMP_FILE
	PGPASSWORD=$DB_PASSWD psql -d $DB_NAME -U $DB_USER -c 'SELECT prepara_tablas();'
	PGPASSWORD=$DB_PASSWD psql -d $DB_NAME -U $DB_USER -c 'SELECT carga_datos();'
	echo "1"
}

function siap_dump(){
	# $1 host
	# $2 port
	# $3 database name
	# $4 user
	# $5 passwd
#oting --verbose --no-unlogged-table-data --file "/tmp/modelo.pgsql.sql" --table "public.ctl_departamento" --table "public.ctl_establecimiento" --table "public.farm_bitacoramedicinaexistenciaxarea" --table "public.farm_catalogoproductos" --table "public.farm_catalogoproductosxestablecimiento" --table "public.mnt_areafarmaciaxestablecimiento" "siap"

	#rm $DUMP_TMP $DUMP_FILE

	RESULT=$(PGPASSWORD=$5 pg_dump $3 --host $1 --port $2 --username $4 --format plain --data-only --disable-triggers --encoding UTF8 --inserts\
	    --column-inserts --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file $DUMP_FILE\
	    --table "farm_medicinaexistenciaxarea" --table "mnt_areafarmaciaxestablecimiento")

	set_path_database
	load_database
	
	return 1
}

#########################################################################################################

function load_siaps_sinab(){
	drivers=($(cat $XML_FILE | grep -oP '(?<=driver>)[^<]+'))
	hosts=($(cat $XML_FILE | grep -oP '(?<=host>)[^<]+'))
	users=($(cat $XML_FILE | grep -oP '(?<=user>)[^<]+'))
	passwds=($(cat $XML_FILE | grep -oP '(?<=passwd>)[^<]+'))
	ports=($(cat $XML_FILE | grep -oP '(?<=port>)[^<]+'))
	names=($(cat $XML_FILE | grep -oP '(?<=name>)[^<]+'))
	systems=($(cat $XML_FILE | grep -oP '(?<=system>)[^<]+'))

	for i in ${!drivers[*]}
	do
	  if [ ${systems[$i]} == SIAP ]
	  then
        siap_dump ${hosts[$i]} ${ports[$i]} ${names[$i]} ${users[$i]} ${passwds[$i]}
      elif [ ${systems[$i]} == SINAB ]
      then
        sinab_dump
      else
      	echo 'No se encontro sistema SIAP o SINAB'
      fi
	done
}

#########################################################################################################

function load_establecimientos(){
	drivers=($(cat $XML_MASTER | grep -oP '(?<=driver>)[^<]+'))
	hosts=($(cat $XML_MASTER | grep -oP '(?<=host>)[^<]+'))
	users=($(cat $XML_MASTER | grep -oP '(?<=user>)[^<]+'))
	passwds=($(cat $XML_MASTER | grep -oP '(?<=passwd>)[^<]+'))
	ports=($(cat $XML_MASTER | grep -oP '(?<=port>)[^<]+'))
	names=($(cat $XML_MASTER | grep -oP '(?<=name>)[^<]+'))
	systems=($(cat $XML_MASTER | grep -oP '(?<=system>)[^<]+'))

	ehost=NULL
	edata=NULL
	euser=NULL
	epass=NULL
	lhost=NULL
	ldata=NULL
	luser=NULL
	lass=NULL

	for i in ${!drivers[*]}
	do
	  if [ ${systems[$i]} == 'ESTABLECIMIENTO' ]
	  then
       	ehost=${hosts[$i]}
    	edata=${names[$i]}
	    euser=${users[$i]}
	    epass=${passwds[$i]}
      elif [ ${systems[$i]} == SINAM ]
      then
       	lhost=${hosts[$i]}
    	ldata=${names[$i]}
	    luser=${users[$i]}
	    lpass=${passwds[$i]}
      fi
	done
	log "Iniciando conex. con $ehost"
	export RESULT=`php php/load_establecimientos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass`
	if [ "$RESULT" -gt "0" ]
	then
		echo 'Se registraron $RESULT registros'
	fi
}

#########################################################################################################

function load_medicamentos(){
	drivers=($(cat $XML_MASTER | grep -oP '(?<=driver>)[^<]+'))
	hosts=($(cat $XML_MASTER | grep -oP '(?<=host>)[^<]+'))
	users=($(cat $XML_MASTER | grep -oP '(?<=user>)[^<]+'))
	passwds=($(cat $XML_MASTER | grep -oP '(?<=passwd>)[^<]+'))
	ports=($(cat $XML_MASTER | grep -oP '(?<=port>)[^<]+'))
	names=($(cat $XML_MASTER | grep -oP '(?<=name>)[^<]+'))
	systems=($(cat $XML_MASTER | grep -oP '(?<=system>)[^<]+'))

	ehost=NULL
	edata=NULL
	euser=NULL
	epass=NULL
	lhost=NULL
	ldata=NULL
	luser=NULL
	lass=NULL

	for i in ${!drivers[*]}
	do
	  if [ ${systems[$i]} == 'MEDICAMENTO' ]
	  then
       	ehost=${hosts[$i]}
    	edata=${names[$i]}
	    euser=${users[$i]}
	    epass=${passwds[$i]}
      elif [ ${systems[$i]} == SINAM ]
      then
       	lhost=${hosts[$i]}
    	ldata=${names[$i]}
	    luser=${users[$i]}
	    lpass=${passwds[$i]}
      fi
	done
	export RESULT=`php php/load_medicamentos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass`
	if [ "$RESULT" -gt "0" ]
	then
		echo "Se registraron $RESULT medicamentos"
	else
		echo "$RESULT"
	fi
}

function log(  ){
	TIMESTAMP=`date "+%Y-%m-%d %H:%M:%S"`
	if [ $DEBUG == 'TRUE' ]
	  then
	  echo "$TIMESTAMP $1"
	fi
	echo "$TIMESTAMP $1" >> $LOGFILE
}