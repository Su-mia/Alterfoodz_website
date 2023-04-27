CREATE TABLE `users` (
`user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
)

CREATE TABLE `Products` (
`product_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`BrandName` varchar(50)  NOT NULL,
`CategoryName` varchar(50) NOT NULL,
`price` int(10) COLLATE utf8mb4_unicode_ci NOT NULL,
`Fat` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Sugar` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Calories` int(50) COLLATE utf8mb4_unicode_ci NOT NULL,
`Carbohidrate` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`Protein` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
`Fiber` int(250) COLLATE utf8mb4_unicode_ci NOT NULL,
CONSTRAINT fk_Products FOREIGN KEY (BrandName) REFERENCES Brand(BrandName) ON DELETE CASCADE,
CONSTRAINT fk2_Products FOREIGN KEY (CategoryName) REFERENCES Category(CategoryName) ON DELETE CASCADE
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