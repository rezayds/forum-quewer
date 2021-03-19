-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2017 at 03:50 PM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forumque_quewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_answer`
--

INSERT INTO `forum_answer` (`question_id`, `a_id`, `a_name`, `a_email`, `a_answer`, `a_datetime`) VALUES
(1, 1, 'admin', 'admin', 'ya', '19/08/16 08:18:43'),
(1, 2, 'admin', 'admin', 'oyoy', '19/08/16 08:19:32'),
(1, 3, 'admin', 'admin', 'asdas', '19/08/16 20:09:36'),
(1, 4, 'admin', 'admin', 'asdas', '19/08/16 20:10:50'),
(1, 5, 'admin', 'admin', '5', '26/08/16 07:13:19'),
(7, 1, 'joko', 'joko123@gmail.com', 'sehat', '26/10/16 02:36:31'),
(8, 1, 'gorengan123', 'dirty@dsa.cosad', 'Tolol', '01/11/16 05:33:09'),
(6, 1, 'gorengan123', 'dirty@dsa.cosad', 'mantab jiwa :v', '01/11/16 05:34:09'),
(6, 2, 'gorengan123', 'dirty@dsa.cosad', '<p style="color:blue;">Jones</p>', '01/11/16 05:34:37'),
(10, 1, 'DhymasAlamsyah', 'AlamsyahDhymas@gmail.com', 'oon , gak berwawasan', '01/11/16 05:39:19'),
(14, 1, 'MrWWWrevi', 'bijionta8@gmail.com', 'gancet', '01/11/16 14:09:05'),
(16, 1, 'bijimeledak', 'biji@biji.com', 'titit', '01/11/16 14:15:32'),
(17, 1, 'akubutuhdia', 'aku@kamudia', '<?php echo "asd"; ?>', '01/11/16 14:18:15'),
(17, 2, 'akubutuhdia', 'aku@kamudia', 'echo "asdd";', '01/11/16 14:18:31'),
(17, 3, 'akubutuhdia', 'aku@kamudia', 'ahhhh <strong>BROTHER ZONE</strong>', '01/11/16 14:19:11'),
(18, 1, 'akubutuhdia', 'aku@kamudia', 'Kamu <span>JAHAT</span>', '01/11/16 14:24:20'),
(18, 2, 'akubutuhdia', 'aku@kamudia', 'kamu <strong>JAHAT</strong>', '01/11/16 14:24:48'),
(18, 3, 'akubutuhdia', 'aku@kamudia', '<i> Kamu </i> <strong> Anjeng </strong>', '01/11/16 23:00:14'),
(18, 4, 'cumabuatkamu', 'kamu@doang.sayang', '<a href="#">Cuma Kamu</a>', '02/11/16 03:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  `sub_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `forum_question`
--

INSERT INTO `forum_question` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`, `sub_id`) VALUES
(1, 'oy', 'yo', 'admin', 'admin', '19/08/16 08:18:33', 14, 5, 12),
(2, 'sadasdasd', 'asdasdasdasd', 'reza', 'reza', '29/09/16 11:44:27', 2, 0, 8),
(3, 'saya sehat', 'mau tanya aja', 'reza', 'reza', '03/10/16 02:27:42', 0, 0, 10),
(4, 'gowes', 'yuk', 'reza', 'reza', '03/10/16 02:31:26', 2, 0, 13),
(5, 'vxfcgvh', 'facsdyubasidoasbdacajc iuacbuasc', 'reza', 'reza', '03/10/16 02:44:50', 2, 0, 12),
(6, 'sehat', 'anda sehat', 'reza', 'reza', '25/10/16 01:50:58', 6, 2, 11),
(7, 'sepeda pagi', 'apakah sepeda pagi sehat', 'joko', 'joko123@gmail.com', '26/10/16 02:35:39', 5, 1, 13),
(8, 'Jogging sambil Coli sangat sehat untuk kesehatan', 'Jogging sambil coli dapat menyebabkan kulit menjadi hitam , karena warna putih dari sebuah sperma akan keluar . warna putih dari sperma dapat menyebabkan kulit kita menjadi hitam . Hitam itu disebabkan oleh berkurangnya sel kulit putih karena terlalu banyak sperma yang keluar . \r\n\r\n--WOW FAKTA--', 'gorengan123', 'dirty@dsa.cosad', '01/11/16 05:32:24', 4, 1, 14),
(9, 'Saya Kuat Banget Angkat Kamu', 'GW GA TAKUT', 'DhymasAlamsyah', 'AlamsyahDhymas@gmail.com', '01/11/16 05:35:30', 3, 0, 14),
(10, 'Kenapa Tai Berwarna warni ?', 'Tahukah kamu kenapa kotoran manusia (feses / tinja) bisa berwarna kuning, coklat, hitam, atau bahkan berwarna merah ?\r\nInilah jawabannya ! Check it out ! biggrin (Jangan jijik dulu, coz ini info yang lumayan menarik lho. biggrin)\r\n\r\nCoklat\r\nKotoran manusia berwarna coklat karena perpaduan antara bilirubin yang berasal dari sel darah merah yang telah mati dan cairan empedu yang berasal dari kandung empedu (bilirubin pada dasarnya berwarna kuning). Cairan empedu selanjutnya akan dimetabolisme oleh bakteri yang terdapat di dalam usus anda. Metabolisme ini akan menghasilkan produk sampingan yang disebut stercobilin. Dan paduan antara bilirubuin dan stercobilin inilah yang akan membuat kotoran tampak berwarna kecoklatan.\r\n\r\nJika kotoran anda berwarna cokelat, hal ini berarti merupakan pertanda bagus bahwa anda sedang dalam kondisi yang relatif sehat dan tidak mempunyai masalah dalam produksi cairan empedu atau bilirubin.\r\n\r\nMerah\r\nJika anda melihat kotoran anda berwarna merah, ini bisa menjadi pertanda adanya perdarahan internal pada usus atau daerah sekitar rektum atau anus anda. Namun anda jangan keburu khawatir, karena kotoran warna merah ini bisa juga diakibatkan hanya karena anda baru saja konsumsi makanan atau minuman berwarna. Selain itu, walaupun sangat jarang terjadi, hal ini bisa juga diakibatkan karena kelebihan produksi cairan empedu sehingga menyebabkan diare yang sangat hebat dan menyebabkan saluran pencernaan anda mengalami pendarahan.\r\n\r\nHitam\r\nWarna kotoran yang kehitaman bisa jadi diakibatkan karena pendarahan yang terjadi pada lambung atau tenggorokan. Walaupun pendarahan biasanya menyebabkan warna kotoran anda menjadi merah, namun pendarahan pada organ lambung atau tenggorokan anda akan menghasilkan warna kotoran yang hitam. Hal ini dikarenakan darah akan mengalami proses oksidasi ketika melewati cairan asam lambung dan menghasilkan warna kehitaman.\r\n\r\nKuning\r\nKotoran berwarna kuning berarti terdapat banyak kandungan lemak dalam tinja anda. Dan hal ini bukanlah merupakan pertanda yang baik. Cobalah sedikit demi sedikit untuk mengubah pola makan tinggi lemak anda. Selain itu, kotoran warna kuning juga akan memiliki aroma dan bau yang sangat kuat, yang akan membuat waktu buang air besar anda menjadi saat-saat yang tidak nyaman.\r\n\r\nHijau\r\nKotoran berwarna hijau terutama disebabkan karena waktu transit kotoran yang sangat singkat di usus. Hal ini akan menyebabkan proses "pewarnaan" kotoran menjadi sangat singkat dan menghasilkan kotoran dengan warna kehijauan. Selain itu, kotoran berwarna hijau juga bisa jadi merupakan indikator dari beberapa jenis infeksi bakteri, karena peradangan pada usus juga menyebabkan waktu transit kotoran menjadi singkat. Kotoran berwarna hijau ini juga bisa jadi diakibatkan karena gaya hidup anda yang memang seorang vegetarian. Karena zat klorofil yang terkandung dalam daun tidak dapat tercerna dan akan ikut terbawa bersama kotoran.', 'gorengan123', 'dirty@dsa.cosad', '01/11/16 05:35:52', 3, 1, 3),
(11, 'follow', 'dhymas ganteng di sokin @alamsyahdhymas', 'krisnafathurachman', 'zipardmethod@gmail.com', '01/11/16 05:36:07', 0, 0, 12),
(12, 'follow instagram @dhymasalam ganteng', '', 'krisnafathurachman', 'zipardmethod@gmail.com', '01/11/16 05:36:54', 0, 0, 11),
(13, 'Follow Me For More Info @muhzuhal', 'Bakalan di follback kok cok ;v', 'gorengan123', 'dirty@dsa.cosad', '01/11/16 05:39:03', 0, 0, 12),
(14, 'dia, dia, dia (SEMPURNA)', 'aku kenal dia waktu sma,dia datang tiba-tiba ,saat aku datang ke sekolah, dengan seragam yang salah.dia menghampiriku,dan dia bilang "Lo sini. sama gue"', 'akukamu', 'aku@aku.aku', '01/11/16 02:07:41', 4, 1, 3),
(15, 'Shmily', 'akan tampil lho sosial media buatan imron, namanya #SHMILY , nantikan dalam projek pak heri :v ', 'MrWWWrevi', 'bijionta8@gmail.com', '01/11/16 02:08:09', 9, 0, 10),
(16, 'Coli Sambil Lari Merusak Bijimu', 'Jadi gini gan , kalo lu lari kan kaki lu gerak cepet kalo lu sambil coli titit lu ngampleh2 ga danta goblog . kalo lu lari sambil coli itu tangan gimana :v mau kaya rambo sambil megang senapan titit ? jadi kurangi coli sambil berlari atau berlari sambil coli . waspadalah , waspadalah titit mengawasimu', 'bijimeledak', 'biji@biji.com', '01/11/16 02:13:44', 5, 1, 11),
(21, 'follow my instagram @nilapurbasari', 'web ueg kerenn uughaaa hahhahah', 'laa', 'nila.aja13@gmail.com', '23/11/16 03:50:00', 0, 0, 3),
(22, 'Ini topic', 'ini detail', 'mrkuyu', 'asd@asd.asd', '19/02/17 07:45:45', 2, 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Teknologi'),
(2, 'Gaya Hidup'),
(3, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE IF NOT EXISTS `sub_kategori` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `sub_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`sub_id`, `kategori_id`, `sub_nama`) VALUES
(8, 1, 'Gadget'),
(9, 1, 'Games'),
(10, 1, 'PC'),
(11, 2, 'Kesehatan'),
(12, 2, 'Konsultasi Penyakit'),
(13, 3, 'Bersepeda'),
(14, 3, 'Jogging');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'reza', 'reza', 'reza'),
(3, 'harun', 'harun', 'harun'),
(4, 'ganyong', 'ganyong', 'ganyong'),
(5, 'Jauqgwgw', 'jajaga', 'hshqgfwg@gmail.com'),
(6, 'joko', '123', 'joko123@gmail.com'),
(7, 'gorengan123', '123', 'dirty@dsa.cosad'),
(8, 'Dhymas Alamsyah', 'krisnaf123', 'AlamsyahDhymas@gmail.com'),
(9, 'DhymasAlamsyah', 'krisnaf123', 'AlamsyahDhymas@gmail.com'),
(10, 'krisnafathurachman', 'krisna', 'zipardmethod@gmail.com'),
(11, 'akukamu', 'aku', 'aku@aku.aku'),
(12, 'MrWWWrevi', 'password123', 'bijionta8@gmail.com'),
(13, 'bijimeledak', 'biji', 'biji@biji.com'),
(14, 'akubutuhdia', 'aku', 'aku@kamudia'),
(15, 'Orang <bold>ganteng</bold', 'tamvan', 'tamvan@dan.berani'),
(16, 'cumabuatkamu', 'kamu', 'kamu@doang.sayang'),
(17, 'nilapurbasari', 'namaguabila', 'niilla.aja@gmail.com'),
(18, 'nila', '1234567', 'niilla.aja@gmail.com'),
(19, 'laa', '12345678', 'nila.aja13@gmail.com'),
(20, 'mrkuyu', 'kuyuu', 'asd@asd.asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
