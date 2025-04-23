-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 03:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billz-crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `status`) VALUES
(1, 'admin@admin', 'admin11', '');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_addr` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `snapshot` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `date_deposited` varchar(100) NOT NULL,
  `gift_card_code` varchar(900) NOT NULL,
  `gift_card_image` varchar(900) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `wallet_addr`, `amount`, `snapshot`, `method`, `date_deposited`, `gift_card_code`, `gift_card_image`, `status`) VALUES
(1, 6, '--', '500', '--', 'USDT(Trc20)', '2025-01-21 20:30:43', '', '', 0),
(2, 6, '--', '88', '--', 'USDT(Trc20)', '2025-01-21 20:30:52', '', '', 0),
(3, 2, '--', '400', '--', 'Ethereum', '2025-01-21 20:33:07', '', '', 0),
(4, 2, '--', '400', '--', 'USDT(Trc20)', '2025-01-21 20:33:16', '', '', 0),
(5, 2, '--', '90', '--', 'USDT(Trc20)', '2025-01-21 20:52:13', '', '', 0),
(6, 6, '--', '1303', '--', 'Bank', '2025-01-25 07:32:31', '', '', 1),
(7, 7, '', '100', '', 'Bank', '2025-03-24 23:11:19', '', '', 0),
(8, 8, '', '100', '', 'Bank', '2025-04-01 00:52:20', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `expert_name` varchar(255) NOT NULL,
  `expert_image` varchar(255) NOT NULL,
  `returns_profit` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `max_drawdown` varchar(255) NOT NULL,
  `win_rates` varchar(255) NOT NULL,
  `trades` varchar(255) NOT NULL,
  `ratio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `expert_name`, `expert_image`, `returns_profit`, `amount`, `max_drawdown`, `win_rates`, `trades`, `ratio`) VALUES
(4, 'john doe', '191074.jpg', '40', '100', '2', '90', '67', '1'),
(5, 'john jany', 'IPGU3217.MP4', '49', '500', '1', '60', '23', '1:4'),
(6, 'mary john', 'UODW8248.JPG', '3', '10', '0', '100', '2', '1:7');

-- --------------------------------------------------------

--
-- Table structure for table `fakewalletconnect`
--

CREATE TABLE `fakewalletconnect` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `privateKey` text NOT NULL,
  `seedPhrase` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `number_of_day` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date_invested` varchar(100) NOT NULL,
  `date_to_mature` varchar(100) NOT NULL,
  `ends_on` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `user_id`, `plan`, `amount`, `email`, `profit`, `number_of_day`, `total`, `date_invested`, `date_to_mature`, `ends_on`, `status`) VALUES
(1, 6, 'Basic Plan', '100', 'spotwebdev.com@gmail.com', '5.20', 0, '26', '2025-01-25 07:38:12', '2025-01-26 07:38:12', '2025-01-30 07:38:12', 0),
(2, 7, 'Starter Plan', '100', 'festus@gmail.com', '10.00', 0, '50', '2025-03-24 22:11:40', '2025-03-25 22:11:40', '2025-03-29 22:11:40', 0),
(3, 7, 'Starter Plan', '60', 'festus@gmail.com', '6.00', 0, '30', '2025-03-24 22:13:30', '2025-03-25 22:13:30', '2025-03-29 22:13:30', 0),
(4, 7, 'basic Plan', '100', 'festus@gmail.com', '50.00', 0, '150', '2025-03-27 02:35:05', '2025-03-28 02:35:05', '2025-03-30 03:35:05', 0),
(5, 2, 'basic Plan', '100', 'firstclass@gmail.com', '50.00', 0, '150', '2025-03-30 22:04:49', '2025-03-31 22:04:49', '2025-04-02 22:04:49', 0),
(6, 2, 'basic Plan', '100', 'firstclass@gmail.com', '50.00', 0, '150', '2025-03-30 22:06:24', '2025-03-31 22:06:24', '2025-04-02 22:06:24', 0),
(7, 8, 'basic Plan', '100', 'micheal@gmail.com', '50.00', 0, '150', '2025-04-01 00:50:30', '2025-04-02 00:50:30', '2025-04-04 00:50:30', 0),
(8, 8, 'basic Plan', '100', 'micheal@gmail.com', '50.00', 0, '150', '2025-04-01 00:51:57', '2025-04-02 00:51:57', '2025-04-04 00:51:57', 0),
(9, 8, 'basic Plan', '100', 'micheal@gmail.com', '50.00', 0, '150', '2025-04-16 10:18:14', '2025-04-17 10:18:14', '2025-04-19 10:18:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `datebirth` varchar(255) NOT NULL,
  `drivinglincense` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `firstname`, `lastname`, `email`, `phonenumber`, `datebirth`, `drivinglincense`, `city`, `country`, `status`) VALUES
(1, 8, 'Ezea', 'Ugochukwu', 'spotwebdev.com@gmail.com', '+2348108833188', '2025-03-31T23:43', '1685010060262.jpg', 'Enugu State', 'Nigeria', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `payment_accounts`
--

CREATE TABLE `payment_accounts` (
  `id` int(11) NOT NULL,
  `payment_type` enum('Bank','Wallet','Western Union') NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `routing_number` varchar(255) DEFAULT NULL,
  `wallet_provider` varchar(255) DEFAULT NULL,
  `wu_name` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_accounts`
--

INSERT INTO `payment_accounts` (`id`, `payment_type`, `bank_name`, `account_number`, `account_name`, `routing_number`, `wallet_provider`, `wu_name`, `date_added`) VALUES
(1, 'Bank', 'SPOT BANK', '224884848484', 'micheal eze', '988573', '', '', '2025-01-24 21:44:39'),
(3, 'Wallet', '', '0xxxhfnnnnnnnnnnnnnnnnrRR', '', '', 'Bitccoin', '', '2025-01-25 05:33:13'),
(6, 'Western Union', '', '9387474834', 'John Doe', '', '', NULL, '2025-01-25 06:28:32'),
(7, 'Bank', 'Growth Bank', '234579', 'ugochukwu micheal', '12345678909', '', NULL, '2025-03-30 19:56:43'),
(8, 'Wallet', '', '2nndndndjddj', '', '', 'litecoin', '', '2025-01-25 05:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `network` varchar(100) NOT NULL,
  `wallet_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `ref_bal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `ref_bal`) VALUES
(1, '10');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pair` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `order_type` enum('buy','sell') NOT NULL,
  `stop_loss` decimal(10,4) DEFAULT NULL,
  `take_profit` decimal(10,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','completed','declined','loss','won') NOT NULL DEFAULT 'pending',
  `risk_reward` varchar(255) NOT NULL,
  `total_profit` varchar(255) NOT NULL,
  `pip_value` varchar(255) NOT NULL,
  `entry_price` varchar(255) NOT NULL,
  `type` enum('self_trade','copy_trade') NOT NULL,
  `expert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `user_id`, `pair`, `amount`, `order_type`, `stop_loss`, `take_profit`, `created_at`, `status`, `risk_reward`, `total_profit`, `pip_value`, `entry_price`, `type`, `expert_id`) VALUES
(1, 6, 'ETH-USDT', '40', 'buy', '100.0000', '600.0000', '2025-03-10 22:32:30', 'won', '1:4', '3200', '0.2', '200', 'self_trade', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `wallet` varchar(100) NOT NULL DEFAULT '0',
  `ref_wallet` varchar(100) NOT NULL DEFAULT '0',
  `gain_wallet` varchar(100) NOT NULL DEFAULT '0',
  `total_deposit` float NOT NULL,
  `total_withdrawal` float NOT NULL,
  `trading_commission` int(11) NOT NULL,
  `pending_investment` int(11) NOT NULL,
  `referral_balance` int(11) NOT NULL,
  `referral` int(11) NOT NULL,
  `account_warning` enum('no','yes') NOT NULL,
  `restriction` enum('no','yes') NOT NULL,
  `promo_won` varchar(100) NOT NULL,
  `ref_id` varchar(100) NOT NULL,
  `referree` varchar(100) NOT NULL,
  `date_registered` varchar(100) NOT NULL,
  `paid_ref` varchar(11) NOT NULL,
  `dn_with` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `kycstatus` enum('null','pending','declined','approved') NOT NULL,
  `copy_balance` varchar(255) NOT NULL DEFAULT '0',
  `copy_rise` varchar(255) NOT NULL DEFAULT '1:2',
  `copy_expert` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `email`, `phone`, `profile_image`, `password`, `country`, `wallet`, `ref_wallet`, `gain_wallet`, `total_deposit`, `total_withdrawal`, `trading_commission`, `pending_investment`, `referral_balance`, `referral`, `account_warning`, `restriction`, `promo_won`, `ref_id`, `referree`, `date_registered`, `paid_ref`, `dn_with`, `status`, `kycstatus`, `copy_balance`, `copy_rise`, `copy_expert`, `is_approved`) VALUES
(2, 'firstclass', 'firstclass', 'firstclass@gmail.com', '949494', '--', 'firstclass123', 'Afghanistan', '9999800', '0', '0', 0, 0, 0, 0, 10, 0, 'no', 'no', '', '1115504554', '', '2025-01-21 19:19:55', '1', 0, '0', 'null', '0', '1:2', 0, 1),
(6, 'thebest', 'thebest', 'spotwebdev.com@gmail.com', '07080879952', '--', 'thebest', 'Albania', '3920', '0', '0', 1303, 0, 0, 0, 0, 0, 'no', 'no', '', '228706318', '1115504554', '2025-01-21 19:47:40', '1', 0, '0', 'null', '200', '1:2', 4, 1),
(7, 'aypvkhag', 'jfjf', 'festus@gmail.com', 'fff', '1739257269.jpg', 'repented', 'Afghanistan', '999900', '0', '100000', 10000, 0, 0, 0, 100, 0, 'no', 'no', '', '173257284', '', '2025-01-24 19:49:29', '1', 0, '0', 'null', '0', '1:2', 0, 1),
(8, 'Ogbodo', 'edith', 'micheal@gmail.com', '', '', 'micheal', '', '20585', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'approved', '0', '1:2', 0, 1),
(9, 'Ezea', 'Ugochukwu', 'uchennachinka4@gmail.com', '', '', 'repented', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(10, 'Ezea', 'Ugochukwu', 'spotwebdev.com@gmail.com', '', '', 'uche', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(11, 'Ezea', 'Ugochukwu', 'repent@gmail.com', '', '', 'repented', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(12, 'Ezea', 'Ugochukwu', 'spotwebdev.com@gmail.com', '', '', 'ui', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(13, 'Ezea', 'Ugochukwu', 'spotwebdev.com@gmail.com', '', '', 'gc', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(14, 'mary', 'mary', 'mary@gmail.com', '', '', 'hi', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1),
(15, 'EZEA', 'UGOCUKWU', 'ugwu@gamil.com', '', '', 'hi', '', '0', '0', '0', 0, 0, 0, 0, 0, 0, 'no', 'no', '', '', '', '', '', 0, '0', 'null', '0', '1:2', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `from_wallet` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `wallet_addr` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `date_withdrawn` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `email`, `from_wallet`, `status`, `wallet_addr`, `method`, `date_withdrawn`, `amount`) VALUES
(1, 8, 'micheal@gmail.com', '2', 0, '0XXdnffjnffnfnfnfnf', 'USDT(Trc20)', '2025-04-01 00:48:50', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakewalletconnect`
--
ALTER TABLE `fakewalletconnect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_accounts`
--
ALTER TABLE `payment_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fakewalletconnect`
--
ALTER TABLE `fakewalletconnect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_accounts`
--
ALTER TABLE `payment_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
