SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `TI` ;
CREATE SCHEMA IF NOT EXISTS `TI` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `TI` ;

-- -----------------------------------------------------
-- Table `TI`.`rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`rol` ;

CREATE TABLE IF NOT EXISTS `TI`.`rol` (
  `id_rol` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `rol` VARCHAR(20) NOT NULL COMMENT 'Nombre del rol',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COMMENT = 'Representa los roles que tendrán los usuarios dentro del sis /* comment truncated */ /*tema.*/';


-- -----------------------------------------------------
-- Table `TI`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`usuario` ;

CREATE TABLE IF NOT EXISTS `TI`.`usuario` (
  `id_usuario` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `id_rol` BIGINT(20) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL COMMENT 'Correo electrónico del usuario.\nEste deberá ser único por cada usuario que se\ncree.',
  `password` VARCHAR(100) NOT NULL COMMENT 'Clave del usuario.',
  `creacion` DATETIME NOT NULL COMMENT 'Fecha de creación.',
  `ultima_modificacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Última modifiación hecha por\nel usuario en el sistema.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `email` (`email` ASC),
  INDEX `fk_usuario_1_rol_idx` (`id_rol` ASC),
  CONSTRAINT `fk_usuario_1_rol`
    FOREIGN KEY (`id_rol`)
    REFERENCES `TI`.`rol` (`id_rol`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COMMENT = 'Gestiona los usuarios dentro del sistema';


-- -----------------------------------------------------
-- Table `TI`.`servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`servicio` ;

CREATE TABLE IF NOT EXISTS `TI`.`servicio` (
  `servicio_id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombre` VARCHAR(100) NOT NULL COMMENT 'Nombre asociado al servicio',
  `descripcion` VARCHAR(100) NOT NULL COMMENT 'Describe el funcionamiento\nde un servicio',
  `fecha_creacion` DATETIME NOT NULL,
  `umbral_id` BIGINT(20) NOT NULL COMMENT 'Umbral que se establece\nen los SLAs.\n\nClave foránea\nen Umbral.',
  `tipo` ENUM('SYS','USR') NOT NULL DEFAULT 'USR' COMMENT 'Para identificar el\ntipo de servicio asociado.\n\nDominio {SYS,USR}\nSYS: Son servicios asociados\nal Sistema Operativo.\n.USR: son los definidos por\nlos usuario',
  `genera_ingresos` TINYINT(1) NOT NULL,
  `cantidad_ingresos` INT NULL COMMENT 'Cantidad de Ingresos , sólo está \nactivo cuando la variable genera\ningresos se encuentra en verdadero',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`servicio_id`))
ENGINE = InnoDB
COMMENT = 'Representa el catálogo de servicios de la infaestructura de  /* comment truncated */ /*TI*/';


-- -----------------------------------------------------
-- Table `TI`.`tarea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`tarea` ;

CREATE TABLE IF NOT EXISTS `TI`.`tarea` (
  `tarea_id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `servicio_id` BIGINT(20) NOT NULL,
  `descripcion` VARCHAR(100) NULL COMMENT 'Descripción de la tarea que\nva a llevar a cabo.',
  `horario_desde` DATETIME NOT NULL COMMENT 'Tiempo de inicio del proceso',
  `horario_hasta` DATETIME NOT NULL COMMENT 'Tiempo de fin del servicio',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`tarea_id`),
  INDEX `fk_tarea_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_tarea_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Tiene como función llevar el control de los horarios de ejec /* comment truncated */ /*ución de los servicios.*/';


-- -----------------------------------------------------
-- Table `TI`.`tarea_detalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`tarea_detalle` ;

CREATE TABLE IF NOT EXISTS `TI`.`tarea_detalle` (
  `tarea_detalle_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `tarea_id` BIGINT(20) NOT NULL COMMENT 'FK en \"tareas\".',
  `operacion` VARCHAR(45) NOT NULL,
  `comando` VARCHAR(45) NULL COMMENT 'Comando que se ejecutará\npara iniciar el servicio.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`tarea_detalle_id`),
  INDEX `fk_tarea_detalle_1_tarea_idx` (`tarea_id` ASC),
  CONSTRAINT `fk_tarea_detalle_1_tarea`
    FOREIGN KEY (`tarea_id`)
    REFERENCES `TI`.`tarea` (`tarea_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Detalle de asociado a la tabla de \"tareas\".';


-- -----------------------------------------------------
-- Table `TI`.`departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`departamento` ;

CREATE TABLE IF NOT EXISTS `TI`.`departamento` (
  `departamento_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `icono_fa` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false COMMENT 'Ícono de FontAwesome\nla cadena que representa \nel nombre del mismo.',
  PRIMARY KEY (`departamento_id`))
ENGINE = InnoDB
COMMENT = 'Su función es llevar el control de los servicios que se encu /* comment truncated */ /*entran asociados a los departamentos.*/';


-- -----------------------------------------------------
-- Table `TI`.`departamento_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`departamento_servicio` ;

CREATE TABLE IF NOT EXISTS `TI`.`departamento_servicio` (
  `departamento_id` BIGINT(20) NOT NULL COMMENT 'Clave primaria',
  `servicio_id` BIGINT(20) NOT NULL COMMENT 'FK servicio',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`departamento_id`, `servicio_id`),
  INDEX `fk_departamento_servicio_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_departamento_servicio_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_departamento_servicio_1_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `TI`.`departamento` (`departamento_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Relación entre la tabla \"servicio\" y \"departamento\"';


-- -----------------------------------------------------
-- Table `TI`.`presupuesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`presupuesto` ;

CREATE TABLE IF NOT EXISTS `TI`.`presupuesto` (
  `presupuesto_id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `monto` DOUBLE NOT NULL COMMENT 'Cantidad de dinero asociada.',
  `departamento_id` BIGINT(20) NOT NULL COMMENT 'FK departamento',
  `tipo` ENUM('INV', 'SER') NOT NULL COMMENT 'Dominio:{INV,SER}\n\nINV: Inventario\nSER: Servicio',
  `fecha_creacion` DATETIME NOT NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`presupuesto_id`),
  INDEX `fk_presupuesto_1_departamento_idx` (`departamento_id` ASC),
  CONSTRAINT `fk_presupuesto_1_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `TI`.`departamento` (`departamento_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Es un presupuesto generado en función de los precios de cada /* comment truncated */ /* elemento*/';


-- -----------------------------------------------------
-- Table `TI`.`ma_categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`ma_categoria` ;

CREATE TABLE IF NOT EXISTS `TI`.`ma_categoria` (
  `ma_categoria_id` BIGINT(20) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `icono_fa` VARCHAR(50) NOT NULL COMMENT 'Cadena que representa el\nícono de la categoría según los \níconos de FontAwaesome',
  PRIMARY KEY (`ma_categoria_id`))
ENGINE = InnoDB
COMMENT = 'Representa el maestro de las categorías las cuales se encuen /* comment truncated */ /*tran previamente cargadas*/';


-- -----------------------------------------------------
-- Table `TI`.`ma_unidad_medida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`ma_unidad_medida` ;

CREATE TABLE IF NOT EXISTS `TI`.`ma_unidad_medida` (
  `ma_unidad_medida_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `ma_categoria_id` BIGINT(20) NOT NULL COMMENT 'Clave foránea en ma_categoría',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la unidad de medida',
  `abrev_nombre` VARCHAR(3) NOT NULL COMMENT 'Abreviatura del Nombre',
  `valor_total` BIGINT(20) NOT NULL COMMENT 'Representa el valor de la unidad expresado en una medida\nestándar, en este caso serían \nbytes si es Memoria Principal,\nsi Redes serían bits ',
  PRIMARY KEY (`ma_unidad_medida_id`),
  INDEX `fk_ma_unidad_medida_1_ma_categoria_idx` (`ma_categoria_id` ASC),
  CONSTRAINT `fk_ma_unidad_medida_1_ma_categoria`
    FOREIGN KEY (`ma_categoria_id`)
    REFERENCES `TI`.`ma_categoria` (`ma_categoria_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Registra todas las unidades de medidas que tendrá asociada u /* comment truncated */ /*n categoría*/';


-- -----------------------------------------------------
-- Table `TI`.`componente_ti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`componente_ti` ;

CREATE TABLE IF NOT EXISTS `TI`.`componente_ti` (
  `componente_ti_id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `ma_unidad_medida_id` BIGINT(20) NOT NULL,
  `fecha_compra` DATETIME NULL COMMENT 'Fecha en la cual se adquierió \nun ítem.',
  `fecha_elaboracion` DATETIME NULL COMMENT 'Fecha en la cual fue\ncreado el componente de \nTI. Para algunos componentes\npuede que no aplique.',
  `fecha_creacion` DATETIME NOT NULL,
  `tiempo_vida` INT NULL DEFAULT 0 COMMENT 'Cantidad de días/meses/años que durá un item.\nSi es cero \"0\" se asume\ninfinito el tiempo de vida.',
  `unidad_tiempo_vida` ENUM('AA','MM','DD','NA') NOT NULL DEFAULT 'NA' COMMENT 'Unidad asocidada al tiempo de vida, donde,\nDD: días, MM: meses, AA: años, y NA: no aplica para\nlos casos casuales en que sea infinito el mismo. ',
  `precio` DOUBLE NOT NULL COMMENT 'precio del ítem',
  `capacidad` INT NULL COMMENT 'Capacidad del ítem.',
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `cantidad` INT NOT NULL DEFAULT 0,
  `activa` ENUM('ON','OFF') NOT NULL DEFAULT 'ON' COMMENT 'Permite identificar si \nel item de inventario\nestá activo o no, según el tiempo de vida\nespecificado.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`componente_ti_id`),
  INDEX `fk_inventario_ti_detalle_1_ma_unidad_medida_idx` (`ma_unidad_medida_id` ASC),
  CONSTRAINT `fk_inventario_ti_detalle_1_ma_unidad_medida`
    FOREIGN KEY (`ma_unidad_medida_id`)
    REFERENCES `TI`.`ma_unidad_medida` (`ma_unidad_medida_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Detalle de los Componentes de TI';


-- -----------------------------------------------------
-- Table `TI`.`costo_indirecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`costo_indirecto` ;

CREATE TABLE IF NOT EXISTS `TI`.`costo_indirecto` (
  `costo_indirecto_id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `descripcion` VARCHAR(200) NULL COMMENT 'Descripción del costo',
  `costo` DOUBLE NOT NULL COMMENT 'Cantidad monetaria',
  `inventario_ti_detalle_id` BIGINT(20) NULL COMMENT 'fk en \"servicio\"',
  `tipo` ENUM('FORMACION','HARDWARE') NOT NULL DEFAULT 'HARDWARE' COMMENT 'Dominio = {FORMACION, HARDWARE}\nPermite identificar si el costo indirecto\nse relaciona con HW o con\ncapacitación.\n\nCuando es HW el campo \"inventario_detalle_id\" posee\ninformación de lo contrario será nulo.\n',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`costo_indirecto_id`),
  INDEX `fk_costo_indirecto_1_inventario_ti_detalle_idx` (`inventario_ti_detalle_id` ASC),
  CONSTRAINT `fk_costo_indirecto_1_inventario_ti_detalle`
    FOREIGN KEY (`inventario_ti_detalle_id`)
    REFERENCES `TI`.`componente_ti` (`componente_ti_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Lleva el control de los costos indirectos de los servicios d /* comment truncated */ /*e TI.
Cabe destacar que un costo indirecto puede afectar a más de un servicio a la vez.*/';


-- -----------------------------------------------------
-- Table `TI`.`presupuesto_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`presupuesto_item` ;

CREATE TABLE IF NOT EXISTS `TI`.`presupuesto_item` (
  `presupuesto_item_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `presupuesto_id` BIGINT(20) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL COMMENT 'Nombre del ítem',
  `precio` DOUBLE NOT NULL COMMENT 'precio del item, éste puede ser un\nservicio o una pieza.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`presupuesto_item_id`),
  INDEX `fk_presupuesto_item_1_presupuesto_idx` (`presupuesto_id` ASC),
  CONSTRAINT `fk_presupuesto_item_1_presupuesto`
    FOREIGN KEY (`presupuesto_id`)
    REFERENCES `TI`.`presupuesto` (`presupuesto_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Ítem de un presupuesto';


-- -----------------------------------------------------
-- Table `TI`.`inventario_ti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`inventario_ti` ;

CREATE TABLE IF NOT EXISTS `TI`.`inventario_ti` (
  `inventario_ti_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` BIGINT(20) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`inventario_ti_id`),
  INDEX `fk_inventario_ti_1_departamento_idx` (`departamento_id` ASC),
  CONSTRAINT `fk_inventario_ti_1_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `TI`.`departamento` (`departamento_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Lleva el control de los elementos de tecnología de informaci /* comment truncated */ /*ón que posea la organización.*/';


-- -----------------------------------------------------
-- Table `TI`.`organizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`organizacion` ;

CREATE TABLE IF NOT EXISTS `TI`.`organizacion` (
  `organizacion_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `moneda` VARCHAR(50) NOT NULL COMMENT 'Nombre asociado a la moneda',
  `abrev_moneda` VARCHAR(45) NOT NULL COMMENT 'Abreviatura de la moneda',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`organizacion_id`))
ENGINE = InnoDB
COMMENT = 'Almacena los datos básicos de la organización.';


-- -----------------------------------------------------
-- Table `TI`.`servicio_proceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`servicio_proceso` ;

CREATE TABLE IF NOT EXISTS `TI`.`servicio_proceso` (
  `servicio_proceso_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` BIGINT(20) NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `tipo` VARCHAR(10) NULL,
  `descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`servicio_proceso_id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC),
  INDEX `fk_servicio_proceso_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_servicio_proceso_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Representa todos los procesos que se encuentrarán asociados  /* comment truncated */ /*a un servicio previamente definido*/';


-- -----------------------------------------------------
-- Table `TI`.`proceso_historial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`proceso_historial` ;

CREATE TABLE IF NOT EXISTS `TI`.`proceso_historial` (
  `proceso_historial_id` BIGINT(20) NOT NULL COMMENT 'Clave primaria',
  `servicio_proceso_id` BIGINT(20) NOT NULL,
  `mac_dir` VARCHAR(100) NOT NULL,
  `pagina_reclaim` INT NOT NULL,
  `pagina_errores` INT NOT NULL,
  `pagina_escritura` INT NOT NULL,
  `pagina_lectura` INT NOT NULL,
  `tasa_ram` INT NOT NULL,
  `tasa_red_salida` INT NOT NULL,
  `tasa_red_entrada` INT NOT NULL,
  `tasa_cpu` INT NOT NULL COMMENT 'La tasa de CPU se basa en el\ntiempo de uso de CPU	',
  `operaciones_lectura_dd` INT NOT NULL,
  `operaciones_escritura_dd` INT NOT NULL,
  `tasa_lectura_dd` INT NOT NULL,
  `tasa_escritura_dd` INT NOT NULL,
  `tasa_transferencia_dd` INT NOT NULL,
  `num_bloqueos` INT NOT NULL,
  `num_interrupciones_cpu` INT NOT NULL,
  `tiempo_online` INT NOT NULL,
  `tiempo_offline` INT NOT NULL,
  `tiempo_reparacion` INT NOT NULL,
  `cache_errores` INT NOT NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`proceso_historial_id`),
  INDEX `fk_proceso_historial_1_servicio_proceso_idx` (`servicio_proceso_id` ASC),
  CONSTRAINT `fk_proceso_historial_1_servicio_proceso`
    FOREIGN KEY (`servicio_proceso_id`)
    REFERENCES `TI`.`servicio_proceso` (`servicio_proceso_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Guarda la información en detalle de cada uno de los procesos';


-- -----------------------------------------------------
-- Table `TI`.`servicio_historial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`servicio_historial` ;

CREATE TABLE IF NOT EXISTS `TI`.`servicio_historial` (
  `servicio_historial_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` BIGINT(20) NOT NULL,
  `energia_consumida` INT NOT NULL COMMENT 'Número de (MEDIDA) unidades de medidas\nde energía consumida',
  `tiempo_ejecucion_total` INT NOT NULL COMMENT 'Tiempo total de ejecución de un servicio',
  `tiempo_espera_critico_total` INT NOT NULL COMMENT 'Tiempo total de espera crítico de un servicio.',
  `tiempo_espera_regular_total` INT NOT NULL COMMENT 'Tiempo de espera regular total de un servicio',
  `num_caidas` INT NOT NULL,
  `tiempo_inactividad` INT NOT NULL,
  `frecuencia_id` INT NOT NULL,
  `fecha_creacion` DATETIME NOT NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`servicio_historial_id`),
  INDEX `fk_servicio_historial_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_servicio_historial_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Almacena el historial de un servicio, que representa la tota /* comment truncated */ /*lizaciones de los cálculos previamente registrados.*/';


-- -----------------------------------------------------
-- Table `TI`.`incidencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`incidencia` ;

CREATE TABLE IF NOT EXISTS `TI`.`incidencia` (
  `incidencia_id` BIGINT(20) NOT NULL,
  `servicio_id` BIGINT(20) NOT NULL,
  `fecha_deteccion` DATETIME NOT NULL COMMENT 'Fecha de detección de la incidencia',
  `fecha_reparacion` DATETIME NULL COMMENT 'Fecha de reparación de la incidencia',
  `fecha_restaurado` DATETIME NULL COMMENT 'Fecha de restaurado de la incidencia',
  `tiempo_caido` VARCHAR(45) NULL COMMENT 'Cantidad que duró la caída del servicio.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`incidencia_id`),
  INDEX `fk_incidencia_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_incidencia_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Registra las incidencias ocurridas';


-- -----------------------------------------------------
-- Table `TI`.`umbral`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`umbral` ;

CREATE TABLE IF NOT EXISTS `TI`.`umbral` (
  `umbral_id` BIGINT(20) NOT NULL,
  `servicio_id` BIGINT(20) NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `tiempo_acordado` INT NOT NULL,
  `medida` VARCHAR(45) NOT NULL,
  `valor` INT NOT NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`umbral_id`),
  INDEX `fk_umbral_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_umbral_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TI`.`disponibilidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`disponibilidad` ;

CREATE TABLE IF NOT EXISTS `TI`.`disponibilidad` (
  `disponibilidad_id` BIGINT(20) NOT NULL,
  `servicio_historial_id` BIGINT(20) NOT NULL,
  `servicio_id` BIGINT(20) NOT NULL,
  `descripcion` VARCHAR(300) NULL,
  `tiempo_medio_fallos` INT NOT NULL,
  `calculo_disponibilidad` INT NOT NULL,
  `calculo_fiabilidad` INT NOT NULL,
  `calculo_confiabilidad` INT NOT NULL,
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`disponibilidad_id`),
  INDEX `fk_disponibilidad_1_servicio_historial_idx` (`servicio_historial_id` ASC),
  INDEX `fk_disponibilidad_2_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_disponibilidad_1_servicio_historial`
    FOREIGN KEY (`servicio_historial_id`)
    REFERENCES `TI`.`servicio_historial` (`servicio_historial_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_disponibilidad_2_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TI`.`departamento_direccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`departamento_direccion` ;

CREATE TABLE IF NOT EXISTS `TI`.`departamento_direccion` (
  `departamento_direccion_id` BIGINT(20) NOT NULL,
  `departamento_id` BIGINT(20) NOT NULL,
  `direccion_mac` VARCHAR(200) NOT NULL COMMENT 'Direcciones de mac de\nlos equipos que se\nencuentren en los\ndepartamentos',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`departamento_direccion_id`),
  INDEX `fk_departamento_direccion_1_departamento_idx` (`departamento_id` ASC),
  CONSTRAINT `fk_departamento_direccion_1_departamento`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `TI`.`departamento` (`departamento_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Direcciones mac asociadas a los departamentos.';


-- -----------------------------------------------------
-- Table `TI`.`servicio_costo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`servicio_costo` ;

CREATE TABLE IF NOT EXISTS `TI`.`servicio_costo` (
  `servicio_costo_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` BIGINT(20) NOT NULL COMMENT 'fk en servicio',
  `fecha_valoracion` DATETIME NOT NULL COMMENT 'Fecha en la cual\nse estableció ese costo para\nun servicio.',
  `nivel_criticidad` INT NOT NULL DEFAULT 0 COMMENT 'Define que tan crítico\nes un servicio en función\nde costos.',
  `borrado` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`servicio_costo_id`),
  INDEX `fk_servicio_costo_1_servicio_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_servicio_costo_1_servicio`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `TI`.`servicio` (`servicio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Costo asociado a un servicio, que incluso podrían tener vari /* comment truncated */ /*os costos asociados según la variación que este pueda tener en el tiempo*/';


-- -----------------------------------------------------
-- Table `TI`.`inventario_componente_ti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TI`.`inventario_componente_ti` ;

CREATE TABLE IF NOT EXISTS `TI`.`inventario_componente_ti` (
  `inventario_componente_ti_id` BIGINT(20) NOT NULL,
  `inventario_ti_id` BIGINT(20) NOT NULL,
  `componente_ti_id` BIGINT(20) NOT NULL,
  PRIMARY KEY (`inventario_componente_ti_id`),
  INDEX `fk_inventario_componente_ti_1_inventario_ti_idx` (`inventario_ti_id` ASC),
  INDEX `fk_inventario_componente_ti_2_componente_ti_idx` (`componente_ti_id` ASC),
  CONSTRAINT `fk_inventario_componente_ti_1_inventario_ti`
    FOREIGN KEY (`inventario_ti_id`)
    REFERENCES `TI`.`inventario_ti` (`inventario_ti_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inventario_componente_ti_2_componente_ti`
    FOREIGN KEY (`componente_ti_id`)
    REFERENCES `TI`.`componente_ti` (`componente_ti_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Un componente de TI pertenece a uno o más inventarios';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
