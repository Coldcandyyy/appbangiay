-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2025 lúc 11:17 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitaplon`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(11, 'chất lượng', 1, 69, '05:17:18am 10/07/2024'),
(12, 'chất lượng', 1, 69, '05:17:26am 10/07/2024'),
(13, 'chất lượng', 1, 68, '05:20:26am 10/07/2024'),
(14, 'chất lượng', 1, 68, '05:21:51am 10/07/2024'),
(15, 'chất lượng', 1, 68, '05:23:18am 10/07/2024'),
(16, 'áo đẹp vch', 1, 59, '06:23:30am 10/07/2024'),
(17, 'áo anh bảy siuu', 1, 59, '06:28:26am 10/07/2024'),
(18, 'chất lượng tốt', 1, 56, '06:29:05am 10/07/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(21, 'Quả bóng đá'),
(22, 'Giày thể thao'),
(23, 'Giày cầu lông'),
(25, 'Giày đá bóng'),
(26, 'Banh bóng rổ'),
(29, 'Găng tay thủ môn'),
(30, 'Quần áo đá bóng'),
(31, 'Quần áo thể thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL DEFAULT 0,
  `img` varchar(50) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(50) DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(39, 'Giày cầu lông Promax', 440000, 'promax-trang.webp', 'Phần upper sử dụng 2 chất liệu chính là PU tạo độ chắn chắn và lớp Mesh thoáng khí và có thể ôm chân rất tốt. Đồng thời 2 bên má giày thiết kế các lỗ thoáng khí nhỏ, giúp thoát mồ hôi nhanh đem lại cho bạn cảm giác thoáng mát và dễ chịu.\r\nPhần vòm giày sử dụng tấm chống xoắn TPU kép, tăng cường sự ổn định bàn chân trước và gót chân, ngăn ngừa lật cổ chân trong quá trình di chuyển, ngăn ngừa bong gân.', 0, 23),
(40, 'Giày cầu lông Promax', 440000, 'promax-den.webp', 'Phần upper sử dụng 2 chất liệu chính là PU tạo độ chắn chắn và lớp Mesh thoáng khí và có thể ôm chân rất tốt. Đồng thời 2 bên má giày thiết kế các lỗ thoáng khí nhỏ, giúp thoát mồ hôi nhanh đem lại cho bạn cảm giác thoáng mát và dễ chịu.\r\nPhần vòm giày sử dụng tấm chống xoắn TPU kép, tăng cường sự ổn định bàn chân trước và gót chân, ngăn ngừa lật cổ chân trong quá trình di chuyển, ngăn ngừa bong gân.', 0, 23),
(41, 'Giày cầu lông Jogarbola Pawa', 520000, 'pawa-xanh.webp', 'Về form: sự đa năng và phù hợp với bàn chân người Việt.\r\nVề đế: đề bằng cao su linh hoạt, Jogarbola Pawa 21008 giúp bạn áp đảo đối thủ trên mọi mặt sân. \r\nĐế giữa: bằng mút xốp đảm bảo tiếp đất nhẹ nhàng sau những cú phát cầu mạnh mẽ.', 0, 23),
(42, 'Giày cầu lông Jogarbola Pawa', 520000, 'pawa-den.webp', 'Về form: sự đa năng và phù hợp với bàn chân người Việt.\r\nVề đế: đề bằng cao su linh hoạt, Jogarbola Pawa 21008 giúp bạn áp đảo đối thủ trên mọi mặt sân.', 0, 23),
(44, 'Giày cầu lông Mira Lighter', 370000, 'giay-cau-long-mira-lighter-trang-xanh.webp', 'Mira Lighter là mẫu giày cầu lông chuyên dụng, được thiết kế với nhiều tính năng ưu việt để đem lại cho bạn sự thoải mái và tự tin trong các trận đấu cầu lông. Với một thiết kế độc đáo, sản phẩm này sẽ giúp bạn tạo ấn tượng mạnh mẽ và tỏa sáng trên sân cùng đồng đội.', 0, 23),
(45, 'Giày cầu lông Kamito Colomax', 780000, 'giay-cau-long-kamito-colomax-xanh-za-1.webp', 'Thời trang Colorful hay Multi-Color – Một trong những xu hướng luôn thịnh hành được các bạn trẻ theo đuổi và đón nhận bởi cách phối nhiều màu sắc khác nhau trên cùng một item. Xu hướng này cũng là nguồn cảm hứng chính để Kamito cho ra đời mẫu Giày cầu lông hoàn toàn mới mang tên COLORMAX.', 0, 23),
(46, 'Quần lửng Egan', 120000, 'quan-short-the-thao-egan-ms03-yousport-xanh-1.webp', 'Quần lửng Egan là mẫu quần thể thao nam đầy chất lượng đến từ thương hiệu CP Sport.\r\n\r\nForm quần thiết kế đơn giản nhưng không kém phần năng động, tạo sự tự tin cho người mặc.\r\nThiết túi với khóa kéo cao cấp, tiện dụng\r\nPhù hợp cho những lúc tập gym hay hoạt động thể chất ngoài trời lẫn hoạt động thường ngày.', 0, 31),
(47, 'Áo Lót Body Tay Dài Riki', 110000, 'ao-lot-body-riki-xam-1.webp', 'Khả năng thấm hút vượt trội được tạo nên nhờ kết cấu 2 lớp kép đặc biệt của vải\r\nĐộ đàn hồi và co giãn cực tốt khi hoạt động ở cường độ cao\r\nKháng tia UV khi thể thao dưới trời nắng\r\nLớp bên trong của vải được kết cấu bởi loại sợi mịn, tạo cảm giác thoải mái khi sử dụng và không gây kích ứng lên da\r\nThiết kế tinh xảo độc - lạ chắc chắn sẽ giúp bạn nổi bật trên sân cỏ', 0, 31),
(49, 'Áo Polo Luves', 250000, 'lvplm0002_gr.webp', 'Bộ môn thể hình hiện đang được phổ biến rộng rãi và rất được ưa chuộng trên toàn quốc. Không phân biệt nam nữ, độ tuổi bạn đều có thể thức sức mnhf với bộ môn này để có một vóc dáng chuẩn đẹp cùng những cơ bắp săn chắc.\r\n\r\nLuôn cập nhật xu hướng mới đồng thời đáp ứng nhu cầu của ngườ tiêu dùng, YouSport.vn cung cấp những mẫu quần áo thể thao nam mới nhất, áo tập gym nam mới nhất, đẹp nhất và chất lượng nhất với mức giá và những ưu đã vô cùng hấp dẫn.', 0, 31),
(51, 'Áo Polo Nam Egan', 100000, 'ao-polo-egan-xanh-duong-1.webp', 'ÁO POLO NAM UV EGAN không chỉ mang một thiết kế hiện đại, đầy nam tính và chỉn chu mà còn có chất lượng tuyệt hảo từ chất liệu cho đến sự hoàn thiện trong từng chi tiết của sản phẩm.\r\n\r\nSử dụng công nghệ dệt vải tân tiến giúp cho chất lượng bề mặt vải luôn mềm mịn và co giãn tốt hơn.\r\nSợi vải thấm hút mồ hồi nhanh tạo cảm giác thoáng mát, dễ chịu cho người mặc, cùng tính năng chống tia UV cao, bảo vệ làn da của bạn trước các tia cực tím độc hại.', 0, 31),
(52, 'Quần lửng Egan', 150000, 'quan-ms05-den-do.webp', '- Dòng vải chuyên dụng dành cho thể thao, không nhăn, có độ co giãn giúp bạn thoải mái khi vận động.\r\n\r\n- Đặc biệt sườn quần được thiết kế thoáng khí từ công nghệ laser, thoát hơi nhanh tạo cảm giác mát mẻ khi mặc.\r\n\r\n- Sản phẩm sử dụng dây kéo thương hiệu YKK đảm bảo độ bền và chất lượng.\r\n\r\n- Quần đa năng nên có 2 túi trước và 1 túi sau, giúp bạn đem theo được nhiều đồ dùng tiện lợi.\r\n\r\n- Kiểu dáng thể thao, hiện đại, trẻ trung và tôn dáng.\r\n\r\n- Trang phục đa năng, phù hợp trong mọi trường hợp như đi chơi, tập luyện thể thao.', 0, 31),
(53, 'Áo Lót Body Tay Dài Riki', 130000, 'ao-lot-body-riki-xanh-den-1.webp', 'Khả năng thấm hút vượt trội được tạo nên nhờ kết cấu 2 lớp kép đặc biệt của vải\r\nĐộ đàn hồi và co giãn cực tốt khi hoạt động ở cường độ cao\r\nKháng tia UV khi thể thao dưới trời nắng\r\nLớp bên trong của vải được kết cấu bởi loại sợi mịn, tạo cảm giác thoải mái khi sử dụng và không gây kích ứng lên da\r\nThiết kế tinh xảo độc - lạ chắc chắn sẽ giúp bạn nổi bật trên sân cỏ', 0, 31),
(54, 'Áo Bóng Đá Đội Tuyển Đức', 120000, 'qabd-duc-2023-den-do-1.webp', 'Mẫu quần áo bóng đá đội tuyển Đức vẫn sử dụng màu trắng làm chủ đạo, nhưng thiết kế này có phần phá cách hơn ở những đường kẻ ngang màu đen phía trước. Tay áo là màu cờ của Đức. Trên ngực áo vẫn là logo cùng 4 ngôi sao tượng trưng cho 4 lần vô địch thế giới (1954, 1974, 1990 và 2014) của ‘những cỗ xe tăng’.', 0, 30),
(55, 'Áo Bóng Đá Đội Tuyển Đức', 150000, 'qabd-duc-2023-xanh-1.webp', 'Mẫu quần áo bóng đá đội tuyển Đức vẫn sử dụng màu trắng làm chủ đạo, nhưng thiết kế này có phần phá cách hơn ở những đường kẻ ngang màu đen phía trước. Tay áo là màu cờ của Đức. Trên ngực áo vẫn là logo cùng 4 ngôi sao tượng trưng cho 4 lần vô địch thế giới (1954, 1974, 1990 và 2014) của ‘những cỗ xe tăng’.', 0, 30),
(56, 'Quần áo Riki CSD Namor', 80000, 'qabd-khong-logo-riki-namor-2-hong-1.webp', 'Chất liệu vải Polyester, mè cao cấp, thoải mái khi mặc, với sự co giãn và bền bỉ cao.\r\nThiết kế đơn giản nhưng vẫn có họa tiết mang điểm nhấn đặc sắc ở hai bên tay áo.\r\nForm quần áo phù hợp với dáng người Việt.', 0, 30),
(57, 'Quần Áo JP Panther', 160000, 'qabd-jp-panther-do-1.webp', 'Mẫu quần áo bóng đá không logoJust Play Panther vừa ra mắt được chào đón tích cực và đầy hứa hẹn trong năm 2022\r\n\r\nBST Panther lấy ý tưởng từ Chiến Binh Báo đen với khả năng quan sát tinh tường, khả năng di chuyển tốc độ cùng sự mạnh mẽ uy lực của mình thể hiện bản lĩnh “SĂN BÀN THẮNG” tỏa sáng trên sân cỏ.\r\n\r\nThiết kế: Họa tiết chuyển màu phân tầng thân áo như ánh mắt sắc sảo của Báo đen đem lại sự bí ẩn và quyền lực\r\nChất liệu: Vải thun mè thấm hút tốt, ít nhăn nhàu', 0, 30),
(58, 'Quần áo bóng đá Egan Zenos', 200000, 'n-qabd-egan-zenos-xanh-ngoc-1.webp', 'Quần áo bóng đá Egan Zenos là mẫu trang phục với thiết kế nổi bật, sử dụng các họa tiết độc đáo, phá cách giúp bạn trở nên mạnh mẽ và tự tin thể hiện mình trong các trận đấu. Ngoài ra bộ đồ còn có nhiều tình năng ưu việt nhờ chất liệu vải cao cấp.\r\n\r\nChống tia UV UPF 50+\r\nBảo vệ tối đa làn da bạn khỏi cái nắng hè gay gắt\r\nKháng khuẩn đến 99.8% theo chuẩn AATTC an toàn cho làn da của bạn.\r\nVải lưới thân áo sau giúp bạn thoáng mát, hút mồ hôi trong hoạt động thể thao cường độ lớn.', 0, 30),
(59, 'Quần Áo Al-Nassr', 120000, 'quan-ao-clb-alnassr-vang-1.webp', 'Mẫu quần áo bóng đásân nhà 2022-2023 trở lại với một thiết kế đơn giản và đẹp mắt. Bộ đồ sân khách là điểm nhấn với màu sắc chủ đạo cùng các màu phụ trợ phối hợp cực thời thượng.\r\n\r\nĐặc điểm đổi bật:\r\n\r\nLogo thêu sắc sảo, bền đẹp không bong tróc\r\nVải thun lạnh 100% polyester, đặt dệt độc quyền mềm và mịn.\r\nĐộ co dãn tốt, giúp thoáng mát và thoải mái khi vận động.\r\nMàu áo quần cực bền, in ấn có độ thẩm mỹ cao, không bong tróc.', 0, 31),
(65, 'Găng tay thủ môn Zocker Edwin', 520000, 'gt1.webp', 'Lòng găng sử dụng chất liệu cao cấp Latico New Basic Latex Foam (Germany) tăng cường tính ma sát giúp thủ môn bắt dính bóng đồng thời giữ cảm giác bóng chân thật.\r\nMu bàn tay ứng dụng công nghệ 3D định hình bộ khung, giúp các ngón và bàn tay không bị bó chặt bên trong mà ôm vừa đủ để đảm bảo sự linh hoạt.\r\nPhần đấm bóng sử dụng chất liệu Latex Foam, bên dưới có lớp đệm bảo vệ. Lớp đệm còn hỗ trợ tăng cường lực khi đấm bóng.\r\nQuấn cố tay có thể điều chỉnh để đạt độ ôm tay vừa phải.\r\nPhần cổ tay sử dung đệm mút để giữ cổ tay linh hoạt, đồng thời giữ cho tay luôn thoáng khí.\r\nSản phẩm được sử dụng phổ biến trong luyện tập và thi đấu các giải đá bóng phong trào, bán chuyên nghiệp.', 0, 29),
(67, 'Găng tay thủ môn giá rẻ Iwin Keepa', 270000, 'gt4.webp', 'Diện tích tiếp xúc bóng rộng, mút cao su Đức dày 4mm gúp bắt dính bóng.\r\nKiểu cắt “NEGATIVE” ôm tay cho cảm giác bắt bóng chân thực.\r\nForm vừa tay, lớp đệm lót êm ái, vải mesh thoáng khí, mang lại sự mềm mại và êm tay trong thời gian dài.\r\nLớp mút cao su giảm &amp; phân tán lực giúp tay không đau rát.\r\nKhung xương bảo vệ cứng cáp giúp tăng sức mạnh cho những cú bắt bóng, phòng tránh lật, bong gân, trật khớp ngón tay, mang lại cảm giác an toàn cho bạn.', 0, 29),
(68, 'Găng tay thủ môn Iwin Keepa PRO', 350000, 'gt2.webp', 'GIỮ TAY VỮNG VÀNG, SẴN SÀNG CẢN PHÁ\r\nVới iWin Keepa, những cú sút mạnh không còn là lí do khiến bạn phải e ngại. Thiết kế đăc biêt giúp bảo vệvà hạn chế chấn thương tối đa cho các ngón tay, đây chính là trợ thủ đắc lực giúp mang lại cảm giác an toàn, sẵn sàng hóa giải từng cú sút.\r\n\r\nBẮT BÓNG TỐT HƠN\r\nDiện tích tiếp xúc bóng rộng, mút cao su Đức dày 4mm gúp bắt dính bóng. Kiểu cắt “NEGATIVE” ôm tay cho cảm giác bắt bóng chân thực.', 0, 29),
(69, 'Găng tay thủ môn Iwin', 410000, 'gt3.webp', '– Găng tay thủ môn Iwin VT02 có thiết kế đặc biệt giúp bảo vệ và hạn chế chấn thương tối đa cho các ngón tay, đây chính là trợ thủ đắc lực giúp mang lại cảm giác an toàn, sẵn sàng hoá giải từng cú sút.\r\n– Diện tích tiếp xúc bóng rộng, mút cao su bền dày 4mm giúp bắt dính bóng. Kiểu cắ Negavtive ôm tay cho cảm giác bắt bóng chân thực.\r\n– Form vừa tay, lớp đệm lót êm ái, vải mesh thoáng khí, mang lại sự mềm mại và êm tay trong thời gian dài.\r\n– Lớp mút cao su giảm &amp; phân tán lực giúp tay không đau rát. Khung xương bảo vệ cứng cáp giúp tăng sức mạnh cho những cú bắt bóng, phòng tránh lật, bong gân, trật khớp ngón tay, mang lại cảm giác an toàn.', 0, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `role` tinyint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'huyhao1', '123456', 'NguyenAnhDuc@gmail.com', 'Nam Dinh', '0366328720', 1),
(22, 'duc dep zai', '123456', 'ducna2492004@gmail.com', 'Hai Duong', '0366328720', 0),
(23, 'trang', 'petrang1111', 'trangngu@gmail.com', 'Thanh Hoa', '0943397129', 0),
(31, 'haingu', 'benhung12', 'hoanghai@gmail.com', 'Thanh Hoa', '0982640143', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_cart_taikhoan` (`iduser`),
  ADD KEY `lk_cart_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_cart_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `lk_cart_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
