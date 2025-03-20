-- creating database
create DATABASE book_store;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL unique,
    `password` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()

);


--
-- Table structure for table `catergories`
--

CREATE TABLE `catergories` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `qty` INT UNSIGNED NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `sale_price` double UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `page_number` INT UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL unique,
  `language` varchar(20),
  `image` text ,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
);

--
-- Table structure for table `reviews`
--
CREATE TABLE `books_categories` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `book_id` INT UNSIGNED NOT NULL,
  `catergory_id` INT UNSIGNED NOT NULL,
   FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
   FOREIGN KEY (`catergory_id`) REFERENCES `catergories` (`id`)
);


--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `book_id` INT UNSIGNED NOT NULL,
  `count_stars` INT UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
     FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)

);

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);


--
-- Table structure for table `branches_phone`
--

CREATE TABLE `branches_phone` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);


--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `phone_number` varchar(50) NOT NULL,
    `email` varchar(255) NOT NULL,
    `reason` ENUM('question', 'repalce', 'recovery', 'order', 'others') NOT NULL,
    `meessage` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);


--
-- Table structure for table `day_offers`
--

CREATE TABLE `day_offers` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `user_id` INT UNSIGNED NOT NULL,
    `percentage` INT UNSIGNED NOT NULL,
    `time_offer` timestamp  NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    
     FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)

);

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `book_id` INT UNSIGNED NOT NULL,
    `offer_id` INT UNSIGNED NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

     FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
     FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
     FOREIGN KEY (`offer_id`) REFERENCES `day_offers` (`id`)


);

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `statues` varchar(50) NOT NULL,
    `user_id` INT UNSIGNED NOT NULL,
    `total_price` INT UNSIGNED NOT NULL,
    `address` text  NOT NULL,
    `notes` text  NOT NULL,
    `phone` varchar(50) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `order_id` INT UNSIGNED NOT NULL,
    `product_name` varchar(100) NOT NULL,
    `product_qty` INT UNSIGNED NOT NULL,
    `image` text,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)

);

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `book_id` INT UNSIGNED NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
     FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
);

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `book_id` INT UNSIGNED NOT NULL,
    `qty` INT UNSIGNED NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
     FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
);
