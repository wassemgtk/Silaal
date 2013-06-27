-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 12:24 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funwork_yep`
--

-- --------------------------------------------------------

--
-- Table structure for table `yc_address`
--

CREATE TABLE IF NOT EXISTS `yc_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `yc_address`
--

INSERT INTO `yc_address` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `city`, `state`, `country_id`) VALUES
(1, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(2, 'sudi', 'gautam', 'sfg', 'gfsgdf', 'gdfsgadf', 'gfsgdf', 78),
(3, 'sudi', 'gautam', 'sfg', 'gfsgdf', 'gdfsgadf', 'gfsgdf', 1),
(4, 'sudi', 'gautam', 'sfg', 'gfsgdf', 'gdfsgadf', 'gfsgdf', 1),
(5, 'sudi', 'gautam', 'sfg', 'gfsgdf', 'gdfsgadf', 'gfsgdf', 1),
(6, 'sudi', 'gautam', 'sfg', 'gfsgdf', 'gdfsgadf', 'gfsgdf', 1),
(7, 'sfdg', 'fgsf', 'gsfg', 'fsgfd', 'gfsgdf', 'fsgdf', 78),
(8, 'sfdg', 'fgsf', 'gsfg', 'fsgfd', 'gfsgdf', 'fsgdf', 78),
(9, 'sfdg', 'fgsf', 'gsfg', 'fsgfd', 'gfsgdf', 'fsgdf', 78),
(10, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(11, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(12, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(13, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(14, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(15, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(16, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(17, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(18, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(19, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(20, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(21, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(22, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(23, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(24, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(25, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(26, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(27, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(28, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(29, 'Ramkrishna', 'ramkrishna', 'bagdole', '00977', 'lalitpur1', 'bagmati1', 149),
(30, 'sdfasdf', 'asdf', 'asdf', '1446546', '54656', 'sadfsadf', 44),
(31, 'sdfasdf', 'asdf', 'asdf', '1446546', '54656', 'sadfsadf', 44),
(32, 'asdff', 'asdf', 'asf', 'asdf', 'asdf', 'asdf', 1),
(33, 'asdff', 'asdf', 'asf', 'asdf', 'asdf', 'asdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yc_administrator`
--

CREATE TABLE IF NOT EXISTS `yc_administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yc_administrator`
--

INSERT INTO `yc_administrator` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `address_id`, `status`, `date_added`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@gmail.com', 1, 1, '2012-03-04 12:44:22'),
(2, 'admin1', '1b1f573238eb628a5a0ccce6c733ac4d', 'admin', 'admin', 'admin1@gmail.com', 1, 1, '0000-00-00 00:00:00'),
(3, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'admin', 'admin', 'administrator@gmail.com', 0, 1, '2012-03-30 15:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `yc_category`
--

CREATE TABLE IF NOT EXISTS `yc_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `language` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `yc_category`
--

INSERT INTO `yc_category` (`category_id`, `parent_id`, `title`, `description`, `language`) VALUES
(1, 0, 'Desktops', 'This is all kind of desktop computers.', '5'),
(2, 0, 'Components', 'All kinds of components.', '5'),
(3, 1, 'personal computer', 'personal computer', '5'),
(5, 1, 'Mac', 'Mac', '5'),
(6, 2, 'Moniters', 'All kinds of moniters', '5'),
(10, 0, 'softwares', 'softwares description', '5'),
(11, 0, 'Tablets', 'Tablets Description', '5'),
(12, 0, 'Camera', 'Camera desc', '5'),
(15, 0, 'Accessories', 'These are accessories things', '5');

-- --------------------------------------------------------

--
-- Table structure for table `yc_category_description`
--

CREATE TABLE IF NOT EXISTS `yc_category_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `yc_category_description`
--

INSERT INTO `yc_category_description` (`id`, `category_id`, `language_id`, `title`, `description`) VALUES
(1, 1, 5, 'Desktops', 'This is all kind of desktop computers.'),
(2, 1, 7, 'Desktops', 'This is all kind of desktop computers.'),
(4, 2, 5, 'Components', 'All kinds of components.'),
(5, 15, 5, 'Accessories', 'These are accessories things'),



-- --------------------------------------------------------

--
-- Table structure for table `yc_country`
--

CREATE TABLE IF NOT EXISTS `yc_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_format` text COLLATE utf8_bin NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=240 ;

--
-- Dumping data for table `yc_country`
--

INSERT INTO `yc_country` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 2),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', 'updated.', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 2),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TP', 'TMP', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(73, 'France', 'FR', 'FRA', '', 0, 1),
(74, 'France, Metropolitan', 'FX', 'FXX', '', 0, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', '{company}\r\n{firstname} {lastname}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 0, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'Korea, Republic of', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'Macedonia', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 2),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city} {postcode}\r\n{zone}\r\n{country}', 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 2),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '', 0, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 2),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States', 'US', 'USA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city}, {zone} {postcode}\r\n{country}', 0, 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(236, 'Yugoslavia', 'YU', 'YUG', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yc_currency`
--

CREATE TABLE IF NOT EXISTS `yc_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `code` varchar(3) NOT NULL,
  `sign` varchar(1) CHARACTER SET utf8 NOT NULL,
  `multiplier` float(6,5) NOT NULL,
  `status` enum('Active','Passive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yc_currency`
--

INSERT INTO `yc_currency` (`id`, `name`, `code`, `sign`, `multiplier`, `status`) VALUES
(1, 'US Dollar', 'USD', '$', 1.00000, 'Active'),
(2, 'Pound Sterling', 'GBP', '£', 0.61970, 'Active'),
(3, 'Euro', 'EUR', '€', 0.75950, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `yc_customer`
--

CREATE TABLE IF NOT EXISTS `yc_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `yc_customer`
--

INSERT INTO `yc_customer` (`customer_id`, `user_id`, `address_id`, `delivery_address_id`, `billing_address_id`, `email`) VALUES
(1, 2, 2, 3, 4, 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `yc_dump`
--

CREATE TABLE IF NOT EXISTS `yc_dump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `middle` text NOT NULL,
  `last` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yc_dump`
--

INSERT INTO `yc_dump` (`id`, `middle`, `last`) VALUES
(1, 'a:61:{s:5:"TOKEN";s:20:"EC-43X21406S2213433Y";s:14:"CHECKOUTSTATUS";s:25:"PaymentActionNotInitiated";s:9:"TIMESTAMP";s:20:"2012-04-24T08:29:38Z";s:13:"CORRELATIONID";s:13:"8618c01f9457b";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:7:"PAYERID";s:13:"2U6NP6TF94M98";s:11:"PAYERSTATUS";s:8:"verified";s:9:"FIRSTNAME";s:10:"Ramkrishna";s:8:"LASTNAME";s:10:"Chaulagain";s:11:"COUNTRYCODE";s:2:"US";s:13:"ADDRESSSTATUS";s:9:"Confirmed";s:12:"CURRENCYCODE";s:3:"USD";s:3:"AMT";s:6:"131.00";s:7:"ITEMAMT";s:6:"123.00";s:11:"SHIPPINGAMT";s:4:"8.00";s:11:"HANDLINGAMT";s:4:"0.00";s:6:"TAXAMT";s:4:"2.00";s:12:"INSURANCEAMT";s:4:"1.00";s:11:"SHIPDISCAMT";s:5:"-3.00";s:22:"INSURANCEOPTIONOFFERED";s:4:"true";s:7:"L_NAME0";s:4:"adsf";s:6:"L_QTY0";s:1:"1";s:9:"L_TAXAMT0";s:4:"0.00";s:6:"L_AMT0";s:6:"123.00";s:18:"L_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:18:"L_ITEMLENGTHVALUE0";s:10:"   0.00000";s:17:"L_ITEMWIDTHVALUE0";s:10:"   0.00000";s:18:"L_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:23:"SHIPPINGCALCULATIONMODE";s:8:"FlatRate";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:4:"true";s:20:"SHIPPINGOPTIONAMOUNT";s:4:"8.00";s:18:"SHIPPINGOPTIONNAME";s:7:"UPS Air";s:29:"PAYMENTREQUEST_0_CURRENCYCODE";s:3:"USD";s:20:"PAYMENTREQUEST_0_AMT";s:6:"131.00";s:24:"PAYMENTREQUEST_0_ITEMAMT";s:6:"123.00";s:28:"PAYMENTREQUEST_0_SHIPPINGAMT";s:4:"8.00";s:28:"PAYMENTREQUEST_0_HANDLINGAMT";s:4:"0.00";s:23:"PAYMENTREQUEST_0_TAXAMT";s:4:"2.00";s:29:"PAYMENTREQUEST_0_INSURANCEAMT";s:4:"1.00";s:28:"PAYMENTREQUEST_0_SHIPDISCAMT";s:5:"-3.00";s:39:"PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED";s:4:"true";s:27:"PAYMENTREQUEST_0_SHIPTONAME";s:21:"Ramkrishna Chaulagain";s:29:"PAYMENTREQUEST_0_SHIPTOSTREET";s:9:"1 Main St";s:27:"PAYMENTREQUEST_0_SHIPTOCITY";s:8:"San Jose";s:28:"PAYMENTREQUEST_0_SHIPTOSTATE";s:2:"CA";s:26:"PAYMENTREQUEST_0_SHIPTOZIP";s:5:"95131";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE";s:2:"US";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME";s:13:"United States";s:24:"L_PAYMENTREQUEST_0_NAME0";s:4:"adsf";s:23:"L_PAYMENTREQUEST_0_QTY0";s:1:"1";s:26:"L_PAYMENTREQUEST_0_TAXAMT0";s:4:"0.00";s:23:"L_PAYMENTREQUEST_0_AMT0";s:6:"123.00";s:35:"L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0";s:10:"   0.00000";s:34:"L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:30:"PAYMENTREQUESTINFO_0_ERRORCODE";s:1:"0";s:6:"submit";s:6:"Submit";}', 'a:36:{s:5:"TOKEN";s:20:"EC-43X21406S2213433Y";s:28:"SUCCESSPAGEREDIRECTREQUESTED";s:5:"false";s:9:"TIMESTAMP";s:20:"2012-04-24T08:29:51Z";s:13:"CORRELATIONID";s:13:"91a611255abc7";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:13:"TRANSACTIONID";s:17:"2VJ8795180101671D";s:15:"TRANSACTIONTYPE";s:15:"expresscheckout";s:11:"PAYMENTTYPE";s:7:"instant";s:9:"ORDERTIME";s:20:"2012-04-24T08:29:48Z";s:3:"AMT";s:6:"128.00";s:6:"FEEAMT";s:4:"4.01";s:6:"TAXAMT";s:4:"0.00";s:12:"CURRENCYCODE";s:3:"USD";s:13:"PAYMENTSTATUS";s:7:"Pending";s:13:"PENDINGREASON";s:13:"paymentreview";s:10:"REASONCODE";s:4:"None";s:21:"PROTECTIONELIGIBILITY";s:10:"Ineligible";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:5:"false";s:27:"PAYMENTINFO_0_TRANSACTIONID";s:17:"2VJ8795180101671D";s:29:"PAYMENTINFO_0_TRANSACTIONTYPE";s:15:"expresscheckout";s:25:"PAYMENTINFO_0_PAYMENTTYPE";s:7:"instant";s:23:"PAYMENTINFO_0_ORDERTIME";s:20:"2012-04-24T08:29:48Z";s:17:"PAYMENTINFO_0_AMT";s:6:"128.00";s:20:"PAYMENTINFO_0_FEEAMT";s:4:"4.01";s:20:"PAYMENTINFO_0_TAXAMT";s:4:"0.00";s:26:"PAYMENTINFO_0_CURRENCYCODE";s:3:"USD";s:27:"PAYMENTINFO_0_PAYMENTSTATUS";s:7:"Pending";s:27:"PAYMENTINFO_0_PENDINGREASON";s:13:"paymentreview";s:24:"PAYMENTINFO_0_REASONCODE";s:4:"None";s:35:"PAYMENTINFO_0_PROTECTIONELIGIBILITY";s:10:"Ineligible";s:39:"PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE";s:4:"None";s:23:"PAYMENTINFO_0_ERRORCODE";s:1:"0";s:17:"PAYMENTINFO_0_ACK";s:7:"Success";}'),
(2, 'a:69:{s:5:"TOKEN";s:20:"EC-42N59162JY110594P";s:14:"CHECKOUTSTATUS";s:25:"PaymentActionNotInitiated";s:9:"TIMESTAMP";s:20:"2012-04-24T10:27:43Z";s:13:"CORRELATIONID";s:13:"8ed21645e8b49";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:5:"EMAIL";s:30:"buy1_1332676339_per@arhant.com";s:7:"PAYERID";s:13:"2U6NP6TF94M98";s:11:"PAYERSTATUS";s:8:"verified";s:9:"FIRSTNAME";s:10:"Ramkrishna";s:8:"LASTNAME";s:10:"Chaulagain";s:11:"COUNTRYCODE";s:2:"US";s:10:"SHIPTONAME";s:21:"Ramkrishna Chaulagain";s:12:"SHIPTOSTREET";s:9:"1 Main St";s:10:"SHIPTOCITY";s:8:"San Jose";s:11:"SHIPTOSTATE";s:2:"CA";s:9:"SHIPTOZIP";s:5:"95131";s:17:"SHIPTOCOUNTRYCODE";s:2:"US";s:17:"SHIPTOCOUNTRYNAME";s:13:"United States";s:13:"ADDRESSSTATUS";s:9:"Confirmed";s:12:"CURRENCYCODE";s:3:"USD";s:3:"AMT";s:6:"131.00";s:7:"ITEMAMT";s:6:"123.00";s:11:"SHIPPINGAMT";s:4:"8.00";s:11:"HANDLINGAMT";s:4:"0.00";s:6:"TAXAMT";s:4:"2.00";s:12:"INSURANCEAMT";s:4:"1.00";s:11:"SHIPDISCAMT";s:5:"-3.00";s:22:"INSURANCEOPTIONOFFERED";s:4:"true";s:7:"L_NAME0";s:15:"Moniter english";s:6:"L_QTY0";s:1:"1";s:9:"L_TAXAMT0";s:4:"0.00";s:6:"L_AMT0";s:6:"123.00";s:18:"L_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:18:"L_ITEMLENGTHVALUE0";s:10:"   0.00000";s:17:"L_ITEMWIDTHVALUE0";s:10:"   0.00000";s:18:"L_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:23:"SHIPPINGCALCULATIONMODE";s:8:"FlatRate";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:4:"true";s:20:"SHIPPINGOPTIONAMOUNT";s:4:"8.00";s:18:"SHIPPINGOPTIONNAME";s:7:"UPS Air";s:29:"PAYMENTREQUEST_0_CURRENCYCODE";s:3:"USD";s:20:"PAYMENTREQUEST_0_AMT";s:6:"131.00";s:24:"PAYMENTREQUEST_0_ITEMAMT";s:6:"123.00";s:28:"PAYMENTREQUEST_0_SHIPPINGAMT";s:4:"8.00";s:28:"PAYMENTREQUEST_0_HANDLINGAMT";s:4:"0.00";s:23:"PAYMENTREQUEST_0_TAXAMT";s:4:"2.00";s:29:"PAYMENTREQUEST_0_INSURANCEAMT";s:4:"1.00";s:28:"PAYMENTREQUEST_0_SHIPDISCAMT";s:5:"-3.00";s:39:"PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED";s:4:"true";s:27:"PAYMENTREQUEST_0_SHIPTONAME";s:21:"Ramkrishna Chaulagain";s:29:"PAYMENTREQUEST_0_SHIPTOSTREET";s:9:"1 Main St";s:27:"PAYMENTREQUEST_0_SHIPTOCITY";s:8:"San Jose";s:28:"PAYMENTREQUEST_0_SHIPTOSTATE";s:2:"CA";s:26:"PAYMENTREQUEST_0_SHIPTOZIP";s:5:"95131";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE";s:2:"US";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME";s:13:"United States";s:24:"L_PAYMENTREQUEST_0_NAME0";s:15:"Moniter english";s:23:"L_PAYMENTREQUEST_0_QTY0";s:1:"1";s:26:"L_PAYMENTREQUEST_0_TAXAMT0";s:4:"0.00";s:23:"L_PAYMENTREQUEST_0_AMT0";s:6:"123.00";s:35:"L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0";s:10:"   0.00000";s:34:"L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:30:"PAYMENTREQUESTINFO_0_ERRORCODE";s:1:"0";s:6:"submit";s:15:"Pay with Paypal";}', 'a:36:{s:5:"TOKEN";s:20:"EC-42N59162JY110594P";s:28:"SUCCESSPAGEREDIRECTREQUESTED";s:5:"false";s:9:"TIMESTAMP";s:20:"2012-04-24T10:27:58Z";s:13:"CORRELATIONID";s:13:"11fca41d1eb5c";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:13:"TRANSACTIONID";s:17:"6VB316538A511980F";s:15:"TRANSACTIONTYPE";s:15:"expresscheckout";s:11:"PAYMENTTYPE";s:7:"instant";s:9:"ORDERTIME";s:20:"2012-04-24T10:27:55Z";s:3:"AMT";s:6:"128.00";s:6:"FEEAMT";s:4:"4.01";s:6:"TAXAMT";s:4:"0.00";s:12:"CURRENCYCODE";s:3:"USD";s:13:"PAYMENTSTATUS";s:7:"Pending";s:13:"PENDINGREASON";s:13:"paymentreview";s:10:"REASONCODE";s:4:"None";s:21:"PROTECTIONELIGIBILITY";s:10:"Ineligible";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:5:"false";s:27:"PAYMENTINFO_0_TRANSACTIONID";s:17:"6VB316538A511980F";s:29:"PAYMENTINFO_0_TRANSACTIONTYPE";s:15:"expresscheckout";s:25:"PAYMENTINFO_0_PAYMENTTYPE";s:7:"instant";s:23:"PAYMENTINFO_0_ORDERTIME";s:20:"2012-04-24T10:27:55Z";s:17:"PAYMENTINFO_0_AMT";s:6:"128.00";s:20:"PAYMENTINFO_0_FEEAMT";s:4:"4.01";s:20:"PAYMENTINFO_0_TAXAMT";s:4:"0.00";s:26:"PAYMENTINFO_0_CURRENCYCODE";s:3:"USD";s:27:"PAYMENTINFO_0_PAYMENTSTATUS";s:7:"Pending";s:27:"PAYMENTINFO_0_PENDINGREASON";s:13:"paymentreview";s:24:"PAYMENTINFO_0_REASONCODE";s:4:"None";s:35:"PAYMENTINFO_0_PROTECTIONELIGIBILITY";s:10:"Ineligible";s:39:"PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE";s:4:"None";s:23:"PAYMENTINFO_0_ERRORCODE";s:1:"0";s:17:"PAYMENTINFO_0_ACK";s:7:"Success";}'),
(3, 'a:69:{s:5:"TOKEN";s:20:"EC-0A2451117X6287033";s:14:"CHECKOUTSTATUS";s:25:"PaymentActionNotInitiated";s:9:"TIMESTAMP";s:20:"2012-04-24T11:30:34Z";s:13:"CORRELATIONID";s:12:"cd36edeaf558";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:5:"EMAIL";s:30:"buy1_1332676339_per@arhant.com";s:7:"PAYERID";s:13:"2U6NP6TF94M98";s:11:"PAYERSTATUS";s:8:"verified";s:9:"FIRSTNAME";s:10:"Ramkrishna";s:8:"LASTNAME";s:10:"Chaulagain";s:11:"COUNTRYCODE";s:2:"US";s:10:"SHIPTONAME";s:21:"Ramkrishna Chaulagain";s:12:"SHIPTOSTREET";s:9:"1 Main St";s:10:"SHIPTOCITY";s:8:"San Jose";s:11:"SHIPTOSTATE";s:2:"CA";s:9:"SHIPTOZIP";s:5:"95131";s:17:"SHIPTOCOUNTRYCODE";s:2:"US";s:17:"SHIPTOCOUNTRYNAME";s:13:"United States";s:13:"ADDRESSSTATUS";s:9:"Confirmed";s:12:"CURRENCYCODE";s:3:"USD";s:3:"AMT";s:6:"132.00";s:7:"ITEMAMT";s:6:"124.00";s:11:"SHIPPINGAMT";s:4:"8.00";s:11:"HANDLINGAMT";s:4:"0.00";s:6:"TAXAMT";s:4:"2.00";s:12:"INSURANCEAMT";s:4:"1.00";s:11:"SHIPDISCAMT";s:5:"-3.00";s:22:"INSURANCEOPTIONOFFERED";s:4:"true";s:7:"L_NAME0";s:4:"asdf";s:6:"L_QTY0";s:1:"1";s:9:"L_TAXAMT0";s:4:"0.00";s:6:"L_AMT0";s:6:"124.00";s:18:"L_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:18:"L_ITEMLENGTHVALUE0";s:10:"   0.00000";s:17:"L_ITEMWIDTHVALUE0";s:10:"   0.00000";s:18:"L_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:23:"SHIPPINGCALCULATIONMODE";s:8:"FlatRate";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:4:"true";s:20:"SHIPPINGOPTIONAMOUNT";s:4:"8.00";s:18:"SHIPPINGOPTIONNAME";s:7:"UPS Air";s:29:"PAYMENTREQUEST_0_CURRENCYCODE";s:3:"USD";s:20:"PAYMENTREQUEST_0_AMT";s:6:"132.00";s:24:"PAYMENTREQUEST_0_ITEMAMT";s:6:"124.00";s:28:"PAYMENTREQUEST_0_SHIPPINGAMT";s:4:"8.00";s:28:"PAYMENTREQUEST_0_HANDLINGAMT";s:4:"0.00";s:23:"PAYMENTREQUEST_0_TAXAMT";s:4:"2.00";s:29:"PAYMENTREQUEST_0_INSURANCEAMT";s:4:"1.00";s:28:"PAYMENTREQUEST_0_SHIPDISCAMT";s:5:"-3.00";s:39:"PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED";s:4:"true";s:27:"PAYMENTREQUEST_0_SHIPTONAME";s:21:"Ramkrishna Chaulagain";s:29:"PAYMENTREQUEST_0_SHIPTOSTREET";s:9:"1 Main St";s:27:"PAYMENTREQUEST_0_SHIPTOCITY";s:8:"San Jose";s:28:"PAYMENTREQUEST_0_SHIPTOSTATE";s:2:"CA";s:26:"PAYMENTREQUEST_0_SHIPTOZIP";s:5:"95131";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE";s:2:"US";s:34:"PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME";s:13:"United States";s:24:"L_PAYMENTREQUEST_0_NAME0";s:4:"asdf";s:23:"L_PAYMENTREQUEST_0_QTY0";s:1:"1";s:26:"L_PAYMENTREQUEST_0_TAXAMT0";s:4:"0.00";s:23:"L_PAYMENTREQUEST_0_AMT0";s:6:"124.00";s:35:"L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0";s:10:"   0.00000";s:34:"L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0";s:10:"   0.00000";s:35:"L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0";s:10:"   0.00000";s:30:"PAYMENTREQUESTINFO_0_ERRORCODE";s:1:"0";s:6:"submit";s:15:"Pay with Paypal";}', 'a:36:{s:5:"TOKEN";s:20:"EC-0A2451117X6287033";s:28:"SUCCESSPAGEREDIRECTREQUESTED";s:5:"false";s:9:"TIMESTAMP";s:20:"2012-04-24T11:31:49Z";s:13:"CORRELATIONID";s:13:"a269b1f6371ea";s:3:"ACK";s:7:"Success";s:7:"VERSION";s:4:"65.1";s:5:"BUILD";s:7:"2840849";s:13:"TRANSACTIONID";s:17:"22M809885M978240X";s:15:"TRANSACTIONTYPE";s:15:"expresscheckout";s:11:"PAYMENTTYPE";s:7:"instant";s:9:"ORDERTIME";s:20:"2012-04-24T11:31:47Z";s:3:"AMT";s:6:"129.00";s:6:"FEEAMT";s:4:"4.04";s:6:"TAXAMT";s:4:"0.00";s:12:"CURRENCYCODE";s:3:"USD";s:13:"PAYMENTSTATUS";s:7:"Pending";s:13:"PENDINGREASON";s:13:"paymentreview";s:10:"REASONCODE";s:4:"None";s:21:"PROTECTIONELIGIBILITY";s:10:"Ineligible";s:23:"INSURANCEOPTIONSELECTED";s:4:"true";s:23:"SHIPPINGOPTIONISDEFAULT";s:5:"false";s:27:"PAYMENTINFO_0_TRANSACTIONID";s:17:"22M809885M978240X";s:29:"PAYMENTINFO_0_TRANSACTIONTYPE";s:15:"expresscheckout";s:25:"PAYMENTINFO_0_PAYMENTTYPE";s:7:"instant";s:23:"PAYMENTINFO_0_ORDERTIME";s:20:"2012-04-24T11:31:47Z";s:17:"PAYMENTINFO_0_AMT";s:6:"129.00";s:20:"PAYMENTINFO_0_FEEAMT";s:4:"4.04";s:20:"PAYMENTINFO_0_TAXAMT";s:4:"0.00";s:26:"PAYMENTINFO_0_CURRENCYCODE";s:3:"USD";s:27:"PAYMENTINFO_0_PAYMENTSTATUS";s:7:"Pending";s:27:"PAYMENTINFO_0_PENDINGREASON";s:13:"paymentreview";s:24:"PAYMENTINFO_0_REASONCODE";s:4:"None";s:35:"PAYMENTINFO_0_PROTECTIONELIGIBILITY";s:10:"Ineligible";s:39:"PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE";s:4:"None";s:23:"PAYMENTINFO_0_ERRORCODE";s:1:"0";s:17:"PAYMENTINFO_0_ACK";s:7:"Success";}');

-- --------------------------------------------------------

--
-- Table structure for table `yc_image`
--

CREATE TABLE IF NOT EXISTS `yc_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `yc_image`
--

INSERT INTO `yc_image` (`id`, `title`, `filename`, `product_id`, `featured`) VALUES
(4, 'adsf', 'adsf_4.jpg', 4, 0),
(5, 'asdf', 'asdf_5.jpg', 5, 0),
(7, 'asdf', 'asdf_6.jpg', 6, 0),
(8, 'asdf', 'asdf_6.jpg', 6, 0),
(9, 'Moniter english', 'moniter_english_7.jpg', 7, 0),
(10, 'new product eng.', 'new_product_eng._8.jpg', 8, 0),
(11, 'asdf', 'asdf_9.jpg', 9, 0),
(12, 'afsfadsf', 'afsfadsf_11.jpg', 11, 0),
(14, 'Dami Camera', 'canon_eos_5d_2.jpg', 0, 1),
(15, 'Dami mobile', 'iphone_6.jpg', 0, 1),
(17, 'Dami Camera', 'canon_eos_5d_3.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yc_language`
--

CREATE TABLE IF NOT EXISTS `yc_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `code` varchar(8) NOT NULL,
  `status` enum('Active','Passive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yc_language`
--

INSERT INTO `yc_language` (`id`, `name`, `code`, `status`) VALUES
(5, 'English', 'en', 'Active'),
(7, 'Arabic', 'ar', 'Active'),
(8, 'Nepalese', 'np', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `yc_order`
--

CREATE TABLE IF NOT EXISTS `yc_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_value` float NOT NULL,
  `ordering_date` varchar(32) NOT NULL,
  `ordering_done` tinyint(1) DEFAULT NULL,
  `ordering_confirmed` tinyint(1) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `yc_order`
--

INSERT INTO `yc_order` (`order_id`, `customer_id`, `delivery_address_id`, `billing_address_id`, `language_id`, `currency_id`, `currency_value`, `ordering_date`, `ordering_done`, `ordering_confirmed`, `payment_method`, `shipping_method`, `comment`) VALUES
(1, 1, 3, 4, 0, 0, 0, '2012-04-23 08:20:25', 0, 0, 4, 2, 'Payment Method Comment:ytryutyut,\nDelivery Method Comment:rtdfgfgfhff'),
(2, 2, 5, 6, 0, 0, 0, '2012-04-23 08:23:53', 0, 0, 4, 2, 'Payment Method Comment:vcb,\nDelivery Method Comment:vcb'),
(3, 3, 10, 11, 0, 0, 0, '2012-04-23 14:37:55', 0, 0, 1, 1, 'Payment Method Comment:asdf,\nDelivery Method Comment:asdf'),
(4, 4, 12, 13, 0, 0, 0, '2012-04-24 09:23:29', 0, 0, 5, 1, 'Payment Method Comment:adf,\nDelivery Method Comment:adf'),
(5, 5, 14, 15, 0, 0, 0, '2012-04-24 10:04:47', 1, 0, 1, 1, 'Payment Method Comment:asdffasdf,\nDelivery Method Comment:asdasdf'),
(6, 6, 16, 17, 0, 0, 0, '2012-04-24 10:05:36', 0, 0, 5, 1, 'Payment Method Comment:adasdfdsfasdfasdf,\nDelivery Method Comment:asdfasdf'),
(7, 7, 18, 19, 0, 0, 0, '2012-04-24 10:09:32', 0, 0, 5, 1, 'Payment Method Comment:dsf,\nDelivery Method Comment:adsf'),
(8, 8, 20, 21, 5, 3, 0.7595, '2012-04-24 11:50:34', 0, 0, 1, 1, 'Payment Method Comment:asdf,\nDelivery Method Comment:asdf'),
(9, 9, 22, 23, 5, 3, 0.7595, '2012-04-24 12:24:58', 0, 0, 1, 1, 'Payment Method Comment:adsf,\nDelivery Method Comment:asdf'),
(10, 10, 24, 25, 5, 2, 0.6197, '2012-04-24 12:25:35', 0, 0, 1, 1, 'Payment Method Comment:adsfadfasdf,\nDelivery Method Comment:asdfadsfasdfasdf'),
(11, 11, 26, 27, 5, 2, 0.6197, '2012-04-24 12:26:14', 0, 1, 5, 1, 'Payment Method Comment:asdadfsfds,\nDelivery Method Comment:asdasdf'),
(12, 12, 28, 29, 5, 2, 0.6197, '2012-04-24 13:29:56', 0, 1, 5, 1, 'Payment Method Comment:asdf,\nDelivery Method Comment:asdf'),
(13, 13, 30, 31, 5, 1, 1, '2012-04-25 12:47:49', 0, 0, 1, 2, 'Payment Method Comment:asdfasdfasdf,\nDelivery Method Comment:asdfasdf'),
(14, 14, 32, 33, 8, 1, 1, '2012-04-26 11:04:30', 0, 0, 1, 1, 'Payment Method Comment:asasfasf,\nDelivery Method Comment:asdffdf');

-- --------------------------------------------------------

--
-- Table structure for table `yc_order_position`
--

CREATE TABLE IF NOT EXISTS `yc_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `yc_order_position`
--

INSERT INTO `yc_order_position` (`id`, `order_id`, `product_id`, `amount`, `specifications`) VALUES
(1, 1, 4, 3, ''),
(2, 1, 5, 2, ''),
(3, 2, 5, 4, ''),
(4, 3, 3, 1, ''),
(5, 4, 3, 1, ''),
(6, 5, 3, 1, ''),
(7, 6, 3, 1, ''),
(8, 7, 3, 1, ''),
(9, 8, 4, 1, ''),
(10, 9, 3, 1, ''),
(11, 10, 5, 1, ''),
(12, 11, 7, 1, ''),
(13, 12, 3, 1, ''),
(14, 13, 4, 1, ''),
(15, 14, 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `yc_payment_method`
--

CREATE TABLE IF NOT EXISTS `yc_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `yc_payment_method`
--

INSERT INTO `yc_payment_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'cash', 'You pay cash', 1, 0),
(2, 'advance Payment', 'You pay in advance, we deliver', 1, 0),
(3, 'cash on delivery', 'You pay when we deliver', 1, 0),
(4, 'invoice', 'We deliver and send a invoice', 1, 0),
(5, 'Paypal', 'Pay With Paypal', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yc_paypal_config`
--

CREATE TABLE IF NOT EXISTS `yc_paypal_config` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `VALUE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NAME` (`NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `yc_paypal_config`
--

INSERT INTO `yc_paypal_config` (`ID`, `NAME`, `VALUE`) VALUES
(1, 'ACTION_TEST', 'https://www.sandbox.paypal.com/us/cgi-bin/webscr'),
(2, 'ACTION_LIVE', 'https://www.paypal.com/us/cgi-bin/webscr'),
(3, 'TEST_MODE', 'TRUE'),
(4, 'DEFAULT_AMOUNT', '10'),
(5, 'MAX_AMOUNT', '70'),
(6, 'MIN_AMOUNT', '5'),
(7, 'BUSINESS_EMAIL', 'Sell1_1327991285_biz@gmail.com'),
(8, 'CURRENCY_CODE', 'USD'),
(9, 'SUCCESS_RETURN', 'http://www.silaal.com/lab/autods/index.php/payments/default/paypalipn'),
(10, 'CANCEL_RETURN', 'http://www.silaal.com/lab/autods/index.php/payments/default/paypalipn'),
(11, 'NOTIFY_URL', 'http://www.silaal.com/lab/autods/index.php/payments/default/paypalipn'),
(12, 'ITEM_NAME', 'LOAD ACCOUNT'),
(13, 'PACKAGES_1', '15'),
(14, 'PACKAGES_2', '35'),
(15, 'PACKAGES_3', '120'),
(16, 'API_USERNAME', 'Sell2_1327991689_biz_api1.gmail.com'),
(17, 'API_PASSWORD', '1327991728'),
(18, 'API_SIGNATURE', 'AP.HG8b.1CBMuE60e8..FtXliJQWA4XO5Ru2sPVm3ryFYgyj2VZtH5rn');

-- --------------------------------------------------------

--
-- Table structure for table `yc_products`
--

CREATE TABLE IF NOT EXISTS `yc_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` varchar(45) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `language` varchar(45) DEFAULT NULL,
  `specifications` text,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_category` (`category_id`),
  KEY `FK_yc_products` (`tax_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `yc_products`
--

INSERT INTO `yc_products` (`product_id`, `category_id`, `tax_id`, `title`, `description`, `price`, `quantity`, `language`, `specifications`) VALUES
(4, 1, 1, 'adsf', 'adsf', '123', 100, '5', '{"Size":"12","Color":"","Some random attribute":"","Material":"","Specific number":"","some id":""}'),
(5, 1, 1, 'asdf', 'asdf', '123', 100, '5', '{"Size":"asdf","Color":"asdf","Some random attribute":"asdf","Material":"asdf","Specific number":"asdf","some id":"asdf"}'),
(6, 1, 1, 'asdf', 'asdf', '123', 100, '5', '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","some id":""}'),
(7, 1, 1, 'Moniter english', 'Moniter english', '123', 100, '5', '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","some id":""}'),
(8, 1, 1, 'new product eng.', 'new product eng.', '123', 100, '5', '{"Size":"adf","Color":"asdf","Some random attribute":"adf","Material":"asdff","Specific number":"asdff","some id":"asdf"}'),
(9, 1, 1, 'asdf', 'asdf', '123', 100, '5', '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","some id":""}'),
(11, 1, 1, 'asdfsdf', 'asdfsdfsdf', '', 100, '5', '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","some id":""}');

-- --------------------------------------------------------

--
-- Table structure for table `yc_product_counter`
--

CREATE TABLE IF NOT EXISTS `yc_product_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0',
  `purchase_counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `yc_product_counter`
--

INSERT INTO `yc_product_counter` (`id`, `product_id`, `view_counter`, `purchase_counter`) VALUES
(4, 4, 5, 0),
(5, 5, 27, 0),
(6, 6, 0, 0),
(7, 7, 0, 0),
(8, 8, 0, 0),
(9, 9, 0, 0),
(11, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yc_product_description`
--

CREATE TABLE IF NOT EXISTS `yc_product_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `yc_product_description`
--

INSERT INTO `yc_product_description` (`id`, `product_id`, `language_id`, `title`, `description`) VALUES
(9, 4, 5, 'adsf', 'adsf'),
(10, 4, 6, 'adsf', 'adsf'),
(11, 4, 7, 'asdf', 'asdf'),
(16, 5, 5, 'asdf', 'asdf');


-- --------------------------------------------------------

--
-- Table structure for table `yc_product_specification`
--

CREATE TABLE IF NOT EXISTS `yc_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_user_input` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `yc_product_specification`
--

INSERT INTO `yc_product_specification` (`id`, `title`, `is_user_input`, `required`) VALUES
(1, 'Size', 0, 1),
(2, 'Color', 0, 0),
(3, 'Some random attribute', 0, 0),
(4, 'Material', 0, 1),
(5, 'Specific number', 1, 1),
(6, 'some id', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yc_product_variation`
--

CREATE TABLE IF NOT EXISTS `yc_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_yc_product_variation` (`specification_id`),
  KEY `FK_yc_product_variation1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `yc_product_variation`
--


-- --------------------------------------------------------

--
-- Table structure for table `yc_shipping_method`
--

CREATE TABLE IF NOT EXISTS `yc_shipping_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yc_shipping_method`
--

INSERT INTO `yc_shipping_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', 1, 2.99),
(2, 'Delivery by road', 'This method will use our vehicle to transport the good.', 1, 5.99);

-- --------------------------------------------------------

--
-- Table structure for table `yc_site_config`
--

CREATE TABLE IF NOT EXISTS `yc_site_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yc_site_config`
--

INSERT INTO `yc_site_config` (`id`, `name`, `value`) VALUES
(1, 'frontend_name', 'Your Store'),
(2, 'CATEGORY_DEPTH', '3'),
(3, 'CART_PRODUCT_COUNT', '100'),
(4, 'Facebook', 'http://www.facebook.com/'),
(5, 'Youtube', 'http://www.youtube.com/'),
(6, 'Twitter', 'http://www.twitter.com/'),
(7, 'RSS', 'http://www.waseemsite.com'),
(8, 'Copy', 'http://www.waseemsite.com/');

-- --------------------------------------------------------

--
-- Table structure for table `yc_static_pages`
--

CREATE TABLE IF NOT EXISTS `yc_static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `status` enum('Active','Passive') NOT NULL,
  `created` varchar(32) NOT NULL,
  `modified` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `yc_static_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `yc_tax`
--

CREATE TABLE IF NOT EXISTS `yc_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yc_tax`
--

INSERT INTO `yc_tax` (`id`, `title`, `percent`) VALUES
(1, '19%', 19),
(2, '7%', 7),
(3, '12%', 12);

-- --------------------------------------------------------

--
-- Table structure for table `yc_user`
--

CREATE TABLE IF NOT EXISTS `yc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yc_user`
--

INSERT INTO `yc_user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `address_id`, `ip`, `status`, `date_added`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'test', 'Chaulagain', 'test@gmail.com', 1, '127.0.0.1', 1, '2012-04-23 07:30:05'),
(2, 'sudi', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'gautam', 'test@yahoo.com', 2, '192.168.50.151', 1, '2012-04-23 08:18:11'),
(3, 'sudichhyagautam', 'e10adc3949ba59abbe56e057f20f883e', 'sfdg', 'fgsf', 's@yahoo.com', 7, '192.168.50.151', 1, '2012-04-23 08:28:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
