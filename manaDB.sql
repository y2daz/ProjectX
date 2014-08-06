-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2014 at 02:10 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `manaDB`
--
CREATE DATABASE IF NOT EXISTS `manaDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `manaDB`;

CREATE USER 'manaSystem'@'localhost' IDENTIFIED BY 'SMevHZxMEJVfv4Kc';

use manaDB;

CREATE TABLE User(
	userEmail varchar(50) primary key,
    userPassword varchar(50)
);

Use manaDB;

INSERT INTO User values ('y', (SELECT PASSWORD('a'))); 


