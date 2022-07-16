CREATE TABLE `s102088859_db`.`attempts` ( 
    `attempt_id` INT NOT NULL AUTO_INCREMENT , 
    `date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `firstname` VARCHAR(30) NOT NULL , 
    `lastname` VARCHAR(30) NOT NULL , 
    `studentID` INT(10) NOT NULL , 
    `num_attempt` INT NOT NULL , 
    `score_attempt` INT NOT NULL , 
    PRIMARY KEY (`attempt_id`)) 
ENGINE = InnoDB;