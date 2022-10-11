-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 09:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillId` int(11) NOT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `TotalPrice` int(11) NOT NULL DEFAULT 0,
  `CustomerId` int(11) NOT NULL,
  `Huyen` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `Thon` varchar(50) DEFAULT NULL,
  `Tinh` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Xa` varchar(50) DEFAULT NULL,
  `DateCreateBill` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillId`, `PaymentMethod`, `TotalPrice`, `CustomerId`, `Huyen`, `PhoneNumber`, `Thon`, `Tinh`, `UserName`, `Xa`, `DateCreateBill`) VALUES
(26, NULL, 67940000, 24, NULL, NULL, NULL, NULL, 'binhdz0123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billproduct`
--

CREATE TABLE `billproduct` (
  `BillId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billproduct`
--

INSERT INTO `billproduct` (`BillId`, `ProductId`, `ProductName`, `ProductPrice`, `Quantity`, `TotalProductPrice`) VALUES
(26, 3, 'Tai nghe Bluetooth Xiaomi ', 690000, 1, 690000),
(26, 4, 'Iphone 13 Pro Max', 35000000, 1, 35000000),
(26, 7, 'Xiaomi Black Shark', 12000000, 1, 12000000),
(26, 25, 'Tai nghe Bluetooth Apple', 4990000, 4, 19960000),
(26, 26, 'Dán chống xước màn hình', 290000, 1, 290000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Point` int(11) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `BirthDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `UserName`, `Password`, `Email`, `PhoneNumber`, `FullName`, `Gender`, `Point`, `Admin`, `BirthDay`) VALUES
(22, 'a', '$2y$10$gfuC4uadKpvn2DnpNdYO..EClll1nGFwJFc/RXTJ0bWZ4doajK/9i', 'a@gmail.com', '424', 'aa', 0, 1, 0, '2022-03-25'),
(23, 'Binh.buibksg0123', 'BuibinhBKSG0123~', 'dasdas@gmail.com', '2312331', 'asdads', 0, 0, 0, '2022-04-07'),
(24, 'binhdz0123', '$2y$10$L2k24zp/RUp46p8kbBAq0OLz.XLqfF.U5oyEZDRVaDXjrZMDZ2.um', 'binh@gmail.com', '23123123', 'dsadas', 0, 1, 0, '2001-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `DescId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Descip` varchar(2000) NOT NULL,
  `ImgUrl` varchar(100) NOT NULL,
  `MainDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`DescId`, `ProductId`, `Descip`, `ImgUrl`, `MainDesc`) VALUES
(1, 3, 'Redmi Buds 3 Lite là thế hệ kế thừa của dòng Redmi Buds 3. Nó có thiết kế đơn giản kích thước không quá lớn, dễ dàng mang theo và sử dụng. Bộ tai nghe bao gồm, đầu tiên là chiếc tai nghe Xiaomi Buds 3 Lite, kèm theo đó là bộ mở rộng tai và tờ chi tiết sử dụng hỗ trợ bạn sử dụng dễ dàng hơn.\r\n\r\nTai nghe được tạo từ nhựa có dạng nhám, hạn chế được khá nhiều việc bám vết và trầy xước.\r\n\r\n', 'https://clickbuy.cdn.vccloud.vn/uploads/2022/02/redmi-buds-3-lite-global-xiaomi-21-867x540-1.jpg', 'Thiết kế đơn giản cao cấp, thoải mái sử dụng\r\n'),
(2, 3, 'Tai nghe Redmi Buds 3 Lite được trang bị một viên pin dung lượng lớn cho thời lượng sử dụng vượt trội, tới 18 giờ. Bên cạnh đó, thiết bị còn được trang bị cổng sạc Type-C giúp bổ sung năng lượng nhanh chóng.', 'https://clickbuy.cdn.vccloud.vn/uploads/2022/02/Redmi_Buds_3_Youth_Edition_Headphones_in_Ear.jpg', 'Dung lượng pin lớn, sử dụng 18 giờ'),
(3, 3, 'Về chất lượng âm thanh, Redmi Buds 3 Lite với trình điều khiển 6nm được tinh chỉnh bởi Xiaomi Sound Lab giúp mang lại chất lượng âm thanh vượt trội. Bên cạnh đó, Redmi Buds 3 Lite còn được trang bị công nghệ khử tiếng ồn mang lại những cuộc đàm thoại rõ nét.', 'https://clickbuy.cdn.vccloud.vn/uploads/2022/02/XiaomiRedmiBuds3YEvsQCYT17.jpg', 'Âm thanh chất lượng với drive 6nm, khử tiếng ồn hiệu quả\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvalId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` varchar(3000) NOT NULL,
  `EvalTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `BrandName` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `ImgUrl` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Special` varchar(50) NOT NULL,
  `SellOff` int(11) NOT NULL,
  `TimeSellOff` int(11) NOT NULL,
  `OldPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `Name`, `BrandName`, `Price`, `Type`, `ImgUrl`, `Rating`, `Special`, `SellOff`, `TimeSellOff`, `OldPrice`) VALUES
(2, 'Acer Nitro 5 gaming', 'Acer', 26490000, 'laptop', 'https://laptophainam.com/wp-content/uploads/2021/12/laptop-gaming-cu-acer-nitro-5-ryzen-3.jpg', 3, 'khuyenmai', 10, 0, 29433000),
(3, 'Tai nghe Bluetooth Xiaomi ', 'headphone', 690000, 'accessory', 'https://cdn.tgdd.vn/Products/Images/54/236262/bluetooth-tws-xiaomi-earbuds-basic-2-thumb-1-600x600.jpeg', 3, 'khuyenmai', 30, 0, 985710),
(4, 'Iphone 13 Pro Max', 'Apple', 35000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/09/13-pro-gold.jpg', 5, 'moi', 0, 0, 0),
(6, 'Iphone 13 Mini', 'Apple', 30000000, 'smartphone', 'https://vcdn-sohoa.vnecdn.net/2021/10/16/a2-1506-1634356850.jpg', 4, 'moi', 0, 0, 0),
(7, 'Xiaomi Black Shark', 'Xiaomi', 12000000, 'smartphone', 'https://cdn.tgdd.vn/Products/Images/42/217844/xiaomi-black-shark-3-600x600-2-600x600.jpg', 3, 'moi', 0, 0, 0),
(8, 'Samsung Galaxy Z Flip', 'Samsung', 30000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/08/cream-2.jpg', 4, 'banchay', 0, 0, 0),
(9, 'Samsung Fold 3', 'Samsung', 25000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/08/3-black.jpg', 2, 'banchay', 0, 0, 0),
(10, 'Samsung Galaxy A52s 5G', 'Samsung', 27000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/09/thumb_IP12Pro_3.jpg', 0, 'banchay', 0, 0, 0),
(11, 'Xiaomi Mi 10S', 'Xiaomi', 12300000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/08/2.jpg', 1, 'khuyenmai', 40, 0, 20500000),
(12, 'Xiaomi 11', 'Xiaomi', 13200000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/xiaomi-11t-001.jpg', 3, 'khuyenmai', 50, 0, 26400000),
(13, 'Oppo A74', 'Oppo', 7558000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/13-pro-black-copy.jpg', 2, 'khuyenmai', 60, 99999, 18895000),
(14, 'Oppo Reno6 Z 5G', 'Oppo', 8500000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/07/reno6z.jpg', 3, 'khuyenmai', 30, 0, 12142900),
(15, 'Realme 8 Ram 8gb', 'Realme', 6200000, 'smartphone', 'https://clickbuy.com.vn/uploads/2020/09/thumb_X7_2.jpg', 2, 'khuyenmai', 20, 0, 7750000),
(16, 'Realme X7', 'Realme', 5800000, 'smartphone', 'https://clickbuy.com.vn/uploads/2020/09/thumb_X7_2.jpg', 2, 'khuyenmai', 10, 0, 6444400),
(17, 'Acer Swift 3', 'Acer', 13000000, 'laptop', 'https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/acer-swift-3-sf313-53-bac-8.jpg', 3, 'moi', 0, 0, 0),
(18, 'Asus Zenbook', 'Asus', 19000000, 'laptop', 'https://www.sieuthimaychu.vn/datafiles/setone/15873698094282.jpg', 3, 'moi', 0, 0, 0),
(19, 'Oppo A55', 'Oppo', 4000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/oppo-a55-black.jpg', 2, 'moi', 0, 0, 0),
(20, '\r\nOppo A54', 'Oppo', 4500000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/oppo-a54-4g-black.jpg', 1, 'moi', 0, 0, 0),
(21, 'Xiaomi Redme Note 11 Pro', 'Xiaomi', 15000000, 'smartphone', 'https://cdn.mobilecity.vn/mobilecity-vn/images/2021/11/redmi-note-11-pro-xanh-rung-sau.jpg', 2, 'moi', 0, 0, 0),
(22, 'Oppo A55', 'Oppo', 4000000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/oppo-a55-black.jpg', 2, 'moi', 0, 0, 0),
(23, '\r\nOppo A54', 'Oppo', 4500000, 'smartphone', 'https://clickbuy.com.vn/uploads/2021/10/oppo-a54-4g-black.jpg', 1, 'moi', 0, 0, 0),
(25, 'Tai nghe Bluetooth Apple', 'headphone', 4990000, 'accessory', 'https://cdn.tgdd.vn/Products/Images/54/236016/bluetooth-airpods-2-apple-mv7n2-imei-ava-600x600.jpg', 4, 'banchay', 0, 0, 0),
(26, 'Dán chống xước màn hình', 'dan', 290000, 'accessory', 'https://cf.shopee.vn/file/30da670004287e6bd11cb38f731e242f', 3, 'banchay', 0, 0, 0),
(27, 'Giá Đỡ Tản Nhiệt', 'giado', 650000, 'accessory', 'https://salt.tikicdn.com/ts/product/2c/f0/66/2ab49c8adf78e3c5c804a2f74faa16fa.jpg', 3, 'banchay', 0, 0, 0),
(28, 'Chuột Apple', 'mouse', 2100000, 'accessory', 'https://cdn.tgdd.vn/Products/Images/86/251787/chuot-bluetooth-apple-mk2e3-trang-thumb-600x600.jpg', 4, 'banchay', 0, 0, 0),
(29, 'Pin dự phòng 10000mAh', 'pin', 390000, 'accessory', 'https://product.hstatic.net/1000120104/product/zv0e_4ab31f7156d3487aad79bf38a30a5690_master.jpg', 3, 'NULL', 0, 0, 0),
(30, 'Pin dự phòng Samsung', 'pin', 300000, 'accessory', 'https://clickbuy.com.vn/uploads/2019/06/thumb_EB-P1100.jpg', 3, 'NULL', 0, 0, 0),
(31, 'Tai nghe Xiaomi', 'headphone', 150000, 'accessory', 'https://clickbuy.com.vn/uploads/2021/11/pms_1538551358.jpg', 3, 'NULL', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillId`),
  ADD KEY `customerid` (`CustomerId`);

--
-- Indexes for table `billproduct`
--
ALTER TABLE `billproduct`
  ADD PRIMARY KEY (`BillId`,`ProductId`),
  ADD KEY `productid` (`ProductId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`DescId`),
  ADD KEY `desproid` (`ProductId`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvalId`),
  ADD KEY `evalpro` (`ProductId`),
  ADD KEY `evalcusid` (`CustomerId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `DescId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvalId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `customerid` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billproduct`
--
ALTER TABLE `billproduct`
  ADD CONSTRAINT `billid` FOREIGN KEY (`BillId`) REFERENCES `bill` (`BillId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productid` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `desproid` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evalcusid` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evalpro` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
