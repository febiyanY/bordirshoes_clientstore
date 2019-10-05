-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 03:42 PM
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
  `categoryId` int(11) NOT NULL,
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
  `kotaDistribusi` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `alamatEmail` varchar(255) DEFAULT NULL,
  `terkonfirmasi` varchar(45) DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `kotaDistribusi`, `address`, `phone`, `alamatEmail`, `terkonfirmasi`) VALUES
(12, 'user', 1, 'JalanJalan', '081111222333', 'user@gmail.com', 'sudah'),
(19, 'logi', 7, 'Jalanin aja', '089999878765', 'logi@mail.com', 'sudah'),
(20, 'johndoe', 2, 'gotham', '0979797989', 'johndoe@mail.com', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `history_pemesanan`
--

CREATE TABLE `history_pemesanan` (
  `idHistory` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statusPesanan` varchar(50) DEFAULT NULL,
  `id_customer` varchar(255) NOT NULL
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
  `idPemesanan` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `namaCustomer` varchar(255) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Kirim bukti pembayaran',
  `display` varchar(45) DEFAULT 'yes',
  `idHistory` int(11) DEFAULT NULL,
  `idPengiriman` int(11) DEFAULT NULL,
  `idPembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idPemesanan`, `tanggal`, `namaCustomer`, `productId`, `size`, `quantity`, `totalPrice`, `promo`, `status`, `display`, `idHistory`, `idPengiriman`, `idPembayaran`) VALUES
(2, '05102019180542hXEH6Kin', '2019-10-05', 'user', 6, 36, 1, 120000, NULL, 'Terkonfirmasi', 'yes', NULL, NULL, NULL),
(3, '05102019180542hXEH6Kin', '2019-10-05', 'user', 11, 41, 1, 89000, NULL, 'Terkonfirmasi', 'yes', NULL, NULL, NULL),
(5, '05102019190512yz32dFw9', '2019-10-05', 'user', 7, 39, 1, 550000, NULL, 'Menunggu di produksi', 'yes', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` int(11) NOT NULL,
  `idPemesanan` varchar(255) NOT NULL,
  `totalPembayaran` double DEFAULT NULL,
  `jenisPembayaran` varchar(45) DEFAULT NULL,
  `buktiPembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idPembayaran`, `idPemesanan`, `totalPembayaran`, `jenisPembayaran`, `buktiPembayaran`) VALUES
(1, '05102019180542hXEH6Kin', 209000, 'tunai', 'storage/image/bukti/AwnSQBwDB70ZTUDTQethna9z9apHKo6fFAwvvNsI.png'),
(3, '05102019190512yz32dFw9', 550000, 'kredit', 'storage/image/bukti/dDvSgJgZMdEqs7VnuUOmxzglWRaa6KdtAVqIYtF2.png');

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
  `idPengiriman` int(11) NOT NULL,
  `idPemesanan` varchar(255) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `ongkirPengiriman` int(11) DEFAULT NULL,
  `buktiPengiriman` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`idPengiriman`, `idPemesanan`, `address`, `ongkirPengiriman`, `buktiPengiriman`) VALUES
(1, '05102019180542hXEH6Kin', 'JalanJalan', NULL, NULL),
(3, '05102019190512yz32dFw9', 'JalanJalan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `quantity`, `description`, `categoryId`) VALUES
(5, 'Bordir-01', '79999', '500', 'Faaaaaa', 2),
(6, 'Bordir-02', '120000', '150', '', 2),
(7, 'Bordir-03', '550000', '1000', '', 2),
(11, 'Bordir-04', '89000', '20', '', 2),
(13, 'Sulam-01', '135000', '1225', 'aaa bbbb ccccc', 3),
(14, 'Sulam-02', '50000', '', '', 3),
(15, 'Sulam-03', '42000', '', '', 3),
(16, 'Selop-01', '80000', '', '', 4),
(17, 'Selop-02', '95000', '', '', 4),
(18, 'Sandal-01', '20000', '', '', 5),
(19, 'Sandal 02', '10000', '', '', 5);

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
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `36` int(11) NOT NULL DEFAULT '0',
  `37` int(11) NOT NULL DEFAULT '0',
  `38` int(11) NOT NULL DEFAULT '0',
  `39` int(11) NOT NULL DEFAULT '0',
  `40` int(11) NOT NULL DEFAULT '0',
  `41` int(111) NOT NULL DEFAULT '0',
  `42` int(11) NOT NULL DEFAULT '0',
  `43` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `customerId` int(11) DEFAULT NULL,
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
(1, 12, '05102019190512yz32dFw9', 100000, 450000, 'storage/image/bukti/tagihan/dDvSgJgZMdEqs7VnuUOmxzglWRaa6KdtAVqIYtF2.png', '2019-10-05', 1, 'belum', '2019-10-05 12:08:32'),
(2, 12, '05102019190512yz32dFw9', 200000, 250000, 'storage/image/bukti/tagihan/BpaqD5Y2S4K0wmCH3SpDwNGJ7zqIQ6dbym48nJv7.jpeg', '2019-10-05', 1, 'belum', '2019-10-05 12:48:04'),
(3, 12, '05102019190512yz32dFw9', 250000, 0, 'storage/image/bukti/tagihan/mZ5rqBe1nQhUMKnJTYqjKDODxIke1TOzEcJlplhe.png', '2019-10-05', 1, 'lunas', '2019-10-05 13:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(10, 'admin', 'admin@aiub.edu', '$2y$12$K1kCiMFL5sByJp/Yqln9qeIVx3EaxD4AhQ2D2C.iYfy3s755jjIve', 'admin'),
(12, 'user', 'user@gmail.com', '$2y$12$PVKo27VMia9u5ndAaok.EOaOwKd1O/zJD.CUz/LET7tu3i5CitW72', 'user'),
(13, 'accounting', 'acconting@gmail.com', '$2y$12$L8YsRKwLyFlMZfDNpj4TuePSsHm7WxqrU89gUOBlJ9E7xGHECcOCa', 'accounting'),
(14, 'marketing', 'marketing@gmail.com', '$2y$12$2x3glp7AG7b46GvbJYFKhueLZ0T1FYwtlJnVRxuOxT02V5buB3yk2', 'marketing'),
(15, 'outside', 'outside@gmail.com', '$2y$12$CDaKm440vHpp5BFTPiRdCub/b1H3dKFh7CC/fun//AEmQHAGjxQnu', 'outside'),
(19, 'logi', 'logi@mail.com', '$2y$10$9NFVEE6PVQb3XMfFVwTqu.bLPjJCqSAtaSo.Ln9dpEi7XtEMIGOwm', 'user'),
(20, 'johndoe', 'johndoe@mail.com', '$2y$10$LuJy.9kBOn97If4d8xWsOuCS3kv/7xBDcAo7Lr.aCar1YDt9JDM4G', 'user');

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
  ADD UNIQUE KEY `customerName` (`customerName`),
  ADD KEY `kotaDistribusi` (`kotaDistribusi`);

--
-- Indexes for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  ADD PRIMARY KEY (`idHistory`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `namaCustomer` (`namaCustomer`),
  ADD KEY `idHistory` (`idHistory`),
  ADD KEY `idPembayaran` (`idPembayaran`),
  ADD KEY `productId` (`productId`),
  ADD KEY `idPengiriman` (`idPengiriman`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

--
-- Indexes for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`idPengiriman`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

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
  ADD PRIMARY KEY (`idTagihan`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pemesanan`
--
ALTER TABLE `history_pemesanan`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `idPengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idTagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customerName`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`kotaDistribusi`) REFERENCES `kotadistribusi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`namaCustomer`) REFERENCES `customer` (`customerName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idHistory`) REFERENCES `history_pemesanan` (`idHistory`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`idPembayaran`) REFERENCES `pembayaran` (`idPembayaran`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`idPengiriman`) REFERENCES `pengiriman` (`idPengiriman`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
