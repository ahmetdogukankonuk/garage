-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: garage
-- Generation Time: 2023-07-02 21:11:40.1930
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) DEFAULT NULL,
  `modelName` varchar(255) NOT NULL,
  `modelYear` varchar(255) NOT NULL,
  `fuelType` varchar(255) NOT NULL,
  `plateNo` varchar(255) NOT NULL,
  `chassisNo` varchar(255) DEFAULT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `customerPhone` varchar(255) DEFAULT NULL,
  `dateReceived` date DEFAULT NULL,
  `dateDelivery` date DEFAULT NULL,
  `description` text,
  `situation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Araç beklemede',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `brands` (`id`, `name`) VALUES
(0, 'Diğer'),
(1, 'Aion'),
(2, 'Alfa Romeo'),
(3, 'Anadol'),
(4, 'Arora'),
(5, 'Aston Martin'),
(6, 'Audi'),
(7, 'Bentley'),
(8, 'BMW'),
(9, 'Bugatti'),
(10, 'Buick'),
(11, 'Cadillac'),
(12, 'Chery'),
(13, 'Chevrolet'),
(14, 'Chrysler'),
(15, 'Citroën'),
(16, 'Cupra'),
(17, 'Dacia'),
(18, 'Daewoo'),
(19, 'Daihatsu'),
(20, 'Dodge'),
(21, 'DS Automobiles'),
(22, 'Ferrari'),
(23, 'Fiat'),
(24, 'Fisker'),
(25, 'Ford'),
(26, 'GAZ'),
(27, 'Geely'),
(28, 'Honda'),
(29, 'Hyundai'),
(30, 'Ikco'),
(31, 'Infiniti'),
(32, 'Isuzu'),
(33, 'Jaguar'),
(34, 'Kia'),
(35, 'Lada'),
(36, 'Lamborghini'),
(37, 'Lancia'),
(38, 'Leapmotor'),
(39, 'Lexus'),
(40, 'Ligier'),
(41, 'Lincoln'),
(42, 'Lotus'),
(43, 'Marcos'),
(44, 'Maserati'),
(45, 'Mazda'),
(46, 'McLaren'),
(47, 'Mercedes - Benz'),
(48, 'Mercury'),
(49, 'MG'),
(50, 'Mini'),
(51, 'Mitsubishi'),
(52, 'Moskwitsch'),
(53, 'Nissan'),
(54, 'Opel'),
(55, 'Peugeot'),
(56, 'Plymouth'),
(57, 'Polestar'),
(58, 'Pontiac'),
(59, 'Porsche'),
(60, 'Proton'),
(61, 'Rainwoll'),
(62, 'Regal Raptor'),
(63, 'Renault'),
(64, 'RKS'),
(65, 'Rolls-Royce'),
(66, 'Rover'),
(67, 'Saab'),
(68, 'Seat'),
(69, 'Skoda'),
(70, 'Smart'),
(71, 'Subaru'),
(72, 'Suzuki'),
(73, 'Tata'),
(74, 'Tesla'),
(75, 'The London Taxi'),
(76, 'Tofaş'),
(77, 'Toyota'),
(78, 'Volkswagen'),
(79, 'Volta'),
(80, 'Volvo'),
(81, 'Wesun'),
(82, 'XEV'),
(83, 'Yuki');

INSERT INTO `vehicles` (`id`, `brandName`, `modelName`, `modelYear`, `fuelType`, `plateNo`, `chassisNo`, `customerName`, `customerPhone`, `dateReceived`, `dateDelivery`, `description`, `situation`) VALUES
(1, 'Ford', 'Mustang', '1976', 'Benzin', '06 PLY 58', 'SAJND231BHK2412N', 'Ahmet Konuk', '+905537324327', '0000-00-00', '0000-00-00', 'Deneme', 'Araç Hazır'),
(2, 'Peugeot', '206', '2007', 'Benzin', '42 S 9444', 'NSJK23FHA324DSF32', 'Berke Konuk', '+905537324327', '2023-07-21', '2023-07-31', 'Arka tampon değişecek', 'Araç Boya Bölümünde'),
(3, 'Audi', 'Q7', '2020', 'Dizel', '42 ADK 99', 'ASDAD', 'Mustafa Konuk', '+905537324327', '2023-07-01', '2023-07-22', 'A', 'Araç beklemede'),
(4, 'BMW', 'X5', '2023', 'Benzin', '42 AS 444', 'ASDAD', 'Abdullah Bey', '+905537324327', '2023-07-07', '2023-07-28', 'a', 'Araç beklemede'),
(5, 'Chevrolet', 'Cruze', '2010', 'Benzin', '06 S 9444', 'SDJHSFAS213SA', 'Ekrem', '+905537324327', '2023-07-17', '2023-07-29', 'asd', 'Araç beklemede');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;