-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 03:20 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiocl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_content`
--

CREATE TABLE `cms_content` (
  `content_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_content`
--

INSERT INTO `cms_content` (`content_id`, `subcat_id`, `content`, `status`) VALUES
(6, 1, '<p>ghgh</p>\n', 0),
(7, 2, '<p>fsafsafsd</p>\n', 0),
(8, 3, '<p>ok now</p>\n', 0),
(9, 1, '<p>ghgh</p>\n', 0),
(10, 1, '<p>ghgh</p>\n', 0),
(11, 1, '<p>ghgh</p>\n', 0),
(12, 1, '<p>ghgh</p>\n', 0),
(13, 1, '<p>ghgh</p>\n', 0),
(14, 1, '<p>ghgh</p>\n', 0),
(15, 1, '<p>ghgh</p>\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_type`
--

CREATE TABLE `content_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_type`
--

INSERT INTO `content_type` (`id`, `name`) VALUES
(1, 'ckeditor'),
(2, 'upload');

-- --------------------------------------------------------

--
-- Table structure for table `Contracts`
--

CREATE TABLE `Contracts` (
  `Contracts_id` int(11) NOT NULL,
  `tendor_code` varchar(500) NOT NULL,
  `tendor_date` varchar(500) NOT NULL,
  `nature_work` varchar(500) NOT NULL,
  `mode_tendor_enquiry` varchar(500) NOT NULL,
  `date_of_publication` varchar(500) NOT NULL,
  `type_bidding` varchar(500) NOT NULL,
  `due_date_tendor` varchar(500) NOT NULL,
  `no_of_tendor` varchar(500) NOT NULL,
  `no_of_parties` varchar(500) NOT NULL,
  `name_of_parties` varchar(500) NOT NULL,
  `no_of_n_parties` varchar(500) NOT NULL,
  `name_of_n_parties` varchar(500) NOT NULL,
  `contracta_awared` varchar(500) NOT NULL,
  `contracts_no` varchar(500) NOT NULL,
  `contracts_date` varchar(500) NOT NULL,
  `name_of_contractor` varchar(500) NOT NULL,
  `value_of_contractor` varchar(500) NOT NULL,
  `schulde` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `departments_id` varchar(500) NOT NULL,
  `unit_id` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `corrigendum`
--

CREATE TABLE `corrigendum` (
  `corrigendum_id` int(11) NOT NULL,
  `tender_id` varchar(500) NOT NULL,
  `corrigendum_code` varchar(500) NOT NULL,
  `tendor_code` varchar(500) NOT NULL,
  `tender_name` varchar(500) NOT NULL,
  `tender_path` varchar(500) NOT NULL,
  `units_id` varchar(500) NOT NULL,
  `deparments_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `corrigendum_date` varchar(500) NOT NULL,
  `corrigendum_due_date` varchar(500) NOT NULL,
  `corrigendum_due_time` varchar(500) NOT NULL,
  `corrigendum_status` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corrigendum`
--

INSERT INTO `corrigendum` (`corrigendum_id`, `tender_id`, `corrigendum_code`, `tendor_code`, `tender_name`, `tender_path`, `units_id`, `deparments_id`, `username`, `corrigendum_date`, `corrigendum_due_date`, `corrigendum_due_time`, `corrigendum_status`, `date`, `time`) VALUES
(5, '21', 'ASHSHSH/232/1928', 'Testing/12345/189a', 'Testor', 'assets_admin/dist/img/corrigendum/SECL WAN TENDER (5).pdf', '4', '3 ', 'bang_user', '2015-10-30', '20015-10-30', '20016-11-23', '1', '2015-10-07', '15:07:50'),
(6, '17', 'crp/isit/corri-1', 'crp/ISIT/AMC-1', 'Mobile Application EoI', 'assets_admin/dist/img/corrigendum/SECL WAN TENDER (5).pdf', '4', '3 ', 'bang_user', '2015-09-15', '2015-09-10', '5:00am', '0', '2015-10-07', '15:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departments_id` int(11) NOT NULL,
  `departments_name` varchar(500) NOT NULL,
  `unit_id` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departments_id`, `departments_name`, `unit_id`) VALUES
(1, 'abc', '1'),
(4, 'MM', '4'),
(5, 'PR', '4'),
(6, 'MKTG', '6'),
(7, 'IS & IT', '6'),
(8, 'Plant', '4'),
(9, 'Bengaluru', '5'),
(10, 'Bengaluru', '13'),
(11, 'Kolkata', '13'),
(12, 'Chennai', '13'),
(13, 'Hyderabad', '13'),
(14, 'Kochi', '13'),
(15, 'Mumbai', '13'),
(16, 'Bhubaneswar', '13'),
(17, 'Lucknow', '13'),
(18, 'Delhi', '13'),
(19, 'Plant', '12'),
(20, 'VSAT', '12'),
(21, 'IS&IT', '7'),
(22, 'test', '14'),
(23, 'B.C. Office', '8'),
(29, 'assaas', '4');

-- --------------------------------------------------------

--
-- Table structure for table `example_1`
--

CREATE TABLE `example_1` (
  `id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `example_1`
--

INSERT INTO `example_1` (`id`, `url`) VALUES
(172, 'c360-9.jpg'),
(176, 'b7b8-18.jpg'),
(177, '3fd6-21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `example_2`
--

CREATE TABLE `example_2` (
  `id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `example_2`
--

INSERT INTO `example_2` (`id`, `url`, `priority`) VALUES
(172, 'eb4f-51.jpg', 3),
(173, 'ac84-52.jpg', 1),
(182, '4b3fe-kle-engg-college.jpg', 4),
(183, '170de-kle-engg-college.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `example_3`
--

CREATE TABLE `example_3` (
  `id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `example_3`
--

INSERT INTO `example_3` (`id`, `url`, `category_id`, `priority`) VALUES
(172, 'a48d-88.jpg', 22, 4),
(173, '5e32-89.jpg', 22, 1),
(174, '7628-90.jpg', 22, 2),
(180, 'd1614-kle-engg-college.jpg', 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `example_4`
--

CREATE TABLE `example_4` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `example_5`
--

CREATE TABLE `example_5` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_permission`
--

CREATE TABLE `master_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_permission`
--

INSERT INTO `master_permission` (`permission_id`, `permission_name`) VALUES
(1, 'Contact Us'),
(2, 'Shareholders Communication'),
(3, 'Awards and Accolades'),
(4, 'Policies'),
(5, 'CSR'),
(6, 'Community Development'),
(7, 'Global Tenders'),
(8, 'Open Tenders'),
(9, 'Limited Tenders'),
(10, 'Short Tenders'),
(11, 'Contracts Concluded'),
(12, 'Status of Bill Payments'),
(13, 'Vendor Registration Procedure'),
(14, 'Works Awarded on Nomination Basis'),
(15, 'House Journal'),
(16, 'KIOCL in News'),
(17, 'Video  gallery -corporate Film'),
(18, 'Photo gallery'),
(19, 'Corporate Brochure'),
(20, 'Orders & Circulars'),
(21, 'Kids World'),
(22, 'Feedback'),
(23, 'Downloads'),
(24, 'Current Openings'),
(25, 'Important Numbers'),
(26, 'Whats New');

-- --------------------------------------------------------

--
-- Table structure for table `regiter`
--

CREATE TABLE `regiter` (
  `register_id` int(11) NOT NULL,
  `email_address` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regiter`
--

INSERT INTO `regiter` (`register_id`, `email_address`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `set_permission`
--

CREATE TABLE `set_permission` (
  `sl_no` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `permissions_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_permission`
--

INSERT INTO `set_permission` (`sl_no`, `dept_id`, `permissions_id`) VALUES
(1, 19, 'a:2:{i:0;a:1:{s:14:"permissions_id";s:1:"2";}i:1;a:1:{s:14:"permissions_id";s:1:"6";}}');

-- --------------------------------------------------------

--
-- Table structure for table `subcat_contents`
--

CREATE TABLE `subcat_contents` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `upload_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat_contents`
--

INSERT INTO `subcat_contents` (`id`, `cat_id`, `subcat_id`, `content`, `upload_url`) VALUES
(2, 5, 8, '<p>sddhkhkdhskd</p>\n', 'nofile'),
(3, 4, 6, '', '13227146_992261424184334_4707844718020376011_n4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_for_content` int(11) NOT NULL,
  `content_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_name`, `parent_id`, `status`, `priority`, `created_date`, `modified_date`, `status_for_content`, `content_type_id`) VALUES
(1, 'Tender', 0, 0, 0, '2016-06-16 13:18:15', '2016-06-16 13:18:15', 0, 0),
(2, 'Global Tenders', 1, 0, 0, '2016-06-16 13:19:06', '2016-06-16 13:19:06', 0, 0),
(3, 'Open Tender', 1, 0, 0, '2016-06-16 13:19:34', '2016-06-16 13:19:34', 0, 0),
(4, 'Gallery', 0, 0, 0, '2016-06-16 13:19:49', '2016-06-16 13:19:49', 0, 2),
(5, 'Contactus', 0, 0, 0, '2016-06-16 13:20:25', '2016-06-16 13:20:25', 0, 1),
(6, 'Photo Gallery', 4, 0, 0, '2016-06-16 13:21:10', '2016-06-16 13:21:10', 0, 0),
(7, 'Video Gallery', 4, 0, 0, '2016-06-16 13:21:30', '2016-06-16 13:21:30', 0, 0),
(8, 'contactus', 5, 0, 0, '2016-06-16 14:17:51', '2016-06-16 14:17:51', 0, 0),
(9, 'dADS', 0, 0, 0, '2016-06-16 17:17:31', '2016-06-16 17:17:31', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_types`
--

CREATE TABLE `tbl_content_types` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_content_types`
--

INSERT INTO `tbl_content_types` (`cat_id`, `cat_name`) VALUES
(1, 'About Us'),
(2, 'Contact Us'),
(3, 'assasasasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gal_type`
--

CREATE TABLE `tbl_gal_type` (
  `gal_type_id` int(11) NOT NULL,
  `gal_name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gal_type`
--

INSERT INTO `tbl_gal_type` (`gal_type_id`, `gal_name`, `status`) VALUES
(1, 'trtrrt', 1),
(2, 'dtdth', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_type`
--

CREATE TABLE `tbl_slider_type` (
  `slider_type_id` int(11) NOT NULL,
  `slider_name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` text NOT NULL,
  `priority` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`subcat_id`, `cat_id`, `subcat_name`, `priority`, `status`) VALUES
(1, 4, 'sssss', '2', 0),
(2, 5, 'sSAS', '1', 0),
(3, 4, 'tyryrt', '3', 0),
(4, 5, 'dsad', '4', 0),
(5, 5, 'sdsad', '7', 0),
(6, 11, 'xxxxxxxxxxxxxxxxxxxxxxx', '3', 0),
(7, 17, 'asdad', '2', 0),
(8, 5, 'assas', '1', 0),
(9, 1, 'subcat1', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tender_id` int(11) NOT NULL,
  `tendor_code` varchar(500) NOT NULL,
  `tender_name` varchar(500) NOT NULL,
  `tender_path` varchar(500) NOT NULL,
  `tender_date` varchar(500) NOT NULL,
  `tender_due_date` varchar(500) NOT NULL,
  `tender_due_time` varchar(500) NOT NULL,
  `tendor_opening_date` varchar(500) NOT NULL,
  `tendor_opening_time` varchar(500) NOT NULL,
  `tendor_cancelled` varchar(500) NOT NULL,
  `tendor_record_date` varchar(500) NOT NULL,
  `tender_time` varchar(500) NOT NULL,
  `units_id` varchar(500) NOT NULL,
  `deparments_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `corrigendum_added` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tender_id`, `tendor_code`, `tender_name`, `tender_path`, `tender_date`, `tender_due_date`, `tender_due_time`, `tendor_opening_date`, `tendor_opening_time`, `tendor_cancelled`, `tendor_record_date`, `tender_time`, `units_id`, `deparments_id`, `username`, `corrigendum_added`) VALUES
(14, 'CRP/ISIT/AMC', 'AMC for Computer Peripherals', 'assets_admin/dist/img/tendor/eoi_SELECTION OF SYSTEM INTEGRATOR_06-05-2015.pdf', '1/9/2015', '2015-09-30', '5:30 PM', '2015-09-30', '11:00 AM', 'false', '2015-09-01', '11:38:56', '6', '7', 'isit', '0'),
(21, 'Testing/12345/189a', 'Testor', 'assets_admin/dist/img/tendor/SECL WAN TENDER (5).pdf', '2015-10-30', '2015-11-08', '23am', '2015-11-09', '3:00 PM', 'false', '2015-10-06', '11:16:17', '4', '3 ', 'bang_user', '1'),
(17, 'crp/ISIT/AMC-1', 'Mobile Application EoI', 'assets_admin/dist/img/tendor/EOI Mobile Application.pdf', '2015-09-15', '2015-09-15', '5:00PM', '2015-09-15', '11:00 AM', 'false', '2015-09-15', '10:41:56', '4', '3 ', 'bang_user', '1'),
(18, 'CORP/MKTG/IS&IT/SECL/WAN', 'Setting up of wan connectivity', 'assets_admin/dist/img/tendor/EOI format -secl.doc', '2015-09-07', '2015-10-07', '12:30 PM', '2015-10-08', '3:00PM', 'false', '2015-10-01', '11:31:06', '4', '3 ', 'bang_user', '0'),
(19, 'NSU 5I 02 G', 'Supply of HP Printer', 'assets_admin/dist/img/tendor/Enquiry for supply of HP Printer_NSU 5I 02 G.pdf', '30/09/2015', '13/10/2015', '16:00', '13/10/2015', '15:00', 'false', '2015-10-05', '14:55:06', '4', '24', 'support_noc@itiltd.co.in', '0'),
(20, 'NSU 5I 02 G', 'Supply of HP Printer', 'assets_admin/dist/img/tendor/Enquiry for supply of HP Printer_NSU 5I 02 G.pdf', '30/09/2015', '13/10/2015', '16:00', '13/10/2015', '15:00', 'false', '2015-10-05', '14:55:41', '4', '24', 'support_noc@itiltd.co.in', '0'),
(22, 'CM-IT/ITIROLKO/EOI No 9/2015 dt 6th October 2015', 'Supply and Instalation of 30 KVA 3 Phase Solar Power System ', 'assets_admin/dist/img/tendor/EOI Notification.doc', '6th  October 2015', '16th  October 2015', '12.30 PM', '16th  October 2015', '1.00 PM', 'false', '2015-10-06', '17:32:31', '13', '18', 'sanjayjainsanjay@yahoo.com', '0'),
(23, 'ELW18J970RL', 'MASTER BATCH COLOUR (06 Type) AND SILICON POLYMER.', 'assets_admin/dist/img/tendor/Enq_ELW18J970RL.pdf', '29/09/2015', '2015-10-03', '15 PM', '2015-10-05', '15 PM', 'false', '2015-10-08', '12:50:51', '12', '19', 'iti_rbl@itiltd.co.in', '0'),
(24, 'dfv', 'zdfvdfv', 'assets_admin/dist/img/tendor/tender ITI Web site - Copy.pdf', 'sdfcsdf', '2015-10-30', 'awedwe', '2015-10-14', '34', 'false', '2015-10-09', '11:01:49', '4', '3 ', 'bang_user', '0');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `units_id` int(11) NOT NULL,
  `units_name` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`units_id`, `units_name`) VALUES
(5, 'N S Unit'),
(4, 'Bengaluru'),
(17, 'test'),
(7, 'Corporate'),
(8, 'Delhi'),
(9, 'Naini'),
(10, 'Mankapur'),
(11, 'Palakkad'),
(12, 'RaeBareli'),
(13, 'Regional Offices');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `units_id` varchar(500) NOT NULL,
  `deparments_id` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `last_login` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `units_id`, `deparments_id`, `username`, `password`, `last_login`, `type`) VALUES
(1, '4', '3 ', 'bang_user', '12345', '2016-06-06', 0),
(3, '6', '7', 'isit', 'isit', '2015-09-14', 0),
(4, 'Select Unit', 'Select Departments', 'vsat_rbl@itiltd.co.in', 'vsat_rbl123', '0000-00-00', 0),
(5, '12', 'Select Departments', 'vsat_rbl@itiltd.co.in', 'vsat_rbl123', '0000-00-00', 0),
(7, '12', '19 ', 'aaa@aaa.com', 'aaa', '2016-06-10', 0),
(8, '13', '18', 'aohr_rodelhi@yahoo.co.in', 'aohr_rodelhi321', '0000-00-00', 0),
(9, '8', '23', 'skumar_bcdel@itiltd.co.in', 'skumar_bcdel456', '0000-00-00', 0),
(10, '4', '24', 'support_noc@itiltd.co.in', 'support_noc678', '2015-10-05', 0),
(12, '13', '11', 'mm_rok@itiltd.co.in', 'mm_rok876', '2015-10-06', 0),
(13, '9', '25', 'tenders_nni@itiltd.co.in', 'tenders_nni901', '0000-00-00', 0),
(14, '10', '26', 'iti_mkp@itiltd.co.in', 'iti_mkp876', '0000-00-00', 0),
(15, '10', '26', 'netmanager_mkp@itiltd.co.in', 'netmanager_mkp274', '0000-00-00', 0),
(16, '13', '15', 'tenders_rom@itiltd.co.in', 'tenders_rom908', '0000-00-00', 0),
(17, '13', '17', 'cmmarketing.rolko@gmail.com', 'cmmarketing.rolko549', '0000-00-00', 0),
(18, '13', '16', 'itirobbsr@rediffmail.com', 'itirobbsr821', '0000-00-00', 0),
(19, '13', '10', 'udaya_crp@itiltd.co.in', 'udaya_crp786', '0000-00-00', 0),
(20, '13', '17', 'sanjayjainsanjay@yahoo.com', 'sanjayjainsanjay888', '2015-10-06', 0),
(21, '13', '12', 'purchase.itichennai@rediffmail.com', 'purchase.itichennai555', '0000-00-00', 0),
(22, '4', '8', 'shivashankaran_bgp@itiltd.co.in', 'shivashankaran_bgp501', '0000-00-00', 0),
(23, '9', '25', 'emessr@gmail.com', 'emessr89933', '0000-00-00', 0),
(25, '17', '28', 'test', '1234', '0000-00-00', 0),
(26, '', '', 'admin@gmail.com', '1234', '0000-00-00', 2),
(27, '4', '4', 'abc', 'abc', '0000-00-00', 0),
(28, '4', '4', 'bbb@gmail.com', 'bbb', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `whatsnew`
--

CREATE TABLE `whatsnew` (
  `whatsnew_id` int(11) NOT NULL,
  `whatsnew_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_content`
--
ALTER TABLE `cms_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `content_type`
--
ALTER TABLE `content_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Contracts`
--
ALTER TABLE `Contracts`
  ADD PRIMARY KEY (`Contracts_id`);

--
-- Indexes for table `corrigendum`
--
ALTER TABLE `corrigendum`
  ADD PRIMARY KEY (`corrigendum_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departments_id`);

--
-- Indexes for table `example_1`
--
ALTER TABLE `example_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example_2`
--
ALTER TABLE `example_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example_3`
--
ALTER TABLE `example_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example_4`
--
ALTER TABLE `example_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example_5`
--
ALTER TABLE `example_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_permission`
--
ALTER TABLE `master_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `regiter`
--
ALTER TABLE `regiter`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `set_permission`
--
ALTER TABLE `set_permission`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `subcat_contents`
--
ALTER TABLE `subcat_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_content_types`
--
ALTER TABLE `tbl_content_types`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_gal_type`
--
ALTER TABLE `tbl_gal_type`
  ADD PRIMARY KEY (`gal_type_id`);

--
-- Indexes for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  ADD PRIMARY KEY (`slider_type_id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`tender_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`units_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `whatsnew`
--
ALTER TABLE `whatsnew`
  ADD PRIMARY KEY (`whatsnew_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_content`
--
ALTER TABLE `cms_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `content_type`
--
ALTER TABLE `content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Contracts`
--
ALTER TABLE `Contracts`
  MODIFY `Contracts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `corrigendum`
--
ALTER TABLE `corrigendum`
  MODIFY `corrigendum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `example_1`
--
ALTER TABLE `example_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `example_2`
--
ALTER TABLE `example_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `example_3`
--
ALTER TABLE `example_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `example_4`
--
ALTER TABLE `example_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `example_5`
--
ALTER TABLE `example_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_permission`
--
ALTER TABLE `master_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `regiter`
--
ALTER TABLE `regiter`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `set_permission`
--
ALTER TABLE `set_permission`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcat_contents`
--
ALTER TABLE `subcat_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_content_types`
--
ALTER TABLE `tbl_content_types`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_gal_type`
--
ALTER TABLE `tbl_gal_type`
  MODIFY `gal_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  MODIFY `slider_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `units_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `whatsnew`
--
ALTER TABLE `whatsnew`
  MODIFY `whatsnew_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
