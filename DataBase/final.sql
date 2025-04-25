-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_content`
--

CREATE TABLE `about_us_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_content`
--

INSERT INTO `about_us_content` (`id`, `title`, `description`) VALUES
(1, 'Wide variety of subject notes available.', 'Whether you are a student of BBA, BCA, BCOM or BA stream, we at StudyBuddy are providing well curated notes of 100+ subjects like Accounting & Finance, English, Politics, Geography, etc.'),
(2, 'Easily accessible subject material.', 'Get all the required course knowledge in a planned and smart manner through our platform which is available to you 24x7 seamlessly.'),
(3, 'Subject notes prepared by highly experienced faculties & professionals.', 'On our platform we have a network of highly experienced and trained professionals who are available to solve any of your query and clear your doubts regarding the subject.'),
(4, 'Learning made fun.', 'We at StudyBuddy believe in learn with fun concept, so we have developed video series and video lectures which enables you to learn any subject and concept quickly and more efficiently with the proper guidance of our professionals who are available to you at a finger tip just a click away.');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_faq`
--

CREATE TABLE `about_us_faq` (
  `id` int(11) NOT NULL,
  `question` varchar(555) NOT NULL,
  `answer` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_faq`
--

INSERT INTO `about_us_faq` (`id`, `question`, `answer`) VALUES
(1, 'Do you sell audio books and / or e-books?', 'Yes, you can view e-books from book section.'),
(2, 'Does StudyBuddy support bulk orders?', 'We do offer bulk ordering options! Bulk order inquiries can be sent to info@studybuddy.com with the email heading \"Bulk Order Inquiry\".'),
(3, 'Your site layout would not allow me to check out. What is wrong?', 'If the layout of StudyBuddy is preventing you from placing your order, it can likely be solved by simply updating your browser. If your browser is up-to-date and you are still experiencing problems with the general layout of the site, please contact us.');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `a_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(555) NOT NULL,
  `landmark` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `uid`, `address`, `landmark`, `pincode`, `city`) VALUES
(1, 1, 'Raviraj App., Near Navyug College', 401, 395001, 'Surat'),
(2, 6, 'rainbow apartment', 206, 364290, 'jamnagar'),
(9, 6, 'DVs jain hostel', 401, 395001, 'Surat'),
(10, 5, 'DVs jain hostel', 222, 395001, 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `application_reply`
--

CREATE TABLE `application_reply` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_price` int(11) NOT NULL,
  `b_author` varchar(255) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_price`, `b_author`, `b_img`, `course`, `quantity`) VALUES
(1, 'C++ Practical', 100, 'Pranav Jain', 'practical.jpg', '1', 89),
(2, 'PHP', 300, 'Nitesh Patel', 'php.jpeg', '1', 99),
(3, 'Mathematics', 560, 'Sujal Shah', 'math.jpg', '1', 96),
(4, 'IOT', 150, 'Sudip Mishra', 'iot.jfif', '1', 100),
(5, 'Advance Web', 350, 'Kushal Jain', 'awd1.jpeg', '1', 100),
(6, 'Financial Accounting', 350, 'M Hanif | A Mukherjee', 'account.jpg', '3', 97),
(7, 'Business Statistics', 230, ' Pooja R. Negi', '71mHnvsbCML._AC_UF1000,1000_QL80_.jpg', '2', 90),
(8, 'Business Management', 240, 'Jaimin Shukla', '181.jpg', '2', 30),
(9, 'Cost Accounting', 340, 'Sumathi G. Shenoy', '41EAo6FQa9L.jpg', '2', 40),
(10, 'Sequences and Series', 340, 'Manish Dodia', '71Z3TQfAe2L._AC_UF1000,1000_QL80_.jpg', '4', 44),
(11, 'Financial Accounting', 360, 'Kejal C. Vadza', '81ddjO7q-dL._AC_UF1000,1000_QL80_.jpg', '3', 335),
(12, 'Biochemistry', 330, 'Khushbu A. Patel', 'BIOCHEMISTRY-2016-TITLE-500x673.jpg', '4', 43),
(13, 'BSc Nursing', 332, 'Ashoksinh V. Solanki', '39214568.jpg', '4', 29),
(14, 'Corporate Accounting', 432, 'Ashoksinh V. Solanki', 'Untitled1.jpeg', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_note`
--

CREATE TABLE `book_note` (
  `n_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_note`
--

INSERT INTO `book_note` (`n_id`, `t_id`, `b_id`, `note`) VALUES
(1, 1, 2, 'PHP.pdf'),
(2, 2, 2, 'Core - Programming with PHP & MYSQL.pdf'),
(3, 11, 4, 'IOT_LECTURE_NOTES.pdf'),
(7, 11, 1, 'C_Complete_Notes.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `b_id`, `user_id`, `p_name`, `p_price`, `p_qty`, `p_img`) VALUES
(4, 2, 2, 'PHP', 300, 2, 'php.jpeg'),
(6, 3, 2, 'Mathematics', 250, 3, 'math.jpg'),
(157, 2, 3, 'PHP', 300, 1, 'php.jpeg'),
(175, 7, 1, 'Business Statistics', 230, 1, '71mHnvsbCML._AC_UF1000,1000_QL80_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_img`) VALUES
(1, 'BCA', 'bca.jpg'),
(2, 'BBA', 'bba.jpg'),
(3, 'B. Com', 'bcom.jpg'),
(4, 'B. Sc', 'bsc.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_apply`
--

CREATE TABLE `faculty_apply` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_apply`
--

INSERT INTO `faculty_apply` (`id`, `u_id`, `name`, `email`, `mno`, `subject`, `msg`, `status`) VALUES
(1, 8, 'Jay Ameetbhai Doshi', 'mit12@gmail.com', '9878786567', 'IOT', 'BCA, Shree Uttar Gujarat BCA College.', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cmt` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `cmt`, `status`) VALUES
(1, 'Jay', 'jay12@gmail.com', 'Nice and Very Usefull Website...', 'Pending'),
(2, 'Harsh', 'harsh12@gmail.com', 'Thank You', 'Pending'),
(3, 'Kushal Jain', 'kushal12@gmail.com', 'Nice Interface!!!', 'Solved');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `u_id`, `fname`, `lname`, `address`, `email`, `phone`, `item`, `qty`, `p_price`, `total`, `img`, `payment_type`, `order_date`, `status`) VALUES
(1, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'jay12@gmail.com', '2147483647', 'PHP', '2', '300', 600, 'php.jpeg', 'Online', '2022-12-25', 'Pending'),
(2, 4, 'Rajan', 'Jasani', 'Hira Baugh, Varachha, Surat', 'rajan123@gmail.com', '9867854683', 'PHP', '2', '300', 600, 'php.jpeg', 'COD', '2022-11-17', 'Cancel'),
(3, 1, 'Yesha', 'Lathiya', 'Katargam,Surat', 'yesha12@gmail.com', '9489441172', 'IOT', '5', '150', 750, 'iot.jfif', 'Online', '2023-12-09', 'Delivered'),
(13, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'mitdoshi8@gmail.com', '9976513807', 'C++ Practical,Mathematics', '1,2', '100,560', 1220, 'practical.jpg,math.jpg', 'COD', '2024-03-03', 'Pending'),
(14, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'mitdoshi8@gmail.com', '7764756461', 'Mathematics', '1', '560', 560, 'math.jpg', 'Online', '2024-03-03', 'Cancel'),
(15, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'mitdoshi8@gmail.com', '9835786537', 'C++ Practical,Advance Web,Mathematics', '1,1,1', '100,350,560', 1010, 'practical.jpg,awd1.jpeg,math.jpg', 'Online', '2024-03-03', 'Pending'),
(16, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'mitdoshi8@gmail.com', '9987563410', 'C++ Practical,PHP', '5,1', '100,300', 800, 'practical.jpg,php.jpeg', 'COD', '2024-03-03', 'Delivered'),
(17, 1, 'Jay', 'Doshi', 'DVs jain hostel', 'mitdoshi8@gmail.com', '7865698745', 'IOT,C++ Practical', '2,3', '150,100', 600, 'iot.jfif,practical.jpg', 'COD', '2024-03-04', 'Pending'),
(18, 3, 'Kushal', 'Jain', 'Gujarat Gas Circle, Adajan', 'kushal12@gmail.com', '7890505987', 'IOT,Mathematics,PHP', '5,5,4', '150,560,300', 4200, 'iot.jfif,math.jpg,php.jpeg', 'COD', '2024-03-04', 'Pending'),
(21, 6, 'bansi', 'mavani', 'rainbow apartment,206,364290-jamnagar', 'bansi12@gmail.com', '8767654545', 'Mathematics', '1', '560', 560, 'math.jpg', 'COD', '2024-03-05', 'Accepted'),
(44, 5, 'krunal', 'ladumor', 'DVs jain hostel,222,395001-Surat.', 'ranbeer12@gmail.com', '7867543423', 'Mathematics', '3', '560', 1680, 'math.jpg', 'COD', '2024-03-06', 'Pending'),
(87, 1, 'Jay', 'Doshi', 'DVs jain hostel,401,395001-Surat.', 'jay12@gmail.com', '7865686547', 'Corporate Accounting', '6', '432', 2592, 'Untitled1.jpeg', 'COD', '2024-03-29', 'Pending'),
(88, 1, 'Jay', 'Doshi', 'DVs jain hostel,401,395001-Surat.', 'jay12@gmail.com', '7865686547', 'Corporate Accounting', '5', '432', 2160, 'Untitled1.jpeg', 'COD', '2024-03-29', 'Pending'),
(89, 1, 'Jay', 'Doshi', 'DVs jain hostel,401,395001-Surat.', 'jay12@gmail.com', '7865686547', 'Corporate Accounting', '1', '432', 432, 'Untitled1.jpeg', 'COD', '2024-03-31', 'Delivered'),
(90, 1, 'Jay', 'Doshi', '', 'jay12@gmail.com', '7865686547', 'Financial Accounting', '1', '360', 360, '81ddjO7q-dL._AC_UF1000,1000_QL80_.jpg', '', '2024-03-31', 'Pending'),
(91, 1, 'Jay', 'Doshi', '', 'jay12@gmail.com', '7865686547', 'BSc Nursing', '1', '332', 332, '39214568.jpg', '', '2024-03-31', 'Pending'),
(92, 1, 'Jay', 'Doshi', '', 'jay12@gmail.com', '7865686547', 'Sequences and Series', '1', '340', 340, '71Z3TQfAe2L._AC_UF1000,1000_QL80_.jpg', '', '2024-03-31', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `card` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `card`, `name`, `month`, `year`, `number`, `cvv`) VALUES
(1, 'Master Card', 'Harsh Doshi', 'Sep', '2019', '1234', 222),
(2, 'VISA Card', 'Rajan Jasani', 'Sep', '2019', '4567 8901 2345 6789', 457),
(3, 'American Express', 'Yesha K. Lathiya', 'Aug', '2022', '4567 8901 2345 6789', 246),
(4, 'Master Card', 'Kushal Jain', 'Oct', '2020', '1234 5678 9012 3456', 567),
(5, 'VISA Card', 'Aayu Shah', 'Nov', '2019', '4567 8901 2345 6789', 456),
(6, 'VISA Card', 'Jay Ameetbhai Doshi', 'Oct', '2018', '4567 8901 2345 6789', 456),
(7, 'American Express', 'Jay Ameetbhai Doshi', 'Oct', '2020', '4567 8901 2345 6789', 567),
(8, 'Master Card', 'Jay Ameetbhai Doshi', 'Aug', '2020', '4567 8901 2345 6789', 345),
(9, 'VISA Card', 'Jay Ameetbhai Doshi', 'Oct', '2022', '1234 5678 9012 3456', 123);

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE `reg_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `scode` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`id`, `fname`, `lname`, `mno`, `dob`, `city`, `zip`, `email`, `pass`, `scode`, `type`) VALUES
(1, 'Jay', 'Doshi', '7865686547', '2017-01-18', 'Surat', 897654, 'jay12@gmail.com', '456', 'jay12', 'User'),
(2, 'Harsh', 'Doshi', '5678435678', '2016-01-04', 'Surat', 765976, 'harsh12@gmail.com', '123', 'harsh908', 'User'),
(3, 'Kushal', 'Jain', '8277030952', '2005-04-15', 'Davangere', 577001, 'kushal12@gmail.com', '678', 'kushal', 'User'),
(4, 'Isha', 'Surati', '9879867543', '2024-03-19', 'Surat', 395001, 'isha123@gmail.com', 'isha12', 'boyfriend', 'User'),
(5, 'krunal', 'ladumor', '7867543423', '2018-12-12', 'Surat', 395001, 'doshi878@gmail.com', '3456', 'kg', 'User'),
(6, 'bansi', 'mavani', '8767654545', '2014-03-25', 'Surat', 395001, 'bansi12@gmail.com', '777', 'bansi12', 'User'),
(8, 'Nitesh', 'Patel', '9998613807', '2014-03-11', 'Surat', 395001, 'ngp123@gmail.com', 'ngp', 'ngp', 'Teacher'),
(9, 'Raj', 'Doshi', '9840982874', '0000-00-00', 'Mumbai', 987456, 'rajdoshi12@gmail.com', 'rdfacts', 'rd123', 'User'),
(10, 'Bhavaya', 'Shah', '8765908756', '0000-00-00', 'Ahemdabad', 900008, 'bh122@gmail.com', 'bhavya', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `degree`, `college`, `exp`, `course`, `image`, `subject`, `uname`, `pass`) VALUES
(1, 'Dr. Sagar Fegade', 'M.C.A., Ph.D.', 'S. D. Jain College', '15', 'BCA', 'teacher1.jpeg', 'PHP', 'sagar_fegade_123', 'sf123'),
(2, ' Mr. Manish Dodia', 'M.C.A., Ph.D.(Pursuing)', 'C. B. Patel College', '10', 'BCA', 'teacher2.jpeg', 'C Programming', 'manish_dodia_123', 'md123'),
(3, 'Dr. Ashoksinh V. Solanki', 'M.C.A., Ph.D.', 'SCET College', '10', 'MCA', 'teacher5.jpeg', 'C++', 'ashoksinh_solanki_123', 'as123'),
(4, ' Dr. Jaimin Shukla', 'M.C.A, M.Phil., Ph.D.', 'Shree Uttar Gujarat BCA College', '4', 'B.Tech', 'teacher19.jpeg', 'ASP.Net', 'jaimin_shukla_123', 'js123'),
(5, 'Ms. Kejal C. Vadza', 'M.C.A, M.PHIL.', 'K. B. Parekh College', '5', 'BCA', 'teacher20.jpeg', 'VB.Net', 'kejal_vadza_123', 'kv123'),
(6, 'Mrs. Pooja R. Negi', 'M.SC.(ICT), Ph.D.(Pursuing)', 'Shree Uttar Gujarat BCA College', '10', 'BCA', 'teacher11.jpeg', 'IOT', 'pooja_negi_123', 'pn123'),
(7, 'Ms. Sumathi G. Shenoy', 'B.Tech.(Computer Science)', 'C. B. Patel College', '20', 'B.Tech', 'teacher4.jpeg', 'Information System', 'sumathi_shenoy_123', 'ss123'),
(8, 'Dr. Sindhu S. Pandya', 'M.C.A, M.Phil., Ph.D.', 'SCET College', '8', 'BCA', 'teacher6.jpeg', 'Web Develpoment', 'sindhu_pandya_123', 'sp123'),
(9, 'Ms. Khushbu A. Patel', 'M.Sc(ICT)., Ph.D.(Pursuing)', 'Shree Uttar Gujarat BCA College', '10', 'BCA', 'teacher24.jpeg', 'OOP', 'khushbu_patel_123', 'kp123'),
(10, 'Dr. Yatin Solanki', 'M.C.A., Ph.D.', 'S.D.Jain College', '7', 'BCA', 'teacher18.jpeg', 'Unix Programming', 'yatin_solanki_123', 'ys123'),
(11, 'Mr. Nitesh G. Patel', 'M.Sc(IT)., Ph.D.(Pursuing)', 'Shree Uttar Gujarat BCA College', '10', 'BCA', 'teacher12.jpeg', 'JAVA Programming Language', 'nitesh_patel_123', 'ngp123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `b_id`, `u_id`, `p_name`, `price`, `qty`, `total`, `img`) VALUES
(18, 1, 1, 'C++ Practical', 100, 1, 100, 'practical.jpg'),
(23, 2, 6, 'PHP', 300, 1, 300, 'php.jpeg'),
(24, 1, 6, 'C++ Practical', 100, 1, 100, 'practical.jpg'),
(25, 3, 1, 'Mathematics', 560, 1, 560, 'math.jpg'),
(26, 6, 1, 'Financial Accounting', 350, 1, 350, 'account.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_content`
--
ALTER TABLE `about_us_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_faq`
--
ALTER TABLE `about_us_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_reply`
--
ALTER TABLE `application_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `book_note`
--
ALTER TABLE `book_note`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faculty_apply`
--
ALTER TABLE `faculty_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_content`
--
ALTER TABLE `about_us_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_us_faq`
--
ALTER TABLE `about_us_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_reply`
--
ALTER TABLE `application_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_note`
--
ALTER TABLE `book_note`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_apply`
--
ALTER TABLE `faculty_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
