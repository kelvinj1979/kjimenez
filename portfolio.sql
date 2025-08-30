-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2025 a las 16:24:24
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
-- Base de datos: `portfolio`
--
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aboutme`
--

DROP TABLE IF EXISTS `aboutme`;
CREATE TABLE `aboutme` (
  `id` int(11) NOT NULL,
  `domain` text NOT NULL,
  `logo` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `about_me` longtext NOT NULL,
  `photo` text NOT NULL,
  `cover_img` text NOT NULL,
  `icon` text NOT NULL,
  `keywords` text NOT NULL,
  `social_networks` text NOT NULL,
  `skills` text NOT NULL,
  `email` text NOT NULL,
  `phones` text NOT NULL,
  `location` text NOT NULL,
  `resume` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `server` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `aboutme`
--

INSERT INTO `aboutme` (`id`, `domain`, `logo`, `name`, `title`, `description`, `about_me`, `photo`, `cover_img`, `icon`, `keywords`, `social_networks`, `skills`, `email`, `phones`, `location`, `resume`, `date`, `server`, `created_at`, `updated_at`) VALUES
(1, 'https://kjimenez.website/', 'KJimenez', 'Kelvin Jimenez', 'Software Developer & Data Analyst', '<p>I build exceptional digital experiences with clean code and data-driven insights. Specializing in web development and data analysis to create impactful solutions.&nbsp;</p>', '<p>I\'m a passionate software developer and data analyst with over 15 years of experience creating innovative solutions. I combine technical expertise with creative problem-solving to deliver exceptional results.</p>', '/img/aboutme/3495_1747959855.jpg', '/img/aboutme/2425_1747976617.png', '/img/aboutme/9503_1748011268.png', '[\"JavaScript\",\"Java\",\".Net Core\",\"React\",\"Node.js\",\"Python\",\"SQL\",\"AWS\",\"Git\",\"Data Analysis\",\"Machine Learning\",\"REST APIs\",\"PHP\",\"WordPress\",\"APEX\",\"ORACLE\",\"SQL Loader\",\"ETL\",\"Tableau\",\"Pentaho\",\"Cristal Report\",\"OPP\",\"Erwin\",\"Power Designer\",\"Jira\",\"Trello\",\"Unix\",\"Git\",\"GCP\"]', '[{\"network\":\"GitHub\",\"url\":\"https://github.com/kelvinj1979\",\"icon\":\"bi bi-github\"},{\"network\":\"Linkedin\",\"url\":\"https://linkedin.com/in/kelvin-jimenez/\",\"icon\":\"bi bi-linkedin\"}]', '[\"JavaScript\",\"Java\",\".Net Core\",\"React\",\"Python\",\"SQL\",\"AWS\",\"Git\",\"Data Analysis\",\"REST APIs\",\"PHP\",\"WordPress\",\"PowerBI\",\"APEX\",\"ORACLE\",\"MS SQL Server\",\"MySql\",\"PL\\/ SQL\",\"T-SQL\",\"Tableau\",\"Pentaho\",\"Cristal Report\",\"Laravel\",\"Wordpress\"]', 'kelvin.jimenez@gmail.com', '+1 (431) 278-4362', '[{\"city\":\"Winnipeg,MB\",\"link\":\"https://maps.app.goo.gl/axcvwppM82MbTHKa9\"}]', '/img/aboutme/9841_1748012285.docx', '2025-06-04 00:57:55', 'https://kjimenez.website/cms/public', NULL, '2025-06-04 00:57:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `education` text NOT NULL,
  `institution` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `edu_detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `education`
--

INSERT INTO `education` (`education_id`, `education`, `institution`, `start_date`, `end_date`, `edu_detail`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Software Engineering', 'Universidad Tecnológica de Santiago', '1997-05-19', '2002-10-20', 'Focused on Software technologies and database systems.', NULL, '2025-06-04 00:59:05'),
(2, 'Management leadership', 'ADEN', '2019-01-01', '2019-01-11', 'Development of management skills adapted to new work environments', NULL, '2025-06-04 01:03:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `experience` text NOT NULL,
  `company` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `exp_detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `experience`
--

INSERT INTO `experience` (`experience_id`, `experience`, `company`, `start_date`, `end_date`, `exp_detail`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'CODOM', '2013-01-01', '2018-01-06', 'Developed responsive websites and web applications for clients across various industries, focusing on performance optimization and user experience.', NULL, '2025-06-04 01:05:31'),
(2, 'System Data Analyst', 'Claro', '2013-01-01', '2021-06-30', 'Analyzed large datasets to extract actionable insights, created interactive dashboards, and developed predictive models that increased client revenue by 25%. Managed high-volume database operations and integration projects.', NULL, '2025-06-04 01:09:10'),
(3, 'Web / Software Developer', 'Freelance', '2020-02-01', '2025-06-03', '- Designed and maintained websites using WordPress, Laravel, and custom CMS solutions.\r\n- Integrated Square payments, multilingual support, donation tracking, and analytics.\r\n- Developed e-commerce platforms using WooCommerce and Laravel backend.\r\n- Created responsive layouts, mobile-first UI/UX, and SEO-optimized content.', NULL, '2025-06-04 01:11:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('kelvin.jimenez@gmail.com', '$2y$12$pT3KZCMgyyB5o27bTCKeHeyTHzbBsRVWq8eHUC57DDk5Xdrso0BPW', '2025-05-30 22:51:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `project_img` text NOT NULL,
  `view_code` text NOT NULL,
  `live_demo` text NOT NULL,
  `description` text NOT NULL,
  `overview` text NOT NULL,
  `technologies` text NOT NULL,
  `tags` text NOT NULL,
  `project_info` text NOT NULL,
  `key_features` text NOT NULL,
  `challenges_solutions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_img`, `view_code`, `live_demo`, `description`, `overview`, `technologies`, `tags`, `project_info`, `key_features`, `challenges_solutions`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce Dashboard', 'views/img/project1.avif\r\n', 'https://github.com', 'https://example.com', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\n', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\n\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"React\", \"Node.js\", \"D3.js\", \"MongoDB\"]', '[\"web\",\"data\"]', '[{\n  \"completedDate\": \"January 2023\",\n  \"teamSize\": \"3 developers\",\n  \"status\": \"Completed\"\n}]', '[\n\"Responsive design for all devices\",\n\"Real-time data visualization\",\n\"User authentication and authorization\",\n\"Advanced filtering and search capabilities\",\n\"Performance optimization\",\n\"Comprehensive analytics dashboard\"\n]', 'One of the main challenges was optimizing performance with large datasets. This was solved by implementing efficient data structures, pagination, and lazy loading techniques to ensure smooth user experience even with thousands of records.', NULL, NULL),
(2, 'AI Content Generator', 'views/img/project2.avif', 'https://github.com', 'https://example.com', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"Python\", \"TensorFlow\", \"FastAPI\", \"React\"]', '[\"software\",\"ai\"]', '[{\r\n  \"completedDate\": \"March 2023\",\r\n  \"teamSize\": \"2 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Natural language processing\",\r\n          \"Content customization options\",\r\n          \"Multiple output formats\",\r\n          \"SEO optimization suggestions\",\r\n          \"Content quality scoring\",\r\n          \"User-friendly interface\"\r\n        ]', 'The main challenge was fine-tuning the AI model to generate content that was both creative and contextually relevant. We implemented a feedback loop system that allowed the model to learn from user corrections and preferences.\r\n     ', NULL, NULL),
(3, 'Financial Data Visualization', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(4, 'Mobile Fitness App', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(5, 'Financial Data Visualization 2', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(6, 'Mobile Fitness App 3', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, '2025-06-02 03:44:20'),
(7, 'E-Commerce Dashboard', 'views/img/project1.avif\r\n', 'https://github.com', 'https://example.com', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"React\", \"Node.js\", \"D3.js\", \"MongoDB\"]', '[\"web\",\"data\"]', '[{\r\n  \"completedDate\": \"January 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n\"Responsive design for all devices\",\r\n\"Real-time data visualization\",\r\n\"User authentication and authorization\",\r\n\"Advanced filtering and search capabilities\",\r\n\"Performance optimization\",\r\n\"Comprehensive analytics dashboard\"\r\n]', 'One of the main challenges was optimizing performance with large datasets. This was solved by implementing efficient data structures, pagination, and lazy loading techniques to ensure smooth user experience even with thousands of records.', NULL, NULL),
(8, 'AI Content Generator', 'views/img/project2.avif', 'https://github.com', 'https://example.com', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"Python\", \"TensorFlow\", \"FastAPI\", \"React\"]', '[\"software\",\"ai\"]', '[{\r\n  \"completedDate\": \"March 2023\",\r\n  \"teamSize\": \"2 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Natural language processing\",\r\n          \"Content customization options\",\r\n          \"Multiple output formats\",\r\n          \"SEO optimization suggestions\",\r\n          \"Content quality scoring\",\r\n          \"User-friendly interface\"\r\n        ]', 'The main challenge was fine-tuning the AI model to generate content that was both creative and contextually relevant. We implemented a feedback loop system that allowed the model to learn from user corrections and preferences.\r\n     ', NULL, NULL),
(9, 'Financial Data Visualization', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(10, 'Mobile Fitness App', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(11, 'Financial Data Visualization 2', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(12, 'Mobile Fitness App 2', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(13, 'E-Commerce Dashboard', 'views/img/project1.avif\r\n', 'https://github.com', 'https://example.com', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"React\", \"Node.js\", \"D3.js\", \"MongoDB\"]', '[\"web\",\"data\"]', '[{\r\n  \"completedDate\": \"January 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n\"Responsive design for all devices\",\r\n\"Real-time data visualization\",\r\n\"User authentication and authorization\",\r\n\"Advanced filtering and search capabilities\",\r\n\"Performance optimization\",\r\n\"Comprehensive analytics dashboard\"\r\n]', 'One of the main challenges was optimizing performance with large datasets. This was solved by implementing efficient data structures, pagination, and lazy loading techniques to ensure smooth user experience even with thousands of records.', NULL, NULL),
(14, 'AI Content Generator', 'views/img/project2.avif', 'https://github.com', 'https://example.com', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"Python\", \"TensorFlow\", \"FastAPI\", \"React\"]', '[\"software\",\"ai\"]', '[{\r\n  \"completedDate\": \"March 2023\",\r\n  \"teamSize\": \"2 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Natural language processing\",\r\n          \"Content customization options\",\r\n          \"Multiple output formats\",\r\n          \"SEO optimization suggestions\",\r\n          \"Content quality scoring\",\r\n          \"User-friendly interface\"\r\n        ]', 'The main challenge was fine-tuning the AI model to generate content that was both creative and contextually relevant. We implemented a feedback loop system that allowed the model to learn from user corrections and preferences.\r\n     ', NULL, NULL),
(15, 'Financial Data Visualization', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(16, 'Mobile Fitness App', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(17, 'Financial Data Visualization 2', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(18, 'Mobile Fitness App 2', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(19, 'E-Commerce Dashboard', 'views/img/project1.avif\r\n', 'https://github.com', 'https://example.com', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"React\", \"Node.js\", \"D3.js\", \"MongoDB\"]', '[\"web\",\"data\"]', '[{\r\n  \"completedDate\": \"January 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n\"Responsive design for all devices\",\r\n\"Real-time data visualization\",\r\n\"User authentication and authorization\",\r\n\"Advanced filtering and search capabilities\",\r\n\"Performance optimization\",\r\n\"Comprehensive analytics dashboard\"\r\n]', 'One of the main challenges was optimizing performance with large datasets. This was solved by implementing efficient data structures, pagination, and lazy loading techniques to ensure smooth user experience even with thousands of records.', NULL, NULL),
(20, 'AI Content Generator', 'views/img/project2.avif', 'https://github.com', 'https://example.com', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.', 'An AI-powered application that generates high-quality content for blogs, social media, and marketing materials.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"Python\", \"TensorFlow\", \"FastAPI\", \"React\"]', '[\"software\",\"ai\"]', '[{\r\n  \"completedDate\": \"March 2023\",\r\n  \"teamSize\": \"2 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Natural language processing\",\r\n          \"Content customization options\",\r\n          \"Multiple output formats\",\r\n          \"SEO optimization suggestions\",\r\n          \"Content quality scoring\",\r\n          \"User-friendly interface\"\r\n        ]', 'The main challenge was fine-tuning the AI model to generate content that was both creative and contextually relevant. We implemented a feedback loop system that allowed the model to learn from user corrections and preferences.\r\n     ', NULL, NULL),
(21, 'Financial Data Visualization', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(22, 'Mobile Fitness App', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Personalized workout recommendations\",\r\n          \"Progress tracking and visualization\",\r\n          \"Social sharing and challenges\",\r\n          \"Nutrition planning and tracking\",\r\n          \"Offline functionality\",\r\n          \"Wearable device integration\"\r\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(23, 'Financial Data Visualization 2', 'views/img/project3.avif', 'https://github.com', 'https://example.com', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'Interactive data visualizations for financial markets, helping investors make informed decisions through pattern recognition.\r\n', '[\"D3.js\", \"Python\", \"SQL\", \"AWS\"]', '[\"data\",\"web\"]', '[{\r\n  \"completedDate\": \"November 2022\",\r\n  \"teamSize\": \"4 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\r\n          \"Real-time market data integration\",\r\n          \"Custom chart creation tools\",\r\n          \"Pattern recognition algorithms\",\r\n          \"Historical data analysis\",\r\n          \"Predictive modeling\",\r\n          \"Export and reporting capabilities\"\r\n        ]', 'Handling real-time data streams while maintaining application performance was a significant challenge. We implemented a WebSocket architecture with efficient data processing pipelines to ensure smooth updates without overwhelming the client.\r\n     ', NULL, NULL),
(24, 'Mobile Fitness App 2', 'views/img/project4.avif', 'https://github.com', 'https://example.com', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', 'A cross-platform fitness application with personalized workout plans, progress tracking, and social features.', '[\"React Native\", \"Firebase\", \"Node.js\", \"Redux\"]', '[\"software\",\"mobile\"]', '[{\r\n  \"completedDate\": \"June 2023\",\r\n  \"teamSize\": \"3 developers\",\r\n  \"status\": \"Completed\"\r\n}]', '[\n          \"Personalized workout recommendations\",\n          \"Progress tracking and visualization\",\n          \"Social sharing and challenges\",\n          \"Nutrition planning and tracking\",\n          \"Offline functionality\",\n          \"Wearable device integration\"\n        ]', 'Creating a consistent user experience across different devices and platforms while maintaining native-like performance was challenging. We implemented a modular architecture with platform-specific optimizations to ensure smooth performance on both iOS and Android.\r\n     ', NULL, NULL),
(26, 'Prueba 3', 'img/projects/1340_1748802821.png', 'https://github.com', 'https://example.com', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting.', 'A comprehensive dashboard for e-commerce businesses with real-time analytics, inventory management, and sales forecasting. This project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.\r\n\r\nThis project demonstrates advanced implementation techniques and modern design patterns. It was developed with a focus on performance, accessibility, and user experience.', '[\"CSS\",\"HTML\",\"JavaScript\"]', '[\"web\",\"software\"]', '[{\"completedDate\":\"June 2025\",\"teamSize\":\"2 Developer\",\"status\":\"In Process\"}]', '[\"Responsive design for all devices\",\"User authentication and authorization\",\"Performance optimization\",\"Real-time data visualization\"]', 'One of the main challenges was optimizing performance with large datasets. This was solved by implementing efficient data structures, pagination, and lazy loading techniques to ensure smooth user experience even with thousands of records.', '2025-06-01 23:33:41', '2025-06-02 02:59:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
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
('2fAGaVSpyNCydkZJGLpMb3v5rEMLYQJAt29V4Be6', NULL, '156.228.115.131', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0FId0JMRlRSdHZPdUxXOVpjRkNscmxoS3RhejV2Q3RsaFZ6amNPOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755752406),
('7WBsjGVMBH2P9LaQ3ivThzjgH3xdYWOri5f9UCoZ', NULL, '20.171.207.54', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSklOMjJSdm5Rd3RXZHRwcXdZZFpNM0lvdkM0WEpFTUZMdU5zd29ROCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755067024),
('8DkwPVbCVW9xUimeqN5UC6IBttScG1AwwfHdaqWN', NULL, '156.228.114.217', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1264.71', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1VkRUdvb3ZzUkhpUlpOWW9tYm9VbHBQNjM5RXRLTTh1OEZTbmF4QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755326719),
('bGj4bCN83I15LOj3gl95FF1DZ6xeIgtjSvyICcgI', NULL, '43.135.138.128', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVZJRTlFQ1JuRWpxajR5M3pIWlpGbWZNQWFPOUx0YTQwSUVEeFhqbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755531357),
('D3hDLBg53MVP65orOWjTg9IpFHkaiOLuyIRcynlf', NULL, '156.228.171.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS21MaVM5ZmtVc2tLeDlNMDZ3TmZSbnNWeWdrOWNVT1VUYjJDR3FMViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756245602),
('dkbsJ9nijGMJ0Nl8UQsuOQURx0gE4pHPOyQfysyr', NULL, '20.171.207.54', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDZad2xNOEE1dURtRWRScWhqbEZySTJTMXJnTjExUlZPMk1Kd3BkTCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cHM6Ly9ramltZW5lei53ZWJzaXRlL2Ntcy9wdWJsaWMvcmVnaXN0ZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MDoiaHR0cHM6Ly9ramltZW5lei53ZWJzaXRlL2Ntcy9wdWJsaWMvcGFzc3dvcmQvcmVzZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755067423),
('DVqkO8EVwmiBmsvYdIeaRYpch114E7RCuWdRDWYE', NULL, '156.228.190.115', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN29zYjJlOHhLeEs4dnNaejNaN2NGaDZuYmFvUk9PSGJieHBBS3R3WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755235357),
('E1zVWXC4GwvDHDc9x8KFqUbkcHmIfgyrY8HjHVoE', NULL, '156.228.115.115', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1264.71', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzRBcUtGRXQ4ZUY1R2RVamN6dTdjTVJQcWlDa09VZ2NHMjlRM05pVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755332844),
('ecaXS7eb91N66vKptFZqVW5BsHIV5bA54havkydi', NULL, '156.228.90.152', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUENuVWN1M1ZHeGM5Y1k4dXhQbjNQNkdlSWtKcE1Md1BuZHNpVGI0ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756302596),
('FWyElSUBz0htCu1SYkoGyBaGohQzzxKxsM3W2xUt', 1, '2604:3d09:d07c:bee0:4d14:e2f8:dcd7:6a83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT1hxb1p3ellCVTkzZXZzdzhUR3hKaGJ2WlpFU3U5WjgxRzdZTHpaVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljL2Fib3V0bWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NjQ3NzEyNDt9fQ==', 1756477132),
('KQ78gH3GK3oX2ZnEIlk5RCzaZzYrxdZD2DsPX4R2', NULL, '156.228.105.248', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1264.71', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDVVazFYN3JONFhyOWI2b2hJSW84Mk96eVpTaTEzS2xoaWJLMTZmdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755364019),
('KU0bMY88PIazuhcCkanOiJptE17aJ1zctSSirMAe', NULL, '156.228.175.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Vivaldi/5.3.2679.68', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSE9GYzJvN2RxNGNmMm9vdmtwSFNsRU1RS3BzWG9LNXY0cnltN3VjaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755503909),
('OuSxnvwCZ5ukfkmIu41zskhFnikKM6CA6x5PWWyV', NULL, '156.228.81.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2M5cGdtMXR1VUlkZk1GWG9Xb3JMbkNuNlNXNlRpa3FycGNHcDFUaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756008816),
('OWwR9yahUTSy3Sm7TEF4XB7BLFds5i0IBxLWobog', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVlZLSkZ0YnlMcEZsQVA5RWdCbnpqRWNEbWZET2F0MWxKYlMxbFh6MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Qva2ppbWVuZXovY21zL3B1YmxpYy9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU2NTYzNTEzO319', 1756563549),
('QbhT8X4FXe25fKO6YQKnVrlS0rGmH0VXCcvLP3cM', NULL, '156.233.88.167', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 YaBrowser/22.7.0 Yowser/2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHNQZlhBN2M1ZFVWcjBJM05ENWRveGR5TGxFOW5RektlZHJBTGVVOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755624916),
('r4eZSoLgojxOxlYoLmsTeTlfvoBuTC6iHdprjdgZ', 1, '2604:3d09:d07c:bee0:4d14:e2f8:dcd7:6a83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVHJXWjJWNEFyUE5hSFlvYk45SkIxbGY1RHA1d3k5a2xIUVlxSTc5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTY0OTM4MzI7fX0=', 1756495839),
('RPv2pHFGofsv9lAyKXY9TD4PaHS83KARIQaQczW7', NULL, '156.253.172.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGhiWVJ1Q3g1dnRZY3R6OExvemJHdUJTT0dWWGw1ZnJpZGFncHlVRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756288849),
('SSU5n2QDgTHXOpAR0dSJnAvccUuqEh4NY2rJzOOs', NULL, '156.228.182.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1264.71', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFhINUdsdkprb3FyY3FEYXJyM05JMzJ1ZVd5anNodVR4dU1IZk1uaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755948329),
('TNbqp4osS5tQxIZHtXwvP6gZpKgsKi7s8u3zQ1v1', NULL, '156.249.60.174', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12.5; rv:114.0) Gecko/20100101 Firefox/114.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHdqYVJmd1FtcEF1RFdzUjBmanFISndxczNibk1CajFYSTdIODFKSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755202513),
('TV0J0HbDm4zxQ1Hx46ae6GvgAqncZYEWQIa0OIgg', NULL, '156.228.183.184', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYm5iUnBLNTFSVmJnZTdBV01EWTZITWZ0SGlkSVAwTXMwNVZra2xmaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755993522),
('vit6PRwfpPwjquLz2CcbfudFln5kJbxswjrVGsoK', 1, '2604:3d09:d07c:bee0:a4f4:fe18:515d:fc55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY1dPaHlldkdRbVpSZEhrdWZDbENOd0toQXZWOXdqdXRzS1hhRE94VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljL2Fib3V0bWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NjA3NzcyODt9fQ==', 1756077731),
('Weko9ytjqc93G3gEZw37DBv25t5DjnqEJx2rfFGJ', NULL, '43.157.181.189', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlo0UVo0Wjk3VHhLWEcxdzY3M1RQQWFxano1ODh5YkJka3REcWpUNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755093607),
('XEvzlbjxuvp69KdFlUf3cjb60KZybrT9DrmPQKu8', NULL, '156.233.91.131', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/89.0.4447.51', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWpmRzFBZk80TnZEaGR0SVhod0NoaDVLSnhBVnh6UktQTjU3MDR4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2ppbWVuZXoud2Vic2l0ZS9jbXMvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755382145);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kelvin Jimenez', '/img/admin/8096_1756563538.png', 'kelvin.jimenez@gmail.com', NULL, 'admin', '$2y$12$iR.nkH8B/3EVL2eb7pMvRezt7i7u6TX1YgSTAfNfmzF1RjSlCRr4q', 'xQZU2j6HX0di0NX0Aw1uzlILZCNE8oyFWcmNbyZFJoBYx4YYvtUNReiS5v0N', '2025-05-10 03:40:30', '2025-08-30 19:18:58'),
(4, 'Ojandi Jimenez', '/img/admin/8134_1748218996.jpg', 'ojandi@gmail.com', NULL, 'admin', '$2y$12$rv5lt1YEIGCVv7Ool1qZk.OGaWbNwdjzg23hUoLs8.D8B5EF4MfM2', NULL, '2025-05-23 22:06:31', '2025-05-26 05:23:16'),
(5, 'Kimberly', '/img/admin/1937_1748627247.jpg', 'kimberly@gmail.com', NULL, 'user', '$2y$12$iR.nkH8B/3EVL2eb7pMvRezt7i7u6TX1YgSTAfNfmzF1RjSlCRr4q', NULL, '2025-05-23 22:11:14', '2025-05-30 22:47:27'),
(8, 'Lianna Jimenez', '/img/admin/2688_1748627435.jpg', 'lianna@gmail.com', NULL, 'admin', '$2y$12$iR.nkH8B/3EVL2eb7pMvRezt7i7u6TX1YgSTAfNfmzF1RjSlCRr4q', NULL, '2025-05-30 22:33:39', '2025-05-30 22:50:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aboutme`
--
ALTER TABLE `aboutme`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indices de la tabla `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT de la tabla `aboutme`
--
ALTER TABLE `aboutme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
