-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 03:51 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` bigint(20) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_email`, `adm_password`, `adm_role`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` bigint(20) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_title`, `cat_status`) VALUES
(23, 'A +ve', 'active'),
(24, 'B +ve', 'active'),
(25, 'AB +ve', 'active'),
(26, 'O +ve', 'active'),
(27, 'AB -ve', 'active'),
(28, 'A -ve', 'active'),
(29, 'B -ve', 'active'),
(30, 'O -ve', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` bigint(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_Firstname` varchar(255) NOT NULL,
  `user_Middlename` varchar(255) NOT NULL,
  `user_Lastname` varchar(255) NOT NULL,
  `user_Address` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_phonenumber` bigint(255) NOT NULL,
  `user_age` int(255) NOT NULL,
  `user_bloodgroup` varchar(255) NOT NULL,
  `user_avialibility` varchar(255) NOT NULL,
  `user_recentlydonatedtime` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_password`, `user_role`, `user_Firstname`, `user_Middlename`, `user_Lastname`, `user_Address`, `user_gender`, `user_phonenumber`, `user_age`, `user_bloodgroup`, `user_avialibility`, `user_recentlydonatedtime`, `user_status`, `user_photo`) VALUES
(46, 'sushilbudhathooki1234@gmail.com', '50a3fb5a737b51a91ee8e53bb67e9163', 'user', 'sushil', 'babu', 'budhathoki', 'gatthaghar, bhaktapur', 'male', 9860128095, 20, 'O +ve', 'yes', 'More than 3 Months', 'yes', ''),
(47, 'avasneymarjr10@gmail.com', 'c798811fa836b5266a7f3b3e3d6ff152', 'user', 'Avas', '', 'Thakuri', 'Kirtipur', 'male', 9813638841, 20, 'A +ve', 'yes', 'More than 3 Months', 'no', ''),
(48, 'mangratirajit@gmail.com', 'cc16d6e555f27a191726e9bd680308fa', 'user', 'Rajeet', '', 'Mangrati', 'chobhar, kirtipur-14', 'male', 9860596632, 19, 'AB +ve', 'yes', 'More than 3 Months', 'yes', ''),
(49, 'ashuk.nak@gmail.com', '41f20ef0b382fa524d2c8396e1ef37fc', 'user', 'Ashuk', '', 'Nakarmi', 'Budanilkhantha', 'male', 9818633134, 20, 'O +ve', 'no', 'More than 3 Months', 'yes', ''),
(50, 'mandalarbind2017@gmail.com', '11f7fe9e2d51bafbef77f22230a2fa95', 'user', 'Arbind', '', 'Mandal', 'janakpur', 'male', 9819884523, 21, 'AB -ve', 'yes', 'More than a year', 'yes', ''),
(52, 'nyeshamalla15@gmail.com', '10aa7481a5829d470373f3b538c98a1c', 'user', 'nyesha', '', 'malla', 'maitidevi', 'female', 9810894605, 19, 'A +ve', 'yes', '0', 'yes', ''),
(53, 'coolgolayg@gmail.com', '4b270608472a1619bf5805b0268bbfd6', 'user', 'Reenjen ', 'Dorje ', 'Tamang', 'jorpati  kathmandu', 'male', 9813756541, 18, 'B +ve', 'yes', '0', 'yes', ''),
(54, 'aayousd@gmail.com', '3a81618be4fa9a0461ced1f90ab82e64', 'user', 'aayous', '', 'dhakal', 'sifal kathmandu', 'male', 9815928418, 18, 'O +ve', 'yes', '0', 'yes', ''),
(55, 'pravab2072@gmail.com', '9d6e9c18d78b6faac442e8b47e175767', 'user', 'Pravab', '', 'Khanal', 'jorpati ,kathmandu', 'male', 9860080024, 19, 'A +ve', 'yes', '0', 'yes', ''),
(56, 'mohammadhanif918@gmail.com', '11f8675135b963345cf87f7f58d6493b', 'user', 'Md', 'Hanif', 'a', 'kapan', 'male', 9808581308, 19, 'A +ve', 'yes', '0', 'yes', ''),
(57, 'palpasa.shakya@hotmail.com', 'a15d0a991b1c6462117fb7fc6465120e', 'user', 'palpasa', '', 'shakya', 'jamal', 'male', 9861444908, 17, 'O +ve', 'yes', '0', 'yes', ''),
(58, 'pramodethakuri@yahoo.com', '4a42279ee9978bb800a76efeabc1011a', 'user', 'Pramod', '', 'thakuri', 'budhanilkhanta', 'male', 9861216842, 18, 'O +ve', 'yes', '0', 'yes', ''),
(59, '79sabin@gmail.com', '04860da3a3f2773e5264fe6c7e2efaf6', 'user', 'Sabin', '', 'Pokharel', 'Budanilkhantha - 12 sukhedhara', 'male', 9851236305, 38, 'AB +ve', 'yes', 'More than a year', 'yes', ''),
(60, 'bhattarainishan111@gmail.com', 'db99361b7bc67a6206d4bea12f3e3c73', 'user', 'Nishan', '', 'bhattarai', 'jorpati, Nayabasti', 'male', 9860967008, 18, 'A +ve', 'yes', '0', 'yes', ''),
(61, 'ktara328@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 'Tara', '', 'khadka', 'chandol', 'female', 9818159272, 20, 'B +ve', 'yes', 'More than a year', 'yes', ''),
(62, 'snehraj.dada@gmail.com', '737bf97c013a8c3df96452c7f59a0896', 'user', 'snehraj', '', 'kafle', 'chabhil', 'male', 9808702695, 18, 'O +ve', 'yes', '0', 'yes', ''),
(63, 'subodhnepal65@gmail.com', 'bbbc7f704b3501b052778351ac1124b1', 'user', 'subodh', '', 'Nepal', 'budhanilkhanta', 'male', 9823269334, 18, 'A +ve', 'yes', '0', 'yes', ''),
(64, 'sunuwarmanoj3@gmail.com', 'c185e928f719614316e1907b9f0ab0f7', 'user', 'Manoj', '', 'Sunuwar', 'gurjudhara, khathmandu', 'male', 9860672658, 19, 'A +ve', 'yes', '0', 'yes', ''),
(65, 'bhandari.shyamsharan2016@gmail.com', 'c7f2741c6539d442dfcd56683eb71f01', 'user', 'Shyamsharan', '', 'Bhandari', 'bagbazar, kathmandu', 'male', 9818523388, 17, 'A +ve', 'yes', '0', 'yes', ''),
(66, 'livebeautiful126@gmail.com', 'b53bb73b937bcd2491fb9bc6ae7321cd', 'user', 'Ashmita', '', 'Shrestha', 'basundhara', 'female', 9841856348, 18, 'B +ve', 'yes', '0', 'yes', ''),
(67, 'anldhl9844@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'user', 'Anil', '', 'Dahal', 'bhaktapur, kadhaghari', 'male', 9849652045, 22, 'AB +ve', 'yes', '0', 'yes', ''),
(68, 'diptathakuri@gmail.com', 'b2c843f86b1e213e450b617daa8e5142', 'user', 'Dipta', '', 'Thakuri', 'Naxal', 'male', 9815677665, 18, 'B +ve', 'yes', '0', 'yes', ''),
(69, 'bbibek.budhathoki@gmail.com', 'bb8fbd58a0c71e736a20cebf8e4dbfcd', 'user', 'Bibek', '', 'budhathoki', 'Naxal', 'male', 9845775690, 18, 'A -ve', 'yes', '0', 'yes', ''),
(70, 'dhakalsagar18@yahoo.com', 'bdb5df27a2af571a0c6c5b1739ceb61d', 'user', 'Sagar', '', 'dhakal', 'Naxal', 'male', 9842975655, 17, 'B +ve', 'yes', '0', 'yes', ''),
(71, 'rohitaiden@gmail.com', 'a7d62825c7ec7e97c8fc28d094cc3f7d', 'user', 'Mohan', '', 'Rauniyar', 'NewBaneshwor', 'male', 9843703477, 22, 'O +ve', 'yes', 'More than a year', 'yes', ''),
(73, 'abhimanuy12@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'user', 'Abhimanu', '', 'Yadav', 'maitidevi', 'male', 9802919295, 20, 'O +ve', 'yes', 'More than a year', 'yes', ''),
(74, 'sajangautam17@yahoo.com', 'd9282641ee0d9aab2a939ddb717390ab', 'user', 'Sajan', '', 'Gautam', 'gaurighat, kathmandu', 'male', 9843182528, 22, 'O +ve', 'yes', 'More than a year', 'yes', ''),
(75, 'amaharjan901@gmail.com', 'ae000395d68340855ddd141836c42900', 'user', 'Arjun', '', 'Maharjan', 'Hattigunda', 'male', 9860432236, 19, 'B -ve', 'yes', '0', 'yes', ''),
(76, 'acharyapiyush@hotmail.com', '33ef2aa70143d29b476700e04d54bd75', 'user', 'sonu', '', 'aryal', 'chabhil', 'female', 9868778287, 19, 'B +ve', 'yes', '0', 'yes', ''),
(77, 'rajisha.lama.50@gmail.com', '6bc80b9416b95aac0cf7757fc1bb1e65', 'user', 'Rajisha', '', 'lama', 'boudha', 'female', 9823403906, 18, 'O +ve', 'yes', '0', 'yes', ''),
(78, 'ankitchamp150@gmail.com', '36ed0a2fdcdfbb5d1be36295f47d8dcc', 'user', 'ankit', '', 'chaudhary', 'boudha', 'male', 9818011636, 18, 'AB +ve', 'yes', '0', 'yes', ''),
(79, 'missiony17@gmail.com', '3de9ef3411a409cd24c8c791b9d86667', 'user', 'mission', 'nath', 'yogi', 'kalanki', 'male', 9814507124, 18, 'A +ve', 'yes', '0', 'yes', ''),
(80, 'raybonsh394@gmail.com', '24949d792643fa745bfc62dcc85211fd', 'user', 'raybon', '', 'shrestha', 'baniyatar', 'male', 9843844925, 19, 'AB -ve', 'yes', '0', 'yes', ''),
(81, 'pallentashi2@gmail.com', 'e2d562e9e96a4419e2eac5d1b709a6c0', 'user', 'pallen', 'tashi', 'bhutia', 'dhumbarai', 'male', 9805317764, 17, 'A +ve', 'yes', '0', 'yes', ''),
(82, 'shubhamkoirala62@gmail.com', '546c34b5e304bcdf17f30da49a3be76e', 'user', 'shubham', '', 'koirala', 'baneswor', 'male', 9860903708, 18, 'O +ve', 'yes', '0', 'yes', ''),
(83, 'prakriti11@gmail.com', '3f6d2601fb90efa0c9c39b43ae9516da', 'user', 'prakriti', '', 'bhujel', 'dakshindhoka', 'female', 9841663100, 16, 'O +ve', 'yes', '0', 'yes', ''),
(84, 'nishadhakal20@gmail.com', 'c777dbe219945160c13fb67627815bc6', 'user', 'nisha', '', 'dhakal', 'sundarijal', 'female', 9860132755, 16, 'AB +ve', 'yes', '0', 'yes', ''),
(85, 'alisharawat401@yahoo.com', '343817fa02440513ce03e9d1f1e44dc7', 'user', 'alisha', '', 'rawat', 'kamalpokhari/hostel', 'female', 9809887010, 17, 'AB -ve', 'yes', '0', 'yes', ''),
(86, 'yuna201025@gmail.com', '36e4c39159728722a20308c971ecf170', 'user', 'john', '', 'gurung', 'butwal', 'male', 9803215428, 17, 'B +ve', 'yes', '0', 'yes', ''),
(87, 'alishsiwa1@gmail.com', '9ef173c78a88c8e81b17a370a103fcb9', 'user', 'ashish', '', 'siwa', 'baneswor', 'male', 9862772420, 17, 'AB +ve', 'yes', '0', 'yes', ''),
(88, 'netrapaneru11@gmail.com', '85a30be312138b4f7e9eaf3de9911b58', 'user', 'netra', '', 'paneru', 'shantinagar', 'male', 9843818305, 17, 'O +ve', 'yes', '0', 'yes', ''),
(89, 'khadgiashim11@gmail.com', '436f83a4743445e08225fdf5db0b0138', 'user', 'Ashim', '', 'Khadgi', 'Naxal', 'male', 9849625764, 21, 'B +ve', 'yes', '0', 'yes', ''),
(90, 'shankarmehta6349@gmail.com', '16ac60e27fecfd25cf63fdc81f0e2822', 'user', 'Shankar', 'Prasad', 'Mehta', 'kadghari', 'male', 9843666349, 20, 'B +ve', 'yes', '0', 'yes', ''),
(91, 'dmazerunner1@gmail.com', '4362cb7f471087293093c03488996c9b', 'user', 'Samay', '', 'Shrestha', 'saraswati nagar', 'male', 9843153550, 20, 'B +ve', 'yes', 'More than 3 Months', 'yes', '1487651721.jpg'),
(92, 'bijay3460@gmail.com', '2b6ff5e5b3a0f34910adfc3bfa550cac', 'user', 'bijay', '', 'kc', 'maitidevi', 'male', 9868081594, 21, 'A +ve', 'no', 'More than 3 Months', 'no', ''),
(93, 'suraz.lazyboy@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 'suraj', '', 'shrestha', 'basantapur', 'male', 9802908311, 23, 'B +ve', 'yes', 'More than 3 Months', 'yes', ''),
(94, 'samratthapa61837@gmail.com', '344d401d58f178042af18822a34b03d1', 'user', 'samrat', '', 'Thapa', 'hadigaun', 'male', 9813198860, 21, 'A +ve', 'yes', 'More than 6 Months', 'no', '1514961338.jpg'),
(95, 'rem1prachi@gmail.com', 'e14c0e1bda4e4b6596e9a9f0454c1508', 'user', 'Prachi', '', 'Rungta', 'bhotebahal', 'female', 9843214649, 21, 'B +ve', 'yes', 'Not Yet', 'yes', ''),
(96, 'prabinshresthanis111@gmail.com', '65db11c35e330498cbe58380aad94c83', 'user', 'prabin', '', 'Shreatha', 'naxal', 'male', 9841627346, 20, 'B +ve', 'yes', '0', 'yes', '1515037681.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
