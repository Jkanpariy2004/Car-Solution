-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2024 at 04:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_car_booking`
--

DROP TABLE IF EXISTS `add_car_booking`;
CREATE TABLE IF NOT EXISTS `add_car_booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_car_booking`
--

INSERT INTO `add_car_booking` (`id`, `image`, `name`, `price`) VALUES
(8, 'Honda.Amaze.jpg', 'Honda Amaze', '75000'),
(9, 'Honda.City.jpg', 'Honda City', '100000'),
(10, 'car-5.jpg', 'Thar', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `add_car_package`
--

DROP TABLE IF EXISTS `add_car_package`;
CREATE TABLE IF NOT EXISTS `add_car_package` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `packege_no` varchar(255) NOT NULL,
  `packege_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `s_1` varchar(255) NOT NULL,
  `s_2` varchar(255) NOT NULL,
  `s_3` varchar(255) NOT NULL,
  `s_4` varchar(255) NOT NULL,
  `s_5` varchar(255) NOT NULL,
  `s_6` varchar(255) NOT NULL,
  `s_7` varchar(255) NOT NULL,
  `s_8` varchar(255) NOT NULL,
  `s_9` varchar(255) NOT NULL,
  `s_10` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_car_package`
--

INSERT INTO `add_car_package` (`id`, `image`, `packege_no`, `packege_name`, `price`, `detail`, `s_1`, `s_2`, `s_3`, `s_4`, `s_5`, `s_6`, `s_7`, `s_8`, `s_9`, `s_10`) VALUES
(1, 'service-3.jpg', ' Pacakge 1', '6 Service in 1 Year', '10000', 'The cost of new spare parts may vary, leading to different charges being applied.', 'Oil Change', 'Brake Service', 'Tire Rotation and Balancing', 'Wheel Alignment', 'Engine Diagnostics', 'Air Conditioning Service', 'Suspension Repairs', 'Exhaust System Repairs', 'Electrical System Repairs', 'Fuel System Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `add_car_rent`
--

DROP TABLE IF EXISTS `add_car_rent`;
CREATE TABLE IF NOT EXISTS `add_car_rent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `dprice` varchar(255) NOT NULL,
  `dfuelcharge` varchar(255) NOT NULL,
  `wprice` varchar(255) NOT NULL,
  `wfuelprise` varchar(255) NOT NULL,
  `mprice` varchar(255) NOT NULL,
  `mfuelprice` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_car_rent`
--

INSERT INTO `add_car_rent` (`id`, `image`, `name`, `dprice`, `dfuelcharge`, `wprice`, `wfuelprise`, `mprice`, `mfuelprice`) VALUES
(4, 'Honda.Amaze.jpg', 'Honda Amaze', '1700', '500', '5700', '2500', '11500', '5000'),
(5, 'car-3.jpg', 'tata ev', '1500', '500', '5000', '2000', '10000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `add_car_slider`
--

DROP TABLE IF EXISTS `add_car_slider`;
CREATE TABLE IF NOT EXISTS `add_car_slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_car_slider`
--

INSERT INTO `add_car_slider` (`id`, `image`, `name`) VALUES
(2, 'Honda.City.jpg', 'Honda City');

-- --------------------------------------------------------

--
-- Table structure for table `add_insurance`
--

DROP TABLE IF EXISTS `add_insurance`;
CREATE TABLE IF NOT EXISTS `add_insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_insurance`
--

INSERT INTO `add_insurance` (`id`, `name`, `validity`, `type`, `price`) VALUES
(6, 'car insurance', '6 month', 'Fullparty', '1500'),
(7, 'car insurance', '12 Month', 'Third Party', '3500');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `car_booking`
--

DROP TABLE IF EXISTS `car_booking`;
CREATE TABLE IF NOT EXISTS `car_booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_mobile` varchar(255) NOT NULL,
  `down_payment` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_package`
--

DROP TABLE IF EXISTS `car_package`;
CREATE TABLE IF NOT EXISTS `car_package` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_rent`
--

DROP TABLE IF EXISTS `car_rent`;
CREATE TABLE IF NOT EXISTS `car_rent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `modelname` varchar(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `drop_point` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `fuelprice` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_rent`
--

INSERT INTO `car_rent` (`id`, `name`, `email`, `mobile`, `carname`, `modelname`, `pickup_point`, `drop_point`, `price`, `fuelprice`, `address`, `time`, `booking_no`, `booking_date`) VALUES
(12, 'jenish', 'jenish@gmail.com', '7896541236', 'Honda Amaze', 'Honda Amaze', 'mota varachha', 'kamrej', '1700', '500', '19,namdanvan row house', '1 Day', '9576131474', '2024-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evahemdabad`
--

DROP TABLE IF EXISTS `evahemdabad`;
CREATE TABLE IF NOT EXISTS `evahemdabad` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `Chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evahemdabad`
--

INSERT INTO `evahemdabad` (`id`, `station_name`, `address`, `time`, `Chargingpoint`, `direction`, `contact`) VALUES
(1, 'Electric Vehicle Charging Station', 'Opposite Mission Hospitals Church Next To First HP Petrol Pump Surat.', '11:00 AM - 07:00 PM', 'DC   GBT   AC  TYPE 1  TYPE 2  Parking Slot', 'https://maps.app.goo.gl/sJQUyeEjYxHYmjSU6', '+91 1234567890'),
(2, 'Opposite Mission Hospitals Church Station', 'Opposite Mission Hospitals Church Next To First HP Petrol Pump Surat.', '10:00 AM - 07:00 PM', 'AC  DC', 'https://maps.app.goo.gl/Vuyr5wEGkUUu1vRj6', '+91 7057674117'),
(3, 'Tata Power - Pramukh auto Charging Sation', 'Plot No. 409/27-A, Umiya Nagar Society,Near Chosath Jogni Mata Temple,Udhna Magdalla Road Surat.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/gXNBk6wNkgkg8Zb3A', '+91 7506004762'),
(4, 'Tata Power - Ginger Vastrapur Charging Station', 'Opposite The Grand Bhagwati SG Road Bokadev', '10:00 AM - 07:00 PM', 'CCS-IICHAdeMO', 'https://maps.app.goo.gl/2e4jwhoknTyUK4M38', '+91 9223581898'),
(5, 'Tata Power - Riya Autolink Bokadev Charging Station', 'Near Rajpath Club,SG Highway', '10:00 AM - 07:00 PM', 'CCS- IICHAdeMO DC', 'https://maps.app.goo.gl/2e4jwhoknTyUK4M38', '+91 9223581898'),
(6, 'M Glads Charging Station', 'FF-34 Silver Triangle Complex Vyas Wadi Circle Nava Wadaj', '10:00 AM - 07:00 PM', 'GBTAC TYPE 2', 'https://maps.app.goo.gl/2e4jwhoknTyUK4M38', '+91 9879275111 '),
(7, 'Tata Power - Charging Station', 'Ram Nagar, Sabarmati', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/bWcvriLHccsZAQnR6', '+91 8866655666 '),
(8, 'IOCl - Ashtavinayak Charging Station', 'Daskroi', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/KPNjVTKPDrBc5T2B6', '+91 9879814812 '),
(9, 'Tata Power - Yash Motors Charging Station', 'Narolgam', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/8gZ2pvPctyhHZJYp9', '+91 9925241701 '),
(10, 'IOCL - Shree Gokulesh COCO Vejalpur Charging Station', 'Next To Sachin Towers Shyamal Cross Roads, To, Anandnagar Cross Roads', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO Bharat DC-001', 'https://maps.app.goo.gl/mMusdR9TqhKVW4Fn7', '+91 7906001402 '),
(11, 'Tata Power - Riya Autolink Charging Station', 'Near Devkutir Bunglow, Opp Bopal Ambli BRTS Bus Stand, Iscon-Bopal Road', '12:00 AM - 11:00 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/cbz8WjJHnou6nzLUA', '+91 8291637056'),
(12, 'Tata Power - Westside Charging Station', 'Ground Floor, Abhijeet V, Netaji Rd Ellisbridge Opp. Mayor Bungalow, Ellisbridge', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/FG8Usv6Xvq8fDkCC7', '+91 8866010014'),
(13, 'MG - Highway, Makarba Charging Station', 'Plot No 2, Ground Floor, Survey No 841/1 And 2, 10 Signature 1, Near Old Railway Line, SG Highway, Makarba, Ahmedabad', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMO DC', 'https://maps.app.goo.gl/CirpPLte3ytdSoY59', '+91 7229044555'),
(14, 'Tata Power - Fairfield by Marriott (Private - Charger)', 'Ashram Rd, Satyawadi Society, Usmanpura', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO AC TYPE 2', 'https://maps.app.goo.gl/HbLbXyQAfQpkhcZi7', '+91 7961656699'),
(15, 'Tata Power - Ahmedabad One Mall Charging Station', 'Plot No. 216, T. P. Scheme 1, Near Vastrapur Lake, Vastrapur', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/HByuqJb3f3hUM4NZ7', '+91 18008919023'),
(16, 'Tata Power - Yash Motors Charging Station', 'Opp Mayauri Trading Company, Near Asopalav Hotel, Narol Cross Road, Narol', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/u6rAv4ZewmrjMSDj6', '+91 9712988701'),
(17, 'Hp - Autocare Charging Station', 'JUDGES BUNGALOW ROAD, T VILLAGE : BODAKDEV', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/BMFwRiMfLkgtfaNW8', '+91 7926841204'),
(18, 'Tata Power - HP Service Center Sola Charging Station', 'F.P. NO 232/1, Solaroad', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/3J35gYFfZcv65tPk9', '+91 9974080198'),
(19, 'HPCL - Grand Millenium Satellite Charging Station', 'Sector 2, Jodhpur Village', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/5WCA51Mpvjzdk8AV8', '9223581898'),
(20, 'Tata Power - Hotel Taj Skyline(Private - Charger)', 'Sankalp Square 3, Opp Saket 3, Near Nilkanth Green, Sindhubhawan Road, Shilaj', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/wkiZYt98fX4D6CdM7', '7940400000');

-- --------------------------------------------------------

--
-- Table structure for table `evbanglore`
--

DROP TABLE IF EXISTS `evbanglore`;
CREATE TABLE IF NOT EXISTS `evbanglore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evbanglore`
--

INSERT INTO `evbanglore` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'Electric Vehicle Charging Station', 'No 553 Therant Tower Electric F Block Sahakar Nagar.', '10:00 AM - 07:00 PM', 'Socket 3PIN', 'https://maps.app.goo.gl/Hig8Ft7pbrpbaD9u5', '+91 9845839354'),
(2, 'BMW - Navnit Motors Charging Station', 'Survey No 4 Konappana Agrahara Begur Hobli Hosur Road Near Electronic City', '10:00 AM - 07:00 PM', 'Socket 3PIN', 'https://maps.app.goo.gl/VKGXmzQEt5PtPPnf9', '+91 8028520060'),
(4, 'Mahindra - Eva Mall Charging Station', 'Eva Mall, 60, Brigade Road, Bengaluru, Karnataka, 560025', '10:00 AM - 07:00 PM', 'AC PLUGPOINT Socket 3PIN IEC 60309', 'https://maps.app.goo.gl/bHGxKDr7Xbii15JU8', '+91 8041531162'),
(8, 'Arya Hamsa Apartment', '3rd Black Basement Parking No 3G 107 80 Feet Road JP Nagar Phase 8', '10:00 AM - 07:00 PM', 'IEC 60309', 'https://maps.app.goo.gl/23i8TiHSeuMSZwRj6', '+91 7259033232'),
(13, 'Baghirathi India Pvt Ltd - Karle SEZ Charging Station', 'Karle SEZ, 100 Feet Kempapura Main Road, Opp Nagavara Lake, Nagavara', '12:00 AM - 11:59 PM', 'Bharat AC001', 'https://maps.app.goo.gl/9KxLTpCYrQdG1ukj7', '+91  917419853945'),
(14, 'Electric Vehicle Charging Station', 'No 8 & 9 Sita Bhateja Speciality Hospital O Shaughnessy Road Langford Gardens', '10:00 AM - 07:00 PM', 'Socket 3PIN', 'https://maps.app.goo.gl/bHGxKDr7Xbii15JU8', '+91  8040302700'),
(15, 'Ather - Kathriguppe IV Phase Charging Station', '284, Outer Ring Rd, Kathriguppe IV Phase, Banashankari 3rd', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/heBd2Ton8PTGuZKb7', '+91   9789214555'),
(16, 'Ather - Defence Colony, Indiranagar Charging Station', '53, 100th Feet Rd, Defence Colony, Indiranagar,', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/ScLDhSt8ph8BjcpX8', '+91   9789214555'),
(19, 'Kazam - Kadugodi Charging Station', 'Kadugodi', '12:00 AM - 11:59 PM', 'Bharat AC001', 'https://maps.app.goo.gl/NLViYqhi5GbTxKtM7', '+91   9591166440'),
(20, 'IOCL - Sri Ekadrishta Charging Station', 'Sy No 30/8, Begur Hobli Hulimavu', '12:00 AM - 11:59 PM', 'Bharat AC001 AC TYPE 2', 'https://maps.app.goo.gl/vPWCQSnNQX2cZY1d6', '+91   7026965588'),
(23, 'E8 Sub Division Office Banaswadi EVMithra Charging Station', '301,5th Main Rd, HRBR Layout 2nd Block,Kalyan Nagar, Bengaluru, Karnataka 560043', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/1BDCY8tdE34f71eK8', '+91  918217235609'),
(24, 'Kazam - J. P. Nagar Charging Station', '6th Phase, 742, Outer Ring Rd, KR Layout, JP Nagar Phase 6, J. P. Nagar', '12:00 AM - 11:59 PM', 'SocketWall (BS1363)', 'https://maps.app.goo.gl/vPWCQSnNQX2cZY1d6', '+91  9958943092'),
(25, 'Baghirathi India Pvt Ltd - SAP Labs Rd Charging Station( Private Chager )', 'SAP Labs Rd , 128, EPIP Phase II, &, SAP Labs Rd, Opp. KTPO, EPIP Zone, Whitefield', '12:00 AM - 11:59 PM', ' Bharat AC001', 'https://maps.app.goo.gl/9uR2swwUxanXgxC3A', '+91  8069194251'),
(26, 'BMTC - 14, HAL Old Airport Rd Charging Station', '14, HAL Old Airport Rd, Domlur I Stage, 1st Stage, Domlur', '12:00 AM - 11:59 PM', 'Bharat AC001', 'https://maps.app.goo.gl/UNn6Hkw8J8XgBDYcA', '+91  8022873333'),
(27, 'BESCOM - WEST CIRCLE OFFICE Charging Station', '39, Siddhaiah Puranik Rd, Mahatma Gandhi Nagar, Basaveshwar Nagar', '09:00 AM - 05:30 PM', 'Bharat AC001', 'https://maps.app.goo.gl/a4EBzdL7bG8KucFSA', '+91  8023225161'),
(28, 'C6 Sub-Division Office Charging Station', 'M R J Colony, Mathikere, Bengaluru, Karnataka', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/Yon1ViELaEJUtDV56', '+91   919353802584'),
(29, 'BESCO - 3rd Main Rd Charging Station', 'Peenya Industrial Area Phase IV, Peenya', '12:00 AM - 11:59 PM', 'CCS-IIBharat AC001CHAdeMO', 'https://maps.app.goo.gl/hzdnKRXiLFf7MXpY8', '+91 8022873333');

-- --------------------------------------------------------

--
-- Table structure for table `evhydrabad`
--

DROP TABLE IF EXISTS `evhydrabad`;
CREATE TABLE IF NOT EXISTS `evhydrabad` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evhydrabad`
--

INSERT INTO `evhydrabad` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'Electric Vehicle Charging Station', 'Hyderguda Road Himayat Nagar Opposite Old MLA Quarters.', '10:00 AM - 07:00 PM', 'IEC 60309, AC TYPE 1', 'https://maps.app.goo.gl/yw6GF1BwBxzpP72i9', '+91 9642845555'),
(2, 'Powergrid Electric Vehicle Charging Station', 'Hyderabad Next Galleria 2 Hitec City.', '10:00 AM - 07:00 PM', 'DC, GBT', 'https://maps.app.goo.gl/n2G253Pt5LsAWxdg7', '+91 9711181070'),
(3, 'Tata Power - Ground and First', '755 Road Number 36 Kavuri Hills Phase 1 Jubilee Hills.', '10:00 AM - 07:00 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/RaJPnzZ2XMAJdvyEA', '18008332233'),
(4, 'Concard Motor Alkarpuri', 'Rangareddy.', '10:00 AM - 07:00 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/SSLbtvVYW9z1V2Ut9', '+91 9932745283'),
(5, 'Tata Power - Sirimalle Square Charging Station', 'Sirimalle Square Plot No 8 9 10 Survey No 523/B Pillar No 160 Attapur Rajendranagar Mandal.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/GzSoeNB2d84qP4Fh8', '18008332233'),
(6, 'Sagar Ring Road', 'Alekhya Tower Opposite LB Nagar.', '10:00 AM - 07:00 PM', 'IEC 60309, AC TYPE 1', 'https://maps.app.goo.gl/D9TRoZT5eSvvBqqK7', '+91 7799599923'),
(7, 'Mahindra - Automotive Manufacturers Pvt Ltd Charging Station', 'B- 3, IDA Uppal, District Ranga Reddy, Gaddi Annaram, Telangana, Hyderabad.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/SSLbtvVYW9z1V2Ut9', '+91 9650992422'),
(8, 'Fortum Electric Vehicle Charging Station', 'Indian Oil Petrol Pump NH 44 Ruby Block Kompally.', '10:00 AM - 07:00 PM', 'DC, GBT', 'https://maps.app.goo.gl/pudWNgfwt9Lfk6KFA', '+91 8448589218'),
(9, 'Electric Vehicle Charging Station', 'Khushaiguda.', '10:00 AM - 07:00 PM', 'Socket, 3PIN, AC TYPE 1', 'https://maps.app.goo.gl/etxm8tYDC9DtfU5f8', '+91 9989740423'),
(10, 'Kazam - Madhapur Road Charging Station', 'Madhapur Road.', '10:00 AM - 07:00 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/6sVTAaidVGx7UhM9A', '+91 7893670519'),
(11, 'Fortum - Balaji Nagar Charging Station', 'Mumbai Highway Balaji Nagar Kukatpally.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/9xxtvqHBEShgCtSu6', '+91 9650992422'),
(12, 'Fortum - Tanda Charging Station', 'Nadigada Tanda Miyapur.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/9xxtvqHBEShgCtSu6', '+91 9490611090'),
(13, 'Fortum - Electric Vehicle Charging Station', 'HMR NGRI, Near NGRI, Habsiguda Main Rd, Vasant Vihar.', '10:00 AM - 07:00 PM', 'CHAdeMO, GBT, Bharat DC-001', 'https://maps.app.goo.gl/pYpQVtqnc5Npy2eP9', '+91 9650992422'),
(14, 'Fortum - Leelanagar Charging Station', 'No 7-1-22/A Begumpet Flyover Leelanagar Ameerpet.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/dedC6qR5si2uxY6M7', '+91 9650992422'),
(15, 'Fortum - Moosapet Metro Station', 'Pragathi Nagar, Moosapet.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/RaJPnzZ2XMAJdvyEA', '+91 9650992422'),
(16, 'Electric Vehicle Charging Station', 'Rangareddy Opposite John Deer Tractor Showroom.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/pudWNgfwt9Lfk6KFA', '+91 9642896000'),
(17, 'Electric Vehicle Charging Station', 'Sagar Ring Road Alekhya Tower Opposite LB Nagar.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/SSLbtvVYW9z1V2Ut9', '+91 7799599923'),
(18, 'Fortum - HMR Stadium Charging Station', 'HMR Stadium,Stadium Metro Station.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/bpaxpiC2iy6589fo8', '+91 9650992422'),
(19, 'TSREDCO Electric - Charging Station', 'A Block, Vidyut Soudha, 6-3-643, 2nd Floor, Khairatabad Road, Somajiguda.', '10:00 AM - 07:00 PM', 'IEC 60309', 'https://maps.app.goo.gl/1cwBatYgnYsLJhSA9', '+91 7400490903'),
(20, 'Tata Power - Tejaswi Automobiles Charging Station', 'Plot No 4/14, Tata Motors Showroom, Opposite Cyber Towers, Madhapur.', '10:00 AM - 07:00 PM', 'CHAdeMO', 'https://maps.app.goo.gl/JEHgs2yDc8iK4wz69', '+91 7799001155'),
(21, 'Hotel The Golkonda (Private - Charger)', '10-1-124, Mehdipatnam - Banjara Hills Rd, Castle Hills, Venkatadri Colony, Masab Tank.', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/c5VdemCer76CFtX88', '+91 7995015483'),
(22, 'Tata Power - Sohini Tech Park Charging Station', 'Nanakramguda Road, Financial District, Gachibowli.', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/6fCAmboZP6fvBnkJ7', '+91 7995015483'),
(23, 'Sarath charging station', '39, Gachibowli - Miyapur Rd, Whitefields, Kondapur.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/muhi7YGo2S72fA5W6', '+91 9246419559'),
(24, 'OLA EV Charging Station', 'Moosapet P1.', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/RaJPnzZ2XMAJdvyEA', '+91 7400490903'),
(25, 'TML -Venkataramana (S) - Gachibowli', 'JK Chambers, Gachibowli, Beside TATA Motors.', '10:00 AM - 07:00 PM', 'CCS-II, GB/T', 'https://maps.app.goo.gl/YVe669KrtohobHPu8', '+91 7567456456'),
(26, 'Croma - Jubilee Hills Charging Station', 'Croma Building, Plot No.755, Ground & First Floor, Rd Number 36, CBI Colony, Jubilee Hills.', '10:00 AM - 07:00 PM', 'Bharat DC001, GB/T', 'https://maps.app.goo.gl/YVHP3pRKfANtRLrW9', '+91 9246419559'),
(27, 'Tejaswi Motors Charging Station', 'Hitech City Main Rd, Siddhi Vinayak Nagar.', '10:00 AM - 07:00 PM', 'GB/T', 'https://maps.app.goo.gl/41dtfoc8jmVX6ubc8', '+91 8048038729'),
(28, 'IOC Gold Strike LLP', 'IOC Gold Strike LLP , 6-3-927/C&D, Opp Katriya Hotel Entrance, Raj Bhavan Rd.', '10:00 AM - 07:00 PM', 'GB/T', 'https://maps.app.goo.gl/SkFp9V44oPAzSbrK6', '+91 8048038729'),
(29, 'IOC CoCo Begumpet', 'IOC CoCo Begumpet, Begumpet Rd, Old Patigadda.', '10:00 AM - 07:00 PM', 'GB/T', 'https://maps.app.goo.gl/Kxro8tp9DgMc5JQD6', '+91 8048038729');

-- --------------------------------------------------------

--
-- Table structure for table `evmumbai`
--

DROP TABLE IF EXISTS `evmumbai`;
CREATE TABLE IF NOT EXISTS `evmumbai` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `Chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evmumbai`
--

INSERT INTO `evmumbai` (`id`, `station_name`, `address`, `time`, `Chargingpoint`, `direction`, `contact`) VALUES
(1, 'Hotel Accord (Private - Charger)', '32J Nehru Road Santacruz East.', '10:00 AM - 07:00 PM', 'DC, GBT, AC TYPE 1, AC TYPE 2, Parking Slot', 'https://maps.app.goo.gl/KaFFR9Jqo1YazDKDA', '+91 9920112529'),
(2, 'Tata Power - Sub Station Charging Station', '6 Lake Road Sadan Wadi Bhandup West.', '10:00 AM - 07:00 PM', 'DC, GBT', 'https://maps.app.goo.gl/H5KQbQrRzbkgQE9P6', '+91 919223581898'),
(3, 'Tata Power - Phoenix Marketcity Charging Station', 'Ground Floor Lal Bahadur Shastri Marg Parking Lot Kurl.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/UEmphn7iXe398Njb6', '+91 9223581898'),
(4, 'Tata Power - Carnac Receiving (Private - Charger)', 'The Tata Power Company Limited, Corporate Center A, Carnac Bunder.', '12:00 AM - 11:59 PM', 'Bharat AC001, AC TYPE 2', 'https://maps.app.goo.gl/uDJuEUUvv7xLsQAw9', '+91 9223581898'),
(5, 'Tata Power - Malad Charging Station', 'Marve Road Malad', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/iwyJsiYMjpsJxzAk7', '+91 9223581898'),
(6, 'Tata Power - BKC Substation Charging Station', 'Near Asian Heart Hospital Opposite Bharat Diamond Bourse Bandra Kurla Complex Bandra East.', '10:00 AM - 07:00 PM', 'DC, GBT, AC TYPE 2, AC TYPE 1, Parking Slot', 'https://maps.app.goo.gl/bK74YrNp7tfCiias6', '+91 9223581898'),
(7, 'Tata Power - Borivali Receiving Charging Station', 'Housing Colony, Dattapada Road Near Magathane Bus Dept.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/iaN6vg4sQGYthhe89', '+91 9223581898'),
(8, 'Moiz Apartments', '12th Road Santacruz Above Upadhyaya Nursing Home.', '10:00 AM - 07:00 PM', 'Socket, 3PIN', 'https://maps.app.goo.gl/bK74YrNp7tfCiias6', '+91 9869088296'),
(9, 'Tata Power - Trent House (Private - Charger)', 'Trent House, Plot No:C60, Bandra Kurla Complex Rd, Beside Citi Bank, G Block BKC,Bandra East.', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/UG6YTHukEEhjdpLe7', '+91 9223581898'),
(10, 'HPCL - Churchgate Charging Station', '157, Bhanushankar Yagnik Rd, Behind Petrolium House, Backbay Reclamation, Churchgate, Mumbai, Maharashtra.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/jjRoBv8UMgUim15A8', '+91 9975950100'),
(11, 'Tata Power - Keshva Motors Charging Station', 'Shop Number 10 & 11 Marathon Max, Mulund Goregaon Link Rd, Nahur West.', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/w62SL9Fp7mVhCSoZ8', '+91 7045243367'),
(12, 'Tata Power - Mahanagar Gas Charging Station', 'MGL Terminal, Opposite Anik Depot, Wadala.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/w62SL9Fp7mVhCSoZ8', '2224700337'),
(13, 'Tata Power - Zenith Chemical Charging Station', 'MIDC Marol, Andheri East Residing.', '09:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/p5sEgaRy42PfC1qW9', '+91 9223581898'),
(14, 'Tata Power - Jaika Motors', 'Civil Lines, Jaika Motors Pvt Ltd.Post Box No.1 Commercial Road Civil Lines Nagpur.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/7TatemirNfggkDaD9', '+91 9223581898'),
(15, 'EV Plugin - Charging Station', 'Vijay Group Of Companies, Plot No 35, Chandivali, Off Saki Road, Andheri East.', '10:00 AM - 07:00 PM', 'DC, IEC 60309, GBT', 'https://maps.app.goo.gl/55QYg2icnqvXWsMK8', '+91 9004050646'),
(16, 'Tata Power - Hare Krishna Mahindra', 'Mulund West , Building, Plot 1, Udyog Kshtra, Mulund Goregaon Link Rd, Near D Mart Mulund, Salpa Devi Pada, Mulund West.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/EpXYjmj7sa4992w79', '18008332233'),
(17, 'Tata Power - Versova Charging Station', 'KL Walawalkar Marg, Sahayog Nagar, Bhudargarh Colony, Andheri West.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/8vBc3A9RxNHbgcgU7', '+91 9223581898'),
(18, 'Tata Power - Vikhroli Charging Station', 'Vikhroli, The Tata Power Company Limited, 400 KV Project, Vikhroli Sub Station, Godrej Soap Premises.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO, AC TYPE 2', 'https://maps.app.goo.gl/HUixYrm6BMX6PwD58', '+91 7208407887'),
(19, 'Tata Power - Sahara Hospitality Charging Station', 'Vile Parle , Opp. Domestic Airport, Navpada, Vile Parle East, Vile Parle.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/Fvm7sAWB2BppNmnW7', '18008332233'),
(20, 'MG - Aquaria Grande Charging Station', 'Aquaria Grande, Shanti Ashram, Borivali West, Mumbai, Maharashtra, 400103.', '10:00 AM - 07:00 PM', 'AC PLUG POINTAC, TYPE 2', 'https://maps.app.goo.gl/4ryLaiKANLiKnshE6', '+91 9010693756'),
(21, 'Tata Power - Ginger Andheri (Private - Charger)', 'Teli - Gali Road, Andheri (East).', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/j9FGsFQaP53Z5sDSA', '+91 9223581898'),
(22, 'IOCL - Breach Candy Charging Station', 'Bhulabhai Desai Road, Breach Candy, Near Tata Garden.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/RG4KDapyFq3QCLfC7', '18008332233'),
(23, 'Tata Power - Shree Siddhivinayaka Charging Station', 'P. N. 1207, CADELL RD. MUMBAI, PRABHADEVI CADEL RD.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/TPNrvFiFeettAP717', '2224316012'),
(24, 'Tata Power - CSMT Station Charging Station', 'Chhatrapati Shivaji Maharaj Terminus, Fort.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO, Bharat DC-001', 'https://maps.app.goo.gl/mKCqXEsgSPYoZm7d9', '18008332233'),
(25, 'Tata Power - UTI Asset Management Charging Station', 'Bandra Kurla Complex, New Coco At, C-67, Bharat Nagar Rd, G Block BKC, Bandra Kurla Complex, Bandra East.', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/2JrmfM1BDyN2mgRw9', '18008332233'),
(26, 'Tata Power - Zenith Chemical Charging Station', 'B-6, Cross Road B J B Nagar, Bhim Nagar, Andheri East.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/iVAibeHWEYSzs9zMA', '2228379308'),
(27, 'IOCL Kini Causway Charging Station', '36, SV Rd, Santosh Nagar, Bandra West, Mumbai, Maharashtra.', '10:00 AM - 07:00 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/NCNcjhEDYKgJzirTA', '18008332233'),
(28, 'Tata Power - Heritage Motors Ghodbunder', 'Rosa Vista, MH SH 42, Opp. Suraj Water Park, Thane.', '10:45 AM - 10:45 AM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/3q6YRRbiiXEHTiJt7', '18008332233'),
(29, 'Tata Power - Inderjit Cars Charging Station', 'Platinum Building, Ground Floor,Opp. Pleasant Park,Next To Brand Factory Showroom,Mira Road.', '12:00 AM - 11:59 PM', 'CCS-II, CHAdeMO', 'https://maps.app.goo.gl/hstMPVh3DXNsQrbN9', '18008332233'),
(30, 'Tata Power - DC Fast Charging Station', 'SEP-2, B- East Pirojshanagar,, 3, Vikhroli Village Rd, Pirojshanagar, Vikhroli East.', '12:00 AM - 11:00 PM', 'GB/T', 'https://maps.app.goo.gl/Y673aq9MCpgk4oTy6', '18008332233');

-- --------------------------------------------------------

--
-- Table structure for table `evpune`
--

DROP TABLE IF EXISTS `evpune`;
CREATE TABLE IF NOT EXISTS `evpune` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evpune`
--

INSERT INTO `evpune` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'Electric - Vehicle Charging Station', 'Godambe Washing Center, Talegaon, Chakan Road, Talegaon Dabhade.', '10:30 AM - 10:30 AM', 'IEC 60309', 'https://maps.app.goo.gl/D6VnkZpDd4xgfneH6', '+91 9850099278'),
(2, 'Electric Vehicle Charging Station', 'Shah Sarbatwale Katraj Dehu Road.', '10:30 AM - 10:30 AM', 'AC PLUG POINT Socket 3PIN', 'https://maps.app.goo.gl/cDbMkbPpFHRPvxB59', '+91 9822272723'),
(3, 'Tata Power - National Auto Wheels Charging Station', '19/1 Hadapsar, Near Quality Bakery, Industrial Estate.', '10:00 AM - 07:00 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/49yng5WgHkt3qC4J8', '+91 7208099829'),
(4, 'BAFNA MOTORS SHOWROOM Charging Station', 'Swojas Capital, Law College Road, Shanti Sheela Society, Apex Colony, Erandwane.', '10:00 AM - 07:00 PM', 'Bharat DC-0011', 'https://maps.app.goo.gl/nZWaYzqi5GCkynm37', '+91 9881007137'),
(5, 'UTPL - Vehicle Charging Station', 'A18 Aman NiwasSant Gadge Maharaj Housing Society, Shastri Chowk, Bhosari.', '12:00 PM - 12:00 PM', 'AC PLUG POINT', 'https://maps.app.goo.gl/rcEsQEqRirxfZbDm8', '+91 9860491243'),
(6, 'Mahindra - Electric Charging Station', 'Manikcharan, Shilore Road, Shivaji Nagar.', '10:00 AM - 07:00 PM', 'IEC 60309', 'https://maps.app.goo.gl/nZWaYzqi5GCkynm37', '+91 9823785319'),
(7, 'Electric - Vehicle Charging Station', '692/5B Nandadeep Society Near Hotel Tiranga Satara Road.', '10:00 AM - 07:00 PM', 'Socket 3PIN', 'https://maps.app.goo.gl/moBYV663RXMUpccx6', '+91 9960772266'),
(8, 'Nagar Niwas Charging Station', 'Bapodi Gaothan.', '10:00 AM - 07:00 PM', 'AC PLUG POINTIEC 60309', 'https://maps.app.goo.gl/moBYV663RXMUpccx6', '+91 9822959053'),
(9, 'Hyundai - Kothari Electric Charging Station', 'Sr No 18/2/1, Dharmawati Corner, Near Sai Service, Kondhwa Budruk, Kondhwa.', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/SKGnWT37ZEbPs3bMA', '+91 9158984603'),
(10, 'Electric - Vehicle Charging Station', 'Temghar Lavasa Road Mulshi.', '10:00 AM - 07:00 PM', 'AC PLUG POINTSocket  3PIN', 'https://maps.app.goo.gl/LTniBf2SqyLuYndY8', '+91 9764001799'),
(11, 'Cakes & Bites Charging Station', '93/22/B, Jhagde Park, Koregaon Park Road.', '10:00 AM - 07:00 PM', 'AC PLUG POINTIEC 60309', 'https://maps.app.goo.gl/49yng5WgHkt3qC4J8', '+91 9371020990'),
(12, 'IOCL - Trinetra Charging Station', 'Trinetra Petrol Pump, Pune Express Highway, Near Lonavala Toll Plaza, Lonaval.', '10:00 AM - 07:00 PM', 'IEC 60309', 'https://maps.app.goo.gl/4zw1ZFHSStsPbWb27', '+91 9822057263'),
(13, 'Tata Power - Yo Mechanic Charging Station', 'Sr.No. 121, Pawar Vasti, Mumbai Bangalore Highway, Tathawade.', '10:00 AM - 07:00 PM', 'AC TYPE 2 Bharat DC-001', 'https://maps.app.goo.gl/21NdbFz6zpiryUVN7', '+91 8806218585'),
(14, 'Tork Motors Experience Zone - Charging Station', 'Tork Motors Showroom, Epicenter, Law College Rd, Shanti Sheela Society, Apex Colony, Deccan Gymkhana.', '10:00 AM - 07:00 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/2xHLNEZs2GSECYo87', '+91 9607611818'),
(15, 'IOCL - BK Charging Station', '22/3 To 22/5, Rajiv Gandhi Infotech Park, Phase 1 Hinjewadi.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/pWx7ziMgZLvX8YEWA', '+91 9922490809'),
(16, 'Tata Power - Amnora Sport Arena Charging Station', 'Amanora Township , Hadpasar.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/QF5fMhGWohCfWVGZ8', '+91 18008332233'),
(17, 'TATA Power - Amnora Urban Plaza Charging Station', 'No 3, Amanora Park Town Main Rd, Hadapsar.', '12:00 AM - 11:59 PM', 'AC TYPE 2 Bharat DC-001', 'https://maps.app.goo.gl/Kd2EHP6dd2tKnMB79', '+91 7208099829'),
(18, 'Hotel Shivaray (Private - Charger)', 'Lane 04, Old Sai Gym Chowk, Canol Road, Karve Nagar.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/yFEjscyjFJ153jo96', '+91 9527685445'),
(19, 'Tata Power - Balaji Motors Charging Station', 'Tata Motors Service Centre, TML Balaji Motors, Phase 2, Siddharth Nagar Society, Aundh.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMO AC TYPE 2 DC GBT', 'https://maps.app.goo.gl/B8g6As8fV9EtYF7m7', '+91 7208099829'),
(20, 'Tata Power -Ginger Charging Station', 'Near, Indira College Rd, Kala Khadak, Wakad.', '12:00 AM - 11:59 PM', 'Bharat DC-001', 'https://maps.app.goo.gl/K7ebNAFWYu3XEPjX6', '+91 2066773333'),
(21, 'IOCL - Dehu Charging station', 'Ground Floor Dehu.', '10:00 AM - 07:00 PM', 'CCS-II', 'https://maps.app.goo.gl/96FnMfmN7uFxs2R58', '+91 9890012762'),
(22, 'Mahati Industries Pvt. Ltd.Charging Station', 'Corporate Office : 32/33, Near Seven Loves Chowk, Shankerseth Road.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMO AC TYPE 2', 'https://maps.app.goo.gl/92FdYk4dgwHD1rNJ6', '+91 8062245133'),
(23, 'Tata Power - Kumar Sienna (private - Charger)', 'Survey No. 238 - 241, Sadesatra Nali, Next To Suzlon One Earth, Magarpatta Road, Hadapsar.', '12:00 AM - 11:59 PM', 'Bharat AC001 AC TYPE 2', 'https://maps.app.goo.gl/T5VNCuYKBkazqwRJ7', '+91 8668796969'),
(24, 'Tata Power - Crystal Auto Charging Station', 'Crystal Kia Axis Centra Shop No 6,7,8 Axis Centra, Mumbai- Banglore Highway.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/1VBfW8XLikXtHFEM9', '+91 2068280011'),
(25, 'MORAYA TRANSPORT TERMINUS Charging Station', 'PLOT NO GP 109, GROUND FLOOR, BHOSARI.', '12:00 AM - 11:59 PM', 'CCS-II Bharat AC001', 'https://maps.app.goo.gl/HoBJsMFiCJvKe55FA', '+91 18008332233'),
(26, 'Tata Power - Park Royale CHS (Private - Charger)', 'WING-B, PARK ROYALE, Sunshine Villas, Kavde Nagar, Rahatani, Pimpri-Chinchwad.', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/oYnzcjJzyEtNa62C7', '+91 9223581898'),
(27, 'Tata Power - Trishul Charging Station', 'IOCL T-163, Block T, MIDC, Bhosari, Pimpri Chinchwad.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/fWMkktmJTRwZo5UN8', '+91 9881195722'),
(28, 'Tata Power - Rudra Motors Charging Station', 'Gat No 1343/A2, Wagholi Near Ubale Nagar Bus Stop.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/7AQ4cLv8kdqKG75AA', '+91 7208099829'),
(29, 'Tata Power - Ginger Hotel, wakad (Private - Charger)', 'Near Indira College, Wakad Naka.', '12:00 AM - 11:59 PM', 'Bharat DC001 GB/T', 'https://maps.app.goo.gl/K7ebNAFWYu3XEPjX6', '+91 7208099829'),
(30, 'Tata Power - Four Points By sheraton Charging Station', 'Four Point By Sheraton Hotel Premises, 5th Mile Stone, Viman Naga.', '12:00 AM - 11:59 PM', 'CCS-IICHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/LFVFLK1Fyeoq43vy5', '+91 9130048319');

-- --------------------------------------------------------

--
-- Table structure for table `evrajkot`
--

DROP TABLE IF EXISTS `evrajkot`;
CREATE TABLE IF NOT EXISTS `evrajkot` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evrajkot`
--

INSERT INTO `evrajkot` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'MG - Jai Ganesh Charging Station', 'Jai Ganesh MG. Opp Krishna Park , Rajkot-Gondal Highway ,Kothariya', '12:00 AM - 11:59 AM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/nnAuyBuSkdfp5cNe6', '+91 7043910001'),
(2, 'TML - Parin motors Charging Station', '149, Plot No 2, Survey No, NH 8B, Gondal Highway, Near Parin Furniture ,Kothariya', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/rNrW6VysMKR6XyLZ6', '+91 7506004754'),
(3, 'Tata Power - Comfort Inn Legacy By One Earth Charging Station', 'Panchnath Road, Limda Chowk', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/n4XZVyX4QBaNpknB9', '+91 6009960097'),
(4, 'IOCL - Motamawa Charging Station', 'Near Saraza, Opp Cosmoplex Cinema, Kalavad Rd', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/5SrSS1Yk8TUdibYm6', '+91 9223581898'),
(5, 'HPCL-Kuvadva Rajkot Road Anandpar', 'Kuvadva Rajkot Road Anandpar, Near Patel Vihar Garden Restaurant, Rajkot, Gujarat, 360003', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/5TGgRNJPbDnE27Me8', '+91 7878788137'),
(6, 'IOCL - Dwarkadhish Charging Station', 'Survey No 219, Ardoi Kotdasangani', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/7GPm1An8ToCyv1nJA', '+91 9974439345'),
(7, 'IOCL - Omkar Charging Station', 'Survey No 11/1, Paiki 2, Lilapar, Morbi Kankot', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/n17bSDJMKTeUajFa6', '+91 9824133055'),
(8, 'IOCL - Centria Charging Station', 'Survey No 78, Paiki Motamava', '12:00 AM - 11:59 PM', 'CCS-IIBharat DC-001', 'https://maps.app.goo.gl/7WM4aHW3V3tP6x7v6', '+91 9723131513'),
(9, 'JnP Infratech Avadh Food Mall Charging Station', 'Hanjiyasar, Gujarat', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/cwsm2S9uCLSE9PFU8', '+91 7600541364'),
(10, 'IOCL - JAI GANESH BAHUCHAR Charging Station', 'Rajkot - Morbi Hwy, Near Divyshaktidham Temple, Mitana', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/xx5wMjbGyUiQiNrP8', '+91 7829330410'),
(11, 'IOCL - RAVIRAJ KSK Charging Station', 'Morbi Hwy, Tankara, Lakhdhirgadh', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/T1FJCCxvZNjYVDvC6', '+91 7829330410'),
(12, 'IOCL - HARIOM Charging Station', 'Intricast Road Rajan Technocast Gat Shapar', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/UTsAi7WrjGiZMxsA7', '+91 7829330410'),
(13, 'IOCL - AAI SHRI SONAL KSK Charging Station', 'Road, Vincchiya, Pipard', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/3c5PTERgA8YQVcxF8', '+91 7829330410'),
(14, 'IOCL - SHREE GAJANAN KSK Charging Station', 'Rajkot - Morbi Hwy, Gavridad Ratanpar', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/33NoKA5zv9ZKG6KR8', '+91 7829330410'),
(15, 'IOCL - STUTI KSK Charging Station', 'Rajkot Hwy Moviya', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/RBR6tBkZwiM2aq7i9', '+91 7829330410'),
(16, 'IOCL - SHREE GAJANAN KSK Charging Station', 'Baghi', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/zJqLTUKWNNrHtAHF6', '+91 7829330410'),
(17, 'IOCL - AAI SHRI SONAL KSK Charging Station', 'Pipardi', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/RB7D99XnFbcG5hjy6', '+91 7829330410'),
(18, 'IOCL - SHREE MANGALAM Charging Station', 'Zalansar', '06:00 AM - 10:00 PM', '16 Amp', 'https://maps.app.goo.gl/MfmXD257AtC67xr78', '+91 7829330410'),
(19, 'HPCL - Shivaay Charging Station', 'KHOKHADDAD, Khokhaddad - Kotdasangani Rd', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/HLPx5HjV8xSBeh6U8', '+91 9807999897'),
(20, 'Tata Power - Jai Ganesh Auto Hub Charging Station', 'Survey No - 258, Behind Laxman Township, Near Speed Well Party, Mavdi', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/cpExwnLY2RcFGfzj6', '+91 7373723366'),
(21, 'HPCL- EV charging Station', 'Xenhester Innovation Pvt Ltd 2, 10, Gondal Rd, Behind S T Workshop, Samrat Industrial Area', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/HVkJcro4ub7gaZM48', '+91 18008332233'),
(22, 'SSPL- EV charging station', '7RR5 9VR, Jayraj Plot Street Number 1, Vardhman Nagar, Rajkot, Gujarat 360001', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/u2QY1RC8A9oD2C87A', '+91 18008332233'),
(23, 'HPCL- EV charging Station', '8R2C Q69, Govindbag Main Rd, Ranchod Nagar Society, Arya Nagar, Rajkot, Rajkot, Gujarat 360001', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/kF6uKUBHcnyh9hrc9', '+91 18008332233'),
(24, 'HPCL - North Star Charging Station', '2355 G6C, Gondal-Atkot Hwy, Dadva Hamirpara', '12:00 PM - 12:00 PM', 'Bharat AC001', 'https://maps.app.goo.gl/PogLNcTDzZwZLF16A', '+91 2222863900'),
(25, 'SSPL - Halvad Charging Station', 'Halvad Highway, Malia, Khirai', '12:00 PM - 12:00 PM', 'CCS-II', 'https://maps.app.goo.gl/cDUTn4QsvGnQEMf97', '+91 7829330410'),
(26, 'HPCL- Shree Jalaram Charging Station', 'HMH4 7FC, Rapar-Pragpar Hwy, Rapar', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/ZXYoeDFCAgFXRLaS8', '+91 7043910001'),
(27, 'HPCL - Maa Charging Station', '202, Nana Mava Rd, Satyam Park, Shastri Nagar', '12:00 PM - 12:00 PM', 'Bharat AC001', 'https://maps.app.goo.gl/H2g6KZeKud17TDsM6', '+91 9223581898'),
(28, 'HPCL - Shivkrupa Charging Station', 'Kharachiya Rajkot Gujarat', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/Wb1yh9vKXpaxHib7A', '+91 9807999897'),
(29, 'HPCL - Yadunandan Charging Station', 'Yadunandan Petroleum, Mitana Rajkot', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/vY95NvMct9TSGJhM7', '+91 7043910001'),
(30, 'Shree Shakti Charging Station', '423G 75H, Bhavnagar - Rajkot Rd, Bhangda, Gujarat', '10:00 AM - 07:00 PM', 'Bharat AC001', 'https://maps.app.goo.gl/dwtac8j3kTXate7m8', '+91 9223581898');

-- --------------------------------------------------------

--
-- Table structure for table `evsurat`
--

DROP TABLE IF EXISTS `evsurat`;
CREATE TABLE IF NOT EXISTS `evsurat` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evsurat`
--

INSERT INTO `evsurat` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'Electric Vehicle Charging Station', 'Opposite Mission Hospitals Church Next To First HP Petrol Pump Surat.', '11:00 AM - 07:00 PM', 'DC GBT AC TYPE 1 TYPE 2 Parking Slot', 'https://maps.app.goo.gl/sJQUyeEjYxHYmjSU6', '1234567890'),
(2, 'Tata Power - Pramukh auto Charging Sation', 'Plot No. 409/27-A, Umiya Nagar Society,Near Chosath Jogni Mata Temple,Udhna Magdalla Road Surat.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/gXNBk6wNkgkg8Zb3A', '+91 7506004762'),
(3, 'President Charging Station', 'Umiya Nagar Society Near Shree Chosath Udhana Magdalla Road Laxmi Nagar Udhna Surat.', '09:00 AM - 07:00 PM', 'AC GBT DC TYPE 2 AC TYPE 1', 'https://maps.app.goo.gl/sJQUyeEjYxHYmjSU6', '+91 9099978812'),
(4, 'SMC- Parley Point Bridge Charging Station', 'Below Parley Point Bridge, Surat Dumas Road.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/iBcCTFWvPXwXa7QH8', '+91 9099978812'),
(5, 'SMC- Nana Varachha Charging Station', 'Below Fly Over Bridge,Opp. Nana Varachha Health Center, Nana Varachha.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/bmjFEkox3XBnrGpq6', '+91 1234567890'),
(6, 'Tata Power - Umaiya Nagar Charging Station', '409/27-A Umaiya Nagar Society Near Chosath Jogni Mata Temple.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMO', 'https://maps.app.goo.gl/q3doP69AjZ8bgu8R9', '+91 9223581898'),
(7, 'Audi Surat Service Centre', 'Audi Surat, Dumas Road, Plot No 43, Scheme Number 03, Near Rundhnath Mahadev.', '10:00 AM - 07:00 PM', 'AC PLUG POINT', 'https://maps.app.goo.gl/URvEmkzeJvmdZuDz6', '+91 7878788138'),
(9, 'Ichchhapor, Audi Service Surat', 'Audi Service Surat, Plot No A28/2, GIDC Industrial Estate Bhatpore, Ichchhapor.', '10:00 AM - 07:00 PM', 'AC PLUG POINT', 'https://maps.app.goo.gl/n2q5z1P4ktLiApz96', '+91 9824445848'),
(10, 'IOCL - Kisan Charging Station', 'Survey No 20, Karala, Palsana Mohni.', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/xPTnYfxknycU1Kx66', '+91 9825515474'),
(11, 'SMC - Anu-Vrat Dwar Charging Station', 'Below Anu-Vrat Dwar Fly-Over Bridge, Udhana Magdalla Road.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/U12WWjezu3DGtYMT7', '+91 9099978812'),
(12, 'SMC - Piplod Charging Station', 'Parking Area Of Night Food Plaza,Behind Lake View Garden,Piplod.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/FZ2k8ZawVd9QH7wD8', '+91 9223581898'),
(13, 'SMC - Jyotindra Charging Station', 'Jyotindra Dave Udhyan,Opp. Jogani Nagar, Honey Park Road,Adajan.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/ksjVmL7ycKUSL2YR6', '+91 7506004955'),
(14, 'SMC -Sarthana Charging Station', 'Sarthana Nature Park,Nr-Sarthana Jakat.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/aj9VHoJrzPCsdM8a9', '+91 7506004762'),
(15, 'SMC - Valentine Theatre Charging Station', 'Open Plot At T.P. 3, F.P. 76, Near Valentine Theatre, Near Sai Mandir, Opp. Central Mall, Dumas Road.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/xXtmN61sswYWppa98', '+91 9099978812'),
(16, 'SMC - Millennium Market Charging Station', 'Central Zone Fly-Over Bridge,Millennium Market Pay & Use Toilet , Pillar No. 35, Ring Road.', '12:00 PM - 12:00 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/XdZKKapGsx8NQoUJ8', '+91 18008332233'),
(17, 'SMC - Pandesara Charging Station', 'Sarthana Nature Park,Nr-Sarthana Jakat.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/xXtmN61sswYWppa98', '+91 1234567890'),
(18, 'SMC - Parvat Patiya Charging Station', 'Shayama Prasad Mukhrji Community Hall, Parvat Patiya.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/KzawHDXPXmFrbdx2A', '+91 1234567890'),
(19, 'SMC- Dumbhal Charging Station', 'South East Zone Office, SMC, Model Town Road, Dumbhal.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/exaKzKqUEhWcF22W6', '+91 9223581898'),
(20, 'SMC - Jahangirpura Charging Station', 'Jahangirpura Community Hall Parking Area.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/VT6iMEEksTmFh4WE7', '+91 9099978812'),
(21, 'SMC - Palanpore Charging Station', 'Open Plot Beside Palanpore BRTS Bus Depot, Palanpore.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/eqqk4Bxq8dtaKrAw9', '+91 1234567890'),
(22, 'SMC - Adajan Charging Station', 'Below Star Bazar Bridge, Surat Hazira Road, Adajan.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/D4hk5fZRGt6W2FGA6', '+91 7878788138'),
(23, 'SMC - Adajan Sports Complex Charging Station', 'Adajan Sports Complex, Opp. Atman Park, Near L.P. Savani Road, Adajan.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/do7ihLWEmwsejnjK8', '+91 9099978812'),
(24, 'SMC -Sanjeevkumar Charging Station', 'Sanjeevkumar Auditorium,Behind Rajhans Cinema ,Pal.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/uzLKENvBXe2juPATA', '+91 7878788138'),
(25, 'SMC - Ved Charging Station', 'SMC Health Club,Ved Road, Gopal Krishna Gokhale Marg, Darshan Park Society, Pramukh Darshan Society, Dabholi.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOAC TYPE 2', 'https://maps.app.goo.gl/RdcxaMN9YZyFZGFg8', '+91 9223581898');

-- --------------------------------------------------------

--
-- Table structure for table `evvadodara`
--

DROP TABLE IF EXISTS `evvadodara`;
CREATE TABLE IF NOT EXISTS `evvadodara` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `chargingpoint` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evvadodara`
--

INSERT INTO `evvadodara` (`id`, `station_name`, `address`, `time`, `chargingpoint`, `direction`, `contact`) VALUES
(1, 'Tata Power - Manjalpur Charging Station', '312, GIDC Rd, Beside Om Pippadiya Hanumanji Mandir, Ghanshyam Nagar Society 2, Manjalpur.', '10:00 AM - 07:00 PM', 'CCS-II CHAdeMO ', 'https://maps.app.goo.gl/Vuyr5wEGkUUu1vRj6', '+91 18008332244'),
(2, 'Tata Power - ABC Autolink Charging Station', 'No 1401, Ranoli GIDC, NH 64.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO ', 'https://maps.app.goo.gl/7Vm6r18hyAX8kgh49', '+91 9521177507'),
(3, 'Tata Power - SP Motors Charging Station', 'Plot No177, Tp- 13, R.S. No 926/1, Chhani Road, Vadodara.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMO ', 'https://maps.app.goo.gl/1hNcvpTNchAAeDR47', '+91 9521177507'),
(4, 'Tata Power - Hotel Suba Elite (Private - Charger)', 'Near Parsi Agiyari , Fatehganj Main Road.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/L3RRsrBZvRSUYB1y8', '+91 2652785517'),
(5, 'JIO BP - Akshar Chowk Charging Station', 'Reliance Mall, Opp. Srering Health Mall, Near Pitamber Society, Akshar Chowk, Op Road.', '12:00 AM - 11:59 PM', 'CCS-II AC TYPE 2', 'https://maps.app.goo.gl/C4hfLWWis1HUiV6y8', '+91 18008919023'),
(6, 'IOCL - Akshar Charging Station', 'Survey No 487, Ranu, Padra Husepura.', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/nzvfLXQfaqtGfSjm7', '+91 9879955777'),
(7, 'IOCL - Harikrishna Charging Station', 'No 617/P, State Highway Dumad.', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/sLQJ8q1g5ikiN9Rx9', '+91 9898073867'),
(8, 'IOCL - Somnath Charging Station', 'Ground Floor, Dabhasha, Padra Chansad.', '12:00 AM - 11:59 PM', 'Bharat AC001AC TYPE 2', 'https://maps.app.goo.gl/8X3K26wXRFSzBTtLA', '+91 9879559499'),
(9, 'IOCL - Coco Vasna Charging Station', 'Patel Updendra Ashabhai Block No. 109 Survey No.113/P Vasna-Saiyad Road.', '10:00 AM - 07:00 PM', 'CCS-II Bharat DC-001', 'https://maps.app.goo.gl/dzGBm9YHEHi2SssSA', '+91 9724346746'),
(10, 'IOCL - Omkar Charging Station', 'City High Tension Road Subhanpura.', '12:00 AM - 11:59 PM', 'CCS-II CHAdeMOBharat DC-001', 'https://maps.app.goo.gl/p41Qv8HmT2PqJLqy9', '+91 9998011802'),
(11, 'HPCL - COCO Nizampura Charging Station', 'Nizampura Main Rd, Near Military Boys Hostel, Rukshmani Nagar, Nizampura, Vadodara.', '12:00 AM - 11:59 PM', 'Bharat AC001', 'https://maps.app.goo.gl/zR2S7CMroknoEuCS8', '+91 9223581898'),
(12, 'HPCL - Vihal Charging Station', '238-1/B, Ajwa Rd, Gokuldham Society, Kashiba Nagar, Sayaji Park Society.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/a5W5YMbKMzsopvV9A', '+91 2652515411'),
(13, 'IOCL - Ranjit Charging Station', 'TP No 19, Fp No 312 Manjalpur.', '12:00 AM - 11:59 PM', 'Bharat AC001 AC TYPE 2', 'https://maps.app.goo.gl/PAT9yf9wS1nzMhZM9', '+91 9376231312'),
(14, 'HP - COCO Karelibaugh Charging Station', 'Tp Scheme 9, Plt.226, Karelibaug.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/UYcZDA8SqNNmLXMX9', '+91 9825012281'),
(15, 'SSPL- EV charging station', 'Besides Gifts For You, Hitansh Super Store, Opp. SBI Cantonment Branch, Jayesh Colony, Fatehgunj, Vadodara.', '12:00 PM - 12:00 PM', 'AC PLUG POINT', 'https://maps.app.goo.gl/xi8Vq2pq7AEPK9pn9', '+91 18008332233'),
(16, 'HPCL- EV charging Station', 'Alembic City, BIDC Gorwa Estate, Gorwa, Vadodara, Gujarat 390003.', '12:00 PM - 12:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/eY9Lix3EfiKRWy6XA', '+91 18008332233'),
(17, 'Casa Central', 'Subhanpura.', '12:00 PM - 12:00 PM', 'DC   GBT   AC  TYPE 1  TYPE 2  Parking Slot', 'https://maps.app.goo.gl/ciidRFWgqz7pqJHf7', '+91 9409832487'),
(18, 'Tesco Electric Vehicle Charging Station', 'Casa Central,Subhanpura.', '10 AM - 7 PM', 'DC   GBT   AC  TYPE 1  TYPE 2  Parking Slot ', 'https://maps.app.goo.gl/z8NsU7wxMmLAhbkEA', '+91  9409832487'),
(19, 'HPCL - Bhagyalaxmi Charging Station', '46RC 763, Vadodara.', '12:00 AM - 11:59 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/p5T4YtGrrbfuLdbt8', '+91 9521177507'),
(20, 'Charge Zone- Vadodara', '1&2 Manjalpur Road, Near, Vrajdham Mandir Rd, Swarnaganga Society, Vadodara, Gujarat.', '12:00 AM - 11:59 PM', 'CCS-II', 'https://maps.app.goo.gl/h4Daxiji6zMUbxYS6', '+91 9998011802'),
(21, 'Charge Zone- Vadodara', '401, Benison Complex Opp. Shiv Mahal Palace, Old Padra Rd, Vadodara, Gujarat.', '12:00 AM - 11:59 PM', 'Bharat AC001', 'https://maps.app.goo.gl/yDjWK9HDANGCi96M9', '+91 9521177507'),
(22, 'Ronak Charging Station', 'Mshsd Ronak Petroleum Nandod Baroda.', '10:00 AM - 07:00 PM', 'AC TYPE 2', 'https://maps.app.goo.gl/STtTUBmbZMugSMuX7', '+91 9998011802');

-- --------------------------------------------------------

--
-- Table structure for table `fuelahemdabad`
--

DROP TABLE IF EXISTS `fuelahemdabad`;
CREATE TABLE IF NOT EXISTS `fuelahemdabad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelahemdabad`
--

INSERT INTO `fuelahemdabad` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Iocl - S R Patel & Co.', 'Indian Oil Dealer Nizampura Baroda, New Chhani Road Nizampura Main Road Dr Rajendra Prasad Marg, 380019, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel CNG', 'https://maps.app.goo.gl/LkGoZB76ZWznYvAq9', '7862882054'),
(2, 'Iocl - Atul Automobiles Ahmedabad', 'Paldi Ahmedabad, Pritam Nagar Akhada Road, 380007, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/tAjLEqSE2Tczpyam9', '9925019645'),
(3, 'Iocl - Shree Krishna Petroleum', 'Survey No. 107 Memnagar, Sterling Hospital Road 120 Feet Circular Road, 380052, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/hvqEtgnESVMQ8rA78', '9825286888'),
(4, 'Iocl - Neel Petroleum', 'Revenue Survey No.64 Fp No.10 Tps No.3 At Odhav-Ii, B R T S Road, 380038, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Hz3EZrFAZbHTjfj3A', '9824404263'),
(5, 'Iocl - Dhanlaxmi Petroleum', 'Vijay Nagar Naranpura, Ashram Road Stadium Road, 380013, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/qk6dyaBeJ9kLEqbz6', '9825006448'),
(6, 'Iocl - Shree Siddhivinayak Petroleum', 'Near Judges Bungalow Bodakdev, S G Highway Sterling Hospital Road, 380054, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/KZXQg9mNoiTRYzni6', '9925600006'),
(7, 'Iocl - Express Filling Station', 'Memnagar Village Behind Manav Mand Memnagar, Sterling Hospital Road 120 Feet Circular Road, 380052, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/r3rmwKC9zforbQnH6', '9327426053'),
(8, 'Iocl - Bansidhar Automoiles', 'Bagodara-Dhaolka Crossing On Nh8a Bagodra 146 Km, Nh-47 Nh-8a Sh-16, 380001, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/EM7fmozyfhyNaLcg7', '9726250505'),
(9, 'Iocl - Chudasma Automobiles', 'Dhandhuka Taluka, Sh-1 Sh-38, 380001, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/JW4Ph4rH8NxRGMRW8', '9425513582'),
(10, 'Iocl - Dipti Motors', 'Indian Oil Dealer Opp.Jain Merchant Soc., Pritam Nagar Akhada Road, 380007, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ScPGwwR24sWS85KW9', '9825031022'),
(11, 'Iocl - Gujarat Autonarol', 'Indian Oil Dealer 39 Km Ahmedabad-Bombay Nh8 Narol, Narol, 380054, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/MtwtAyyse9UvwDKa6', '9825030252'),
(12, 'Iocl - Gujarat Autousmanpura (ms)', 'Indian Oil Dealer Usmanpura, Stadium Road Service Road Mithakhali Road 120 Feet Circular Road, 380009, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/cKv1kRm9rNCbhC657', '9913769165'),
(13, 'Iocl - Shree Gokulesh Petroleum Narol', 'Indian Oil Dealer Nh8 Opp.Transport Nagar Nh 8 Narol, Opposite Transport Nagar, 382405, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/vDLFAk7WREK9jTZS7', '9824021851'),
(14, 'Iocl - Gurudev Petroleum(r.o)', 'Nr Geeta-Gauri Cinema Main Road Odhav, Near Geeta Gauri Cinema, 380023, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Jn2VB3Q87RGLngBe6', '9824274979'),
(15, 'Iocl - Neel Petroleum', 'Revenue Survey No.64 Fp No.10 Tps No.3 At Odhav-Ii, B R T S Road, 380038, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Hz3EZrFAZbHTjfj3A', '9824404263'),
(16, 'Iocl - Dhanlaxmi Petroleum', 'Vijay Nagar Naranpura, Ashram Road Stadium Road, 380013, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/qk6dyaBeJ9kLEqbz6', '9825006448'),
(17, 'Iocl - Shree Siddhivinayak Petroleum', 'Near Judges Bungalow Bodakdev, S G Highway Sterling Hospital Road, 380054, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/JRB6mXs92rA76EPGA', '9925600006'),
(18, 'Iocl - Express Filling Station', 'Memnagar Village Behind Manav Mand Memnagar, Sterling Hospital Road 120 Feet Circular Road, 380052, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/r3rmwKC9zforbQnH6', '9327426053'),
(19, 'Iocl - Bansidhar Automoiles', 'Bagodara-Dhaolka Crossing On Nh8a Bagodra 146 Km, Nh-47 Nh-8a Sh-16, 380001, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/EM7fmozyfhyNaLcg7', '9726250505'),
(20, 'Iocl - Mileage Petroleum', 'Indian Oil Dealer Nh8 Taluka Dascroi Bareja, Service Road Golden Quadrilateral, 382245, Ahmedabad, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/sWThoiRiiYdGm7AVA', '9436003026');

-- --------------------------------------------------------

--
-- Table structure for table `fuelbanglore`
--

DROP TABLE IF EXISTS `fuelbanglore`;
CREATE TABLE IF NOT EXISTS `fuelbanglore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelbanglore`
--

INSERT INTO `fuelbanglore` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Iocl - Sree Saibaba Service Station', 'Indian Oil Dealers Mg Road Bijapur, Nh-218 Station Road Sh-34, 560002, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/TCNzPGyQTTex8S1Z6', '7896541236'),
(2, 'Iocl - Savita Petroleums', 'Indian Oil Dealers Ramdurg Road Opp.Mlbc Off, Badami Road Sh-14, 560002, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/soBDXc8Wu3VaXA197', '9341889866'),
(3, 'Iocl - Sree Venkateshwara Ser Stn ', 'C-8 Old Madras Road Indira Nagar Dist Bangalore Urban, 80 Feet Road 763, 100 Feet Road 100 Feet Road, 560038, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/riHGfB5nVapfPtEUA', '9738651162'),
(4, 'Iocl - Woodlands Agencies ', 'Raja Ram Mohan Roy Road, St Marks Road 7th Cross Road Church Street M G Road Magrath Road Brigade Road H Siddaiah Road Infantry Road 1, Palace Road, 560001, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ezXdxUvXk7u8FEtbA', '8022233462'),
(5, 'Iocl - Bull Temple Petrol Filling Station ', 'No.20 Bull Temple Road Basavangudi , Bull Temple Road, 560004, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/592og8eFPkECmjRRA', '9845075644'),
(6, 'Iocl - Engrads Gasoline ', 'Mysore Road Opp.Bhel Nayan- Danahalli Post, Danahalli, 560026, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Bvrjk9wxcoCdnVo37', '9448050478'),
(7, 'Iocl - Amar Service Station ', 'S.Y No 125 Yemlur Post Hal Road Varthur Hobli Near Bts Stop Bgl, 90/4, Marathahalli-Sarjapur Road Service Road, 560037, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/7NPe6LtiGm7agMpn9', '9480056969'),
(8, 'Iocl - Swamy Service Station ', '19 Km Madanayakanahalli Tumkur Road, Service Road Sh-5 Service Road Gamharia Road, 562123, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/g9JNtKU59H81JpH76', '9845005777'),
(9, 'locl - Jalahalli Service Station ', 'Msr Road Near Bel Circle Jalahalli, Mathikere, 560013, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/bYJQcWzhMSF5zWhK6', '9844007115'),
(10, 'Iocl - Diamond Service Station', 'No 27kattriguppe Main Road , 942, 21st Main Road Bull Temple Road, 560050, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/QwWMSK4FVgzZkhiVA', '9379843210'),
(11, 'Iocl - Devadas Petrol Station', 'Kv 61 Palace Road, Cunningham Crescent Road Cunningham Road 1, Palace Road Crescent Road Sc Road Kalidasa Road Infantry Road, 560051, Bangalore, Karnataka ', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/x5wbnihiAPMdF9zj7', '9880596232'),
(12, 'Iocl - Shree Service Station', 'Domlur Hal Road, 100 Feet Road 2017, 100 Feet Road 6th Main Road Hotel Royal Orchid Road 763, 100 Feet Road Old Hal Airport Road, 560007, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/jNoHFe2t1wuDxFJp7', '9242964666'),
(13, 'locl - Keerthi Service Station ', 'Virgo Nagar Hosakote Kodi, Service Road Sh-35 Golden Quadrilateral, 560049, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/NMYvkxa1R9gn8hdG8', '9448288001'),
(14, 'Iocl - Vijaya Service Station', 'Indian Oil Dealers Dhanavantri Road, Dhanvanthri Road Dewans Road, 560001, Bangalore, Karnataka ', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ygEoFvFp5EvQRb3TA', '9448166424'),
(15, 'Iocl - Mahadeshwara Service Station', 'Devanahalli-Kolar Sh Vijayapura, B B Main Road Sh-96, 562111, Bangalore, Karnataka ', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/5Louj6cgaJ2oCz8d6', '9448519872'),
(16, 'Iocl - Swathi Enterprises - Nagasandra', 'Corporation Dealers 8 Th Mile Stonetumkur Road Nagasandra -73, 1st Main Road Service Road, 560073, Bangalore, Karnataka ', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/bYJQcWzhMSF5zWhK6', '9845027119'),
(17, 'Iocl - Thirumala Service Station ', '233a Hosur Road Bommasandra Indl.Area Anekal Tq, Service Road Hosur Road, 560099, Bangalore, Karnataka', '06:00 AM - 10:00 PMM', 'Petrol Diesel', 'https://maps.app.goo.gl/mshxK5NDaHaQKqy7A', '9844065445'),
(18, 'cl - C.puttaiah & Sons', 'Sirur Park Road Seshadripuram, Sc Road Crescent Road 8th Cross Road Kalidasa Road 1, Palace Road Cottonpet Main Road, 560020, Bangalore, Karnataka ', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/KW1pL9RhYDVUuG65A ', '9448621868'),
(19, 'Iocl - Rajiv Filling Station ', 'Basavangudi Vani Vilas Circle, Sajjanrao Circle H Siddaiah Road Lalbagh Main Road Elephant Rock Road, 560004, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/VRMWxTPQyZ2wXpbt7 ', '9902017621'),
(20, 'Iocl - Shivaji Service Station', ' 154 Cottonpet Main Road, Belimut Road Cotton Pete Main Road Police Road 1st Cross Road Mill Cross Road, 560054, Bangalore, Karnataka', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Ajp78Nmjtfu5Jtz48 ', '9827063563');

-- --------------------------------------------------------

--
-- Table structure for table `fuelhydrabad`
--

DROP TABLE IF EXISTS `fuelhydrabad`;
CREATE TABLE IF NOT EXISTS `fuelhydrabad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelhydrabad`
--

INSERT INTO `fuelhydrabad` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Bharat Petroleum Corporation Ltd', 'Survey No 400 Attapur Opposite Pillar No 137, Attapur, 500030, Hyderabad, Telangana.', '12:00 AM - 10:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/64DA9DsLFSZFKh1n8', '+91 7862882054'),
(2, 'Bpcl-fil More', 'Survey No 400 Attapur Hyderabad, Attapur, 500030, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/qXgm1EkUcCWUH7kf6', '+91 9848246786'),
(3, 'Bpcl-jubilee Hills Fill Stn', 'Road No 1 Jubilee Hills Hyderabad, Jubilee Hills, 500033, Telangana.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/RAWtFnifqyzc96Fx9', '+91 9963077247'),
(4, 'Bpcl-hitech Filling Station', 'Survey No 89 Hafeezpet Hyderabad , Hafeezpet, 500050, Telangana.', '06:00 AM - 09:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/DfzkC9hq3R1NUgYa8', '+91 9703191166'),
(5, 'Bpcl-venkat Goud Petro Mart', 'Survey No 398 & 399, Kapra Medchal Hyderabad, Medchal, 500061, Telangana.', '06:00 AM - 07:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/AWqbk2j9HpdKY7FUA', '+91 9550854423'),
(6, 'Bpcl-kesoram Sundarlal Fatehpuria', 'Plot No 3 To 5, Survey No 20, Bandlaguda, Uppal Nagole Hyderabad, Nagole, 500068, Telangana.', '06:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/pEYqrivvDKfNiDdK7', '+91 9848053947'),
(7, 'Bpcl-keshav Petrofil', 'Survey No 178 Kukatpalli Hyderabad, Kukatpalli, 500072, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/GNg3D361yYX4K2QU7', '+91 9246548836'),
(8, 'Bpcl-lakshmi Narasimha Filling Station', 'Survey No 667, Nh 9 Kukatpalli Hyderabad, Kukatpalli, 500072, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/yZHMoCsyKFbt73Kf7', '+91 9885555223'),
(9, 'Bpcl-hippocampus Ser.stn', 'Door No 103 Hippo Campus Service Station Hyderabad, Hippo Campus Service Station, 500003, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Apyu3PKmuVWwfBxD6', '+91 9246150816'),
(10, 'Bpcl-r.k. & Sons', 'No 28 Sd Road Hyderabad, Sd Road, 500003, Telangana.', '06:00 AM - 11:59 PM', 'Petrol, Diesel', 'https://maps.app.goo.gl/hwdKXAqSnm9zWXbB9', '+91 9849005880'),
(11, 'Bpcl-ambadevi & Co', 'Survey No 156, Chandrayangutta Kandikal Hyderabad, Kandikal, 500005, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/NH6AKqjkLGNb4U7SA', '+91 9440969582'),
(12, 'Bpcl-university Flg Stn', 'No 36 Tarnaka Main Road Hyderabad , Tarnaka Main Road, 500007, Telangana.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/v9gMVFiwqtiE5Zhe8', '4027001065'),
(13, 'Bpcl-s V Goud Fuel Point', 'Survey No 136, Jillelguda, Rci Main Road Saroor Nagar Hyderabad , Saroor Nagar, 500097, Telangana.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/6p7kAWgdt4kUrYZ49', '+91 7013970557'),
(14, 'Bpcl-tas Filling Station', 'Survey No 166, Meerpet Main Road Saroor Nagar Hyderabad, Saroor Nagar, 500097, Telangana.', '06:00 AM - 07:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Mrj3whK8TPELXCag9', '+91 9912200555'),
(15, 'Bpcl-jayabheri Fill. Stn.', 'Ground Floor, Nh 7 Pet Basheerabad Hyderabad , Pet Basheerabad, 500855, Telangana.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/yxiJ2xhvLwrnR5HX9', '+91 8187083351'),
(16, 'Bpcl-suguna Petronet Services', 'No 7, 9 To 11 & 57 A, Sy No 279 & 280 Jeedimetla Hyderabad, Jeedimetla, 500855, Telangana.', '05:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/1uCXJvV4YDBNX2co7', '+91 9849494787'),
(17, 'Bpcl-fil More (attapur)', 'Survey No 400, Opposite Pillar No 137, Attapur, 500030, Hyderabad, Telangana.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/DMWY6NumiQQM7QjE9', '+91 9848246786'),
(18, 'Shell-habsiguda', 'Ranga Reddy District, Habsiguda, 500007, Hyderabad, In, Habsiguda, 500007, Hyderabad, Telangana.', '06:00 AM - 11:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/qeuLud8QVvDxc2Hq6', '+91 9866122898'),
(19, 'Bpcl-vennela Filling Station', 'Survey No 38 & 41, Plot No 2 Inorbit Mall Road Hyderabad, Inorbit Mall Road, Telangana.', '06:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ao4nPrDAXMEaL35k7', '+91 8340977777'),
(20, 'Reliance-petrol Pump (rajendra Nagar)', 'Survey No 40 & 41, Rangareddy, Upparpally Rajendra Nagar Hyderabad, Rajendra Nagar, 500048, Telangana.', '06:00 AM - 05:59 AM', 'Petrol Diesel', 'https://maps.app.goo.gl/3o9RcPvtk17aXm9G6', '+91 9848021480');

-- --------------------------------------------------------

--
-- Table structure for table `fuelmumbai`
--

DROP TABLE IF EXISTS `fuelmumbai`;
CREATE TABLE IF NOT EXISTS `fuelmumbai` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelmumbai`
--

INSERT INTO `fuelmumbai` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Bpcl - Taximens Services Ltd', 'No 14, Gokuldas Pasta Road Dadar Mumbai , Dadar, 400014, Maharashtra.', '06:30 AM - 11:30 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/KYGTCa82nCftmPGB8', '7862882054'),
(2, 'Bpcl - Manhas Auto Service', 'Acharya Donde Marg Sewri Mumbai , Sewri, 400015, Maharashtra.', '07:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/PGoHkShjGgiHn3aV8', '2224132434'),
(3, 'Bpcl - Shaheed Bapurao Dhurgude Autowork', 'Ground Floor Messent Road Mumbai, Messent Road, 400015, Maharashtra.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/2t3SsXxayLYzM3ej9', '+91 9967715902'),
(4, 'Bpcl - Bharucha Auto Service', 'Sitladevi Temple Road Junction Mahim Mumbai , Mahim, 400016, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/a1CgX2mEhRHsZLPS7', '+91 9820279913'),
(5, 'Bpcl - Bp Churchgate', 'No 89, Cci, Churchgate Veer Nariman Road Mumbai -, Veer Nariman Road, 400020, Maharashtra.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/HAYi5XztQ1CmYb5F9', '+91 9594262419'),
(6, 'Bpcl - Express Services Qr', 'No 107 A, Queens Road Churchgate Mumbai , Churchgate, 400020, Maharashtra.', '07:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Ye2yzmLqA78aDQuT9', '+91 9867245225'),
(7, 'Bpcl - Desai Auto Service', 'No 30, Sion Circle Sion Mumbai, Sion, 400022, Maharashtra.', '07:00 AM - 07:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/stQiXc3R8tXAt8it9', '+91 8108589666'),
(8, 'Bpcl - Noble Motors', 'Ground Floor Haji Ali Mumbai , Haji Ali, 400026, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/o4gWbFWrKgVddek49', '+91 9821513807'),
(9, 'Bpcl - New Kampala S. Station', 'Plot No Cs 744 Peddar Road Mumbai , Peddar Road, 400026, Maharashtra.', '06:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/3qKidaQ6AaH4K62p6', '+91 9870438913'),
(10, 'Bpcl - Bombay Petroleums', 'R G Gadkari Chowk, Shivaji Park Dadar Mumbai , Dadar, 400028, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/H44YQeAvok96rF1w5', '+91 9892192883'),
(11, 'Bpcl - Lakhbir Automobiles', 'Sg Barve Marg Santacruz Mumbai , Santacruz, 400029, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/xEd8fzuYDjmwFJ159', '+91 9820093029'),
(12, 'Bpcl - Ravi Auto Services', 'Plot No 271, Dr Annie Besant Road Worli Mumbai , Worli, 400030, Maharashtra.', '07:00 AM - 09:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/4xzDRsJJqSYjgVUJ9', '2224222422'),
(13, 'Bpcl - Uganda Service Station', 'Plot No 44, Rafi Ahmed Kidwai Road Wadala West Mumbai , Wadala West, 400031, Maharashtra.', '05:30 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/c8ipToc15zXtbDui6', '2224125752'),
(14, 'Bpcl - Gill Auto Service', 'Ground Floor Cotton Green Mumbai, Cotton Green, 400033, Maharashtra.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/pPqwu8BX8ovq5yFZ6', '+91 9820037225'),
(15, 'Bpcl - Kenia Automobiles', '1st Avenue, Boundary Rd, Cotton Green East Sewri West Mumbai , Sewri West, 400033, Maharashtra.', '06:30 AM - 09:30 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/jngSb5K3ox96VSWF7', '2223725085'),
(16, 'Bpcl - Dayaram Santdas & Co', 'Plot No 100a Bhulabhai Desai Road Mumbai, Bhulabhai Desai Road, 400036, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/3pdJj29YwXz3Jjb5A', '2223649841'),
(17, 'Bpcl - Daulat Automobiles', 'Plot No 42, Ramjibhai Kamani Marg Ballard Estate Mumbai , Ballard Estate, 400038, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/f3YodpToSuphCGTY7', '+91 9820086843'),
(18, 'Bpcl - Gateway Auto Services', 'Ground Floor Ch Shivaji Maharaj Marg Mumbai , Ch Shivaji Maharaj Marg, 400039, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/xpXTh478StQku9pT6', '+91 9004047334'),
(19, 'Bpcl - Bp-bandra Kurla Complex', 'Plot No Pp 2, Bandra Kurla Complex, Block 6, G Tex Bandra East Mumbai , Bandra East, 400051, Maharashtra.', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/K1co2fLpjhdxZigj9', '+91 9322656814'),
(20, 'Bpcl - New Kampala S. Station Adhoc', 'Plot No 2, Tps 5, Khira Compound Santacruz West Mumbai , Santacruz West, 400054, Maharashtra.', '07:00 AM - 11:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/CbZErZeB69xdp8eJ9', '2226601165'),
(21, 'Bpcl - Om Siddheshwari Fuel World', 'Sv Road, Irla Signal, Bharucha Baug Andheri West Mumbai, Andheri West, 400058, Maharashtra.', '06:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/VkaLBr8djcupAFie8', '+91 9967862895');

-- --------------------------------------------------------

--
-- Table structure for table `fuelpune`
--

DROP TABLE IF EXISTS `fuelpune`;
CREATE TABLE IF NOT EXISTS `fuelpune` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelpune`
--

INSERT INTO `fuelpune` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Shell - Ranjagaon', 'Taluka Shirur, 412209, Pune, In, Ranjagaon, 412209, Pune, Maharashtra.', '06:00 AM - 10:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/HttJ758b85eQRuZr8', '+91 9975564021'),
(2, 'Shell - Koregaon Bhima', 'Koregaon Bhima ,Shirur, 412216, Pune, In, Koregaon Bhima, 412216, Pune, Maharashtra.', '06:00 AM - 11:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/cbtFch5jVdUmPkxq8', '+91 9823582628'),
(3, 'Shell - Wagholi 2', 'Wagholi, 412207, Pune, In, Wagholi 2, 412207, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/j1rgbcAztnqTGz4m9', '+91 7447797750'),
(4, 'Shell - Wagholi Rd', 'Opp Pck Warehouse, Nagar Pune Rd, 411014, Pune, In, Wagholi Rd, 411014, Pune, Maharashtra.', '09:00 AM - 06:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/vEeouiSDwiMumVSk6', '+91 7447797750'),
(5, 'Shell - Solapur Rd', 'Nh9, Vill Loni Kalbhor, 412204, Pune, In, Solapur Rd, 412204, Pune, Maharashtra.', '12:00 AM - 12:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/3pbmEbrXuFiegWyt5', '+91 9762051150'),
(6, 'Shell - Nagar Road', 'Near Hadapsar Bypass,Pune- Nagar Ro, 411014, Kharadi, Pune, In, Nagar Road, 411014, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/LW13uWX5JyPW2yyG9', '+91 7420876410'),
(7, 'Shell - Chakan', 'Nasik Rd, Chimbali Phatak, T Khed, 410501, Pune, In, Chakan, 410501, Pune, Maharashtra.', '05:00 AM - 09:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/1PnFSx77qi8Di3Xc8', '+91 7028911213'),
(8, 'Shell - Kharadi', 'Kharadi, 411014, Pune, In, Kharadi., 411014, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/BvxoMfrLvm7kpbTn8', '+91 9011002961'),
(9, 'Shell - Chikhali Exit', 'Dehu Moshi Road, 411062, Pune, In, Chikhali Exit, 411062, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/k8gqy4P7QRatr1259', '+91 9284826604'),
(10, 'Shell - Khalambure Chakan', 'Talegaon Chakan Road, 410507, Pune, In, Khalambure Chakan, 410507, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/oGu7E3QMtHWSRXrZA', '+91 8087459646'),
(11, 'Shell - Magarpatta', 'Mundhwa Kharadi Bypass, 411036, Pune, In, Magarpatta, 411036, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/HtUwWpgbnMGEb9kZA', '+91 9960280669'),
(12, 'Shell - Hadapsar', 'Hadapsar, 411028, Pune, In, Hadapsar, 411028, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/z11Me1qES1bD91LK9', '+91 8788323633'),
(13, 'Shell - Chinchwad', 'Chinchwad Pcmc, 411019, Pune, In, Chinchwad, 411018, Pune, Maharashtra.', '05:00 AM - 09:00 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/Hkcmf6VGLXkDudGi6', '+91 8830864171'),
(14, 'Shell - Kalasagar', 'Pimpri, Pcmc, 411018, Pune, In, Kalasagar, 411018, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/NwyQSCBUF2oafCxg9', '+91 9067391080'),
(15, 'Shell - Pimpri', 'Old Bombay Rd, Kasarwadi, Pcmc, 411018, Pune, In, Pimpri, 411018, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/PaBtendV7jYe3BxC9', '+91 9284826604'),
(16, 'Shell - Sadhu Vaswani Road - Pune', 'Tal.- Haveli, Dist.- Pune, 411001, Pune, In, Sadhu Vaswani Road - Pune, 411001, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/owv8e6YpZ919ALFv5', '+91 7028600979'),
(17, 'Shell - Mohammadwadi, Pune', 'Tal- Haveli, 411028, Pune, In, Mohammadwadi, Pune, 411028, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/TXPt5iUGYEpT2o5KA', '+91 9922609394'),
(18, 'Shell - Air India House,rto Chowk', 'Near Rto F.P. No. 308 Of Air India, 411001, Pune, I, Air India House,Rto Chowk, 411001, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/PmHKKWxYV5ngfKnj9', '+91 8888003456'),
(19, 'Shell - Pimple Gurav', 'Pimple Gurav, 411061, Pune, In, Pimple Gurav, 411061, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/hEGyEnJPn4rZg7Wi7', '+91 9922212097'),
(20, 'Shell - Shivajinagar', 'Wellesley Road), 411003, Pune, In, Shivajinagar, 411003, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/j9ybkE76NHSRQ6LcA', '+91 9892216958'),
(21, 'Shell - Ambegaon', 'Ambegaon Budruk, 411046, Pune, In, Ambegaon, 411047, Pune, Maharashtra.', '12:00 AM - 11:59 PM', 'Gasoline Petrol Diesel Shell V-power', 'https://maps.app.goo.gl/4fn1qn7iqScWcRCs8', '+91 8007860078');

-- --------------------------------------------------------

--
-- Table structure for table `fuelrajkot`
--

DROP TABLE IF EXISTS `fuelrajkot`;
CREATE TABLE IF NOT EXISTS `fuelrajkot` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelrajkot`
--

INSERT INTO `fuelrajkot` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Reliance-petrol Pump -jasdan', 'Survey No 36-1p, Kamalpar, Chotila Road Jasdan Rajkot , Jasdan , 360025, Gujarat', '06:00 AM - 06:00 AM', 'Petrol Diesel CNG', 'https://maps.app.goo.gl/vk7DS81EXE45wcp7A', '9879520412'),
(2, 'Reliance-petrol Pump -kuvadva Road', 'No 2953-54 Paiki Kuvadva Road Rajkot, Kuvadva Road, 360004, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/z4kJShoM3mjYi1mk6', '9825226268'),
(3, 'Hpcl-fuel Station Kharachia', 'R5c8 P8x, Gj Sh 97, Sahid Kharachia, Kharachia,, Kharchiya, 360470, Rajkot, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/4qAo23r3UKF99C8u9', '7359572808'),
(4, 'Hpcl-fuel Station Jamvadi', 'Wqp9 Xmg, Gidc Jamvadi, Jamwani Gidc, Gondal,, Jamvadi, 360007, Rajkot, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/1ro8JuGA4CMSwinT9', '9427171426'),
(5, 'Bpcl - Shree Krishna Petroleum', 'Nh.8-B, Upleta, Rajkot, Gujarat, 360490, Upleta, 360490, Rajkot, Gujarat', '06:00 AM - 10:30 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/E2MotTQa7LKb1QHk9', '1800224344'),
(6, 'Bpcl - Adhiya & Sons', 'Nr. College Chowk, Gondal, Rajkot, 360311, Gondal, 360320, Rajkot, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Ajp78Nmjtfu5Jtz48', '1800224344'),
(7, 'Iocl - Eagle Petroleum', 'Kanya Chhatralaya Road Bhilvas Indian Oil Dealer, Bhilvas Main Road Thakkar Bapa Chatralay Road Eklavya Chowk, 360001, Rajkot, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/jzXZUty66tBiiDku8', '9925111111'),
(8, 'Iocl - Hitraj Petroleum', 'Sh25 Taluka - Padadhari Indian Oil Dealer, Sh-25 Rajkot Jamnagar Highway, 360110, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/5L2WwhXEjXG6Rdd78', '9913900011'),
(9, 'Iocl-anmol Fuels', '150 Feet Ring Road Near Raiya Road Chokdi Rajkot District Rajkot, Raiya Road, 360002, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/LEmspAuWeQaCT3gD9', '9033555955'),
(10, 'Iocl-gajanan Petroleum', 'Nh 8 B Village Kuchiyadal Tal: Rajkot District Rajkot, Kuchiyadal, 362221, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/kBvYpon8maw443aV8', '9979895977'),
(11, 'Iocl - Bapa Sitaram Petroleum', 'Nana Mava150 Ft. Ring Road Indian Oil Dealer, 150 Feet Ring Road Service Road Sardar Patel Park East Sheri No 1, 360002, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/NfeBAQBma1jZ1W4s5', '9824104818'),
(12, 'Iocl - Jalaram Transport Co', 'Indian Oil Dealer Kalavad Road Kotechanagar, Sh-23 Service Road Kalavad Road Kalawad Road Shree Guru Golwalkar Marg, 360001, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/5oM3NDrqMT5WWrdSA', '9825933338'),
(13, 'Iocl-jay Somnath Petroleum', 'Madhapar Rajkot Jamnagar Sh -25 Indian Oil Dealer Dist Rajkot, Sh -25 Indian, 393135, Rajkot, Gujarat', '12:00 AM - 11:59 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/RGPduQYcvx3kTT3q9', '8200833142'),
(14, 'Iocl - Kailash Auto Service', 'Navagam Nh - 8b Opp.Saat Hanuman Temple Kuvada Road, Kuvadva Road Gondal Road Nh-8b Service Road, 360003, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/R2YV6i8pRKwhpr7o7', '9825226268'),
(15, 'Iocl - Kanabar Petroleum', 'Bedi S.H.- 24 Morbi Road, Morbi Road, 360001, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Q1qNuF2MwcQpokb57', '9428252061'),
(16, 'Iocl - Natraj Petroleum', 'Kotharia Main Road Near Sorathiawadi Circle, Kothariya Main Road No 17 Sheri No 11 Sheri, 360001, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Xtra Premium Petrol Diesel CNG', 'https://maps.app.goo.gl/4xUS1vxLXT5h1yZc7', '7359572808'),
(17, 'Iocl - Nilkanth Petroleum', 'Upleta Nh 8b Porbandar Road Upleta, Nh-27 Nh-8b Service Road, 360490, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Pmbh4TC5p599gtSd9', '9427171426'),
(18, 'Iocl - Nirmal Petroleums', 'Vinchhiya Sh 17 Indian Oil Dealer Jasdan-Vinchiya Rd, Sh-1, 360055, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/sGFcjV4teGDLGWGbA', '9979875545'),
(19, 'Iocl - Rajkamal Transport Co', 'Kotharia Gondal Road Indian Oil Dealer, 150 Feet Ring Road Madhapar Chowk Jamnagar Road, 360006, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/m87eJWs5i36zFXFSA', '9879520412'),
(20, 'Iocl - Sardar Patel Petroleum', 'Chchavadar Sh-6 Near Pipaliya Chowkdi Tal.:Maliya -Miyana, Nh-947 Sh-6, 363660, Rajkot, Gujarat', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/T4W9nzCqB15dBgSn6', '9825225000');

-- --------------------------------------------------------

--
-- Table structure for table `fuelsurat`
--

DROP TABLE IF EXISTS `fuelsurat`;
CREATE TABLE IF NOT EXISTS `fuelsurat` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelsurat`
--

INSERT INTO `fuelsurat` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Iocl - Swati Petroleum', 'Indian Oil Dealer F P No. 150 Umra North Parle Point, Service Road Maharishi Dadhichi Road Chandni Chowk, 395007, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/6zt4q7ovLAW133gd6', '+91 9837868022'),
(2, 'Iocl-om Krishna Petroleum', 'Indian Oil Dealer T.P.S. No. 4 F.P. No. 116 (Umra South) City Light Area, Ankakapalli, 395007, Surat, Gujarat.', '6:00 AM - 23:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/deumVpoqCXhLxrjy8', '+91 9925036999'),
(3, 'Iocl - Shree Petroleum', 'Vill. Pokhran Nh 6 Surat Dhulia Rd Taluka Songargh, Nh-53 Nh-6, 394370, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/5vhMxLCtaVPbNMre6', '+91 9825139016'),
(4, 'Iocl - Boon Gasoline', 'Indian Oil Dealer Unn, Service Road Surat Navsari Main Road Udhna Navsari Road, 394210, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel CNG', 'https://maps.app.goo.gl/3VoYL9XkWDrgnNsD8', '+91 2612750064'),
(5, 'Iocl - Eklavya Petroleum', 'Ibp Dealerongc Charrasta Hajira Rdsh No.12 Village Icchapore, Nh-6 Nh-53 Ongc Chaurasta Hajira Main Road Surat Hazira Road Odpal Road, 394510, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/u5nn5Yot78scW95f6', '+91 9825109494'),
(6, 'Iocl - Magob Gas Station', 'Block No.55 At : Magob On Kadodara Road, Service Road Shree Aai Mata Road, 395010, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ALeUsygyfcfDwARGA', '+91 9825139069'),
(7, 'Iocl - Parul Automobiles', 'Near Sugam Society 463 Surat Bunder Road, Dr Radha Krishnan Marg Vir Arjun Marg Service Road, 395009, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/nwkSvyFc55MvJ4km6', '+91 2612779181'),
(8, 'Iocl - Patel Filling Station', 'Ibp Dealer Gangadhara At Kareliaena Tundi Patia, Dhulia Highway Kadoadara Road Nh-6 Service Road, 394310, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Xtra PremiumXtra Mile Petrol Diesel', 'https://maps.app.goo.gl/Bn7Wdx6KeUv5wQjJ9', '+91 9824113901'),
(9, 'Iocl - Shreedhar Petroleum', 'Rev S No 4641 Ssa No 2 Fp No 242243 Tp Sch No 4 Moje Nava Gam, Begampura Road Sumul Dairy Road Nh-64 Sant Punit Marg Zampa Bazar Main Road Ring Road Shree Aai Mata Road, 395009, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/UV3ZYN3ENWbeKLuF6', '+91 9824138649'),
(10, 'Iocl - Shree Mahalaxmi Petroleum', 'Block No. 110 Vill: Bagumra Tal: Palsana, Nh-6 Dhulia Highway, 394305, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/EXNSoDccCrMfMvgY6', '+91 9879503285'),
(11, 'Iocl - Jalaram Petroleum', 'Survey No. 208209 & Block No. 401 Village: Vankal, Sh-166, 394430, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/QXAesnAUkyZPfy1x8', '+91 9979643276'),
(12, 'Iocl - Vaibhav Laxmi Petroleum', 'Survey No. 48 & 49 Saputara Nashik State Highway Saputara, Surat Saputara Nasik Highway Sh-23, 394101, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/CRUfD3zMZydibc9P8', '+91 9429466555'),
(13, 'Iocl - Shivam Petroleum', 'At&Po: Nani-Naroli Tal: Mangrol On Sh-168, Sh-165, 394410, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/M4M6PRzTrBRGGJKYA', '+91 9427160071'),
(14, 'Iocl - Bajarang Petroleum', 'Revenue Survey No.27 Block No. 51 Vill: Wagheshwar Tal: Mahuva, Ghadoi-Kharvan Road, 394240, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/1Y2TuSMNLN729JK17', '+91 9428456111'),
(15, 'Iocl - Sai Shraddha Petroleum', 'Survey No.412 Block No.409 Vill: Abrama Tal: Kamrej, Sh-602, 394150, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/eaKBnCHVrFCdTUZs7', '+91 7567575000'),
(16, 'Iocl - Pravasi Shri Avdhoot Petroleum', 'Block No.242 Vill: Sarbhon : Bardoli-Navsari Road, Sh-88, 394350, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/GTV75xdtdpCuactB7', '+91 9824353675'),
(17, 'Iocl - Ishwar Krupa Petroleum', 'Survey No. 366 Block No 26 Vill: Tarsadi Bardoli-Mahuva Rd, Sh-165, 395010, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/m9cvFyzbCP2UHpB7A', '+91 9825548717'),
(18, 'Iocl - Shree Marutinandan Petroleum', 'Block No.36 Vill: Haldava Tal: Mahuva, Sh-165, 394248, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/kuL28AABTN1AVX6e9', '+91 9427156974'),
(19, 'Iocl - Jsd Petroleum', 'Block No. 217 Paiki S No.113 Vill: Bamania Tal: Mahuva, Sh-165, 394248, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/C1CnJpP9Qd6W86ct8', '+91 8866220992'),
(20, 'Iocl - Coco Karan', 'Yogeshwar Sr. Station-Adhoc Vill: Karan Nh-8, Service Road Nh-8 Nh-48 Golden Quadrilateral, 394327, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/2Z2gt5iGxVo5QTKD8', '+91 9825100962'),
(21, 'Iocl - Hariom Fuels', 'Block No.485 F P No.07 Pal, Gaurav Path Road Green City Road Service Road Gaurav Path Pal Bhatha Road, 394007, Surat, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/GyZ8ScH5u7KbfHMWA', '+91 9824058062');

-- --------------------------------------------------------

--
-- Table structure for table `fuelvadodra`
--

DROP TABLE IF EXISTS `fuelvadodra`;
CREATE TABLE IF NOT EXISTS `fuelvadodra` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuelvadodra`
--

INSERT INTO `fuelvadodra` (`id`, `station_name`, `address`, `time`, `fuel_type`, `direction`, `contact`) VALUES
(1, 'Iocl - Utkarsh Service Station', 'Indianoil Dealer Karelibaug, Karelibaug Road Mental Hospital Road, 391115, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/AQx7Z61DgSpiBAtZ8', '+91 9737606077'),
(2, 'Iocl - Veer Petroleum', 'Ioc Dealer N.H.No.8p.O.Makarpura, Makarpura Road Makarpura G I D C Road, 390014, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/tMbk17ps5JQQBAcw8', '+91 2652652797'),
(3, 'Iocl - Veer Petroleum', 'Ioc Dealer N.H.No.8p.O.Makarpura, Makarpura Road Makarpura G I D C Road, 390014, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/tMbk17ps5JQQBAcw8', '+91 2652652797'),
(4, 'Iocl - Varun Petroleum', 'Pavi Jetpur Sh 11, Nh-56 Sh-157, 390001, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/TggvFRUgnZRMLgXG8', '+91 9825791999'),
(5, 'Iocl - Yogeshwar Petroleum', 'Ioc Dealer Nh-8 Bye-Pass Dhumad, Golden Quadrilateral Nh-8 Service Road, 391160, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/cc8hZ56nNtoxV8cN9', '+91 9825028389'),
(6, 'Iocl - Shraddha Petroleum', 'Indian Oil Dealer Kapurai - Baroda, Nh-8 Nh-48 Service Road Shreeji Tirth Duplex Road, 390004, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Nzvck9kjrk1FSVqw7', '+91 9898667074'),
(7, 'Iocl-narmada Petroleum', 'Indian Oil Retail Outlet At-Jaduachakjalalanchal-Hajipur Dist-Vaishalibihar, Outlet At, 393151, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/Ti36wKZ8ktz9JG3Q8', '+91 7903296475'),
(8, 'Iocl-veer Petroleum', 'Ioc Dealer N.H.No.8p.O.Makarpura Baroda-390014, Ankakapalli, 363040, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/tMbk17ps5JQQBAcw8', '+91 2652652797'),
(9, 'Iocl - Shree Narayan Petroleum', 'Survey No. 113 Paikee-2 Nanikhadi Tal: Jetpur, Sh-156, 391160, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/AQRXmHporH6dKiCf6', '+91 9725089999'),
(10, 'Iocl - Nav Durga Petroleum', 'Survey No.134 Paiki-2&3 Vill: Ghelwant Baroda- Tal: Chhotaudepur, Sh-11, 391165, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/NTPuwsuRFt65gC1t6', '+91 9727555564'),
(11, 'Iocl - Shree Rang Petroleum', 'Survey No. 868 Vill: Sadhli Sadhli-Segwa Road Tal: Sinor Vado, Sadhli, 391250, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/TTaaPuhkNE1iWPvq8', '+91 9428172646'),
(12, 'Iocl - Sat Kaival Enterprise', 'Block No.1897b Vill:Karakhadi Vill: Karakhadi Tal: Padra, Effluent Canal Project Road, 391450, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/YyqzSUgoDTA4rmPq9', '+91 9825116649'),
(13, 'Iocl - Jay Petroleum', 'Survey No. 322 Vill: Pipaliya Tal: Waghodia, Sh-158, 391760, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/cuWZ2PL1RkXSS6Mk7', '+91 9825788997'),
(14, 'Iocl - Shree Siddhivinayak Petroleum', 'Survey No. 322 Vill: Pipaliya Tal: Waghodia, Sh-158, 391760, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/dJWksZoFw2jCM6jeA', '+91 9925854320'),
(15, 'Iocl - Akshar Kisan Seva Kendra', 'Survey No.487 Vill: Ranu Tal: Padra, Bhoj - Padra - Vadodara Road, 391445, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/VTrBbabm83tnPzWP9', '+91 9879955777'),
(16, 'Iocl - Orsang Petroleum', 'Survey No.59 Vill: Boriyad Tal: Dabhoi, Dabhoi, 390019, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/ycZbf4muRJXrrwTSA', '+91 9825026377'),
(17, 'Iocl - Jay Bhavani Petroleum', 'Revenue Survey No. 50 Paiki-3 Vill: Ranoli, I P C L Road, 391350, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/oDX5uvuLsArrF4Tv8', '+91 9825140291'),
(18, 'Iocl - Satkabir Petroleum', 'Block No.405 Vill: Pingalwada Tal: Karjan , Sh-160 Dabhasha Jambusar Road, 391241, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/shVL6qGJVXidJf4W6', '+91 9825531243'),
(19, 'Iocl - Heny Petroleum Ksk', 'Village - Chikhodra, Tarsali Dhaniyavi Road, 390009, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/dosuhhgbh7hZYHkZ6', '+91 9824419232'),
(20, 'Iocl - Rushabh Petroleum', 'Village - Manjusar Taluka – Savli Shreeji Pesticides Manjusar, Reep Guard Road, 391775, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/1gdFRV8QozaJmayP7', '+91 9825048022'),
(21, 'Iocl - Coco Sinor', 'Balaji Kisan Seva Kendra (Adhoc) Survey No.1324 Vill: Sinor Tal: Sinor, Sh-160, 391115, Vadodara, Gujarat.', '06:00 AM - 10:00 PM', 'Petrol Diesel', 'https://maps.app.goo.gl/vqey7JyKvdivgCpT9', '+91 9898360599');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

DROP TABLE IF EXISTS `home_slider`;
CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `image`, `description`) VALUES
(2, 'carousel-bg-2.jpg', 'Qualified Car Washing Center');

-- --------------------------------------------------------

--
-- Table structure for table `home_team`
--

DROP TABLE IF EXISTS `home_team`;
CREATE TABLE IF NOT EXISTS `home_team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home_team`
--

INSERT INTO `home_team` (`id`, `image`, `name`, `post`) VALUES
(9, 'DSC_0239.JPG', 'jenish', 'Manager'),
(10, 'manthan.jpg', 'biren', 'Mechanic'),
(11, 'banti.jpg', 'banti', 'Mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
CREATE TABLE IF NOT EXISTS `insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `rc_book` varchar(255) NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `old_car` varchar(255) NOT NULL,
  `insurance_type` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `policy_number` varchar(255) NOT NULL,
  `insurance_start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

DROP TABLE IF EXISTS `mechanic`;
CREATE TABLE IF NOT EXISTS `mechanic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rsa_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`id`, `rsa_id`, `username`, `mobile`, `email`, `pickup_point`, `address`, `latitude`, `longitude`, `booking_id`, `status`) VALUES
(26, 19, 'jenish', '7862882054', 'jenish@gmail.com', 'mota varachha', 'mota varachha', '21.2403471', '72.8869815', '8809899840', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_id_reg`
--

DROP TABLE IF EXISTS `mechanic_id_reg`;
CREATE TABLE IF NOT EXISTS `mechanic_id_reg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mechanic_id_reg`
--

INSERT INTO `mechanic_id_reg` (`id`, `password`) VALUES
(1, '786288');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_register`
--

DROP TABLE IF EXISTS `mechanic_register`;
CREATE TABLE IF NOT EXISTS `mechanic_register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conpassword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mechanic_register`
--

INSERT INTO `mechanic_register` (`id`, `name`, `email`, `phone_number`, `username`, `photo`, `password`, `conpassword`) VALUES
(6, 'jenish', 'jenish@gmail.com', '7896541236', 'jenish@mechanic', 'DSC_0239.JPG', '12345678', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `description`) VALUES
(1, 'pic5.png', 'CATL and BYD target 50% battery price cut this year to make EVs affordable', 'This initiative is expected to bring down the price of its VDA specification lithium iron phosphate battery cells to RMB 0.4 per Wh, equivalent to USD 56.47 per kWh.'),
(2, 'pic3.jpg', 'Almost 50% of Indian car buyers prefer to quit ICE tech; 24% to opt for HEVs: Deloitte study', 'Deloitte’s 2024 Global Automotive Consumer Study (GACS) India, which reveals the dynamic shift in consumer preferences in the Indian automotive sector, was conducted during 5-12, October 2023. Deloitte surveyed a sample of 1,000 consumers in India, a press release issued by Deloitte Touche Tohmatsu India LLP, said.');

-- --------------------------------------------------------

--
-- Table structure for table `old_car`
--

DROP TABLE IF EXISTS `old_car`;
CREATE TABLE IF NOT EXISTS `old_car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `registration_year` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `kms_driven` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `insurance_validity` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `RTO` varchar(255) NOT NULL,
  `engine_displacement` varchar(255) NOT NULL,
  `year_of_menufacture` varchar(255) NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `old_car`
--

INSERT INTO `old_car` (`id`, `name`, `email`, `mobile`, `address`, `car_name`, `model_name`, `registration_year`, `fuel_type`, `kms_driven`, `ownership`, `transmission`, `insurance_validity`, `seats`, `RTO`, `engine_displacement`, `year_of_menufacture`, `photo`, `price`, `created_at`) VALUES
(17, 'jenish', 'jenish@gmail.com', '7896541236', 'surat', 'maruti', 'suzuki', 'Jul , 2019', 'Petrol', '25000 Kms', 'Second Owner', 'Manual', 'Comprehensive', '5 Seats', 'GJ05', '888 cc', '2019', 'Honda.Amaze.jpg,Honda.City.jpg,Honda.Civic.jpg,Honda.Elevate.jpg', '396000', '2024-04-07 18:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(50) NOT NULL,
  `hobby` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conpassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `phone`, `gender`, `hobby`, `image`, `city`, `password`, `conpassword`) VALUES
(11, 'jenish', 'jainishkanpariya@gmail.com', '7865963256', 'Male', 'Playing,Reading', 'DSC_0239.JPG', 'Vapi', 'Jenish@123', 'Jenish@123');

-- --------------------------------------------------------

--
-- Table structure for table `r_s_a`
--

DROP TABLE IF EXISTS `r_s_a`;
CREATE TABLE IF NOT EXISTS `r_s_a` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `r_s_a`
--

INSERT INTO `r_s_a` (`id`, `username`, `mobile`, `email`, `pickup_point`, `address`, `latitude`, `longitude`, `booking_id`) VALUES
(19, 'jenish', '7862882054', 'jenish@gmail.com', 'mota varachha', 'mota varachha', '21.2403471', '72.8869815', '8809899840');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

DROP TABLE IF EXISTS `whatsapp`;
CREATE TABLE IF NOT EXISTS `whatsapp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `whatsapp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
