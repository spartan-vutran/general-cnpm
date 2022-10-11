-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 18, 2022 lúc 07:49 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `techshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `BillId` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Huyen` varchar(50) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `Thon` varchar(50) NOT NULL,
  `Tinh` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Xa` varchar(50) NOT NULL,
  `DateCreateBill` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billproduct`
--

CREATE TABLE `billproduct` (
  `BillId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
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
  `BirthDay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`Id`, `UserName`, `Password`, `Email`, `PhoneNumber`, `FullName`, `Gender`, `Point`, `Admin`, `BirthDay`) VALUES
(22, 'a', '$2y$10$gfuC4uadKpvn2DnpNdYO..EClll1nGFwJFc/RXTJ0bWZ4doajK/9i', 'a@gmail.com', '424', 'aa', 0, 1, 0, '2022-03-25 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `description`
--

CREATE TABLE `description` (
  `DescId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Descip` varchar(200) NOT NULL,
  `ImgUrl` varchar(100) NOT NULL,
  `MainDesc` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluation`
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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Producer` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `ImgUrl` varchar(100) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Special` varchar(50) NOT NULL,
  `SellOff` int(11) NOT NULL,
  `TimeSellOff` datetime NOT NULL,
  `OldPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductId`, `Name`, `Producer`, `Price`, `Status`, `ImgUrl`, `Rating`, `Special`, `SellOff`, `TimeSellOff`, `OldPrice`) VALUES
(1, 'Iphone 13', 'Apple', 1000, 'Còn hàng', 'https://cdn.tgdd.vn/Products/Images/42/230521/iphone-13-pro-sierra-blue-600x600.jpg', 5, 'Special', 0, '2022-03-12 09:50:15', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillId`),
  ADD KEY `customerid` (`CustomerId`);

--
-- Chỉ mục cho bảng `billproduct`
--
ALTER TABLE `billproduct`
  ADD PRIMARY KEY (`BillId`,`ProductId`),
  ADD KEY `productid` (`ProductId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`DescId`),
  ADD KEY `desproid` (`ProductId`);

--
-- Chỉ mục cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvalId`),
  ADD KEY `evalpro` (`ProductId`),
  ADD KEY `evalcusid` (`CustomerId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `description`
--
ALTER TABLE `description`
  MODIFY `DescId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvalId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `customerid` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `billproduct`
--
ALTER TABLE `billproduct`
  ADD CONSTRAINT `billid` FOREIGN KEY (`BillId`) REFERENCES `bill` (`BillId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productid` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `desproid` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evalcusid` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evalpro` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
