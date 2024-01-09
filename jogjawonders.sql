-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jogjawonders`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDAdmin` int(10) UNSIGNED NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `Username`, `Password`, `Email`, `Nama`) VALUES
(1, 'HardyFebryan', '123', 'Hardy@gmail.com', 'Hardy Febryan'),
(2, 'Noor Akhnafal Aban', '123', 'Aban@gmail.com', 'Noor Akhnafal Aban'),
(3, 'Hiro Rajendra Muhammad', '123', 'Hiro@gmail.com', 'Hiro Rajendra Muhammad'),
(4, 'Muhammad Daffa Ramadhan', '123', 'Daffa@gmail.com', 'Muhammad Daffa Ramadhan');

-- --------------------------------------------------------

--
-- Table structure for table `akomodasi`
--

CREATE TABLE `akomodasi` (
  `IDAkomodasi` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Fasilitas` varchar(255) DEFAULT NULL,
  `Kategori` varchar(255) NOT NULL,
  `IDLokasi` int(11) NOT NULL,
  `Tautan` varchar(1000) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `IDMitra` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Rentang_Harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akomodasi`
--

INSERT INTO `akomodasi` (`IDAkomodasi`, `Nama`, `Deskripsi`, `Fasilitas`, `Kategori`, `IDLokasi`, `Tautan`, `Gambar`, `IDMitra`, `Status`, `Rentang_Harga`) VALUES
(1, 'The Kharma Villas', 'Vila resort ini memiliki gratis Wi-Fi di semua kamar yang memudahkan koneksi, dan juga parkir gratis. Terletak strategis di Ngaglik yang merupakan bagian Yogyakarta, properti ini menempatkan Anda dekat dengan atraksi dan opsi restoran menarik. Jangan pulang dulu sebelum berkunjung ke Taman Sari yang terkenal. Memiliki peringkat bintang-3, properti berkelas ini menyediakan akses ke kolam renang luar ruangan, pijat dan kolam air panas untuk para tamu di properti.', 'Pilihan favorit wisatawan solo, Pas untuk aktivitas, Shuttle bandara, Check-in 24 jam, WiFi gratis di semua kamar.', 'Villa', 1, 'https://www.agoda.com/id-id/the-kharma-villas/hotel/yogyakarta-id.html?finalPriceView=1&isShowMobileAppPrice=false&cid=1915013&numberOfBedrooms=&familyMode=false&adults=1&children=0&rooms=1&maxRooms=0&checkIn=2023-12-6&isCalendarCallout=false&childAges=&n', 'TheKharma.jpg', 3, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(2, 'Satoria Hotel Yogyakarta', 'SATORIA Hotel Yogyakarta adalah hotel dekat bandara dan merupakan pilihan tepat untuk bermalam sambil menunggu jadwal penerbangan berikutnya. Dapatkan tempat untuk istirahat yang nyaman di tengah persinggahan sementara Anda.', 'AC, Banquet, Kamar dengan pintu penghubung, Kolam renang, Teras rooftop, Area merokok, Teras', 'Hotel', 2, 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/10010158-feb9a110283fd628951203d83efa1638.jpeg?_src=imagekit&tr=dpr-2,c-at_max,h-360,q-40,w-640', 'Satoria.jpg', 1, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(3, 'Sheraton Mustika Yogyakarta', 'hotel ini adalah pilihan tepat bagi Anda dan pasangan yang ingin menikmati liburan romantis. Dapatkan pengalaman yang penuh kesan bersama pasangan dengan menginap di Sheraton Mustika Yogyakarta Resort & Spa.\r\nSheraton Mustika Yogyakarta Resort & Spa adalah pilihan tepat bagi Anda yang ingin menghabiskan waktu dengan berbagai fasilitas mewah. Nikmati kualitas layanan terbaik dan pengalaman mengesankan selama menginap di hotel ini.', 'AC, Wifi, Restoran, Kolam Renang, Lift, Banquet, Aula', 'Hotel', 4, 'https://www.traveloka.com/id-id/hotel/indonesia/sheraton-mustika-yogyakarta-resort--spa-3000020001130', 'Sheraton.jpg', 4, 'Approved', '>Rp1.500.000,00'),
(4, 'The Rich Hotel', 'hotel ini adalah pilihan tepat bagi Anda dan pasangan yang ingin menikmati liburan romantis. Dapatkan pengalaman yang penuh kesan bersama pasangan dengan menginap di The Rich Jogja Hotel.\r\nThe Rich Jogja Hotel adalah pilihan tepat bagi Anda yang ingin menghabiskan waktu dengan berbagai fasilitas mewah. Nikmati kualitas layanan terbaik dan pengalaman mengesankan selama menginap di hotel ini.', 'AC, Wifi, Aula, Banquet, Kolam Renang, Teras, Kafe', 'Hotel', 5, 'https://www.traveloka.com/id-id/hotel/indonesia/the-rich-jogja-hotel-3000010000813?spec=01-04-2023.02-04-2023.1.1.HOTEL.3000010000813&id=15247473281634621025&adloc=id-id&kw=15247473281634621025_&gmt=&gn=x&gd=c&gdm=&gcid=&gdp=&gdt=&gap=&pc=1&cp=15247473281', 'TheRich.jpg', 5, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(5, 'Jogja Village', 'ogja Village merupakan hotel rekomendasi untuk Anda, seorang backpacker yang tak hanya mengutamakan bujet, tapi juga kenyamanan saat beristirahat setelah menempuh petualangan seharian penuh.\r\n\r\nhotel ini adalah pilihan tepat bagi Anda dan pasangan yang ingin menikmati liburan romantis. Dapatkan pengalaman yang penuh kesan bersama pasangan dengan menginap di Jogja Village.\r\n\r\nDesain dan arsitektur menjadi salah satu faktor penentu kenyamanan Anda di hotel. Jogja Village menyediakan tempat menginap yang tak hanya nyaman untuk beristirahat, tapi juga desain cantik yang memanjakan mata Anda.', 'AC, Wifi, TV, Bathtub, Restoran, Lemari Es, Garasi, Parkir', 'Villa', 6, 'https://www.traveloka.com/id-id/hotel/detail?spec=29-11-2023.30-11-2023.1.1.HOTEL.3000020001130.Sheraton%20Mustika%20Yogyakarta%20Resort%20%26%20Spa.1', 'JogjaVillage.jpg', 8, 'Approved', 'Rp300.000,00 - Rp600.000,00'),
(6, 'Grand Hyatt Yogyakarta', 'Grand Hyatt Yogyakarta adalah destinasi mewah yang menggabungkan keanggunan tradisional dengan kenyamanan modern. Terletak di tengah kota Yogyakarta, hotel ini menyajikan pengalaman menginap yang istimewa dengan arsitektur yang memikat dan pemandangan yang memukau. Kamar-kamar luas dan indahnya dihiasi dengan sentuhan seni dan desain lokal, menciptakan suasana yang hangat dan ramah. Fasilitas dalam kamar meliputi kenyamanan seperti tempat tidur mewah, area duduk yang nyaman, dan fasilitas modern untuk memenuhi kebutuhan tamu.\r\n\r\nGrand Hyatt Yogyakarta juga dikenal dengan layanan dan fasilitasnya yang luar biasa. Restoran dan kafe di dalam hotel menyajikan hidangan kuliner kelas dunia, mencakup cita rasa lokal dan internasional. Para tamu dapat merasakan keleluasaan pilihan kuliner di tempat-tempat ini, menciptakan pengalaman kuliner yang tak terlupakan. Selain itu, fasilitas spa dan pusat kebugaran yang lengkap memungkinkan tamu untuk bersantai dan menyegarkan diri setelah seharian beraktivitas.\r\n\r\nDengan lokasi yang strategis, Grand Hyatt Yogyakarta menjadi titik awal yang ideal untuk menjelajahi kekayaan budaya dan alam sekitar. Dekat dengan objek wisata terkenal dan situs bersejarah, hotel ini memberikan akses yang mudah bagi tamu untuk mengeksplorasi keindahan Yogyakarta. Dengan kombinasi kemewahan, kenyamanan, dan keberagaman pengalaman, Grand Hyatt Yogyakarta menjadi pilihan istimewa bagi mereka yang mencari penginapan eksklusif di kota ini.', 'Area parkir, Kopi/teh di lobby, Kafe, Lift, Layanan kamar 24 jam, Restoran, Brankas, WiFi di area umum, Bilyar, Sepeda, Pemancingan, Pusat kebugaran, Golf, Lapangan golf, Lapangan tennis outdoor, Tennis meja, Tennis, AC, Aula, Banquet, Kolam renang, Area ', 'Hotel', 7, 'https://www.traveloka.com/id-id/hotel/indonesia/hyatt-regency-yogyakarta-100215', 'GrandHyatt.jpg', 9, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(7, 'Hotel Tentrem Jogja', 'Sebuah destinasi akomodasi mewah yang terletak di Yogyakarta, Indonesia. Dengan arsitektur yang elegan dan desain yang modern, hotel ini menawarkan pengalaman menginap yang istimewa bagi para tamu. Terletak strategis di pusat kota Yogyakarta, Hotel Tentrem Jogja memberikan akses mudah ke berbagai atraksi wisata dan tempat penting di sekitarnya.\r\n\r\nFasilitas yang disediakan oleh Hotel Tentrem Jogja juga sangat mengesankan. Tamu dapat menikmati berbagai pilihan kamar yang luas dan nyaman, dilengkapi dengan fasilitas modern seperti AC, televisi layar datar, dan koneksi internet Wi-Fi. Restoran hotel menyajikan hidangan lezat dari berbagai masakan, menciptakan pengalaman kuliner yang tak terlupakan. Selain itu, hotel ini juga menawarkan fasilitas spa, kolam renang, dan pusat kebugaran untuk menjamin kenyamanan dan kepuasan maksimal bagi para tamu.\r\n\r\nTidak hanya itu, pelayanan yang ramah dan profesional dari staf Hotel Tentrem Jogja membuat setiap tamu merasa dihargai dan diutamakan. Dengan kombinasi antara kemewahan, kenyamanan, dan keramahan, Hotel Tentrem Jogja menjadi pilihan ideal bagi mereka yang mencari pengalaman menginap yang istimewa di kota budaya Yogyakarta.', 'Area parkir, Kafe, Lift, Restoran, Layanan kamar, Brankas, WiFi di area umum, AC, Aula, Banquet, Kamar dengan pintu penghubung, Ruang keluarga, Area bebas asap rokok, Kolam renang, Area merokok, Jubah mandi, TV kabel, Meja, Pengering rambut, Brankas kamar', 'Hotel', 8, 'https://www.traveloka.com/id-id/hotel/indonesia/hotel-tentrem-yogyakarta-409746', 'HotelTentrem.jpg', 10, 'Approved', '>Rp1.500.000,00'),
(8, 'Rajaklana Resort and Spa', 'Sebuah destinasi mewah yang terletak di tengah-tengah keindahan alam di Indonesia. Dengan desain arsitektur yang memukau dan perpaduan elegan antara unsur tradisional dan modern, resor ini menawarkan pengalaman menginap yang tak terlupakan. Dikelilingi oleh kebun tropis yang hijau dan pemandangan alam yang memesona, Rajaklana memberikan kesan kedamaian dan ketenangan kepada para tamu yang mencari pelarian dari kehidupan sehari-hari.\r\n\r\nFasilitas di Rajaklana Resort and Spa juga tak kalah mengesankan. Spa mewah di dalam resor menawarkan perawatan eksklusif untuk relaksasi dan penyegaran, menciptakan suasana yang sempurna untuk melepaskan segala kelelahan. Kolam renang yang besar dan terawat dengan baik memberikan kesempatan untuk bersantai sambil menikmati matahari tropis. Restoran di resor ini menawarkan pilihan menu yang lezat dengan cita rasa lokal dan internasional, memberikan pengalaman kuliner yang istimewa.\r\n\r\nSelain itu, Rajaklana Resort and Spa juga menjadi tempat yang ideal untuk acara khusus seperti pernikahan, konferensi, atau perayaan lainnya. Dengan layanan berkualitas tinggi dan perhatian terhadap detail, resor ini berusaha memberikan pengalaman menginap yang istimewa bagi setiap tamu, menjadikannya destinasi pilihan bagi mereka yang menginginkan kombinasi sempurna antara kemewahan, keindahan alam, dan pelayanan prima.', '2 swimming pools, Airport shuttle, Free parking, Spa and wellness centre, Restaurant, Room service, Non-smoking rooms, Tea/coffee maker in all rooms, Bar, Very good breakfast', 'Resort', 9, 'https://www.booking.com/hotel/id/rajaklana-resort-villa-amp-spa.en-gb.html?aid=376614&label=yogyakarta-vXodkCk22ZXQNbRZP02RbQS472451111661%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-30643306409%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlI', 'Rajaklana.jpg', 11, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(9, 'Bale Devata Resort', 'Destinasi penginapan yang memikat dengan keindahan alam dan nuansa tradisional Jawa yang kental. Terletak di tengah-tengah hamparan sawah yang hijau, resort ini menawarkan suasana tenang dan damai, jauh dari kebisingan perkotaan. Arsitektur bangunan-bangunannya yang megah dan artistik memberikan pengalaman menginap yang unik dan memanjakan para tamu. Dari setiap sudut, kita dapat menikmati pemandangan alam yang menakjubkan, termasuk panorama Gunung Merapi yang mempesona.\r\n\r\nFasilitas di Bale Devata Resort juga tidak kalah mengesankan. Kamar-kamarnya didesain dengan gaya klasik Jawa yang modern, dilengkapi dengan berbagai fasilitas yang membuat pengunjung merasa seperti berada di istana. Kolam renang yang indah di tengah taman tropis menjadi tempat sempurna untuk bersantai, sementara restoran resort menyajikan hidangan lezat dengan sentuhan lokal dan internasional. Pelayanan yang ramah dan profesional dari staf resort membuat pengalaman menginap semakin berkesan.\r\n\r\nSelain sebagai tempat peristirahatan yang ideal, Bale Devata Resort juga menjadi tempat yang cocok untuk acara-acara khusus seperti pernikahan atau pertemuan bisnis. Dengan fasilitas konferensi dan ruang pertemuan yang lengkap, resort ini menyediakan lingkungan yang menginspirasi untuk berbagai acara. Keseluruhan, Bale Devata Resort di Jogja adalah destinasi yang menggabungkan keelokan alam dengan kemewahan tradisional, memberikan tamu pengalaman tak terlupakan di tengah keindahan budaya Jawa.\r\n\r\n\r\n\r\n\r\n\r\n', 'Outdoor swimming pool, Non-smoking rooms, Room service, Restaurant, Free parking, Free WiFi, Family rooms, Tea/coffee maker in all rooms, Breakfast\r\n', 'Resort', 10, 'https://www.booking.com/hotel/id/bale-devata.en-gb.html?aid=376614&label=yogyakarta-vXodkCk22ZXQNbRZP02RbQS472451111661%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-30643306409%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YdK51rZczkDIdTwC', 'BaleDevata.jpg', 12, 'Pending', 'Rp600.000,00 - Rp1.500.000,00'),
(10, 'Queen of The South Resort', 'Terletak di kota Jogja yang semarak, merupakan tempat peristirahatan mewah yang memadukan kenyamanan modern dengan kekayaan budaya di sekitarnya. Terletak di tengah-tengah lanskap tropis yang rimbun, resor ini menawarkan tempat peristirahatan yang tenang dari hiruk pikuk kehidupan sehari-hari. Arsitekturnya mencerminkan perpaduan harmonis antara desain kontemporer dan elemen tradisional Jawa, menciptakan suasana yang canggih dan penuh budaya.\r\n\r\nResor ini menawarkan berbagai akomodasi yang lengkap, mulai dari kamar yang luas hingga vila pribadi, masing-masing dihiasi dengan dekorasi yang elegan dan dilengkapi dengan fasilitas modern. Para tamu dapat bersantai dengan penuh gaya, baik dengan bersantai di area kolam renang yang luas yang dikelilingi oleh taman tropis atau memanjakan diri dengan perawatan spa yang terinspirasi dari tradisi kesehatan lokal. Queen of the South Resort bangga dengan komitmennya untuk memberikan pelayanan yang sempurna, memastikan setiap tamu merasakan kehangatan keramahan khas Jawa.\r\n\r\nBagi para penggemar kuliner, resor ini menawarkan beragam pilihan bersantap yang menampilkan cita rasa masakan Indonesia yang kaya. Dari hidangan lokal yang otentik hingga hidangan internasional yang dibuat dengan presisi, perjalanan kuliner di Queen of the South Resort adalah eksplorasi rasa yang menyenangkan. Dengan suasana yang tenang, keaslian budaya, dan pelayanan yang penuh perhatian, Queen of the South Resort menjadi tujuan utama bagi mereka yang mencari tempat peristirahatan yang mewah dan kaya akan budaya di jantung kota Jogja.', 'Area parkir, Kopi/teh di lobby, Kafe, Restoran, Layanan kamar, WiFi di area umum, AC, Aula, Ruang keluarga, Alat pemanas, Area bebas asap rokok, Kolam renang, Area merokok, Teras, Bathtub, Meja, Pengering rambut, Kulkas, Pancuran, TV', 'Resort', 11, 'https://www.traveloka.com/id-id/hotel/indonesia/queen-of-the-south-resort-3000010004124', 'Queen.jpg', 13, 'Pending', 'Rp600.000,00 - Rp1.500.000,00'),
(11, 'Villa Pondok Joglo', 'Sebuah tempat penginapan yang memukau di Yogyakarta, Indonesia, yang menawarkan pengalaman menginap yang unik dan nyaman. Dengan arsitektur tradisional Jawa yang megah, villa ini didominasi oleh joglo, sebuah rumah tradisional Jawa yang memiliki atap tinggi dan desain yang khas. Setiap joglo di Villa Pondok Joglo Jogja didesain dengan indah, menciptakan suasana yang tenang dan otentik bagi para tamu.\r\n\r\nFasilitas di Villa Pondok Joglo Jogja juga sangat lengkap, termasuk kolam renang pribadi di setiap unit, taman tropis yang indah, dan area lounge yang nyaman. Tamu dapat menikmati pemandangan hijau yang menyejukkan dan suasana yang tenang, menjauh dari hiruk pikuk kehidupan sehari-hari. Interior villa ini juga dipenuhi dengan sentuhan seni tradisional Jawa, menciptakan atmosfer yang kaya akan budaya dan warisan lokal.\r\n\r\nSelain itu, lokasi Villa Pondok Joglo Jogja sangat strategis, memudahkan akses para tamu untuk menjelajahi keindahan Yogyakarta. Terletak dekat dengan tempat-tempat wisata populer seperti Candi Prambanan, Keraton Yogyakarta, dan Malioboro, villa ini menjadi tempat yang ideal bagi mereka yang ingin mengeksplorasi kekayaan budaya dan sejarah kota ini. Dengan layanan ramah dan suasana yang memikat, Villa Pondok Joglo Jogja menjadi pilihan yang sempurna untuk pengalaman menginap yang tak terlupakan di Yogyakarta.\r\n\r\n\r\n\r\n\r\n\r\n', 'Outdoor swimming pool, Free WiFi, Family rooms, Free parking, Non-smoking rooms, Air conditioning', 'Villa', 12, 'https://www.booking.com/hotel/id/villa-pondok-joglo.en-gb.html?aid=376604&label=yogyakarta-WpiAOg93PdgPSNuQQlHDkAS410800075187%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-30602508690%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YcpDr58xwogABZVEKmVXkOQ&sid=501d1059356962bfe61dfa86c90054c9', 'Pondokjoglo.jpg', 14, 'Approved', '>Rp1.500.000,00'),
(12, 'Most Bali Malioboro Villa', 'Terletak di jantung kota Jogja, merupakan tempat peristirahatan menawan yang memadukan pesona tradisional Jawa dengan kemewahan modern. Arsitektur vila ini menampilkan elemen desain Jawa yang rumit, termasuk aksen kayu berukir dan struktur bergaya Joglo tradisional. Dikelilingi oleh taman tropis yang rimbun, vila ini menyediakan oasis yang tenang di tengah-tengah kota yang ramai. Para tamu akan disambut oleh kehangatan keramahan Jogja saat mereka masuk ke kamar-kamar yang dihias dengan indah yang dihiasi dengan motif batik dan karya seni lokal yang otentik.\r\n\r\nAkomodasi di Bali Malioboro Villa menawarkan keseimbangan sempurna antara kenyamanan dan gaya. Setiap kamar didekorasi dengan apik, menampilkan perpaduan harmonis antara fasilitas kontemporer dan estetika tradisional. Para tamu dapat memanjakan diri dengan luasnya ruang tamu, bersantai di teras pribadi, dan menikmati ketenangan di luar ruangan vila. Staf yang penuh perhatian memastikan pengalaman yang dipersonalisasi, memenuhi kebutuhan dan preferensi setiap tamu, membuat pengalaman menginap di Bali Malioboro Villa benar-benar berkesan.\r\n\r\nSalah satu fitur yang menonjol dari vila ini adalah lokasinya yang strategis di dekat Jalan Malioboro, salah satu jalan raya paling ikonik dan semarak di Jogja. Para tamu memiliki akses mudah ke situs budaya dan sejarah kota, seperti Keraton Yogyakarta dan istana air Taman Sari. Setelah seharian menjelajah, para tamu dapat kembali ke vila untuk bersantai di tepi kolam renang atau menikmati hidangan lokal dan internasional yang lezat di restoran hotel. Bali Malioboro Villa bukan hanya tempat untuk menginap; ini adalah pengalaman mendalam yang memungkinkan para tamu untuk terhubung dengan permadani budaya yang kaya di Jogja sambil menikmati kenyamanan tempat peristirahatan yang mewah.', 'Indoor swimming pool, Family rooms, Free parking, Non-smoking rooms, Air conditioning', 'Villa', 13, 'https://www.booking.com/hotel/id/most-bali-malioboro-villa.en-gb.html?aid=376604&label=yogyakarta-WpiAOg93PdgPSNuQQlHDkAS410800075187%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-30602508690%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YcpDr58xwogABZVEKmVXkOQ&sid=501d1059356962bfe61dfa86c90054c9', 'MostBali.jpg', 15, 'Pending', '>Rp1.500.000,00'),
(13, 'Dipan Guest House Yogyakarta', 'Sebuah penginapan yang terletak di Yogyakarta, Indonesia, menawarkan pengalaman menginap yang nyaman dan memikat di tengah kota yang kaya akan budaya. Dengan desain interior yang modern namun tetap mempertahankan sentuhan tradisional Jawa, Dipan Guest House menghadirkan suasana yang hangat dan ramah. Para tamu disambut oleh dekorasi kamar yang elegan, perabotan yang indah, dan sentuhan seni lokal yang memperkaya pengalaman menginap mereka.\r\n\r\nFasilitas yang disediakan oleh Dipan Guest House Jogja juga menjadi daya tarik utama. Para tamu dapat menikmati akses Wi-Fi gratis, layanan kamar, dan staf yang ramah dan profesional yang siap membantu dengan kebutuhan apa pun. Terdapat pula area umum yang nyaman seperti ruang tamu dan taman yang cocok untuk bersantai setelah seharian menjelajahi keindahan Yogyakarta. Selain itu, lokasinya yang strategis memungkinkan para tamu dengan mudah mengakses tempat wisata terkenal, restoran, dan pusat perbelanjaan di sekitar Jogja.\r\n\r\nDengan kombinasi antara kenyamanan modern dan sentuhan tradisional, Dipan Guest House Jogja menjadi pilihan ideal bagi wisatawan yang mencari tempat menginap yang istimewa dan berkesan di tengah kota yang sarat dengan sejarah dan kebudayaan. Dengan layanan yang ramah dan suasana yang menggoda, tamu dapat merasakan kehangatan dan keramahan khas Indonesia selama menginap di sini.\r\n\r\n\r\n\r\n\r\n\r\n', 'Free WiFi, Family rooms, Free parking, Air conditioning', 'Guesthouse', 14, 'https://www.booking.com/hotel/id/dipan-id-guest-house.en-gb.html?aid=376604&label=yogyakarta-WpiAOg93PdgPSNuQQlHDkAS410800075187%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-30602508690%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YcpDr58xwogABZVEKmVXkOQ&sid=501d1059356962bfe61dfa86c90054c9', 'Dipan.jpg', 16, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(14, 'Omah Teras Bata Guesthouse', 'Sebuah penginapan yang memukau dengan sentuhan arsitektur tradisional Jawa yang khas. Terletak di Yogyakarta, guesthouse ini menawarkan pengalaman menginap yang unik dan autentik bagi para wisatawan. Dari luar, bangunan ini memikat perhatian dengan teras bata yang indah dan menghadirkan atmosfer klasik Jawa. Setibanya di dalam, para tamu akan disambut oleh ruang-ruang yang bernuansa hangat dan penuh keaslian. Furnitur kayu dengan ukiran tradisional, ukiran batik, dan sentuhan seni lokal memberikan tamu pengalaman budaya yang mendalam.\r\n\r\nSetiap kamar di Omah Teras Bata Guesthouse dirancang dengan cermat untuk memberikan kenyamanan maksimal. Interior kamar menggabungkan gaya tradisional dengan fasilitas modern, menciptakan suasana yang harmonis. Tersedia berbagai pilihan kamar, mulai dari kamar standar hingga suite, yang semuanya dilengkapi dengan fasilitas yang memadai. Suasana tenang di sekitar guesthouse menciptakan tempat yang sempurna untuk bersantai setelah seharian menjelajahi pesona Yogyakarta.\r\n\r\nSelain itu, Omah Teras Bata Guesthouse juga menawarkan berbagai fasilitas seperti restoran yang menyajikan hidangan lezat dengan cita rasa lokal, spa untuk relaksasi, dan ruang pertemuan untuk acara bisnis atau pribadi. Dengan lokasinya yang strategis, tamu dapat dengan mudah mengakses berbagai atraksi terkenal di Yogyakarta seperti Keraton, Malioboro, dan Candi Prambanan. Omah Teras Bata Guesthouse Jogja tidak hanya menyediakan tempat menginap, tetapi juga mengajak tamu untuk merasakan keindahan budaya dan tradisi Jawa yang kaya.', 'Free WiFi, Family rooms, Free parking, Non-smoking rooms, 24-hour front desk, Room service, Air conditioning, Breakfast', 'Guesthouse', 15, 'https://www.booking.com/hotel/id/omah-teras-bata-guesthouse.en-gb.html?aid=376604&label=yogyakarta-WpiAOg93PdgPSNuQQlHDkAS410800075187%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-30602508690%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YcpDr58xwogABZVEKmVXkOQ&sid=501d1059356962bfe61dfa86c90054c9', 'Omah.jpg', 17, 'Approved', 'Rp300.000,00 - Rp600.000,00'),
(15, 'Villa Rosseno', 'Sebuah tempat penginapan mewah yang terletak di Yogyakarta, Indonesia. Dengan arsitektur yang elegan dan fasilitas yang lengkap, villa ini menawarkan pengalaman menginap yang istimewa bagi para tamu. Terletak di tengah-tengah alam yang hijau dan sejuk, Villa Rosseno Jogja menawarkan pemandangan yang menakjubkan dan ketenangan yang menyegarkan. Desain interior villa ini sangat terperinci, menciptakan suasana yang nyaman dan indah. Setiap kamar dihiasi dengan gaya yang modern namun tetap mempertahankan sentuhan tradisional yang khas, menciptakan suasana yang hangat dan ramah.\r\n\r\nFasilitas di Villa Rosseno Jogja sangat lengkap, mulai dari kolam renang pribadi, taman yang indah, hingga ruang bersantai yang nyaman. Para tamu dapat menikmati layanan spa dan pijat untuk merelaksasi tubuh setelah seharian beraktivitas. Restoran di villa ini menyajikan berbagai hidangan lezat, mencakup kuliner lokal dan internasional. Pelayanan yang ramah dan profesional dari staf villa juga menjadi nilai tambah yang membuat pengalaman menginap semakin istimewa.\r\n\r\nSelain itu, lokasi Villa Rosseno Jogja juga sangat strategis, memudahkan akses ke berbagai tempat wisata terkenal di Yogyakarta. Dengan kombinasi antara kemewahan, kenyamanan, dan keindahan alam sekitar, Villa Rosseno Jogja menjadi pilihan yang sempurna bagi mereka yang mencari pengalaman menginap yang istimewa dan berkesan di Yogyakarta.\r\n\r\n\r\n\r\n\r\n\r\n', 'Outdoor swimming pool, Free WiFi, Family rooms, Airport shuttle, Free parking, Non-smoking rooms, Restaurant, Room service, Facilities for disabled guests, Breakfast', 'Villa', 16, 'https://www.booking.com/hotel/id/villa-evelyn.en-gb.html?aid=376604&label=yogyakarta-WpiAOg93PdgPSNuQQlHDkAS410800075187%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-30602508690%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YcpDr58xwogABZVEKmVXkOQ&sid=501d1059356962bfe61dfa86c90054c9&dest_id=-2703546;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=6;hpos=6;nflt=sth%3D20;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1701266554;srpvid=af2b629dfd8c007f;type=total;ucfs=1&#hotelTmpl', 'Rosseno.jpg', 18, 'Approved', '>Rp1.500.000,00'),
(16, 'Wonderloft Hostel Jogja', 'Sebuah hostel yang terletak di kota Yogyakarta. Hostel ini menawarkan akomodasi dengan harga terjangkau, namun tetap nyaman dan stylish.\r\n\r\nHostel ini memiliki desain interior yang unik dengan perpaduan gaya retro dan kontemporer. Kamar-kamarnya didominasi dengan warna-warna cerah dan furnitur yang modern. Fasilitas umum di hostel ini juga cukup lengkap, termasuk area lounge, dapur bersama, dan bak rendam air panas outdoor.\r\n\r\nWonderloft Hostel Jogja terletak di lokasi yang strategis, dekat dengan berbagai tempat wisata populer di Yogyakarta, seperti Malioboro, Keraton Yogyakarta, dan Taman Sari. Hostel ini juga mudah diakses dengan kendaraan umum.', 'Free WiFi, Airport shuttle, Free parking, Breakfast', 'Hostel', 17, '', 'Wonder.jpg', 19, 'Approved', 'Rp100.000,00 - Rp300.000,00'),
(17, 'Otu Hostel by Ostic', 'Akomodasi yang menarik dan nyaman yang terletak di Yogyakarta, Indonesia. Hostel ini menawarkan suasana yang ramah dan desain interior yang modern, menciptakan pengalaman menginap yang menyenangkan bagi para tamu. Dengan sentuhan gaya yang khas, Otu Hostel memberikan kesan yang unik dan cocok untuk wisatawan yang mencari pengalaman menginap yang berbeda.\r\n\r\nFasilitas yang disediakan oleh Otu Hostel juga mencakup kenyamanan modern, seperti koneksi Wi-Fi gratis, area bersantai yang luas, dan dapur bersama yang lengkap. Para tamu dapat dengan mudah berinteraksi satu sama lain, menciptakan suasana yang ramah dan hangat. Otu Hostel juga seringkali menyelenggarakan kegiatan sosial atau tur lokal untuk membantu para tamu menjelajahi keindahan kota Yogyakarta.\r\n\r\nDengan lokasi yang strategis, Otu Hostel memudahkan akses para tamu ke berbagai objek wisata dan tempat menarik di sekitar Jogja. Dengan kombinasi antara kenyamanan modern dan atmosfer yang bersahaja, Otu Hostel by Otsic Jogja menjadi pilihan menarik bagi mereka yang mencari pengalaman menginap yang unik dan menyenangkan di kota ini.\r\n\r\n\r\n\r\n\r\n\r\n', 'Outdoor swimming pool, Free WiFi, Airport shuttle, Non-smoking rooms, 24-hour front desk, Air conditioning, Breakfas', 'Hostel', 18, 'https://www.booking.com/hotel/id/otu-by-ostic.en-gb.html?aid=375025&label=city-yogyakarta-giUGNbf43NxCvA2BHKH5OAS388462000961%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342137030%3Akwd-299225889322%3Alp9120721%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YUBh8MufZgNFf8lRRSfobmc&sid=501d1059356962bfe61dfa86c90054c9&dest_id=-2703546;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=3;hpos=3;nflt=sth%3D4;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1701271624;srpvid=0d866c61ea690132;type=total;ucfs=1&#hotelTmpl', 'otu.jpg', 19, 'Approved', 'Rp100.000,00 - Rp300.000,00'),
(18, 'Edu Hostel Jogja', 'Akomodasi yang populer di Yogyakarta, Indonesia, yang menawarkan suasana yang nyaman dan ramah bagi para wisatawan, terutama mereka yang berkepentingan dengan kegiatan pendidikan. Terletak strategis di tengah kota, hostel ini memberikan akses mudah ke berbagai tempat wisata dan institusi pendidikan terkemuka di Yogyakarta. Dengan desain yang modern dan fasilitas yang lengkap, Edu Hostel Jogja menjadi pilihan ideal bagi wisatawan yang mencari pengalaman menginap yang terjangkau namun tetap berkualitas.\r\n\r\nDalam kamar-kamarnya, Edu Hostel Jogja menyediakan tempat tidur yang nyaman dan fasilitas seperti AC, Wi-Fi gratis, dan kamar mandi bersama yang bersih. Suasana ramah dari staf hostel juga membuat para tamu merasa seperti di rumah sendiri. Selain itu, hostel ini juga menawarkan area bersama yang luas dan nyaman, seperti ruang tamu dan dapur bersama, tempat para tamu dapat berinteraksi satu sama lain dan berbagi pengalaman mereka selama berada di Yogyakarta.\r\n\r\nSalah satu daya tarik utama Edu Hostel Jogja adalah program-program edukatif yang mereka tawarkan, seperti workshop budaya, tur sejarah, dan kegiatan belajar lainnya. Ini memberikan kesempatan bagi para tamu untuk lebih memahami budaya dan sejarah kota ini sambil berinteraksi dengan sesama wisatawan. Dengan kombinasi antara suasana yang hangat, fasilitas yang memadai, dan program-program edukatif, Edu Hostel Jogja menjadi pilihan unggul bagi mereka yang mencari penginapan yang lebih dari sekadar tempat bermalam.\r\n\r\n\r\n\r\n\r\n\r\n', 'Area parkir, Lift, Restoran, WiFi, TV kabel, Meja, Pancuran, AC, Ruang keluarga, Area bebas asap rokok, Area merokok', 'Hostel', 19, 'https://www.traveloka.com/id-id/hotel/indonesia/edu-hostel-2000000217895?spec=06-12-2023.07-12-2023.1.1.HOTEL.2000000217895.EDU%20Hostel.2', 'Edu.jpg', 20, 'Approved', 'Rp300.000,00 - Rp600.000,00'),
(19, 'Snooze', 'Tempat penginapan yang menawarkan pengalaman menginap yang unik dan nyaman bagi para wisatawan. Dengan desain interior yang modern dan atmosfer yang ramah, Snooze Guesthouse menciptakan suasana yang hangat dan menyambut bagi para tamu. Kamar-kamar yang mereka tawarkan dirancang dengan gaya yang minimalis namun tetap memberikan kenyamanan yang optimal. Fasilitas di dalam kamar mencakup tempat tidur yang nyaman, AC, dan kamar mandi pribadi, menciptakan lingkungan yang ideal untuk beristirahat setelah seharian menjelajahi keindahan Jogja.\r\n\r\nSelain itu, Snooze Guesthouse juga dikenal dengan staf yang ramah dan pelayanan yang sangat baik. Para tamu sering kali memberikan ulasan positif tentang keramahan dan keramahan staf, yang selalu siap membantu dengan segala kebutuhan mereka. Ini menciptakan suasana yang akrab dan membuat para tamu merasa seperti di rumah sendiri. Selain itu, lokasi guesthouse yang strategis memudahkan akses ke berbagai objek wisata di Jogja, sehingga para tamu dapat dengan mudah menjelajahi keindahan dan kekayaan budaya kota ini.\r\n\r\nSnooze Guesthouse juga menyajikan sarapan lezat yang dapat dinikmati para tamu di area umum. Dengan menu yang beragam dan cita rasa lokal yang autentik, sarapan di Snooze Guesthouse menjadi pengalaman gastronomi yang menyenangkan. Para tamu dapat menikmati santapan pagi mereka sambil bersantai dan berbincang dengan sesama wisatawan, menciptakan momen berharga selama menginap di Jogja. Dengan kombinasi fasilitas yang baik, lokasi strategis, dan pelayanan yang ramah, Snooze Guesthouse menjadi pilihan menarik bagi mereka yang mencari pengalaman menginap yang menyenangkan di Jogja.', 'Free WiFi, Non-smoking rooms, Superb breakfast', 'Guesthouse', 20, 'https://www.booking.com/hotel/id/snooze-kota-yogyakarta.en-gb.html?aid=2077496&label=yogyakarta-w7Qmh_O1WtO67kHf5NxrYAS475910056017%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342138710%3Akwd-30650950770%3Alp9120721%3Ali%3Adec%3Adm&sid=501d1059356962bfe61dfa86c90054c9', 'Snooze.jpg', 21, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(20, 'Blue Garden Yogyakarta', 'Tempat penginapan yang menawarkan pengalaman menginap yang unik dan menyenangkan. Dengan desainnya yang memadukan sentuhan modern dan nuansa alam, tamu-tamu akan merasa seperti berada di sebuah oase tenang di tengah kesibukan kota. Taman yang hijau dan indah di sekitar guesthouse menciptakan suasana yang menenangkan, cocok untuk para wisatawan yang mencari ketenangan setelah seharian menjelajahi keindahan Yogyakarta.\r\n\r\nPenginapan ini menawarkan berbagai jenis kamar yang nyaman dan dilengkapi dengan fasilitas modern untuk memenuhi kebutuhan para tamu. Setiap kamar dirancang dengan perhatian khusus terhadap detail, menciptakan ruang yang hangat dan bersahaja. Para tamu dapat menikmati kenyamanan tidur yang baik sambil menikmati pemandangan taman yang memikat.\r\n\r\nSelain kenyamanan dalam menginap, Blue Garden Guesthouse juga menawarkan pelayanan ramah dan profesional. Para stafnya siap membantu tamu dalam memberikan informasi seputar destinasi wisata lokal, memberikan rekomendasi tempat makan, atau membantu pengaturan transportasi. Dengan kombinasi suasana yang tenang, fasilitas yang lengkap, dan pelayanan yang ramah, Blue Garden Guesthouse Jogja menjadi pilihan ideal bagi wisatawan yang mencari pengalaman menginap yang istimewa di Yogyakarta.\r\n\r\n\r\n\r\n\r\n\r\n', 'Outdoor swimming pool, Free WiFi, Family rooms, Airport shuttle, Free parking, Non-smoking rooms, Restaurant, Air conditioning, Exceptional breakfast', 'Guesthouse', 21, 'https://www.booking.com/hotel/id/blue-garden-yogyakarta.en-gb.html?aid=2077496&label=yogyakarta-w7Qmh_O1WtO67kHf5NxrYAS475910056017%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-146342138710%3Akwd-30650950770%3Alp9120721%3Ali%3Adec%3Adm&sid=501d1059356962bfe61dfa86c90054c9', 'Bluegarden.jpg', 22, 'Approved', 'Rp600.000,00 - Rp1.500.000,00'),
(22, 'The Westlake Resort', 'Sebuah destinasi wisata yang menawarkan pengalaman liburan yang unik dan menyegarkan di Yogyakarta, Indonesia. Terletak di tengah-tengah alam yang indah, resor ini menawarkan suasana yang tenang dan damai, menjauhkan tamu dari hiruk-pikuk kehidupan sehari-hari. Dikelilingi oleh keindahan danau yang memukau, tamu dapat menikmati pemandangan yang menakjubkan sambil menikmati fasilitas dan layanan unggulan resort.\r\n\r\nThe Westlake Resort Jogja juga dikenal karena desain arsitektur yang modern dan fasilitas-fasilitas mewahnya. Kamar-kamar yang luas dan nyaman dilengkapi dengan berbagai fasilitas modern, menciptakan pengalaman menginap yang istimewa bagi para tamu. Restoran-resotran di dalam resor menyajikan beragam hidangan lezat, mencakup cita rasa lokal dan internasional. Selain itu, resor ini juga menyediakan berbagai kegiatan rekreasi, mulai dari olahraga air di danau hingga spa yang menenangkan, memastikan tamu merasa puas selama menginap.\r\n\r\nKeindahan alam sekitar resor tidak hanya menjadi daya tarik visual, tetapi juga menjadi sumber inspirasi untuk berbagai kegiatan outdoor. Para tamu dapat menjelajahi sekitar dengan bersepeda, melakukan trekking, atau sekadar menikmati keindahan alam sekitar danau. Dengan kombinasi antara kemewahan, ketenangan, dan keindahan alam, The Westlake Resort Jogja menjadi destinasi yang sempurna bagi mereka yang mencari pelarian dari rutinitas sehari-hari dan ingin merasakan keanggunan Yogyakarta secara eksklusif.', 'Area parkir, Kafe, Layanan kamar 24 jam, Restoran, Layanan kamar, Brankas, WiFi di area umum, AC, Aula, Banquet, Ruang keluarga, Area bebas asap rokok, Kolam renang, Area merokok, Teras', 'Resort', 22, 'https://www.traveloka.com/id-id/hotel/indonesia/the-westlake-hotel--resort-yogyakarta-3000010023638', 'westlake.jpg', 3, 'Pending', 'Rp600.000,00 - Rp1.500.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `atraksi`
--

CREATE TABLE `atraksi` (
  `IDAtraksi` int(11) NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Isi` text DEFAULT NULL,
  `TanggalPublikasi` date DEFAULT NULL,
  `Kategori` varchar(50) DEFAULT NULL,
  `Tautan` varchar(255) DEFAULT NULL,
  `Gambar` varchar(255) DEFAULT NULL,
  `IDLokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atraksi`
--

INSERT INTO `atraksi` (`IDAtraksi`, `Judul`, `Isi`, `TanggalPublikasi`, `Kategori`, `Tautan`, `Gambar`, `IDLokasi`) VALUES
(2, 'Sendratari Ramayana', 'Sendratari Ramayana Prambanan merupakan sebuah pertunjukan yang menggabungkan tari dan drama tanpa dialog, diangkat dari cerita Ramayana dan dipertunjukkan di dekat Candi Prambanan di Pulau Jawa, Indonesia. Sendratari Ramayana Prambanan merupakan sendratari yang paling rutin mementaskan Sendratari Ramayana sejak 1961.\n\nCerita Ramayana berdasarkan epos Hindu diadaptasi dengan budaya Jawa membuat Sendratari Ramayana menjadi tarian yang unik. Lebih dari 200 penari profesional dan musisi lokal berpartisipasi dalam Sendratari Ramayana yang bertempat di panggung terbuka dengan Candi Prambanan sebagai latar belakang. Sendratari Ramayana juga diceritakan di relief pada Candi Siwa.\n\nCerita Ramayana adalah perjalan Rama dalam menyelamatkan istrinya Sita (di Jawa biasa disebut Sinta) yang diculik oleh raja Negara Alengka, Rahwana. Sendratari Ramayana Prambanan biasa digelar tiap hari Selasa, Kamis, dan Sabtu, pementasan di panggung terbuka (Open Stage) hanya pada bulan Kemarau, di luar itu pementasan diadakan di panggung tertutup (Trimurti Stage).', '2023-11-22', 'Budaya', 'https://www.traveloka.com/id-id/activities/indonesia/product/sendratari-at-candi-prambanan-tickets-2002051521606', 'SendratariRamayana.jpg', 23),
(3, 'Candi Prambanan', 'Candi Prambanan merupakan candi Hindu yang terbesar di Indonesia. Sampai saat ini belum dapat dipastikan kapan candi ini dibangun dan atas perintah siapa, namun kuat dugaan bahwa Candi Prambanan dibangun sekitar pertengahan abad ke-9 oleh raja dari Wangsa Sanjaya, yaitu Raja Balitung Maha Sambu. Dugaan tersebut didasarkan pada isi Prasasti Syiwagrha yang ditemukan di sekitar Prambanan dan saat ini tersimpan di Museum Nasional di Jakarta. Prasasti berangka tahun 778 Saka (856 M) ini ditulis pada masa pemerintahan Rakai Pikatan.\r\n\r\nDenah asli Candi Prambanan berbentuk persegi panjang, terdiri atas halaman luar dan tiga pelataran, yaitu Jaba (pelataran luar), Tengahan (pelataran tengah) dan Njeron (pelataran dalam). Halaman luar merupakan areal terbuka yang mengelilingi pelataran luar. Pelataran luar berbentuk bujur dengan luas 390 m2. Pelataran ini dahulu dikelilingi oleh pagar batu yang kini sudah tinggal reruntuhan. Pelataran luar saat ini hanya merupakan pelataran kosong. Belum diketahui apakah semula terdapat bangunan atau hiasan lain di pelataran ini.\r\n\r\nDi tengah pelataran luar, terdapat pelataran kedua, yaitu pelataran tengah yang berbentuk persegi panjang seluas 222 m2. Pelataran tengah dahulu juga dikelilingi pagar batu yang saat ini juga sudah runtuh. Pelataran ini terdiri atas empat teras berundak, makin ke dalam makin tinggi. Di teras pertama, yaitu teras yang terbawah, terdapat 68 candi kecil yang berderet berkeliling, terbagi dalam empat baris oleh jalan penghubung antarpintu pelataran. Di teras kedua terdapat 60 candi, di teras ketiga terdapat 52 candi, dan di teras keempat, atau teras teratas, terdapat 44 candi. Seluruh candi di pelataran tengah ini mempunyai bentuk dan ukuran yang sama, yaitu luas denah dasar 6 m2 dan tinggi 14 m. Hampir semua candi di pelataran tengah tersebut saat ini dalam keadaan hancur. Yang tersisa hanya reruntuhannya saja.\r\n\r\nPelataran dalam, merupakan pelataran yang paling tinggi letaknya dan yang dianggap sebagai tempat yang paling suci. Pelataran ini berdenah persegi empat seluas 110 m2, dengan tinggi sekitar 1,5 m dari permukaan teras teratas pelataran tengah. Pelataran ini dikelilingi oleh turap dan pagar batu. Di keempat sisinya terdapat gerbang berbentuk gapura paduraksa. Saat ini hanya gapura di sisi selatan yang masih utuh. Di depan masing-masing gerbang pelataran teratas terdapat sepasang candi kecil, berdenah dasar bujur sangkar seluas 1, 5 m2 dengan tinggi 4 m.\r\n\r\nDi pelataran dalam terdapat 2 barisan candi yang membujur arah utara selatan. Di barisan barat terdapat 3 buah candi yang menghadap ke timur. Candi yang letaknya paling utara adalah Candi Wisnu, di tengah adalah Candi Syiwa, dan di selatan adalah Candi Brahma. Di barisan timur juga terdapat 3 buah candi yang menghadap ke barat. Ketiga candi ini disebut candi wahana (wahana = kendaraan), karena masing-masing candi diberi nama sesuai dengan binatang yang merupakan tunggangan dewa yang candinya terletak di hadapannya.\r\n\r\nCandi yang berhadapan dengan Candi Wisnu adalah Candi Garuda, yang berhadapan dengan Candi Syiwa adalah Candi Nandi (lembu), dan yang berhadapan dengan Candi Brahma adalah Candi Angsa. Dengan demikian, keenam candi ini saling berhadapan membentuk lorong. Candi Wisnu, Brahma, Angsa, Garuda dan Nandi mempunyai bentuk dan ukuran yang sama, yaitu berdenah dasar bujur sangkar seluas 15 m2 dengan tinggi 25 m. Di ujung utara dan selatan lorong masing-masing terdapat sebuah candi kecil yang saling berhadapan, yang disebut Candi Apit.', '2023-11-22', 'Sejarah', 'https://www.traveloka.com/id-id/activities/indonesia/product/tiket-candi-prambanan-2001162996889', 'CandiPrambanan.jpg', 24),
(4, 'Lava Tour Merapi', 'Menikmati udara yang sejuk dan keindahan Merapi akan lebih menyenangkan dengan mengunjungi Lava Tour. Gunung Merapi dengan segala kemegahan dan cerita mistis yang tidak ada habisnya nyatanya bersahabat dengan para wisatawan yang menyukai tantangan.\r\n\r\nPemandangan alam dengan udara yang sejuk serta salah satu paket tour dengan jeep menjadi pilihan yang menarik. Para wisatawan bisa mencoba sensasi baru saat menyusuri lautan pasir sisa erupsi dilanjutkan dengan basah-basahan di sungai tentunya menjadi kegiatan yang seru dan dapat menghilangkan kepenatan.\r\n\r\nBagi wisatawan yang menyukai sunrise dapat memilih paket tour dengan memulai trip pada jam 04.30 WIB. Jika ingin lebih santai, maka bisa memilih paket tour yang dimulai siang atau sore.\r\n\r\nLava Tour Merapi sendiri merupakan wisata naik jeep berkeliling kawasan Merapi yang terkena dampak erupsi Merapi pada tahun 2010. Tempat wisata ini patut dikunjungi saat wisatawan berkunjung ke Yogyakarta karena lokasinya sangat dekat dari Kota Yogyakarta, yakni hanya 20 menit perjalanan.\r\n\r\nWisata Merapi dengan naik jeep ini merupakan rekreasi yang tergolong baru untuk menikmati keindahan Merapi. Wisata ini dikemas dalam tour keliling ke berbagai lokasi yang terkena dampak dari erupsi Merapi.\r\n\r\nLava Tour Merapi ini juga merupakan primadona wisata dikawasan Yogyakarta. Para wisatawan akan disuguhi dengan panorama Gunung Merapi dan dapat merasakan serunya melewati medan off-road dengan Jeep Lava Tour Merapi.', '2023-11-22', 'Alam', 'https://jeepwisatajogja.com/?gad_source=1&gclid=Cj0KCQiA6vaqBhCbARIsACF9M6l5BjRCNDAU9mZGpsYsHiEu5jkjD5oRUrMPoF197l_WW4-Y5rUQpO4aAue6EALw_wcB', 'LavaTourMerapi.jpg', 25),
(5, 'Kids Fun Jogja', 'Sejarah Kids Fun Jogja dimulai pada tahun 2010, ketika pendiriannya diinisiasi oleh sekelompok individu yang memiliki visi untuk menciptakan tempat rekreasi yang menarik dan edukatif bagi anak-anak di Yogyakarta. Mereka ingin membangun suatu destinasi yang dapat menyatukan hiburan dan pembelajaran dalam satu tempat, memberikan pengalaman bermain yang menyenangkan sekaligus mendukung perkembangan anak-anak.\r\n\r\nDengan semangat dan dedikasi, tim tersebut merancang dan membangun Kids Fun Jogja sebagai taman bermain yang inovatif dan interaktif. Konsepnya adalah menghadirkan wahana dan atraksi yang menggabungkan elemen edukasi dengan hiburan, agar anak-anak dapat belajar sambil bermain dengan cara yang menyenangkan.\r\n\r\nSetelah proses perencanaan dan pembangunan yang teliti, Kids Fun Jogja dibuka untuk umum pada tahun 2012. Dalam beberapa tahun, tempat rekreasi ini berhasil menarik perhatian masyarakat lokal dan wisatawan yang berkunjung ke Yogyakarta. Keberhasilan ini didukung oleh berbagai faktor, termasuk kualitas wahana yang berkualitas, keamanan yang dijaga dengan baik, dan beragam kegiatan edukatif yang menarik.\r\n\r\nSeiring berjalannya waktu, Kids Fun Jogja terus berkembang dan meningkatkan fasilitas serta layanan yang ditawarkan. Berbagai tambahan atraksi dan perbaikan dilakukan guna memenuhi kebutuhan pengunjung yang semakin berkembang. Parkir yang luas, area makan, dan fasilitas pendukung lainnya juga disediakan untuk memberikan kenyamanan dan kemudahan bagi pengunjung.\r\n\r\nKids Fun Jogja menjadi tempat favorit bagi banyak keluarga untuk menghabiskan waktu bersama anak-anak. Melalui perpaduan yang unik antara hiburan dan pendidikan, tempat ini telah menciptakan lingkungan yang menginspirasi anak-anak untuk belajar, berimajinasi, dan bersosialisasi.\r\n\r\nSejalan dengan perkembangan teknologi dan tren rekreasi, Kids Fun Jogja terus berupaya untuk tetap relevan dan menawarkan pengalaman yang menarik bagi anak-anak. Dengan terus berinovasi dan meningkatkan kualitas layanan, tempat rekreasi ini berkomitmen untuk menjadi destinasi terbaik bagi keluarga di Yogyakarta.\r\n\r\nSeiring berjalannya waktu, Kids Fun Jogja semakin berkembang dan terus menjadi salah satu tujuan rekreasi anak yang populer di Yogyakarta. Dengan menyajikan kombinasi hiburan dan pembelajaran yang menyenangkan, tempat ini memberikan pengalaman bermain yang unik dan mendukung perkembangan anak-anak.', '2023-11-22', 'Hiburan', 'https://kidsfun.co.id/tickets', 'KidsFunJogja.jpg', 26),
(6, 'Gembira Loka Zoo', 'Gembira Loka Zoo merupakan Kebun Raya dan Kebun Binatang yang berada di Kota Yogyakarta. Memiliki berbagai wahana rekreasi seperti interaksi satwa, kolam sentuh, kolam tangkap, terapi ikan, perahu kayuh, skuter air, atv, bumper boat, speed boat, perahu katamaran, dan lain lain.\r\n\r\nMemiliki berbagai fasilitas seperti akses wifi internet, food court/kuliner, kursi roda, gelang anak, mushola, mayang tirta, dan banyak spot foto menarik yang bisa anda temui.\r\n\r\nMemiliki slogan “Bukan Sekedar Rekreasi” karena anda bisa menikmati berbagai hal yang telah disebutkan diatas dalam satu tempat saja, dengan begitu anda bisa menjelajahi Gembira Loka Zoo dengan sangat lengkap dan puas.', '2023-11-22', 'Hiburan', 'https://gembiralokazoo.com/', 'GembiraLokaZoo.jpg', 27),
(7, 'Kawasan Kraton', 'Kraton Ngayogyakarta Hadiningrat merupakan istana resmi Kesultanan Ngayogyakarta Hadiningrat yang kini berlokasi di Kota Yogyakarta, Daerah Istimewa Yogyakarta. Keraton yogyakarta berada di pusat Daerah Istimewa Yogyakarta, Luas Kraton Yogyakarta adalah 14.000 meter persegi. Didalamnya terdapat banyak bangunan-bangunan yang digunakan sebagai tempat tinggal sultan dan keluarganya serta abdi dalem kraton. Di utara terdapat alun-alun utara dan di selatan terdapat alun-alun selatan serta sekitar 10 menit dari kawasan Malioboro.\r\n\r\nKraton Yogyakarta berdiri pada 1755 sebagai hasil dari Perjanjian Giyanti. Kraton Yogyakarta sebagai cikal bakal keberadaan pemukiman di wilayah Yogyakarta meninggalkan jejak-jejak sejarah yang masih dapat kita jumpai sampai saat ini. Kawasan ini merupakan living monument, yang masih hidup dan juga memiliki luas. Hal ini dubuktikan dengan ditetapkannya Kawasan kraton sebagai salah satu kawasan cagar budaya di Yogyakarta berdasar SK Gubernur No. 186/2011 meliputi wilayah dalam benteng Baluwarti (Njeron Benteng), dan sebagian wilayah di Mantrijeron, Mergangsan, Gondomanan, dan Ngampilan. Kemudian pada tahun 2017 terbit Peraturan Gubernur nomor 75/2017 yang menggabungkan kawasan cagar budaya Malioboro dan dalam benteng Kraton (Baluwarti) menjadi satu kawasan yaitu Kawasan Cagar Budaya Kraton, yang membujur dari Tugu sampai Panggung Krapyak.', '2023-11-22', 'Sejarah', NULL, 'KratonYogyakarta.jpg', 1),
(8, 'Sekaten', 'salah satu festival yang diadakan oleh masyarakat Jawa, khususnya di Yogyakarta dan Surakarta (Solo), Indonesia. Festival ini memiliki akar sejarah yang terkait dengan tradisi keagamaan Islam, tetapi seiring waktu, telah menggabungkan elemen-elemen budaya Jawa. Sekaten biasanya diadakan untuk memperingati Maulid Nabi Muhammad SAW (kelahiran Nabi Muhammad) dan dirayakan selama satu pekan. Puncak perayaan Sekaten adalah pada malam Jumat Kliwon, dan kegiatan ini diadakan di alun-alun keraton (istana) di Yogyakarta dan Surakarta.', '2023-11-28', 'Budaya', NULL, 'Sekaten.jpg', 1),
(9, 'Wayang Kulit', 'bentuk tradisional dari pertunjukan bayangan boneka yang populer di Indonesia, terutama di Jawa dan Bali. Istilah ini mencakup berbagai elemen, termasuk wayang kulit (boneka kulit), layar putih (kelir), dalang (puppeteer), musik gamelan, dan unsur-unsur budaya dan spiritual yang kaya.', '2023-11-28', 'Budaya', NULL, 'WayangKulit.jpg', 1),
(10, 'Kaliurang Highlands', 'sebuah resor pegunungan yang terletak di lereng selatan Gunung Merapi di Jawa Tengah, Indonesia. Tempat ini dikenal karena keindahan alamnya, iklim yang sejuk karena ketinggian, dan berbagai atraksi wisata. Berjarak sekitar 25 kilometer dari Yogyakarta, Kaliurang sering dijadikan tempat peristirahatan atau liburan bagi wisatawan lokal dan internasional.', '2023-11-28', 'Alam', NULL, 'KaliurangHighlands.jpg', 28),
(11, 'Museum Sonobudoyo', 'sebuah resor pegunungan yang terletak di lereng selatan Gunung Merapi di Jawa Tengah, Indonesia. Tempat ini dikenal karena keindahan alamnya, iklim yang sejuk karena ketinggian, dan berbagai atraksi wisata. Berjarak sekitar 25 kilometer dari Yogyakarta, Kaliurang sering dijadikan tempat peristirahatan atau liburan bagi wisatawan lokal dan internasional.', '2023-11-28', 'Sejarah', NULL, 'MuseumSonobudoyo.jpg', 1),
(12, 'Hutan Pinus Imogiri', 'Hutan Pinus Imogiri, terletak di wilayah Imogiri, Kabupaten Bantul, Yogyakarta, adalah destinasi alam yang menawan dengan pemandangan yang memikat. Pepohonan pinus yang tinggi dan teratur menciptakan panorama yang menakjubkan, memberikan pengunjung pengalaman yang menenangkan dan menyegarkan. Terletak di dataran tinggi, hutan ini menyajikan udara sejuk dan suasana alami yang ideal untuk rekreasi dan relaksasi.\r\n\r\nSelain sebagai tempat untuk menikmati keindahan alam, Hutan Pinus Imogiri juga menjadi daya tarik bagi para pecinta fotografi. Pohon-pohon pinus yang menjulang tinggi dan susunannya yang simetris menciptakan latar belakang yang menakjubkan untuk mengabadikan momen-momen berharga. Sejumlah spot fotografi di dalam hutan menawarkan berbagai sudut yang menarik, membuatnya menjadi tempat yang sering dicari oleh pengunjung yang ingin menghasilkan gambar yang indah.\r\n\r\nHutan Pinus Imogiri juga berperan sebagai destinasi rekreasi keluarga. Pengunjung dapat menikmati aktivitas berjalan-jalan di antara pepohonan pinus, berkumpul untuk piknik, atau sekadar menikmati ketenangan alam. Dengan keberadaan area terbuka, hutan ini memberikan kesempatan bagi pengunjung untuk bersantai sambil menikmati keindahan alam sekitar. Dengan daya tariknya yang serbaguna, Hutan Pinus Imogiri menjadi tempat yang populer bagi mereka yang mencari pelarian dari kehidupan sehari-hari dan ingin menyatu dengan kealamian.', '2023-11-28', 'Alam', NULL, 'HutanPinus.jpg', 1),
(13, 'Jalan Malioboro', 'Salah satu ikon kota Yogyakarta, Indonesia, yang terkenal karena keindahan dan keunikannya. Terletak di pusat kota, jalan ini menjadi pusat kegiatan ekonomi, budaya, dan pariwisata. Dikelilingi oleh bangunan-bangunan bersejarah, toko-toko tradisional, dan pedagang kaki lima, Malioboro memberikan pengalaman berbelanja yang unik dengan berbagai barang kerajinan tangan, pakaian, dan kuliner khas Yogyakarta.\r\n\r\nSelain sebagai pusat perbelanjaan, Jalan Malioboro juga menjadi tempat pertemuan bagi berbagai budaya dan tradisi. Setiap tahun, diadakan berbagai acara dan festival di sepanjang jalan ini, seperti Festival Malioboro, yang menampilkan seni dan budaya daerah. Kegiatan ini tidak hanya menarik wisatawan lokal tetapi juga turis internasional yang ingin merasakan kehangatan dan keindahan kehidupan kota Yogyakarta.\r\n\r\nTidak hanya sebagai destinasi wisata, Jalan Malioboro juga menyimpan nilai sejarah yang dalam. Beberapa bangunan bersejarah seperti Benteng Vredeburg dan Taman Pintar berada di sekitar jalan ini, mengingatkan kita pada perjuangan dan warisan budaya yang kaya di masa lalu. Keseluruhan atmosfer Jalan Malioboro menciptakan pengalaman yang tak terlupakan bagi setiap pengunjung yang datang, memperkaya pengetahuan mereka tentang sejarah dan kekayaan budaya Indonesia.', '2023-11-28', 'Hiburan', NULL, 'JalanMalioboro.jpg', 1),
(14, 'Taman Sari', 'sebuah kompleks istana yang terletak di Yogyakarta, Indonesia, yang dibangun pada abad ke-18 sebagai tempat rekreasi bagi keluarga kerajaan Mataram. Kompleks ini memiliki desain arsitektur yang unik, menggabungkan unsur-unsur gaya Jawa dengan pengaruh budaya Eropa. Taman Sari dikenal karena kolam renangnya yang indah dan taman yang luas, menciptakan atmosfer yang tenang dan damai.\r\n\r\nSalah satu fitur utama dari Taman Sari adalah kompleks permandian air yang disebut dengan Umbul Pasiraman. Kolam-kolam ini digunakan untuk berbagai kegiatan, termasuk mandi dan olahraga air. Selain itu, Taman Sari juga memiliki area yang disebut Sumur Gumuling, sebuah bangunan berbentuk bulat dengan tangga spiral yang mengarah ke bawah. Sumur Gumuling dianggap sebagai salah satu keajaiban arsitektur Jawa, dan di dalamnya terdapat ruang bawah tanah yang digunakan sebagai tempat pertemuan dan tempat penyimpanan air.\r\n\r\nMeskipun Taman Sari awalnya dibangun untuk kepentingan pribadi keluarga kerajaan, sekarang kompleks ini telah menjadi objek wisata yang populer bagi para pengunjung yang tertarik dengan sejarah dan keindahan arsitektur Jawa. Kunjungan ke Taman Sari memberikan kesempatan untuk menyelami kekayaan budaya Indonesia dan mengeksplorasi keelokan alam serta keindahan seni arsitektur tradisional yang masih terjaga dengan baik hingga hari ini.', '2023-11-28', 'Sejarah', NULL, 'TamanSari.jpg', 1),
(15, 'Monumen Jogja Kembali', 'Kompleks memorial yang terletak di Yogyakarta, Indonesia. Kompleks ini memiliki makam pahlawan nasional dan dianggap sebagai simbol perlawanan terhadap penjajahan Jepang dan Belanda pada masa lalu. Monjali juga dikenal sebagai Taman Makam Pahlawan Nasional Kusumanegara, mengambil nama dari seorang pahlawan nasional Indonesia, Kusuma Negara, yang dimakamkan di sana.\r\n\r\nSejarah Monjali terkait erat dengan peristiwa-peristiwa bersejarah pada masa kemerdekaan Indonesia. Pada masa penjajahan Jepang, Monjali digunakan sebagai tempat eksekusi dan pemakaman bagi para pahlawan yang tewas dalam perlawanan terhadap penjajahan. Setelah Indonesia meraih kemerdekaannya, Monjali dijadikan sebagai taman makam pahlawan nasional untuk menghormati mereka yang gugur demi kemerdekaan. Kompleks ini menjadi saksi bisu dari perjuangan berdarah para pahlawan yang berkontribusi dalam merebut dan mempertahankan kemerdekaan Indonesia.\r\n\r\nSelain sebagai situs bersejarah, Monjali juga menjadi tempat ziarah dan penghormatan bagi masyarakat yang ingin mengenang jasa para pahlawan. Monjali menampilkan nuansa spiritual dan nasionalistik, menjadikannya tidak hanya sebagai tempat pemakaman, tetapi juga sebagai simbol kebanggaan dan penghargaan terhadap perjuangan bangsa Indonesia dalam merebut kemerdekaan.', '2023-11-28', 'Sejarah', NULL, 'MonumenJogjaKembali.jpg', 1),
(16, 'Museum Affandi', 'Sebuah tempat seni yang terletak di Yogyakarta, Indonesia, yang didedikasikan untuk mengenang dan memamerkan karya seni dari Affandi, salah satu pelukis terkemuka Indonesia. Affandi dikenal karena gaya lukisnya yang ekspresif dan inovatif, serta kontribusinya yang besar terhadap seni rupa Indonesia. Museum ini tidak hanya berfungsi sebagai tempat pameran, tetapi juga sebagai rumah tempat tinggal pelukis dan keluarganya pada masanya.\r\n\r\nMuseum ini memiliki desain arsitektur yang unik dan mencolok, dengan cat warna yang mencolok seperti yang sering digunakan dalam karya-karya Affandi. Pengunjung dapat menjelajahi koleksi lukisan, sketsa, dan patung karya Affandi yang mencerminkan evolusi gaya seninya dari waktu ke waktu. Koleksi ini memberikan wawasan mendalam tentang perkembangan seni rupa Indonesia pada abad ke-20. Selain karya-karya Affandi, museum ini juga menampilkan karya seniman Indonesia lainnya sebagai bagian dari upaya melestarikan dan mempromosikan seni rupa lokal.\r\n\r\nMuseum Affandi bukan hanya destinasi bagi para seniman dan pecinta seni, tetapi juga merupakan warisan budaya yang penting bagi masyarakat Indonesia. Museum ini tidak hanya menyajikan karya seni yang indah, tetapi juga memberikan kesempatan bagi pengunjung untuk memahami konteks sejarah dan budaya yang membentuk karya-karya tersebut. Dengan demikian, Museum Affandi tidak hanya menjadi tempat bagi penggemar seni untuk menikmati keindahan karya Affandi, tetapi juga sebuah institusi yang berperan dalam melestarikan dan mempromosikan kekayaan seni rupa Indonesia.\r\n\r\n\r\n\r\n\r\n\r\n', '2023-11-28', 'Sejarah', NULL, 'MuseumAffandi.jpg', 1),
(17, 'Kampung Kasongan', 'Sebuah desa kecil yang terletak di Kabupaten Bantul, Yogyakarta, Indonesia. Desa ini terkenal karena menjadi pusat kerajinan tangan dan seni ukir kayu yang khas. Dengan suasana pedesaan yang tenang dan tradisional, Kampung Kasongan menjadi destinasi wisata yang menarik bagi para pengunjung yang ingin menikmati keindahan seni dan kerajinan lokal. Penduduk desa ini sebagian besar terlibat dalam industri kreatif, menghasilkan berbagai macam produk seperti patung, ukiran, dan perabotan rumah tangga dengan keahlian yang telah diwariskan dari generasi ke generasi.\r\n\r\nSalah satu daya tarik utama Kampung Kasongan adalah Galeri Seni Kasongan, tempat di mana para seniman setempat memamerkan karya-karya mereka. Pengunjung dapat melihat proses pembuatan produk seni secara langsung dan berinteraksi dengan para pengrajin untuk memahami lebih dalam tentang seni tradisional yang dijaga dengan penuh dedikasi di kampung ini. Selain itu, kampung ini juga menyediakan berbagai lokasi belanja yang menjual hasil kerajinan tangan, memungkinkan wisatawan untuk membawa pulang kenang-kenangan unik dan otentik dari Kampung Kasongan.\r\n\r\nSelain sebagai pusat seni dan kerajinan, Kampung Kasongan juga mempertahankan keaslian budaya Jawa. Pengunjung dapat merasakan kehidupan desa yang sederhana, melihat pemandangan sawah yang hijau, dan menjelajahi keindahan alam sekitar. Dengan keunikan dan daya tariknya, Kampung Kasongan menjadi destinasi yang menarik bagi mereka yang ingin merasakan pesona seni, kerajinan, dan kehidupan tradisional di Indonesia.', '2023-11-28', 'Budaya', NULL, 'KampungKasongan.jpg', 1),
(32, 'Jogja Bay Waterpark', 'Sebuah destinasi wisata yang terletak di Yogyakarta, Indonesia, dan merupakan taman air terbesar di Asia Tenggara. Dibuka pada tahun 2017, Jogja Bay menawarkan pengalaman liburan yang unik dan menyenangkan untuk keluarga, teman, maupun wisatawan solo. Taman air ini memadukan unsur budaya lokal dengan fasilitas modern, menciptakan suasana yang menghibur dan edukatif.\r\n\r\nSalah satu daya tarik utama Jogja Bay adalah tema airnya yang khas, mencakup kolam renang berukuran besar, permainan air interaktif, dan wahana menarik seperti water coaster. Selain itu, destinasi ini juga menghadirkan kekayaan budaya Jawa melalui pertunjukan seni, pameran seni rupa, dan kuliner khas daerah. Pengunjung dapat mengeksplorasi keindahan seni dan budaya lokal sambil menikmati serangkaian kegiatan air yang menyegarkan.\r\n\r\nSelain menjadi tempat rekreasi, Jogja Bay juga berkomitmen untuk mendukung pelestarian lingkungan dan pembangunan berkelanjutan. Taman air ini menyajikan konsep ramah lingkungan dengan penggunaan energi terbarukan, pengelolaan air yang efisien, dan program penanaman pohon. Dengan menggabungkan hiburan, budaya, dan keberlanjutan, Jogja Bay menjadi destinasi yang unik dan menarik bagi semua kalangan pengunjung.', '2023-11-28', 'Hiburan', 'https://en.tiket.com/to-do/attraction-jogjabay-waterpark', 'JogjaBayWaterpark.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hiddengem`
--

CREATE TABLE `hiddengem` (
  `IDGem` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `IDLokasi` int(11) NOT NULL,
  `Tautan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hiddengem`
--

INSERT INTO `hiddengem` (`IDGem`, `Judul`, `IDLokasi`, `Tautan`) VALUES
(1, 'Rumah Makan Warung Podjok', 28, 'https://goo.gl/maps/x4RmqecuMhwjpRqY9'),
(2, 'Bakmi Jowo Pak Alex', 24, 'https://maps.app.goo.gl/rco3gS6guRqdHvQt8'),
(3, 'Sate Kuda Cak Lokek', 26, 'https://maps.app.goo.gl/RMwwgankswVVnbDP9'),
(5, 'Warung Soto Resah', 27, 'https://maps.app.goo.gl/JXeAegY2brYdh8Uj9');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `IDLokasi` int(11) NOT NULL,
  `Nama_Jalan` varchar(255) NOT NULL,
  `Kode_Pos` int(11) NOT NULL,
  `Kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`IDLokasi`, `Nama_Jalan`, `Kode_Pos`, `Kota`) VALUES
(1, 'Jalan Padma Palagan', 55581, 'Kota_Yogyakarta'),
(2, 'Jalan Laksda Adisucipto km 8', 55282, 'Sleman'),
(3, 'Jl. Sisingamangaraja No. 74', 55153, 'Kota_Yogyakarta'),
(4, 'Jalan Laksda Adisucipto km 8.7', 55282, 'Kota_Yogyakarta'),
(5, 'Jl. Magelang Km. 6 No. 18', 55284, 'Kota_Yogyakarta '),
(6, 'Jalan Menukan No 5', 55153, 'Kota_Yogyakarta'),
(7, 'Jalan Palagan Tentara Pelajar', 55581, 'Kota_Yogyakarta'),
(8, 'JL. P. Mangkubumi No. 72 A', 55233, 'Kota_Yogyakarta'),
(9, 'Jalan Tugu Gentong', 55184, 'Bantul'),
(10, 'Jalan kenanga', 55584, 'Sleman'),
(11, 'Jl. Parangrejo No.13', 55872, 'Gunungkidul'),
(12, 'Jl. Ngadinegaran', 55143, 'Kota_Yogyakarta'),
(13, 'Jl. Pringgokusuman No.13', 55272, 'Kota_Yogyakarta'),
(14, 'Jalan Kapten Hariyadi', 55581, 'Sleman'),
(15, 'Jl. Kasongan', 55184, 'Bantul'),
(16, 'Jalan Sewon Indah', 55188, 'Bantul'),
(17, 'Jalan Tirtodipuran No.47', 55143, 'Kota_Yogyakarta'),
(18, 'Jalan Prawirotaman 1', 55153, 'Kota_Yogyakarta'),
(19, 'Jalan Letjen Suprapto No.17', 55261, 'Kota_Yogyakarta'),
(20, 'Jalan Mangunnegaran Kulon No.9', 55131, 'Kota_Yogyakarta'),
(21, 'Jalan Bibis', 55184, 'Bantul'),
(22, 'Jalan Ringroad Barat', 55291, 'Sleman'),
(23, 'Jl. Taman Prambanan Kulon', 55571, 'Sleman'),
(24, 'Jl. Raya Solo', 55571, 'Sleman'),
(25, 'Jl. Tlogo Putri', 55582, 'Sleman'),
(26, 'Wonosari St No.KM 10', 55792, 'Bantul'),
(27, 'Jl. Kebun Raya', 55171, 'Kota_Yogyakarta'),
(28, 'Jl. Kaliurang', 55582, 'Sleman');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `IDMitra` int(11) NOT NULL,
  `NamaMitra` varchar(255) DEFAULT NULL,
  `KontakMitra` varchar(100) DEFAULT NULL,
  `UsernameMitra` varchar(255) DEFAULT NULL,
  `EmailMitra` varchar(255) DEFAULT NULL,
  `PasswordMitra` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`IDMitra`, `NamaMitra`, `KontakMitra`, `UsernameMitra`, `EmailMitra`, `PasswordMitra`, `Status`) VALUES
(1, 'Satoria Yogyakarta', '081234567891', 'satoria', 'satoria@example.com', 'hashed_password_3', 'Approved'),
(2, 'Indah Palace', '081258362391', 'hotel_indah', 'hotel@example.com', 'hashed_password_4', 'Approved'),
(3, 'The Kharma Villas', '081223499287', 'TheKharma', 'TheKharma@gmail.com', 'passwordkhrm', 'Approved'),
(4, 'Sheraton Mustika Yogyakarta', '088123456789', 'sheraton', 'Sheraton@gmail.com', 'sheratonygy', 'Approved'),
(5, 'The Rich ', '085678912345', 'TheRich', 'Therichyk@gmail.com', 'TheRichtl', 'Approved'),
(6, 'Amaryllis Kaliurang', '082123456789', 'AmaryllisKaliurang', 'Amaryllis@gmail.com', 'Amaryllisklrng', 'Approved'),
(7, 'Kitta Jogja', '086123456789', 'KittaJogja', 'Kitta@gmail.com', 'Kittajgj', 'Pending'),
(8, 'Jogja Village', '089912345678', 'JogjaVillage', 'Jogjavllg@gmail.com', 'jgjvllge', 'Approved'),
(9, 'Grand Hyatt', '087987654321', 'GrandHyatt', 'GrandHyatt@gmail.com', 'Grndhyatt', 'Approved'),
(10, 'Tentrem Yogyakarta', '088987123456', 'TentremYK', 'Tentrem@gmail.com', 'tentremyk5', 'Approved'),
(11, 'Rajaklana', '089876512345', 'Rajaklanarsrt', 'Rajaklana@gmail.com', 'Rajaklanarst', 'Approved'),
(12, 'Bale Devata', '081239876548', 'BaleDevata', 'Baledevata@gmail.com', 'Baledvtaslmn', 'Approved'),
(13, 'Queen of The South', '0858967452311', 'QueenSouth', 'Queensouth@gmail.com', 'queenSth', 'Approved'),
(14, 'Pondok Joglo', '088132457589', 'PondokJoglo', 'Pondokjoglo@gmail.com', 'Pondokjgl', 'Approved'),
(15, 'Most Bali Malioboro', '089876543212', 'MostBaliMalioboro', 'Mostblimalbor@gmail.com', 'Mostblml', 'Approved'),
(16, 'Dipan Yogyakarta', '088811335524', 'DipanYK', 'Dipanyk@gmail.com', 'DipanYKygy', 'Approved'),
(17, 'Omah Teras Bata', '088192837465', 'OmahTerasBata', 'Omahterasbata@gmail.com', 'omahteras', 'Approved'),
(18, 'Rosseno', '085564372819', 'Rosseno', 'Rosseno@gmail.com', 'Rssenoyk', 'Approved'),
(19, 'Wonderloft Jogja', '081029384765', 'WonderloftJogja', 'Wonderjogja@gmail.com', 'wonderyk', 'Approved'),
(20, 'Otu by Ostic', '089911223344', 'OstubyOstic', 'Ostuostic@gmail.com', 'ostuostcyk', 'Approved'),
(21, 'Edu Jogja', '085640799544', 'EduJogja', 'Eduyk@gmail.com', 'eduuyk', 'Approved'),
(22, 'Snooze', '087453267812', 'Snooze', 'Snooze@gmail.com', 'Snoozeygy', 'Approved'),
(23, 'Blue Garden', '085799523167', 'BlueGarden', 'bluegarden@gmail.com', 'bluegrdn', 'Approved'),
(24, 'The Westlake ', '082341533792', 'TheWestlake', 'thewestlake@gmail.com', 'westlakebrt', 'Approved'),
(25, 'Hardy Febryan', '0895613479761', 'Hardy', '22523239@students.uii.ac.id', '$2y$10$lty7e7wj/9ZZgRQD4.kEcusAgv694MWyIvXrTZRGG8fBIWUloWNMC', 'Approved'),
(26, 'Noor Akhnafal Aban', '09823726362', 'Aban', '22523179@students.uii.ac.id', '123', 'Approved'),
(27, 'Muhammad Daffa Ramadhan', '1234567891236', 'Daffa', '22523024@students.uii.ac.id', '$2y$10$DCkICzV4Vgi19idFamACp.22ch5RQ6hMZRuCC5w6RFRITGWBXjtZ6', 'Pending'),
(28, 'Hiro Rajendra', '1234567891235', 'Hiro', '22523112@students.uii.ac.id', '$2y$10$F01q.S11BbU6jrPKY0Vubub485eJNuMBgA.1TADFymo/NheiRvmvq', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDAdmin`);

--
-- Indexes for table `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD PRIMARY KEY (`IDAkomodasi`),
  ADD KEY `akomodasi_lokasi_IDLokasi` (`IDLokasi`),
  ADD KEY `akomodasi_mitra_IDMitra` (`IDMitra`);

--
-- Indexes for table `atraksi`
--
ALTER TABLE `atraksi`
  ADD PRIMARY KEY (`IDAtraksi`),
  ADD KEY `atraksi_lokasi_IDLokasi` (`IDLokasi`);

--
-- Indexes for table `hiddengem`
--
ALTER TABLE `hiddengem`
  ADD PRIMARY KEY (`IDGem`),
  ADD KEY `hiddengem_lokasi_IDLokasi` (`IDLokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`IDLokasi`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`IDMitra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IDAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akomodasi`
--
ALTER TABLE `akomodasi`
  MODIFY `IDAkomodasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `atraksi`
--
ALTER TABLE `atraksi`
  MODIFY `IDAtraksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hiddengem`
--
ALTER TABLE `hiddengem`
  MODIFY `IDGem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `IDLokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `IDMitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD CONSTRAINT `akomodasi_lokasi_IDLokasi` FOREIGN KEY (`IDLokasi`) REFERENCES `lokasi` (`IDLokasi`),
  ADD CONSTRAINT `akomodasi_mitra_IDMitra` FOREIGN KEY (`IDMitra`) REFERENCES `mitra` (`IDMitra`);

--
-- Constraints for table `atraksi`
--
ALTER TABLE `atraksi`
  ADD CONSTRAINT `atraksi_lokasi_IDLokasi` FOREIGN KEY (`IDLokasi`) REFERENCES `lokasi` (`IDLokasi`);

--
-- Constraints for table `hiddengem`
--
ALTER TABLE `hiddengem`
  ADD CONSTRAINT `hiddengem_lokasi_IDLokasi` FOREIGN KEY (`IDLokasi`) REFERENCES `lokasi` (`IDLokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
