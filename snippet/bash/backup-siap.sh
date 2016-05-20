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

source $(dirname $0)/funciones.sh

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
	echo "$RESULT" > momomo
	if [ "$RESULT" -gt "0" ]
	then
		echo "Se registraron $RESULT registros"
	fi
}

function init_data(){
	#load_establecimientos

	#load_medicamentos

	#load_siaps_sinab

	sinab_dump
}

init_data