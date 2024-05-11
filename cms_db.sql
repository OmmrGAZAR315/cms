-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 12:13 PM
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
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(10, 'C++'),
(11, 'java'),
(12, 'Python'),
(13, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) DEFAULT NULL,
  `comment_user_id` int(3) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_user_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(85, 1009, 95, 'dcsdvsd', 'sdvsdv@vdsvdsv', 'svddsvsd', 'Approved', '03-Aug-2023 12:45:25'),
(86, 1009, 95, 'fdf', 'omarahmedelgazzar600@gmail.com', 'scdscd', 'Approved', '03-Aug-2023 10:13:08'),
(87, 1009, 95, 'sdcds', 'cccccccccccccc@fsdfsdf', 'dcdc', 'Approved', '03-Aug-2023 10:13:15'),
(91, 1009, 95, 'sdcds', 'cccccccccccccc@fsdfsdf', 'dcdc', 'Approved', '03-Aug-2023 10:43:03'),
(92, 1009, 95, 'fdf', 'omarahmedelgazzar600@gmail.com', 'scdscd', 'Approved', '03-Aug-2023 10:43:03'),
(93, 1009, 95, 'dcsdvsd', 'sdvsdv@vdsvdsv', 'svddsvsd', 'Approved', '03-Aug-2023 10:43:03'),
(94, 1009, 95, 'dcsdvsd', 'sdvsdv@vdsvdsv', 'svddsvsd', 'Approved', '03-Aug-2023 10:43:15'),
(95, 1009, 95, 'fdf', 'omarahmedelgazzar600@gmail.com', 'scdscd', 'Approved', '03-Aug-2023 10:43:15'),
(96, 1009, 95, 'sdcds', 'cccccccccccccc@fsdfsdf', 'dcdc', 'Approved', '03-Aug-2023 10:43:15'),
(97, 1009, 95, 'sdcds', 'cccccccccccccc@fsdfsdf', 'dcdc', 'Approved', '03-Aug-2023 10:43:15'),
(98, 1009, 95, 'fdf', 'omarahmedelgazzar600@gmail.com', 'scdscd', 'Approved', '03-Aug-2023 10:43:15'),
(99, 1009, 95, 'dcsdvsd', 'sdvsdv@vdsvdsv', 'svddsvsd', 'Approved', '03-Aug-2023 10:43:15'),
(124, 1009, 95, 'Omar Ahmed El-Gazzar', 'yassinahmr601@gmail.com', 'edelgazza', 'Approved', '03-Aug-2023 11:28:37'),
(127, 1009, 95, 'Omar Ahmed El-Gazzar', 'yassinahmr601@gmail.com', 'edelgazza', 'Approved', '03-Aug-2023 11:29:11'),
(129, 1009, 95, 'Omar Ahmed El-Gazzar', 'yassinahmr601@gmail.com', 'edelgazza', 'Unapproved', '03-Aug-2023 11:30:36'),
(130, 1009, 95, 'Omar Ahmed El-Gazzar', 'yassinahmr601@gmail.com', 'edelgazza', 'Approved', '03-Aug-2023 11:30:38'),
(131, 1009, 95, 'Omar Ahmed El-Gazzar', 'yassinahmr601@gmail.com', 'edelgazza', 'Approved', '03-Aug-2023 11:30:38'),
(145, 1009, 95, 'Omar Ahmed El-Gazzar', 'omarahmedelgazzar600@gmail.com', 'انا جامد', 'Approved', '07-Aug-2023 12:17:53'),
(146, 1009, 95, 'Yassin', 'yassinahmedelgazzar601@gmail.com', 'اخواتي الجامدين', 'Approved', '07-Aug-2023 12:19:15'),
(147, 1009, 95, 'Myar96✌️', 'Myar@veryHOTmail.com', 'aywaaa gaaaamed ya kalb', 'Approved', '07-Aug-2023 12:20:37'),
(174, 1040, 88, 'om Omar', 'oommmmy@moma.com', 'lololololololoooooooooooooooooowy', 'Approved', '17-Aug-2023 05:37:19'),
(178, 1069, 56, 'test', 'test@grf', 'just testing\n', 'Approved', '17-Aug-2023 10:22:01'),
(180, 1041, 88, 'an xbox fan', 'omarahmedelgazzar600@gmail.com', 'Good One billy(>▽<)', 'Approved', '18-Aug-2023 01:28:51'),
(181, 993, 124, 'CrazyMath ', 'eyadw872@gmail.com', 'ffsdjhfsdkfjhdskfhsdfkhsfsadfsfafdaf', 'Approved', '18-Aug-2023 08:19:53'),
(183, 1068, 125, 'Osama', '---', 'Great effort, keep going!', 'Approved', '18-Aug-2023 08:53:20'),
(184, 1068, 56, 'Myar96✌️', 'Myar@veryHOTmail.com', 'gaaamd ya Ommmmmr', 'Approved', '18-Aug-2023 10:18:33'),
(185, 1068, 88, 'Myar96✌️', 'Myar@veryHOTmail.com', 'gaaamd ya Ommmmmr', 'Approved', '18-Aug-2023 10:21:10'),
(186, 991, 126, 'NerdForFun', 'id1000315@gmail.com', 'My life be like:', 'Approved', '18-Aug-2023 10:52:24'),
(187, 1074, 126, 'NerdForFun', 'nourmag@yahoo.com', 'Nice Post <3.', 'Approved', '18-Aug-2023 11:02:49'),
(188, 1040, 126, 'NerdForFun', 'nourmag@yahoo.com', 'Congratulations ya broooooooooooooooo.', 'Approved', '18-Aug-2023 11:07:11'),
(190, 1075, 129, 'Ana', 'Ana@soso.com', 'Ana', 'Approved', '21-Aug-2023 02:55:18'),
(191, 1071, 130, 'Johny sehs', 'husseinhazem201@gmail.com', 'Lol\n', 'Approved', '25-Aug-2023 07:05:24'),
(192, 1075, 97, 'Khaled', 'dvsvv', 'teesstingtbtb3232', 'Approved', '25-Oct-2023 04:15:30'),
(193, 1075, 97, 'Khaled', 'sdvfbvnfdl@gmail.com', 'tessting ', 'Approved', '25-Oct-2023 04:16:44'),
(194, 1075, 132, 'helllllllllloooooooooo', 'sdvsdfbv@gmail.com', 'testing again', 'Approved', '25-Oct-2023 04:35:03'),
(195, 1075, 97, 'helloo 2', 'fbfbfdsbf#@gmail.com', 'testing s s', 'Approved', '25-Oct-2023 04:51:14'),
(196, 1075, 133, 'tesing account', 'vfdbfln@gmail.com', ',,,,,,,,,,,,,,', 'Approved', '25-Oct-2023 04:53:25'),
(197, 1075, 133, 'testing 2', 'dsvfdovbn@gmail.com', 'sfvjfdbfdb', 'Approved', '25-Oct-2023 05:11:29'),
(199, 1075, 133, 'fbfdb', 'bdfbdf@gmail.com', 'sdgfdsgbdfb', 'Approved', '25-Oct-2023 06:22:20'),
(200, 1075, 133, 'dfbdfb', 'bdfbdb@gmail.com', 'dfbdbbd', 'Approved', '25-Oct-2023 07:06:31'),
(201, 1076, 133, 'testing', 'omar@gmail.com', 'sddgvdfb', 'Unapproved', '25-Oct-2023 07:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `like_user_id` int(11) DEFAULT NULL,
  `like_post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `like_user_id`, `like_post_id`) VALUES
(59, 56, 971),
(58, 56, 1040),
(62, 97, 1075),
(53, 126, 1040),
(55, 126, 1071),
(54, 126, 1073),
(52, 126, 1074),
(56, 129, 1075),
(57, 130, 1071),
(61, 132, 1075),
(68, 133, 971),
(65, 133, 984),
(67, 133, 1075),
(72, 133, 1076),
(69, 133, 1077),
(71, 133, 1079),
(73, 133, 1093);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) DEFAULT 0,
  `post_user_id` int(3) DEFAULT 0,
  `post_likes` int(11) DEFAULT 0,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_image` text DEFAULT NULL,
  `post_date` text DEFAULT NULL,
  `post_views_count` int(11) DEFAULT 0,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT 'Unpublished',
  `post_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_user_id`, `post_likes`, `post_title`, `post_author`, `post_image`, `post_date`, `post_views_count`, `post_tags`, `post_status`, `post_content`) VALUES
(971, 10, 95, 2, 'Koelpin, McLaughlin and Mohr', 'Sibyl Rogahn', '20230209_063312.png', '05-Dec-1977 12:58:40', 14, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(972, 11, 95, 0, 'Kunde-Stark', 'Jerrell Gulgowski DVM', 'sun.png', '04-Apr-1982 03:48:42', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(973, 12, 95, 0, 'DuBuque, Murphy and Streich', 'Cleta Kautzer', 'Screenshot_20230117_092123.png', '23-Aug-2014 05:54:27', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(974, 10, 95, 0, 'Walsh-Lynch', 'Mr. Dorthy Brown', 'NetflixIcon2016.jpg', '13-Sep-1978 10:39:18', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(975, 11, 95, 0, 'Steuber-Reilly', 'Sierra Donnelly', '900x300-marvel-banner_800x800.jpg', '08-Feb-1986 03:57:52', 1, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(976, 12, 95, 0, 'Funk, Barton and Marquardt', 'Micah Romaguera', 'image_1.jpg', '08-Apr-2010 02:41:35', 3, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(977, 10, 95, 0, 'McGlynn Inc', 'Mrs. Jayda Swift IV', '20230209_063312.png', '30-Dec-1998 09:05:45', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(978, 11, 95, 0, 'Bechtelar, Fadel and Hessel', 'Anabelle Paucek', 'sun.png', '28-Nov-1970 09:45:37', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(979, 12, 95, 0, 'Doyle Group', 'Easter Sanford', 'Screenshot_20230117_092123.png', '08-May-2003 04:26:50', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(980, 10, 95, 0, 'Yost, Collier and Ankunding', 'Dr. Skye Lynch DVM', 'NetflixIcon2016.jpg', '01-Apr-1997 11:24:40', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(981, 11, 95, 0, 'Prohaska, Prosacco and Flatley', 'Perry Durgan III', '900x300-marvel-banner_800x800.jpg', '02-Feb-1986 01:04:08', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(982, 12, 95, 0, 'Crona, Heathcote and Jast', 'Prof. Lon Abshire Sr.', 'image_1.jpg', '16-Nov-1980 10:58:50', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(983, 10, 95, 0, 'Kuhic-Terry', 'Myah Hilll Sr.', '20230209_063312.png', '12-Jun-2021 04:10:31', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(984, 11, 95, 1, 'Turner and Sons', 'Elliott Zboncak', 'sun.png', '11-Dec-2012 11:00:16', 3, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(985, 12, 95, 0, 'Anderson Inc', 'Dedric Koepp', 'Screenshot_20230117_092123.png', '25-Oct-2020 02:36:03', 2, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(986, 10, 95, 0, 'Lynch-Shields', 'Kris Kuhn PhD', 'NetflixIcon2016.jpg', '29-Dec-2011 10:29:28', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(987, 11, 95, 0, 'Jenkins-Kshlerin', 'Ellen Welch PhD', '900x300-marvel-banner_800x800.jpg', '04-Jun-2021 01:21:29', 9, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(988, 12, 95, 0, 'Bartoletti, Murphy and Torphy', 'Margarita Conroy', 'image_1.jpg', '03-Sep-1978 09:52:15', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(989, 10, 95, 0, 'Zulauf-Corkery', 'Odessa Fritsch', '20230209_063312.png', '27-Mar-1972 09:12:10', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(990, 11, 95, 0, 'Schamberger Inc', 'Casimir Prosacco', 'sun.png', '24-May-1971 03:51:27', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(991, 12, 95, 1, 'Doyle, Hessel and Rosenbaum', 'Stefanie Parisian', 'Screenshot_20230117_092123.png', '30-Jul-2010 10:03:59', 4, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(992, 10, 95, 0, 'Kovacek, Bednar and Hermiston', 'Grady Fay Jr.', 'NetflixIcon2016.jpg', '05-Nov-1973 06:28:30', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(993, 11, 95, 1, 'Ferry-Krajcik', 'Dr. Retta Mills', '900x300-marvel-banner_800x800.jpg', '17-Sep-1972 07:51:19', 11, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(994, 12, 95, 1, 'Mosciski Group', 'Autumn Schroeder I', 'image_1.jpg', '15-Jul-2013 09:22:44', 3, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(995, 10, 95, 0, 'Hamill-Hauck', 'Prof. Candido Pagac III', '20230209_063312.png', '18-Jul-1989 06:02:57', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(996, 11, 95, 0, 'Lesch LLC', 'Prof. Taylor Keeling', 'sun.png', '14-Jun-2008 10:24:23', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(997, 12, 95, 0, 'Brakus-Wintheiser', 'Bart Haley', 'Screenshot_20230117_092123.png', '19-Nov-1975 02:56:51', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(998, 10, 95, 0, 'Bernhard Ltd', 'Gaetano Feeney', 'NetflixIcon2016.jpg', '11-Mar-1978 01:30:56', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(999, 11, 95, 0, 'Schulist-Lowe', 'Rhianna Leffler', '900x300-marvel-banner_800x800.jpg', '08-Mar-1983 07:35:32', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1000, 12, 95, 0, 'Balistreri-Hintz', 'Prof. Merle Flatley', 'image_1.jpg', '08-Aug-1996 06:34:06', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1001, 10, 95, 0, 'Smith-Osinski', 'Dr. Mortimer Nitzsche IV', '20230209_063312.png', '16-Aug-2023 07:32:30', 2, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1002, 11, 95, 0, 'Zemlak LLC', 'Marilyne Goyette', 'sun.png', '25-Nov-1999 03:03:41', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1003, 12, 95, 0, 'Gaylord, Will and O\'Connell', 'Kennith Breitenberg', 'Screenshot_20230117_092123.png', '28-Apr-2001 11:34:37', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1004, 10, 95, 0, 'Stoltenberg, Upton and Schuster', 'Mr. Halle Hammes', 'NetflixIcon2016.jpg', '03-Nov-2009 04:27:54', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1005, 11, 95, 0, 'Lebsack and Sons', 'Dr. Blake Keebler', '900x300-marvel-banner_800x800.jpg', '09-Sep-1999 03:27:31', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1006, 12, 95, 0, 'Waters PLC', 'Omar ElGazzar', 'image_1.jpg', '29-Sep-2023 10:51:24', 0, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n'),
(1007, 10, 95, 0, 'Mayer, Stracke and Lubowitz', 'Susanna Koch', 'default.jpg', '16-Aug-2023 07:51:28', 1, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1008, 11, 95, 0, 'Kessler PLC', 'Miss Kiara Koepp V', 'sun.png', '07-Jun-2017 10:31:35', 3, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1009, 12, 95, 0, 'Mosciski PLC', 'Omar ElGazzar', 'Screenshot_20230117_092123.png', '29-Sep-2023 10:51:18', 25, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n'),
(1010, 10, 95, 0, 'Mosciski, Rice and Conroy', 'Omar ElGazzar', 'NetflixIcon2016.jpg', '29-Sep-2023 10:51:14', 32, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n'),
(1029, 10, 95, 0, 'Stupid Name', 'Omar ElGazzar', '2467462.jpg', '29-Sep-2023 10:51:11', 5, '', 'Published', ''),
(1040, 12, 95, 3, 'Finished PHP course', 'Omar ElGazzar', 'PHP Backend  Course.png', '29-Sep-2023 10:51:08', 55, 'Koko', 'Published', '<h1>Finally</h1>'),
(1041, 11, 95, 2, 'THIS IS A GOOD POST', 'Bill Gates', 'Screenshot 2023-06-25 130238.png', '17-Aug-2023 09:48:11', 23, 'Xbox', 'Published', '<blockquote><span style=\"color:green;font-family: &quot;Comic Sans MS&quot;;\">Checkout my XBOX game pass</span><span style=\"font-family: &quot;Comic Sans MS&quot;;\">﻿</span></blockquote>'),
(1068, 10, 95, 3, 'f', 'Omar ElGazzar', '20230207_154942.png', '29-Sep-2023 10:51:01', 28, 'f', 'Published', ''),
(1071, 10, 122, 2, 'Hello from hell ', 'Mother Hacker', 'received_2658291571136107.webp', '18-Aug-2023 05:26:14', 11, 'HelloWorld ', 'Published', '“A positive attitude is something everyone can work on, and everyone can learn how to employ it.” Captain Jack Sparrow'),
(1073, 13, 125, 1, 'My Thoughts', 'Osama', 'images.jpeg', '18-Aug-2023 09:15:11', 8, 'Thoughts', 'Published', '<p>Here i am positing my thoughts on this website.<br></p>'),
(1074, 13, 126, 1, 'My Personality', 'NerdForFun', 'e3f1126d62e68beafd63501de62bb457.jpg', '18-Aug-2023 11:47:58', 27, '#bungou_stray_dogs', 'Published', ''),
(1075, 12, 129, 4, 'Test', 'Omar ElGazzar', 'IMG-20230821-WA0000.jpg', '29-Sep-2023 10:50:08', 74, 'Test', 'Published', '<p>Test 1234567890</p>'),
(1076, 10, 56, 1, 'vdsv', 'Omar ElGazzar', '2467462.jpg', '29-Sep-2023 10:50:21', 15, 'vv', 'Published', ''),
(1079, 10, 133, 1, 'first post2', 'fbd', 'Screenshot 2023-04-09 202002.png', '25-Oct-2023 07:08:07', 3, 'fdbd', 'Published', '<p>dfbdfb</p>'),
(1080, 10, 133, 0, 'first post2', 'fbd', 'Screenshot 2023-04-09 202002.png', '25-Oct-2023 07:12:17', 0, 'fdbd', 'Published', '<p>dfbdfb</p>'),
(1081, 10, 56, 0, 'vdsv', 'Omar ElGazzar', '2467462.jpg', '25-Oct-2023 07:12:17', 0, 'vv', 'Published', ''),
(1082, 12, 129, 0, 'Test', 'Omar ElGazzar', 'IMG-20230821-WA0000.jpg', '25-Oct-2023 07:12:17', 0, 'Test', 'Published', '<p>Test 1234567890</p>'),
(1083, 13, 126, 0, 'My Personality', 'NerdForFun', 'e3f1126d62e68beafd63501de62bb457.jpg', '25-Oct-2023 07:12:17', 0, '#bungou_stray_dogs', 'Published', ''),
(1084, 13, 125, 0, 'My Thoughts', 'Osama', 'images.jpeg', '25-Oct-2023 07:12:17', 0, 'Thoughts', 'Published', '<p>Here i am positing my thoughts on this website.<br></p>'),
(1085, 10, 122, 0, 'Hello from hell ', 'Mother Hacker', 'received_2658291571136107.webp', '25-Oct-2023 07:12:17', 0, 'HelloWorld ', 'Published', '“A positive attitude is something everyone can work on, and everyone can learn how to employ it.” Captain Jack Sparrow'),
(1086, 10, 95, 0, 'f', 'Omar ElGazzar', '20230207_154942.png', '25-Oct-2023 07:12:17', 0, 'f', 'Published', ''),
(1087, 11, 95, 0, 'THIS IS A GOOD POST', 'Bill Gates', 'Screenshot 2023-06-25 130238.png', '25-Oct-2023 07:12:17', 0, 'Xbox', 'Published', '<blockquote><span style=\"color:green;font-family: &quot;Comic Sans MS&quot;;\">Checkout my XBOX game pass</span><span style=\"font-family: &quot;Comic Sans MS&quot;;\">﻿</span></blockquote>'),
(1088, 12, 95, 0, 'Finished PHP course', 'Omar ElGazzar', 'PHP Backend  Course.png', '25-Oct-2023 07:12:17', 0, 'Koko', 'Published', '<h1>Finally</h1>'),
(1089, 10, 95, 0, 'Stupid Name', 'Omar ElGazzar', '2467462.jpg', '25-Oct-2023 07:12:17', 0, '', 'Published', ''),
(1090, 10, 95, 0, 'Mosciski, Rice and Conroy', 'Omar ElGazzar', 'NetflixIcon2016.jpg', '25-Oct-2023 07:12:17', 0, 'C++', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n'),
(1091, 12, 95, 0, 'Mosciski PLC', 'Omar ElGazzar', 'Screenshot_20230117_092123.png', '25-Oct-2023 07:12:17', 1, 'Python', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n');
INSERT INTO `posts` (`post_id`, `post_category_id`, `post_user_id`, `post_likes`, `post_title`, `post_author`, `post_image`, `post_date`, `post_views_count`, `post_tags`, `post_status`, `post_content`) VALUES
(1092, 11, 95, 0, 'Kessler PLC', 'Miss Kiara Koepp V', 'sun.png', '25-Oct-2023 07:12:17', 0, 'Java', 'Published', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus vitae dui tempor porttitor nec eu massa. Curabitur vitae risus a leo ultricies pretium eget ut tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae ex lorem. Nunc ligula nulla, ultrices pellentesque feugiat in, lobortis id ante. Sed dui odio, tincidunt non mollis a, convallis eget tellus. Pellentesque ultrices, turpis eget tempus ultrices, tortor ligula porttitor nisi, id molestie orci nulla vel ligula. Donec quis molestie massa. Sed ac erat lectus. Ut cursus sed sem vitae elementum. Sed ante tellus, tristique eu nisi et, pellentesque pellentesque turpis. Suspendisse tempus nisl lobortis, dignissim augue nec, congue turpis. Vivamus molestie, ex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\n\n'),
(1093, 10, 95, 1, 'fefrfrf', 'Susanna Koch', NULL, '25-Oct-2023 07:13:07', 18, 'C++', 'Published', 'Loremfbvdfbdfbex eu facilisis consectetur, risus enim interdum sapien, sed consequat arcu odio at est. Mauris elit metus, ultricies quis porttitor ac, tempus vel enim. Etiam lobortis cursus velit, in vestibulum odio mollis id.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_firstName` varchar(255) DEFAULT NULL,
  `user_lastName` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_date` text DEFAULT NULL,
  `pass_char` int(11) DEFAULT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstName`, `user_lastName`, `user_email`, `user_image`, `user_role`, `user_date`, `pass_char`, `token`) VALUES
(56, 'Omar', '$2y$12$G99F6DM1NQ6y29fWkS8DtOODVvRA5HgIVUMV1TJgsOWL7oOSWOkJW', 'Omar Ahmed', 'ElGazzar', 'omarahmedelgazzar600@gmail.com', '20230207_154942.png', '0b111', '29-Sep-2023 10:27:37', 3, '59774dc5aa9e90630b8a9a847326a9c48e82e93a7a2cf9f88c603e98ab93cd5a26cf94016a3fc599e82af60955d29a14c88b'),
(133, 'Testing', '$2y$12$36D.9CVJcOBe9p0QPT2CJ.CmghfTlDLqoReB2ngtgY5wnJb8gzcam', 'new Account2', 'testing', 'id1000315@gmail.com', 'default.jpg', '0b111', '25-Oct-2023 07:13:53', 3, '1b19782750dbca472a3ae1dc17bcff9660c96d20e5fa8153e59471b3a1b81b8eb38c39eaf7a06686da343d043c6f54692ea9'),
(135, 'oame2222', '$2y$12$36D.9CVJcOBe9p0QPT2CJ.CmghfTlDLqoReB2ngtgY5wnJb8gzcam', 'omar2222', 'ahmed222', 'oamrahemd@gmail.com', 'default.jpg', '0b001', NULL, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `users_online_id` int(11) NOT NULL,
  `users_session` int(255) DEFAULT NULL,
  `users_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`users_online_id`, `users_session`, `users_time`) VALUES
(34, 0, 1692241644),
(35, 88, 1692399650),
(36, 56, 1698253920),
(37, 54, 1692327737),
(38, 118, 1692321421),
(39, 111, 1692321947),
(40, 119, 1692322837),
(41, 120, 1692323005),
(42, 121, 1692324412),
(43, 122, 1692379675),
(44, 123, 1692389415),
(45, 124, 1692390298),
(46, 125, 1692393311),
(47, 126, 1692401253),
(48, 129, 1692629894),
(49, 97, 1698244750),
(50, 133, 1715420509),
(51, 135, 1715379318);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `like_user_id` (`like_user_id`,`like_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`users_online_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `users_online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
