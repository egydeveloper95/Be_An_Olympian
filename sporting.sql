-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 04:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `AddressId` int(11) NOT NULL,
  `AddressStratName` varchar(500) NOT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`AddressId`, `AddressStratName`, `CityId`) VALUES
(1, 'Giza', 1),
(2, 'Embaba', 1),
(3, 'Ain Shams', 1),
(4, 'Ramsis', 1),
(5, 'metro', 2),
(6, 'Nasr City', 2);

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `ApprovalID` int(11) NOT NULL,
  `ApprovedID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorytypes`
--

CREATE TABLE `categorytypes` (
  `CategoryTypeID` int(11) NOT NULL,
  `CategoryTypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytypes`
--

INSERT INTO `categorytypes` (`CategoryTypeID`, `CategoryTypeName`) VALUES
(6, 'boxing'),
(7, 'cycling'),
(1, 'football'),
(4, 'ping'),
(5, 'swmimming'),
(3, 'tennis'),
(2, 'vollyball');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(225) NOT NULL,
  `GovernateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CityId`, `CityName`, `GovernateId`) VALUES
(1, 'okba', 1),
(2, 'helwan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clubfollowers`
--

CREATE TABLE `clubfollowers` (
  `ClubFollowerId` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Club_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `clubfollowers`
--

INSERT INTO `clubfollowers` (`ClubFollowerId`, `User_Id`, `Club_Id`) VALUES
(2, 2, 300);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `ClubId` int(11) NOT NULL,
  `ClubName` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ClubDoCons` date NOT NULL COMMENT 'Date of Construction',
  `Website` text,
  `password` char(32) NOT NULL,
  `profilepicture` varchar(100) DEFAULT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`ClubId`, `ClubName`, `city`, `ClubDoCons`, `Website`, `password`, `profilepicture`, `mail`) VALUES
(300, 'Ahly', 'Egypt', '1907-01-02', 'www.ahly.com', '123', '1498036001_ahly2.png', 'ahly@gmail.com'),
(301, 'Zamalek', 'Egypt', '1911-01-01', NULL, '123', '1492971493_Zamalek.png', 'zamalek@gmail.com'),
(302, 'Barcelona', 'Spain', '1900-01-01', NULL, '123', '1492971516_barcelona.png', 'barcelona@gmail.com'),
(303, 'Real Madrid', 'Spain', '1910-01-01', NULL, '123', '1492971543_Real.jpg', 'realmadrid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `CoachId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CoachYearsofExp` int(11) DEFAULT NULL,
  `CoachNumOfClubs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coachinclub`
--

CREATE TABLE `coachinclub` (
  `CoachInClubId` int(11) NOT NULL,
  `CoachId` int(11) NOT NULL,
  `ClubId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentId` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ClubId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `complaintresponse`
--

CREATE TABLE `complaintresponse` (
  `ComplaintResponseId` int(11) NOT NULL,
  `ResponserID` int(11) NOT NULL,
  `CompliantID` int(11) NOT NULL,
  `Response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ComplaintId` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ComplaintSubject` varchar(100) NOT NULL,
  `ComplaintContent` text NOT NULL,
  `Answered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventId` int(11) NOT NULL,
  `EventCreator` enum('1','2') NOT NULL,
  `Event_name` varchar(500) NOT NULL,
  `UserId` int(11) NOT NULL,
  `EventDescription` text NOT NULL,
  `EventStartDate` date NOT NULL,
  `EventEndDate` date NOT NULL,
  `AddresId` int(11) NOT NULL,
  `EventTypeID` int(11) NOT NULL,
  `EventStatus` enum('1','0') NOT NULL,
  `Image` text CHARACTER SET utf8 NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventId`, `EventCreator`, `Event_name`, `UserId`, `EventDescription`, `EventStartDate`, `EventEndDate`, `AddresId`, `EventTypeID`, `EventStatus`, `Image`, `CreatedAt`) VALUES
(12, '1', 'Boxing Event', 3, 'This Event is under the supervision of Coach : Ahmed Mano', '2017-06-29', '2017-06-30', 2, 6, '1', '1498687666_shutterstock_220973980.0.jpg', '2017-06-28 22:07:46'),
(13, '1', 'bicycling event', 4, 'this event is under the supervision of Coach : Mohamed Tarek', '2017-06-29', '2017-06-30', 2, 7, '1', '1498687746_ask-bicycling-rain-ride.jpg', '2017-06-28 22:09:06'),
(14, '1', 'football event', 5, 'this event is under the supervision of coach : Nader Alaa', '2017-06-29', '2017-06-30', 2, 1, '1', '1498687851_football.jpg', '2017-06-28 22:10:51'),
(15, '1', 'pingpong event', 6, 'this event is under the supervision of coach : Ahmed tarek', '2017-06-29', '2017-06-30', 2, 4, '1', '1498687905_rs-atlanta-falcons-06ee1175-4e0d-4cbc-a6f5-68326b71ea67.jpg', '2017-06-28 22:11:45'),
(16, '1', 'tennis event', 9, 'this event is under the supervision of coach : Mohammed Ehab', '2017-06-29', '2017-06-30', 2, 2, '1', '1498688014_tennis-banner-3.jpg', '2017-06-28 22:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `eventclubs`
--

CREATE TABLE `eventclubs` (
  `eventusersId` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `EventTypeId` int(11) NOT NULL,
  `EventTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`EventTypeId`, `EventTypeName`) VALUES
(6, 'boxing'),
(7, 'cycling\r\n'),
(1, 'football'),
(4, 'pingpong'),
(5, 'swimming'),
(2, 'tennis'),
(3, 'volleyball');

-- --------------------------------------------------------

--
-- Table structure for table `eventusers`
--

CREATE TABLE `eventusers` (
  `eventusersId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `FollowingId` int(11) NOT NULL,
  `FollowerId` int(11) NOT NULL,
  `FollowedId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`FollowingId`, `FollowerId`, `FollowedId`) VALUES
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 1),
(11, 2, 3),
(13, 2, 5),
(15, 2, 9),
(16, 2, 6),
(17, 2, 8),
(18, 3, 2),
(19, 3, 1),
(20, 4, 2),
(21, 4, 1),
(22, 5, 1),
(23, 5, 2),
(24, 6, 1),
(25, 6, 2),
(26, 7, 2),
(27, 7, 1),
(28, 9, 1),
(29, 9, 2),
(30, 1, 2),
(31, 3, 5),
(33, 2, 7),
(34, 2, 4),
(35, 8, 2),
(36, 8, 3),
(37, 8, 4),
(38, 8, 5),
(39, 8, 6),
(40, 8, 7),
(41, 8, 9),
(42, 7, 4),
(43, 7, 8),
(44, 7, 6),
(45, 7, 3),
(46, 3, 6),
(47, 3, 8),
(48, 3, 4),
(49, 3, 7),
(50, 3, 9),
(51, 4, 7),
(52, 4, 3),
(53, 4, 8),
(54, 4, 6),
(55, 5, 3),
(56, 5, 6),
(57, 5, 8),
(58, 5, 9),
(59, 5, 4),
(60, 5, 7),
(61, 6, 3),
(62, 6, 8),
(63, 6, 4),
(64, 6, 7),
(65, 6, 9),
(66, 9, 3),
(67, 9, 5),
(68, 9, 6),
(69, 9, 8),
(70, 9, 4),
(71, 9, 7),
(72, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameId` int(11) NOT NULL,
  `GameName` varchar(250) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gameinclub`
--

CREATE TABLE `gameinclub` (
  `GameInClubId` int(11) NOT NULL,
  `GameId` int(11) NOT NULL,
  `ClubId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `governates`
--

CREATE TABLE `governates` (
  `GovernateId` int(11) NOT NULL,
  `GovernateName` varchar(225) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ImageId` int(11) NOT NULL,
  `ImagePath` text NOT NULL,
  `PostId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `user_sender` int(11) NOT NULL,
  `user_reciver` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `answered` int(11) NOT NULL,
  `sender_type` int(11) DEFAULT NULL,
  `reciever_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `user_sender`, `user_reciver`, `message`, `answered`, `sender_type`, `reciever_type`) VALUES
(5, 7, 1, 'Hi Admin ', 0, 1, 1),
(6, 7, 3, 'Hi , Iam Mohamed Hassan ', 0, 1, 1),
(7, 7, 6, 'Hi , Iam Mohamed Hassan ', 0, 1, 1),
(8, 2, 1, 'Hi , iam tefa', 0, 1, 1),
(9, 2, 3, 'Hi , iam tefa', 0, 1, 1),
(10, 2, 6, 'Hi , iam tefa', 0, 1, 1),
(11, 8, 1, 'Hi , iam asem', 0, 1, 1),
(12, 8, 3, 'Hi , iam asem', 0, 1, 1),
(13, 8, 6, 'Hi , iam asem', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liker_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `MailId` int(11) NOT NULL,
  `Body` text NOT NULL,
  `MailTo` text NOT NULL,
  `SenderID` int(11) NOT NULL,
  `Subject` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `PlayerId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `NumOfClubs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playerinclub`
--

CREATE TABLE `playerinclub` (
  `PlayerInClubId` int(11) NOT NULL,
  `PlayerId` int(11) NOT NULL,
  `ClubId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playerundercoach`
--

CREATE TABLE `playerundercoach` (
  `PlayerUnderCoachId` int(11) NOT NULL,
  `PlayerID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postwritertype` enum('1','2') NOT NULL,
  `PostDescription` text NOT NULL,
  `PostDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PostDisplayed` enum('1','0') NOT NULL DEFAULT '1',
  `PostTypeID` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `postImage` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postwritertype`, `PostDescription`, `PostDateTime`, `PostDisplayed`, `PostTypeID`, `UserId`, `postImage`, `category_id`) VALUES
(17, '1', 'Football Post', '2017-06-29 00:02:17', '1', 2, 2, '1498687337_45565365.jpg', 1),
(18, '1', 'boxing post', '2017-06-29 00:04:19', '1', 2, 8, '1498687459_621558154.0.jpg', 6),
(19, '1', 'bicycling post', '2017-06-29 00:04:48', '1', 2, 8, '1498687488_bicycling-body-position.jpg', 7),
(20, '1', 'tennis post ', '2017-06-29 00:05:46', '1', 2, 7, '1498687546_Alex-De-Minaur-WImbledon-700x450.jpg', 3),
(21, '1', 'volleyball post ', '2017-06-29 00:05:59', '1', 2, 7, '1498687559_maxresdefault.jpg', 2),
(22, '1', 'My Football Video', '2017-06-29 00:14:05', '1', 2, 2, '1498688045_2015 Sports Rep Campaign short video.mp4', 1),
(23, '1', 'My First Video ', '2017-06-29 00:14:42', '1', 2, 8, '1498688082_1493026187_2015 Sports Rep Campaign short video.mp4', 1),
(24, '1', 'My Video ', '2017-06-29 00:15:33', '1', 2, 7, '1498688133_Best Sports Motivational Video.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posttypes`
--

CREATE TABLE `posttypes` (
  `PostTypeId` int(11) NOT NULL,
  `PostType` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttypes`
--

INSERT INTO `posttypes` (`PostTypeId`, `PostType`) VALUES
(2, 'Instructional'),
(4, 'Media'),
(1, 'News'),
(3, 'Personal Spotlight');

-- --------------------------------------------------------

--
-- Table structure for table `rateingclub`
--

CREATE TABLE `rateingclub` (
  `RateingClubId` int(11) NOT NULL,
  `ClubId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingId` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ratedID` int(11) NOT NULL,
  `Rate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportId` int(11) NOT NULL,
  `ReporterID` int(11) NOT NULL,
  `ReportDate` datetime NOT NULL,
  `ReportTypeID` int(11) NOT NULL,
  `reporter_type` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `reporttypes`
--

CREATE TABLE `reporttypes` (
  `ReportTypeId` int(11) NOT NULL,
  `ReportType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporttypes`
--

INSERT INTO `reporttypes` (`ReportTypeId`, `ReportType`) VALUES
(3, ' it\'s spam'),
(2, 'I think it should not in our website'),
(1, 'it\'s not interisting');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `ID` int(11) NOT NULL,
  `SubscriberMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainrequests`
--

CREATE TABLE `trainrequests` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `trainrequests`
--

INSERT INTO `trainrequests` (`id`, `sender_id`, `receiver_id`, `receiver_type`, `status`) VALUES
(2, 2, 9, 1, 0),
(3, 2, 4, 1, 0),
(4, 2, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserFirstName` varchar(50) NOT NULL,
  `UserLastName` varchar(50) DEFAULT NULL,
  `AddressId` int(11) DEFAULT NULL,
  `UserPhone` varchar(30) DEFAULT NULL,
  `UserMail` varchar(254) NOT NULL,
  `UserGender` enum('Male','Female') DEFAULT NULL,
  `UserPassword` char(32) NOT NULL,
  `UserDOB` date DEFAULT NULL,
  `UserSSN` varchar(11) DEFAULT NULL,
  `UserProfilePicture` varchar(100) DEFAULT NULL,
  `UserActive` enum('0','1') NOT NULL DEFAULT '1',
  `UserVerified` enum('Verifed','Not Verifed','Pending') NOT NULL,
  `UserTypeId` int(11) NOT NULL,
  `intrest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserFirstName`, `UserLastName`, `AddressId`, `UserPhone`, `UserMail`, `UserGender`, `UserPassword`, `UserDOB`, `UserSSN`, `UserProfilePicture`, `UserActive`, `UserVerified`, `UserTypeId`, `intrest`) VALUES
(1, 'Ahmed', 'Fawzy', 3, '01140122455', 'fawzy@gmail.com', 'Male', '123', '1995-01-01', '2598741', '1492128115_1043899_4296829717609_165787639_n.jpg', '1', 'Verifed', 1, 4),
(2, 'Mostafa', 'Mahmoud', 6, '01022656113', 'tefa@gmail.com', 'Male', '123', '1995-01-21', '4581212512', '1492892746_16265828_1087323938060850_844069552295659253_n.jpg', '1', 'Not Verifed', 2, 2),
(3, 'Ahmed', 'Mano', 3, '12185613', 'mano@gmail.com', 'Male', '123', '1995-03-20', '486313563', '1489739735_14232448_1206424012743702_5120947395990293675_n.jpg', '1', 'Not Verifed', 3, 4),
(4, 'Mohamed', 'Tarek', 3, '121545110', 'teko@gmail.com', 'Male', '123', '1995-03-06', '1214512', '1489841387_16832172_1422688454448790_7241413989305494208_n.jpg', '1', 'Not Verifed', 3, 2),
(5, 'Nader', 'Alaa', 6, '5413215', 'nader@gmail.com', 'Male', '123', '1996-01-21', '5132653', '1489841429_13043465_1078661722190439_4859817372141302165_n.jpg', '1', 'Not Verifed', 3, 4),
(6, 'Ahmed', 'Tarek', 1, '8728712', 'medo@gmail.com', 'Male', '123', '1996-02-07', '092626', '1489841522_17022283_1654253737935102_3942841980411061268_n.jpg', '1', 'Not Verifed', 3, 4),
(7, 'Mohamed ', 'Hassan', 3, '01140122455', 'hassan@gmail.com', 'Male', '123', '1995-09-13', '47854741', '1492095747_14522847_1134562023265933_9150372385420855131_n.jpg', '1', 'Not Verifed', 2, 2),
(8, 'Asem', 'Abdelhady', 1, '0117517211', 'asem@gmail.com', 'Male', '123', '1998-11-24', '145715512', '1492971568_17991708_891919270950775_3273796681495669475_o.jpg', '1', 'Not Verifed', 2, 4),
(9, 'Mohamed', 'Ehab', 6, '0104445571', 'ehab@gmail.com', 'Male', '123', '1995-06-12', '157415561', '1492971585_16174807_10202737456032918_9050790101849474570_n.jpg', '1', 'Not Verifed', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeId` int(11) NOT NULL,
  `UserTypeRole` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeId`, `UserTypeRole`) VALUES
(1, 'Admin'),
(3, 'Coach'),
(2, 'Player');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `VideoId` int(11) NOT NULL,
  `VideoPath` text NOT NULL,
  `PostId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `CityId` (`CityId`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`ApprovalID`),
  ADD KEY `ApprovalID` (`ApprovalID`),
  ADD KEY `ApprovedID` (`ApprovedID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `categorytypes`
--
ALTER TABLE `categorytypes`
  ADD PRIMARY KEY (`CategoryTypeID`),
  ADD UNIQUE KEY `CategoryTypeName` (`CategoryTypeName`),
  ADD KEY `CategoryTypeID` (`CategoryTypeID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityId`),
  ADD UNIQUE KEY `CityName` (`CityName`),
  ADD KEY `CityId` (`CityId`),
  ADD KEY `GovernateId` (`GovernateId`),
  ADD KEY `CityName_2` (`CityName`);

--
-- Indexes for table `clubfollowers`
--
ALTER TABLE `clubfollowers`
  ADD PRIMARY KEY (`ClubFollowerId`),
  ADD KEY `User_Id` (`User_Id`,`Club_Id`),
  ADD KEY `Club_Id` (`Club_Id`),
  ADD KEY `User_Id_2` (`User_Id`),
  ADD KEY `Club_Id_2` (`Club_Id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`ClubId`),
  ADD UNIQUE KEY `ClubName` (`ClubName`),
  ADD KEY `ClubId` (`ClubId`),
  ADD KEY `AddressID` (`city`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`CoachId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `coachinclub`
--
ALTER TABLE `coachinclub`
  ADD PRIMARY KEY (`CoachInClubId`),
  ADD KEY `CoachInClubId` (`CoachInClubId`,`CoachId`,`ClubId`),
  ADD KEY `CoachId` (`CoachId`,`ClubId`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `PostID` (`PostID`,`UserId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `complaintresponse`
--
ALTER TABLE `complaintresponse`
  ADD PRIMARY KEY (`ComplaintResponseId`),
  ADD KEY `ResponserID` (`ResponserID`,`CompliantID`),
  ADD KEY `CompliantID` (`CompliantID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ComplaintId`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventId`),
  ADD KEY `AddresId` (`AddresId`,`EventTypeID`),
  ADD KEY `EventTypeID` (`EventTypeID`),
  ADD KEY `EventTypeID_2` (`EventTypeID`),
  ADD KEY `AddresId_2` (`AddresId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `eventclubs`
--
ALTER TABLE `eventclubs`
  ADD PRIMARY KEY (`eventusersId`),
  ADD KEY `user_id` (`club_id`,`event_id`),
  ADD KEY `user_id_2` (`club_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id_3` (`club_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`EventTypeId`),
  ADD UNIQUE KEY `EventTypeName` (`EventTypeName`);

--
-- Indexes for table `eventusers`
--
ALTER TABLE `eventusers`
  ADD PRIMARY KEY (`eventusersId`),
  ADD KEY `user_id` (`user_id`,`event_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`FollowingId`),
  ADD KEY `FollowerId` (`FollowerId`),
  ADD KEY `FollowedId` (`FollowedId`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameId`),
  ADD UNIQUE KEY `GameName` (`GameName`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `gameinclub`
--
ALTER TABLE `gameinclub`
  ADD PRIMARY KEY (`GameInClubId`),
  ADD KEY `GameId` (`GameId`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `governates`
--
ALTER TABLE `governates`
  ADD PRIMARY KEY (`GovernateId`),
  ADD UNIQUE KEY `GovernateName` (`GovernateName`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageId`),
  ADD KEY `PostId` (`PostId`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`MailId`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`PlayerId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `playerinclub`
--
ALTER TABLE `playerinclub`
  ADD PRIMARY KEY (`PlayerInClubId`),
  ADD KEY `PlayerId` (`PlayerId`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `playerundercoach`
--
ALTER TABLE `playerundercoach`
  ADD PRIMARY KEY (`PlayerUnderCoachId`),
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `CoachID` (`CoachID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PostTypeID` (`PostTypeID`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `posttypes`
--
ALTER TABLE `posttypes`
  ADD PRIMARY KEY (`PostTypeId`),
  ADD UNIQUE KEY `PostType` (`PostType`);

--
-- Indexes for table `rateingclub`
--
ALTER TABLE `rateingclub`
  ADD PRIMARY KEY (`RateingClubId`),
  ADD KEY `ClubId` (`ClubId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingId`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ratedID` (`ratedID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportId`),
  ADD KEY `ReporterID` (`ReporterID`),
  ADD KEY `ReportTypeID` (`ReportTypeID`);

--
-- Indexes for table `reporttypes`
--
ALTER TABLE `reporttypes`
  ADD PRIMARY KEY (`ReportTypeId`),
  ADD UNIQUE KEY `ReportType` (`ReportType`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trainrequests`
--
ALTER TABLE `trainrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserPhone` (`UserPhone`,`UserMail`,`UserSSN`,`UserProfilePicture`),
  ADD KEY `AddressId` (`AddressId`),
  ADD KEY `UserTypeId` (`UserTypeId`),
  ADD KEY `intrest` (`intrest`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeId`),
  ADD UNIQUE KEY `UserTypeRole` (`UserTypeRole`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`VideoId`),
  ADD KEY `PostId` (`PostId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `ApprovalID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorytypes`
--
ALTER TABLE `categorytypes`
  MODIFY `CategoryTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clubfollowers`
--
ALTER TABLE `clubfollowers`
  MODIFY `ClubFollowerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `ClubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `CoachId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coachinclub`
--
ALTER TABLE `coachinclub`
  MODIFY `CoachInClubId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaintresponse`
--
ALTER TABLE `complaintresponse`
  MODIFY `ComplaintResponseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ComplaintId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `eventclubs`
--
ALTER TABLE `eventclubs`
  MODIFY `eventusersId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `EventTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `eventusers`
--
ALTER TABLE `eventusers`
  MODIFY `eventusersId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `FollowingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gameinclub`
--
ALTER TABLE `gameinclub`
  MODIFY `GameInClubId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `governates`
--
ALTER TABLE `governates`
  MODIFY `GovernateId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `MailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `PlayerId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playerinclub`
--
ALTER TABLE `playerinclub`
  MODIFY `PlayerInClubId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playerundercoach`
--
ALTER TABLE `playerundercoach`
  MODIFY `PlayerUnderCoachId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `posttypes`
--
ALTER TABLE `posttypes`
  MODIFY `PostTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rateingclub`
--
ALTER TABLE `rateingclub`
  MODIFY `RateingClubId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reporttypes`
--
ALTER TABLE `reporttypes`
  MODIFY `ReportTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trainrequests`
--
ALTER TABLE `trainrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `VideoId` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
