address = { id, customer_id, street, number, city, zip_code, uf, country, active };

id int(11)
customer_id int(11)
street varchar(100)
number int(6)
city varchar(100)
zip_code int(8)
uf varchar(2)
country varchar(50)
active int(1)

/* Structure of tabele `address` */
CREATE TABLE `address`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) UNSIGNED,
  `street` VARCHAR(100),
  `number` INT(6),
  `city` VARCHAR(100),
  `zip_code` INT(8),
  `uf` VARCHAR(2),
  `country` VARCHAR(50),
  `active` INT(1),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_address_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;

