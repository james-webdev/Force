-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2020 at 08:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `force`
--

--
-- Dumping data for table `activity_types`
--

INSERT INTO `activity_types` (`id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 'Phoned', NULL, NULL),
(2, 'Met', NULL, NULL),
(3, 'Relating', NULL, NULL),
(4, 'Discovery', NULL, NULL),
(5, 'Proposing', NULL, NULL),
(6, 'Supporting', NULL, NULL),
(7, 'EMailed', NULL, NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'James Roe', 'james@okospartners.com', NULL, 'qwert]iuyutwer', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Stephen Hamilton', 'hamilton@okospartners.com', NULL, 'oytrdesdfvbnm,.,mnbv', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Pete Krammer', 'krammer@okospartners.com', NULL, 'io\'i;uljghgfsagshdfgklg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'MaryLee Shalvoy', 'shalvoy@okospartners.com', NULL, 'qerwtyoiuiupuytykrhtegfwed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Ray Rice', 'ray@craneindustryservices.com', NULL, 'dqfewehrtyou\'pyukthrggfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;
