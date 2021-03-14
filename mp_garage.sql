-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 08:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(11) NOT NULL,
  `M_id` int(11) NOT NULL,
  `B_date` date NOT NULL,
  `B_time` varchar(20) NOT NULL,
  `P_id` int(11) NOT NULL,
  `B_status` varchar(20) NOT NULL,
  `C_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_id`, `M_id`, `B_date`, `B_time`, `P_id`, `B_status`, `C_id`) VALUES
(11, 16, '2021-03-14', '13:30', 10, 'สำเร็จ', 32);

-- --------------------------------------------------------

--
-- Table structure for table `cartype`
--

CREATE TABLE `cartype` (
  `C_id` int(11) NOT NULL,
  `C_brand` varchar(50) NOT NULL,
  `C_model` varchar(50) NOT NULL,
  `C_size` varchar(2) NOT NULL,
  `C_color` varchar(50) NOT NULL,
  `C_license` varchar(10) NOT NULL,
  `M_id` int(11) DEFAULT 66,
  `C_delete` int(1) NOT NULL,
  `WORKIN_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartype`
--

INSERT INTO `cartype` (`C_id`, `C_brand`, `C_model`, `C_size`, `C_color`, `C_license`, `M_id`, `C_delete`, `WORKIN_name`) VALUES
(31, 'BMW', 'X1', 'L', 'Black', 'กก9999', 16, 0, ''),
(32, 'Ford', 'Ranger', 'M', 'Pink', 'ยน5484', 16, 0, ''),
(33, 'Honda', 'Civic', 'S', 'Red', 'หก6666', 16, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `P_id` int(11) NOT NULL,
  `P_name` varchar(100) NOT NULL,
  `P_price` varchar(20) NOT NULL,
  `P_size` varchar(2) NOT NULL,
  `P_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`P_id`, `P_name`, `P_price`, `P_size`, `P_delete`) VALUES
(9, 'ล้างรถ', '199', 'S', 0),
(10, 'เคลือบสี', '599', 'M', 0),
(11, 'อบโอโซน', '999', 'L', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `r_username` varchar(50) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_phone` varchar(20) NOT NULL,
  `r_password` varchar(50) NOT NULL,
  `r_confirmpassword` varchar(50) NOT NULL,
  `r_status` varchar(20) NOT NULL,
  `M_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `r_username`, `r_name`, `r_phone`, `r_password`, `r_confirmpassword`, `r_status`, `M_delete`) VALUES
(8, 'admin', 'test_admin', '0222222222', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 0),
(9, 'owner', 'test_owner', '02125454845', '72122ce96bfec66e2396d2e25225d70a', '72122ce96bfec66e2396d2e25225d70a', 'Owner', 0),
(16, 'user', 'test_user', '0222222', 'ee11cbb19052e40b07aac0ca060c23ee', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 0),
(68, 'employee', 'test_employee', 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'Employee', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `booking_user` (`M_id`),
  ADD KEY `booking_car` (`C_id`),
  ADD KEY `package_car` (`P_id`);

--
-- Indexes for table `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `car_owner` (`M_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cartype`
--
ALTER TABLE `cartype`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_car` FOREIGN KEY (`C_id`) REFERENCES `cartype` (`C_id`),
  ADD CONSTRAINT `booking_user` FOREIGN KEY (`M_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `package_car` FOREIGN KEY (`P_id`) REFERENCES `packages` (`P_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cartype`
--
ALTER TABLE `cartype`
  ADD CONSTRAINT `car_owner` FOREIGN KEY (`M_id`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
