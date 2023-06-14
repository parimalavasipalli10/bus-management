create database bus_management;
use bus_management;
CREATE TABLE `bus_management`.`admin` ( 
	`username` TEXT NOT NULL , 
	`password` TEXT NOT NULL 
) ENGINE = InnoDB;
INSERT INTO `admin` (`username`, `password`) VALUES ('PARIMALA', 'pari@123');
create table staff(name varchar(50),
				   mob_num varchar(10),
				   aadhar_num varchar(12),
				   date_of_birth date,
				   age int,
				   license_num varchar(13),
				   aadhar varchar(50),
				   license varchar(50),
				   photo varchar(50)
);
CREATE TABLE `bus_management`.`student_reject` ( 
	`Reg_no` TEXT NOT NULL , 
	PRIMARY KEY (`Reg_no`(12))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`student_requests` ( 
	`Reg_no` TEXT NOT NULL , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`gender` TEXT NOT NULL , 
	`date_of_birth` DATE NOT NULL ,
	`year` TEXT NOT NULL , 
	`department` TEXT NOT NULL , 
	`father_name` TEXT NOT NULL , 
	`mother_name` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`email` TEXT NOT NULL , 
	`password` TEXT NOT NULL , 
	`fee_status` TEXT NOT NULL , 
	`fee_receipt` TEXT NOT NULL , 
	`photo` TEXT NOT NULL ,
	PRIMARY KEY (`Reg_no`(12))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`student` ( 
	`Reg_no` TEXT NOT NULL , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`gender` TEXT NOT NULL , 
	`date_of_birth` DATE NOT NULL ,
	`year` TEXT NOT NULL , 
	`department` TEXT NOT NULL , 
	`father_name` TEXT NOT NULL , 
	`mother_name` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`email` TEXT NOT NULL , 
	`password` TEXT NOT NULL , 
	`fee_status` TEXT NOT NULL , 
	`fee_receipt` TEXT NOT NULL , 
	`photo` TEXT NOT NULL ,
	`bus` TEXT NOT NULL ,
	PRIMARY KEY (`Reg_no`(12))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`faculty_requests` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`gender` TEXT NOT NULL , 
	`date_of_birth` DATE NOT NULL , 
	`department` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`email` TEXT NOT NULL , 
	`password` TEXT NOT NULL ,
	`photo` TEXT NOT NULL ,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`faculty` ( 
	`id` INT NOT NULL , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`gender` TEXT NOT NULL , 
	`date_of_birth` DATE NOT NULL , 
	`department` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`email` TEXT NOT NULL , 
	`password` TEXT NOT NULL , 
	`photo` TEXT NOT NULL ,
	`bus` TEXT NOT NULL ,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`faculty_reject` ( 
	`id` TEXT NOT NULL , 
	`email` TEXT NOT NULL 
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`bus_registration` ( 
	`id` TEXT NOT NULL , 
	`driver_name` TEXT NOT NULL , 
	`incharge_name` TEXT NOT NULL , 
	`number` TEXT NOT NULL , 
	`route` TEXT NOT NULL , 
	`seats` TEXT NOT NULL , 
	PRIMARY KEY (`id`(1))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`complaint` ( 
	`user` TEXT NOT NULL , 
	`about` TEXT NOT NULL,
	`role` TEXT NOT NULL,
	PRIMARY KEY (`user`(50))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`routes` ( 
	`bus` TEXT NOT NULL , 
	`route` TEXT NOT NULL 
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`student_update` ( 
	`Reg_no` TEXT NOT NULL , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`year` INT NOT NULL , 
	`address` TEXT NOT NULL ,
	`fee_status` TEXT NOT NULL , 	
	`fee_receipt` TEXT NOT NULL , 
	PRIMARY KEY (`Reg_no`(12))
) ENGINE = InnoDB;
CREATE TABLE `bus_management`.`faculty_update` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`first_name` TEXT NOT NULL , 
	`last_name` TEXT NOT NULL , 
	`contact` TEXT NOT NULL , 
	`email` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;