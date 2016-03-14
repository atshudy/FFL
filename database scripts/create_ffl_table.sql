-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2014 at 02:14 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ffl`
--
DROP DATABASE IF EXISTS ffl;
CREATE DATABASE ffl;
USE ffl;

-- --------------------------------------------------------

--
-- Table structure for table `availablelineup`
--

CREATE TABLE IF NOT EXISTS `availablelineup` (
`availablelineupId` int(20) unsigned NOT NULL,
  `availableflag` int(10) NOT NULL,
  `teamId` int(10) NOT NULL,
  `playerId` int(20) NOT NULL,
  `playername` varchar(50) NOT NULL,
  `week1Total` int(10) NOT NULL,
  `week2Total` int(10) NOT NULL,
  `week3Total` int(10) NOT NULL,
  `week4Total` int(10) NOT NULL,
  `leagueId` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE IF NOT EXISTS `league` (
  `leagueId` int(20) NOT NULL,
  `adminname` varchar(20) DEFAULT NULL,
  `leaguename` varchar(50) NOT NULL,
  `numberOfTeams` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `college` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `position` varchar(10) NOT NULL,
  `team` varchar(10) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `jersey` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `playerId` varchar(10) NOT NULL,
  `rosterItem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scoringsettings`
--

CREATE TABLE IF NOT EXISTS `scoringsettings` (
  `pts_per_recpt` int(5) NOT NULL,
  `pts_per_recpt_yds` int(5) NOT NULL,
  `pts_per_pass_yrds` int(5) NOT NULL,
  `pts_per_pass_td` int(5) NOT NULL,
  `pts_per_rush_yrds` int(5) NOT NULL,
  `pts_per_rush_passing_td` int(5) NOT NULL,
  `pts_per_fumble` int(5) NOT NULL,
  `pts_per_sack` int(5) NOT NULL,
  `pts_per_intercept` int(5) NOT NULL,
  `pts_per_fumble_recover` int(5) NOT NULL,
  `pts_per_def_td` int(5) NOT NULL,
  `pts_per_safty` int(5) NOT NULL,
  `pts_per_return_td` int(5) NOT NULL,
  `pts_per_return_yrds` int(5) NOT NULL,
  `pts_per_extra_pt` int(5) NOT NULL,
  `pts_per_field_goal_0_20` int(5) NOT NULL,
  `pts_per_field_goal_20_30` int(5) NOT NULL,
  `pts_per_field_goal_30_40` int(5) NOT NULL,
  `pts_per_field_goal_50` int(5) NOT NULL,
  `leagueId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `startinglineup`
--

CREATE TABLE IF NOT EXISTS `startinglineup` (
`startinglineupId` int(20) unsigned NOT NULL,
  `selectedflag` int(10) NOT NULL,
  `teamId` int(10) NOT NULL,
  `playerId` int(20) NOT NULL,
  `playername` varchar(50) NOT NULL,
  `week1Total` int(10) NOT NULL,
  `week2Total` int(10) NOT NULL,
  `week3Total` int(10) NOT NULL,
  `week4Total` int(10) NOT NULL,
  `leagueId` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `teamId` int(20) NOT NULL,
  `leagueId` int(20) NOT NULL,
  `week1score` int(10) NOT NULL,
  `week2score` int(10) NOT NULL,
  `week3score` int(10) NOT NULL,
  `week4score` int(10) NOT NULL,
  `teamname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(25) NOT NULL,
  `leagueId` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `teamname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availablelineup`
--
ALTER TABLE `availablelineup`
 ADD PRIMARY KEY (`availablelineupId`);

--
-- Indexes for table `league`
--
ALTER TABLE `league`
 ADD PRIMARY KEY (`leagueId`), ADD UNIQUE KEY `leaguename` (`leaguename`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
 ADD UNIQUE KEY `playerId` (`playerId`);

--
-- Indexes for table `scoringsettings`
--
ALTER TABLE `scoringsettings`
 ADD PRIMARY KEY (`leagueId`);

--
-- Indexes for table `startinglineup`
--
ALTER TABLE `startinglineup`
 ADD PRIMARY KEY (`startinglineupId`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`teamId`), ADD UNIQUE KEY `userId` (`leagueId`,`teamname`), ADD UNIQUE KEY `teamId` (`teamId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userId`), ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availablelineup`
--
ALTER TABLE `availablelineup`
MODIFY `availablelineupId` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `startinglineup`
--
ALTER TABLE `startinglineup`
MODIFY `startinglineupId` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
