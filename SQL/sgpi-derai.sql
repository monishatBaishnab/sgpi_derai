-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 11:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgpi-derai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `pass`, `name`) VALUES
(6, 'sgpi_admin', '21232f297a57a5a743894a0e4a801fc3', 'SGPI');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `details`, `image`) VALUES
(12, 'কলেজ ক্যাম্পাসঃ দোওজ,দিরাই পৌরসভা,সুনামগঞ্জ', 'জনসংখ্যাকে কিভাবে জনশক্তিতে রুপান্তর করা যায়,সে লক্ষে বাবু সুরঞ্জিত সেনগুপ্ত ২০১৬ সালে প্রতিষ্টা করেন সুরঞ্জিত সেনগুপ্ত পলিটেকনিক ইন্সটিটিউট নামে একটি কারিগরি শিক্ষা প্রতিষ্টান।', 'banner.png'),
(13, '৪৩ তম বিজ্ঞান ও প্রযুক্তি সপ্তাহ ২০২২ (সিলেট)', '৪৩ তম বিজ্ঞান ও প্রযুক্তি সপ্তাহ ২০২২ (সিলেট) এ সম্মাননা পুরস্কার গ্রহনে ছাত্রদের একাংশ।', 'bg (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `maneging`
--

CREATE TABLE `maneging` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maneging`
--

INSERT INTO `maneging` (`id`, `name`, `post`, `mobile`, `image`) VALUES
(1, 'সুরঞ্জিত সেনগুপ্ত', 'প্রতিষ্ঠাতা সভাপতিঃ সুরঞ্জিত সেনগুপ্ত পলিটেকনিক ইন্সটিটিউট।', '০১৭৩৭৭৫৭৯৩০', 'Suronjit-sengupta.wb_-min.jpg'),
(3, 'ডঃ জয়া সেনগুপ্তা (এম.পি)', 'সভাপতিঃ সুরঞ্জিত সেনগুপ্ত পলিটেকনিক ইন্সটিটিউট।', '০১৭৩৭৭৫৭৯৩০', 'Joya Sengupta-min.jpg'),
(4, 'সৌমেন সেনগুপ্ত', 'পরিচালকঃ সুরঞ্জিত সেনগুপ্ত পলিটেকনিক ইন্সটিটিউট।', '০১৭৩৭৭৫৭৯৩০', 'sowmen-min.jpeg'),
(6, 'মুহাম্মদ সাখাওয়াত হোসেন', 'অধ্যক্ষঃ সুরঞ্জিত সেনগুপ্ত পলিটেকনিক ইন্সটিটিউট।', '০১৭৩৭৭৫৭৯৩০', 'IMG20221018095939-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `massage` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `name`, `massage`, `email`, `date`) VALUES
(18, 'Monishat Baishnab', 'Start with the basics: Learn the fundamental concepts and building blocks of programming, such as variables, data types, loops, and control structures.\r\n\r\n', 'baishnabmonishat@gmail.com', '2023-01-14 12:19:10'),
(20, 'LorenzoVaf', 'Achieve SEO Greatness: 3104 Secure Links from Google&mdash;for FREE http://websitetopboost.slushshed.xyz/googleboostlink', 'lgsmeaadsbokj@peaxj.swg', '2023-06-14 03:09:03'),
(21, 'EdwinMog', 'Unlock the magic of passive income: 10,000 EUR monthly from cryptocurrency http://krypto1mioeuro-4695570.altanwithd.tk/anwendung-4878575', 'blfvukashnenh@dbodm.wcx', '2023-06-15 10:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `notice` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `details`, `notice`, `date`) VALUES
(16, 'উপবৃত্তি প্রাপ্তব্য শিক্ষার্থীদের ডাটা এন্ট্রি-আপডেট সংক্রান্ত বিজ্ঞপ্তি', '4635.pdf', '2022-12-13'),
(17, 'জনাব মোহাম্মদ জাকির হোসেন, অফিস সহকারী কাম মুদ্রাক্ষরিক এর বদলীর অফিস আদেশ', '4634.pdf', '2022-12-13'),
(18, 'এইচএসসি (বিএমটি) শিক্ষাক্রমের বোর্ড অনুমোদিত একাদশ শ্রেণির পাঠ্যপুস্তক প্রকাশ সংক্রান্ত বিজ্ঞপ্তি', '4633.pdf', '2022-12-13'),
(19, '২০২৩ শিক্ষাবর্ষে জেএসসি (ভোকেশনাল) শিক্ষাক্রমে ৬ষ্ঠ,৭ম ও ৮ম শ্রেণি এবং এসএসসি ও দাখিল (ভোকেশনাল) শিক্ষাক্রমে ৯ম শ্রেণিতে শিক্ষার্থী ভর্তি বিজ্ঞপ্তি', '4632.pdf', '2022-12-13'),
(20, '	ডিপ্লোমা ইন টেকনিক্যাল এডুকেশন শিক্ষাক্রমের পরীক্ষার সময়সূচি', '4631.pdf', '2022-12-13'),
(21, 'ডিপ্লোমা ইন টেকনিক্যাল এডুকেশন শিক্ষাক্রমের পরীক্ষার বিজ্ঞপ্তি', '4630.pdf', '2022-12-13'),
(22, '	ডিপ্লোমা ইন মেডিক্যাল টেকনোলজি শিক্ষাক্রমের ফরমফিলাপের সময়বৃদ্ধি সংক্রান্ত বিজ্ঞপ্তি', '4626.pdf', '2022-12-13'),
(23, 'ডিপ্লোমা ইন ইঞ্জিনিয়ারিং পরীক্ষার ফরম ফিলাপের সময় বৃদ্ধি সংক্রান্ত বিজ্ঞপ্তি', '404-error.png', '2022-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `post`, `mobile`, `image`) VALUES
(1, 'সুকেশ বৈষ্ণব', 'ইন্সট্রাক্টর-কম্পিউটার', '০১৬৩৭৯০৫১৪৩', 'sukes-min.jpg'),
(2, 'সুমন চন্দ্র দাস', 'ইন্সট্রাক্টর-সিভিল', '০১৭৩৭৭৫৭৯৩০', 'sumon-min.jpg'),
(3, 'ধ্রুব জিত দাস', 'ইন্সট্রাক্টর-ইলেক্ট্রিক্যাল', '০১৭৪৭১৯০৫৯৯', 'drubojit_sir.jpg'),
(5, 'গুনসিন্দু বৈষ্ণব', 'জুনিয়র ইন্সট্রাক্টর-কম্পিউটার', '০১৭১৪৯৫৬৬৬৯', 'gunoshindu_sir.jpg'),
(6, 'ইতি সরকার', 'জুনিয়র ইন্সট্রাক্টর-কম্পিউটার', '০১৭২৯৫৩৬৯৬১', 'eti_mem.jpg'),
(7, 'মোঃ আজিজুল হক হৃদয়', 'জুনিয়র ইন্সট্রাক্টর-কম্পিউটার', '০১৭৯২৫৩৬০৫৩', 'azizul hoq-min.jpg'),
(8, 'মোঃ হাবিব', 'জুনিয়র ইন্সট্রাক্টর-ইলেক্ট্রিক্যাল', '০০০২১১৪৫৪৭৭', 'habib.jpg'),
(9, 'মোঃ রেজাউল করিম', 'জুনিয়র ইন্সট্রাক্টর-ইলেক্ট্রিক্যাল', '০০০২১১৪৫৪৭৭', 'rejaul.jpg'),
(10, 'আশরাফুজ্জামান অপু তালুকদার', 'জুনিয়র ইন্সট্রাক্টর-সিভিল', '০০০২১১৪৫৪৭৭', 'apu.jpg'),
(11, 'পিংকি দাস', 'জুনিয়র ইন্সট্রাক্টর-সিভিল', '০০০২১১৪৫৪৭৭', 'profile(3).png'),
(12, 'উবায়েদ উল্লাহ', 'জুনিয়র ইন্সট্রাক্টর-ফিজিক্যাল', '০১৭৫৯৯৪০৪০০', 'boss.png'),
(13, 'ফাহিম আন নূর', 'জুনিয়র ইন্সট্রাক্টর-গনিত', '০০০২১১৪৫৪৭৭', 'boss.png'),
(14, 'লিংকন ভৌমিক', 'জুনিয়র ইন্সট্রাক্টর-(পদার্থ বিজ্ঞান)', '০০০২১১৪৫৪৭৭', 'boss.png'),
(15, 'কঙ্কণা গোস্বামী', 'জুনিয়র ইন্সট্রাক্টর-ইংরেজি', '০০০২১১৪৫৪৭৭', 'profile(3).png'),
(16, 'পূজন রায়', 'জুনিয়র ইন্সট্রাক্টর-(একাউন্টিং)', '০০০২১১৪৫৪৭৭', 'boss.png'),
(17, 'সুমি ভৌমিক', 'জুনিয়র ইন্সট্রাক্টর-বাংলা', '০০০২১১৪৫৪৭৭', 'profile(3).png'),
(26, 'মোঃ মাহবুবুর রহমান', 'জুনিয়র ইন্সট্রাক্টর-সিভিল', '০১৭৫৪৩০৪৮৯১', 'mahbubur -min.jpg'),
(28, 'স্বপন দাস', 'অফিস সহকারি', '01245101214', 'sopon.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maneging`
--
ALTER TABLE `maneging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `maneging`
--
ALTER TABLE `maneging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
