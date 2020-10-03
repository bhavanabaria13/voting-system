-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 04:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votes_today`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminsetting`
--

CREATE TABLE `adminsetting` (
  `id` int(11) NOT NULL,
  `mainContractAddress` varchar(50) NOT NULL,
  `mainContractABI` text NOT NULL,
  `ethPiceInUsd` float NOT NULL,
  `tronPriceInUSD` varchar(10) NOT NULL,
  `gasPriceFast` float NOT NULL,
  `gasPriceAverage` float NOT NULL,
  `project_year` date DEFAULT NULL,
  `siteName` varchar(255) NOT NULL,
  `siteURL` varchar(255) NOT NULL,
  `etherscanAddressMain` varchar(255) NOT NULL,
  `etherscanAddressTestnet` varchar(255) NOT NULL,
  `etherscanTxMain` varchar(255) NOT NULL,
  `etherscanTxTestnet` varchar(255) NOT NULL,
  `cronAPImainnet` varchar(200) NOT NULL,
  `cronAPItestnet` varchar(200) NOT NULL,
  `infuraAPIMainnet` varchar(255) NOT NULL,
  `infuraAPITestnet` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL COMMENT '0 = TestNet, 1 = Mainnet',
  `siteNetworkId` varchar(255) NOT NULL,
  `defaultLanguage` varchar(255) NOT NULL,
  `last_block_number` varchar(255) NOT NULL,
  `participants_earning_eth` varchar(255) NOT NULL,
  `last_timestamp1` varchar(255) DEFAULT NULL,
  `lastfingerprint` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminsetting`
--

INSERT INTO `adminsetting` (`id`, `mainContractAddress`, `mainContractABI`, `ethPiceInUsd`, `tronPriceInUSD`, `gasPriceFast`, `gasPriceAverage`, `project_year`, `siteName`, `siteURL`, `etherscanAddressMain`, `etherscanAddressTestnet`, `etherscanTxMain`, `etherscanTxTestnet`, `cronAPImainnet`, `cronAPItestnet`, `infuraAPIMainnet`, `infuraAPITestnet`, `network`, `siteNetworkId`, `defaultLanguage`, `last_block_number`, `participants_earning_eth`, `last_timestamp1`, `lastfingerprint`) VALUES
(1, 'TWEcWacKpJFgHgbKnsYZ1PYzjQ3rYfvUn8', '[{\"inputs\":[{\"internalType\":\"address\",\"name\":\"ownerAddress\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"nonpayable\",\"type\":\"constructor\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"receiver\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"from\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"MissedEthReceive\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"user\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"referrer\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"place\",\"type\":\"uint8\"}],\"name\":\"NewUserPlace\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"user\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"referrer\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"uint256\",\"name\":\"userId\",\"type\":\"uint256\"},{\"indexed\":false,\"internalType\":\"uint256\",\"name\":\"referrerId\",\"type\":\"uint256\"}],\"name\":\"Registration\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"user\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"currentReferrer\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"caller\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"Reinvest\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"from\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"receiver\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"SentExtraEthDividends\",\"type\":\"event\"},{\"anonymous\":false,\"inputs\":[{\"indexed\":true,\"internalType\":\"address\",\"name\":\"user\",\"type\":\"address\"},{\"indexed\":true,\"internalType\":\"address\",\"name\":\"referrer\",\"type\":\"address\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"indexed\":false,\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"Upgrade\",\"type\":\"event\"},{\"payable\":true,\"stateMutability\":\"payable\",\"type\":\"fallback\"},{\"constant\":true,\"inputs\":[],\"name\":\"LAST_LEVEL\",\"outputs\":[{\"internalType\":\"uint8\",\"name\":\"\",\"type\":\"uint8\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"name\":\"balances\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":false,\"inputs\":[{\"internalType\":\"uint8\",\"name\":\"matrix\",\"type\":\"uint8\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"buyNewLevel\",\"outputs\":[],\"payable\":true,\"stateMutability\":\"payable\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"findFreeX3Referrer\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"findFreeX6Referrer\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"name\":\"idToAddress\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"user\",\"type\":\"address\"}],\"name\":\"isUserExists\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[],\"name\":\"lastUserId\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"uint8\",\"name\":\"\",\"type\":\"uint8\"}],\"name\":\"levelPrice\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[],\"name\":\"owner\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":false,\"inputs\":[{\"internalType\":\"address\",\"name\":\"referrerAddress\",\"type\":\"address\"}],\"name\":\"registrationExt\",\"outputs\":[],\"payable\":true,\"stateMutability\":\"payable\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"uint256\",\"name\":\"\",\"type\":\"uint256\"}],\"name\":\"userIds\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"name\":\"users\",\"outputs\":[{\"internalType\":\"uint256\",\"name\":\"id\",\"type\":\"uint256\"},{\"internalType\":\"address\",\"name\":\"referrer\",\"type\":\"address\"},{\"internalType\":\"uint256\",\"name\":\"partnersCount\",\"type\":\"uint256\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"usersActiveX3Levels\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"usersActiveX6Levels\",\"outputs\":[{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"usersX3Matrix\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"},{\"internalType\":\"address[]\",\"name\":\"\",\"type\":\"address[]\"},{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"},{\"constant\":true,\"inputs\":[{\"internalType\":\"address\",\"name\":\"userAddress\",\"type\":\"address\"},{\"internalType\":\"uint8\",\"name\":\"level\",\"type\":\"uint8\"}],\"name\":\"usersX6Matrix\",\"outputs\":[{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"},{\"internalType\":\"address[]\",\"name\":\"\",\"type\":\"address[]\"},{\"internalType\":\"address[]\",\"name\":\"\",\"type\":\"address[]\"},{\"internalType\":\"bool\",\"name\":\"\",\"type\":\"bool\"},{\"internalType\":\"address\",\"name\":\"\",\"type\":\"address\"}],\"payable\":false,\"stateMutability\":\"view\",\"type\":\"function\"}]', 319.5, '0.03209156', 83, 74, NULL, 'Voting System', 'http://localhost/votes_today/', 'https://tronscan.org/#/address/', 'https://shasta.tronscan.org/#/address/', 'https://tronscan.org/#/transaction/', 'https://shasta.tronscan.org/#/transaction/', '', '', '', '', '1', '', '', '0', '969488100000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caturl` varchar(255) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `slug`, `image`, `caturl`, `status`, `created`) VALUES
(1, 'technology', 'technology', '', '', 1, '2020-09-02'),
(2, 'general', 'general', '', '', 1, '2020-09-02'),
(3, 'computer', 'computer', '', '', 1, '2020-09-02'),
(4, 'games', 'games', '', '', 1, '2020-09-02'),
(5, 'news', 'news', '', '', 1, '2020-09-02'),
(6, 'Science', 'Science', '', '', 1, '2020-09-02'),
(7, 'Kids and Teens', 'Kids-and-teens', '', '', 1, '2020-09-02'),
(8, 'Reference', 'Reference', '', '', 1, '2020-09-02'),
(9, 'Dating', 'Dating', '', '', 1, '2020-09-02'),
(10, 'Shopping', 'Shopping', '', '', 1, '2020-09-02'),
(11, 'Business', 'Business', '', '', 1, '2020-09-02'),
(12, 'Health', 'Health', '', '', 1, '2020-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `catid` int(11) DEFAULT NULL,
  `proposalid` int(11) DEFAULT NULL,
  `comments` text,
  `created` int(15) DEFAULT NULL,
  `updated` int(15) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `forsageuserid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `catid`, `proposalid`, `comments`, `created`, `updated`, `userid`, `forsageuserid`) VALUES
(1, 1, 1, 'After on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\n', 1600992000, 0, 1, 1),
(2, 1, 1, 'After on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\nAfter on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\nAfter on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\nAfter on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\n\n', 1600992000, 0, 1, 1),
(3, 1, 1, 'After on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\nAfter on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\nAfter on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.\n\n', 1601660009, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forsage_event_reglevel`
--

CREATE TABLE `forsage_event_reglevel` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `userWallet` varchar(50) DEFAULT NULL,
  `userWalletBase58` varchar(100) NOT NULL,
  `referrerID` int(11) DEFAULT NULL,
  `referrerWallet` varchar(255) DEFAULT NULL,
  `originalReferrer` int(11) DEFAULT NULL,
  `timestamp` int(15) DEFAULT NULL,
  `partners_in_structure` int(11) NOT NULL DEFAULT '0',
  `structure_status` int(11) NOT NULL DEFAULT '0',
  `x3_higher_downline_level` int(11) NOT NULL DEFAULT '0',
  `x6_higher_downline_level` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_1` int(11) DEFAULT '0',
  `x3_current_cycle_level_2` int(11) DEFAULT '0',
  `x3_current_cycle_level_3` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_4` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_5` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_6` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_7` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_8` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_9` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_10` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_11` int(11) NOT NULL DEFAULT '0',
  `x3_current_cycle_level_12` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_1` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_2` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_3` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_4` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_5` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_6` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_7` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_8` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_9` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_10` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_11` int(11) NOT NULL DEFAULT '0',
  `x6_current_cycle_level_12` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forsage_event_reglevel`
--

INSERT INTO `forsage_event_reglevel` (`id`, `userID`, `userWallet`, `userWalletBase58`, `referrerID`, `referrerWallet`, `originalReferrer`, `timestamp`, `partners_in_structure`, `structure_status`, `x3_higher_downline_level`, `x6_higher_downline_level`, `x3_current_cycle_level_1`, `x3_current_cycle_level_2`, `x3_current_cycle_level_3`, `x3_current_cycle_level_4`, `x3_current_cycle_level_5`, `x3_current_cycle_level_6`, `x3_current_cycle_level_7`, `x3_current_cycle_level_8`, `x3_current_cycle_level_9`, `x3_current_cycle_level_10`, `x3_current_cycle_level_11`, `x3_current_cycle_level_12`, `x6_current_cycle_level_1`, `x6_current_cycle_level_2`, `x6_current_cycle_level_3`, `x6_current_cycle_level_4`, `x6_current_cycle_level_5`, `x6_current_cycle_level_6`, `x6_current_cycle_level_7`, `x6_current_cycle_level_8`, `x6_current_cycle_level_9`, `x6_current_cycle_level_10`, `x6_current_cycle_level_11`, `x6_current_cycle_level_12`) VALUES
(1, 1, 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP', 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP', 0, '0x0000000000000000000000000000000000000000', 0, 1595660454, 50385, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, '0x7ce37e5d7d7aa786d4f7501f14283f51ec91c658', 'TMMZKNxVkAGdvbebErgxVE7WHcDhhXNPx2', 1, '0x305abd3892c028aab90f7ec4453c58f7023f68b8', 1, 1595661606, 13316, 1, 12, 12, 335, 95, 43, 23, 11, 5, 1, 1, 1, 1, 2, 1, 163, 94, 69, 0, 23, 7, 0, 0, 0, 0, 0, 0),
(3, 3, '0xc61fafcf20387ada5c235fcc6b36ae8dea3b3bdc', 'TU2nkg9KgQp3Doo7tUHSYNRyoRJReYYbx2', 2, '0x7ce37e5d7d7aa786d4f7501f14283f51ec91c658', 2, 1595661867, 12974, 1, 12, 12, 30, 9, 5, 3, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 6, 3, 3, 1, 0, 0, 0, 0, 0, 0),
(4, 4, '0xdee76db00bcb99c2978dbe5dbeaeed6d622e2a9d', 'TWHpFaRsMFfv8Hhc2Sv5iiPrjsrymAXAuf', 3, '0xc61fafcf20387ada5c235fcc6b36ae8dea3b3bdc', 3, 1595662176, 10832, 1, 12, 12, 49, 5, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, '0xe161d90ac66ea77bc0813787c0e56123a8d416a3', 'TWWvFojh7rgZiVj6kbPyjVNzSDhhFqwTeX', 4, '0xdee76db00bcb99c2978dbe5dbeaeed6d622e2a9d', 4, 1595663829, 10808, 1, 12, 12, 4, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `proposal_name` varchar(255) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `description` text,
  `startingdate` int(15) DEFAULT NULL,
  `enddate` int(15) DEFAULT NULL,
  `proposalstatus` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `pollurl` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `forsageuserid` int(11) DEFAULT NULL,
  `userwallet` varchar(255) DEFAULT NULL,
  `forsagetronwallet` varchar(255) DEFAULT NULL,
  `transationwallet` varchar(255) DEFAULT NULL,
  `YFItoken` varchar(255) DEFAULT NULL,
  `YFIurl` varchar(255) DEFAULT NULL,
  `IPFS` text,
  `report` text,
  `image` varchar(255) DEFAULT NULL,
  `createdate` int(15) DEFAULT NULL,
  `updateddate` int(15) DEFAULT NULL,
  `adminsattus` int(11) DEFAULT NULL,
  `voteup` int(11) NOT NULL DEFAULT '0',
  `votedown` int(11) NOT NULL DEFAULT '0',
  `likeup` int(11) NOT NULL DEFAULT '0',
  `likedown` int(11) NOT NULL DEFAULT '0',
  `IPFSlink` varchar(255) DEFAULT NULL,
  `hitcount` int(11) NOT NULL DEFAULT '0',
  `proposal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `proposal_name`, `catid`, `description`, `startingdate`, `enddate`, `proposalstatus`, `slug`, `status`, `pollurl`, `userid`, `forsageuserid`, `userwallet`, `forsagetronwallet`, `transationwallet`, `YFItoken`, `YFIurl`, `IPFS`, `report`, `image`, `createdate`, `updateddate`, `adminsattus`, `voteup`, `votedown`, `likeup`, `likedown`, `IPFSlink`, `hitcount`, `proposal_id`) VALUES
(1, 'Suggestions to Improve Yearn Communication', 1, '          <p><strong>Summary</strong>:</p>\r\n<blockquote>\r\n<p>Burn the timelock on the YFI token so that no minting can ever take place again.</p>\r\n</blockquote>\r\n<p><strong>Abstract</strong>:</p>\r\n<blockquote>\r\n<p>Set governance to 0x0 on the YFI token, preventing all future issuance.</p>\r\n</blockquote>\r\n<p><strong>Motivation</strong>:</p>\r\n<blockquote>\r\n<p>On-chain governance will soon be finalized and deployed. This will be ready within the next ~2 weeks, pending on audits. As the first official on-chain enforced governance vote I want to propose burning the minting capability permanently, thus permanently capping YFI.</p>\r\n</blockquote>\r\n<p><strong>Specification</strong>:</p>\r\n<blockquote>\r\n<p>After on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.</p>\r\n</blockquote>\r\n<p><strong>For</strong>:</p>\r\n<p><strong>Against</strong>:</p>\r\n<p><strong>Poll</strong>:</p>\r\n<p><a href=\"https://snapshot.page/#/yearn/proposal/QmXywy67BG2rMwaMnfWWP5op6MWPdYUU3RPxD38WdxkN57\" class=\"onebox\" target=\"_blank\">https://snapshot.page/#/yearn/proposal/QmXywy67BG2rMwaMnfWWP5op6MWPdYUU3RPxD38WdxkN57</a></p>', 1600992000, 1602324600, 'active', 'suggestions-to-improve-yearn-communication', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 3, 3, 0, 0, NULL, 116, NULL),
(2, 'Suggestions to Improve Yearn Communication111', 2, '          <p><strong>Summary</strong>:</p>\r\n<blockquote>\r\n<p>Burn the timelock on the YFI token so that no minting can ever take place again.</p>\r\n</blockquote>\r\n<p><strong>Abstract</strong>:</p>\r\n<blockquote>\r\n<p>Set governance to 0x0 on the YFI token, preventing all future issuance.</p>\r\n</blockquote>\r\n<p><strong>Motivation</strong>:</p>\r\n<blockquote>\r\n<p>On-chain governance will soon be finalized and deployed. This will be ready within the next ~2 weeks, pending on audits. As the first official on-chain enforced governance vote I want to propose burning the minting capability permanently, thus permanently capping YFI.</p>\r\n</blockquote>\r\n<p><strong>Specification</strong>:</p>\r\n<blockquote>\r\n<p>After on-chain governance is deployed. Multisig will transfer all system rights to governance. The first official on-chain enforced vote is proposed to be permanently capping YFI.</p>\r\n</blockquote>\r\n<p><strong>For</strong>:</p>\r\n<p><strong>Against</strong>:</p>\r\n<p><strong>Poll</strong>:</p>\r\n<p><a href=\"https://snapshot.page/#/yearn/proposal/QmXywy67BG2rMwaMnfWWP5op6MWPdYUU3RPxD38WdxkN57\" class=\"onebox\" target=\"_blank\">https://snapshot.page/#/yearn/proposal/QmXywy67BG2rMwaMnfWWP5op6MWPdYUU3RPxD38WdxkN57</a></p>', 1600992000, 1602324600, 'active', 'suggestions-to-improve-yearn-communication11', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 1, 1, 0, 0, NULL, 8, NULL),
(3, 'Improve Yearn Communication111', 1, '<p>Hi all,</p>\r\n<p>This came out of a discussion on the yEarn Talk Discord server <a href=\"https://discordapp.com/channels/734804446353031319/734862139386232902/757259423369658441\" rel=\"noopener nofollow ugc\">(link to discussion here)</a> to improve communication between insiders and the general YFI community.</p>\r\n<p>I donÃ¢â‚¬â„¢t like to use the word Ã¢â‚¬Å“insiders,Ã¢â‚¬Â but there is somewhat of a feeling of insiders who know what is going on and the general YFI community who has to read between the lines and decode updates from various tweets and messages.</p>\r\n<p>We believe there is a lot of low-hanging fruit for communication to be improved and a small change here could really make a world of difference for the community.</p>\r\n<p>There were a few different ideas that were offered up to help improve communication:</p>\r\n<ol>\r\n<li>\r\n<p>Induct 1-2 people (or the existing comms people such as <span class=\"mention\">@learn2yearn</span>, DarkGhosty, <a class=\"mention\" href=\"/u/thegismar\">@thegismar</a>, <a class=\"mention\" href=\"/u/fameal\">@fameal</a>) to be an observer in the telegram, basecamp, whatever forum where operations are discussed. For what itÃ¢â‚¬â„¢s worth, I believe this was the most popular idea shared.</p>\r\n</li>\r\n<li>\r\n<p>Community calls (whether weekly, bi-weekly, monthly, etc.) where individuals can listen in on what is going on and ask questions. For Eth2, Danny Ryan sets up a bi-weekly call with an agenda on a ethereum/pm discord channel. After the call, someone from the community posts notes of what happened and general updates from the team. This would be great to get the status of where we are on certain projects (yETH, boosties, etc.).</p>\r\n</li>\r\n<li>\r\n<p>An <span class=\"hashtag\">#update</span> channel where individuals from the team can post/share what they are working on daily or every few days. Something quick and simple is the goal, e.g. Ã¢â‚¬Å“working on -x, -y, -z today.Ã¢â‚¬Â</p>\r\n</li>\r\n<li>\r\n<p>A weekly medium post or discord announcement by someone who is on the inside can provide updates.</p>\r\n</li>\r\n</ol>\r\n<p>Note, weÃ¢â‚¬â„¢re <strong>not</strong> looking for updates from Andre as he is fairly communicative via twitter/medium on the latest thing that he is thought up. His focus should continue to remain on high-level R&amp;D and the architecture of future yearn products.</p>\r\n<p>We welcome any alternative ideas that were not mentioned here to help improve the communication. Let us know your thoughts!</p>', 1600992000, 1602324600, 'active', 'improve-yearn-communication11', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 0, 0, 0, 0, NULL, 3, NULL),
(4, 'Improve Communication111', 3, '<p>Hi all,</p>\r\n<p>This came out of a discussion on the yEarn Talk Discord server <a href=\"https://discordapp.com/channels/734804446353031319/734862139386232902/757259423369658441\" rel=\"noopener nofollow ugc\">(link to discussion here)</a> to improve communication between insiders and the general YFI community.</p>\r\n<p>I donÃ¢â‚¬â„¢t like to use the word Ã¢â‚¬Å“insiders,Ã¢â‚¬Â but there is somewhat of a feeling of insiders who know what is going on and the general YFI community who has to read between the lines and decode updates from various tweets and messages.</p>\r\n<p>We believe there is a lot of low-hanging fruit for communication to be improved and a small change here could really make a world of difference for the community.</p>\r\n<p>There were a few different ideas that were offered up to help improve communication:</p>\r\n<ol>\r\n<li>\r\n<p>Induct 1-2 people (or the existing comms people such as <span class=\"mention\">@learn2yearn</span>, DarkGhosty, <a class=\"mention\" href=\"/u/thegismar\">@thegismar</a>, <a class=\"mention\" href=\"/u/fameal\">@fameal</a>) to be an observer in the telegram, basecamp, whatever forum where operations are discussed. For what itÃ¢â‚¬â„¢s worth, I believe this was the most popular idea shared.</p>\r\n</li>\r\n<li>\r\n<p>Community calls (whether weekly, bi-weekly, monthly, etc.) where individuals can listen in on what is going on and ask questions. For Eth2, Danny Ryan sets up a bi-weekly call with an agenda on a ethereum/pm discord channel. After the call, someone from the community posts notes of what happened and general updates from the team. This would be great to get the status of where we are on certain projects (yETH, boosties, etc.).</p>\r\n</li>\r\n<li>\r\n<p>An <span class=\"hashtag\">#update</span> channel where individuals from the team can post/share what they are working on daily or every few days. Something quick and simple is the goal, e.g. Ã¢â‚¬Å“working on -x, -y, -z today.Ã¢â‚¬Â</p>\r\n</li>\r\n<li>\r\n<p>A weekly medium post or discord announcement by someone who is on the inside can provide updates.</p>\r\n</li>\r\n</ol>\r\n<p>Note, weÃ¢â‚¬â„¢re <strong>not</strong> looking for updates from Andre as he is fairly communicative via twitter/medium on the latest thing that he is thought up. His focus should continue to remain on high-level R&amp;D and the architecture of future yearn products.</p>\r\n<p>We welcome any alternative ideas that were not mentioned here to help improve the communication. Let us know your thoughts!</p>', 1222333444, 1602324600, 'active', 'improve-yearn-communication11', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 1, 1, 0, 0, NULL, 0, NULL),
(5, 'Improve bhavandns Communication111', 4, '<p>Hi all,</p>\r\n<p>This came out of a discussion on the yEarn Talk Discord server <a href=\"https://discordapp.com/channels/734804446353031319/734862139386232902/757259423369658441\" rel=\"noopener nofollow ugc\">(link to discussion here)</a> to improve communication between insiders and the general YFI community.</p>\r\n<p>I donÃ¢â‚¬â„¢t like to use the word Ã¢â‚¬Å“insiders,Ã¢â‚¬Â but there is somewhat of a feeling of insiders who know what is going on and the general YFI community who has to read between the lines and decode updates from various tweets and messages.</p>\r\n<p>We believe there is a lot of low-hanging fruit for communication to be improved and a small change here could really make a world of difference for the community.</p>\r\n<p>There were a few different ideas that were offered up to help improve communication:</p>\r\n<ol>\r\n<li>\r\n<p>Induct 1-2 people (or the existing comms people such as <span class=\"mention\">@learn2yearn</span>, DarkGhosty, <a class=\"mention\" href=\"/u/thegismar\">@thegismar</a>, <a class=\"mention\" href=\"/u/fameal\">@fameal</a>) to be an observer in the telegram, basecamp, whatever forum where operations are discussed. For what itÃ¢â‚¬â„¢s worth, I believe this was the most popular idea shared.</p>\r\n</li>\r\n<li>\r\n<p>Community calls (whether weekly, bi-weekly, monthly, etc.) where individuals can listen in on what is going on and ask questions. For Eth2, Danny Ryan sets up a bi-weekly call with an agenda on a ethereum/pm discord channel. After the call, someone from the community posts notes of what happened and general updates from the team. This would be great to get the status of where we are on certain projects (yETH, boosties, etc.).</p>\r\n</li>\r\n<li>\r\n<p>An <span class=\"hashtag\">#update</span> channel where individuals from the team can post/share what they are working on daily or every few days. Something quick and simple is the goal, e.g. Ã¢â‚¬Å“working on -x, -y, -z today.Ã¢â‚¬Â</p>\r\n</li>\r\n<li>\r\n<p>A weekly medium post or discord announcement by someone who is on the inside can provide updates.</p>\r\n</li>\r\n</ol>\r\n<p>Note, weÃ¢â‚¬â„¢re <strong>not</strong> looking for updates from Andre as he is fairly communicative via twitter/medium on the latest thing that he is thought up. His focus should continue to remain on high-level R&amp;D and the architecture of future yearn products.</p>\r\n<p>We welcome any alternative ideas that were not mentioned here to help improve the communication. Let us know your thoughts!</p>', 1222333444, 1602324600, 'active', 'improve-yearn-communication11', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 1, 1, 0, 0, NULL, 1, NULL),
(6, 'Improve sdfsdfsdfa Communication111', 5, '<p>Hi all,</p>\r\n<p>This came out of a discussion on the yEarn Talk Discord server <a href=\"https://discordapp.com/channels/734804446353031319/734862139386232902/757259423369658441\" rel=\"noopener nofollow ugc\">(link to discussion here)</a> to improve communication between insiders and the general YFI community.</p>\r\n<p>I donÃ¢â‚¬â„¢t like to use the word Ã¢â‚¬Å“insiders,Ã¢â‚¬Â but there is somewhat of a feeling of insiders who know what is going on and the general YFI community who has to read between the lines and decode updates from various tweets and messages.</p>\r\n<p>We believe there is a lot of low-hanging fruit for communication to be improved and a small change here could really make a world of difference for the community.</p>\r\n<p>There were a few different ideas that were offered up to help improve communication:</p>\r\n<ol>\r\n<li>\r\n<p>Induct 1-2 people (or the existing comms people such as <span class=\"mention\">@learn2yearn</span>, DarkGhosty, <a class=\"mention\" href=\"/u/thegismar\">@thegismar</a>, <a class=\"mention\" href=\"/u/fameal\">@fameal</a>) to be an observer in the telegram, basecamp, whatever forum where operations are discussed. For what itÃ¢â‚¬â„¢s worth, I believe this was the most popular idea shared.</p>\r\n</li>\r\n<li>\r\n<p>Community calls (whether weekly, bi-weekly, monthly, etc.) where individuals can listen in on what is going on and ask questions. For Eth2, Danny Ryan sets up a bi-weekly call with an agenda on a ethereum/pm discord channel. After the call, someone from the community posts notes of what happened and general updates from the team. This would be great to get the status of where we are on certain projects (yETH, boosties, etc.).</p>\r\n</li>\r\n<li>\r\n<p>An <span class=\"hashtag\">#update</span> channel where individuals from the team can post/share what they are working on daily or every few days. Something quick and simple is the goal, e.g. Ã¢â‚¬Å“working on -x, -y, -z today.Ã¢â‚¬Â</p>\r\n</li>\r\n<li>\r\n<p>A weekly medium post or discord announcement by someone who is on the inside can provide updates.</p>\r\n</li>\r\n</ol>\r\n<p>Note, weÃ¢â‚¬â„¢re <strong>not</strong> looking for updates from Andre as he is fairly communicative via twitter/medium on the latest thing that he is thought up. His focus should continue to remain on high-level R&amp;D and the architecture of future yearn products.</p>\r\n<p>We welcome any alternative ideas that were not mentioned here to help improve the communication. Let us know your thoughts!</p>', 1222333444, 1602324600, 'active', 'improve-yearn-communication11', 1, 'https://snapshot.page/#/yearn/proposal/QmXudfEC9Lo9cv7j89h98WaSsVVMMWa1KKRyN4thgcEhrh', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1600992000, 1601769600, 1, 0, 0, 0, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `userwallet` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verifycode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `userid`, `userwallet`, `fullname`, `email`, `status`, `created`, `verifycode`) VALUES
(1, 1, 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP', 'bhavna baria', 'bhavanabaria13@gmail.com', 0, '2020-10-03 02:04:19', '323226697');

-- --------------------------------------------------------

--
-- Table structure for table `votecount`
--

CREATE TABLE `votecount` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `forsageid` int(11) NOT NULL,
  `proposalid` int(11) NOT NULL,
  `userwallet` varchar(255) NOT NULL,
  `voteup` int(5) NOT NULL DEFAULT '0',
  `votedown` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votecount`
--

INSERT INTO `votecount` (`id`, `userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES
(1, 1, 1, 1, '', 1, 0),
(2, 1, 1, 2, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting_event_reglevel`
--

CREATE TABLE `voting_event_reglevel` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `userWallet` varchar(50) DEFAULT NULL,
  `userWalletBase58` varchar(100) NOT NULL,
  `referrerID` int(11) DEFAULT NULL,
  `referrerWallet` varchar(255) DEFAULT NULL,
  `originalReferrer` int(11) DEFAULT NULL,
  `timestamp` int(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting_event_reglevel`
--

INSERT INTO `voting_event_reglevel` (`id`, `userID`, `userWallet`, `userWalletBase58`, `referrerID`, `referrerWallet`, `originalReferrer`, `timestamp`, `status`, `fullname`, `email`, `phone`, `country`, `password`) VALUES
(1, 0, 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP', '', 0, '', 0, 1601317726, 1, 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP', 'bhavna@gmail.com', '+32 1435353', 'INDIA (IN)', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forsage_event_reglevel`
--
ALTER TABLE `forsage_event_reglevel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`,`userWallet`,`userWalletBase58`,`referrerID`,`referrerWallet`,`originalReferrer`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votecount`
--
ALTER TABLE `votecount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_event_reglevel`
--
ALTER TABLE `voting_event_reglevel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`,`userWallet`,`userWalletBase58`,`referrerID`,`referrerWallet`,`originalReferrer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forsage_event_reglevel`
--
ALTER TABLE `forsage_event_reglevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votecount`
--
ALTER TABLE `votecount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voting_event_reglevel`
--
ALTER TABLE `voting_event_reglevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
