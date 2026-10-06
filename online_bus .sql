
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `bus_details` (
  `bus_name` text NOT NULL,
  `source` text NOT NULL,
  `destination` text NOT NULL,
  `fare` int(50) NOT NULL,
  `seats_available` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `bus_details` (`bus_name`, `source`, `destination`, `fare`, `seats_available`) VALUES
('Hyderabad-Warangal 6:00am Volvo AC', 'Hyderabad', 'Warangal', 450, 32),
('Hyderabad-Khammam 7:30am Deluxe Non-AC', 'Hyderabad', 'Khammam', 380, 41),
('Warangal-Thorrur 9:15am Express', 'Warangal', 'Thorrur', 180, 28),
('Hanamkonda-Manchiryal 1:00pm Super Luxury', 'Hanamkonda', 'Manchiryal', 320, 24),
('Khammam-Hyderabad 5:45pm Sleeper AC', 'Khammam', 'Hyderabad', 470, 18),
('Manchiryal-Hanamkonda 6:30pm Express Non-AC', 'Manchiryal', 'Hanamkonda', 310, 27),
('Hyderabad-Hanamkonda 8:15am Rajdhani Express', 'Hyderabad', 'Hanamkonda', 430, 35),
('Warangal-Khammam 10:00am Telangana Rider', 'Warangal', 'Khammam', 260, 30),
('Thorrur-Hyderabad 11:45am Super Express', 'Thorrur', 'Hyderabad', 340, 22),
('Khammam-Manchiryal 2:30pm Metro Deluxe', 'Khammam', 'Manchiryal', 390, 26),
('Hanamkonda-Thorrur 4:00pm City Link', 'Hanamkonda', 'Thorrur', 170, 33),
('Manchiryal-Warangal 7:15pm Night Express', 'Manchiryal', 'Warangal', 300, 21);




CREATE TABLE `user__details` (
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(6) NOT NULL,
  `cont_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `user__details` (`name`, `email`, `password`, `cont_num`) VALUES
('nagaraju', 'nagaraj@gmail.com', 'nagaraj', '9658741230'),
('satwik', 'satwik@gmail.com', 'satwik', '7896541230'),
('karthik', 'karthik@gmail.com', 'karthik', '9474882315'),
('vishwa', 'vishwa@gmail.com', 'vishwa', '9856321478');


--
ALTER TABLE `user__details`
  ADD PRIMARY KEY (`email`);
COMMIT;

