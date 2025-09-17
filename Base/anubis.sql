-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para anubis
CREATE DATABASE IF NOT EXISTS `anubis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `anubis`;

-- Volcando estructura para tabla anubis.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `referencia` varchar(13) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `familia` int DEFAULT '0',
  `tipo_impuesto` int DEFAULT '0',
  `proveedor_1` int DEFAULT '0',
  `proveedor_2` int DEFAULT '0',
  `proveedor_3` int DEFAULT '0',
  `descripcion_corta` varchar(25) DEFAULT NULL,
  `no_actualizar_stock` tinyint(1) DEFAULT NULL,
  `ubicacion` varchar(40) DEFAULT NULL,
  `stock` decimal(10,2) DEFAULT '0.00',
  `stock_minimo` decimal(10,2) DEFAULT '0.00',
  `stock_maximo` decimal(10,2) DEFAULT '0.00',
  `stock_optimo` decimal(10,2) DEFAULT '0.00',
  `minimo_vender` decimal(10,2) DEFAULT '0.00',
  `minimo_comprar` decimal(10,2) DEFAULT '0.00',
  `referencia_proveedor` varchar(13) DEFAULT NULL,
  `no_avisar_stock` tinyint(1) DEFAULT NULL,
  `pvp_1` decimal(10,2) DEFAULT '0.00',
  `pvp_2` decimal(10,2) DEFAULT '0.00',
  `pvp_3` decimal(10,2) DEFAULT '0.00',
  `pvp_4` decimal(10,2) DEFAULT '0.00',
  `pvp_5` decimal(10,2) DEFAULT '0.00',
  `pvp_6` decimal(10,2) DEFAULT '0.00',
  `pvp_7` decimal(10,2) DEFAULT '0.00',
  `pvp_8` decimal(10,2) DEFAULT '0.00',
  `pvp_9` decimal(10,2) DEFAULT '0.00',
  `observaciones` longtext,
  `archivo_imagen` varchar(100) DEFAULT NULL,
  `oferta` int DEFAULT '0',
  `medida` decimal(10,2) DEFAULT '0.00',
  `unidad_medida` varchar(15) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT '0.00',
  `tabla_descuento` int DEFAULT '0',
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_caducidad` datetime DEFAULT NULL,
  `dias_garantia` int DEFAULT '0',
  `unidades_bulto` int DEFAULT '0',
  `precio_medio_compra` decimal(10,2) DEFAULT '0.00',
  `ultimo_precio_compra` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_1` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_2` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_3` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_4` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_5` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_6` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_7` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_8` decimal(10,2) DEFAULT '0.00',
  `beneficio_pvp_9` decimal(10,2) DEFAULT '0.00',
  `compuesto` tinyint(1) DEFAULT NULL,
  `preguntar_precio` tinyint(1) DEFAULT NULL,
  `no_segunda_impresora` tinyint(1) DEFAULT '0',
  `referencia_proveedor_2` varchar(13) DEFAULT NULL,
  `referencia_proveedor_3` varchar(13) DEFAULT NULL,
  `precio_compra_proveedor` decimal(10,2) DEFAULT '0.00',
  `precio_compra_proveedor_2` decimal(10,2) DEFAULT '0.00',
  `precio_compra_proveedor_3` decimal(10,2) DEFAULT '0.00',
  `descripcion_centrada` tinyint(1) DEFAULT '0',
  `subrayado` tinyint(1) DEFAULT '0',
  `cursiva` tinyint(1) DEFAULT '0',
  `negrita` tinyint(1) DEFAULT '0',
  `tamano` int DEFAULT '0',
  `fuente` varchar(30) DEFAULT NULL,
  `color_texto` int DEFAULT '0',
  `color_fondo` int DEFAULT '0',
  `articulo_bascula` tinyint(1) DEFAULT '0',
  `impresora` tinyint unsigned DEFAULT NULL,
  `orden` int DEFAULT NULL,
  `venta_local` tinyint(1) DEFAULT NULL,
  `subida_web` tinyint(1) DEFAULT NULL,
  `modificado_web` tinyint(1) DEFAULT NULL,
  `descripcion_web` longtext,
  `descripcion_corta_web` longtext,
  `no_imp_final` tinyint(1) DEFAULT NULL,
  `gluten` tinyint(1) DEFAULT NULL,
  `pescado` tinyint(1) DEFAULT NULL,
  `huevos` tinyint(1) DEFAULT NULL,
  `frutos` tinyint(1) DEFAULT NULL,
  `cacahuetes` tinyint(1) DEFAULT NULL,
  `soja` tinyint(1) DEFAULT NULL,
  `sesamo` tinyint(1) DEFAULT NULL,
  `lacteos` tinyint(1) DEFAULT NULL,
  `apio` tinyint(1) DEFAULT NULL,
  `crustaceos` tinyint(1) DEFAULT NULL,
  `mostaza` tinyint(1) DEFAULT NULL,
  `moluscos` tinyint(1) DEFAULT NULL,
  `azufre` tinyint(1) DEFAULT NULL,
  `altramuces` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`referencia`),
  KEY `idx_descripcion` (`descripcion`),
  KEY `idx_referencia_proveedor` (`referencia_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.articulos_compuestos
CREATE TABLE IF NOT EXISTS `articulos_compuestos` (
  `articulo` varchar(13) NOT NULL,
  `linea` int NOT NULL DEFAULT '0',
  `referencia` varchar(13) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `cantidad` float DEFAULT '0',
  `precio` float DEFAULT '0',
  PRIMARY KEY (`articulo`,`linea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.cabecera albaranes de compra
CREATE TABLE IF NOT EXISTS `cabecera albaranes de compra` (
  `Numero` int NOT NULL DEFAULT '0',
  `Fecha` datetime DEFAULT NULL,
  `Proveedor` int DEFAULT '0',
  `Su Albaran` varchar(25) DEFAULT NULL,
  `Observaciones` longtext,
  `Forma de Pago` int DEFAULT '0',
  `Facturado` tinyint(1) DEFAULT NULL,
  `Documento` varchar(40) DEFAULT NULL,
  `Transportista` varchar(40) DEFAULT NULL,
  `Tipo Portes` varchar(1) DEFAULT NULL,
  `Descuento PP` float DEFAULT '0',
  `Gastos` float DEFAULT '0',
  `Portes` float DEFAULT '0',
  `Moneda` int DEFAULT '1',
  `subido` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.cabecera facturas de compra
CREATE TABLE IF NOT EXISTS `cabecera facturas de compra` (
  `Numero` int NOT NULL DEFAULT '0',
  `Fecha` datetime DEFAULT NULL,
  `Proveedor` int DEFAULT '0',
  `Su Factura` varchar(25) DEFAULT NULL,
  `Observaciones` longtext,
  `Forma de Pago` int DEFAULT '0',
  `Facturado` tinyint(1) DEFAULT NULL,
  `Documento` varchar(40) DEFAULT NULL,
  `Transportista` varchar(40) DEFAULT NULL,
  `Tipo Portes` varchar(1) DEFAULT NULL,
  `Descuento PP` float DEFAULT '0',
  `Gastos` float DEFAULT '0',
  `Portes` float DEFAULT '0',
  `Moneda` int DEFAULT '1',
  `subido` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.cabecera facturas de venta
CREATE TABLE IF NOT EXISTS `cabecera facturas de venta` (
  `Numero` int NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Cliente` int DEFAULT '0',
  `Observaciones` longtext,
  `Representante` int DEFAULT '0',
  `Comision` float DEFAULT '0',
  `Aplicar Comision` varchar(15) DEFAULT NULL,
  `Forma de Pago` int DEFAULT '0',
  `Fecha Caducidad` datetime DEFAULT NULL,
  `Realizado por` varchar(40) DEFAULT NULL,
  `Facturado` tinyint(1) DEFAULT NULL,
  `Documento` varchar(40) DEFAULT NULL,
  `Razon Social` varchar(40) DEFAULT NULL,
  `Domicilio` varchar(40) DEFAULT NULL,
  `Codigo Postal` int DEFAULT '0',
  `Poblacion` varchar(40) DEFAULT NULL,
  `Provincia` varchar(25) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `Telefono` varchar(17) DEFAULT NULL,
  `Notas` varchar(250) DEFAULT NULL,
  `Transportista` varchar(40) DEFAULT NULL,
  `Tipo Portes` varchar(1) DEFAULT NULL,
  `Descuento PP` float DEFAULT '0',
  `Gastos` float DEFAULT '0',
  `Portes` float DEFAULT '0',
  `Cierre Caja` tinyint(1) DEFAULT NULL,
  `Moneda` int DEFAULT '1',
  `ExpedienteFace` varchar(200) DEFAULT NULL,
  `OperacionFace` varchar(200) DEFAULT NULL,
  `EntidadPublica` varchar(1) DEFAULT NULL,
  `OficinaContable` varchar(200) DEFAULT NULL,
  `OrganoGestor` varchar(200) DEFAULT NULL,
  `UnidadTramitadora` varchar(200) DEFAULT NULL,
  `Organoproponente` varchar(200) DEFAULT NULL,
  `subido` tinyint(1) DEFAULT NULL,
  `tbai` varchar(250) DEFAULT NULL,
  `SerieFacturaAnterior` varchar(10) DEFAULT NULL,
  `NumFacturaAnterior` varchar(10) DEFAULT NULL,
  `FechaExpedicionFacturaAnterior` varchar(10) DEFAULT NULL,
  `SignatureValueFirmaFacturaAnterior` varchar(250) DEFAULT NULL,
  `QrLabel` varchar(250) DEFAULT NULL,
  `QrContenido` varchar(250) DEFAULT NULL,
  `SignatureValue` varchar(250) DEFAULT NULL,
  `NumFacturaTBAI` int DEFAULT NULL,
  `SerieE` varchar(6) DEFAULT NULL,
  `NumeroE` int DEFAULT NULL,
  `Emitida` tinyint(1) DEFAULT NULL,
  `Rectificativa` int DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.cabecera tickets de venta
CREATE TABLE IF NOT EXISTS `cabecera tickets de venta` (
  `Numero` int NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Hora` datetime DEFAULT NULL,
  `Cliente` int DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Camarero` int DEFAULT '0',
  `Mesa` int DEFAULT '0',
  `Cuenta` tinyint(1) DEFAULT NULL,
  `Entrega` float DEFAULT '0',
  `Facturado` tinyint(1) DEFAULT NULL,
  `Documento` varchar(40) DEFAULT NULL,
  `Observaciones` varchar(40) DEFAULT NULL,
  `Descuento PP` float DEFAULT '0',
  `Moneda` int DEFAULT '1',
  `Aplazado` tinyint(1) DEFAULT NULL,
  `Forma de Pago` varchar(10) DEFAULT NULL,
  `Personas` int DEFAULT '0',
  `Notas` varchar(250) DEFAULT NULL,
  `Porcentaje Propina` float DEFAULT '0',
  `Importe Propina` float DEFAULT '0',
  `FormaPago1` varchar(10) DEFAULT NULL,
  `FormaPago2` varchar(10) DEFAULT NULL,
  `FormaPago3` varchar(10) DEFAULT NULL,
  `Entrega1` float DEFAULT '0',
  `Entrega2` float DEFAULT '0',
  `Entrega3` float DEFAULT '0',
  `idEvento` int DEFAULT '0',
  `Historico` int DEFAULT NULL,
  `flag` varchar(1) DEFAULT '0',
  `subido` tinyint(1) DEFAULT NULL,
  `tbai` varchar(250) DEFAULT NULL,
  `SerieFacturaAnterior` varchar(10) DEFAULT NULL,
  `NumFacturaAnterior` varchar(10) DEFAULT NULL,
  `FechaExpedicionFacturaAnterior` varchar(10) DEFAULT NULL,
  `SignatureValueFirmaFacturaAnterior` varchar(250) DEFAULT NULL,
  `QrLabel` varchar(250) DEFAULT NULL,
  `QrContenido` varchar(250) DEFAULT NULL,
  `SignatureValue` varchar(250) DEFAULT NULL,
  `NumFacturaTBAI` int DEFAULT NULL,
  `SerieE` varchar(6) DEFAULT NULL,
  `NumeroE` int DEFAULT NULL,
  `Emitida` tinyint(1) DEFAULT NULL,
  `Rectificativa` int DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.cajas
CREATE TABLE IF NOT EXISTS `cajas` (
  `codigo` int NOT NULL DEFAULT '0',
  `nombre` varchar(40) DEFAULT NULL,
  `ubicacion` varchar(40) DEFAULT NULL,
  `observaciones` longtext,
  `saldo_inicial` float DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.camareros
CREATE TABLE IF NOT EXISTS `camareros` (
  `codigo` int NOT NULL DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  `domicilio` varchar(40) DEFAULT NULL,
  `codigo_postal` int DEFAULT '0',
  `poblacion` varchar(40) DEFAULT NULL,
  `provincia` varchar(25) DEFAULT NULL,
  `pais` varchar(25) DEFAULT NULL,
  `telefono_1` varchar(17) DEFAULT NULL,
  `telefono_2` varchar(17) DEFAULT NULL,
  `fax` varchar(17) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `afiliacion` varchar(15) DEFAULT NULL,
  `precio_hora` float DEFAULT '0',
  `registro` varchar(25) DEFAULT NULL,
  `antiguedad` datetime DEFAULT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `domicilio_banco` varchar(40) DEFAULT NULL,
  `codigo_postal_banco` int DEFAULT '0',
  `poblacion_banco` varchar(40) DEFAULT NULL,
  `provincia_banco` varchar(25) DEFAULT NULL,
  `pais_banco` varchar(25) DEFAULT NULL,
  `entidad` varchar(4) DEFAULT NULL,
  `sucursal` varchar(4) DEFAULT NULL,
  `dc` varchar(2) DEFAULT NULL,
  `cuenta` varchar(10) DEFAULT NULL,
  `archivo_imagen` varchar(100) DEFAULT NULL,
  `observaciones` longtext,
  `no_mostrar_en_tickets` tinyint(1) DEFAULT '0',
  `contra` varchar(12) DEFAULT NULL,
  `iban` varchar(4) DEFAULT NULL,
  `eliminar_linea` tinyint(1) DEFAULT NULL,
  `cambiar_descripcion` tinyint(1) DEFAULT NULL,
  `cambiar_cantidad` tinyint(1) DEFAULT NULL,
  `cambiar_precio` tinyint(1) DEFAULT NULL,
  `eliminar_ticket` tinyint(1) DEFAULT NULL,
  `usar_navegacion` tinyint(1) DEFAULT NULL,
  `abono` tinyint(1) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT NULL,
  `bloc_tarifa` tinyint(1) DEFAULT NULL,
  `rediff` varchar(40) DEFAULT NULL,
  `bloc_ingreso` tinyint(1) DEFAULT NULL,
  `bloquear_aplazados` tinyint(1) DEFAULT NULL,
  `bloq_cajon` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `codigo` int NOT NULL DEFAULT '0',
  `razon_social` varchar(40) DEFAULT NULL,
  `titular` varchar(40) DEFAULT NULL,
  `domicilio` varchar(40) DEFAULT NULL,
  `codigo_postal` int DEFAULT '0',
  `poblacion` varchar(40) DEFAULT NULL,
  `provincia` varchar(25) DEFAULT NULL,
  `pais` varchar(25) DEFAULT NULL,
  `telefono_1` varchar(17) DEFAULT NULL,
  `telefono_2` varchar(17) DEFAULT NULL,
  `fax` varchar(17) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `zona` int DEFAULT '0',
  `persona_contacto` varchar(40) DEFAULT NULL,
  `telefono_contacto` varchar(17) DEFAULT NULL,
  `representante` int DEFAULT '0',
  `archivo_imagen` varchar(100) DEFAULT NULL,
  `observaciones` longtext,
  `tarifa` int DEFAULT '1',
  `tabla_descuento` int DEFAULT '0',
  `descuento_pp` float DEFAULT '0',
  `impuestos` varchar(1) DEFAULT 'I',
  `copias` int DEFAULT '1',
  `forma_de_pago` int DEFAULT '0',
  `dia_pago_1` int DEFAULT '0',
  `dia_pago_2` int DEFAULT '0',
  `banco` varchar(40) DEFAULT NULL,
  `domicilio_banco` varchar(40) DEFAULT NULL,
  `codigo_postal_banco` int DEFAULT '0',
  `poblacion_banco` varchar(40) DEFAULT NULL,
  `provincia_banco` varchar(25) DEFAULT NULL,
  `pais_banco` varchar(25) DEFAULT NULL,
  `entidad` varchar(4) DEFAULT NULL,
  `sucursal` varchar(4) DEFAULT NULL,
  `dc` varchar(2) DEFAULT NULL,
  `cuenta` varchar(10) DEFAULT NULL,
  `portes` varchar(1) DEFAULT 'D',
  `domicilio_envio` varchar(40) DEFAULT NULL,
  `codigo_postal_envio` int DEFAULT '0',
  `poblacion_envio` varchar(40) DEFAULT NULL,
  `provincia_envio` varchar(25) DEFAULT NULL,
  `pais_envio` varchar(25) DEFAULT NULL,
  `antiguedad` datetime DEFAULT NULL,
  `riesgo` float DEFAULT '0',
  `aviso` varchar(40) DEFAULT NULL,
  `propina` float DEFAULT '0',
  `publicidad` tinyint(1) DEFAULT NULL,
  `iban` varchar(4) DEFAULT NULL,
  `bic` varchar(11) DEFAULT NULL,
  `fecha_firma` datetime DEFAULT NULL,
  `evento1_nombre` varchar(20) DEFAULT NULL,
  `evento2_nombre` varchar(20) DEFAULT NULL,
  `evento3_nombre` varchar(20) DEFAULT NULL,
  `evento1_fecha` datetime DEFAULT NULL,
  `evento2_fecha` datetime DEFAULT NULL,
  `evento3_fecha` datetime DEFAULT NULL,
  `t_credito` varchar(30) DEFAULT NULL,
  `fidelizacion` double DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `razon_social` (`razon_social`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.datos_empresa
CREATE TABLE IF NOT EXISTS `datos_empresa` (
  `codigo` int NOT NULL DEFAULT '0',
  `nombre` varchar(40) DEFAULT NULL,
  `razon_social` varchar(40) DEFAULT NULL,
  `anio` int DEFAULT '0',
  `actividad` varchar(40) DEFAULT NULL,
  `domicilio` varchar(40) DEFAULT NULL,
  `codigo_postal` int DEFAULT '0',
  `poblacion` varchar(40) DEFAULT NULL,
  `provincia` varchar(25) DEFAULT NULL,
  `pais` varchar(25) DEFAULT NULL,
  `telefono_1` varchar(17) DEFAULT NULL,
  `telefono_2` varchar(17) DEFAULT NULL,
  `fax` varchar(17) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nif` varchar(15) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `afiliacion` varchar(15) DEFAULT NULL,
  `registro_mercantil` varchar(80) DEFAULT NULL,
  `observaciones` longtext,
  `dual_flag` tinyint(1) DEFAULT NULL,
  `decimales_pesetas` tinyint unsigned DEFAULT '0',
  `decimales_euros` tinyint unsigned DEFAULT '0',
  `decimales_cantidades` tinyint unsigned DEFAULT '0',
  `decimales_descuento` tinyint unsigned DEFAULT '0',
  `avisar_riesgo` tinyint(1) DEFAULT NULL,
  `actualizar_pvp` tinyint(1) DEFAULT NULL,
  `archivo_imagen` varchar(100) DEFAULT NULL,
  `caja_recibos` int DEFAULT '0',
  `caja_pagos` int DEFAULT '0',
  `estado` varchar(15) DEFAULT 'Pagado',
  `cliente_nulo` int DEFAULT '0',
  `cliente_tickets` int DEFAULT '0',
  `moneda_principal` int DEFAULT '1',
  `cliente_tarjeta` int DEFAULT '0',
  `contrasena` varchar(25) DEFAULT NULL,
  `carpeta_imagenes` varchar(100) DEFAULT NULL,
  `licencia` varchar(7) DEFAULT NULL,
  `importe_minimo_fac_simpl` int DEFAULT NULL,
  `importe_minimo_fac` int DEFAULT NULL,
  `nombref` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.familias
CREATE TABLE IF NOT EXISTS `familias` (
  `codigo` int NOT NULL DEFAULT '0',
  `nombre` varchar(40) DEFAULT NULL,
  `observaciones` longtext,
  `no_mostrar_en_tickets` tinyint(1) DEFAULT '0',
  `combinados` tinyint(1) DEFAULT '0',
  `archivo_imagen` varchar(100) DEFAULT NULL,
  `sumar_importes` tinyint(1) DEFAULT '0',
  `descripcion_centrada` tinyint(1) DEFAULT '0',
  `subrayado` tinyint(1) DEFAULT '0',
  `cursiva` tinyint(1) DEFAULT '0',
  `negrita` tinyint(1) DEFAULT '0',
  `tamano` int DEFAULT '0',
  `fuente` varchar(30) DEFAULT NULL,
  `color_texto` int DEFAULT '0',
  `color_fondo` int DEFAULT '0',
  `orden` int DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.formas_de_pago
CREATE TABLE IF NOT EXISTS `formas_de_pago` (
  `codigo` int NOT NULL DEFAULT '0',
  `numero_pagos` int DEFAULT '0',
  `nombre` varchar(40) DEFAULT NULL,
  `dias_pago_1` int DEFAULT '0',
  `porcentaje_pago_1` float DEFAULT '0',
  `dias_pago_2` int DEFAULT '0',
  `porcentaje_pago_2` float DEFAULT '0',
  `dias_pago_3` int DEFAULT '0',
  `porcentaje_pago_3` float DEFAULT '0',
  `dias_pago_4` int DEFAULT '0',
  `porcentaje_pago_4` float DEFAULT '0',
  `dias_pago_5` int DEFAULT '0',
  `porcentaje_pago_5` float DEFAULT '0',
  `dias_pago_6` int DEFAULT '0',
  `porcentaje_pago_6` float DEFAULT '0',
  `dias_pago_7` int DEFAULT '0',
  `porcentaje_pago_7` float DEFAULT '0',
  `dias_pago_8` int DEFAULT '0',
  `porcentaje_pago_8` float DEFAULT '0',
  `dias_pago_9` int DEFAULT '0',
  `porcentaje_pago_9` float DEFAULT '0',
  `dias_pago_10` int DEFAULT '0',
  `porcentaje_pago_10` float DEFAULT '0',
  `dias_pago_11` int DEFAULT '0',
  `porcentaje_pago_11` float DEFAULT '0',
  `dias_pago_12` int DEFAULT '0',
  `porcentaje_pago_12` float DEFAULT '0',
  `mostrar_en_tpv` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `Numero Gasto` int NOT NULL DEFAULT '0',
  `Fecha` datetime DEFAULT NULL,
  `Importe` float DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Causante` varchar(40) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  PRIMARY KEY (`Numero Gasto`),
  KEY `Fecha` (`Fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.histórico cierres caja
CREATE TABLE IF NOT EXISTS `histórico cierres caja` (
  `Numero` int NOT NULL AUTO_INCREMENT,
  `Caja` int DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Suma Tickets Efectivo` float DEFAULT '0',
  `Suma Tickets Tarjeta` float DEFAULT '0',
  `Suma Recibos Clientes` float DEFAULT '0',
  `Suma Ingresos` float DEFAULT '0',
  `Suma Pagos Proveed` float DEFAULT '0',
  `Suma Pagos Repre` float DEFAULT '0',
  `Suma Pagos Camareros` float DEFAULT '0',
  `Suma Gastos` float DEFAULT '0',
  `Cobros N Venta` float DEFAULT '0',
  `Pagos N Compra` float DEFAULT '0',
  `Saldo Inicial Caja` float DEFAULT '0',
  `Total` float DEFAULT NULL,
  `Importe caja` float DEFAULT '0',
  `Camarero` varchar(50) DEFAULT NULL,
  `Ticket Inicial Efectivo` varchar(50) DEFAULT NULL,
  `Ticket Final Efectivo` varchar(50) DEFAULT NULL,
  `Ticket Inicial Tarjeta` varchar(50) DEFAULT NULL,
  `Ticket Final Tarjeta` varchar(50) DEFAULT NULL,
  `N Tickets Incluidos Efectivo` varchar(50) DEFAULT NULL,
  `N Tickets Incluidos Tarjeta` varchar(50) DEFAULT NULL,
  KEY `Numero` (`Numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `Numero Ingreso` int NOT NULL DEFAULT '0',
  `Fecha` datetime DEFAULT NULL,
  `Importe` float DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Causante` varchar(40) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  PRIMARY KEY (`Numero Ingreso`),
  KEY `Fecha` (`Fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.lineas albaranes de compra
CREATE TABLE IF NOT EXISTS `lineas albaranes de compra` (
  `Numero` int NOT NULL DEFAULT '0',
  `Linea` int NOT NULL DEFAULT '0',
  `Articulo` varchar(13) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Coste` float DEFAULT '0',
  `Talla` varchar(15) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Cantidad` float DEFAULT '0',
  `Precio` float DEFAULT '0',
  `Descuento` float DEFAULT '0',
  `IVA` float DEFAULT '0',
  `RE` float DEFAULT '0',
  `almacen` float DEFAULT '0',
  PRIMARY KEY (`Numero`,`Linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.lineas facturas de compra
CREATE TABLE IF NOT EXISTS `lineas facturas de compra` (
  `Numero` int NOT NULL DEFAULT '0',
  `Linea` int NOT NULL DEFAULT '0',
  `Articulo` varchar(13) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Coste` float DEFAULT '0',
  `Talla` varchar(15) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Cantidad` float DEFAULT '0',
  `Precio` float DEFAULT '0',
  `Descuento` float DEFAULT '0',
  `IVA` float DEFAULT '0',
  `RE` float DEFAULT '0',
  PRIMARY KEY (`Numero`,`Linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.lineas facturas de venta
CREATE TABLE IF NOT EXISTS `lineas facturas de venta` (
  `Numero` int NOT NULL DEFAULT '0',
  `Linea` int NOT NULL DEFAULT '0',
  `Articulo` varchar(40) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Coste` float DEFAULT '0',
  `Talla` varchar(15) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Cantidad` float DEFAULT '0',
  `Precio` float DEFAULT '0',
  `Descuento` float DEFAULT '0',
  `IVA` float DEFAULT '0',
  `RE` float DEFAULT '0',
  PRIMARY KEY (`Numero`,`Linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.lineas tickets de venta
CREATE TABLE IF NOT EXISTS `lineas tickets de venta` (
  `Numero` int NOT NULL DEFAULT '0',
  `Linea` int NOT NULL DEFAULT '0',
  `Articulo` varchar(40) DEFAULT NULL,
  `Descripcion` varchar(40) DEFAULT NULL,
  `Coste` float DEFAULT '0',
  `Talla` varchar(15) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Cantidad` float DEFAULT '0',
  `Precio` float DEFAULT '0',
  `Descuento` float DEFAULT '0',
  `IVA` float DEFAULT '0',
  `RE` float DEFAULT '0',
  `Impreso2` tinyint(1) DEFAULT NULL,
  `CantidadImpresa2` float DEFAULT '0',
  `Detalle` varchar(25) DEFAULT NULL,
  `id_invitacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Numero`,`Linea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.logcontrolmodificaciones
CREATE TABLE IF NOT EXISTS `logcontrolmodificaciones` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(40) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Evento` varchar(50) DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `Observaciones` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.logoperaciones
CREATE TABLE IF NOT EXISTS `logoperaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Numero` int DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  `Terminal` varchar(100) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Dispositivo` varchar(20) DEFAULT NULL,
  `Camarero` int DEFAULT NULL,
  `OperReg` varchar(100) DEFAULT NULL,
  `Evento` varchar(100) DEFAULT NULL,
  `Operacion` varchar(100) DEFAULT NULL,
  `Descripcion` longtext,
  `json` longtext,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.logusuarios
CREATE TABLE IF NOT EXISTS `logusuarios` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `Hora` datetime DEFAULT NULL,
  `Operacion` int DEFAULT '0',
  `Camarero` int DEFAULT '0',
  `Ticket` int DEFAULT NULL,
  `Referencia` varchar(25) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Cantidad` double DEFAULT '0',
  `pvp` double DEFAULT '0',
  `Modificado` double DEFAULT '0',
  `Total` double DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.log_eventos
CREATE TABLE IF NOT EXISTS `log_eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) NOT NULL,
  `evento` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.mesas
CREATE TABLE IF NOT EXISTS `mesas` (
  `Codigo` int NOT NULL DEFAULT '0',
  `Nombre` varchar(50) DEFAULT NULL,
  `Ubicacion` varchar(40) DEFAULT NULL,
  `Observaciones` longtext,
  `Precios` varchar(25) DEFAULT NULL,
  `Personas` int DEFAULT '0',
  `Archivo Imagen` varchar(100) DEFAULT NULL,
  `Horizontal` float DEFAULT '0',
  `Vertical` float DEFAULT '0',
  `Salon` int DEFAULT '0',
  `Archivo Imagen Ocupado` varchar(100) DEFAULT NULL,
  `alias` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.motivosalidas
CREATE TABLE IF NOT EXISTS `motivosalidas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.pagos a camareros
CREATE TABLE IF NOT EXISTS `pagos a camareros` (
  `Numero Pago` int NOT NULL DEFAULT '0',
  `Importe` float DEFAULT '0',
  `Camarero` int DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Lugar Libramiento` varchar(40) DEFAULT NULL,
  `Parte Trabajo` int DEFAULT '0',
  `Orden` int DEFAULT '0',
  `Fecha Libramiento` datetime DEFAULT NULL,
  `Vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(15) DEFAULT 'Pagado',
  `Descripcion` varchar(50) DEFAULT NULL,
  `Clausulas` varchar(50) DEFAULT NULL,
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Provincia Banco` varchar(25) DEFAULT NULL,
  `Pais Banco` varchar(25) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Numero Pago`),
  KEY `Vencimiento` (`Vencimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.pagos a proveedores
CREATE TABLE IF NOT EXISTS `pagos a proveedores` (
  `Numero Pago` int NOT NULL DEFAULT '0',
  `Importe` float DEFAULT '0',
  `Proveedor` int DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Lugar Libramiento` varchar(40) DEFAULT NULL,
  `Factura` int DEFAULT '0',
  `Orden` int DEFAULT '0',
  `Fecha Libramiento` datetime DEFAULT NULL,
  `Vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(15) DEFAULT 'Pagado',
  `Descripcion` varchar(50) DEFAULT NULL,
  `Clausulas` varchar(50) DEFAULT NULL,
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Provincia Banco` varchar(25) DEFAULT NULL,
  `Pais Banco` varchar(25) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Numero Pago`),
  KEY `Vencimiento` (`Vencimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.pagos a representantes
CREATE TABLE IF NOT EXISTS `pagos a representantes` (
  `Numero Pago` int NOT NULL DEFAULT '0',
  `Importe` float DEFAULT '0',
  `Representante` int DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Lugar Libramiento` varchar(40) DEFAULT NULL,
  `Factura` int DEFAULT '0',
  `Orden` int DEFAULT '0',
  `Fecha Libramiento` datetime DEFAULT NULL,
  `Vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(15) DEFAULT 'Pagado',
  `Descripcion` varchar(50) DEFAULT NULL,
  `Clausulas` varchar(50) DEFAULT NULL,
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Provincia Banco` varchar(25) DEFAULT NULL,
  `Pais Banco` varchar(25) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Numero Pago`),
  KEY `Vencimiento` (`Vencimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `Codigo` int NOT NULL DEFAULT '0',
  `Razon Social` varchar(40) DEFAULT NULL,
  `Tipo Proveedor` varchar(40) DEFAULT NULL,
  `Titular` varchar(40) DEFAULT NULL,
  `Domicilio` varchar(40) DEFAULT NULL,
  `Codigo Postal` int DEFAULT '0',
  `Poblacion` varchar(40) DEFAULT NULL,
  `Provincia` varchar(25) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `Telefono 1` varchar(17) DEFAULT NULL,
  `Telefono 2` varchar(17) DEFAULT NULL,
  `Fax` varchar(17) DEFAULT NULL,
  `E-Mail` varchar(50) DEFAULT NULL,
  `NIF` varchar(15) DEFAULT NULL,
  `Web` varchar(50) DEFAULT NULL,
  `Codigo Cliente` varchar(12) DEFAULT NULL,
  `Persona Contacto` varchar(40) DEFAULT NULL,
  `Telefono Contacto` varchar(17) DEFAULT NULL,
  `Archivo Imagen` varchar(100) DEFAULT NULL,
  `Observaciones` longtext,
  `Tabla Descuento` int DEFAULT '0',
  `Descuento PP` float DEFAULT '0',
  `Impuestos` varchar(1) DEFAULT 'I',
  `Forma de Pago` int DEFAULT '0',
  `Dia Pago 1` int DEFAULT '0',
  `Dia Pago 2` int DEFAULT '0',
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Provincia Banco` varchar(25) DEFAULT NULL,
  `Pais Banco` varchar(25) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Portes` varchar(1) DEFAULT 'D',
  `Domicilio Envio` varchar(40) DEFAULT NULL,
  `Codigo Postal Envio` int DEFAULT '0',
  `Poblacion Envio` varchar(40) DEFAULT NULL,
  `Provincia Envio` varchar(25) DEFAULT NULL,
  `Pais Envio` varchar(25) DEFAULT NULL,
  `Antiguedad` datetime DEFAULT NULL,
  `Riesgo` float DEFAULT '0',
  `Aviso` varchar(40) DEFAULT NULL,
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Razon Social` (`Razon Social`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.recibos de clientes
CREATE TABLE IF NOT EXISTS `recibos de clientes` (
  `Numero Recibo` int NOT NULL DEFAULT '0',
  `Importe` float DEFAULT '0',
  `Cliente` int DEFAULT '0',
  `Caja` int DEFAULT '0',
  `Lugar Libramiento` varchar(40) DEFAULT NULL,
  `Factura` int DEFAULT '0',
  `Orden` int DEFAULT '0',
  `Fecha Libramiento` datetime DEFAULT NULL,
  `Vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(15) DEFAULT 'Pagado',
  `Descripcion` varchar(50) DEFAULT NULL,
  `Clausulas` varchar(50) DEFAULT NULL,
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Provincia Banco` varchar(25) DEFAULT NULL,
  `Pais Banco` varchar(25) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Observaciones` longtext,
  `Moneda` int DEFAULT '1',
  `Facturado` tinyint(1) DEFAULT '0',
  `Historico` int DEFAULT '-1',
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Numero Recibo`),
  KEY `Vencimiento` (`Vencimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.representantes
CREATE TABLE IF NOT EXISTS `representantes` (
  `Codigo` int NOT NULL DEFAULT '0',
  `Nombre` varchar(40) DEFAULT NULL,
  `Domicilio` varchar(40) DEFAULT NULL,
  `Codigo Postal` int DEFAULT '0',
  `Poblacion` varchar(40) DEFAULT NULL,
  `Provincia` varchar(25) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `Telefono 1` varchar(17) DEFAULT NULL,
  `Telefono 2` varchar(17) DEFAULT NULL,
  `Fax` varchar(17) DEFAULT NULL,
  `E-Mail` varchar(50) DEFAULT NULL,
  `NIF` varchar(15) DEFAULT NULL,
  `Comision` float DEFAULT '0',
  `Aplicar Comision` varchar(15) DEFAULT NULL,
  `Antiguedad` datetime DEFAULT NULL,
  `Observaciones` longtext,
  `Banco` varchar(40) DEFAULT NULL,
  `Domicilio Banco` varchar(40) DEFAULT NULL,
  `Codigo Postal Banco` int DEFAULT '0',
  `Poblacion Banco` varchar(40) DEFAULT NULL,
  `Entidad` varchar(4) DEFAULT NULL,
  `Sucursal` varchar(4) DEFAULT NULL,
  `DC` varchar(2) DEFAULT NULL,
  `Cuenta` varchar(10) DEFAULT NULL,
  `Archivo Imagen` varchar(100) DEFAULT NULL,
  `IBAN` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.tickets en facturas de venta
CREATE TABLE IF NOT EXISTS `tickets en facturas de venta` (
  `Numero Factura` int DEFAULT '0',
  `Numero Ticket` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla anubis.tipos de impuestos
CREATE TABLE IF NOT EXISTS `tipos de impuestos` (
  `Codigo` int NOT NULL DEFAULT '0',
  `Nombre` varchar(40) DEFAULT NULL,
  `IVA` float DEFAULT '0',
  `Recargo` float DEFAULT '0',
  `Observaciones` longtext,
  PRIMARY KEY (`Codigo`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
