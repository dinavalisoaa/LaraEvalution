--
-- PostgreSQL database dump
--

-- Dumped from database version 10.18
-- Dumped by pg_dump version 10.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: article; Type: TABLE; Schema: public; Owner: dina
--

CREATE TABLE public.article (
    id integer NOT NULL,
    resume text,
    categorieid integer,
    contenu text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    titre character varying,
    photo text
);


ALTER TABLE public.article OWNER TO dina;

--
-- Name: article_id_seq; Type: SEQUENCE; Schema: public; Owner: dina
--

CREATE SEQUENCE public.article_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_id_seq OWNER TO dina;

--
-- Name: article_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dina
--

ALTER SEQUENCE public.article_id_seq OWNED BY public.article.id;


--
-- Name: categorie; Type: TABLE; Schema: public; Owner: dina
--

CREATE TABLE public.categorie (
    id integer NOT NULL,
    nom character varying,
    updated_at timestamp without time zone,
    created_at timestamp without time zone
);


ALTER TABLE public.categorie OWNER TO dina;

--
-- Name: categorie_id_seq; Type: SEQUENCE; Schema: public; Owner: dina
--

CREATE SEQUENCE public.categorie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorie_id_seq OWNER TO dina;

--
-- Name: categorie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dina
--

ALTER SEQUENCE public.categorie_id_seq OWNED BY public.categorie.id;


--
-- Name: article id; Type: DEFAULT; Schema: public; Owner: dina
--

ALTER TABLE ONLY public.article ALTER COLUMN id SET DEFAULT nextval('public.article_id_seq'::regclass);


--
-- Name: categorie id; Type: DEFAULT; Schema: public; Owner: dina
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id SET DEFAULT nextval('public.categorie_id_seq'::regclass);


--
-- Data for Name: article; Type: TABLE DATA; Schema: public; Owner: dina
--

COPY public.article (id, resume, categorieid, contenu, created_at, updated_at, titre, photo) FROM stdin;
7	Fibonacci, Leonardo (v. 1175-apr. 1240), mathématicien italien. Microsoft ® Encarta	1	<h1><strong>Fibonacc</strong>i</h1>\r\n\r\n<p>na&icirc;t &agrave; Pise, ville commer&ccedil;ante, o&ugrave; il apprend les bases de l&rsquo;arithm&eacute;tique pratique. Vers l&rsquo;&acirc;ge de vingt ans, il suit son p&egrave;re en Afrique du Nord, o&ugrave; il &eacute;tudie le syst&egrave;me de num&eacute;ration indien ainsi que les m&eacute;thodes de calcul arabes. De retour en Europe, il publie en 1202 un ouvrage intitul&eacute; <em>Liber abbaci,</em> dans lequel il expose les math&eacute;matiques arabes, pr&eacute;conisant l&rsquo;utilisation des chiffres &laquo;&nbsp;arabes&nbsp;&raquo; et du z&eacute;ro.</p>\r\n\r\n<p><strong>Fibonacci </strong>&eacute;crit &agrave; propos de la th&eacute;orie des nombres, de math&eacute;matiques financi&egrave;res, d&rsquo;alg&egrave;bre, de math&eacute;matiques r&eacute;cr&eacute;atives et de g&eacute;om&eacute;trie. C&rsquo;est dans un ouvrage sur la th&eacute;orie des nombres qu&rsquo;&agrave; partir d&rsquo;une question sur la reproduction et la prolif&eacute;ration d&rsquo;une population de lapins, qu&rsquo;il introduit la suite de <strong>Fibonacci</strong><em>,</em> suite o&ugrave; chaque terme est &eacute;gal &agrave; la somme des deux termes pr&eacute;c&eacute;dents (0, 1, 1, 2, 3, 5, 8, 13,&nbsp;...) et qui poss&egrave;de de nombreuses propri&eacute;t&eacute;s. <em>Voir aussi </em>Suites et s&eacute;ries.</p>\r\n\r\n<p>&nbsp;</p>	2023-03-18 17:03:25	2023-03-18 17:03:25	Fibonacci, Leonardo	uploads/salon.jpg
8	Facebook faillite,l'an dernier 2019, chiffre d'affaire en baisse de 3.8Md$	1	<h2><u><strong>Facebook faillite</strong></u></h2>\r\n\r\n<p>Dix ans apr&egrave;s son apparition aupr&egrave;s du grand public, l&rsquo;Internet conna&icirc;t de profonds changements, th&eacute;oris&eacute;s sous le nom de Web&nbsp;2.0 (pour &laquo;&nbsp;Web deuxi&egrave;me g&eacute;n&eacute;ration&nbsp;&raquo;). &Agrave; la faveur de l&rsquo;immense succ&egrave;s de sites tels que eBay (vente aux ench&egrave;res entre particuliers), Wikip&eacute;dia (encyclop&eacute;die collaborative libre et gratuite) ou Myspace et Facebook (r&eacute;seaux sociaux permettant de regrouper des communaut&eacute;s autour d&rsquo;int&eacute;r&ecirc;ts communs), les internautes sont devenus acteurs et non plus simplement utilisateurs de l&rsquo;Internet.</p>\r\n\r\n<p>&nbsp;</p>	2023-03-18 18:03:10	2023-03-18 18:03:10	Facebook faillite	uploads/greve.jpg
9	La Reine Ramonda, Shuri, M’Baku, Okoye et les Dora Milaje luttent pour protéger leur nation des ingérences d’autres puissances mondiales après la mort du roi T’Challa. Alors que le peuple s’efforce d’aller de l’avant, nos héros vont devoir s’unir et compter sur l’aide de la mercenaire Nakia et d’Everett Ross pour faire entrer le royaume du Wakanda dans une nouvelle ère. Mais une terrible menace surgit d’un royaume caché au plus profond des océans : Talokan.	1	<h2><span style="font-family:Comic Sans MS,cursive"><strong>Wakanda est mort subitement dans son son sommeil</strong></span></h2>\r\n\r\n<p><a href="https://www.allocine.fr/film/agenda/sem-2022-11-09/">9 novembre 2022&nbsp;</a><strong>en salle&nbsp;</strong>/&nbsp;2h 42min&nbsp;/&nbsp;<a href="https://www.allocine.fr/films/genre-13025/">Action</a>,&nbsp;<a href="https://www.allocine.fr/films/genre-13001/">Aventure</a>,&nbsp;<a href="https://www.allocine.fr/films/genre-13012/">Fantastique</a></p>\r\n\r\n<p>De&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=571659.html">Ryan Coogler</a></p>\r\n\r\n<p style="text-align:center">Par&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=571659.html">Ryan Coogler</a>,&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=145010.html">Joe Robert Cole</a></p>\r\n\r\n<p style="text-align:center">Avec&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=548169.html">Letitia Wright</a>,&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=10558.html">Angela Bassett</a>,&nbsp;<a href="https://www.allocine.fr/personne/fichepersonne_gen_cpersonne=217908.html">Danai Gurira</a></p>	2023-03-22 08:13:52	2023-03-22 08:13:52	Wakanda est mort subitement dans son son sommeil	uploads/058.jpg
\.


--
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: dina
--

COPY public.categorie (id, nom, updated_at, created_at) FROM stdin;
1	Fait Divers	\N	\N
\.


--
-- Name: article_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dina
--

SELECT pg_catalog.setval('public.article_id_seq', 9, true);


--
-- Name: categorie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dina
--

SELECT pg_catalog.setval('public.categorie_id_seq', 1, true);


--
-- Name: article article_pkey; Type: CONSTRAINT; Schema: public; Owner: dina
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_pkey PRIMARY KEY (id);


--
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: dina
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id);


--
-- Name: article article_categorieid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: dina
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_categorieid_fkey FOREIGN KEY (categorieid) REFERENCES public.categorie(id);


--
-- PostgreSQL database dump complete
--

