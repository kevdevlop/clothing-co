-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2018 at 05:29 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Hombres'),
(2, 'Mujeres'),
(3, 'Niños');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text,
  `email` text NOT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`) VALUES
(25, 'giuhnkjmk', 'biunlkm', 'ybunmk@bnjkmdfvf', '7890', 'bhkjnlm,'),
(26, 'giuhnkjmk', 'biunlkm', 'dlckdlsc@dcs', '7890', 'bhkjnlm,'),
(27, 'giuhnkjmk', 'biunlkm', 'ybunmk@bnjkmsa3445445', '7890', 'bhkjnlm,'),
(28, 'giuhnkjmk', 'biunlkm', 'ybunmk@bnjkm', '7890', 'bhkjnlm,'),
(29, 'gyuihlk', 'biunm', 'ijkmlaslxmalsñm', '2039489', 'Guadalupe victoria 2'),
(30, 'kevin', 'lopez', 'huimklmlmlkmlkñm', '2039489', 'Guadalupe victoria 2'),
(32, 'kevin', 'lopez', 'kmlmklmklml', '2039489', 'Guadalupe victoria 2'),
(33, 'kevin', 'lopez', 'kevinprimo320@cdcmdm.com', '2039489', 'Guadalupe victoria 2'),
(34, 'kevin', 'lopez', 'osdoksao@gmail.com', '8789078678798', 'njkmnjml'),
(35, 'nuevo cliet', 'loaosdp`', 'correo@gmail.com', '01234567', 'querearo'),
(36, 'nuevo cliente', 'otrs', 'nuevo@nuevo.com', '987656789098', 'juancito');

-- --------------------------------------------------------

--
-- Table structure for table `compraItem`
--

CREATE TABLE `compraItem` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_cantidad` decimal(10,0) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `facturaCompra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compraItem`
--

INSERT INTO `compraItem` (`id`, `cantidad`, `precio_cantidad`, `producto_id`, `facturaCompra_id`) VALUES
(1, 3, '10368', 2, 5),
(2, 3, '10368', 2, 6),
(3, 3, '10368', 2, 7),
(4, 2, '1976', 4, 8),
(5, 2, '1976', 4, 9),
(6, 3, '10368', 2, 9),
(7, 4, '9376', 1, 10),
(8, 8, '18752', 1, 11),
(9, 4, '13824', 2, 11),
(10, 2, '6912', 2, 12),
(11, 2, '4688', 1, 12),
(12, 1, '988', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `facturaCompra`
--

CREATE TABLE `facturaCompra` (
  `id` int(11) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tarjeta_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `pay_cash` tinyint(1) DEFAULT '0',
  `pay_card` tinyint(1) DEFAULT '0',
  `total_payed` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facturaCompra`
--

INSERT INTO `facturaCompra` (`id`, `fecha_pago`, `tarjeta_id`, `cliente_id`, `pay_cash`, `pay_card`, `total_payed`) VALUES
(5, '2018-11-27 02:29:36', NULL, 26, 1, 0, NULL),
(6, '2018-11-27 02:31:09', NULL, 27, 1, 0, '10368'),
(7, '2018-11-27 02:32:32', NULL, 28, 1, 0, '10368'),
(8, '2018-11-27 02:56:34', 1, 32, 0, 1, NULL),
(9, '2018-11-27 02:57:33', 2, 33, 0, 1, '12344'),
(10, '2018-11-27 03:14:53', 3, 34, 0, 1, '9376'),
(11, '2018-11-27 03:21:29', NULL, 35, 1, 0, '32576'),
(12, '2018-11-30 04:58:01', 4, 36, 0, 1, '12588');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'kevin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `image` varchar(400) DEFAULT NULL,
  `price` decimal(30,0) DEFAULT NULL,
  `descripcion` text,
  `stock` int(11) NOT NULL DEFAULT '0',
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nombre`, `image`, `price`, `descripcion`, `stock`, `categoria_id`) VALUES
(1, 'cdcdsjcndjsknckn', 'http://www.dinomino.com/images//pic/moda-vans-authentic-chino-136369915.jpg', '2344', 'cscmksmco', 0, 1),
(2, 'cdkscmdsklcmlkdsmclkm', 'http://www.dinomino.com/images//pic/moda-vans-authentic-chino-136369915.jpg', '3456', 'csjkmdsklcmdklsmkl', 0, 2),
(4, 'nuevo item', 'http://www.trendisima.com/wp-content/uploads/2013/04/pull-bear-yumi-primavera-2013-02.jpg', '988', 'skmxlamsxklmassa\r\ncd\r\nsc\r\ndsc\r\nds\r\n', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `nombre_titular` varchar(800) NOT NULL,
  `numero` bigint(16) NOT NULL,
  `banco` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `nombre_titular`, `numero`, `banco`) VALUES
(1, 'kevinslcml lmdsa', 3454349830, 'banamex'),
(2, 'kevinslcml lmdsa', 3454349830, 'banamex'),
(3, 'juan clajdlasjjp', 5554289376, 'santander'),
(4, 'nuevo cccc', 986756879, 'Banorte');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(333));

--
-- Indexes for table `compraItem`
--