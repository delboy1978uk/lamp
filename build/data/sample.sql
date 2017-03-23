GRANT ALL PRIVILEGES ON *.* TO dbuser@"%" IDENTIFIED BY '12345';

CREATE DATABASE IF NOT EXISTS `awesome` DEFAULT CHARACTER SET UTF8mb4 DEFAULT COLLATE utf8mb4_bin;

USE awesome;

CREATE TABLE `Person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL,
  `aka` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `birthplace` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `country` varchar(3) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;