-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2013 a las 18:37:15
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `abrenet_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cp_carrousel`
--

CREATE TABLE IF NOT EXISTS `cp_carrousel` (
  `cr_id` int(255) NOT NULL AUTO_INCREMENT,
  `cr_img` text NOT NULL,
  `cr_url` text NOT NULL,
  `cr_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `cr_user` (`cr_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cp_carrousel`
--

INSERT INTO `cp_carrousel` (`cr_id`, `cr_img`, `cr_url`, `cr_user`) VALUES
(1, 'img/ecofuturo.png', 'http://www.ecofuturo.com.bo', 1),
(2, 'img/sartawi.png', 'http://www.sembrarsartawi.org', 1),
(3, 'img/credinform.png', 'http://www.credinformsa.com/', 1),
(4, 'img/beconomico.png', 'https://www.baneco.com.bo/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cp_slider`
--

CREATE TABLE IF NOT EXISTS `cp_slider` (
  `sl_id` int(255) NOT NULL AUTO_INCREMENT,
  `sl_img` text NOT NULL,
  `sl_descripcion` text NOT NULL,
  `sl_orden` int(255) NOT NULL,
  `sl_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`sl_id`),
  KEY `sl_user` (`sl_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cp_slider`
--

INSERT INTO `cp_slider` (`sl_id`, `sl_img`, `sl_descripcion`, `sl_orden`, `sl_user`) VALUES
(1, 'img/slide-01.jpg', 'slider 1', 1, 1),
(2, 'img/slide-02.jpg', 'slider 2', 2, 1),
(3, 'img/slide-03.jpg', 'slider 3', 3, 1),
(4, 'img/slide-04.jpg', 'slider 4', 4, 1),
(5, 'img/slide-05.jpg', 'slider 5', 5, 1),
(6, 'img/slide-06.jpg', 'slider 6', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cp_textbanner`
--

CREATE TABLE IF NOT EXISTS `cp_textbanner` (
  `tx_id` int(255) NOT NULL AUTO_INCREMENT,
  `tx_texto` text NOT NULL,
  `tx_idioma` varchar(2) NOT NULL,
  `tx_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`tx_id`),
  KEY `tx_user` (`tx_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `cp_textbanner`
--

INSERT INTO `cp_textbanner` (`tx_id`, `tx_texto`, `tx_idioma`, `tx_user`) VALUES
(1, 'Bancassurance has never been easier', 'EN', 1),
(2, 'Los Seguros masivos al alcance de tus manos', 'ES', 1),
(3, 'Insurance for everyone everywhere', 'EN', 1),
(4, 'Generate isurance policies on the fly', 'EN', 1),
(5, 'Easily interaction between insurance companies, retailers and brokers', 'EN', 1),
(6, 'Our Web Services experts will shortly integrate your banking core with our tool', 'EN', 1),
(7, 'Abrenet', 'EN', 1),
(8, 'Seguridad y simplicidad en Banca Seguros', 'ES', 1),
(9, 'Genera pÃ³lizas, certificados de cobertura y otros en minutos', 'ES', 1),
(10, 'Sencilla interacciÃ³n entre compaÃ±Ã­as de seguro, brokers y canales', 'ES', 1),
(11, 'Nuestros expertos en Web Services integrarÃ¡n su core bancario con nosotros rÃ¡pidamente', 'ES', 1),
(12, 'Abrenet', 'ES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cp_usuario`
--

CREATE TABLE IF NOT EXISTS `cp_usuario` (
  `us_id` int(255) NOT NULL AUTO_INCREMENT,
  `us_user` varchar(50) NOT NULL,
  `us_pass` text NOT NULL,
  `us_permiso` int(1) NOT NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `us_user` (`us_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cp_usuario`
--

INSERT INTO `cp_usuario` (`us_id`, `us_user`, `us_pass`, `us_permiso`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cp_carrousel`
--
ALTER TABLE `cp_carrousel`
  ADD CONSTRAINT `cp_carrousel_ibfk_1` FOREIGN KEY (`cr_user`) REFERENCES `cp_usuario` (`us_id`);

--
-- Filtros para la tabla `cp_slider`
--
ALTER TABLE `cp_slider`
  ADD CONSTRAINT `cp_slider_ibfk_1` FOREIGN KEY (`sl_user`) REFERENCES `cp_usuario` (`us_id`);

--
-- Filtros para la tabla `cp_textbanner`
--
ALTER TABLE `cp_textbanner`
  ADD CONSTRAINT `cp_textbanner_ibfk_1` FOREIGN KEY (`tx_user`) REFERENCES `cp_usuario` (`us_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
