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

function establecimientos( ){
	log 'Iniciando Respaldo de establecimientos'
	load_establecimientos >> $LOGFILE
	log 'Terminando load_establecimientos'
}

function medicamentos( ){
	log 'Iniciando Respaldo de medicamentos'
	load_medicamentos >> $LOGFILE
	log 'Terminando load_medicamentos'
}

function siap_sinab( ){
	log 'Iniciando Respaldo de siaps'
	load_siaps_sinab >> $LOGFILE
	log 'Terminando load_siaps_sinab'
}

function init_data(){
	
	#establecimientos
	#medicamentos
	siap_sinab
	

#	sinab_dump
}

init_data
