# Food_Comparaison_Team_4.3
Food_Comparaison_Team_4.3

#sql code
CREATE TABLE `users` (
`user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
)

CREATE TABLE `Brand` (
`BrandName` varchar(50) NOT NULL PRIMARY KEY,
`CountryName` varchar(50) NOT NULL,
CONSTRAINT fk_Brand FOREIGN KEY (CountryName) REFERENCES Country(CountryName) ON DELETE CASCADE
)

CREATE TABLE `Country` (
`CountryName` varchar(50) NOT NULL PRIMARY KEY
)

CREATE TABLE `Category` (
`CategoryName` varchar(50) NOT NULL  PRIMARY KEY
)

CREATE TABLE `Products` (
`product_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`product_name` varchar(50)  NOT NULL,
`BrandName` varchar(50)  NOT NULL,
`CategoryName` varchar(50) NOT NULL,
`price` int(10) COLLATE utf8mb4_unicode_ci NOT NULL,
`Fat` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Sugar` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Calories` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Carbohydrate` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`Protein` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`Fiber` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
CONSTRAINT fk_Products FOREIGN KEY (BrandName) REFERENCES Brand(BrandName) ON DELETE CASCADE,
CONSTRAINT fk2_Products FOREIGN KEY (CategoryName) REFERENCES Category(CategoryName) ON DELETE CASCADE
)
Alter TABLE `Products` Add column product_pic LONGBLOB;

INSERT INTO `category` (`CategoryName`) VALUES ('Chocolate');
INSERT INTO `category` (`CountryName`) VALUES ('Algeria');
INSERT INTO `brand` (`BrandName`, `CountryName`) VALUES ('Nutela', 'Algeria');
INSERT INTO `products` (`product_id`, `product_name`, `BrandName`, `CategoryName`, `price`, `Fat`, `Sugar`, `Calories`, `Carbohydrate`, `Protein`, `Fiber`) VALUES (NULL, 'Orio Chocolate', 'Nutela', 'Chocolate', '100', '100', '100', '100', '100', '100', '100');