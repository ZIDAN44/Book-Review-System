-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 02:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `published_year` year(4) NOT NULL,
  `summary` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `published_year`, `summary`, `created_at`) VALUES
(1, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', '1960', 'A novel about the serious issues of rape and racial inequality.', '2024-06-09 19:02:23'),
(2, '1984', 'George Orwell', 'Dystopian', '1949', 'A novel that presents a dystopian future under a totalitarian regime.', '2024-06-09 19:02:23'),
(3, 'Pride and Prejudice', 'Jane Austen', 'Romance', '0000', 'A romantic novel that charts the emotional development of the protagonist, Elizabeth Bennet.', '2024-06-09 19:02:23'),
(4, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', '1925', 'A novel about the American dream and the roaring twenties.', '2024-06-09 19:02:23'),
(5, 'Moby-Dick', 'Herman Melville', 'Adventure', '0000', 'A novel about the voyage of the whaling ship Pequod and its captain, Ahab.', '2024-06-09 19:02:23'),
(6, 'War and Peace', 'Leo Tolstoy', 'Historical Fiction', '0000', 'A novel that chronicles the history of the French invasion of Russia.', '2024-06-09 19:02:23'),
(7, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', '1951', 'A novel about the challenges of teenage life and the alienation experienced by the protagonist, Holden Caulfield.', '2024-06-09 19:02:23'),
(8, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', '1937', 'A fantasy novel about the quest of home-loving hobbit Bilbo Baggins.', '2024-06-09 19:02:23'),
(9, 'Crime and Punishment', 'Fyodor Dostoevsky', 'Psychological Fiction', '0000', 'A novel about the mental anguish and moral dilemmas of an impoverished ex-student.', '2024-06-09 19:02:23'),
(10, 'The Adventures of Huckleberry Finn', 'Mark Twain', 'Adventure', '0000', 'A novel about the adventures of a young boy named Huck Finn and a runaway slave, Jim.', '2024-06-09 19:02:23'),
(11, 'Brave New World', 'Aldous Huxley', 'Dystopian', '1932', 'A novel that depicts a futuristic world where society is controlled through technological advancements and genetic engineering.', '2024-06-14 19:23:23'),
(12, 'The Catch-22', 'Joseph Heller', 'Satire', '1961', 'A novel that explores the absurdities of war and bureaucracy through the experiences of a World War II bomber squadron.', '2024-06-14 19:23:23'),
(13, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', '1954', 'An epic fantasy novel that follows the journey of Frodo Baggins to destroy the One Ring and save Middle-earth.', '2024-06-14 19:23:23'),
(14, 'Jane Eyre', 'Charlotte Brontë', 'Romance', '0000', 'A novel that tells the story of a young orphaned girl who overcomes hardship to find love and independence.', '2024-06-14 19:23:23'),
(15, 'The Picture of Dorian Gray', 'Oscar Wilde', 'Philosophical Fiction', '0000', 'A novel that explores the themes of aestheticism and moral corruption through the story of Dorian Gray.', '2024-06-14 19:23:23'),
(16, 'The Grapes of Wrath', 'John Steinbeck', 'Historical Fiction', '1939', 'A novel that portrays the struggles of a family of tenant farmers during the Great Depression.', '2024-06-14 19:23:23'),
(17, 'The Brothers Karamazov', 'Fyodor Dostoevsky', 'Philosophical Fiction', '0000', 'A novel that delves into the complex dynamics of a Russian family and explores themes of faith, doubt, and morality.', '2024-06-14 19:23:23'),
(18, 'Ulysses', 'James Joyce', 'Modernist', '1922', 'A novel that chronicles the experiences of Leopold Bloom over the course of a single day in Dublin.', '2024-06-14 19:23:23'),
(19, 'The Odyssey', 'Homer', 'Epic', '0000', 'An ancient Greek epic poem that follows the adventures of Odysseus as he returns home from the Trojan War.', '2024-06-14 19:23:23'),
(20, 'Frankenstein', 'Mary Shelley', 'Gothic Fiction', '0000', 'A novel that tells the story of Victor Frankenstein and the monstrous creature he creates.', '2024-06-14 19:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 4, 'Review comment dummy!!', '2024-06-18 18:06:45', NULL),
(3, 1, 6, 3, 'Review comment dummy!!', '2024-06-18 18:06:50', NULL),
(4, 2, 4, 5, 'Review comment', '2024-06-18 18:59:45', '2024-06-18 19:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'zidan', '$2y$10$kLgdLWWEu8jNWDPWR8yI3OgYrBPMkZcCvASWNaEPtmwe2Gz31Zrnq', 'zidan.roms44@gmail.com', '2024-06-16 13:10:37'),
(2, 'zisan', '$2y$10$2vXEEggMXxraswJ2P0pnQeDtvGFtcEQG3oGe0YQ6FD8EhUV12ngZi', 'zidan.roms44@gmail.com', '2024-06-18 18:59:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
