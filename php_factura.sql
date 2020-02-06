-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2019 a las 22:25:18
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_factura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_orden`
--

CREATE TABLE `factura_orden` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_receiver_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `order_receiver_address` text CHARACTER SET utf8 NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) CHARACTER SET utf8 NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_orden_producto`
--

CREATE TABLE `factura_orden_producto` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_usuarios`
--

CREATE TABLE `factura_usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura_usuarios`
--

INSERT INTO `factura_usuarios` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(1, 'willan.tuquerrez@outlook.com', '12345', 'Willan', '', 78979676, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `factura_orden_producto`
--
ALTER TABLE `factura_orden_producto`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indices de la tabla `factura_usuarios`
--
ALTER TABLE `factura_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura_orden`
--
ALTER TABLE `factura_orden`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_orden_producto`
--
ALTER TABLE `factura_orden_producto`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_usuarios`
--
ALTER TABLE `factura_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

---
create table tabla_productos(
    id_producto int(11) not null AUTO_INCREMENT PRIMARY KEY,
    nombre_prod  varchar(50) not null,
    precio float not null,
    cantidad_disponible int(11)
);

INSERT INTO tabla_productos VALUES(0,'Manijas de laton',    5.00, 5966);
INSERT INTO tabla_productos VALUES(0,'Manijas de acero',    8.00, 3166);
INSERT INTO tabla_productos VALUES(0,'Visagras',            2.55, 1353);
INSERT INTO tabla_productos VALUES(0,'Candado Veris',       10.00, 7148);
INSERT INTO tabla_productos VALUES(0,'Candado Monte',       15.00, 8156);
INSERT INTO tabla_productos VALUES(0,'Tubo de cortina [m]', 5.75, 6263);
INSERT INTO tabla_productos VALUES(0,'Tubo de drenaje [m]', 8.00, 1588);
INSERT INTO tabla_productos VALUES(0,'Tubo de agua [m]',    4.00, 5254);
INSERT INTO tabla_productos VALUES(0,'Foco incandencente',  4.90, 9159);
INSERT INTO tabla_productos VALUES(0,'Foco led',            6.35, 9451);
INSERT INTO tabla_productos VALUES(0,'Malla de alambre',    5.00, 100);
INSERT INTO tabla_productos VALUES(0,'Plancha de madera prensada [m2]', 5.20, 200);
INSERT INTO tabla_productos VALUES(0,'Plancha plastica [m2]',    6.35, 100);
INSERT INTO tabla_productos VALUES(0,'Manguera estandar [m]',   8.30, 4100);
INSERT INTO tabla_productos VALUES(0,'Manguera flexible [m]',   15.40, 3100);
INSERT INTO tabla_productos VALUES(0,'Manijas de latón',    5.00, 5050);
INSERT INTO tabla_productos VALUES(0,'Cable de cobre [m]', 1.25, 1000);