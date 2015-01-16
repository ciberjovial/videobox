-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema detalledeventa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema detalledeventa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `detalledeventa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `detalledeventa` ;

-- -----------------------------------------------------
-- Table `detalledeventa`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`usuario` (
  `codigousuario` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `permisos` VARCHAR(45) NULL,
  `suspendido` BINARY(1) NULL,
  PRIMARY KEY (`codigousuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`directorpelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`directorpelicula` (
  `iddirectorpelicula` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`iddirectorpelicula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`sinopsispelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`sinopsispelicula` (
  `idsinopsispelicula` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idsinopsispelicula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`generopelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`generopelicula` (
  `idgeneropelicula` INT NOT NULL,
  `descripciongenero` VARCHAR(45) NULL,
  PRIMARY KEY (`idgeneropelicula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`pais` (
  `idpais` INT NOT NULL,
  `nombrepais` VARCHAR(45) NULL,
  PRIMARY KEY (`idpais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`actoresreparto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`actoresreparto` (
  `idactoresreparto` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`idactoresreparto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`pelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`pelicula` (
  `idpelicula` INT NOT NULL,
  `titulooriginal` VARCHAR(45) NULL,
  `año` YEAR NULL,
  `duracion` VARCHAR(45) NULL,
  `directorpelicula_iddirectorpelicula` INT NOT NULL,
  `sinopsispelicula_idsinopsispelicula` INT NOT NULL,
  `generopelicula_idgeneropelicula` INT NOT NULL,
  `pais_idpais` INT NOT NULL,
  `actoresreparto_idactoresreparto` INT NOT NULL,
  PRIMARY KEY (`idpelicula`, `directorpelicula_iddirectorpelicula`, `sinopsispelicula_idsinopsispelicula`, `generopelicula_idgeneropelicula`, `pais_idpais`, `actoresreparto_idactoresreparto`),
  INDEX `fk_pelicula_directorpelicula1_idx` (`directorpelicula_iddirectorpelicula` ASC),
  INDEX `fk_pelicula_sinopsispelicula1_idx` (`sinopsispelicula_idsinopsispelicula` ASC),
  INDEX `fk_pelicula_generopelicula1_idx` (`generopelicula_idgeneropelicula` ASC),
  INDEX `fk_pelicula_pais1_idx` (`pais_idpais` ASC),
  INDEX `fk_pelicula_actoresreparto1_idx` (`actoresreparto_idactoresreparto` ASC),
  CONSTRAINT `fk_pelicula_directorpelicula1`
    FOREIGN KEY (`directorpelicula_iddirectorpelicula`)
    REFERENCES `detalledeventa`.`directorpelicula` (`iddirectorpelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_sinopsispelicula1`
    FOREIGN KEY (`sinopsispelicula_idsinopsispelicula`)
    REFERENCES `detalledeventa`.`sinopsispelicula` (`idsinopsispelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_generopelicula1`
    FOREIGN KEY (`generopelicula_idgeneropelicula`)
    REFERENCES `detalledeventa`.`generopelicula` (`idgeneropelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_pais1`
    FOREIGN KEY (`pais_idpais`)
    REFERENCES `detalledeventa`.`pais` (`idpais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_actoresreparto1`
    FOREIGN KEY (`actoresreparto_idactoresreparto`)
    REFERENCES `detalledeventa`.`actoresreparto` (`idactoresreparto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`cliente` (
  `idcliente` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `dni` VARCHAR(8) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `cajero_idcajero` INT NOT NULL,
  `vendedor_idvendedor` INT NOT NULL,
  PRIMARY KEY (`idcliente`, `cajero_idcajero`, `vendedor_idvendedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`alquiler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`alquiler` (
  `idalquiler` INT NOT NULL,
  `precioalquiler` DECIMAL(3) NULL,
  `cliente_idcliente` INT NOT NULL,
  PRIMARY KEY (`idalquiler`, `cliente_idcliente`),
  INDEX `fk_alquiler_cliente1_idx` (`cliente_idcliente` ASC),
  CONSTRAINT `fk_alquiler_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `detalledeventa`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`empleado` (
  `idempleado` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `cargoempleado` VARCHAR(45) NULL,
  `alquiler_idalquiler` INT NOT NULL,
  `alquiler_cliente_idcliente` INT NOT NULL,
  PRIMARY KEY (`idempleado`, `alquiler_idalquiler`, `alquiler_cliente_idcliente`),
  INDEX `fk_empleado_alquiler1_idx` (`alquiler_idalquiler` ASC, `alquiler_cliente_idcliente` ASC),
  CONSTRAINT `fk_empleado_alquiler1`
    FOREIGN KEY (`alquiler_idalquiler` , `alquiler_cliente_idcliente`)
    REFERENCES `detalledeventa`.`alquiler` (`idalquiler` , `cliente_idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`venta` (
  `idventa` INT NOT NULL,
  `preciodeventa` DECIMAL(3) NULL,
  `formato` VARCHAR(45) NULL,
  `cliente_idcliente` INT NOT NULL,
  `empleado_idempleado` INT NOT NULL,
  PRIMARY KEY (`idventa`, `cliente_idcliente`, `empleado_idempleado`),
  INDEX `fk_venta_cliente1_idx` (`cliente_idcliente` ASC),
  INDEX `fk_venta_empleado1_idx` (`empleado_idempleado` ASC),
  CONSTRAINT `fk_venta_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `detalledeventa`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_empleado1`
    FOREIGN KEY (`empleado_idempleado`)
    REFERENCES `detalledeventa`.`empleado` (`idempleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`detalledeventa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`detalledeventa` (
  `pelicula_idpelicula` INT NOT NULL,
  `pelicula_directorpelicula_iddirectorpelicula` INT NOT NULL,
  `pelicula_sinopsispelicula_idsinopsispelicula` INT NOT NULL,
  `pelicula_generopelicula_idgeneropelicula` INT NOT NULL,
  `pelicula_pais_idpais` INT NOT NULL,
  `pelicula_actoresreparto_idactoresreparto` INT NOT NULL,
  `venta_idventa` INT NOT NULL,
  `fechadeventa` DATETIME NULL,
  PRIMARY KEY (`pelicula_idpelicula`, `pelicula_directorpelicula_iddirectorpelicula`, `pelicula_sinopsispelicula_idsinopsispelicula`, `pelicula_generopelicula_idgeneropelicula`, `pelicula_pais_idpais`, `pelicula_actoresreparto_idactoresreparto`, `venta_idventa`),
  INDEX `fk_pelicula_has_venta_venta1_idx` (`venta_idventa` ASC),
  INDEX `fk_pelicula_has_venta_pelicula1_idx` (`pelicula_idpelicula` ASC, `pelicula_directorpelicula_iddirectorpelicula` ASC, `pelicula_sinopsispelicula_idsinopsispelicula` ASC, `pelicula_generopelicula_idgeneropelicula` ASC, `pelicula_pais_idpais` ASC, `pelicula_actoresreparto_idactoresreparto` ASC),
  CONSTRAINT `fk_pelicula_has_venta_pelicula1`
    FOREIGN KEY (`pelicula_idpelicula` , `pelicula_directorpelicula_iddirectorpelicula` , `pelicula_sinopsispelicula_idsinopsispelicula` , `pelicula_generopelicula_idgeneropelicula` , `pelicula_pais_idpais` , `pelicula_actoresreparto_idactoresreparto`)
    REFERENCES `detalledeventa`.`pelicula` (`idpelicula` , `directorpelicula_iddirectorpelicula` , `sinopsispelicula_idsinopsispelicula` , `generopelicula_idgeneropelicula` , `pais_idpais` , `actoresreparto_idactoresreparto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_has_venta_venta1`
    FOREIGN KEY (`venta_idventa`)
    REFERENCES `detalledeventa`.`venta` (`idventa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledeventa`.`detalledealquiler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledeventa`.`detalledealquiler` (
  `pelicula_idpelicula` INT NOT NULL,
  `pelicula_directorpelicula_iddirectorpelicula` INT NOT NULL,
  `pelicula_sinopsispelicula_idsinopsispelicula` INT NOT NULL,
  `pelicula_generopelicula_idgeneropelicula` INT NOT NULL,
  `pelicula_pais_idpais` INT NOT NULL,
  `pelicula_actoresreparto_idactoresreparto` INT NOT NULL,
  `alquiler_idalquiler` INT NOT NULL,
  `fechadealquiler` DATETIME NULL,
  `fechadevolucion` DATETIME NULL,
  PRIMARY KEY (`pelicula_idpelicula`, `pelicula_directorpelicula_iddirectorpelicula`, `pelicula_sinopsispelicula_idsinopsispelicula`, `pelicula_generopelicula_idgeneropelicula`, `pelicula_pais_idpais`, `pelicula_actoresreparto_idactoresreparto`, `alquiler_idalquiler`),
  INDEX `fk_pelicula_has_alquiler_alquiler1_idx` (`alquiler_idalquiler` ASC),
  INDEX `fk_pelicula_has_alquiler_pelicula1_idx` (`pelicula_idpelicula` ASC, `pelicula_directorpelicula_iddirectorpelicula` ASC, `pelicula_sinopsispelicula_idsinopsispelicula` ASC, `pelicula_generopelicula_idgeneropelicula` ASC, `pelicula_pais_idpais` ASC, `pelicula_actoresreparto_idactoresreparto` ASC),
  CONSTRAINT `fk_pelicula_has_alquiler_pelicula1`
    FOREIGN KEY (`pelicula_idpelicula` , `pelicula_directorpelicula_iddirectorpelicula` , `pelicula_sinopsispelicula_idsinopsispelicula` , `pelicula_generopelicula_idgeneropelicula` , `pelicula_pais_idpais` , `pelicula_actoresreparto_idactoresreparto`)
    REFERENCES `detalledeventa`.`pelicula` (`idpelicula` , `directorpelicula_iddirectorpelicula` , `sinopsispelicula_idsinopsispelicula` , `generopelicula_idgeneropelicula` , `pais_idpais` , `actoresreparto_idactoresreparto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pelicula_has_alquiler_alquiler1`
    FOREIGN KEY (`alquiler_idalquiler`)
    REFERENCES `detalledeventa`.`alquiler` (`idalquiler`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
