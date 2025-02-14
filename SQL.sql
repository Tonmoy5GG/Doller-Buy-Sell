-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2020 at 11:16 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorijvcp_buy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Rahman', 'admin', '$2y$10$acNPwpr4TyYUhK8k9oBKX.It/IrAZISn7PiOSlBF5BGzLDfBiNRme', '8cY9Eh2eJDsrYbHzhpFZ0L316xOVUb4S51hoLngaCDZ3oE02Ymf1H3GGadJi', '', '2017-07-04 09:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `link2` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`id`, `link`, `link2`, `created_at`, `updated_at`) VALUES
(1, '<script type=\"text/javascript\">google_ad_client=\"4322593285948552\";\r\ngoogle_ad_host=\"4322593285948552\";google_ad_width =728;\r\ngoogle_ad_height=90;google_ad_type=\"text_image\";\r\ngoogle_color_border=\"FFFFFF\";google_color_bg=\"ffffff\";\r\ngoogle_color_link=\"OOOOff\";google_color_text=\"OOOOOO\";\r\ngoogle_color_url=\"OO8OOO\";google_page_url=\r\n\"http://vicecity4u.blogspot.com/\"//--> </script><script \r\ntype=\"text/javascript\"\r\nsrc=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\r\n</script>', '<script type=\"text/javascript\">google_ad_client=\"4322593285948552\";\r\ngoogle_ad_host=\"4322593285948552\";google_ad_width =468;\r\ngoogle_ad_height=60;google_ad_type=\"text_image\";\r\ngoogle_color_border=\"FFFFFF\";google_color_bg=\"ffffff\";\r\ngoogle_color_link=\"OOOOff\";google_color_text=\"OOOOOO\";\r\ngoogle_color_url=\"OO8OOO\";google_page_url=\r\n\"http://vicecity4u.blogspot.com/\"//--> </script><script \r\ntype=\"text/javascript\"\r\nsrc=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\r\n</script>', '0000-00-00 00:00:00', '2017-05-31 19:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account`, `created_at`, `updated_at`) VALUES
(2, 'Sonali bank', '454541646154854', '2017-05-31 18:44:51', '2017-05-31 18:44:51'),
(3, 'Rupali Bank', '8223659874', '2017-05-31 19:15:50', '2017-05-31 19:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `bonus_type` int(11) NOT NULL,
  `percentage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `under_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sell_id` int(11) NOT NULL,
  `buy_id` int(11) NOT NULL,
  `exchange_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bonuses`
--

INSERT INTO `bonuses` (`id`, `bonus_type`, `percentage`, `member_id`, `member_reference`, `under_reference`, `sell_id`, `buy_id`, `exchange_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, '3', 11, '55924b5e2e6fd96', '759233ea36b7049', 0, 1, 0, '24', '2017-05-23 18:16:10', '2017-05-23 18:16:10'),
(2, 1, '3', 11, '55924b5e2e6fd96', '759233ea36b7049', 1, 0, 0, '68.4', '2017-05-23 18:19:51', '2017-05-23 18:19:51'),
(3, 2, '3', 11, '55924b5e2e6fd96', '759233ea36b7049', 0, 2, 0, '31.5', '2017-05-23 18:24:49', '2017-05-23 18:24:49'),
(4, 3, '3', 11, '55924b5e2e6fd96', '759233ea36b7049', 0, 0, 1, '46.8', '2017-05-23 18:33:54', '2017-05-23 18:33:54'),
(5, 1, '3', 12, '85925a69a16f9d8', '55924b5e2e6fd96', 3, 0, 0, '117', '2017-05-24 09:33:05', '2017-05-24 09:33:05'),
(6, 2, '3', 14, '959286c48400995', '259286ac2c03527', 0, 3, 0, '240', '2017-05-26 21:59:34', '2017-05-26 21:59:34'),
(7, 1, '2', 14, '959286c48400995', '259286ac2c03527', 4, 0, 0, '156', '2017-05-26 22:08:16', '2017-05-26 22:08:16'),
(8, 3, '2', 14, '959286c48400995', '259286ac2c03527', 0, 0, 2, '156', '2017-05-27 13:26:37', '2017-05-27 13:26:37'),
(9, 1, '2', 11, '55924b5e2e6fd96', '759233ea36b7049', 2, 0, 0, '46.8', '2017-05-31 18:21:27', '2017-05-31 18:21:27'),
(10, 1, '2', 11, '55924b5e2e6fd96', '4592ea6a3a5a525', 5, 0, 0, '31.2', '2017-05-31 18:30:37', '2017-05-31 18:30:37'),
(11, 1, '2', 17, '4592efe5c27f8a0', '2595b5dc611b8d2', 6, 0, 0, '3658.2', '2017-07-04 14:27:04', '2017-07-04 14:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `buy_confirms`
--

CREATE TABLE `buy_confirms` (
  `id` int(10) UNSIGNED NOT NULL,
  `buy_id` int(11) NOT NULL,
  `transaction_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_confirms`
--

INSERT INTO `buy_confirms` (`id`, `buy_id`, `transaction_details`, `image`, `member_id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '598644444', '1495584400.png', 11, 'Habiba Himu', 'habiba@gmail.com', 1, '2017-05-23 18:06:40', '2017-05-23 18:16:10'),
(2, 2, 'tfhgfhfghgf', '1495584420.png', 11, 'Habiba Himu', 'habiba@gmail.com', 1, '2017-05-23 18:07:00', '2017-05-23 18:24:49'),
(3, 3, 'fsdfdvdfvdvdevf', '1495821523.png', 14, 'Md.Tipu', 'dollarbuysell2016@gmail.com', 1, '2017-05-26 21:58:43', '2017-05-26 21:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `buy_currencies`
--

CREATE TABLE `buy_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_currencies`
--

INSERT INTO `buy_currencies` (`id`, `currency_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 10, 0, '2017-05-23 18:06:26', '2017-05-23 18:06:26'),
(2, 15, 14, 0, '2017-05-23 18:06:47', '2017-05-23 18:06:47'),
(3, 14, 100, 0, '2017-05-26 21:58:30', '2017-05-26 21:58:30'),
(4, 12, 30, 0, '2017-05-31 19:12:11', '2017-05-31 19:12:11'),
(5, 12, 30, 0, '2017-05-31 19:15:21', '2017-05-31 19:15:21'),
(6, 12, 30, 0, '2017-05-31 19:15:55', '2017-05-31 19:15:55'),
(7, 12, 30, 0, '2017-05-31 19:16:31', '2017-05-31 19:16:31'),
(8, 12, 50, 0, '2017-07-04 15:10:10', '2017-07-04 15:10:10'),
(9, 12, 50, 0, '2017-07-04 15:10:24', '2017-07-04 15:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sell_rate` int(11) NOT NULL,
  `buy_rate` int(11) NOT NULL,
  `payment_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `image`, `sell_rate`, `buy_rate`, `payment_id`, `created_at`, `updated_at`) VALUES
(12, 'BItcoin', '1495822936.png', 84, 78, 'ddwddwddw3e2ededewdded', '2017-02-18 11:41:08', '2017-05-26 22:22:16'),
(14, 'Neteller', '1489954583.jpg', 80, 78, 'demo@demo.com', '2017-03-20 00:16:23', '2017-03-20 00:16:23'),
(15, 'Payoneer', '1489954623.png', 80, 78, 'demo@demo.com', '2017-03-20 00:17:03', '2017-03-20 00:17:03'),
(16, 'Perfect Money', '1489954657.png', 80, 78, 'U000000', '2017-03-20 00:17:37', '2017-03-20 00:17:37'),
(17, 'Payza', '1495823065.png', 86, 80, 'payzaBd@gmail.com', '2017-05-26 22:24:25', '2017-05-26 22:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_confirms`
--

CREATE TABLE `exchange_confirms` (
  `id` int(10) UNSIGNED NOT NULL,
  `exchange_id` int(11) NOT NULL,
  `exchange_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exchange_confirms`
--

INSERT INTO `exchange_confirms` (`id`, `exchange_id`, `exchange_price`, `transaction_id`, `image`, `payment_id`, `member_id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '19.5', '4562355', '1495584453.png', 'dsfsdfsdfsd', 11, 'Habiba Himu', 'habiba@gmail.com', 1, '2017-05-23 18:07:33', '2017-05-23 18:33:54'),
(2, 2, '97.5', '23242424', '1495825561.png', 'fgfdgdfgdfg', 14, 'Md.Tipu', 'dollarbuysell2016@gmail.com', 1, '2017-05-26 23:06:01', '2017-05-27 13:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_currencies`
--

CREATE TABLE `exchange_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `exchange_currency_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exchange_currencies`
--

INSERT INTO `exchange_currencies` (`id`, `currency_id`, `quantity`, `exchange_currency_id`, `created_at`, `updated_at`) VALUES
(1, 14, 20, 15, '2017-05-23 18:07:13', '2017-05-23 18:07:13'),
(2, 12, 100, 16, '2017-05-26 23:05:28', '2017-05-26 23:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `withdraw` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `scroll` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `footer_text` blob NOT NULL,
  `footer_bottom_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `logo`, `favicon`, `currency`, `percentage`, `withdraw`, `scroll`, `address`, `email`, `number`, `facebook`, `twitter`, `linkedin`, `google_plus`, `youtube`, `footer_text`, `footer_bottom_text`, `created_at`, `updated_at`) VALUES
(1, 'DollarXchange - Currency Exchange Platform by DoridroTech.Com', 'logo.png', 'favicon.png', 'BDT', '2', '100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 'Zigatola, Dhanmondi, Dhaka', 'admin@doridrotech.com', '+88-01632858741', 'http://www.facebook.com/doridrotech', 'http://www.twitter/doridrotech', 'http://linkdin.com/doridrotech', 'http://plus.google.com/doridrotech', 'http://youtube.com/doridrotech', 0x4c6f72656d20497073756d266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e, 'U2NyaXB0IGRvd25sb2FkZWQgZnJvbSBDT0RFTElTVC5DQw==', NULL, '2020-06-22 19:16:30'),
(2, '', '', '', '', '', '', 'zcdzxczx', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'We are The Best Currency Exchanger in World', NULL, '2017-02-19 09:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `home_tops`
--

CREATE TABLE `home_tops` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_tops`
--

INSERT INTO `home_tops` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(8, 'Best Exchanger', 'Transportation is the movement of people, animals and goods from one location to another. ', '2017-02-15 05:59:50', '2017-02-19 09:34:25'),
(9, 'Quickly Exchnager', 'Transportation is the movement of people, animals and goods from one location to another. ', '2017-02-19 09:26:03', '2017-02-19 09:34:41'),
(10, 'Lowest Profitable', 'Transportation is the movement of people, animals and goods from one location to another.', '2017-02-19 09:35:14', '2017-02-19 09:35:14'),
(11, 'Best Currency Price', 'Transportation is the movement of people, animals and goods from one location to another.', '2017-02-19 09:35:41', '2017-02-19 09:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `under_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `image`, `nid`, `address`, `reference`, `under_reference`, `amount`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hasan Rahman', 'hasan@gmail.com', '01716199668', '1495236151.png', '', 'Uttara, Dhaka 1230', '123456', '', '3523.69', '$2y$10$M/w3yyGNvrb4avOgxFvlWuod8zsIL/IuK0HRD2mQqg1eohwWwgHvq', 1, 'WqDtS4HYrcNDl2DzmCMTZkOAJINUW74MHH0z3stl1Gypz4Ar24yCf90zdB9a', '2017-04-10 13:41:47', '2017-07-04 14:56:36'),
(9, 'Demo User', 'hellomrhasan@gmail.com', '01716199558', '1495488606.png', '', 'Uttara, Dhaka 1230', '759233ea36b7049', '123456', '93.5', '$2y$10$tFWtg827Yp4uzTkhbvRzfuaMe8iX1geE5ynFuax01nR2yYHv.SQTW', 1, '0YrowpyqWx2tze7r5cFVGn2xXed3ljmoMxKh2SDvqsNP4Z93nioUY8ZfmSiB', '2017-05-22 13:40:20', '2017-05-31 18:21:28'),
(11, 'Habiba Himu', 'habiba@gmail.com', '017154545455', '1495578082.jpg', '', 'Mirpur, Dhaka 1230 ', '55924b5e2e6fd96', '759233ea36b7049', '148.2', '$2y$10$EFx.2dcxW1vcfGB9JYmfCeNV0XUjPt5nmx4rMuin.Grcbk/vc4Fw.', 1, 'V4dsrTQi91PmY0XGXoRuzMrMMohNYacThYQolrGikVxNIHjipVS8TkCFFBZk', '2017-05-23 16:21:22', '2017-05-31 18:30:37'),
(12, 'Harun Rasid', 'harun@gmail.com', '017151223654', '1495639706.png', '', 'Kurigram, Nageswari', '85925a69a16f9d8', '55924b5e2e6fd96', '0', '$2y$10$/df3D.xYK7l102f0Pzo9duVW/GQtKS.qbfkpm4i8I9O1ewYst9QOe', 0, 'sjAipKgAsePIMigLBtLu8SBGtyTh4mWmJzoL6LXSIBQLX0sCWW4bcHFeDPmh', '2017-05-24 09:28:26', '2017-05-24 09:31:28'),
(13, 'Ridoy Ahmed', 'dollarzone2017@gmail.com', '1975444480', '1495820994.jpg', '', '3/2 kalabagan', '259286ac2c03527', '85925a69a16f9d8', '312', '$2y$10$giI42HiPhkQt8.//I3mZleguDqtXf8LfH80swOz5dlCSag78h8XQ2', 1, 'qb6p48RavsObKaQV9AyaDgP780tRe3lGEvuwH3WUm4U7Lenu7imO0qbyo23L', '2017-05-26 21:49:55', '2017-05-31 22:38:50'),
(14, 'Md.Tipu', 'dollarbuysell2016@gmail.com', '65767567', '1495821384.jpg', '', 'fdvdfvdvevf', '959286c48400995', '259286ac2c03527', '0', '$2y$10$4yISs.EEbXyX146ei0LLqeZvDrVXM/TI3NRrkJyLbfrJNoOrjfKOy', 1, '', '2017-05-26 21:56:24', '2017-05-27 10:25:50'),
(15, 'Tanzila Anni', 'anni@gmail.com', '01716155825', '1496229539.png', '1496230432.jpg', 'Mirpur, Dahaka - 12016', '4592ea6a3a5a525', '55924b5e2e6fd96', '0', '$2y$10$goqsQo8dNL53E7JH9nWzJ.ZQO79pIuy5W36ISNAkYlTNbJJ2L5zTy', 1, '', '2017-05-31 16:19:02', '2017-05-31 16:33:52'),
(16, 'Empty Poweer', 'power@gmail.com', '017161995548', '1496233540.jpg', '1496233575.jpg', 'Mirpur Dahka 1230', '8592eb23895bc61', '4592ea6a3a5a525', '0', '123456', 1, '', '2017-05-31 17:08:24', '2017-05-31 17:31:57'),
(17, 'Shakil', 'dollarzone2018@gmail.com', '778282', '1496251996.png', '1496251996.jpg', 'Jsjnednmcdkdk', '4592efe5c27f8a0', '259286ac2c03527', '3658.2', '$2y$10$IylIo79iu3YSAYWm3HjSkeEfadYwhHcZ6z2GCmA1bv.fTONwD.CRy', 1, '', '2017-05-31 22:33:16', '2017-07-04 14:27:04'),
(18, 'Rifayet Rifat', 'pay2bd@gmail.com', '01716441700', '1499160006.jpg', '1499160006.jpg', '11/3 Garden Street, Ring Road\r\nShyamoli\r\nDhaka', '2595b5dc611b8d2', '4592efe5c27f8a0', '0', '$2y$10$5ba0bBm5asZR/ZgZ45G/hOeQWIrvOFDnUUPEU30rrGN7kTJALJc/G', 1, 'NI8DWtKMBZthxRBjkKVfmNjXVReY221QxMMOdVb6x0h2bJvI0riuqGnpUXZM', '2017-07-04 14:20:06', '2017-07-04 17:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Menu1', 0x3c6469763e3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e4c6f72656d20497073756d266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f6469763e3c6469763e3c68323e57687920646f207765207573652069743f3c2f68323e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f6469763e3c62723e3c6469763e3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d2220285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c20224c6f72656d20697073756d20646f6c6f722073697420616d65742e2e222c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d222062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f6469763e, '2017-01-11 08:28:02', '2017-02-19 07:47:00'),
(3, 'Menu2', 0x3c6469763e3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e4c6f72656d20497073756d266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f6469763e3c6469763e3c68323e57687920646f207765207573652069743f3c2f68323e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f6469763e3c62723e3c6469763e3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d2220285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c20224c6f72656d20697073756d20646f6c6f722073697420616d65742e2e222c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d222062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f6469763e, '2017-01-11 09:04:39', '2017-01-11 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_02_19_182538_create_banks_table', 1),
('2017_02_19_191752_create_buy_currencies_table', 2),
('2017_02_19_213521_create_sell_currencies_table', 3),
('2017_02_19_222050_create_sell_confirms_table', 4),
('2017_02_20_122004_create_buy_confirms_table', 5),
('2017_02_20_174357_create_exchange_currencies_table', 6),
('2017_02_20_201418_create_exchange_confirms_table', 7),
('2017_05_23_223304_create_bonuses_table', 8),
('2017_05_24_075450_create_withdraws_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abir@gmail.com', '1a3eb40bd3a7bb17064569e11872c6f32327dfec6b88819fa6090ee640b5b521', '2017-05-19 13:34:02'),
('hasan@gmail.com', '8721004ace8bcbf21c8074b7977930fd23a0fe7d6f3466ad7075c6915ab9f11c', '2017-06-04 16:03:15'),
('hellomrhasan@gmail.com', '6e22e5cc2ccd88e990e1151e00554e427e65b1ce109c16bea4caeab239faa0d0', '2017-06-04 16:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `sell_confirms`
--

CREATE TABLE `sell_confirms` (
  `id` int(10) UNSIGNED NOT NULL,
  `sell_id` int(11) NOT NULL,
  `transaction_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sell_confirms`
--

INSERT INTO `sell_confirms` (`id`, `sell_id`, `transaction_id`, `image`, `member_id`, `name`, `email`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '369587412563', '1495584348.png', 11, 'Habiba Himu', 'habiba@gmail.com', 'Sonali Bank', 1, '2017-05-23 18:05:48', '2017-05-23 18:19:51'),
(2, 2, '45236985741', '1495584375.png', 11, 'Habiba Himu', 'habiba@gmail.com', 'Sonali Bnak', 1, '2017-05-23 18:06:15', '2017-05-31 18:21:28'),
(3, 3, '4536298574', '1495639869.png', 12, 'Harun Rasid', 'harun@gmail.com', 'Sonali Bank', 1, '2017-05-24 09:31:09', '2017-05-24 09:33:05'),
(4, 4, '5567', '1495822038.png', 14, 'Md.Tipu', 'dollarbuysell2016@gmail.com', 'khghg', 1, '2017-05-26 22:07:18', '2017-05-26 22:08:16'),
(5, 5, '25323213123123131', '1496237400.png', 15, 'Tanzila Anni', 'anni@gmail.com', 'Brack Bank ', 1, '2017-05-31 18:30:00', '2017-05-31 18:30:37'),
(6, 7, '123456789098765432', '1499160111.jpg', 18, 'Rifayet Rifat', 'pay2bd@gmail.com', 'fff', 1, '2017-07-04 14:21:51', '2017-07-04 14:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `sell_currencies`
--

CREATE TABLE `sell_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sell_currencies`
--

INSERT INTO `sell_currencies` (`id`, `currency_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 20, 0, '2017-05-23 18:05:28', '2017-05-23 18:05:28'),
(2, 14, 30, 0, '2017-05-23 18:05:58', '2017-05-23 18:05:58'),
(3, 16, 50, 0, '2017-05-24 09:30:47', '2017-05-24 09:30:47'),
(4, 15, 100, 0, '2017-05-26 22:06:48', '2017-05-26 22:06:48'),
(5, 15, 20, 0, '2017-05-31 18:29:26', '2017-05-31 18:29:26'),
(6, 12, 2345, 0, '2017-07-04 14:21:19', '2017-07-04 14:21:19'),
(7, 12, 2345, 0, '2017-07-04 14:21:38', '2017-07-04 14:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bold_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `bold_text`, `small_text`, `created_at`, `updated_at`) VALUES
(19, '1489954468.jpg', 'Buy Sell & Exchange eCurrency Anytime Anywhere!!', 'Currency Buy Sell Exchange Platform', '2017-03-20 00:14:29', '2017-03-20 00:14:29'),
(20, '1489954482.jpg', 'Buy Sell & Exchange eCurrency Anytime Anywhere!!', 'Currency Buy Sell Exchange Platform', '2017-03-20 00:14:43', '2017-03-20 00:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `member_id`, `amount`, `currency_id`, `details`, `message`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, '100', 12, 'id : 5256326985214523652', 'so hurry up bro.', 1, '2017-07-04 14:56:35', '2017-07-04 15:01:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_confirms`
--
ALTER TABLE `buy_confirms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_currencies`
--
ALTER TABLE `buy_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_confirms`
--
ALTER TABLE `exchange_confirms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_currencies`
--
ALTER TABLE `exchange_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_tops`
--
ALTER TABLE `home_tops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sell_confirms`
--
ALTER TABLE `sell_confirms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_currencies`
--
ALTER TABLE `sell_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buy_confirms`
--
ALTER TABLE `buy_confirms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buy_currencies`
--
ALTER TABLE `buy_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exchange_confirms`
--
ALTER TABLE `exchange_confirms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exchange_currencies`
--
ALTER TABLE `exchange_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_tops`
--
ALTER TABLE `home_tops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell_confirms`
--
ALTER TABLE `sell_confirms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sell_currencies`
--
ALTER TABLE `sell_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
