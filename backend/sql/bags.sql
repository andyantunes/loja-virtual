bags = { id, customer_id, product_id, amount, purchased, created_at, updated_at, active };

id int(11)
customer_id int(11)
product_id int(11)
amount int(4)
purchased int(1)
created_at datetime
updated_at datetime
active int(1)

/* Structure of tabele `bags` */
CREATE TABLE `bags`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) UNSIGNED,
  `product_id` INT(11) UNSIGNED,
  `amount` INT(4),
  `purchased` INT(1) DEFAULT 0,
  `created_at` DATETIME,
  `updated_at` DATETIME,
  `active` INT(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_bags_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`),
  CONSTRAINT `fk_bags_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
