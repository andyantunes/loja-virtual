historic = { id, user_id, bags_id, purchased_at, active };

id int(11)
user_id int(11)
bags_id int(11)
purchased_at datetime
active int(1)

/* Structure of tabele `historic` */
CREATE TABLE `historic`(  
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED,
  `bags_id` INT(11) UNSIGNED,
  `purchased_at` DATETIME,
  `active` INT(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_historic_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  CONSTRAINT `fk_historic_bags` FOREIGN KEY (`bags_id`) REFERENCES `bags`(`id`)
) ENGINE=INNODB CHARSET=latin1 COLLATE=latin1_swedish_ci;
