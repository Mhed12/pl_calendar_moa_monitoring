-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

-- ************************************** `events`

CREATE TABLE `events`
(
 `id`       tinyint NOT NULL AUTO_INCREMENT ,
 `events_name`     varchar(255) NOT NULL ,
 `venue`          varchar(255) NOT NULL ,
 `e_start_date`   date NOT NULL ,
 `e_start_time`   time NOT NULL ,
 `e_end_date`     date NOT NULL ,
 `e_end_time`     time NOT NULL ,
 `contact_person` varchar(255) NOT NULL ,

PRIMARY KEY (`id`)
);

-- ************************************** `log_input`

CREATE TABLE `loginput`
(
 `id`          tinyint NOT NULL ,
 `user_ID`        tinyint NOT NULL ,
 `event_ID`         tinyint NOT NULL ,
 `sched_timestamp` timestamp NOT NULL ,
 `status`          tinyint(1) NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_22` (`event_ID`),
CONSTRAINT `FK_22` FOREIGN KEY `fkIdx_22` (`event_ID`) REFERENCES `events` (`id`),
KEY `fkIdx_32` (`user_ID`),
CONSTRAINT `FK_32` FOREIGN KEY `fkIdx_32` (`user_ID`) REFERENCES `users` (`id`)
);

-- ************************************** `users`

CREATE TABLE `users`
(
 `id`           tinyint NOT NULL AUTO_INCREMENT ,
 `division_name`     varchar(255) NOT NULL ,
 `focal_f_name`      varchar(255) NOT NULL ,
 `focal_l_name`      varchar(255) NOT NULL ,
 `focal_contact_num` varchar(11) NOT NULL ,

PRIMARY KEY (`id`)
);





