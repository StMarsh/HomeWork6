CREATE TABLE IF NOT EXISTS `#__student_list_table1` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`name_lastname` VARCHAR(255)  NOT NULL ,
`information` TEXT NOT NULL ,
`birthday` DATE NOT NULL DEFAULT '1986-01-01',
`gender` VARCHAR(255)  NOT NULL ,
`group` VARCHAR(255)  NOT NULL ,
`gpa` FLOAT(5)  NOT NULL ,
`number_of_academic_records` INT(10)  NOT NULL ,
`phone_number` INT(9)  NOT NULL ,
`photo` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;

