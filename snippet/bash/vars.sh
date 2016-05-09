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

export dir=`pwd`
#Files
XML_FILE=establecimiento.xml
DUMP_FILE=/tmp/sumo.sql
DUMP_TMP=/tmp/tmp.sql
#Data Base
SCHEMA_TMP=last
DB_HOST=127.0.0.1
DB_PORT=5432
DB_NAME=sinam-dev
DB_USER=acrasame
DE_PASSWD=acrasame