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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text,
  `email` text NOT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`(333))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





--
-- Table structure for table `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_titular` varchar(800) NOT NULL,
  `numero` bigint(16) NOT NULL,
  `banco` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `image` varchar(400) DEFAULT NULL,
  `price` decimal(30,0) DEFAULT NULL,
  `descripcion` text,
  `stock` int(11) NOT NULL DEFAULT '0',
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_ProductCategoria FOREIGN KEY (`categoria_id`)
  REFERENCES categorias(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nombre`, `image`, `price`, `descripcion`, `stock`, `categoria_id`) VALUES
(1, 'cdcdsjcndjsknckn', 'img-cdcdsjcndjsknckn.jpg', '2344', 'cscmksmco', 0, 1),
(2, 'cdkscmdsklcmlkdsmclkm', 'img-cdkscmdsklcmlkdsmclkm.jpg', '3456', 'csjkmdsklcmdklsmkl', 0, 2),
(4, 'nuevo item', 'img-nuevo item.jpg', '988', 'skmxlamsxklmassa\r\ncd\r\nsc\r\ndsc\r\nds\r\n', 0, 2);


-- --------------------------------------------------------

--
-- Table structure for table `facturaCompra`
--

CREATE TABLE `facturaCompra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_pago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tarjeta_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `pay_cash` tinyint(1) DEFAULT '0',
  `pay_card` tinyint(1) DEFAULT '0',
  `total_payed` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT FK_ClienteFactura FOREIGN KEY (`cliente_id`)
  REFERENCES clientes(`id`) ON DELETE CASCADE,
  CONSTRAINT FK_TarjetaFactura FOREIGN KEY (`tarjeta_id`)
  REFERENCES tarjeta(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




-- --------------------------------------------------------

--
-- Table structure for table `compraItem`
--


CREATE TABLE `compraItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio_cantidad` decimal(10,0) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `facturaCompra_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT FK_ProductoCompraItem FOREIGN KEY (`producto_id`)
  REFERENCES products(`id`) ON DELETE CASCADE,
  CONSTRAINT FK_FacturaCompraItem FOREIGN KEY (`facturaCompra_id`)
  REFERENCES facturaCompra(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





-- --------------------------------------------------------




--
-- Indexes for dumped tables
--



--
-- Indexes for table `compraItem`
--