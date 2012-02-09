SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `filestoretest` ;
CREATE SCHEMA IF NOT EXISTS `filestoretest` DEFAULT CHARACTER SET utf8 ;
USE `filestoretest` ;

-- -----------------------------------------------------
-- Table `filestoretest`.`authors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`authors` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`authors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`resources`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`resources` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`resources` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NOT NULL ,
  `description` LONGTEXT NULL ,
  `author_id` INT NULL ,
  `active` TINYINT(1) NOT NULL ,
  `dateexpires` DATETIME NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_resources_authors` (`author_id` ASC) ,
  CONSTRAINT `fk_resources_authors`
    FOREIGN KEY (`author_id` )
    REFERENCES `filestoretest`.`authors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`locations` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`servers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`servers` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`servers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `location_id` INT NOT NULL ,
  `displayname` VARCHAR(255) NOT NULL ,
  `address` VARCHAR(255) NOT NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `address_UNIQUE` (`address` ASC) ,
  INDEX `fk_servers_locations` (`location_id` ASC) ,
  CONSTRAINT `fk_servers_locations`
    FOREIGN KEY (`location_id` )
    REFERENCES `filestoretest`.`locations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`filestores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`filestores` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`filestores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `server_id` INT NOT NULL ,
  `virtualdirectory` VARCHAR(255) NOT NULL ,
  `protocol` VARCHAR(4) NOT NULL ,
  `downloadport` INT NOT NULL ,
  `uploadport` INT NULL ,
  `uploaduri` VARCHAR(255) NULL ,
  `smbpath` VARCHAR(255) NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_filestores_servers` (`server_id` ASC) ,
  CONSTRAINT `fk_filestores_servers`
    FOREIGN KEY (`server_id` )
    REFERENCES `filestoretest`.`servers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`resourcetypes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`resourcetypes` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`resourcetypes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `basictype` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `thumb` VARCHAR(255) NOT NULL ,
  `thumbsmall` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`resourceobjects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`resourceobjects` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`resourceobjects` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `resource_id` INT NOT NULL ,
  `filestore_id` INT NOT NULL ,
  `resourcetype_id` INT NOT NULL ,
  `uri` VARCHAR(255) NOT NULL COMMENT '	' ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_resourceobjects_resources` (`resource_id` ASC) ,
  INDEX `fk_resourceobjects_filestores` (`filestore_id` ASC) ,
  INDEX `fk_resourceobjects_resourcetypes` (`resourcetype_id` ASC) ,
  CONSTRAINT `fk_resourceobjects_resources`
    FOREIGN KEY (`resource_id` )
    REFERENCES `filestoretest`.`resources` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resourceobjects_filestores`
    FOREIGN KEY (`filestore_id` )
    REFERENCES `filestoretest`.`filestores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resourceobjects_resourcetypes`
    FOREIGN KEY (`resourcetype_id` )
    REFERENCES `filestoretest`.`resourcetypes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`template_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`template_table` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`template_table` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filestoretest`.`subnets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filestoretest`.`subnets` ;

CREATE  TABLE IF NOT EXISTS `filestoretest`.`subnets` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `location_id` INT NOT NULL ,
  `iprangelow` VARCHAR(15) NULL ,
  `iprangehigh` VARCHAR(15) NULL ,
  `datecreated` DATETIME NULL ,
  `datemodified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `iprangehigh_UNIQUE` (`iprangehigh` ASC) ,
  UNIQUE INDEX `iprangelow_UNIQUE` (`iprangelow` ASC) ,
  INDEX `fk_subnes_locations` (`location_id` ASC) ,
  CONSTRAINT `fk_subnes_locations`
    FOREIGN KEY (`location_id` )
    REFERENCES `filestoretest`.`locations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`authors`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`authors` (`id`, `name`, `datecreated`, `datemodified`) VALUES (1, 'Don Juan de Marco', NULL, NULL);
INSERT INTO `filestoretest`.`authors` (`id`, `name`, `datecreated`, `datemodified`) VALUES (2, 'Malory Ribbit', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`resources`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`resources` (`id`, `title`, `description`, `author_id`, `active`, `dateexpires`, `datecreated`, `datemodified`) VALUES (1, 'Test Video', 'This is a great video for testing the system. Please remove during install.', 1, 1, '2012-1-1', NULL, NULL);
INSERT INTO `filestoretest`.`resources` (`id`, `title`, `description`, `author_id`, `active`, `dateexpires`, `datecreated`, `datemodified`) VALUES (2, 'Jakob Tucker Dunks', 'Smallest guy in the competition - Illinois College Guard and YouTube Dunking Sensation, Jacob Tucker, is the 2011 Denny\'s NCAA Slam Dunk Champion!', NULL, 0, '2013-1-1', NULL, NULL);
INSERT INTO `filestoretest`.`resources` (`id`, `title`, `description`, `author_id`, `active`, `dateexpires`, `datecreated`, `datemodified`) VALUES (3, 'Hansel and Gretel', 'Hansel and Gretel are the young children of a poor woodcutter. When a great famine settles over the land, the woodcutter\'s second, abusive wife concocts a plan to take the children into the woods and leave them there to fend for themselves, so that she and her husband, with two fewer mouths to feed, might not starve. The woodcutter opposes the plan but finally, and reluctantly, submits to his wife\'s scheme. They are unaware that in the children\'s bedroom, Hansel and Gretel have overheard them. After the parents have gone to bed, Hansel sneaks out of the house and gathers as many white pebbles as he can, then returns to his room, reassuring Gretel that God will not forsake them.', NULL, 1, '2012-3-1', NULL, NULL);
INSERT INTO `filestoretest`.`resources` (`id`, `title`, `description`, `author_id`, `active`, `dateexpires`, `datecreated`, `datemodified`) VALUES (4, 'All About Bullfogs', 'Bullfrogs are the coolest amphibians on planet Earth.', 2, 1, NULL, NULL, NULL);
INSERT INTO `filestoretest`.`resources` (`id`, `title`, `description`, `author_id`, `active`, `dateexpires`, `datecreated`, `datemodified`) VALUES (5, 'HS Live!', 'High School On-Location Live Stream', NULL, 0, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`locations`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`locations` (`id`, `name`, `datecreated`, `datemodified`) VALUES (1, 'JFK High School', NULL, NULL);
INSERT INTO `filestoretest`.`locations` (`id`, `name`, `datecreated`, `datemodified`) VALUES (2, 'Admin Building', NULL, NULL);
INSERT INTO `filestoretest`.`locations` (`id`, `name`, `datecreated`, `datemodified`) VALUES (3, 'Knight Middle School', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`servers`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`servers` (`id`, `name`, `location_id`, `displayname`, `address`, `datecreated`, `datemodified`) VALUES (1, 'Main Appliance', 2, 'Default Storage point - for testing only', '192.168.2.13', NULL, NULL);
INSERT INTO `filestoretest`.`servers` (`id`, `name`, `location_id`, `displayname`, `address`, `datecreated`, `datemodified`) VALUES (2, 'Discovery Appliance', 2, 'Appliance for United Streaming content - located at admin building', '192.168.2.15', NULL, NULL);
INSERT INTO `filestoretest`.`servers` (`id`, `name`, `location_id`, `displayname`, `address`, `datecreated`, `datemodified`) VALUES (3, 'HS Linux Appliance', 1, 'JFK High School Storage', '192.168.12.14', NULL, NULL);
INSERT INTO `filestoretest`.`servers` (`id`, `name`, `location_id`, `displayname`, `address`, `datecreated`, `datemodified`) VALUES (4, 'Streaming Hub', 2, 'Central Streaming Server', '192.168.2.14', NULL, NULL);
INSERT INTO `filestoretest`.`servers` (`id`, `name`, `location_id`, `displayname`, `address`, `datecreated`, `datemodified`) VALUES (5, 'MS Linux Appliance', 3, 'Knight MS Appliance', '192.168.21.12', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`filestores`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (1, 1, '/asfroot', 'mms', 554, 80, '/upload/upload', '/asfroot', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (2, 1, '/vod', 'http', 80, 80, '/upload/upload', '/iisshare/vod', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (3, 1, '/vod2', 'rtmp', 1755, 80, '/upload/upload', '/iisshare/vod', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (4, 2, '/discover', 'mms', 554, 80, '/upload/upload', '/disccontent/content2010', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (5, 3, '/vod', 'http', 80, 80, '/upload/upload', '/media/vod', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (6, 3, '/doc', 'http', 80, 80, '/upload/upload', '/media/doc', NULL, NULL);
INSERT INTO `filestoretest`.`filestores` (`id`, `server_id`, `virtualdirectory`, `protocol`, `downloadport`, `uploadport`, `uploaduri`, `smbpath`, `datecreated`, `datemodified`) VALUES (7, 4, '/', 'mms', 554, NULL, NULL, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`resourcetypes`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (1, 'document', 'Adobe PDF', 'pdf.png', 'pdf-small');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (2, 'document', 'MS Excel Document', 'document.png', 'document-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (3, 'document', 'MS Word document', 'document.png', 'document-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (4, 'document', 'MS Power Point document', 'document.png', 'document-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (5, 'document', 'Text File', 'document.png', 'document-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (6, 'video', 'Windows Media Video', 'video.png', 'video-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (7, 'video', 'Flash Video', 'video.png', 'video-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (8, 'video', 'h.264 MP4 Video', 'video.png', 'video-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (9, 'video', 'h.264 MOV Video', 'video.png', 'video-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (10, 'livevideo', 'Live Flash Video Stream', 'livevideo.png', 'livevideo-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (11, 'livevideo', 'Live Windows Media Video Stream', 'livevideo.png', 'livevideo-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (12, 'url', 'Website', 'website.png', 'website-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (13, 'image', 'Image', 'image.png', 'image-small.png');
INSERT INTO `filestoretest`.`resourcetypes` (`id`, `basictype`, `description`, `thumb`, `thumbsmall`) VALUES (14, 'audio', 'Audio', 'audio.png', 'audio-small.png');

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`resourceobjects`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (1, 1, 1, 6, 'sample.wmv', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (2, 1, 2, 8, 'sample.mp4', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (3, 1, 3, 7, 'sample.flv', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (4, 2, 2, 8, 'dunks1080p.mp4', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (5, 2, 2, 8, 'dunks720p.mp4', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (6, 2, 1, 6, 'dunks.wmv', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (7, 3, 2, 8, 'hansel%20%26%20gretel.mp4', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (8, 3, 3, 8, 'hansel%20%26%20gretel.mp4', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (9, 4, 3, 1, 'bullfrogs.pdf', NULL, NULL);
INSERT INTO `filestoretest`.`resourceobjects` (`id`, `resource_id`, `filestore_id`, `resourcetype_id`, `uri`, `datecreated`, `datemodified`) VALUES (10, 5, 7, 11, 'hs-live', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `filestoretest`.`subnets`
-- -----------------------------------------------------
START TRANSACTION;
USE `filestoretest`;
INSERT INTO `filestoretest`.`subnets` (`id`, `location_id`, `iprangelow`, `iprangehigh`, `datecreated`, `datemodified`) VALUES (1, 1, '192.168.12.1', '192.168.12.254', NULL, NULL);
INSERT INTO `filestoretest`.`subnets` (`id`, `location_id`, `iprangelow`, `iprangehigh`, `datecreated`, `datemodified`) VALUES (2, 1, '192.168.13.1', '192.168.13.254', NULL, NULL);
INSERT INTO `filestoretest`.`subnets` (`id`, `location_id`, `iprangelow`, `iprangehigh`, `datecreated`, `datemodified`) VALUES (3, 2, '192.168.2.1', '192.168.2.254', NULL, NULL);
INSERT INTO `filestoretest`.`subnets` (`id`, `location_id`, `iprangelow`, `iprangehigh`, `datecreated`, `datemodified`) VALUES (4, 3, '192.168.21.1', '192.168.21.254', NULL, NULL);

COMMIT;
