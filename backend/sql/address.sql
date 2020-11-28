address = { id, customer_id, street, number, city, zip_code, uf, country };

id int(11)
customer_id int(11)
street varchar(100)
number int(6)
city varchar(100)
zip_code int(8)
uf varchar(2)
country varchar(50)

/* Structure of tabele `address` */
CREATE TABLE `address`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) UNSIGNED NOT NULL,
  `street` VARCHAR(100) NOT NULL,
  `number` INT(6) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `zip_code` INT(8) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `country` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_address_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;

