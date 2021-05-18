-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 15, 2021 at 02:32 PM
-- Server version: 8.0.25
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduhub_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `course_id` int NOT NULL,
  `comment` text NOT NULL,
  `createdOn` datetime NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `course_id`, `comment`, `createdOn`, `user_id`) VALUES
(12, 'The Anonymous', 17, 'Hello', '2021-04-25 17:14:35', '1'),
(14, 'The Anonymous', 17, 'I have a doubt', '2021-04-25 23:53:43', '1'),
(20, 'The Anonymous', 17, 'hiii', '2021-04-26 20:41:00', '2'),
(22, 'The Anonymous', 18, 'Hello', '2021-04-29 17:29:01', '2'),
(23, 'The Anonymous', 50, 'Janhavi', '2021-05-14 19:10:01', '609eb73869e44c0020116163');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int NOT NULL,
  `coursetitle` text NOT NULL,
  `coursesubtitle` text,
  `coursedescription` text,
  `course_language` varchar(50) NOT NULL,
  `course_level` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `course_image` varchar(2048) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `coursetitle`, `coursesubtitle`, `coursedescription`, `course_language`, `course_level`, `category`, `course_image`, `amount`) VALUES
(17, 'Introduction to Web Development', 'Design your own website', 'This course is designed to start you on a path toward future studies in web development and design, no matter how little experience or technical knowledge you currently have. The web is a very big place, and if you are the typical internet user, you probably visit several websites every day, whether for business, entertainment or education. But have you ever wondered how these websites actually work? How are they built? How do browsers, computers, and mobile devices interact with the web? What skills are necessary to build a website? With almost 1 billion websites now on the internet, the answers to these questions could be your first step toward a better understanding of the internet and developing a new set of internet skills.  \n\nBy the end of this course you’ll be able to describe the structure and functionality of the world wide web, create dynamic web pages using a combination of HTML, CSS, and JavaScript, apply essential programming language concepts when creating HTML forms, select an appropriate web hosting service, and publish your webpages for the world to see. Finally, you’ll be able to develop a working model for creating your own personal or business websites in the future and be fully prepared to take the next step in a more advanced web development or design course or specialization.', 'English(UK)', 'Beginner level', 'IT&Software', 'http://res.cloudinary.com/eduhub/image/upload/v1611839536/course_image_videos/tqa7sr70lbgzk5dexbt7.jpg', 2000),
(18, 'Digital Marketing Specialization', 'Drive Customer Behavior Online. A six-course overview of the latest digital marketing skills, taught by industry experts.', 'Master strategic marketing concepts and tools to address brand communication in a digital world.\nThis Specialization explores several aspects of the new digital marketing environment, including topics such as digital marketing analytics, search engine optimization, social media marketing, and 3D Printing. When you complete the Digital Marketing Specialization you will have a richer understanding of the foundations of the new digital marketing landscape and acquire a new set of stories, concepts, and tools to help you digitally create, distribute, promote and price products and services.', 'English(UK)', 'Intermediate level', 'Marketing', 'http://res.cloudinary.com/eduhub/image/upload/v1612088174/course_image_videos/ferdlgq7mruqmfoetjbp.png', 1100),
(40, 'R Programming', '', 'In this course, you will learn how to program in R and how to use R for effective data analysis. You will learn how to install and configure software necessary for a statistical programming environment and describe generic programming language concepts as they are implemented in a high-level statistical language. The course covers practical issues in statistical computing which includes programming in R, reading data into R, accessing R packages, writing R functions, debugging, profiling R code, and organizing and commenting R code. Topics in statistical data analysis will provide working examples.', 'English(UK)', 'Beginner level', 'IT&Software', 'https://res.cloudinary.com/eduhub/image/upload/v1614600052/course_image_videos/bqwc8wwvalcgicfliaka.png', 1200),
(50, 'Brand Management: Aligning Business, Brand and Behaviour', '', 'The course offers a brand workout for your own brands, as well as guest videos from leading branding professionals. \n\nThe aim of the course is to change the conception of brands as being an organisation\'s visual identity (e.g., logo) and image (customers\' brand associations) to an experience along \"moments-that-matter\" along the customer journey and, therefore, delivered by people across the entire organisation. Brands are thus not only an external promise to customers, but a means of executing business strategy via internal brand-led behaviour and culture change.', 'English(UK)', 'Beginner level', 'Business', 'http://res.cloudinary.com/eduhub/image/upload/v1618671410/course_image_videos/yuf96pjqka7zd15lfquq.jpg', 900);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int NOT NULL,
  `course_id` int NOT NULL,
  `lec_id` int NOT NULL,
  `document` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `course_id`, `lec_id`, `document`) VALUES
(33, 17, 24, 'DevEnvSetup.pdf'),
(34, 17, 25, 'HistoryOfHTML.pdf'),
(59, 18, 27, 'WhatIsHTML.pdf'),
(60, 50, 61, 'PowerOfCss.pdf'),
(61, 18, 28, 'VarsFunctionsScope.pdf'),
(62, 50, 62, 'JSTypes.pdf'),
(63, 50, 63, 'ByValueByReference.pdf'),
(64, 50, 63, 'Lecture22-Positioning.pdf'),
(65, 17, 25, 'WhatIsHTML.pdf'),
(66, 17, 25, 'PowerOfCss.pdf'),
(67, 17, 26, 'VarsFunctionsScope.pdf'),
(68, 17, 26, 'JSTypes.pdf'),
(69, 17, 26, 'ByValueByReference.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int NOT NULL,
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `user_id`, `course_id`, `username`) VALUES
(1, '609801c0e07f43001ecd1d46', 40, 'aparna'),
(5, '609eb73869e44c0020116163', 18, 'janhavi'),
(6, '609eb73869e44c0020116163', 50, 'Abc'),
(7, '609fd6a63941170024b42729', 40, 'Abc'),
(8, '609fd6a63941170024b42729', 17, 'Abc');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lec_id` int NOT NULL,
  `course_id` int NOT NULL,
  `lec_name` text,
  `lec_description` text,
  `video` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lec_id`, `course_id`, `lec_name`, `lec_description`, `video`) VALUES
(24, 17, 'Course Overview and Website Structure and Hosting', 'This first module provides an overview of how websites function, their structure, and the ins and outs of choosing a website name and selecting an online host to house your website. By the end of this module, you\'ll be able to: find and select a web hosting company; choose an effective domain name; use the host to manage your websites; and discuss how networks and the internet function at a high level.', 'https://res.cloudinary.com/eduhub/video/upload/v1611839704/course_image_videos/h9klndr13nxlifpgwb10.mp4'),
(25, 17, 'Designing Your Own Website: HTML Basics', 'In this module, we\'ll begin to explore how to design and create websites by exploring the base language used to power all websites: HTML. By the end of this lesson, you\'ll be able to: identify and use common HTML tags; add an image to a webpage; create HTML-formatted tables; use hyperlinks to connect a series of webpages; upload your finished HTML pages to a web host; and, learn some tips and tricks for styling pages and practicing your coding.', 'https://res.cloudinary.com/eduhub/video/upload/v1612088408/course_image_videos/buoobw6czgjrbxmx6snm.mp4'),
(26, 17, 'Introduction to Programming Using JavaScript', 'Now that you know some basic HTML, it\'s time to turn our attention to another common scripting language used to make websites dynamic - that is allowing users to interact with your webpages - JavaScript. While learning about JavaScript, you\'ll also gain some foundational knowledge common to all programming languages. By the end of this module, you\'ll be able to: discuss what is meant by dynamic content; perform essential programming language tasks; create simple JavaScript programs; use JavaScript to set up alerts and respond to events, to read input, and to change HTML; and conduct basic JavaScript testing.', 'https://res.cloudinary.com/eduhub/video/upload/v1614600198/course_image_videos/n7xlrcgep8ifkhbybo6v.mp4'),
(27, 18, 'COURSE OVERVIEW AND HOW DIGITAL TOOLS ARE CHANGING PRODUCT', 'In this first module, you will become familiar with the course, your instructor, your classmates, and our learning environment. In this module, you will learn how new digital tools are enabling customers to take a more active role in developing and sharing products.', 'https://res.cloudinary.com/eduhub/video/upload/v1612088325/course_image_videos/ay56hz5gjxoitiwu15l4.mp4'),
(28, 18, 'HOW DIGITAL TOOLS ARE CHANGING PROMOTION', 'In this module, you learn how new digital tools are enabling customers to take a more active role in promotion activities.', 'https://res.cloudinary.com/eduhub/video/upload/v1612088408/course_image_videos/buoobw6czgjrbxmx6snm.mp4'),
(40, 40, 'Background, Getting Started, and Nuts & Bolts', 'This week covers the basics to get you started up with R. The Background Materials lesson contains information about course mechanics and some videos on installing R. The Week 1 video cover the history of R and S, go over the basic data types in R, and describe the functions for reading and writing data. I recommend that you watch the videos in the listed order, but watching the videos out of order isn\'t going to ruin the story.', 'https://res.cloudinary.com/eduhub/video/upload/v1614664831/course_image_videos/vkodt4dsutoj3ukiqdgm.mp4'),
(41, 40, 'Programming with R', 'Welcome to Week 2 of R Programming. This week, we take the gloves off, and the lectures cover key topics like control structures and functions. We also introduce the first programming assignment for the course, which is due at the end of the week.', 'https://res.cloudinary.com/eduhub/video/upload/v1618671817/course_image_videos/awidazvzxgfaliwieidb.mp4'),
(42, 40, 'Loop Functions and Debugging', 'We have now entered the third week of R Programming, which also marks the halfway point. The lectures this week cover loop functions and the debugging tools in R. These aspects of R make R useful for both interactive work and writing longer code, and so they are commonly used in practice.', 'https://res.cloudinary.com/eduhub/video/upload/v1618843916/course_image_videos/oxc2ofi6atgnflfukamo.mp4'),
(43, 40, 'Simulation & Profiling', 'This week covers how to simulate data in R, which serves as the basis for doing simulation studies. We also cover the profiler in R which lets you collect detailed information on how your R functions are running and to identify bottlenecks that can be addressed. A profiler is a key tool in helping you optimize your programs. Finally, we cover the str function, which I personally believe is the most useful function in R.', 'https://res.cloudinary.com/eduhub/video/upload/v1619358268/course_image_videos/kzxnbu1r3oskuykvjyfv.mp4'),
(61, 50, 'Brand Purpose & Experience', 'Welcome to Module 1! In this module, we\'ll cover the following topics: Traditional notions of branding; Changing market conditions for brands; A new approach to branding. As well as the lecture videos, you will also be learning through interviews with brand practitioners such as Bethany Koby, Director of Technology Will Save us and David Kershaw, CEO of M&C Saatchi. There are optional readings to supplement your understanding, a quiz with 7 questions to test your learning and a peer review assignment based on a task connected to this module.', 'https://res.cloudinary.com/eduhub/video/upload/v1618671499/course_image_videos/mmmdsygu4l1g9uwt4zic.mp4'),
(62, 50, 'Brand Design & Delivery', 'Welcome to Module 2! In this module, we\'ll cover the following topics: Brand experiences as the basis for differentiation; How to design brand experiences, as different from products and services; Pricing as a differentiating brand experience. As well as the lecture videos, you will also be learning through interviews with brand practitioner Hub van Bockel, an independent consultant and author and Professor Bernd H. Schmitt of Columbia Business School. There are optional readings to supplement your understanding, a quiz with 6 questions to test your learning and a peer review assignment based on a task connected to this module.', 'https://res.cloudinary.com/eduhub/video/upload/v1618671817/course_image_videos/awidazvzxgfaliwieidb.mp4'),
(63, 50, 'Brand Leadership and Alignment', 'Welcome to Module 3! In this module, we\'ll cover the following topics: Aligning the strategies for business, brand and behaviour; Strategic brand portfolio alignment; Delivering global brand alignment. As well as the lecture videos, you will also be learning through interviews with practitioners, Ije Nwokorie, CEO of Wolff Olins, Helen Casey and Henk Viljoen, both of Old Mutual and Keith Weed, CMO of Unilever. There are optional readings to supplement your understanding, a quiz with 7 questions to test your learning and a peer review assignment based on a task connected to this module.', 'https://res.cloudinary.com/eduhub/video/upload/v1618672197/course_image_videos/j4nbri5hisvvilmxs6zn.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `rating_action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `rating_id`, `comment_id`, `rating_action`) VALUES
('1', 3, 20, 'dislike'),
('2', 69, 14, 'like'),
('609eb73869e44c0020116163', 80, 23, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `reply` text NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `comment_id`, `user_id`, `username`, `reply`, `createdOn`) VALUES
(1, 20, '2', 'The Anonymous', 'Hey, hello', '2021-04-28 17:48:48'),
(2, 20, '2', 'The Anonymous', 'hi', '2021-04-28 18:35:36'),
(4, 14, '2', 'The Anonymous', 'Hiii', '2021-04-30 18:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `skillsinfo`
--

CREATE TABLE `skillsinfo` (
  `skill_id` int NOT NULL,
  `course_id` int NOT NULL,
  `learn_detail` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skillsinfo`
--

INSERT INTO `skillsinfo` (`skill_id`, `course_id`, `learn_detail`, `skills`) VALUES
(24, 17, 'Portfolio', 'HTML'),
(25, 17, 'Design Beautiful UI', 'CSS'),
(26, 18, 'Basics of marketing', 'Digital Marketing'),
(41, 40, 'Understand critical programming language concepts', 'Data Analysis'),
(42, 40, 'Configure statistical programming software', 'Debugging'),
(43, 40, 'Make use of R loop functions and debugging tools', 'R Programming'),
(44, 40, 'Collect detailed information using R profiler', 'Rstudio'),
(45, 50, 'How to build brands from a broad organisational perspective', 'Corporate Branding'),
(46, 50, 'How to build brands in multi-brand companies, across cultures and geographies', 'Brand Marketing'),
(47, 50, 'How to measure brand health in new ways, that is, internally in addition to externally', 'Brand Management'),
(48, 50, 'How to value and capture returns to brands across the organisation - introducing the new concept of', 'Brand Identity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_course` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `course_document` (`course_id`,`lec_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `enrollment_course` (`course_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lec_id`),
  ADD KEY `course_lectures` (`course_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_comment` (`comment_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `comment_reply` (`comment_id`);

--
-- Indexes for table `skillsinfo`
--
ALTER TABLE `skillsinfo`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `course_skills` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lec_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skillsinfo`
--
ALTER TABLE `skillsinfo`
  MODIFY `skill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `course_document` FOREIGN KEY (`course_id`,`lec_id`) REFERENCES `lecture` (`course_id`, `lec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `course_lectures` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD CONSTRAINT `rating_comment` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `comment_reply` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skillsinfo`
--
ALTER TABLE `skillsinfo`
  ADD CONSTRAINT `course_skills` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
