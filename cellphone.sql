-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 11:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cellphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `product_category_id`, `brand_image`, `brand_slug`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 1, 'iphone.png', 'dtdd-iphone', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(2, 'Samsung', 1, 'samsung.png', 'dtdd-samsung', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(3, 'OPPO', 1, 'oppo.jpg', 'dtdd-oppo', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(4, 'Xiaomi', 1, 'xiaomi.png', 'dtdd-xiaomi', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(5, 'Vivo', 1, 'vivo.jpg', 'dtdd-vivo', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(6, 'MacBook', 2, 'macbook.png', 'laptop-macbook', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(7, 'Dell', 2, 'dell.png', 'laptop-dell', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(8, 'HP', 2, 'hp.png', 'laptop-hp', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(9, 'Lenovo', 2, 'lenovo.png', 'laptop-lenovo', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(10, 'Asus', 2, 'asus.png', 'laptop-asus', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(11, 'Nokia', 1, 'nokia.jpg', 'dtdd-nokia', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(12, 'Apple Watch', 3, 'apple-watch.png', 'dong-ho-apple-watch', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(13, 'Huami Amazfit', 3, 'amazfit.png', 'dong-ho-huami-amazfit', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(14, 'Xmobile', 4, 'xmobile.jpg', 'xmobile', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(15, 'Hydrus', 4, 'hydrus.jpg', 'hydrus', '2022-05-02 09:34:05', '2022-05-02 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `messages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `user_id`, `messages`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Shop có đt nào dưới 5 triệu 128gb pin 5000 mah ko ạ ! Có nhưng loại đt nào đáp ứng đủ yêu cầu trên ko ạ !', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(2, 2, 1, 'Shop có đt nào dưới 5 triệu 128gb pin 5000 mah ko ạ ! Có nhưng loại đt nào đáp ứng đủ yêu cầu trên ko ạ !', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(3, 2, 2, 'Siêu thị gần nhà ko còn hàng. Muốn mua trả góp phải đến chỗ có hàng đúng ko ạ', '2022-05-02 09:34:05', '2022-05-02 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'huyện Bình Chánh', 1, NULL, NULL),
(2, 'quận Bình Tân', 1, NULL, NULL),
(3, 'quận Bình Thạnh', 1, NULL, NULL),
(4, 'huyện Cần Giờ', 1, NULL, NULL),
(5, 'huyện Củ Chi', 1, NULL, NULL),
(6, 'quận Gò Vấp', 1, NULL, NULL),
(7, 'huyện Hóc Môn', 1, NULL, NULL),
(8, 'huyện Nhà Bè', 1, NULL, NULL),
(9, 'quận Phú Nhuận', 1, NULL, NULL),
(10, 'Quận 1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_03_11_082129_create_product_categories_table', 1),
(3, '2022_03_11_082349_create_brands_table', 1),
(4, '2022_03_11_082459_create_products_table', 1),
(5, '2022_03_11_082732_create_product_details_table', 1),
(6, '2022_03_11_082915_create_specification_types_table', 1),
(7, '2022_03_11_083040_create_product_specifications_table', 1),
(8, '2022_03_11_083200_create_orders_table', 1),
(9, '2022_03_11_083256_create_order_details_table', 1),
(10, '2022_03_11_083336_create_comments_table', 1),
(11, '2022_03_11_083543_create_provinces_table', 1),
(12, '2022_03_11_083643_create_districts_table', 1),
(13, '2022_03_11_083741_create_wards_table', 1),
(14, '2022_04_19_111642_create_statisticals_table', 1),
(15, '2022_05_02_082548_create_trigger_insert_order', 1),
(16, '2022_05_02_084657_create_trigger_delete_order', 1),
(17, '2022_05_02_101743_create_trigger_insert_order_detail', 1),
(18, '2022_05_02_102537_create_trigger_delete_order_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `payment_status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order_status` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `total`, `order_date`, `delivery_date`, `payment_type`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
('12345678912345678912345678912345', 4, 'Lê Quốc Trung', '0123456789', 'Vĩnh Long', 5000000, '2022-05-01 10:29:23', '2022-05-05 10:29:23', 'Thanh toán online', '1', '1', NULL, NULL),
('1234567ab1234567ab1234567ab12345', 3, 'Nguyễn Văn An', '0123456789', 'Cần Thơ', 8500000, '2022-05-01 11:20:23', '2022-05-10 11:20:23', 'Thanh toán khi nhận hàng', '0', '-1', NULL, NULL),
('123456abc123456abc123456abc12345', 4, 'Lê Quốc Trung', '0123456789', 'Vĩnh Long', 3500000, '2022-05-01 11:20:23', '2022-05-03 11:20:23', 'Thanh toán online', '1', '1', NULL, NULL),
('123456abcd123456abcd123456abcd12', 3, 'Nguyễn Văn An', '0123456789', 'Cần Thơ', 10000000, '2022-05-02 20:19:58', '2022-05-03 20:19:58', 'Thanh toán online', '1', '1', NULL, NULL);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `delete_order` AFTER DELETE ON `orders` FOR EACH ROW BEGIN
    	    UPDATE statistical SET sales=sales-OLD.total, total_order=total_order-1 WHERE order_date=LEFT(OLD.order_date, 10);  
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_order` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
                DECLARE total_products INT DEFAULT 0;
                SELECT count(order_date) INTO total_products FROM statistical WHERE order_date = CURDATE();
                IF(total_products>0) THEN
    	            UPDATE statistical SET sales=sales+NEW.total, total_order=total_order+1 WHERE order_date=CURDATE();
                ELSE
    	            INSERT INTO statistical (order_date,sales,quantity,total_order) VALUES (CURDATE(),NEW.total,0,1);
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_detail_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, '123456abcd123456abcd123456abcd12', 45, 2, 5000000, '2022-05-02 13:19:58', '2022-05-02 13:19:58'),
(2, '12345678912345678912345678912345', 46, 1, 5000000, '2022-05-01 03:29:23', '2022-05-01 03:29:23'),
(3, '123456abc123456abc123456abc12345', 47, 1, 3500000, '2022-05-01 04:20:23', '2022-05-01 04:20:23'),
(4, '1234567ab1234567ab1234567ab12345', 47, 1, 3500000, '2022-05-01 04:20:23', '2022-05-01 04:20:23'),
(5, '1234567ab1234567ab1234567ab12345', 46, 1, 5000000, '2022-05-01 04:20:23', '2022-05-01 04:20:23');

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `delete_order_detail` AFTER DELETE ON `order_details` FOR EACH ROW BEGIN
            UPDATE product_details SET product_detail_quantity=product_detail_quantity+OLD.quantity
            WHERE product_detail_id = OLD.product_detail_id;
            UPDATE statistical SET quantity=quantity-OLD.quantity WHERE order_date = LEFT(OLD.created_at,10);
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_order_detail` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
                UPDATE product_details SET product_detail_quantity=product_detail_quantity-NEW.quantity
                WHERE product_detail_id = NEW.product_detail_id;
                UPDATE statistical SET quantity=quantity+NEW.quantity WHERE order_date = CURDATE();
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` double NOT NULL DEFAULT 0,
  `featured` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `product_category_id`, `product_slug`, `product_description`, `product_image`, `product_price`, `product_discount`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 12 64G', 1, 1, 'iphone-12', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.', 'iphone-12.jpg', 20000000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(2, 'Iphone 12 Pro 128G', 1, 1, 'iphone-12-pro', 'iPhone 12 Pro - Siêu phẩm công nghệ với nhiều nâng cấp mạnh mẽ về thiết kế, cấu hình và hiệu năng, khẳng định đẳng cấp thời thượng trên thị trường smartphone cao cấp.', 'iphone-12-pro.jpg', 28000000, 0.1, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(3, 'Iphone 12 Pro Max 128G', 1, 1, 'iphone-12-pro-max', 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng.', 'iphone-12-pro-max.jpg', 30000000, 0.05, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(4, 'Iphone 13 128GB', 1, 1, 'iphone-13', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 - điện thoại có nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', 'iphone-13.jpg', 24500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(5, 'Iphone 13 Pro Max 128GB', 1, 1, 'iphone-13-pro-max', 'iPhone 13 Pro Max 128GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', 'iphone-13-pro-max.jpg', 33200000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(6, 'Iphone 11 64GB', 1, 1, 'iphone-11', 'Tháng 09/2019, Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', 'iphone-11.jpg', 15000000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(7, 'Iphone XR 64GB', 1, 1, 'iphone-xr', 'Là chiếc điện thoại iPhone có mức giá dễ chịu, phù hợp với nhiều khách hàng hơn, iPhone Xr vẫn được ưu ái trang bị chip Apple A12 mạnh mẽ, màn hình tai thỏ cùng khả năng kháng nước kháng bụi.', 'iphone-xr.jpg', 14800000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(8, 'Iphone SE 128GB (2020)', 1, 1, 'iphone-se-2020', 'iPhone SE 2020 khi được cho ra mắt đã làm thỏa mãn triệu tín đồ Táo khuyết. Máy sở hữu thiết kế siêu nhỏ gọn như iPhone 8, chip A13 Bionic cho hiệu năng khủng như iPhone 11, nhưng iPhone SE 2020 lại có một mức giá tốt đến bất ngờ.', 'iphone-se.jpg', 13500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(9, 'Samsung Galaxy Z Fold3 5G 256GB', 2, 1, 'samsung-galaxy-z-fold3', 'Galaxy Z Fold3 5G, chiếc điện thoại được nâng cấp toàn diện về nhiều mặt, đặc biệt đây là điện thoại màn hình gập đầu tiên trên thế giới có camera ẩn (08/2021). Sản phẩm sẽ là một cú hit của Samsung góp phần mang đến những trải nghiệm mới cho người dùng.', 'samsung-galaxy-z-fold3.jpg', 40500000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(10, 'Samsung Galaxy Note 20', 2, 1, 'samsung-galaxy-note-20', 'Tháng 8/2020, Galaxy Note 20 chính thức được lên kệ, với thiết kế camera trước nốt ruồi quen thuộc, cụm camera hình chữ nhật mới lạ cùng với vi xử lý Exynos 990 cao cấp của chính Samsung chắc hẳn sẽ mang lại một trải nghiệm thú vị cùng hiệu năng mạnh mẽ.', 'samsung-galaxy-note-20.jpg', 15300000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(11, 'Samsung Galaxy A51 (6GB/128GB)', 2, 1, 'samsung-galaxy-a51', 'Theo Strategy Analytics, Galaxy A51 là Smartphone Android Bán Chạy Nhất Thế Giới Quý 1/2020, máy sở hữu cụm 4 camera, bao gồm camera macro chụp cận cảnh lần đầu xuất hiện trên smartphone Samsung, màn hình tràn viền vô cực cùng mặt lưng họa tiết kim cương nổi bật.', 'samsung-galaxy-a51.jpg', 7500000, 0.2, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(12, 'Samsung Galaxy A22', 2, 1, 'samsung-galaxy-a22', 'Samsung chào đón mùa hè 2021 bằng sự ra mắt của bộ đôi Galaxy A22 và Galaxy A22 5G với nhiều thông số ấn tượng. Trong đó, Galaxy A22 sở hữu viên pin đầy năng suất, hiệu năng gaming mạnh mẽ và màn hình lớn có khả năng hiển thị tốt.', 'samsung-galaxy-a22.jpg', 5500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(13, 'Samsung Galaxy A02', 2, 1, 'samsung-galaxy-a02', 'Samsung bổ sung thêm tùy chọn smartphone trong phân khúc giá rẻ mang tên Galaxy A02, máy trang bị một cấu hình ổn định cùng mức pin khủng 5000 mAh cho thời lượng vượt trội trong tầm giá mang đến bạn nhiều trải nghiệm thú vị hơn.', 'samsung-galaxy-a02.jpg', 2500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(14, 'Samsung Galaxy S20 FE (8GB/256GB)', 2, 1, 'samsung-galaxy-s20', 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.', 'samsung-galaxy-s20.jpg', 15400000, 0.1, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(15, 'Samsung Galaxy S21 5G', 2, 1, 'samsung-galaxy-s21', 'Galaxy S21 5G nằm trong series S21 đến từ Samsung nổi bật với thiết kế tràn viền, cụm camera ấn tượng cho đến hiệu năng mạnh mẽ hàng đầu.', 'samsung-galaxy-s21.jpg', 20200000, 0.05, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(16, 'OPPO Reno6 Z 5G', 3, 1, 'oppo-reno6-z-5g', 'Reno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất, đây chắc chắn sẽ là một siêu phẩm mà bạn không thể bỏ qua.', 'oppo-reno6-z-5g.jpg', 9200000, 0.1, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(17, 'OPPO Reno5 Marvel', 3, 1, 'oppo-reno5-marvel', 'OPPO cho ra mắt một phiên bản giới hạn mới OPPO Reno5 Marvel, về hiệu năng cấu hình bên trong máy hoàn toàn tương tự so với Reno5, nhưng về kiểu dáng bên ngoài máy có phần khác biệt với thiết kế tùy chỉnh với mặt lưng có logo Marvel, logo Avengers hoàn toàn mới lạ.', 'oppo-reno5-marvel.jpg', 9900000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(18, 'OPPO Reno4 Pro', 3, 1, 'oppo-reno4-pro', 'OPPO chính thức trình làng chiếc smartphone có tên OPPO Reno4 Pro. Máy trang bị cấu hình vô cùng cao cấp với vi xử lý chip Snapdragon 720G, bộ 4 camera đến 48 MP ấn tượng, cùng công nghệ sạc siêu nhanh 65 W nhưng được bán với mức giá ưu đãi, dễ tiếp cận.', 'oppo-reno4-pro.jpg', 10400000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(19, 'OPPO A93', 3, 1, 'oppo-a93', 'OPPO đã tung ra OPPO A93 dòng sản phẩm thuộc phân khúc điện thoại tầm trung được xem là tiếp nối từ OPPO A92 với nhiều điểm được nâng cấp như hiệu năng, hệ thống camera cùng khả năng sạc nhanh 18 W.', 'oppo-a93.jpg', 6400000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(20, 'OPPO A16K', 3, 1, 'oppo-a16k', 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.', 'oppo-a16k.jpg', 3500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(21, 'OPPO Find X3 Pro 5G', 3, 1, 'oppo-find-x3-pro', 'OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.', 'oppo-find-x3-pro.jpg', 19750000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(22, 'OPPO A74 5G', 3, 1, 'oppo-a74-5g', 'OPPO A74 5G mẫu điện thoại có kết nối 5G với mức giá tốt của OPPO. Máy có thiết kế tinh tế, màn hình 90 Hz mượt mà và cụm camera làm đẹp AI sẽ là những điểm nhấn đáng tiền trên mẫu điện thoại này.', 'oppo-a74-5g.jpg', 7800000, 0.15, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(23, 'Xiaomi 11T 5G 128GB', 4, 1, 'xiaomi-11t', 'Xiaomi 11T đầy nổi bật với thiết kế vô cùng trẻ trung, màn hình AMOLED, bộ 3 camera sắc nét và viên pin lớn đây sẽ là mẫu smartphone của Xiaomi thỏa mãn mọi nhu cầu giải trí, làm việc và là niềm đam mê sáng tạo của bạn.', 'xiaomi-11t.jpg', 10500000, 0.3, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(24, 'Dell Gaming G3 15 i7 10750H (P89F002BWH)', 7, 2, 'dell-g3-15-i7-p89f002bwh', 'Laptop Dell G3 15 i7 (P89F002BWH) thuộc dòng laptop gaming với cấu hình mạnh mẽ, thiết kế trang nhã và rất sang trọng, dễ lựa chọn cho cả người đi đọc, đi làm, là 1 phiên bản tốt để lựa chọn cho cả nhu cầu làm việc, học tập và chơi game giải trí.', 'dell-g3-15-i7-10750h.jpg', 31500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(25, 'Dell Latitude 3520 i7 1165G7 (70261780)', 7, 2, 'dell-latitude-3520-i7-70261780', 'Laptop Dell Latitude 3520 i7 (70261780) sở hữu thiết hiện đại thường thấy của các sản phẩm nhà Dell, nhưng mang trong mình cấu hình mạnh mẽ vượt trội, là người trợ thủ đắc lực cho bạn từ công việc đến giải trí.', 'dell-latitude-3520-i7-70261780.jpg', 31000000, 0.15, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(26, 'Dell Inspiron 7501 i5 10300H (N5I5012W)', 7, 2, 'dell-inspiron-7501-i5-n5i5012w', 'Dell Inspiron 7501 i5 (N5I5012W) sở hữu thiết kế trẻ trung, hiện đại cùng hiệu năng mạnh mẽ, đáp ứng mượt mà các tác vụ văn phòng đến đồ họa chuyên nghiệp là sản phẩm tuyệt vời dành cho bạn.', 'dell-inspiron-7501-i5-n5i5012w.jpg', 30200000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(27, 'Dell Inspiron 3501 i3 1115G4 (P90F005N3501C)', 7, 2, 'dell-inspiron-3501-i3-p90f005m3501c', 'Laptop Dell Inspiron 3501 i3 1115G4 (P90F005N3501C) mang thiết kế thanh lịch, cấu hình ổn cho nhu cầu sử dụng học tập, làm việc văn phòng phù hợp với học sinh, sinh viên.', 'dell-inspiron-3501-i3-p90f005m3501c.jpg', 15000000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(28, 'Dell Inspiron 7400 i5 1135G7 (N4I5134W)', 7, 2, 'dell-inspiron-7400-i5-n4i5134w', 'Mang đến kiểu dáng sang trọng và đẳng cấp, laptop Dell Inspiron 7400 i5 1135G7 (N4I5134W) với sức mạnh hiệu năng mạnh mẽ từ chip Intel Gen 11, là cộng sự lý tưởng ở cả công việc và giải trí.', 'dell-inspiron-7400-i5-1135g7.jpg', 30000000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(29, 'Dell Inspiron 14 5410 i5 1155G7 (N4I5547W)', 7, 2, 'dell-inspiron-14-5410-i5-n4i5547w', 'Dell Inspiron 14 5410 i5 (N4I5547W) mang phong cách thiết kế tối giản tinh tế cùng sở hữu con chip Intel thế hệ 11 tiên tiến, card đồ hoạ rời, đảm bảo đáp ứng mượt mà các tác vụ, nhu cầu thiết yếu của học sinh - sinh viên.', 'dell-inspiron-14-5410-i5-n4i5547w.jpg', 27000000, 0.08, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(30, 'HP ZBook Firefly 14 G8 i5 1135G7 (275V5AV)', 8, 2, 'hp-zbook-firefly-14-g8-i5-275v5av', 'HP ZBook Firefly 14 G8 (275V5AV) chinh phục mọi đối tượng khách hàng với phong cách thiết kế thời thượng, gọn nhẹ cùng những tính năng ưu việt mà nó mang lại, đáp ứng tối đa mọi nhu cầu cần thiết từ học tập - văn phòng cơ bản đến thiết kế đồ họa chuyên sâu.', 'hp-zbook-firefly-14-g8-i5-275v5av.jpg', 39400000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(31, 'HP 15s du1105TU i3 10110U (2Z6L3PA)', 8, 2, 'hp-15s-du1105tu-i3-2z6l3pa', 'HP 15s du1105TU i3 (2Z6L3PA) với kiểu dáng sang trọng, phong cách trẻ trung cùng cấu hình ổn định, xử lý tốt mọi tác vụ công việc. Đây sẽ là lựa chọn lý tưởng dành cho các bạn học sinh, sinh viên.', 'hp-15s-du1105tu-i3-10110u.jpg', 12400000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(32, 'Lenovo YOGA Slim 7 Carbon 13ITL5 i5 1135G7 (82EV0016VN)', 9, 2, 'lenovo-yoga-slim-7-carbon-13itl5-i5-82ev0016vn', 'Lenovo YOGA Slim 7 Carbon 13ITL5 i5 (82EV0016VN) mang trong mình bộ xử lý cực mạnh với kiểu dáng vô cùng sang trọng, laptop Lenovo hứa hẹn sẽ là một con sản phẩm đáng mong đợi, lý tưởng cho công việc văn phòng của bạn.', 'lenovo-yoga-slim-7-carbon-82ev0016vn.jpg', 26500000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(33, 'Lenovo Ideapad 3 15ITL6 i3 1115G4 (82H8005CVN)', 9, 2, 'lenovo-ideapad-3-15itl6-82h8005cvn', 'Lenovo Ideapad 3 15ITL6 i3 (82H8005CVN) sở hữu thiết kế đơn giản, thanh lịch, sức mạnh hiệu năng tốt từ chip Intel thế hệ 11, thoải mái sử dụng cho nhu cầu học tập - văn phòng và giải trí đơn giản, một lựa chọn vừa túi tiền dành cho bạn.', 'lenovo-ideapad-3-15itl6-i3-82h8005cvn.jpg', 14000000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(34, 'Apple MacBook Pro M1 2020 (Z11C000CJ)', 6, 2, 'macbook-pro-m1-2020', 'Laptop Apple Macbook Pro M1 2020 (Z11C000CJ) với chip M1 dành riêng cho MacBook đưa hiệu năng của MacBook Pro 2020 lên một tầm cao mới. Màn hình Retina siêu nét, thời lượng pin ấn tượng và hàng loạt các tính năng hiện đại giúp bạn có được trải nghiệm làm việc chuyên nghiệp nhất.', 'apple-macbook-pro-m1-2020.jpg', 50000000, 0.03, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(35, 'Apple MacBook Pro 16 M1 Max 2021', 6, 2, 'macbook-pro-16-m1-max-2021', 'Thật ấn tượng với Apple MacBook Pro 16 M1 Max 2021 mang trên mình \"bộ áo mới\" độc đáo, cuốn hút mọi ánh nhìn cùng màn hình tai thỏ lần đầu tiên xuất hiện ở dòng Mac và ẩn bên trong là bộ cấu hình mạnh mẽ tuyệt vời đến từ con chip M1 Max tân tiến.', 'apple-macbook-pro-16-m1-max-2021.jpg', 90500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(36, 'Apple Watch S6 LTE 40mm viền thép dây cao su', 12, 3, 'apple-watch-s6-lte-vien-thep-day-cao-su', 'Apple Watch S6 LTE 40mm viền thép dây cao su đen là một trong những dòng đồng hồ được ưa chuộng với thiết kế tinh tinh tế trong từng chi tiết, khung viền được gia công chắc chắn, dây đeo cao su đàn hồi tốt, màn hình sắc nét 1.57 inch hiển thị đủ thông tin. Đây là chiếc đồng hồ hứa hẹn đem đến cho bạn sự hài lòng khi đeo trên tay.', 'apple-watch-s6-lte-40mm-vien-thep-day-cao-su.jpg', 14800000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(37, 'Apple Watch SE 44mm viền nhôm dây cao su', 12, 3, 'apple-watch-se-vien-nhom-day-cao-su', 'Apple Watch SE 44mm viền nhôm dây cao su có màn hình Retina 1.78 inch cùng độ phân giải 448 x 368 pixels giúp hiển thị thông tin và hình ảnh được rõ ràng và sắc nét. Dây đeo cao su có độ đàn hồi cao, tạo cảm giác thoải mái cho cổ tay khi làm việc và tập luyện thể thao. Thiết kế hình vuông bo tròn 4 góc, khá giống với phiên bản Series 5, mặt kính cong 2.5D tạo cảm giác vuốt và chạm mượt mà.', 'apple-watch-se-44mm-vien-nhom-day-cao-su.jpg', 9000000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(38, 'Huami Amazfit GTR 42mm', 13, 3, 'huami-amazfit-gtr-42mm', 'Đồng hồ thông minh Huami Amazfit GTR 42mm trắng có thiết kế trẻ trung với mặt tròn cá tính, được trang bị mặt kính cường lực cho người dùng yên tâm đeo đồng hồ mà không lo lắng nhiều về vấn đề trầy xước màn hình. Cùng với đó, cổ tay của bạn sẽ dễ chịu hơn khi chiếc đồng hồ được trang bị dây đeo silicone mềm mại.', 'huami-amazfit-gtr-42mm.jpg', 2700000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(39, 'Amazfit GTR 3', 13, 3, 'amazfit-gtr-3', 'Amazfit GTR 3 là chiếc đồng hồ thông minh có thiết kế vẫn mang đậm chất thời trang, hiện đại của nhà Amazfit nhưng được tối giản với khối lượng rất nhẹ chỉ 32 gram. Mặt đồng hồ được thiết kế mặt tròn cổ điển, được bao bọc bởi khung viền hợp kim nhôm cao cấp đem đến sự bền bỉ chắn chắc cho thiết bị.', 'amazfit-gtr-3.jpg', 4800000, 0.3, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(40, 'Xiaomi Redmi 9C (4GB/128GB)', 4, 1, 'xiaomi-redmi-9c', 'Redmi 9C (4GB/128GB) được trang bị màn hình lớn, viên pin trâu, 3 camera AI cùng một hiệu năng đầy ổn định sẽ là lựa chọn tốt cho khách hàng đang muốn tìm một chiếc smartphone giá rẻ đầy đủ tính năng đến từ Xiaomi.', 'xiaomi-redmi-9c.jpg', 3300000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(41, 'Xiaomi Redmi 9A', 4, 1, 'xiaomi-redmi-9a', 'Redmi 9A là chiếc smartphone đến từ Xiaomi hướng tới nhóm khách hàng đang tìm kiếm cho mình một sản phẩm với cấu hình tốt giá thành phải chăng, cũng như được trang bị đầy đủ các tính năng ấn tượng.', 'xiaomi-redmi-9a.jpg', 2250000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(42, 'Samsung Galaxy A72', 2, 1, 'samsung-galaxy-a72', 'Sau sự thành công của Galaxy S21 series, Samsung tiếp tục tấn công phân khúc tầm trung với Galaxy A72 thuộc Galaxy A series, sở hữu nhiều màu sắc trẻ trung, hệ thống camera nhiều tính năng cũng như nâng cấp hiệu năng vô cùng lớn mang đến những trải nghiệm hoàn toàn mới.', 'samsung-galaxy-a72.jpg', 11200000, 0.2, '1', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(43, 'OPPO A55', 3, 1, 'oppo-a55', 'OPPO cho ra mắt OPPO A55 4G chiếc smartphone giá rẻ tầm trung có thiết kế đẹp mắt, cấu hình khá ổn, cụm camera chất lượng và dung lượng pin ấn tượng, mang đến một lựa chọn trải nghiệm thú vị vừa túi tiền cho người tiêu dùng.', 'oppo-a55.jpg', 4800000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(44, 'OPPO A74', 3, 1, 'oppo-a74', 'OPPO luôn đa dạng hoá các sản phẩm của mình từ giá rẻ cho đến cao cấp. Trong đó, điện thoại OPPO A74 4G được nằm trong phân khúc tầm trung rất đáng chú ý với nhiều tính năng và smartphone cũng chính là bản nâng cấp của OPPO A73 ra mắt trước đó.', 'oppo-a74.jpg', 6500000, 0.15, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(45, 'Vivo V20 (2021)', 5, 1, 'vivo-v20-2021', 'Vivo tung ra chiếc điện thoại Vivo V20 (2021) là phiên bản nâng cấp của Vivo V20 ra mắt trước đó. Chiếc smartphone này được nâng cấp lên bộ xử lý mạnh mẽ hơn mà vẫn giữ được thiết kế siêu mỏng và cụm camera chụp đẹp đáng kinh ngạc.', 'vivov202021.jpg', 8280000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(46, 'Pin sạc dự phòng 10.000 mAh Type C Xmobile Gram 4', 14, 4, 'xmobile-gram-4', 'Pin sạc dự phòng 10.000 mAh Xmobile Gram 4 Xanh Navy với kiểu dáng nhỏ nhắn, sắc xanh nổi bật, thoải mái mang theo sử dụng mọi lúc.', 'xmobile-gram-4.jpg', 450000, 0.4, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(47, 'Pin sạc dự phòng 10000mAh Type C PD QC3.0 Hydrus PB299S', 15, 4, 'hydrus-pb299s', 'Hiệu suất sạc 60% tương đương 6000 mAh, sạc được cho iPhone 12 mini và iPhone SE khoảng 2.5 lần. Tích hợp cả 2 công nghệ Power Delivery và Quick Charge 3.0 tăng tốc độ sạc cho các thiết bị nhanh hơn. Trang bị 2 cổng ra phổ biến Type-C (tối đa 20 W), USB (tối đa 18 W) và cho công suất sạc nhanh tối đa là 15W khi sạc cùng lúc hai cổng.', 'hydrus-pb299s.jpeg', 750000, 0.5, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(48, 'Pin sạc dự phòng 10.000 mAh Type C Xmobile Gram 4 Dull Dog', 14, 4, 'xmobile-gram-4-dull-dog', 'Pin sạc dự phòng 10.000 mAh Xmobile Gram 4 Dull Dog Xanh lá có họa tiết hình chú cún dễ thương, kiểu dáng tiện dụng bỏ túi mang theo.', 'xmobile-gram-4-dull-dog.jpg', 450000, 0.45, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(49, 'Nokia 105 4G', 11, 1, 'nokia-105-4g', '​Nokia 105 4G - Chiếc điện thoại phổ thông nổi bật với thiết kế sang trọng, khả năng nghe gọi bền bỉ trong thời gian dài, hỗ trợ công nghệ 4G cùng nhiều tiện ích giải trí hấp dẫn khác đến từ nhà Nokia.', 'nokia-105-4g.jpg', 750000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(50, 'Nokia 110 4G', 11, 1, 'nokia-110-4g', 'Nokia chính thức trình làng chiếc điện thoại Nokia 110 4G phiên bản nâng cấp của Nokia 110 2019 có điểm nhấn chính là công nghệ kết nối Internet 4G thỏa thích trải nghiệm mọi lúc, mọi nơi cùng với một thiết kế vô cùng mới mẻ và sang trọng.', 'nokia-110-4g.jpg', 850000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(51, 'Nokia 150 (2020)', 11, 1, 'nokia-150-2020', 'Nokia 150 (2020) là phiên bản tiếp theo của Nokia 150 (2017) đã rất thành công trước đó. Được cải tiến nhiều nhất về thiết kế, nâng cấp bộ nhớ danh bạ đến 800 số và có bàn phím T9 lớn hơn dễ sử dụng.', 'nokia-150-2020.jpg', 700000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(52, 'Nokia 105 Single SIM', 11, 1, 'nokia-105-single-sim', 'Nokia 105 Single SIM (2019) là sự lựa chọn hàng đầu cho những người dùng muốn một chiếc điện thoại cục gạch với độ bền cao và tới từ thương hiệu Nokia vốn đã tạo được lòng tin từ người dùng.', 'nokia-105-2019.jpg', 410000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(53, 'Nokia 6300 4G', 11, 1, 'nokia-6300-4g', 'Thương hiệu Nokia vẫn phát huy nét đẹp hoài cổ trong ngoại hình nhưng đâu đó pha lẫn chút hiện đại từ những cải tiến công nghệ, Nokia 6300 4G chính là ví dụ điển hình ấy.', 'nokia-6300.jpg', 1290000, 0.1, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(54, 'Nokia 3.4', 11, 1, 'nokia-34', 'Công ty HMD Global đến từ Phần Lan chính thức bổ sung thành viên mới cho loạt smartphone giá rẻ của mình. Đây là một sản phẩm có màn hình lớn, thiết kế cứng cáp và là điện thoại Nokia series 3 đầu tiên sở hữu màn hình \"đục lỗ\", đó chính là Nokia 3.4.', 'nokia-34.jpg', 3290000, 0.05, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(55, 'Asus ZenBook UX363EA i7 1165G7 (HP740W)', 10, 2, 'asus-zenbook-ux363ea-hp740w', 'Asus ZenBook UX363EA (HP740W) mang đến một dấu ấn hoàn hảo cho người dùng với kiểu dáng thiết kế cao cấp - sang trọng cùng sức mạnh hiệu năng đáng gờm, sẽ là một sự lựa chọn phù hợp với mọi đối tượng đặc biệt là các doanh nhân hay dân làm việc văn phòng.', 'asus-zenbook-ux363ea.jpg', 33250000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(56, 'Asus ZenBook Flip UX363EA i5 1135G7 (HP726W)', 10, 2, 'asus-zenbook-flip-ux363ea-hp726w', 'Asus ZenBook Flip UX363EA i5 (HP726W) mang kiểu dáng hiện đại, thiết kế 2 trong 1 linh hoạt cùng sức mạnh hiệu năng đến từ bộ vi xử lý Intel thế hệ 11 tân tiến cho khả năng đồ hoạ cao, đáp ứng tốt các ứng dụng văn phòng phức tạp cũng như giải trí hàng ngày.', 'asus-zenbook-flip-ux363ea.jpg', 27750000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(57, 'Vivo Y53s', 5, 1, 'vivo-y53s', 'Vivo mang đến niềm vui cho mọi người tin dùng khi hãng chính thức tung ra chiếc điện thoại Vivo Y53s với những tính năng tiên tiến đi cùng hiệu năng mạnh mẽ. Đặc biệt, smartphone lại còn sở hữu mức giá hấp dẫn trong phân khúc tầm trung đầy hứa hẹn.', 'vivo-y53s.jpg', 6500000, 0, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(58, 'Vivo Y51 (2020)', 5, 1, 'vivo-y51-2020', 'Vivo đã mang chiếc điện thoại Vivo Y51 một lần nữa quay trở lại với người dùng trong một thiết kế hoàn toàn mới, nâng cấp từ công nghệ màn hình, cụm camera đến hệ điều hành với tên gọi Vivo Y51 (2020).', 'vivo-y51.jpg', 6000000, 0.2, '0', '2022-05-02 09:34:05', '2022-05-02 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `product_category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', NULL, NULL),
(2, 'Laptop', 'laptop', NULL, NULL),
(3, 'Đồng hồ', 'dong-ho', NULL, NULL),
(4, 'Phụ kiện', 'phu-kien', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_detail_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_detail_id`, `product_id`, `color`, `product_detail_image`, `product_detail_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đỏ', 'iphone-12-do.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(2, 1, 'Đen', 'iphone-12-den.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(3, 1, 'Trắng', 'iphone-12-trang.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(4, 1, 'Tím', 'iphone-12-violet.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(5, 1, 'Xanh lá', 'iphone-12-xanh-la.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(6, 2, 'Bạc', 'iphone-12-pro-bac.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(7, 2, 'Vàng', 'iphone-12-pro-vang.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(8, 2, 'Xám', 'iphone-12-pro-xam.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(9, 3, 'Bạc', 'iphone-12-pro-max-bac.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(10, 3, 'Vàng', 'iphone-12-pro-max-vang.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(11, 3, 'Xám', 'iphone-12-pro-max-xam.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(12, 4, 'Đen', 'iphone-13-den.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(13, 4, 'Trắng', 'iphone-13-trang.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(14, 4, 'Xanh', 'iphone-13-xanh.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(15, 5, 'Bạc', 'iphone-13-pro-max-bac.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(16, 5, 'Vàng', 'iphone-13-pro-max-vang.jpg', 1, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(17, 5, 'Xám', 'iphone-13-pro-max-xam.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(18, 6, 'Đỏ', 'iphone-11-do.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(19, 6, 'Trắng', 'iphone-11-trang.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(20, 6, 'Vàng', 'iphone-11-vang.jpg', 1, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(21, 6, 'Xanh lá', 'iphone-11-xanh-la.jpg', 3, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(22, 7, 'Đen', 'iphone-xr-den.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(23, 8, 'Đỏ', 'iphone-se-do.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(24, 9, 'Đen', 'samsung-galaxy-z-fold3-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(25, 9, 'Bạc', 'samsung-galaxy-z-fold3-bac.jpg', 30, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(26, 10, 'Xám', 'samsung-galaxy-note-20-xam.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(27, 10, 'Vàng đồng', 'samsung-galaxy-note-20-vang-dong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(28, 10, 'Xanh lá', 'samsung-galaxy-note-20-xanh-la.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(29, 11, 'Bạc', 'samsung-galaxy-a51-bac.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(30, 11, 'Xanh ngọc', 'samsung-galaxy-a51-xanh-ngoc.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(31, 11, 'Đen', 'samsung-galaxy-a51-den.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(32, 11, 'Trắng', 'samsung-galaxy-a51-trang.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(33, 12, 'Xanh lá', 'samsung-galaxy-a22-xanh-la.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(34, 12, 'Đen', 'samsung-galaxy-a22-4g-den.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(35, 13, 'Xanh dương', 'samsung-galaxy-a02-xanhduong.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(36, 14, 'Xanh lá', 'samsung-galaxy-s20-xanh-la.jpg', 2, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(37, 15, 'Tím', 'samsung-galaxy-s21-tim.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(38, 15, 'Trắng', 'samsung-galaxy-s21-trang.jpg', 1, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(39, 15, 'Xám', 'samsung-galaxy-s21-xam.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(40, 16, 'Bạc', 'oppo-reno6-z-5g-bac.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(41, 16, 'Đen', 'oppo-reno6-z-5g-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(42, 17, 'Đen', 'oppo-reno5-marvel-den.jpg', 15, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(43, 18, 'Trắng', 'oppo-reno4-pro-trang.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(44, 18, 'Đen', 'oppo-reno4-pro-den.jpg', 30, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(45, 19, 'Trắng', 'oppo-a93-trang.jpg', 18, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(46, 19, 'Đen', 'oppo-a93-den.jpg', 28, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(47, 20, 'Xanh dương', 'oppo-a16k-xanh-duong.jpg', 18, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(48, 21, 'Xanh', 'oppo-find-x3-pro-xanh.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(49, 21, 'Đen', 'oppo-find-x3-pro-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(50, 22, 'Bạc', 'oppo-a74-5g-bac.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(51, 22, 'Đen', 'oppo-a74-5g-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(52, 23, 'Trắng', 'xiaomi-11t-trang.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(53, 23, 'Xanh dương', 'xiaomi-11t-xanh-duong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(54, 23, 'Xám', 'xiaomi-11t-xam.jpg', 25, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(55, 24, 'Trắng', 'dell-g3-15-i7-p89f002bwh-trang.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(56, 25, 'Đen', 'dell-latitude-3520-i7-70261780-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(57, 26, 'Bạc', 'dell-inspiron-7501-i5-n5i5012w-bac.jpg', 3, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(58, 27, 'Đen', 'dell-inspiron-3501-i3-n3501c-den.jpg', 2, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(59, 28, 'Bạc', 'dell-inspiron-7400-i5-n4i5134w-bac.jpg', 8, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(60, 29, 'Bạc', 'dell-inspiron-14-5410-i5-n4i5547w-bac.jpg', 15, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(61, 30, 'Xám', 'hp-zbook-firefly-14-g8-i5-275v5av-xam.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(62, 31, 'Bạc', 'hp-15s-du1105tu-i3-10110u-bac.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(63, 32, 'Trắng', 'lenovo-yoga-slim-7-carbon-13itl5-i5-82ev0016vn-trang.jpg', 4, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(64, 33, 'Xám', 'lenovo-ideapad-3-15itl6-i3-82h8005cvn-xam.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(65, 34, 'Xám', 'apple-macebook-pro-m1-2020-xam.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(66, 35, 'Xám', 'apple-macbook-pro-16-m1-max-2021-xam.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(67, 35, 'Bạc', 'apple-macbook-pro-16-m1-max-2021-bac.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(68, 36, 'Đen', 'apple-watch-s6-lte-40mm-vien-thep-day-cao-su-den.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(69, 36, 'Xanh lá', 'apple-watch-s6-lte-40mm-vien-thep-day-cao-su-xanh-la.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(70, 36, 'Xanh dương', 's6-lte-40mm-vien-thep-day-cao-su-xanh-duong.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(71, 37, 'Đen', 'apple-watch-se-44mm-vien-nhom-day-cao-su-den.jpg', 30, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(72, 37, 'Hồng', 'apple-watch-se-44mm-vien-nhom-day-cao-su-hong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(73, 38, 'Trắng', 'huami-amazfit-gtr-42mm-trang.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(74, 39, 'Đen', 'amazfit-gtr-3-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(75, 39, 'Vàng', 'amazfit-gtr-3-vang.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(76, 40, 'Xanh dương', 'xiaomi-redmi-9c-xanh-duong.jpg', 3, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(77, 40, 'Xám', 'xiaomi-redmi-9c-xam.jpg', 12, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(78, 40, 'Xanh lá', 'xiaomi-redmi-9c-xanh-la.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(79, 40, 'Tím', 'xiaomi-redmi-9c-tim.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(80, 41, 'Xanh', 'xiaomi-redmi-9a-xanh.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(81, 41, 'Xanh lá', 'xiaomi-redmi-9a-xanh-la.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(82, 41, 'Xám', 'xiaomi-redmi-9a-xam.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(83, 42, 'Đen', 'samsung-galaxy-a72-den.jpg', 50, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(84, 42, 'Xanh dương', 'samsung-galaxy-a72-xanh-duong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(85, 42, 'Tím', 'samsung-galaxy-a72-tim.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(86, 42, 'Trắng', 'samsung-galaxy-a72-trang.jpg', 30, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(87, 43, 'Xanh dương', 'oppo-a55-xanh-duong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(88, 43, 'Đen', 'oppo-a55-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(89, 44, 'Xanh dương', 'oppo-a74-xanh-duong.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(90, 44, 'Đen', 'oppo-a74-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(91, 45, 'Đen', 'vivo-v20-2021-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(92, 45, 'Xanh hồng', 'vivo-v20-2021-xanh-hong.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(93, 46, 'Xanh', 'xmobile-gram-4-xanh.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(94, 47, 'Cam', 'hydrus-pb299s-cam.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(95, 48, 'Xanh lá', 'xmobile-gram-4-dull-dog-xanh-la.jpg', 100, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(96, 49, 'Xanh ngọc', 'nokia-105-4g-xanh-ngoc.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(97, 49, 'Đen', 'nokia-105-4g-den.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(98, 50, 'Vàng', 'nokia-110-4g-vang.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(99, 50, 'Xanh ngọc', 'nokia-110-4g-xanh-ngoc.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(100, 50, 'Đen', 'nokia-110-4g-den.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(101, 51, 'Đen', 'nokia-150-2020-den.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(102, 51, 'Đỏ', 'nokia-150-2020-do.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(103, 51, 'Xanh lam', 'nokia-150-2020-xanh-lam.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(104, 52, 'Đen', 'nokia-105-single-sim-2019-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(105, 52, 'Xanh dương', 'nokia-105-single-sim-2019-xanh-duong.jpg', 2, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(106, 53, 'Xanh ngọc', 'nokia-6300-4g-xanh-ngoc.jpg', 1, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(107, 53, 'Xám', 'nokia-6300-4g-xam.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(108, 54, 'Đen', 'nokia-34-den.jpg', 10, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(109, 55, 'Xám', 'asus-zenbook-ux363ea-xam.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(110, 56, 'Xám', 'asus-zenbook-flip-ux363ea-xam.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(111, 57, 'Xanh tím', 'vivo-y53s-xanh-tim.jpg', 5, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(112, 57, 'Đen', 'vivo-y53s-den.jpg', 20, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(113, 58, 'Tím bạc', 'vivo-y51-2020-tim-bac.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05'),
(114, 58, 'Xanh dương', 'vivo-y51-2020-xanh-duong.jpg', 0, '2022-05-02 09:34:05', '2022-05-02 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `specification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`product_id`, `type_id`, `specification`, `created_at`, `updated_at`) VALUES
(1, 1, 'OLED, 6.1, Super Retina XDR', NULL, NULL),
(1, 2, 'iOS 14', NULL, NULL),
(1, 3, '2 camera 12 MP', NULL, NULL),
(1, 4, '12 MP', NULL, NULL),
(1, 5, 'Apple A14 Bionic', NULL, NULL),
(1, 6, '4 GB', NULL, NULL),
(1, 7, '64 GB', NULL, NULL),
(1, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(1, 9, '2815mAh, 20W', NULL, NULL),
(2, 1, 'OLED, 6.1, Super Retina XDR', NULL, NULL),
(2, 2, 'iOS 14', NULL, NULL),
(2, 3, '3 camera 12 MP', NULL, NULL),
(2, 4, '12 MP', NULL, NULL),
(2, 5, 'Apple A14 Bionic', NULL, NULL),
(2, 6, '6 GB', NULL, NULL),
(2, 7, '128 GB', NULL, NULL),
(2, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(2, 9, '2815mAh, 20W', NULL, NULL),
(3, 1, 'OLED, 6.7, Super Retina XDR', NULL, NULL),
(3, 2, 'iOS 14', NULL, NULL),
(3, 3, '3 camera 12 MP', NULL, NULL),
(3, 4, '12 MP', NULL, NULL),
(3, 5, 'Apple A14 Bionic', NULL, NULL),
(3, 6, '6 GB', NULL, NULL),
(3, 7, '128 GB', NULL, NULL),
(3, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(3, 9, '3687mAh, 20W', NULL, NULL),
(4, 1, 'OLED, 6.1, Super Retina XDR', NULL, NULL),
(4, 2, 'iOS 15', NULL, NULL),
(4, 3, '2 camera 12 MP', NULL, NULL),
(4, 4, '12 MP', NULL, NULL),
(4, 5, 'Apple A15 Bionic', NULL, NULL),
(4, 6, '4 GB', NULL, NULL),
(4, 7, '128 GB', NULL, NULL),
(4, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(4, 9, '3240mAh, 20W', NULL, NULL),
(5, 1, 'OLED, 6.7, Super Retina XDR', NULL, NULL),
(5, 2, 'iOS 15', NULL, NULL),
(5, 3, '3 camera 12 MP', NULL, NULL),
(5, 4, '12 MP', NULL, NULL),
(5, 5, 'Apple A15 Bionic', NULL, NULL),
(5, 6, '6 GB', NULL, NULL),
(5, 7, '128 GB', NULL, NULL),
(5, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(5, 9, '4352mAh, 20W', NULL, NULL),
(6, 1, 'IPS LCD, 6.1, Liquid Retina', NULL, NULL),
(6, 2, 'iOS 14', NULL, NULL),
(6, 3, '2 camera 12 MP', NULL, NULL),
(6, 4, '12 MP', NULL, NULL),
(6, 5, 'Apple A13 Bionic', NULL, NULL),
(6, 6, '4 GB', NULL, NULL),
(6, 7, '64 GB', NULL, NULL),
(6, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 4G', NULL, NULL),
(6, 9, '3110mAh, 18W', NULL, NULL),
(7, 1, 'IPS LCD, 6.1, Liquid Retina', NULL, NULL),
(7, 2, 'iOS 14', NULL, NULL),
(7, 3, '12 MP', NULL, NULL),
(7, 4, '7 MP', NULL, NULL),
(7, 5, 'Apple A12 Bionic', NULL, NULL),
(7, 6, '3 GB', NULL, NULL),
(7, 7, '64 GB', NULL, NULL),
(7, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 4G', NULL, NULL),
(7, 9, '2942mAh, 15W', NULL, NULL),
(8, 1, 'IPS LCD, 4.7', NULL, NULL),
(8, 2, 'iOS 14', NULL, NULL),
(8, 3, '12 MP', NULL, NULL),
(8, 4, '7 MP', NULL, NULL),
(8, 5, 'Apple A13 Bionic', NULL, NULL),
(8, 6, '3 GB', NULL, NULL),
(8, 7, '128 GB', NULL, NULL),
(8, 8, '1 Nano SIM & 1 eSIM Hỗ trợ 4G', NULL, NULL),
(8, 9, '1821mAh, 18W', NULL, NULL),
(9, 1, 'Dynamic AMOLED 2X, Chính 7.6 & Phụ 6.2, Full HD+', NULL, NULL),
(9, 2, 'Android 11', NULL, NULL),
(9, 3, '3 camera 12 MP', NULL, NULL),
(9, 4, '10 MP & 4 MP', NULL, NULL),
(9, 5, 'Snapdragon 888', NULL, NULL),
(9, 6, '12 GB', NULL, NULL),
(9, 7, '256 GB', NULL, NULL),
(9, 8, '2 Nano SIM & 1 eSIM Hỗ trợ 5G', NULL, NULL),
(9, 9, '4400mAh, 25W', NULL, NULL),
(10, 1, 'Super AMOLED Plus, 6.7, Full HD+', NULL, NULL),
(10, 2, 'Android 10', NULL, NULL),
(10, 3, 'Chính 12 MP & Phụ 64 MP, 12 MP', NULL, NULL),
(10, 4, '10 MP', NULL, NULL),
(10, 5, 'Exynos 990', NULL, NULL),
(10, 6, '8 GB', NULL, NULL),
(10, 7, '256 GB', NULL, NULL),
(10, 8, '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM Hỗ trợ 4G', NULL, NULL),
(10, 9, '4300mAh, 25W', NULL, NULL),
(11, 1, 'Super AMOLED Plus, 6.5, Full HD+', NULL, NULL),
(11, 2, 'Android 10', NULL, NULL),
(11, 3, 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', NULL, NULL),
(11, 4, '32 MP', NULL, NULL),
(11, 5, 'Exynos 9661', NULL, NULL),
(11, 6, '6 GB', NULL, NULL),
(11, 7, '128 GB', NULL, NULL),
(11, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(11, 9, '4000mAh, 15W', NULL, NULL),
(12, 1, 'Super AMOLED, 6.4, HD+', NULL, NULL),
(12, 2, 'Android 11', NULL, NULL),
(12, 3, 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', NULL, NULL),
(12, 4, '13 MP', NULL, NULL),
(12, 5, 'MediaTek MT6769V', NULL, NULL),
(12, 6, '6 GB', NULL, NULL),
(12, 7, '128 GB', NULL, NULL),
(12, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(12, 9, '5000mAh, 15W', NULL, NULL),
(13, 1, 'PLS TFT LCD, 6.5, HD+', NULL, NULL),
(13, 2, 'Android 10', NULL, NULL),
(13, 3, 'Chính 13 MP & Phụ 2 MP', NULL, NULL),
(13, 4, '5 MP', NULL, NULL),
(13, 5, 'MediaTek MT6739W', NULL, NULL),
(13, 6, '3 GB', NULL, NULL),
(13, 7, '32 GB', NULL, NULL),
(13, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(13, 9, '5000mAh, 7.8W', NULL, NULL),
(14, 1, 'Super AMOLED, 6.5, Full HD+', NULL, NULL),
(14, 2, 'Android 11', NULL, NULL),
(14, 3, 'Chính 12 MP & Phụ 12 MP, 8 MP', NULL, NULL),
(14, 4, '32 MP', NULL, NULL),
(14, 5, 'Snapdragon 865', NULL, NULL),
(14, 6, '8 GB', NULL, NULL),
(14, 7, '256 GB', NULL, NULL),
(14, 8, '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', NULL, NULL),
(14, 9, '4500mAh, 25W', NULL, NULL),
(15, 1, 'Dynamic AMOLED 2X, 6.2, Full HD+', NULL, NULL),
(15, 2, 'Android 11', NULL, NULL),
(15, 3, 'Chính 12 MP & Phụ 64 MP, 12 MP', NULL, NULL),
(15, 4, '10 MP', NULL, NULL),
(15, 5, 'Exynos 2100', NULL, NULL),
(15, 6, '8 GB', NULL, NULL),
(15, 7, '128 GB', NULL, NULL),
(15, 8, '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', NULL, NULL),
(15, 9, '4000mAh, 25W', NULL, NULL),
(16, 1, 'AMOLED, 6.43, Full HD+', NULL, NULL),
(16, 2, 'Android 11', NULL, NULL),
(16, 3, 'Chính 64 MP & Phụ 8 MP, 2 MP', NULL, NULL),
(16, 4, '32 MP', NULL, NULL),
(16, 5, 'MediaTek Dimensity 800U 5G', NULL, NULL),
(16, 6, '8 GB', NULL, NULL),
(16, 7, '128 GB', NULL, NULL),
(16, 8, '1 Nano SIM, Hỗ trợ 5G', NULL, NULL),
(16, 9, '4310mAh, 30W', NULL, NULL),
(17, 1, 'AMOLED, 6.43, Full HD+', NULL, NULL),
(17, 2, 'Android 11', NULL, NULL),
(17, 3, 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', NULL, NULL),
(17, 4, '44 MP', NULL, NULL),
(17, 5, 'Snapdragon 720G', NULL, NULL),
(17, 6, '8 GB', NULL, NULL),
(17, 7, '128 GB', NULL, NULL),
(17, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(17, 9, '4310mAh, 50W', NULL, NULL),
(18, 1, 'AMOLED, 6.5, Full HD+', NULL, NULL),
(18, 2, 'Android 10', NULL, NULL),
(18, 3, 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', NULL, NULL),
(18, 4, '32 MP', NULL, NULL),
(18, 5, 'Snapdragon 720G', NULL, NULL),
(18, 6, '8 GB', NULL, NULL),
(18, 7, '256 GB', NULL, NULL),
(18, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(18, 9, '4000mAh, 65W', NULL, NULL),
(19, 1, 'AMOLED, 6.43, Full HD+', NULL, NULL),
(19, 2, 'Android 10', NULL, NULL),
(19, 3, 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', NULL, NULL),
(19, 4, 'Chính 16 MP & Phụ 2 MP', NULL, NULL),
(19, 5, 'MediaTek Helio P95', NULL, NULL),
(19, 6, '8 GB', NULL, NULL),
(19, 7, '128 GB', NULL, NULL),
(19, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(19, 9, '4000mAh, 18W', NULL, NULL),
(20, 1, 'IPS LCD, 6.52, HD+', NULL, NULL),
(20, 2, 'Android 11', NULL, NULL),
(20, 3, '13 MP', NULL, NULL),
(20, 4, '5 MP', NULL, NULL),
(20, 5, 'MediaTek Helio G35', NULL, NULL),
(20, 6, '3 GB', NULL, NULL),
(20, 7, '32 GB', NULL, NULL),
(20, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(20, 9, '4230mAh, 10W', NULL, NULL),
(21, 1, 'AMOLED, 6.7, Quad HD+ (2K+)', NULL, NULL),
(21, 2, 'Android 11', NULL, NULL),
(21, 3, 'Chính 50 MP & Phụ 50 MP, 13 MP, 3 MP', NULL, NULL),
(21, 4, '32 MP', NULL, NULL),
(21, 5, 'Snapdragon 888', NULL, NULL),
(21, 6, '12 GB', NULL, NULL),
(21, 7, '256 GB', NULL, NULL),
(21, 8, '2 Nano SIM, Hỗ trợ 5G', NULL, NULL),
(21, 9, '4500mAh, 65W', NULL, NULL),
(22, 1, 'IPS LCD, 6.5, Full HD+', NULL, NULL),
(22, 2, 'Android 11', NULL, NULL),
(22, 3, 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', NULL, NULL),
(22, 4, '16 MP', NULL, NULL),
(22, 5, 'Snapdragon 480 8 nhân 5G', NULL, NULL),
(22, 6, '6 GB', NULL, NULL),
(22, 7, '128 GB', NULL, NULL),
(22, 8, '2 Nano SIM, Hỗ trợ 5G', NULL, NULL),
(22, 9, '5000mAh, 18W', NULL, NULL),
(23, 1, 'AMOLED, 6.67, Full HD+', NULL, NULL),
(23, 2, 'Android 11', NULL, NULL),
(23, 3, 'Chính 108 MP & Phụ 8 MP, 5 MP', NULL, NULL),
(23, 4, '16 MP', NULL, NULL),
(23, 5, 'MediaTek Dimensity 1200', NULL, NULL),
(23, 6, '8 GB', NULL, NULL),
(23, 7, '128 GB', NULL, NULL),
(23, 8, '2 Nano SIM, Hỗ trợ 5G', NULL, NULL),
(23, 9, '5000mAh, 67W', NULL, NULL),
(24, 10, 'i7, 10750H, 2.6GHz', NULL, NULL),
(24, 6, '16 GB, DDR4 2 khe (1 khe 8GB + 1 khe 8GB), 2933 MHz', NULL, NULL),
(24, 11, '512 GB SSD NVMe PCIe, Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng', NULL, NULL),
(24, 1, '15.6, Full HD (1920 x 1080), 120Hz', NULL, NULL),
(24, 12, 'Card rời, GTX 1660Ti 6GB', NULL, NULL),
(24, 2, 'Windows 10 Home SL', NULL, NULL),
(24, 13, 'Vỏ nhựa', NULL, NULL),
(24, 14, 'Dài 364.46 mm - Rộng 254 mm - Dày 30.96 mm - Nặng 2.58 kg', NULL, NULL),
(25, 10, 'i7, 1165G7, 2.8GHz', NULL, NULL),
(25, 6, '8 GB, DDR4 2 khe (1 khe 8GB + 1 khe rời), 3200 MHz', NULL, NULL),
(25, 11, '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB), Hỗ trợ thêm 1 khe cắm HDD SATA (nâng cấp tối đa 1TB)', NULL, NULL),
(25, 1, '15.6, Full HD (1920 x 1080)', NULL, NULL),
(25, 12, 'Card tích hợp, Intel Iris Xe', NULL, NULL),
(25, 2, 'Windows 10 Pro', NULL, NULL),
(25, 13, 'Vỏ nhựa', NULL, NULL),
(25, 14, 'Dài 361 mm - Rộng 240.9 mm - Dày 18 mm - Nặng 1.79 kg', NULL, NULL),
(26, 10, 'i5, 10300H, 2.5GHz', NULL, NULL),
(26, 6, '8 GB, DDR4 2 khe (1 khe 8GB onboard + 1 khe trống), 2933 MHz', NULL, NULL),
(26, 11, '512 GB SSD NVMe PCIe, Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng', NULL, NULL),
(26, 1, '15.6, Full HD (1920 x 1080)', NULL, NULL),
(26, 12, 'Card rời, GTX 1650Ti 4GB', NULL, NULL),
(26, 2, 'Windows 10 Home SL', NULL, NULL),
(26, 13, 'Vỏ kim loại', NULL, NULL),
(26, 14, 'Dài 356.1 mm - Rộng 234.5 mm - Dày 18.9 mm - Nặng 1.9 kg', NULL, NULL),
(27, 10, 'i3, 1115G4, 3GHz', NULL, NULL),
(27, 6, '4 GB, DDR4 (2 khe), 2666 MHz', NULL, NULL),
(27, 11, '256 GB SSD NVMe PCIe', NULL, NULL),
(27, 1, '15.6, Full HD (1920 x 1080)', NULL, NULL),
(27, 12, 'Card tích hợp, Intel UHD', NULL, NULL),
(27, 2, 'Windows 10 Home SL', NULL, NULL),
(27, 13, 'Vỏ nhựa', NULL, NULL),
(27, 14, 'Dài 363.96 mm - Rộng 249 mm - Dày 19.9 mm - Nặng 1.96 kg', NULL, NULL),
(28, 10, 'i5, 1135G7, 2.4GHz', NULL, NULL),
(28, 6, '16 GB, LPDDR4X (On board), 4267 MHz', NULL, NULL),
(28, 11, '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB)', NULL, NULL),
(28, 1, '14.5 inch, QHD+ (2560 x 1600)', NULL, NULL),
(28, 12, 'Card rời, MX, 350 2GB', NULL, NULL),
(28, 2, 'Windows 10 Home SL', NULL, NULL),
(28, 13, 'Vỏ nhựa - nắp lưng bằng kim loại', NULL, NULL),
(28, 14, 'Dài 321.7 mm - Rộng 224.5 mm - Dày 16.75 mm - Nặng 1.35 kg', NULL, NULL),
(29, 10, 'i5, 1155G7, 2.5GHz', NULL, NULL),
(29, 6, '8 GB, DDR4 2 khe (1 khe 4GB + 1 khe 4GB), 3200 MHz', NULL, NULL),
(29, 11, '512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)', NULL, NULL),
(29, 1, '14, Full HD (1920 x 1080)', NULL, NULL),
(29, 12, 'Card rời, MX350 2GB', NULL, NULL),
(29, 2, 'Windows 10 Home SL + Office H&S 2019 vĩnh viễn', NULL, NULL),
(29, 13, 'Vỏ nhựa - nắp lưng bằng kim loại', NULL, NULL),
(29, 14, 'Dài 321 mm - Rộng 211 mm - Dày 18 mm - Nặng 1.65 kg', NULL, NULL),
(30, 10, 'i5, 1135G7, 2.4GHz', NULL, NULL),
(30, 6, '16 GB, DDR4 (2 khe), 3200 MHz', NULL, NULL),
(30, 11, '512 GB SSD NVMe PCIe', NULL, NULL),
(30, 1, '14, Full HD (1920 x 1080)', NULL, NULL),
(30, 12, 'Card rời, NVIDIA QuadroT500, 4GB', NULL, NULL),
(30, 2, 'Windows 10 Pro', NULL, NULL),
(30, 13, 'Vỏ kim loại', NULL, NULL),
(30, 14, 'Dài 323 mm - Rộng 214.6 mm - Dày 17.9 mm - Nặng 1.35 kg', NULL, NULL),
(31, 10, 'i3, 10110U, 2.1GHz', NULL, NULL),
(31, 6, '4 GB, DDR4 2 khe (1 khe 4GB + 1 khe rời), 2666 MHz', NULL, NULL),
(31, 11, '256 GB SSD NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(31, 1, '15.6, HD (1366 x 768)', NULL, NULL),
(31, 12, 'Card tích hợp, Intel UHD', NULL, NULL),
(31, 2, 'Windows 10 Home SL', NULL, NULL),
(31, 13, 'Vỏ nhựa', NULL, NULL),
(31, 14, 'Dài 358.5 mm - Rộng 242 mm - Dày 19.9 mm - Nặng 1.78 kg', NULL, NULL),
(32, 10, 'i5, 1135G7, 2.4GHz', NULL, NULL),
(32, 6, '16 GB, LPDDR4X (On board), 4266 MHz', NULL, NULL),
(32, 11, '512 GB SSD NVMe PCIe', NULL, NULL),
(32, 1, '13.3, QHD (2560 x 1600)', NULL, NULL),
(32, 12, 'Card tích hợp, Intel Iris Xe', NULL, NULL),
(32, 2, 'Windows 10 Home SL', NULL, NULL),
(32, 13, 'Mặt lưng Carbon - Chiếu nghỉ tay bằng Nhôm Magie', NULL, NULL),
(32, 14, 'Dài 295.88 mm - Rộng 208.85 mm - Dày 15 mm - Nặng 0.966 kg', NULL, NULL),
(33, 10, 'i3, 1115G4, 3GHz', NULL, NULL),
(33, 6, '8 GB, DDR4 (On board 4GB +1 khe 4GB), 3200 MHz', NULL, NULL),
(33, 11, '256 GB SSD NVMe PCIe, Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)', NULL, NULL),
(33, 1, '15.6, Full HD (1920 x 1080)', NULL, NULL),
(33, 12, 'Card tích hợp, Intel UHD', NULL, NULL),
(33, 2, 'Windows 10 Home SL', NULL, NULL),
(33, 13, 'Vỏ nhựa', NULL, NULL),
(33, 14, 'Dài 359.2 mm - Rộng 236.5 mm - Dày 19.9 mm - Nặng 1.65 kg', NULL, NULL),
(34, 10, 'Apple M1', NULL, NULL),
(34, 6, '16 GB', NULL, NULL),
(34, 11, '1 TB SSD', NULL, NULL),
(34, 1, '13.3, Retina (2560 x 1600)', NULL, NULL),
(34, 12, 'Card tích hợp, 8 nhân GPU', NULL, NULL),
(34, 2, 'Mac OS', NULL, NULL),
(34, 13, 'Vỏ kim loại nguyên khối', NULL, NULL),
(34, 14, 'Dài 304.1 mm - Rộng 212.4 mm - Dày 15.6 mm - Nặng 1.4 kg', NULL, NULL),
(35, 10, 'Apple M1 Max400GB/s memory bandwidth', NULL, NULL),
(35, 6, '32 GB', NULL, NULL),
(35, 11, '1 TB SSD', NULL, NULL),
(35, 1, '16.2 inch, Liquid Retina XDR display (3456 x 2234), 120Hz', NULL, NULL),
(35, 12, 'Card tích hợp, 32 nhân GPU', NULL, NULL),
(35, 2, 'Mac OS', NULL, NULL),
(35, 13, 'Vỏ kim loại nguyên khối', NULL, NULL),
(35, 14, 'Dài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm - Nặng 2.2 kg', NULL, NULL),
(36, 1, 'OLED, 1.57 inch', NULL, NULL),
(36, 15, 'Khoảng 1.5 ngày', NULL, NULL),
(36, 16, 'iOS 14 trở lên', NULL, NULL),
(36, 17, 'Kính cường lực Sapphire40 mm', NULL, NULL),
(36, 18, 'Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', NULL, NULL),
(37, 1, 'OLED, 1.78 inch', NULL, NULL),
(37, 15, 'Khoảng 1.5 ngày', NULL, NULL),
(37, 16, 'iOS 14 trở lên', NULL, NULL),
(37, 17, 'Ion-X strengthened glass44 mm', NULL, NULL),
(37, 18, 'Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', NULL, NULL),
(38, 1, 'AMOLED, 1.2 inch', NULL, NULL),
(38, 15, 'Khoảng 7 ngày', NULL, NULL),
(38, 16, 'Android 5.0 trở lên, iOS 10 trở lên', NULL, NULL),
(38, 17, 'Kính cường lực Gorilla Glass 342.6 mm', NULL, NULL),
(38, 18, 'Chế độ luyện tập, Theo dõi giấc ngủ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', NULL, NULL),
(39, 1, 'AMOLED, 1.39 inch', NULL, NULL),
(39, 15, 'Khoảng 21 ngày', NULL, NULL),
(39, 16, 'Android 7.0 trở lên, iOS 12 trở lên', NULL, NULL),
(39, 17, 'Kính cường lực, 45.8 mm', NULL, NULL),
(39, 18, 'Chế độ luyện tập, Theo dõi chu kì kinh nguyệt, Theo dõi giấc ngủ, Theo dõi mức độ stress, Theo dõi nhịp thở, Tự động phát hiện chế độ tập luyện, Đo nhịp timĐo nồng độ oxy (SpO2)', NULL, NULL),
(40, 1, 'IPS LCD, 6.53, HD+', NULL, NULL),
(40, 2, 'Android 10', NULL, NULL),
(40, 3, 'Chính 13 MP & Phụ 2 MP, 2 MP', NULL, NULL),
(40, 4, '5 MP', NULL, NULL),
(40, 5, 'MediaTek Helio G35', NULL, NULL),
(40, 6, '4 GB', NULL, NULL),
(40, 7, '128 GB', NULL, NULL),
(40, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(40, 9, '5000mAh, 10W', NULL, NULL),
(41, 1, 'IPS LCD, 6.53, HD+', NULL, NULL),
(41, 2, 'Android 10', NULL, NULL),
(41, 3, '13 MP', NULL, NULL),
(41, 4, '5 MP', NULL, NULL),
(41, 5, 'MediaTek Helio G25', NULL, NULL),
(41, 6, '2 GB', NULL, NULL),
(41, 7, '32 GB', NULL, NULL),
(41, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(41, 9, '5000mAh, 10W', NULL, NULL),
(42, 1, 'Super AMOLED, 6.7, Full HD+', NULL, NULL),
(42, 2, 'Android 11', NULL, NULL),
(42, 3, 'Chính 64 MP & Phụ 12 MP, 8 MP, 5 MP', NULL, NULL),
(42, 4, '32 MP', NULL, NULL),
(42, 5, 'Snapdragon 720G', NULL, NULL),
(42, 6, '8 GB', NULL, NULL),
(42, 7, '256 GB', NULL, NULL),
(42, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(42, 9, '5000mAh, 25W', NULL, NULL),
(43, 1, 'IPS LCD, 6.5, HD+', NULL, NULL),
(43, 2, 'Android 11', NULL, NULL),
(43, 3, 'Chính 50 MP & Phụ 2 MP, 2 MP', NULL, NULL),
(43, 4, '16 MP', NULL, NULL),
(43, 5, 'MediaTek Helio G35', NULL, NULL),
(43, 6, '4 GB', NULL, NULL),
(43, 7, '64 GB', NULL, NULL),
(43, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(43, 9, '5000mAh, 18W', NULL, NULL),
(44, 1, 'AMOLED, 6.43, Full HD+', NULL, NULL),
(44, 2, 'Android 11', NULL, NULL),
(44, 3, 'Chính 48 MP & Phụ 2 MP, 2 MP', NULL, NULL),
(44, 4, '16 MP', NULL, NULL),
(44, 5, 'Snapdragon 662', NULL, NULL),
(44, 6, '8 GB', NULL, NULL),
(44, 7, '128 GB', NULL, NULL),
(44, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(44, 9, '5000mAh, 33W', NULL, NULL),
(45, 1, 'AMOLED, 6.44, Full HD+', NULL, NULL),
(45, 2, 'Android 11', NULL, NULL),
(45, 3, 'Chính 64 MP & Phụ 8 MP, 2 MP', NULL, NULL),
(45, 4, '44 MP', NULL, NULL),
(45, 5, 'Snapdragon 730', NULL, NULL),
(45, 6, '8 GB', NULL, NULL),
(45, 7, '128 GB', NULL, NULL),
(45, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(45, 9, '4000mAh, 33W', NULL, NULL),
(46, 19, '57%', NULL, NULL),
(46, 20, '10.000 mAh', NULL, NULL),
(46, 21, '10 - 11 giờ (dùng Adapter 1A), 3 - 4 giờ (dùng Adapter 3A)5 - 6 giờ (dùng Adapter 2A)', NULL, NULL),
(46, 22, 'Li-Ion', NULL, NULL),
(46, 14, 'Dài 10.05 cm - Ngang 7.82 cm - Dày 2.3 cm', NULL, NULL),
(47, 19, '60%', NULL, NULL),
(47, 20, '10.000 mAh', NULL, NULL),
(47, 21, '10 - 11 giờ (dùng Adapter 1A), 5 - 6 giờ (dùng Adapter 2A)', NULL, NULL),
(47, 22, 'Li-Ion', NULL, NULL),
(47, 14, 'Dài 10.55 cm - Ngang 7.82 cm - Dày 2.3 cm', NULL, NULL),
(48, 19, '65%', NULL, NULL),
(48, 20, '10.000 mAh', NULL, NULL),
(48, 21, '10 - 11 giờ (dùng Adapter 1A)5 - 6 giờ (dùng Adapter 2A)3 - 4 giờ (dùng Adapter 3A)', NULL, NULL),
(48, 22, 'Li-Ion', NULL, NULL),
(48, 14, 'Dài 10.55 cm - Ngang 7.82 cm - Dày 2.3 cm', NULL, NULL),
(49, 1, 'TFT LCD, 1.8, 65.536 màu', NULL, NULL),
(49, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(49, 23, '2000 số', NULL, NULL),
(49, 25, 'FM không cần tai nghe', NULL, NULL),
(49, 26, '3.5 mm', NULL, NULL),
(49, 27, '1020 mAh', NULL, NULL),
(50, 1, 'TFT LCD, 1.8, 65.536 màu', NULL, NULL),
(50, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(50, 23, '2000 số', NULL, NULL),
(50, 24, 'MicroSD, hỗ trợ tối đa 32 GB', NULL, NULL),
(50, 3, '0.08 MP', NULL, NULL),
(50, 25, 'FM không cần tai nghe', NULL, NULL),
(50, 26, '3.5 mm', NULL, NULL),
(50, 27, '1020 mAh', NULL, NULL),
(51, 1, 'TFT LCD, 2.4, 65.536 màu', NULL, NULL),
(51, 8, '2 SIM thường, Hỗ trợ 2G', NULL, NULL),
(51, 23, '800 số', NULL, NULL),
(51, 24, 'MicroSD, hỗ trợ tối đa 32 GB', NULL, NULL),
(51, 3, 'VGA (480 x 640 pixels)', NULL, NULL),
(51, 25, 'Có', NULL, NULL),
(51, 26, '3.5 mm', NULL, NULL),
(51, 27, '1020 mAh', NULL, NULL),
(52, 1, 'TFT LCD, 1.77, 65.536 màu', NULL, NULL),
(52, 8, '1 SIM thường, Hỗ trợ 2G', NULL, NULL),
(52, 23, '2000 số', NULL, NULL),
(52, 25, 'Có', NULL, NULL),
(52, 26, '3.5 mm', NULL, NULL),
(52, 27, '800 mAh', NULL, NULL),
(53, 1, 'TFT LCD, 2.4, 16 triệu màu', NULL, NULL),
(53, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(53, 23, '1500 số', NULL, NULL),
(53, 24, 'MicroSD, hỗ trợ tối đa 32 GB', NULL, NULL),
(53, 3, 'VGA (480 x 640 pixels)', NULL, NULL),
(53, 25, 'Có', NULL, NULL),
(53, 26, '3.5 mm', NULL, NULL),
(53, 27, '1500 mAh', NULL, NULL),
(54, 1, 'IPS LCD, 6.39, HD+', NULL, NULL),
(54, 2, 'Android 10 (Android One)', NULL, NULL),
(54, 3, 'Chính 13 MP & Phụ 5 MP, 2 MP', NULL, NULL),
(54, 4, '8 MP', NULL, NULL),
(54, 5, 'Snapdragon 460', NULL, NULL),
(54, 6, '4 GB', NULL, NULL),
(54, 7, '64 GB', NULL, NULL),
(54, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(54, 9, '4000mAh, 10W', NULL, NULL),
(55, 10, 'i7, 1165G7, 2.8GHz', NULL, NULL),
(55, 6, '16 GBLPDDR4X (On board), 4266 MHz', NULL, NULL),
(55, 11, '512 GB SSD NVMe PCIe', NULL, NULL),
(55, 1, '13.3, Full HD (1920 x 1080) OLED', NULL, NULL),
(55, 12, 'Card tích hợp, Intel Iris Xe', NULL, NULL),
(55, 2, 'Windows 11 Home SL', NULL, NULL),
(55, 13, 'Vỏ kim loại nguyên khối', NULL, NULL),
(55, 14, 'Dài 305 mm - Rộng 211 mm - Dày 11.9 mm - Nặng 1.3 kg', NULL, NULL),
(56, 10, 'i5, 1135G7, 2.4GHz', NULL, NULL),
(56, 6, '8 GBLPDDR4X (On board), 4267 MHz', NULL, NULL),
(56, 11, '512 GB SSD NVMe PCIe', NULL, NULL),
(56, 1, '13.3, Full HD (1920 x 1080) OLED', NULL, NULL),
(56, 12, 'Card tích hợp, Intel Iris Xe', NULL, NULL),
(56, 2, 'Windows 11 Home SL', NULL, NULL),
(56, 13, 'Vỏ kim loại nguyên khối', NULL, NULL),
(56, 14, 'Dài 305 mm - Rộng 211 mm - Dày 11.9 mm - Nặng 1.3 kg', NULL, NULL),
(57, 1, 'IPS LCD, 6.58, Full HD+', NULL, NULL),
(57, 2, 'Android 11', NULL, NULL),
(57, 3, 'Chính 64 MP & Phụ 2 MP, 2 MP', NULL, NULL),
(57, 4, '16 MP', NULL, NULL),
(57, 5, 'MediaTek Helio G80', NULL, NULL),
(57, 6, '8 GB', NULL, NULL),
(57, 7, '128 GB', NULL, NULL),
(57, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(57, 9, '5000mAh, 33W', NULL, NULL),
(58, 1, 'IPS LCD, 6.58, Full HD+', NULL, NULL),
(58, 2, 'Android 11', NULL, NULL),
(58, 3, 'Chính 48 MP & Phụ 8 MP, 2 MP', NULL, NULL),
(58, 4, '16 MP', NULL, NULL),
(58, 5, 'Snapdragon 662', NULL, NULL),
(58, 6, '8 GB', NULL, NULL),
(58, 7, '128 GB', NULL, NULL),
(58, 8, '2 Nano SIM, Hỗ trợ 4G', NULL, NULL),
(58, 9, '5000mAh, 18W', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hồ Chí Minh', 'SG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specification_types`
--

CREATE TABLE `specification_types` (
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specification_types`
--

INSERT INTO `specification_types` (`type_id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Màn hình', NULL, NULL),
(2, 'Hệ điều hành', NULL, NULL),
(3, 'Camera sau', NULL, NULL),
(4, 'Camera trước', NULL, NULL),
(5, 'Chip', NULL, NULL),
(6, 'RAM', NULL, NULL),
(7, 'Bộ nhớ trong', NULL, NULL),
(8, 'SIM', NULL, NULL),
(9, 'Pin, Sạc', NULL, NULL),
(10, 'CPU', NULL, NULL),
(11, 'Ổ cứng', NULL, NULL),
(12, 'Card màn hình', NULL, NULL),
(13, 'Thiết kế', NULL, NULL),
(14, 'Kích thước', NULL, NULL),
(15, 'Thời lượng pin', NULL, NULL),
(16, 'Kết nối với hệ điều hành', NULL, NULL),
(17, 'Mặt', NULL, NULL),
(18, 'Tính năng', NULL, NULL),
(19, 'Hiệu suất sạc', NULL, NULL),
(20, 'Dung lượng pin', NULL, NULL),
(21, 'Thời gian sạc đầy pin', NULL, NULL),
(22, 'Lõi pin', NULL, NULL),
(23, 'Danh bạ', NULL, NULL),
(24, 'Thẻ nhớ', NULL, NULL),
(25, 'Radio FM', NULL, NULL),
(26, 'Jack cắm tai nghe', NULL, NULL),
(27, 'Pin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `statistical_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistical`
--

INSERT INTO `statistical` (`statistical_id`, `order_date`, `sales`, `quantity`, `total_order`) VALUES
(1, '2022-05-02', 27000000, 6, 4),
(2, '2022-04-26', 40000000, 10, 8),
(3, '2022-04-27', 75000000, 15, 14),
(4, '2022-04-28', 52000000, 12, 10),
(5, '2022-04-29', 116500000, 18, 15),
(6, '2022-04-30', 134520000, 23, 20),
(7, '2022-05-01', 88500000, 14, 14),
(8, '2022-05-02', 50000000, 12, 10),
(9, '2022-05-03', 80000000, 16, 14),
(10, '2022-05-04', 60000000, 12, 10),
(11, '2022-05-05', 70000000, 15, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avt-default.jfif',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `name`, `password`, `role`, `remember_token`, `avatar`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '$2y$10$nqPpSvJqCoywbzUz9rqdaegpg4TFbuHbCUgwMjeimjuTz8cVM.2Pa', '1', NULL, 'avt-default.jfif', 'admin@gmail.com', '2022-05-02 09:34:04', '2022-05-02 09:34:04'),
(2, 'nguyenabc', 'Nguyễn Văn A', '$2y$10$lBYRdrhf5Wa7egwpd0Hgeu40iRHt4YCPIY3S18.Fwve7lKpJ513Ym', '1', NULL, 'avt-default.jfif', 'user@gmail.com', '2022-05-02 09:34:04', '2022-05-02 09:34:04'),
(3, 'guest001', 'Nguyễn Trung Hậu', '$2y$10$qPCtuz1WjJ5A6.SSpyi/WuMjpS9Vr62v3sacudmU/VevNtzM5Glc2', '0', NULL, 'avt-default.jfif', 'hau@gmail.com', '2022-05-02 09:34:04', '2022-05-02 09:34:04'),
(4, 'guest002', 'Lê Trọng Tính', '$2y$10$y4/fB6Qj4LAMMsCyv1XA8.2BiFbXgK.xgYZYwoS7HtD65WfkMwQIC', '0', NULL, 'avt-default.jfif', 'tinh@gmail.com', '2022-05-02 09:34:04', '2022-05-02 09:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'xã An Phú Tây', 1, NULL, NULL),
(2, 'xã Bình Chánh', 1, NULL, NULL),
(3, 'xã Bình Hưng', 1, NULL, NULL),
(4, 'xã Bình Lợi', 1, NULL, NULL),
(5, 'xã Đa Phước', 1, NULL, NULL),
(6, 'xã Hưng Long', 1, NULL, NULL),
(7, 'xã Lê Minh Xuân', 1, NULL, NULL),
(8, 'xã Phạm Văn Hai', 1, NULL, NULL),
(9, 'xã Phong Phú', 1, NULL, NULL),
(10, 'xã Quy Đức', 1, NULL, NULL),
(11, 'xã Tân Kiên', 1, NULL, NULL),
(12, 'xã Tân Nhựt', 1, NULL, NULL),
(13, 'xã Tân Quý Tây', 1, NULL, NULL),
(14, 'thị trấn Tân Túc', 1, NULL, NULL),
(15, 'xã Vĩnh Lộc A', 1, NULL, NULL),
(16, 'xã Vĩnh Lộc B', 1, NULL, NULL),
(17, 'phường An Lạc', 2, NULL, NULL),
(18, 'phường An Lạc A', 2, NULL, NULL),
(19, 'phường Bình Hưng Hòa', 2, NULL, NULL),
(20, 'phường Bình Hưng Hòa A', 2, NULL, NULL),
(21, 'phường Bình Hưng Hòa B', 2, NULL, NULL),
(22, 'phường Bình Trị Đông', 2, NULL, NULL),
(23, 'phường Bình Trị Đông A', 2, NULL, NULL),
(24, 'phường Bình Trị Đông B', 2, NULL, NULL),
(25, 'phường Tân Tạo', 2, NULL, NULL),
(26, 'phường Tân Tạo A', 2, NULL, NULL),
(27, 'phường 1', 3, NULL, NULL),
(28, 'phường 11', 3, NULL, NULL),
(29, 'phường 12', 3, NULL, NULL),
(30, 'phường 13', 3, NULL, NULL),
(31, 'phường 14', 3, NULL, NULL),
(32, 'phường 15', 3, NULL, NULL),
(33, 'phường 17', 3, NULL, NULL),
(34, 'phường 19', 3, NULL, NULL),
(35, 'phường 2', 3, NULL, NULL),
(36, 'phường 21', 3, NULL, NULL),
(37, 'phường 22', 3, NULL, NULL),
(38, 'phường 24', 3, NULL, NULL),
(39, 'phường 25', 3, NULL, NULL),
(40, 'phường 26', 3, NULL, NULL),
(41, 'phường 27', 3, NULL, NULL),
(42, 'phường 28', 3, NULL, NULL),
(43, 'phường 3', 3, NULL, NULL),
(44, 'phường 5', 3, NULL, NULL),
(45, 'phường 6', 3, NULL, NULL),
(46, 'phường 7', 3, NULL, NULL),
(47, 'xã An Thới Đông', 4, NULL, NULL),
(48, 'xã Bình Khách', 4, NULL, NULL),
(49, 'phường Cần Thạch', 4, NULL, NULL),
(50, 'xã Long Hòa', 4, NULL, NULL),
(51, 'xã Lý Nhơn', 4, NULL, NULL),
(52, 'xã Tam Thôn Hiệp', 4, NULL, NULL),
(53, 'xã Thạnh An', 4, NULL, NULL),
(54, 'xã An Nhơn Tây', 5, NULL, NULL),
(55, 'xã An Phú', 5, NULL, NULL),
(56, 'xã An Phú Trung', 5, NULL, NULL),
(57, 'xã Bình Mỹ', 5, NULL, NULL),
(58, 'Thị trấn Củ Chi', 5, NULL, NULL),
(59, 'xã Hòa Phú', 5, NULL, NULL),
(60, 'xã An Nhuận Đức', 5, NULL, NULL),
(61, 'xã Phạm Văn Cội', 5, NULL, NULL),
(62, 'xã Phú Hòa Đông', 5, NULL, NULL),
(63, 'xã Phú Mỹ Hưng', 5, NULL, NULL),
(64, 'xã Phước Hiệp', 5, NULL, NULL),
(65, 'xã Phước Thạnh', 5, NULL, NULL),
(66, 'xã Phước Vĩnh An', 5, NULL, NULL),
(67, 'xã Tân An Hội', 5, NULL, NULL),
(68, 'xã Tân Phú Trung', 5, NULL, NULL),
(69, 'xã Tân Thạnh Đông', 5, NULL, NULL),
(70, 'xã Tân Thạnh Tây', 5, NULL, NULL),
(71, 'xã Tân Thông Hội', 5, NULL, NULL),
(72, 'xã Thái Mỹ', 5, NULL, NULL),
(73, 'xã Trung An', 5, NULL, NULL),
(74, 'xã Trung Lập Hạ', 5, NULL, NULL),
(75, 'xã Trung Lập Thượng', 5, NULL, NULL),
(76, 'Phường 1', 6, NULL, NULL),
(77, 'Phường 10', 6, NULL, NULL),
(78, 'Phường 11', 6, NULL, NULL),
(79, 'Phường 12', 6, NULL, NULL),
(80, 'Phường 13', 6, NULL, NULL),
(81, 'Phường 14', 6, NULL, NULL),
(82, 'Phường 15', 6, NULL, NULL),
(83, 'Phường 16', 6, NULL, NULL),
(84, 'Phường 17', 6, NULL, NULL),
(85, 'Phường 3', 6, NULL, NULL),
(86, 'Phường 4', 6, NULL, NULL),
(87, 'Phường 5', 6, NULL, NULL),
(88, 'Phường 6', 6, NULL, NULL),
(89, 'Phường 7', 6, NULL, NULL),
(90, 'Phường 8', 6, NULL, NULL),
(91, 'Phường 9', 6, NULL, NULL),
(92, 'xã Đông Thạnh', 7, NULL, NULL),
(93, 'phường Hóc Môn', 7, NULL, NULL),
(94, 'phường Bà Điểm', 7, NULL, NULL),
(95, 'xã Nhị Bình', 7, NULL, NULL),
(96, 'xã Tân Hiệp', 7, NULL, NULL),
(97, 'xã Tân Thới Nhì', 7, NULL, NULL),
(98, 'xã Tân Xuân', 7, NULL, NULL),
(99, 'xã Thới Tam Thôn', 7, NULL, NULL),
(100, 'xã Trung Chánh', 7, NULL, NULL),
(101, 'xã Xuân Thới Đông', 7, NULL, NULL),
(102, 'xã Xuân Thới Sơn', 7, NULL, NULL),
(103, 'xã Xuân Thới Thượng', 7, NULL, NULL),
(104, 'phường Hiệp Phước', 8, NULL, NULL),
(105, 'xã Long Thới', 8, NULL, NULL),
(106, 'Thị trấn Nhà Bè', 8, NULL, NULL),
(107, 'xã Nhơn Đức', 8, NULL, NULL),
(108, 'xã Phú Xuân', 8, NULL, NULL),
(109, 'xã Phước Kiển', 8, NULL, NULL),
(110, 'xã Phước Lộc', 8, NULL, NULL),
(111, 'Phường 1', 9, NULL, NULL),
(112, 'Phường 10', 9, NULL, NULL),
(113, 'Phường 11', 9, NULL, NULL),
(114, 'Phường 12', 9, NULL, NULL),
(115, 'Phường 13', 9, NULL, NULL),
(116, 'Phường 14', 9, NULL, NULL),
(117, 'Phường 15', 9, NULL, NULL),
(118, 'Phường 17', 9, NULL, NULL),
(119, 'Phường 2', 9, NULL, NULL),
(120, 'Phường 25', 9, NULL, NULL),
(121, 'Phường 3', 9, NULL, NULL),
(122, 'Phường 4', 9, NULL, NULL),
(123, 'Phường 5', 9, NULL, NULL),
(124, 'Phường 6', 9, NULL, NULL),
(125, 'Phường 7', 9, NULL, NULL),
(126, 'Phường 8', 9, NULL, NULL),
(127, 'Phường 9', 9, NULL, NULL),
(128, 'phường Bến Nghé', 10, NULL, NULL),
(129, 'phường Bến Thành', 10, NULL, NULL),
(130, 'phường Cầu Kho', 10, NULL, NULL),
(131, 'phường Cầu Ông Lãnh', 10, NULL, NULL),
(132, 'phường Cô Giang', 10, NULL, NULL),
(133, 'phường Đa Kao', 10, NULL, NULL),
(134, 'phường Nguyễn Cư Trinh', 10, NULL, NULL),
(135, 'phường Nguyễn Thái Bình', 10, NULL, NULL),
(136, 'phường Phạm Ngũ Lão', 10, NULL, NULL),
(137, 'phường Tân Định', 10, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brands_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_detail_id_foreign` (`product_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_detail_id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD KEY `product_specifications_product_id_foreign` (`product_id`),
  ADD KEY `product_specifications_type_id_foreign` (`type_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_types`
--
ALTER TABLE `specification_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`statistical_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specification_types`
--
ALTER TABLE `specification_types`
  MODIFY `type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `statistical_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`product_detail_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `product_specifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_specifications_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `specification_types` (`type_id`) ON DELETE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
