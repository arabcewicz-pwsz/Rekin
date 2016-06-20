-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2016 at 11:53 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rekinek`
--

-- --------------------------------------------------------



--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(1, 'Administrator', 'admin@admin.com', 'admin', 'Admin Address', '9800000000');

-- --------------------------------------------------------








--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `name`, `profile`, `teacher_name`) VALUES
(1, 'IA', 'informatyczno - matematyczny', 'Pan Nauczyciel'),
(2, 'IB', 'humanistyczno-prawny', 'Karol Kowalski'),
(3, 'IC', 'biologiczno-chemiczny', 'Mariusz Marecki'),
(4, 'ID', 'kulturowo-artystyczny', 'David Majewski'),
(5, 'IIA', 'informatyczno - matematyczny', 'Cezary Pazura'),
(6, 'IIB', 'humanistyczno-prawny', 'Katarzyna Pakosińska'),
(7, 'IIC', 'biologiczno-chemiczny', 'Dominika Walec'),
(8, 'IID', 'kulturowo-artystyczny', 'Kamil Reki'),
(9, 'IIIA', 'informatyczno - matematyczny', 'Zbigniew Dowbor'),
(10, 'IIIB', 'humanistyczno-prawny', 'Magda Gessler'),
(11, 'IIIC', 'biologiczno-chemiczny', 'Bartek Kasprzykowski'),
(12, 'IIID', 'kulturowo-artystyczny', 'Jakiś Koleś');


-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `subjects` (
  `subjects_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subjects_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjects_id`, `name`) VALUES
(1, 'matematyka'),
(2, 'język polski'),
(3, 'fizyka'),
(4, 'chemia'),
(5, 'biologia'),
(6, 'informatyka'),
(7, 'wychowanie fizyczne'),
(8, 'język angielski'),
(9, 'historia'),
(10, 'wychowanie fizyczne'),
(11, 'wiedza o kulturze'),
(12, 'geografia');


--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` longtext CHARACTER SET latin1 NOT NULL,
  `subject` longtext CHARACTER SET latin1 NOT NULL,
  `body` longtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `email_template`
--

CREATE TABLE IF NOT EXISTS `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`phrase_id`)
);





CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--




--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_from_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_from_id` int(11) NOT NULL,
  `user_to_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'Sprawdzian z Matmy', 'Klasa IIA przygotujcię się z działu 6', 1450998000),
(2, 'Przedstawienie', 'Wymagany strój galowy!!', 1453849200);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `email`, `password`, `address`, `phone`, subject) VALUES
(1, 'Pan Nauczyciel', 'teacher@teacher.com', 'teacher', 'Polska', '9800000000', 'matematyka'),
(2, 'Karol Kowalski', 'karol@teacher.com', 'teacher1', 'Polska', '9800000000', 'historia'),
(3, 'Mariusz Marecki', 'mariusz@teacher.com', 'teacher2', 'Polska', '9800000000', 'matematyka'),
(4, 'David Majewski', 'david@teacher.com', 'teacher3', 'Polska', '9800000000', 'biologia'),
(5, 'Cezary Pazura', 'cezary@teacher.com', 'teacher4', 'Polska', '9800000000', 'język polski'),
(6, 'Katarzyna Pakosińska', 'kasia@teacher.com', 'teacher5', 'Polska', '9800000000', 'język polski'),
(7, 'Dominika Walec', 'dominika@teacher.com', 'teacher6', 'Polska', '9800000000', 'wychowanie fizyczne'),
(8, 'Kamil Reki', 'kamil@teacher.com', 'teacher7', 'Polska', '9800000000', 'fizyka'),
(9, 'Zbigniew Dowbor', 'zbigniew@teacher.com', 'teacher8', 'Polska', '9800000000', 'wiedza o kulturze'),
(10, 'Magda Gessler', 'magda@teacher.com', 'teacher9', 'Polska', '9800000000', 'matematyka'),
(11, 'Bartek Kasprzykowski', 'bartek@teacher.com', 'teacher10', 'Polska', '9800000000', 'język angielski'),
(12, 'Jakiś Koleś', 'koles@teacher.com', 'teacher11', 'Polska', '9800000000', 'fizyka');
-- --------------------------------------------------------

--
-- Table structure for table `student`


CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `classes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_opening_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `password`, `address`, `phone`, `sex`, `birth_date`,  `classes`, `account_opening_timestamp`) VALUES
(1, 'Anurag Basu', 'student@student.com', 'student', 'Mumbai, India', '9800000000', 'male', '03/04/1991', 'IA', 1448984171);

-- --------------------------------------------------------





--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `grades_id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_timestamp` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `subjects_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`grades_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grades_id`, `creation_timestamp`, `teacher_id`, `student_id`, `subjects_id`, `mark_id`,`description`) VALUES
(1, 1448984647, 1, 1, 2, 7, 'klasówka z działu 7'),
(2, 1452125702, 1, 1, 8, 4, 'sprawdzian');

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



INSERT INTO `mark` (`mark_id`, `name`) VALUES
(1, '1'),
(2, '1+'),
(3, '2'),
(4, '2+'),
(5, '3'),
(6, '3+'),
(7, '4'),
(8, '4+'),
(9, '5'),
(10, '5+'),
(11, '6');


--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', '| Rekin - Twój wirtualny dziennik | 2016 |'),
(7, 'system_email', 'glrosebd@gmail.com'),
(2, 'system_title', 'Rekin - Twój wirtualny dziennik'),
(3, 'address', 'Polska'),
(4, 'phone', '9000090000');
