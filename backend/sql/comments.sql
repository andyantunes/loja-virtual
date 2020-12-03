comments = { id, user_id, product_id, content, created_at, likes, dislikes, rating, is_customer, active };

id int(11)
user_id int(11)
product_id int(11)
content text
created_at datetime
likes int(4)
dislikes int(4)
rating float(3)
is_customer int(1)
active int(1)

/* Structure of tabele `comments` */
CREATE TABLE `comments`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `product_id` INT(11) UNSIGNED,
  `content` TEXT,
  `created_at` DATETIME,
  `likes` INT(4) DEFAULT 0,
  `dislikes` INT(4) DEFAULT 0,
  `rating` FLOAT(3) DEFAULT 0,
  `is_customer` int(1),
  `active` INT(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_comments_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;


