select * from organizacion;

delete from organizacion where organizacion_id > 0;

select * from ma_categoria;
select * from ma_unidad_medida;

select * from componente_ti;

USE `TI` ;

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
COMMENT = 'Detalle de los Componentes de TI.';
