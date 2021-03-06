--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: auditor; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE auditor (
    id_auditor integer NOT NULL,
    id_usuario integer NOT NULL,
    descripcion text,
    fecha timestamp without time zone DEFAULT now()
);


ALTER TABLE public.auditor OWNER TO peajetron;

--
-- Name: auditor_id_auditor_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE auditor_id_auditor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auditor_id_auditor_seq OWNER TO peajetron;

--
-- Name: auditor_id_auditor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE auditor_id_auditor_seq OWNED BY auditor.id_auditor;


--
-- Name: categoria; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE categoria (
    id_categoria integer NOT NULL,
    categoria character varying NOT NULL,
    descripcion character varying NOT NULL
);


ALTER TABLE public.categoria OWNER TO peajetron;

--
-- Name: categoria_id_categoria_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE categoria_id_categoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_categoria_seq OWNER TO peajetron;

--
-- Name: categoria_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE categoria_id_categoria_seq OWNED BY categoria.id_categoria;


--
-- Name: cobro; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE cobro (
    id_cobro integer NOT NULL,
    id_vehiculo integer NOT NULL,
    id_usuario_propietario integer NOT NULL,
    id_usuario_registra integer NOT NULL,
    id_peaje integer NOT NULL,
    valor numeric NOT NULL,
    fecha_registro timestamp without time zone DEFAULT now(),
    fecha_pago timestamp without time zone
);


ALTER TABLE public.cobro OWNER TO peajetron;

--
-- Name: cobro_id_cobro_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE cobro_id_cobro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cobro_id_cobro_seq OWNER TO peajetron;

--
-- Name: cobro_id_cobro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE cobro_id_cobro_seq OWNED BY cobro.id_cobro;


--
-- Name: factura; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE factura (
    codigofactura integer NOT NULL,
    "fechaCorte" timestamp without time zone,
    "fechaPagado" timestamp without time zone,
    valor integer NOT NULL,
    id_vehiculo integer,
    id_usuario integer
);


ALTER TABLE public.factura OWNER TO peajetron;

--
-- Name: COLUMN factura."fechaPagado"; Type: COMMENT; Schema: public; Owner: peajetron
--

COMMENT ON COLUMN factura."fechaPagado" IS 'Fecha en que el usuario pago la factura';


--
-- Name: COLUMN factura.valor; Type: COMMENT; Schema: public; Owner: peajetron
--

COMMENT ON COLUMN factura.valor IS 'Valor a pagar de la factura';


--
-- Name: factura_codigofactura_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE factura_codigofactura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factura_codigofactura_seq OWNER TO peajetron;

--
-- Name: factura_codigofactura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE factura_codigofactura_seq OWNED BY factura.codigofactura;


--
-- Name: factura_valor_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE factura_valor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factura_valor_seq OWNER TO peajetron;

--
-- Name: factura_valor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE factura_valor_seq OWNED BY factura.valor;


--
-- Name: historialvehiculo; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE historialvehiculo (
    "idVehiculo" integer NOT NULL,
    "idPeaje" integer NOT NULL,
    fecha timestamp with time zone
);


ALTER TABLE public.historialvehiculo OWNER TO peajetron;

--
-- Name: menu; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE menu (
    id_menu integer NOT NULL,
    id_menu_padre integer,
    menu character varying NOT NULL,
    url character varying NOT NULL,
    icono character varying NOT NULL,
    orden integer
);


ALTER TABLE public.menu OWNER TO peajetron;

--
-- Name: menu_id_menu_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE menu_id_menu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_id_menu_seq OWNER TO peajetron;

--
-- Name: menu_id_menu_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE menu_id_menu_seq OWNED BY menu.id_menu;


--
-- Name: peaje; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE peaje (
    id_peaje integer NOT NULL,
    id_ruta integer NOT NULL,
    peaje character varying NOT NULL,
    latitud numeric NOT NULL,
    longitud numeric NOT NULL,
    address character(50)
);


ALTER TABLE public.peaje OWNER TO peajetron;

--
-- Name: peaje_id_peaje_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE peaje_id_peaje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.peaje_id_peaje_seq OWNER TO peajetron;

--
-- Name: peaje_id_peaje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE peaje_id_peaje_seq OWNED BY peaje.id_peaje;


--
-- Name: perfil; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE perfil (
    id_perfil integer NOT NULL,
    perfil character varying,
    controlador character varying
);


ALTER TABLE public.perfil OWNER TO peajetron;

--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE perfil_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfil_id_perfil_seq OWNER TO peajetron;

--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE perfil_id_perfil_seq OWNED BY perfil.id_perfil;


--
-- Name: perfil_menu; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE perfil_menu (
    id_perfil integer NOT NULL,
    id_menu integer NOT NULL
);


ALTER TABLE public.perfil_menu OWNER TO peajetron;

--
-- Name: pqr; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE pqr (
    id_pqr integer NOT NULL,
    id_pqr_tipo integer NOT NULL,
    id_pqr_estado integer NOT NULL,
    id_usuario_radica integer NOT NULL,
    id_usuario_responde integer NOT NULL,
    pregunta text NOT NULL,
    respuesta text,
    fecha_registro timestamp without time zone DEFAULT now(),
    fecha_respuesta timestamp without time zone
);


ALTER TABLE public.pqr OWNER TO peajetron;

--
-- Name: pqr_estado; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE pqr_estado (
    id_pqr_estado integer NOT NULL,
    pqr_estado character varying NOT NULL
);


ALTER TABLE public.pqr_estado OWNER TO peajetron;

--
-- Name: pqr_estado_id_pqr_estado_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE pqr_estado_id_pqr_estado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pqr_estado_id_pqr_estado_seq OWNER TO peajetron;

--
-- Name: pqr_estado_id_pqr_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE pqr_estado_id_pqr_estado_seq OWNED BY pqr_estado.id_pqr_estado;


--
-- Name: pqr_id_pqr_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE pqr_id_pqr_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pqr_id_pqr_seq OWNER TO peajetron;

--
-- Name: pqr_id_pqr_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE pqr_id_pqr_seq OWNED BY pqr.id_pqr;


--
-- Name: pqr_tipo; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE pqr_tipo (
    id_pqr_tipo integer NOT NULL,
    pqr_tipo character varying NOT NULL
);


ALTER TABLE public.pqr_tipo OWNER TO peajetron;

--
-- Name: pqr_tipo_id_pqr_tipo_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE pqr_tipo_id_pqr_tipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pqr_tipo_id_pqr_tipo_seq OWNER TO peajetron;

--
-- Name: pqr_tipo_id_pqr_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE pqr_tipo_id_pqr_tipo_seq OWNED BY pqr_tipo.id_pqr_tipo;


--
-- Name: pqrs; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE pqrs (
    identificador character varying(20),
    usuarioingresa character varying(10),
    usuarioresponde character varying(10),
    fechaingreso date,
    fechalectura date,
    fecharespuesta date,
    tiposolicitud character varying(10),
    tematerminado bit(1),
    ciudadsolicitud character varying(30),
    mensajepeticion character varying(100),
    mensajerespuesta character varying(100),
    usuarioencargado character varying(10)
);


ALTER TABLE public.pqrs OWNER TO peajetron;

--
-- Name: ruta; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE ruta (
    id_ruta integer NOT NULL,
    ruta character varying NOT NULL
);


ALTER TABLE public.ruta OWNER TO peajetron;

--
-- Name: ruta_id_ruta_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE ruta_id_ruta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ruta_id_ruta_seq OWNER TO peajetron;

--
-- Name: ruta_id_ruta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE ruta_id_ruta_seq OWNED BY ruta.id_ruta;


--
-- Name: tarifa; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE tarifa (
    id_peaje integer NOT NULL,
    id_categoria integer NOT NULL,
    tarifa numeric NOT NULL
);


ALTER TABLE public.tarifa OWNER TO peajetron;

--
-- Name: tipo_documento; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE tipo_documento (
    id_tipo_documento integer NOT NULL,
    tipo_documento character varying NOT NULL
);


ALTER TABLE public.tipo_documento OWNER TO peajetron;

--
-- Name: tipo_documento_id_tipo_documento_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE tipo_documento_id_tipo_documento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_documento_id_tipo_documento_seq OWNER TO peajetron;

--
-- Name: tipo_documento_id_tipo_documento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE tipo_documento_id_tipo_documento_seq OWNED BY tipo_documento.id_tipo_documento;


--
-- Name: ubicacion; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE ubicacion (
    id_ubicacion integer NOT NULL,
    id_ubicacion_padre integer,
    ubicacion character varying NOT NULL
);


ALTER TABLE public.ubicacion OWNER TO peajetron;

--
-- Name: ubicacion_id_ubicacion_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE ubicacion_id_ubicacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ubicacion_id_ubicacion_seq OWNER TO peajetron;

--
-- Name: ubicacion_id_ubicacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE ubicacion_id_ubicacion_seq OWNED BY ubicacion.id_ubicacion;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE usuario (
    id_usuario integer NOT NULL,
    id_perfil integer NOT NULL,
    id_tipo_documento integer NOT NULL,
    id_ubicacion integer NOT NULL,
    documento character varying NOT NULL,
    nombre character varying NOT NULL,
    correo character varying NOT NULL,
    contrasena character(33) NOT NULL,
    telefono character varying NOT NULL,
    direccion character varying NOT NULL,
    activo boolean DEFAULT true NOT NULL,
    fecha_registro timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.usuario OWNER TO peajetron;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO peajetron;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- Name: usuarioencargado; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE usuarioencargado (
    identificador character varying(20) NOT NULL,
    descripciondepartamento character varying(100)
);


ALTER TABLE public.usuarioencargado OWNER TO peajetron;

--
-- Name: vehiculo; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE vehiculo (
    id_vehiculo integer NOT NULL,
    id_usuario integer NOT NULL,
    id_estado_vehiculo integer NOT NULL,
    id_categoria integer NOT NULL,
    placa character(6) NOT NULL,
    marca character varying,
    color character varying,
    modelo integer,
    fecha_registro timestamp without time zone DEFAULT now(),
    fecha_modificacion timestamp without time zone
);


ALTER TABLE public.vehiculo OWNER TO peajetron;

--
-- Name: vehiculo_estado; Type: TABLE; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE TABLE vehiculo_estado (
    id_vehiculo_estado integer NOT NULL,
    vehiculo_estado character varying NOT NULL
);


ALTER TABLE public.vehiculo_estado OWNER TO peajetron;

--
-- Name: vehiculo_estado_id_vehiculo_estado_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE vehiculo_estado_id_vehiculo_estado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vehiculo_estado_id_vehiculo_estado_seq OWNER TO peajetron;

--
-- Name: vehiculo_estado_id_vehiculo_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE vehiculo_estado_id_vehiculo_estado_seq OWNED BY vehiculo_estado.id_vehiculo_estado;


--
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE; Schema: public; Owner: peajetron
--

CREATE SEQUENCE vehiculo_id_vehiculo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vehiculo_id_vehiculo_seq OWNER TO peajetron;

--
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: peajetron
--

ALTER SEQUENCE vehiculo_id_vehiculo_seq OWNED BY vehiculo.id_vehiculo;


--
-- Name: id_auditor; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY auditor ALTER COLUMN id_auditor SET DEFAULT nextval('auditor_id_auditor_seq'::regclass);


--
-- Name: id_categoria; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY categoria ALTER COLUMN id_categoria SET DEFAULT nextval('categoria_id_categoria_seq'::regclass);


--
-- Name: id_cobro; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY cobro ALTER COLUMN id_cobro SET DEFAULT nextval('cobro_id_cobro_seq'::regclass);


--
-- Name: codigofactura; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY factura ALTER COLUMN codigofactura SET DEFAULT nextval('factura_codigofactura_seq'::regclass);


--
-- Name: valor; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY factura ALTER COLUMN valor SET DEFAULT nextval('factura_valor_seq'::regclass);


--
-- Name: id_menu; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY menu ALTER COLUMN id_menu SET DEFAULT nextval('menu_id_menu_seq'::regclass);


--
-- Name: id_peaje; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY peaje ALTER COLUMN id_peaje SET DEFAULT nextval('peaje_id_peaje_seq'::regclass);


--
-- Name: id_perfil; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY perfil ALTER COLUMN id_perfil SET DEFAULT nextval('perfil_id_perfil_seq'::regclass);


--
-- Name: id_pqr; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr ALTER COLUMN id_pqr SET DEFAULT nextval('pqr_id_pqr_seq'::regclass);


--
-- Name: id_pqr_estado; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr_estado ALTER COLUMN id_pqr_estado SET DEFAULT nextval('pqr_estado_id_pqr_estado_seq'::regclass);


--
-- Name: id_pqr_tipo; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr_tipo ALTER COLUMN id_pqr_tipo SET DEFAULT nextval('pqr_tipo_id_pqr_tipo_seq'::regclass);


--
-- Name: id_ruta; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY ruta ALTER COLUMN id_ruta SET DEFAULT nextval('ruta_id_ruta_seq'::regclass);


--
-- Name: id_tipo_documento; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY tipo_documento ALTER COLUMN id_tipo_documento SET DEFAULT nextval('tipo_documento_id_tipo_documento_seq'::regclass);


--
-- Name: id_ubicacion; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY ubicacion ALTER COLUMN id_ubicacion SET DEFAULT nextval('ubicacion_id_ubicacion_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- Name: id_vehiculo; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('vehiculo_id_vehiculo_seq'::regclass);


--
-- Name: id_vehiculo_estado; Type: DEFAULT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY vehiculo_estado ALTER COLUMN id_vehiculo_estado SET DEFAULT nextval('vehiculo_estado_id_vehiculo_estado_seq'::regclass);


--
-- Data for Name: auditor; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY auditor (id_auditor, id_usuario, descripcion, fecha) FROM stdin;
\.


--
-- Name: auditor_id_auditor_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('auditor_id_auditor_seq', 1, false);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY categoria (id_categoria, categoria, descripcion) FROM stdin;
1	I	Automóviles, camperos y camionetas
2	II	Buses
3	III	Camiones pequeños de 2 eje
6	IV	Camiones grandes de 2 ejes
7	V	Camiones de 3 y 4 ejes
8	VI	Camiones de 5 ejes
9	VII	Camiones de 6 ejes o más
\.


--
-- Name: categoria_id_categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('categoria_id_categoria_seq', 12, true);


--
-- Data for Name: cobro; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY cobro (id_cobro, id_vehiculo, id_usuario_propietario, id_usuario_registra, id_peaje, valor, fecha_registro, fecha_pago) FROM stdin;
17	1	3	7	2	7000	2014-11-10 20:24:44.758003	\N
18	1	3	7	2	7000	2014-11-10 20:26:18.54415	\N
19	1	3	7	3	9000	2014-11-10 20:32:47.555608	\N
20	1	3	7	2	7000	2014-11-10 20:37:10.525288	\N
21	1	3	1	1	5000	2014-11-28 14:56:53.258346	\N
\.


--
-- Name: cobro_id_cobro_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('cobro_id_cobro_seq', 21, true);


--
-- Data for Name: factura; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY factura (codigofactura, "fechaCorte", "fechaPagado", valor, id_vehiculo, id_usuario) FROM stdin;
1	2014-10-12 00:00:00	2014-05-12 00:00:00	20000	5	10
2	2014-10-12 00:00:00	2014-04-12 00:00:00	15000	7	10
3	2014-10-12 00:00:00	\N	30000	6	10
4	2014-10-12 00:00:00	\N	25000	5	10
\.


--
-- Name: factura_codigofactura_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('factura_codigofactura_seq', 4, true);


--
-- Name: factura_valor_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('factura_valor_seq', 1, true);


--
-- Data for Name: historialvehiculo; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY historialvehiculo ("idVehiculo", "idPeaje", fecha) FROM stdin;
\.


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY menu (id_menu, id_menu_padre, menu, url, icono, orden) FROM stdin;
1	\N	Inicio	a	inicio.png	1
11	2	Cruze	index.php/cobro	cruze.png	3
2	\N	Crear	a	crear.png	2
3	\N	Administrar	a	administrar.png	3
4	\N	Consultar	a	consultar.png	4
5	\N	Auditor	a	auditor.png	5
16	4	Facturas	a	factura.png	2
9	2	Propietario	index.php/usuario/crear	perfil.png	1
10	2	Vehículo	index.php/vehiculo/crear	vehiculo.png	2
12	3	Usuarios	index.php/usuario/listar	perfil.png	1
13	3	Vehículos	index.php/vehiculo/listar	vehiculos.png	2
14	3	Pagos	index.php/cobro/listar	pagos.png	3
25	15	Tarifas	gg	tarifas.png	6
19	15	Categorias	index.php/categoria	categorias.png	0
20	15	Menu	index.php/menus	menus.png	1
21	15	Peajes	index.php/peaje	peajes.png	2
22	15	Perfiles	index.php/perfil	perfiles.png	3
24	15	Rutas	index.php/ruta	rutas.png	5
26	15	Tipo Documento	index.php/documento	documentos.png	7
27	15	Ubicaciones	index.php/ubicacion	ubicaciones.png	8
28	15	Estados Vehiculo	index.php/estado	estados.png	9
29	\N	Consultas Web	a	inicio.png	1
30	29	Historial de peajes cruzados	index.php/consultasWeb/historialPeajes		1
32	29	Historial de pagos	index.php/consultasWeb/historialPagos		3
31	29	Historial de peajes cruzados por fecha	index.php/consultasWeb/historialPeajesFecha		2
33	29	Último peaje cruzado	index.php/consultasWeb/ultimoPeaje		4
35	4	Historial Vehiculo	index.php/mapas	historialmapa.png	9
8	4	Mis PQRS	index.php/pqr/gestorpqr/obtenerQueja	pqrs.png	3
37	2	Registrar PQR	index.php/pqr/gestorpqr/registrarDatos		10
17	4	PQRS	index.php/pqr/gestorpqr/obtenerQuejaInv	pqrs.png	3
34	29	Valor último mes	/index.php/consultasWeb/valorUltimoMes		5
23	15	Permisos	index.php/permisos/index	permisos.png	4
6	1	Mi perfil	index.php/usuario/modificar	perfil.png	1
7	1	Mis vehículos	index.php/vehiculo/index	vehiculos.png	2
18	4	Vehículo	index.php/vehiculo	vehiculo.png	1
39	24	Nombre 1	index.php/aa	icono.png	0
15	3	Panel de Control	b	panel.png	4
\.


--
-- Name: menu_id_menu_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('menu_id_menu_seq', 40, true);


--
-- Data for Name: peaje; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY peaje (id_peaje, id_ruta, peaje, latitud, longitud, address) FROM stdin;
2	1	Chinauta	4.269469	-74.5	\N
3	1	Chusacá	4.537975	-74.271819	\N
1	1	Andes	4.830098	-74.032949	\N
\.


--
-- Name: peaje_id_peaje_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('peaje_id_peaje_seq', 5, true);


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY perfil (id_perfil, perfil, controlador) FROM stdin;
1	Administrador	\N
2	Operario	cobro
3	Propietario	\N
4	Policia	
\.


--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('perfil_id_perfil_seq', 6, true);


--
-- Data for Name: perfil_menu; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY perfil_menu (id_perfil, id_menu) FROM stdin;
1	1
1	2
1	3
1	4
1	5
1	6
1	7
1	8
1	9
1	10
1	11
1	12
1	13
1	14
1	15
1	16
1	17
1	18
1	19
1	20
1	21
1	22
1	23
1	24
1	25
1	26
1	27
1	28
1	29
1	30
1	31
1	32
1	33
1	34
1	35
1	37
\.


--
-- Data for Name: pqr; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY pqr (id_pqr, id_pqr_tipo, id_pqr_estado, id_usuario_radica, id_usuario_responde, pregunta, respuesta, fecha_registro, fecha_respuesta) FROM stdin;
\.


--
-- Data for Name: pqr_estado; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY pqr_estado (id_pqr_estado, pqr_estado) FROM stdin;
\.


--
-- Name: pqr_estado_id_pqr_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('pqr_estado_id_pqr_estado_seq', 1, false);


--
-- Name: pqr_id_pqr_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('pqr_id_pqr_seq', 1, false);


--
-- Data for Name: pqr_tipo; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY pqr_tipo (id_pqr_tipo, pqr_tipo) FROM stdin;
\.


--
-- Name: pqr_tipo_id_pqr_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('pqr_tipo_id_pqr_tipo_seq', 1, false);


--
-- Data for Name: pqrs; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY pqrs (identificador, usuarioingresa, usuarioresponde, fechaingreso, fechalectura, fecharespuesta, tiposolicitud, tematerminado, ciudadsolicitud, mensajepeticion, mensajerespuesta, usuarioencargado) FROM stdin;
1231231231231	11	116	2014-11-10	2014-11-10	2014-11-10	queja	1	bogota	Mensaje de prueba de queja para code igniter en la aplicación de integración	Mensaje de respuesta a la primera queja de code igniter	116
1231231231233	11	14	2014-11-10	2014-11-10	2014-11-10	solicitud	1	bogota	prueba prueba rpeuab	Respuesta a la solicitud	14
1231231231232	11	116	2014-11-10	2014-11-10	1900-01-01	pregunta	0	bogota	Pregunta para code igniter del desarrollador		13
1231231231234	11	13	2014-11-10	2014-11-10	2014-11-10	queja	1	bogota	Mensaje de prueba solicitud	Mensaje de respuesta a la primera queja de code igniter	13
1231231231235	11	13	2014-11-10	2014-11-10	2014-11-10	queja	1	bogota	Me robaron el carro ayer	De malas como la priañana mueca	13
\.


--
-- Data for Name: ruta; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY ruta (id_ruta, ruta) FROM stdin;
1	Ruta 1
\.


--
-- Name: ruta_id_ruta_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('ruta_id_ruta_seq', 3, true);


--
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY tarifa (id_peaje, id_categoria, tarifa) FROM stdin;
1	1	5000
2	1	7000
3	1	9000
\.


--
-- Data for Name: tipo_documento; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY tipo_documento (id_tipo_documento, tipo_documento) FROM stdin;
1	Cédula de ciudadania
\.


--
-- Name: tipo_documento_id_tipo_documento_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('tipo_documento_id_tipo_documento_seq', 3, true);


--
-- Data for Name: ubicacion; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY ubicacion (id_ubicacion, id_ubicacion_padre, ubicacion) FROM stdin;
1	\N	Bogotá D.C.
2	1	Bogotá
\.


--
-- Name: ubicacion_id_ubicacion_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('ubicacion_id_ubicacion_seq', 5, true);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY usuario (id_usuario, id_perfil, id_tipo_documento, id_ubicacion, documento, nombre, correo, contrasena, telefono, direccion, activo, fecha_registro, fecha_modificacion) FROM stdin;
2	2	1	2	123	Operario 1	o@peajetron.com	202cb962ac59075b964b07152d234b70 	123	Cra 1 2 3	t	2014-10-06 21:13:23.936951	2014-10-26 18:58:21.775838
1	1	1	2	1234	root	a@peajetron.com	202cb962ac59075b964b07152d234b70 	123	Cra 1 2-3	t	2014-10-03 14:24:18.30237	2014-10-26 18:57:57.786137
6	3	1	1	1073168673	Cristian Chaparro	cristianchaparroa@gmail.com	202cb962ac59075b964b07152d234b70 	3124388460	Calle #108	t	2014-11-04 23:35:22.436435	\N
7	2	1	1	123456	Camilo Ospina	camilo.ospinaa@gmail.com	202cb962ac59075b964b07152d234b70 	123123456	cll 2234	t	2014-11-04 23:38:58.421887	\N
8	1	1	1	1026564980	FabianDC	fayan8@hotmail.com	202cb962ac59075b964b07152d234b70 	3123856235	calle falsa 123	t	2014-11-05 00:03:43.926847	\N
9	3	1	1	1026564988	Fayandc	fayandcm@hotmail.com	202cb962ac59075b964b07152d234b70 	3123890098	cra falsa 321	t	2014-11-05 00:08:10.119059	\N
116	1	1	1	1018456029	Diego Sierra	sierralean38@gmail.com	202cb962ac59075b964b07152d234b70 	4287105	carrera 74 a numero 56a 39	t	2014-11-10 17:38:42.486428	2014-11-10 17:38:42.486428
11	3	1	1	92120968922	Diego Sierra Proper	sierralean38@hotmail.com	202cb962ac59075b964b07152d234b70 	4287105	cra557 nun4 	t	2014-11-10 17:56:27.469477	2014-11-10 17:56:27.469477
12	4	1	1	95586623	José David Moreno	josdavidmo@gmail.com	202cb962ac59075b964b07152d234b70 	4285659	sdfsdfsdfsdfsd	t	2014-11-10 18:39:26.66447	2014-11-10 18:39:26.66447
13	1	1	1	1018456105	Diego Sierra Sistemas	sierralean38@yahoo.com	202cb962ac59075b964b07152d234b70 	42871000	sefgwefwe	t	2014-11-10 18:42:41.048307	2014-11-10 18:42:41.048307
3	3	1	2	123	Propietario 1	peajetron@peajetron.com	202cb962ac59075b964b07152d234b70 	3115216023	Cra 1 2-3	t	2014-10-07 22:38:16.643962	2014-10-26 18:58:11.767688
10	3	1	1	1014239597	cesar Hernandez	ceimox19@gmail.co	202cb962ac59075b964b07152d234b70 	3115216022	av cra 91 n131	t	2014-11-05 04:35:03.277894	\N
5	1	1	1	123	prueba 1	temp2010@msn.com	a9fbe5dbdea40ebc6d6999d1a6bf2cc3 	123	cra 123	t	2014-11-02 09:24:11.882524	\N
14	1	1	1	456029145	Diego Sierra Gerencia	sierralean38@outlook.com	202cb962ac59075b964b07152d234b70 	14234569	dfjkwndfuiwneui	t	2014-11-10 18:45:56.07526	2014-11-10 18:45:56.07526
\.


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 15, true);


--
-- Data for Name: usuarioencargado; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY usuarioencargado (identificador, descripciondepartamento) FROM stdin;
116	ingreso
13	SISTEMAS
14	GERENCIA
\.


--
-- Data for Name: vehiculo; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY vehiculo (id_vehiculo, id_usuario, id_estado_vehiculo, id_categoria, placa, marca, color, modelo, fecha_registro, fecha_modificacion) FROM stdin;
2	2	1	1	AAA112	a	a	0	2014-11-02 12:24:01.582759	\N
3	5	1	1	AAA113	\N	\N	\N	2014-11-02 12:27:36.317858	\N
4	9	1	1	BZZ561	Reanult	gris pluton	2008	2014-11-05 00:21:30.958202	\N
5	10	1	1	ABC123	BMW	negro	2011	2014-11-05 04:36:33.056121	\N
6	10	1	1	XXY234	BMW	blanco	1992	2014-11-05 06:20:21.931992	\N
7	10	1	1	PAR232	AUDI	negro	1999	2014-11-05 06:21:29.230422	\N
8	6	1	1	RSQ912	AUDI	GRIS	2014	2014-11-10 03:31:18.948417	\N
9	6	1	1	TML456	MASERATI	BLANCO	2014	2014-11-10 03:35:43.578008	\N
1	3	3	1	AAA111	Marca 	Color	0	2014-10-07 22:40:52.279203	\N
\.


--
-- Data for Name: vehiculo_estado; Type: TABLE DATA; Schema: public; Owner: peajetron
--

COPY vehiculo_estado (id_vehiculo_estado, vehiculo_estado) FROM stdin;
1	Activo
2	Inactivo
3	Robado
4	Chatarrizado
\.


--
-- Name: vehiculo_estado_id_vehiculo_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('vehiculo_estado_id_vehiculo_estado_seq', 6, true);


--
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE SET; Schema: public; Owner: peajetron
--

SELECT pg_catalog.setval('vehiculo_id_vehiculo_seq', 20, true);


--
-- Name: auditor_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY auditor
    ADD CONSTRAINT auditor_pkey PRIMARY KEY (id_auditor);


--
-- Name: categoria_categoria_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_categoria_key UNIQUE (categoria);


--
-- Name: categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id_categoria);


--
-- Name: cobro_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY cobro
    ADD CONSTRAINT cobro_pkey PRIMARY KEY (id_cobro);


--
-- Name: factura_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY factura
    ADD CONSTRAINT factura_pkey PRIMARY KEY (codigofactura);


--
-- Name: firstkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT firstkey PRIMARY KEY (id_perfil);


--
-- Name: historial_vehiculo_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY historialvehiculo
    ADD CONSTRAINT historial_vehiculo_pkey PRIMARY KEY ("idVehiculo", "idPeaje");


--
-- Name: menu_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id_menu);


--
-- Name: peaje_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY peaje
    ADD CONSTRAINT peaje_pkey PRIMARY KEY (id_peaje);


--
-- Name: perfil_perfil_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_perfil_key UNIQUE (perfil);


--
-- Name: pqr_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqr_estado
    ADD CONSTRAINT pqr_estado_pkey PRIMARY KEY (id_pqr_estado);


--
-- Name: pqr_estado_pqr_estado_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqr_estado
    ADD CONSTRAINT pqr_estado_pqr_estado_key UNIQUE (pqr_estado);


--
-- Name: pqr_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqr
    ADD CONSTRAINT pqr_pkey PRIMARY KEY (id_pqr);


--
-- Name: pqr_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqr_tipo
    ADD CONSTRAINT pqr_tipo_pkey PRIMARY KEY (id_pqr_tipo);


--
-- Name: pqr_tipo_pqr_tipo_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqr_tipo
    ADD CONSTRAINT pqr_tipo_pqr_tipo_key UNIQUE (pqr_tipo);


--
-- Name: pqrs_identificador_usuarioingresa_tiposolicitud_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY pqrs
    ADD CONSTRAINT pqrs_identificador_usuarioingresa_tiposolicitud_key UNIQUE (identificador, usuarioingresa, tiposolicitud);


--
-- Name: ruta_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY ruta
    ADD CONSTRAINT ruta_pkey PRIMARY KEY (id_ruta);


--
-- Name: tipo_documento_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY tipo_documento
    ADD CONSTRAINT tipo_documento_pkey PRIMARY KEY (id_tipo_documento);


--
-- Name: tipo_documento_tipo_documento_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY tipo_documento
    ADD CONSTRAINT tipo_documento_tipo_documento_key UNIQUE (tipo_documento);


--
-- Name: ubicacion_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY ubicacion
    ADD CONSTRAINT ubicacion_pkey PRIMARY KEY (id_ubicacion);


--
-- Name: unique_perfil_menu; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY perfil_menu
    ADD CONSTRAINT unique_perfil_menu UNIQUE (id_perfil, id_menu);


--
-- Name: unique_ubicacion; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY ubicacion
    ADD CONSTRAINT unique_ubicacion UNIQUE (id_ubicacion_padre, ubicacion);


--
-- Name: unique_valor; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY tarifa
    ADD CONSTRAINT unique_valor UNIQUE (id_peaje, id_categoria);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: usuarioencargado_identificador_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY usuarioencargado
    ADD CONSTRAINT usuarioencargado_identificador_key UNIQUE (identificador);


--
-- Name: vehiculo_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY vehiculo_estado
    ADD CONSTRAINT vehiculo_estado_pkey PRIMARY KEY (id_vehiculo_estado);


--
-- Name: vehiculo_estado_vehiculo_estado_key; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY vehiculo_estado
    ADD CONSTRAINT vehiculo_estado_vehiculo_estado_key UNIQUE (vehiculo_estado);


--
-- Name: vehiculo_pkey; Type: CONSTRAINT; Schema: public; Owner: peajetron; Tablespace: 
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (id_vehiculo);


--
-- Name: fki_id_usuario; Type: INDEX; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE INDEX fki_id_usuario ON factura USING btree (id_usuario);


--
-- Name: fki_id_vehiculo; Type: INDEX; Schema: public; Owner: peajetron; Tablespace: 
--

CREATE INDEX fki_id_vehiculo ON factura USING btree (id_vehiculo);


--
-- Name: auditor_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY auditor
    ADD CONSTRAINT auditor_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);


--
-- Name: cobro_id_peaje_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY cobro
    ADD CONSTRAINT cobro_id_peaje_fkey FOREIGN KEY (id_peaje) REFERENCES peaje(id_peaje);


--
-- Name: cobro_id_usuario_propietario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY cobro
    ADD CONSTRAINT cobro_id_usuario_propietario_fkey FOREIGN KEY (id_usuario_propietario) REFERENCES usuario(id_usuario);


--
-- Name: cobro_id_usuario_registra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY cobro
    ADD CONSTRAINT cobro_id_usuario_registra_fkey FOREIGN KEY (id_usuario_registra) REFERENCES usuario(id_usuario);


--
-- Name: cobro_id_vehiculo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY cobro
    ADD CONSTRAINT cobro_id_vehiculo_fkey FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo);


--
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY factura
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);


--
-- Name: fk_id_vehiculo; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY factura
    ADD CONSTRAINT fk_id_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo);


--
-- Name: llaveIdPeaje; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY historialvehiculo
    ADD CONSTRAINT "llaveIdPeaje" FOREIGN KEY ("idPeaje") REFERENCES peaje(id_peaje);


--
-- Name: llaveIdVehiculo; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY historialvehiculo
    ADD CONSTRAINT "llaveIdVehiculo" FOREIGN KEY ("idVehiculo") REFERENCES vehiculo(id_vehiculo);


--
-- Name: menu_id_menu_padre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT menu_id_menu_padre_fkey FOREIGN KEY (id_menu_padre) REFERENCES menu(id_menu);


--
-- Name: peaje_id_ruta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY peaje
    ADD CONSTRAINT peaje_id_ruta_fkey FOREIGN KEY (id_ruta) REFERENCES ruta(id_ruta);


--
-- Name: perfil_menu_id_menu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY perfil_menu
    ADD CONSTRAINT perfil_menu_id_menu_fkey FOREIGN KEY (id_menu) REFERENCES menu(id_menu);


--
-- Name: perfil_menu_id_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY perfil_menu
    ADD CONSTRAINT perfil_menu_id_perfil_fkey FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- Name: pqr_id_pqr_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr
    ADD CONSTRAINT pqr_id_pqr_estado_fkey FOREIGN KEY (id_pqr_estado) REFERENCES pqr_estado(id_pqr_estado);


--
-- Name: pqr_id_pqr_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr
    ADD CONSTRAINT pqr_id_pqr_tipo_fkey FOREIGN KEY (id_pqr_tipo) REFERENCES pqr_tipo(id_pqr_tipo);


--
-- Name: pqr_id_usuario_radica_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr
    ADD CONSTRAINT pqr_id_usuario_radica_fkey FOREIGN KEY (id_usuario_radica) REFERENCES usuario(id_usuario);


--
-- Name: pqr_id_usuario_responde_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY pqr
    ADD CONSTRAINT pqr_id_usuario_responde_fkey FOREIGN KEY (id_usuario_responde) REFERENCES usuario(id_usuario);


--
-- Name: tarifa_id_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY tarifa
    ADD CONSTRAINT tarifa_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria);


--
-- Name: tarifa_id_peaje_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY tarifa
    ADD CONSTRAINT tarifa_id_peaje_fkey FOREIGN KEY (id_peaje) REFERENCES peaje(id_peaje);


--
-- Name: ubicacion_id_ubicacion_padre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY ubicacion
    ADD CONSTRAINT ubicacion_id_ubicacion_padre_fkey FOREIGN KEY (id_ubicacion_padre) REFERENCES ubicacion(id_ubicacion);


--
-- Name: usuario_id_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_perfil_fkey FOREIGN KEY (id_perfil) REFERENCES perfil(id_perfil);


--
-- Name: usuario_id_tipo_documento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_tipo_documento_fkey FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento);


--
-- Name: usuario_id_ubicacion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_ubicacion_fkey FOREIGN KEY (id_ubicacion) REFERENCES ubicacion(id_ubicacion);


--
-- Name: vehiculo_id_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria);


--
-- Name: vehiculo_id_estado_vehiculo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_id_estado_vehiculo_fkey FOREIGN KEY (id_estado_vehiculo) REFERENCES vehiculo_estado(id_vehiculo_estado);


--
-- Name: vehiculo_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: peajetron
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

