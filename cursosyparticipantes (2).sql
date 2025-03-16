-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2025 a las 02:30:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursosyparticipantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Introducci?n a Laravel', 'Laravel es un framework de PHP...', 'Juan P?rez', '2025-02-26 13:46:52', '2025-02-26 13:46:52'),
(2, 'C?mo mejorar el SEO de tu sitio web', 'Para mejorar el SEO, debes optimizar...', 'Mar?a L?pez', '2025-02-26 13:46:52', '2025-02-26 13:46:52'),
(3, 'Tendencias en Desarrollo Web 2025', 'El futuro del desarrollo web incluye...', 'Carlos G?mez', '2025-02-26 13:46:52', '2025-02-26 13:46:52'),
(4, 'Bases de datos SQL vs NoSQL', 'Las bases de datos SQL y NoSQL tienen...', 'Ana Torres', '2025-02-26 13:46:52', '2025-02-26 13:46:52'),
(5, 'Seguridad en Aplicaciones Web', 'Para proteger tu aplicaci?n web, debes...', 'Luis Ram?rez', '2025-02-26 13:46:52', '2025-02-26 13:46:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `student_id`, `items`, `created_at`, `updated_at`) VALUES
(2, 25, '\"[]\"', '2025-03-13 00:17:53', '2025-03-13 00:19:59'),
(3, 24, '\"[]\"', '2025-03-13 00:59:18', '2025-03-13 00:59:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentables`
--

CREATE TABLE `commentables` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` enum('course','article') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` int(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `curso_id`, `email`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Sin email', 'ggdfg', 2, '2025-02-27 22:43:40', '2025-02-27 22:43:40'),
(2, 0, 2, 'Sin email', 'fdsfsdfdfdsf', 1, '2025-02-27 22:48:57', '2025-02-27 22:48:57'),
(3, 0, 3, 'Sin email', 'Excelente cuerso sobre tableros', 5, '2025-02-27 22:55:37', '2025-02-27 22:55:37'),
(4, 0, 1, 'Sin email', 'dadasdasdasddsf', 1, '2025-02-27 23:01:01', '2025-02-27 23:01:01'),
(5, 0, 3, 'Sin email', 'buen curso me gusto', 4, '2025-02-27 23:05:26', '2025-02-27 23:05:26'),
(6, 0, 1, 'Sin email', 'fdsfdsfcsafdsfds', 5, '2025-02-27 23:45:09', '2025-02-27 23:45:09'),
(7, 0, 3, 'Sin email', 'Soy el primer usuario', 5, '2025-02-28 22:00:01', '2025-02-28 22:00:01'),
(8, 0, 1, 'Sin email', 'buen curso espero que sigan así', 5, '2025-03-13 00:27:09', '2025-03-13 00:27:09'),
(9, 0, 2, 'Sin email', 'soy un buen estudiante', 5, '2025-03-13 00:29:58', '2025-03-13 00:29:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `direccion`, `email`, `telefono`) VALUES
(1, 'Calle 123, Ciudad', 'con@example.com', '232454356');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nomenclatura` varchar(255) NOT NULL,
  `NombredelCurso` varchar(255) NOT NULL,
  `DescripciondeCurso` varchar(255) NOT NULL,
  `CostodelCurso` decimal(8,2) NOT NULL,
  `InstructorResponsable` varchar(255) NOT NULL,
  `FechadeInicio` date NOT NULL,
  `FechadeTermino` date NOT NULL,
  `Virtual` varchar(255) NOT NULL,
  `Presencial` varchar(255) NOT NULL,
  `Mixto` varchar(255) NOT NULL,
  `SinFecha` varchar(255) NOT NULL,
  `DriveSinFecha` varchar(255) NOT NULL,
  `Facebook` varchar(255) NOT NULL,
  `DriveFacebook` varchar(255) NOT NULL,
  `Linkedin` varchar(255) NOT NULL,
  `DriveLinkedin` varchar(255) NOT NULL,
  `Instagram` varchar(255) NOT NULL,
  `DriveInstagram` varchar(255) NOT NULL,
  `Temario` varchar(255) NOT NULL,
  `DriveTemario` varchar(255) NOT NULL,
  `Itinerario` varchar(255) NOT NULL,
  `DriveItinerario` varchar(255) NOT NULL,
  `Planeacion` varchar(255) NOT NULL,
  `DrivePlaneacion` varchar(255) NOT NULL,
  `Digital` varchar(255) NOT NULL,
  `DriveDigital` varchar(255) NOT NULL,
  `Impreso_Presentable` varchar(255) NOT NULL,
  `Presentacion` varchar(255) NOT NULL,
  `Evaluacion_diagnostica` varchar(255) NOT NULL,
  `EvaluaciondeSatisfaccion` varchar(255) NOT NULL,
  `EvaluacionFinal` varchar(255) NOT NULL,
  `DC3` varchar(255) NOT NULL,
  `FechadeRegistro_STPS` date DEFAULT NULL,
  `Formato_DC5` varchar(255) NOT NULL,
  `Formato_DC5_Tienefirma` varchar(255) NOT NULL,
  `Certificadodecomprobacion` varchar(255) NOT NULL,
  `DrivedeCertificadodecomprobacion` varchar(255) NOT NULL,
  `Cartapoder_tienefirma` varchar(255) NOT NULL,
  `DriveCartapoder` varchar(255) NOT NULL,
  `UDEMY` varchar(255) NOT NULL,
  `EnlaceUDEMY` varchar(500) NOT NULL DEFAULT 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Duracioncurso` varchar(100) NOT NULL,
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`videos`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `Nomenclatura`, `NombredelCurso`, `DescripciondeCurso`, `CostodelCurso`, `InstructorResponsable`, `FechadeInicio`, `FechadeTermino`, `Virtual`, `Presencial`, `Mixto`, `SinFecha`, `DriveSinFecha`, `Facebook`, `DriveFacebook`, `Linkedin`, `DriveLinkedin`, `Instagram`, `DriveInstagram`, `Temario`, `DriveTemario`, `Itinerario`, `DriveItinerario`, `Planeacion`, `DrivePlaneacion`, `Digital`, `DriveDigital`, `Impreso_Presentable`, `Presentacion`, `Evaluacion_diagnostica`, `EvaluaciondeSatisfaccion`, `EvaluacionFinal`, `DC3`, `FechadeRegistro_STPS`, `Formato_DC5`, `Formato_DC5_Tienefirma`, `Certificadodecomprobacion`, `DrivedeCertificadodecomprobacion`, `Cartapoder_tienefirma`, `DriveCartapoder`, `UDEMY`, `EnlaceUDEMY`, `status`, `created_at`, `updated_at`, `Duracioncurso`, `videos`) VALUES
(1, 'ID-A00', 'Lectura de diagramas el?ctricos (9 hrs)', 'El curso \"Lectura de Diagramas El?ctricos\" est? dise?ado para proporcionar a los participantes las habilidades y conocimientos necesarios para interpretar y analizar diagramas el?ctricos de manera efectiva. Con una duraci?n de 9 horas, este curso combina', 8000.00, 'Alejandro Martines', '2025-01-17', '2025-01-30', 'No', 'Si', 'No', '50%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '100%', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '90%', '100%', '80%', 'Tiene DC3', '2025-01-17', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'Lo tiene', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellanado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-17 13:35:11', '2025-02-07 07:01:18', '9 horas', ''),
(2, 'ID-A01', 'Elaboraci?n de diagrama unifilar', 'El curso de Elaboraci?n de Diagrama Unifilar est? dise?ado para capacitar a los participantes en la creaci?n y comprensi?n de diagramas unifilares, una herramienta esencial en el dise?o y an?lisis de sistemas el?ctricos. Este curso es ideal para ingeniero', 5000.00, 'Jose Madero', '2025-01-18', '2025-02-01', 'Si', 'Si', 'Si', '50%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50% (validar)', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90% (validar)', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '90%', '100%', '80%', 'Tiene DC3', '2025-01-23', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'Lo tiene', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellanado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-17 13:51:00', '2025-01-17 13:51:00', '', ''),
(3, 'ID-A05', 'Ensamble de tableros el?ctricos', 'efsfewfaewfsfwefwefwefwefwef', 8900.00, 'Pablo Martines', '2025-01-22', '2025-01-24', 'No', 'Si', 'No', '100%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50% (validar)', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50% (validar)', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '80% (REVISAR)', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '50% (reestructura)', '50% (validar)', '50% (validar)', 'Por confirmar', '2025-01-29', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'Ya obtenida', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellanado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-17 14:13:46', '2025-01-17 14:13:46', '', ''),
(5, 'ID-A02', 'wadadadawd', 'wadadwad', 434343.00, 'wadwadada', '2025-01-27', '2025-01-30', 'Si', 'No', 'Si', 'sefsef', 'essefef', 'esfs', 'sfes', 'seff', 'sfesf', 'sefesf', 'sfesf', 'esfs', 'sefes', 'sef', 'sfes', 'sfesf', 'sefef', 'sfe', 'sefs', 'sfsef', 'sfesf', 'sefesf', 'sefesf', 'sef', 'No tiene DC3', '2025-01-08', 'sefesfes', 'Si', 'Ya obtenida', 'sefesfs', 'Si', 'fesfesf', 'Prellenado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-21 11:14:10', '2025-01-21 11:14:10', '', ''),
(6, 'ID-A06', 'Programaci?n de PLC B?sico', 'Descripcion', 300.00, 'Jose Madero', '2025-01-23', '2025-01-30', 'Si', 'Si', 'Si', '50%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '50% (validar)', '50% (validar)', '80%', 'No tiene DC3', '2025-01-30', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'No', 'En proceso', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellenado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-23 11:39:36', '2025-01-23 11:39:36', '', ''),
(7, 'ID-B01', 'gringiueruig', 'ergregerg', 345.00, 'Martines Martines', '2025-01-08', '2025-01-15', 'Si', 'No', 'Si', '100%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50% (validar)', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '50% (validar)', '100%', '80%', 'Por confirmar', '2025-01-16', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'En proceso', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellenado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-29 12:32:32', '2025-01-30 13:38:27', '', ''),
(8, 'ID-A10', 'gringiueruig', 'dwadwadwadwad', 4556.00, 'Jose Madero', '2025-01-15', '2025-01-31', 'Si', 'Si', 'Si', '50%', 'https://docs.google.com/document/d/1ZolcOrs-lGb-ahJemo16uL8a-twP-2vI/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/17PBrQgm66wJZdp4C-wnJW_BELFXt020U/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1AClDnxv9EX4ZoVL63zxURdrgRYFViJUy/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%', 'https://docs.google.com/document/d/1DRb5M7X4sMep0cULJqCabt3F8kCi5S7K/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1-bKmOQphjen1UTMK4bO_HtLv8cNndC7W/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1nVEYbq5tbnXnvM12QsvY-3ugrl6_txUo/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '50%(pendiente de validar)', 'https://docs.google.com/document/d/1qdXNRTXQpmCzIGuXYN-74be4FSBxZEbC/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', '90%', 'https://docs.google.com/document/d/1cukvkAlHmQkSHPLB_ITE3CB-CuTrEYWQituUn7Xuw9Y/edit?usp=sharing', '0%', '90%', '90%', '100%', '80%', 'No tiene DC3', '2025-01-16', 'https://docs.google.com/document/d/1OAOx5xn-3PVRQvUDy6U4ciPRpSHoi1ds/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'Ya obtenida', 'https://docs.google.com/document/d/1NGG1KKy8PsZ0U-WekRmt0ddnzthm0pr3/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Si', 'https://docs.google.com/document/d/1vFJ1Iq5-Mbddu9aeK5455Sq1HFmK7REq/edit?usp=sharing&ouid=111547235369582781415&rtpof=true&sd=true', 'Prellenado', 'https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB', 1, '2025-01-30 13:26:41', '2025-01-30 13:26:41', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participante_id` bigint(20) NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `participante_id`, `curso_id`, `created_at`, `updated_at`) VALUES
(8, 10, 1, NULL, NULL),
(14, 16, 1, NULL, NULL),
(16, 18, 1, NULL, NULL),
(17, 19, 2, NULL, NULL),
(19, 21, 1, NULL, NULL),
(21, 23, 1, NULL, NULL),
(22, 24, 2, NULL, NULL),
(24, 26, 2, NULL, NULL),
(25, 27, 1, NULL, NULL),
(31, 9, 3, NULL, NULL),
(33, 7, 2, NULL, NULL),
(35, 14, 3, NULL, NULL),
(37, 29, 1, NULL, NULL),
(38, 30, 1, NULL, NULL),
(39, 31, 1, NULL, NULL),
(44, 32, 5, NULL, NULL),
(48, 33, 3, NULL, NULL),
(50, 34, 3, NULL, NULL),
(51, 35, 5, NULL, NULL),
(52, 36, 1, NULL, NULL),
(53, 20, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materials`
--

INSERT INTO `materials` (`id`, `title`, `author`, `year`, `file_path`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Libro de Programación', 'Juan Pérez', '2023', 'pdfs/programacion.pdf', 'storage/images/programacion.jpg', '2025-03-04 00:36:45', '2025-03-04 00:36:45'),
(2, 'Manual de Laravel', 'María López', '2024', 'pdfs/laravel_manual.pdf', 'storage/images/laravel.jpg', '2025-03-04 00:36:45', '2025-03-04 00:36:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_14_162910_add_puesto_to_users_table', 1),
(5, '2025_01_15_152947_create_cursos_table', 1),
(6, '2025_01_15_153059_create_participantes_table', 1),
(7, '2025_01_21_172856_add_fields_to_users_table', 1),
(8, '2025_01_21_183710_add_estado_pago_and_curso_inscrito_to_participantes_table', 1),
(9, '2025_01_27_221027_create_personal_access_tokens_table', 1),
(10, '2025_01_29_191028_add_duracioncurso_to_cursos_table', 1),
(11, '2025_02_10_194011_create_password_resets_table', 2),
(12, '2025_02_13_175345_create_cache_table', 0),
(13, '2025_02_13_175345_create_cache_locks_table', 0),
(14, '2025_02_13_175345_create_cursos_table', 0),
(15, '2025_02_13_175345_create_failed_jobs_table', 0),
(16, '2025_02_13_175345_create_inscripciones_table', 0),
(17, '2025_02_13_175345_create_job_batches_table', 0),
(18, '2025_02_13_175345_create_jobs_table', 0),
(19, '2025_02_13_175345_create_participante_curso_table', 0),
(20, '2025_02_13_175345_create_participantes_table', 0),
(21, '2025_02_13_175345_create_password_reset_tokens_table', 0),
(22, '2025_02_13_175345_create_password_resets_table', 0),
(23, '2025_02_13_175345_create_personal_access_tokens_table', 0),
(24, '2025_02_13_175345_create_sessions_table', 0),
(25, '2025_02_13_175345_create_users_table', 0),
(26, '2025_02_13_175348_add_foreign_keys_to_inscripciones_table', 0),
(27, '2025_02_19_184723_create_orders_table', 3),
(29, '2025_02_24_create_students_table', 4),
(30, '2025_02_26_135955_create_articles_table', 0),
(31, '2025_02_26_141250_create_comments_table', 0),
(32, '2025_02_26_141344_create_commentables_table', 0),
(33, '2025_02_26_141347_add_foreign_keys_to_commentables_table', 0),
(37, '2025_03_03_181901_create_materials_table', 5),
(38, '2025_02_28_161340_create_carts_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `curso_id` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `student_id`, `curso_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(38, 25, '3', 8900.00, 'paid', '2025-03-13 00:19:59', '2025-03-13 00:19:59'),
(39, 24, '2', 5000.00, 'paid', '2025-03-13 00:59:45', '2025-03-13 00:59:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id` bigint(20) NOT NULL,
  `N` varchar(255) DEFAULT NULL,
  `NombredelPostulante` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Edad` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Escolaridad` varchar(255) NOT NULL,
  `Curp` varchar(255) NOT NULL,
  `RazonSocial` varchar(200) NOT NULL,
  `Empresa` varchar(255) NOT NULL,
  `RFCEmpresa` varchar(100) NOT NULL,
  `Puesto` varchar(255) NOT NULL,
  `Pago` varchar(255) DEFAULT NULL,
  `EstadoDePago` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `FechadelCurso` varchar(255) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `N`, `NombredelPostulante`, `Correo`, `Telefono`, `Edad`, `Direccion`, `Escolaridad`, `Curp`, `RazonSocial`, `Empresa`, `RFCEmpresa`, `Puesto`, `Pago`, `EstadoDePago`, `FechadelCurso`, `estatus`, `created_at`, `updated_at`) VALUES
(7, 'ID-23CE03', 'Leonardo Lopez', 'leonardp@gmail.com', '33 3454 5465', '36', 'AV Nueva Revolucion', 'Licensiatura', 'ACE43455SADA438', 'Acepedo Ac', 'Macdonals', 'BKTR348567BRJ', 'Seguridad', '3444', 'Pagado', '2025-01-18', 1, '2025-02-01 08:45:43', '2025-02-07 06:31:17'),
(9, 'ID-23CE05', 'Laura Gonzalez', 'laura.gonzalez@gmail.com', '33 2343 5465', '21', '58 Av. Reforma', 'Preparatoria', 'BK68G1GX0Y43WKV1H0', 'Desarrollos Avanzados S.A.', 'Amix', 'XBMV836', 'Desarrollador', '0', 'Cancelado', '2025-01-22', 1, '2025-02-05 04:13:39', '2025-02-07 06:28:19'),
(10, 'ID-23CE01', 'Luis Lopez', 'luis.lopez@yahoo.com', '33 2343 5465', '19', '98 Calle 5 de Febrero', 'Ingeneria', 'DOS8JYSE4IH8NG21WJ', 'Innovaciones Ltda.', 'LitiAD', 'BPZH741', 'Soporte y Servicios', '67658', 'Pagado', '2025-02-11', 1, '2025-02-05 04:33:33', '2025-02-07 05:00:31'),
(14, 'ID-23CE04', 'Alegandro Martines Lopez Gomez', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Nueva Revolucion', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Ferroviario', '1000', 'Pagado', '2025-01-22', 1, '2025-02-06 08:40:23', '2025-02-07 06:38:29'),
(16, 'ID-23CE14', 'Hernesto Escobar Albarado Moreno', 'JMesarGJ@gmail.com', '33 2343 5465', '23', 'AV Inturbide Nuevas Vesares', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica Mexicana', 'ABCD010203XYZ', 'Refinaci?n y beneficio', '0.00', 'Pendiente', '2025-02-14', 1, '2025-02-07 03:24:18', '2025-02-13 11:53:10'),
(18, NULL, 'Alegandro Martines Lopez Gomez', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Telecomunicaciones', NULL, 'Pendiente', '2025-02-08', 1, '2025-02-07 03:40:45', '2025-02-07 03:40:45'),
(19, NULL, 'Alegandro Martines Lopez Gomez', 'JMesarGJ@gmail.com', '33 8546 4976', '23', 'AV Nueva Revolucion', 'Ingeneria', 'ACE43455SADA438', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Bolsa, banca y seguros', NULL, 'Pendiente', '2025-02-06', 1, '2025-02-07 03:44:08', '2025-02-07 03:44:08'),
(20, 'ID-23CE014', 'Hernesto Escobar Albarado Moreno', 'JMesarGJ@gmail.com', '33 8546 4976', '23', 'Intercepcion del valle', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'BKTR348567BRJ', 'Planeaci?n y direcci?n de obras', '1000.00', 'Pagado', '2025-01-22', 1, '2025-02-07 03:45:21', '2025-02-13 11:54:43'),
(21, NULL, 'Hernesto Escobar Albarado Moreno', 'JMesarGJ@gmail.com', '33 2343 5465', '23', 'AV Inturbide Nuevas Vesares', 'Licensiatura', 'cfceceacfeawcfef', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Productos el?ctricos y electr?nicos', '9000', 'Pagado', '2025-02-07', 1, '2025-02-07 03:46:51', '2025-02-07 03:46:51'),
(23, NULL, 'Jostar Mesares Gomez Jesus', 'JMesarGJ@gmail.com', '33 8546 4976', '23', 'AV Nueva Revolucion', 'Licensiatura', 'ACE43455SADA438', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Mec?nica', NULL, 'Pendiente', '2025-02-14', 1, '2025-02-07 03:49:15', '2025-02-07 03:49:15'),
(24, NULL, 'Hernesto Escobar Albarado Moreno', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Nueva Revolucion', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Mec?nica', NULL, 'Pendiente', '2025-02-14', 1, '2025-02-07 03:51:50', '2025-02-07 03:51:50'),
(26, 'ID-23CE06', 'Raziel', 'Raziel323@gmail.com', '33 2343 5465', '26', 'AV Inturbide Nuevas Vesares', 'Licensiatura', 'ACE43455SADA438', 'Acepedo Ac', 'Maquiladora Grafica Mexicana', 'BKTR348567BRJ', 'Provisi?n de energ?a', '0.00', 'Pendiente', '2025-01-18', 1, '2025-02-07 03:59:39', '2025-02-07 06:37:46'),
(27, NULL, 'Alegandro Martines Lopez Gomez', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Ferroviario', '0', 'Pendiente', '2025-01-17', 1, '2025-02-07 04:16:47', '2025-02-07 04:16:47'),
(29, 'ID-23CE07', 'Leonardo', 'Alejan09@gmail.com', '33 2343 5465', '23', 'AV Inturbide Nuevas Vesares', 'Ingeneria', 'ACE43455SADA438', 'Arcos Dorados, CA', 'Jose Cuervo', 'ABCD010203XYZ', 'Conservaci?n y mantenimiento', '100.00', 'Pagado', '2025-01-17', 1, '2025-02-07 06:53:35', '2025-02-08 05:53:53'),
(30, NULL, 'Alegandro Martines Lopez Gomez', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas', 'Ingeneria', 'ACE43455SADA434', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Agricultura y silvicultura', NULL, 'Pendiente', '2025-02-14', 1, '2025-02-08 06:09:36', '2025-02-08 06:09:36'),
(31, NULL, 'Moreno', 'JMesarGJ@gmail.com', '33 2343 5465', '23', 'AV Inturbide Nuevas Vesares', 'Licensiatura', 'cfceceacfeawcfef', 'Acepedo Ac', 'Jose Cuervo', 'ABCD010203XYZ', 'HCM', NULL, 'Pendiente', '2025-01-17', 1, '2025-02-08 06:14:19', '2025-02-08 06:14:19'),
(32, 'ID-23CE10', 'wax', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas Vesares', 'Licensiatura', 'ACE43455SADA438', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Ganader?a', '1000.00', 'Pagado', '2025-01-27', 1, '2025-02-08 06:16:57', '2025-02-08 08:43:02'),
(33, 'ID-23CE11', 'Xampp', 'JMesarGJ@gmail.com', '33 8546 4976', '23', 'AV Nueva Revolucion', 'Ingeneria', 'ACE43455SADA438', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'BKTR348567BRJ', 'Agricultura y silvicultura', '10.00', 'Pagado', '2025-01-22', 1, '2025-02-08 08:20:11', '2025-02-08 08:52:57'),
(34, 'ID-23CE22', 'Antonio Raziel Correa Villegas', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas Vesares', 'Ingeneria', 'ACE43455SADA434huh', 'Arcos Dorados, CA', 'Maquiladora Grafica Mexicana', 'ABCD010203XYZ', 'Mec?nica', '1000.00', 'Pagado', '2025-01-22', 1, '2025-02-13 07:24:50', '2025-02-13 07:28:58'),
(35, 'ID-23CE15', 'Alegandro Martines Lopez Gomez', 'AlejandMart@gmail.com', '33 8546 4976', '23', 'AV Inturbide Nuevas Vesares', 'Ingeneria', 'ACE43455SADA434wdw', 'Arcos Dorados, CA', 'Coca', 'ABCD010203XYZ', 'Ganader?a', '9000', 'Anticipo', '2025-01-27', 1, '2025-02-13 07:31:24', '2025-02-13 07:32:28'),
(36, NULL, 'Correa', 'AlejandMart@gmail.com', '33 8546 4976', '32', 'AV Inturbide Nuevas', 'Ingeneria', 'ACE43455SADA438ewe', 'Arcos Dorados, CA', 'Maquiladora Grafica', 'ABCD010203XYZ', 'Mec?nica', NULL, 'Pendiente', '2025-01-17', 1, '2025-02-13 11:49:10', '2025-02-13 11:49:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_curso`
--

CREATE TABLE `participante_curso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participante_id` bigint(20) UNSIGNED NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `FechadelCurso` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('raziel34@gmail.com', 'IA1xXvpIJP9IiX4LJm1vP5SFVwIJoi7K9E6CbmZ10ojqVYXq0iqt4uhpfgn5', '2025-02-13 04:03:19'),
('idespinoza2021@gmail.com', '$2y$12$R2ztwR8jfbB1c0zrjzpTFuWBVOin7SuwafrnYK/GZ9PBhAGHAuSbO', '2025-03-13 00:31:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('2123200418@soy.utj.edu.mx', '$2y$12$qkOHfz/fzqfPJe64JlimVO3zG.ZhlBYAVqzDh7ih.wgFq.STPyMRa', '2025-02-11 07:22:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('g4sy88JycG1vE6w4HqUGOaorvhXNCBkPB5faKx8x', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHVYRWh6MGtVSnhmNG1iSWh4VmhmYnN5ektvZ1M2UHp1TUFobktXOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742065942),
('kxWuvsNhu85KWnKIe6QCOc8IOISsH5fVUR74EpdG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3J3NWlGckVrT3YycFM0WEIwU3J0WFA2UTFrRGRLQU1UenhmRkI2cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1741886065),
('nu1q5udTE8igbVWJ50rwdwvIl7mdfmYCwleN1sJ0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVdiQlN6aTV5MTBRdms4T3NOcXlDbHdSR2trT3FOY2xkTUZtMWhnUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742088194);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contactPhone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`, `lastName`, `age`, `email`, `email_verified_at`, `password`, `contactPhone`, `status`, `created_at`, `updated_at`) VALUES
(24, 'David', 'Espinoza', 22, 'blacksociety963@gmail.com', NULL, '$2y$12$SjNSgh4DgtOqGfsVzfd0oe6LOKHYGKMNhObNvHHFCREC4nZfkrptC', '2423432542', 'completado', '2025-03-12 00:24:59', '2025-03-13 00:33:24'),
(25, 'David', 'Rodriguez', 20, 'idespinoza2021@gmail.com', NULL, '$2y$12$3g7WGSUONpitBxJZGMj4r.iWUb.B9UolU.pPMXPKFfkqm7k8.Ort.', '2023431542', 'activo', '2025-03-13 00:08:50', '2025-03-13 00:08:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `puesto` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `plain_password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido`, `edad`, `telefono`, `email`, `puesto`, `email_verified_at`, `password`, `plain_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Correa Villegas', 20, '33 3232 4345', 'raziel34@gmail.com', 'Administrador', NULL, '$2y$12$ms9bCKRjZjPqtZGJgwsFD.pN09PnTE4Sot5IcMK/Crq41JpYa6Nc6', '123456789', NULL, '2025-01-17 13:23:32', '2025-02-01 06:30:07'),
(3, 'Jose Gomes', 'Martines Martines', 34, '33 4345 3454', 'joseGo@gmail.com', 'Mantenimiento', NULL, '$2y$12$ziHUEZVdCJO3oj.EHiu6xOKs7IrU4/aT3mLrZc7Oj1U3xbSRRWM9.', 'qazwsxedc', NULL, '2025-01-22 11:11:56', '2025-02-01 06:55:56'),
(4, 'Gerardo lopez', 'Zargoza Mendez', 34, '33 3232 3434', 'zara89@gmail.com', 'Administrador', NULL, '$2y$12$KArPbpNiMa0rcSyKFtqQsuIVzLdcxy4NK72Go899ZJ5V9Lnrpvadm', NULL, NULL, '2025-02-01 06:15:33', '2025-02-01 06:15:33'),
(6, 'Raziel', 'Correa Villegas', 21, '33 3232 4345', '2123200418@soy.utj.edu.mx', 'Programador', NULL, '$2y$12$ycrq4OhrvkP2ddTsEg85G.CZLKxDd1lTNAq/pdZEslfrEGxDH772q', '123456789', '7ItK4LTQHaoPn8qbmMaKZ2PUCu2kXZATshOz27RVCOVCjO9FWHf9WpfJAK7b', '2025-02-11 06:10:09', '2025-02-13 11:46:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`student_id`);

--
-- Indices de la tabla `commentables`
--
ALTER TABLE `commentables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participante_id` (`participante_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`student_id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participante_curso`
--
ALTER TABLE `participante_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `commentables`
--
ALTER TABLE `commentables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `participante_curso`
--
ALTER TABLE `participante_curso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `commentables`
--
ALTER TABLE `commentables`
  ADD CONSTRAINT `commentables_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`participante_id`) REFERENCES `participantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
