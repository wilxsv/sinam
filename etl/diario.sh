#!/bin/bash
#
# Rutina de consulta, extraccion y carga de datos de diferentes 
# fuentes de datos a usando el estandar SQL:2008.
# El objetivo es mantener un repositorio de registros actualizado,
# se inicia con la carga de archivos maestros y se prosigue con la 
# carga de datos desde los SIAP
# 
# @author		Ministerio de Salud de El Salvador
# @deprecated
# @param		-v verbose -d debug
# @return
# @throws
# @see
# @version		0.7
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

function siaps( ){
	log 'Iniciando Respaldo de siaps'
	load_siaps_sinab >> $LOGFILE
	log 'Terminando load_siaps_sinab'
}

function init_data(){
	
	establecimientos && medicamentos #&& siaps
}

init_data
