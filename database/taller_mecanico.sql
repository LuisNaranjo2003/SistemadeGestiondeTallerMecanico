-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2026 a las 03:10:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_mecanico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE clientes (
    id_cliente INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    cedula VARCHAR(10) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    PRIMARY KEY (id_cliente),
    UNIQUE KEY (correo)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id_mecanico` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `especialidad` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_mecanico`)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` INT NOT NULL AUTO_INCREMENT,
  `vehiculo_id` INT NOT NULL,
  `mecanico_id` INT NOT NULL,
  `servicio_id` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `observaciones` TEXT NOT NULL,
  `estado` ENUM('Pendiente','En Proceso','Finalizado','Cancelado') NOT NULL,

  PRIMARY KEY (`id_orden`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` INT NOT NULL AUTO_INCREMENT,
  `nombre_servicio` VARCHAR(100) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,

  PRIMARY KEY (`id_servicio`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(10) NOT NULL,
  `marca` VARCHAR(50) NOT NULL,
  `modelo` VARCHAR(50) NOT NULL,
  `anio` YEAR NOT NULL,
  `color` VARCHAR(30) NOT NULL,
  `cliente_id` INT NOT NULL,

  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `placa` (`placa`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE proveedores (
    id_proveedor INT NOT NULL AUTO_INCREMENT,
    empresa VARCHAR(100) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT NULL,

    PRIMARY KEY (id_proveedor)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4

COLLATE=utf8mb4_general_ci;
CREATE TABLE citas (
    id_cita INT NOT NULL AUTO_INCREMENT,
    cliente_id INT NOT NULL,
    vehiculo_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    estado ENUM('Pendiente','Confirmada','Cancelada','Atendida') NOT NULL,

    PRIMARY KEY (id_cita),

    CONSTRAINT fk_citas_cliente
    FOREIGN KEY (cliente_id)
    REFERENCES clientes(id_cliente)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_citas_vehiculo
    FOREIGN KEY (vehiculo_id)
    REFERENCES vehiculos(id_vehiculo)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

CREATE TABLE facturas (
    id_factura INT NOT NULL AUTO_INCREMENT,
    orden_id INT NOT NULL,
    fecha DATE NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    iva DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,

    PRIMARY KEY (id_factura),

    CONSTRAINT fk_facturas_ordenes
    FOREIGN KEY (orden_id)
    REFERENCES ordenes(id_orden)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

CREATE TABLE pagos (
    id_pago INT NOT NULL AUTO_INCREMENT,
    factura_id INT NOT NULL,
    metodo_pago ENUM('Efectivo','Tarjeta','Transferencia') NOT NULL,
    fecha_pago DATE NOT NULL,
    estado ENUM('Pendiente','Pagado') NOT NULL,

    PRIMARY KEY (id_pago),

    CONSTRAINT fk_pagos_facturas
    FOREIGN KEY (factura_id)
    REFERENCES facturas(id_factura)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

CREATE TABLE repuestos (
    id_repuesto INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    proveedor_id INT NOT NULL,

    PRIMARY KEY (id_repuesto),

    CONSTRAINT fk_repuestos_proveedor
    FOREIGN KEY (proveedor_id)
    REFERENCES proveedores(id_proveedor)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `fk_ordenes_mecanicos` FOREIGN KEY (`mecanico_id`) REFERENCES `mecanicos` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ordenes_servicios` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ordenes_vehiculos` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

