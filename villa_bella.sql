-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2022 at 01:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villa_bella`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_ID_type` varchar(255) NOT NULL,
  `booking_number` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_price` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `max_persons` varchar(255) NOT NULL,
  `check_in_date` varchar(255) NOT NULL,
  `check_out_date` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `admin_remark` varchar(255) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Single Room'),
(2, 'Double Room'),
(3, 'Suites'),
(4, 'Deluxe'),
(8, 'Triple Room'),
(9, 'Conference Room');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_date` varchar(255) NOT NULL,
  `contact_status` varchar(255) NOT NULL DEFAULT 'Unread',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_email` (`contact_email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `room_subject` varchar(255) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_price` decimal(10,2) NOT NULL,
  `room_size` varchar(255) NOT NULL,
  `room_view` varchar(255) NOT NULL,
  `no_of_bed` varchar(255) NOT NULL,
  `max_persons` varchar(255) NOT NULL,
  `room_status` varchar(255) NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_subject`, `room_description`, `category_id`, `room_image`, `room_price`, `room_size`, `room_view`, `no_of_bed`, `max_persons`, `room_status`) VALUES
(1, 'Mini Suite', 'A hotel room all to myself is my idea of a good time. Mini Suite Room gives you that.', 'A single room with a bed and sitting area. The sleeping area is in a bedroom separate from the parlour or living room. There is a free wifi, swimming pool allowance, free daily newspaper and a good TV set.', 3, '../assets/hotel_rooms/room-1.jpg', '100000.00', '60 m2', 'Garden View', '1', '1', 'Available'),
(2, 'Family Room', 'Chilling out on the bed in Villa-Bella hotel room watching television, enjoying the moment with family, is the best part of a vacation.', 'This room can accommodate three persons and has been fitted with three twin beds; one double bed and one twin bed or two double beds. Family enjoys a swimming pool allowance, free daily newspaper and a free breakfast.', 8, '../assets/hotel_rooms/room-2.jpg', '150000.00', '65 m2', 'Swimming Pool', '3', '4', 'Available'),
(3, 'Standard Deluxe Room', 'If you want to stay in a hotel room, ease off stress, do your project, enjoy your private time. You\'re home !', 'This room includes several rooms; a living room, a bedroom and a separate functional kitchen. The furniture is cozy and the rooms are exotic. Enjoy a free Wi-Fi, daily newspaper and a private kitchen. You can hire a chef to prepare your desired meals. ', 4, '../assets/hotel_rooms/room-3.jpg', '260000.00', '80 m2', 'The City', '3', '3', 'Available'),
(4, 'Classic Room', 'People do whatever they want in the privacy of their hotel room. Classic room gives you that privacy and time.', 'Classic room is simple and well-dignified with beautifying decorations. It ensures privacy and offers everything you need to be comfortable. There is a work desk, Free Wi-Fi, private bathroom and a shower and a TV set.', 1, '../assets/hotel_rooms/room-4.jpg', '90000.00', '45 m2', 'The Sea', '1', '1', 'Available'),
(5, 'Superior Room', 'You need to have a home to go back to? Superior room is homely! Enjoy unique time with your friend.', 'If you are travelling with your close friend or with a sibling and need to share a room, this room offers you that and more. Enjoy Free Wi-Fi, TV set, Work desk and a free daily newspaper.', 2, '../assets/hotel_rooms/room-5.jpg', '120000.00', '55 m2', 'Garden View', '2', '2', 'Available'),
(6, 'Luxury Room', 'This is an elegant hotel room! Room services are numerous!', 'A super luxury hotel room. Designed to accommodate powerful and wealthy individuals. Facilities here are superb. Enjoy personal assistants, complimentary dinner and breakfast, Free Wi-Fi and Free allowance to hotel facilities.', 2, '../assets/hotel_rooms/room-6.jpg', '350000.00', '75 m2', 'The Sea', '2', '2', 'Available'),
(7, 'Presidential Suite', 'A hotel all to yourself is the idea of a good time. This suite affords you such luxury.', 'The most expensive room provided by our hotel with large living space. The interiors has strong emphasis on grand decoration, high-quality amenities and supplies, and tailor-made services like personal butler during your stay.', 3, '../assets/hotel_rooms/room-7.jpg', '850000.00', '350 m2', 'The City', '2', '2', 'Available'),
(8, 'King Room', 'Staying in a hotel room like King Room makes you sit and think about royalty .', 'A hotel room with a king-sized bed. The interiors are decorated with murals that depicts royalty. Room services are provided. Free Wi-Fi and daily newspaper are assured. ', 4, '../assets/hotel_rooms/room-9.jpg', '120000.00', '70 m2', 'Garden View', '2', '3', 'Available'),
(9, 'Queen Room', 'It\'s bad manners to keep your vacation waiting. Be where you dreamed of. Here is dream fulfilled. ', 'A beautiful room with an effeminate style. Her decorations lightens up your emotions. Ladies on a business and vacation trip would enjoy her services. This room is fun. Free Wi-Fi and daily newspapers are assured.', 4, '../assets/hotel_rooms/room-8.jpg', '110000.00', '70 m2', 'Swimming Pool', '2', '3', 'Available'),
(10, 'Mini Auditorium', 'There is no time to be bored in world as beautiful as this', 'This mini auditorium has the capacity of containing 35 guests. The adjoined room can contain 5 guests. Designed with nice upholstery and well air-conditioned. Well decorated stage with luminous lights .', 9, '../assets/hotel_rooms/mini-aud.jpg', '250000.00', '900 m2', 'Garden View', '5', '35', 'Available'),
(11, 'Conference Room', 'Blending luxury with business meeting or academic conference is the key. ', 'This conference room has the capacity of containing 15 to 20 guests and 5 persons in her adjoined room. Well decorated and air-conditioned with access to hotel services. Durable and nice furniture that gives maximum comfort. ', 9, '../assets/hotel_rooms/conf-room.jpg', '255000.00', '550 m2', 'The Sea', '5', '20', 'Available'),
(12, 'Mega Auditorium ', 'This is your desired place to host an event. Enjoy our exquisite modern mega auditorium.', 'This mega auditorium has the capacity of containing 200 to 250 guests. The adjoined room can contain 10 guests. Designed with nice upholstery and well air-conditioned. Well decorated stage with luminous lights .', 9, '../assets/hotel_rooms/mega-aud.jpg', '1200000.00', '1200 m2', 'Garden View', '10', '250', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_reg` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `role` varchar(255) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile_number`, `gender`, `email`, `password`, `date_of_reg`, `status`, `role`) VALUES
(3, 'Emmanuel', 'Omemgboji', '07069106259', 'Male', 'emmanuelomemgboji@gmail.com', '$2y$10$030OzV.36678SkrKtlr64O6BuF4FR4/ooSprbjZ0Pm7vKw/YwpCYq', '03/06/21', 'Active', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
