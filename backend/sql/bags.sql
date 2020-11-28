bags = { id, user_id, product_id, amount, purchased, created_at, updated_at, excluded };

id int(11)
user_id int(11)
product_id int(11)
amount int(4)
purchased int(1)
created_at datetime
updated_at datetime
excluded int(1)

/* Structure of tabele `bags` */
CREATE TABLE `bags`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED,
  `product_id` INT(11) UNSIGNED,
  `amount` INT(4) NOT NULL,
  `purchased` INT(1) DEFAULT 0,
  `created_at` DATETIME,
  `updated_at` DATETIME,
  `excluded` INT(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_bags_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  CONSTRAINT `fk_bags_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
