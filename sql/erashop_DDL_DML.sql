-- Creating the database and the user
/*
CREATE DATABASE erashop;
CREATE USER 'cyrus'@'%' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON * . * TO 'cyrus'@'%';
FLUSH PRIVILEGES;
USE erashop;
*/
--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modal` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `categ` varchar(45) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `featured` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 
--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES (1,'rog-one','asus','gaming',849.99,'img/computer-1373684_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(2,'viewbook','lenovo','home',699.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(3,'x-series','msi','business',749.99,'img/startup-593327_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(4,'airbook','apple','home',1299.99,'img/apple-1282241_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(5,'notebook','hp','multimedia',649.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(6,'zaphyrus','asus','gaming',3999.99,'img/computer-1373684_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(7,'m281','lenovo','business',899.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(8,'y-series','msi','gaming',2249.99,'img/startup-593327_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(9,'expensive book','apple','business',6499.99,'img/apple-1282241_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(10,'note 10 +','hp','student',949.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(11,'rog-576','asus','multimedia',1849.99,'img/computer-1373684_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(12,'game plus','lenovo','gaming',2699.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(13,'alpha-series','msi','multimedia',1749.99,'img/startup-593327_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(14,'probook','apple','student',2299.99,'img/apple-1282241_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(15,'H112P','hp','home',449.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(16,'Zenbook Duo','asus','student',3199.99,'img/computer-1373684_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(17,'LNM146','lenovo','business',599.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','true'),(18,'k-series','msi','home',899.99,'img/startup-593327_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(19,'lightbook','apple','multimedia',1799.99,'img/apple-1282241_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(20,'stu875','hp','student',1149.99,'img/computer-768696_1920.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sid libero quis eum vel ex eius nemo accusamus? Culp tur exercitationem facere ipsam ipsa molestiae laudantium veniam consequuntur sapiente maiores!','false'),(21,'game max','msi','business',2499.99,'img/java-programming.jpg','What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has','true'),(22,'light note','lenovo','multimedia',1149.99,'img/web-design.jpg','What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has','false');

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_product_id` int DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `comment_rating` int DEFAULT '0',
  `comment_content` text,
  PRIMARY KEY (`comment_id`)
) 
--
-- Dumping data for table `comments`
--

INSERT INTO `comments` VALUES (1,21,'Cyrus Mobini','cyrus@gmail.com','2021-04-07',5,'I loved it'),(3,21,'Cyrus Mobini','mobi0001@algonquinlive.com','2021-04-07',3,'Another normal laptop'),(4,21,'Cyrus Mobini','cyrus@gmail.com','2021-04-07',3,'Awesome products'),(5,16,'John Duo','johndoe@email.com','2021-04-07',5,'the dual screen is very usefull'),(6,14,'Alex','alex@email.com','2021-04-07',4,'I Love apple, but could be cheaper'),(7,17,'nobody','nobody@email.com','2021-04-07',3,'I am happy with  my purchase'),(8,14,'Josh','josh@email.com','2021-04-07',1,'broke on first day'),(9,15,'tom','tom@email.com','2021-04-07',3,'Normal hp laptop'),(10,9,'jane','jane@email.com','2021-04-07',1,'Tooooo expensive, I had to sell my kidney to but it!'),(11,19,'Poppy','poppy@email.com','2021-04-07',4,'light like a feather');
