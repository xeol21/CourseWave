-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursewave`
--

-- --------------------------------------------------------

--
-- Table structure for table `adlogin`
--

CREATE TABLE `adlogin` (
  `aid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adque` varchar(100) NOT NULL,
  `adans` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adlogin`
--

INSERT INTO `adlogin` (`aid`, `username`, `password`, `adque`, `adans`) VALUES
(1, 'Admin', '$Tr0nGp@$$w0Rd!', 'What was the first project code name you worked on as an administrator?', 'Two Worlds');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `conid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sub_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`conid`, `username`, `email`, `subject`, `message`, `sub_date`) VALUES
(1, 'Mahek Lathiya', 'mahek@gmail.com', 'guidance', 'I want to get counselling regarding course choosing !!', '2024-03-08 11:59:05'),
(2, 'Mahek Lathiya', 'mahek@gmail.com', 'Suggestion ', 'Needs more working on functionality!!', '2024-03-13 06:59:30'),
(3, 'Namjoon', 'RM12@gmail.com', 'Suggestion ', 'Need some more Courses at different Departments!!', '2024-03-13 16:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cdesc` text NOT NULL,
  `price` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `cstatus` varchar(100) NOT NULL,
  `cimg` varchar(100) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `cdesc`, `price`, `credit`, `cstatus`, `cimg`, `instructor_id`) VALUES
(1, 'Photoshop', 'Unlock Photoshop mastery: Edit, design, create. Elevate your digital artistry with our focused course.', 1400, 4, 'Available', 'Photoshop.jpg', 2),
(4, 'Bootstrap', 'Unlock responsive web design with our Bootstrap course—learn to create sleek, mobile-ready websites effortlessly.', 2200, 2, 'Available', 'bootstrap.jpg', 3),
(7, 'Android', 'Build Android expertise: Code, develop, innovate. Master the world of mobile app creation with our Android course.', 1100, 2, 'Unavailable', 'MAD.jpg', 4),
(9, 'Cyber Security', 'Defend. Detect. Secure. Dive into the world of Cybersecurity and become a digital guardian.', 1500, 1, 'Available', 'cybersecurity.jpg', 1),
(15, 'React Native', 'Master React Native: Build powerful, cross-platform mobile apps seamlessly. Dive into mobile development with ease!', 1200, 3, 'Available', 'reactnative.png', 3),
(18, 'Ajax', 'Master AJAX for dynamic and responsive web applications.', 2500, 3, 'Available', 'Ajax.jpg', 3),
(19, 'Cloud Computing', 'Master cloud computing: unlock scalable online resources for optimal business performance.', 3200, 4, 'Unavailable', 'cloud.jpg', 1),
(20, 'Flutter', 'Learn Flutter for cross-platform app development with a single codebase.', 4500, 4, 'Unavailable', 'flutter.jpg', 2),
(21, 'Json', 'JSON course: Learn to work with lightweight data interchange format for web development.', 2000, 3, 'Available', 'json.jpg', 2),
(22, 'AR', 'Dive into AR/VR: Virtual worlds, real skills. Explore the future of immersive experiences with our expert-led course.', 4500, 2, 'Unavailable', 'ar-vr.png', 4),
(23, 'OS Concept', 'Master the core of computing. Dive into the Operating Systems for a seamless tech journey.', 1000, 3, 'Available', 'OS.jpg', 1),
(25, 'Digital Marketing', 'Essential digital marketing training for online success.', 1550, 3, 'Unavailable', 'digimar.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ftype` varchar(255) NOT NULL,
  `fcontent` text NOT NULL,
  `fdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `username`, `ftype`, `fcontent`, `fdate`) VALUES
(1, 'mahek', 'Very bad', 'Not Good', '2024-03-07 09:11:01'),
(3, 'mahek', 'Very good', 'Very Good!!!!', '2024-03-07 10:25:24'),
(5, 'mahek', 'Very good', 'Very Nice Work!!!', '2024-03-07 10:40:47'),
(6, 'ved', 'Good', 'Good Job!!!!', '2024-03-07 10:41:50'),
(8, 'dev', 'Okay', 'Nice Work!!!!', '2024-03-07 11:28:47'),
(10, 'mahek', 'Good', 'Great Experience!!!! ', '2024-03-08 06:02:01'),
(11, 'varsha', 'Good', 'Nice Work!!!!', '2024-03-08 06:07:56'),
(12, 'varsha', 'Very good', 'Very Good!!!!', '2024-03-07 22:44:29'),
(13, 'krupa', 'Very good', 'Fantastic!!!! ', '2024-03-09 23:29:00'),
(14, 'Mahek', 'Very bad', 'sorrry to say!!', '2024-03-11 22:47:00'),
(15, 'Mahek', 'Very good', 'So happy to visit!!\r\n', '2024-03-11 22:51:00'),
(16, 'RM', 'Very good', 'Had Fun at your site!!!!', '2024-03-13 04:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cardnm` varchar(255) NOT NULL,
  `cardno` varchar(255) NOT NULL,
  `erdate` date NOT NULL,
  `expmon` varchar(255) NOT NULL,
  `expyr` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fid`, `username`, `cardnm`, `cardno`, `erdate`, `expmon`, `expyr`, `cvv`, `course`, `price`) VALUES
(14, 'krupa', 'Krupa Sarvaiya', '2323-4545-6767-8989', '2024-03-10', 'july', 2025, 121, 'AR-VR', 6000),
(15, 'Mahek', 'Lathiya Mahek Vipulbhai', '2121-0707-2020-0404', '2024-03-11', 'july', 2025, 323, 'Photoshop', 200),
(16, 'RM', 'Kim Namjoon', '4647-8756-2343-9878', '2024-03-13', 'August', 2025, 222, 'Photoshop', 200),
(17, 'RM', 'Kim Namjoon', '4647-8756-2343-9878', '2024-03-14', 'August', 2025, 222, 'Cyber Security', 1500),
(18, 'Mahek', 'Lathiya Mahek Vipulbhai', '2121-0707-2020-0404', '2024-03-16', 'july', 2025, 323, 'Cyber Security', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `guestcontact`
--

CREATE TABLE `guestcontact` (
  `gid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `sub_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guestcontact`
--

INSERT INTO `guestcontact` (`gid`, `email`, `subject`, `message`, `sub_date`) VALUES
(1, 'lee@gmail.com', 'guidance', 'Need some help Which course to choose for learning Web.', '2024-03-13 13:46:09'),
(2, 'riya123@gmail.com', 'Suggestion ', 'Hope to get more Courses related other fields!!', '2024-03-13 13:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `name`, `title`, `bio`, `image`, `created_at`) VALUES
(1, 'Sarah Adams', 'Cybersecurity Instructor', 'Sarah Adams is an experienced educator with over 10 years of teaching experience in Cybersecurity.', 'inst6.jpg', '2024-03-19 13:30:03'),
(2, 'Ashley Roberts', 'UI/UX Designer', 'Ashley Roberts specializes in UI/UX Designing and has a passion for helping students.', 'inst5.jpg', '2024-03-12 13:32:39'),
(3, 'Daniel Lee', 'Web Developer', 'Daniel Lee is a passionate web developer with a keen eye for detail and a love for creating engaging online experiences. With over five years of experience in front-end and back-end development.', 'inst3.jpg', '2024-03-01 13:34:47'),
(4, 'Kevin Yoo', 'Marketing Manager', 'Kevin Yoo is a seasoned digital marketer with a passion for driving online success. ', 'inst4.jpg', '2024-03-10 13:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `nid` int(11) NOT NULL,
  `ntitle` varchar(100) NOT NULL,
  `ndesc` text NOT NULL,
  `pdate` date NOT NULL,
  `nimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `ntitle`, `ndesc`, `pdate`, `nimg`) VALUES
(7, 'Android Course', 'Android Course Training coming Soon.....', '2024-03-17', 'appnews.jpg'),
(8, 'AR/VR', 'AR/VR Course Training coming Soon...', '2024-03-18', 'arnews.jpg'),
(9, 'Cloud Computing Course ', 'Cloud computing Course Training coming Soon...', '2024-03-19', 'cloudnews.jpeg'),
(10, 'Digital Marketing Course', 'Digital Marketing Course learning coming soon......', '2024-03-20', 'digitalnews.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studentlog`
--

CREATE TABLE `studentlog` (
  `logid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentlog`
--

INSERT INTO `studentlog` (`logid`, `username`, `logintime`, `logout`) VALUES
(184, 'Mahek', '2024-03-31 21:46:17', '2024-03-31 21:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblreg`
--

CREATE TABLE `tblreg` (
  `sid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `bod` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `mno` varchar(100) NOT NULL,
  `adm_date` date NOT NULL,
  `img` varchar(100) NOT NULL,
  `sque` varchar(255) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreg`
--

INSERT INTO `tblreg` (`sid`, `username`, `password`, `sname`, `bod`, `gender`, `city`, `state`, `mno`, `adm_date`, `img`, `sque`, `ans`) VALUES
(8, 'Dev', 'devid65!Dv', 'dev sarvaiya', '2002-12-30', 'Male', 'Surat', 'Gujarat', '9874561234', '2024-02-22', 'img2.jpg', 'What is your mother\'s maiden name?', 'johnson'),
(9, 'Krupa', 'krupa12!Kp', 'krupa sarvaiya', '2004-12-27', 'Female', 'Surat', 'Gujarat', '6549873214', '2024-02-16', 'jhope.jpg', 'In what city were you born?', 'surat'),
(10, 'Varsha', 'varsha7!Va', 'varsha sarvaiya', '2004-01-01', 'Female', 'Panaji', 'Goa', '654789123', '2024-02-17', 'img1.jpg', 'What is the name of your first pet?', 'gucci'),
(11, 'Neel', 'neely45!Nl', 'neel shah', '2010-02-06', 'Male', 'Kochi', 'Kerala', '9874561234', '2024-02-27', 'img3.jpg', 'What is your favorite color?', 'black'),
(12, 'Ved', 'vedi987!Vr', 'ved shah', '2010-12-28', 'Male', 'Mumbai', 'Maharashtra', '9517537894', '2024-02-28', 'jin.jpg', 'Who is known for \'Healing Smile\' in Seventeen?', 'DK'),
(14, 'Mahek', 'mahek21!Ab', 'Mahek Lathiya V', '2004-07-21', 'Female', 'Chandigarh', 'Haryana', '7656348756', '2024-03-10', 'cookie.jpg', ' what does the phrase \"Chogiwa\" refer to?', 'i feel something'),
(15, 'jimin', 'jimin123!Xx', 'Park Jimin', '1995-10-13', 'Male', 'Bhopal', 'Bihar', '6787564534', '2024-03-12', 'jimin.jpg', 'What is your favorite flower?', 'Rose'),
(16, 'Suga', 'Suga#12345', 'Min Yoongi', '1993-03-09', 'Male', 'Mumbai ', 'Maharashtra', '8967453423', '2024-03-13', 'suga.jpg', 'What is the name of Suga\'s mixtape released in 2016?', 'Agust D'),
(21, 'RM', 'rMsep12#94', 'Kim Namjoon', '1994-09-12', 'Male', 'Other', 'Other', '4565342376', '2024-03-14', 'joonie.jpg', 'What is the name of RM\'s favorite pet?', 'Tannie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adlogin`
--
ALTER TABLE `adlogin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `guestcontact`
--
ALTER TABLE `guestcontact`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `studentlog`
--
ALTER TABLE `studentlog`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `tblreg`
--
ALTER TABLE `tblreg`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adlogin`
--
ALTER TABLE `adlogin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `conid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guestcontact`
--
ALTER TABLE `guestcontact`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studentlog`
--
ALTER TABLE `studentlog`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tblreg`
--
ALTER TABLE `tblreg`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
