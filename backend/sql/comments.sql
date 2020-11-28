comments = { id, user_id, customer_id, product_id, content, created_at, likes, dislikes, rating, excluded };

id int(11)
user_id int(11)
customer_id int(11)
product_id int(11)
content text
created_at datetime
likes int(4)
dislikes int(4)
rating float(3)
excluded int(1)

/* Structure of tabele `comments` */
CREATE TABLE `comments`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED DEFAULT NULL,
  `customer_id` INT(11) UNSIGNED DEFAULT NULL,
  `product_id` INT(11) UNSIGNED,
  `content` TEXT NOT NULL,
  `created_at` DATETIME,
  `likes` INT(4) DEFAULT 0,
  `dislikes` INT(4) DEFAULT 0,
  `rating` FLOAT(3) DEFAULT 0,
  `excluded` INT(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  CONSTRAINT `fk_comments_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`),
  CONSTRAINT `fk_comments_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;


