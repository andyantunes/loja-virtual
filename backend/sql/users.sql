users = { id, full_name, email, password, avatar, created_at, updated_at, active };

id int(11)
full_name varchar(50)
email varchar(50) UNIQUE
password varchar(60)
avatar varchar(60)
created_at datetime
updated_at datetime
active int(1)

/* Structure of tabele `users` */
CREATE TABLE `users`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(50),
  `email` VARCHAR(50),
  `password` VARCHAR(60),
  `avatar` VARCHAR(60),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  `active` INT(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UNIQUE_EMAIL` (`email`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
