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


function incia_respaldos(){
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

incia_respaldos
