sizes = { id, name };

id int(2)
name varchar(20)

/* Structure of tabele `sizes` */
CREATE TABLE `sizes`(  
  `id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
