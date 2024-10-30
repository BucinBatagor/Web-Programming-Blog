-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2024 pada 17.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_artikel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('Teknologi','Gaya Hidup') NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `penulis`, `judul`, `kategori`, `konten`, `gambar`, `count`, `created_at`) VALUES
(1, 'John Doe', 'The Future of AI', 'Teknologi', 'Artificial Intelligence is revolutionizing industries. In this article, we explore its impact.', '../images/Teknologi1.jpg', 0, '2024-10-30 15:50:50'),
(2, 'Jane Smith', 'Quantum Computing Explained', 'Teknologi', 'Quantum computing could solve problems faster than classical computers. Let\'s dive in!', '../images/Teknologi2.png', 0, '2024-10-30 15:51:20'),
(3, 'Alice Johnson', 'Cybersecurity Trends in 2024', 'Teknologi', 'This article discusses the latest trends in cybersecurity and how to protect your data.', '../images/Teknologi3.jpg', 0, '2024-10-30 15:51:41'),
(4, 'Bob Brown', '5G Technology and Its Applications', 'Teknologi', '5G technology is set to transform connectivity. Here’s what you need to know.', '../images/Teknologi4.jpg', 0, '2024-10-30 15:52:04'),
(5, 'Sarah Connor', 'The Rise of IoT Devices', 'Teknologi', 'The Internet of Things is changing the way we interact with technology in our daily lives.', '../images/Teknologi5.jpg', 0, '2024-10-30 15:52:24'),
(6, 'Mike Davis', 'Augmented Reality in Everyday Life', 'Teknologi', 'Augmented reality is enhancing our real-world experiences. Here\'s how!', '../images/Teknologi6.png', 0, '2024-10-30 15:52:43'),
(7, 'Laura Wilson', 'The Impact of Blockchai', 'Teknologi', 'Blockchain technology is reshaping industries beyond cryptocurrencies. Let’s explore.', '../images/Teknologi7.jpg', 0, '2024-10-30 15:53:00'),
(8, 'Tom Harris', 'Sustainable Tech Innovations', 'Teknologi', 'Innovations in technology are crucial for sustainability. Discover the latest trends.', '../images/Teknologi8.jpeg', 0, '2024-10-30 15:53:18'),
(9, 'Emma Watson', '10 Healthy Habits to Adopt', 'Gaya Hidup', 'Adopting healthy habits can significantly improve your life. Here are ten to consider.', '../images/ls1.jpeg', 0, '2024-10-30 15:57:44'),
(10, 'Robert Brown', 'Travel Tips for a Perfect Vacation', 'Gaya Hidup', 'Planning a vacation can be overwhelming. Here are some tips for a perfect getaway.', '../images/ls2.jpg', 0, '2024-10-30 15:58:00'),
(11, 'Chris Evans', 'Sustainable Fashion: What to Know', 'Gaya Hidup', 'Sustainable fashion is gaining traction. Learn how to shop ethically and stylishly.', '../images/ls3.jpeg', 0, '2024-10-30 15:58:17'),
(12, 'Natalie Portman', 'The Art of Mindfulness', 'Gaya Hidup', 'Mindfulness can enhance your well-being. This article explains its benefits and practices.', '../images/ls4.jpeg', 0, '2024-10-30 15:58:40'),
(13, 'Mark Zuckerberg', 'Home Workouts for Busy People', 'Gaya Hidup', 'Don\'t have time for the gym? Here are effective home workouts you can do anytime.', '../images/ls5.jpeg', 0, '2024-10-30 15:58:58'),
(14, 'Taylor Swift', 'How to Create a Relaxing Space', 'Gaya Hidup', 'Creating a relaxing space at home can help you unwind. Here are some tips to do so.', '../images/ls6.jpeg', 0, '2024-10-30 15:59:20'),
(15, 'Ryan Gosling', 'Cooking 101: Easy Recipes for Beginners', 'Gaya Hidup', 'If you\'re new to cooking, these easy recipes are a great place to start.', '../images/ls7.jpg', 0, '2024-10-30 15:59:37'),
(16, 'Angelina Jolie', 'Tips for a Balanced Lifestyle', 'Gaya Hidup', 'Achieving a balanced lifestyle is key to happiness. Here are some tips to help you.', '../images/ls8.jpg', 0, '2024-10-30 15:59:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
