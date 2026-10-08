-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table db_mini_perpus.books: ~9 rows (approximately)
INSERT INTO `books` (`id`, `category_id`, `title`, `author`, `published_year`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 2008, 5, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(2, 1, 'The Pragmatic Programmer', 'David Thomas & Andrew Hunt', 2019, 3, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(3, 2, 'Introduction to Algorithms', 'Thomas H. Cormen', 2022, 7, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(4, 4, 'Database System Concepts', 'Abraham Silberschatz', 2020, 4, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(5, 3, 'Computer Networking: A Top-Down Approach', 'James Kurose & Keith Ross', 2021, 6, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(6, 5, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell & Peter Norvig', 2020, 2, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(7, 6, 'Operating System Concepts', 'Abraham Silberschatz', 2018, 8, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(8, 7, 'Discrete Mathematics and Its Applications', 'Kenneth H. Rosen', 2018, 10, '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(9, 1, 'Laravel: Up & Running', 'Matt Stauffer', 2023, 5, '2026-10-07 05:54:09', '2026-10-07 05:54:09');

-- Dumping data for table db_mini_perpus.cache: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.cache_locks: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.categories: ~7 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Pemrograman', 'Buku-buku mengenai bahasa pemrograman, algoritma, dan rekayasa perangkat lunak.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(2, 'Ilmu Komputer', 'Fondasi teoritis ilmu komputer, struktur data, dan arsitektur sistem.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(3, 'Jaringan Komputer', 'Konsep jaringan, protokol komunikasi, dan keamanan siber.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(4, 'Basis Data', 'Perancangan basis data, SQL, dan sistem manajemen basis data.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(5, 'Kecerdasan Buatan', 'Machine learning, deep learning, dan penerapan AI.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(6, 'Sistem Operasi', 'Prinsip dan implementasi sistem operasi modern.', '2026-10-07 05:54:09', '2026-10-07 05:54:09'),
	(7, 'Matematika', 'Matematika diskrit, kalkulus, dan aljabar linear untuk sains.', '2026-10-07 05:54:09', '2026-10-07 05:54:09');

-- Dumping data for table db_mini_perpus.failed_jobs: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.jobs: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.job_batches: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_10_07_134853_create_categories_table', 1),
	(5, '2026_10_07_134854_create_books_table', 1);

-- Dumping data for table db_mini_perpus.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.sessions: ~0 rows (approximately)

-- Dumping data for table db_mini_perpus.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
