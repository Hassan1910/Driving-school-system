-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 07:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phplicts_cdsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin User', 'admin', 77955555, 'Test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-25 04:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplication`
--

CREATE TABLE `tblapplication` (
  `ID` int(10) NOT NULL,
  `PackID` int(10) NOT NULL,
  `RegNumber` int(10) DEFAULT NULL,
  `UserId` int(5) DEFAULT NULL,
  `TakenFor` varchar(250) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) NOT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Age` int(10) DEFAULT NULL,
  `LicenceNumber` varchar(120) DEFAULT NULL,
  `UploadLicence` varchar(120) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `AlternateNumber` bigint(11) DEFAULT NULL,
  `TrainingDate` date DEFAULT NULL,
  `TrainingTiming` varchar(120) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Remarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblapplication`
--

INSERT INTO `tblapplication` (`ID`, `PackID`, `RegNumber`, `UserId`, `TakenFor`, `FullName`, `Email`, `MobileNumber`, `Gender`, `Age`, `LicenceNumber`, `UploadLicence`, `Address`, `AlternateNumber`, `TrainingDate`, `TrainingTiming`, `Remark`, `Status`, `RegDate`, `Remarkdate`) VALUES
(28, 2, 861083153, 1, 'Family Member', 'John', 'john@gmail.com', 7797979797, 'Male', 26, '879878979879879', 'ea9152003043160c562e438f9dcde10b.jpg', 'hiuiyiyuuiy', 9879879879, '2022-03-13', '07:00', 'Received Completly ', 'Completed', '2022-03-08 07:17:16', '2022-03-11 11:05:25'),
(29, 2, 756517409, 1, 'Family Member', 'John', 'john@gmail.com', 7797979797, 'Male', 26, '879878979879879', 'ea9152003043160c562e438f9dcde10b.jpg', 'hiuiyiyuuiy', 9879879879, '2022-03-13', '07:00', 'Completed', 'Completed', '2022-03-08 07:19:23', '2022-03-11 11:09:32'),
(30, 2, 220666718, 2, 'Family Member', 'Sherya', 'sherya@gmail.com', 7978977979, 'Female', 26, '123456', '61282b4674798b641948ab39cde6abeb.jpg', 'H-908, Govind puram villas', 784512963, '2022-03-20', '13:25', 'not paid', 'Partial Payment', '2022-03-12 06:54:46', '2024-04-12 07:49:47'),
(31, 2, 633633516, 2, 'Myself', '', '', 0, 'Male', 49, '123456', '61282b4674798b641948ab39cde6abeb.jpg', 'H-908 govind puram villas', 7894561321, '2022-03-27', '07:30', 'Payment Completed', 'Completed', '2022-03-12 06:58:40', '2022-03-12 09:13:03'),
(32, 2, 746748036, 3, 'Family Member', 'Amit', 'amti@gmail.com', 1212121212, 'Male', 25, '234234234', 'ebcd036a0db50db993ae98ce380f6419.png', 'Test Addrss', 1425363625, '2022-04-01', '05:10', 'Test', 'Partial Payment', '2022-03-13 05:39:07', '2022-03-13 06:24:24'),
(33, 2, 903808515, 3, 'Myself', '', '', 0, 'Male', 27, '545345345', 'fd3d790a88b2ae88ec5650e32259e8aa.jpg', 'ABC Address', 1447586958, '2022-03-30', '10:15', NULL, 'Cancelled', '2022-03-13 05:40:36', '2022-03-13 06:18:18'),
(34, 3, 109383124, 4, 'Myself', '', '', 0, 'Female', 20, '', 'd41d8cd98f00b204e9800998ecf8427e', 'meru', 734567657, '2024-04-06', '11:00', NULL, 'Approved', '2024-04-06 19:12:58', '2024-04-06 19:13:56'),
(35, 9, 855038055, 5, 'Myself', '', '', 0, 'Female', 18, 'kbk ', 'd41d8cd98f00b204e9800998ecf8427e', '2233', 734567657, '2024-04-12', '12:00', NULL, 'Approved', '2024-04-12 07:31:03', '2024-04-12 07:48:44'),
(36, 9, 530146442, 5, 'Myself', '', '', 0, 'Male', 20, '', 'd41d8cd98f00b204e9800998ecf8427e', '388', 734567657, '2024-04-12', '13:00', NULL, 'Approved', '2024-04-12 08:18:45', '2024-04-12 08:19:47'),
(37, 2, 436687205, 6, 'Myself', '', '', 0, 'Female', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'fff', 2345678, '2025-02-12', '11:27', NULL, NULL, '2024-04-12 08:26:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Enquiry` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `Is_Read` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`ID`, `FullName`, `MobileNumber`, `Email`, `Enquiry`, `EnquiryDate`, `Is_Read`) VALUES
(4, 'Mahesh Shukla', 8978979797, 'Test1@gmail.com', 'vjhgjhgkhkjlkljiojnhkjhjbjhb', '2019-04-29 12:52:06', '1'),
(5, 'Mahesh Shukla', 8978979797, 'Test1@gmail.com', 'vjhgjhgkhkjlkljiojnhkjhjbjhb', '2019-04-29 12:53:08', '1'),
(8, 'Rajnikant', 77978979, 'raj@gmail.com', 'gjytrewsrdsfxchjbklopityrdxcbvnk', '2019-04-30 07:07:07', '1'),
(9, 'Renu Mishra', 7899779746, 'mishra@gmail.com', 'Tell me the cost of normal training', '2019-05-01 09:02:32', '1'),
(11, 'harish', 4564478744, 'gh@gmail.com', 'Any discounts running this time', '2019-05-01 09:05:39', '1'),
(12, 'Menu Tiwari', 9654854896, 'ti@gmail.com', 'Any discounts running this time', '2019-05-01 09:08:55', '1'),
(13, 'sfdgsdgsd', 2832376757, 'gsdgsdg@hggdhg.com', 'dskfhkdshgkhgdg', '2019-05-01 16:14:15', '1'),
(14, 'Hansika', 8899797979, 'sika@gmail.com', 'How much time will you take to teach suv', '2019-05-09 09:34:10', '1'),
(15, 'czxczx', 2342333333, 'cxzczx@jkdah.com', 'This is sample text for testing', '2019-05-16 17:09:52', '1'),
(16, 'Anuj kumar', 1234567890, 'phpgurukulofficial@gmail.com', 'This is sample text for testing', '2019-05-16 17:19:01', '1'),
(17, 'anuj', 1234567890, 'support@phpgurukul.com', 'This isa sample text for testing.', '2019-05-16 17:19:46', '1'),
(18, 'cool', 734567765, 'cool@gmail.com', 'which season is the best to learn pickup trucks', '2024-04-12 08:04:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpackages`
--

CREATE TABLE `tblpackages` (
  `ID` int(5) NOT NULL,
  `PackageName` varchar(120) DEFAULT NULL,
  `PackageDec` varchar(250) DEFAULT NULL,
  `PackageDuration` varchar(120) DEFAULT NULL,
  `PackagePrice` varchar(120) DEFAULT NULL,
  `PackageDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpackages`
--

INSERT INTO `tblpackages` (`ID`, `PackageName`, `PackageDec`, `PackageDuration`, `PackagePrice`, `PackageDate`) VALUES
(2, 'Training by Pickup truck(30 days)', 'pace', '30', '4000', '2019-04-25 11:36:37'),
(3, 'Training by SUV(30 days)', 'Training by Hatchback: Their is different SUV car available for training like.', '30', '5000', '2019-04-25 11:39:31'),
(4, 'Training by SUV(45 days)', 'Training by Hatchback: Their is different SUV car available for training like.', '45', '6000', '2019-04-25 11:39:44'),
(5, 'Training by SUV(20 days)', 'Training by Hatchback: Their is different SUV car available for training like.', '20', '5000', '2019-04-25 11:44:58'),
(9, 'Test package', 'Sample text for testing.', '60 days', '5000', '2019-05-16 17:20:38'),
(10, 'motorcycle', 'new', '25', '3000', '2024-04-12 07:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: center;\"><b style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif;\">Car Driving School Management System|||</b></div><div style=\"text-align: center;\"><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; font-size: 18px; line-height: inherit; color: rgb(58, 66, 69); font-family: Graphik, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\">While itâ€™s crucial to have maintenance and inspection systems in place, many fleet managers donâ€™t have the same strategies for managing drivers.&nbsp;<span style=\"background-color: rgb(200, 244, 221);\">Implementing a&nbsp;<a href=\"https://www.fleetio.com/manage\" style=\"color: rgb(0, 108, 184); transition-duration: 0.1s; transition-timing-function: linear;\">driver management system</a>&nbsp;allows you to get a comprehensive look at your drivers, their productivity and the overall safety of your assets.</span></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; font-size: 18px; line-height: inherit; color: rgb(58, 66, 69); font-family: Graphik, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\">When establishing a driver management strategy, think about what systems you currently have in place and how you can leverage them to increase driver productivity. Improving current practices such as safety and inspections can set your drivers up for success.</p></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'We are located in Meru town', 'Mutuntu@gmail.com', 745677644, NULL, '9 am to 5pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymenthistory`
--

CREATE TABLE `tblpaymenthistory` (
  `id` int(11) NOT NULL,
  `ApplicationID` int(5) DEFAULT NULL,
  `PaymentAmount` bigint(12) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `PaymentStatus` varchar(100) DEFAULT NULL,
  `PaymentDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpaymenthistory`
--

INSERT INTO `tblpaymenthistory` (`id`, `ApplicationID`, `PaymentAmount`, `Remark`, `PaymentStatus`, `PaymentDate`) VALUES
(1, 28, 2000, 'Partial payment recived', 'Partial Payment', '2022-03-11 07:24:33'),
(2, 28, 2000, 'Received Completly ', 'Completed', '2022-03-11 11:05:25'),
(3, 29, 2000, 'Partial Payment', 'Partial Payment', '2022-03-11 11:08:45'),
(4, 29, 2000, 'Completed', 'Completed', '2022-03-11 11:09:32'),
(5, 29, 2000, 'Completed', 'Completed', '2022-03-11 11:10:45'),
(6, 31, 4000, 'Payment Completed', 'Completed', '2022-03-12 09:13:03'),
(7, 30, 2000, 'Partial Payment', 'Partial Payment', '2022-03-12 13:59:12'),
(8, 32, 3000, 'Test', 'Partial Payment', '2022-03-13 06:24:24'),
(9, 30, 0, 'not paid', 'Partial Payment', '2024-04-12 07:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblregusers`
--

CREATE TABLE `tblregusers` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblregusers`
--

INSERT INTO `tblregusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Test K', 'K', 9879797979, 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-03-04 09:10:12'),
(2, 'Ram', 'Kumar', 7979779797, 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-03-12 06:51:35'),
(3, 'ANuj', 'Kumar', 1236547892, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-03-13 05:29:38'),
(4, 'kule', 'kampicha', 734567765, 'rahmakule5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-06 18:49:03'),
(5, 'tume', 'mohamed', 706544322, 'tume@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-12 07:28:54'),
(6, 'claire', 'damon', 789654321, 'claire@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-12 08:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `SubscribedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`ID`, `FullName`, `Email`, `SubscribedDate`) VALUES
(16, 'rajesh mittal', 'mittal@gmail.com', '2019-05-09 09:34:56'),
(19, 'cool', 'cool@gmail.com', '2024-04-12 08:06:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`UserId`),
  ADD KEY `packageid` (`PackID`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpackages`
--
ALTER TABLE `tblpackages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpaymenthistory`
--
ALTER TABLE `tblpaymenthistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicationid` (`ApplicationID`);

--
-- Indexes for table `tblregusers`
--
ALTER TABLE `tblregusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblapplication`
--
ALTER TABLE `tblapplication`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblpackages`
--
ALTER TABLE `tblpackages`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpaymenthistory`
--
ALTER TABLE `tblpaymenthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblregusers`
--
ALTER TABLE `tblregusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD CONSTRAINT `packageid` FOREIGN KEY (`PackID`) REFERENCES `tblpackages` (`ID`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserId`) REFERENCES `tblregusers` (`ID`);

--
-- Constraints for table `tblpaymenthistory`
--
ALTER TABLE `tblpaymenthistory`
  ADD CONSTRAINT `applicationid` FOREIGN KEY (`ApplicationID`) REFERENCES `tblapplication` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
