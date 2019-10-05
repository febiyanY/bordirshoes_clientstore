-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 03:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bordirdila`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `category`) VALUES
(1, 'Produk Baru', 'baru'),
(2, 'Sepatu Bordir', 'bordir'),
(3, 'Sepatu Sulam', 'sulam'),
(4, 'Selop', 'selop'),
(5, 'Sandal', 'sandal'),
(6, 'Sepatu Bordir Anak - Anak', 'anak');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(10) NOT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `kotaDistribusi` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `alamatEmail` varchar(255) DEFAULT NULL,
  `terkonfirmasi` varchar(45) DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `kotaDistribusi`, `address`, `phone`, `alamatEmail`, `terkonfirmasi`) VALUES
(0, 'Batman', 'jakarta', 'jalan cicicicici', '08777656543', 'batman@mail.com', 'sudah'),
(12, 'user', 'bandung', 'JalanJalan', '081111222333', 'user@gmail.com', 'belum'),
(16, 'joker', 'lampung', 'jalanpulang', '089777656543', 'joker@mail.com', 'belum'),
(19, 'logi', 'jakarta', 'Jalanin aja', '089999878765', 'logi@mail.com', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `history_pemesanan`
--

CREATE TABLE `history_pemesanan` (
  `idPemesanan` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statusPesanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kotadistribusi`
--

CREATE TABLE `kotadistribusi` (
  `id` int(11) NOT NULL,
  `namaKota` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kotadistribusi`
--

INSERT INTO `kotadistribusi` (`id`, `namaKota`) VALUES
(1, 'aceh'),
(2, 'bandung'),
(3, 'denpasar'),
(4, 'jakarta'),
(5, 'lampung'),
(6, 'tulungagung'),
(7, 'sorong');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_07_060751_create_supplier_table', 1),
(2, '2018_04_07_063500_create_sells_table', 1),
(4, '2018_04_12_181621_create_user_table', 2),
(5, '2018_04_12_183141_create_category_table', 3),
(6, '2018_04_12_183958_create_product_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idPemesanan` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `namaCustomer` varchar(255) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `buktiPembayaran` varchar(255) DEFAULT NULL,
  `size` int(10) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Kirim bukti pembayaran',
  `display` varchar(45) DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idPemesanan`, `tanggal`, `namaCustomer`, `productId`, `productName`, `price`, `quantity`, `totalPrice`, `promo`, `buktiPembayaran`, `size`, `jenis`, `status`, `display`) VALUES
(1, '240720192050451YRJ3PGo', '2019-07-24', 'joker', 5, 'Bordir-01', 79999, 1, 79999, NULL, 'storage/image/bukti/56CJezBGVT1LeaAAYsnVVe1I52skcK7i3g0IY4un.jpeg', 36, 'Tunai', 'Sudah diterima', 'yes'),
(2, '240720192050451YRJ3PGo', '2019-07-24', 'joker', 17, 'Selop-02', 95000, 1, 95000, NULL, 'storage/image/bukti/56CJezBGVT1LeaAAYsnVVe1I52skcK7i3g0IY4un.jpeg', 40, 'Tunai', 'Sudah diterima', 'yes'),
(3, '27072019190315dGeryQ7C', '2019-07-27', 'Batman', 13, 'Sulam-01', 135000, 1, 135000, NULL, 'storage/image/bukti/vCanNxMHeIH0nwvVuWDZ8nI2eUE9hgoTaxgkanRi.png', 42, 'Tunai', 'Terkonfirmasi', 'yes'),
(4, '27072019190337iqOc1lMr', '2019-07-27', 'Batman', 19, 'Sandal 02', 10000, 1, 10000, NULL, 'storage/image/bukti/BKoFj7SQrZbUnN5VioV9wEvAlM7wDVhqw0Ur9nyi.jpeg', 41, 'Tunai', 'Terkonfirmasi', 'yes'),
(5, '27072019190710nGCtydYb', '2019-07-27', 'user', 6, 'Bordir-02', 120000, 1, 120000, NULL, 'storage/image/bukti/3dGbQoTIsoImU5qyjryw2qp356QJ9yJB7LtNNkwP.jpeg', 38, 'Tunai', 'Terkonfirmasi', 'yes'),
(6, '27072019193240sP9aDgRz', '2019-07-27', 'Batman', 5, 'Bordir-01', 79999, 1, 79999, NULL, 'storage/image/bukti/7ZUCaI9elq6HTJEwIeyTJscbJqcSJTJQv0wigPWB.jpeg', 40, 'Tunai', 'Terkonfirmasi', 'yes'),
(7, '27072019193240sP9aDgRz', '2019-07-27', 'Batman', 17, 'Selop-02', 95000, 1, 95000, NULL, 'storage/image/bukti/7ZUCaI9elq6HTJEwIeyTJscbJqcSJTJQv0wigPWB.jpeg', 39, 'Tunai', 'Terkonfirmasi', 'yes'),
(10, '28072019215715aAwQ3VuY', '2019-07-28', 'user', 5, 'Bordir-01', 79999, 1, 79999, NULL, 'storage/image/bukti/y295G68pvN4gaDOqdiUGdWUMEsV7uKy2mFRVWsSs.jpeg', 39, 'kredit', 'Terkonfirmasi', 'yes'),
(11, '28072019215715aAwQ3VuY', '2019-07-28', 'user', 17, 'Selop-02', 95000, 1, 95000, NULL, 'storage/image/bukti/y295G68pvN4gaDOqdiUGdWUMEsV7uKy2mFRVWsSs.jpeg', 36, 'kredit', 'Terkonfirmasi', 'yes'),
(12, '30072019045719zCbxru0Z', '2019-07-30', 'user', 11, 'Bordir-04', 89000, 1, 89000, NULL, NULL, 36, 'kredit', 'Kirim bukti pembayaran', 'yes'),
(13, '30072019045719zCbxru0Z', '2019-07-30', 'user', 19, 'Sandal 02', 10000, 1, 10000, NULL, NULL, 36, 'kredit', 'Kirim bukti pembayaran', 'yes'),
(14, '300720190827557CnpPBAI', '2019-07-30', 'logi', 5, 'Bordir-01', 79999, 1, 79999, NULL, 'storage/image/bukti/eJTeI6CwrOlTxHU7nqMGq97eGzLkNZ3gwOTif4La.png', 36, 'kredit', 'Terkonfirmasi', 'yes'),
(15, '300720190827557CnpPBAI', '2019-07-30', 'logi', 6, 'Bordir-02', 120000, 1, 120000, NULL, 'storage/image/bukti/eJTeI6CwrOlTxHU7nqMGq97eGzLkNZ3gwOTif4La.png', 36, 'kredit', 'Terkonfirmasi', 'yes'),
(16, '30072019082820AaoX942H', '2019-07-30', 'logi', 14, 'Sulam-02', 50000, 1, 50000, NULL, 'storage/image/bukti/nNgmiTOE7iR8C8lhYXeqzQ9t49ioV4L2bm63Ap2K.jpeg', 39, 'kredit', 'Terkonfirmasi', 'yes'),
(17, '30072019082820AaoX942H', '2019-07-30', 'logi', 19, 'Sandal 02', 10000, 1, 10000, NULL, 'storage/image/bukti/nNgmiTOE7iR8C8lhYXeqzQ9t49ioV4L2bm63Ap2K.jpeg', 36, 'kredit', 'Terkonfirmasi', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPemesanan` int(11) NOT NULL,
  `totalPembayaran` double DEFAULT NULL,
  `jenisPembayaran` varchar(45) DEFAULT NULL,
  `buktiPembayaran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang`
--

CREATE TABLE `pengajuan_barang` (
  `productId` int(10) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `customerId` int(10) DEFAULT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `totalQuantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `idPemesanan` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `ongkirPengiriman` int(11) DEFAULT NULL,
  `buktiPengiriman` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`idPemesanan`, `address`, `ongkirPengiriman`, `buktiPengiriman`) VALUES
('240720192050451YRJ3PGo', 'jalanpulang', 20000, 'storage/image/bukti/pengiriman/wQLQPV5hJ95g9GhgFQM6w26z9pL2OVn1vV4Y9aFJ.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `categoryId` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `quantity`, `description`, `categoryId`) VALUES
(5, 'Bordir-01', '79999', '500', 'Faaaaaa', '2'),
(6, 'Bordir-02', '120000', '150', '', '2'),
(7, 'Bordir-03', '550000', '1000', '', '2'),
(11, 'Bordir-04', '89000', '20', '', '2'),
(13, 'Sulam-01', '135000', '1225', 'aaa bbbb ccccc', '3'),
(14, 'Sulam-02', '50000', '', '', '3'),
(15, 'Sulam-03', '42000', '', '', '3'),
(16, 'Selop-01', '80000', '', '', '4'),
(17, 'Selop-02', '95000', '', '', '4'),
(18, 'Sandal-01', '20000', '', '', '5'),
(19, 'Sandal 02', '10000', '', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `idPemesanan` int(10) NOT NULL,
  `statusName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierId` int(10) UNSIGNED NOT NULL,
  `supplierName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `idTagihan` int(11) NOT NULL,
  `customerId` int(10) DEFAULT NULL,
  `orderId` varchar(255) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double DEFAULT NULL,
  `bukti` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kali` int(11) NOT NULL DEFAULT '1',
  `status` varchar(45) DEFAULT 'belum',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`idTagihan`, `customerId`, `orderId`, `jumlah`, `sisa`, `bukti`, `tanggal`, `kali`, `status`, `created_at`) VALUES
(1, 12, '28072019215715aAwQ3VuY', 50000, 124999, 'storage/image/bukti/tagihan/y295G68pvN4gaDOqdiUGdWUMEsV7uKy2mFRVWsSs.jpeg', '2019-07-29', 1, 'belum', '2019-07-29 13:22:43'),
(2, 12, '28072019215715aAwQ3VuY', 100000, 24999, 'storage/image/bukti/tagihan/CdeVBWhkvGaRDD8jFKT3asEWet8e3uVk9B24yXEx.jpeg', '2019-07-29', 1, 'belum', '2019-07-29 13:22:50'),
(3, 12, '28072019215715aAwQ3VuY', 24999, 0, 'storage/image/bukti/tagihan/7SZCfgSoNVeImWlhmNNuRybnMyfa4AY3LVTzdyJe.jpeg', '2019-07-29', 1, 'lunas', '2019-07-29 21:37:53'),
(4, 12, '30072019045719zCbxru0Z', 50000, 49000, '', '2019-07-30', 1, 'belum', '2019-07-29 21:57:19'),
(5, 19, '300720190827557CnpPBAI', 100000, 99999, 'storage/image/bukti/tagihan/eJTeI6CwrOlTxHU7nqMGq97eGzLkNZ3gwOTif4La.png', '2019-07-30', 1, 'belum', '2019-07-30 01:28:50'),
(6, 19, '30072019082820AaoX942H', 20000, 40000, 'storage/image/bukti/tagihan/nNgmiTOE7iR8C8lhYXeqzQ9t49ioV4L2bm63Ap2K.jpeg', '2019-07-30', 1, 'belum', '2019-07-30 01:28:37'),
(7, 19, '30072019082820AaoX942H', 10000, 30000, 'storage/image/bukti/tagihan/Yo3ALXzLuJyXVgDLRZcOdYjOYRdcacqOtoKoBWeZ.jpeg', '2019-07-30', 1, 'belum', '2019-07-30 01:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(10, 'admin', 'admin@aiub.edu', '1234', 'admin'),
(12, 'user', 'user@gmail.com', '1111', 'user'),
(13, 'accounting', 'acconting@gmail.com', '1234', 'accounting'),
(14, 'marketing', 'marketing@gmail.com', '1234', 'marketing'),
(15, 'outside', 'outside@gmail.com', '1234', 'outside'),
(16, 'joker', 'joker@mail.com', '1234', 'user'),
(18, 'Batman', 'batman@mail.com', '1234', 'user'),
(19, 'logi', 'logi@mail.com', '$2y$10$9NFVEE6PVQb3XMfFVwTqu.bLPjJCqSAtaSo.Ln9dpEi7XtEMIGOwm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `customerName` (`customerName`);

--
-- Indexes for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  ADD PRIMARY KEY (`idPemesanan`);

--
-- Indexes for table `kotadistribusi`
--
ALTER TABLE `kotadistribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPemesanan`);

--
-- Indexes for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`idPemesanan`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`idPemesanan`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierId`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`idTagihan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  MODIFY `idPemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kotadistribusi`
--
ALTER TABLE `kotadistribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `idPemesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `idTagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
