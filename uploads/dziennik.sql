



SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- Database: `rekinek`


DROP TABLE IF EXISTS `admin`;

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



DROP TABLE IF EXISTS `classes`;

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



DROP TABLE IF EXISTS `subjects`;

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjects_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subjects_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;





DROP TABLE IF EXISTS `email_template`;

CREATE TABLE IF NOT EXISTS `email_template` (

  `email_template_id` int(11) NOT NULL auto_increment,

  `task` longtext character set latin1 NOT NULL,

  `subject` longtext character set latin1 NOT NULL,

  `body` longtext character set latin1 NOT NULL,

  PRIMARY KEY  (`email_template_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;



DROP TABLE IF EXISTS `language`;

CREATE TABLE IF NOT EXISTS `language` (

  `phrase_id` int(11) NOT NULL auto_increment,

  `phrase` longtext collate utf8_unicode_ci NOT NULL,

  `english` longtext collate utf8_unicode_ci NOT NULL,

  `polski` longtext collate utf8_unicode_ci NOT NULL,

  

  PRIMARY KEY  (`phrase_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=234 ;



DROP TABLE IF EXISTS `log`;

CREATE TABLE IF NOT EXISTS `log` (

  `log_id` int(11) NOT NULL auto_increment,

  `type` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  `timestamp` int(11) NOT NULL,

  `user_type` int(11) NOT NULL,

  `user_id` int(11) NOT NULL,

  `description` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  `ip` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  `location` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  PRIMARY KEY  (`log_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;




DROP TABLE IF EXISTS `message`;

CREATE TABLE IF NOT EXISTS `message` (

  `message_id` int(11) NOT NULL,

  `message` longtext collate utf8_unicode_ci NOT NULL,

  `user_from_type` longtext collate utf8_unicode_ci NOT NULL,

  `user_from_id` int(11) NOT NULL,

  `user_to_type` longtext collate utf8_unicode_ci NOT NULL,

  `user_type_id` int(11) NOT NULL,

  `timestamp` longtext collate utf8_unicode_ci NOT NULL,

  PRIMARY KEY  (`message_id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






DROP TABLE IF EXISTS `noticeboard`;

CREATE TABLE IF NOT EXISTS `noticeboard` (

  `notice_id` int(11) NOT NULL auto_increment,

  `notice_title` longtext collate utf8_unicode_ci NOT NULL,

  `notice` longtext collate utf8_unicode_ci NOT NULL,

  `create_timestamp` int(11) NOT NULL,

  PRIMARY KEY  (`notice_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;




DROP TABLE IF EXISTS `teacher`;

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





DROP TABLE IF EXISTS `student`;

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



-



DROP TABLE IF EXISTS `grades`;

CREATE TABLE IF NOT EXISTS `grades` (
  `grades_id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_timestamp` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`grades_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;






DROP TABLE IF EXISTS `settings`;

CREATE TABLE IF NOT EXISTS `settings` (

  `settings_id` int(11) NOT NULL auto_increment,

  `type` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  `description` longtext character set utf8 collate utf8_unicode_ci NOT NULL,

  PRIMARY KEY  (`settings_id`)

) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;





INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES

(1, 'system_name', ''),

(7, 'system_email', ''),

(2, 'system_title', ''),

(3, 'address', ''),

(4, 'phone', ''),

(5, 'paypal_email', ''),

(6, 'currency', '');