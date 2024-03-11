-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table databasesell.car_models: ~5 rows (approximately)
INSERT INTO `car_models` (`car_id`, `car_brand`, `carmodel`, `car_motorbike`, `color_car`, `car_registration`, `rental_status`, `car_renter`, `pirce`, `car_img`) VALUES
	(1, 'BMW', 'i8 ROADSTER', 'sedan', 'brown', 'TRUE', 'กข 3432', '10006', 1500000, _binary 0x63713564616d2e726573697a65642e696d672e313138352e6c617267652e74696d65313533333633323730353135342e6a7067),
	(2, 'HOHA', 'civic type r', 'sedan', 'whit', 'พกฟ 001', 'FALSE', '', 40000, _binary 0x63697669635f747970655f725f34372e6a7067),
	(3, 'HOHA', 'civic type r', 'sedan', 'whit', 'พกฟ 001', 'FALSE', '', 4000, _binary 0x63697669635f747970655f725f34372e6a7067),
	(4, 'TOYOTA', 'Yaris', 'SUY', 'BLACK', '1 รก 2345', 'FALSE', '', 50000, _binary 0x316465613635626661663462333831643438633530376536613766383031636438393236383738646235613866353938373561303333333337306635343334352e6a7067),
	(5, 'TOYOTA', 'GR Supra', 'sport', 'Whit', '4 ฟด 4321', 'FALSE', '', 10000, _binary 0x353533336134356465346636363632353763396237313965343438646262326463656465356638373630373832373165653238343866653435363731616137342e6a7067);

-- Dumping data for table databasesell.customer: ~6 rows (approximately)
INSERT INTO `customer` (`user_id`, `f_name`, `l_name`, `id_cradandpassport`, `id_cradorpassport`, `username`, `user_password`, `car_license`, `rentedcar`, `start_renting`, `end_renting`, `access_rights`) VALUES
	(10001, 'nattapon', 'peadamrong', '1869900458789', 'id_crad', 'Nesjaa', '$2y$10$SHnMry6dFgeAJW/uhLrpEO8pZLhTkDET3MdQNJmKO6nSudpH2t24.', 'AD12345', 'พกฟ 001', '2024-03-08 06:44:44', '2024-03-09 06:44:44', 'M'),
	(10002, 'Mwqdwada', 'peadamrong', '1869900458789', 'id_crad', 'NesJaaTH', '$2y$10$Mqi0qFVyU09vkTYXYgx6N.MbCda3UiTa60XBgVHSLRE86FXs9tbaG', 'AD12345', NULL, '2024-03-08 06:08:35', '2024-03-08 06:08:35', 'M'),
	(10003, 'sawdfawdaw', 'asdasdas', '1869900458789', 'id_crad', 'wdwqd', '$2y$10$51tmu6ACM/VrUOycyPp1pO32rvTGefpz5FQ/FVxCLtcBSC7BK4D4u', 'AD12345', NULL, '2024-03-08 06:08:43', '2024-03-08 06:08:43', 'M'),
	(10004, 'nattapon05', 'peadamrong05', '1869900458789', 'id_crad', 'nesjaa05', '$2y$10$oKdMtaROJMJEzmeNUePUU.QA9z.f10XUMRP05r8wxcleKeEaoeC8y', '23145678', NULL, NULL, NULL, 'M'),
	(10005, 'nattapon06', 'nattapon06', '1869900458789', 'id_crad', 'nesjaa06', '$2y$10$HcXoOhsSpt/S5QnzWeVCT.sez4YARlmgXAjK6PzKRB/g5Ugrmehx2', '23145678', NULL, NULL, NULL, 'M'),
	(10006, 'สมศัก', 'รักดี', '1869900458789', 'id_crad', 'sumsak', '$2y$10$2dXWJ0Hlo/BWosNdqdCli.edD4qJaL/uKjlaOTpxKQ3kAZQx3Vl9S', '23145678', 'กข 3432', '2024-03-11 11:57:07', '2024-03-12 11:57:07', 'M');

-- Dumping data for table databasesell.employee: ~4 rows (approximately)
INSERT INTO `employee` (`employee_id`, `f_name`, `l_name`, `ID_card`, `emp_password`, `salary`, `age`, `access_rights`) VALUES
	(002, 'aknarin', 'sinthong', '1231231231231', '$2y$10$5Y.igksz.Y16j5IkkqKZKOmW7wKKzdnP0.WEg9UsTCmszVqHGnHXS', 50000, 21, 'S'),
	(004, 'nattapon01', 'peadamrong01', '1869900458789', '$2y$10$1ToR7ZSTuYt8EfSY/Wx9Cequ2fTOMGTLgAFhlBJNOiWMuZvE2ndDG', 20000, 21, 'S'),
	(005, 'nattapon02', 'peadamrong02', '1869900458789', '$2y$10$oYzpQQP7O4U7KQqDT/G2CuLqcJ0Znd2okiEK8EtBBTVUPjpscpcBm', 20000, 21, 'A');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
