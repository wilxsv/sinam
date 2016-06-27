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
	log "Procesando el archivo dump"
	echo "SET search_path = last, pg_catalog;" > $DUMP_TMP
	echo "SELECT last.limpia_tablas_finales();" >> $DUMP_TMP
	cat $DUMP_FILE | grep -v 'SET search_path = public' >> $DUMP_TMP
	cat $DUMP_TMP > $DUMP_FILE
	rm $DUMP_TMP
	log "Terminando de procesar el archivo dump"
}

function load_database(){
	log "Cargando los datos del dump"
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
	log "Finalizando carga de datos del dump"
}

function siap_dump(){
	# $1 host
	# $2 port
	# $3 database name
	# $4 user
	# $5 passwd
#oting --verbose --no-unlogged-table-data --file "/tmp/modelo.pgsql.sql" --table "public.ctl_departamento" --table "public.ctl_establecimiento" --table "public.farm_bitacoramedicinaexistenciaxarea" --table "public.farm_catalogoproductos" --table "public.farm_catalogoproductosxestablecimiento" --table "public.mnt_areafarmaciaxestablecimiento" "siap"

	log "Iniciando dump de $1"

	export RESULT=$(PGPASSWORD=$5 pg_dump $3 --host $1 --port $2 --username $4 --format plain --data-only --disable-triggers --encoding UTF8 --inserts\
	    --column-inserts --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file $DUMP_FILE\
	    --table "farm_medicinaexistenciaxarea" --table "mnt_areafarmaciaxestablecimiento")
	log "Terminando dump $1"
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
	    log "Iniciando proceso de registro de datos desde ${hosts[$i]}"
	    #
	    #siap_dump ${hosts[$i]} ${ports[$i]} ${names[$i]} ${users[$i]} ${passwds[$i]}
	    export RESULT=`PGPASSWORD=${passwds[$i]} pg_dump ${names[$i]} --host ${hosts[$i]} --port ${ports[$i]} --username ${users[$i]} --format plain --data-only --disable-triggers --encoding UTF8\
	    --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file $DUMP_FILE\
	    --table "farm_medicinaexistenciaxarea" --table "mnt_areafarmaciaxestablecimiento" && set_path_database && load_database && log "Saliendo de registro de datos" && echo '1'`
	    if [ "$RESULT" -gt "0" ]
	    then
	    	echo 'Se registraron $RESULT registros'
	    fi
      elif [ ${systems[$i]} == SINAB ]
      then
        #sinab_dump
        echo ""
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
      elif [ ${systems[$i]} == 'SINAM' ]
      then
       	lhost=${hosts[$i]}
    	ldata=${names[$i]}
	    luser=${users[$i]}
	    lpass=${passwds[$i]}
      fi
	done
	log "Iniciando carga de datos de $ehost"
	php php/load_establecimientos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass
	#export RESULT=`php php/load_establecimientos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass`
	#if [ "$RESULT" -gt "0" ]
	#then
	#	echo 'Se registraron $RESULT registros'
	#fi
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
	log "Iniciando carga de datos de $ehost"
	php php/load_medicamentos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass
	#export RESULT=`php php/load_medicamentos.php $lhost $ldata $luser $lpass $ehost $edata $euser $epass`
	#if [ "$RESULT" -gt "0" ]
	#then
	#	echo "Se registraron $RESULT medicamentos"
	#else
	#	echo "$RESULT"
	#fi
}

function sinab_dump(){
	drivers=($(cat $XML_MASTER | grep -oP '(?<=driver>)[^<]+'))
	hosts=($(cat $XML_MASTER | grep -oP '(?<=host>)[^<]+'))
	users=($(cat $XML_MASTER | grep -oP '(?<=user>)[^<]+'))
	passwds=($(cat $XML_MASTER | grep -oP '(?<=passwd>)[^<]+'))
	ports=($(cat $XML_MASTER | grep -oP '(?<=port>)[^<]+'))
	names=($(cat $XML_MASTER | grep -oP '(?<=name>)[^<]+'))
	systems=($(cat $XML_MASTER | grep -oP '(?<=system>)[^<]+'))
	schemas=($(cat $XML_MASTER | grep -oP '(?<=schema>)[^<]+'))

	ehost=NULL
	eport=NULL
	edata=NULL
	euser=NULL
	epass=NULL
	eschm=NULL
	lhost=NULL
	ldata=NULL
	luser=NULL
	lpass=NULL

	for i in ${!drivers[*]}
	do
	  if [ ${systems[$i]} == 'SINAB' ]
	  then
       	ehost=${hosts[$i]}
	    eport=${ports[$i]}
    	edata=${names[$i]}
	    euser=${users[$i]}
	    epass=${passwds[$i]}
	    eschm=${schemas[$i]}
      elif [ ${systems[$i]} == 'SINAM' ]
      then
       	lhost=${hosts[$i]}
    	ldata=${names[$i]}
	    luser=${users[$i]}
	    lpass=${passwds[$i]}
      fi
	done
	export RESULT=`php php/load_sinab.php $lhost $ldata $luser $lpass $ehost $eport $edata $eschm $euser $epass `
	if [ "$RESULT" -gt "0" ]
	then
		echo "Se registraron $RESULT registros"
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