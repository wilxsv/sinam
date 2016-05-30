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

#Files
XML_FILE=db/establecimiento.xml
XML_MASTER=db/maestros.xml
DUMP_FILE=/tmp/sumo.sql
DUMP_TMP=/tmp/tmp.sql
#Data Base
#Config
LOGFILE="/tmp/sistem-sinam.log"
TIMESTAMP=`date "+%Y-%m-%d %H:%M:%S"`
DEBUG="TRUE"
