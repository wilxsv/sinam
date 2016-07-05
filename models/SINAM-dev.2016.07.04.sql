--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.8
-- Dumped by pg_dump version 9.4.8
-- Started on 2016-07-04 22:21:54 CST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2365 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 243 (class 1255 OID 150549)
-- Name: actualiza_establecimientos_oring(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION actualiza_establecimientos_oring() RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    v_item RECORD;
BEGIN
    FOR v_item IN SELECT * FROM sab_cat_establecimientos LOOP
        UPDATE sab_cat_establecimientos SET id_municipio=getmunicipiosiap(v_item.id_municipio::BIGINT)  WHERE id=v_item.id;
    END LOOP;
    RETURN 1;
END
$$;


--
-- TOC entry 250 (class 1255 OID 151618)
-- Name: calcula_consumo_mes(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION calcula_consumo_mes() RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    v_item RECORD; --Variable para iterar los historicos
    var_pq BIGINT; --Variable contador
    var_id BIGINT; --Variable temporar para conprobar si existe un calculo anterior
BEGIN
    FOR v_item IN SELECT idestablecimiento,  idmedicina, date_part('year', date_trunc('year', fechaentrega)) AS "anyo",  date_part('month', date_trunc('month', fechaentrega)) AS "mes", SUM(cantidad) AS cantidad, AVG(cantidad) AS promedio FROM "farm_medicinarecetada" GROUP BY 1, 2, 3, 4 ORDER BY 1, 2, 3, 4 LOOP
        var_id := 0;
        SELECT id INTO var_id FROM ctl_abastecimiento WHERE id_establecimiento = v_item.idestablecimiento AND mes = v_item.mes AND anyo = v_item.anyo AND id_producto = v_item.idmedicina;
	IF var_id > 0 THEN
	    RAISE INFO ' :: Nada que hacer por aca :: ';
	ELSE
	    RAISE INFO ' :: Ingresando un nuevo consumo :: ';
	    var_pq := var_pq + 1;
	    INSERT INTO ctl_abastecimiento(id_producto, id_establecimiento, mes, cantidad, anyo) VALUES (v_item.idmedicina, v_item.idestablecimiento, v_item.mes, v_item.cantidad, v_item.anyo);
        END IF;
    END LOOP;
    RETURN var_pq;
END
$$;


--
-- TOC entry 247 (class 1255 OID 150550)
-- Name: carga_datos(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION carga_datos() RETURNS integer
    LANGUAGE plpgsql
    AS $$
/**
 * Funcion: 
 * Autor:   Ministerio de Salud de El Salvador
 * Elemplo: SELECT * FROM prepara las tablas para cargar los datos a schema publico;
 *
*/
DECLARE
    var BIGINT;
    v_item RECORD;
    num INTEGER;
BEGIN
    num := 0;
    RAISE INFO ' :: Se inicia el proceso de carga de datos de establecimientos :: ';
    FOR v_item IN SELECT * FROM last.mnt_areafarmaciaxestablecimiento LOOP
	INSERT INTO mnt_areafarmaciaxestablecimiento(idarea, habilitado, idestablecimiento, idmodalidad, carga_sinab) VALUES (v_item.idarea, v_item.habilitado, v_item.idestablecimiento, v_item.idmodalidad, v_item.carga_sinab);
        num=num+1;
    END LOOP;
    RAISE INFO ' Total % :: ' , num;
    num := 0;
    RAISE INFO ' :: Se inicia el proceso de carga de datos de existencias :: ';
    FOR v_item IN SELECT * FROM last.farm_medicinaexistenciaxarea LOOP
	INSERT INTO farm_medicinaexistenciaxarea(idmedicina, idarea, existencia, idlote, idestablecimiento, idmodalidad) VALUES (v_item.idmedicina, v_item.idarea, v_item.existencia, v_item.idlote, v_item.idestablecimiento, v_item.idmodalidad);
        var:=v_item.idestablecimiento;
	num=num+1;
    END LOOP;
    UPDATE ctl_establecimiento SET actualizado=now()::timestamp(0) without time zone WHERE id=var;
    RAISE INFO ' Total % :: ' , num;
    RETURN 1;
END;
$$;


--
-- TOC entry 244 (class 1255 OID 150551)
-- Name: get_distancia(double precision, double precision, double precision, double precision); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION get_distancia(double precision, double precision, double precision, double precision) RETURNS double precision
    LANGUAGE plpgsql
    AS $_$
/**
 * Funcion que retorna la distancia en kilometros entre 2 coordenadas geograficas
 * mediante la Fórmula del Haversine - http://es.wikipedia.org/wiki/Fórmula_del_Haversine
 * 
 * Acceso: publico
 * Autor:  William Vides - wilx.sv@gmail.com
 * Fecha: 2012.07.19
 * Elemplo: SELECT * FROM get_distancia(x1, y1, x2, y2);
 * x := latitud,   y := longitud
 *
*/
DECLARE
    x1 ALIAS FOR $1;
    y1 ALIAS FOR $2;
    x2 ALIAS FOR $3;
    y2 ALIAS FOR $4;
    d_lon  double precision;--Distancia entre 2 longitudes
    d_lat  double precision;--Distancia entre 2 latitudes
    tierra double precision;
    var_a double precision;
    var_c double precision;
    distancia double precision;
BEGIN
    tierra = 6371; --Factor de conversion del radio de la tierra en kilometros (~ 3960 millas)

    d_lat = (x2-x1);--radians(x2-x1);
    d_lon = (y2-y1);--radians(y2-y1);
    /*
    var_a = power(sin(d_lat/2), 2) + cos(x1)*cos(x2)*power( sin(d_lon/2), 2);
    var_c = 2*atan2(sqrt(var_a), sqrt(1-var_a));*/
    var_c = acos(cos(radians(x1))*cos(radians(x2))*cos(radians(y2-y1))+sin(radians(x1))*sin(radians(x2)));
    
    RETURN var_c*tierra;
END;
$_$;


--
-- TOC entry 245 (class 1255 OID 150552)
-- Name: getmunicipiosiap(bigint); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION getmunicipiosiap(bigint) RETURNS bigint
    LANGUAGE plpgsql
    AS $_$
/**
 * Funcion: 
 * Acceso:  
 * Autor:   Ministerio de Salud de El Salvador
 * Fecha:   
*/
DECLARE
    var_id ALIAS FOR $1;
    var BIGINT;
BEGIN
  SELECT id_siap INTO var FROM "ctl_alias_municipio" WHERE id_sinab = var_id;
  IF var > 0 THEN
    RETURN var;
  ELSE
    RAISE INFO ' :: no se encontro % :: ', var_id;
    RETURN 1;
  END IF;
END;
$_$;


--
-- TOC entry 246 (class 1255 OID 150553)
-- Name: pre_format(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION pre_format(text) RETURNS text
    LANGUAGE plpgsql
    AS $_$
/**
 * Funcion: 
 * Acceso:  
 * Autor:   Ministerio de Salud de El Salvador
 * Fecha:   
*/
DECLARE
    var_texto ALIAS FOR $1;
BEGIN
  RETURN convert_to(trim(lower(var_texto)), 'UTF8');
  EXCEPTION
    WHEN invalid_text_representation THEN
      RAISE NOTICE 'texto no valido';
      RETURN FALSE;
END;
$_$;


--
-- TOC entry 248 (class 1255 OID 150554)
-- Name: prepara_tablas(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION prepara_tablas() RETURNS integer
    LANGUAGE plpgsql
    AS $$
/**
 * Funcion: 
 * Autor:   Ministerio de Salud de El Salvador
 * Elemplo: SELECT * FROM prepara las tablas para cargar los datos a schema publico;
 *
*/
DECLARE
    var BIGINT;
    v_item RECORD;
    num INTEGER;
BEGIN
    num := 0;
    FOR v_item IN SELECT idestablecimiento FROM last.mnt_areafarmaciaxestablecimiento GROUP BY idestablecimiento LOOP
        var := 0;
        DELETE FROM mnt_areafarmaciaxestablecimiento WHERE idestablecimiento=v_item.idestablecimiento;
        DELETE FROM farm_medicinaexistenciaxarea WHERE idestablecimiento=v_item.idestablecimiento;
        RAISE INFO ' :: Se eliminaron el establecimiento - [%] ::' , v_item.idestablecimiento;
            num=num+1;
    END LOOP;
    RAISE INFO ' Total % :: ' , num;
    RETURN 1;
END;
$$;


--
-- TOC entry 249 (class 1255 OID 150555)
-- Name: sp_ascii(character varying); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION sp_ascii(character varying) RETURNS text
    LANGUAGE sql
    AS $_$
SELECT TRANSLATE
($1,
'áàâãäéèêëíìïóòôõöúùûüÁÀÂÃÄÉÈÊËÍÌÏÓÒÔÕÖÚÙÛÜçÇ',
'aaaaaeeeeiiiooooouuuuAAAAAEEEEIIIOOOOOUUUUcC');
$_$;


SET default_with_oids = false;

--
-- TOC entry 173 (class 1259 OID 150556)
-- Name: ctl_abastecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_abastecimiento (
    id_producto bigint NOT NULL,
    id_establecimiento bigint NOT NULL,
    mes bigint NOT NULL,
    cantidad bigint NOT NULL,
    id bigint NOT NULL,
    anyo bigint DEFAULT 0::bigint NOT NULL
);


--
-- TOC entry 174 (class 1259 OID 150559)
-- Name: ctl_abastecimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_abastecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2366 (class 0 OID 0)
-- Dependencies: 174
-- Name: ctl_abastecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_abastecimiento_id_seq OWNED BY ctl_abastecimiento.id;


--
-- TOC entry 175 (class 1259 OID 150561)
-- Name: ctl_alias_municipio; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_alias_municipio (
    id_siap bigint NOT NULL,
    id_sinab bigint NOT NULL
);


--
-- TOC entry 176 (class 1259 OID 150564)
-- Name: ctl_departamento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_departamento (
    id integer NOT NULL,
    nombre character varying(150),
    codigo_cnr character varying(5),
    abreviatura character varying(5),
    id_pais integer,
    id_establecimiento_region integer,
    iso31662 character varying(5)
);


--
-- TOC entry 2367 (class 0 OID 0)
-- Dependencies: 176
-- Name: TABLE ctl_departamento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_departamento IS 'Lista de los departamentos que conforman un pais';


--
-- TOC entry 2368 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id IS 'Llave primaria';


--
-- TOC entry 2369 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.nombre IS 'Nombre del departamento';


--
-- TOC entry 2370 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.codigo_cnr; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.codigo_cnr IS 'Codigo asignado por la Digestyc para un departamento en especifico';


--
-- TOC entry 2371 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.abreviatura; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.abreviatura IS 'Abreviatura asignada al departamento';


--
-- TOC entry 2372 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.id_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_pais IS 'Representa la llave foranea que proviene de ctl_pais';


--
-- TOC entry 2373 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.id_establecimiento_region; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_establecimiento_region IS 'Foránea que representa el la región a la que pertenece administrativamente el departamento';


--
-- TOC entry 2374 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_departamento.iso31662; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.iso31662 IS 'Código de departamento según norma ISO 3166-2 ';


--
-- TOC entry 177 (class 1259 OID 150567)
-- Name: ctl_departamento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_departamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2375 (class 0 OID 0)
-- Dependencies: 177
-- Name: ctl_departamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_departamento_id_seq OWNED BY ctl_departamento.id;


--
-- TOC entry 178 (class 1259 OID 150569)
-- Name: ctl_establecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_establecimiento (
    id integer NOT NULL,
    id_tipo_establecimiento integer NOT NULL,
    nombre character varying(150) NOT NULL,
    direccion character varying(250),
    telefono character varying(15),
    fax character varying(15),
    latitud numeric(10,4),
    longitud numeric(10,4),
    id_municipio integer,
    id_nivel_minsal integer,
    cod_ucsf integer,
    activo boolean,
    id_establecimiento_padre integer,
    tipo_expediente character(1),
    configurado boolean,
    tipo_farmacia boolean,
    dias_intermedios_citas integer,
    citas_sin_expediente boolean DEFAULT false,
    id_institucion integer,
    tipo_impresion integer DEFAULT 1,
    minutoshora integer,
    tiempoprevioalacita integer,
    actualizado timestamp without time zone
);


--
-- TOC entry 2376 (class 0 OID 0)
-- Dependencies: 178
-- Name: TABLE ctl_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2377 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2378 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.id_tipo_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_tipo_establecimiento IS 'Llave foránea del tipo de establecimiento';


--
-- TOC entry 2379 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.nombre IS 'Nombre del establecimiento de salud';


--
-- TOC entry 2380 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.direccion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.direccion IS 'Lugar físico del establecimiento';


--
-- TOC entry 2381 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.telefono; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.telefono IS 'Teléfono de contacto del establecimiento';


--
-- TOC entry 2382 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.fax; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.fax IS 'Fax del establecimiento';


--
-- TOC entry 2383 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.latitud; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.latitud IS 'Coordenadas de latitud para sistema georeferencial';


--
-- TOC entry 2384 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.longitud; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.longitud IS 'Coordenadas de longitud para sistema georeferencial';


--
-- TOC entry 2385 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.id_municipio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_municipio IS 'Llave foránea del municipio al que pertenece el establecimiento';


--
-- TOC entry 2386 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.id_nivel_minsal; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_nivel_minsal IS 'Representa el nivel del establecimiento, pueden ser 1,2,3';


--
-- TOC entry 2387 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.cod_ucsf; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.cod_ucsf IS 'Código asignados a la Unidad Comunitaria de Salud Familiar.';


--
-- TOC entry 2388 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.activo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.activo IS 'Estado del establecimiento';


--
-- TOC entry 2389 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.id_establecimiento_padre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_establecimiento_padre IS 'Llave foránea del establecimiento que es su supervisor';


--
-- TOC entry 2390 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.tipo_expediente; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_expediente IS 'Los tipos de expedientes son: G = Utiliza guión (xxx-xx); I = Infinito';


--
-- TOC entry 2391 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.configurado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.configurado IS 'Determina cual es el establecimiento que esta configurado ';


--
-- TOC entry 2392 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.tipo_farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_farmacia IS 'Representa el tipo de farmacia que opera en el establecimiento';


--
-- TOC entry 2393 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.dias_intermedios_citas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.dias_intermedios_citas IS 'Variable que determina entre cuantos dias se puede dejar una cita';


--
-- TOC entry 2394 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.citas_sin_expediente; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.citas_sin_expediente IS 'Campo que determina si el establecimiento puede dejar citas sin expedientes. Generalmente cuando es por telefono';


--
-- TOC entry 2395 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.tipo_impresion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_impresion IS 'Tipo de impresión para citas 1-comprobante , 2- ticket';


--
-- TOC entry 2396 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.minutoshora; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.minutoshora IS '1:si son minutos, 2: si es hora';


--
-- TOC entry 2397 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_establecimiento.tiempoprevioalacita; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tiempoprevioalacita IS 'Tiempo previo que el paciente debe presentarse a su cita';


--
-- TOC entry 179 (class 1259 OID 150574)
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2398 (class 0 OID 0)
-- Dependencies: 179
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_establecimiento_id_seq OWNED BY ctl_establecimiento.id;


--
-- TOC entry 180 (class 1259 OID 150576)
-- Name: ctl_institucion; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_institucion (
    id integer NOT NULL,
    nombre character varying(150) NOT NULL,
    id_pais integer,
    logo character varying(35),
    rectora character varying(10),
    categoria integer,
    sigla character varying(14),
    estado integer NOT NULL
);


--
-- TOC entry 2399 (class 0 OID 0)
-- Dependencies: 180
-- Name: TABLE ctl_institucion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_institucion IS 'Catálogo que contiene las instituciones  utilizadas en los sistemas de salud';


--
-- TOC entry 2400 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_institucion.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id IS 'Identificador código maestro institución';


--
-- TOC entry 2401 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_institucion.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.nombre IS 'Descripción nombre de la Institución';


--
-- TOC entry 2402 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_institucion.id_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id_pais IS 'Identificador pais al que pertenece la institución';


--
-- TOC entry 2403 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_institucion.logo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.logo IS 'nombre archivo de imagen utilizada como logo de la institución';


--
-- TOC entry 2404 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_institucion.sigla; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.sigla IS 'Sigla de la institución';


--
-- TOC entry 181 (class 1259 OID 150579)
-- Name: ctl_institucion_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_institucion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2405 (class 0 OID 0)
-- Dependencies: 181
-- Name: ctl_institucion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_institucion_id_seq OWNED BY ctl_institucion.id;


--
-- TOC entry 182 (class 1259 OID 150581)
-- Name: ctl_municipio; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_municipio (
    id integer NOT NULL,
    nombre character varying(150) NOT NULL,
    codigo_cnr character varying(5),
    abreviatura character varying(5),
    id_departamento integer NOT NULL
);


--
-- TOC entry 2406 (class 0 OID 0)
-- Dependencies: 182
-- Name: TABLE ctl_municipio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_municipio IS 'Lista de los municipios que conforman un departamento';


--
-- TOC entry 2407 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN ctl_municipio.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id IS 'Llave primaria';


--
-- TOC entry 2408 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN ctl_municipio.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.nombre IS 'Nombre del municipio';


--
-- TOC entry 2409 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN ctl_municipio.codigo_cnr; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.codigo_cnr IS 'Codigo asignado por la Digestyc para un municipio en especifico';


--
-- TOC entry 2410 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN ctl_municipio.abreviatura; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.abreviatura IS 'Abreviatura asignada al municipio';


--
-- TOC entry 2411 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN ctl_municipio.id_departamento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id_departamento IS 'Representa la llave foranea que proviene de ctl_departamento';


--
-- TOC entry 183 (class 1259 OID 150584)
-- Name: ctl_municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2412 (class 0 OID 0)
-- Dependencies: 183
-- Name: ctl_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_municipio_id_seq OWNED BY ctl_municipio.id;


--
-- TOC entry 184 (class 1259 OID 150586)
-- Name: ctl_pais; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_pais (
    id integer NOT NULL,
    nombre character varying(150),
    activo boolean
);


--
-- TOC entry 2413 (class 0 OID 0)
-- Dependencies: 184
-- Name: TABLE ctl_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_pais IS 'Lista del pais originario del paciente';


--
-- TOC entry 2414 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN ctl_pais.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.id IS 'Llave primaria';


--
-- TOC entry 2415 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN ctl_pais.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.nombre IS 'Nombre del pais';


--
-- TOC entry 2416 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN ctl_pais.activo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.activo IS 'Si el país está activo para ser presentado en las aplicaciones del sistema';


--
-- TOC entry 185 (class 1259 OID 150589)
-- Name: ctl_pais_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_pais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2417 (class 0 OID 0)
-- Dependencies: 185
-- Name: ctl_pais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_pais_id_seq OWNED BY ctl_pais.id;


--
-- TOC entry 186 (class 1259 OID 150591)
-- Name: ctl_tipo_establecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_tipo_establecimiento (
    id integer NOT NULL,
    nombre character varying(150),
    codigo character varying(6),
    id_institucion integer
);


--
-- TOC entry 2418 (class 0 OID 0)
-- Dependencies: 186
-- Name: TABLE ctl_tipo_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_tipo_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2419 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN ctl_tipo_establecimiento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2420 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN ctl_tipo_establecimiento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.nombre IS 'Nombre del tipo de establecimiento';


--
-- TOC entry 2421 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN ctl_tipo_establecimiento.codigo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.codigo IS 'Código que distingue al tipo establecimiento';


--
-- TOC entry 187 (class 1259 OID 150594)
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_tipo_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2422 (class 0 OID 0)
-- Dependencies: 187
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_tipo_establecimiento_id_seq OWNED BY ctl_tipo_establecimiento.id;


--
-- TOC entry 188 (class 1259 OID 150596)
-- Name: farm_catalogoproductos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE farm_catalogoproductos (
    id integer NOT NULL,
    codigo character varying(8) NOT NULL,
    idtipoproducto integer,
    idunidadmedida integer DEFAULT 0 NOT NULL,
    nombre text NOT NULL,
    niveluso integer,
    concentracion character varying(382),
    formafarmaceutica character varying(91),
    presentacion character(150),
    prioridad integer,
    precioactual numeric(20,3),
    aplicalote integer DEFAULT 0,
    existenciaactual numeric(15,3) DEFAULT 0,
    especificacionestecnicas text,
    codigonacionesunidas character varying(20),
    pertenecelistadooficial integer,
    estadoproducto integer DEFAULT 1,
    observacion text,
    auusuariocreacion character(15),
    aufechacreacion timestamp without time zone,
    auusuariomodificacion character varying(15),
    aufechamodificacion timestamp without time zone,
    estasincronizada integer DEFAULT 0,
    idestablecimiento integer,
    clasificacion character(1),
    areatecnica integer,
    tipouaci integer,
    idespecificogasto integer,
    ultimoprecio numeric(20,3),
    idterapeutico integer DEFAULT 0,
    idestado character(1) DEFAULT 'H'::bpchar,
    divisormedicina integer,
    cuantificable integer DEFAULT 0
);


--
-- TOC entry 2423 (class 0 OID 0)
-- Dependencies: 188
-- Name: TABLE farm_catalogoproductos; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_catalogoproductos IS 'Catalogo general de medicamentos';


--
-- TOC entry 2424 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.id IS 'Llave de la tabla';


--
-- TOC entry 2425 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.codigo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigo IS 'codigo compuesto del medicamento';


--
-- TOC entry 2426 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idtipoproducto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idtipoproducto IS 'tipo de producto';


--
-- TOC entry 2427 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idunidadmedida; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idunidadmedida IS 'pk foranea de la tabla farm_unidadmedida';


--
-- TOC entry 2428 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.nombre IS 'Nombre del medicamento';


--
-- TOC entry 2429 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.niveluso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.niveluso IS 'Nivel de uso del medicamento';


--
-- TOC entry 2430 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.concentracion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.concentracion IS 'concentracion del medicamento';


--
-- TOC entry 2431 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.formafarmaceutica; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.formafarmaceutica IS 'forma farmauceituca del medicamto';


--
-- TOC entry 2432 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.presentacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.presentacion IS 'Presentacion del medicamento';


--
-- TOC entry 2433 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.prioridad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.prioridad IS 'prioridad del medicamento';


--
-- TOC entry 2434 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.precioactual; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.precioactual IS 'El precio actual del medicamento. Proviene de SINAB';


--
-- TOC entry 2435 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.aplicalote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aplicalote IS 'Provienen de SINAB';


--
-- TOC entry 2436 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.existenciaactual; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.existenciaactual IS 'Provienen de SINAB';


--
-- TOC entry 2437 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.especificacionestecnicas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.especificacionestecnicas IS 'Provienen de SINAB';


--
-- TOC entry 2438 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.codigonacionesunidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigonacionesunidas IS 'Provienen de SINAB';


--
-- TOC entry 2439 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.pertenecelistadooficial; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.pertenecelistadooficial IS 'Provienen de SINAB';


--
-- TOC entry 2440 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.estadoproducto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estadoproducto IS 'Provienen de SINAB';


--
-- TOC entry 2441 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.observacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.observacion IS 'Provienen de SINAB';


--
-- TOC entry 2442 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.auusuariocreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariocreacion IS 'Provienen de SINAB';


--
-- TOC entry 2443 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.aufechacreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechacreacion IS 'Provienen de SINAB';


--
-- TOC entry 2444 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.auusuariomodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariomodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2445 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.aufechamodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechamodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2446 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.estasincronizada; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estasincronizada IS 'Provienen de SINAB';


--
-- TOC entry 2447 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestablecimiento IS 'Provienen de SINAB';


--
-- TOC entry 2448 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.clasificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.clasificacion IS 'Provienen de SINAB';


--
-- TOC entry 2449 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.areatecnica; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.areatecnica IS 'Provienen de SINAB';


--
-- TOC entry 2450 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.tipouaci; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.tipouaci IS 'Provienen de SINAB';


--
-- TOC entry 2451 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idespecificogasto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idespecificogasto IS 'Provienen de SINAB';


--
-- TOC entry 2452 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.ultimoprecio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.ultimoprecio IS 'Provienen de SINAB';


--
-- TOC entry 2453 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idterapeutico IS 'Provienen de SINAB';


--
-- TOC entry 2454 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.idestado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestado IS 'Estado del Medicamento ''H''=Habilitado ''I''=Inhabilitado';


--
-- TOC entry 2455 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.divisormedicina; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.divisormedicina IS 'Cantidad de pastillas contenidas en cada Frasco';


--
-- TOC entry 2456 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_catalogoproductos.cuantificable; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.cuantificable IS 'Bandera que permite saber si un medicamento es cuantificable 0: No es cuantificable, 1: Es cuantificable';


--
-- TOC entry 189 (class 1259 OID 150610)
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_catalogoproductos_idmedicina_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2457 (class 0 OID 0)
-- Dependencies: 189
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_catalogoproductos_idmedicina_seq OWNED BY farm_catalogoproductos.id;


--
-- TOC entry 190 (class 1259 OID 150612)
-- Name: farm_lotes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE farm_lotes (
    id integer NOT NULL,
    lote character varying(60) NOT NULL,
    preciolote numeric(5,2) NOT NULL,
    fechavencimiento date NOT NULL,
    idestablecimiento integer NOT NULL,
    idmodalidad integer NOT NULL,
    idprocedencia integer,
    id_trans_ingreso integer,
    fecha_ingreso date
);


--
-- TOC entry 2458 (class 0 OID 0)
-- Dependencies: 190
-- Name: TABLE farm_lotes; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_lotes IS 'Codigo de lotes ingresados al sistema';


--
-- TOC entry 2459 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.id IS 'Llave primaria de la tabla';


--
-- TOC entry 2460 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.lote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.lote IS 'Codigo del lote';


--
-- TOC entry 2461 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.preciolote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.preciolote IS 'Precio del lote';


--
-- TOC entry 2462 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.fechavencimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.fechavencimiento IS 'Fecha de vencimiento del lote';


--
-- TOC entry 2463 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idestablecimiento IS 'Codigo del establecimiento.';


--
-- TOC entry 2464 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idmodalidad IS 'Indicador de modalidades';


--
-- TOC entry 2465 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.idprocedencia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idprocedencia IS 'Llave forane del tipo de procedencia del ingreso';


--
-- TOC entry 2466 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.id_trans_ingreso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.id_trans_ingreso IS 'id de la tabla farm_trans_ingresos para saber de donde proviene la existencia del sinab';


--
-- TOC entry 2467 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN farm_lotes.fecha_ingreso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.fecha_ingreso IS 'Fecha que ingreso el medicamento segun el vale de SINAB';


--
-- TOC entry 191 (class 1259 OID 150615)
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_lotes_idlote_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2468 (class 0 OID 0)
-- Dependencies: 191
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_lotes_idlote_seq OWNED BY farm_lotes.id;


--
-- TOC entry 192 (class 1259 OID 150617)
-- Name: farm_medicinaexistenciaxarea; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE farm_medicinaexistenciaxarea (
    id integer NOT NULL,
    idmedicina integer NOT NULL,
    idarea integer NOT NULL,
    existencia numeric(11,3) NOT NULL,
    idlote integer NOT NULL,
    idestablecimiento integer NOT NULL,
    idmodalidad integer NOT NULL
);


--
-- TOC entry 2469 (class 0 OID 0)
-- Dependencies: 192
-- Name: TABLE farm_medicinaexistenciaxarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_medicinaexistenciaxarea IS 'Existencia de medicamento por area de farmacia';


--
-- TOC entry 2470 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.id IS 'Llave primaria de la tabla.';


--
-- TOC entry 2471 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.idmedicina; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmedicina IS 'Llave foranea del catalogo de productos.';


--
-- TOC entry 2472 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.idarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idarea IS 'Llave foranea de areas de farmacia';


--
-- TOC entry 2473 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.existencia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.existencia IS 'Valo numerico de existencia de las areas de farmacia';


--
-- TOC entry 2474 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.idlote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idlote IS 'Lote, conectado con lotes';


--
-- TOC entry 2475 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idestablecimiento IS 'Codigo de Establecimiento';


--
-- TOC entry 2476 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN farm_medicinaexistenciaxarea.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmodalidad IS 'Indicador de Modalidades';


--
-- TOC entry 193 (class 1259 OID 150620)
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2477 (class 0 OID 0)
-- Dependencies: 193
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq OWNED BY farm_medicinaexistenciaxarea.id;


--
-- TOC entry 194 (class 1259 OID 150622)
-- Name: farm_medicinarecetada; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE farm_medicinarecetada (
    id bigint NOT NULL,
    idmedicina integer NOT NULL,
    cantidad numeric(11,3) NOT NULL,
    fechaentrega date,
    idestablecimiento integer NOT NULL,
    total_medicamento character varying(10),
    id_establecimiento_despacha integer,
    secuencia_local bigint DEFAULT 0 NOT NULL
);


--
-- TOC entry 2478 (class 0 OID 0)
-- Dependencies: 194
-- Name: TABLE farm_medicinarecetada; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_medicinarecetada IS 'Registro de medicamento prescrito por el medico';


--
-- TOC entry 2479 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN farm_medicinarecetada.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinarecetada.id IS 'Llave primaria de la tabla';


--
-- TOC entry 195 (class 1259 OID 150625)
-- Name: farm_medicinarecetada_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_medicinarecetada_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2480 (class 0 OID 0)
-- Dependencies: 195
-- Name: farm_medicinarecetada_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_medicinarecetada_id_seq OWNED BY farm_medicinarecetada.id;


--
-- TOC entry 196 (class 1259 OID 150627)
-- Name: farm_unidadmedidas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE farm_unidadmedidas (
    id integer NOT NULL,
    descripcion character varying(6) NOT NULL,
    descripcionlarga character varying(30),
    unidadescontenidas integer NOT NULL,
    cantidaddecimal integer,
    auusuariocreacion character varying(15),
    aufechacreacion timestamp without time zone,
    auusuariomodificacion character(15),
    aufechamodificacion timestamp without time zone,
    estasincronizada integer
);


--
-- TOC entry 2481 (class 0 OID 0)
-- Dependencies: 196
-- Name: TABLE farm_unidadmedidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_unidadmedidas IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2482 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.id IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2483 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.descripcion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcion IS 'Contiene las siglas de la unidad de medida';


--
-- TOC entry 2484 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.descripcionlarga; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcionlarga IS 'Descripcion de la unidad de medida';


--
-- TOC entry 2485 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.unidadescontenidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.unidadescontenidas IS 'Cuantas unidad contiene CTO:100 C/U:1 etc';


--
-- TOC entry 2486 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.cantidaddecimal; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.cantidaddecimal IS 'PROVIENE DE SINAB';


--
-- TOC entry 2487 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.auusuariocreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariocreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2488 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.aufechacreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechacreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2489 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.auusuariomodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariomodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2490 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.aufechamodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechamodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2491 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN farm_unidadmedidas.estasincronizada; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.estasincronizada IS 'PROVIENE DE SINAB';


--
-- TOC entry 197 (class 1259 OID 150630)
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_unidadmedidas_idunidadmedida_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2492 (class 0 OID 0)
-- Dependencies: 197
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_unidadmedidas_idunidadmedida_seq OWNED BY farm_unidadmedidas.id;


--
-- TOC entry 198 (class 1259 OID 150632)
-- Name: mnt_areafarmacia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_areafarmacia (
    id integer NOT NULL,
    area character varying(30) NOT NULL,
    idfarmacia integer NOT NULL,
    habilitado character(1) DEFAULT 'N'::bpchar NOT NULL
);


--
-- TOC entry 2493 (class 0 OID 0)
-- Dependencies: 198
-- Name: TABLE mnt_areafarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_areafarmacia IS 'tabla que contiene las areas que conforman las farmacias';


--
-- TOC entry 2494 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN mnt_areafarmacia.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.id IS 'Llave primaria';


--
-- TOC entry 2495 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN mnt_areafarmacia.area; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.area IS 'Nombre del Area de la Farmacia';


--
-- TOC entry 2496 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN mnt_areafarmacia.idfarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.idfarmacia IS 'Llave foranea de mnt_farmacia';


--
-- TOC entry 2497 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN mnt_areafarmacia.habilitado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.habilitado IS 'S: Habilitado N: No habilitado';


--
-- TOC entry 199 (class 1259 OID 150636)
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_areafarmacia_idarea_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2498 (class 0 OID 0)
-- Dependencies: 199
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_areafarmacia_idarea_seq OWNED BY mnt_areafarmacia.id;


--
-- TOC entry 200 (class 1259 OID 150638)
-- Name: mnt_areafarmaciaxestablecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_areafarmaciaxestablecimiento (
    idrelacion integer NOT NULL,
    idarea integer NOT NULL,
    habilitado character(1) DEFAULT 'S'::bpchar NOT NULL,
    idestablecimiento integer NOT NULL,
    idmodalidad integer NOT NULL,
    carga_sinab boolean DEFAULT false NOT NULL,
    dispensar_seguimiento boolean DEFAULT false
);


--
-- TOC entry 2499 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idrelacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idrelacion IS 'Llave primaria';


--
-- TOC entry 2500 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idarea IS 'Area de farmacia';


--
-- TOC entry 2501 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.habilitado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.habilitado IS 'Estado de Area de farmacia';


--
-- TOC entry 2502 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento IS 'Identificador del establecimiento ';


--
-- TOC entry 2503 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad IS 'Identificador del tipo de modalidad en las que se desenvuelve el establecimiento';


--
-- TOC entry 2504 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab IS 'define el area de la farmacia por defecto donde se cargara el vale proveniente de SINAB.';


--
-- TOC entry 201 (class 1259 OID 150644)
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2505 (class 0 OID 0)
-- Dependencies: 201
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq OWNED BY mnt_areafarmaciaxestablecimiento.idrelacion;


--
-- TOC entry 202 (class 1259 OID 150646)
-- Name: mnt_farmacia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_farmacia (
    id integer NOT NULL,
    farmacia character varying(50) NOT NULL,
    habilitadofarmacia character(1) DEFAULT 'S'::bpchar NOT NULL
);


--
-- TOC entry 2506 (class 0 OID 0)
-- Dependencies: 202
-- Name: TABLE mnt_farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_farmacia IS 'Nombre de las farmacias existentes en el centro de salud';


--
-- TOC entry 2507 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN mnt_farmacia.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.id IS 'Llave primaria';


--
-- TOC entry 2508 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN mnt_farmacia.farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.farmacia IS 'Nombre de la Farmacia';


--
-- TOC entry 2509 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN mnt_farmacia.habilitadofarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.habilitadofarmacia IS 'almacena si esta habilitado farmacia';


--
-- TOC entry 203 (class 1259 OID 150650)
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_farmacia_idfarmacia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2510 (class 0 OID 0)
-- Dependencies: 203
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_farmacia_idfarmacia_seq OWNED BY mnt_farmacia.id;


--
-- TOC entry 204 (class 1259 OID 150652)
-- Name: mnt_grupoterapeutico; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_grupoterapeutico (
    id integer NOT NULL,
    grupoterapeutico character varying(50) NOT NULL
);


--
-- TOC entry 2511 (class 0 OID 0)
-- Dependencies: 204
-- Name: TABLE mnt_grupoterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_grupoterapeutico IS 'Grup. terapeutico que dividen los medicamentos';


--
-- TOC entry 2512 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN mnt_grupoterapeutico.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.id IS 'clave primaria';


--
-- TOC entry 2513 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN mnt_grupoterapeutico.grupoterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.grupoterapeutico IS 'Nombre de Grupo Terapeutico';


--
-- TOC entry 205 (class 1259 OID 150655)
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2514 (class 0 OID 0)
-- Dependencies: 205
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq" OWNED BY mnt_grupoterapeutico.id;


--
-- TOC entry 206 (class 1259 OID 150657)
-- Name: sab_alm_existenciahistorica; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_alm_existenciahistorica (
    id bigint NOT NULL,
    id_almacen bigint NOT NULL,
    id_producto bigint NOT NULL,
    fecha timestamp without time zone NOT NULL,
    cantidaddisponible numeric NOT NULL,
    cantidadnodisponible numeric NOT NULL,
    cantidadreservada numeric NOT NULL,
    cantidadtemporal numeric NOT NULL,
    cantidadvencida numeric NOT NULL
);


--
-- TOC entry 207 (class 1259 OID 150663)
-- Name: sab_alm_existenciahistorica_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_alm_existenciahistorica_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2515 (class 0 OID 0)
-- Dependencies: 207
-- Name: sab_alm_existenciahistorica_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_alm_existenciahistorica_id_seq OWNED BY sab_alm_existenciahistorica.id;


--
-- TOC entry 208 (class 1259 OID 150665)
-- Name: sab_alm_existenciasalmacenes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_alm_existenciasalmacenes (
    id_almacen bigint NOT NULL,
    id_producto bigint NOT NULL,
    cantidaddisponible numeric DEFAULT (0)::numeric NOT NULL,
    cantidadnodisponible numeric DEFAULT (0)::numeric NOT NULL,
    cantidadreservada numeric DEFAULT (0)::numeric NOT NULL,
    cantidadvencida numeric DEFAULT (0)::numeric NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL,
    id bigint NOT NULL
);


--
-- TOC entry 209 (class 1259 OID 150676)
-- Name: sab_alm_existenciasalmacenes_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_alm_existenciasalmacenes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2516 (class 0 OID 0)
-- Dependencies: 209
-- Name: sab_alm_existenciasalmacenes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_alm_existenciasalmacenes_id_seq OWNED BY sab_alm_existenciasalmacenes.id;


--
-- TOC entry 210 (class 1259 OID 150678)
-- Name: sab_cat_almacenes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_almacenes (
    id bigint NOT NULL,
    nombre character varying(70) NOT NULL,
    direccion character varying(200),
    telefono character varying(8) DEFAULT '0'::character varying,
    esfarmacia smallint DEFAULT 0 NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL,
    estadoalmacen smallint
);


--
-- TOC entry 211 (class 1259 OID 150684)
-- Name: sab_cat_almacenes_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_almacenes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2517 (class 0 OID 0)
-- Dependencies: 211
-- Name: sab_cat_almacenes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_almacenes_id_seq OWNED BY sab_cat_almacenes.id;


--
-- TOC entry 212 (class 1259 OID 150686)
-- Name: sab_cat_almacenesestablecimientos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_almacenesestablecimientos (
    id_establecimiento bigint NOT NULL,
    id_almacen bigint NOT NULL,
    esprincipal smallint DEFAULT 0 NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL,
    id bigint NOT NULL
);


--
-- TOC entry 213 (class 1259 OID 150691)
-- Name: sab_cat_almacenesestablecimientos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_almacenesestablecimientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2518 (class 0 OID 0)
-- Dependencies: 213
-- Name: sab_cat_almacenesestablecimientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_almacenesestablecimientos_id_seq OWNED BY sab_cat_almacenesestablecimientos.id;


--
-- TOC entry 214 (class 1259 OID 150693)
-- Name: sab_cat_alternativasproducto; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_alternativasproducto (
    id bigint NOT NULL,
    id_producto bigint NOT NULL,
    multiplicador numeric DEFAULT (1)::numeric NOT NULL,
    divisor numeric DEFAULT (1)::numeric NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 215 (class 1259 OID 150702)
-- Name: sab_cat_catalogoproductos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_catalogoproductos (
    idpro bigint NOT NULL,
    codigo character varying(8) NOT NULL,
    id_tipoproducto bigint NOT NULL,
    id_unidadmedida bigint NOT NULL,
    nombre text NOT NULL,
    niveluso smallint NOT NULL,
    concentracion text,
    formafarmaceutica character varying(100),
    presentacion text,
    pertenecelistadooficial smallint DEFAULT 0 NOT NULL,
    estadoproducto smallint DEFAULT (1)::numeric NOT NULL,
    observacion text,
    estasincronizada smallint DEFAULT 0 NOT NULL,
    clasificacion character(1),
    visto bigint DEFAULT 0 NOT NULL
);


--
-- TOC entry 216 (class 1259 OID 150711)
-- Name: sab_cat_catalogoproductos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_catalogoproductos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2519 (class 0 OID 0)
-- Dependencies: 216
-- Name: sab_cat_catalogoproductos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_catalogoproductos_id_seq OWNED BY sab_cat_catalogoproductos.idpro;


--
-- TOC entry 217 (class 1259 OID 150713)
-- Name: sab_cat_departamentos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_departamentos (
    id bigint NOT NULL,
    codigodepartamento character(2) NOT NULL,
    nombre character varying(20) NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 218 (class 1259 OID 150717)
-- Name: sab_cat_departamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_departamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2520 (class 0 OID 0)
-- Dependencies: 218
-- Name: sab_cat_departamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_departamentos_id_seq OWNED BY sab_cat_departamentos.id;


--
-- TOC entry 219 (class 1259 OID 150719)
-- Name: sab_cat_establecimientos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_establecimientos (
    id bigint NOT NULL,
    codigoestablecimiento character varying(8) NOT NULL,
    id_municipio smallint NOT NULL,
    id_tipoestablecimiento smallint NOT NULL,
    id_zona bigint NOT NULL,
    id_institucion bigint NOT NULL,
    nombre character varying(80) NOT NULL,
    direccion character varying(200),
    telefono character varying(8),
    idpadre bigint,
    nivel bigint,
    estasincronizada smallint DEFAULT 0 NOT NULL,
    idmaestro bigint
);


--
-- TOC entry 220 (class 1259 OID 150723)
-- Name: sab_cat_establecimientos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_establecimientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2521 (class 0 OID 0)
-- Dependencies: 220
-- Name: sab_cat_establecimientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_establecimientos_id_seq OWNED BY sab_cat_establecimientos.id;


--
-- TOC entry 221 (class 1259 OID 150725)
-- Name: sab_cat_instituciones; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_instituciones (
    id bigint NOT NULL,
    nombre character varying(50) NOT NULL,
    porcentajereserva numeric NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 222 (class 1259 OID 150732)
-- Name: sab_cat_instituciones_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_instituciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2522 (class 0 OID 0)
-- Dependencies: 222
-- Name: sab_cat_instituciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_instituciones_id_seq OWNED BY sab_cat_instituciones.id;


--
-- TOC entry 223 (class 1259 OID 150734)
-- Name: sab_cat_municipios; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_municipios (
    id bigint NOT NULL,
    codigomunicipio character(2) NOT NULL,
    id_departamento smallint NOT NULL,
    nombre character varying(25),
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 224 (class 1259 OID 150738)
-- Name: sab_cat_municipios_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_municipios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2523 (class 0 OID 0)
-- Dependencies: 224
-- Name: sab_cat_municipios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_municipios_id_seq OWNED BY sab_cat_municipios.id;


--
-- TOC entry 225 (class 1259 OID 150740)
-- Name: sab_cat_subgrupos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_subgrupos (
    id bigint NOT NULL,
    correlativo character varying(3) NOT NULL,
    id_grupo bigint NOT NULL,
    descripcion character varying(90) NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 226 (class 1259 OID 150744)
-- Name: sab_cat_tipoestablecimientos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_tipoestablecimientos (
    id bigint NOT NULL,
    nombrecorto character(4) NOT NULL,
    descripcion character varying(60) NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 227 (class 1259 OID 150748)
-- Name: sab_cat_tipoestablecimientos_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_tipoestablecimientos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2524 (class 0 OID 0)
-- Dependencies: 227
-- Name: sab_cat_tipoestablecimientos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_tipoestablecimientos_id_seq OWNED BY sab_cat_tipoestablecimientos.id;


--
-- TOC entry 228 (class 1259 OID 150750)
-- Name: sab_cat_unidadmedidas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_unidadmedidas (
    id bigint NOT NULL,
    descripcion character varying(6) NOT NULL,
    descripcionlarga character varying(30),
    unidadescontenidas integer NOT NULL,
    cantidaddecimal smallint,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 229 (class 1259 OID 150754)
-- Name: sab_cat_zonas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE sab_cat_zonas (
    id bigint NOT NULL,
    descripcion character varying(15) NOT NULL,
    estasincronizada smallint DEFAULT 0 NOT NULL
);


--
-- TOC entry 230 (class 1259 OID 150758)
-- Name: sab_cat_zonas_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE sab_cat_zonas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2525 (class 0 OID 0)
-- Dependencies: 230
-- Name: sab_cat_zonas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE sab_cat_zonas_id_seq OWNED BY sab_cat_zonas.id;


--
-- TOC entry 2071 (class 2604 OID 150760)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_abastecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_abastecimiento_id_seq'::regclass);


--
-- TOC entry 2073 (class 2604 OID 150761)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento ALTER COLUMN id SET DEFAULT nextval('ctl_departamento_id_seq'::regclass);


--
-- TOC entry 2076 (class 2604 OID 150762)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_establecimiento_id_seq'::regclass);


--
-- TOC entry 2077 (class 2604 OID 150763)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion ALTER COLUMN id SET DEFAULT nextval('ctl_institucion_id_seq'::regclass);


--
-- TOC entry 2078 (class 2604 OID 150764)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio ALTER COLUMN id SET DEFAULT nextval('ctl_municipio_id_seq'::regclass);


--
-- TOC entry 2079 (class 2604 OID 150765)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_pais ALTER COLUMN id SET DEFAULT nextval('ctl_pais_id_seq'::regclass);


--
-- TOC entry 2080 (class 2604 OID 150766)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_tipo_establecimiento_id_seq'::regclass);


--
-- TOC entry 2089 (class 2604 OID 150767)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos ALTER COLUMN id SET DEFAULT nextval('farm_catalogoproductos_idmedicina_seq'::regclass);


--
-- TOC entry 2090 (class 2604 OID 150768)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_lotes ALTER COLUMN id SET DEFAULT nextval('farm_lotes_idlote_seq'::regclass);


--
-- TOC entry 2091 (class 2604 OID 150769)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea ALTER COLUMN id SET DEFAULT nextval('farm_medicinaexistenciaxarea_idexistencia_seq'::regclass);


--
-- TOC entry 2092 (class 2604 OID 150770)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinarecetada ALTER COLUMN id SET DEFAULT nextval('farm_medicinarecetada_id_seq'::regclass);


--
-- TOC entry 2094 (class 2604 OID 150771)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas ALTER COLUMN id SET DEFAULT nextval('farm_unidadmedidas_idunidadmedida_seq'::regclass);


--
-- TOC entry 2096 (class 2604 OID 150772)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia ALTER COLUMN id SET DEFAULT nextval('mnt_areafarmacia_idarea_seq'::regclass);


--
-- TOC entry 2100 (class 2604 OID 150773)
-- Name: idrelacion; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento ALTER COLUMN idrelacion SET DEFAULT nextval('mnt_areafarmaciaxestablecimiento_idrelacion_seq'::regclass);


--
-- TOC entry 2102 (class 2604 OID 150774)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_farmacia ALTER COLUMN id SET DEFAULT nextval('mnt_farmacia_idfarmacia_seq'::regclass);


--
-- TOC entry 2103 (class 2604 OID 150775)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico ALTER COLUMN id SET DEFAULT nextval('"mnt_grupoterapeutico_IdTerapeutico_seq"'::regclass);


--
-- TOC entry 2104 (class 2604 OID 150776)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciahistorica ALTER COLUMN id SET DEFAULT nextval('sab_alm_existenciahistorica_id_seq'::regclass);


--
-- TOC entry 2110 (class 2604 OID 150777)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciasalmacenes ALTER COLUMN id SET DEFAULT nextval('sab_alm_existenciasalmacenes_id_seq'::regclass);


--
-- TOC entry 2114 (class 2604 OID 150778)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenes ALTER COLUMN id SET DEFAULT nextval('sab_cat_almacenes_id_seq'::regclass);


--
-- TOC entry 2117 (class 2604 OID 150779)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenesestablecimientos ALTER COLUMN id SET DEFAULT nextval('sab_cat_almacenesestablecimientos_id_seq'::regclass);


--
-- TOC entry 2124 (class 2604 OID 150780)
-- Name: idpro; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_catalogoproductos ALTER COLUMN idpro SET DEFAULT nextval('sab_cat_catalogoproductos_id_seq'::regclass);


--
-- TOC entry 2127 (class 2604 OID 150781)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_departamentos ALTER COLUMN id SET DEFAULT nextval('sab_cat_departamentos_id_seq'::regclass);


--
-- TOC entry 2129 (class 2604 OID 150782)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos ALTER COLUMN id SET DEFAULT nextval('sab_cat_establecimientos_id_seq'::regclass);


--
-- TOC entry 2131 (class 2604 OID 150783)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_instituciones ALTER COLUMN id SET DEFAULT nextval('sab_cat_instituciones_id_seq'::regclass);


--
-- TOC entry 2133 (class 2604 OID 150784)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_municipios ALTER COLUMN id SET DEFAULT nextval('sab_cat_municipios_id_seq'::regclass);


--
-- TOC entry 2136 (class 2604 OID 150785)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_tipoestablecimientos ALTER COLUMN id SET DEFAULT nextval('sab_cat_tipoestablecimientos_id_seq'::regclass);


--
-- TOC entry 2139 (class 2604 OID 150786)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_zonas ALTER COLUMN id SET DEFAULT nextval('sab_cat_zonas_id_seq'::regclass);


--
-- TOC entry 2145 (class 2606 OID 150788)
-- Name: PK_alias_municipio; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_alias_municipio
    ADD CONSTRAINT "PK_alias_municipio" PRIMARY KEY (id_siap, id_sinab);


--
-- TOC entry 2182 (class 2606 OID 150790)
-- Name: PK_existenciashistoricas; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciahistorica
    ADD CONSTRAINT "PK_existenciashistoricas" PRIMARY KEY (id);


--
-- TOC entry 2141 (class 2606 OID 151615)
-- Name: ctl_abastecimiento_id_producto_id_establecimiento_mes_anyo; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_abastecimiento
    ADD CONSTRAINT ctl_abastecimiento_id_producto_id_establecimiento_mes_anyo UNIQUE (id_producto, id_establecimiento, mes, anyo);


--
-- TOC entry 2167 (class 2606 OID 151617)
-- Name: farm_medicinarecetada_idestablecimiento_secuencia_local; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinarecetada
    ADD CONSTRAINT farm_medicinarecetada_idestablecimiento_secuencia_local UNIQUE (idestablecimiento, secuencia_local);


--
-- TOC entry 2178 (class 2606 OID 150792)
-- Name: mnt_farmacia_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_farmacia
    ADD CONSTRAINT mnt_farmacia_pkey PRIMARY KEY (id);


--
-- TOC entry 2180 (class 2606 OID 150794)
-- Name: mnt_grupoterapeutico_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico
    ADD CONSTRAINT mnt_grupoterapeutico_pkey PRIMARY KEY (id);


--
-- TOC entry 2143 (class 2606 OID 150796)
-- Name: pk_abastecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_abastecimiento
    ADD CONSTRAINT pk_abastecimiento PRIMARY KEY (id);


--
-- TOC entry 2188 (class 2606 OID 150798)
-- Name: pk_almacen_estabecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenesestablecimientos
    ADD CONSTRAINT pk_almacen_estabecimiento PRIMARY KEY (id);


--
-- TOC entry 2190 (class 2606 OID 150800)
-- Name: pk_alternativa; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_alternativasproducto
    ADD CONSTRAINT pk_alternativa PRIMARY KEY (id);


--
-- TOC entry 2149 (class 2606 OID 150802)
-- Name: pk_ctl_departamento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT pk_ctl_departamento PRIMARY KEY (id);


--
-- TOC entry 2151 (class 2606 OID 150804)
-- Name: pk_ctl_establecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT pk_ctl_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2153 (class 2606 OID 150806)
-- Name: pk_ctl_institucion; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT pk_ctl_institucion PRIMARY KEY (id);


--
-- TOC entry 2155 (class 2606 OID 150808)
-- Name: pk_ctl_municipio; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio
    ADD CONSTRAINT pk_ctl_municipio PRIMARY KEY (id);


--
-- TOC entry 2157 (class 2606 OID 150810)
-- Name: pk_ctl_pais; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_pais
    ADD CONSTRAINT pk_ctl_pais PRIMARY KEY (id);


--
-- TOC entry 2159 (class 2606 OID 150812)
-- Name: pk_ctl_tipo_establecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento
    ADD CONSTRAINT pk_ctl_tipo_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2165 (class 2606 OID 150814)
-- Name: pk_existencia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT pk_existencia PRIMARY KEY (id);


--
-- TOC entry 2184 (class 2606 OID 150816)
-- Name: pk_existencia_almacen_sinab; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciasalmacenes
    ADD CONSTRAINT pk_existencia_almacen_sinab PRIMARY KEY (id);


--
-- TOC entry 2173 (class 2606 OID 150818)
-- Name: pk_idarea; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT pk_idarea PRIMARY KEY (id);


--
-- TOC entry 2163 (class 2606 OID 150820)
-- Name: pk_idlote; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_lotes
    ADD CONSTRAINT pk_idlote PRIMARY KEY (id);


--
-- TOC entry 2161 (class 2606 OID 150822)
-- Name: pk_idmedicina; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT pk_idmedicina PRIMARY KEY (id);


--
-- TOC entry 2169 (class 2606 OID 150824)
-- Name: pk_idmedicinarecetada; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinarecetada
    ADD CONSTRAINT pk_idmedicinarecetada PRIMARY KEY (id);


--
-- TOC entry 2176 (class 2606 OID 150826)
-- Name: pk_idrelacion; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT pk_idrelacion PRIMARY KEY (idrelacion);


--
-- TOC entry 2171 (class 2606 OID 150828)
-- Name: pk_idunidadmedida; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas
    ADD CONSTRAINT pk_idunidadmedida PRIMARY KEY (id);


--
-- TOC entry 2192 (class 2606 OID 150830)
-- Name: pk_sabcatproductos; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_catalogoproductos
    ADD CONSTRAINT pk_sabcatproductos PRIMARY KEY (idpro);


--
-- TOC entry 2186 (class 2606 OID 150832)
-- Name: sab_cat_almacenes_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenes
    ADD CONSTRAINT sab_cat_almacenes_pkey PRIMARY KEY (id);


--
-- TOC entry 2194 (class 2606 OID 150834)
-- Name: sab_cat_departamentos_codigodepartamento_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_departamentos
    ADD CONSTRAINT sab_cat_departamentos_codigodepartamento_key UNIQUE (codigodepartamento);


--
-- TOC entry 2196 (class 2606 OID 150836)
-- Name: sab_cat_departamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_departamentos
    ADD CONSTRAINT sab_cat_departamentos_pkey PRIMARY KEY (id);


--
-- TOC entry 2198 (class 2606 OID 150838)
-- Name: sab_cat_establecimientos_codigoestablecimiento_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_codigoestablecimiento_key UNIQUE (codigoestablecimiento);


--
-- TOC entry 2201 (class 2606 OID 150840)
-- Name: sab_cat_establecimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2203 (class 2606 OID 150842)
-- Name: sab_cat_instituciones_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_instituciones
    ADD CONSTRAINT sab_cat_instituciones_pkey PRIMARY KEY (id);


--
-- TOC entry 2206 (class 2606 OID 150844)
-- Name: sab_cat_municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_municipios
    ADD CONSTRAINT sab_cat_municipios_pkey PRIMARY KEY (id);


--
-- TOC entry 2208 (class 2606 OID 150846)
-- Name: sab_cat_subgrupos_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_subgrupos
    ADD CONSTRAINT sab_cat_subgrupos_pkey PRIMARY KEY (id);


--
-- TOC entry 2210 (class 2606 OID 150848)
-- Name: sab_cat_tipoestablecimientos_nombrecorto_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_tipoestablecimientos
    ADD CONSTRAINT sab_cat_tipoestablecimientos_nombrecorto_key UNIQUE (nombrecorto);


--
-- TOC entry 2212 (class 2606 OID 150850)
-- Name: sab_cat_tipoestablecimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_tipoestablecimientos
    ADD CONSTRAINT sab_cat_tipoestablecimientos_pkey PRIMARY KEY (id);


--
-- TOC entry 2214 (class 2606 OID 150852)
-- Name: sab_cat_unidadmedidas_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_unidadmedidas
    ADD CONSTRAINT sab_cat_unidadmedidas_pkey PRIMARY KEY (id);


--
-- TOC entry 2216 (class 2606 OID 150854)
-- Name: sab_cat_zonas_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_zonas
    ADD CONSTRAINT sab_cat_zonas_pkey PRIMARY KEY (id);


--
-- TOC entry 2147 (class 2606 OID 150858)
-- Name: un_id_siap; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_alias_municipio
    ADD CONSTRAINT un_id_siap UNIQUE (id_siap);


--
-- TOC entry 2174 (class 1259 OID 151045)
-- Name: fki_establecimiento; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_establecimiento ON mnt_areafarmaciaxestablecimiento USING btree (idestablecimiento);


--
-- TOC entry 2199 (class 1259 OID 150859)
-- Name: sab_cat_establecimientos_ix_sab_cat_establecimientos; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sab_cat_establecimientos_ix_sab_cat_establecimientos ON sab_cat_establecimientos USING btree (idpadre, nivel);


--
-- TOC entry 2204 (class 1259 OID 150860)
-- Name: sab_cat_municipios_ix_municipios; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sab_cat_municipios_ix_municipios ON sab_cat_municipios USING btree (id_departamento, codigomunicipio);


--
-- TOC entry 2217 (class 2606 OID 150861)
-- Name: ctl_abastecimiento_id_establecimiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_abastecimiento
    ADD CONSTRAINT ctl_abastecimiento_id_establecimiento_fkey FOREIGN KEY (id_establecimiento) REFERENCES ctl_establecimiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2218 (class 2606 OID 150866)
-- Name: ctl_abastecimiento_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_abastecimiento
    ADD CONSTRAINT ctl_abastecimiento_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES farm_catalogoproductos(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2219 (class 2606 OID 150871)
-- Name: ctl_alias_municipio_id_siap_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_alias_municipio
    ADD CONSTRAINT ctl_alias_municipio_id_siap_fkey FOREIGN KEY (id_siap) REFERENCES ctl_municipio(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2220 (class 2606 OID 150876)
-- Name: ctl_alias_municipio_id_sinab_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_alias_municipio
    ADD CONSTRAINT ctl_alias_municipio_id_sinab_fkey FOREIGN KEY (id_sinab) REFERENCES sab_cat_municipios(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2226 (class 2606 OID 150881)
-- Name: fk_3123f0d4f57d32fd; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT fk_3123f0d4f57d32fd FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2230 (class 2606 OID 150886)
-- Name: fk_areafarmacia_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_areafarmacia_medicinaexistenciaxarea FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2231 (class 2606 OID 150891)
-- Name: fk_catalogoproductos_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_catalogoproductos_medicinaexistenciaxarea FOREIGN KEY (idmedicina) REFERENCES farm_catalogoproductos(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2232 (class 2606 OID 150896)
-- Name: fk_catalogoproductos_medicinarecetada ; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinarecetada
    ADD CONSTRAINT "fk_catalogoproductos_medicinarecetada " FOREIGN KEY (idmedicina) REFERENCES farm_catalogoproductos(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2223 (class 2606 OID 150901)
-- Name: fk_ctl_institucion_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_ctl_institucion_establecimiento FOREIGN KEY (id_institucion) REFERENCES ctl_institucion(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2227 (class 2606 OID 150906)
-- Name: fk_departamento_municipio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio
    ADD CONSTRAINT fk_departamento_municipio FOREIGN KEY (id_departamento) REFERENCES ctl_departamento(id);


--
-- TOC entry 2221 (class 2606 OID 150911)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (id_establecimiento_region) REFERENCES ctl_establecimiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2233 (class 2606 OID 150916)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinarecetada
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (idestablecimiento) REFERENCES ctl_establecimiento(id) MATCH FULL ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2241 (class 2606 OID 150921)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenesestablecimientos
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (id_establecimiento) REFERENCES sab_cat_establecimientos(id) MATCH FULL ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2236 (class 2606 OID 151040)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (idestablecimiento) REFERENCES ctl_establecimiento(id);


--
-- TOC entry 2224 (class 2606 OID 150926)
-- Name: fk_establecimiento_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_establecimiento_establecimiento FOREIGN KEY (id_establecimiento_padre) REFERENCES ctl_establecimiento(id);


--
-- TOC entry 2228 (class 2606 OID 150936)
-- Name: fk_farm_unidadmedidas_farm_catalogoproductos ; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT "fk_farm_unidadmedidas_farm_catalogoproductos " FOREIGN KEY (idunidadmedida) REFERENCES farm_unidadmedidas(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2235 (class 2606 OID 150941)
-- Name: fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2234 (class 2606 OID 150946)
-- Name: fk_mnt_farmacia_mnt_areafarmacia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT fk_mnt_farmacia_mnt_areafarmacia FOREIGN KEY (idfarmacia) REFERENCES mnt_farmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2229 (class 2606 OID 150951)
-- Name: fk_mnt_grupoterapeutico_farm_catalogoproductos; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT fk_mnt_grupoterapeutico_farm_catalogoproductos FOREIGN KEY (idterapeutico) REFERENCES mnt_grupoterapeutico(id);


--
-- TOC entry 2225 (class 2606 OID 150956)
-- Name: fk_municipio_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_municipio_establecimiento FOREIGN KEY (id_municipio) REFERENCES ctl_municipio(id);


--
-- TOC entry 2222 (class 2606 OID 150961)
-- Name: fk_pais_departamento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_pais_departamento FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2237 (class 2606 OID 150966)
-- Name: sab_alm_existenciahistorica_id_almacen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciahistorica
    ADD CONSTRAINT sab_alm_existenciahistorica_id_almacen_fkey FOREIGN KEY (id_almacen) REFERENCES sab_cat_almacenes(id);


--
-- TOC entry 2238 (class 2606 OID 150971)
-- Name: sab_alm_existenciahistorica_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciahistorica
    ADD CONSTRAINT sab_alm_existenciahistorica_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES sab_cat_catalogoproductos(idpro);


--
-- TOC entry 2239 (class 2606 OID 150976)
-- Name: sab_alm_existenciasalmacenes_id_almacen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciasalmacenes
    ADD CONSTRAINT sab_alm_existenciasalmacenes_id_almacen_fkey FOREIGN KEY (id_almacen) REFERENCES sab_cat_almacenes(id);


--
-- TOC entry 2240 (class 2606 OID 150981)
-- Name: sab_alm_existenciasalmacenes_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_alm_existenciasalmacenes
    ADD CONSTRAINT sab_alm_existenciasalmacenes_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES sab_cat_catalogoproductos(idpro);


--
-- TOC entry 2242 (class 2606 OID 150986)
-- Name: sab_cat_almacenesestablecimientos_id_almacen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_almacenesestablecimientos
    ADD CONSTRAINT sab_cat_almacenesestablecimientos_id_almacen_fkey FOREIGN KEY (id_almacen) REFERENCES sab_cat_almacenes(id);


--
-- TOC entry 2243 (class 2606 OID 150991)
-- Name: sab_cat_alternativasproducto_id_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_alternativasproducto
    ADD CONSTRAINT sab_cat_alternativasproducto_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES sab_cat_catalogoproductos(idpro);


--
-- TOC entry 2244 (class 2606 OID 150996)
-- Name: sab_cat_alternativasproducto_idalternativa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_alternativasproducto
    ADD CONSTRAINT sab_cat_alternativasproducto_idalternativa_fkey FOREIGN KEY (id) REFERENCES sab_cat_catalogoproductos(idpro);


--
-- TOC entry 2245 (class 2606 OID 151001)
-- Name: sab_cat_establecimientos_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES ctl_municipio(id);


--
-- TOC entry 2246 (class 2606 OID 151006)
-- Name: sab_cat_establecimientos_idinstitucion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_idinstitucion_fkey FOREIGN KEY (id_institucion) REFERENCES sab_cat_instituciones(id);


--
-- TOC entry 2247 (class 2606 OID 151011)
-- Name: sab_cat_establecimientos_idpadre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_idpadre_fkey FOREIGN KEY (idpadre) REFERENCES sab_cat_establecimientos(id);


--
-- TOC entry 2248 (class 2606 OID 151016)
-- Name: sab_cat_establecimientos_idtipoestablecimiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_idtipoestablecimiento_fkey FOREIGN KEY (id_tipoestablecimiento) REFERENCES sab_cat_tipoestablecimientos(id);


--
-- TOC entry 2249 (class 2606 OID 151021)
-- Name: sab_cat_establecimientos_idzona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_establecimientos
    ADD CONSTRAINT sab_cat_establecimientos_idzona_fkey FOREIGN KEY (id_zona) REFERENCES sab_cat_zonas(id);


--
-- TOC entry 2250 (class 2606 OID 151026)
-- Name: sab_cat_municipios_iddepartamento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY sab_cat_municipios
    ADD CONSTRAINT sab_cat_municipios_iddepartamento_fkey FOREIGN KEY (id_departamento) REFERENCES sab_cat_departamentos(id);


-- Completed on 2016-07-04 22:21:55 CST

--
-- PostgreSQL database dump complete
--

