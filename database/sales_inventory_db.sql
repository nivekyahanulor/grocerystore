-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(6, 'Flour '),
(7, 'Rice'),
(8, 'Chips'),
(9, 'Baking ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Grace Gatpo', '09956654941', '118 E.Sta Ana St Sumilang Pasig City'),
(2, 'John Carl Lou D.L Ulep', '099155974594', '148 Mulawin St Pinagbuhatan Pasig City '),
(3, 'Drew Diaz', '097856412587', '123 Santos St. Bambang Pasig City '),
(4, 'Scarlet Davikah Empillo', '098654239878', '199 Geronimo Bambang Pasig City'),
(5, 'Alas U. Balba', '098654279546', '189 Luis St. San Miguel Pasig City'),
(6, 'Gloria De Guzman', '098654127954', '189 Sta.Rosa St Pasig City'),
(7, 'Alex Abila', '098654791522', '190 Feliciano St Sagad Pasig City '),
(8, 'Tyrone Betsayda ', '098654297565', '19 P.Burgos Katipunan Pasig City'),
(9, 'Aj Avendano', '098654278854', '19 Mangga St. Sta Rosa Pasig City'),
(10, 'Rye DG', '098654778954', 'Kyoto, Japan');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1= stockin , 2 = stockout',
  `stock_from` varchar(100) NOT NULL COMMENT 'sales/receiving',
  `form_id` int(30) NOT NULL,
  `other_details` text NOT NULL,
  `remarks` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `qty`, `type`, `stock_from`, `form_id`, `other_details`, `remarks`, `date_updated`) VALUES
(18, 1, 2, 2, 'Sales', 0, '{\"price\":\"75\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\r\n', '2020-09-22 15:19:22'),
(19, 1, 2, 2, 'Sales', 0, '{\"price\":\"75\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\r\n', '2020-09-22 15:20:03'),
(29, 8, 100, 1, 'receiving', 7, '{\"price\":\"100\",\"qty\":\"100\"}', 'Stock from Receiving-00000000\n', '2022-07-22 15:38:07'),
(30, 9, 100, 1, 'receiving', 8, '{\"price\":\"50\",\"qty\":\"100\"}', 'Stock from Receiving-84782955\n', '2022-07-22 15:38:25'),
(31, 10, 100, 1, 'receiving', 9, '{\"price\":\"150\",\"qty\":\"100\"}', 'Stock from Receiving-62851197\n', '2022-07-22 15:39:19'),
(32, 11, 100, 1, 'receiving', 10, '{\"price\":\"269\",\"qty\":\"100\"}', 'Stock from Receiving-49490477\n', '2022-07-22 15:39:52'),
(33, 12, 100, 1, 'receiving', 11, '{\"price\":\"1100\",\"qty\":\"100\"}', 'Stock from Receiving-68366915\n', '2022-07-22 15:40:54'),
(34, 13, 100, 1, 'receiving', 12, '{\"price\":\"18.98\",\"qty\":\"100\"}', 'Stock from Receiving-07240281\n', '2022-07-22 15:41:16'),
(35, 14, 100, 1, 'receiving', 13, '{\"price\":\"185\",\"qty\":\"100\"}', 'Stock from Receiving-84265635\n', '2022-07-22 15:41:37'),
(36, 15, 100, 1, 'receiving', 14, '{\"price\":\"100\",\"qty\":\"100\"}', 'Stock from Receiving-16373371\n', '2022-07-22 15:42:06'),
(37, 10, 1, 2, 'Sales', 7, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-00000000\n', '2022-07-22 15:43:07'),
(38, 8, 1, 2, 'Sales', 7, '{\"price\":\"100\",\"qty\":\"1\"}', 'Stock out from Sales-00000000\n', '2022-07-22 15:43:07'),
(39, 13, 2, 2, 'Sales', 7, '{\"price\":\"18.98\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\n', '2022-07-22 15:43:07'),
(118, 10, 1, 2, 'Sales', 79, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-94686862\n', '2022-08-21 00:36:45'),
(119, 10, 1, 2, 'Sales', 80, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-47048540\n', '2022-08-21 00:38:15'),
(120, 10, 1, 2, 'Sales', 81, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-75572525\n', '2022-08-21 00:41:34'),
(121, 10, 1, 2, 'Sales', 82, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-85117585\n', '2022-08-21 00:42:19'),
(122, 10, 1, 2, 'Sales', 83, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-89608605\n', '2022-08-21 00:46:00'),
(123, 10, 1, 2, 'Sales', 84, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-12428293\n', '2022-08-21 00:47:43'),
(124, 10, 1, 2, 'Sales', 85, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-16420431\n', '2022-08-21 00:48:33'),
(125, 8, 1, 2, 'Sales', 86, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-70041191\n', '2022-08-21 00:49:22'),
(126, 10, 1, 2, 'Sales', 87, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-98193175\n', '2022-08-21 00:50:44'),
(127, 10, 1, 2, 'Sales', 88, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-13266426\n', '2022-08-21 00:51:31'),
(128, 10, 1, 2, 'Sales', 89, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-45311291\n', '2022-08-21 00:56:26'),
(129, 10, 1, 2, 'Sales', 90, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-39443062\n', '2022-08-21 00:56:57'),
(130, 10, 1, 2, 'Sales', 91, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-74712767\n', '2022-08-21 00:59:42'),
(131, 8, 1, 2, 'Sales', 92, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-64490593\n', '2022-08-21 01:01:52'),
(132, 10, 1, 2, 'Sales', 93, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-84049905\n', '2022-08-21 01:02:28'),
(133, 14, 2, 2, 'Sales', 93, '{\"price\":\"185\",\"qty\":\"2\"}', 'Stock out from Sales-84049905\n', '2022-08-21 01:02:28'),
(134, 9, 1, 2, 'Sales', 94, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-34708376\n', '2023-01-09 22:37:51'),
(135, 9, 1, 2, 'Sales', 95, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-45156275\n', '2023-01-09 22:40:25'),
(136, 9, 1, 2, 'Sales', 96, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-14600190\n', '2023-01-09 22:42:54'),
(137, 9, 1, 2, 'Sales', 97, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-14024467\n', '2023-01-09 22:44:02'),
(138, 9, 1, 2, 'Sales', 98, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-70301714\n', '2023-01-09 22:45:13'),
(139, 9, 1, 2, 'Sales', 99, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-25711754\n', '2023-01-09 22:46:29'),
(140, 9, 1, 2, 'Sales', 100, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-92047668\n', '2023-01-09 22:46:46'),
(141, 9, 1, 2, 'Sales', 101, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-70223742\n', '2023-01-09 22:47:27'),
(142, 9, 1, 2, 'Sales', 102, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-78983797\n', '2023-01-09 22:52:10'),
(143, 9, 1, 2, 'Sales', 103, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-16099198\n', '2023-01-09 22:58:48'),
(144, 9, 1, 2, 'Sales', 104, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-16032451\n', '2023-01-09 23:00:21'),
(145, 9, 1, 2, 'Sales', 105, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-12614710\n', '2023-01-09 23:00:59'),
(146, 9, 1, 2, 'Sales', 106, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-16376789\n', '2023-01-09 23:01:17'),
(147, 9, 1, 2, 'Sales', 107, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-73539224\n', '2023-01-09 23:10:08'),
(148, 9, 1, 2, 'Sales', 108, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-22177945\n', '2023-01-10 15:09:00'),
(149, 10, 1, 2, 'Sales', 109, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-10599151\n', '2023-01-12 15:20:52'),
(150, 10, 1, 2, 'Sales', 110, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-36335040\n', '2023-01-12 15:21:12'),
(151, 10, 1, 2, 'Sales', 111, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-31812367\n', '2023-01-12 20:04:16'),
(152, 10, 1, 2, 'Sales', 112, '{\"price\":\"150\",\"qty\":\"1\"}', 'Stock out from Sales-08493055\n', '2023-01-12 21:25:58'),
(153, 9, 1, 2, 'Sales', 113, '{\"price\":\"50\",\"qty\":\"1\"}', 'Stock out from Sales-94757453\n', '2023-01-13 01:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(150) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `exp_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `sku`, `price`, `name`, `uom`, `description`, `exp_date`) VALUES
(8, 9, '26615726', 150, 'Baking Powder 450g', '450g', 'a powder used as a leavening agent in making baked goods (such as quick breads) that typically consists of sodium bicarbonate, an acidic substance (such as cream of tartar), and starch or flour.', 'December 2023'),
(9, 8, '28698365', 50, 'Piattos 85g', '85g', 'Thin and crispy, Piattos Multigrain comes in two mouthwatering flavors.', 'December 2024'),
(10, 6, '82794544', 150, 'All Purpose Flour 200g', '200g', 'Best used for: steamed or fried, Pinoy kakanin, Rice Noodles', 'November 2023'),
(11, 7, '74846246', 269, 'Black Rice 2kl', '2kg', 'Black rice gets its signature black-purple color from a pigment called anthocyanin, which has potent antioxidant properties', 'July 2023'),
(12, 6, '01489089', 110, 'Jasmine Rice 1kl', '1kg', 'White rice refers generally to a processed form of rice with the hull and bran removed. Jasmine rice is usually white rice.', 'August 2023'),
(13, 6, '72136100', 18.98, 'Cake Flour 1kg', '1kg', 'Per kg', 'July 2023'),
(14, 9, '23313431', 185, 'White Baking Soda 340g', '340g', 'Arm & Hammer Pure Baking Soda With Shaker 340G', 'May 2023'),
(15, 6, '44601875', 100, 'Whole Wheat Flour 2.25kg', '2.25kg', 'Best used for: bread, cookies, dense cakes', 'July 2023'),
(18, 8, '57202141', 90, 'Doritos 198g', '198g', 'Doritos is an American brand of flavored tortilla chips produced since 1964 by Frito-Lay, a wholly owned subsidiary of PepsiCo.', 'December 2023');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_list`
--

CREATE TABLE `receiving_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving_list`
--

INSERT INTO `receiving_list` (`id`, `ref_no`, `supplier_id`, `total_amount`, `date_added`) VALUES
(7, '00000000\n', 5, 10000, '2022-07-22 15:38:07'),
(8, '84782955\n', 4, 5000, '2022-07-22 15:38:24'),
(9, '62851197\n', 1, 15000, '2022-07-22 15:39:19'),
(10, '49490477\n', 3, 26900, '2022-07-22 15:39:52'),
(11, '68366915\n', 3, 110000, '2022-07-22 15:40:54'),
(12, '07240281\n', 1, 1898, '2022-07-22 15:41:16'),
(13, '84265635\n', 5, 18500, '2022-07-22 15:41:37'),
(14, '16373371\n', 1, 10000, '2022-07-22 15:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales_list`
--

CREATE TABLE `sales_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_list`
--

INSERT INTO `sales_list` (`id`, `ref_no`, `customer_id`, `total_amount`, `amount_tendered`, `amount_change`, `date_updated`) VALUES
(7, '00000000\n', 9, 1212.96, 1500, 287.03999999999996, '2022-07-22 15:43:06'),
(8, '12305029\n', 5, 2445, 3000, 555, '2022-07-22 15:44:05'),
(9, '04419151\n', 7, 2940, 3000, 60, '2022-07-22 15:44:51'),
(10, '64815551\n', 3, 1500, 2000, 500, '2022-07-22 15:45:22'),
(11, '78004682\n', 6, 2964.8, 3000, 35.19999999999982, '2022-07-22 15:45:49'),
(12, '28592386\n', 9, 150, 200, 50, '2022-07-23 17:16:21'),
(13, '09276313\n', 5, 600, 1000, 400, '2022-07-27 13:07:09'),
(14, '85107700\n', 0, 108900, 200000, 91100, '2022-07-29 01:32:34'),
(15, '64931344\n', 10, 250, 300, 50, '2022-08-15 01:32:41'),
(47, '84564706\n', 5, 454, 455, 1, '2022-08-20 22:45:07'),
(48, '90585044\n', 10, 68.98, 69, 0.01999999999999602, '2022-08-20 22:48:02'),
(93, '84049905\n', 9, 520, 550, 30, '2022-08-21 01:02:28'),
(94, '34708376\n', 10, 50, 51, 1, '2023-01-09 22:37:51'),
(95, '45156275\n', 10, 50, 51, 1, '2023-01-09 22:40:25'),
(107, '73539224\n', 10, 50, 4, -46, '2023-01-09 23:10:08'),
(108, '22177945\n', 10, 50, 49, 0, '2023-01-10 15:09:00'),
(109, '10599151\n', 0, 150, 149, 0, '2023-01-12 15:20:52'),
(110, '36335040\n', 0, 150, 155, 5, '2023-01-12 15:21:12'),
(111, '31812367\n', 9, 150, 200, 50, '2023-01-12 20:04:16'),
(112, '08493055\n', 9, 150, 200, 50, '2023-01-12 21:25:58'),
(113, '94757453\n', 10, 50, 54, 4, '2023-01-13 01:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(30) NOT NULL,
  `supplier_name` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `product` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `deliv_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`id`, `supplier_name`, `contact`, `address`, `product`, `amount`, `deliv_date`) VALUES
(1, 'Wellington Flour Mills', '26719761', 'Pasig Blvd, Pasig, Metro Manila', 'All Purpose Flour', 500, 'June 18, 2022'),
(3, 'AER Rice Center (Dealer Supplier Wholesaler Retailer Reseller Wholesale Retail)', '(02) 8712 3293', '850 Basilio St, Sampaloc, Manila, 1008 Metro Manila', 'Jasmine Rice', 1000, 'July 06, 2022'),
(4, 'URC Universal Robina Corporation', '1800 10 872 2273', ' 555 Eulogio Amang Rodriguez Ave, Pasig, 1609 Metro Manila', 'Piattos', 700, 'May 13, 2022'),
(5, 'Baking And Home Depot', '0977 794 2486', ' TSL Building, 59 E Rodriguez Sr. Ave, Quezon City, Metro Manila', 'Baking Powder', 500, 'March 23, 2022'),
(10, 'Collenes Chips', '1232434', '123 Lily St. Cainta, 1234 Metro Manila', 'Doritos', 500, 'August 18, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Online Food Ordering System', 'info@sample.com', '+6948 8542 623', '1600654680_photo-1504674900247-0877df9cc836.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = cashier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(3, 'Babylyn E. Ulep', 'Bheng', 'admin123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving_list`
--
ALTER TABLE `receiving_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_list`
--
ALTER TABLE `sales_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receiving_list`
--
ALTER TABLE `receiving_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales_list`
--
ALTER TABLE `sales_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
