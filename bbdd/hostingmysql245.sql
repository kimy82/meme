-- phpMyAdmin SQL Dump
-- version 3.3.7deb6
-- http://www.phpmyadmin.net
--
-- Servidor: hostingmysql245
-- Tiempo de generación: 17-06-2013 a las 18:39:52
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `memestudio_es_bd`
--
CREATE DATABASE `etnastudio_es_bd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `etnastudio_es_bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_articles`
--

CREATE TABLE IF NOT EXISTS `acms_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` int(10) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `acms_articles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_articles_categories`
--

CREATE TABLE IF NOT EXISTS `acms_articles_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `position` float NOT NULL,
  `parent` float NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `acms_articles_categories`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_blog`
--

CREATE TABLE IF NOT EXISTS `acms_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `video` varchar(2083) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`,`lang`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=118 ;

--
-- Volcar la base de datos para la tabla `acms_blog`
--

INSERT INTO `acms_blog` (`id`, `title`, `short_text`, `text`, `date`, `time`, `video`, `slug`, `seo_title`, `seo_page_title`, `meta_keywords`, `meta_description`, `status`, `lang`) VALUES
(105, 'Baños con texturas naturales', '', '<p>Im&aacute;genes 3d de la propuesta del ba&ntilde;o principal para un proyecto en&nbsp; Caldes d''Estrac.</p>\n<p>Hemos propuesto un ba&ntilde;o con texturas que creen un ambiente con una sensualidad natural. Los materiales naturales como la piedra y los colores atemporales aportan al uba&ntilde;o na atm&oacute;sfera que despierta nuestros sentidos.</p>', '2012-09-12', '12:08:54', '', 'proyecto-caldetas', '', '', '', '', 1, 'es'),
(106, 'Baños con texturas naturales', '', '<p>Im&aacute;genes 3d de la propuesta del ba&ntilde;o principal para un proyecto en&nbsp; Caldes d''Estrac.</p>\n<p>Hemos propuesto un ba&ntilde;o con texturas que creen un ambiente con una sensualidad natural. Los materiales naturales como la piedra y los colores atemporales aportan al uba&ntilde;o na atm&oacute;sfera que despierta nuestros sentidos.&nbsp;</p>', '2012-09-12', '12:13:54', '', 'banos-con-texturas-naturales', '', '', '', '', 1, 'en'),
(112, 'HIDDEN - Radio & Bluetooth speaker', 'Diseño minimalista y poético El HiddenRadio se ha convertido en un clásico instantáneo. Citado por muchos como un icono del diseño intemporal, cautiva al usuario a través de la funcionalidad intuitiva de la tapa interactiva, creando una conexión semántica única.\nhttp://www.hiddenradiodesign.com', '<p><span id="result_box" lang="es"><span class="hps">El</span> <span class="hps">m&aacute;s simple</span> <span class="hps">e intuitivo</span> <span class="hps">altavoz y radio</span> <span class="hps">FM</span> <span class="hps">nunca dise&ntilde;ado.</span> <span class="hps">Simplemente levante</span> <span class="hps">la tapa</span> <span class="hps">para encenderlo</span><span>, m&aacute;s se</span><span class="hps"> levanta</span> <span class="hps">la tapa,</span> <span class="hps">m&aacute;s fuerte</span> <span class="hps">se vuelve el volumen.</span> <span class="hps">Por su tama&ntilde;o</span> <span class="hps">compacto</span><span>, este producto</span> <span class="hps">ofrece uno de los</span> <span class="hps">mejores&nbsp;</span><span class="hps">comportamiento disponibles</span> <span class="hps">hasta la fecha,</span> <span class="hps">su sonido</span> <span class="hps">f&aacute;cilmente</span> <span class="hps">llena</span> <span class="hps">el espacio del</span> <span class="hps">apartamento m&aacute;s grande</span><span>.</span></span></p>\n<p><span class="hps"><br /><span class="hps">Verdaderamente</span> <span class="hps">port&aacute;til</span><br /><br /><span class="hps">Su tama&ntilde;o</span> <span class="hps">compacto</span> <span class="hps">le permite</span> <span class="hps">llevarlo</span> <span class="hps">f&aacute;cilmente</span> <span class="hps">en</span> <span class="hps">cualquier bolso</span> <span class="hps">o mochila.</span>&nbsp; <span class="hps">15hrs</span> <span class="hps">de</span> <span class="hps">sonido s&oacute;lido</span> <span class="hps">significa que usted puede</span> colocarlo <span class="hps">en cualquier lugar en el&nbsp; que</span> <span class="hps">desee</span> <span class="hps">una fiesta.</span> <span class="hps">F&aacute;cilmente</span> recargable <span class="hps">a trav&eacute;s de</span> puerto <span class="hps">micro</span> <span class="hps">USB</span> <span class="hps">de su ordenador</span> <span class="hps">o cargador</span> <span class="hps">USB inal&aacute;mbrico.</span><br /><br /><span class="hps">No</span> <span class="hps">se dejen atrapar por</span> <span class="hps">los cables</span> <span class="hps">de nuevo. Con</span> <span class="hps">Bluetooth</span> <span class="hps">inal&aacute;mbrico</span>&nbsp;<span> simplemente</span> <span class="hps">deje el tel&eacute;fono</span> <span class="hps">en el bolsillo</span> <span class="hps">mientras escucha su</span> <span class="hps">canci&oacute;n</span> <span class="hps">favorita.</span></span></p>\n<p><span class="hps"><br /><span class="hps">Sonido 360</span> <span class="hps">&deg; envolvente.</span> <br class="hps" /><br /></span></p>', '2013-01-25', '09:36:29', 'http://vimeo.com/46955390', 'hidden-radio-bluetooth-speaker', '', '', '', '', 1, 'es'),
(110, '2012 a exámen: Lo mejor de Design Milk', 'Lo mejor de design Milk 2012', '<p><a href="http://design-milk.com/2012-year-in-review-best-of-design-milk/">DESIGN MILK</a> publica su lista de lo mejor del 2012&nbsp; en el campo del dise&ntilde;o</p>', '2013-01-02', '10:18:22', '', '2012-a-examen-lo-mejor-de-design-milk', '', '', '', '', 1, 'es'),
(111, '2012 :Best of DESIGN MILK', 'Best of Design Milk 2012', '<p><a href="http://design-milk.com/2012-year-in-review-best-of-design-milk/">DESIGN MILK</a> <span id="result_box" lang="en"><span class="hps">publishes</span> <span class="hps alt-edited">their list of</span> <span class="hps">the best of</span> <span class="hps">2012 in</span> <span class="hps alt-edited">design field</span><span>.</span></span></p>\n<p><a href="http://design-milk.com/2012-year-in-review-best-of-design-milk/#more-127138" target="_blank">READ MORE...</a></p>', '2013-01-16', '10:25:33', '', '2012-a-examen-lo-mejor-de-design-milk', '', '', '', '', 1, 'en'),
(113, 'HIDDEN - Radio & Bluetooth speaker', 'Beautifully Minimal ‘Hidden Radio & Bluetooth Speaker’', '<p>&nbsp;</p>\n<div class="column-1-2">\n<h3>Design</h3>\n<p>The HiddenRadio&rsquo;s minimalist yet poetic design makes it an instant classic. Quoted by many as a timeless design icon, it captivates the user through the intuitive functionality of the interactive cap, creating a unique semantic connection.</p>\n<h3>Simple, Intuitive, Loud</h3>\n<p>The world&rsquo;s simplest and most intuitive wireless speaker and FM radio ever. Simply lift the cap to turn it on, the further you lift the cap the louder it gets. For its compact size, this product offers one of the best performing speakers available to date; its sound will easily fill the space of the largest apartment.</p>\n<h3>Truly Portable</h3>\n<p>Its compact size lets you easily carry it around in any bag or backpack. Less than a pound yet 15hrs of solid sound means you can take it anywhere you want a party. Easily charge it again via micro USB from your computer or USB charger.</p>\n<h3>Wireless</h3>\n<p>Never be trapped by wires again with top class wireless Bluetooth; just leave your phone in your pocket while listening to your favorite song.</p>\n<h3>360&deg; Sound</h3>\n<p>With the unique speakers drivers and cone design, the sound will spread evenly throughout the room, and you will hear the same great sound no matter where you are.</p>\n<h3>Enhanced Experience</h3>\n<p>Whether watching a movie or gaming you can now get a full audio experience by pumping the sound to over 90dB; that&rsquo;s easily enough to annoy the neighbors!</p>\n</div>', '2013-01-25', '09:46:01', 'http://vimeo.com/46955390', 'hidden-radio-bluetooth-speaker', '', '', '', '', 1, 'en'),
(114, 'THE SELBY', 'The Selby es un proyecto fotográfico del artista Todd Selby.  En el se propuso fotografiar el interior de los espacios creativos y hogares de sus amigos, la mayoría de ellos grandes emprendedores y creativos: diseñadores, fotógrafos, empresarios, chefs, cineastas, arquitectos.  The Selby nos ofrece la oportunidad de ver como construyen el interiorismo de sus lugares favoritos personas interesantes y creativas. www.theselby.com', '<p><span id="result_box" lang="es"><span class="hps">Todd</span> <span class="hps">Selby</span> <span class="hps">es un</span><span class="hps"> fot&oacute;grafo</span> de interiores, moda, retrato <span class="hps">e ilustrador.</span> <span class="hps">Su proyecto</span> <a href="http://www.theselby.com/" target="_blank"><span class="hps">The Selby</span></a> <span class="hps">ofrece</span> <span class="hps">una visi&oacute;n interna</span> <span class="hps">de los personas </span><span class="hps">creativas en</span> <span class="hps">sus espacios</span> <span class="hps">personales visto con</span> <span class="hps">los ojos</span> <span class="hps">de un artista</span> <span class="hps">.</span> <span class="hps">The Selby</span> <span class="hps">comenz&oacute; en junio de</span> <span class="hps">2008 como</span> <span class="hps">un sitio web,</span> <span class="hps">theselby.com</span><span>, donde</span> <span class="hps">Todd</span> <span class="hps">publicaba</span> <span class="hps">sesiones de fotos</span> <span class="hps">que hizo</span> <span class="hps">de sus amigos</span> <span class="hps">en sus casas.</span> <span class="hps">R</span><span class="hps">&aacute;pidamente</span> <span class="hps">empezaron a llegar</span> <span class="hps">todos los d&iacute;as de</span> visitantes <span class="hps">de todo el</span> <span class="hps">mundo que quer&iacute;an</span> ver <span class="hps">sus casas</span><span class="hps"> publicadas en</span> <span class="hps">el sitio.</span> <span class="hps">El</span> <span class="hps">sitio web</span> <span class="hps">Selby</span> <span class="hps">se volvi&oacute; tan</span> <span class="hps">influyente -</span> <span class="hps">con hasta</span> <span class="hps">100.000 visitantes</span> <span class="hps">&uacute;nicos diarios</span><span class="atn">-</span><span>que</span> <span class="hps">en cuesti&oacute;n de meses</span><span> empresas l&iacute;deres</span> <span class="hps">de todo el</span> <span class="hps">mundo</span> <span class="hps">comenzaron a realizar peticioes de</span><span class="hps"> colaboraci&oacute;n. </span></span><br /><span id="result_box" lang="es"><span class="hps">Estos proyectos conjuntos</span> <span class="hps">han incluido una</span> <span class="hps">gran</span>des <span id="result_box" lang="es">campa&ntilde;as publicitarias</span> <span class="hps">y</span> <span class="hps">proyectos web con</span> <span class="hps">Nike,</span> <span class="hps">colaboraci&oacute;nes con</span> <span class="hps">Louis</span> <span class="hps">Vuitton,</span> <span class="hps">Fendi y</span> <span class="hps">Hennessy,</span> <span class="hps">una exposici&oacute;n individual en</span> <span class="hps">colette</span><span>, y las campa&ntilde;as</span> <span class="hps">internacionales</span> <span class="hps">de publicidad para</span> <span class="hps">Habitat,</span> <span class="hps">Slowear</span><span>, IKEA</span> <span class="hps">y Microsoft.</span> <span class="hps">Adem&aacute;s de la</span> <span class="hps">columna</span> <span class="hps">Selby</span> <span class="hps">para el New York</span> <span class="hps">Times,</span> <span class="hps">T</span> <span class="hps">Magazine,</span> <span class="hps">Todd</span> <span class="hps">tambi&eacute;n tiene una columna</span> <span class="hps">mensual en la</span> <span class="hps">casa</span> <span class="hps">Observer Magazine</span><span>, una columna</span> <span class="hps">mensual</span> <span class="hps">en</span> <span class="hps">la revista</span> <span class="hps">Le</span> <span class="hps">Monde</span> <span class="hps">M y</span> <span class="hps">frecuentes contribuciones</span> <span class="hps">a Casa</span> <span class="hps">Bruto</span> <span class="hps">Jap&oacute;n.&nbsp; <a href="http://www.theselby.com/"><em><strong>www.theselby.com</strong></em></a><br /></span></span></p>', '2013-03-23', '09:16:06', '', 'the-selby', '', '', '', '', 1, 'es'),
(115, 'THE SELBY', 'Todd Selby is a portrait, interiors, journalist and fashion photographer and illustrator. His project The Selby offers an insider’s view of creative individuals in their personal spaces with an artist’s eye for detail. www.theselby.com', '<div class="col">\n<p>Todd Selby is a portrait, interiors, journalist and fashion photographer and illustrator. His project The Selby offers an insider&rsquo;s view of creative individuals in their personal spaces with an artist&rsquo;s eye for detail. The Selby began in June 2008 as a website, theselby.com, where Todd posted photo shoots he did of his friends in their homes. Requests quickly began coming in daily from viewers all over the world who wanted their homes to be featured on the site. The Selby&rsquo;s website became so influential &mdash; with up to 100,000 unique visitors daily&mdash;that within months, top companies from around the world began asking to collaborate.</p>\n<p>These joint projects have included a large ad campaign and web project with Nike, collaborations with Louis Vuitton, FENDI and Hennessy, a solo show at colette, and international ad campaigns for Habitat, Slowear, IKEA and Microsoft. In addition to the Edilble Selby column for the New York Times T Magazine, Todd also has a monthly home column in the Observer Magazine, a monthly column in Le Monde&rsquo;s M Magazine, and frequent contributions to Casa Brutus Japan.</p>\n</div>\n<div class="col alignright">\n<p>Todd&rsquo;s first book, <a href="http://www.amazon.com/gp/product/0810984865?ie=UTF8&tag=theselby-20&linkCode=as2&camp=1789&creative=9325&creativeASIN=0810984865" target="_blank">The Selby is In Your Place</a>, was released in May 2010 by Abrams. Todd recently launched <a href="http://www.edibleselby.com/" target="_blank">Edible Selby</a>, in collaboration with NYTimes T Magazine in which he photographs the most creative and interesting people in food around the world.</p>\n<p>Before working on this project full time Todd worked as a translator and Tijuana tour guide to the International Brotherhood of Machinists, a researcher into the California strawberry industry, a Costa Rican cartographer, a consultant on political corruption to a Mexican Senator, an art director at a venture capital firm, an exotic flower wholesaler, a Japanese clothing designer, and a vermicomposting entrepreneur. Todd currently lives in New York City. His pastimes include going to the airport, eating four square meals a day, breaking his computers, and working on his tan. <a href="http://www.theselby.com/"><em><strong>www.theselby.com</strong></em></a></p>\n</div>', '2013-03-23', '09:37:28', '', 'the', '', '', '', '', 1, 'en'),
(116, 'TRESSERA - EL EBANISTA DE LA JET', 'El barcelonés Jaime Tresserra diseña muebles personalizados y de exquisita factura. El emir de Qatar, Tina Turner o Brad Pitt son algunos de sus millonarios clientes.', '<p><a href="http://www.tresserra.com/" target="_blank">www.tresserra.com</a></p>\n<p>No se deja influir por la tendencia ni le preocupa la moda. Su fuerza reside en la exclusividad de sus dise&ntilde;os: piezas de escrupulosa factura que emanan lujo desde cualquiera de sus &aacute;ngulos. Famosos y millonarios de todo el planeta tienen en sus viviendas privadas muebles dise&ntilde;ados por <a href="http://www.tresserra.com/" target="_blank">Jaime Tresserra</a> (Barcelona, 9 de abril de 1943). La pol&iacute;tica Margaret Thatcher, la cantante Tina Turner, el actor Brad Pitt o Joel Silver, productor de <em>Matrix</em>, son algunos de los nombres que se han dejado seducir por su estilo. Hay muebles suyos en el Hotel Arts de Barcelona, en el Museo Crow de Dallas, en los despachos privados del Palacio Real de Qatar, as&iacute; como en los yates de sus majestades. "Todos mis clientes vienen muy predispuestos hacia mi forma de trabajar, conocen mi obra y, francamente, ninguno ha sido nunca dif&iacute;cil de entender ni ha pedido un deseo complicado de realizar", se&ntilde;ala el creador catal&aacute;n que lleva 25 a&ntilde;os ideando muebles exclusivos con su empresa de alta gama <a href="http://www.tresserra.com/" target="_blank">Tresserra Collection</a>, en la que trabajan 10 personas.</p>', '2013-03-24', '10:02:10', '', 'tressera-el-ebanista-de-la-jet', '', '', '', '', 1, 'es'),
(117, 'TRESSERA - THE JET SET CABINET MAKER', 'The Barcelona-born designer Jaime Tresserra Clapés, favors highly engineered and exquisitely made furniture', '<p><a href="http://www.tresserra.com/" target="_blank">www.tresserra.com</a></p>\n<p>Jaime Tresserra Clap&eacute;s, the Tresserra Collection''s exclusive designer, was born in Barcelona in 1943. He was brought up in a family of actors and fashion designers who taught him that special sensitivity so recognisable in his work. In 1987 he made a profound career change with the founding of J.Tresserra Design, which would later go on to be called Tresserra Collection SL, and presented his first homewares collection at the Valencia International Furniture Trade Fair in which he was awarded the prize for Best Modern Furniture Design for his "Secreter Carpett." Jaime Tresserra has designed exclusive pieces for numerous private clients and has his own showrooms in Barcelona and Paris. He is currently developing a collection based on a new concept of sculpture-furniture: <a href="http://www.tresserra.com/" target="_blank">Tresserra Gallery</a>.</p>', '2013-03-24', '10:07:30', '', 'tressera-the-jet-set-cabinet-maker', '', '', '', '', 1, 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `acms_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `acms_ci_sessions`
--

INSERT INTO `acms_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4ffe94aaf6a7dbdc69e20acd4669954f', '83.247.136.74', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0;', 1371470918, ''),
('ce7a8aea8d612760d258da2c7199a35d', '83.247.136.74', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0;', 1371470917, ''),
('22b99145889a4efcf4d0eb824705c1be', '83.247.136.74', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0;', 1371470881, ''),
('66e715f342d8a3c2a507ee7c2933b989', '62.57.132.233', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) App', 1371470176, 'a:6:{s:9:"logged_in";b:1;s:20:"sess_expire_on_close";b:1;s:8:"username";s:17:"muser83@gmail.com";s:7:"user_id";s:2:"10";s:4:"name";s:5:"Admin";s:8:"group_id";s:1:"4";}'),
('352928f60ccc254dbb6eb675ad1b6afd', '157.56.93.230', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.', 1371468332, ''),
('4a193de5f7b83dc3267ec3247aa53d73', '157.56.93.230', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.', 1371467596, ''),
('8f4da914914bcd74ef65400c195a993f', '64.246.187.42', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en; rv:1.', 1371467481, ''),
('164f0fac036c0c22ab3aa3208c2ef023', '64.246.187.42', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en; rv:1.', 1371467480, ''),
('ddd2eee16a1eab6ce8ed56eae2078dc4', '176.8.88.90', 'Opera/9.00 (Windows NT 4.0; U; en)', 1371475239, ''),
('e73c0e0f6659aa71c9823703586eb79b', '176.8.88.90', 'Opera/9.00 (Windows NT 4.0; U; en)', 1371475240, ''),
('09eb71f6b39b02852ae5cec760da9cd5', '173.199.117.251', 'Mozilla/5.0 (compatible; AhrefsBot/4.0; +http://ah', 1371479610, ''),
('0455a23216144adf7cb1ebc9c179a8fa', '173.199.117.251', 'Mozilla/5.0 (compatible; AhrefsBot/4.0; +http://ah', 1371479645, ''),
('f4c652fb5b8416b0bc8b169718cfed7d', '180.76.5.186', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://', 1371482668, ''),
('9fbd0ad3ded55ffdbfa675b5a753b1d5', '173.199.117.251', 'Mozilla/5.0 (compatible; AhrefsBot/4.0; +http://ah', 1371485488, ''),
('80b0354b31659d26b0a16750ad27df19', '173.199.117.251', 'Mozilla/5.0 (compatible; AhrefsBot/4.0; +http://ah', 1371486073, ''),
('6de54652882bb5ba297803716c97841f', '180.76.6.17', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://', 1371486991, ''),
('277f744de9a7d0358885cf0cd4090ced', '66.249.72.105', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1371471173, ''),
('17454633b3db13acd6ad8d0eced0f4fe', '66.249.72.62', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac', 1371471174, ''),
('eb5e22cc4e503d275c5c5b9a3892546a', '176.8.88.90', 'Opera/9.00 (Windows NT 4.0; U; en)', 1371475238, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_cms_users`
--

CREATE TABLE IF NOT EXISTS `acms_cms_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(3) DEFAULT '0',
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `acms_cms_users`
--

INSERT INTO `acms_cms_users` (`id`, `group_id`, `username`, `password`, `name`) VALUES
(10, 4, 'muser83@gmail.com', 'd59b81488d92f771d78ec6d3dccb9eacc6a3d104', 'Admin'),
(11, 3, 'marcgispert@gmail.com', 'd59b81488d92f771d78ec6d3dccb9eacc6a3d104', 'Marc Gispert'),
(12, 3, 'info@memestudio.es', 'd59b81488d92f771d78ec6d3dccb9eacc6a3d104', 'MEME Studio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_elements`
--

CREATE TABLE IF NOT EXISTS `acms_elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` text,
  `lang` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcar la base de datos para la tabla `acms_elements`
--

INSERT INTO `acms_elements` (`id`, `identifier`, `title`, `text`, `lang`) VALUES
(16, 'about_us_alessio_etna', 'Details Alessio Etna', '<h2>Alessio Etna</h2>\n<h3>Interior designer</h3>\n<p><a href="mailto:alessio@memestudio.es">info@memestudio.es</a></p>\n<p>Meme studio, is an interior design office that has the objective of offer customers comprehensive advice, listening and analyzing their requirements, offering a full service that covers all phases of project development, from the concept to execution.</p>', 'en'),
(15, 'about_us_fulvio_etna', 'Details Fulvio Etna', '<h2>Fulvio Etna</h2>\n<h3>Photographer</h3>\n<p><a href="mailto:fulvio@memestudio.es">info@memestudio.es</a></p>\n<p><span id="result_box" lang="en"><span class="hps">Meme</span> studio is born with multidisciplinary vocation<span class="hps">. We have</span><span class="hps"> a department</span> <span class="hps">of photography</span><span>,</span> <span class="hps">graphic design</span> <span class="hps">and photo retouching</span> that allows<span class="hps"> to interpret and</span> <span class="hps">translate</span> <span class="hps">any</span> <span class="hps">architectural or</span> <span class="hps">interior design</span> <span class="hps">project</span><span>,</span> <span class="hps">whether for</span> <span class="hps">business</span> <span class="hps">portfolios</span> <span class="hps">and for publication</span> <span class="hps">in specialized media</span><span>.</span> <span class="hps">This experience</span> <span class="hps">also allows us to</span> <span class="hps">address any</span> <span class="hps">type</span> <span class="hps">concept or</span> <span class="hps">idea</span> <span class="hps">photo</span> <span class="hps">or graphic</span> <span class="hps">for our</span> <span class="hps">interior design projects</span> <span class="hps">and implement them</span> <span class="hps">in any form.</span></span></p>', 'en'),
(5, 'footer_details', 'Peu de pàgina', '<h4 class="adress">Carrer de Vilar&oacute;s 3-5, Local 7<br /> 08022, Barcelona<br /> T: (+34) 931. 798. 533<br /> E: <a href="mailto:info@memestudio.es">info@memestudio.es</a> </h4>', 'es'),
(6, 'contact_details', 'Dades de contacte', '<h2>Encu&eacute;ntranos</h2>\n<h3><a href="https://maps.google.com/maps?q=Carrer+de+Vilarós,+3-5,+Barcelona,+Espanya&hl=en&ie=UTF8&ll=41.406477,2.1386&spn=0.007983,0.01929&sll=38.341656,-95.712891&sspn=33.98926,79.013672&oq=Carrer+de+Vilarós+3-5&hnear=Carrer+de+Vilarós,+3,+08022+Barcelona,+Catalunya,+Spain&t=m&z=16&iwloc=A">Carrer de Vilar&oacute;s 3-5, Local 7<br /> 08022, Barcelona</a></h3>\n<p>&nbsp;</p>\n<h2>Contacto</h2>\n<h4>T: (+34) 931. 798. 533<br /> F: (+34) 931. 798. 533<br />E: <a href="mailto:info@memestudio.es">info@memestudio.es</a></h4>', 'es'),
(14, 'about_us_fulvio_etna', 'Detalles Fulvio Etna', '<h2>Fulvio Etna</h2>\n<h3>Fot&oacute;grafo</h3>\n<p><a href="mailto:fulvio@memestudio.es">Fulvio@memestudio.es</a></p>\n<p class="MsoNormal">Meme studio nace con vocaci&oacute;n multidisciplinar. Es por ello que cuenta con departamento de fotograf&iacute;a, dise&ntilde;o gr&aacute;fico y retoque fotogr&aacute;fico capaz de interpretar y plasmar cualquier proyecto arquitect&oacute;nico o de interiorismo, sea para portafolios empresariales como para la publicaci&oacute;n en medios especializados. Esta experiencia nos permite tambi&eacute;n abordar cualquier concepto o idea de tipo fotogr&aacute;fico o gr&aacute;fico para nuestros proyectos de interiorismo y llevarlos a cabo sobre cualquier soporte.</p>\n<p class="MsoNormal">&nbsp;</p>', 'es'),
(9, 'footer_details', 'Peu de pàgina', '<h4 class="adress">Carrer de Vilar&oacute;s 3-5, Local 7<br /> 08022, Barcelona<br /> T: (+34) 931. 798. 533<br /> E: <a href="mailto:info@memestudio.es">info@memestudio.es</a> </h4>', 'en'),
(10, 'contact_details', 'Dades de contacte', '<h2>Find us</h2>\n<h3><a href="https://maps.google.com/maps?q=Carrer+de+Vilarós,+3-5,+Barcelona,+Espanya&hl=en&ie=UTF8&ll=41.406477,2.1386&spn=0.007983,0.01929&sll=38.341656,-95.712891&sspn=33.98926,79.013672&oq=Carrer+de+Vilarós+3-5&hnear=Carrer+de+Vilarós,+3,+08022+Barcelona,+Catalunya,+Spain&t=m&z=16&iwloc=A">Carrer de Vilar&oacute;s 3-5, Local 7<br /> 08022, Barcelona</a></h3>\n<p>&nbsp;</p>\n<h2>Contact</h2>\n<h4>T: (+34) 931. 798. 533<br /> F: (+34) 931. 798. 533<br />E: <a href="mailto:info@memestudio.es">info@memestudio.es</a></h4>', 'en'),
(13, 'about_us_alessio_etna', 'Detalles Alessio Etna', '<h2>Alessio Etna</h2>\n<h3>Dise&ntilde;ador de interiores</h3>\n<p><a href="mailto:alessio@memestudio.es">info@memestudio.es</a></p>\n<p>Meme studio, es un despacho de interiorismo cuya m&aacute;xima es ofrecer al cliente un asesoramiento global, escuchando y analizando sus necesidades, ofreciendo un servicio integral que abarca todas las fases de desarrollo del proyecto, desde el concepto hasta su ejecuci&oacute;n.</p>', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_gallery`
--

CREATE TABLE IF NOT EXISTS `acms_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `position` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `acms_gallery`
--

INSERT INTO `acms_gallery` (`id`, `title`, `text`, `date`, `time`, `slug`, `position`, `status`, `featured`, `lang`, `seo_title`, `seo_page_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'aa', '<p>aaa desc</p>', '2011-12-04', '20:30:11', 'aa', 0, 0, 0, 'ca', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_groups`
--

CREATE TABLE IF NOT EXISTS `acms_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `acms_groups`
--

INSERT INTO `acms_groups` (`id`, `title`, `description`) VALUES
(4, 'Developer', 'Developer'),
(3, 'Administrator', 'Administrator'),
(2, 'Editor', 'Editor'),
(1, 'User', 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_images`
--

CREATE TABLE IF NOT EXISTS `acms_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` int(5) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `layout` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `position` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `featured` (`featured`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=383 ;

--
-- Volcar la base de datos para la tabla `acms_images`
--

INSERT INTO `acms_images` (`id`, `module`, `item_id`, `name`, `layout`, `date`, `time`, `title`, `text`, `status`, `featured`, `position`) VALUES
(2, 2, 1, 'P1010895.JPG', 'landscape', '2011-12-04', '20:35:29', 'P1010895', '', 1, 0, 2),
(3, 2, 1, 'P1010908.JPG', 'landscape', '2011-12-04', '20:35:29', 'P1010908', '', 1, 0, 1),
(4, 2, 1, 'P1010925.JPG', 'landscape', '2011-12-04', '20:35:29', 'P1010925', '', 1, 0, 3),
(13, 3, 1, 'Ducati_Streetfighter_848_2012_01_1680x1050.jpg', 'landscape', '2011-12-14', '18:17:46', 'Ducati_Streetfighter_848_2012_01_1680x1050', '', 1, 0, 1),
(14, 3, 3, 'abstract_0021.jpg', 'landscape', '2011-12-16', '15:49:53', 'abstract_0021', '', 1, 0, 1),
(15, 3, 4, '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_2011.jpg', 'landscape', '2011-12-22', '18:34:35', '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_2011', '', 1, 0, 1),
(16, 3, 5, '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_2011.jpg', 'landscape', '2011-12-22', '18:37:05', '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_2011', '', 1, 0, 1),
(17, 3, 6, '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20111.jpg', 'landscape', '2011-12-22', '18:51:24', '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20111', '', 1, 0, 1),
(18, 3, 7, '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20111.jpg', 'landscape', '2011-12-22', '18:51:36', '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20111', '', 1, 0, 1),
(19, 3, 8, '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20112.jpg', 'landscape', '2011-12-22', '19:09:24', '_Adria_Costa_38_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20112', '', 1, 0, 1),
(20, 3, 9, '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20112.jpg', 'landscape', '2011-12-22', '19:09:38', '_Adria_Costa_44_Cursa_David_Piedrabuena_Marato_TV3_Manlleu_20112', '', 1, 0, 1),
(21, 3, 10, 'DSC_9821.JPG', 'landscape', '2011-12-22', '19:09:50', 'DSC_9821', '', 1, 0, 1),
(22, 3, 11, 'DSC004522.JPG', 'landscape', '2011-12-26', '17:49:36', 'DSC004522', '', 1, 0, 1),
(23, 3, 12, 'Marie-France-01.jpg', 'portrait', '2012-01-18', '15:57:23', 'Marie-France-01', '', 1, 0, 1),
(24, 3, 13, 'P1000845.JPG', '', '2012-01-18', '16:14:55', 'P1000845', 'landscape', 1, 0, 1),
(25, 3, 14, 'Marie-France-011.jpg', 'portrait', '2012-01-18', '16:22:51', 'Marie-France-011', '', 1, 0, 1),
(26, 3, 15, 'IMG_0332.jpg', 'portrait', '2012-01-18', '16:25:01', 'IMG_0332', '', 1, 0, 1),
(27, 3, 16, 'IMG_03321.jpg', 'portrait', '2012-01-18', '16:29:33', 'IMG_03321', '', 1, 0, 1),
(28, 3, 18, 'IMG_03323.jpg', 'portrait', '2012-01-18', '16:32:07', 'IMG_03323', '', 1, 0, 1),
(157, 1, 107, '1_new_web.jpg', 'landscape', '2012-09-12', '11:39:47', '1_new_web', '', 1, 0, 1),
(94, 6, 8, 'meme_studio_zapatería_durany_shoes_041.jpg', 'landscape', '2012-07-02', '12:43:23', 'meme_studio_zapatería_durany_shoes_041', '', 1, 0, 3),
(268, 6, 8, 'meme_studio_zapatería_durany_shoes_032.jpg', 'landscape', '2012-09-17', '12:52:36', 'meme_studio_zapatería_durany_shoes_032', '', 1, 0, 1),
(266, 6, 8, 'meme_studio_zapatería_durany_shoes_012.jpg', 'landscape', '2012-09-17', '12:52:36', 'meme_studio_zapatería_durany_shoes_012', '', 1, 0, 2),
(267, 6, 8, 'meme_studio_zapatería_durany_shoes_025.jpg', 'landscape', '2012-09-17', '12:52:36', 'meme_studio_zapatería_durany_shoes_025', '', 1, 0, 5),
(139, 6, 4, 'meme_studio_In_Usual_06.jpg', 'landscape', '2012-08-20', '12:46:17', 'meme_studio_In_Usual_06', '', 1, 0, 4),
(57, 6, 3, 'meme_studio_Hotel_Rouge_02.jpg', 'landscape', '2012-07-01', '20:09:21', 'meme_studio_Hotel_Rouge_02', '', 1, 0, 2),
(58, 6, 3, 'meme_studio_Hotel_Rouge_03.jpg', 'landscape', '2012-07-01', '20:09:21', 'meme_studio_Hotel_Rouge_03', '', 1, 0, 1),
(59, 6, 3, 'meme_studio_Hotel_Rouge_04.jpg', 'landscape', '2012-07-01', '20:09:21', 'meme_studio_Hotel_Rouge_04', '', 1, 0, 5),
(60, 6, 3, 'meme_studio_Hotel_Rouge_05.jpg', 'landscape', '2012-07-01', '20:09:22', 'meme_studio_Hotel_Rouge_05', '', 1, 0, 4),
(158, 1, 106, '1_new_web1.jpg', 'landscape', '2012-09-12', '11:39:59', '1_new_web1', '', 1, 0, 1),
(159, 7, 105, '1.jpg', 'landscape', '2012-09-12', '12:10:03', '1', '', 1, 0, 1),
(120, 6, 4, 'meme_studio_In_Usual_052.jpg', 'landscape', '2012-07-02', '14:11:42', 'meme_studio_In_Usual_052', '', 1, 0, 3),
(119, 6, 4, 'meme_studio_In_Usual_042.jpg', 'landscape', '2012-07-02', '14:11:42', 'meme_studio_In_Usual_042', '', 1, 0, 2),
(118, 6, 4, 'meme_studio_In_Usual_032.jpg', 'landscape', '2012-07-02', '14:11:42', 'meme_studio_In_Usual_032', '', 1, 0, 1),
(143, 6, 7, 'meme_studio_Tepper_Jackson_051.jpg', 'landscape', '2012-08-20', '12:52:56', 'meme_studio_Tepper_Jackson_051', '', 1, 0, 6),
(138, 6, 3, 'meme_studio_Hotel_Rouge_012.jpg', 'landscape', '2012-08-20', '12:41:03', 'meme_studio_Hotel_Rouge_012', '', 1, 0, 3),
(341, 6, 5, 'P5096088.jpg', 'landscape', '2013-03-23', '12:39:37', 'P5096088', '', 1, 0, 9),
(334, 6, 5, 'P5096064_(2).jpg', 'landscape', '2013-03-23', '10:02:55', 'P5096064_(2)', '', 1, 0, 2),
(340, 6, 5, 'P5096084_Sombra_aclarada.jpg', 'landscape', '2013-03-23', '12:39:36', 'P5096084_Sombra_aclarada', '', 1, 0, 8),
(336, 6, 5, 'P5096081.jpg', 'landscape', '2013-03-23', '10:02:55', 'P5096081', '', 1, 0, 4),
(117, 6, 4, 'meme_studio_In_Usual_022.jpg', 'landscape', '2012-07-02', '14:11:42', 'meme_studio_In_Usual_022', '', 1, 0, 5),
(116, 6, 4, 'meme_studio_In_Usual_012.jpg', 'landscape', '2012-07-02', '14:11:42', 'meme_studio_In_Usual_012', '', 1, 0, 6),
(382, 6, 18, '873_597_Moinsa_(5).jpg', 'landscape', '2013-05-19', '11:21:49', '873_597_Moinsa_(5)', '', 1, 0, 1),
(86, 6, 7, 'meme_studio_Tepper_Jackson_01.jpg', 'portrait', '2012-07-02', '12:33:19', 'meme_studio_Tepper_Jackson_01', '', 1, 0, 1),
(87, 6, 7, 'meme_studio_Tepper_Jackson_02.jpg', 'landscape', '2012-07-02', '12:33:19', 'meme_studio_Tepper_Jackson_02', '', 1, 0, 2),
(142, 6, 7, 'meme_studio_Tepper_Jackson_041.jpg', 'landscape', '2012-08-20', '12:52:56', 'meme_studio_Tepper_Jackson_041', '', 1, 0, 5),
(140, 6, 7, 'meme_studio_Tepper_Jackson_011.jpg', 'landscape', '2012-08-20', '12:52:55', 'meme_studio_Tepper_Jackson_011', '', 1, 0, 3),
(141, 6, 7, 'meme_studio_Tepper_Jackson_031.jpg', 'landscape', '2012-08-20', '12:52:55', 'meme_studio_Tepper_Jackson_031', '', 1, 0, 4),
(95, 6, 8, 'meme_studio_zapatería_durany_shoes_051.jpg', 'landscape', '2012-07-02', '12:43:23', 'meme_studio_zapatería_durany_shoes_051', '', 1, 0, 4),
(294, 6, 10, 'meme_studio_Muntaner_252_02b1.jpg', 'landscape', '2012-11-13', '10:53:55', 'meme_studio_Muntaner_252_02b1', '', 1, 0, 10),
(293, 6, 10, 'meme_studio_Muntaner_252_022.jpg', 'landscape', '2012-11-13', '10:53:55', 'meme_studio_Muntaner_252_022', '', 1, 0, 11),
(101, 6, 9, 'meme_studio_Villarroel_011.jpg', 'landscape', '2012-07-02', '13:01:42', 'meme_studio_Villarroel_011', '', 1, 0, 1),
(102, 6, 9, 'meme_studio_Villarroel_021.jpg', 'portrait', '2012-07-02', '13:01:42', 'meme_studio_Villarroel_021', '', 1, 0, 2),
(103, 6, 9, 'meme_studio_Villarroel_031.jpg', 'portrait', '2012-07-02', '13:01:42', 'meme_studio_Villarroel_031', '', 1, 0, 3),
(104, 6, 9, 'meme_studio_Villarroel_041.jpg', 'portrait', '2012-07-02', '13:01:42', 'meme_studio_Villarroel_041', '', 1, 0, 4),
(105, 6, 9, 'meme_studio_Villarroel_051.jpg', 'portrait', '2012-07-02', '13:01:42', 'meme_studio_Villarroel_051', '', 1, 0, 5),
(129, 6, 8, 'meme_studio_zapatería_durany_shoes_081.png', 'landscape', '2012-08-20', '12:12:38', 'meme_studio_zapatería_durany_shoes_081', '', 1, 0, 7),
(128, 6, 8, 'meme_studio_zapatería_durany_shoes_072.png', 'landscape', '2012-08-20', '12:12:38', 'meme_studio_zapatería_durany_shoes_072', '', 1, 0, 6),
(130, 6, 8, 'meme_studio_zapatería_durany_shoes_092.png', 'landscape', '2012-08-20', '12:14:08', 'meme_studio_zapatería_durany_shoes_092', '', 1, 0, 8),
(350, 7, 116, 'sillon_nueva_york_tresserra.jpg', 'landscape', '2013-03-24', '10:05:15', 'sillon_nueva_york_tresserra', '', 1, 0, 1),
(300, 6, 10, 'meme_studio_Muntaner_252_05B_(2).jpg', 'landscape', '2012-11-13', '11:57:38', 'meme_studio_Muntaner_252_05B_(2)', '', 1, 0, 5),
(292, 6, 10, 'meme_studio_Muntaner_252_01b1.jpg', 'landscape', '2012-11-13', '10:53:55', 'meme_studio_Muntaner_252_01b1', '', 1, 0, 2),
(161, 7, 105, '5.jpg', 'landscape', '2012-09-12', '12:10:03', '5', '', 1, 0, 3),
(160, 7, 105, '2.jpg', 'landscape', '2012-09-12', '12:10:03', '2', '', 1, 0, 2),
(188, 8, 3, 'Fulvio_Etna_Casa_Paloma_68.jpg', 'portrait', '2012-09-12', '13:18:24', 'Fulvio_Etna_Casa_Paloma_68', '', 1, 0, 8),
(187, 8, 3, 'Fulvio_Etna_Casa_Paloma_661.jpg', 'portrait', '2012-09-12', '13:18:24', 'Fulvio_Etna_Casa_Paloma_661', '', 1, 0, 7),
(186, 8, 3, 'Fulvio_Etna_Casa_Paloma_651.jpg', 'portrait', '2012-09-12', '13:18:24', 'Fulvio_Etna_Casa_Paloma_651', '', 1, 0, 6),
(185, 8, 3, 'Fulvio_Etna_Casa_Paloma_631.jpg', 'portrait', '2012-09-12', '13:17:28', 'Fulvio_Etna_Casa_Paloma_631', '', 1, 0, 5),
(184, 8, 3, 'Fulvio_Etna_Casa_Paloma_621.jpg', 'landscape', '2012-09-12', '13:17:28', 'Fulvio_Etna_Casa_Paloma_621', '', 1, 0, 4),
(183, 8, 3, 'Fulvio_Etna_Casa_Paloma_611.jpg', 'portrait', '2012-09-12', '13:17:28', 'Fulvio_Etna_Casa_Paloma_611', '', 1, 0, 3),
(182, 8, 3, 'Fulvio_Etna_Casa_Paloma_601.jpg', 'landscape', '2012-09-12', '13:17:28', 'Fulvio_Etna_Casa_Paloma_601', '', 1, 0, 2),
(181, 8, 3, 'Fulvio_Etna_Casa_Paloma_591.jpg', 'landscape', '2012-09-12', '13:17:28', 'Fulvio_Etna_Casa_Paloma_591', '', 1, 0, 1),
(189, 8, 3, 'Fulvio_Etna_Casa_Paloma_70.jpg', 'landscape', '2012-09-12', '13:18:24', 'Fulvio_Etna_Casa_Paloma_70', '', 1, 0, 9),
(190, 8, 3, 'Fulvio_Etna_Casa_Paloma_72.jpg', 'portrait', '2012-09-12', '13:18:24', 'Fulvio_Etna_Casa_Paloma_72', '', 1, 0, 10),
(200, 8, 4, 'Fulvio_Etna_Replay_321.jpg', 'landscape', '2012-09-12', '13:46:46', 'Fulvio_Etna_Replay_321', '', 1, 0, 5),
(198, 8, 4, 'Fulvio_Etna_Replay_301.jpg', 'landscape', '2012-09-12', '13:46:46', 'Fulvio_Etna_Replay_301', '', 1, 0, 3),
(199, 8, 4, 'Fulvio_Etna_Replay_311.jpg', 'portrait', '2012-09-12', '13:46:46', 'Fulvio_Etna_Replay_311', '', 1, 0, 4),
(197, 8, 4, 'Fulvio_Etna_Replay_291.jpg', 'portrait', '2012-09-12', '13:46:46', 'Fulvio_Etna_Replay_291', '', 1, 0, 2),
(196, 8, 4, 'Fulvio_Etna_Replay_231.jpg', 'landscape', '2012-09-12', '13:46:46', 'Fulvio_Etna_Replay_231', '', 1, 0, 1),
(201, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_75.jpg', 'landscape', '2012-09-12', '13:52:52', 'Fulvio_Etna_Residencia_universitaria_Sarrià_75', '', 1, 0, 1),
(202, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_76.jpg', 'landscape', '2012-09-12', '13:52:52', 'Fulvio_Etna_Residencia_universitaria_Sarrià_76', '', 1, 0, 2),
(217, 8, 6, 'Fulvio_Etna_Paradís_SEAT_03.JPG', 'landscape', '2012-09-12', '14:02:16', 'Fulvio_Etna_Paradís_SEAT_03', '', 1, 0, 7),
(204, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_78.jpg', 'portrait', '2012-09-12', '13:52:52', 'Fulvio_Etna_Residencia_universitaria_Sarrià_78', '', 1, 0, 4),
(205, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_79.jpg', 'landscape', '2012-09-12', '13:52:52', 'Fulvio_Etna_Residencia_universitaria_Sarrià_79', '', 1, 0, 5),
(216, 8, 6, 'Fulvio_Etna_Paradís_SEAT_02.JPG', 'landscape', '2012-09-12', '14:02:16', 'Fulvio_Etna_Paradís_SEAT_02', '', 1, 0, 4),
(207, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_81.jpg', 'landscape', '2012-09-12', '13:54:20', 'Fulvio_Etna_Residencia_universitaria_Sarrià_81', '', 1, 0, 7),
(215, 8, 6, 'Fulvio_Etna_Paradís_SEAT_01.JPG', 'landscape', '2012-09-12', '14:02:16', 'Fulvio_Etna_Paradís_SEAT_01', '', 1, 0, 3),
(209, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_83.jpg', 'landscape', '2012-09-12', '13:54:21', 'Fulvio_Etna_Residencia_universitaria_Sarrià_83', '', 1, 0, 9),
(210, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_84.jpg', 'portrait', '2012-09-12', '13:54:21', 'Fulvio_Etna_Residencia_universitaria_Sarrià_84', '', 1, 0, 10),
(211, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_85.jpg', 'landscape', '2012-09-12', '13:55:47', 'Fulvio_Etna_Residencia_universitaria_Sarrià_85', '', 1, 0, 11),
(212, 8, 5, 'Fulvio_Etna_Residencia_universitaria_Sarrià_86.jpg', 'portrait', '2012-09-12', '13:55:47', 'Fulvio_Etna_Residencia_universitaria_Sarrià_86', '', 1, 0, 12),
(214, 8, 6, 'Fulvio_Etna_Paradís_SEAT_00.JPG', 'landscape', '2012-09-12', '14:02:16', 'Fulvio_Etna_Paradís_SEAT_00', '', 1, 0, 6),
(218, 8, 6, 'Fulvio_Etna_Paradís_SEAT_04.JPG', 'landscape', '2012-09-12', '14:02:16', 'Fulvio_Etna_Paradís_SEAT_04', '', 1, 0, 1),
(219, 8, 6, 'Fulvio_Etna_Paradís_SEAT_05.JPG', 'landscape', '2012-09-12', '14:09:26', 'Fulvio_Etna_Paradís_SEAT_05', '', 1, 0, 8),
(220, 8, 6, 'Fulvio_Etna_Paradís_SEAT_06.JPG', 'landscape', '2012-09-12', '14:09:26', 'Fulvio_Etna_Paradís_SEAT_06', '', 1, 0, 9),
(221, 8, 6, 'Fulvio_Etna_Paradís_SEAT_07.JPG', 'landscape', '2012-09-12', '14:09:26', 'Fulvio_Etna_Paradís_SEAT_07', '', 1, 0, 2),
(222, 8, 6, 'Fulvio_Etna_Paradís_SEAT_08.JPG', 'landscape', '2012-09-12', '14:09:26', 'Fulvio_Etna_Paradís_SEAT_08', '', 1, 0, 10),
(223, 8, 6, 'Fulvio_Etna_Paradís_SEAT_09.JPG', 'landscape', '2012-09-12', '14:09:26', 'Fulvio_Etna_Paradís_SEAT_09', '', 1, 0, 5),
(250, 6, 12, 'memestudio_Textura_711.jpg', 'landscape', '2012-09-17', '11:17:29', 'memestudio_Textura_711', '', 1, 0, 3),
(248, 6, 12, 'memestudio_Textura_731.jpg', 'landscape', '2012-09-17', '11:17:29', 'memestudio_Textura_731', '', 1, 0, 1),
(249, 6, 12, 'memestudio_Textura_721.jpg', 'landscape', '2012-09-17', '11:17:29', 'memestudio_Textura_721', '', 1, 0, 2),
(251, 6, 12, 'memestudio_Textura_701.jpg', 'landscape', '2012-09-17', '11:17:29', 'memestudio_Textura_701', '', 1, 0, 4),
(252, 6, 13, 'memestudio_Uno_de_50_74.jpg', 'landscape', '2012-09-17', '11:24:47', 'memestudio_Uno_de_50_74', '', 1, 0, 2),
(253, 6, 13, 'memestudio_Uno_de_50_75.jpg', 'landscape', '2012-09-17', '11:24:47', 'memestudio_Uno_de_50_75', '', 1, 0, 1),
(254, 6, 13, 'memestudio_Uno_de_50_76.jpg', 'landscape', '2012-09-17', '11:24:47', 'memestudio_Uno_de_50_76', '', 1, 0, 3),
(255, 6, 13, 'memestudio_Uno_de_50_77.jpg', 'landscape', '2012-09-17', '11:24:47', 'memestudio_Uno_de_50_77', '', 1, 0, 4),
(256, 6, 13, 'memestudio_Uno_de_50_78.jpg', 'landscape', '2012-09-17', '11:24:47', 'memestudio_Uno_de_50_78', '', 1, 0, 5),
(257, 6, 13, 'memestudio_Uno_de_50_79.jpg', 'landscape', '2012-09-17', '11:25:30', 'memestudio_Uno_de_50_79', '', 1, 0, 6),
(258, 6, 14, 'memestudio_Misako_80.jpg', 'landscape', '2012-09-17', '11:37:14', 'memestudio_Misako_80', '', 1, 0, 3),
(259, 6, 14, 'memestudio_Misako_81.jpg', 'landscape', '2012-09-17', '11:37:14', 'memestudio_Misako_81', '', 1, 0, 4),
(260, 6, 14, 'memestudio_Misako_82.jpg', 'landscape', '2012-09-17', '11:37:14', 'memestudio_Misako_82', '', 1, 0, 2),
(261, 6, 15, 'memestudio_Sant_Fost_de_Campcentelles_83.jpg', 'landscape', '2012-09-17', '11:50:30', 'memestudio_Sant_Fost_de_Campcentelles_83', '', 1, 0, 5),
(262, 6, 15, 'memestudio_Sant_Fost_de_Campcentelles_84.jpg', 'landscape', '2012-09-17', '11:50:30', 'memestudio_Sant_Fost_de_Campcentelles_84', '', 1, 0, 3),
(263, 6, 15, 'memestudio_Sant_Fost_de_Campcentelles_85.jpg', 'landscape', '2012-09-17', '11:50:30', 'memestudio_Sant_Fost_de_Campcentelles_85', '', 1, 0, 4),
(264, 6, 15, 'memestudio_Sant_Fost_de_Campcentelles_86.jpg', 'landscape', '2012-09-17', '11:50:30', 'memestudio_Sant_Fost_de_Campcentelles_86', '', 1, 0, 1),
(265, 6, 15, 'memestudio_Sant_Fost_de_Campcentelles_87.jpg', 'landscape', '2012-09-17', '11:50:30', 'memestudio_Sant_Fost_de_Campcentelles_87', '', 1, 0, 2),
(269, 6, 8, 'meme_studio_zapatería_durany_shoes_10.jpg', 'landscape', '2012-09-17', '12:52:36', 'meme_studio_zapatería_durany_shoes_10', '', 1, 0, 9),
(339, 6, 5, 'P5096066.jpg', 'landscape', '2013-03-23', '12:37:08', 'P5096066', '', 1, 0, 7),
(338, 6, 5, 'P5096096.jpg', 'portrait', '2013-03-23', '10:02:55', 'P5096096', '', 1, 0, 6),
(271, 6, 3, 'meme_studio_Hotel_Rouge_06.jpg', 'landscape', '2012-09-17', '13:05:43', 'meme_studio_Hotel_Rouge_06', '', 1, 0, 6),
(273, 6, 16, 'memestudio_Cimbali_93.jpg', 'landscape', '2012-09-17', '13:27:55', 'memestudio_Cimbali_93', '', 1, 0, 1),
(279, 7, 106, '11.jpg', 'landscape', '2012-09-26', '12:15:49', '11', '', 1, 0, 1),
(280, 7, 106, '21.jpg', 'landscape', '2012-09-26', '12:15:49', '21', '', 1, 0, 2),
(281, 7, 106, '51.jpg', 'landscape', '2012-09-26', '12:15:49', '51', '', 1, 0, 3),
(298, 6, 10, 'meme_studio_Muntaner_252_04b1.jpg', 'landscape', '2012-11-13', '10:56:09', 'meme_studio_Muntaner_252_04b1', '', 1, 0, 16),
(301, 6, 10, 'meme_studio_Muntaner_252_05C.jpg', 'landscape', '2012-11-13', '11:57:38', 'meme_studio_Muntaner_252_05C', '', 1, 0, 7),
(304, 1, 109, 'memestudio_puertas_albed_ALBED.jpg', 'landscape', '2012-12-10', '10:39:20', 'memestudio_puertas_albed_ALBED', '', 1, 0, 1),
(352, 7, 116, '1144201.jpg', 'landscape', '2013-03-24', '10:23:23', '1144201', '', 1, 0, 2),
(296, 6, 10, 'meme_studio_Muntaner_252_3B.jpg', 'landscape', '2012-11-13', '10:56:09', 'meme_studio_Muntaner_252_3B', '', 1, 0, 9),
(351, 7, 117, 'sillon_nueva_york_tresserra1.jpg', 'landscape', '2013-03-24', '10:17:23', 'sillon_nueva_york_tresserra1', '', 1, 0, 1),
(305, 1, 108, 'memestudio_puertas_albed_ALBED1.jpg', 'landscape', '2012-12-10', '10:51:00', 'memestudio_puertas_albed_ALBED1', '', 1, 0, 1),
(299, 6, 10, 'meme_studio_Muntaner_252_05b1.jpg', 'landscape', '2012-11-13', '10:56:09', 'meme_studio_Muntaner_252_05b1', '', 1, 0, 6),
(345, 6, 10, 'HDR_senza_titolo25.jpg', 'landscape', '2013-03-24', '09:53:54', 'HDR_senza_titolo25', '', 1, 0, 14),
(313, 1, 111, 'memestudio_pergola_kettal4.jpg', 'landscape', '2012-12-10', '12:56:02', 'memestudio_pergola_kettal4', '', 1, 0, 1),
(314, 1, 110, 'memestudio_pergola_kettal5.jpg', 'landscape', '2012-12-10', '12:58:14', 'memestudio_pergola_kettal5', '', 1, 0, 1),
(316, 7, 110, 'memestudio_milk_design_2012.jpg', 'landscape', '2013-01-16', '10:24:29', 'memestudio_milk_design_2012', '', 1, 0, 1),
(317, 7, 111, 'memestudio_milk_design_20121.jpg', 'landscape', '2013-01-16', '10:27:30', 'memestudio_milk_design_20121', '', 1, 0, 1),
(318, 7, 113, 'fade_carousel-item-1.jpg', 'landscape', '2013-01-25', '09:46:32', 'fade_carousel-item-1', '', 1, 0, 1),
(319, 7, 113, 'fade_carousel-item-2.jpg', 'landscape', '2013-01-25', '09:46:32', 'fade_carousel-item-2', '', 1, 0, 2),
(320, 7, 112, 'fade_carousel-item-21.jpg', 'landscape', '2013-01-25', '09:47:36', 'fade_carousel-item-21', '', 1, 0, 1),
(321, 7, 112, 'fade_carousel-item-11.jpg', 'landscape', '2013-01-25', '09:47:36', 'fade_carousel-item-11', '', 1, 0, 2),
(322, 7, 114, 'THESEBY.jpg', 'landscape', '2013-03-23', '09:35:06', 'THESEBY', '', 1, 0, 1),
(323, 7, 115, 'THESEBY1.jpg', 'landscape', '2013-03-23', '09:39:49', 'THESEBY1', '', 1, 0, 1),
(333, 6, 5, 'P5096050+cuadro.jpg', 'landscape', '2013-03-23', '09:58:04', 'P5096050+cuadro', '', 1, 0, 1),
(342, 6, 5, 'P5096106-2.jpg', 'portrait', '2013-03-23', '12:39:37', 'P5096106-2', '', 1, 0, 10),
(343, 6, 14, 'HDR_senza_titolo11pg.jpg', 'landscape', '2013-03-23', '12:45:58', 'HDR_senza_titolo11pg', '', 1, 0, 1),
(344, 6, 10, 'HDR_senza_titolo26.jpg', 'landscape', '2013-03-24', '09:50:42', 'HDR_senza_titolo26', '', 1, 0, 1),
(346, 6, 10, 'HDR_senza_titolo24.jpg', 'landscape', '2013-03-24', '09:53:54', 'HDR_senza_titolo24', '', 1, 0, 15),
(347, 6, 10, 'HDR_senza_titolo23.jpg', 'landscape', '2013-03-24', '09:53:54', 'HDR_senza_titolo23', '', 1, 0, 8),
(348, 6, 10, 'HDR_senza_titolo17.jpg', 'landscape', '2013-03-24', '09:53:54', 'HDR_senza_titolo17', '', 1, 0, 4),
(349, 6, 10, 'HDR_senza_titolo18.jpg', 'landscape', '2013-03-24', '09:53:54', 'HDR_senza_titolo18', '', 1, 0, 3),
(353, 7, 116, '2197115035_df5c2c55dc_o.jpg', 'landscape', '2013-03-24', '10:23:23', '2197115035_df5c2c55dc_o', '', 1, 0, 3),
(354, 7, 116, 'banco_africa_tresserra.jpg', 'landscape', '2013-03-24', '10:23:23', 'banco_africa_tresserra', '', 1, 0, 4),
(355, 7, 116, 'joyero-por-jaime-tresserra-clapc3a9s-5.jpg', 'landscape', '2013-03-24', '10:23:23', 'joyero-por-jaime-tresserra-clapc3a9s-5', '', 1, 0, 5),
(356, 7, 116, 'detalle6.jpg', 'landscape', '2013-03-24', '10:23:23', 'detalle6', '', 1, 0, 6),
(357, 7, 117, '2197115035_df5c2c55dc_o1.jpg', 'landscape', '2013-03-24', '10:24:04', '2197115035_df5c2c55dc_o1', '', 1, 0, 2),
(358, 7, 117, 'banco_africa_tresserra1.jpg', 'landscape', '2013-03-24', '10:24:04', 'banco_africa_tresserra1', '', 1, 0, 3),
(359, 7, 117, 'joyero-por-jaime-tresserra-clapc3a9s-51.jpg', 'landscape', '2013-03-24', '10:24:04', 'joyero-por-jaime-tresserra-clapc3a9s-51', '', 1, 0, 4),
(360, 7, 117, 'detalle61.jpg', 'landscape', '2013-03-24', '10:24:04', 'detalle61', '', 1, 0, 5),
(361, 7, 117, '11442011.jpg', 'landscape', '2013-03-24', '10:24:04', '11442011', '', 1, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_labels`
--

CREATE TABLE IF NOT EXISTS `acms_labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identificator` (`identifier`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Volcar la base de datos para la tabla `acms_labels`
--

INSERT INTO `acms_labels` (`id`, `identifier`, `text`, `lang`) VALUES
(51, 'projects_team', 'Photo', 'en'),
(50, 'projects_team', 'Foto', 'es'),
(49, 'projects_photographer', 'Team', 'en'),
(48, 'projects_photographer', 'Equipo', 'es'),
(47, 'projects_area', 'Area', 'en'),
(46, 'projects_area', 'Superfície', 'es'),
(45, 'projects_year', '', 'en'),
(44, 'projects_year', '', 'es'),
(43, 'projects_location', 'Location', 'en'),
(42, 'projects_location', 'Situación', 'es'),
(41, 'projects_customer', 'Customer', 'en'),
(40, 'projects_customer', 'Cliente', 'es'),
(14, 'site_name', 'Meme Studio', 'es'),
(15, 'latest_news', 'Noticias', 'es'),
(16, 'subscribe_newsletter', 'Suscríbite a nuestro Newsletter', 'es'),
(17, 'read_more', 'Leer más +', 'es'),
(18, 'pagination_previous', 'Anterior', 'es'),
(19, 'pagination_next', 'Siguiente', 'es'),
(20, 'contact_form', 'Formulario de contacto', 'es'),
(27, 'site_name', 'Meme Studio', 'en'),
(28, 'latest_news', 'News', 'en'),
(29, 'subscribe_newsletter', 'Signup to our Newsletter', 'en'),
(30, 'read_more', 'Read more +', 'en'),
(31, 'pagination_previous', 'Previous', 'en'),
(32, 'pagination_next', 'Next', 'en'),
(33, 'contact_form', 'Contact form', 'en'),
(52, 'google_analytics_UA', 'UA-39522783-1', 'es'),
(53, 'google_analytics_UA', 'UA-39522783-1', 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_menu_items`
--

CREATE TABLE IF NOT EXISTS `acms_menu_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(20) DEFAULT NULL,
  `position` float DEFAULT NULL,
  `parent` float DEFAULT '0',
  `url` varchar(225) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `target` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcar la base de datos para la tabla `acms_menu_items`
--

INSERT INTO `acms_menu_items` (`id`, `menu_id`, `position`, `parent`, `url`, `title`, `status`, `target`) VALUES
(1, '1', 1, 0, '/', 'Galeria', 1, 0),
(2, '1', 2, 0, 'actual', 'Exposició actual', 1, 0),
(3, '1', 3, 0, 'anteriors', 'Exposicions anteriors', 1, 0),
(4, '1', 4, 0, 'obra-grafica', 'Obra gràfica', 1, 0),
(5, '1', 5, 0, 'artistes', 'Artistes', 1, 0),
(6, '1', 6, 0, 'noticies', 'Notícies', 1, 0),
(7, '1', 7, 0, 'contacte', 'Contacte', 1, 0),
(8, '2', 1, 0, '/', 'Home', 1, 0),
(9, '2', 2, 0, 'proyectos', 'Proyectos', 1, 0),
(10, '2', 3, 0, 'fotografia', 'Fotografía', 1, 0),
(13, '2', 4, 0, 'noticias', 'Noticias', 1, 0),
(14, '2', 6, 0, 'contacto', 'Contacto', 1, 0),
(15, '3', 1, 0, 'en', 'Home', 1, 0),
(16, '3', 2, 0, 'en/projects', 'Projects', 1, 0),
(17, '3', 3, 0, 'en/photography', 'Photography', 1, 0),
(23, '2', 5, 0, 'nosotros', 'Nosotros', 1, 0),
(22, '3', 5, 0, 'en/about', 'About us', 1, 0),
(20, '3', 4, 0, 'en/news', 'News', 1, 0),
(21, '3', 6, 0, 'en/contact', 'Contact', 1, 0);

INSERT INTO `acms_menu_items` (`id`, `menu_id`, `position`, `parent`, `url`, `title`, `status`, `target`) VALUES
(1, '1', 1, 0, '/', 'Galeria', 1, 0),
(2, '1', 2, 0, 'actual', 'Exposició actual', 1, 0),
(3, '1', 3, 0, 'anteriors', 'Exposicions anteriors', 1, 0),
(4, '1', 4, 0, 'obra-grafica', 'Obra gràfica', 1, 0),
(5, '1', 5, 0, 'artistes', 'Artistes', 1, 0),
(6, '1', 6, 0, 'noticies', 'Notícies', 1, 0),
(7, '1', 7, 0, 'contacte', 'Contacte', 1, 0),
(8, '2', 1, 0, '/', 'Home', 1, 0),
(9, '2', 2, 0, 'proyectos', 'Proyectos', 1, 0),
(10, '2', 3, 0, 'fotografia', 'Fotografía', 1, 0),
(13, '2', 4, 0, 'noticias', 'Noticias', 1, 0),
(14, '2', 6, 0, 'contacto', 'Contacto', 1, 0),
(15, '3', 1, 0, 'en', 'Home', 1, 0),
(16, '3', 2, 0, 'en/projects', 'Projects', 1, 0),
(17, '3', 3, 0, 'en/photography', 'Photography', 1, 0),
(23, '2', 5, 0, 'nosotros', 'Nosotros', 1, 0),
(22, '3', 5, 0, 'en/about', 'About us', 1, 0),
(20, '3', 4, 0, 'en/news', 'News', 1, 0),
(21, '3', 6, 0, 'en/contact', 'Contact', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_menus`
--

CREATE TABLE IF NOT EXISTS `acms_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(100) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `lang` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `acms_menus`
--

INSERT INTO `acms_menus` (`id`, `identifier`, `text`, `lang`) VALUES
(2, 'main', 'Principal', 'es'),
(3, 'main', 'Home', 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_news`
--

CREATE TABLE IF NOT EXISTS `acms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `video` varchar(2083) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`,`lang`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Volcar la base de datos para la tabla `acms_news`
--

INSERT INTO `acms_news` (`id`, `title`, `short_text`, `text`, `date`, `time`, `video`, `slug`, `seo_title`, `seo_page_title`, `meta_keywords`, `meta_description`, `status`, `lang`) VALUES
(106, 'Nueva web Memestudio', 'Memestudio está de estreno con una nueva web.', '<p>Memestudio est&aacute; de estreno con una nueva web que servir&aacute; de escaparate del trabajo que realizamos en el estudio. Renovamos contenidos con nuevos proyectos de interiorismo y fotograf&iacute;a adem&aacute;s de estrenar apartados como <a href="/blog">blog </a>y <a href="/noticias">noticias</a>.</p>', '2012-10-02', '10:58:46', '', 'feria-de-diseno-en-barcelona', '', '', '', '', 1, 'es'),
(107, 'Nueva web Memestudio', 'Memestudio está de estreno con una nueva web.', '<p>Memestudio est&aacute; de estreno con una nueva web que servir&aacute; de escaparate del trabajo que realizamos en el estudio. Renovamos contenidos con nuevos proyectos de interiorismo y fotograf&iacute;a adem&aacute;s de estrenar apartados como <a href="/blog">blog </a>y <a href="/noticias">noticias</a></p>', '2012-10-02', '11:27:34', '', 'new-site-memestudio', '', '', '', '', 1, 'en'),
(108, 'Puertas ALBED', 'Ya nos han llegado de Italia las puertas para la obra en Caldes d''Estrac.', '<p>Ya nos han llegado de Italia las puertas para la obra en Caldes d''Estrac. Hemos elegido&nbsp; un sistema de puertas de ALBED por sus acabados. Unas puertas a medida en estructura de aluminio lacado y vidrio tintado que carecen de tapetas. Visten los espacios y aportan un toque sosfisticado por sus l&iacute;neas puras y cuidado de los detalles.</p>', '2012-11-01', '10:07:05', '', 'puertas-albed', '', '', '', '', 1, 'es'),
(109, 'Puertas ALBED', 'Ya nos han llegado de Italia las puertas para la obra en Caldes d''Estrac.', '<p>Ya nos han llegado de Italia las puertas para la obra en Caldes d''Estrac. Hemos elegido&nbsp; un sistema de puertas de ALBED por sus acabados . Unas puertas a medida en estructura de aluminio lacado y vidrio tintado que carecen de tapetas. Visten los espacios y aportan un toque sosfisticado por sus l&iacute;neas puras y cuidado de los detalles.</p>', '2012-11-01', '10:18:58', '', 'puertas-albed', '', '', '', '', 1, 'en'),
(110, 'Pabellón KETTAL', 'Hemos elegido un Pabellón doble de KETTAL Para el diseño del jardín en Caldes d''Estrac', '<p>Para el dise&ntilde;o del jard&iacute;n de la obra en Caldes d''Estrac hemos elegido un Pabell&oacute;n doble de KETTAL. Recurre a formas arquitect&oacute;nicas modernas para poner en valor la naturaleza del entorno exterior. Una p&eacute;rgola en aluminio lacado en blanco que nos permite crear varios&nbsp; ambientes disfrutando de las vistas del mar. &nbsp;&nbsp;</p>', '2012-12-10', '12:34:21', '', 'pabellon-kettal', '', '', '', '', 1, 'es'),
(111, 'Pabellón KETTAL', 'Hemos elegido un Pabellón doble de KETTAL Para el diseño del jardín en Caldes d''Estrac', '<p>Para el dise&ntilde;o del jard&iacute;n de la obra en Caldes d''Estrac hemos elegido un Pabell&oacute;n doble de KETTAL. Recurre a formas arquitect&oacute;nicas modernas para poner en valor la naturaleza del entorno exterior. Una p&eacute;rgola en aluminio lacado en blanco que nos permite crear varios&nbsp; ambientes disfrutando de las vistas del mar. &nbsp;</p>', '2012-12-10', '12:48:05', '', 'pabellon-kettal', '', '', '', '', 1, 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_pages`
--

CREATE TABLE IF NOT EXISTS `acms_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `text` text,
  `seo_title` varchar(200) DEFAULT NULL,
  `seo_page_title` varchar(200) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `meta_keywords` varchar(150) DEFAULT NULL,
  `meta_description` varchar(150) DEFAULT NULL,
  `lang` varchar(3) DEFAULT NULL,
  `tpl` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `acms_pages`
--

INSERT INTO `acms_pages` (`id`, `title`, `text`, `seo_title`, `seo_page_title`, `slug`, `meta_keywords`, `meta_description`, `lang`, `tpl`) VALUES
(37, 'Blog', '', '', 'Blog', 'blog', '', '', 'en', 'default'),
(36, 'Blog', '', '', 'Blog', 'blog', '', '', 'es', 'default'),
(35, 'Photography', '', '', '', 'photography', '', '', 'en', 'working'),
(14, 'Noticias', '', '', '', 'noticias', '', '', 'es', 'default'),
(15, 'Contacto', '', '', '', 'contacto', '', '', 'es', 'contact'),
(17, 'Inicio', '', '', '', '/', '', '', 'es', 'homepage'),
(19, 'Contact', '', '', '', 'contact', '', '', 'en', 'contact'),
(34, 'Fotografía', '', '', '', 'fotografia', '', '', 'es', 'working'),
(33, 'About us', '', '', '', 'about', '', '', 'en', 'about'),
(32, 'Nosotros', '', '', '', 'nosotros', '', '', 'es', 'about'),
(23, 'News', '', '', '', 'news', '', '', 'en', 'default'),
(25, 'Home', '', '', '', '/', '', '', 'en', 'homepage'),
(26, 'RSS de notícies', '', '', '', 'news-rss', '', '', 'ca', 'default'),
(27, 'RSS de noticias', '', '', '', 'news-rss', '', '', 'es', 'default'),
(28, 'RSS news', '', '', '', 'news-rss', '', '', 'en', 'default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_photography`
--

CREATE TABLE IF NOT EXISTS `acms_photography` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `realized_by_collaborator` tinyint(1) NOT NULL,
  `title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text_es` text COLLATE utf8_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8_unicode_ci NOT NULL,
  `customer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photographer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `team` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug_es` (`slug_es`),
  KEY `slug_en` (`slug_en`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `acms_photography`
--

INSERT INTO `acms_photography` (`id`, `date`, `realized_by_collaborator`, `title_es`, `title_en`, `text_es`, `text_en`, `customer`, `location`, `year`, `area`, `photographer`, `team`, `slug_es`, `slug_en`, `seo_title_es`, `seo_title_en`, `seo_page_title_es`, `seo_page_title_en`, `meta_keywords_es`, `meta_keywords_en`, `meta_description_es`, `meta_description_en`, `status`) VALUES
(2, '2011-01-12', 0, 'Academia Bacardi', 'Bacardi Academy', '<p>Academia Bacardi</p>', '<p>Bacardi Academy</p>', 'Bacardi', 'Barcelona', '2010', '', 'Fulvio Etna', '', 'academia-bacardi', 'bacardi-academy', '', '', '', '', '', '', '', '', 1),
(3, '2012-03-17', 0, 'Casa Paloma', 'Casa Paloma', '<p>Restaurante Casa Paloma</p>', '<p>Casa Paloma Restaurant</p>', 'Casa Paloma', 'Barcelona', '2011', '', 'Fulvio Etna', '', 'casa-paloma', 'casa-paloma', '', '', '', '', '', '', '', '', 1),
(4, '2012-09-12', 0, 'Replay Store', 'Replay Store', '<p>Replay Store Paseo de Gracia</p>', '<p>Replay Store Paseo de Gracia</p>', 'Replay', 'Barcelona', '2011', '', 'Fulvio Etna', '', 'replay-store', 'replay-store', '', '', '', '', '', '', '', '', 1),
(5, '2011-05-11', 0, 'Residencia Universitaria Sarrià', 'University Residence Sarrià', '<p>Residencia Universitaria Sarri&agrave;</p>', '<p>University Residence Sarri&agrave;</p>', 'Residencia Universitaria Sarrià', 'Barcelona', '2012', '', 'Fulvio Etna', '', 'residencia-universitaria-sarria', 'university-residence-sarria', '', '', '', '', '', '', '', '', 1),
(6, '2010-05-02', 0, 'Evento Seat', 'Seat event', '<p>Evento Seat</p>', '<p>Seat Event</p>', 'Paradís', 'Barcelona', '2010', '', 'Fulvio Etna', '', 'evento-seat', 'seat-event', '', '', '', '', '', '', '', '', 1),
(9, '2013-05-19', 0, 'IPCleaning', 'IPCleaning', '<p>Fotograf&iacute;as para cat&aacute;logo general y packaging IPCleaning</p>', '<p>IPCleaning catalogue and packaging photography</p>', 'IPCleaning', '', '2012', '', '', '<p>Fulvio Etna</p>', 'ipcleaning', 'ipcleaning', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_projects`
--

CREATE TABLE IF NOT EXISTS `acms_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `realized_by_collaborator` tinyint(1) NOT NULL,
  `title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text_es` text COLLATE utf8_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8_unicode_ci NOT NULL,
  `customer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photographer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `team` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug_es` (`slug_es`),
  KEY `slug_en` (`slug_en`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `acms_projects`
--

INSERT INTO `acms_projects` (`id`, `date`, `realized_by_collaborator`, `title_es`, `title_en`, `text_es`, `text_en`, `customer`, `location`, `year`, `area`, `photographer`, `team`, `slug_es`, `slug_en`, `seo_title_es`, `seo_title_en`, `seo_page_title_es`, `seo_page_title_en`, `meta_keywords_es`, `meta_keywords_en`, `meta_description_es`, `meta_description_en`, `status`) VALUES
(8, '2011-01-02', 0, 'Zapatería Durany Shoes', 'Durany Shoes Shop', '<p>Dise&ntilde;o de zapater&iacute;a en Barcelona</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps">Design</span> <span class="hps">shoe store in</span> <span class="hps">Barcelona</span></span></p>', '', 'Barcelona', '', '25m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'durany-shoes', 'durany-shoes', '', '', '', '', '', '', '', '', 1),
(3, '2011-07-01', 0, 'Hotel Rouge', 'Rouge Hotel', '<p>Dise&ntilde;o de Hotel a las afueras de Gerona.</p>', '<p>Design Hotel on the outskirts of Girona.</p>', '', 'Gerona', '', '400m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'hotel-rouge', 'rouge-hotel', '', '', '', '', '', '', '', '', 1),
(4, '2012-03-02', 0, 'Boutique In-Usual', 'Boutique In-Usual', '<p>Tienda de ropa en Barcelona</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps">Clothing Store</span> <span class="hps">in</span> <span class="hps">Barcelona</span></span></p>', '', 'Barcelona', '', '50m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'in-usual', 'in-usual', '', '', '', '', '', '', '', '', 1),
(5, '2012-03-30', 0, 'Restaurante Le Bimbe', 'Restaurante Le Bimbe', '<p>Restaurante italiano en Barcelona</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps">Italian restaurant in</span> <span class="hps">Barcelona</span></span></p>', '', 'Barcelona', '', '110m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'le-bimbe', 'le-bimbe', '', '', '', '', '', '', '', '', 1),
(18, '2012-05-01', 0, 'Oficinas Moinsa', 'Moinsa Office', '<p>Dise&ntilde;o y reforma integral de sede central en Barcelona de la constructora MOINSA.</p>', '<p><span id="result_box" lang="en"><span class="hps">Design</span> <span class="hps">and</span> <span class="hps alt-edited">integral</span> <span class="hps">reform</span> <span class="hps">headquarters in Barcelona</span> <span class="hps alt-edited">of the construction company</span> <span class="hps">MOINSA</span><span>.</span></span></p>', 'CONSTRUCTORA MOINSA', 'Barcelona', '', '250 mq', 'Alessio Etna', '<p>Fulvio Etna</p>', 'oficinas-monisa', 'moinsa-office', '', '', '', '', '', '', '', '', 1),
(7, '2012-05-28', 0, 'Boutique Tepper Jackson', 'Boutique Tepper Jackson', '<p>Boutique de ropa y complementos</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps">Boutique</span> <span class="hps alt-edited">of clothing and accessories</span></span></p>', '', 'Barcelona', '', '40m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'tepper-jackson', 'tepper-jackson', '', '', '', '', '', '', '', '', 1),
(9, '2011-07-05', 0, 'Piso en Villarroel', 'Flat Villarroel', '<p>Reforma de piso en el Eixample de Barcelona</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps">Reform</span> <span class="hps alt-edited">apartment in the</span> <span class="hps alt-edited">Eixample district of Barcelona</span></span></p>', '', 'Barcelona', '', '80m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'villarroel', 'villarroel', '', '', '', '', '', '', '', '', 1),
(10, '2012-03-10', 0, 'Piso en Muntaner 252', 'Muntaner 252 Apartment', '<p>Proyecto de reforma e interiorismo de piso en el Eixample de Barcelona</p>', '<p>Reform project and interior design of apartment in the Eixample district of Barcelona</p>', '', 'Barcelona', '', '180m²', 'Alessio Etna', '<p>Fulvio Etna</p>', 'muntaner-252', 'muntaner-252', '', '', '', '', '', '', '', '', 1),
(12, '2012-09-17', 1, 'Textura', 'Textura', '<p>Proyecto de franqu&iacute;cia para Textura.</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps alt-edited">Project</span> <span class="hps alt-edited">for</span> <span class="hps">texture</span> <span class="hps">franchise</span><span>.</span></span></p>', 'Textura', 'Barcelona', '', '', 'Alessio Etna', '', 'textura', 'textura', '', '', '', '', '', '', '', '', 1),
(13, '2012-09-17', 1, 'Uno de 50', 'Uno de 50', '<p>Proyecto de franqu&iacute;cia para Uno de 50.</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps alt-edited">Project</span> <span class="hps alt-edited">for</span> Uno de 50 <span class="hps">franchise</span><span>.</span></span></p>', 'Uno de 50', 'Barcelona', '2012', '', '', '<p>Alessio Etna</p>', 'uno-de-50', 'uno-de-50', '', '', '', '', '', '', '', '', 0),
(14, '2011-05-17', 1, 'Misako', 'Misako', '<p>Proyecto de franqu&iacute;cia para Misako.</p>', '<p><span id="result_box" class="short_text" lang="en"><span class="hps alt-edited">Project</span> <span class="hps alt-edited">for</span> Misako <span class="hps">franchise</span><span>.</span></span></p>', 'Misako', 'Barcelona', '', '', 'Alessio Etna', '', 'misako', 'misako', '', '', '', '', '', '', '', '', 1),
(15, '2011-03-01', 0, 'Sant Fost de Campcentelles', 'Sant Fost de Campcentelles', '<p>Proyecto de reforma e interiorismo de Torre en Sant Fost de Campcentelles.</p>', '<p>Reform project and interior design of house in Sant Fost de Campcentelles.</p>', '', 'Sant Fost de Campcentelles', '', '180m²', '', '<p>Alessio Etna</p>', 'sant-fost-de-campcentelles', 'sant-fost-de-campcentelles', '', '', '', '', '', '', '', '', 1),
(16, '2011-03-05', 0, 'Cimbali', 'Cimbali', '<p>Proyecto de interiorismo del showroom para el fabricante de cafeteras profesionales Cimbali.</p>', '<p><span id="result_box" lang="en"><span class="hps">Showroom</span> <span class="hps">interior design project</span> <span class="hps">for</span> <span class="hps">professional coffee</span> <span class="hps">maker</span> <span class="hps">Cimbali</span><span>.</span></span></p>', 'Cimbali', 'Barcelona', '', '80m²', '', '<p>Alessio Etna</p>', 'cimbali', 'cimbali', '', '', '', '', '', '', '', '', 1);


CREATE TABLE IF NOT EXISTS `acms_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text_es` text COLLATE utf8_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `seo_page_title_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_es` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug_es` (`slug_es`),
  KEY `slug_en` (`slug_en`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `acms_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;