-- MySQL Script generated by MySQL Workbench
-- 02/28/15 14:09:09
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cities` (
  `id` INT NOT NULL,
  `name` VARCHAR(100) NULL,
  `state` VARCHAR(4) NULL,
  `status` ENUM('verified') NULL,
  `latitude` FLOAT NULL,
  `longitude` FLOAT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `visited_cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `visited_cities` (
  `user_id` INT NOT NULL,
  `city_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `city_id`),
  INDEX `fk_users_has_cities_cities1_idx` (`city_id` ASC),
  INDEX `fk_users_has_cities_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_cities_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_cities_cities`
    FOREIGN KEY (`city_id`)
    REFERENCES `cities` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;