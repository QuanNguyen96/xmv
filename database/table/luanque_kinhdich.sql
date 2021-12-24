-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 07:48 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xemvanmenhnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `luanque_kinhdich`
--

CREATE TABLE `luanque_kinhdich` (
  `id` tinyint(4) NOT NULL,
  `id_que` tinyint(4) NOT NULL,
  `nghia_tenque` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nghia_ngoai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nghia_noi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phantich_thoantu` text COLLATE utf8_unicode_ci,
  `phantich_thoantruyen` text COLLATE utf8_unicode_ci,
  `soluoc` text COLLATE utf8_unicode_ci,
  `ynghia` text COLLATE utf8_unicode_ci,
  `totchoviec` text COLLATE utf8_unicode_ci,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` tinyint(4) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `luanque_kinhdich`
--

INSERT INTO `luanque_kinhdich` (`id`, `id_que`, `nghia_tenque`, `nghia_ngoai`, `nghia_noi`, `phantich_thoantu`, `phantich_thoantruyen`, `soluoc`, `ynghia`, `totchoviec`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 18, 'Việc chưa xong việc bắt đầu', 'Lời đoán: vị tế, hanh', 'Tiểu hồ nhật tế, nhu kỳ vỹ', '<p dir=\"ltr\">未 濟 . 亨. 小 狐 汔 濟. 濡 其 尾 . 無 攸 利 .</p>\r\n\r\n<p dir=\"ltr\">Vị Tế. Hanh. Tiểu hồ ngật tế. Nhu kỳ vĩ. V&ocirc; du lợi.</p>\r\n\r\n<p dir=\"ltr\">Dịch.</p>\r\n\r\n<p dir=\"ltr\">Vị Tế l&agrave; việc chưa th&agrave;nh,</p>\r\n\r\n<p dir=\"ltr\">Chưa th&agrave;nh, vẫn thấy tiến tr&igrave;nh hanh th&ocirc;ng.</p>\r\n\r\n<p dir=\"ltr\">C&aacute;o con h&ugrave;ng hổ vượt s&ocirc;ng,</p>\r\n\r\n<p dir=\"ltr\">Để cho đu&ocirc;i ướt, thời kh&ocirc;ng lợi g&igrave;.</p>\r\n\r\n<p dir=\"ltr\">Vị Tế m&agrave; hanh, l&agrave; v&igrave; ng&agrave;y nay mọi sự c&ograve;n bế tắc, dang dở, nhưng rồi đ&acirc;y, nhờ sự cố gắng, mọi sự lại trở n&ecirc;n th&ocirc;ng suốt, xu&ocirc;i xắn, hẳn hoi (Vị Tế. Hanh). Nhưng muốn ra tay g&acirc;y dựng cơ đồ, kh&ocirc;ng thể hăm hăm, hở hở, m&agrave; phải c&oacute; mưu lược, phải biết ước lượng những gian nguy, những kh&oacute; khăn, m&igrave;nh sẽ gặp, v&agrave; phải tr&ugrave; liệu trước những phương c&aacute;ch, để lướt thắng những kh&oacute; khăn đ&oacute;.</p>\r\n\r\n<p dir=\"ltr\">Hăm hở, liều lĩnh, chỉ chuốc lấy thất bại, y thức như con hồ con, thiếu kinh nghiệm, thấy s&ocirc;ng đ&atilde; đ&oacute;ng băng, liền hăm hở vượt qua; n&oacute; c&oacute; biết đ&acirc;u nhiều chỗ s&ocirc;ng h&atilde;y c&ograve;n l&agrave; nước, v&igrave; thế m&agrave; hụt ch&acirc;n, đến nỗi ướt cả đu&ocirc;i, như vậy l&agrave;m sao m&agrave; hay được (Tiểu hồ ngật tế. Nhu kỳ vĩ. V&ocirc; du lợi).</p>\r\n', '<p dir=\"ltr\">彖 曰 . 未 濟 . 亨 . 柔 得 中 也 . 小 狐 汔 濟 . 未 出 中 也 . 濡 其 尾 . 無 攸 利 .不 續 終 也 . 雖 不 當 位 .剛 柔 應 也 .</p>\r\n\r\n<p dir=\"ltr\">Vị Tế. Hanh. Nhu đắc trung d&atilde;. Tiểu hồ ngật tế. Vị xuất trung d&atilde;. Nhu kỳ vĩ. V&ocirc; du lợi. Bất tục chung d&atilde;. Tuy bất đ&aacute;ng vị. Cương nhu ứng d&atilde;.</p>\r\n\r\n<p dir=\"ltr\">Dịch. Tho&aacute;n rằng:</p>\r\n\r\n<p dir=\"ltr\">Vị Tế m&agrave; được hanh th&ocirc;ng,</p>\r\n\r\n<p dir=\"ltr\">L&agrave; v&igrave; Nhu được ng&ocirc;i trung đ&agrave;ng ho&agrave;ng.</p>\r\n\r\n<p dir=\"ltr\">C&aacute;o con s&ocirc;ng vội vượt sang,</p>\r\n\r\n<p dir=\"ltr\">C&aacute;i v&ograve;ng gian hiểm, nguy n&agrave;n chưa qua.</p>\r\n\r\n<p dir=\"ltr\">Ướt đu&ocirc;i, mọi chuyện b&ecirc; tha,</p>\r\n\r\n<p dir=\"ltr\">Dở dang, dang dở, kh&oacute; m&agrave; n&ecirc;n c&ocirc;ng.</p>\r\n\r\n<p dir=\"ltr\">Tuy rằng ng&ocirc;i vị long đong,</p>\r\n\r\n<p dir=\"ltr\">Cứng mềm ứng hợp, vả kh&ocirc;ng quải g&agrave;ng.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Tho&aacute;n. Vị Tế m&agrave; hanh l&agrave; v&igrave; H&agrave;o Lục ngũ l&agrave; nhu đắc trung (Vị Tế hanh. Nhu đắc trung d&atilde;).</p>\r\n\r\n<p dir=\"ltr\">V&iacute; dụ: Như thời Vương M&atilde;ng chiếm ng&ocirc;i nh&agrave; H&aacute;n, c&oacute; Lưu T&uacute; muốn phục hưng cơ đồ. Lưu T&uacute; l&agrave; con người hết sức kh&eacute;o l&eacute;o, mềm mỏng, lại l&agrave; d&ograve;ng d&otilde;i t&ocirc;n thất nh&agrave; H&aacute;n, v&igrave; thế n&ecirc;n Lưu T&uacute; qui tụ được nhiều anh t&agrave;i, v&agrave; sau kh&ocirc;i phục được cơ đồ nh&agrave; H&aacute;n. Nhưng l&uacute;c mới bắt đầu thời kỳ Vị Tế, kh&ocirc;ng n&ecirc;n hăm hở &nbsp;l&agrave;m liều, y như con hồ con qua s&ocirc;ng, m&agrave; vẫn chưa tho&aacute;t được v&ograve;ng nguy hiểm (Tiểu hồ nhật tế. Vị xuất trung d&atilde;). Nếu mới đầu m&agrave; sơ xuất như hồ ướt đu&ocirc;i, th&igrave; kh&oacute; m&agrave; tiếp tục c&ocirc;ng việc đến kỳ c&ugrave;ng vậy (Nhu kỳ vĩ. V&ocirc; du lợi. Bất tục chung d&atilde;). Vị Tế tuy dang dở, v&igrave; chẳng c&oacute; H&agrave;o n&agrave;o xứng ng&ocirc;i, xứng vị, nhưng sẽ hanh th&ocirc;ng, v&igrave; c&aacute;c H&agrave;o đều ứng hợp nhau. Trở lại trường hợp Lưu T&uacute;, hay c&aacute;c vua ch&uacute;a lập quốc, ta thấy buổi đầu mọi sự c&ograve;n dở dang, chếch m&aacute;c, nhưng nhờ c&oacute; hiền t&agrave;i, lương tướng phụ bật, n&ecirc;n cuối c&ugrave;ng cũng th&agrave;nh c&ocirc;ng, th&agrave;nh sự.</p>\r\n\r\n<p dir=\"ltr\">Kh&ocirc;ng thể n&agrave;o tồn tại m&atilde;i một thứ cho n&ecirc;n sau khi l&agrave;m được th&igrave; sẽ dẫn tới kh&ocirc;ng l&agrave;m được. V&igrave; vậy tiếp sau Thủy Hỏa K&yacute; Tế l&agrave; quẻ Hỏa Thủy Vị Tế. Quẻ Vị Tế c&oacute; tượng h&igrave;nh l&agrave; Ly ở tr&ecirc;n, Khảm ở dưới trước ngược ho&agrave;n to&agrave;n với quẻ K&yacute; Tế. Lửa ở tr&ecirc;n nước bất giao h&ograve;a n&ecirc;n việc g&igrave; cũng kh&oacute; th&agrave;nh c&ocirc;ng.</p>\r\n', '<p dir=\"ltr\">Sơ Lục : &acirc;m nhu, kh&ocirc;ng đủ t&agrave;i tế hiểm, lại bước ch&acirc;n v&agrave;o Khảm hiểm, kh&ocirc;ng tự lượng, lẫn. (v&iacute; dụ L&ecirc; Anh T&ocirc;ng v&ocirc; quyền, đ&ograve;i chống lại Trịnh T&ugrave;ng, bị giết).</p>\r\n\r\n<p dir=\"ltr\">Cửu Nhị : dương cương, muốn mạnh mẽ đưa Lục Ngũ qua khỏi thời Vị- Tế, e rằng sẽ kh&ocirc;ng khỏi sinh mối nghi kỵ. Tốt hơn l&agrave; Nhị n&ecirc;n thận trọng, mới được, C&aacute;t. (v&iacute; dụ H&agrave;n T&iacute;n c&oacute; đại t&agrave;i, nhưng kh&ocirc;ng chịu giữ g&igrave;n, khoe khoang ham tước lộc, n&ecirc;n bị hại. Tr&aacute;i lại Trương Lương l&agrave;m thầy đế vương, lập kỳ mưu, nhưng nhũn nhặn, n&ecirc;n được to&agrave;n th&acirc;n danh).</p>\r\n\r\n<p dir=\"ltr\">Lục Tam : bất trung bất ch&iacute;nh, v&ocirc; t&agrave;i. Nếu h&agrave;nh động sẽ gặp hung. Nhưng đ&atilde; tới thời Vị-Tế, nếu được Thượng Cửu gi&uacute;p đỡ cho, th&igrave; c&oacute; thể qua được chỗ nguy.</p>\r\n\r\n<p dir=\"ltr\">Cửu Tứ : dương cương, lại đ&atilde; l&ecirc;n thượng qu&aacute;i, tr&ecirc;n c&oacute; Lục Ngũ vua t&ocirc;i tương đắc, c&oacute; thể được C&aacute;t. Nhưng Tứ bất trung bất ch&iacute;nh, n&ecirc;n c&oacute; lời răn: Phải cố giữ trinh ch&iacute;nh th&igrave; mới được C&aacute;t, nếu cậy t&agrave;i ỷ thế th&igrave; hỏng. (V&iacute; dụ Đổng Tr&aacute;c sau khi dẹp xong loạn Thường Thị, được vua cho l&agrave;m th&aacute;i sư, lộng quyền, n&ecirc;n bị hung).</p>\r\n\r\n<p dir=\"ltr\">Lục Ngũ : l&agrave;m chủ thượng qu&aacute;i Li (s&aacute;ng sủa), thời vị-Tế đ&atilde; đến l&uacute;c gần hết. Lại được Nhị v&agrave; Tứ gi&uacute;p cho, C&aacute;t. (v&iacute; dụ sau khi Vương M&atilde;ng chiếm ng&ocirc;i nh&agrave; H&aacute;n, một ho&agrave;ng th&acirc;n phất cờ khởi nghĩa, được d&acirc;n tin theo, giết Vương M&atilde;ng, v&agrave; được t&ocirc;n l&ecirc;n l&agrave;m vua Quang vũ).</p>\r\n\r\n<p dir=\"ltr\">Thượng Cửu : ở thời Vị-Tế, c&oacute; thể hiểu theo 2 nghĩa. Một l&agrave; thời Vị-Tế tột độ, th&igrave; hung. Hai l&agrave; thời Vị-Tế đến l&uacute;c t&agrave;n, th&igrave; l&agrave; tốt, v&ocirc; cự. Nhưng t&ugrave;y thời cơ biến chuyển l&agrave; một việc, c&aacute;i ch&iacute;nh l&agrave; t&ugrave;y người. Nếu thượng c&oacute; l&ograve;ng th&agrave;nh t&iacute;n, tu dưỡng đạo đức của m&igrave;nh, th&igrave; d&ugrave; thời Vị-Tế cực độ cũng được v&ocirc; cựu. Tr&aacute;i lại, nếu Thượng bu&ocirc;ng lung, th&igrave; d&ugrave; thời Vị-Tế chấm dứt, vẫn bị nguy.</p>\r\n', '<p dir=\"ltr\">Quẻ Hỏa Thủy Vị Tế c&oacute; &yacute; nghĩa l&agrave; th&ugrave;ng nước dưới lửa, l&agrave;m sao c&oacute; thể tạo ra th&agrave;nh quả. Quẻ n&agrave;y tr&aacute;i ngược ho&agrave;n to&agrave;n với quẻ K&yacute; Tế. C&aacute;c h&agrave;o của quẻ Vị Tế bất ch&iacute;nh, &acirc;m h&agrave;o cư dương vị v&agrave; ngược lại.</p>\r\n\r\n<p dir=\"ltr\">Thời kỳ quẻ Vị Tế b&aacute;o hiệu sự hung hiểm, tuy nhi&ecirc;n cũng c&oacute; thể kết th&uacute;c trong s&aacute;ng sủa nhưng chỉ ở phạm vi nhỏ hẹp. Cả quẻ c&oacute; 6 h&agrave;o đều bất ch&iacute;nh, tuy nhi&ecirc;n cương nhu vẫn ứng ch&iacute;nh n&ecirc;n c&oacute; thể l&agrave;m được những c&ocirc;ng việc Tế.</p>\r\n\r\n<p dir=\"ltr\">Tượng quẻ Vị Tế l&agrave; Hỏa Tại Thủy Thượng c&oacute; nghĩa l&agrave; lửa ở tr&ecirc;n nước. Quy luật th&ocirc;ng thường lửa bốc ch&aacute;y l&ecirc;n tr&ecirc;n, c&ograve;n nước th&igrave; chảy xuống dưới. Nhưng trong trường hợp n&agrave;y th&igrave; lửa lại ở tr&ecirc;n nước n&ecirc;n kh&ocirc;ng thể tồn tại c&ugrave;ng chung lợi &iacute;ch. Ch&iacute;nh v&igrave; lẽ đ&oacute; kh&oacute; việc g&igrave; ho&agrave;n th&agrave;nh, thể hiện vận số đang c&oacute; chiều hướng đi xuống, bất lợi.</p>\r\n', '<p dir=\"ltr\">Quẻ Hỏa Thủy Vị Tế l&agrave; quẻ nguy hiểm, kh&ocirc;ng tốt để thực hiện bất kỳ đại nghiệp n&agrave;o trong đời người như c&ocirc;ng danh sự nghiệp, t&igrave;nh duy&ecirc;n, gia đạo, kinh doanh,... Tốt nhất n&ecirc;n giữ cho m&igrave;nh khỏi sa v&agrave;o hung hiểm sẽ tốt hơn.</p>\r\n\r\n<p dir=\"ltr\">H&agrave;o Sơ Lục, h&agrave;o Lục Tam c&oacute; kẻ &acirc;m nhu ẩn th&acirc;n, t&agrave;i tế hiểm, h&agrave;nh động của người dụng sẽ dễ mang họa. H&agrave;o Cửu Nhị c&oacute; t&agrave;i tế hiểm khiến người kh&oacute; tr&aacute;nh được hiểm nguy n&ecirc;n cẩn thận mềm mỏng, giữ phận an ổn trong thời kỳ n&agrave;y sẽ tốt hơn.</p>\r\n\r\n<p dir=\"ltr\">Trong giai đoạn đầu của thời Vị-Tế, l&agrave; nguy hiểm, tốt nhất l&agrave; giữ m&igrave;nh cho khỏi sa v&agrave;o hiểm. Bởi vậy:</p>\r\n\r\n<p dir=\"ltr\">- Những kẻ &acirc;m nhu như Sơ Lục v&agrave; Lục Tam, kh&ocirc;ng c&oacute; t&agrave;i tế hiểm, n&ecirc;n ẩn th&acirc;n chớ hoạt động m&agrave; mang họa;</p>\r\n\r\n<p dir=\"ltr\">- Cửu Nhị c&oacute; t&agrave;i tế hiểm, nhưng v&igrave; c&ograve;n ở hạ qu&aacute;i Khảm, e sẽ mang họa, n&ecirc;n cẩn thận giữ m&igrave;nh l&agrave; hơn, tr&aacute;nh mọi hiềm nghi; Trong giai đoạn cuối của thời Vị-Tế, đ&atilde; s&aacute;ng sủa hơn, c&oacute; thể tế hiểm được, nhưng cũng phải cẩn thận mềm mỏng:</p>\r\n\r\n<p dir=\"ltr\">- Cửu Tứ v&agrave; Thượng Cửu cương cường, nếu biết cư xử mềm mỏng, sẽ th&agrave;nh c&ocirc;ng. - Lục Ngũ vốn mềm mỏng khoan dung, sẽ th&agrave;nh c&ocirc;ng trong việc tế hiểm.</p>\r\n\r\n<p dir=\"ltr\">Ch&uacute;ng ta c&ograve;n c&oacute; thể nhận định th&ecirc;m rằng cổ th&aacute;nh hiền đ&atilde; đặt quẻ Vị-Tế v&agrave;o cuối 64 quẻ, l&agrave; c&oacute; th&acirc;m &yacute; nhắc nhở hậu thế rằng: Vị-Tế l&agrave; chưa xong, việc đời chẳng bao giờ xong vĩnh viễn; thịnh, suy, trị, loạn, chẳng c&oacute; c&aacute;i g&igrave; bền m&atilde;i được, tất cả chỉ l&agrave; những giai đoạn tạm thời, thay đổi lẫn nhau, m&atilde;i m&atilde;i, v&ocirc; c&ugrave;ng tận. Đ&oacute; l&agrave; điểm ch&iacute;nh trong tư tưởng Dịch.</p>\r\n', '2018-10-11 02:27:24', 1, '0000-00-00 00:00:00', 1),
(2, 52, ' Em gái 雷 澤 歸 妹', 'Quy muội:', 'chỉnh hung, vô du lợi', '<p dir=\"ltr\">歸 妹 . 征 凶 . 無 攸 利 .</p>\r\n\r\n<p dir=\"ltr\">Quy muội. Chinh hung. V&ocirc; du lợi.</p>\r\n\r\n<p dir=\"ltr\">Dịch.</p>\r\n\r\n<p dir=\"ltr\">Quy muội, g&aacute;i nhỏ vu quy,</p>\r\n\r\n<p dir=\"ltr\">Lạ l&ugrave;ng, bỡ ngỡ, l&agrave;m g&igrave; cho đ&acirc;y.</p>\r\n\r\n<p dir=\"ltr\">Quẻ Quy Muội, tr&ecirc;n l&agrave; Chấn, l&agrave; trưởng nam, dưới l&agrave; Đo&agrave;i, l&agrave; thiếu nữ. Như vậy về đ&ocirc;i tuổi cũng ch&ecirc;nh lệch, lại Đo&agrave;i l&agrave; duyệt, Chấn l&agrave; động; lấy sự thỏa th&iacute;ch l&agrave;m động cơ cho c&ocirc;ng việc l&agrave;m, th&igrave; vợ chồng sẽ đi đến chỗ ph&oacute;ng t&uacute;ng dục t&igrave;nh, cho n&ecirc;n sẽ chẳng ra g&igrave;. Nhưng cũng c&oacute; thể giải c&aacute;ch kh&aacute;c l&agrave; Phận em, phận lẽ, &nbsp;kh&ocirc;ng n&ecirc;n chuy&ecirc;n quyền, kh&ocirc;ng n&ecirc;n tự quyết, m&agrave; nhất nhất phải t&ugrave;y thuộc v&agrave;o người vợ cả, chẳng vậy sẽ kh&ocirc;ng ra g&igrave;. V&igrave; thế n&oacute;i: Chinh hung. V&ocirc; du lợi.</p>\r\n', '<p dir=\"ltr\">彖 曰 . 歸 妹 . 天 地 之 大 義 也 . 天 地 不 交 . 而 萬 物 不 興 . 歸 妹 人 之 終 始 也 . 說 以 動 . 所 歸 妹 也 . 征 凶 . 位 不 當 也 . 無 攸 利 . 柔 乘 剛 也 .</p>\r\n\r\n<p dir=\"ltr\">Quy Muội. Thi&ecirc;n địa chi đại nghĩa d&atilde;. Thi&ecirc;n địa bất giao nhi vạn vật bất hưng. Quy muội. Nh&acirc;n chi chung thủy d&atilde;. Duyệt dĩ động. Sở Quy muội d&atilde;. Chinh hung. Vị bất đ&aacute;ng d&atilde;. V&ocirc; du lợi. Nhu thừa cương d&atilde;.</p>\r\n\r\n<p dir=\"ltr\">Dịch.</p>\r\n\r\n<p dir=\"ltr\">Cảm t&igrave;nh Quy Muội, g&aacute;i trai</p>\r\n\r\n<p dir=\"ltr\">&Acirc;m Dương phối ngẫu, luật trời xưa nay,</p>\r\n\r\n<p dir=\"ltr\">Đất trời g&agrave;ng quải, đ&oacute; đ&acirc;y,</p>\r\n\r\n<p dir=\"ltr\">Thế thời vạn vật, biết ng&agrave;y n&agrave;o sinh.</p>\r\n\r\n<p dir=\"ltr\">G&aacute;i trai, Quy muội chi t&igrave;nh,</p>\r\n\r\n<p dir=\"ltr\">Ấy l&agrave; đầu cuối, mối manh con người.</p>\r\n\r\n<p dir=\"ltr\">Vui n&ecirc;n h&agrave;nh động bu&ocirc;ng xu&ocirc;i,</p>\r\n\r\n<p dir=\"ltr\">Thế n&ecirc;n, g&aacute;i mới theo trai ra về,</p>\r\n\r\n<p dir=\"ltr\">L&agrave;m g&igrave;, cũng sẽ &ecirc; chề,</p>\r\n\r\n<p dir=\"ltr\">L&agrave; v&igrave; chẳng được xứng bề, xứng ng&ocirc;i.</p>\r\n\r\n<p dir=\"ltr\">Trăm điều, chẳng tốt, chẳng xu&ocirc;i.</p>\r\n\r\n<p dir=\"ltr\">L&agrave; v&igrave; Nhu lại cưỡi ch&ograve;i l&ecirc;n Cương.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Tho&aacute;n Truyện &nbsp;đề cao sự phối ngẫu, v&agrave; s&aacute;nh cuộc h&ocirc;n nh&acirc;n giữa con người với sự h&ograve;a h&agrave;i của trời đất (Quy Muội. Thi&ecirc;n địa chi đại nghĩa d&atilde;. Thi&ecirc;n địa bất giao nhi vạn vật bất hưng). Cho n&ecirc;n H&ocirc;n Lễ đối với con người hết sức l&agrave; quan trọng. V&igrave; thế Tho&aacute;n viết tiếp Quy Muội nh&acirc;n chi chung thủy d&atilde;.</p>\r\n\r\n<p dir=\"ltr\">S&aacute;ch Quốc ngữ cũng viết: H&ocirc;n nh&acirc;n họa ph&uacute;c chi giai (Quốc ngữ, Chu Ngữ, đệ nhất). H&ocirc;n nh&acirc;n l&agrave; thềm, l&agrave; bậc, l&agrave; họa, ph&uacute;c, v&agrave;o nh&agrave; một vương t&ocirc;n c&ocirc;ng tử.</p>\r\n\r\n<p dir=\"ltr\">Chu Hi giải quẻ Quy Muội, sở dĩ l&agrave; chung thủy v&igrave; con người về nh&agrave; chồng l&agrave; hết đời con g&aacute;i, v&agrave; bắt đầu đời của người mẹ (Quy giả nữ chi chung. Sinh dục giả nh&acirc;n chi thủy). Chuyện vợ chồng dĩ nhi&ecirc;n l&agrave; quan trọng. Nhưng vợ chồng lấy nhau cốt để sinh con đẻ c&aacute;i, l&agrave; cho gi&ograve;ng họ trở n&ecirc;n h&ugrave;ng tr&aacute;ng, vững bền, lại cũng c&ugrave;ng nhau tế tự tổ ti&ecirc;n, chứ kh&ocirc;ng phải l&agrave; để ph&oacute;ng t&uacute;ng dục t&igrave;nh. Trong gia đ&igrave;nh, muốn ấm &ecirc;m, phải c&oacute; t&ocirc;n ti, trật tự th&igrave; mọi sự mới &ecirc;m đẹp.</p>\r\n\r\n<p dir=\"ltr\">Nếu m&agrave; vợ lấn &aacute;t chồng, vợ lẽ đ&ograve;i hơn vợ cả, th&igrave; chẳng l&agrave;m g&igrave; n&ecirc;n chuyện. Cho n&ecirc;n:</p>\r\n\r\n<p dir=\"ltr\">- Vợ chồng phải tr&aacute;nh chuyện lấy th&uacute; vui l&agrave;m h&agrave;nh động (Động dĩ duyệt. Sở Quy muội d&atilde; ).</p>\r\n\r\n<p dir=\"ltr\">- Ng&ocirc;i vị trong gia đ&igrave;nh m&agrave; dang dở, sẽ sinh họa hoạn (Chinh hung. Vị bất đ&aacute;ng d&atilde;).</p>\r\n\r\n<p dir=\"ltr\">-Tất cả những chuyện lăng lo&agrave;n, vượt quyền, vượt vị sẽ g&acirc;y n&ecirc;n hậu quả kh&ocirc;ng hay (V&ocirc; du lợi. Nhu thừa cương d&atilde;).</p>\r\n\r\n<p dir=\"ltr\">Tiến l&ecirc;n m&atilde;i sẽ dẫn đến nơi đến trốn, sau quẻ Phong Sơn Tiệm l&agrave; quẻ L&ocirc;i Trạch Quy Muội. Quy Muội l&agrave; em g&aacute;i về nh&agrave; chồng. Tượng h&igrave;nh của quẻ Quy Muội c&oacute; Chấn ở tr&ecirc;n, Đo&agrave;i ở dưới. Chấn l&agrave; trưởng nam. Đo&agrave;i l&agrave; thiếu nữ. Người con g&aacute;i quyến rũ người con trai để được kết duy&ecirc;n n&ecirc;n gọi l&agrave; Quy Muội.</p>\r\n', '<p dir=\"ltr\">Sơ Cửu : đắc ch&iacute;nh, nhưng tr&ecirc;n kh&ocirc;ng ứng với ai, v&iacute; như người đ&agrave;n b&agrave; giỏi phải lấy lẽ, tuy vậy vẫn c&oacute; thể gi&uacute;p vợ cả để l&agrave;m lợi cho gia đ&igrave;nh, hoặc như người ch&acirc;n thọt m&agrave; cố gắng đi, rồi cũng tới mức, được C&aacute;t.</p>\r\n\r\n<p dir=\"ltr\">Cửu Nhị : dương cương, đắc trung, nhưng ứng với Lục Ngũ l&agrave; người &acirc;m nhu. Dụ cho con g&aacute;i giỏi lấy phải chồng h&egrave;n, hoặc bề t&ocirc;i giỏi phải thờ h&ocirc;n qu&acirc;n. Tuy kh&ocirc;ng thi thố được t&agrave;i năng, kh&ocirc;ng l&agrave;m được việc g&igrave; to t&aacute;t, nhưng bản th&acirc;n trung ch&iacute;nh cũng đ&aacute;ng qu&yacute; trọng. (V&iacute; dụ Qu&acirc;n thờ vua H&aacute;n h&egrave;n yếu, sau phải đi cống Hồ, tuy số phận hẩm hiu nhưng cũng l&agrave; một t&agrave;i nữ nghĩa liệt)</p>\r\n\r\n<p dir=\"ltr\">Lục Tam : bất trung bất ch&iacute;nh, v&iacute; như người con g&aacute;i h&egrave;n mọn k&eacute;n chồng giỏi nhưng v&ocirc; &iacute;ch, chỉ chờ đợi xu&ocirc;ng, chỉ c&ograve;n c&aacute;ch l&agrave;m kẻ n&ocirc; t&igrave;.</p>\r\n\r\n<p dir=\"ltr\">Cửu Tứ : dương h&agrave;o cư &acirc;m vị, l&agrave; người giỏi v&agrave; hiền, nhưng kh&ocirc;ng c&oacute; ai ch&iacute;nh ứng, n&ecirc;n tượng như người con g&aacute;i qu&aacute; th&igrave; m&agrave; chưa lấy chồng. Nhưng v&igrave; Tứ t&agrave;i giỏi, rồi cũng sẽ c&oacute; người rước m&igrave;nh vu quy. (V&iacute; dụ Đo&agrave;n thị Điểm muộn chồng, sau cũng lấy được tiến sĩ Nguyễn Kiều, hoặc như Đ&agrave;o Duy Từ kh&ocirc;ng được ứng thi ở Bắc, phải trốn v&agrave;o Nam l&agrave;m t&ecirc;n chăn tr&acirc;u, rồi được ch&uacute;a Nguyễn biết t&agrave;i, trọng dụng).</p>\r\n\r\n<p dir=\"ltr\">Lục Ngũ : &acirc;m nhu đắc trung, ở vị ch&iacute; t&ocirc;n m&agrave; khi&ecirc;m cung, tượng như em g&aacute;i vua Đế ất lấy chồng b&igrave;nh d&acirc;n m&agrave; kh&ocirc;ng ki&ecirc;u sa. (V&iacute; dụ như Mạc Đĩnh Chi đỗ tới trạng nguy&ecirc;n, l&agrave;m đại thần, m&agrave; c&aacute;ch ăn mặc ở rất cần kiệm).</p>\r\n\r\n<p dir=\"ltr\">Thượng Lục : ở cuối quẻ Qui-Muội, tượng như người con g&aacute;i v&igrave; cẩu hợp đi l&agrave;m vợ người ta. Kh&ocirc;ng ra g&igrave;, chỉ c&oacute; hư danh, kh&ocirc;ng c&oacute; t&igrave;nh nghĩa thực sự.</p>\r\n', '<p dir=\"ltr\">Quẻ L&ocirc;i Trạch Quy Muội c&oacute; tượng quẻ lấy vui vẻ h&ograve;a nh&atilde; của Đo&agrave;i m&agrave; thắng được đức hiếu động quẻ qu&aacute;i Chấn. Theo so&aacute;n từ th&igrave; quẻ Quy Muội l&agrave; ch&iacute;nh hung, v&ocirc; du lợi. V&igrave; thế vợ chồng m&agrave; hợp t&aacute;c th&igrave; thuận với đạo &acirc;m dương trời đất, điều n&agrave;y đ&aacute;ng lẽ ra phải l&agrave; tốt nhưng lại đan x&eacute;t trong đ&oacute; một số kh&iacute;a cạnh hung rất xấu. Đ&oacute; l&agrave; bốn h&agrave;o ở giữa quẻ đều bất ch&iacute;nh. H&agrave;o Tam l&agrave; h&agrave;o &Acirc;m cưỡi l&ecirc;n h&agrave;o Nhị, th&ecirc;m nữa h&agrave;o &Acirc;m Ngũ cưỡi l&ecirc;n h&agrave;o Tứ Dương. Điều n&agrave;y được hiểu l&agrave; con g&aacute;i &aacute;p chế con trai, tiểu nh&acirc;n &aacute;p chế người qu&acirc;n tử. Quẻ ứng sự li&ecirc;n kết tr&aacute;i với đạo l&yacute;, &Acirc;m nhu lấn &aacute;p quang minh ch&iacute;nh đại. &nbsp;</p>\r\n\r\n<p dir=\"ltr\">Tượng quẻ L&ocirc;i Trạch Quy Muội l&agrave; Trạch Thượng Hữu L&ocirc; c&oacute; &yacute; nghĩa l&agrave; tr&ecirc;n đầm c&oacute; xuất hiện sấm. Quẻ n&agrave;y n&oacute;i l&ecirc;n trường hợp vi phạm luật lễ, hay tập qu&aacute;n kh&ocirc;ng tr&aacute;i nổi rủi ro, tai họa. C&oacute; thể một số việc ban đầu tưởng chừng tốt đẹp nhưng kh&oacute; khăn sau sẽ tới. V&igrave; vậy sớm muộn cũng hỏng việc.</p>\r\n', '<p>Quẻ L&ocirc;i Trạch Quy Muội l&agrave; quẻ mang điềm xấu. Mở rộng quẻ c&oacute; thể ban đầu kết quả được thịnh vượng, nhưng sự thịnh vượng đ&oacute; chỉ l&agrave; giả tạo. Đ&acirc;y kh&ocirc;ng phải thời cơ tốt để tiến h&agrave;nh c&aacute;c c&ocirc;ng việc. Tốt nhất n&ecirc;n cẩn trọng trước mọi vấn đề, kh&ocirc;ng n&ecirc;n vội v&agrave;ng thực hiện c&aacute;c kế hoạch dự định, bởi dễ thu về thất bại.</p>\r\n', '2018-10-11 02:56:36', 1, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `luanque_kinhdich`
--
ALTER TABLE `luanque_kinhdich`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `luanque_kinhdich`
--
ALTER TABLE `luanque_kinhdich`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;