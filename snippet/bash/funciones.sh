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
}

function load_database(){
	PGPASSWORD=$DB_PASSWD psql -d $DB_NAME -f $DUMP_FILE -U $DB_USER #> 2 && rm $DUMP_FILE $DUMP_TMP
	echo ""
}

function siap_dump(){
	# $1 host
	# $2 port
	# $3 database name
	# $4 user
	# $5 passwd
oting --verbose --no-unlogged-table-data --file "/tmp/modelo.pgsql.sql" --table "public.ctl_departamento" --table "public.ctl_establecimiento" --table "public.farm_bitacoramedicinaexistenciaxarea" --table "public.farm_catalogoproductos" --table "public.farm_catalogoproductosxestablecimiento" --table "public.mnt_areafarmaciaxestablecimiento" "siap"

	#rm $DUMP_TMP $DUMP_FILE

	RESULT=$(PGPASSWORD=$5 pg_dump $3 --host $1 --port $2 --username $4 --format plain --data-only --disable-triggers --encoding UTF8 --inserts\
	    --column-inserts --no-privileges --no-tablespaces --disable-dollar-quoting --verbose --no-unlogged-table-data --file $DUMP_FILE\
	    --table "ctl_establecimiento" --table "farm_catalogoproductos" --table "farm_medicinaexistenciaxarea" --table "mnt_areafarmaciaxestablecimiento")

	set_path_database
	load_database
	
	return 0
}

function sinab_dump(){
	
	echo 'extra sinab'
	return 0
}

