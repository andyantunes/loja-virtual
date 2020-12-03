products = { id, name, image, description, category, price, genre, featured, size_id, amount, 
            created_at, updated_at, excluded };

id int(11)
name varchar(50)
image varchar(100)
description text
category varchar(50)
price float(8)
genre varchar(20)
featured int(1)
size_id int(2)
amount int(10)
created_at datetime
updated_at datetime
excluded int(1)

/* Structure of tabele `products` */
CREATE TABLE `products`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50),
  `image` VARCHAR(100),
  `description` TEXT,
  `category` VARCHAR(50),
  `price` FLOAT(8),
  `genre` VARCHAR(20),
  `featured` INT(1) DEFAULT 0,
  `size_id` INT(2) UNSIGNED,
  `amount` INT(10) DEFAULT 0,
  `created_at` DATETIME,
  `updated_at` DATETIME,
  `excluded` INT(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_products_size` FOREIGN KEY (`size_id`) REFERENCES `sizes`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
