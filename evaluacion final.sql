-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema evaluación
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema evaluación
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `evaluación` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `evaluación` ;

-- -----------------------------------------------------
-- Table `evaluación`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `evaluación`.`tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `evaluación`.`pacientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `evaluación`.`pacientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NULL DEFAULT NULL,
  `pass` VARCHAR(50) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `correo` VARCHAR(50) NULL DEFAULT NULL,
  `tipo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pacientes_tipo_idx` (`tipo_id` ASC) VISIBLE,
  CONSTRAINT `fk_pacientes_tipo`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `evaluación`.`tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
