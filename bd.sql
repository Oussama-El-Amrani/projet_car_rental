-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `car_rental` DEFAULT CHARACTER SET utf8 ;
USE `car_rental` ;

-- -----------------------------------------------------
-- Table `car_rental`.`car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car_rental`.`car` (
  `registration` VARCHAR(45) NOT NULL,
  `marque` VARCHAR(45) NULL,
  `modele` VARCHAR(45) NULL,
  `daily_price` INT NULL,
  `available` TINYINT NULL DEFAULT 1,
  `car_picture` VARCHAR(400) NULL,
  PRIMARY KEY (`registration`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `car_rental`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car_rental`.`utilisateur` (
  `cin` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `phone_num` INT NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(45) NULL,
  `user_picture` VARCHAR(400) NULL DEFAULT 'https://static-openask-com.s3.amazonaws.com/content/images/tests/large/1931_test.jpg',
  `admin` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`cin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `car_rental`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car_rental`.`reservation` (
  `registration` VARCHAR(45) NOT NULL,
  `cin` VARCHAR(45) NOT NULL,
  `d_date` DATE NULL,
  `r_date` DATE NULL,
  `price` VARCHAR(45) NULL,
  PRIMARY KEY (`registration`, `cin`),
  INDEX `fk_voiture_has_client_client1_idx` (`cin` ASC) ,
  INDEX `fk_voiture_has_client_voiture_idx` (`registration` ASC) ,
  CONSTRAINT `fk_voiture_has_client_voiture`
    FOREIGN KEY (`registration`)
    REFERENCES `car_rental`.`car` (`registration`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_voiture_has_client_client1`
    FOREIGN KEY (`cin`)
    REFERENCES `car_rental`.`utilisateur` (`cin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `car`(`id`, `marque`, `modele`, `daily_price`, `available`, `car_picture`) VALUES ('1','Dacia','sandero','250','1','https://www.wandaloo.com/files/2020/09/DACIA-Sandero-Stepway-2021-Neuve-Maroc-07.jpg');


INSERT INTO `car`(`id`, `marque`, `modele`, `daily_price`, `available`, `car_picture`) VALUES ('2','Dacia','logan','200','1','https://upload.wikimedia.org/wikipedia/commons/1/17/Dacia_Logan_III_%28cropped%29.jpg')


INSERT INTO `car`(`id`, `marque`, `modele`, `daily_price`, `available`, `car_picture`) VALUES ('7','land rover','evoque','400','1','https://i.gaw.to/vehicles/photos/40/27/402702-2022-land-rover-range-rover-evoque.jpg')


INSERT INTO `car`(`id`, `marque`, `modele`, `daily_price`, `available`, `car_picture`) VALUES ('8','land rover','sport','1000','1','https://picolio.auto123.com/auto123-media/articles/2022/5/69210/RRS_23MY_05_FE_036_GLHD_100522fr.jpg?crop=0,879,3383,1127&amp;scaledown=1024')