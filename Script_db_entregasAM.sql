-- Schema db_entregasam
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_entregasam` ;

-- -----------------------------------------------------
-- Schema db_entregasam
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_entregasam` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_entregasam` ;

-- -----------------------------------------------------
-- Table `db_entregasam`.`poblacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`poblacion` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`poblacion` (
  `idpoblacion` INT(11) NOT NULL auto_increment,
  `nombre_poblacion` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idpoblacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`departamento` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`departamento` (
  `iddepartamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` VARCHAR(45) NOT NULL,
  `poblacion_id` INT(11) NOT NULL,
  PRIMARY KEY (`iddepartamento`),
  CONSTRAINT `fk_departamento_poblacion_destino1`
    FOREIGN KEY (`poblacion_id`)
    REFERENCES `db_entregasam`.`poblacion` (`idpoblacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`empleado` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`empleado` (
  `cedulaempleado` BIGINT(20) NOT NULL,
  `nombreempleado` VARCHAR(30) NOT NULL,
  `apellidoempleado` VARCHAR(30) NOT NULL,
  `usuarioempleado` VARCHAR(40) NOT NULL,
  `clave` VARCHAR(20) NOT NULL,
  `tipoempleado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedulaempleado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`receptor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`receptor` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`receptor` (
  `idreceptor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `nit-cedula` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`idreceptor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`remitente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`remitente` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`remitente` (
  `documento` VARCHAR(20) NOT NULL,
  `Tipodocumento` VARCHAR(15) NOT NULL,
  `nombreRemi` VARCHAR(60) NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  `observaciones` VARCHAR(200) NULL DEFAULT NULL,
  `nomContacto` VARCHAR(45) NULL,
  `emai` VARCHAR(50) NULL,
  `poblacion_idpoblacion` INT(11) NOT NULL,
  PRIMARY KEY (`documento`),
  CONSTRAINT `fk_remitente_poblacion1`
    FOREIGN KEY (`poblacion_idpoblacion`)
    REFERENCES `db_entregasam`.`poblacion` (`idpoblacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`vehiculos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`vehiculos` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`vehiculos` (
  `placa` VARCHAR(10) NOT NULL,
  `marca` VARCHAR(15) NULL DEFAULT NULL,
  `fecha_vencimientosoat` DATE NULL DEFAULT NULL,
  `fecha_vencimientoTecno` DATE NULL DEFAULT NULL,
  `capacidad_peso` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`placa`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`ruta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`ruta` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`ruta` (
  `idruta` INT(11) NOT NULL,
  `nombreruta` VARCHAR(45) NOT NULL,
  `vehiculos_placa` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idruta`),
  CONSTRAINT `fk_ruta_vehiculos1`
    FOREIGN KEY (`vehiculos_placa`)
    REFERENCES `db_entregasam`.`vehiculos` (`placa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`registro_guias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`registro_guias` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`registro_guias` (
  `idguia` VARCHAR(30) NOT NULL,
  `unidades` INT(11) NOT NULL,
  `valor_declarado` DOUBLE NOT NULL,
  `kilos_reales` DOUBLE NULL DEFAULT NULL,
  `kilos_volumen` DOUBLE NULL DEFAULT NULL,
  `kilos_cobrar` DOUBLE NULL DEFAULT NULL,
  `observaciones` VARCHAR(300) NULL DEFAULT NULL,
  `remitente_documento` varchar(20) NOT NULL,
  `receptor_idreceptor` INT(11) NOT NULL,
  `fecha_enruta` DATE NULL DEFAULT NULL,
  `ruta_idruta` INT(11) NOT NULL,
  PRIMARY KEY (`idguia`, `remitente_documento`, `receptor_idreceptor`),
  CONSTRAINT `fk_registro_guias_receptor1`
    FOREIGN KEY (`receptor_idreceptor`)
    REFERENCES `db_entregasam`.`receptor` (`idreceptor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registro_guias_remitente1`
    FOREIGN KEY (`remitente_documento`)
    REFERENCES `db_entregasam`.`remitente` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registro_guias_ruta1`
    FOREIGN KEY (`ruta_idruta`)
    REFERENCES `db_entregasam`.`ruta` (`idruta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`guias_union_empleados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`guias_union_empleados` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`guias_union_empleados` (
  `idguia` VARCHAR(30) NOT NULL,
  `cedulaempleado` BIGINT(20) NOT NULL,
  `fechacreacionedicion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`idguia`, `cedulaempleado`),
  CONSTRAINT `fk_registro_guias_has_Empleado_Empleado1`
    FOREIGN KEY (`cedulaempleado`)
    REFERENCES `db_entregasam`.`empleado` (`cedulaempleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_registro_guias_has_Empleado_registro_guias1`
    FOREIGN KEY (`idguia`)
    REFERENCES `db_entregasam`.`registro_guias` (`idguia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`poblacion_union_guias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`poblacion_union_guias` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`poblacion_union_guias` (
  `idpoblacion` INT(11) NOT NULL,
  `idguia` VARCHAR(30) NOT NULL,
  `tipo_poblacion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idpoblacion`, `idguia`),
  CONSTRAINT `fk_poblacion_has_registro_guias_poblacion1`
    FOREIGN KEY (`idpoblacion`)
    REFERENCES `db_entregasam`.`poblacion` (`idpoblacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_poblacion_has_registro_guias_registro_guias1`
    FOREIGN KEY (`idguia`)
    REFERENCES `db_entregasam`.`registro_guias` (`idguia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_entregasam`.`receptor_datos_adicionales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_entregasam`.`receptor_datos_adicionales` ;

CREATE TABLE IF NOT EXISTS `db_entregasam`.`receptor_datos_adicionales` (
  `idreceptor_datos_adicionales` INT(11) NOT NULL AUTO_INCREMENT,
  `telefono` BIGINT(20) NULL DEFAULT NULL,
  `dir_calle_cra` VARCHAR(20) NOT NULL,
  `dir_numero1` INT(11) NOT NULL,
  `dir_letra1` VARCHAR(10) NULL DEFAULT NULL,
  `dir_este_oeste_s_n` VARCHAR(20) NULL DEFAULT NULL,
  `dir_num2` INT(11) NOT NULL,
  `dir_letra2` VARCHAR(10) NULL DEFAULT NULL,
  `dir_num3` INT(11) NOT NULL,
  `receptor_idreceptor` INT(11) NOT NULL,
  PRIMARY KEY (`idreceptor_datos_adicionales`),
  CONSTRAINT `fk_receptor_datos_adicionales_receptor1`
    FOREIGN KEY (`receptor_idreceptor`)
    REFERENCES `db_entregasam`.`receptor` (`idreceptor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


