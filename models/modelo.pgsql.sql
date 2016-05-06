--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.6
-- Dumped by pg_dump version 9.4.6
-- Started on 2016-05-06 11:16:07 CST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 2200)
-- Name: public-old; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA "public-old";


--
-- TOC entry 2306 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA "public-old"; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA "public-old" IS 'standard public schema';


--
-- TOC entry 1 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2307 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_with_oids = false;

--
-- TOC entry 202 (class 1259 OID 88277)
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
-- TOC entry 2308 (class 0 OID 0)
-- Dependencies: 202
-- Name: TABLE ctl_departamento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_departamento IS 'Lista de los departamentos que conforman un pais';


--
-- TOC entry 2309 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id IS 'Llave primaria';


--
-- TOC entry 2310 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.nombre IS 'Nombre del departamento';


--
-- TOC entry 2311 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.codigo_cnr; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.codigo_cnr IS 'Codigo asignado por la Digestyc para un departamento en especifico';


--
-- TOC entry 2312 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.abreviatura; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.abreviatura IS 'Abreviatura asignada al departamento';


--
-- TOC entry 2313 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.id_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_pais IS 'Representa la llave foranea que proviene de ctl_pais';


--
-- TOC entry 2314 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.id_establecimiento_region; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_establecimiento_region IS 'Foránea que representa el la región a la que pertenece administrativamente el departamento';


--
-- TOC entry 2315 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN ctl_departamento.iso31662; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_departamento.iso31662 IS 'Código de departamento según norma ISO 3166-2 ';


--
-- TOC entry 203 (class 1259 OID 88280)
-- Name: ctl_departamento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_departamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2316 (class 0 OID 0)
-- Dependencies: 203
-- Name: ctl_departamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_departamento_id_seq OWNED BY ctl_departamento.id;


--
-- TOC entry 204 (class 1259 OID 88282)
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
    tiempoprevioalacita integer
);


--
-- TOC entry 2317 (class 0 OID 0)
-- Dependencies: 204
-- Name: TABLE ctl_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2318 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2319 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.id_tipo_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_tipo_establecimiento IS 'Llave foránea del tipo de establecimiento';


--
-- TOC entry 2320 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.nombre IS 'Nombre del establecimiento de salud';


--
-- TOC entry 2321 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.direccion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.direccion IS 'Lugar físico del establecimiento';


--
-- TOC entry 2322 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.telefono; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.telefono IS 'Teléfono de contacto del establecimiento';


--
-- TOC entry 2323 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.fax; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.fax IS 'Fax del establecimiento';


--
-- TOC entry 2324 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.latitud; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.latitud IS 'Coordenadas de latitud para sistema georeferencial';


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.longitud; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.longitud IS 'Coordenadas de longitud para sistema georeferencial';


--
-- TOC entry 2326 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.id_municipio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_municipio IS 'Llave foránea del municipio al que pertenece el establecimiento';


--
-- TOC entry 2327 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.id_nivel_minsal; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_nivel_minsal IS 'Representa el nivel del establecimiento, pueden ser 1,2,3';


--
-- TOC entry 2328 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.cod_ucsf; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.cod_ucsf IS 'Código asignados a la Unidad Comunitaria de Salud Familiar.';


--
-- TOC entry 2329 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.activo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.activo IS 'Estado del establecimiento';


--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.id_establecimiento_padre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_establecimiento_padre IS 'Llave foránea del establecimiento que es su supervisor';


--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.tipo_expediente; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_expediente IS 'Los tipos de expedientes son: G = Utiliza guión (xxx-xx); I = Infinito';


--
-- TOC entry 2332 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.configurado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.configurado IS 'Determina cual es el establecimiento que esta configurado ';


--
-- TOC entry 2333 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.tipo_farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_farmacia IS 'Representa el tipo de farmacia que opera en el establecimiento';


--
-- TOC entry 2334 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.dias_intermedios_citas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.dias_intermedios_citas IS 'Variable que determina entre cuantos dias se puede dejar una cita';


--
-- TOC entry 2335 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.citas_sin_expediente; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.citas_sin_expediente IS 'Campo que determina si el establecimiento puede dejar citas sin expedientes. Generalmente cuando es por telefono';


--
-- TOC entry 2336 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.tipo_impresion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_impresion IS 'Tipo de impresión para citas 1-comprobante , 2- ticket';


--
-- TOC entry 2337 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.minutoshora; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.minutoshora IS '1:si son minutos, 2: si es hora';


--
-- TOC entry 2338 (class 0 OID 0)
-- Dependencies: 204
-- Name: COLUMN ctl_establecimiento.tiempoprevioalacita; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tiempoprevioalacita IS 'Tiempo previo que el paciente debe presentarse a su cita';


--
-- TOC entry 205 (class 1259 OID 88287)
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 205
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_establecimiento_id_seq OWNED BY ctl_establecimiento.id;


--
-- TOC entry 206 (class 1259 OID 88289)
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
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 206
-- Name: TABLE ctl_institucion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_institucion IS 'Catálogo que contiene las instituciones  utilizadas en los sistemas de salud';


--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 206
-- Name: COLUMN ctl_institucion.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id IS 'Identificador código maestro institución';


--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 206
-- Name: COLUMN ctl_institucion.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.nombre IS 'Descripción nombre de la Institución';


--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 206
-- Name: COLUMN ctl_institucion.id_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id_pais IS 'Identificador pais al que pertenece la institución';


--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 206
-- Name: COLUMN ctl_institucion.logo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.logo IS 'nombre archivo de imagen utilizada como logo de la institución';


--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 206
-- Name: COLUMN ctl_institucion.sigla; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_institucion.sigla IS 'Sigla de la institución';


--
-- TOC entry 207 (class 1259 OID 88292)
-- Name: ctl_institucion_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_institucion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 207
-- Name: ctl_institucion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_institucion_id_seq OWNED BY ctl_institucion.id;


--
-- TOC entry 208 (class 1259 OID 88294)
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
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 208
-- Name: TABLE ctl_municipio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_municipio IS 'Lista de los municipios que conforman un departamento';


--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN ctl_municipio.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id IS 'Llave primaria';


--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN ctl_municipio.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.nombre IS 'Nombre del municipio';


--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN ctl_municipio.codigo_cnr; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.codigo_cnr IS 'Codigo asignado por la Digestyc para un municipio en especifico';


--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN ctl_municipio.abreviatura; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.abreviatura IS 'Abreviatura asignada al municipio';


--
-- TOC entry 2352 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN ctl_municipio.id_departamento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id_departamento IS 'Representa la llave foranea que proviene de ctl_departamento';


--
-- TOC entry 209 (class 1259 OID 88297)
-- Name: ctl_municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2353 (class 0 OID 0)
-- Dependencies: 209
-- Name: ctl_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_municipio_id_seq OWNED BY ctl_municipio.id;


--
-- TOC entry 210 (class 1259 OID 88299)
-- Name: ctl_pais; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_pais (
    id integer NOT NULL,
    nombre character varying(150),
    activo boolean
);


--
-- TOC entry 2354 (class 0 OID 0)
-- Dependencies: 210
-- Name: TABLE ctl_pais; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_pais IS 'Lista del pais originario del paciente';


--
-- TOC entry 2355 (class 0 OID 0)
-- Dependencies: 210
-- Name: COLUMN ctl_pais.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.id IS 'Llave primaria';


--
-- TOC entry 2356 (class 0 OID 0)
-- Dependencies: 210
-- Name: COLUMN ctl_pais.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.nombre IS 'Nombre del pais';


--
-- TOC entry 2357 (class 0 OID 0)
-- Dependencies: 210
-- Name: COLUMN ctl_pais.activo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_pais.activo IS 'Si el país está activo para ser presentado en las aplicaciones del sistema';


--
-- TOC entry 211 (class 1259 OID 88302)
-- Name: ctl_pais_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_pais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2358 (class 0 OID 0)
-- Dependencies: 211
-- Name: ctl_pais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_pais_id_seq OWNED BY ctl_pais.id;


--
-- TOC entry 212 (class 1259 OID 88304)
-- Name: ctl_tipo_establecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE ctl_tipo_establecimiento (
    id integer NOT NULL,
    nombre character varying(150),
    codigo character varying(6),
    id_institucion integer
);


--
-- TOC entry 2359 (class 0 OID 0)
-- Dependencies: 212
-- Name: TABLE ctl_tipo_establecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE ctl_tipo_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2360 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN ctl_tipo_establecimiento.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2361 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN ctl_tipo_establecimiento.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.nombre IS 'Nombre del tipo de establecimiento';


--
-- TOC entry 2362 (class 0 OID 0)
-- Dependencies: 212
-- Name: COLUMN ctl_tipo_establecimiento.codigo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.codigo IS 'Código que distingue al tipo establecimiento';


--
-- TOC entry 213 (class 1259 OID 88307)
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE ctl_tipo_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2363 (class 0 OID 0)
-- Dependencies: 213
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE ctl_tipo_establecimiento_id_seq OWNED BY ctl_tipo_establecimiento.id;


--
-- TOC entry 214 (class 1259 OID 88309)
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
-- TOC entry 2364 (class 0 OID 0)
-- Dependencies: 214
-- Name: TABLE farm_catalogoproductos; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_catalogoproductos IS 'Catalogo general de medicamentos';


--
-- TOC entry 2365 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.id IS 'Llave de la tabla';


--
-- TOC entry 2366 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.codigo; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigo IS 'codigo compuesto del medicamento';


--
-- TOC entry 2367 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idtipoproducto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idtipoproducto IS 'tipo de producto';


--
-- TOC entry 2368 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idunidadmedida; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idunidadmedida IS 'pk foranea de la tabla farm_unidadmedida';


--
-- TOC entry 2369 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.nombre; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.nombre IS 'Nombre del medicamento';


--
-- TOC entry 2370 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.niveluso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.niveluso IS 'Nivel de uso del medicamento';


--
-- TOC entry 2371 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.concentracion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.concentracion IS 'concentracion del medicamento';


--
-- TOC entry 2372 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.formafarmaceutica; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.formafarmaceutica IS 'forma farmauceituca del medicamto';


--
-- TOC entry 2373 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.presentacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.presentacion IS 'Presentacion del medicamento';


--
-- TOC entry 2374 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.prioridad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.prioridad IS 'prioridad del medicamento';


--
-- TOC entry 2375 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.precioactual; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.precioactual IS 'El precio actual del medicamento. Proviene de SINAB';


--
-- TOC entry 2376 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.aplicalote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aplicalote IS 'Provienen de SINAB';


--
-- TOC entry 2377 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.existenciaactual; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.existenciaactual IS 'Provienen de SINAB';


--
-- TOC entry 2378 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.especificacionestecnicas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.especificacionestecnicas IS 'Provienen de SINAB';


--
-- TOC entry 2379 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.codigonacionesunidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigonacionesunidas IS 'Provienen de SINAB';


--
-- TOC entry 2380 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.pertenecelistadooficial; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.pertenecelistadooficial IS 'Provienen de SINAB';


--
-- TOC entry 2381 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.estadoproducto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estadoproducto IS 'Provienen de SINAB';


--
-- TOC entry 2382 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.observacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.observacion IS 'Provienen de SINAB';


--
-- TOC entry 2383 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.auusuariocreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariocreacion IS 'Provienen de SINAB';


--
-- TOC entry 2384 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.aufechacreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechacreacion IS 'Provienen de SINAB';


--
-- TOC entry 2385 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.auusuariomodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariomodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2386 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.aufechamodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechamodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2387 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.estasincronizada; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estasincronizada IS 'Provienen de SINAB';


--
-- TOC entry 2388 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestablecimiento IS 'Provienen de SINAB';


--
-- TOC entry 2389 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.clasificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.clasificacion IS 'Provienen de SINAB';


--
-- TOC entry 2390 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.areatecnica; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.areatecnica IS 'Provienen de SINAB';


--
-- TOC entry 2391 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.tipouaci; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.tipouaci IS 'Provienen de SINAB';


--
-- TOC entry 2392 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idespecificogasto; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idespecificogasto IS 'Provienen de SINAB';


--
-- TOC entry 2393 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.ultimoprecio; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.ultimoprecio IS 'Provienen de SINAB';


--
-- TOC entry 2394 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idterapeutico IS 'Provienen de SINAB';


--
-- TOC entry 2395 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.idestado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestado IS 'Estado del Medicamento ''H''=Habilitado ''I''=Inhabilitado';


--
-- TOC entry 2396 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.divisormedicina; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.divisormedicina IS 'Cantidad de pastillas contenidas en cada Frasco';


--
-- TOC entry 2397 (class 0 OID 0)
-- Dependencies: 214
-- Name: COLUMN farm_catalogoproductos.cuantificable; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.cuantificable IS 'Bandera que permite saber si un medicamento es cuantificable 0: No es cuantificable, 1: Es cuantificable';


--
-- TOC entry 215 (class 1259 OID 88323)
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_catalogoproductos_idmedicina_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2398 (class 0 OID 0)
-- Dependencies: 215
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_catalogoproductos_idmedicina_seq OWNED BY farm_catalogoproductos.id;


--
-- TOC entry 216 (class 1259 OID 88325)
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
-- TOC entry 2399 (class 0 OID 0)
-- Dependencies: 216
-- Name: TABLE farm_lotes; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_lotes IS 'Codigo de lotes ingresados al sistema';


--
-- TOC entry 2400 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.id IS 'Llave primaria de la tabla';


--
-- TOC entry 2401 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.lote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.lote IS 'Codigo del lote';


--
-- TOC entry 2402 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.preciolote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.preciolote IS 'Precio del lote';


--
-- TOC entry 2403 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.fechavencimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.fechavencimiento IS 'Fecha de vencimiento del lote';


--
-- TOC entry 2404 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idestablecimiento IS 'Codigo del establecimiento.';


--
-- TOC entry 2405 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idmodalidad IS 'Indicador de modalidades';


--
-- TOC entry 2406 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.idprocedencia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.idprocedencia IS 'Llave forane del tipo de procedencia del ingreso';


--
-- TOC entry 2407 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.id_trans_ingreso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.id_trans_ingreso IS 'id de la tabla farm_trans_ingresos para saber de donde proviene la existencia del sinab';


--
-- TOC entry 2408 (class 0 OID 0)
-- Dependencies: 216
-- Name: COLUMN farm_lotes.fecha_ingreso; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_lotes.fecha_ingreso IS 'Fecha que ingreso el medicamento segun el vale de SINAB';


--
-- TOC entry 217 (class 1259 OID 88328)
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_lotes_idlote_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2409 (class 0 OID 0)
-- Dependencies: 217
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_lotes_idlote_seq OWNED BY farm_lotes.id;


--
-- TOC entry 218 (class 1259 OID 88330)
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
-- TOC entry 2410 (class 0 OID 0)
-- Dependencies: 218
-- Name: TABLE farm_medicinaexistenciaxarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_medicinaexistenciaxarea IS 'Existencia de medicamento por area de farmacia';


--
-- TOC entry 2411 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.id IS 'Llave primaria de la tabla.';


--
-- TOC entry 2412 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.idmedicina; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmedicina IS 'Llave foranea del catalogo de productos.';


--
-- TOC entry 2413 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.idarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idarea IS 'Llave foranea de areas de farmacia';


--
-- TOC entry 2414 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.existencia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.existencia IS 'Valo numerico de existencia de las areas de farmacia';


--
-- TOC entry 2415 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.idlote; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idlote IS 'Lote, conectado con lotes';


--
-- TOC entry 2416 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idestablecimiento IS 'Codigo de Establecimiento';


--
-- TOC entry 2417 (class 0 OID 0)
-- Dependencies: 218
-- Name: COLUMN farm_medicinaexistenciaxarea.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmodalidad IS 'Indicador de Modalidades';


--
-- TOC entry 219 (class 1259 OID 88333)
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2418 (class 0 OID 0)
-- Dependencies: 219
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq OWNED BY farm_medicinaexistenciaxarea.id;


--
-- TOC entry 220 (class 1259 OID 88335)
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
-- TOC entry 2419 (class 0 OID 0)
-- Dependencies: 220
-- Name: TABLE farm_unidadmedidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE farm_unidadmedidas IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2420 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.id IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2421 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.descripcion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcion IS 'Contiene las siglas de la unidad de medida';


--
-- TOC entry 2422 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.descripcionlarga; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcionlarga IS 'Descripcion de la unidad de medida';


--
-- TOC entry 2423 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.unidadescontenidas; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.unidadescontenidas IS 'Cuantas unidad contiene CTO:100 C/U:1 etc';


--
-- TOC entry 2424 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.cantidaddecimal; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.cantidaddecimal IS 'PROVIENE DE SINAB';


--
-- TOC entry 2425 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.auusuariocreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariocreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2426 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.aufechacreacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechacreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2427 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.auusuariomodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariomodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2428 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.aufechamodificacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechamodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2429 (class 0 OID 0)
-- Dependencies: 220
-- Name: COLUMN farm_unidadmedidas.estasincronizada; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.estasincronizada IS 'PROVIENE DE SINAB';


--
-- TOC entry 221 (class 1259 OID 88338)
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE farm_unidadmedidas_idunidadmedida_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2430 (class 0 OID 0)
-- Dependencies: 221
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE farm_unidadmedidas_idunidadmedida_seq OWNED BY farm_unidadmedidas.id;


--
-- TOC entry 222 (class 1259 OID 88340)
-- Name: mnt_areafarmacia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_areafarmacia (
    id integer NOT NULL,
    area character varying(30) NOT NULL,
    idfarmacia integer NOT NULL,
    habilitado character(1) DEFAULT 'N'::bpchar NOT NULL
);


--
-- TOC entry 2431 (class 0 OID 0)
-- Dependencies: 222
-- Name: TABLE mnt_areafarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_areafarmacia IS 'tabla que contiene las areas que conforman las farmacias';


--
-- TOC entry 2432 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN mnt_areafarmacia.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.id IS 'Llave primaria';


--
-- TOC entry 2433 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN mnt_areafarmacia.area; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.area IS 'Nombre del Area de la Farmacia';


--
-- TOC entry 2434 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN mnt_areafarmacia.idfarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.idfarmacia IS 'Llave foranea de mnt_farmacia';


--
-- TOC entry 2435 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN mnt_areafarmacia.habilitado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.habilitado IS 'S: Habilitado N: No habilitado';


--
-- TOC entry 223 (class 1259 OID 88344)
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_areafarmacia_idarea_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2436 (class 0 OID 0)
-- Dependencies: 223
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_areafarmacia_idarea_seq OWNED BY mnt_areafarmacia.id;


--
-- TOC entry 224 (class 1259 OID 88346)
-- Name: mnt_areafarmaciaxestablecimiento; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_areafarmaciaxestablecimiento (
    idrelacion integer NOT NULL,
    idarea integer NOT NULL,
    habilitado character(1) DEFAULT 'S'::bpchar NOT NULL,
    idestablecimiento integer NOT NULL,
    idmodalidad integer NOT NULL,
    carga_sinab boolean DEFAULT false NOT NULL
);


--
-- TOC entry 2437 (class 0 OID 0)
-- Dependencies: 224
-- Name: TABLE mnt_areafarmaciaxestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_areafarmaciaxestablecimiento IS 'relacion de areas versus establecimiento';


--
-- TOC entry 2438 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idrelacion; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idrelacion IS 'Llave primaria';


--
-- TOC entry 2439 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idarea; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idarea IS 'Area de farmacia';


--
-- TOC entry 2440 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.habilitado; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.habilitado IS 'Estado de Area de farmacia';


--
-- TOC entry 2441 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento IS 'Identificador del establecimiento ';


--
-- TOC entry 2442 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad IS 'Identificador del tipo de modalidad en las que se desenvuelve el establecimiento';


--
-- TOC entry 2443 (class 0 OID 0)
-- Dependencies: 224
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab IS 'define el area de la farmacia por defecto donde se cargara el vale proveniente de SINAB.';


--
-- TOC entry 225 (class 1259 OID 88351)
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2444 (class 0 OID 0)
-- Dependencies: 225
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq OWNED BY mnt_areafarmaciaxestablecimiento.idrelacion;


--
-- TOC entry 226 (class 1259 OID 88353)
-- Name: mnt_farmacia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_farmacia (
    id integer NOT NULL,
    farmacia character varying(50) NOT NULL,
    habilitadofarmacia character(1) DEFAULT 'S'::bpchar NOT NULL
);


--
-- TOC entry 2445 (class 0 OID 0)
-- Dependencies: 226
-- Name: TABLE mnt_farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_farmacia IS 'Nombre de las farmacias existentes en el centro de salud';


--
-- TOC entry 2446 (class 0 OID 0)
-- Dependencies: 226
-- Name: COLUMN mnt_farmacia.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.id IS 'Llave primaria';


--
-- TOC entry 2447 (class 0 OID 0)
-- Dependencies: 226
-- Name: COLUMN mnt_farmacia.farmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.farmacia IS 'Nombre de la Farmacia';


--
-- TOC entry 2448 (class 0 OID 0)
-- Dependencies: 226
-- Name: COLUMN mnt_farmacia.habilitadofarmacia; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.habilitadofarmacia IS 'almacena si esta habilitado farmacia';


--
-- TOC entry 227 (class 1259 OID 88357)
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE mnt_farmacia_idfarmacia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2449 (class 0 OID 0)
-- Dependencies: 227
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE mnt_farmacia_idfarmacia_seq OWNED BY mnt_farmacia.id;


--
-- TOC entry 228 (class 1259 OID 88359)
-- Name: mnt_grupoterapeutico; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE mnt_grupoterapeutico (
    id integer NOT NULL,
    grupoterapeutico character varying(50) NOT NULL
);


--
-- TOC entry 2450 (class 0 OID 0)
-- Dependencies: 228
-- Name: TABLE mnt_grupoterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE mnt_grupoterapeutico IS 'Grup. terapeutico que dividen los medicamentos';


--
-- TOC entry 2451 (class 0 OID 0)
-- Dependencies: 228
-- Name: COLUMN mnt_grupoterapeutico.id; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.id IS 'clave primaria';


--
-- TOC entry 2452 (class 0 OID 0)
-- Dependencies: 228
-- Name: COLUMN mnt_grupoterapeutico.grupoterapeutico; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.grupoterapeutico IS 'Nombre de Grupo Terapeutico';


--
-- TOC entry 229 (class 1259 OID 88362)
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2453 (class 0 OID 0)
-- Dependencies: 229
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq" OWNED BY mnt_grupoterapeutico.id;


SET search_path = "public-old", pg_catalog;

--
-- TOC entry 200 (class 1259 OID 80028)
-- Name: ctl_departamento; Type: TABLE; Schema: public-old; Owner: -
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
-- TOC entry 2454 (class 0 OID 0)
-- Dependencies: 200
-- Name: TABLE ctl_departamento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_departamento IS 'Lista de los departamentos que conforman un pais';


--
-- TOC entry 2455 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id IS 'Llave primaria';


--
-- TOC entry 2456 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.nombre IS 'Nombre del departamento';


--
-- TOC entry 2457 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.codigo_cnr; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.codigo_cnr IS 'Codigo asignado por la Digestyc para un departamento en especifico';


--
-- TOC entry 2458 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.abreviatura; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.abreviatura IS 'Abreviatura asignada al departamento';


--
-- TOC entry 2459 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.id_pais; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_pais IS 'Representa la llave foranea que proviene de ctl_pais';


--
-- TOC entry 2460 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.id_establecimiento_region; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.id_establecimiento_region IS 'Foránea que representa el la región a la que pertenece administrativamente el departamento';


--
-- TOC entry 2461 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN ctl_departamento.iso31662; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_departamento.iso31662 IS 'Código de departamento según norma ISO 3166-2 ';


--
-- TOC entry 201 (class 1259 OID 80031)
-- Name: ctl_departamento_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_departamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2462 (class 0 OID 0)
-- Dependencies: 201
-- Name: ctl_departamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_departamento_id_seq OWNED BY ctl_departamento.id;


--
-- TOC entry 198 (class 1259 OID 79997)
-- Name: ctl_establecimiento; Type: TABLE; Schema: public-old; Owner: -
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
    tiempoprevioalacita integer
);


--
-- TOC entry 2463 (class 0 OID 0)
-- Dependencies: 198
-- Name: TABLE ctl_establecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2464 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2465 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.id_tipo_establecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_tipo_establecimiento IS 'Llave foránea del tipo de establecimiento';


--
-- TOC entry 2466 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.nombre IS 'Nombre del establecimiento de salud';


--
-- TOC entry 2467 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.direccion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.direccion IS 'Lugar físico del establecimiento';


--
-- TOC entry 2468 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.telefono; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.telefono IS 'Teléfono de contacto del establecimiento';


--
-- TOC entry 2469 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.fax; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.fax IS 'Fax del establecimiento';


--
-- TOC entry 2470 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.latitud; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.latitud IS 'Coordenadas de latitud para sistema georeferencial';


--
-- TOC entry 2471 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.longitud; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.longitud IS 'Coordenadas de longitud para sistema georeferencial';


--
-- TOC entry 2472 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.id_municipio; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_municipio IS 'Llave foránea del municipio al que pertenece el establecimiento';


--
-- TOC entry 2473 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.id_nivel_minsal; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_nivel_minsal IS 'Representa el nivel del establecimiento, pueden ser 1,2,3';


--
-- TOC entry 2474 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.cod_ucsf; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.cod_ucsf IS 'Código asignados a la Unidad Comunitaria de Salud Familiar.';


--
-- TOC entry 2475 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.activo; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.activo IS 'Estado del establecimiento';


--
-- TOC entry 2476 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.id_establecimiento_padre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.id_establecimiento_padre IS 'Llave foránea del establecimiento que es su supervisor';


--
-- TOC entry 2477 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.tipo_expediente; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_expediente IS 'Los tipos de expedientes son: G = Utiliza guión (xxx-xx); I = Infinito';


--
-- TOC entry 2478 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.configurado; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.configurado IS 'Determina cual es el establecimiento que esta configurado ';


--
-- TOC entry 2479 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.tipo_farmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_farmacia IS 'Representa el tipo de farmacia que opera en el establecimiento';


--
-- TOC entry 2480 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.dias_intermedios_citas; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.dias_intermedios_citas IS 'Variable que determina entre cuantos dias se puede dejar una cita';


--
-- TOC entry 2481 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.citas_sin_expediente; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.citas_sin_expediente IS 'Campo que determina si el establecimiento puede dejar citas sin expedientes. Generalmente cuando es por telefono';


--
-- TOC entry 2482 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.tipo_impresion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tipo_impresion IS 'Tipo de impresión para citas 1-comprobante , 2- ticket';


--
-- TOC entry 2483 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.minutoshora; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.minutoshora IS '1:si son minutos, 2: si es hora';


--
-- TOC entry 2484 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN ctl_establecimiento.tiempoprevioalacita; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_establecimiento.tiempoprevioalacita IS 'Tiempo previo que el paciente debe presentarse a su cita';


--
-- TOC entry 199 (class 1259 OID 80002)
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2485 (class 0 OID 0)
-- Dependencies: 199
-- Name: ctl_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_establecimiento_id_seq OWNED BY ctl_establecimiento.id;


--
-- TOC entry 174 (class 1259 OID 59988)
-- Name: ctl_institucion; Type: TABLE; Schema: public-old; Owner: -
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
-- TOC entry 2486 (class 0 OID 0)
-- Dependencies: 174
-- Name: TABLE ctl_institucion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_institucion IS 'Catálogo que contiene las instituciones  utilizadas en los sistemas de salud';


--
-- TOC entry 2487 (class 0 OID 0)
-- Dependencies: 174
-- Name: COLUMN ctl_institucion.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id IS 'Identificador código maestro institución';


--
-- TOC entry 2488 (class 0 OID 0)
-- Dependencies: 174
-- Name: COLUMN ctl_institucion.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_institucion.nombre IS 'Descripción nombre de la Institución';


--
-- TOC entry 2489 (class 0 OID 0)
-- Dependencies: 174
-- Name: COLUMN ctl_institucion.id_pais; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_institucion.id_pais IS 'Identificador pais al que pertenece la institución';


--
-- TOC entry 2490 (class 0 OID 0)
-- Dependencies: 174
-- Name: COLUMN ctl_institucion.logo; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_institucion.logo IS 'nombre archivo de imagen utilizada como logo de la institución';


--
-- TOC entry 2491 (class 0 OID 0)
-- Dependencies: 174
-- Name: COLUMN ctl_institucion.sigla; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_institucion.sigla IS 'Sigla de la institución';


--
-- TOC entry 175 (class 1259 OID 59991)
-- Name: ctl_institucion_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_institucion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2492 (class 0 OID 0)
-- Dependencies: 175
-- Name: ctl_institucion_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_institucion_id_seq OWNED BY ctl_institucion.id;


--
-- TOC entry 176 (class 1259 OID 59993)
-- Name: ctl_municipio; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE ctl_municipio (
    id integer NOT NULL,
    nombre character varying(150) NOT NULL,
    codigo_cnr character varying(5),
    abreviatura character varying(5),
    id_departamento integer NOT NULL
);


--
-- TOC entry 2493 (class 0 OID 0)
-- Dependencies: 176
-- Name: TABLE ctl_municipio; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_municipio IS 'Lista de los municipios que conforman un departamento';


--
-- TOC entry 2494 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_municipio.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id IS 'Llave primaria';


--
-- TOC entry 2495 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_municipio.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_municipio.nombre IS 'Nombre del municipio';


--
-- TOC entry 2496 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_municipio.codigo_cnr; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_municipio.codigo_cnr IS 'Codigo asignado por la Digestyc para un municipio en especifico';


--
-- TOC entry 2497 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_municipio.abreviatura; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_municipio.abreviatura IS 'Abreviatura asignada al municipio';


--
-- TOC entry 2498 (class 0 OID 0)
-- Dependencies: 176
-- Name: COLUMN ctl_municipio.id_departamento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_municipio.id_departamento IS 'Representa la llave foranea que proviene de ctl_departamento';


--
-- TOC entry 177 (class 1259 OID 59996)
-- Name: ctl_municipio_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2499 (class 0 OID 0)
-- Dependencies: 177
-- Name: ctl_municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_municipio_id_seq OWNED BY ctl_municipio.id;


--
-- TOC entry 178 (class 1259 OID 59998)
-- Name: ctl_pais; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE ctl_pais (
    id integer NOT NULL,
    nombre character varying(150),
    activo boolean
);


--
-- TOC entry 2500 (class 0 OID 0)
-- Dependencies: 178
-- Name: TABLE ctl_pais; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_pais IS 'Lista del pais originario del paciente';


--
-- TOC entry 2501 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_pais.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_pais.id IS 'Llave primaria';


--
-- TOC entry 2502 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_pais.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_pais.nombre IS 'Nombre del pais';


--
-- TOC entry 2503 (class 0 OID 0)
-- Dependencies: 178
-- Name: COLUMN ctl_pais.activo; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_pais.activo IS 'Si el país está activo para ser presentado en las aplicaciones del sistema';


--
-- TOC entry 179 (class 1259 OID 60001)
-- Name: ctl_pais_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_pais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2504 (class 0 OID 0)
-- Dependencies: 179
-- Name: ctl_pais_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_pais_id_seq OWNED BY ctl_pais.id;


--
-- TOC entry 180 (class 1259 OID 60003)
-- Name: ctl_tipo_establecimiento; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE ctl_tipo_establecimiento (
    id integer NOT NULL,
    nombre character varying(150),
    codigo character varying(6),
    id_institucion integer
);


--
-- TOC entry 2505 (class 0 OID 0)
-- Dependencies: 180
-- Name: TABLE ctl_tipo_establecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE ctl_tipo_establecimiento IS 'Contiene los tipos de establecimiento que conforman el MINSAL';


--
-- TOC entry 2506 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_tipo_establecimiento.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.id IS 'Llave primaria';


--
-- TOC entry 2507 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_tipo_establecimiento.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.nombre IS 'Nombre del tipo de establecimiento';


--
-- TOC entry 2508 (class 0 OID 0)
-- Dependencies: 180
-- Name: COLUMN ctl_tipo_establecimiento.codigo; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN ctl_tipo_establecimiento.codigo IS 'Código que distingue al tipo establecimiento';


--
-- TOC entry 181 (class 1259 OID 60006)
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE ctl_tipo_establecimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2509 (class 0 OID 0)
-- Dependencies: 181
-- Name: ctl_tipo_establecimiento_id_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE ctl_tipo_establecimiento_id_seq OWNED BY ctl_tipo_establecimiento.id;


--
-- TOC entry 182 (class 1259 OID 60008)
-- Name: farm_catalogoproductos; Type: TABLE; Schema: public-old; Owner: -
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
    divisormedicina integer
);


--
-- TOC entry 2510 (class 0 OID 0)
-- Dependencies: 182
-- Name: TABLE farm_catalogoproductos; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE farm_catalogoproductos IS 'Catalogo general de medicamentos';


--
-- TOC entry 2511 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.id IS 'Llave de la tabla';


--
-- TOC entry 2512 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.codigo; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigo IS 'codigo compuesto del medicamento';


--
-- TOC entry 2513 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idtipoproducto; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idtipoproducto IS 'tipo de producto';


--
-- TOC entry 2514 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idunidadmedida; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idunidadmedida IS 'pk foranea de la tabla farm_unidadmedida';


--
-- TOC entry 2515 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.nombre; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.nombre IS 'Nombre del medicamento';


--
-- TOC entry 2516 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.niveluso; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.niveluso IS 'Nivel de uso del medicamento';


--
-- TOC entry 2517 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.concentracion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.concentracion IS 'concentracion del medicamento';


--
-- TOC entry 2518 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.formafarmaceutica; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.formafarmaceutica IS 'forma farmauceituca del medicamto';


--
-- TOC entry 2519 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.presentacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.presentacion IS 'Presentacion del medicamento';


--
-- TOC entry 2520 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.prioridad; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.prioridad IS 'prioridad del medicamento';


--
-- TOC entry 2521 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.precioactual; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.precioactual IS 'El precio actual del medicamento. Proviene de SINAB';


--
-- TOC entry 2522 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.aplicalote; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aplicalote IS 'Provienen de SINAB';


--
-- TOC entry 2523 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.existenciaactual; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.existenciaactual IS 'Provienen de SINAB';


--
-- TOC entry 2524 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.especificacionestecnicas; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.especificacionestecnicas IS 'Provienen de SINAB';


--
-- TOC entry 2525 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.codigonacionesunidas; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.codigonacionesunidas IS 'Provienen de SINAB';


--
-- TOC entry 2526 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.pertenecelistadooficial; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.pertenecelistadooficial IS 'Provienen de SINAB';


--
-- TOC entry 2527 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.estadoproducto; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estadoproducto IS 'Provienen de SINAB';


--
-- TOC entry 2528 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.observacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.observacion IS 'Provienen de SINAB';


--
-- TOC entry 2529 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.auusuariocreacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariocreacion IS 'Provienen de SINAB';


--
-- TOC entry 2530 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.aufechacreacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechacreacion IS 'Provienen de SINAB';


--
-- TOC entry 2531 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.auusuariomodificacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.auusuariomodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2532 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.aufechamodificacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.aufechamodificacion IS 'Provienen de SINAB';


--
-- TOC entry 2533 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.estasincronizada; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.estasincronizada IS 'Provienen de SINAB';


--
-- TOC entry 2534 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idestablecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestablecimiento IS 'Provienen de SINAB';


--
-- TOC entry 2535 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.clasificacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.clasificacion IS 'Provienen de SINAB';


--
-- TOC entry 2536 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.areatecnica; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.areatecnica IS 'Provienen de SINAB';


--
-- TOC entry 2537 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.tipouaci; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.tipouaci IS 'Provienen de SINAB';


--
-- TOC entry 2538 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idespecificogasto; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idespecificogasto IS 'Provienen de SINAB';


--
-- TOC entry 2539 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.ultimoprecio; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.ultimoprecio IS 'Provienen de SINAB';


--
-- TOC entry 2540 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idterapeutico; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idterapeutico IS 'Provienen de SINAB';


--
-- TOC entry 2541 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.idestado; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.idestado IS 'Estado del Medicamento ''H''=Habilitado ''I''=Inhabilitado';


--
-- TOC entry 2542 (class 0 OID 0)
-- Dependencies: 182
-- Name: COLUMN farm_catalogoproductos.divisormedicina; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_catalogoproductos.divisormedicina IS 'Cantidad de pastillas contenidas en cada Frasco';


--
-- TOC entry 183 (class 1259 OID 60021)
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE farm_catalogoproductos_idmedicina_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2543 (class 0 OID 0)
-- Dependencies: 183
-- Name: farm_catalogoproductos_idmedicina_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE farm_catalogoproductos_idmedicina_seq OWNED BY farm_catalogoproductos.id;


--
-- TOC entry 184 (class 1259 OID 60023)
-- Name: farm_lotes; Type: TABLE; Schema: public-old; Owner: -
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
-- TOC entry 2544 (class 0 OID 0)
-- Dependencies: 184
-- Name: TABLE farm_lotes; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE farm_lotes IS 'Codigo de lotes ingresados al sistema';


--
-- TOC entry 2545 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.id IS 'Llave primaria de la tabla';


--
-- TOC entry 2546 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.lote; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.lote IS 'Codigo del lote';


--
-- TOC entry 2547 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.preciolote; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.preciolote IS 'Precio del lote';


--
-- TOC entry 2548 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.fechavencimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.fechavencimiento IS 'Fecha de vencimiento del lote';


--
-- TOC entry 2549 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.idestablecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.idestablecimiento IS 'Codigo del establecimiento.';


--
-- TOC entry 2550 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.idmodalidad; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.idmodalidad IS 'Indicador de modalidades';


--
-- TOC entry 2551 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.idprocedencia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.idprocedencia IS 'Llave forane del tipo de procedencia del ingreso';


--
-- TOC entry 2552 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.id_trans_ingreso; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.id_trans_ingreso IS 'id de la tabla farm_trans_ingresos para saber de donde proviene la existencia del sinab';


--
-- TOC entry 2553 (class 0 OID 0)
-- Dependencies: 184
-- Name: COLUMN farm_lotes.fecha_ingreso; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_lotes.fecha_ingreso IS 'Fecha que ingreso el medicamento segun el vale de SINAB';


--
-- TOC entry 185 (class 1259 OID 60026)
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE farm_lotes_idlote_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2554 (class 0 OID 0)
-- Dependencies: 185
-- Name: farm_lotes_idlote_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE farm_lotes_idlote_seq OWNED BY farm_lotes.id;


--
-- TOC entry 186 (class 1259 OID 60028)
-- Name: farm_medicinaexistenciaxarea; Type: TABLE; Schema: public-old; Owner: -
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
-- TOC entry 2555 (class 0 OID 0)
-- Dependencies: 186
-- Name: TABLE farm_medicinaexistenciaxarea; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE farm_medicinaexistenciaxarea IS 'Existencia de medicamento por area de farmacia';


--
-- TOC entry 2556 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.id IS 'Llave primaria de la tabla.';


--
-- TOC entry 2557 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.idmedicina; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmedicina IS 'Llave foranea del catalogo de productos.';


--
-- TOC entry 2558 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.idarea; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idarea IS 'Llave foranea de areas de farmacia';


--
-- TOC entry 2559 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.existencia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.existencia IS 'Valo numerico de existencia de las areas de farmacia';


--
-- TOC entry 2560 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.idlote; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idlote IS 'Lote, conectado con lotes';


--
-- TOC entry 2561 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.idestablecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idestablecimiento IS 'Codigo de Establecimiento';


--
-- TOC entry 2562 (class 0 OID 0)
-- Dependencies: 186
-- Name: COLUMN farm_medicinaexistenciaxarea.idmodalidad; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_medicinaexistenciaxarea.idmodalidad IS 'Indicador de Modalidades';


--
-- TOC entry 187 (class 1259 OID 60031)
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2563 (class 0 OID 0)
-- Dependencies: 187
-- Name: farm_medicinaexistenciaxarea_idexistencia_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE farm_medicinaexistenciaxarea_idexistencia_seq OWNED BY farm_medicinaexistenciaxarea.id;


--
-- TOC entry 188 (class 1259 OID 60033)
-- Name: farm_unidadmedidas; Type: TABLE; Schema: public-old; Owner: -
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
-- TOC entry 2564 (class 0 OID 0)
-- Dependencies: 188
-- Name: TABLE farm_unidadmedidas; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE farm_unidadmedidas IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2565 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.id IS 'Unidad de medida utilizada para los medicamentos';


--
-- TOC entry 2566 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.descripcion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcion IS 'Contiene las siglas de la unidad de medida';


--
-- TOC entry 2567 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.descripcionlarga; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.descripcionlarga IS 'Descripcion de la unidad de medida';


--
-- TOC entry 2568 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.unidadescontenidas; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.unidadescontenidas IS 'Cuantas unidad contiene CTO:100 C/U:1 etc';


--
-- TOC entry 2569 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.cantidaddecimal; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.cantidaddecimal IS 'PROVIENE DE SINAB';


--
-- TOC entry 2570 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.auusuariocreacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariocreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2571 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.aufechacreacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechacreacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2572 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.auusuariomodificacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.auusuariomodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2573 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.aufechamodificacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.aufechamodificacion IS 'PROVIENE DE SINAB';


--
-- TOC entry 2574 (class 0 OID 0)
-- Dependencies: 188
-- Name: COLUMN farm_unidadmedidas.estasincronizada; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN farm_unidadmedidas.estasincronizada IS 'PROVIENE DE SINAB';


--
-- TOC entry 189 (class 1259 OID 60036)
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE farm_unidadmedidas_idunidadmedida_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2575 (class 0 OID 0)
-- Dependencies: 189
-- Name: farm_unidadmedidas_idunidadmedida_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE farm_unidadmedidas_idunidadmedida_seq OWNED BY farm_unidadmedidas.id;


--
-- TOC entry 190 (class 1259 OID 60038)
-- Name: mnt_areafarmacia; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE mnt_areafarmacia (
    id integer NOT NULL,
    area character varying(30) NOT NULL,
    idfarmacia integer NOT NULL,
    habilitado character(1) DEFAULT 'N'::bpchar NOT NULL
);


--
-- TOC entry 2576 (class 0 OID 0)
-- Dependencies: 190
-- Name: TABLE mnt_areafarmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE mnt_areafarmacia IS 'tabla que contiene las areas que conforman las farmacias';


--
-- TOC entry 2577 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN mnt_areafarmacia.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.id IS 'Llave primaria';


--
-- TOC entry 2578 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN mnt_areafarmacia.area; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.area IS 'Nombre del Area de la Farmacia';


--
-- TOC entry 2579 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN mnt_areafarmacia.idfarmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.idfarmacia IS 'Llave foranea de mnt_farmacia';


--
-- TOC entry 2580 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN mnt_areafarmacia.habilitado; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmacia.habilitado IS 'S: Habilitado N: No habilitado';


--
-- TOC entry 191 (class 1259 OID 60042)
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE mnt_areafarmacia_idarea_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2581 (class 0 OID 0)
-- Dependencies: 191
-- Name: mnt_areafarmacia_idarea_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE mnt_areafarmacia_idarea_seq OWNED BY mnt_areafarmacia.id;


--
-- TOC entry 192 (class 1259 OID 60044)
-- Name: mnt_areafarmaciaxestablecimiento; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE mnt_areafarmaciaxestablecimiento (
    idrelacion integer NOT NULL,
    idarea integer NOT NULL,
    habilitado character(1) DEFAULT 'S'::bpchar NOT NULL,
    idestablecimiento integer NOT NULL,
    idmodalidad integer NOT NULL,
    carga_sinab boolean DEFAULT false NOT NULL
);


--
-- TOC entry 2582 (class 0 OID 0)
-- Dependencies: 192
-- Name: TABLE mnt_areafarmaciaxestablecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE mnt_areafarmaciaxestablecimiento IS 'relacion de areas versus establecimiento';


--
-- TOC entry 2583 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idrelacion; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idrelacion IS 'Llave primaria';


--
-- TOC entry 2584 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idarea; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idarea IS 'Area de farmacia';


--
-- TOC entry 2585 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.habilitado; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.habilitado IS 'Estado de Area de farmacia';


--
-- TOC entry 2586 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idestablecimiento IS 'Identificador del establecimiento ';


--
-- TOC entry 2587 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.idmodalidad IS 'Identificador del tipo de modalidad en las que se desenvuelve el establecimiento';


--
-- TOC entry 2588 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_areafarmaciaxestablecimiento.carga_sinab IS 'define el area de la farmacia por defecto donde se cargara el vale proveniente de SINAB.';


--
-- TOC entry 193 (class 1259 OID 60049)
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2589 (class 0 OID 0)
-- Dependencies: 193
-- Name: mnt_areafarmaciaxestablecimiento_idrelacion_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE mnt_areafarmaciaxestablecimiento_idrelacion_seq OWNED BY mnt_areafarmaciaxestablecimiento.idrelacion;


--
-- TOC entry 194 (class 1259 OID 60051)
-- Name: mnt_farmacia; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE mnt_farmacia (
    id integer NOT NULL,
    farmacia character varying(50) NOT NULL,
    habilitadofarmacia character(1) DEFAULT 'S'::bpchar NOT NULL
);


--
-- TOC entry 2590 (class 0 OID 0)
-- Dependencies: 194
-- Name: TABLE mnt_farmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE mnt_farmacia IS 'Nombre de las farmacias existentes en el centro de salud';


--
-- TOC entry 2591 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN mnt_farmacia.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.id IS 'Llave primaria';


--
-- TOC entry 2592 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN mnt_farmacia.farmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.farmacia IS 'Nombre de la Farmacia';


--
-- TOC entry 2593 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN mnt_farmacia.habilitadofarmacia; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_farmacia.habilitadofarmacia IS 'almacena si esta habilitado farmacia';


--
-- TOC entry 195 (class 1259 OID 60055)
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE mnt_farmacia_idfarmacia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2594 (class 0 OID 0)
-- Dependencies: 195
-- Name: mnt_farmacia_idfarmacia_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE mnt_farmacia_idfarmacia_seq OWNED BY mnt_farmacia.id;


--
-- TOC entry 196 (class 1259 OID 60057)
-- Name: mnt_grupoterapeutico; Type: TABLE; Schema: public-old; Owner: -
--

CREATE TABLE mnt_grupoterapeutico (
    id integer NOT NULL,
    grupoterapeutico character varying(50) NOT NULL
);


--
-- TOC entry 2595 (class 0 OID 0)
-- Dependencies: 196
-- Name: TABLE mnt_grupoterapeutico; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON TABLE mnt_grupoterapeutico IS 'Grup. terapeutico que dividen los medicamentos';


--
-- TOC entry 2596 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN mnt_grupoterapeutico.id; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.id IS 'clave primaria';


--
-- TOC entry 2597 (class 0 OID 0)
-- Dependencies: 196
-- Name: COLUMN mnt_grupoterapeutico.grupoterapeutico; Type: COMMENT; Schema: public-old; Owner: -
--

COMMENT ON COLUMN mnt_grupoterapeutico.grupoterapeutico IS 'Nombre de Grupo Terapeutico';


--
-- TOC entry 197 (class 1259 OID 60060)
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE; Schema: public-old; Owner: -
--

CREATE SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2598 (class 0 OID 0)
-- Dependencies: 197
-- Name: mnt_grupoterapeutico_IdTerapeutico_seq; Type: SEQUENCE OWNED BY; Schema: public-old; Owner: -
--

ALTER SEQUENCE "mnt_grupoterapeutico_IdTerapeutico_seq" OWNED BY mnt_grupoterapeutico.id;


SET search_path = public, pg_catalog;

--
-- TOC entry 2077 (class 2604 OID 88364)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento ALTER COLUMN id SET DEFAULT nextval('ctl_departamento_id_seq'::regclass);


--
-- TOC entry 2078 (class 2604 OID 88365)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_establecimiento_id_seq'::regclass);


--
-- TOC entry 2081 (class 2604 OID 88366)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion ALTER COLUMN id SET DEFAULT nextval('ctl_institucion_id_seq'::regclass);


--
-- TOC entry 2082 (class 2604 OID 88367)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio ALTER COLUMN id SET DEFAULT nextval('ctl_municipio_id_seq'::regclass);


--
-- TOC entry 2083 (class 2604 OID 88368)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_pais ALTER COLUMN id SET DEFAULT nextval('ctl_pais_id_seq'::regclass);


--
-- TOC entry 2084 (class 2604 OID 88369)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_tipo_establecimiento_id_seq'::regclass);


--
-- TOC entry 2085 (class 2604 OID 88370)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos ALTER COLUMN id SET DEFAULT nextval('farm_catalogoproductos_idmedicina_seq'::regclass);


--
-- TOC entry 2094 (class 2604 OID 88371)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_lotes ALTER COLUMN id SET DEFAULT nextval('farm_lotes_idlote_seq'::regclass);


--
-- TOC entry 2095 (class 2604 OID 88372)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea ALTER COLUMN id SET DEFAULT nextval('farm_medicinaexistenciaxarea_idexistencia_seq'::regclass);


--
-- TOC entry 2096 (class 2604 OID 88373)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas ALTER COLUMN id SET DEFAULT nextval('farm_unidadmedidas_idunidadmedida_seq'::regclass);


--
-- TOC entry 2097 (class 2604 OID 88374)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia ALTER COLUMN id SET DEFAULT nextval('mnt_areafarmacia_idarea_seq'::regclass);


--
-- TOC entry 2099 (class 2604 OID 88375)
-- Name: idrelacion; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento ALTER COLUMN idrelacion SET DEFAULT nextval('mnt_areafarmaciaxestablecimiento_idrelacion_seq'::regclass);


--
-- TOC entry 2102 (class 2604 OID 88376)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_farmacia ALTER COLUMN id SET DEFAULT nextval('mnt_farmacia_idfarmacia_seq'::regclass);


--
-- TOC entry 2104 (class 2604 OID 88377)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico ALTER COLUMN id SET DEFAULT nextval('"mnt_grupoterapeutico_IdTerapeutico_seq"'::regclass);


SET search_path = "public-old", pg_catalog;

--
-- TOC entry 2076 (class 2604 OID 80033)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_departamento ALTER COLUMN id SET DEFAULT nextval('ctl_departamento_id_seq'::regclass);


--
-- TOC entry 2073 (class 2604 OID 80004)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_establecimiento_id_seq'::regclass);


--
-- TOC entry 2050 (class 2604 OID 60062)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_institucion ALTER COLUMN id SET DEFAULT nextval('ctl_institucion_id_seq'::regclass);


--
-- TOC entry 2051 (class 2604 OID 60063)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_municipio ALTER COLUMN id SET DEFAULT nextval('ctl_municipio_id_seq'::regclass);


--
-- TOC entry 2052 (class 2604 OID 60064)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_pais ALTER COLUMN id SET DEFAULT nextval('ctl_pais_id_seq'::regclass);


--
-- TOC entry 2053 (class 2604 OID 60065)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento ALTER COLUMN id SET DEFAULT nextval('ctl_tipo_establecimiento_id_seq'::regclass);


--
-- TOC entry 2061 (class 2604 OID 60066)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos ALTER COLUMN id SET DEFAULT nextval('farm_catalogoproductos_idmedicina_seq'::regclass);


--
-- TOC entry 2062 (class 2604 OID 60067)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_lotes ALTER COLUMN id SET DEFAULT nextval('farm_lotes_idlote_seq'::regclass);


--
-- TOC entry 2063 (class 2604 OID 60068)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea ALTER COLUMN id SET DEFAULT nextval('farm_medicinaexistenciaxarea_idexistencia_seq'::regclass);


--
-- TOC entry 2064 (class 2604 OID 60069)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas ALTER COLUMN id SET DEFAULT nextval('farm_unidadmedidas_idunidadmedida_seq'::regclass);


--
-- TOC entry 2066 (class 2604 OID 60070)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia ALTER COLUMN id SET DEFAULT nextval('mnt_areafarmacia_idarea_seq'::regclass);


--
-- TOC entry 2069 (class 2604 OID 60071)
-- Name: idrelacion; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento ALTER COLUMN idrelacion SET DEFAULT nextval('mnt_areafarmaciaxestablecimiento_idrelacion_seq'::regclass);


--
-- TOC entry 2071 (class 2604 OID 60072)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_farmacia ALTER COLUMN id SET DEFAULT nextval('mnt_farmacia_idfarmacia_seq'::regclass);


--
-- TOC entry 2072 (class 2604 OID 60073)
-- Name: id; Type: DEFAULT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico ALTER COLUMN id SET DEFAULT nextval('"mnt_grupoterapeutico_IdTerapeutico_seq"'::regclass);


SET search_path = public, pg_catalog;

--
-- TOC entry 2158 (class 2606 OID 88386)
-- Name: mnt_farmacia_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_farmacia
    ADD CONSTRAINT mnt_farmacia_pkey PRIMARY KEY (id);


--
-- TOC entry 2160 (class 2606 OID 88388)
-- Name: mnt_grupoterapeutico_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico
    ADD CONSTRAINT mnt_grupoterapeutico_pkey PRIMARY KEY (id);


--
-- TOC entry 2134 (class 2606 OID 88390)
-- Name: pk_ctl_departamento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT pk_ctl_departamento PRIMARY KEY (id);


--
-- TOC entry 2136 (class 2606 OID 88392)
-- Name: pk_ctl_establecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT pk_ctl_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2138 (class 2606 OID 88394)
-- Name: pk_ctl_institucion; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT pk_ctl_institucion PRIMARY KEY (id);


--
-- TOC entry 2140 (class 2606 OID 88396)
-- Name: pk_ctl_municipio; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio
    ADD CONSTRAINT pk_ctl_municipio PRIMARY KEY (id);


--
-- TOC entry 2142 (class 2606 OID 88398)
-- Name: pk_ctl_pais; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_pais
    ADD CONSTRAINT pk_ctl_pais PRIMARY KEY (id);


--
-- TOC entry 2144 (class 2606 OID 88400)
-- Name: pk_ctl_tipo_establecimiento; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento
    ADD CONSTRAINT pk_ctl_tipo_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2150 (class 2606 OID 88402)
-- Name: pk_existencia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT pk_existencia PRIMARY KEY (id);


--
-- TOC entry 2154 (class 2606 OID 88404)
-- Name: pk_idarea; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT pk_idarea PRIMARY KEY (id);


--
-- TOC entry 2148 (class 2606 OID 88406)
-- Name: pk_idlote; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_lotes
    ADD CONSTRAINT pk_idlote PRIMARY KEY (id);


--
-- TOC entry 2146 (class 2606 OID 88408)
-- Name: pk_idmedicina; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT pk_idmedicina PRIMARY KEY (id);


--
-- TOC entry 2156 (class 2606 OID 88410)
-- Name: pk_idrelacion; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT pk_idrelacion PRIMARY KEY (idrelacion);


--
-- TOC entry 2152 (class 2606 OID 88412)
-- Name: pk_idunidadmedida; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas
    ADD CONSTRAINT pk_idunidadmedida PRIMARY KEY (id);


SET search_path = "public-old", pg_catalog;

--
-- TOC entry 2126 (class 2606 OID 60075)
-- Name: mnt_farmacia_pkey; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_farmacia
    ADD CONSTRAINT mnt_farmacia_pkey PRIMARY KEY (id);


--
-- TOC entry 2128 (class 2606 OID 60077)
-- Name: mnt_grupoterapeutico_pkey; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_grupoterapeutico
    ADD CONSTRAINT mnt_grupoterapeutico_pkey PRIMARY KEY (id);


--
-- TOC entry 2132 (class 2606 OID 80035)
-- Name: pk_ctl_departamento; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT pk_ctl_departamento PRIMARY KEY (id);


--
-- TOC entry 2130 (class 2606 OID 80006)
-- Name: pk_ctl_establecimiento; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT pk_ctl_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2106 (class 2606 OID 60079)
-- Name: pk_ctl_institucion; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT pk_ctl_institucion PRIMARY KEY (id);


--
-- TOC entry 2108 (class 2606 OID 60081)
-- Name: pk_ctl_municipio; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_municipio
    ADD CONSTRAINT pk_ctl_municipio PRIMARY KEY (id);


--
-- TOC entry 2110 (class 2606 OID 60083)
-- Name: pk_ctl_pais; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_pais
    ADD CONSTRAINT pk_ctl_pais PRIMARY KEY (id);


--
-- TOC entry 2112 (class 2606 OID 60085)
-- Name: pk_ctl_tipo_establecimiento; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_tipo_establecimiento
    ADD CONSTRAINT pk_ctl_tipo_establecimiento PRIMARY KEY (id);


--
-- TOC entry 2118 (class 2606 OID 60087)
-- Name: pk_existencia; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT pk_existencia PRIMARY KEY (id);


--
-- TOC entry 2122 (class 2606 OID 60089)
-- Name: pk_idarea; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT pk_idarea PRIMARY KEY (id);


--
-- TOC entry 2116 (class 2606 OID 60091)
-- Name: pk_idlote; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_lotes
    ADD CONSTRAINT pk_idlote PRIMARY KEY (id);


--
-- TOC entry 2114 (class 2606 OID 60093)
-- Name: pk_idmedicina; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT pk_idmedicina PRIMARY KEY (id);


--
-- TOC entry 2124 (class 2606 OID 60095)
-- Name: pk_idrelacion; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT pk_idrelacion PRIMARY KEY (idrelacion);


--
-- TOC entry 2120 (class 2606 OID 60097)
-- Name: pk_idunidadmedida; Type: CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_unidadmedidas
    ADD CONSTRAINT pk_idunidadmedida PRIMARY KEY (id);


SET search_path = public, pg_catalog;

--
-- TOC entry 2182 (class 2606 OID 88413)
-- Name: fk_3123f0d4f57d32fd; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT fk_3123f0d4f57d32fd FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2186 (class 2606 OID 88418)
-- Name: fk_areafarmacia_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_areafarmacia_medicinaexistenciaxarea FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2187 (class 2606 OID 88423)
-- Name: fk_catalogoproductos_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_catalogoproductos_medicinaexistenciaxarea FOREIGN KEY (idmedicina) REFERENCES farm_catalogoproductos(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2178 (class 2606 OID 88428)
-- Name: fk_ctl_institucion_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_ctl_institucion_establecimiento FOREIGN KEY (id_institucion) REFERENCES ctl_institucion(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2183 (class 2606 OID 88433)
-- Name: fk_departamento_municipio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_municipio
    ADD CONSTRAINT fk_departamento_municipio FOREIGN KEY (id_departamento) REFERENCES ctl_departamento(id);


--
-- TOC entry 2176 (class 2606 OID 88438)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (id_establecimiento_region) REFERENCES ctl_establecimiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2179 (class 2606 OID 88443)
-- Name: fk_establecimiento_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_establecimiento_establecimiento FOREIGN KEY (id_establecimiento_padre) REFERENCES ctl_establecimiento(id);


--
-- TOC entry 2184 (class 2606 OID 88448)
-- Name: fk_farm_unidadmedidas_farm_catalogoproductos ; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT "fk_farm_unidadmedidas_farm_catalogoproductos " FOREIGN KEY (idunidadmedida) REFERENCES farm_unidadmedidas(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2188 (class 2606 OID 88453)
-- Name: fk_lotes_medicinaexistenciaxarea ; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT "fk_lotes_medicinaexistenciaxarea " FOREIGN KEY (idlote) REFERENCES farm_lotes(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2190 (class 2606 OID 88458)
-- Name: fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2189 (class 2606 OID 88463)
-- Name: fk_mnt_farmacia_mnt_areafarmacia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT fk_mnt_farmacia_mnt_areafarmacia FOREIGN KEY (idfarmacia) REFERENCES mnt_farmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2185 (class 2606 OID 88468)
-- Name: fk_mnt_grupoterapeutico_farm_catalogoproductos; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT fk_mnt_grupoterapeutico_farm_catalogoproductos FOREIGN KEY (idterapeutico) REFERENCES mnt_grupoterapeutico(id);


--
-- TOC entry 2180 (class 2606 OID 88473)
-- Name: fk_municipio_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_municipio_establecimiento FOREIGN KEY (id_municipio) REFERENCES ctl_municipio(id);


--
-- TOC entry 2177 (class 2606 OID 88478)
-- Name: fk_pais_departamento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_pais_departamento FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2181 (class 2606 OID 88483)
-- Name: fk_tipo_establecimiento_establecimiento; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_tipo_establecimiento_establecimiento FOREIGN KEY (id_tipo_establecimiento) REFERENCES ctl_tipo_establecimiento(id);


SET search_path = "public-old", pg_catalog;

--
-- TOC entry 2164 (class 2606 OID 80046)
-- Name: farm_medicinaexistenciaxarea_idestablecimiento_fkey; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT farm_medicinaexistenciaxarea_idestablecimiento_fkey FOREIGN KEY (idestablecimiento) REFERENCES ctl_establecimiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2161 (class 2606 OID 60098)
-- Name: fk_3123f0d4f57d32fd; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_institucion
    ADD CONSTRAINT fk_3123f0d4f57d32fd FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2165 (class 2606 OID 60103)
-- Name: fk_areafarmacia_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_areafarmacia_medicinaexistenciaxarea FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2166 (class 2606 OID 60108)
-- Name: fk_catalogoproductos_medicinaexistenciaxarea; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT fk_catalogoproductos_medicinaexistenciaxarea FOREIGN KEY (idmedicina) REFERENCES farm_catalogoproductos(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2170 (class 2606 OID 80007)
-- Name: fk_ctl_institucion_establecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_ctl_institucion_establecimiento FOREIGN KEY (id_institucion) REFERENCES ctl_institucion(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2174 (class 2606 OID 80036)
-- Name: fk_establecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_establecimiento FOREIGN KEY (id_establecimiento_region) REFERENCES ctl_establecimiento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2171 (class 2606 OID 80012)
-- Name: fk_establecimiento_establecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_establecimiento_establecimiento FOREIGN KEY (id_establecimiento_padre) REFERENCES ctl_establecimiento(id);


--
-- TOC entry 2162 (class 2606 OID 60113)
-- Name: fk_farm_unidadmedidas_farm_catalogoproductos ; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT "fk_farm_unidadmedidas_farm_catalogoproductos " FOREIGN KEY (idunidadmedida) REFERENCES farm_unidadmedidas(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2167 (class 2606 OID 60118)
-- Name: fk_lotes_medicinaexistenciaxarea ; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_medicinaexistenciaxarea
    ADD CONSTRAINT "fk_lotes_medicinaexistenciaxarea " FOREIGN KEY (idlote) REFERENCES farm_lotes(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2169 (class 2606 OID 60123)
-- Name: fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmaciaxestablecimiento
    ADD CONSTRAINT fk_mnt_areafarmacia_mnt_areafarmaciaxestablecimiento FOREIGN KEY (idarea) REFERENCES mnt_areafarmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2168 (class 2606 OID 60128)
-- Name: fk_mnt_farmacia_mnt_areafarmacia; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY mnt_areafarmacia
    ADD CONSTRAINT fk_mnt_farmacia_mnt_areafarmacia FOREIGN KEY (idfarmacia) REFERENCES mnt_farmacia(id) MATCH FULL ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2163 (class 2606 OID 60133)
-- Name: fk_mnt_grupoterapeutico_farm_catalogoproductos; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY farm_catalogoproductos
    ADD CONSTRAINT fk_mnt_grupoterapeutico_farm_catalogoproductos FOREIGN KEY (idterapeutico) REFERENCES mnt_grupoterapeutico(id);


--
-- TOC entry 2172 (class 2606 OID 80017)
-- Name: fk_municipio_establecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_municipio_establecimiento FOREIGN KEY (id_municipio) REFERENCES ctl_municipio(id);


--
-- TOC entry 2175 (class 2606 OID 80041)
-- Name: fk_pais_departamento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_departamento
    ADD CONSTRAINT fk_pais_departamento FOREIGN KEY (id_pais) REFERENCES ctl_pais(id);


--
-- TOC entry 2173 (class 2606 OID 80022)
-- Name: fk_tipo_establecimiento_establecimiento; Type: FK CONSTRAINT; Schema: public-old; Owner: -
--

ALTER TABLE ONLY ctl_establecimiento
    ADD CONSTRAINT fk_tipo_establecimiento_establecimiento FOREIGN KEY (id_tipo_establecimiento) REFERENCES ctl_tipo_establecimiento(id);


-- Completed on 2016-05-06 11:16:08 CST

--
-- PostgreSQL database dump complete
--

