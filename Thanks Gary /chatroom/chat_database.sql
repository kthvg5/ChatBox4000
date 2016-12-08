-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 02:51 PM
-- Server version: 5.5.22
-- PHP Version: 5.4.1

--
-- Database: `chatbox`
--
-- Dropping better allows us to change stuff
-- quickly and easily.
DROP DATABASE IF EXISTS chatbox;


CREATE DATABASE IF NOT EXISTS `chatbox`;
USE `chatbox`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) unsigned NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `chat_text` varchar(500) NOT NULL,
  `chat_blob_file` longblob,
  `chat_blob_name` varchar(100) DEFAULT NULL,
  `chat_date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_request_to` int(10) unsigned NOT NULL,
  `session_request_from` int(10) unsigned NOT NULL,
  `session_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `session_stopped` tinyint(1) NOT NULL DEFAULT '0',
  `creation_date` timestamp NOT NULL DEFAULT '1970-01-01 00:00:01' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user_first` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user_last` varchar(30) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(64) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `user_level` enum('user','admin') CHARACTER SET utf8 NOT NULL,
  `user_logged_in` tinyint(1) NOT NULL DEFAULT '0',
  `user_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lastlogin` timestamp NOT NULL DEFAULT '1970-01-01 00:00:01',
  `user_last_activity` timestamp NOT NULL DEFAULT '1970-01-01 00:00:01',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

--
-- Table structure for table 'message'
-- added by Emma W @ 4:05 PM, 6 Dec 16

CREATE TABLE IF NOT EXISTS `message` (
  `msg_contents` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT ' ',
  `msg_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`msg_timestamp`, `user_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

