-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ewa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ewa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mini` DEFAULT CHARACTER SET utf8 ;
USE `mini` ;

-- -----------------------------------------------------
-- Table `mini`.`Member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Member` (
  `memberEmail` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `firstLogin` DATETIME NOT NULL,
  `lastLogin` DATETIME NULL,
  PRIMARY KEY (`memberEmail`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mini`.`Streamer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Streamer` (
  `streamID` INT NOT NULL AUTO_INCREMENT,
  `streamName` VARCHAR(20) NOT NULL,
  `lastOnline` DATETIME NULL,
  `categorie` INT NULL,
  PRIMARY KEY (`streamID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mini`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Game` (
  `gameID` INT NOT NULL,
  `gameName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`gameID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mini`.`Plays`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Plays` (
  `Streamer_streamID` INT NOT NULL,
  `Game_gameID` INT NOT NULL,
  PRIMARY KEY (`Streamer_streamID`, `Game_gameID`),
  INDEX `fk_Streamer_has_Game_Game1_idx` (`Game_gameID` ASC),
  INDEX `fk_Streamer_has_Game_Streamer_idx` (`Streamer_streamID` ASC),
  CONSTRAINT `fk_Streamer_has_Game_Streamer`
    FOREIGN KEY (`Streamer_streamID`)
    REFERENCES `mini`.`Streamer` (`streamID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Streamer_has_Game_Game1`
    FOREIGN KEY (`Game_gameID`)
    REFERENCES `mini`.`Game` (`gameID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mini`.`Favorite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Favorite` (
  `Member_memberEmail` VARCHAR(255) NOT NULL,
  `Streamer_streamID` INT NOT NULL,
  PRIMARY KEY (`Member_memberEmail`, `Streamer_streamID`),
  INDEX `fk_Member_has_Streamer_Streamer1_idx` (`Streamer_streamID` ASC),
  INDEX `fk_Member_has_Streamer_Member1_idx` (`Member_memberEmail` ASC),
  CONSTRAINT `fk_Member_has_Streamer_Member1`
    FOREIGN KEY (`Member_memberEmail`)
    REFERENCES `mini`.`Member` (`memberEmail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_has_Streamer_Streamer1`
    FOREIGN KEY (`Streamer_streamID`)
    REFERENCES `mini`.`Streamer` (`streamID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
