-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Schema ishop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ishop` DEFAULT CHARACTER SET utf8 ;
USE `ishop` ;

-- -----------------------------------------------------
-- Table `ishop`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`categories` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `active` TINYINT(4) NOT NULL DEFAULT '1',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `categories_parent_id_index` (`parent_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`order_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`order_status` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`roles` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_unique` (`title` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `lastname` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `address` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `phone` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(200) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `active` TINYINT(4) NOT NULL DEFAULT '1',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roles_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC),
  INDEX `fk_users_roles_idx` (`roles_id` ASC),
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`roles_id`)
    REFERENCES `ishop`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`orders` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(1000) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` INT(10) UNSIGNED NOT NULL,
  `users_id` INT(10) UNSIGNED NOT NULL,
  `ord_number` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ord_number_UNIQUE` (`ord_number` ASC),
  INDEX `fk_orders_order_status1_idx` (`status_id` ASC),
  INDEX `fk_orders_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_orders_order_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `ishop`.`order_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `ishop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`products` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `stock` INT(11) NOT NULL,
  `price` DECIMAL(7,2) NOT NULL,
  `currency` INT(11) NOT NULL DEFAULT '1',
  `description` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `image` VARCHAR(256) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `active` TINYINT(4) NOT NULL DEFAULT '1',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categories_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC),
  FULLTEXT INDEX `search` (`name` ASC, `description` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `ishop`.`order_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ishop`.`order_details` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` INT(11) NOT NULL,
  `price` DECIMAL(7,2) NOT NULL,
  `orders_id` INT(10) UNSIGNED NOT NULL,
  `products_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `a_pk_order_details` (`orders_id` ASC, `products_id` ASC),
  INDEX `fk_order_details_orders1_idx` (`orders_id` ASC),
  INDEX `fk_orders_detail_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_orders_details_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `ishop`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_details_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `ishop`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
