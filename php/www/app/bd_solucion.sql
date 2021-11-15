/*
SQLyog Ultimate v9.02 
MySQL - 5.0.20-nt : Database - solucion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`solucion` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `solucion`;

/*Table structure for table `adelantos` */

DROP TABLE IF EXISTS `adelantos`;

CREATE TABLE `adelantos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `importe` decimal(10,0) default NULL,
  `obs` char(250) default NULL,
  `fecha` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `liquiregular_id` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `Adelantos_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `adjuntos` */

DROP TABLE IF EXISTS `adjuntos`;

CREATE TABLE `adjuntos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `equipos_id` int(7) unsigned NOT NULL,
  `cliente_id` int(7) unsigned NOT NULL,
  `personal_id` int(7) unsigned NOT NULL,
  `referencia` char(100) default NULL,
  `relacion` char(10) default NULL,
  `fecha_vto` date default NULL,
  `fecha` date default NULL,
  `fecha_doc` date default NULL,
  `nom_archivo` char(50) default NULL,
  `path_archivo` char(100) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `adjuntos_FKIndex1` (`personal_id`),
  KEY `adjuntos_FKIndex2` (`cliente_id`),
  KEY `adjuntos_FKIndex3` (`equipos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ajustes` */

DROP TABLE IF EXISTS `ajustes`;

CREATE TABLE `ajustes` (
  `id` int(7) NOT NULL auto_increment,
  `equipos_id` int(7) default NULL,
  `Ubicacion_dep_id` int(7) default NULL,
  `fecha` date default NULL,
  `tipo` char(10) default NULL,
  `cantidad` decimal(10,0) default NULL,
  `obs` char(200) default NULL,
  `desc_deposito` char(100) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `fecha_server` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `asignar_equipo` */

DROP TABLE IF EXISTS `asignar_equipo`;

CREATE TABLE `asignar_equipo` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `equipos_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `desdefecha` date default NULL,
  `hastafecha` date default NULL,
  `referencia` char(250) default NULL,
  `cantidad` decimal(10,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `ff` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `asignar_equipo_FKIndex1` (`equipos_id`),
  KEY `asignar_equipo_FKIndex2` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `hs_entrada` time default NULL,
  `hs_salida` time default NULL,
  `hs_cantidad` char(10) default NULL,
  `mes` decimal(10,0) default NULL,
  `ano` decimal(10,0) default NULL,
  `fecha_asistencia` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `id_cliente` int(7) unsigned default NULL,
  `id_sucursal` int(7) unsigned default NULL,
  `horas_nocturnas` decimal(10,2) default '0.00',
  PRIMARY KEY  (`id`),
  KEY `Asistencia_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ausencias` */

DROP TABLE IF EXISTS `ausencias`;

CREATE TABLE `ausencias` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `motivo` char(250) default NULL,
  `tipo` char(15) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `cant_horas` decimal(10,2) default NULL,
  `liquiregular_id` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `Ausencias_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `banco_sueldo` */

DROP TABLE IF EXISTS `banco_sueldo`;

CREATE TABLE `banco_sueldo` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `razon` char(40) default NULL,
  `direccion` char(40) default NULL,
  `telefono` char(20) default NULL,
  `contacto` char(40) default NULL,
  `email` char(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `bonificacion` */

DROP TABLE IF EXISTS `bonificacion`;

CREATE TABLE `bonificacion` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `Conceptos_id` int(7) unsigned NOT NULL,
  `personal_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `importe` decimal(10,0) default NULL,
  `obs` char(250) default NULL,
  `concepto` char(100) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `liquiregular_id` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `bonificacion_FKIndex1` (`personal_id`),
  KEY `bonificacion_FKIndex2` (`Conceptos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `cargos` */

DROP TABLE IF EXISTS `cargos`;

CREATE TABLE `cargos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `cargo` char(40) default NULL,
  `obs` char(250) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `razon` char(100) default NULL,
  `direccion` char(80) default NULL,
  `telefono` char(20) default NULL,
  `telMovil` char(20) default NULL,
  `website` char(50) default NULL,
  `email` char(80) default NULL,
  `contacto1` char(30) default NULL,
  `contacto2` char(30) default NULL,
  `ruc` char(20) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `rubro` char(30) default NULL,
  `TotalCobro` int(12) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `conceptos` */

DROP TABLE IF EXISTS `conceptos`;

CREATE TABLE `conceptos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `concepto` char(100) default NULL,
  `tipo` char(10) default NULL,
  `obs` char(250) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `cuotas` */

DROP TABLE IF EXISTS `cuotas`;

CREATE TABLE `cuotas` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `Prestamos_id` int(7) unsigned NOT NULL,
  `numero` decimal(2,0) default NULL,
  `monto` decimal(10,0) default NULL,
  `estado` char(10) default NULL,
  `fechapago` date default NULL,
  `idliquidacion` int(7) unsigned default NULL,
  `fevtocuota` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `cuotas_FKIndex1` (`Prestamos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `descuentos` */

DROP TABLE IF EXISTS `descuentos`;

CREATE TABLE `descuentos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `Conceptos_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `importe` decimal(10,0) default NULL,
  `concepto` char(100) default NULL,
  `obs` char(250) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `liquiregular_id` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `descuentos_FKIndex1` (`Conceptos_id`),
  KEY `descuentos_FKIndex2` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `deta_plantilla` */

DROP TABLE IF EXISTS `deta_plantilla`;

CREATE TABLE `deta_plantilla` (
  `equipos_id` int(7) unsigned NOT NULL,
  `plantillas_id` int(7) unsigned NOT NULL,
  `cantidad` decimal(10,0) default NULL,
  `p_unitario` decimal(10,0) default NULL,
  `p_total` decimal(12,0) default NULL,
  `frecuencia` int(10) default NULL,
  KEY `Table_50_FKIndex1` (`plantillas_id`),
  KEY `deta_plantilla_FKIndex2` (`equipos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `detalleplanilla` */

DROP TABLE IF EXISTS `detalleplanilla`;

CREATE TABLE `detalleplanilla` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `planilla_banco_id` int(7) unsigned NOT NULL,
  `ci` decimal(12,0) default NULL,
  `nombrepersonal` char(80) default NULL,
  `importe` decimal(10,0) default NULL,
  `nota` char(80) default NULL,
  PRIMARY KEY  (`id`),
  KEY `detallePlanilla_FKIndex1` (`planilla_banco_id`),
  KEY `detallePlanilla_FKIndex2` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `docrequeridos` */

DROP TABLE IF EXISTS `docrequeridos`;

CREATE TABLE `docrequeridos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `documentos` char(50) default NULL,
  `obligatorio` char(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `empleadosobreros` */

DROP TABLE IF EXISTS `empleadosobreros`;

CREATE TABLE `empleadosobreros` (
  `personal_id` int(7) unsigned NOT NULL,
  `PlanillaMT_id` int(7) unsigned NOT NULL,
  `Documento` char(20) default NULL,
  `Nombre` char(20) default NULL,
  `Apellido` char(20) default NULL,
  `Sexo` char(1) default NULL,
  `Estadocivil` char(1) default NULL,
  `Fechanac` date default NULL,
  `Nacionalidad` char(20) default NULL,
  `Domicilio` char(100) default NULL,
  `Fechanacmenor` date default NULL,
  `hijosmenores` int(2) default NULL,
  `cargo` char(100) default NULL,
  `profesion` char(50) default NULL,
  `fechaentrada` date default NULL,
  `horariotrabajo` char(10) default NULL,
  `menorescapa` char(10) default NULL,
  `menoresescolar` char(10) default NULL,
  `fechasalida` date default NULL,
  `motivosalida` char(250) default NULL,
  `estado` char(20) default NULL,
  `id` int(10) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  KEY `personal_has_PlanillaMT_FKIndex1` (`personal_id`),
  KEY `personal_has_PlanillaMT_FKIndex2` (`PlanillaMT_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `descrip` char(60) default NULL,
  `tipo` char(20) default NULL,
  `marca` char(30) default NULL,
  `modelo` char(30) default NULL,
  `otrosdatos` char(250) default NULL,
  `fechacompra` date default NULL,
  `proveedor` char(40) default NULL,
  `nrocomprob` char(15) default NULL,
  `estado` char(20) default NULL,
  `garantia` char(60) default NULL,
  `costo` decimal(10,0) default NULL,
  `equivalente` char(60) default NULL,
  `stockmin` decimal(10,0) default NULL,
  `origen` char(20) default NULL,
  `creado_2` char(20) default NULL,
  `peso` char(10) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `unidadMedida` char(5) default NULL,
  `factor` int(10) default NULL,
  `conversion` decimal(10,2) default NULL,
  PRIMARY KEY  (`id`),
  KEY `equipos_descri` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `facturas` */

DROP TABLE IF EXISTS `facturas`;

CREATE TABLE `facturas` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `numero` char(50) default NULL,
  `fecha` date default NULL,
  `tipo` char(20) default NULL,
  `fe_ultmodi` timestamp NULL default CURRENT_TIMESTAMP,
  `importe` decimal(10,0) default NULL,
  `idcliente` decimal(5,0) default NULL,
  `dsc_cliente` char(100) default NULL,
  `referencia` char(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `hoja1` */

DROP TABLE IF EXISTS `hoja1`;

CREATE TABLE `hoja1` (
  `equipo` varchar(255) default NULL,
  `id` int(10) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `liquidetalle` */

DROP TABLE IF EXISTS `liquidetalle`;

CREATE TABLE `liquidetalle` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `Conceptos_id` int(7) unsigned NOT NULL,
  `LiquiRegular_id` int(7) unsigned NOT NULL,
  `importe` decimal(10,0) default NULL,
  `tipo` char(10) default NULL,
  `concepto` char(100) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `LiquiDetalle_FKIndex1` (`LiquiRegular_id`),
  KEY `LiquiDetalle_FKIndex2` (`Conceptos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `liquiregular` */

DROP TABLE IF EXISTS `liquiregular`;

CREATE TABLE `liquiregular` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `desde` date default NULL,
  `hasta` date default NULL,
  `totalPagar` decimal(10,0) default NULL,
  `canhorastraba` char(10) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `gsxhora` int(10) default NULL,
  `neto` decimal(12,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `LiquiRegular_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `liquisalida` */

DROP TABLE IF EXISTS `liquisalida`;

CREATE TABLE `liquisalida` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `fechaemision` date default NULL,
  `fecharetiro` date default NULL,
  `motivosalida` char(250) default NULL,
  `totalPagar` decimal(10,0) default NULL,
  `desde` date default NULL,
  `hasta` date default NULL,
  `creador` char(100) default NULL,
  `fe_ultmodi` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `LiquiSalida_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `mov_equipo` */

DROP TABLE IF EXISTS `mov_equipo`;

CREATE TABLE `mov_equipo` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `proveedor_id` int(7) unsigned NOT NULL,
  `equipos_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `tipo` char(20) default NULL,
  `idubic_origen` int(7) unsigned default NULL,
  `idubic_destino` int(7) unsigned default NULL,
  `cantidad` decimal(10,0) default NULL,
  `obs` char(250) default NULL,
  `com_nrofact` varchar(100) default NULL,
  `com_importe` decimal(10,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `tt` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `Mov_equipo_FKIndex1` (`equipos_id`),
  KEY `Mov_equipo_FKIndex2` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `opciones` */

DROP TABLE IF EXISTS `opciones`;

CREATE TABLE `opciones` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `perfil_id` int(7) unsigned NOT NULL,
  `nombremenu` char(100) default NULL,
  `acceso` char(2) default NULL,
  PRIMARY KEY  (`id`),
  KEY `opciones_FKIndex1` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `parametros` */

DROP TABLE IF EXISTS `parametros`;

CREATE TABLE `parametros` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nropatronal_mt` decimal(10,0) default NULL,
  `nropatronal_ips` decimal(10,0) default NULL,
  `cliente` char(100) default NULL,
  `RUC` char(100) default NULL,
  `direccion` char(100) default NULL,
  `telefono` char(100) default NULL,
  `smtp_server` char(50) default NULL,
  `smtp_puerto` char(20) default NULL,
  `smtp_user` char(30) default NULL,
  `smtp_pass` char(30) default NULL,
  `smtp_from` char(50) default NULL,
  `smtp_ssl` char(2) default NULL,
  `smtp_autent` char(2) default NULL,
  `cant_dias` decimal(2,0) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ped_detalle` */

DROP TABLE IF EXISTS `ped_detalle`;

CREATE TABLE `ped_detalle` (
  `equipos_id` int(7) unsigned NOT NULL,
  `pedidos_id` int(7) unsigned NOT NULL,
  `cantidad` decimal(10,0) default NULL,
  `docnro` char(30) default NULL,
  `punitario` decimal(10,0) default NULL,
  `ptotal` decimal(12,0) default NULL,
  `fe_recepcion` date default NULL,
  `obs` char(100) default NULL,
  `cant_recibida` decimal(10,0) default NULL,
  KEY `Table_48_FKIndex1` (`pedidos_id`),
  KEY `Table_48_FKIndex2` (`equipos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `proveedor_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `preciototal` decimal(10,0) default NULL,
  `numero` decimal(10,0) default NULL,
  `creadopor` char(10) default NULL,
  `feult_mod` date default NULL,
  `obs` char(250) default NULL,
  `estado` char(15) default NULL,
  `nro_factura` decimal(15,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `pedidos_FKIndex1` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `pedidosdeta` */

DROP TABLE IF EXISTS `pedidosdeta`;

CREATE TABLE `pedidosdeta` (
  `Pedidos_id` int(7) unsigned NOT NULL,
  `equipos_id` int(7) unsigned NOT NULL,
  `dsc_equipo` char(60) default NULL,
  `Cantidad` decimal(10,0) default NULL,
  `precioUnitario` decimal(10,0) default NULL,
  `precioTotal` decimal(10,0) default NULL,
  KEY `Table_42_FKIndex1` (`equipos_id`),
  KEY `Table_42_FKIndex2` (`Pedidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `perfil` char(50) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `personal` */

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `cargos_id` int(7) unsigned NOT NULL,
  `nombres` char(40) default NULL,
  `apellidos` char(40) default NULL,
  `tipo_docum` char(15) default NULL,
  `nro_docum` decimal(12,0) default NULL,
  `idsupervisor` int(7) unsigned default NULL,
  `direccion` char(80) default NULL,
  `n_casa` decimal(5,0) default NULL,
  `barrio` char(30) default NULL,
  `ciudad` char(30) default NULL,
  `referenciacasa` char(100) default NULL,
  `telMovil` char(20) default NULL,
  `telefono` char(20) default NULL,
  `fecha_ingreso` date default NULL,
  `fecha_salida` date default NULL,
  `motivo_salida` char(250) default NULL,
  `c1_nombre` char(60) default NULL,
  `c1_movil` char(15) default NULL,
  `c1_linbaja` char(15) default NULL,
  `c1_parentesco` char(20) default NULL,
  `c2_nombre` char(60) default NULL,
  `c2_movil` char(15) default NULL,
  `c2_linbaja` char(15) default NULL,
  `c2_parentesco` char(20) default NULL,
  `aporta_ips` char(2) default NULL,
  `nro_asegurado` decimal(20,0) default NULL,
  `jornalxhora` decimal(7,0) default NULL,
  `jornalxmin` decimal(7,0) default NULL,
  `importeIPS` decimal(10,0) default NULL,
  `modopago` char(15) default NULL,
  `sexo` char(1) default NULL,
  `estadocivil` char(1) default NULL,
  `fechanacim` date default NULL,
  `nacionalidad` char(15) default NULL,
  `fenacim_menor` date default NULL,
  `cant_hijos` decimal(2,0) default NULL,
  `profesion` char(40) default NULL,
  `situ_menor` char(40) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `estado` int(1) unsigned default NULL,
  `banco_sueldo_id` int(7) default NULL,
  `sueldoreal` int(10) default NULL,
  `fechaemision` date default NULL,
  `fechainicio` date default NULL,
  `fechafin` date default NULL,
  `tipotraba` char(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `personal_FKIndex1` (`cargos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `personal_planillasueldoips` */

DROP TABLE IF EXISTS `personal_planillasueldoips`;

CREATE TABLE `personal_planillasueldoips` (
  `personal_id` int(7) NOT NULL,
  `PlanillaSueldoIPS_id` int(7) NOT NULL,
  `orden` decimal(10,0) default NULL,
  `nrodocumento` decimal(12,0) default NULL,
  `nroasegurado` decimal(20,0) default NULL,
  `nombre` char(40) default NULL,
  `apellido` char(40) default NULL,
  `diastrabajados` decimal(3,0) default NULL,
  `sal_imponible` decimal(10,0) default NULL,
  `sal_real` decimal(10,0) default NULL,
  `mesAA` decimal(8,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `id` int(7) NOT NULL auto_increment,
  `tipotraba` int(2) default NULL,
  PRIMARY KEY  (`id`),
  KEY `personal_has_PlanillaSueldoIPS_FKIndex1` (`personal_id`),
  KEY `personal_has_PlanillaSueldoIPS_FKIndex2` (`PlanillaSueldoIPS_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `planilla_banco` */

DROP TABLE IF EXISTS `planilla_banco`;

CREATE TABLE `planilla_banco` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `banco_sueldo_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `montototal` decimal(10,0) default NULL,
  `mescorrespon` decimal(2,0) default NULL,
  `anocorrespon` decimal(4,0) default NULL,
  `numero` char(20) default NULL,
  `fecha_credito` date default NULL,
  `tipo_liquidacion` char(60) default NULL,
  `notas` char(80) default NULL,
  `moneda` char(3) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `planilla_banco_FKIndex1` (`banco_sueldo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `planillamt` */

DROP TABLE IF EXISTS `planillamt`;

CREATE TABLE `planillamt` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `periodo` int(4) unsigned default NULL,
  `REFERENCIA` char(80) default NULL,
  `obs` char(250) default NULL,
  `mes` decimal(2,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `planillasueldoips` */

DROP TABLE IF EXISTS `planillasueldoips`;

CREATE TABLE `planillasueldoips` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `mes` int(2) unsigned default NULL,
  `ano` decimal(5,0) default NULL,
  `creado` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `Referencia` char(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `plantillas` */

DROP TABLE IF EXISTS `plantillas`;

CREATE TABLE `plantillas` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `sucursales_id` int(7) unsigned NOT NULL,
  `nombre` char(150) default NULL,
  `frecuencia` decimal(4,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `plantillas_FKIndex2` (`sucursales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `prestamos` */

DROP TABLE IF EXISTS `prestamos`;

CREATE TABLE `prestamos` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `fecha` date default NULL,
  `monto` decimal(10,0) default NULL,
  `plazo` decimal(2,0) default NULL,
  `interes` decimal(6,2) default NULL,
  `idconcepto` int(7) unsigned default NULL,
  `motivo` char(250) default NULL,
  `fe_pricuota` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `Prestamos_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `nombre` char(40) default NULL,
  `ruc` char(12) default NULL,
  `direccion` char(80) default NULL,
  `telefono` char(30) default NULL,
  `contacto` char(30) default NULL,
  `telmovil` char(30) default NULL,
  `rubro` char(30) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `obs` char(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `prueba` */

DROP TABLE IF EXISTS `prueba`;

CREATE TABLE `prueba` (
  `funcionario` char(200) default NULL,
  `desde` char(100) default NULL,
  `hasta` char(100) default NULL,
  `horas` char(100) default NULL,
  `fecha` char(100) default NULL,
  `id` int(7) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `remision` */

DROP TABLE IF EXISTS `remision`;

CREATE TABLE `remision` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `sucursales_id` int(7) unsigned NOT NULL,
  `numero` char(50) default NULL,
  `fecha` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `refererencia` char(80) default NULL,
  `destino` char(150) default NULL,
  `fe_retiro` date default NULL,
  `movil` char(100) default NULL,
  `dir_salida` char(150) default NULL,
  `fe_iniciotras` date default NULL,
  `fe_fintras` date default NULL,
  `razon_tras` char(80) default NULL,
  `ruc_tras` char(20) default NULL,
  `conductor` char(30) default NULL,
  `ci_conductor` char(50) default NULL,
  `dir_conductor` char(100) default NULL,
  `comp_vta` char(20) default NULL,
  `nrofactura` char(50) default NULL,
  `tipo_remision` char(10) default NULL,
  `plantilla_id` int(7) default NULL,
  `sucdestino_id` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `Remision_FKIndex1` (`sucursales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `remisiondeta` */

DROP TABLE IF EXISTS `remisiondeta`;

CREATE TABLE `remisiondeta` (
  `equipos_id` int(7) unsigned NOT NULL,
  `Remision_id` int(7) unsigned NOT NULL,
  `cantidad` decimal(10,0) default NULL,
  `dsc_producto` char(60) default NULL,
  `unidadMed` char(5) default NULL,
  `p_unitario` decimal(10,0) default NULL,
  `p_total` decimal(12,0) default NULL,
  `costo_calculado` decimal(12,0) default NULL,
  KEY `Table_45_FKIndex1` (`Remision_id`),
  KEY `Table_45_FKIndex2` (`equipos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `responsables` */

DROP TABLE IF EXISTS `responsables`;

CREATE TABLE `responsables` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `equipos_id` int(7) unsigned NOT NULL,
  `idPersonal` int(7) default NULL,
  `fechadesde` date default NULL,
  `cantidad` decimal(10,0) default NULL,
  `obs` char(250) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `ff` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `responsables_FKIndex1` (`equipos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `resumengeneral` */

DROP TABLE IF EXISTS `resumengeneral`;

CREATE TABLE `resumengeneral` (
  `personal_id` int(7) NOT NULL,
  `PlanillaMT_id` int(7) NOT NULL,
  `id` int(7) unsigned NOT NULL auto_increment,
  `ano_periodo` decimal(5,0) default NULL,
  `orden` decimal(2,0) default NULL,
  `nropatronal` decimal(10,0) default NULL,
  `jefesvarones` decimal(10,0) default NULL,
  `jefesmujeres` decimal(10,0) default NULL,
  `empl_varones` decimal(10,0) default NULL,
  `empl_mujeres` decimal(10,0) default NULL,
  `obrero_varones` decimal(10,0) default NULL,
  `obrero_mujeres` decimal(10,0) default NULL,
  `menor_varon` decimal(10,0) default NULL,
  `menor_mujer` decimal(10,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `personal_has_PlanillaMT_FKIndex2` (`PlanillaMT_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `salidadetalle` */

DROP TABLE IF EXISTS `salidadetalle`;

CREATE TABLE `salidadetalle` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `Conceptos_id` int(7) unsigned NOT NULL,
  `LiquiSalida_id` int(7) unsigned NOT NULL,
  `importe` decimal(10,0) default NULL,
  `concepto` char(100) default NULL,
  `tipo` char(10) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `SalidaDetalle_FKIndex1` (`LiquiSalida_id`),
  KEY `SalidaDetalle_FKIndex2` (`Conceptos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `Ubicacion_dep_id` int(7) unsigned NOT NULL,
  `equipos_id` int(7) unsigned NOT NULL,
  `cantidad` decimal(10,0) default NULL,
  `ff` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `Stock_FKIndex1` (`equipos_id`),
  KEY `Stock_FKIndex2` (`Ubicacion_dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `sucursales` */

DROP TABLE IF EXISTS `sucursales`;

CREATE TABLE `sucursales` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `cliente_id` int(7) unsigned NOT NULL,
  `razon_sucursal` char(100) default NULL,
  `direccion` char(80) default NULL,
  `telefono` char(20) default NULL,
  `email` char(30) default NULL,
  `telMovil` char(20) default NULL,
  `email_2` char(40) default NULL,
  `pagomaximo` decimal(10,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `tipolocal` char(30) default NULL,
  `TotalCobro` int(12) default NULL,
  PRIMARY KEY  (`id`),
  KEY `sucursales_FKIndex1` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `sucursales_personal` */

DROP TABLE IF EXISTS `sucursales_personal`;

CREATE TABLE `sucursales_personal` (
  `sucursales_id` int(7) unsigned NOT NULL,
  `personal_id` int(7) unsigned NOT NULL,
  `desdefecha` date default NULL,
  `fe_ultmodi` date default NULL,
  `canthoras` decimal(3,0) default NULL,
  `creador` char(20) default NULL,
  `desde_hora` time default NULL,
  `hasta_hora` time default NULL,
  `estado_registro` char(12) default NULL,
  `id` int(7) unsigned NOT NULL auto_increment,
  `dias` char(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `sucursales_has_personal_FKIndex1` (`sucursales_id`),
  KEY `sucursales_has_personal_FKIndex2` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `sueldojornales` */

DROP TABLE IF EXISTS `sueldojornales`;

CREATE TABLE `sueldojornales` (
  `personal_id` int(7) unsigned NOT NULL,
  `PlanillaMT_id` int(7) unsigned NOT NULL,
  `nropatronal` decimal(10,0) default NULL,
  `nrodocumento` decimal(10,0) default NULL,
  `formapago` char(2) default NULL,
  `importeUnitario` decimal(10,0) default NULL,
  `hs_enero` decimal(3,0) default NULL,
  `sueldo_enero` decimal(10,0) default NULL,
  `hs_febrero` decimal(3,0) default NULL,
  `sueldo_feb` decimal(10,0) default NULL,
  `hs_marzo` decimal(3,0) default NULL,
  `sueldo_mar` decimal(10,0) default NULL,
  `hs_abril` decimal(3,0) default NULL,
  `sueldo_abr` decimal(10,0) default NULL,
  `hs_mayo` decimal(3,0) default NULL,
  `sueldo_may` decimal(10,0) default NULL,
  `hs_junio` decimal(3,0) default NULL,
  `sueldo_jun` decimal(10,0) default NULL,
  `hs_julio` decimal(3,0) default NULL,
  `sueldo_jul` decimal(10,0) default NULL,
  `hs_agosto` decimal(3,0) default NULL,
  `sueldo_ago` decimal(10,0) default NULL,
  `hs_set` decimal(3,0) default NULL,
  `sueldo_set` decimal(10,0) default NULL,
  `hs_oct` decimal(3,0) default NULL,
  `sueldo_oct` decimal(10,0) default NULL,
  `hs_nov` decimal(3,0) default NULL,
  `sueldo_nov` decimal(10,0) default NULL,
  `hs_dic` decimal(3,0) default NULL,
  `sueldo_dic` decimal(10,0) default NULL,
  `hs50` decimal(5,0) default NULL,
  `sueldo50` decimal(10,0) default NULL,
  `hs100` decimal(5,0) default NULL,
  `sueldo100` decimal(10,0) default NULL,
  `aguinaldo` decimal(10,0) default NULL,
  `beneficio` decimal(10,0) default NULL,
  `bonificacion` decimal(10,0) default NULL,
  `vacaciones` decimal(10,0) default NULL,
  `total_hs` decimal(10,0) default NULL,
  `total_sueldo` decimal(10,0) default NULL,
  `total_gral` decimal(10,0) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`personal_id`,`PlanillaMT_id`),
  KEY `personal_has_PlanillaMT_FKIndex1` (`personal_id`),
  KEY `personal_has_PlanillaMT_FKIndex2` (`PlanillaMT_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmp_costoxcli` */

DROP TABLE IF EXISTS `tmp_costoxcli`;

CREATE TABLE `tmp_costoxcli` (
  `cliente` char(150) default NULL,
  `mes` decimal(3,0) default NULL,
  `aa` decimal(5,0) default NULL,
  `hs` decimal(5,0) default NULL,
  `pagado_basico` decimal(17,0) default NULL,
  `a_cobrar` decimal(12,0) default NULL,
  `total_remision` decimal(14,0) default NULL,
  `id` int(7) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmp_sueldos` */

DROP TABLE IF EXISTS `tmp_sueldos`;

CREATE TABLE `tmp_sueldos` (
  `cliente` char(150) default NULL,
  `mes` decimal(3,0) default NULL,
  `aa` decimal(5,0) default NULL,
  `hs` decimal(5,0) default NULL,
  `pagado_basico` decimal(17,2) default NULL,
  `a_cobrar` decimal(12,0) default NULL,
  `total_remision` decimal(14,0) default NULL,
  `id` int(7) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `traslados` */

DROP TABLE IF EXISTS `traslados`;

CREATE TABLE `traslados` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `desdefecha` date default NULL,
  `idclientedestino` int(7) unsigned default NULL,
  `idclientesucur` int(7) unsigned default NULL,
  `canthoras` decimal(10,0) default NULL,
  `horario` char(1) default NULL,
  `hastafecha` date default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `Traslados_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ubicacion_dep` */

DROP TABLE IF EXISTS `ubicacion_dep`;

CREATE TABLE `ubicacion_dep` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `ubicacion` char(100) default NULL,
  `obs` char(250) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `perfil_id` int(7) unsigned NOT NULL,
  `nombre` char(30) default NULL,
  `apellido` char(30) default NULL,
  `username` char(8) default NULL,
  `password_2` char(50) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  `obs` char(250) default NULL,
  PRIMARY KEY  (`id`),
  KEY `usuarios_FKIndex1` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `vacaciones` */

DROP TABLE IF EXISTS `vacaciones`;

CREATE TABLE `vacaciones` (
  `id` int(7) unsigned NOT NULL auto_increment,
  `personal_id` int(7) unsigned NOT NULL,
  `desdefecha` date default NULL,
  `hastafecha` date default NULL,
  `fecharetorno` date default NULL,
  `cant_dias` decimal(2,0) default NULL,
  `periodo` char(20) default NULL,
  `creador` char(20) default NULL,
  `fe_ultmodi` date default NULL,
  PRIMARY KEY  (`id`),
  KEY `vacaciones_FKIndex1` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Trigger structure for table `mov_equipo` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `factor_stock` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `factor_stock` AFTER INSERT ON `mov_equipo` FOR EACH ROW BEGIN
	
	DECLARE v_factor INT(10) ;
	DECLARE v_valor DECIMAL(10) ;
	DECLARE v_ver INT(10);
	DECLARE v_actual DECIMAL(10) ;
	declare v_suma decimal(10) ;
	
	IF new.proveedor_id > 0 THEN
	/*SI ES UNA COMPRA BUSCO EL FACTOR DE CONVERSION DEL PRODUCTO */
		SELECT factor INTO v_factor FROM equipos WHERE id = new.equipos_id ; 
		
		IF v_factor > 0 THEN
			SET v_valor = v_factor * new.cantidad ; 
			
			SELECT cantidad INTO v_actual FROM stock 
			WHERE equipos_id = new.equipos_id AND ubicacion_dep_id = new.idubic_destino ; 				
						
			/*UPDATE stock SET cantidad = cantidad - new.cantidad		
			WHERE equipos_id = new.equipos_id AND ubicacion_dep_id = new.idubic_destino ; */
			set v_suma = new.cantidad + v_valor ; 						
			UPDATE stock SET cantidad = v_suma		
			WHERE equipos_id = new.equipos_id AND ubicacion_dep_id = new.idubic_destino ; 
						
		END IF ;
	END IF;	
	
    END */$$


DELIMITER ;

/* Procedure structure for procedure `agrega_costoRemision` */

/*!50003 DROP PROCEDURE IF EXISTS  `agrega_costoRemision` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `agrega_costoRemision`()
BEGIN
    DECLARE v_cantidad DECIMAL(12,2) ;
    DECLARE v_punitario DECIMAL(15) ;
    DECLARE v_total DECIMAL(15) ;
    DECLARE v_idequipo DECIMAL(10) ;
    DECLARE v_idremision DECIMAL(10) ;  
    DECLARE v_costo_inicial DECIMAL(15,2) ;
    DECLARE v_costo_final DECIMAL(15,2) ;
    DECLARE v_valorFactor DECIMAL(15) ;
    DECLARE v_valor_conversion DECIMAL(15,2) ; 
    DECLARE x_importe DECIMAL(15,2) ;
    DECLARE x_cantidad DECIMAL(15,2) ;    
    DECLARE fin INT DEFAULT 0;  
    
    DECLARE datos CURSOR FOR SELECT cantidad,p_unitario,p_total,equipos_id,remision_id 
			     FROM remisiondeta 
			     WHERE ISNULL(costo_calculado ) ;
			     
  
  			     
  /*Condición de salida*/
     DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1 ;
     
    OPEN datos ;
  
/*================================================================================*/  
/*    INICIO DE ciclo */
/*================================================================================*/   
  -- ciclo_proceso: LOOP
  REPEAT 
  IF NOT fin THEN 
      FETCH datos INTO v_cantidad,v_punitario,v_total,v_idequipo,v_idremision ; 
-- INSERT INTO msg (msg) VALUES(CONCAT("1 FIN : ",CAST(fin AS CHAR))) ; 
                
    /*condicion de salida
      IF fin = 1 THEN   	
         LEAVE ciclo_proceso;
      END IF;  */
      
-- INSERT INTO msg (msg) VALUES(CONCAT("Equipo: ",CAST(v_idequipo AS CHAR))) ; 
	
 
      SET v_costo_Final = 0 ;  
-- INSERT INTO msg (msg) VALUES(CONCAT("001 FIN : ",CAST(fin AS CHAR))) ;  
      
      -- genero el costo basico inicial a partir del cual se calcula en la formula
      -- parte de la formula de calculo
      SET v_costo_inicial=0 ;
-- INSERT INTO msg (msg) VALUES(CONCAT("002 FIN : ",CAST(fin AS CHAR))) ;  
      
	SET x_importe=0 ;
	SET x_cantidad=0 ;      
      
       SELECT CAST(com_importe AS DECIMAL) INTO x_importe 
      FROM mov_equipo WHERE equipos_id = v_idequipo  AND com_importe>0 
      ORDER BY fecha DESC LIMIT 1 ;
      
      IF x_importe < 1 THEN      
		SET fin = 0 ;
      END IF ;
-- INSERT INTO msg (msg) VALUES(CONCAT("002.1 FIN : ",CAST(fin AS CHAR))) ;  
      
      SELECT CAST(cantidad AS DECIMAL) INTO x_cantidad 
      FROM mov_equipo WHERE equipos_id = v_idequipo  AND com_importe>0 
      ORDER BY fecha DESC LIMIT 1 ;
      
       IF x_cantidad < 1 THEN      
		SET fin = 0 ;
      END IF ;
      
-- INSERT INTO msg (msg) VALUES(CONCAT("002.2 FIN : ",CAST(fin AS CHAR))) ;  
      
      SET v_costo_inicial = x_importe / x_cantidad ; 
-- INSERT INTO msg (msg) VALUES(CONCAT("2 FIN : ",CAST(fin AS CHAR))) ;  
     
        IF ISNULL(v_punitario) THEN
		SET v_punitario = v_costo_inicial ;
	
	END IF ;
 
	IF v_costo_inicial < 1 OR ISNULL(v_costo_inicial) THEN
		SELECT CAST(costo AS DECIMAL) INTO v_costo_inicial FROM equipos WHERE id = v_idequipo ; 
	END IF ;
		
	IF v_costo_inicial < 1 OR ISNULL(v_costo_inicial) THEN
		SET v_costo_inicial = 2000 ;
	END IF ;
-- INSERT INTO msg (msg) VALUES(CONCAT("3 FIN : ",CAST(fin AS CHAR))) ; 	
	
      -- aqui veo si el equipo en proceso tiene un factor o no
      SET v_valorFactor = 0 ;
      SELECT factor INTO v_valorFactor FROM equipos WHERE id = v_idequipo ;
      
-- INSERT INTO msg (msg) VALUES(CONCAT( "control : ",CAST(v_idequipo AS CHAR)," Factor: ", CAST(v_valorFactor AS CHAR)  )) ;                  
      -- aqui tomo el valor de conversion del equipo
      SET v_valor_conversion = 0 ;
      SELECT CAST(conversion AS DECIMAL) INTO v_valor_conversion FROM equipos WHERE id = v_idequipo ;
-- INSERT INTO msg (msg) VALUES(CONCAT("4 FIN : ",CAST(fin AS CHAR))) ; 
      
      IF ISNULL(v_valor_conversion) THEN
            SET v_valor_conversion = 0 ;
		       	
      END IF;
                                  
      IF v_idequipo = 117  OR v_idequipo = 312 OR v_idequipo = 345 THEN
      --  formula especifica numero 1
      	-- INSERT INTO msg (msg) VALUES("** COSTO NUMERO 1 **") ;
		SET v_costo_Final = v_cantidad * ROUND( ((v_valor_conversion/v_valorFactor*v_valor_conversion)*v_costo_inicial/v_valorFactor),0) ;
      ELSE
	IF v_valorFactor = 0 OR ISNULL(v_valorFactor) THEN
	--  costo comun 
		-- insert into msg (msg) values("** COSTO COMUN **") ;
		SET v_costo_final = v_cantidad * v_costo_inicial ;
	ELSE
	--  formula especifica numero 2	
		-- INSERT INTO msg (msg) VALUES("** COSTO NUMERO 2 **") ;
			
		SET v_costo_final = v_cantidad * ROUND((v_costo_inicial * v_valor_conversion) / v_valorFactor,0) ; 
	END IF;
	
      END IF ;
-- INSERT INTO msg (msg) VALUES(CONCAT("5 FIN : ",CAST(fin AS CHAR))) ;       
   
 -- INSERT INTO msg (msg) VALUES(CONCAT("6 FIN : ",CAST(fin AS CHAR))) ;      
    -- Agrega el costo al registro de la remision 
    UPDATE remisiondeta SET costo_calculado = v_costo_final WHERE remision_id = v_idremision AND equipos_id = v_idequipo ;
    
--	INSERT INTO msg (msg) VALUES(CONCAT("termina: ",CAST(v_idequipo AS CHAR))) ;            
-- INSERT INTO msg (msg) VALUES(CONCAT("7 FIN : ",CAST(fin AS CHAR))) ; 
        
-- LIMPIA VARIABLES
SET v_cantidad =0 ;
SET v_punitario =0 ;
SET v_total =0;
SET v_idequipo =0 ;
SET v_idremision =0 ;  
SET v_costo_inicial =0  ;
SET v_costo_final =0 ;
SET v_valorFactor =0 ;
SET v_valor_conversion =0 ; 
-- INSERT INTO msg (msg) VALUES(CONCAT("8 FIN : ",CAST(fin AS CHAR))) ; 
       
END IF ;
UNTIL fin END REPEAT ; 
                                       
    -- END LOOP ciclo_proceso ;
    
    CLOSE datos ;    
    END */$$
DELIMITER ;

/* Procedure structure for procedure `costo_xcli` */

/*!50003 DROP PROCEDURE IF EXISTS  `costo_xcli` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `costo_xcli`(IN v_mes INT(10), IN v_aa INT(10))
BEGIN
	DECLARE v_cliente CHAR(100) ;
	DECLARE v_mes2 INT(10) ;
	DECLARE v_aa2 INT(10) ;
	DECLARE v_hs INT(10) ;
	DECLARE v_pagado DECIMAL(15,2) ;
	DECLARE v_cobrar DECIMAL(10) ;
	DECLARE v_factor1 DECIMAL(10) ;
	DECLARE v_factor2 DECIMAL(10) ;
	DECLARE v_factor3 DECIMAL(10) ;
	DECLARE v_total DECIMAL(10) ;
	DECLARE v_total_1 DECIMAL(15) ;
	DECLARE v_total_2 DECIMAL(15) ;
	DECLARE v_total_3 DECIMAL(15) ;
	DECLARE fin INT DEFAULT 0;  
	DECLARE factor1 DECIMAL(15,2) ;
	DECLARE factor2 DECIMAL(15,2) ;
	
	/*datos del cursor*/
	DECLARE v_id INT(7) ;
	DECLARE v_razon CHAR(100) ;
	DECLARE v_total2 INT(12) ;
			
	DECLARE datos CURSOR FOR SELECT id,razon,totalcobro FROM cliente WHERE  totalcobro > 0 ORDER BY razon; 	
	
  /*Condición de salida*/
     DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1 ;
     
  /*Lmpio la tabla temporal.*/	      	
    TRUNCATE tmp_costoxcli ;
    
    OPEN datos ;
  
/*================================================================================*/  
/*    INICIO DE ciclo */
/*================================================================================*/   
  ciclo_proceso: LOOP
  
      FETCH datos INTO v_id,v_razon,v_total2 ; 
                
    /*condicion de salida*/
      IF fin = 1 THEN   	
         LEAVE ciclo_proceso;
      END IF;    
      
      SET v_hs = 0 ;
      SET factor1 = 0 ;
      SET factor2 = 0 ;
      SET v_total_1 = 0 ;
      SET v_total_2 = 0 ;
      SET v_total_3 = 0 ;
      SET v_total = 0 ;
      
		-- Cantidad de horas trabajadas --
		SELECT SUM(hs_cantidad) INTO v_hs
		FROM asistencia 
		WHERE MONTH(fecha_asistencia)= v_mes AND 
		id_cliente = v_id AND 
		YEAR(fecha_asistencia) = v_aa ; 
		
		-- calculo de pago salario --	
		SELECT SUM(hs_cantidad) INTO factor1 
		FROM asistencia 
		WHERE MONTH(fecha_asistencia)=v_mes AND 
		id_cliente = v_id AND 
		YEAR(fecha_asistencia) = v_aa   ; 
		
	    
		SELECT gsxhora  INTO factor2 
		FROM LIQUIREGULAR 
		WHERE PERSONAL_ID IN( SELECT personal_id 
				      FROM asistencia 
				      WHERE id_cliente= v_id) AND 
                                             MONTH(DESDE)=v_mes AND 
                                             YEAR(DESDE)=v_aa LIMIT 1; 
                                             
			                                             
                IF factor1 = 0  OR factor2 = 0 OR ISNULL(factor1) OR ISNULL(factor2) OR CAST(factor2 AS CHAR) = '0.00' OR CAST(factor1 AS CHAR) = '0.00' THEN
			SET v_pagado = 0 ;
		ELSE
		
			SET v_pagado = factor1 * factor2 ; 		    
		END IF;    
		
		IF CAST(factor2 AS CHAR) = '0.00' THEN
			SET fin = 0 ;	
			SET v_pagado = 0 ;
		END IF ; 
		
		IF CAST(factor1 AS CHAR) = '0.00' THEN
			SET fin = 0 ;	
			SET v_pagado = 0 ;
		END IF ; 
		
-- insert into msg (msg) values( concat("valor v_pagado:",cast(v_pagado as char)," cliente :",v_razon   )  )	;	
						                                                                                                               				                                                       
          -- calculo de cobro por contrato      
	--  SET v_cobrar = (SELECT totalcobro FROM cliente WHERE totalcobro > 0 AND id = v_id ) ; 	
	SET v_cobrar = (SELECT SUM(importe) FROM facturas WHERE idcliente = v_id AND MONTH(fecha)=v_mes AND YEAR(fecha)=v_aa ) ; 		 
 				   
    -- ============================================================================================
    -- calculo de total gastos por remision de productos
	
		SET v_total = 0 ;
		
		SELECT SUM(ROUND(  (costo * conversion) / FACTOR,0) * cantidad) INTO v_total_1
		FROM vi_remisionenviada WHERE factor > 0 AND 
		 MONTH(fecha ) = v_mes AND
		YEAR(fecha) = v_aa AND 
		equipos_id <> 117  AND equipos_id <> 312 AND equipos_id <> 345 AND
		TRIM(cliente) = TRIM(v_razon) ; 
		
		
		SELECT SUM(cantidad * costo) INTO v_total_2
		 FROM vi_remisionenviada WHERE factor = 0 AND 
		 MONTH(fecha ) = v_mes AND
		YEAR(fecha) = v_aa AND 
		TRIM(cliente) = TRIM(v_razon) ; 
		
		SELECT SUM(ROUND( ((conversion/factor*conversion)*costo/factor),0)* cantidad) INTO v_total_3
		FROM vi_remisionenviada WHERE factor > 0 AND 
		 MONTH(fecha ) = v_mes AND
		YEAR(fecha) = v_aa AND  
		(equipos_id = 117  OR equipos_id = 312 OR equipos_id = 345 ) AND 
		TRIM(cliente) = TRIM(v_razon) ; 
		
		IF v_total_1  = 0 OR ISNULL(v_total_1) THEN
			SET v_total_1 = 0 ;
		END IF ; 
		IF v_total_2 = 0 OR ISNULL(v_total_2) THEN
			SET v_total_2 = 0 ;
		END IF ; 
		IF v_total_3 = 0 OR ISNULL(v_total_3) THEN
			SET v_total_3 = 0 ;
		END IF ; 
		
	SET v_total = v_total_1 + v_total_2 + v_total_3 ;
	
	IF v_total = 0 THEN
		SELECT SUM(costo_calculado) INTO v_total 
		FROM remisiondeta
		WHERE equipos_id IN( SELECT id FROM equipos WHERE tipo = "Insumo" ) AND 		
			remision_id IN(SELECT id FROM remision WHERE MONTH(fecha) = v_mes AND
				                           YEAR(fecha) = v_aa AND 
				                           TRIM(destino) IN( SELECT TRIM(razon_sucursal) FROM sucursales WHERE cliente_id = v_id)) ;
	END IF ; 
	
    -- ============================================================================================
    
	    	 
	--  inserta datos para el informe
	INSERT INTO tmp_costoxcli (cliente,mes,aa,hs,pagado_basico,a_cobrar,total_remision) 
	VALUES (v_razon, v_mes,v_aa,v_hs,v_pagado,v_cobrar,v_total) ;
   
	/* LIMPIA VARIABLES*/    
	SET v_razon = "" ; 
	SET v_pagado=0 ;
	SET v_cobrar = 0 ;
	SET v_factor1=0;
	SET v_factor2=0;
	SET v_factor3=0;
	
    
    END LOOP ciclo_proceso ;
    
    CLOSE datos ;    
/*================================================================================*/    
/*    FIN DE ciclo */
/*================================================================================*/
    END */$$
DELIMITER ;

/* Procedure structure for procedure `pago_sueldos` */

/*!50003 DROP PROCEDURE IF EXISTS  `pago_sueldos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `pago_sueldos`(IN v_mes INT(10), IN v_aa INT(10))
BEGIN
	DECLARE v_cliente CHAR(100) ;
	DECLARE v_mes2 INT(10) ;
	DECLARE v_aa2 INT(10) ;
	DECLARE v_hs INT(10) ;
	DECLARE v_pagado DECIMAL(15,2) ;
	DECLARE v_cobrar DECIMAL(10) ;
	DECLARE v_factor1 DECIMAL(10) ;
	DECLARE v_factor2 DECIMAL(10) ;
	DECLARE v_factor3 DECIMAL(10) ;
	DECLARE v_total DECIMAL(10) ;
	DECLARE v_total_1 DECIMAL(15) ;
	DECLARE v_total_2 DECIMAL(15) ;
	DECLARE v_total_3 DECIMAL(15) ;
	DECLARE fin INT DEFAULT 0;  
	DECLARE factor1 DECIMAL(15,2) ;
	DECLARE factor2 DECIMAL(15,2) ;
	
	/*datos del cursor*/
	DECLARE v_id INT(7) ;
	DECLARE v_razon CHAR(100) ;
	DECLARE v_total2 INT(12) ;	
			
	DECLARE datos CURSOR FOR SELECT id,razon,totalcobro FROM cliente WHERE  totalcobro > 0 ORDER BY razon; 	
	
  /*Condición de salida*/
     DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1 ;
     
  /*Lmpio la tabla temporal.*/	      	
    TRUNCATE tmp_sueldos ;
    SET v_mes2 = v_mes ;
    OPEN datos ;
  
/*================================================================================*/  
/*    INICIO DE ciclo */
/*================================================================================*/   
  ciclo_proceso: LOOP
  
      FETCH datos INTO v_id,v_razon,v_total2 ; 
                
    /*condicion de salida*/
      IF fin = 1 THEN   	
         LEAVE ciclo_proceso;
      END IF;    
      
      SET v_hs = 0 ;
      SET factor1 = 0 ;
      SET factor2 = 0 ;
      SET v_total_1 = 0 ;
      SET v_total_2 = 0 ;
      SET v_total_3 = 0 ;
      SET v_total = 0 ;
      
		-- Cantidad de horas trabajadas --
		SELECT SUM(hs_cantidad) INTO v_hs
		FROM asistencia 
		WHERE MONTH(fecha_asistencia)= v_mes AND 
		id_cliente = v_id AND 
		YEAR(fecha_asistencia) = v_aa ; 
		
		-- calculo de pago salario --	
		SELECT SUM(hs_cantidad) INTO factor1 
		FROM asistencia 
		WHERE MONTH(fecha_asistencia)=v_mes AND 
		id_cliente = v_id AND 
		YEAR(fecha_asistencia) = v_aa   ; 
		
	    
		SELECT gsxhora  INTO factor2 
		FROM LIQUIREGULAR 
		WHERE PERSONAL_ID IN( SELECT personal_id 
				      FROM asistencia 
				      WHERE id_cliente= v_id) AND 
                                             MONTH(DESDE)=v_mes AND 
                                             YEAR(DESDE)=v_aa LIMIT 1; 
                                             
			                                             
                IF factor1 = 0  OR factor2 = 0 OR ISNULL(factor1) OR ISNULL(factor2) OR CAST(factor2 AS CHAR) = '0.00' OR CAST(factor1 AS CHAR) = '0.00' THEN
			SET v_pagado = 0 ;
		ELSE
		
			SET v_pagado = factor1 * factor2 ; 		    
		END IF;    
		
		IF CAST(factor2 AS CHAR) = '0.00' THEN
			SET fin = 0 ;	
			SET v_pagado = 0 ;
		END IF ; 
		
		IF CAST(factor1 AS CHAR) = '0.00' THEN
			SET fin = 0 ;	
			SET v_pagado = 0 ;
		END IF ; 
		
	SET v_cobrar = 0; 		 
 		
    
	    	 
	--  inserta datos para el informe
	INSERT INTO tmp_sueldos (cliente,mes,aa,hs,pagado_basico,a_cobrar,total_remision) 
	VALUES (v_razon, v_mes,v_aa,v_hs,v_pagado,v_cobrar,v_total) ;
   
	/* LIMPIA VARIABLES*/    
	SET v_razon = "" ; 
	SET v_pagado=0 ;
	SET v_cobrar = 0 ;
	SET v_factor1=0;
	SET v_factor2=0;
	SET v_factor3=0;
	
    
    END LOOP ciclo_proceso ;
    
    CLOSE datos ;    
/*================================================================================*/    
/*    FIN DE ciclo */
/*================================================================================*/
    END */$$
DELIMITER ;

/* Procedure structure for procedure `stock` */

/*!50003 DROP PROCEDURE IF EXISTS  `stock` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stock`()
BEGIN
    
    DECLARE fin INTEGER DEFAULT 0;
    DECLARE v_codigo BIGINT ;
    
   DECLARE recorre CURSOR FOR SELECT id FROM equipos;
	
	 /*Condición de salida*/
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1;
  
       OPEN recorre;
  
  /* ciclo */
  get_runners: LOOP
  
    FETCH recorre INTO v_codigo ;  
        
    IF fin = 1 THEN   
	
       LEAVE get_runners;
    END IF;   	 
	
     INSERT INTO stock (ubicacion_dep_id, equipos_id,cantidad) VALUES(13,v_codigo,1000000) ;
   
  
  END LOOP get_runners;
/*fin ciclo */
  CLOSE recorre;
    
    END */$$
DELIMITER ;

/*Table structure for table `costo` */

DROP TABLE IF EXISTS `costo`;

/*!50001 DROP VIEW IF EXISTS `costo` */;
/*!50001 DROP TABLE IF EXISTS `costo` */;

/*!50001 CREATE TABLE  `costo`(
 `fecha` date ,
 `mes` bigint(2) ,
 `aa` bigint(4) ,
 `remision_id` int(7) unsigned ,
 `id_cliente` bigint(11) ,
 `equipos_id` int(7) unsigned ,
 `cantidad` decimal(10,0) ,
 `costo` decimal(24,4) 
)*/;

/*Table structure for table `total_remisionxcliente` */

DROP TABLE IF EXISTS `total_remisionxcliente`;

/*!50001 DROP VIEW IF EXISTS `total_remisionxcliente` */;
/*!50001 DROP TABLE IF EXISTS `total_remisionxcliente` */;

/*!50001 CREATE TABLE  `total_remisionxcliente`(
 `id_cliente` bigint(11) ,
 `mes` bigint(2) ,
 `aa` bigint(4) ,
 `total` decimal(34,0) 
)*/;

/*Table structure for table `vi_descuentos` */

DROP TABLE IF EXISTS `vi_descuentos`;

/*!50001 DROP VIEW IF EXISTS `vi_descuentos` */;
/*!50001 DROP TABLE IF EXISTS `vi_descuentos` */;

/*!50001 CREATE TABLE  `vi_descuentos`(
 `personal` varchar(81) ,
 `MES` bigint(2) ,
 `AÑO` bigint(4) ,
 `IPS` decimal(32,0) ,
 `PRESTAMOS` decimal(32,0) ,
 `SANCION` decimal(32,0) ,
 `SUSPENCION` decimal(32,0) ,
 `UNIFORMES` decimal(32,0) ,
 `AUSENCIAS` decimal(32,0) 
)*/;

/*Table structure for table `vi_remisionenviada` */

DROP TABLE IF EXISTS `vi_remisionenviada`;

/*!50001 DROP VIEW IF EXISTS `vi_remisionenviada` */;
/*!50001 DROP TABLE IF EXISTS `vi_remisionenviada` */;

/*!50001 CREATE TABLE  `vi_remisionenviada`(
 `numero` char(50) ,
 `fecha` date ,
 `destino` char(150) ,
 `dsc_producto` char(60) ,
 `cantidad` decimal(10,0) ,
 `conversion` decimal(10,2) ,
 `costo` decimal(11,0) ,
 `cliente` varchar(100) ,
 `factor` bigint(11) ,
 `equipos_id` int(7) unsigned 
)*/;

/*View structure for view costo */

/*!50001 DROP TABLE IF EXISTS `costo` */;
/*!50001 DROP VIEW IF EXISTS `costo` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `costo` AS (select `r`.`fecha` AS `fecha`,month(`r`.`fecha`) AS `mes`,year(`r`.`fecha`) AS `aa`,`r`.`id` AS `remision_id`,(select `sucursales`.`cliente_id` AS `cliente_id` from `sucursales` where (`sucursales`.`id` = (select `sucursales`.`id` AS `id` from `sucursales` where (trim(`sucursales`.`razon_sucursal`) = trim((select `ubicacion_dep`.`ubicacion` AS `ubicacion` from `ubicacion_dep` where (`ubicacion_dep`.`id` = `r`.`sucdestino_id`) limit 1))) limit 1))) AS `id_cliente`,`d`.`equipos_id` AS `equipos_id`,`d`.`cantidad` AS `cantidad`,((select (`mov_equipo`.`com_importe` / `mov_equipo`.`cantidad`) AS `(com_importe / cantidad)` from `mov_equipo` where (`mov_equipo`.`equipos_id` = `d`.`equipos_id`) order by `mov_equipo`.`fecha` desc limit 1) * `d`.`cantidad`) AS `costo` from (`remision` `r` join `remisiondeta` `d`) where (`r`.`id` = `d`.`Remision_id`)) */;

/*View structure for view total_remisionxcliente */

/*!50001 DROP TABLE IF EXISTS `total_remisionxcliente` */;
/*!50001 DROP VIEW IF EXISTS `total_remisionxcliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_remisionxcliente` AS select (select `sucursales`.`cliente_id` AS `cliente_id` from `sucursales` where (`sucursales`.`id` = `r`.`sucdestino_id`)) AS `id_cliente`,month(`r`.`fecha`) AS `mes`,year(`r`.`fecha`) AS `aa`,sum(`d`.`p_total`) AS `total` from (`remision` `r` join `remisiondeta` `d`) where ((`d`.`Remision_id` = `r`.`id`) and (trim(`r`.`tipo_remision`) = _latin1'SIMPLE')) group by (select `sucursales`.`cliente_id` AS `cliente_id` from `sucursales` where (`sucursales`.`id` = `r`.`sucdestino_id`)),month(`r`.`fecha`),year(`r`.`fecha`) */;

/*View structure for view vi_descuentos */

/*!50001 DROP TABLE IF EXISTS `vi_descuentos` */;
/*!50001 DROP VIEW IF EXISTS `vi_descuentos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_descuentos` AS (select (select concat(`personal`.`nombres`,_latin1' ',`personal`.`apellidos`) AS `CONCAT(nombres," ",apellidos)` from `personal` where (`personal`.`id` = `p1`.`personal_id`)) AS `personal`,month(`p1`.`fecha`) AS `MES`,year(`p1`.`fecha`) AS `AÑO`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'IPS'))) AS `IPS`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'PRESTAMOS'))) AS `PRESTAMOS`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'SANCION DISCIPLINARIA'))) AS `SANCION`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'SUSPENCION'))) AS `SUSPENCION`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'UNIFORMES'))) AS `UNIFORMES`,(select sum(`descuentos`.`importe`) AS `SUM(importe)` from `descuentos` where ((`descuentos`.`personal_id` = `p1`.`personal_id`) and (trim(`descuentos`.`concepto`) = _latin1'AUSENCIAS'))) AS `AUSENCIAS` from `descuentos` `P1`) */;

/*View structure for view vi_remisionenviada */

/*!50001 DROP TABLE IF EXISTS `vi_remisionenviada` */;
/*!50001 DROP VIEW IF EXISTS `vi_remisionenviada` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_remisionenviada` AS (select `r`.`numero` AS `numero`,`r`.`fecha` AS `fecha`,`r`.`destino` AS `destino`,`d`.`dsc_producto` AS `dsc_producto`,`d`.`cantidad` AS `cantidad`,(select `equipos`.`conversion` AS `conversion` from `equipos` where (`equipos`.`id` = `d`.`equipos_id`)) AS `conversion`,round((select (`mov_equipo`.`com_importe` / `mov_equipo`.`cantidad`) AS `(com_importe / cantidad)` from `mov_equipo` where ((`mov_equipo`.`equipos_id` = `d`.`equipos_id`) and (`mov_equipo`.`proveedor_id` > 0)) order by `mov_equipo`.`fecha` desc limit 1),0) AS `costo`,(select `cliente`.`razon` AS `razon` from `cliente` where (`cliente`.`id` = (select `sucursales`.`cliente_id` AS `cliente_id` from `sucursales` where (`sucursales`.`id` = (select `sucursales`.`id` AS `id` from `sucursales` where (trim(`sucursales`.`razon_sucursal`) = trim((select `ubicacion_dep`.`ubicacion` AS `ubicacion` from `ubicacion_dep` where (`ubicacion_dep`.`id` = `r`.`sucdestino_id`)))) limit 1))))) AS `cliente`,(select `equipos`.`factor` AS `factor` from `equipos` where (`equipos`.`id` = `d`.`equipos_id`)) AS `factor`,`d`.`equipos_id` AS `equipos_id` from (`remision` `r` join `remisiondeta` `d`) where (`r`.`id` = `d`.`Remision_id`) order by `r`.`numero`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
