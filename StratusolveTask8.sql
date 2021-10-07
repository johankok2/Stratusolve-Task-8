-- phpMyAdmin SQL Dump
-- MariaDB Server 10.7
-- Host: 127.0.0.1
-- PHP Version: 8.0.3

-- ------------------------------------------------------------------------------
--
-- Database structure for database: `stratusolvetask8`
--

CREATE DATABASE stratusolvetask8;
-- ------------------------------------------------------------------------------

--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `fname` varchar(200) DEFAULT NULL,
      `lname` varchar(200) DEFAULT NULL,
      `username` varchar(200) DEFAULT NULL UNIQUE,
      `email` varchar(300) DEFAULT NULL UNIQUE,
      `password` varchar(200) DEFAULT NULL,
      `date` date NOT NULL); 

-- ------------------------------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
      `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      `userid` int(11)NOT NULL,
      `post_text` varchar(2000) DEFAULT NULL,
      `post_time_stamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
       ON UPDATE CURRENT_TIMESTAMP NOT NULL,
      FOREIGN KEY (userid) REFERENCES `users`(id)); 

-- ------------------------------------------------------------------------------


