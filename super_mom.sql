-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 12:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_mom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `qnt` bigint(20) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_by`, `products_id`, `qnt`, `price`, `created_at`, `updated_at`) VALUES
(14, 1, 1, 1, 100, NULL, NULL),
(15, 1, 2, 1, 150, NULL, NULL),
(16, 1, 3, 1, 150, NULL, NULL),
(17, 1, 5, 1, 477, NULL, NULL),
(18, 1, 6, 1, 5000, NULL, NULL),
(19, 1, 17, 1, 430, NULL, NULL),
(20, 1, 18, 1, 54, NULL, NULL),
(21, 1, 15, 1, 227, NULL, NULL),
(22, 5, 1, 1, 100, NULL, NULL),
(23, 5, 2, 1, 150, NULL, NULL),
(24, 5, 3, 1, 150, NULL, NULL),
(25, 5, 5, 1, 477, NULL, NULL),
(26, 5, 6, 1, 5000, NULL, NULL),
(27, 5, 17, 1, 430, NULL, NULL),
(28, 5, 18, 1, 54, NULL, NULL),
(29, 5, 15, 1, 227, NULL, NULL),
(30, 4, 1, 1, 100, NULL, NULL),
(31, 4, 2, 1, 150, NULL, NULL),
(32, 4, 3, 1, 150, NULL, NULL),
(33, 4, 5, 1, 477, NULL, NULL),
(34, 4, 6, 1, 5000, NULL, NULL),
(35, 4, 17, 1, 430, NULL, NULL),
(36, 4, 18, 1, 54, NULL, NULL),
(37, 4, 15, 1, 227, NULL, NULL),
(38, 11, 1, 1, 100, NULL, NULL),
(39, 11, 2, 1, 150, NULL, NULL),
(40, 11, 3, 1, 150, NULL, NULL),
(41, 11, 5, 1, 477, NULL, NULL),
(42, 11, 6, 1, 5000, NULL, NULL),
(43, 11, 17, 1, 430, NULL, NULL),
(44, 11, 18, 1, 54, NULL, NULL),
(45, 11, 15, 1, 227, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`, `tags`, `slug`) VALUES
(1, 'BASKET', 'BASKET', NULL, 1, NULL, '2023-10-10 21:50:48', '2023-11-10 04:49:04', 'BASKET,Category', 'basket'),
(2, 'BOARD', 'BOARD', NULL, 1, NULL, '2023-10-11 03:30:18', '2023-11-10 04:49:01', 'BOARD,Category', 'board'),
(3, 'BOTTLE', 'BOTTLE', NULL, 1, NULL, '2023-10-11 04:18:50', '2023-11-10 04:48:59', 'BOTTLE,Category', 'bottle'),
(4, 'CHIPSER', 'CHIPSER', NULL, 1, NULL, NULL, '2023-11-10 04:48:58', 'CHIPSER,Category', 'chipser'),
(5, 'CHOPPER', 'CHOPPER', NULL, 1, NULL, NULL, '2023-11-10 04:48:53', 'CHOPPER,Category', 'chopper'),
(10, 'CUTTER', 'CUTTER', '', 1, NULL, '2023-11-06 10:39:03', '2023-11-07 15:06:48', 'CUTTER,Category', 'cutter'),
(11, 'GLASS', 'GLASS', '', 1, NULL, '2023-11-06 10:39:15', '2023-11-07 15:06:48', 'GLASS,Category', 'glass'),
(12, 'GRATER', 'GRATER', '', 1, NULL, '2023-11-06 10:39:40', '2023-11-07 15:06:48', 'GRATER,Category', 'grater'),
(13, 'JUICER', 'JUICER', '', 1, NULL, '2023-11-06 10:39:53', '2023-11-07 15:06:48', 'JUICER,Category', 'juicer'),
(14, 'KNIFE', 'KNIFE', '', 1, NULL, '2023-11-06 10:40:02', '2023-11-07 15:06:48', 'KNIFE,Category', 'knife'),
(15, 'LEMON SQUEEZER', 'LEMON SQUEEZER', '', 1, NULL, '2023-11-06 10:40:16', '2023-11-07 15:06:48', 'LEMON SQUEEZER,Category', 'lemon_squeezer'),
(16, 'LIGHTER', 'LIGHTER', '', 1, NULL, '2023-11-06 10:40:26', '2023-11-07 15:06:48', 'LIGHTER,Category', 'lighter'),
(17, 'MASHER', 'MASHER', '', 1, NULL, '2023-11-06 10:40:34', '2023-11-07 15:06:48', 'MASHER,Category', 'masher'),
(18, 'MUG', 'MUG', '', 1, NULL, '2023-11-06 10:40:44', '2023-11-07 15:06:48', 'MUG,Category', 'mug'),
(19, 'PEELER', 'PEELER', '', 1, NULL, '2023-11-06 10:40:57', '2023-11-07 15:06:48', 'PEELER,Category', 'peeler'),
(20, 'SALT PEPPER', 'SALT PEPPER', '', 1, NULL, '2023-11-06 10:41:57', '2023-11-07 15:06:48', 'SALT PEPPER,Category', 'salt_pepper'),
(21, 'SLICER', 'SLICER', '', 1, NULL, '2023-11-06 10:42:08', '2023-11-07 15:06:48', 'SLICER,Category', 'slicer'),
(22, 'SPOON', 'SPOON', '', 1, NULL, '2023-11-06 10:42:19', '2023-11-07 15:06:48', 'SPOON,Category', 'spoon'),
(23, 'STRAINER', 'STRAINER', '', 1, NULL, '2023-11-06 10:42:30', '2023-11-07 15:06:48', 'STRAINER,Category', 'strainer'),
(24, 'WIPER', 'WIPER', '', 1, NULL, '2023-11-06 10:42:40', '2023-11-07 15:06:48', 'WIPER,Category', 'wiper'),
(26, 'Nihil quis excepteur', 'Dignissimos non qui', '1699522073.jpg', 1, NULL, '2023-11-09 09:25:57', '2023-11-09 09:27:53', 'Dicta consequatur,q.', 'nihil_quis_excepteur');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `cms_key` varchar(255) DEFAULT NULL,
  `cms_value` longtext DEFAULT NULL,
  `field_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `cms_key`, `cms_value`, `field_type`, `description`, `status`, `page_id`, `created_at`, `updated_at`, `tags`) VALUES
(1, 'App Logo', 'app_logo', '1700132854.png', 'img', '[]', 1, 1, '2023-10-14 23:14:26', '2023-11-16 11:07:34', 'kitchen items,kitchenware,kitchenware products,kitchenware items,kitchenware online,kitchen linen,kitchenware online shopping,tableware and kitchenware,HomeTown'),
(2, 'contact email', 'contact_email', '<p>yogiproducts@yahoo.in</p>', 'text', 'yogiproducts@yahoo.in', 1, 5, '2023-10-18 21:04:28', '2023-11-07 10:38:32', ''),
(3, 'contact no', 'contact_no', '+91 9909788802', 'text', 'contact no', 1, 5, '2023-10-18 21:05:05', '2023-11-07 15:19:33', ''),
(4, 'website', 'website', '<p>www.apexkitchenware.in</p>', 'text', 'www.apexkitchenware.in', 1, 5, '2023-10-18 21:06:07', '2023-11-07 10:38:41', ''),
(5, 'address', 'address', '<p>YOGI PRODUCTS Vavdi Survey No. 20,<br />\r\nPlot No. 26/2, Everest Ind. Area,<br />\r\nGondal Road,Near Poonam Dumper,<br />\r\nVavdi, Rajkot-360004</p>', 'text', 'YOGI PRODUCTS Vavdi Survey No. 20, Plot No. 26/2, Everest Ind. Area, Gondal Road, Near Poonam Dumper, Vavdi, Rajkot-360004', 1, 5, '2023-10-18 21:23:28', '2023-11-07 10:38:50', ''),
(6, 'working_time', 'working_time', '<p>Sun - Fri&nbsp; &nbsp;09 am - 8 pm</p>', 'text', 'working_time', 1, 5, '2023-10-24 03:42:03', '2023-11-10 05:13:34', ''),
(7, 'Location Link', 'location_link', 'https://maps.app.goo.gl/czYPXpdwobs65y7m7', 'link', 'Location Link', 1, 5, '2023-10-24 07:41:38', '2023-11-07 10:38:57', ''),
(8, 'Contact Us', 'contact_us', '<div class=\"about-section\">\r\n<h2>Contact Us</h2>\r\n\r\n<p>YOGI PRODUCTS<br />\r\nVavdi Survey No. 20, Plot No. 26/2,<br />\r\nEverest Ind. Area, Gondal Road,<br />\r\nNear Poonam Dumper, Vavdi, Rajkot-360004<br />\r\n&nbsp;</p>\r\n\r\n<p>Customer care no.: <a class=\"is-black\" href=\"tel:+91 99097 88802\">+91 99097 88802&nbsp;</a><br />\r\nEmail.: <a href=\"mailto:yogiproduct@yahoo.in\"> yogiproduct@yahoo.in</a></p>\r\n</div>', 'text', 'Contact Us', 1, 4, '2023-10-30 16:36:45', '2023-11-16 07:37:40', ''),
(9, 'Privacy Policy', 'privacy_policy', '<h1>Privacy Policy</h1>\r\n\r\n<p><br />\r\nBefore or at any time before or at the time of collecting personal information, we will identify the purposes for which information is being collected.<br />\r\n&bull; We will collect and use personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concern or as required by Law.<br />\r\n&bull; We will only retain personal information as long as necessary for the fulfillment of those purposes.<br />\r\n&bull; We will collect personal information by lawful and fair means, and, where appropriate, with the knowledge or consent of the individual concern.<br />\r\n&bull; Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up to date.<br />\r\n&bull; We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.<br />\r\n&bull; We will make readily available to customers information about our policies and practices relating to the management of personal information.</p>', 'text', 'Privacy Policy', 1, 7, '2023-10-30 16:37:42', '2023-11-07 11:25:48', ''),
(10, 'Terms Condition', 'terms_condition', '<h1>Terms Condition</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>VRG will recruit, interview, select, and hire assigned employees (&ldquo;Associates&rdquo;) who, in VRG&rsquo;s judgment, possess the qualifications that the Client requests. VRG&rsquo;s standard hiring process does NOT include criminal background, pre-employment credit report, motor vehicle records, or drug screenings (&ldquo;Background Screening&rdquo;), unless they are arranged in advance with the Client for an additional fee. Any Client requests for Background Screening will be invoiced to Client and a copy of the results will be provided to the Client at the Client&rsquo;s request.</li>\r\n	<li>Client is responsible for the safety and supervision, including the accuracy of work, of VRG Associates while they are on the Client&rsquo;s premises.</li>\r\n	<li>Client agrees not to allow Associates to be exposed to cash, checks, keys, credit cards, merchandise, negotiable instruments, or confidential information or to permit them to travel or to operate motor vehicles or equipment while they are on assignment with the Client without prior written consent from VRG; and Client agrees to bear the risks of such exposure or activity.</li>\r\n	<li>VRG Associates are assigned on the basis of a particular job description and are not to change job duties without VRG&rsquo;s prior approval.</li>\r\n	<li><u>ASSOCIATE GUARANTEE</u>: If for any reason the Client is dissatisfied with an Associate&rsquo;s qualifications on the first day of assignment and notifies VRG immediately, VRG will not charge Client for the hours worked up to a maximum of 8 hours, and VRG will make reasonable efforts to replace the Associate immediately. The Associate Guarantee is Client&rsquo;s sole remedy for dissatisfaction with an Associate&rsquo;s qualifications, performance or conduct. The Associate Guarantee expires after the first day of work and should the Client choose to continue the assignment, Client will be responsible for all of the billable hours worked.</li>\r\n</ol>', 'text', 'Terms Condition', 1, 6, '2023-10-30 16:38:01', '2023-11-07 11:25:53', ''),
(11, 'About Us', 'about_us', '<h2>About Us</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>SUPER MOM KItchenware Was Established in 1997.Our Remarkable collection of kitchen products has been particularly designed to ensure that it efficiently uses the available space. Highly convenient to use, our kitchen accessories &amp; products have become an integral part of almost every kitchen. &quot;SUPER MOM&quot; Kitchenware is the name to be reckoned with top companies that are into the business of manufacturing, supplying, trading and distribution of kitchen accessories and kitchen tainless steel products. These products are designed after acquiring deep knowledge of the latest marks trends. We develop various kitchenware by top quality stainless steel and other material. This ensures that all our products adhere to the international quality standard. Further, this has assisted us in satisfying a large number of customers. In fact, we are the leaders in domain of kitchen products</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Quality Assurance</h2>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>Each and every kitchen product manufactured and distributed by us is a perfect example of high quality along with exquisiteness in our company, we follow a quality policy based on the international standerds at every stage of the production and delivery.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>High Technology Machinery</li>\r\n	<li>Team Work</li>\r\n	<li>Quality Products</li>\r\n	<li>Manufacturing Kitchenware Items of International standard has secured a place as one of the companies exporting Apex range of Kitchenware Items.</li>\r\n</ul>', 'text', 'about us', 1, 3, '2023-11-06 18:43:54', '2023-11-08 17:45:56', 'about us');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `number`, `service`, `address`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lacota Townsend', 'pikevehuq@mailinator.com', '1231231320', 'inquiry', 'Officiis est esse no', 'Quis et occaecat aut', 1, '2023-11-07 15:20:44', '2023-11-07 15:20:44'),
(2, 'Lacota Townsend', 'pikevehuq@mailinator.com', '1231231320', 'inquiry', 'Officiis est esse no', 'Quis et occaecat aut', 1, '2023-11-07 15:21:02', '2023-11-07 15:21:02'),
(3, 'Lacota Townsend', 'pikevehuq@mailinator.com', '1231231320', 'inquiry', 'Officiis est esse no', 'Quis et occaecat aut', 1, '2023-11-07 15:30:03', '2023-11-07 15:30:03'),
(4, 'Addison Palmer', 'ravis@7technosoftsolutions.com', '1234567890', 'inquiry', 'Nemo ut incididunt q', 'Voluptatem Earum su', 1, '2023-11-10 07:32:38', '2023-11-10 07:32:38'),
(5, 'Regina White', 'devvaibhav1234@gmail.com', '9879879870', 'inquiry', 'Magna explicabo Ill', 'Eaque perferendis ve', 1, '2023-11-10 07:34:26', '2023-11-10 07:34:26'),
(6, 'Honorato Little', 'devvaibhav1234@gmail.com', '1324567890', 'inquiry', 'Quibusdam pariatur', 'Aliquip fugit sit', 1, '2023-11-10 07:38:49', '2023-11-10 07:38:49'),
(7, 'Ravi surani', 'ravis@7technosoftsolutions.com', '3216549870', 'inquiry', 'test', 'asdsad', 1, '2023-11-10 07:39:51', '2023-11-10 07:39:51'),
(8, 'Ulla Roth', 'devvaibhav1234@gmail.com', '1234567980', 'inquiry', 'At cumque voluptatem', 'Adipisci voluptatem', 1, '2023-11-10 07:40:52', '2023-11-10 07:40:52'),
(9, 'Xyla Petersen', 'devvaibhav1234@gmail.com', '1234651230', 'inquiry', 'Quo culpa recusandae', 'Corrupti illo magni', 1, '2023-11-10 07:42:58', '2023-11-10 07:42:58'),
(10, 'Xyla Petersen', 'devvaibhav1234@gmail.com', '1234651230', 'inquiry', 'Quo culpa recusandae', 'Corrupti illo magni', 1, '2023-11-10 07:43:04', '2023-11-10 07:43:04'),
(11, 'Xyla Petersen', 'devvaibhav1234@gmail.com', '1234651230', 'inquiry', 'Quo culpa recusandae', 'Corrupti illo magni', 1, '2023-11-10 07:43:18', '2023-11-10 07:43:18'),
(12, 'Xyla Petersen', 'devvaibhav1234@gmail.com', '1234651230', 'inquiry', 'Quo culpa recusandae', 'Corrupti illo magni', 1, '2023-11-10 07:44:07', '2023-11-10 07:44:07'),
(13, 'Ravi surani', 'devvaibhav1234@gmail.com', '9558937017', 'inquiry', 'test', '123213', 1, '2023-11-10 07:45:30', '2023-11-10 07:45:30'),
(14, 'Penelope Knapp', 'ravis@7technosoftsolutions.com', '1234567980', 'inquiry', 'Necessitatibus error', 'Possimus vel non of', 1, '2023-11-10 12:30:35', '2023-11-10 12:30:35'),
(15, 'Edward Robinson', 'devvaibhav1234@gmail.com', '1234567890', 'inquiry', 'Omnis in voluptatibu', 'Rerum qui eaque qui', 1, '2023-11-10 12:32:45', '2023-11-10 12:32:45'),
(16, 'Ravi surani', 'devvaibhav1234@gmail.com', '9558937017', 'inquiry', 'test', 'testing ..... recaptcha', 1, '2023-11-16 07:25:03', '2023-11-16 07:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_100001_create_roles_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_10_06_121925_create_products_table', 1),
(12, '2023_10_09_130350_create_carts_table', 1),
(13, '2023_10_09_130355_create_orders_table', 1),
(14, '2023_10_09_130838_create_order_items_table', 1),
(15, '2023_10_12_115330_create_categories_table', 1),
(16, '2023_10_12_130152_create_product_categories_table', 1),
(17, '2023_10_12_131517_create_product_image_galleries_table', 1),
(18, '2023_10_12_132315_update_product', 1),
(19, '2023_10_12_132316_create_pages_table', 1),
(20, '2023_10_12_172217_create_cms_table', 1),
(21, '2023_10_19_115456_create_product_additional_infos_table', 1),
(22, '2023_10_30_153118_create_contact_us_table', 2),
(23, '2023_10_30_183419_add_user_login_otp', 2),
(24, '2023_10_31_125739_add_meta_tags_category_page', 3),
(25, '2023_11_06_184644_updaet_cms_value_size', 4),
(26, '2023_11_07_113513_add_product_and_category_slug', 5),
(27, '2023_11_08_165709_add_user_is_block_status_and_add_user_role_slug', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00074277931a13e244fe724446309b7ace5e2b1e491a8e6fd3150df643cc448b02c6ea0a21aebf93', 11, 1, 'API Token', '[]', 0, '2023-11-06 16:17:12', '2023-11-06 16:17:12', '2024-11-06 16:17:12'),
('01a3ead401c44705094b98ab202409248aea286d17b6e599a28aee7c41022602f427b75bb6df1b8a', 1, 1, 'API Token', '[]', 0, '2023-10-26 16:16:10', '2023-10-26 16:16:10', '2024-10-26 16:16:10'),
('032018cc711ff4366ae23a6eef6d51968a6278783acb630031fb4ff7b0a848868a0b8a14f48fd060', 5, 1, 'API Token', '[]', 0, '2023-10-26 15:34:46', '2023-10-26 15:34:46', '2024-10-26 15:34:46'),
('05c78fc48474cd2834dc2426fe43e8c55d5470d935ec4d5672573050c8e800a976baf445361568b4', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:24:52', '2023-10-26 12:24:52', '2024-10-26 12:24:52'),
('061fc4925097cb62057f9f6925de186b70d7f1571fe308f1941c6e4d2f224c5a9f81f1138a28d0b7', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:17:43', '2023-10-26 11:17:43', '2024-10-26 11:17:43'),
('070889f1a4852543aa8cb69461d0560bfc62e613e8c8243824add5239ffa539d26a2f8ffd7926597', 11, 1, 'API Token', '[]', 0, '2023-11-02 12:20:10', '2023-11-02 12:20:10', '2024-11-02 12:20:10'),
('082d3639a951c59640b3626df3ddad0108e66ceb39c190c961c7e99b630195f546d608944d48838d', 11, 1, 'API Token', '[]', 0, '2023-11-08 19:37:43', '2023-11-08 19:37:43', '2024-11-08 19:37:43'),
('0a1294d7bf85b1a7c6e1227e263cfd63cc7dd338b9c6fb95797fe1f14e05eaa3a9103eddb61ccdf5', 4, 1, 'API Token', '[]', 0, '2023-10-25 07:41:36', '2023-10-25 07:41:36', '2024-10-25 13:11:36'),
('0b1d2caba2ddcb73ecceb7e456f55ee8931491c81e1a97758c9442f3e6768888e0fe24c475151b47', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:59:25', '2023-10-26 11:59:25', '2024-10-26 11:59:25'),
('0bb9c4a9d7f8b722017e6e50ea05b01bbfe1e80d1eb4b600abc353cb88db517b13be82afe53b18d9', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:36:55', '2023-10-30 14:36:55', '2024-10-30 14:36:55'),
('0c028595e7312a8b566b8aba71e6a57ec809ed88e4745b80bac02c6a5048b2309a5d1e1e8373cdce', 11, 1, 'API Token', '[]', 0, '2023-11-02 12:17:23', '2023-11-02 12:17:23', '2024-11-02 12:17:23'),
('0db6cb72bbfbec3c54c66ad90e71428eee61d02ed2b8543f82d8cbc82422354d705cc11dae0031af', 5, 1, 'API Token', '[]', 0, '2023-10-30 11:35:20', '2023-10-30 11:35:21', '2024-10-30 11:35:20'),
('0f605c27f655e771a1d35ed013679a80e1f79937ec65e072ff3899afd659c838a9b772c56f483a81', 5, 1, 'API Token', '[]', 0, '2023-10-30 18:14:15', '2023-10-30 18:14:15', '2024-10-30 18:14:15'),
('10d2cb50eb68f33ae41a6bbe2d9dc1ed0c253ab1fc7fedcaf9286cd13cec06ed07be4d275fd36183', 51, 1, 'API Token', '[]', 0, '2023-11-20 12:03:03', '2023-11-20 12:03:03', '2024-11-20 17:33:03'),
('13c0ad8ac2fc1bdf9113f8cddac43f667315776418e6329564392f485a40bd77affd9c63920cacd6', 54, 1, 'API Token', '[]', 0, '2023-11-20 12:10:05', '2023-11-20 12:10:05', '2024-11-20 17:40:05'),
('1442d3a3d79f0563dc6012024d5b1b76684176a7dc0d6b9d229e3d8bcc6881cdc8f87c344ce8f5eb', 11, 1, 'API Token', '[]', 0, '2023-11-02 19:00:16', '2023-11-02 19:00:21', '2024-11-02 19:00:16'),
('17828e5beea7ed48e9da5c7fad5cc303e5ec60f3bff1f69bd87062349a3ab7d14adfaa4ca42b2ce0', 53, 1, 'API Token', '[]', 0, '2023-11-20 12:07:04', '2023-11-20 12:07:04', '2024-11-20 17:37:04'),
('17fed20fa129094ea3829723a9b0a8176404302b4900f352a1768254e2e8bc2c64a4c5b7f6bd1a08', 4, 1, 'API Token', '[]', 0, '2023-10-26 15:39:20', '2023-10-26 15:39:20', '2024-10-26 15:39:20'),
('1b66c58f4118adf339be7b8e4345ae240de1e9561cd48cd64d8f87b4750396ce572b8d8d366af941', 4, 1, 'API Token', '[]', 0, '2023-10-26 10:18:37', '2023-10-26 10:18:37', '2024-10-26 10:18:37'),
('1c124185bdcccd06ce378e8f8bb10188b83eff535294c2ca453ef367fadee8b2a44ca303a4e62430', 11, 1, 'API Token', '[]', 0, '2023-11-06 15:26:18', '2023-11-06 15:26:18', '2024-11-06 15:26:18'),
('1f5675437953c11cbdb86d6557f37834feb9b091c372aafaad8228e9d48162861ed1925591c80982', 5, 1, 'API Token', '[]', 0, '2023-10-30 15:50:53', '2023-10-30 15:50:53', '2024-10-30 15:50:53'),
('208b64a29510dd7bf4267f7f53466b06a581ba0777852a65742baabcd69bc572d829e37b00830f70', 4, 1, 'API Token', '[]', 0, '2023-10-30 18:02:17', '2023-10-30 18:02:17', '2024-10-30 18:02:17'),
('21a918966848fd0b57d8069896d8e877b0d5d961b42945930c71cea49b59793f95a696b4aafe32ec', 1, 1, 'API Token', '[]', 0, '2023-10-26 13:06:09', '2023-10-26 13:06:09', '2024-10-26 13:06:09'),
('21c8b20ed6fe0688e0c544b42ba886ad1ca575ed99243a585c7908e546436182b7ba3c4a5c21d07c', 5, 1, 'API Token', '[]', 0, '2023-10-25 17:47:17', '2023-10-25 17:47:17', '2024-10-25 17:47:17'),
('230b767ee2b88c0e06e3abc513f4b3c4d0f2aaf8ec8eb848c15f06a525949bd813053115574d1085', 4, 1, 'API Token', '[]', 0, '2023-10-30 18:05:43', '2023-10-30 18:05:43', '2024-10-30 18:05:43'),
('2331e1e1a41147186f47377819a83072f6a29cd72ae4f091506db1ae556ebb87f492ebf2ab7b36f1', 11, 1, 'API Token', '[]', 0, '2023-11-06 13:15:30', '2023-11-06 13:15:30', '2024-11-06 13:15:30'),
('253a5a85ca015c118f3bac7fd469050802a2a86ba95a5b2639ae9b0978428422bf52316c92995e4b', 48, 1, 'API Token', '[]', 0, '2023-11-20 11:55:04', '2023-11-20 11:55:04', '2024-11-20 17:25:04'),
('2556ad18d41e11f92447c32007a084f7126c9f896f155502d2428fca7a873fbf2c41f44338a22828', 4, 1, 'API Token', '[]', 0, '2023-10-26 15:40:31', '2023-10-26 15:40:31', '2024-10-26 15:40:31'),
('263a8fe5f246ffb66af6907a4f2352112ae61992e3bf690b39523b10dbc1c67b9b7d3fe851018111', 11, 1, 'API Token', '[]', 0, '2023-11-06 10:36:24', '2023-11-06 10:36:24', '2024-11-06 10:36:24'),
('28414a7ceeb43284c025c127ab76f144358daeaf17ceec1ce985133c768c95c0e57ef996d3b42628', 11, 1, 'API Token', '[]', 0, '2023-11-03 10:05:18', '2023-11-03 10:05:18', '2024-11-03 10:05:18'),
('2a3d797c1634a38f50d57fc94c7307e6be83b0d4df0ad788f8ab36bf371810fee893a926daa04c56', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:38:31', '2023-10-30 14:38:31', '2024-10-30 14:38:31'),
('2d2c04283cedf70f088a5719cfa43155d9ab04eb2bc17ceec2dc7d8d48dd406f6ad1127242c975a8', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:38:12', '2023-10-30 14:38:13', '2024-10-30 14:38:12'),
('32b7ab6ad44901b9cbaae37bf18dd74a4c70dc06ad68905cc8010dfafdc361bb55e955eba8efc985', 6, 1, 'API Token', '[]', 0, '2023-10-25 12:02:14', '2023-10-25 12:02:14', '2024-10-25 17:32:14'),
('32d924657be00e5dbb2ecfbb3827e893dbc7daefa406fc85911f6c6f1cf3a78d8d7e5cf531720b1d', 11, 1, 'API Token', '[]', 0, '2023-11-02 18:27:21', '2023-11-02 18:27:32', '2024-11-02 18:27:21'),
('356fe5e2508fc333e4bdd586280050e412a07e9de541c0ba2c060b92c271149fbbd67bc71cc66ca8', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:59:12', '2023-10-26 12:59:12', '2024-10-26 12:59:12'),
('3724696d0ecc08d2c8313d7c35db44eff481d0c94799d78b72821c4eaede12ac768142edd5fad515', 52, 1, 'API Token', '[]', 0, '2023-11-20 12:04:34', '2023-11-20 12:04:34', '2024-11-20 17:34:34'),
('374bcba3e1e949c533cccca5ed1d2bf3ef702786b8d65954684f959ae197960fa1750dd465cc24cc', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:06:27', '2023-10-26 12:06:27', '2024-10-26 12:06:27'),
('3980d76e4b4cd98f2790f7d6dbb11d0c35493fd400d5d35bcef8377236a15c924ecc268254f73e9e', 11, 1, 'API Token', '[]', 0, '2023-11-03 17:48:21', '2023-11-03 17:48:21', '2024-11-03 17:48:21'),
('3aad20a70ee90d18598be114af541059d613367d429120b7d4afc19bb8eee838637a050eba13781b', 5, 1, 'API Token', '[]', 0, '2023-10-25 18:28:50', '2023-10-25 18:28:50', '2024-10-25 18:28:50'),
('3dcedd204639c608200f4d54b87a5dc9ee0db3dcfb83a3094531b43fb962ba5ab1a42bf8f14d2129', 11, 1, 'API Token', '[]', 0, '2023-11-01 18:44:10', '2023-11-01 18:44:11', '2024-11-01 18:44:10'),
('3f41a69f4bb0bd51ec511a8a95a94f6fd205d98bd8c02ef724a3e8473e7bdd3ca0d31cb2015abcb9', 11, 1, 'API Token', '[]', 0, '2023-10-26 11:09:51', '2023-10-26 11:09:51', '2024-10-26 11:09:51'),
('3f7873b6f84ecc24cd9bbfd9fbf8c9bf7ff5ba758ec0913b8004c3ca76e85aa439015f6b32fae06a', 13, 1, 'API Token', '[]', 0, '2023-11-16 13:33:57', '2023-11-16 13:33:57', '2024-11-16 19:03:57'),
('44c9e8c660fb359a907dc77c983dd437b1eb765845f0d57169bd51073f7abc23bc041f1df85cd780', 5, 1, 'API Token', '[]', 0, '2023-10-26 13:32:34', '2023-10-26 13:32:34', '2024-10-26 13:32:34'),
('4677cff0b3e566680192f6b9d6e165279244bb4d85c2dbe8b1c3a371d06bbf9350e5139839e775b3', 5, 1, 'API Token', '[]', 0, '2023-10-26 16:34:18', '2023-10-26 16:34:18', '2024-10-26 16:34:18'),
('4719e3931d4f8f78d9fe1a0697642177db1bf723bf83a9a14630599d843659c955063d09e4896a1f', 38, 1, 'API Token', '[]', 0, '2023-11-20 11:45:20', '2023-11-20 11:45:20', '2024-11-20 17:15:20'),
('4833800857edf62637cb6f2d6cfdf013c0a36eda0d543500d50b87e6cf7fb9cb5176c0a1540657e8', 5, 1, 'API Token', '[]', 0, '2023-10-26 16:45:17', '2023-10-26 16:45:17', '2024-10-26 16:45:17'),
('485c09d50c77dfb60df169723382c3602d9855e124c12471d087be267309ccf0776873ed95dff23a', 11, 1, 'API Token', '[]', 0, '2023-11-01 10:08:31', '2023-11-01 10:08:31', '2024-11-01 10:08:31'),
('49e2a3af7c22dfa7e559cc7881a47e9d98720e8a8481ebe43effd57165a33e039cad5d7409b69f6c', 4, 1, 'API Token', '[]', 0, '2023-10-26 12:30:56', '2023-10-26 12:30:56', '2024-10-26 12:30:56'),
('4ad806ab583c04d2830f37335e06b919aacf6aaf66bca647667a54a4da7a1389570c17a7eb6920ba', 5, 1, 'API Token', '[]', 0, '2023-10-26 19:42:52', '2023-10-26 19:42:52', '2024-10-26 19:42:52'),
('4b1e5f32d7c19eca266eac560a514f958c3c31b7ee288f3fc4f3d31a799b238b049438ff7d987987', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:30:32', '2023-10-26 10:30:32', '2024-10-26 10:30:32'),
('4b3332a24da1daac68dff0fdbad9274b7570163495d471d54ce7324d401bb8bb7baf093138a025c9', 15, 1, 'API Token', '[]', 0, '2023-11-20 06:01:14', '2023-11-20 06:01:14', '2024-11-20 11:31:14'),
('4ba27b4882ae22da95562c901da6bda8a974357ec75024c6b9bd415ce9053f0137eabb48ea87b31e', 41, 1, 'API Token', '[]', 0, '2023-11-20 11:46:12', '2023-11-20 11:46:12', '2024-11-20 17:16:12'),
('4c3f21d540cb45be1663753fab808422a610dad172b81834e872dde5c99b84c6ee4453c41b555d2c', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:11:44', '2023-10-26 11:11:44', '2024-10-26 11:11:44'),
('4c8b7e7362ec384df10cd06516b46f149a36cd2b8a8a96cc32fb81c31c1783d739267a874f4b7355', 11, 1, 'API Token', '[]', 0, '2023-10-26 12:46:18', '2023-10-26 12:46:18', '2024-10-26 12:46:18'),
('4e0e5b6c86a38b0a07576c050eb31d490a0f45f526e7ff453f564fc3021957425447a8f190412ef4', 11, 1, 'API Token', '[]', 0, '2023-11-03 13:31:59', '2023-11-03 13:31:59', '2024-11-03 13:31:59'),
('4ef3a43681cc1862358cb69fd65dddc9f9d55d43345d0a2739e4582a3cb05adb94e8489c0ef89b4d', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:01:03', '2023-10-26 12:01:03', '2024-10-26 12:01:03'),
('4f79e003960abc137d537f903973bb3f2bb237d3c5c9082b08c6cb355bb9e53c4da9ab3e1ec175df', 5, 1, 'API Token', '[]', 0, '2023-10-30 11:35:09', '2023-10-30 11:35:09', '2024-10-30 11:35:09'),
('4f7b99a199e9c8317dd4bf3966a5cdb563dbda6408f1daa36690fcb2818a9a0a3c71112d0dced55c', 11, 1, 'API Token', '[]', 0, '2023-11-06 15:47:32', '2023-11-06 15:47:32', '2024-11-06 15:47:32'),
('5038ba36461e1b6fe890fad62d0f78ea938dbff184921a5bd2a0aa1737010993fbf91ddcb019b3c9', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:10:02', '2023-10-26 10:10:03', '2024-10-26 10:10:02'),
('5282cb41baa64fcec0a75666c06ee4a3ccc4fc3e6abed1e9c533294ccbbeccf6722a923539cf3823', 11, 1, 'API Token', '[]', 0, '2023-11-02 18:22:00', '2023-11-02 18:22:00', '2024-11-02 18:22:00'),
('52cbf151b5daae25364c9b7c181c7deaf52569fa43f4819d949d539cc7bf7c5c12e316483476e895', 11, 1, 'API Token', '[]', 0, '2023-10-30 14:50:05', '2023-10-30 14:50:05', '2024-10-30 14:50:05'),
('53a26025489cc5c8815d03bc49d7f434c361f865dac2ee6d164e81989684a73fe11c6db903b003ad', 5, 1, 'API Token', '[]', 0, '2023-10-25 10:36:12', '2023-10-25 10:36:12', '2024-10-25 16:06:12'),
('565d5db730e0ef1ec4790e6a83fcdf8ef5e8e69acc6b46b94a0f589a4e5424c8044eeeb29bdaa13b', 5, 1, 'API Token', '[]', 0, '2023-10-25 17:39:55', '2023-10-25 17:39:55', '2024-10-25 17:39:55'),
('57dbf3d1e0f29da5b5e2cac65902886ae98114f370d88c211b5be1b5e3c8dd24affd4fa2ccd2df52', 11, 1, 'API Token', '[]', 0, '2023-11-06 17:40:05', '2023-11-06 17:40:05', '2024-11-06 17:40:05'),
('58f470a420f8db40f162caee9dce291d29ebe0b1f9ac4f4c234f134d33c13f0949153fff3b662036', 1, 1, 'API Token', '[]', 0, '2023-10-26 16:13:10', '2023-10-26 16:13:10', '2024-10-26 16:13:10'),
('590c5064dca9343beecc8932aff08c1d4f46e2d594f571fc9b4e520489792b587a557239fe37cdf1', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:01:22', '2023-10-26 12:01:22', '2024-10-26 12:01:22'),
('595a97be81b9ef73817142526f1cda499bbbb8e4ccab267dd5cab3b6f0d6a3e987d1538dc1685b06', 4, 1, 'API Token', '[]', 0, '2023-10-26 11:13:37', '2023-10-26 11:13:37', '2024-10-26 11:13:37'),
('599c492b04f2cab65eeb4513a554e2ea112e775219cf20489b859e6178888b0ba9aaa602fd666c10', 11, 1, 'API Token', '[]', 0, '2023-10-26 13:58:20', '2023-10-26 13:58:20', '2024-10-26 13:58:20'),
('59f445d5b4280232ca3aebea505130279c92caac1299f0e7c551d882fcc5ba429f010661706e3805', 11, 1, 'API Token', '[]', 0, '2023-11-01 16:08:38', '2023-11-01 16:08:38', '2024-11-01 16:08:38'),
('5c14e8a8f22e2b86578233e45423c8e165026127ee0a9d3fec9a03868a72db8909367b2960288b49', 5, 1, 'API Token', '[]', 0, '2023-10-26 15:38:46', '2023-10-26 15:38:46', '2024-10-26 15:38:46'),
('5ca7772a7d7aefbb1a1cd0e5d08f042d22c9f827ed2ee50c645208df1d13f286e964f86906c370b3', 11, 1, 'API Token', '[]', 0, '2023-11-02 12:09:21', '2023-11-02 12:09:22', '2024-11-02 12:09:21'),
('5cfc5daa318c41b86be6ceddad0d7c9d05bee62cc55db258ae5e851fa77b61438252352f3a76c01c', 5, 1, 'API Token', '[]', 0, '2023-10-26 16:12:57', '2023-10-26 16:12:57', '2024-10-26 16:12:57'),
('65cbeff28b78ff8465edf466c88549127d48d89dfbf9f475ccf8e242193561ef325a0cb76f8b971c', 5, 1, 'API Token', '[]', 0, '2023-10-26 14:01:07', '2023-10-26 14:01:07', '2024-10-26 14:01:07'),
('662e0d419fd0f6ace9128845ec8311a3186a814085e937d311ad2c3786a70dd85fc59df647eaa943', 5, 1, 'API Token', '[]', 0, '2023-11-01 16:07:57', '2023-11-01 16:07:57', '2024-11-01 16:07:57'),
('6dceccc7348fe3faefc9549c983413db3a49bb728743306e72db9c7e3f3ba1650c4606adec977eba', 11, 1, 'API Token', '[]', 0, '2023-10-30 15:43:27', '2023-10-30 15:43:27', '2024-10-30 15:43:27'),
('6deb789c87c83872b09657826580cbc4826d9edb99e8be9d6d727789adba78af89e7465eefe47ae0', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:37:09', '2023-10-30 14:37:09', '2024-10-30 14:37:09'),
('6e96da4d2a07ae190e9fc2b73215bbea253dfdf29e8075c6b94a3c6427a3927638a2c3821682cd38', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:06:20', '2023-10-26 11:06:20', '2024-10-26 11:06:20'),
('6fa64e5ff86ade1176552774cfe953f213c1ca1a70983603ce57cd5f678a982ad48fe5086c1e6e90', 1, 1, 'API Token', '[]', 0, '2023-10-26 13:12:15', '2023-10-26 13:12:15', '2024-10-26 13:12:15'),
('72736813a8c3753396253fdbbcba45ce78e2d5ee5313fb10f0a80f6373c35cfe0d468687e05e7bf4', 9, 1, 'API Token', '[]', 0, '2023-10-25 18:23:13', '2023-10-25 18:23:13', '2024-10-25 18:23:13'),
('743494353a8ddec59680af08c9c3025b06b2d016e9b55dffa5582b29d939fd12d47b3a79bca84e52', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:40:50', '2023-10-26 10:40:50', '2024-10-26 10:40:50'),
('763199f45e2a2d9154728dc1ea60f531a95fc6ee83f840bb80fcfec035599ebf8a06ee669ac67ae7', 5, 1, 'API Token', '[]', 0, '2023-10-26 16:59:39', '2023-10-26 16:59:39', '2024-10-26 16:59:39'),
('776b540fe3ca2cec2334fa28548081cc02f6abddd9a55dddd362bcaced4f8c57fad6131d63d8b2fd', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:03:23', '2023-10-26 11:03:23', '2024-10-26 11:03:23'),
('78c85adfa9bad001a0e96ccd8dabfe999eb00393f4dac94e197b509cde0af07602a38c834f3e1753', 5, 1, 'API Token', '[]', 0, '2023-10-26 13:02:18', '2023-10-26 13:02:18', '2024-10-26 13:02:18'),
('7b06b547a50c4ee2b5c198f466ad2d7e0095333a758a1f8839880e53cb91026c55f5a9607390a147', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:44:54', '2023-10-30 14:44:54', '2024-10-30 14:44:54'),
('7b65fcaeed9698c8f4cb37caed8d08954876437cfd33dfa0b030843b522cb683cec966f27f4866c9', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:47:20', '2023-10-30 14:47:20', '2024-10-30 14:47:20'),
('7d543852c188eb822cb2c3d953a4223fdf38fd1483bd11f4222eae77c0f57ae94991931c13413254', 5, 1, 'API Token', '[]', 0, '2023-10-26 15:28:29', '2023-10-26 15:28:30', '2024-10-26 15:28:29'),
('7fab26a2707d60507f4a99c5100f47de65c2dd6f5db202b69aafc28161bb53d3987effa58f5ebb60', 46, 1, 'API Token', '[]', 0, '2023-11-20 11:50:55', '2023-11-20 11:50:55', '2024-11-20 17:20:55'),
('7fc65529d67300b680943dc778edf209c7320f35a51ec667922ce1b1891c55d2c73f8018ee357503', 6, 1, 'API Token', '[]', 0, '2023-11-09 10:05:47', '2023-11-09 10:05:47', '2024-11-09 10:05:47'),
('80e8a41a41d0d13a84ef37c222010dafcb78bd7a7630068be817cea4488006517dda64fa721c3a77', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:02:24', '2023-10-26 12:02:25', '2024-10-26 12:02:24'),
('81313a983f7047c7d58a50066431750e6b10e966975b02f672ae6d02c6ceb681ded96f2f1370208a', 11, 1, 'API Token', '[]', 0, '2023-11-06 13:07:02', '2023-11-06 13:07:02', '2024-11-06 13:07:02'),
('81b9fefce023458d58da31d36ab4720391d781f3d2c5517ae0990530f8ca6f9c11f2a68c669d773c', 11, 1, 'API Token', '[]', 0, '2023-10-26 16:44:38', '2023-10-26 16:44:38', '2024-10-26 16:44:38'),
('827f7fd99477a2bb5fbb6c69ac8fe4a6278165df6898fce8b2c286cf203c7881f089c9696f1aee2d', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:09:39', '2023-10-26 12:09:39', '2024-10-26 12:09:39'),
('86fad2e300c5f9757bbe613bebc3e41b0df0f296b44b1e139e50c42a2ea4cd6d373ad3ece8fa523a', 11, 1, 'API Token', '[]', 0, '2023-11-01 10:15:34', '2023-11-01 10:15:34', '2024-11-01 10:15:34'),
('875c17eb93b758a3e8c79862878acaf5ecd5ec7c8f0198b4b51494146c3d3010d1d0c957cc9277bb', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:48:17', '2023-10-30 14:48:17', '2024-10-30 14:48:17'),
('8959c9dfafdcb37c3c262f2259e955a83ede7ee6fc45da4113435a44acdac4ecddf35c93dca9d925', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:00:13', '2023-10-26 12:00:14', '2024-10-26 12:00:13'),
('896bfd689bf9131b55f6f4dc52ff63fd12b126280e9e3c8d7c314c2bb9d0cb39deced9bfe261883e', 5, 1, 'API Token', '[]', 0, '2023-10-25 18:30:27', '2023-10-25 18:30:27', '2024-10-25 18:30:27'),
('89f76b33ffe3823ab3651a15ac3bc3b0d9eee195b696364cd62700d058dd8b2c9b65fa4b9eece081', 5, 1, 'API Token', '[]', 0, '2023-11-01 10:07:00', '2023-11-01 10:07:00', '2024-11-01 10:07:00'),
('8b5fa2fefe48278a63f72d0140462e855cff971635e8eb6d5a22cb13ec0d1ae301528098d4d99b46', 5, 1, 'API Token', '[]', 0, '2023-10-25 19:20:27', '2023-10-25 19:20:28', '2024-10-25 19:20:27'),
('8c462856bde9871fd89fd18385cc06bebb7d4729dc8de7752ba7dcd982d269cda8dc5652dc680cc9', 49, 1, 'API Token', '[]', 0, '2023-11-20 12:00:52', '2023-11-20 12:00:52', '2024-11-20 17:30:52'),
('8dea5b805ada59561f222eaf7a48c5e1910a2f62ad7c05f69a21e0afc2cb09c5fad4a639f20c450e', 5, 1, 'API Token', '[]', 0, '2023-10-25 07:42:11', '2023-10-25 07:42:11', '2024-10-25 13:12:11'),
('8e0e9d236e2564ad6d4d82605216f5c58a41ccb9f2fb6f53cb649d66d539f280b46207a2ca0aac97', 11, 1, 'API Token', '[]', 0, '2023-11-06 17:29:22', '2023-11-06 17:29:22', '2024-11-06 17:29:22'),
('8f5b6c88c6fb283561fb65c717ac7d37a781d1629b9699265408aeca6c1ce161b94e1c5ca18f73a8', 11, 1, 'API Token', '[]', 0, '2023-10-30 16:31:34', '2023-10-30 16:31:34', '2024-10-30 16:31:34'),
('9222fccdd5fe263211c5a95a23d0ac3d35c76f232050ad50be2c7721fb7f6fc1e5039d0e6b4878d8', 19, 1, 'API Token', '[]', 0, '2023-11-20 06:39:43', '2023-11-20 06:39:43', '2024-11-20 12:09:43'),
('9361a7d92a9d2c30041f402780d04034821094119d4524d6f8c57c8d9aa3fbf43e6c3742ba8cd220', 42, 1, 'API Token', '[]', 0, '2023-11-20 11:46:57', '2023-11-20 11:46:57', '2024-11-20 17:16:57'),
('9451376fcfd81eb529fb2fb046ade2bbad890c8d587039f64be4594c753017872c322b4311cca3f3', 11, 1, 'API Token', '[]', 0, '2023-11-02 12:20:54', '2023-11-02 12:20:54', '2024-11-02 12:20:54'),
('97705288e22fc987295a3f042dfba1c2404575ca8049ffdd3ba5526a3265a939d7225bb2252e1e06', 12, 1, 'API Token', '[]', 0, '2023-10-26 19:38:14', '2023-10-26 19:38:14', '2024-10-26 19:38:14'),
('9a5883db23a572ab8d09ed2199c1c1170d4f8db29ade7475356fa409df134499f40fc7982f7eaa6f', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:36:45', '2023-10-26 12:36:45', '2024-10-26 12:36:45'),
('9a88fdfa4a641bd4c8b82d6fb8c023d4a9ca9077672c162c31b45943c583acc41f1bcae40463744a', 11, 1, 'API Token', '[]', 0, '2023-11-02 12:14:44', '2023-11-02 12:14:45', '2024-11-02 12:14:44'),
('9a8cf74987dca35c0532967471a6a3782361721fe694914fa1532fde30202abb82bf6c632ad6d1a4', 5, 1, 'API Token', '[]', 0, '2023-10-25 18:30:58', '2023-10-25 18:30:58', '2024-10-25 18:30:58'),
('9b2538d3a6e4426e693668ad2b51eca71fc03e5b6ac2e7fcff5cbd6cadf37777d671cd113ce965cf', 11, 1, 'API Token', '[]', 0, '2023-11-06 15:16:03', '2023-11-06 15:16:03', '2024-11-06 15:16:03'),
('9c640ad943aeb36503fc5b76c173a3758f0468e9f207a122a5646f2d0ae00ff924848527bc7f58b4', 4, 1, 'API Token', '[]', 0, '2023-10-26 13:58:25', '2023-10-26 13:58:25', '2024-10-26 13:58:25'),
('9d37c09e8c2badbf9bb6980c8a22b925b6749975ca6b4895958016479a9ca9db0a9f0a2899ce41ad', 6, 1, 'API Token', '[]', 0, '2023-11-01 11:48:12', '2023-11-01 11:48:12', '2024-11-01 11:48:12'),
('9f423bd71442b1cacdd1931c1e43cce98b524501e85b5f9b7fa551544ccb7315479d83427d8c037e', 4, 1, 'API Token', '[]', 0, '2023-10-26 15:58:29', '2023-10-26 15:58:29', '2024-10-26 15:58:29'),
('9f53db56987a7a82119b9351ab245f05734ac8d18594e88f145f2404a7ff07cfc9a7aa27503dfabc', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:47:39', '2023-10-26 12:47:39', '2024-10-26 12:47:39'),
('a17a8f0d52b1de3a7b3d2881e5d64f58cf6405b80e19ec1c10b2aa2f00f0318a0de75fbcd30507b0', 12, 1, 'API Token', '[]', 0, '2023-10-26 19:38:00', '2023-10-26 19:38:00', '2024-10-26 19:38:00'),
('a1eb4c60f3f209ae461b502db18ccb7a8b29ce70a99ae704eee7fba31ea998f40f3ef543abcf4b24', 1, 1, 'API Token', '[]', 0, '2023-10-26 13:11:14', '2023-10-26 13:11:14', '2024-10-26 13:11:14'),
('a96ffea5af16903dbcccd73f08be86461ab1e753a1b3da4c24dc96f051d874088278f94fe505cf65', 50, 1, 'API Token', '[]', 0, '2023-11-20 12:01:38', '2023-11-20 12:01:38', '2024-11-20 17:31:38'),
('ada439297a02de082f1ee51b2e9c7d0cef7aacf297fbc58622c3585fcc1651e7f926d54f6989f183', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:14:30', '2023-10-26 12:14:30', '2024-10-26 12:14:30'),
('afae00fa286e3d4e4e9377f71b273f6d1d19392bd93444c4c6484de4c8af4f6a39d01f57ca6a0bda', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:46:55', '2023-10-30 14:46:55', '2024-10-30 14:46:55'),
('b21aef4038fd04c3524ee80b7f9172218f2b23d115ef26ea0f5ac3acd5c785f6661cb5e74248d9a7', 1, 1, 'API Token', '[]', 0, '2023-10-26 16:16:46', '2023-10-26 16:16:46', '2024-10-26 16:16:46'),
('b32e28c16a4814d18be5c5fca2d76f1f85038c5c0733769f4bd3ab876b5539bf52e071520ff9d733', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:23:08', '2023-10-26 12:23:08', '2024-10-26 12:23:08'),
('b3582c95fe25fbb31107883f8d69575db6f68d11b879f9199c0187be2a3fcf3c638f37864e26cd95', 5, 1, 'API Token', '[]', 0, '2023-10-26 16:51:12', '2023-10-26 16:51:12', '2024-10-26 16:51:12'),
('b483a28df0b15f38064ae759eb660dab9adf8df9b55f3ec5d53bce5f2d03bc005f45814132da4269', 36, 1, 'API Token', '[]', 0, '2023-11-20 11:44:40', '2023-11-20 11:44:40', '2024-11-20 17:14:40'),
('b4aad8925fbc9eea49b981c40a8b01cd58b7b2b7b7c9f606cfd199c2c4625fa4e27576b6328dc4df', 17, 1, 'API Token', '[]', 0, '2023-11-20 06:08:45', '2023-11-20 06:08:45', '2024-11-20 11:38:45'),
('b80fd0bf00a877950b0e728823ce2c6084c49a0a11c05adeb5bbcf0609e7db233270e58047f2c03d', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:35:43', '2023-10-30 14:35:43', '2024-10-30 14:35:43'),
('b8526b03262b3b4f5add9948683e2ed29ec8ded6ee0c585137a687f7481bdc70a5b46f7a879e116b', 11, 1, 'API Token', '[]', 0, '2023-11-06 12:07:55', '2023-11-06 12:07:55', '2024-11-06 12:07:55'),
('b9c69fb9c8e90fbd97b20a1c6a43715a1aa93d55672afecf4bb96e33535c7a6ec8ae7d285ae32ccb', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:04:32', '2023-10-26 11:04:32', '2024-10-26 11:04:32'),
('bba14de94c0993f76f9f6be14b338de3178122c9b40775bc98bb784cf08ac6ecbbd0f2ceae57ebf3', 11, 1, 'API Token', '[]', 0, '2023-11-03 17:00:09', '2023-11-03 17:00:09', '2024-11-03 17:00:09'),
('bd0171d8b86a27ed00dd66686e491a0a4efb9df6aa2ca674007eacefc61301038492ba3bc81fddd9', 11, 1, 'API Token', '[]', 0, '2023-11-03 11:03:08', '2023-11-03 11:03:09', '2024-11-03 11:03:08'),
('bd6a384050276c9206aff845fbc518d1b2687aa18dd8eecb75ef838ddae36513603f2213302f7ad7', 8, 1, 'API Token', '[]', 0, '2023-10-25 17:49:04', '2023-10-25 17:49:04', '2024-10-25 17:49:04'),
('be2280e343c6c9fd04d79c8b62e28a92ed43eeb54d59e10a7776f70f87f187749b901e0b17e49f09', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:59:16', '2023-10-26 11:59:16', '2024-10-26 11:59:16'),
('bf283b7fabfee896dc5fcd4453aa6917d600339ed6dc7f320d997c24d36fde937798a3783748a304', 5, 1, 'API Token', '[]', 0, '2023-11-01 10:11:44', '2023-11-01 10:11:44', '2024-11-01 10:11:44'),
('c13a5569d0a13f8a83be7407a47590ea1e5cf2839ffa1537d2bdc992bf09e1f676f41bc2f2b08bdb', 11, 1, 'API Token', '[]', 0, '2023-11-06 17:53:50', '2023-11-06 17:53:50', '2024-11-06 17:53:50'),
('c41e85e66385579d26bfbb1757246264dfb8628b5f4944e90a3764045eb22036417118844ced5297', 11, 1, 'API Token', '[]', 0, '2023-11-06 12:15:19', '2023-11-06 12:15:19', '2024-11-06 12:15:19'),
('c48a6a9aac73cf9f684df2edb80a02602bb5ba007eb71175011e3ff2d74c285a53aaaf0da434977d', 5, 1, 'API Token', '[]', 0, '2023-10-26 11:59:50', '2023-10-26 11:59:50', '2024-10-26 11:59:50'),
('c492c03c8fe5fb85f26aaa43ee4b72f652b87bedf70ebaa76c7b760e7823d0a3e8b39583bcf1014c', 18, 1, 'API Token', '[]', 0, '2023-11-20 06:38:51', '2023-11-20 06:38:51', '2024-11-20 12:08:51'),
('c500b27a3f3863cd02c14c7a4a496570054b89bdc55d4878b6d0d9370545e612f8f2651f446f6d4a', 4, 1, 'API Token', '[]', 0, '2023-10-26 12:45:16', '2023-10-26 12:45:16', '2024-10-26 12:45:16'),
('c5f0787d53fb8e30e5278e452955439a0eb4516aa78b219e320a1f79988a682184332d2ea8bfbeef', 4, 1, 'API Token', '[]', 0, '2023-10-26 12:47:45', '2023-10-26 12:47:45', '2024-10-26 12:47:45'),
('c6a56d76d039dde3f88ac08bd67907a62b17bf1dc60de806fa4e426f9ece132ceb9afa40bfb22bc4', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:20:03', '2023-10-26 10:20:03', '2024-10-26 10:20:03'),
('c8151b2e6eafef0188ebecdec0f391ab294ed2298f59d5192b3cff429f2e68d702b9fb9a69bbcb09', 11, 1, 'API Token', '[]', 0, '2023-11-02 11:29:20', '2023-11-02 11:29:20', '2024-11-02 11:29:20'),
('c8d2285b21be8261cff2df7344cd8d3540fa98faf125daa21cfba127ec51af1efad1ed3e3de36f07', 11, 1, 'API Token', '[]', 0, '2023-10-26 11:09:28', '2023-10-26 11:09:29', '2024-10-26 11:09:28'),
('c9d0558c0533426a39bac6ba524a107319e886eb766f20246bf9d7ed914642f572fdf509fb276e7f', 11, 1, 'API Token', '[]', 0, '2023-10-30 15:41:46', '2023-10-30 15:41:46', '2024-10-30 15:41:46'),
('cb67cf35cbfbfc3522ed8d0c12fd255f9b02218cbb75fcd261f78e0ac84a80badbe9739c8cd5e50e', 4, 1, 'API Token', '[]', 0, '2023-11-10 08:22:28', '2023-11-10 08:22:28', '2024-11-10 13:52:28'),
('cb95a48c003a179bc10c560b63971e9f7eea036f51ae8297b1d59725c1ea4fe25b0f61df69c66d62', 5, 1, 'API Token', '[]', 0, '2023-10-30 11:35:56', '2023-10-30 11:35:57', '2024-10-30 11:35:56'),
('cbd653d819a389d0f697b9f5520bb20a27f1828cfbf09b4c9ea45eb3e57fffee608d889838b58a85', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:14:21', '2023-10-26 10:14:21', '2024-10-26 10:14:21'),
('cf322dd8e467b0f6f87466a63bf2a656c3cfbe16e8a823bd3ca54faa2bac0244e722cf399f061932', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:19:41', '2023-10-26 10:19:41', '2024-10-26 10:19:41'),
('d2e701c8deb51924ccecda7b2370e63a41d9908e02b4b4c3712bd9fe22368d7ca472896818c7c1bf', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:03:18', '2023-10-26 12:03:18', '2024-10-26 12:03:18'),
('d44a0a6674fda485058eb04f41c4174523e83e0775e6a3297a3b7484e8f70d748e195ce0197294ed', 1, 1, 'API Token', '[]', 0, '2023-10-26 16:18:10', '2023-10-26 16:18:10', '2024-10-26 16:18:10'),
('d4592994ef93b3e52bbb1598ce6ba02aaac10a3925a5252e4f62f9c51a8aabd7fb561237fd0b4d52', 11, 1, 'API Token', '[]', 0, '2023-10-30 11:36:57', '2023-10-30 11:36:57', '2024-10-30 11:36:57'),
('d4bb70c5b89b2fc397d4e097ac9ed6fd74e04528171d2145125eb74788b9242fedb10162c165348d', 4, 1, 'API Token', '[]', 0, '2023-10-26 12:45:23', '2023-10-26 12:45:23', '2024-10-26 12:45:23'),
('d52acb99e2b4f5833e5d607235a2a2dd8f06a0231c4980de1e171b5777f25e27128b8d77cee91eab', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:46:30', '2023-10-30 14:46:30', '2024-10-30 14:46:30'),
('d99d1e47521984aca1546c4e23a35ad8949958d9b4d3d96a67723c0fc902a8fabbd103887141d02c', 16, 1, 'API Token', '[]', 0, '2023-11-20 06:06:12', '2023-11-20 06:06:12', '2024-11-20 11:36:12'),
('dccfe4c689676670d6095eefa7ae5db2e9618bb1ad4a88cf62286769d7e1eeba50cb321627b17b73', 11, 1, 'API Token', '[]', 0, '2023-10-26 13:59:37', '2023-10-26 13:59:37', '2024-10-26 13:59:37'),
('ddb7519696561a8e505502ca8c9f256a5dfe9b0318f777f5274bf064b11a3085be48a552d96c2055', 20, 1, 'API Token', '[]', 0, '2023-11-20 06:47:39', '2023-11-20 06:47:39', '2024-11-20 12:17:39'),
('e04b577318d19a1f2c56d77f37776017dc672002598cf1a96f18193ea759d8ce167ef16ca0064d38', 10, 1, 'API Token', '[]', 0, '2023-10-25 18:23:52', '2023-10-25 18:23:52', '2024-10-25 18:23:52'),
('e067a60a430a1cac1164e25f59a8bffde8815ff932e9744cd35f798536ee37aa06fc261d41577e29', 5, 1, 'API Token', '[]', 0, '2023-10-26 14:01:07', '2023-10-26 14:01:07', '2024-10-26 14:01:07'),
('e2daa0f08e110ca8186af638436150b041497ca63e97f2ae9d71d5bfdcf9058280fb38d3c23587cd', 5, 1, 'API Token', '[]', 0, '2023-10-26 12:05:09', '2023-10-26 12:05:09', '2024-10-26 12:05:09'),
('e46ae8251a88687f236e13d1668225c79e970c75f232ad7fb954cfbb9701a92a83316e79b9262032', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:47:02', '2023-10-30 14:47:03', '2024-10-30 14:47:02'),
('e69e03c12304fc767a9294a17375da2bff3e26c16f60f258beff5936d07702a10ee3aaa6b4e6eb86', 6, 1, 'API Token', '[]', 0, '2023-11-01 11:48:38', '2023-11-01 11:48:38', '2024-11-01 11:48:38'),
('e7f0a44298effffaf5325ca0e21daec221eb757448df2a23a838df7da9921f785d5d669840f283c1', 11, 1, 'API Token', '[]', 0, '2023-11-02 16:06:28', '2023-11-02 16:06:29', '2024-11-02 16:06:28'),
('e8105a562ad6ccf0dc16a989c2592e5dd2c8d1e5c93d3207216cf4f5e169643d587ff6b8c3c68f02', 11, 1, 'API Token', '[]', 0, '2023-11-03 11:40:31', '2023-11-03 11:40:31', '2024-11-03 11:40:31'),
('ea229006d7ab7fe58d40e13dc2b741609532e027f6321a2b521b6103b7dd9304f5ce66e7c2ab5cd2', 10, 1, 'API Token', '[]', 0, '2023-10-25 18:26:10', '2023-10-25 18:26:10', '2024-10-25 18:26:10'),
('edc98eb95da0f0ca8a3b381f25acb76ddb8c86581cb71c50c7883bc4905f74ba547b1a72df438be3', 7, 1, 'API Token', '[]', 0, '2023-10-25 17:47:51', '2023-10-25 17:47:51', '2024-10-25 17:47:51'),
('ee0c4319dfa2dcccd94a72dc6b265d05f26d776393ddf81333b122ee59f93deaf9ba5d5a95915989', 11, 1, 'API Token', '[]', 0, '2023-11-01 10:35:24', '2023-11-01 10:35:24', '2024-11-01 10:35:24'),
('ee4eee893f6c0f00ee248f54885e42918eb4393cb3743ca248ade7d8ac65811a1f13996c92ce2500', 5, 1, 'API Token', '[]', 0, '2023-11-01 10:34:58', '2023-11-01 10:34:58', '2024-11-01 10:34:58'),
('ee6cabc01dd0336e74e4eb8e662a257919ee8c1afed0fbdd8043f8961d22e2783216f19aa1811a67', 6, 1, 'API Token', '[]', 0, '2023-10-26 16:58:34', '2023-10-26 16:58:34', '2024-10-26 16:58:34'),
('f273ef06544f62da43fe4f9024bed1bc485182352dfe5a467bbb98af721c80766103b5af1fe0dc49', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:07:07', '2023-10-26 10:07:07', '2024-10-26 10:07:07'),
('f5cbf53d7d353433a0450b0cfac5f15d692a1805e87201a126e846c1a0b0577c94d2b64e199a8d00', 5, 1, 'API Token', '[]', 0, '2023-10-25 08:19:34', '2023-10-25 08:19:34', '2024-10-25 13:49:34'),
('f5d58c0f7d40e4b34c81bddc4eaadc939fa08ce1aa19e71d54e00a109f7143d48c13c8dc74eb19d2', 11, 1, 'API Token', '[]', 0, '2023-10-26 11:15:52', '2023-10-26 11:15:52', '2024-10-26 11:15:52'),
('f65cfbcf0532abb413057ecb0fa436ea5440d1dd745301a52c6ccc6f14d617645fc6a947fe74b62a', 5, 1, 'API Token', '[]', 0, '2023-10-25 07:41:56', '2023-10-25 07:41:56', '2024-10-25 13:11:56'),
('f7a590cc013ad6dcb03186f15894c8a6ade2e120a2e4c84b190c9e284bb460c8b2db4fcb0df2cff2', 4, 1, 'API Token', '[]', 0, '2023-10-26 16:05:52', '2023-10-26 16:05:52', '2024-10-26 16:05:52'),
('f7e8489d2d18ebe0d1b4420ecf921b2b627b8c9e6eccd6eba6f59364ad03c52419a5408e17dd545e', 11, 1, 'API Token', '[]', 0, '2023-11-06 11:35:17', '2023-11-06 11:35:17', '2024-11-06 11:35:17'),
('f98ace5c7b877098e2d359675cba2f706dba80bce2e52c48225b73c842414097a20b9d135350bd2e', 11, 1, 'API Token', '[]', 0, '2023-11-06 13:39:27', '2023-11-06 13:39:27', '2024-11-06 13:39:27'),
('faa5dcf38996305903fe8a3fb52941e1f81e416609d678f120a9098e578c0855b26eee24b5c3a70b', 5, 1, 'API Token', '[]', 0, '2023-10-26 10:06:53', '2023-10-26 10:06:54', '2024-10-26 10:06:53'),
('fd0245d34fbf7481f7a24f0756f71eca899e291c85010c8892e4a5559b6a2bef0316372879bccd09', 11, 1, 'API Token', '[]', 0, '2023-11-03 18:22:17', '2023-11-03 18:22:17', '2024-11-03 18:22:17'),
('fdfc785000a6ac7b9bbb339fc228786cc6e5c7501ba5a0602bce67a04c4cac66447215c5f59da905', 11, 1, 'API Token', '[]', 0, '2023-11-06 12:54:05', '2023-11-06 12:54:05', '2024-11-06 12:54:05'),
('fe5fe19929f8979b1fac7d3e3d4b15c360a69341e89b5e5502a5132abce7a89020a515a47e93119d', 11, 1, 'API Token', '[]', 0, '2023-11-03 15:52:35', '2023-11-03 15:52:35', '2024-11-03 15:52:35'),
('feb6a86b683df4d4a8b7e1772e71f4d954b374a5b09250c5e24a1faacef15f242411ebad0f91ce76', 5, 1, 'API Token', '[]', 0, '2023-10-30 14:37:35', '2023-10-30 14:37:35', '2024-10-30 14:37:35'),
('ff25b01828c0d8566b6c36fc83d4be1625b56818f57e1619110a7d1e795b9d6ac0a70f90f7ee9ebe', 3, 1, 'API Token', '[]', 0, '2023-11-08 16:29:05', '2023-11-08 16:29:05', '2024-11-08 16:29:05'),
('ff56f122ab6dd9525ee8fd83ce7566e8713070dc84e10911483d2e30c91a70cbe72fa9721e1f8784', 11, 1, 'API Token', '[]', 0, '2023-10-30 18:03:39', '2023-10-30 18:03:39', '2024-10-30 18:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Super Mom Personal Access Client', 'hJhvGWzIVkqGSUnB2A2bRWuasPi8uJKGAUesu1BW', NULL, 'http://localhost', 1, 0, 0, '2023-10-25 07:41:29', '2023-10-25 07:41:29'),
(2, NULL, 'Super Mom Password Grant Client', 'mQvNhez2v2D0RxQriUjNdETexk0e7AF0um5GZdKH', 'users', 'http://localhost', 0, 1, 0, '2023-10-25 07:41:29', '2023-10-25 07:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-25 07:41:29', '2023-10-25 07:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `order_pdf` varchar(255) DEFAULT NULL,
  `order_subtotal` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `tax_amount` double DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `transporter` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_by`, `order_pdf`, `order_subtotal`, `discount`, `tax_amount`, `order_total`, `transporter`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 4, 'PO_4_20231025092858.pdf', 7822, 10, 786.08, 7039.8, 'transporter', 0, NULL, '2022-10-25 09:28:58', '2023-10-26 18:04:36'),
(6, 5, 'PO_6_20231025150032.pdf', 6588, 10, 514.09, 5929.2, 'transporter', 0, NULL, '2023-10-25 09:30:32', '2023-10-25 09:34:13'),
(7, 6, 'PO_7_20231026172503.pdf', 600, NULL, 30, 600, 'transporter', 0, NULL, '2023-10-26 17:25:03', '2023-10-26 18:06:04'),
(8, 6, 'PO_8_20231101114848.pdf', 600, NULL, 30, 600, 'transporter', 0, NULL, '2023-11-01 11:48:48', '2023-11-01 11:48:49'),
(9, 11, NULL, NULL, NULL, NULL, NULL, 'address', 0, NULL, '2023-11-01 12:02:17', '2023-11-01 12:02:17'),
(10, 11, NULL, NULL, NULL, NULL, NULL, 'address', 0, NULL, '2023-11-01 12:02:34', '2023-11-01 12:02:34'),
(11, 11, NULL, NULL, NULL, NULL, NULL, 'asdasdasdasdasd', 0, NULL, '2023-11-01 12:03:47', '2023-11-01 12:03:47'),
(12, 11, NULL, NULL, NULL, NULL, NULL, 'sadasdasd', 0, NULL, '2023-11-01 12:03:54', '2023-11-01 12:03:54'),
(13, 11, NULL, NULL, NULL, NULL, NULL, 'asdsdasd', 0, NULL, '2023-11-01 12:04:44', '2023-11-01 12:04:44'),
(14, 11, NULL, NULL, NULL, NULL, NULL, 'dasdsdasdasdasd', 0, NULL, '2023-11-01 16:01:36', '2023-11-01 16:01:36'),
(15, 11, NULL, NULL, NULL, NULL, NULL, 'console.log(\' -------------------- first ----------------------- \');', 0, NULL, '2023-11-01 16:09:11', '2023-11-01 16:09:11'),
(16, 6, 'PO_16_20231101160956.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-01 16:09:56', '2023-11-01 16:09:56'),
(17, 6, 'PO_17_20231101161055.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-01 16:10:55', '2023-11-01 16:10:55'),
(18, 11, NULL, NULL, NULL, NULL, NULL, 'asdasdasd', 0, NULL, '2023-11-01 16:12:34', '2023-11-01 16:12:34'),
(19, 11, NULL, NULL, NULL, NULL, NULL, 'adasd', 0, NULL, '2023-11-01 16:14:14', '2023-11-01 16:14:14'),
(20, 11, 'PO_20_20231101163836.pdf', 450, NULL, 22.5, 450, 'asdasdasd', 0, NULL, '2023-11-01 16:38:36', '2023-11-01 16:38:37'),
(21, 11, 'PO_21_20231101163836.pdf', 300, NULL, 15, 300, 'asdasdasd', 0, NULL, '2023-11-01 16:38:36', '2023-11-01 16:38:37'),
(22, 11, 'PO_22_20231101165116.pdf', 300, NULL, 15, 300, 'asdasdas', 0, NULL, '2023-11-01 16:51:16', '2023-11-01 16:51:17'),
(23, 11, 'PO_23_20231101165116.pdf', 450, NULL, 22.5, 450, 'asdasdas', 0, NULL, '2023-11-01 16:51:16', '2023-11-01 16:51:17'),
(24, 11, 'PO_24_20231101170031.pdf', 300, NULL, 15, 300, 'asdasd', 0, NULL, '2023-11-01 17:00:31', '2023-11-01 17:00:32'),
(25, 11, 'PO_25_20231101170031.pdf', 450, NULL, 22.5, 450, 'asdasd', 0, NULL, '2023-11-01 17:00:31', '2023-11-01 17:00:32'),
(26, 11, 'PO_26_20231101170221.pdf', 300, NULL, 15, 300, 'asdasd', 0, NULL, '2023-11-01 17:02:21', '2023-11-01 17:02:21'),
(27, 11, 'PO_27_20231101170221.pdf', 450, NULL, 22.5, 450, 'asdasd', 0, NULL, '2023-11-01 17:02:21', '2023-11-01 17:02:21'),
(28, 11, 'PO_28_20231101170323.pdf', 450, NULL, 22.5, 450, 'fdgdfgdfg', 0, NULL, '2023-11-01 17:03:23', '2023-11-01 17:03:23'),
(29, 11, 'PO_29_20231101170323.pdf', 300, NULL, 15, 300, 'fdgdfgdfg', 0, NULL, '2023-11-01 17:03:23', '2023-11-01 17:03:23'),
(30, 11, 'PO_30_20231101170524.pdf', 300, NULL, 15, 300, 'asdasd', 0, NULL, '2023-11-01 17:05:24', '2023-11-01 17:05:25'),
(31, 11, 'PO_31_20231101170524.pdf', 450, NULL, 22.5, 450, 'asdasd', 0, NULL, '2023-11-01 17:05:24', '2023-11-01 17:05:25'),
(32, 11, 'PO_32_20231101170606.pdf', 300, NULL, 15, 300, 'asdasdasd', 0, NULL, '2023-11-01 17:06:06', '2023-11-01 17:06:06'),
(33, 11, 'PO_33_20231101170606.pdf', 450, NULL, 22.5, 450, 'asdasdasd', 0, NULL, '2023-11-01 17:06:06', '2023-11-01 17:06:06'),
(34, 6, 'PO_34_20231101184414.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-01 18:44:14', '2023-11-01 18:44:18'),
(35, 11, 'PO_35_20231102101514.pdf', 300, NULL, 15, 300, 'Product 1', 0, NULL, '2023-11-02 10:15:14', '2023-11-02 10:15:15'),
(36, 11, 'PO_36_20231102150823.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-02 15:08:23', '2023-11-02 15:08:25'),
(37, 11, 'PO_37_20231102160707.pdf', 780, NULL, 39, 780, 'Product 4', 0, NULL, '2023-11-02 16:07:07', '2023-11-02 16:07:09'),
(38, 11, 'PO_38_20231103100849.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-03 10:08:49', '2023-11-03 10:08:50'),
(39, 11, 'PO_39_20231103105847.pdf', 200, NULL, 10, 200, 'asdasd', 0, NULL, '2023-11-03 10:58:47', '2023-11-03 10:58:48'),
(40, 11, 'PO_40_20231103105947.pdf', 200, NULL, 10, 200, 'asd', 0, NULL, '2023-11-03 10:59:47', '2023-11-03 10:59:47'),
(41, 11, 'PO_41_20231103110348.pdf', 300, NULL, 15, 300, 'download', 0, NULL, '2023-11-03 11:03:48', '2023-11-03 11:03:49'),
(42, 11, 'PO_42_20231103110431.pdf', 300, NULL, 15, 300, 'asdasd', 0, NULL, '2023-11-03 11:04:31', '2023-11-03 11:04:32'),
(43, 11, 'PO_43_20231103110548.pdf', 150, NULL, 7.5, 150, 'asdasdasd', 0, NULL, '2023-11-03 11:05:48', '2023-11-03 11:05:49'),
(44, 11, 'PO_44_20231103110658.pdf', 150, NULL, 7.5, 150, 'pdffff', 0, NULL, '2023-11-03 11:06:58', '2023-11-03 11:06:58'),
(45, 11, 'PO_45_20231103110852.pdf', 780, NULL, 39, 780, 'download pdf', 0, NULL, '2023-11-03 11:08:52', '2023-11-03 11:08:52'),
(46, 11, 'PO_46_20231103111458.pdf', 477, NULL, 85.86, 477, '2 products', 0, NULL, '2023-11-03 11:14:58', '2023-11-03 11:14:58'),
(47, 11, 'PO_47_20231103111458.pdf', 5000, NULL, 250, 5000, '2 products', 0, NULL, '2023-11-03 11:14:58', '2023-11-03 11:14:58'),
(48, 11, 'PO_48_20231103111634.pdf', 736, NULL, 206.08, 736, 'requestStoragePermission', 0, NULL, '2023-11-03 11:16:34', '2023-11-03 11:16:34'),
(49, 11, 'PO_49_20231103111634.pdf', 2553, NULL, 459.54, 2553, 'requestStoragePermission', 0, NULL, '2023-11-03 11:16:34', '2023-11-03 11:16:34'),
(50, 11, 'PO_50_20231103112952.pdf', 758, NULL, 90.96, 758, 'downloadFile', 0, NULL, '2023-11-03 11:29:52', '2023-11-03 11:29:53'),
(51, 11, 'PO_51_20231103112952.pdf', 928, NULL, 111.36, 928, 'downloadFile', 0, NULL, '2023-11-03 11:29:52', '2023-11-03 11:29:53'),
(52, 11, 'PO_52_20231103114049.pdf', 100, NULL, 5, 100, '<action android:name=\"android.intent.action.DOWNLOAD_COMPLETE\"/>', 0, NULL, '2023-11-03 11:40:49', '2023-11-03 11:40:49'),
(53, 11, 'PO_53_20231103114049.pdf', 150, NULL, 7.5, 150, '<action android:name=\"android.intent.action.DOWNLOAD_COMPLETE\"/>', 0, NULL, '2023-11-03 11:40:49', '2023-11-03 11:40:49'),
(54, 11, 'PO_54_20231103114837.pdf', 150, NULL, 7.5, 150, 'ppppppp', 0, NULL, '2023-11-03 11:48:37', '2023-11-03 11:48:37'),
(55, 11, 'PO_55_20231103114837.pdf', 780, NULL, 39, 780, 'ppppppp', 0, NULL, '2023-11-03 11:48:37', '2023-11-03 11:48:37'),
(56, 11, 'PO_56_20231103114837.pdf', 477, NULL, 85.86, 477, 'ppppppp', 0, NULL, '2023-11-03 11:48:37', '2023-11-03 11:48:37'),
(57, 11, 'PO_57_20231103115355.pdf', 10000, NULL, 500, 10000, 'asdasd', 0, NULL, '2023-11-03 11:53:55', '2023-11-03 11:53:55'),
(58, 11, 'PO_58_20231103115355.pdf', 851, NULL, 153.18, 851, 'asdasd', 0, NULL, '2023-11-03 11:53:55', '2023-11-03 11:53:55'),
(59, 11, 'PO_59_20231103115858.pdf', 736, NULL, 206.08, 736, '3', 0, NULL, '2023-11-03 11:58:58', '2023-11-03 11:58:58'),
(60, 11, 'PO_60_20231103115858.pdf', 758, NULL, 90.96, 758, '3', 0, NULL, '2023-11-03 11:58:58', '2023-11-03 11:58:58'),
(61, 11, 'PO_61_20231103115858.pdf', 1856, NULL, 222.72, 1856, '3', 0, NULL, '2023-11-03 11:58:58', '2023-11-03 11:58:58'),
(62, 11, 'PO_62_20231103120229.pdf', 1902, NULL, 342.36, 1902, '22222', 0, NULL, '2023-11-03 12:02:29', '2023-11-03 12:02:29'),
(63, 11, 'PO_63_20231103120229.pdf', 150, NULL, 18, 150, '22222', 0, NULL, '2023-11-03 12:02:29', '2023-11-03 12:02:29'),
(64, 11, 'PO_64_20231103120827.pdf', 2679, NULL, 133.95, 2679, 'asdasdasd', 0, NULL, '2023-11-03 12:08:27', '2023-11-03 12:08:28'),
(65, 11, 'PO_65_20231103120827.pdf', 618, NULL, 173.04, 618, 'asdasdasd', 0, NULL, '2023-11-03 12:08:27', '2023-11-03 12:08:28'),
(66, 11, 'PO_66_20231103121716.pdf', 430, NULL, 120.4, 430, 'content', 0, NULL, '2023-11-03 12:17:16', '2023-11-03 12:17:16'),
(67, 11, 'PO_67_20231103121716.pdf', 227, NULL, 11.35, 227, 'content', 0, NULL, '2023-11-03 12:17:16', '2023-11-03 12:17:16'),
(68, 11, 'PO_68_20231103121918.pdf', 430, NULL, 120.4, 430, '.fetch(\'GET\', Url)\n    .then((res) => {\n      console.log(\'The file saved to\', res.path());\n      fs.stat(res.path())\n        .then((stats) => {\n          if (stats.size > 0) {\n            alert(\'File downloaded successfully\');\n          } else {\n        ', 0, NULL, '2023-11-03 12:19:18', '2023-11-03 12:19:18'),
(69, 11, 'PO_69_20231103122833.pdf', 108, NULL, 12.96, 108, 'h', 0, NULL, '2023-11-03 12:28:33', '2023-11-03 12:28:34'),
(70, 11, NULL, NULL, NULL, NULL, NULL, '3 products', 0, NULL, '2023-11-03 12:42:29', '2023-11-03 12:42:29'),
(71, 11, 'PO_71_20231103124229.pdf', 200, NULL, 24, 200, '3 products', 0, NULL, '2023-11-03 12:42:29', '2023-11-03 12:42:30'),
(72, 11, 'PO_72_20231103124229.pdf', 500, NULL, 25, 500, '3 products', 0, NULL, '2023-11-03 12:42:29', '2023-11-03 12:42:30'),
(73, 11, 'PO_73_20231103124427.pdf', 300, NULL, 54, 300, '12', 0, NULL, '2023-11-03 12:44:27', '2023-11-03 12:44:28'),
(74, 11, 'PO_74_20231103124427.pdf', 120, NULL, 33.6, 120, '12', 0, NULL, '2023-11-03 12:44:27', '2023-11-03 12:44:28'),
(75, 11, 'PO_75_20231103124534.pdf', 600, NULL, 30, 600, 'transporassdter', 0, NULL, '2023-11-03 12:45:34', '2023-11-03 12:45:34'),
(76, 11, 'PO_76_20231103124603.pdf', 700, NULL, 35, 700, 'transporassdter', 0, NULL, '2023-11-03 12:46:03', '2023-11-03 12:46:03'),
(77, 11, NULL, NULL, NULL, NULL, NULL, '96', 0, NULL, '2023-11-03 12:48:02', '2023-11-03 12:48:02'),
(78, 11, NULL, NULL, NULL, NULL, NULL, '96', 0, NULL, '2023-11-03 12:48:02', '2023-11-03 12:48:02'),
(79, 11, NULL, NULL, NULL, NULL, NULL, 'jhjkh', 0, NULL, '2023-11-03 12:48:20', '2023-11-03 12:48:20'),
(80, 11, NULL, NULL, NULL, NULL, NULL, 'jhjkh', 0, NULL, '2023-11-03 12:48:20', '2023-11-03 12:48:20'),
(81, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 12:49:42', '2023-11-03 12:49:42'),
(82, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 12:49:42', '2023-11-03 12:49:42'),
(83, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 12:49:53', '2023-11-03 12:49:53'),
(84, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 12:49:53', '2023-11-03 12:49:53'),
(85, 11, NULL, NULL, NULL, NULL, NULL, '265', 0, NULL, '2023-11-03 12:52:47', '2023-11-03 12:52:47'),
(86, 11, NULL, NULL, NULL, NULL, NULL, '265', 0, NULL, '2023-11-03 12:52:47', '2023-11-03 12:52:47'),
(87, 11, 'PO_87_20231103125257.pdf', 700, NULL, 35, 700, 'transporassdter', 0, NULL, '2023-11-03 12:52:57', '2023-11-03 12:52:58'),
(88, 11, NULL, NULL, NULL, NULL, NULL, 'asdsd', 0, NULL, '2023-11-03 13:00:36', '2023-11-03 13:00:36'),
(89, 11, NULL, NULL, NULL, NULL, NULL, 'asdsd', 0, NULL, '2023-11-03 13:00:36', '2023-11-03 13:00:36'),
(90, 11, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', 0, NULL, '2023-11-03 13:01:26', '2023-11-03 13:01:26'),
(91, 11, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', 0, NULL, '2023-11-03 13:01:26', '2023-11-03 13:01:26'),
(92, 11, 'PO_92_20231103130207.pdf', 600, NULL, 30, 600, 'transporter', 0, NULL, '2023-11-03 13:02:07', '2023-11-03 13:02:07'),
(93, 11, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, '2023-11-03 13:03:14', '2023-11-03 13:03:14'),
(94, 11, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, '2023-11-03 13:03:14', '2023-11-03 13:03:14'),
(95, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 13:04:42', '2023-11-03 13:04:42'),
(96, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 13:04:42', '2023-11-03 13:04:42'),
(97, 11, NULL, NULL, NULL, NULL, NULL, 'asdasd', 0, NULL, '2023-11-03 13:08:24', '2023-11-03 13:08:24'),
(98, 11, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', 0, NULL, '2023-11-03 13:12:40', '2023-11-03 13:12:40'),
(99, 11, NULL, NULL, NULL, NULL, NULL, 'asdasd', 0, NULL, '2023-11-03 13:15:26', '2023-11-03 13:15:26'),
(100, 11, NULL, NULL, NULL, NULL, NULL, 'gjghj', 0, NULL, '2023-11-03 13:26:13', '2023-11-03 13:26:13'),
(101, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-03 13:27:44', '2023-11-03 13:27:44'),
(102, 11, 'PO_102_20231103133227.pdf', 350, NULL, 17.5, 350, 'rrr', 0, NULL, '2023-11-03 13:32:27', '2023-11-03 13:32:28'),
(103, 11, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-06 17:14:13', '2023-11-06 17:14:13'),
(104, 11, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-06 17:14:35', '2023-11-06 17:14:35'),
(105, 11, NULL, 895, NULL, 161.1, 895, 'transporter', 0, NULL, '2023-11-06 17:15:53', '2023-11-06 17:15:53'),
(106, 11, NULL, 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-06 17:16:11', '2023-11-06 17:16:11'),
(107, 11, NULL, 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-06 17:17:23', '2023-11-06 17:17:23'),
(108, 11, NULL, 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-06 17:17:35', '2023-11-06 17:17:35'),
(109, 6, NULL, 994, NULL, 178.92, 994, 'transporter', 0, NULL, '2023-11-06 17:17:44', '2023-11-06 17:17:44'),
(110, 11, NULL, 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-06 17:21:34', '2023-11-06 17:21:34'),
(111, 6, NULL, 994, NULL, 178.92, 994, 'transporter', 0, NULL, '2023-11-06 17:57:20', '2023-11-06 17:57:20'),
(112, 11, NULL, NULL, NULL, NULL, NULL, 'asdsd', 0, NULL, '2023-11-06 18:25:57', '2023-11-06 18:25:57'),
(113, 6, 'PO_113_20231107000000.pdf', 994, NULL, 178.92, 994, 'transporter', 0, NULL, '2023-11-07 11:38:45', '2023-11-07 11:38:45'),
(114, 11, NULL, NULL, NULL, NULL, NULL, 'Test123', 0, NULL, '2023-11-08 19:39:09', '2023-11-08 19:39:09'),
(115, 11, NULL, NULL, NULL, NULL, NULL, 'test', 0, NULL, '2023-11-08 19:39:20', '2023-11-08 19:39:20'),
(116, 11, NULL, NULL, NULL, NULL, NULL, 'asdas', 0, NULL, '2023-11-08 19:43:26', '2023-11-08 19:43:26'),
(117, 11, NULL, NULL, NULL, NULL, NULL, 'dffs', 0, NULL, '2023-11-08 19:45:00', '2023-11-08 19:45:00'),
(118, 11, NULL, NULL, NULL, NULL, NULL, 'asdas', 0, NULL, '2023-11-08 19:46:48', '2023-11-08 19:46:48'),
(119, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-08 19:50:04', '2023-11-08 19:50:04'),
(120, 11, 'PO_120_20231108000000.pdf', 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-08 19:52:31', '2023-11-08 19:52:31'),
(121, 11, NULL, NULL, NULL, NULL, NULL, 'asds', 0, NULL, '2023-11-08 19:55:18', '2023-11-08 19:55:18'),
(122, 11, NULL, NULL, NULL, NULL, NULL, 'tesrt', 0, NULL, '2023-11-08 19:58:16', '2023-11-08 19:58:16'),
(123, 11, NULL, NULL, NULL, NULL, NULL, 'test', 0, NULL, '2023-11-08 19:58:41', '2023-11-08 19:58:41'),
(124, 11, NULL, NULL, NULL, NULL, NULL, 'asd', 0, NULL, '2023-11-08 20:01:48', '2023-11-08 20:01:48'),
(125, 11, NULL, NULL, NULL, NULL, NULL, 'ads', 0, NULL, '2023-11-08 20:04:27', '2023-11-08 20:04:27'),
(126, 11, NULL, NULL, NULL, NULL, NULL, 'tessssst', 0, NULL, '2023-11-08 20:08:27', '2023-11-08 20:08:27'),
(127, 11, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-08 20:09:53', '2023-11-08 20:09:53'),
(128, 11, 'PO_128_20231108000000.pdf', 425, NULL, 76.5, 425, 'transporter', 0, NULL, '2023-11-08 20:10:28', '2023-11-08 20:10:28'),
(129, 11, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-08 20:10:34', '2023-11-08 20:10:34'),
(130, 4, 'PO_130_20231110000000.pdf', 3097, 10, 557.46, 2787.3, 'transporter', 0, NULL, '2023-11-10 08:22:49', '2023-11-10 08:22:50'),
(131, 4, 'PO_131_20231110000000.pdf', 3097, 10, 557.46, 2787.3, 'transporter', 0, NULL, '2023-11-10 10:02:29', '2023-11-10 10:02:29'),
(132, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-10 10:02:32', '2023-11-10 10:02:32'),
(133, 4, 'PO_133_20231110000000.pdf', 3097, 10, 557.46, 2787.3, 'transporter', 0, NULL, '2023-11-10 10:05:13', '2023-11-10 10:05:13'),
(134, 4, 'PO_134_20231110000000.pdf', 0, 10, 0, 0, 'transporter', 0, NULL, '2023-11-10 10:05:24', '2023-11-10 10:05:24'),
(135, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-10 10:06:02', '2023-11-10 10:06:02'),
(136, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-10 10:06:30', '2023-11-10 10:06:30'),
(137, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, NULL, '2023-11-10 10:06:36', '2023-11-10 10:06:36'),
(138, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:06:52', '2023-11-10 10:06:52', '2023-11-10 10:06:52'),
(139, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:07:06', '2023-11-10 10:07:06', '2023-11-10 10:07:06'),
(140, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:07:15', '2023-11-10 10:07:15', '2023-11-10 10:07:15'),
(141, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:07:59', '2023-11-10 10:07:59', '2023-11-10 10:07:59'),
(142, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:09:17', '2023-11-10 10:09:17', '2023-11-10 10:09:17'),
(143, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 10:09:20', '2023-11-10 10:09:20', '2023-11-10 10:09:20'),
(144, 4, 'PO_144_20231110000000.pdf', 3097, 10, 557.46, 2787.3, 'transporter', 0, NULL, '2023-11-10 10:15:39', '2023-11-10 10:15:40'),
(145, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 11:06:43', '2023-11-10 11:06:43', '2023-11-10 11:06:43'),
(146, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 11:07:10', '2023-11-10 11:07:10', '2023-11-10 11:07:10'),
(147, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 12:17:40', '2023-11-10 12:17:40', '2023-11-10 12:17:40'),
(148, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 12:23:32', '2023-11-10 12:23:32', '2023-11-10 12:23:32'),
(149, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 12:23:35', '2023-11-10 12:23:35', '2023-11-10 12:23:35'),
(150, 4, NULL, NULL, NULL, NULL, NULL, 'transporter', 0, '2023-11-10 12:23:40', '2023-11-10 12:23:40', '2023-11-10 12:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `qnt` bigint(20) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `tax_rate` bigint(20) NOT NULL DEFAULT 0,
  `tax_amount` bigint(20) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `products_id`, `qnt`, `price`, `tax_rate`, `tax_amount`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 1, 477, 18, 86, 1, NULL, NULL, '2023-10-27 10:10:38'),
(2, 4, 6, 1, 5000, 5, 250, 0, NULL, NULL, '2023-10-27 10:10:38'),
(3, 4, 7, 1, 851, 18, 153, 0, NULL, NULL, '2023-10-27 10:10:38'),
(4, 4, 8, 1, 736, 28, 206, 0, NULL, NULL, '2023-10-27 10:10:38'),
(5, 4, 9, 1, 758, 12, 91, 0, NULL, NULL, '2023-10-27 10:10:38'),
(6, 6, 1, 1, 500, 10, 10, 0, NULL, NULL, NULL),
(7, 6, 2, 1, 200, 10, 15, 0, NULL, NULL, NULL),
(8, 6, 3, 1, 150, 10, 15, 0, NULL, NULL, NULL),
(9, 6, 5, 1, 477, 18, 86, 0, NULL, NULL, NULL),
(10, 6, 6, 1, 5000, 5, 250, 0, NULL, NULL, NULL),
(11, 6, 17, 1, 430, 28, 120, 0, NULL, NULL, NULL),
(12, 6, 18, 1, 54, 12, 6, 0, NULL, NULL, NULL),
(13, 6, 15, 1, 227, 5, 11, 0, NULL, NULL, NULL),
(14, 7, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(15, 7, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(16, 8, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(17, 8, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(18, 16, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(19, 16, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(20, 17, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(21, 17, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(22, 20, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(23, 21, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(24, 23, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(25, 22, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(26, 25, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(27, 24, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(28, 27, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(29, 26, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(30, 28, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(31, 29, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(32, 30, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(33, 31, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(34, 32, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(35, 33, 2, 3, 150, 5, 23, 0, NULL, NULL, NULL),
(36, 34, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(37, 34, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(38, 35, 3, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(39, 36, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(40, 36, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(41, 37, 4, 1, 780, 5, 39, 0, NULL, NULL, NULL),
(42, 38, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(43, 38, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(44, 39, 1, 2, 100, 5, 10, 0, NULL, NULL, NULL),
(45, 40, 1, 2, 100, 5, 10, 0, NULL, NULL, NULL),
(46, 41, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(47, 42, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(48, 43, 2, 1, 150, 5, 8, 0, NULL, NULL, NULL),
(49, 44, 3, 1, 150, 5, 8, 0, NULL, NULL, NULL),
(50, 45, 4, 1, 780, 5, 39, 0, NULL, NULL, NULL),
(51, 47, 6, 1, 5000, 5, 250, 0, NULL, NULL, NULL),
(52, 46, 5, 1, 477, 18, 86, 0, NULL, NULL, NULL),
(53, 48, 8, 1, 736, 28, 206, 0, NULL, NULL, NULL),
(54, 49, 7, 3, 851, 18, 460, 0, NULL, NULL, NULL),
(55, 50, 9, 1, 758, 12, 91, 0, NULL, NULL, NULL),
(56, 51, 10, 1, 928, 12, 111, 0, NULL, NULL, NULL),
(57, 53, 2, 1, 150, 5, 8, 0, NULL, NULL, NULL),
(58, 52, 1, 1, 100, 5, 5, 0, NULL, NULL, NULL),
(59, 54, 3, 1, 150, 5, 8, 0, NULL, NULL, NULL),
(60, 55, 4, 1, 780, 5, 39, 0, NULL, NULL, NULL),
(61, 56, 5, 1, 477, 18, 86, 0, NULL, NULL, NULL),
(62, 58, 7, 1, 851, 18, 153, 0, NULL, NULL, NULL),
(63, 57, 6, 2, 5000, 5, 500, 0, NULL, NULL, NULL),
(64, 60, 9, 1, 758, 12, 91, 0, NULL, NULL, NULL),
(65, 59, 8, 1, 736, 28, 206, 0, NULL, NULL, NULL),
(66, 61, 10, 2, 928, 12, 223, 0, NULL, NULL, NULL),
(67, 62, 11, 2, 951, 18, 342, 0, NULL, NULL, NULL),
(68, 63, 12, 1, 150, 12, 18, 0, NULL, NULL, NULL),
(69, 64, 13, 3, 893, 5, 134, 0, NULL, NULL, NULL),
(70, 65, 14, 1, 618, 28, 173, 0, NULL, NULL, NULL),
(71, 66, 16, 1, 430, 28, 120, 0, NULL, NULL, NULL),
(72, 67, 15, 1, 227, 5, 11, 0, NULL, NULL, NULL),
(73, 68, 17, 1, 430, 28, 120, 0, NULL, NULL, NULL),
(74, 69, 18, 2, 54, 12, 13, 0, NULL, NULL, NULL),
(75, 71, 21, 1, 200, 12, 24, 0, NULL, NULL, NULL),
(76, 72, 20, 1, 500, 5, 25, 0, NULL, NULL, NULL),
(77, 73, 22, 2, 150, 18, 54, 0, NULL, NULL, NULL),
(78, 74, 23, 1, 120, 28, 34, 0, NULL, NULL, NULL),
(79, 75, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(80, 75, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(81, 76, 1, 4, 100, 5, 20, 0, NULL, NULL, NULL),
(82, 76, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(83, 87, 1, 4, 100, 5, 20, 0, NULL, NULL, NULL),
(84, 87, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(85, 92, 1, 3, 100, 5, 15, 0, NULL, NULL, NULL),
(86, 92, 2, 2, 150, 5, 15, 0, NULL, NULL, NULL),
(87, 102, 1, 2, 100, 5, 10, 0, NULL, NULL, NULL),
(88, 102, 2, 1, 150, 5, 8, 0, NULL, NULL, NULL),
(89, 105, 33, 3, 235, 18, 127, 0, NULL, NULL, NULL),
(90, 105, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(91, 106, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(92, 106, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(93, 107, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(94, 107, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(95, 108, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(96, 108, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(97, 109, 32, 3, 268, 18, 145, 0, NULL, NULL, NULL),
(98, 109, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(99, 110, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(100, 110, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(101, 111, 32, 3, 268, 18, 145, 0, NULL, NULL, NULL),
(102, 111, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(103, 113, 32, 3, 268, 18, 145, 0, NULL, NULL, NULL),
(104, 113, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(105, 120, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(106, 120, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(107, 128, 33, 1, 235, 18, 42, 0, NULL, NULL, NULL),
(108, 128, 34, 2, 95, 18, 34, 0, NULL, NULL, NULL),
(109, 130, 32, 3, 799, 18, 431, 0, NULL, NULL, NULL),
(110, 130, 34, 2, 350, 18, 126, 0, NULL, NULL, NULL),
(111, 131, 32, 3, 799, 18, 431, 0, NULL, NULL, NULL),
(112, 131, 34, 2, 350, 18, 126, 0, NULL, NULL, NULL),
(113, 133, 32, 3, 799, 18, 431, 0, NULL, NULL, NULL),
(114, 133, 34, 2, 350, 18, 126, 0, NULL, NULL, NULL),
(115, 144, 32, 3, 799, 18, 431, 0, NULL, NULL, NULL),
(116, 144, 34, 2, 350, 18, 126, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `sub_title`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Buy Furniture, Homeware Online', 'Kitchen Items: Buy Tableware and Kitchenware products online @ upto 50% OFF. Choose from ⭐Dinner Sets ⭐Crockery ⭐Induction Cooktops ⭐Kitchen Appliances &amp; more online at best prices from HomeTown. ✔Easy Returns ✔Easy EMI', 'Home', 1, '2023-10-11 04:20:02', '2023-11-16 11:04:36'),
(2, 'Page Title', 'Page Sub Ttitle', 'Page Description', 'Page Value', 1, '2023-10-11 21:13:29', '2023-10-11 21:13:29'),
(3, 'Title - About us', 'Title - about us', 'Description - about us', 'about_us', 1, '2023-11-06 18:34:13', '2023-11-16 10:07:57'),
(4, 'Contact Us', 'Contact Us', 'Contact Us', 'contact_us', 1, '2023-11-06 19:09:40', '2023-11-06 19:09:40'),
(5, 'Contact Info', 'Contact Info', 'Contact Info', 'contact_info', 1, '2023-11-07 10:37:39', '2023-11-07 10:37:39'),
(6, 'Terms Condition', 'Terms Condition', 'Terms Condition', 'terms_condition', 1, '2023-11-07 11:25:27', '2023-11-07 11:25:27'),
(7, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'privacy_policy', 1, '2023-11-07 11:25:35', '2023-11-07 11:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ravis@7technosoftsolutions.com', '$2y$10$537mgcxwDa7uss0xQO.8Suux9/F9fJYY5g66OEHJ6GGnYyKSFOHJy', '2023-11-10 07:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `gst_rate` varchar(255) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `carton_capacity` int(11) DEFAULT NULL,
  `is_best_seller` tinyint(1) NOT NULL DEFAULT 0,
  `is_new_product` tinyint(1) NOT NULL DEFAULT 0,
  `selling_price` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort_order` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_name`, `description`, `image`, `price`, `gst_rate`, `hsn_code`, `carton_capacity`, `is_best_seller`, `is_new_product`, `selling_price`, `tags`, `long_description`, `status`, `created_at`, `updated_at`, `deleted_at`, `sort_order`, `slug`) VALUES
(1, 'Product 1', 'product 1', 'product 1 description', '', '100', '5', '123', 123, 0, 0, NULL, NULL, NULL, 1, NULL, '2023-11-06 10:32:52', '2023-11-06 10:32:52', NULL, NULL),
(2, 'Product 2', 'product 2', 'product 2 description', '', '150', '5', '1231', 123, 0, 0, NULL, NULL, NULL, 1, NULL, '2023-11-06 10:32:52', '2023-11-06 10:32:52', NULL, NULL),
(3, 'Product 4', 'product 4', 'product 4 description', '', '150', '5', '154231', 1232, 1, 1, NULL, NULL, NULL, 1, NULL, '2023-11-06 10:32:52', '2023-11-06 10:32:52', NULL, NULL),
(4, 'Product 65', 'product 65', 'product 65 description', '', '780', '5', '6512', 123, 0, 0, NULL, NULL, NULL, 1, NULL, '2023-11-06 10:32:53', '2023-11-06 10:32:53', NULL, NULL),
(5, 'Nomlanga Harper', 'Bruce Cotton', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520208.webp', '477', '18', 'HSN-Code-5', 40, 1, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-04 12:32:57', '2023-11-06 10:32:53', '2023-11-06 10:32:53', '5', NULL),
(6, 'name1', 'short_name1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'products-2023-10-17 11-54-38.webp', '5000', '5', 'HSN-Code-6', 40, 0, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 04:03:53', '2023-11-06 10:32:54', '2023-11-06 10:32:54', '23', NULL),
(7, 'Kasimir Meyers', 'Upton Kelley', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520212.webp', '851', '18', 'HSN-Code-7', 40, 1, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 15:15:57', '2023-11-06 10:32:54', '2023-11-06 10:32:54', '23', NULL),
(8, 'Quinlan Salas', 'Wendy Coffey', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520216.webp', '736', '28', 'HSN-Code-8', 40, 0, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 15:17:20', '2023-11-06 10:32:55', '2023-11-06 10:32:55', '21', NULL),
(9, 'Jermaine Sanchez', 'Rebecca Cooley', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520220.webp', '758', '12', 'HSN-Code-9', 40, 1, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 15:17:56', '2023-11-06 10:32:56', '2023-11-06 10:32:56', '212', NULL),
(10, 'Alma Terry', 'Quail Dennis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520226.webp', '928', '12', 'HSN-Code-10', 40, 0, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 15:18:05', '2023-11-06 10:32:56', '2023-11-06 10:32:56', '88', NULL),
(11, 'Title 132', 'Wyatt Berger', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697608355.webp', '951', '18', 'HSN-Code-11', 40, 1, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-07 15:19:01', '2023-11-06 10:33:06', '2023-11-06 10:33:06', '11', NULL),
(12, 'product 120', 'product 120', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520235.webp', '150', '12', 'HSN-Code-12', 50, 1, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-11 00:29:54', '2023-11-06 10:33:07', '2023-11-06 10:33:07', '6', NULL),
(13, 'Abdul Alvarado', 'Ivory Roman', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520238.webp', '893', '5', 'HSN-Code-13', 42, 0, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-11 00:31:47', '2023-11-06 10:33:07', '2023-11-06 10:33:07', '2', NULL),
(14, 'Vivien Page', 'Leslie Valencia', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520243.webp', '618', '28', 'HSN-Code-14', 43, 0, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-11 00:38:19', '2023-11-06 10:33:08', '2023-11-06 10:33:08', '3', NULL),
(15, 'Keelie Tate', 'Blaine Bartlett', 'Necessitatibus moles', NULL, '227', '5', '8', 90, 0, 1, NULL, '[{\"value\":\"asdf asdf\"},{\"value\":\"asdfasdf\"},{\"value\":\"sdfasdf\"}]', '<p>asdfasdfasdfasdf</p>', 1, '2023-10-18 19:16:58', '2023-11-06 10:33:08', '2023-11-06 10:33:08', '67', NULL),
(16, 'Colton Kane', 'Sage Heath', 'Enim mollitia molest', NULL, '430', '28', '75', 80, 1, 1, NULL, '[{\"value\":\"Ipsa\"},{\"value\":\"porro id ea ve.\"},{\"value\":\"asdfasdf\"}]', '<p>asdfasdf</p>', 1, '2023-10-18 19:19:54', '2023-11-06 10:33:08', '2023-11-06 10:33:08', '19', NULL),
(17, 'Colton Kane', 'Sage Heath', 'Enim mollitia molest', NULL, '430', '28', '75', 80, 1, 1, NULL, '[{\"value\":\"Ipsa\"},{\"value\":\"porro id ea ve.\"},{\"value\":\"asdfasdf\"}]', '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-18 19:21:59', '2023-11-06 10:33:09', '2023-11-06 10:33:09', '19', NULL),
(18, 'Yuri Dorsey', 'Elliott Harding', 'Laboriosam doloremq', NULL, '54', '12', '21', 49, 1, 0, NULL, '[{\"value\":\"aExpedita reprehender.sfa\"},{\"value\":\"asdf\"}]', '<p>asdf</p>', 1, '2023-10-18 19:23:10', '2023-11-06 10:33:09', '2023-11-06 10:33:09', '6', NULL),
(19, 'Buffy Sanchez', 'Mara Crawford', 'Dolores dignissimos', NULL, '488', '5', '11', 48, 0, 1, NULL, '[{\"value\":\"Dolore eligendi ut l.asdf\"},{\"value\":\"asdfasdf\"},{\"value\":\"asdfasdfasdf\"}]', 'Expedita ipsam nesci', 1, '2023-10-24 06:55:29', '2023-10-24 06:58:16', '2023-10-24 06:58:16', '99', NULL),
(20, 'product 100', 'product 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697608051.webp', '500', '5', 'HSN-0', 40, 1, 0, '70', '[{\"value\":\"asdfasdf\"},{\"value\":\"asdfasdfasdf\"},{\"value\":\"213213213\"},{\"value\":\"asd234sad\"}]', '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-04 08:45:01', '2023-11-06 10:33:11', '2023-11-06 10:33:11', '2', NULL),
(21, 'product 2', 'product 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697608066.webp', '200', '12', 'HSN-Code-1', 40, 1, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-04 08:45:18', '2023-11-06 10:33:11', '2023-11-06 10:33:11', '2', NULL),
(22, 'product 3', 'product 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697608775.webp', '150', '18', 'HSN-Code-2', 40, 1, 0, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-04 08:45:26', '2023-11-06 10:33:26', '2023-11-06 10:33:26', '3', NULL),
(23, 'product 4', 'product 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1697520203.webp', '120', '28', 'HSN-Code-3', 40, 0, 1, '70', NULL, '<p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.<br />\r\n<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2023-10-04 08:45:38', '2023-11-06 10:33:29', '2023-11-06 10:33:29', '4', NULL),
(24, 'Hiroko Mckay', 'Jasmine Shepherd', 'PRO JUICER', NULL, '496', '28', '11', 47, 0, 0, NULL, 'Officiis aut illum,.', 'Sed id quidem aliqua', 1, '2023-11-06 12:16:19', '2023-11-06 14:00:53', '2023-11-06 14:00:53', '84', NULL),
(25, 'Grant Benjamin', 'Cade Wilder', 'Id possimus except', NULL, '497', '5', '64', 27, 1, 0, NULL, 'Quos quia cillum rep.', 'Ipsam id fugiat libe', 1, '2023-11-06 12:16:24', '2023-11-06 17:10:25', '2023-11-06 17:10:25', '31', NULL),
(26, 'Rogan May', 'Dorothy Davis', 'Deserunt dolore cons', NULL, '420', '28', '1', 21, 1, 0, NULL, 'Sed facilis dolore s.', 'Animi dolore qui de', 1, '2023-11-06 13:09:44', '2023-11-06 17:10:27', '2023-11-06 17:10:27', '36', NULL),
(27, 'Magee Chen', 'Sara Frazier', 'Magna saepe consequa', NULL, '239', '18', '26', 89, 1, 1, NULL, 'Explicabo. Ex pariat.', 'Aut culpa error per', 1, '2023-11-06 13:09:52', '2023-11-06 17:10:26', '2023-11-06 17:10:26', '1', NULL),
(28, 'Odysseus Mcmahon', 'Jessica Whitehead', 'Expedita in est culp', NULL, '236', '28', '4', 13, 0, 1, NULL, 'Quia deserunt reicie.', 'Labore porro facere', 1, '2023-11-06 13:10:03', '2023-11-06 17:10:26', '2023-11-06 17:10:26', '89', NULL),
(29, 'Winter Brown', 'Heather Nunez', 'Numquam et voluptati', NULL, '822', '5', '79', 98, 1, 1, NULL, 'Delectus,laboris au.', 'Fugiat at error odi', 1, '2023-11-06 13:10:11', '2023-11-06 17:10:24', '2023-11-06 17:10:24', '11', NULL),
(30, 'Ivana Becker', 'Peter Berg', 'Beatae ut quo ullam', NULL, '543', '28', '60', 85, 1, 1, NULL, 'Et maxime laboriosam.', 'Dolore unde corrupti', 1, '2023-11-06 13:10:18', '2023-11-06 17:10:25', '2023-11-06 17:10:25', '76', NULL),
(31, 'Emi Wilkerson', 'Colette Kidd', 'Nulla ea vel cupidat', NULL, '283', '12', '53', 0, 1, 1, NULL, 'Sequi irure expedita.', 'Qui sit ex saepe su', 1, '2023-11-06 13:10:26', '2023-11-06 14:00:56', '2023-11-06 14:00:56', '45', NULL),
(32, 'PRO JUICER', 'PJ', 'PRO JUICER', NULL, '799', '18', '39241090', 48, 0, 0, NULL, 'PRO JUICER,PJ', NULL, 1, '2023-11-06 14:01:42', '2023-11-10 07:24:19', NULL, '0', 'pro_juicer'),
(33, 'HEALTHY JUICER', 'HJ', 'HEALTHY JUICER', NULL, '799', '18', '39241090', 48, 1, 0, NULL, 'HEALTHY JUICER,HJ', '', 1, '2023-11-06 15:10:13', '2023-11-09 12:42:27', NULL, '0', 'healthy_juicer'),
(34, 'ANY TIME JUICER', 'ATJ', 'ANY TIME JUICER', NULL, '350', '18', '39241090', 192, 0, 0, NULL, 'ANY TIME JUICER,ATJ', '', 1, '2023-11-06 15:11:16', '2023-11-09 12:42:27', NULL, '0', 'any_time_juicer'),
(35, 'JATPAT JUICER', 'JJ', 'JATPAT JUICER', NULL, '225', '18', '39241090', 216, 1, 1, NULL, 'JATPAT JUICER,JJ', '', 1, '2023-11-06 15:14:40', '2023-11-09 12:42:27', NULL, '0', 'jatpat_juicer'),
(36, 'JUICY', 'JY', 'JUICY', NULL, '150', '18', '39241090', 288, 1, 1, NULL, 'JUICY,JY', '', 1, '2023-11-06 15:15:43', '2023-11-09 12:42:27', NULL, '0', 'juicy'),
(37, 'POWER BLENDER', 'PB', 'POWER BLENDER', NULL, '249', '18', '39241090', 192, 1, 1, NULL, 'POWER BLENDER,PB', '', 1, '2023-11-06 15:17:18', '2023-11-09 12:42:27', NULL, '0', 'power_blender'),
(38, 'QUICK NICER DICER (4 BLADE)', 'QND', 'QUICK NICER DICER (4 BLADE)', NULL, '900', '18', '39241090', 72, 1, 1, NULL, 'QUICK NICER DICER (4 BLADE),QND', '', 1, '2023-11-06 15:18:21', '2023-11-09 12:42:27', NULL, '0', 'quick_nicer_dicer_(4_blade)'),
(39, '14 IN DICER', '14ND', '14 IN DICER', NULL, '1499', '18', '39241090', 48, 1, 1, NULL, '14 IN DICER,14ND', '', 1, '2023-11-06 15:20:32', '2023-11-09 12:42:27', NULL, '0', '14_in_dicer'),
(40, '7 IN 1 BIG NICER DICER', '7BIG', '7 IN 1 BIG NICER DICER', NULL, '999', '18', '39241090', 72, 1, 1, NULL, '7 IN 1 BIG NICER DICER,7BIG', NULL, 1, '2023-11-06 15:21:20', '2023-11-09 12:55:48', NULL, '0', '7_in_1_big_nicer_dicer'),
(41, 'BIG 15 IN 1 DICER WITH CUTTER', '15BIG', 'BIG 15 IN 1 DICER WITH CUTTER', NULL, '1499', '18', '39241090', 48, 1, 1, NULL, 'BIG 15 IN 1 DICER WITH CUTTER,15BIG', '', 1, '2023-11-06 15:23:24', '2023-11-09 12:42:27', NULL, '0', 'big_15_in_1_dicer_with_cutter'),
(42, 'POTATO CHIPSER', 'PC', 'POTATO CHIPSER', NULL, '450', '18', '39241090', 144, 1, 1, NULL, 'POTATO CHIPSER,PC', '', 1, '2023-11-06 15:28:01', '2023-11-09 12:42:27', NULL, '0', 'potato_chipser'),
(43, 'KITHCHEN MASTER', 'KM', 'KITHCHEN MASTER', NULL, '800', '18', '39241090', 72, 0, 1, NULL, 'KITHCHEN MASTER,KM', '', 1, '2023-11-06 15:33:33', '2023-11-09 12:42:27', NULL, '0', 'kithchen_master'),
(44, 'CORN CUTTER', 'CC', 'CORN CUTTER', NULL, '180', '18', '39241090', 192, 1, 1, NULL, 'CORN CUTTER,CC', '', 1, '2023-11-06 15:34:30', '2023-11-09 12:42:27', NULL, '0', 'corn_cutter'),
(45, 'CORN CUTTER', 'CC', 'CORN CUTTER', NULL, '80', '18', '39241090', 192, 1, 1, NULL, '', NULL, 1, '2023-11-06 15:36:10', '2023-11-07 15:06:48', NULL, '0', 'corn_cutter'),
(46, 'MESH STRAINER', 'MS', 'MESH STRAINER', NULL, '149', '18', '39241090', 576, 1, 1, NULL, 'MESH STRAINER,MS', '', 1, '2023-11-06 15:37:25', '2023-11-09 12:42:27', NULL, '0', 'mesh_strainer'),
(47, 'JUICE STRAINER', 'JS', 'JUICE STRAINER', NULL, '350', '18', '39241090', 240, 1, 1, NULL, 'JUICE STRAINER,JS', '', 1, '2023-11-06 15:47:11', '2023-11-09 12:42:27', NULL, '0', 'juice_strainer'),
(48, 'SINK STRAINER', 'SIS', 'SINK STRAINER', NULL, '60', '18', '39241090', 480, 1, 1, NULL, 'SINK STRAINER,SIS', '', 1, '2023-11-06 15:49:06', '2023-11-09 12:42:28', NULL, '0', 'sink_strainer'),
(49, 'ABS LEMON SQUEEZER', 'ALS', 'ABS LEMON SQUEEZER', NULL, '145', '18', '39241090', 432, 1, 1, NULL, 'ABS LEMON SQUEEZER,ALS', '', 1, '2023-11-06 15:50:18', '2023-11-09 12:42:27', NULL, '0', 'abs_lemon_squeezer'),
(50, 'SPEED N PRESS LEMON SQUEEZER', 'SNP', 'SPEED N PRESS LEMON SQUEEZER', NULL, '189', '18', '39241090', 360, 1, 1, NULL, 'SPEED N PRESS LEMON SQUEEZER,SNP', '', 1, '2023-11-06 15:51:28', '2023-11-09 12:42:28', NULL, '0', 'speed_n_press_lemon_squeezer'),
(51, 'GREEN LEAF WASH BASKET', 'GLWB', 'GREEN LEAF WASH BASKET', NULL, '239', '18', '39241090', 144, 1, 1, NULL, 'GREEN LEAF WASH BASKET,GLWB', NULL, 1, '2023-11-06 16:45:50', '2023-11-10 04:50:24', NULL, '0', 'green_leaf_wash_basket'),
(52, '3 IN 1 KITCHEN SET', '3KS', '3 IN 1 KITCHEN SET', NULL, '299', '18', '39241090', 160, 1, 1, NULL, '3 IN 1 KITCHEN SET,3KS', NULL, 1, '2023-11-06 16:47:42', '2023-11-16 05:56:03', NULL, '0', '3_in_1_kitchen_set'),
(53, 'LITTLE MASTER', 'LIM', 'LITTLE MASTER', NULL, '199', '18', '39241090', 216, 0, 0, NULL, 'LITTLE MASTER,LIM', '', 1, '2023-11-06 16:51:25', '2023-11-09 12:42:27', NULL, '0', 'little_master'),
(54, 'TURBO CHOPPER', 'TC', 'TURBO CHOPPER', NULL, '399', '18', '39241090', 216, 1, 1, NULL, 'TURBO CHOPPER,TC', '', 1, '2023-11-06 16:59:06', '2023-11-09 12:42:28', NULL, '0', 'turbo_chopper'),
(55, 'EASY CHOPPER', 'EC', 'EASY CHOPPER', NULL, '499', '18', '39241090', 120, 1, 1, NULL, 'EASY CHOPPER,EC', '', 1, '2023-11-06 17:01:25', '2023-11-09 12:42:27', NULL, '0', 'easy_chopper'),
(56, 'MULTI CUTTER 2 IN 1 PEELER', 'MCP', 'MULTI CUTTER 2 IN 1 PEELER', NULL, '180', '18', '39241090', 360, 1, 1, NULL, 'MULTI CUTTER 2 IN 1 PEELER,MCP', '', 1, '2023-11-06 17:02:11', '2023-11-09 12:42:27', NULL, '0', 'multi_cutter_2_in_1_peeler'),
(57, 'FALUDA PLUS GLASS (6 PCS)', 'FPG', 'FALUDA PLUS GLASS (6 PCS)', NULL, '420', '18', '39241090', 72, 1, 1, NULL, 'FALUDA PLUS GLASS (6 PCS),FPG', '', 1, '2023-11-06 17:04:27', '2023-11-09 12:42:27', NULL, '0', 'faluda_plus_glass_(6_pcs)'),
(58, 'CASA GLASS', 'CG', 'CASA GLASS', NULL, '299', '18', '39241090', 108, 1, 1, NULL, 'CASA GLASS,CG', '', 1, '2023-11-06 17:06:32', '2023-11-09 12:42:27', NULL, '0', 'casa_glass'),
(59, 'CHEESE GRATER', 'CG', 'CHEESE GRATER', NULL, '60', '18', '39241090', 400, 1, 1, NULL, 'CHEESE GRATER,CG', '', 1, '2023-11-06 17:07:41', '2023-11-09 12:42:27', NULL, '0', 'cheese_grater'),
(60, 'HEALTHY JUICER', 'HJ', 'HEALTHY JUICER', NULL, '235', '18', '39241090', 48, 1, 1, NULL, 'HEALTHY JUICER', NULL, 1, '2023-11-06 17:09:30', '2023-11-07 15:06:48', NULL, '0', 'healthy_juicer'),
(61, 'LASER KNIFE  (420 S.S. MATERIAL)', 'LK', 'LASER KNIFE  (420 S.S. MATERIAL)', NULL, '55 Per Pcs', '18', '39241090', 160, 1, 1, NULL, 'LASER KNIFE  (420 S.S. MATERIAL),LK', '', 1, '2023-11-06 17:13:23', '2023-11-09 12:42:27', NULL, '0', 'laser_knife__(420_s.s._material)'),
(62, 'BIG FORK (10 PCS SET)', 'BF', 'BIG FORK (10 PCS SET)', NULL, '210', '18', '39241090', 240, 1, 0, NULL, 'BIG FORK (10 PCS SET),BF', '', 1, '2023-11-06 17:53:05', '2023-11-09 12:42:27', NULL, '0', 'big_fork_(10_pcs_set)'),
(63, 'H2O JUICE JUG', '', 'H2O JUICE JUG', NULL, '369', '18', '39241090', 90, 0, 0, NULL, 'H2O JUICE JUG,', '', 1, '2023-11-09 12:42:27', '2023-11-09 12:42:27', NULL, '0', 'h2o_juice_jug'),
(64, '2 IN PEELER WITH GRATER (BOX PACKING)', '2N1P', '2 IN PEELER WITH GRATER (BOX PACKING)', NULL, '60', '18', '39241090', 600, 0, 0, NULL, '2 IN PEELER WITH GRATER (BOX PACKING),2N1P', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:47:35', NULL, '0', '2_in_peeler_with_grater_(box_packing)'),
(65, '2 PCS SPICE STORAGE', '2PCS', '2 PCS SPICE STORAGE', NULL, '299', '18', '39241090', 200, 0, 0, NULL, '2 PCS SPICE STORAGE,2PCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:48:27', NULL, '0', '2_pcs_spice_storage'),
(66, '2 PCS STOREWELL', '2PSW', '2 PCS STOREWELL', NULL, '299', '18', '39241090', 144, 0, 0, NULL, '2 PCS STOREWELL,2PSW', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:48:50', NULL, '0', '2_pcs_storewell'),
(67, '3 IN 1 BIG CHOPPER', '3BC', '3 IN 1 BIG CHOPPER', NULL, '699', '18', '39241090', 120, 0, 0, NULL, '3 IN 1 BIG CHOPPER,3BC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:49:09', NULL, '0', '3_in_1_big_chopper'),
(68, '3 IN 1 PEELER', '3P', '3 IN 1 PEELER', NULL, '99', '18', '39241090', 720, 0, 0, NULL, '3 IN 1 PEELER,3P', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:49:28', NULL, '0', '3_in_1_peeler'),
(69, '3 PCS KNIFE SET', '3PK', '3 PCS KNIFE SET', NULL, '130', '18', '39241090', 320, 0, 0, NULL, '3 PCS KNIFE SET,3PK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:50:23', NULL, '0', '3_pcs_knife_set'),
(70, '3 PCS STOREWELL', '3PSW', '3 PCS STOREWELL', NULL, '399', '18', '39241090', 96, 0, 0, NULL, '3 PCS STOREWELL,3PSW', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:50:41', NULL, '0', '3_pcs_storewell'),
(71, '4 IN 1 KITCHEN SET', '4KS', '4 IN 1 KITCHEN SET', NULL, '349', '18', '39241090', 192, 0, 0, NULL, '4 IN 1 KITCHEN SET,4KS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:51:02', NULL, '0', '4_in_1_kitchen_set'),
(72, '4 IN 1 SLICER & GRATER', '4GS', '4 IN 1 SLICER & GRATER', NULL, '275', '18', '39241090', 270, 0, 0, NULL, '4 IN 1 SLICER & GRATER,4GS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:51:20', NULL, '0', '4_in_1_slicer_&_grater'),
(73, '4 PCS SPICE STORAGE', '4PCS', '4 PCS SPICE STORAGE', NULL, '425', '18', '39241090', 144, 0, 0, NULL, '4 PCS SPICE STORAGE,4PCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:54:27', NULL, '0', '4_pcs_spice_storage'),
(74, '4X PICKLE WITH SALT PEPPER', '4X', '4X PICKLE WITH SALT PEPPER', NULL, '499', '18', '39241090', 72, 0, 0, NULL, '4X PICKLE WITH SALT PEPPER,4X', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:54:38', NULL, '0', '4x_pickle_with_salt_pepper'),
(75, '5 IN 1 SLICER & GRATER', '5SG', '5 IN 1 SLICER & GRATER', NULL, '399', '18', '39241090', 270, 0, 0, NULL, '5 IN 1 SLICER & GRATER,5SG', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:54:53', NULL, '0', '5_in_1_slicer_&_grater'),
(76, '6 PCS SPICE STORAGE', '6PCS', '6 PCS SPICE STORAGE', NULL, '825', '18', '39241090', 64, 0, 0, NULL, '6 PCS SPICE STORAGE,6PCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:55:19', NULL, '0', '6_pcs_spice_storage'),
(77, '9 IN 1 SLICER', '9S', '9 IN 1 SLICER', NULL, '499', '18', '39241090', 120, 0, 0, NULL, '9 IN 1 SLICER,9S', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:56:34', NULL, '0', '9_in_1_slicer'),
(78, 'ADARAK PEELER & GRATER (BOX PACKING)', 'APG', 'ADARAK PEELER & GRATER (BOX PACKING)', NULL, '50', '18', '39241090', 540, 0, 0, NULL, 'ADARAK PEELER & GRATER (BOX PACKING),APG', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:57:03', NULL, '0', 'adarak_peeler_&_grater_(box_packing)'),
(79, 'ADJUSTABLE SLICER', 'AS', 'ADJUSTABLE SLICER', NULL, '240', '18', '39241090', 120, 0, 0, NULL, 'ADJUSTABLE SLICER,AS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:57:18', NULL, '0', 'adjustable_slicer'),
(80, 'ALUMINIUM LEMON SQUEEZER', 'ALS', 'ALUMINIUM LEMON SQUEEZER', NULL, '250', '18', '39241090', 288, 0, 0, NULL, 'ALUMINIUM LEMON SQUEEZER,ALS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:57:47', NULL, '0', 'aluminium_lemon_squeezer'),
(81, 'APPLE CUTTER PRO', 'ACP', 'APPLE CUTTER PRO', NULL, '210', '18', '39241090', 192, 0, 0, NULL, 'APPLE CUTTER PRO,ACP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:57:50', NULL, '0', 'apple_cutter_pro'),
(82, 'AQUA STEEL BOTTLE (APP.500ML)', 'AFT500', 'AQUA STEEL BOTTLE (APP.500ML)', NULL, '499', '18', '39241090', 144, 0, 0, NULL, 'AQUA STEEL BOTTLE (APP.500ML),AFT500', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:57:58', NULL, '0', 'aqua_steel_bottle_(app.500ml)'),
(83, 'BHAJI MASHER', 'BM', 'BHAJI MASHER', NULL, '225', '18', '39241090', 288, 0, 0, NULL, 'BHAJI MASHER,BM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:58:19', NULL, '0', 'bhaji_masher'),
(84, 'BIG BOSS CHOPPER', 'BBC', 'BIG BOSS CHOPPER', NULL, '325', '18', '39241090', 108, 0, 0, NULL, 'BIG BOSS CHOPPER,BBC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 12:59:48', NULL, '0', 'big_boss_chopper'),
(85, 'BIG PEELER (PLASTIC)', 'BPP', 'BIG PEELER (PLASTIC)', NULL, '85', '18', '39241090', 720, 0, 0, NULL, 'BIG PEELER (PLASTIC),BPP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:00:34', NULL, '0', 'big_peeler_(plastic)'),
(86, 'BOOSTER GYM SHAKER BOTTLE', 'BOOSTER GYM SHAKER BOTTLE', 'BOOSTER GYM SHAKER BOTTLE', NULL, '300', '18', '39241090', 144, 0, 0, NULL, 'BOOSTER GYM SHAKER BOTTLE', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:01:36', NULL, '0', 'booster_gym_shaker_bottle'),
(87, 'BREAK TIME MUG (1 PCS)', 'BTM', 'BREAK TIME MUG (1 PCS)', NULL, '275', '18', '39241090', 288, 0, 0, NULL, 'BREAK TIME MUG (1 PCS),BTM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:00:49', NULL, '0', 'break_time_mug_(1_pcs)'),
(88, 'CARROT GRATER (BIG)', 'CGB', 'CARROT GRATER (BIG)', NULL, '225', '18', '39241090', 504, 0, 0, NULL, 'CARROT GRATER (BIG),CGB', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:01:57', NULL, '0', 'carrot_grater_(big)'),
(89, 'CARROT GRATER (MEDIUM)', 'CGM', 'CARROT GRATER (MEDIUM)', NULL, '199', '18', '39241090', 504, 0, 0, NULL, 'CARROT GRATER (MEDIUM),CGM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:02:17', NULL, '0', 'carrot_grater_(medium)'),
(90, 'CARTOON MUG (1 PCS)', 'CAM', 'CARTOON MUG (1 PCS)', NULL, '349', '18', '39241090', 200, 0, 0, NULL, 'CARTOON MUG (1 PCS),CAM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:02:29', NULL, '0', 'cartoon_mug_(1_pcs)'),
(91, 'CARVING KNIFE', 'CAK', 'CARVING KNIFE', NULL, '199', '18', '39241090', 200, 0, 0, NULL, 'CARVING KNIFE,CAK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:02:41', NULL, '0', 'carving_knife'),
(92, 'CHAI STEEL CUP (6 PCS SET)', 'CSC', 'CHAI STEEL CUP (6 PCS SET)', NULL, '650', '18', '39241090', 80, 0, 0, NULL, 'CHAI STEEL CUP (6 PCS SET),CSC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:03:10', NULL, '0', 'chai_steel_cup_(6_pcs_set)'),
(93, 'CHEF KNIFE', 'CHK', 'CHEF KNIFE', NULL, '150', '18', '39241090', 180, 0, 0, NULL, 'CHEF KNIFE,CHK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:03:22', NULL, '0', 'chef_knife'),
(94, 'CHEF TONG', 'CT', 'CHEF TONG', NULL, '249', '18', '39241090', 384, 0, 0, NULL, 'CHEF TONG,CT', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:03:37', NULL, '0', 'chef_tong'),
(95, 'COCO MUG (2 PCS SET)', 'COM', 'COCO MUG (2 PCS SET)', NULL, '399', '18', '39241090', 144, 0, 0, NULL, 'COCO MUG (2 PCS SET),COM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:03:47', NULL, '0', 'coco_mug_(2_pcs_set)'),
(96, 'COCONUT OPENER', 'COOP', 'COCONUT OPENER', NULL, '150', '18', '39241090', 360, 0, 0, NULL, 'COCONUT OPENER,COOP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:04:01', NULL, '0', 'coconut_opener'),
(97, 'COCONUT SCRAPER', 'COCO', 'COCONUT SCRAPER', NULL, '599', '18', '39241090', 144, 0, 0, NULL, 'COCONUT SCRAPER,COCO', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:04:16', NULL, '0', 'coconut_scraper'),
(98, 'COFFEE MUG (6 PCS SET)', 'CM', 'COFFEE MUG (6 PCS SET)', NULL, '650', '18', '39241090', 80, 0, 0, NULL, 'COFFEE MUG (6 PCS SET),CM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:05:14', NULL, '0', 'coffee_mug_(6_pcs_set)'),
(99, 'COMFORT 5 IN 1 SLICER & GRATER', 'C5SG', 'COMFORT 5 IN 1 SLICER & GRATER', NULL, '399', '18', '39241090', 180, 0, 0, NULL, 'COMFORT 5 IN 1 SLICER & GRATER,C5SG', '', 1, '2023-11-09 12:42:27', '2023-11-09 12:42:27', NULL, '0', 'comfort_5_in_1_slicer_&_grater'),
(100, 'CRYSTA PELLER (5 PCS)', 'CP5', 'CRYSTA PELLER (5 PCS)', NULL, '50 PER PCS', '18', '39241090', 252, 0, 0, NULL, 'CRYSTA PELLER (5 PCS),CP5', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:08:58', NULL, '0', 'crysta_peller_(5_pcs)'),
(101, 'CRYSTAL SALT N PEPPER', 'CSNP', 'CRYSTAL SALT N PEPPER', NULL, '345', '18', '39241090', 252, 0, 0, NULL, 'CRYSTAL SALT N PEPPER,CSNP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:09:09', NULL, '0', 'crystal_salt_n_pepper');
INSERT INTO `products` (`id`, `name`, `short_name`, `description`, `image`, `price`, `gst_rate`, `hsn_code`, `carton_capacity`, `is_best_seller`, `is_new_product`, `selling_price`, `tags`, `long_description`, `status`, `created_at`, `updated_at`, `deleted_at`, `sort_order`, `slug`) VALUES
(102, 'CURVE GARLIC PRESS', 'CGP', 'CURVE GARLIC PRESS', NULL, '199', '18', '39241090', 315, 0, 0, NULL, 'CURVE GARLIC PRESS,CGP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:05:01', NULL, '0', 'curve_garlic_press'),
(103, 'CUT KNIFE', 'CUK', 'CUT KNIFE', NULL, '149', '18', '39241090', 400, 0, 0, NULL, 'CUT KNIFE,CUK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:10:39', NULL, '0', 'cut_knife'),
(104, 'DESSERT FORK (6 PCS SET)', 'DK', 'DESSERT FORK (6 PCS SET)', NULL, '210', '18', '39241090', 200, 0, 0, NULL, 'DESSERT FORK (6 PCS SET),DK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:11:16', NULL, '0', 'dessert_fork_(6_pcs_set)'),
(105, 'DESSERT SPOON (6 PCS SET)', 'DP', 'DESSERT SPOON (6 PCS SET)', NULL, '280', '18', '39241090', 200, 0, 0, NULL, 'DESSERT SPOON (6 PCS SET),DP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:11:40', NULL, '0', 'dessert_spoon_(6_pcs_set)'),
(106, 'DIAMOND BABY SPOON (6 PCS SET)', 'BS', 'DIAMOND BABY SPOON (6 PCS SET)', NULL, '230', '18', '39241090', 200, 0, 0, NULL, 'DIAMOND BABY SPOON (6 PCS SET),BS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:41:13', NULL, '0', 'diamond_baby_spoon_(6_pcs_set)'),
(107, 'DIAMOND CUTLERY SET', 'DCS', 'DIAMOND CUTLERY SET', NULL, '1950', '18', '39241090', 48, 0, 0, NULL, 'DIAMOND CUTLERY SET,DCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:11:48', NULL, '0', 'diamond_cutlery_set'),
(108, 'DIAMOND TEA SPOON (6 PCS SET)', 'TS', 'DIAMOND TEA SPOON (6 PCS SET)', NULL, '170', '18', '39241090', 200, 0, 0, NULL, 'DIAMOND TEA SPOON (6 PCS SET),TS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:12:27', NULL, '0', 'diamond_tea_spoon_(6_pcs_set)'),
(109, 'EASY PLUS SLICER', 'EPS', 'EASY PLUS SLICER', NULL, '199', '18', '39241090', 270, 0, 0, NULL, 'EASY PLUS SLICER,EPS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:41:35', NULL, '0', 'easy_plus_slicer'),
(110, 'EURO MESH STAINER (BIG)', 'EMSB', 'EURO MESH STAINER (BIG)', NULL, '149', '18', '39241090', 384, 0, 0, NULL, 'EURO MESH STAINER (BIG),EMSB', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:41:49', NULL, '0', 'euro_mesh_stainer_(big)'),
(111, 'EURO MESH STAINER (MEDIUM)', 'EMSM', 'EURO MESH STAINER (MEDIUM)', NULL, '149', '18', '39241090', 384, 0, 0, NULL, 'EURO MESH STAINER (MEDIUM),EMSM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:42:00', NULL, '0', 'euro_mesh_stainer_(medium)'),
(112, 'EURO MESH STAINER (SMALL)', 'EMSS', 'EURO MESH STAINER (SMALL)', NULL, '130', '18', '39241090', 384, 0, 0, NULL, 'EURO MESH STAINER (SMALL),EMSS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:42:15', NULL, '0', 'euro_mesh_stainer_(small)'),
(113, 'FANCY CUTLERY SET', 'FCS', 'FANCY CUTLERY SET', NULL, '2400', '18', '39241090', 48, 0, 0, NULL, 'FANCY CUTLERY SET,FCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:42:59', NULL, '0', 'fancy_cutlery_set'),
(114, 'FOLDING HOTMAT (2 PCS SET)', 'FH', 'FOLDING HOTMAT (2 PCS SET)', NULL, '120', '18', '39241090', 288, 0, 0, NULL, 'FOLDING HOTMAT (2 PCS SET),FH', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:43:12', NULL, '0', 'folding_hotmat_(2_pcs_set)'),
(115, 'FRUIT KNIFE', 'FK', 'FRUIT KNIFE', NULL, '125', '18', '39241090', 400, 0, 0, NULL, 'FRUIT KNIFE,FK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:43:24', NULL, '0', 'fruit_knife'),
(116, 'FULL ROUND PINCER', 'PFL', 'FULL ROUND PINCER', NULL, '225', '18', '39241090', 150, 0, 0, NULL, 'FULL ROUND PINCER,PFL', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:43:37', NULL, '0', 'full_round_pincer'),
(117, 'GERMNA CHOPPER', 'GEC', 'GERMNA CHOPPER', NULL, '699', '18', '39241090', 120, 0, 0, NULL, 'GERMNA CHOPPER,GEC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:43:50', NULL, '0', 'germna_chopper'),
(118, 'GIANT CHOPPER', 'GPCH', 'GIANT CHOPPER', NULL, '699', '18', '39241090', 96, 0, 0, NULL, 'GIANT CHOPPER,GPCH', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:44:03', NULL, '0', 'giant_chopper'),
(119, 'GRIPO PIZZA CUTTER', 'GPCU', 'GRIPO PIZZA CUTTER', NULL, '175', '18', '39241090', 600, 0, 0, NULL, 'GRIPO PIZZA CUTTER,GPCU', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:44:23', NULL, '0', 'gripo_pizza_cutter'),
(120, 'HALF ROUND PINCER', 'PHL', 'HALF ROUND PINCER', NULL, '220', '18', '39241090', 150, 0, 0, NULL, 'HALF ROUND PINCER,PHL', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:44:48', NULL, '0', 'half_round_pincer'),
(121, 'HAND PRESS SQUEZZER', 'HPSQ', 'HAND PRESS SQUEZZER', NULL, '1599', '18', '39241090', 10, 0, 0, NULL, 'HAND PRESS SQUEZZER,HPSQ', NULL, 1, '2023-11-09 12:42:27', '2023-11-10 04:54:27', NULL, '0', 'hand_press_squezzer'),
(122, 'HANDY CHURNER (POUCH PACKING)', 'HCP', 'HANDY CHURNER (POUCH PACKING)', NULL, '149', '18', '39241090', 360, 0, 0, NULL, 'HANDY CHURNER (POUCH PACKING),HCP', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:45:10', NULL, '0', 'handy_churner_(pouch_packing)'),
(123, 'HOTMATE (3 PCS SET)', 'HM', 'HOTMATE (3 PCS SET)', NULL, '220', '18', '39241090', 288, 0, 0, NULL, 'HOTMATE (3 PCS SET),HM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:46:22', NULL, '0', 'hotmate_(3_pcs_set)'),
(124, 'JET CHOPPER', 'JC', 'JET CHOPPER', NULL, '699', '18', '39241090', 120, 0, 0, NULL, 'JET CHOPPER,JC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:46:35', NULL, '0', 'jet_chopper'),
(125, 'JUICER WITH CORN CUTTER', 'JCC', 'JUICER WITH CORN CUTTER', NULL, '475', '18', '39241090', 96, 0, 0, NULL, 'JUICER WITH CORN CUTTER,JCC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:46:47', NULL, '0', 'juicer_with_corn_cutter'),
(126, 'KIDS SIPPER MUG', 'KDM', 'KIDS SIPPER MUG', NULL, '270', '18', '39241090', 240, 0, 0, NULL, 'KIDS SIPPER MUG,KDM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:47:04', NULL, '0', 'kids_sipper_mug'),
(127, 'KITCHEN KNIFE', 'KIK', 'KITCHEN KNIFE', NULL, '149', '18', '39241090', 200, 0, 0, NULL, 'KITCHEN KNIFE,KIK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:47:18', NULL, '0', 'kitchen_knife'),
(128, 'KITCHEN PLATFORM & GLASS WIPER', 'KW', 'KITCHEN PLATFORM & GLASS WIPER', NULL, '149', '18', '39241090', 360, 0, 0, NULL, 'KITCHEN PLATFORM & GLASS WIPER,KW', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:47:31', NULL, '0', 'kitchen_platform_&_glass_wiper'),
(129, 'LEMON KNIFE (10 PCS SET)', 'LEK', 'LEMON KNIFE (10 PCS SET)', NULL, '50 PER PCS.', '18', '39241090', 160, 0, 0, NULL, 'LEMON KNIFE (10 PCS SET),LEK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:47:56', NULL, '0', 'lemon_knife_(10_pcs_set)'),
(130, 'LITTLER JUICER', 'LIJ', 'LITTLER JUICER', NULL, '180', '18', '39241090', 216, 0, 0, NULL, 'LITTLER JUICER,LIJ', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:05', NULL, '0', 'littler_juicer'),
(131, 'LOCK IT JUICER', 'LIJ', 'LOCK IT JUICER', NULL, '175', '18', '39241090', 192, 0, 0, NULL, 'LOCK IT JUICER,LIJ', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:15', NULL, '0', 'lock_it_juicer'),
(132, 'MAGIC PEELER', 'MPE', 'MAGIC PEELER', NULL, '70', '18', '39241090', 540, 0, 0, NULL, 'MAGIC PEELER,MPE', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:25', NULL, '0', 'magic_peeler'),
(133, 'MASTER SLICER', 'MAS', 'MASTER SLICER', NULL, '249', '18', '39241090', 288, 0, 0, NULL, 'MASTER SLICER,MAS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:39', NULL, '0', 'master_slicer'),
(134, 'MATT GLASS', 'MG', 'MATT GLASS', NULL, '375', '18', '39241090', 108, 0, 0, NULL, 'MATT GLASS,MG', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:46', NULL, '0', 'matt_glass'),
(135, 'MEETING TIME CUP SET', 'MTCS', 'MEETING TIME CUP SET', NULL, '499', '18', '39241090', 144, 0, 0, NULL, 'MEETING TIME CUP SET,MTCS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:48:57', NULL, '0', 'meeting_time_cup_set'),
(136, 'MEGA  CHOPPER', 'MPCH', 'MEGA  CHOPPER', NULL, '499', '18', '39241090', 96, 0, 0, NULL, 'MEGA CHOPPER,MPCH', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:50:03', NULL, '0', 'mega__chopper'),
(137, 'MILK MUG (2 PCS SET)', 'MM', 'MILK MUG (2 PCS SET)', NULL, '325', '18', '39241090', 192, 0, 0, NULL, 'MILK MUG (2 PCS SET),MM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:50:14', NULL, '0', 'milk_mug_(2_pcs_set)'),
(138, 'MODERN MUG (2 PCS SET)', 'MOM', 'MODERN MUG (2 PCS SET)', NULL, '599', '18', '39241090', 144, 0, 0, NULL, 'MODERN MUG (2 PCS SET),MOM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:50:29', NULL, '0', 'modern_mug_(2_pcs_set)'),
(139, 'MOJITO GLASS', 'MOG', 'MOJITO GLASS', NULL, '360', '18', '39241090', 96, 0, 0, NULL, 'MOJITO GLASS,MOG', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 13:50:44', NULL, '0', 'mojito_glass'),
(140, 'MOM\'S GAS LIGHTER', 'MOGL', 'MOM\'S GAS LIGHTER', NULL, '199', '18', '39241090', 360, 0, 0, NULL, 'MOM\'S GAS LIGHTER,MOGL', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:00:57', NULL, '0', 'mom\'s_gas_lighter'),
(141, 'MORNING MUG (6PCS SET)', '6MM', 'MORNING MUG (6PCS SET)', NULL, '650', '18', '39241090', 80, 0, 0, NULL, 'MORNING MUG (6PCS SET),6MM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:01:10', NULL, '0', 'morning_mug_(6pcs_set)'),
(142, 'MOSCO CUP (1 PCS)', 'MOC', 'MOSCO CUP (1 PCS)', NULL, '199', '18', '39241090', 216, 0, 0, NULL, 'MOSCO CUP (1 PCS),MOC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:01:22', NULL, '0', 'mosco_cup_(1_pcs)'),
(143, 'MULTI UTENSIL 4 IN 1', 'MUU', 'MULTI UTENSIL 4 IN 1', NULL, '249', '18', '39241090', 360, 0, 0, NULL, 'MULTI UTENSIL 4 IN 1,MUU', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:01:56', NULL, '0', 'multi_utensil_4_in_1'),
(144, 'MULTIPLE SLICER', 'MPS', 'MULTIPLE SLICER', NULL, '349', '18', '39241090', 192, 0, 0, NULL, 'MULTIPLE SLICER,MPS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:01:46', NULL, '0', 'multiple_slicer'),
(145, 'NYLON SERVING SET (5 PCS SET)', 'NSS', 'NYLON SERVING SET (5 PCS SET)', NULL, '699', '18', '39241090', 96, 0, 0, NULL, 'NYLON SERVING SET (5 PCS SET),NSS', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:02:08', NULL, '0', 'nylon_serving_set_(5_pcs_set)'),
(146, 'OFFICE TIME MUG ( 1 PCS)', 'OTM', 'OFFICE TIME MUG ( 1 PCS)', NULL, '299', '18', '39241090', 288, 0, 0, NULL, 'OFFICE TIME MUG ( 1 PCS),OTM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:02:19', NULL, '0', 'office_time_mug_(_1_pcs)'),
(147, 'P.C. GLASS', 'PG', 'P.C. GLASS', NULL, '350', '18', '39241090', 108, 0, 0, NULL, 'P.C. GLASS,PG', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:02:31', NULL, '0', 'p.c._glass'),
(148, 'PAIRING KNIFE', 'PK', 'PAIRING KNIFE', NULL, '150', '18', '39241090', 400, 0, 0, NULL, 'PAIRING KNIFE,PK', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:02:44', NULL, '0', 'pairing_knife'),
(149, 'PANDA SHIP MUG', 'PSM', 'PANDA SHIP MUG', NULL, '399', '18', '39241090', 180, 0, 0, NULL, 'PANDA SHIP MUG,PSM', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:02:55', NULL, '0', 'panda_ship_mug'),
(150, 'PEN HOLDER', 'PH', 'PEN HOLDER', NULL, '150', '18', '39241090', 288, 0, 0, NULL, 'PEN HOLDER,PH', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:03:07', NULL, '0', 'pen_holder'),
(151, 'PIZZA CUTTER (BOX PACKING)', 'PCB', 'PIZZA CUTTER (BOX PACKING)', NULL, '149', '18', '39241090', 600, 0, 0, NULL, 'PIZZA CUTTER (BOX PACKING),PCB', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:03:19', NULL, '0', 'pizza_cutter_(box_packing)'),
(152, 'PRIME CUT N CHIPS (2 BLADE)', 'PCNC', 'PRIME CUT N CHIPS (2 BLADE)', NULL, '799', '18', '39241090', 72, 0, 0, NULL, 'PRIME CUT N CHIPS (2 BLADE),PCNC', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:03:40', NULL, '0', 'prime_cut_n_chips_(2_blade)'),
(153, 'PRO DOUBLE WALL STEEL CUP', 'PDW', 'PRO DOUBLE WALL STEEL CUP', NULL, '249', '18', '39241090', 216, 0, 0, NULL, 'PRO DOUBLE WALL STEEL CUP,PDW', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:03:52', NULL, '0', 'pro_double_wall_steel_cup'),
(154, 'PUSH N CHOP CHOPPER', 'PNCH', 'PUSH N CHOP CHOPPER', NULL, '699', '18', '39241090', 96, 0, 0, NULL, 'PUSH N CHOP CHOPPER,PNCH', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:04:05', NULL, '0', 'push_n_chop_chopper'),
(155, 'QUICK 6 IN 1 SLICER', 'Q6', 'QUICK 6 IN 1 SLICER', NULL, '420', '18', '39241090', 180, 0, 0, NULL, 'QUICK 6 IN 1 SLICER,Q6', NULL, 1, '2023-11-09 12:42:27', '2023-11-09 14:04:15', NULL, '0', 'quick_6_in_1_slicer'),
(156, 'REGULAR WIPER 12\'\'', 'REG12\'\'', 'REGULAR WIPER 12\'\'', NULL, '325', '18', '39241090', 135, 0, 0, NULL, 'REGULAR WIPER 12\'\',REG12\'\'', '', 1, '2023-11-09 12:42:27', '2023-11-09 12:42:27', NULL, '0', 'regular_wiper_12\'\''),
(157, 'RING PEELER', 'RPE', 'RING PEELER', NULL, '85', '18', '39241090', 720, 0, 0, NULL, 'RING PEELER,RPE', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:04:49', NULL, '0', 'ring_peeler'),
(158, 'S.S COMPACT SLICER & GRATER 4 IN 1', '7SG', 'S.S COMPACT SLICER & GRATER 4 IN 1', NULL, '175', '18', '39241090', 300, 0, 0, NULL, 'S.S COMPACT SLICER & GRATER 4 IN 1,7SG', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:10:06', NULL, '0', 's.s_compact_slicer_&_grater_4_in_1'),
(159, 'S.S. 7 IN 1 STEEL SLICER & GRATER', '7SG', 'S.S. 7 IN 1 STEEL SLICER & GRATER', NULL, '350', '18', '39241090', 180, 0, 0, NULL, 'S.S. 7 IN 1 STEEL SLICER & GRATER,7SG', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:05:01', NULL, '0', 's.s._7_in_1_steel_slicer_&_grater'),
(160, 'S.S. BIG PELLER (STEEL)', 'SSBP', 'S.S. BIG PELLER (STEEL)', NULL, '85', '18', '39241090', 720, 0, 0, NULL, 'S.S. BIG PELLER (STEEL),SSBP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:05:11', NULL, '0', 's.s._big_peller_(steel)'),
(161, 'S.S. CUTLERY SET', 'SSC', 'S.S. CUTLERY SET', NULL, '2400', '18', '39241090', 32, 0, 0, NULL, 'S.S. CUTLERY SET,SSC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:07:36', NULL, '0', 's.s._cutlery_set'),
(162, 'S.S. GARLIC PRESS', 'SGP', 'S.S. GARLIC PRESS', NULL, '180', '18', '39241090', 192, 0, 0, NULL, 'S.S. GARLIC PRESS,SGP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:07:47', NULL, '0', 's.s._garlic_press'),
(163, 'S.S. MEASURING SPOON (4PCS SET)', 'SSMS', 'S.S. MEASURING SPOON (4PCS SET)', NULL, '225', '18', '39241090', 300, 0, 0, NULL, 'S.S. MEASURING SPOON (4PCS SET),SSMS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:08:09', NULL, '0', 's.s._measuring_spoon_(4pcs_set)'),
(164, 'S.S. MESH STRAINER', 'SSM', 'S.S. MESH STRAINER', NULL, '210', '18', '39241090', 600, 0, 0, NULL, 'S.S. MESH STRAINER,SSM', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:08:20', NULL, '0', 's.s._mesh_strainer'),
(165, 'S.S. ROUND MASHER', 'SRM', 'S.S. ROUND MASHER', NULL, '149', '18', '39241090', 256, 0, 0, NULL, 'S.S. ROUND MASHER,SRM', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:08:29', NULL, '0', 's.s._round_masher'),
(166, 'S.S. SALT N PEEPER', 'SSNP', 'S.S. SALT N PEEPER', NULL, '249', '18', '39241090', 336, 0, 0, NULL, 'S.S. SALT N PEEPER,SSNP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:09:36', NULL, '0', 's.s._salt_n_peeper'),
(167, 'S.S.MASHER', 'SPM', 'S.S.MASHER', NULL, '299', '18', '39241090', 360, 0, 0, NULL, 'S.S.MASHER,SPM', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:07:58', NULL, '0', 's.s.masher'),
(168, 'S.S.SINK STRAINER', 'SSS', 'S.S.SINK STRAINER', NULL, '149', '18', '39241090', 480, 0, 0, NULL, 'S.S.SINK STRAINER,SSS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:09:45', NULL, '0', 's.s.sink_strainer'),
(169, 'S.S.TONGS', 'ST', 'S.S.TONGS', NULL, '199', '18', '39241090', 384, 0, 0, NULL, 'S.S.TONGS,ST', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:09:56', NULL, '0', 's.s.tongs'),
(170, 'SERVING GLASS', 'SEG', 'SERVING GLASS', NULL, '239', '18', '39241090', 144, 0, 0, NULL, 'SERVING GLASS,SEG', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:10:18', NULL, '0', 'serving_glass'),
(171, 'SERVING TRAY', 'ST', 'SERVING TRAY', NULL, '299', '18', '39241090', 80, 0, 0, NULL, 'SERVING TRAY,ST', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:10:41', NULL, '0', 'serving_tray'),
(172, 'SHARP EDGE KNIFE (420 S.S. MATERIAL)', 'SEK', 'SHARP EDGE KNIFE (420 S.S. MATERIAL)', NULL, '50 Per pcs', '18', '39241090', 160, 0, 0, NULL, 'SHARP EDGE KNIFE (420 S.S. MATERIAL),SEK', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:10:51', NULL, '0', 'sharp_edge_knife_(420_s.s._material)'),
(173, 'SLIM STRAINER', 'SMS', 'SLIM STRAINER', NULL, '99', '18', '39241090', 720, 0, 0, NULL, 'SLIM STRAINER,SMS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:11:17', NULL, '0', 'slim_strainer'),
(174, 'SMART GADGET', 'SG', 'SMART GADGET', NULL, '359', '18', '39241090', 288, 0, 0, NULL, 'SMART GADGET,SG', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:11:27', NULL, '0', 'smart_gadget'),
(175, 'SPIN CHOPPER', 'SC', 'SPIN CHOPPER', NULL, '499', '18', '39241090', 144, 0, 0, NULL, 'SPIN CHOPPER,SC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:11:51', NULL, '0', 'spin_chopper'),
(176, 'STAYLISH PLATFORM WIPER', 'STPW', 'STAYLISH PLATFORM WIPER', NULL, '199', '18', '39241090', 288, 0, 0, NULL, 'STAYLISH PLATFORM WIPER,STPW', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:12:01', NULL, '0', 'staylish_platform_wiper'),
(177, 'STEEL FLIP TOP BOTTLE (APP.1000ML)', 'SFT1000', 'STEEL FLIP TOP BOTTLE (APP.1000ML)', NULL, '599', '18', '39241090', 100, 0, 0, NULL, 'STEEL FLIP TOP BOTTLE (APP.1000ML),SFT1000', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:12:20', NULL, '0', 'steel_flip_top_bottle_(app.1000ml)'),
(178, 'STEEL FLIP TOP BOTTLE (APP.750ML)', 'SFT750', 'STEEL FLIP TOP BOTTLE (APP.750ML)', NULL, '569', '18', '39241090', 180, 0, 0, NULL, 'STEEL FLIP TOP BOTTLE (APP.750ML),SFT750', '', 1, '2023-11-09 12:42:28', '2023-11-09 12:42:28', NULL, '0', 'steel_flip_top_bottle_(app.750ml)'),
(179, 'STEEL WHISK', 'STW', 'STEEL WHISK', NULL, '99', '18', '39241090', 352, 0, 0, NULL, 'STEEL WHISK,STW', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:12:30', NULL, '0', 'steel_whisk'),
(180, 'STELO DESERT FORK (6 PCS SET)', 'SDF', 'STELO DESERT FORK (6 PCS SET)', NULL, '230', '18', '39241090', 120, 0, 0, NULL, 'STELO DESERT FORK (6 PCS SET),SDF', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:12:42', NULL, '0', 'stelo_desert_fork_(6_pcs_set)'),
(181, 'STELO DESERT SPOON (6 PCS SET)', 'SDS', 'STELO DESERT SPOON (6 PCS SET)', NULL, '320', '18', '39241090', 120, 0, 0, NULL, 'STELO DESERT SPOON (6 PCS SET),SDS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:12:55', NULL, '0', 'stelo_desert_spoon_(6_pcs_set)'),
(182, 'STELO SOUP SPOON (6 PCS SET)', 'SSSP', 'STELO SOUP SPOON (6 PCS SET)', NULL, '280', '18', '39241090', 120, 0, 0, NULL, 'STELO SOUP SPOON (6 PCS SET),SSSP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:13:07', NULL, '0', 'stelo_soup_spoon_(6_pcs_set)'),
(183, 'STELO TEA SPOON (6 PCS SET)', 'STS', 'STELO TEA SPOON (6 PCS SET)', NULL, '210', '18', '39241090', 120, 0, 0, NULL, 'STELO TEA SPOON (6 PCS SET),STS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:13:17', NULL, '0', 'stelo_tea_spoon_(6_pcs_set)'),
(184, 'STICK HOTMATE (3 PCS SET)', 'SH', 'STICK HOTMATE (3 PCS SET)', NULL, '210', '18', '39241090', 360, 0, 0, NULL, 'STICK HOTMATE (3 PCS SET),SH', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:13:39', NULL, '0', 'stick_hotmate_(3_pcs_set)'),
(185, 'SUPREME ADJUSTABLE SLICER', 'SAS', 'SUPREME ADJUSTABLE SLICER', NULL, '455', '18', '39241090', 120, 0, 0, NULL, 'SUPREME ADJUSTABLE SLICER,SAS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:14:10', NULL, '0', 'supreme_adjustable_slicer'),
(186, 'SURGICAL PARING KNIFE', 'SPN', 'SURGICAL PARING KNIFE', NULL, '149', '18', '39241090', 400, 0, 0, NULL, 'SURGICAL PARING KNIFE,SPN', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:14:22', NULL, '0', 'surgical_paring_knife'),
(187, 'TOMATO KNIFE', 'PK', 'TOMATO KNIFE', NULL, '150', '18', '39241090', 400, 0, 0, NULL, 'TOMATO KNIFE,PK', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:16:15', NULL, '0', 'tomato_knife'),
(188, 'VEGETABLE KNIFE', 'VK', 'VEGETABLE KNIFE', NULL, '150', '18', '39241090', 400, 0, 0, NULL, 'VEGETABLE KNIFE,VK', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:19:01', NULL, '0', 'vegetable_knife'),
(189, 'SWISS SLICER AND PEELER', 'SSAP', 'SWISS SLICER AND PEELER', NULL, '110', '18', '39241090', 540, 0, 0, NULL, 'SWISS SLICER AND PEELER,SSAP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:14:56', NULL, '0', 'swiss_slicer_and_peeler'),
(190, 'TABLE DESSERT SPOON (6 PCS SET)', 'TDS', 'TABLE DESSERT SPOON (6 PCS SET)', NULL, '359', '18', '39241090', 200, 0, 0, NULL, 'TABLE DESSERT SPOON (6 PCS SET),TDS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:15:19', NULL, '0', 'table_dessert_spoon_(6_pcs_set)'),
(191, 'TELESCOPIC 12\'\'WIPER', 'TEL12\'\'', 'TELESCOPIC 12\'\'WIPER', NULL, '360', '18', '39241090', 135, 0, 0, NULL, 'TELESCOPIC 12\'\'WIPER,TEL12\'\'', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:15:32', NULL, '0', 'telescopic_12\'\'wiper'),
(192, 'TELESCOPIC 16\'\'WIPER', 'TEL16\'\'', 'TELESCOPIC 16\'\'WIPER', NULL, '435', '18', '39241090', 135, 0, 0, NULL, 'TELESCOPIC 16\'\'WIPER,TEL16\'\'', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:16:10', NULL, '0', 'telescopic_16\'\'wiper'),
(193, 'THE MORNING CUP (1 PCS)', 'TMC', 'THE MORNING CUP (1 PCS)', NULL, '180', '18', '39241090', 324, 0, 0, NULL, 'THE MORNING CUP (1 PCS),TMC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:16:11', NULL, '0', 'the_morning_cup_(1_pcs)'),
(194, 'TWIN CUTTER WITH PEELER', 'TC', 'TWIN CUTTER WITH PEELER', NULL, '170', '18', '39241090', 360, 0, 0, NULL, 'TWIN CUTTER WITH PEELER,TC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:16:28', NULL, '0', 'twin_cutter_with_peeler'),
(195, 'TWINS MUG (2 PCS SET)', 'TMWL', 'TWINS MUG (2 PCS SET)', NULL, '399', '18', '39241090', 144, 0, 0, NULL, 'TWINS MUG (2 PCS SET),TMWL', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:18:19', NULL, '0', 'twins_mug_(2_pcs_set)'),
(196, 'ULTRA MESH STRAINER (BIG)', 'ULB', 'ULTRA MESH STRAINER (BIG)', NULL, '275', '18', '39241090', 600, 0, 0, NULL, 'ULTRA MESH STRAINER (BIG),ULB', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:17:16', NULL, '0', 'ultra_mesh_strainer_(big)'),
(197, 'ULTRA MESH STRAINER (MEDIUM)', 'ULM', 'ULTRA MESH STRAINER (MEDIUM)', NULL, '149', '18', '39241090', 600, 0, 0, NULL, 'ULTRA MESH STRAINER (MEDIUM),ULM', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:17:45', NULL, '0', 'ultra_mesh_strainer_(medium)'),
(198, 'ULTRA MESH STRAINER (SMALL)', 'ROM', 'ULTRA MESH STRAINER (SMALL)', NULL, '210', '18', '39241090', 256, 0, 0, NULL, 'ULTRA MESH STRAINER (SMALL),ROM', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:17:47', NULL, '0', 'ultra_mesh_strainer_(small)'),
(199, 'UTILITY HOLDER', 'UH', 'UTILITY HOLDER', NULL, '99', '18', '39241090', 288, 0, 0, NULL, 'UTILITY HOLDER,UH', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:18:24', NULL, '0', 'utility_holder'),
(200, 'UTILITY KNIFE (10 PCS)', 'UK 10', 'UTILITY KNIFE (10 PCS)', NULL, '15 Per Pcs', '18', '39241090', 288, 0, 0, NULL, 'UTILITY KNIFE (10 PCS),UK 10', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:18:04', NULL, '0', 'utility_knife_(10_pcs)'),
(201, 'VEGETABLE PEELER', 'VP', 'VEGETABLE PEELER', NULL, '55 Per Pcs', '18', '39241090', 160, 0, 0, NULL, 'VEGETABLE PEELER,VP', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:18:51', NULL, '0', 'vegetable_peeler'),
(202, 'VEGGI CHOPPER', 'VGC', 'VEGGI CHOPPER', NULL, '499', '18', '39241090', 120, 0, 0, NULL, 'VEGGI CHOPPER,VGC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:18:57', NULL, '0', 'veggi_chopper'),
(203, 'VENTO 3 PCS KNIFE SET', 'VKS', 'VENTO 3 PCS KNIFE SET', NULL, '225', '18', '39241090', 400, 0, 0, NULL, 'VENTO 3 PCS KNIFE SET,VKS', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:19:12', NULL, '0', 'vento_3_pcs_knife_set'),
(204, 'WIRE CHURNER', 'WIC', 'WIRE CHURNER', NULL, '249', '18', '39241090', 288, 0, 0, NULL, 'WIRE CHURNER,WIC', NULL, 1, '2023-11-09 12:42:28', '2023-11-09 14:24:15', NULL, '0', 'wire_churner'),
(205, 'Callie Wright', 'Dora Hatfield', 'Omnis est sed cum om', NULL, '933', '18', '92', 4, 1, 1, NULL, '', 'Reprehenderit sunt e', 0, '2023-11-09 13:46:05', '2023-11-09 13:46:05', NULL, '96', 'callie_wright');

-- --------------------------------------------------------

--
-- Table structure for table `product_additional_infos`
--

CREATE TABLE `product_additional_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_additional_infos`
--

INSERT INTO `product_additional_infos` (`id`, `product_id`, `title`, `details`, `sortOrder`, `created_at`, `updated_at`) VALUES
(31, 19, 'Exercitation eos qua', 'Obcaecati dolores na', 75, NULL, NULL),
(32, 17, 'Nam similique est am', 'Aut aut nemo suscipi', 28, NULL, NULL),
(33, 17, 'asdfa', 'asdfas', 2, NULL, NULL),
(34, 17, 'sdf234', 'fasdfa', 3, NULL, NULL),
(35, 17, 'asdf3423', 'sdf4rsdfasdf', 4, NULL, NULL),
(40, 18, 'Title 00', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, NULL, NULL),
(41, 18, 'Title 01', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2, NULL, NULL),
(42, 18, 'Title 02', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, NULL, NULL),
(43, 18, 'Title 03', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 4, NULL, NULL),
(48, 25, 'Et facere id quas e', 'Accusantium nobis pe', 29, NULL, NULL),
(50, 26, 'Culpa consequuntur', 'Eiusmod rerum sunt', 33, NULL, NULL),
(51, 27, 'Hic veniam est et', 'Quaerat aut tempor o', 51, NULL, NULL),
(52, 28, 'Rerum fugit qui aut', 'Nostrud atque minus', 18, NULL, NULL),
(53, 29, 'Sit sit ut minima a', 'Modi fuga Voluptate', 25, NULL, NULL),
(54, 30, 'Alias et culpa quam', 'Voluptatem qui aliqu', 6, NULL, NULL),
(55, 31, 'Sed voluptas aliquid', 'Voluptatem Ipsa of', 94, NULL, NULL),
(57, 24, NULL, NULL, 4, NULL, NULL),
(61, 34, NULL, NULL, 1, NULL, NULL),
(62, 35, NULL, NULL, 1, NULL, NULL),
(63, 36, NULL, NULL, 1, NULL, NULL),
(64, 37, NULL, NULL, 1, NULL, NULL),
(69, 39, NULL, NULL, 1, NULL, NULL),
(71, 41, NULL, NULL, 1, NULL, NULL),
(74, 42, NULL, NULL, 1, NULL, NULL),
(76, 44, NULL, NULL, 1, NULL, NULL),
(77, 45, NULL, NULL, 1, NULL, NULL),
(78, 46, NULL, NULL, 1, NULL, NULL),
(79, 47, NULL, NULL, 1, NULL, NULL),
(80, 48, NULL, NULL, 1, NULL, NULL),
(82, 49, NULL, NULL, 1, NULL, NULL),
(83, 50, NULL, NULL, 1, NULL, NULL),
(87, 54, NULL, NULL, 1, NULL, NULL),
(88, 55, NULL, NULL, 1, NULL, NULL),
(90, 56, NULL, NULL, 1, NULL, NULL),
(91, 57, NULL, NULL, 1, NULL, NULL),
(92, 58, NULL, NULL, 1, NULL, NULL),
(93, 59, NULL, NULL, 1, NULL, NULL),
(95, 61, NULL, NULL, 1, NULL, NULL),
(97, 33, NULL, NULL, 1, NULL, NULL),
(99, 60, NULL, NULL, 1, NULL, NULL),
(101, 43, NULL, NULL, 1, NULL, NULL),
(103, 53, NULL, NULL, 1, NULL, NULL),
(104, 62, NULL, NULL, 1, NULL, NULL),
(105, 38, 'Title', 'Details', 1, NULL, NULL),
(106, 38, 'Title 2', 'Details 2', 2, NULL, NULL),
(108, 40, NULL, NULL, 1, NULL, NULL),
(116, 205, 'asdfas', 'dfasdfasdf', 2, NULL, NULL),
(117, 205, 'sdfasdf', 'asdfasdf', 3, NULL, NULL),
(122, 52, 'Cable World Plastic 3 in 1 Portable Pretend Food Party Role Cooking Kitchen Play Set Toy for Boys and Girls - Pink', 'Cable World Toys & Games 2-IN-1 DESIGNING The design of this portable storage box not only a mini kitchen playset table, but also a suitcase, which is convenient for children to travel and play in unlimited venues, this can let kids get into the habit of storage from an early age. Cable World\r\n\r\nCable World FOR KIDS ROLE PLAY This adorable kitchen play set includes a lot of kitchen tools and accessories that suit little kids make kitchen role play. Kids will be entertained for hours. Cable World\r\n\r\nCable World IMAGINATIVE PLAY A perfect Toy Kit to develop kids\' intelligence, independence. Encourages child imagination and creative play. Cable World\r\nCable World PREMIUM QUALITY & SAFE Made of ABS, BPA-free; smooth and round edges, no burr, no sharp edges on every single accessory. Cable World\r\n\r\nCable World EASY TO ASSEBLE This kitchen play set is very easy to install. You can assemble it with your kids, this can practice kids’ manipulative skills and ability to solve problems.', 1, NULL, NULL),
(123, 52, 'Cable World Plastic 3 in 1 Portable Pretend Food Party Role Cooking Kitchen Play Set Toy for Boys and Girls - Pink', 'Cable World Toys & Games 2-IN-1 DESIGNING The design of this portable storage box not only a mini kitchen playset table, but also a suitcase, which is convenient for children to travel and play in unlimited venues, this can let kids get into the habit of storage from an early age. Cable World\r\n\r\nCable World FOR KIDS ROLE PLAY This adorable kitchen play set includes a lot of kitchen tools and accessories that suit little kids make kitchen role play. Kids will be entertained for hours. Cable World\r\n\r\nCable World IMAGINATIVE PLAY A perfect Toy Kit to develop kids\' intelligence, independence. Encourages child imagination and creative play. Cable World\r\nCable World PREMIUM QUALITY & SAFE Made of ABS, BPA-free; smooth and round edges, no burr, no sharp edges on every single accessory. Cable World\r\n\r\nCable World EASY TO ASSEBLE This kitchen play set is very easy to install. You can assemble it with your kids, this can practice kids’ manipulative skills and ability to solve problems.', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(8, 2, 1, NULL, NULL),
(9, 3, 1, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 5, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 7, 2, NULL, NULL),
(14, 8, 2, NULL, NULL),
(15, 9, 2, NULL, NULL),
(16, 10, 2, NULL, NULL),
(17, 11, 2, NULL, NULL),
(18, 12, 2, NULL, NULL),
(19, 13, 2, NULL, NULL),
(20, 14, 2, NULL, NULL),
(21, 17, 3, NULL, NULL),
(22, 18, 4, NULL, NULL),
(25, 15, 1, NULL, NULL),
(26, 19, 4, NULL, NULL),
(29, 22, 5, NULL, NULL),
(30, 23, 4, NULL, NULL),
(31, 16, 1, NULL, NULL),
(32, 20, 3, NULL, NULL),
(33, 21, 4, NULL, NULL),
(34, 24, 15, NULL, NULL),
(35, 25, 22, NULL, NULL),
(36, 26, 15, NULL, NULL),
(37, 27, 12, NULL, NULL),
(38, 28, 3, NULL, NULL),
(39, 29, 16, NULL, NULL),
(40, 30, 14, NULL, NULL),
(41, 31, 23, NULL, NULL),
(44, 34, 13, NULL, NULL),
(45, 35, 13, NULL, NULL),
(46, 36, 13, NULL, NULL),
(47, 37, 5, NULL, NULL),
(48, 38, 4, NULL, NULL),
(49, 39, 4, NULL, NULL),
(51, 41, 4, NULL, NULL),
(55, 42, 4, NULL, NULL),
(57, 44, 13, NULL, NULL),
(58, 45, 13, NULL, NULL),
(59, 46, 23, NULL, NULL),
(60, 47, 23, NULL, NULL),
(61, 48, 23, NULL, NULL),
(62, 49, 15, NULL, NULL),
(63, 50, 15, NULL, NULL),
(65, 52, 2, NULL, NULL),
(67, 54, 5, NULL, NULL),
(68, 55, 5, NULL, NULL),
(69, 56, 10, NULL, NULL),
(70, 57, 12, NULL, NULL),
(71, 58, 11, NULL, NULL),
(72, 59, 12, NULL, NULL),
(74, 61, 14, NULL, NULL),
(75, 32, 16, NULL, NULL),
(76, 33, 17, NULL, NULL),
(77, 40, 18, NULL, NULL),
(78, 60, 19, NULL, NULL),
(80, 43, 21, NULL, NULL),
(81, 53, 24, NULL, NULL),
(82, 62, 22, NULL, NULL),
(83, 63, 11, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(84, 64, 19, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(85, 67, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(86, 68, 19, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(87, 69, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(88, 71, 2, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(89, 72, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(90, 75, 12, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(91, 77, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(92, 78, 19, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(93, 79, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(94, 80, 15, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(95, 81, 10, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(96, 82, 3, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(97, 83, 17, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(98, 84, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(99, 85, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(100, 86, 3, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(101, 87, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(102, 88, 12, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(103, 89, 12, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(104, 90, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(105, 91, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(106, 92, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(107, 93, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(108, 95, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(109, 98, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(110, 99, 12, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(111, 100, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(112, 101, 20, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(113, 102, 17, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(114, 103, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(115, 104, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(116, 105, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(117, 106, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(118, 107, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(119, 108, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(120, 109, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(121, 110, 23, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(122, 111, 23, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(123, 112, 23, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(124, 113, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(125, 115, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(126, 117, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(127, 118, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(128, 119, 10, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(129, 121, 15, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(130, 124, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(131, 125, 13, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(132, 126, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(133, 127, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(134, 128, 24, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(135, 129, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(136, 130, 13, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(137, 131, 13, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(138, 132, 19, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(139, 133, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(140, 134, 11, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(141, 135, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(142, 136, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(143, 137, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(144, 138, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(145, 139, 11, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(146, 140, 16, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(147, 141, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(148, 142, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(149, 143, 19, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(150, 144, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(151, 145, 22, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(152, 146, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(153, 147, 11, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(154, 148, 14, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(155, 149, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(156, 151, 10, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(157, 152, 4, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(158, 153, 18, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(159, 154, 5, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(160, 155, 21, '2023-11-09 12:42:27', '2023-11-09 12:42:27'),
(161, 156, 24, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(162, 157, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(163, 158, 12, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(164, 159, 12, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(165, 160, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(166, 161, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(167, 162, 17, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(168, 163, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(169, 164, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(170, 165, 17, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(171, 166, 20, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(172, 167, 17, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(173, 168, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(174, 170, 11, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(175, 172, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(176, 173, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(177, 174, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(178, 175, 5, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(179, 176, 24, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(180, 177, 3, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(181, 178, 3, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(182, 180, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(183, 181, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(184, 182, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(185, 183, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(186, 185, 21, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(187, 186, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(188, 187, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(189, 188, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(190, 189, 19, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(191, 190, 22, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(192, 191, 24, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(193, 192, 24, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(194, 193, 18, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(195, 194, 10, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(196, 195, 18, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(197, 196, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(198, 197, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(199, 198, 23, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(200, 200, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(201, 201, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(202, 202, 5, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(203, 203, 14, '2023-11-09 12:42:28', '2023-11-09 12:42:28'),
(204, 205, 20, NULL, NULL),
(205, 51, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image_galleries`
--

CREATE TABLE `product_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_galleries`
--

INSERT INTO `product_image_galleries` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(72, '1699263529.png', 32, '2023-11-06 15:08:49', '2023-11-06 15:08:49'),
(73, '1699263613.png', 33, '2023-11-06 15:10:13', '2023-11-06 15:10:13'),
(74, '1699263676.png', 34, '2023-11-06 15:11:16', '2023-11-06 15:11:16'),
(75, '1699263880.png', 35, '2023-11-06 15:14:40', '2023-11-06 15:14:40'),
(76, '1699263944.png', 36, '2023-11-06 15:15:44', '2023-11-06 15:15:44'),
(77, '1699264038.png', 37, '2023-11-06 15:17:18', '2023-11-06 15:17:18'),
(78, '1699264102.png', 38, '2023-11-06 15:18:22', '2023-11-06 15:18:22'),
(79, '1699264232.png', 39, '2023-11-06 15:20:32', '2023-11-06 15:20:32'),
(81, '1699264405.png', 41, '2023-11-06 15:23:25', '2023-11-06 15:23:25'),
(82, '1699264681.png', 42, '2023-11-06 15:28:01', '2023-11-06 15:28:01'),
(83, '1699265013.png', 43, '2023-11-06 15:33:33', '2023-11-06 15:33:33'),
(84, '1699265070.png', 44, '2023-11-06 15:34:30', '2023-11-06 15:34:30'),
(85, '1699265170.png', 45, '2023-11-06 15:36:10', '2023-11-06 15:36:10'),
(86, '1699265245.png', 46, '2023-11-06 15:37:25', '2023-11-06 15:37:25'),
(87, '1699265831.png', 47, '2023-11-06 15:47:11', '2023-11-06 15:47:11'),
(88, '1699265946.png', 48, '2023-11-06 15:49:06', '2023-11-06 15:49:06'),
(89, '1699266035.png', 49, '2023-11-06 15:50:35', '2023-11-06 15:50:35'),
(90, '1699266088.png', 50, '2023-11-06 15:51:28', '2023-11-06 15:51:28'),
(91, '1699269350.png', 51, '2023-11-06 16:45:50', '2023-11-06 16:45:50'),
(92, '1699269462.png', 52, '2023-11-06 16:47:42', '2023-11-06 16:47:42'),
(93, '1699270146.png', 54, '2023-11-06 16:59:06', '2023-11-06 16:59:06'),
(94, '1699270285.png', 55, '2023-11-06 17:01:25', '2023-11-06 17:01:25'),
(95, '1699270354.png', 56, '2023-11-06 17:02:34', '2023-11-06 17:02:34'),
(96, '1699270467.png', 57, '2023-11-06 17:04:27', '2023-11-06 17:04:27'),
(97, '1699270592.png', 58, '2023-11-06 17:06:32', '2023-11-06 17:06:32'),
(98, '1699270661.png', 59, '2023-11-06 17:07:41', '2023-11-06 17:07:41'),
(99, '1699270770.png', 60, '2023-11-06 17:09:30', '2023-11-06 17:09:30'),
(100, '1699271003.png', 61, '2023-11-06 17:13:23', '2023-11-06 17:13:23'),
(101, '1699273309.png', 53, '2023-11-06 17:51:49', '2023-11-06 17:51:49'),
(102, '1699273385.png', 62, '2023-11-06 17:53:05', '2023-11-06 17:53:05'),
(103, '1699514255.png', 64, '2023-11-09 12:47:35', '2023-11-09 12:47:35'),
(104, '1699514307.png', 65, '2023-11-09 12:48:27', '2023-11-09 12:48:27'),
(105, '1699514330.png', 66, '2023-11-09 12:48:50', '2023-11-09 12:48:50'),
(106, '1699514349.png', 67, '2023-11-09 12:49:09', '2023-11-09 12:49:09'),
(107, '1699514368.png', 68, '2023-11-09 12:49:28', '2023-11-09 12:49:28'),
(108, '1699514423.png', 69, '2023-11-09 12:50:23', '2023-11-09 12:50:23'),
(109, '1699514441.png', 70, '2023-11-09 12:50:41', '2023-11-09 12:50:41'),
(110, '1699514462.png', 71, '2023-11-09 12:51:02', '2023-11-09 12:51:02'),
(111, '1699514480.png', 72, '2023-11-09 12:51:20', '2023-11-09 12:51:20'),
(112, '1699514667.png', 73, '2023-11-09 12:54:27', '2023-11-09 12:54:27'),
(113, '1699514678.png', 74, '2023-11-09 12:54:38', '2023-11-09 12:54:38'),
(114, '1699514693.png', 75, '2023-11-09 12:54:53', '2023-11-09 12:54:53'),
(115, '1699514719.png', 76, '2023-11-09 12:55:19', '2023-11-09 12:55:19'),
(117, '1699514794.png', 77, '2023-11-09 12:56:34', '2023-11-09 12:56:34'),
(118, '1699514823.png', 78, '2023-11-09 12:57:03', '2023-11-09 12:57:03'),
(119, '1699514838.png', 79, '2023-11-09 12:57:18', '2023-11-09 12:57:18'),
(120, '1699514867.png', 80, '2023-11-09 12:57:47', '2023-11-09 12:57:47'),
(121, '1699514870.png', 81, '2023-11-09 12:57:50', '2023-11-09 12:57:50'),
(122, '1699514878.png', 82, '2023-11-09 12:57:58', '2023-11-09 12:57:58'),
(123, '1699514899.png', 83, '2023-11-09 12:58:19', '2023-11-09 12:58:19'),
(124, '1699514988.png', 84, '2023-11-09 12:59:48', '2023-11-09 12:59:48'),
(125, '1699515034.png', 85, '2023-11-09 13:00:34', '2023-11-09 13:00:34'),
(126, '1699515049.png', 87, '2023-11-09 13:00:49', '2023-11-09 13:00:49'),
(127, '1699515096.png', 86, '2023-11-09 13:01:36', '2023-11-09 13:01:36'),
(128, '1699515117.png', 88, '2023-11-09 13:01:57', '2023-11-09 13:01:57'),
(129, '1699515137.png', 89, '2023-11-09 13:02:17', '2023-11-09 13:02:17'),
(130, '1699515149.png', 90, '2023-11-09 13:02:29', '2023-11-09 13:02:29'),
(131, '1699515162.png', 91, '2023-11-09 13:02:42', '2023-11-09 13:02:42'),
(132, '1699515190.png', 92, '2023-11-09 13:03:10', '2023-11-09 13:03:10'),
(133, '1699515203.png', 93, '2023-11-09 13:03:23', '2023-11-09 13:03:23'),
(134, '1699515217.png', 94, '2023-11-09 13:03:37', '2023-11-09 13:03:37'),
(135, '1699515227.png', 95, '2023-11-09 13:03:47', '2023-11-09 13:03:47'),
(136, '1699515241.png', 96, '2023-11-09 13:04:01', '2023-11-09 13:04:01'),
(137, '1699515256.png', 97, '2023-11-09 13:04:16', '2023-11-09 13:04:16'),
(138, '1699515301.png', 102, '2023-11-09 13:05:01', '2023-11-09 13:05:01'),
(139, '1699515314.png', 98, '2023-11-09 13:05:14', '2023-11-09 13:05:14'),
(140, '1699515538.png', 100, '2023-11-09 13:08:58', '2023-11-09 13:08:58'),
(141, '1699515549.png', 101, '2023-11-09 13:09:09', '2023-11-09 13:09:09'),
(142, '1699515639.png', 103, '2023-11-09 13:10:39', '2023-11-09 13:10:39'),
(143, '1699515677.png', 104, '2023-11-09 13:11:17', '2023-11-09 13:11:17'),
(144, '1699515700.png', 105, '2023-11-09 13:11:40', '2023-11-09 13:11:40'),
(145, '1699515708.png', 107, '2023-11-09 13:11:48', '2023-11-09 13:11:48'),
(146, '1699515747.png', 108, '2023-11-09 13:12:27', '2023-11-09 13:12:27'),
(147, '1699517473.png', 106, '2023-11-09 13:41:13', '2023-11-09 13:41:13'),
(148, '1699517495.png', 109, '2023-11-09 13:41:35', '2023-11-09 13:41:35'),
(149, '1699517509.png', 110, '2023-11-09 13:41:49', '2023-11-09 13:41:49'),
(150, '1699517520.png', 111, '2023-11-09 13:42:00', '2023-11-09 13:42:00'),
(151, '1699517535.png', 112, '2023-11-09 13:42:15', '2023-11-09 13:42:15'),
(152, '1699517579.png', 113, '2023-11-09 13:42:59', '2023-11-09 13:42:59'),
(153, '1699517592.png', 114, '2023-11-09 13:43:12', '2023-11-09 13:43:12'),
(154, '1699517604.png', 115, '2023-11-09 13:43:24', '2023-11-09 13:43:24'),
(155, '1699517617.png', 116, '2023-11-09 13:43:37', '2023-11-09 13:43:37'),
(156, '1699517630.png', 117, '2023-11-09 13:43:50', '2023-11-09 13:43:50'),
(157, '1699517643.png', 118, '2023-11-09 13:44:03', '2023-11-09 13:44:03'),
(158, '1699517663.png', 119, '2023-11-09 13:44:23', '2023-11-09 13:44:23'),
(159, '1699517689.png', 120, '2023-11-09 13:44:49', '2023-11-09 13:44:49'),
(160, '1699517700.png', 121, '2023-11-09 13:45:00', '2023-11-09 13:45:00'),
(161, '1699517711.png', 122, '2023-11-09 13:45:11', '2023-11-09 13:45:11'),
(162, '1699517782.png', 123, '2023-11-09 13:46:22', '2023-11-09 13:46:22'),
(163, '1699517795.png', 124, '2023-11-09 13:46:35', '2023-11-09 13:46:35'),
(164, '1699517807.png', 125, '2023-11-09 13:46:47', '2023-11-09 13:46:47'),
(165, '1699517824.png', 126, '2023-11-09 13:47:04', '2023-11-09 13:47:04'),
(166, '1699517838.png', 127, '2023-11-09 13:47:18', '2023-11-09 13:47:18'),
(167, '1699517851.png', 128, '2023-11-09 13:47:31', '2023-11-09 13:47:31'),
(168, '1699517876.png', 129, '2023-11-09 13:47:56', '2023-11-09 13:47:56'),
(169, '1699517885.png', 130, '2023-11-09 13:48:05', '2023-11-09 13:48:05'),
(170, '1699517895.png', 131, '2023-11-09 13:48:15', '2023-11-09 13:48:15'),
(171, '1699517905.png', 132, '2023-11-09 13:48:25', '2023-11-09 13:48:25'),
(172, '1699517919.png', 133, '2023-11-09 13:48:39', '2023-11-09 13:48:39'),
(173, '1699517926.png', 134, '2023-11-09 13:48:46', '2023-11-09 13:48:46'),
(174, '1699517937.png', 135, '2023-11-09 13:48:57', '2023-11-09 13:48:57'),
(175, '1699518003.png', 136, '2023-11-09 13:50:03', '2023-11-09 13:50:03'),
(176, '1699518014.png', 137, '2023-11-09 13:50:14', '2023-11-09 13:50:14'),
(177, '1699518029.png', 138, '2023-11-09 13:50:29', '2023-11-09 13:50:29'),
(178, '1699518044.png', 139, '2023-11-09 13:50:44', '2023-11-09 13:50:44'),
(179, '1699518657.png', 140, '2023-11-09 14:00:57', '2023-11-09 14:00:57'),
(180, '1699518670.png', 141, '2023-11-09 14:01:10', '2023-11-09 14:01:10'),
(181, '1699518682.png', 142, '2023-11-09 14:01:22', '2023-11-09 14:01:22'),
(182, '1699518706.png', 144, '2023-11-09 14:01:46', '2023-11-09 14:01:46'),
(183, '1699518716.png', 143, '2023-11-09 14:01:56', '2023-11-09 14:01:56'),
(184, '1699518728.png', 145, '2023-11-09 14:02:08', '2023-11-09 14:02:08'),
(185, '1699518740.png', 146, '2023-11-09 14:02:20', '2023-11-09 14:02:20'),
(186, '1699518751.png', 147, '2023-11-09 14:02:31', '2023-11-09 14:02:31'),
(187, '1699518764.png', 148, '2023-11-09 14:02:44', '2023-11-09 14:02:44'),
(188, '1699518775.png', 149, '2023-11-09 14:02:55', '2023-11-09 14:02:55'),
(189, '1699518788.png', 150, '2023-11-09 14:03:08', '2023-11-09 14:03:08'),
(190, '1699518799.png', 151, '2023-11-09 14:03:19', '2023-11-09 14:03:19'),
(191, '1699518820.png', 152, '2023-11-09 14:03:40', '2023-11-09 14:03:40'),
(192, '1699518832.png', 153, '2023-11-09 14:03:52', '2023-11-09 14:03:52'),
(193, '1699518845.png', 154, '2023-11-09 14:04:05', '2023-11-09 14:04:05'),
(194, '1699518855.png', 155, '2023-11-09 14:04:15', '2023-11-09 14:04:15'),
(195, '1699518889.png', 157, '2023-11-09 14:04:49', '2023-11-09 14:04:49'),
(196, '1699518901.png', 159, '2023-11-09 14:05:01', '2023-11-09 14:05:01'),
(197, '1699518911.png', 160, '2023-11-09 14:05:11', '2023-11-09 14:05:11'),
(198, '1699519056.png', 161, '2023-11-09 14:07:36', '2023-11-09 14:07:36'),
(199, '1699519067.png', 162, '2023-11-09 14:07:47', '2023-11-09 14:07:47'),
(200, '1699519078.png', 167, '2023-11-09 14:07:58', '2023-11-09 14:07:58'),
(201, '1699519089.png', 163, '2023-11-09 14:08:09', '2023-11-09 14:08:09'),
(202, '1699519100.png', 164, '2023-11-09 14:08:20', '2023-11-09 14:08:20'),
(203, '1699519109.png', 165, '2023-11-09 14:08:29', '2023-11-09 14:08:29'),
(204, '1699519176.png', 166, '2023-11-09 14:09:36', '2023-11-09 14:09:36'),
(205, '1699519185.png', 168, '2023-11-09 14:09:45', '2023-11-09 14:09:45'),
(206, '1699519196.png', 169, '2023-11-09 14:09:56', '2023-11-09 14:09:56'),
(207, '1699519206.png', 158, '2023-11-09 14:10:06', '2023-11-09 14:10:06'),
(208, '1699519218.png', 170, '2023-11-09 14:10:18', '2023-11-09 14:10:18'),
(209, '1699519241.png', 171, '2023-11-09 14:10:41', '2023-11-09 14:10:41'),
(210, '1699519251.png', 172, '2023-11-09 14:10:51', '2023-11-09 14:10:51'),
(211, '1699519277.png', 173, '2023-11-09 14:11:17', '2023-11-09 14:11:17'),
(212, '1699519287.png', 174, '2023-11-09 14:11:27', '2023-11-09 14:11:27'),
(213, '1699519311.png', 175, '2023-11-09 14:11:51', '2023-11-09 14:11:51'),
(214, '1699519321.png', 176, '2023-11-09 14:12:01', '2023-11-09 14:12:01'),
(215, '1699519340.png', 177, '2023-11-09 14:12:20', '2023-11-09 14:12:20'),
(216, '1699519350.png', 179, '2023-11-09 14:12:30', '2023-11-09 14:12:30'),
(217, '1699519362.png', 180, '2023-11-09 14:12:42', '2023-11-09 14:12:42'),
(218, '1699519375.png', 181, '2023-11-09 14:12:55', '2023-11-09 14:12:55'),
(219, '1699519387.png', 182, '2023-11-09 14:13:07', '2023-11-09 14:13:07'),
(220, '1699519397.png', 183, '2023-11-09 14:13:17', '2023-11-09 14:13:17'),
(221, '1699519419.png', 184, '2023-11-09 14:13:39', '2023-11-09 14:13:39'),
(222, '1699519451.png', 185, '2023-11-09 14:14:11', '2023-11-09 14:14:11'),
(223, '1699519462.png', 186, '2023-11-09 14:14:22', '2023-11-09 14:14:22'),
(224, '1699519496.png', 189, '2023-11-09 14:14:56', '2023-11-09 14:14:56'),
(225, '1699519519.png', 190, '2023-11-09 14:15:19', '2023-11-09 14:15:19'),
(226, '1699519532.png', 191, '2023-11-09 14:15:32', '2023-11-09 14:15:32'),
(227, '1699519570.png', 192, '2023-11-09 14:16:10', '2023-11-09 14:16:10'),
(228, '1699519571.png', 193, '2023-11-09 14:16:11', '2023-11-09 14:16:11'),
(229, '1699519575.png', 187, '2023-11-09 14:16:15', '2023-11-09 14:16:15'),
(230, '1699519588.png', 194, '2023-11-09 14:16:28', '2023-11-09 14:16:28'),
(231, '1699519636.png', 196, '2023-11-09 14:17:16', '2023-11-09 14:17:16'),
(232, '1699519665.png', 197, '2023-11-09 14:17:45', '2023-11-09 14:17:45'),
(233, '1699519667.png', 198, '2023-11-09 14:17:47', '2023-11-09 14:17:47'),
(234, '1699519684.png', 200, '2023-11-09 14:18:04', '2023-11-09 14:18:04'),
(235, '1699519699.png', 195, '2023-11-09 14:18:19', '2023-11-09 14:18:19'),
(236, '1699519704.png', 199, '2023-11-09 14:18:24', '2023-11-09 14:18:24'),
(237, '1699519731.png', 201, '2023-11-09 14:18:51', '2023-11-09 14:18:51'),
(238, '1699519737.png', 202, '2023-11-09 14:18:57', '2023-11-09 14:18:57'),
(239, '1699519741.png', 188, '2023-11-09 14:19:01', '2023-11-09 14:19:01'),
(240, '1699519752.png', 203, '2023-11-09 14:19:12', '2023-11-09 14:19:12'),
(241, '1699520055.png', 204, '2023-11-09 14:24:15', '2023-11-09 14:24:15'),
(242, '1699520134.png', 40, '2023-11-09 14:25:34', '2023-11-09 14:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Super Admin', 1, NULL, '2023-11-09 11:14:41', 'super_admin'),
(2, 'Manager', 1, NULL, '2023-11-09 11:14:41', 'manager'),
(3, 'Dealer', 1, NULL, '2023-11-09 11:14:41', 'dealer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `seller_id` varchar(255) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `account_balance` double DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` bigint(20) UNSIGNED NOT NULL,
  `login_otp` varchar(255) DEFAULT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_name`, `mobile_no`, `whatsapp_no`, `address`, `email`, `seller_id`, `discount`, `commission`, `account_balance`, `user_status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`, `login_otp`, `is_block`) VALUES
(1, 'super admin', '123456789', '123456789', 'Admin Address', 'superadmin@mail.com', 'Super Admin', 0, 0, 0, 1, '0000-00-00 00:00:00', '$2y$10$uYcaFMEFVbKqINTxiYV9NOJHjpqplFii1SOmfY9q3GSzOKrzTX.He', NULL, NULL, '2023-10-25 08:20:57', NULL, 1, NULL, 0),
(2, 'Manager', '8888888888', '8888888888', 'Manager Address', 'ravis@7technosoftsolutions.com', 'Manager', 0, 0, 0, 0, '0000-00-00 00:00:00', '$2y$10$uYcaFMEFVbKqINTxiYV9NOJHjpqplFii1SOmfY9q3GSzOKrzTX.He', NULL, NULL, '2023-11-10 07:09:22', NULL, 2, NULL, 0),
(3, 'Dealer', '7777777777', '7777777777', 'Manager Address', 'dealer@mail.com', '', 0, 0, 0, 1, '0000-00-00 00:00:00', '$2y$10$E4ihg/xn8R3wdQ9je6okjeUKSOTtp8EESVZOo6nfHCJDobDgn00qS', NULL, NULL, NULL, NULL, 3, NULL, 0),
(4, 'dev vaibhav 1234', 'devvaibhav123@gmail.com', '4444444444', 'address', 'company4@email.com', 'devvaibhav1234_8vgA', 10, 10, 1000, 1, NULL, '$2y$10$0gje4HrhLn/JvO61CRDdZetzWnkuyj4tjFB7GrqsGjZ5M4gSnVo3W', NULL, '2023-10-25 07:38:32', '2023-11-20 08:08:48', NULL, 3, NULL, 0),
(5, 'company 5', '5555555555', '5555555555', 'address', 'company5@email.com', 'company5_FSp0', 10, 10, 1000, 0, NULL, '$2y$10$/.WazDL6urqMjNRZL.FKGe.C7lvsI.AQxhWKP02VW/RWI/zi1ZNH6', NULL, '2023-10-25 07:41:56', '2023-10-25 18:30:49', NULL, 3, NULL, 0),
(6, 'company 6', '6666666666', NULL, 'address', 'company6@email.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$mxO136OWcfwjc73Ufi5MueweukE3DF3vfPPdsFnSgm8H1.do.l.ue', NULL, '2023-10-25 12:02:14', '2023-10-25 12:02:14', NULL, 3, NULL, 0),
(7, 'company 10', '6666666660', NULL, 'address', 'company10@email.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$IZC/eNE0Ub/CIUTY/1Ij9OJHxXV83KXZbk9KcY1iplJ9Vho4mzwZG', NULL, '2023-10-25 17:47:51', '2023-10-25 17:47:51', NULL, 3, NULL, 0),
(8, 'company 10', '6666666669', NULL, 'address', 'company106@email.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$C00XSQFnJCTjuJPF4/CgbuqfbmYg0qcWJ7BxYX3zR8oP.0KhScaZy', NULL, '2023-10-25 17:49:04', '2023-10-25 17:49:04', NULL, 3, NULL, 0),
(9, 'Test', '9656565212', NULL, 'address12', 'company1006@email.com', NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$Ao8XHg.A/XfW4ktLRjW8p.pPb027n0ENhzpg0PLUGg8.hLIBmgoky', NULL, '2023-10-25 18:23:13', '2023-10-25 18:23:13', NULL, 3, NULL, 0),
(10, 'Test', '9656565555', NULL, 'address12', 'company156@email.com', 'Test_2Rnv', NULL, NULL, NULL, 1, NULL, '$2y$10$XfuZjf7J.gBAtx169iHRG.v0fR/1B9S1WSdQy9G.35aWm3xAZEjaO', NULL, '2023-10-25 18:23:52', '2023-10-26 10:05:34', NULL, 3, NULL, 0),
(11, 'technosoft', '1234561234', NULL, 'address 1234', 'technosoft@gmail.com', 'technosoft_XTO6', NULL, NULL, NULL, 1, NULL, '$2y$10$uYcaFMEFVbKqINTxiYV9NOJHjpqplFii1SOmfY9q3GSzOKrzTX.He', NULL, '2023-10-26 11:09:28', '2023-10-30 15:47:23', NULL, 3, NULL, 0),
(12, 'Ujash Kichenware', '7405174688', NULL, 'Rajkot,Gujarat', 'sadariyaujash@gmail.com', 'UjashKichenware_ub6O', NULL, NULL, NULL, 0, NULL, '$2y$10$VvlXxAzdMQkglidij0V09eXoFoOeOKR4E/PpL5wOHRzCDMJvLfCkm', NULL, '2023-10-26 19:37:59', '2023-10-26 19:41:03', NULL, 3, NULL, 0),
(13, '9111111113', '9111111113', NULL, 'address', '9111111113@mail.wiki', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$NOqOgjK.2bFiz5cl80Str.eo1.9JGAyOQSDBr4jt4ZjTRCM/G1rWK', NULL, '2023-11-16 13:33:54', '2023-11-16 13:33:54', NULL, 3, 'LczzWQ', 0),
(14, '9111111112', '9111111112', NULL, 'address', '911111111+@mail.wiki', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$6nBHdKQDAdkyLlII6dz.k.eBisx.HEoRanPQ1VNe3pNpEGZQ0QrE.', NULL, '2023-11-16 13:34:37', '2023-11-16 13:34:37', NULL, 3, 'vNtWnu', 0),
(50, 'devvaibhav1234', '9789879884', NULL, 'address', 'pokjcgucdiur@kataskopoi.com', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$NcOOJ9yM91Ai.x3DTVCns.t0RnmCVcNE02j.5lKxmkAgrQ/gYhP4W', NULL, '2023-11-20 12:01:35', '2023-11-20 12:01:35', NULL, 3, 'hqEosG', 0),
(54, 'devvaibhav1234', '9789879885', NULL, 'address', 'vskyfieudv@hoanghainam.com', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$Bm6/gN1cR5YtRwK3qg4uFO7NaRfHXB/kKJguuEO8xHa3C9K9IR5f6', NULL, '2023-11-20 12:10:01', '2023-11-20 12:10:01', NULL, 3, '8FNobL', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_created_by_index` (`created_by`),
  ADD KEY `carts_products_id_index` (`products_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_page_id_index` (`page_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_created_by_index` (`created_by`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_index` (`order_id`),
  ADD KEY `order_items_products_id_index` (`products_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_additional_infos`
--
ALTER TABLE `product_additional_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_additional_infos_product_id_index` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_index` (`product_id`),
  ADD KEY `product_categories_category_id_index` (`category_id`);

--
-- Indexes for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_galleries_product_id_index` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `users_whatsapp_no_unique` (`whatsapp_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_index` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `product_additional_infos`
--
ALTER TABLE `product_additional_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `cms`
--
ALTER TABLE `cms`
  ADD CONSTRAINT `cms_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_additional_infos`
--
ALTER TABLE `product_additional_infos`
  ADD CONSTRAINT `product_additional_infos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD CONSTRAINT `product_image_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
