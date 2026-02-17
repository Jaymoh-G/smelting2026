-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2022 at 08:50 PM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixqxmsv_smelting2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--
-- Creation: Feb 07, 2022 at 05:03 PM
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intro` longtext COLLATE utf8mb4_unicode_ci,
  `who_we_are` longtext COLLATE utf8mb4_unicode_ci,
  `core_business` longtext COLLATE utf8mb4_unicode_ci,
  `who_we_work_with` longtext COLLATE utf8mb4_unicode_ci,
  `mission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `intro`, `who_we_are`, `core_business`, `who_we_work_with`, `mission`, `vision`, `created_at`, `updated_at`) VALUES
(1, 'We are a duly registered business under number BN-35CL7BL with a mandate to operate across Kenya effectively from 13th January 2020. We are also authorized by NITA (TRN/1814) to conduct training sessions under the management and supervisory category.', 'We are a business consultant aimed at steering business growth and development through capacity building. We offer business development services on how to Start and Improve your business.', '<div>Our core business is to provide consultancy services aimed at steering business ideas into viable business opportunities. Our main focus is on Micro, Small, and Medium Business Enterprise development Services.</div>\r\n<div>&nbsp;</div>', '<div>We work with start-ups by offering mentorship and financial advice through the various business growth and development stages. These practices contribute to the overall evolution of the informal business sector thus leading to business efficiency, increased job opportunities, and general economic development. Being a sector that employs majority of Kenyans, appropriate business models will ensure that its GDP translates to one that is equivalent to its potential.</div>\r\n<div>&nbsp;</div>\r\n<div>In addition, we work with the formal business sector which continues to be overstretched, leading to low income. Our business development services thus assist the players in this sector to identify new and improved business strategies and opportunities.</div>', 'We provide world class and inclusive capacity building programs that are tailor made for individuals and corporate client needs aimed at sustainable business growth and employment creation', 'To be an oasis for the social-economic transformation in Kenya and beyond through enterprise development services and Capacity building', NULL, '2022-02-10 06:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `accreditations`
--
-- Creation: Feb 08, 2022 at 03:25 PM
--

CREATE TABLE `accreditations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_title` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accreditations`
--

INSERT INTO `accreditations` (`id`, `title`, `image_url`, `created_at`, `updated_at`, `show_title`) VALUES
(6, 'NITA', 'NITA-Logo.png', '2022-02-08 12:12:55', '2022-02-08 12:12:57', 0),
(8, 'NCA', 'engineer-pic.png', '2022-02-08 12:14:00', '2022-02-08 13:03:11', 1),
(9, 'SIYB - ILO', 'download.png', '2022-03-21 15:38:17', '2022-03-22 09:31:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_images`
--
-- Creation: Feb 07, 2022 at 05:04 PM
--

CREATE TABLE `accreditation_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accreditation_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accreditation_images`
--

INSERT INTO `accreditation_images` (`id`, `image_title`, `image_url`, `accreditation_item_id`, `created_at`, `updated_at`) VALUES
(11, NULL, 'NITA-Logo.png', 6, '2022-02-08 12:12:56', '2022-02-08 12:12:56'),
(15, NULL, 'engineer-pic.png', 8, '2022-02-08 13:03:10', '2022-02-08 13:03:10'),
(18, NULL, 'download.png', 9, '2022-03-22 09:31:05', '2022-03-22 09:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_foci`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `area_of_foci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_of_foci`
--

INSERT INTO `area_of_foci` (`id`, `title`, `content`, `image_url`, `slug`, `created_at`, `updated_at`) VALUES
(15, 'Business Training And Advisory', 'Our training services are guided by a high impact programme developed by International Labor Organization known as Start and Improve Your Business. The programme is operational in over 100 Countries with a record impact of 30% increase in profitability and 55% new business startups for the participants.<br /><br /><strong>Ideal for;</strong> Retirees, Those in employment thinking of &ldquo;side hustles&rdquo;, existing and potential entrepreneurs, Individuals seeking self-employment and organizations seeking to inspire intrapreneurship culture among their employees.<br /><br /><strong>Modules<br /><br /><br /></strong>', '5.jpg', NULL, '2021-11-13 02:19:43', '2022-02-10 07:45:47'),
(16, 'Financial Linkage services', 'We act as an intermediary between financial institutions and the entrepreneurs. Towards this, we guide the entrepreneurs on how to comply with the terms set by the financial institutions and inform them about the funding opportunities available. We also assist the Financial Institutions in developing effective community entry strategies and theory of change.&nbsp;<br /><br /><strong>Services</strong>', '6.jpg', NULL, '2021-11-13 02:26:52', '2022-01-10 10:17:11'),
(17, 'Project Management', 'Development is a function of successful problem identification, project design, project implementation and monitoring to ensure achievement of the project goals. <br /><br />We are committed towards social economic development in the Country and beyond through our high impact project management team.<br /><br /><strong>Services<br /><br /></strong>', 'Project_Management.png', NULL, '2021-11-13 02:50:11', '2022-01-06 09:26:00'),
(18, 'Social Policy Analysis', 'Social policies are critical in nurturing a conducive environment for social economic development especially in developing Countries. Balancing between the positive impacts and the negative impacts emanating from the social policies is a critical tool towards sustainable development. <br /><br />We are committed towards formulation of sustainable development conscious social policies that will steer the Nation and the continent toward prosperity.<br /><br /><strong>Services</strong>', 'Website Images (2).jpg', NULL, '2021-11-13 02:51:47', '2022-01-10 11:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_focus_images`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `area_of_focus_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_of_focus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `commenter_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_time` datetime NOT NULL DEFAULT '2021-09-13 07:04:40',
  `blog_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `blog_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `image_title`, `image_url`, `blog_item_id`, `created_at`, `updated_at`) VALUES
(5, NULL, 'Traits of Successful People.jpg', 13, '2022-04-26 13:29:51', '2022-04-26 13:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `blog_items`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `blog_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaser` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `date_published` datetime NOT NULL DEFAULT '2021-09-13 07:04:40',
  `is_draft` int(11) NOT NULL DEFAULT '1',
  `is_published` int(11) NOT NULL DEFAULT '0',
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_items`
--

INSERT INTO `blog_items` (`id`, `title`, `teaser`, `content`, `date_published`, `is_draft`, `is_published`, `image_url`, `slug`, `created_at`, `updated_at`) VALUES
(12, 'FIVE QUESTIONS EVERY PROSPECTIVE BUSINESS OWNER WANTS ANSWERED', '<p><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #202124;\" /><span style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\"><span style=\"color: #000000;\">Starting a business is not as easy, but it doesn\'t have to be difficult either. Everyone wonders, \"When is the best time to start a business.\" The answer is, \" Start as soon as you are finished.\"</span> </span></p>', '<p><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">To finish before starting requires that you finish planning. Put your idea on paper, research, plan, start. The first mistake that people make is thinking that their idea is brilliant and will therefore be a success. The truth is that, if you have thought of it, others have too, and are probably already working on it. </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">Now that you have an idea, what will guide your research? Here are five questions to get you started. </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">1. Which need will your business address? </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">2. What will be your goods and services? </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">3. Who will be your target customers? </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">4. Which marketing tools will you use? </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">5. How will your business affect its environment? </span><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><br style=\"color: #e8eaed; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap; background-color: #614a19;\" /><span style=\"color: #000000; font-family: Roboto, Arial, sans-serif; font-size: 16px; font-variant-ligatures: none; letter-spacing: 0.1px; white-space: pre-wrap;\">Comment below on any answers you may have to these five questions.</span></p>', '2021-09-13 07:04:40', 0, 1, 'blog-default.jpg', NULL, '2021-09-30 17:36:35', '2021-09-30 17:41:41'),
(13, '4 KEY JOB RETENTION QUALITIES EVERYONE SHOULD HAVE', '<p><span style=\"color: #000000;\">In any firm that wants to increase its revenue and profitability, customer satisfaction remains key. The level of service provided by your employees can easily win or lose your clients. The best defence for staff in times of crisis that result in job cuts is the customer. A satisfied consumer will tell others about you, resulting in more business for you. The dissatisfied customer will do the same.&nbsp;</span></p>', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Mary is a soft-spoken lady, who surprised many after being the only one of a seven-person team to be retained as the rest were laid off from a fashion store. How would the most unlikely employee be kept while the rest were pushed out despite their dalliance with fashion and beauty, which garnered them client admiration?</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">I am an esteemed customer at this amazing fashion store, popular for its highly-rated African attire. The decision to lay off 6 of the more fashion equipped employees and retain Mary, who eschewed fashion in favour of modest attire, piqued my interest.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">I chose to speak with the manager because I was curious about how they came to their decision. Our discussion cleared the way for lessons important to anyone hoping to keep their job, especially during a period of uncertainty. Employers, looking to develop and keep a high-performing team of employees may find this beneficial as well.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">\"Covid 19 hit us so hard that we had to make that painful decision about our staff,\" George, the manager, calmly explained.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp;As I would learn from him, the management planned and conducted a customer survey, whose results would be merged with each employee\'s personalized scorecard on important company performance indicators. Anyone who received a score of less than 3 out of 5 was laid off. Only Mary had received a compelling 3.5, allowing her to keep her work and receive a raise.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">The clients&rsquo; comments explained everything, demonstrating why she was the all-time sales leader:</span></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<blockquote>\r\n<p><span style=\"color: #236fa1;\">&ldquo;Unlike the others, she is very kind and friendly. She has a way of communicating to the customer that makes them feel valued&rdquo;</span></p>\r\n<p><span style=\"color: #236fa1;\">&ldquo;She is my favorite, at times it can be find the right attire but she is always ready to help out&rdquo;</span></p>\r\n<p><span style=\"color: #236fa1;\">&ldquo;I admire her patience, she remains calm when I am frustrated or not content by my choice. She makes it appear very okay and even goes ahead to help until I am satisfied&rdquo;</span></p>\r\n<p><span style=\"color: #236fa1;\">&ldquo;I don&rsquo;t know how she does it but it is always interesting to see how she quickly delivers on my orders&rdquo;</span></p>\r\n</blockquote>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">It was obvious that the clients seemed to be talking about what defines excellent customer service and delivery. In this case, the following qualities stood out:&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp; &nbsp; 1) <strong>Friendly and warm</strong>- There is no room for a second impression. That smile and warm greeting to your client is magical. It shapes the perception of the client in your favour.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp; &nbsp; 2) <strong>Empathy</strong> &ndash; Making a decision from a multitude of choices is not an easy task. A small act of guidance to the client saves them pain and time all while endearing you to them.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp; &nbsp; 3) <strong>Patience</strong>- As clients seek maximum satisfaction, they are likely to make changes to the services requested. Others would take longer to decide. Patience is crucial to ensure that the client doesn&rsquo;t feel like they are a bother.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp; &nbsp; 4) <strong>Efficiency </strong>- People frequently overpromise only to underdeliver, frustrating the client. Poor planning could easily lead to one taking several order requests at once only to deliver late, causing harm to the clients, some of whom have set timeframes.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">In any firm that wants to increase its revenue and profitability, customer satisfaction remains key. The level of service provided by your employees can easily win or lose your clients. The best defence for staff in times of crisis that result in job cuts is the customer. A satisfied consumer will tell others about you, resulting in more business for you. The dissatisfied customer will do the same. However, keep in mind that bad news spreads faster than good news.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Start by improving or gaining important customer satisfaction qualities for yourself or your staff. Talk to us today and benefit from our high-quality and affordable training packages. Call us for a free consultation with our Master trainer.&nbsp;</span></p>', '2021-09-13 07:04:40', 0, 1, 'blog-default.jpg', NULL, '2022-04-26 13:21:58', '2022-04-26 13:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--
-- Creation: Feb 07, 2022 at 05:05 PM
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telephone` mediumtext COLLATE utf8mb4_unicode_ci,
  `email` mediumtext COLLATE utf8mb4_unicode_ci,
  `physical_location` mediumtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `telephone`, `email`, `physical_location`, `facebook`, `twitter`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, '0762 636 208,0726 717 576', 'info@smeltingafrika.co.ke', 'Equity Plaza, 3rd floor, suite 318, Thika Town', 'https://www.facebook.com/smeltingafrikaconsultants/', NULL, NULL, 'https://www.linkedin.com/company/smelting-afrika-consultants', NULL, '2022-02-08 12:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--
-- Creation: Feb 07, 2022 at 05:03 PM
--

CREATE TABLE `core_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(42, 'Professionalism -', 'We commit to the highest level of competence, quality and efficiency in service delivery.', '2022-02-10 07:46:38', '2022-02-10 07:46:38'),
(43, 'Empowerment -', 'We believe our clients have the capacity to achieve their goals given the right support.', '2022-02-10 07:46:38', '2022-02-10 07:46:38'),
(44, 'Research and Innovation driven -', 'We are guided by facts and are open to new ideas', '2022-02-10 07:46:38', '2022-02-10 07:46:38'),
(45, 'Sustainability -', 'Our interventions appreciate both the current and future needs.', '2022-02-10 07:46:38', '2022-02-10 07:46:38'),
(46, 'Involvement of stakeholders -', 'Our stakeholders input is considered a critical ingredient for our success', '2022-02-10 07:46:38', '2022-02-10 07:46:38'),
(47, 'Collaboration -', 'We seek to compliment the efforts of like-minded organizations', '2022-02-10 07:46:38', '2022-02-10 07:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbrev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calling_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_s_r_items`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `c_s_r_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_draft` int(11) NOT NULL DEFAULT '1',
  `is_published` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `location`, `cost`, `description`, `start_date`, `end_date`, `image_url`, `is_draft`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Test Event', 'Thika Office', '1.00', 'Event description. Event description. Event description. Event description. Event description. Event description. Event description. Event description. Event description. Event description.', '2021-09-21', '2021-09-25', 'event-default.jpg', 1, 0, '2021-09-20 00:34:53', '2021-12-22 12:30:23'),
(2, 'Test Event 2', 'Nairobi', '10.00', NULL, '2022-04-21', '2022-05-28', 'event-default.jpg', 1, 0, '2022-04-20 05:39:37', '2022-05-05 01:31:59'),
(3, 'Test 3', 'test 3', '34.00', 'Test 3', '2022-04-21', '2022-05-21', 'event-default.jpg', 0, 1, '2022-05-05 01:40:41', '2022-05-05 01:41:59'),
(4, 'Effective Cost and Quality', 'Zoom', '5000.00', 'This training focuses on the <strong>pillars of effective cost management and quality leadership</strong>.&nbsp;<br />It is an NCA approved training for all contractors in Kenya. Register today and earn 10 CPD points.&nbsp;', '2022-05-19', '2022-05-20', 'None', 0, 1, '2022-05-18 04:05:42', '2022-05-18 04:05:42'),
(5, 'Effective Cost and Quality', 'Zoom', '5000.00', 'This training focuses on the <strong>pillars of effective cost management and quality leadership</strong>.&nbsp;<br />It is an NCA approved training for all contractors in Kenya. Register today and earn 10 CPD points.&nbsp;', '2022-05-19', '2022-05-20', 'None', 0, 1, '2022-05-18 04:06:41', '2022-05-18 04:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `event_extra_data`
--
-- Creation: Dec 21, 2021 at 01:01 PM
--

CREATE TABLE `event_extra_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_of_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_extra_data`
--

INSERT INTO `event_extra_data` (`id`, `event_id`, `name_of_field`, `value_of_field`, `created_at`, `updated_at`) VALUES
(5, 2, 'Company Name', 'VarChar', '2022-05-05 01:31:59', '2022-05-05 01:31:59'),
(6, 2, 'Company Type', 'Int', '2022-05-05 01:31:59', '2022-05-05 01:31:59'),
(7, 4, 'Company Name', 'VarChar', '2022-05-18 04:05:43', '2022-05-18 04:05:43'),
(8, 4, 'Contact Person', 'VarChar', '2022-05-18 04:05:44', '2022-05-18 04:05:44'),
(9, 4, 'Email Address', 'VarChar', '2022-05-18 04:05:44', '2022-05-18 04:05:44'),
(10, 5, 'Company Name', 'VarChar', '2022-05-18 04:06:43', '2022-05-18 04:06:43'),
(11, 5, 'Contact Person', 'VarChar', '2022-05-18 04:06:45', '2022-05-18 04:06:45'),
(12, 5, 'Email Address', 'VarChar', '2022-05-18 04:06:46', '2022-05-18 04:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_payments`
--
-- Creation: Dec 22, 2021 at 03:06 PM
--

CREATE TABLE `event_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `registrant_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `MerchantRequestID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CheckoutRequestID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResponseCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CustomerMessage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MpesaReceiptNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TransactionDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_payments`
--

INSERT INTO `event_payments` (`id`, `amount`, `registrant_id`, `event_id`, `MerchantRequestID`, `CheckoutRequestID`, `ResponseCode`, `CustomerMessage`, `MpesaReceiptNumber`, `TransactionDate`, `PhoneNumber`, `payment_status`, `created_at`, `updated_at`) VALUES
(20, '1.00', 28, 1, '101319-1276803-1', 'ws_CO_22122021204828919898', '0', 'Success. Request accepted for processing', 'PLM0J1QJM8', 'Wed, Dec 22, 2021 8:48 PM', '254723433208', 1, '2021-12-22 14:48:29', '2021-12-22 14:48:44'),
(21, '1.00', 29, 1, '51689-1324081-1', 'ws_CO_22122021212659590315', '0', 'Success. Request accepted for processing', NULL, NULL, NULL, 0, '2021-12-22 15:26:59', '2021-12-22 15:26:59'),
(22, '1.00', 32, 1, '51687-1398126-1', 'ws_CO_22122021215751200904', '0', 'Success. Request accepted for processing', 'PLM1J5TVKR', 'Wed, Dec 22, 2021 9:57 PM', '254723433208', 1, '2021-12-22 15:57:51', '2021-12-22 15:57:59'),
(23, '1.00', 33, 1, '101312-5504001-1', 'ws_CO_24122021155804390713', '0', 'Success. Request accepted for processing', 'PLO7M643IJ', 'Fri, Dec 24, 2021 3:58 PM', '254726717576', 1, '2021-12-24 09:58:07', '2021-12-24 09:58:19'),
(24, '1.00', 34, 1, '12780-15542333-1', 'ws_CO_29122021101313223938', '0', 'Success. Request accepted for processing', 'PLT0TIQ8T0', 'Wed, Dec 29, 2021 10:13 AM', '254701174665', 1, '2021-12-29 04:13:13', '2021-12-29 04:13:30'),
(25, '1.00', 37, 1, '3519-22114964-1', 'ws_CO_05012022203434313330', '0', 'Success. Request accepted for processing', 'QA5572TQDD', 'Wed, Jan 5, 2022 8:34 PM', '254723433208', 1, '2022-01-05 14:34:34', '2022-01-05 14:34:46'),
(26, '1.00', 38, 1, '10467-5096966-1', 'ws_CO_09012022085409072296', '0', 'Success. Request accepted for processing', NULL, NULL, NULL, 0, '2022-01-09 02:54:09', '2022-01-09 02:54:09'),
(27, '10.00', 39, 2, '65225-627121-1', 'ws_CO_20042022114138922799381815', '0', 'Success. Request accepted for processing', 'QDK4O1AFI6', 'Wed, Apr 20, 2022 11:41 AM', '254799381815', 1, '2022-04-20 05:41:39', '2022-04-20 05:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `salutation`, `first_name`, `last_name`, `email_address`, `phone_number`, `city`, `company`, `message`, `event_id`, `created_at`, `updated_at`) VALUES
(28, 'Mr', 'Eric', 'Kaburu', 'droidmayan@gmail.com', '0723433208', 'Nairobi', 'Tech Giants', 'Test', 1, '2021-12-22 14:48:03', '2021-12-22 14:48:03'),
(29, 'Miss', 'Stacy', 'Maritim', 'waithera.maritim@gmail.com', '0799381815', 'Nairobi', 'Fff', 'Test', 1, '2021-12-22 15:26:25', '2021-12-22 15:26:25'),
(30, 'Mr', 'Joe', 'Frazier', 'eric.m.kaburu@gmail.com', '0723433208', 'Nairobi', 'Kremlin', 'No info', 1, '2021-12-22 15:50:06', '2021-12-22 15:50:06'),
(31, 'Mr', 'Joe', 'Frazier', 'eric.m.kaburu@gmail.com', '0723433208', 'Nairobi', 'Kremlin', 'No info', 1, '2021-12-22 15:52:16', '2021-12-22 15:52:16'),
(32, 'Mr', 'Joe', 'Frazier', 'eric.m.kaburu@gmail.com', '0723433208', 'Nairobi', 'Kremlin', 'None', 1, '2021-12-22 15:57:34', '2021-12-22 15:57:34'),
(33, 'Mr', 'Alfred', 'Kimani', 'alfredwarui@gmail.com', '0726717576', 'Nairobi', 'Smelting', 'None', 1, '2021-12-24 09:57:40', '2021-12-24 09:57:40'),
(34, 'Mr', 'Martin', 'Mwikia', 'mwikiam@gmail.com', '0701174665', 'Nairobi', 'Adrian Kenya', 'OHS training interest', 1, '2021-12-29 04:12:38', '2021-12-29 04:12:38'),
(35, 'Mr', 'Martin', 'Mwikia', 'mwikiam@gmail.com', '0701174665', 'Nairobi', 'Adrian Kenya', 'Fiber rollout training', 1, '2021-12-29 04:17:47', '2021-12-29 04:17:47'),
(36, 'Mr', 'Eric', 'Kaburu', 'eric.m.kaburu@gmail.com', '0723433208', 'Nairobi', 'Test', NULL, 1, '2021-12-29 07:24:32', '2021-12-29 07:24:32'),
(37, 'Mr', 'Eric', 'Murithi', 'eric.m.kaburu@gmail.com', '0723433208', 'Nairobi', 'Test company', 'No information', 1, '2022-01-05 14:34:25', '2022-01-05 14:34:25'),
(38, 'Mr', 'Cyrus', 'Kimani', 'cyruskimanih@gmail.com', '0723261695', 'Nakuru', 'TFX construction ltd', 'contractor', 1, '2022-01-09 02:53:45', '2022-01-09 02:53:45'),
(39, 'Miss', 'Stacy', 'Maritim', 'stcmaritim@gmail.com', '0799381815', 'Nairobi', 'Smelting Afrika', 'Excited', 2, '2022-04-20 05:41:17', '2022-04-20 05:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `event_schedules`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `event_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_description` longtext COLLATE utf8mb4_unicode_ci,
  `time_slot` time NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '15eba1cb-40fd-4a35-8e4b-8bf71e0b06a7', 'database', 'default', '{\"uuid\":\"15eba1cb-40fd-4a35-8e4b-8bf71e0b06a7\",\"displayName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\GenerateCertificate\\\":15:{s:13:\\\"\\u0000*\\u0000event_name\\\";s:10:\\\"Test Event\\\";s:16:\\\"\\u0000*\\u0000registrations\\\";s:1259:\\\"[{\\\"id\\\":20,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Eric\\\",\\\"last_name\\\":\\\"Kaburu\\\",\\\"email_address\\\":\\\"droidmayan@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Tech Giants\\\",\\\"message\\\":\\\"Test\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T17:48:29.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T17:48:44.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"28\\\",\\\"MerchantRequestID\\\":\\\"101319-1276803-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021204828919898\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM0J1QJM8\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 8:48 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":22,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Joe\\\",\\\"last_name\\\":\\\"Frazier\\\",\\\"email_address\\\":\\\"eric.m.kaburu@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Kremlin\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T18:57:51.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T18:57:59.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"32\\\",\\\"MerchantRequestID\\\":\\\"51687-1398126-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021215751200904\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM1J5TVKR\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 9:57 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"}]\\\";s:12:\\\"\\u0000*\\u0000form_data\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"fQylFzH2LQRxaTP2YIPcw5UT4JfOZYlpRAoocRPv\\\";s:8:\\\"event_id\\\";s:1:\\\"1\\\";s:10:\\\"co_trainer\\\";s:9:\\\"Test Live\\\";s:11:\\\"description\\\";s:9:\\\"Test Live\\\";}s:8:\\\"\\u0000*\\u0000email\\\";N;s:10:\\\"\\u0000*\\u0000company\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Invalid argument supplied for foreach() in /home/mixqxmsv/public_html/local/app/Jobs/GenerateCertificate.php:43\nStack trace:\n#0 /home/mixqxmsv/public_html/local/app/Jobs/GenerateCertificate.php(43): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Invalid argumen...\', \'/home/mixqxmsv/...\', 43, Array)\n#1 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\GenerateCertificate->handle()\n#2 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\GenerateCertificate))\n#8 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\GenerateCertificate))\n#9 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\GenerateCertificate), false)\n#11 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\GenerateCertificate))\n#12 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\GenerateCertificate))\n#13 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\GenerateCertificate))\n#15 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'high,default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'high,default\')\n#21 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 /home/mixqxmsv/public_html/local/vendor/symfony/console/Command/Command.php(299): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(978): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(295): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(167): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 /home/mixqxmsv/public_html/local/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2021-12-23 12:44:10'),
(2, '325c859c-85c1-4a10-8683-03ee38f33b65', 'database', 'default', '{\"uuid\":\"325c859c-85c1-4a10-8683-03ee38f33b65\",\"displayName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\GenerateCertificate\\\":15:{s:13:\\\"\\u0000*\\u0000event_name\\\";s:10:\\\"Test Event\\\";s:16:\\\"\\u0000*\\u0000registrations\\\";s:1259:\\\"[{\\\"id\\\":20,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Eric\\\",\\\"last_name\\\":\\\"Kaburu\\\",\\\"email_address\\\":\\\"droidmayan@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Tech Giants\\\",\\\"message\\\":\\\"Test\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T17:48:29.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T17:48:44.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"28\\\",\\\"MerchantRequestID\\\":\\\"101319-1276803-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021204828919898\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM0J1QJM8\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 8:48 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":22,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Joe\\\",\\\"last_name\\\":\\\"Frazier\\\",\\\"email_address\\\":\\\"eric.m.kaburu@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Kremlin\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T18:57:51.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T18:57:59.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"32\\\",\\\"MerchantRequestID\\\":\\\"51687-1398126-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021215751200904\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM1J5TVKR\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 9:57 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"}]\\\";s:12:\\\"\\u0000*\\u0000form_data\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"fQylFzH2LQRxaTP2YIPcw5UT4JfOZYlpRAoocRPv\\\";s:8:\\\"event_id\\\";s:1:\\\"1\\\";s:10:\\\"co_trainer\\\";s:4:\\\"live\\\";s:11:\\\"description\\\";s:4:\\\"live\\\";}s:8:\\\"\\u0000*\\u0000email\\\";N;s:10:\\\"\\u0000*\\u0000company\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\GenerateCertificate has been attempted too many times or run too long. The job may have previously timed out. in /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:750\nStack trace:\n#0 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'high,default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'high,default\')\n#6 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 /home/mixqxmsv/public_html/local/vendor/symfony/console/Command/Command.php(299): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(978): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(295): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(167): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 /home/mixqxmsv/public_html/local/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2021-12-23 12:49:44'),
(3, 'b85a0eb7-7cab-45c2-af25-c0cf38c3a935', 'database', 'default', '{\"uuid\":\"b85a0eb7-7cab-45c2-af25-c0cf38c3a935\",\"displayName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\GenerateCertificate\\\":15:{s:13:\\\"\\u0000*\\u0000event_name\\\";s:10:\\\"Test Event\\\";s:16:\\\"\\u0000*\\u0000registrations\\\";s:2537:\\\"[{\\\"id\\\":20,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Eric\\\",\\\"last_name\\\":\\\"Kaburu\\\",\\\"email_address\\\":\\\"droidmayan@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Tech Giants\\\",\\\"message\\\":\\\"Test\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T17:48:29.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T17:48:44.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"28\\\",\\\"MerchantRequestID\\\":\\\"101319-1276803-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021204828919898\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM0J1QJM8\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 8:48 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":22,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Joe\\\",\\\"last_name\\\":\\\"Frazier\\\",\\\"email_address\\\":\\\"eric.m.kaburu@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Kremlin\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T18:57:51.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T18:57:59.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"32\\\",\\\"MerchantRequestID\\\":\\\"51687-1398126-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021215751200904\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM1J5TVKR\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 9:57 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":23,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Alfred\\\",\\\"last_name\\\":\\\"Kimani\\\",\\\"email_address\\\":\\\"alfredwarui@gmail.com\\\",\\\"phone_number\\\":\\\"0726717576\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Smelting\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-24T12:58:07.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-24T12:58:19.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"33\\\",\\\"MerchantRequestID\\\":\\\"101312-5504001-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_24122021155804390713\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLO7M643IJ\\\",\\\"TransactionDate\\\":\\\"Fri, Dec 24, 2021 3:58 PM\\\",\\\"PhoneNumber\\\":\\\"254726717576\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":24,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Martin\\\",\\\"last_name\\\":\\\"Mwikia\\\",\\\"email_address\\\":\\\"mwikiam@gmail.com\\\",\\\"phone_number\\\":\\\"0701174665\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Adrian Kenya\\\",\\\"message\\\":\\\"OHS training interest\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-29T07:13:13.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-29T07:13:30.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"34\\\",\\\"MerchantRequestID\\\":\\\"12780-15542333-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_29122021101313223938\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLT0TIQ8T0\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 29, 2021 10:13 AM\\\",\\\"PhoneNumber\\\":\\\"254701174665\\\",\\\"payment_status\\\":\\\"1\\\"}]\\\";s:12:\\\"\\u0000*\\u0000form_data\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"lyLbSFiXfeMyIdIyP0jQawMgsCoodJfQbfdxL5x7\\\";s:8:\\\"event_id\\\";s:1:\\\"1\\\";s:10:\\\"co_trainer\\\";s:4:\\\"test\\\";s:11:\\\"description\\\";s:4:\\\"test\\\";}s:8:\\\"\\u0000*\\u0000email\\\";N;s:10:\\\"\\u0000*\\u0000company\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\GenerateCertificate has been attempted too many times or run too long. The job may have previously timed out. in /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:750\nStack trace:\n#0 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'high,default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'high,default\')\n#6 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 /home/mixqxmsv/public_html/local/vendor/symfony/console/Command/Command.php(299): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(978): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(295): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(167): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 /home/mixqxmsv/public_html/local/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2022-01-05 13:59:53'),
(4, '96db040c-9065-41a1-9f7e-f1200cfefc70', 'database', 'default', '{\"uuid\":\"96db040c-9065-41a1-9f7e-f1200cfefc70\",\"displayName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateCertificate\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\GenerateCertificate\\\":15:{s:13:\\\"\\u0000*\\u0000event_name\\\";s:10:\\\"Test Event\\\";s:16:\\\"\\u0000*\\u0000registrations\\\";s:2537:\\\"[{\\\"id\\\":20,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Eric\\\",\\\"last_name\\\":\\\"Kaburu\\\",\\\"email_address\\\":\\\"droidmayan@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Tech Giants\\\",\\\"message\\\":\\\"Test\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T17:48:29.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T17:48:44.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"28\\\",\\\"MerchantRequestID\\\":\\\"101319-1276803-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021204828919898\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM0J1QJM8\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 8:48 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":22,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Joe\\\",\\\"last_name\\\":\\\"Frazier\\\",\\\"email_address\\\":\\\"eric.m.kaburu@gmail.com\\\",\\\"phone_number\\\":\\\"0723433208\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Kremlin\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-22T18:57:51.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-22T18:57:59.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"32\\\",\\\"MerchantRequestID\\\":\\\"51687-1398126-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_22122021215751200904\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLM1J5TVKR\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 22, 2021 9:57 PM\\\",\\\"PhoneNumber\\\":\\\"254723433208\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":23,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Alfred\\\",\\\"last_name\\\":\\\"Kimani\\\",\\\"email_address\\\":\\\"alfredwarui@gmail.com\\\",\\\"phone_number\\\":\\\"0726717576\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Smelting\\\",\\\"message\\\":\\\"None\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-24T12:58:07.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-24T12:58:19.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"33\\\",\\\"MerchantRequestID\\\":\\\"101312-5504001-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_24122021155804390713\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLO7M643IJ\\\",\\\"TransactionDate\\\":\\\"Fri, Dec 24, 2021 3:58 PM\\\",\\\"PhoneNumber\\\":\\\"254726717576\\\",\\\"payment_status\\\":\\\"1\\\"},{\\\"id\\\":24,\\\"salutation\\\":\\\"Mr\\\",\\\"first_name\\\":\\\"Martin\\\",\\\"last_name\\\":\\\"Mwikia\\\",\\\"email_address\\\":\\\"mwikiam@gmail.com\\\",\\\"phone_number\\\":\\\"0701174665\\\",\\\"city\\\":\\\"Nairobi\\\",\\\"company\\\":\\\"Adrian Kenya\\\",\\\"message\\\":\\\"OHS training interest\\\",\\\"event_id\\\":\\\"1\\\",\\\"created_at\\\":\\\"2021-12-29T07:13:13.000000Z\\\",\\\"updated_at\\\":\\\"2021-12-29T07:13:30.000000Z\\\",\\\"amount\\\":\\\"1.00\\\",\\\"registrant_id\\\":\\\"34\\\",\\\"MerchantRequestID\\\":\\\"12780-15542333-1\\\",\\\"CheckoutRequestID\\\":\\\"ws_CO_29122021101313223938\\\",\\\"ResponseCode\\\":\\\"0\\\",\\\"CustomerMessage\\\":\\\"Success. Request accepted for processing\\\",\\\"MpesaReceiptNumber\\\":\\\"PLT0TIQ8T0\\\",\\\"TransactionDate\\\":\\\"Wed, Dec 29, 2021 10:13 AM\\\",\\\"PhoneNumber\\\":\\\"254701174665\\\",\\\"payment_status\\\":\\\"1\\\"}]\\\";s:12:\\\"\\u0000*\\u0000form_data\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"lyLbSFiXfeMyIdIyP0jQawMgsCoodJfQbfdxL5x7\\\";s:8:\\\"event_id\\\";s:1:\\\"1\\\";s:10:\\\"co_trainer\\\";s:12:\\\"Test trainer\\\";s:11:\\\"description\\\";s:377:\\\"Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description. Test description.\\\";}s:8:\\\"\\u0000*\\u0000email\\\";N;s:10:\\\"\\u0000*\\u0000company\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\GenerateCertificate has been attempted too many times or run too long. The job may have previously timed out. in /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:750\nStack trace:\n#0 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'high,default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'high,default\')\n#6 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 /home/mixqxmsv/public_html/local/vendor/symfony/console/Command/Command.php(299): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(978): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(295): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /home/mixqxmsv/public_html/local/vendor/symfony/console/Application.php(167): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 /home/mixqxmsv/public_html/local/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 /home/mixqxmsv/public_html/local/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2022-01-05 14:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--
-- Creation: Dec 22, 2021 at 07:19 PM
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2021_06_02_132610_create_subscribers_table', 4),
(5, '2021_06_03_002951_create_countries_table', 5),
(6, '2021_09_04_221547_create_blog_items_table', 6),
(7, '2021_09_04_222304_create_blog_comments_table', 7),
(8, '2021_09_13_012452_create_area_of_foci_table', 8),
(9, '2021_09_13_033918_create_c_s_r_items_table', 9),
(10, '2021_09_15_070830_create_slide_images_table', 10),
(11, '2021_09_16_125803_create_blog_images_table', 11),
(12, '2021_09_19_192122_create_area_of_focus_images_table', 12),
(13, '2021_09_19_201758_create_events_table', 13),
(14, '2021_09_19_201811_create_event_schedules_table', 14),
(15, '2021_09_19_202323_create_event_images_table', 15),
(17, '2021_09_19_223125_create_event_registrations_table', 16),
(18, '2021_10_28_113308_create_event_payments_table', 17),
(19, '2021_10_31_120703_create_sub_services_table', 18),
(20, '2021_11_13_042122_add_price_field_to_events', 19),
(21, '2021_11_23_050044_create_permission_tables', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('eric.m.kaburu@gmail.com', '$2y$10$N7eXucVEZzmpPwvoFbw97.6AAREZd8pMyWiDbGzRbV3f5YuDkAhbS', '2022-01-05 14:36:44'),
('waithera.maritim@gmail.com', '$2y$10$3NdEEko5wKGzXOvS0Ykbce9mZ46rj/whmjdooy7j6ZzrRpeAGOflW', '2022-01-06 05:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Test permission Edited', 'web', '2021-11-23 12:06:51', '2021-11-23 12:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'web', NULL, '2021-11-23 09:36:58'),
(2, 'Super Admin', 'web', NULL, NULL),
(3, 'Content Viewer Edited', 'web', '2021-11-23 09:40:20', '2021-11-23 12:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide_images`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `slide_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `random_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_images`
--

INSERT INTO `slide_images` (`id`, `title`, `description`, `image_url`, `random_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Alfred together with other business mentors during a group mentorship meeting at Cascade Premier Hotel', 'banner-nice.jpg', NULL, '2021-09-19 23:23:54', '2021-09-19 23:24:50'),
(4, NULL, 'Alfred conducting a training for group leaders from Kandara Constituency at the Social development Office boardroom', 'kandara-training.jpg', NULL, '2021-09-19 23:24:25', '2022-01-06 07:44:38'),
(5, NULL, 'Equity group foundation mentees in a meeting at Cascade Premier Hotel.', 'IMG-20210529-WA0021.jpg', NULL, '2021-09-19 23:26:20', '2021-09-19 23:26:57'),
(6, NULL, 'CEO, Mary of Help for the Sick Hospital making her comments during a management inhouse training conducted by Alfred', 'IMG-20191212-WA0000.jpg', NULL, '2021-09-19 23:26:28', '2022-01-06 07:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_of_expertise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years_of_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `sub_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_services`
--

INSERT INTO `sub_services` (`id`, `title`, `content`, `image_url`, `slug`, `parent_service_id`, `created_at`, `updated_at`) VALUES
(52, 'Problem identification and project design', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(53, 'Project feasibility studies', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(54, 'Project implementation planning', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(55, 'Monitoring and evaluation', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(56, 'Impact reporting', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(57, 'Fundraising for the projects', NULL, NULL, NULL, 17, '2022-01-06 09:26:00', '2022-01-06 09:26:00'),
(109, 'Social Policy Formulation', NULL, NULL, NULL, 18, '2022-01-10 11:26:12', '2022-01-10 11:26:12'),
(110, 'Social Policy Analysis and Reporting', NULL, NULL, NULL, 18, '2022-01-10 11:26:12', '2022-01-10 11:26:12'),
(111, 'Social Policy Training', NULL, NULL, NULL, 18, '2022-01-10 11:26:13', '2022-01-10 11:26:13'),
(112, 'Business plan development', NULL, NULL, NULL, 16, '2022-01-13 04:08:53', '2022-01-13 04:08:53'),
(113, 'Groups formation', NULL, NULL, NULL, 16, '2022-01-13 04:08:53', '2022-01-13 04:08:53'),
(114, 'Financial literacy training', NULL, NULL, NULL, 16, '2022-01-13 04:08:53', '2022-01-13 04:08:53'),
(115, 'Group investment plans', NULL, NULL, NULL, 16, '2022-01-13 04:08:54', '2022-01-13 04:08:54'),
(116, 'Market penetration strategy and development of theory of change', NULL, NULL, NULL, 16, '2022-01-13 04:08:54', '2022-01-13 04:08:54'),
(117, 'Business idea pitch development to attract investors', NULL, NULL, NULL, 16, '2022-01-13 04:08:54', '2022-01-13 04:08:54'),
(128, 'How to generate a viable business idea - Aimed at potential entrepreneurs with no viable business idea.', NULL, NULL, NULL, 15, '2022-02-10 07:45:48', '2022-02-10 07:45:48'),
(129, 'Developing a simple and practical business plan – Target potential entrepreneurs with a viable business idea.', NULL, NULL, NULL, 15, '2022-02-10 07:45:49', '2022-02-10 07:45:49'),
(130, 'Revenue and profit maximization strategies- Targets existing entrepreneurs with more than one year experience.', NULL, NULL, NULL, 15, '2022-02-10 07:45:49', '2022-02-10 07:45:49'),
(131, 'Planning for your business expansion- Aimed at stable businesses which are ready to increase their presence in other areas.', NULL, NULL, NULL, 15, '2022-02-10 07:45:49', '2022-02-10 07:45:49'),
(132, 'Family businesses- Aimed at steering family owned and managed businesses across generations through mitigation of risks hindering their growth like poor succession plans.', NULL, NULL, NULL, 15, '2022-02-10 07:45:49', '2022-02-10 07:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--
-- Creation: Feb 07, 2022 at 05:01 PM
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'silhouette.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `title`, `linkedin`, `image`, `created_at`, `updated_at`) VALUES
(7, 'Alfred Warui Kimani', 'CEO & Founder', 'https://www.linkedin.com/in/alfred-warui-0a040176/', 'alfred.png', '2022-02-08 11:57:31', '2022-02-08 11:57:33'),
(8, 'Stacy Maritim', 'Programmes Administrator', 'https://www.linkedin.com/in/stacy-maritim-a81197162/', 'stacy.png', '2022-02-08 11:58:31', '2022-02-08 23:22:35'),
(9, 'Monicah Mwangi', 'Associate Consultant', 'https://www.linkedin.com/in/monicah-mwangi-17571a68', 'monicah.png', '2022-02-08 11:59:19', '2022-02-08 11:59:20'),
(10, 'Geoffrey Kilonzo', 'Associate Consultant', 'https://www.linkedin.com/in/geoffrey-kilonzo-48803b28/', 'geoffrey.png', '2022-02-08 12:00:01', '2022-02-08 12:00:06'),
(11, 'David Macharia', 'Director and MSME Representative', 'https://www.linkedin.com/company/smelting-afrika-consultants', 'david.png', '2022-02-08 12:00:45', '2022-02-08 12:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `team_member_images`
--
-- Creation: Feb 07, 2022 at 05:02 PM
--

CREATE TABLE `team_member_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_member_images`
--

INSERT INTO `team_member_images` (`id`, `image_title`, `image_url`, `team_member_id`, `created_at`, `updated_at`) VALUES
(7, NULL, 'alfred.png', 7, '2022-02-08 11:57:33', '2022-02-08 11:57:33'),
(9, NULL, 'monicah.png', 9, '2022-02-08 11:59:20', '2022-02-08 11:59:20'),
(10, NULL, 'geoffrey.png', 10, '2022-02-08 12:00:05', '2022-02-08 12:00:05'),
(11, NULL, 'david.png', 11, '2022-02-08 12:00:47', '2022-02-08 12:00:47'),
(13, NULL, 'stacy.png', 8, '2022-02-08 13:01:38', '2022-02-08 13:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Nov 23, 2021 at 03:56 PM
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eric Kaburu', 'eric.m.kaburu@gmail.com', '2021-09-13 07:05:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pt96COXEmKXMb96yg4ej86BlAOSOX655zfWE45rL4O9yYAyvLpZe0DIoRcXK', '2021-09-13 07:05:07', '2021-09-13 07:05:07'),
(2, 'Stacy Maritim', 'waithera.maritim@gmail.com', '2021-09-25 15:13:52', '$2y$10$6DhWeh0JrFKisjMW3OE/7.9jL4Z.BeZOW4zlGP3k52YyrnjGm6vtq', 'ZEYpGwaIRsX7BZlSyvEI4vNzo44flaBGdskf4sSE4Y97mJHcQivv8NJZslbp', '2021-09-25 15:13:52', '2022-01-10 11:27:01'),
(3, 'Test user', 'test@example.com', NULL, '$2y$10$SX6bF5MAR0d0Bn6skC4pSuG62Kl9ZlpkfRHjS6CB/egHEEomZ9er.', NULL, '2021-11-23 09:25:58', '2021-11-23 09:50:54'),
(4, 'Super Admin', 'admin@smeltingafrika.co.ke', NULL, '$2y$10$Xlp85QxO0qPE8UZ2qvMRaOmjnmQnEWDqSKj3YErWPRkZKb2BL5qsS', NULL, '2022-01-10 07:23:28', '2022-01-10 07:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accreditations`
--
ALTER TABLE `accreditations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accreditation_images`
--
ALTER TABLE `accreditation_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accreditation_images_accreditation_item_id_foreign` (`accreditation_item_id`);

--
-- Indexes for table `area_of_foci`
--
ALTER TABLE `area_of_foci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_of_focus_images`
--
ALTER TABLE `area_of_focus_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_of_focus_images_area_of_focus_id_foreign` (`area_of_focus_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_item_id_foreign` (`blog_item_id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_images_blog_item_id_foreign` (`blog_item_id`);

--
-- Indexes for table `blog_items`
--
ALTER TABLE `blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_s_r_items`
--
ALTER TABLE `c_s_r_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_extra_data`
--
ALTER TABLE `event_extra_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_extra_data_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_images_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_payments`
--
ALTER TABLE `event_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_payments_registrant_id_foreign` (`registrant_id`),
  ADD KEY `event_payments_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registrations_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_schedules`
--
ALTER TABLE `event_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_schedules_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_address_unique` (`email_address`),
  ADD UNIQUE KEY `subscribers_phone_number_unique` (`phone_number`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_services_parent_service_id_foreign` (`parent_service_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member_images`
--
ALTER TABLE `team_member_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_member_images_team_member_id_foreign` (`team_member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accreditations`
--
ALTER TABLE `accreditations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `accreditation_images`
--
ALTER TABLE `accreditation_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `area_of_foci`
--
ALTER TABLE `area_of_foci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `area_of_focus_images`
--
ALTER TABLE `area_of_focus_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_items`
--
ALTER TABLE `blog_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_s_r_items`
--
ALTER TABLE `c_s_r_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_extra_data`
--
ALTER TABLE `event_extra_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_payments`
--
ALTER TABLE `event_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `event_schedules`
--
ALTER TABLE `event_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_member_images`
--
ALTER TABLE `team_member_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accreditation_images`
--
ALTER TABLE `accreditation_images`
  ADD CONSTRAINT `accreditation_images_accreditation_item_id_foreign` FOREIGN KEY (`accreditation_item_id`) REFERENCES `accreditations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `area_of_focus_images`
--
ALTER TABLE `area_of_focus_images`
  ADD CONSTRAINT `area_of_focus_images_area_of_focus_id_foreign` FOREIGN KEY (`area_of_focus_id`) REFERENCES `area_of_foci` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_item_id_foreign` FOREIGN KEY (`blog_item_id`) REFERENCES `blog_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_blog_item_id_foreign` FOREIGN KEY (`blog_item_id`) REFERENCES `blog_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_extra_data`
--
ALTER TABLE `event_extra_data`
  ADD CONSTRAINT `event_extra_data_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_images`
--
ALTER TABLE `event_images`
  ADD CONSTRAINT `event_images_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_payments`
--
ALTER TABLE `event_payments`
  ADD CONSTRAINT `event_payments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_payments_registrant_id_foreign` FOREIGN KEY (`registrant_id`) REFERENCES `event_registrations` (`id`);

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_schedules`
--
ALTER TABLE `event_schedules`
  ADD CONSTRAINT `event_schedules_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `sub_services_parent_service_id_foreign` FOREIGN KEY (`parent_service_id`) REFERENCES `area_of_foci` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_member_images`
--
ALTER TABLE `team_member_images`
  ADD CONSTRAINT `team_member_images_team_member_id_foreign` FOREIGN KEY (`team_member_id`) REFERENCES `team_members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
