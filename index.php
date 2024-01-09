<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jogja Wonders</title>
  <link rel="stylesheet" href="css/index.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container col-12">
    <div class="header col-12">
      <div class="gambarlogo col-1 col-s-2">
        <a href="index.php"><img src="assets/images/logo/jogjawonderswhite.png" alt="gambar logo" /></a>
      </div>
      <div class="links1 col-6 col-s-12">
        <button class="navbar col-s-12">Atraksi</button>
        <button class="navbar2 navbar col-s-12"><a href="php/pages/akomodasi.php">Akomodasi</a></button>
        <button class="navbar col-s-12"><a href="https://drive.google.com/file/d/1xetGLfhVgFizcOqJ43_SF9Nl0AXw_4L7/view">Panduan</a></button>
      </div>
      <div class="links2 col-4 col-s-8">
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
        ?>
          <div class="tombolLogin col-8 col-s-8" onclick="toggleMenu()">
            <p id="login">Welcome, <?= $_SESSION["user"] ?></p>
          </div>
        <?php
        } else if (isset($_SESSION["admin"])) {
        ?>
          <div class="tombolLogin col-8 col-s-8" onclick="toggleMenu()">
            <p id="login">Welcome, <?= $_SESSION["admin"] ?></p>
          </div>
        <?php
        } else {
        ?>
          <div class="tombolLogin col-8 col-s-8">
            <a href="php/pages/login.php" id="login">Jadi Partner</a>
          </div>
        <?php } ?>
        <div class="gambarlink col-2 col-s-1">
          <a href=""><img src="assets/icons/new-Instagram-logo-white-glyph.png" alt="gambar instagram" id="gambarinstagram" /></a>
          <a href=""><img src="assets/icons/tiktok.png" alt="g
          ambar tiktok" id="gambartiktok" /></a>
        </div>
      </div>
      <div id="google_translate_element_position" class="hidden-sm hidden-xs">
        <div id="google_translate_element"></div>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <?php if (isset($_SESSION["user"])) { ?>
            <a href="php/pages-mitra/mitra_dashboard.php" class="sub-menu-link">
              <i class="fa-solid fa-chart-line"></i>
              <p>Dashboard</p>
              <span>
                <svg viewBox="0 0 19 20" height="20" width="19" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px">
                  <title>down</title>
                  <path fill="currentColor" d="M3.8,6.7l5.7,5.7l5.7-5.7l1.6,1.6l-7.3,7.2L2.2,8.3L3.8,6.7z"></path>
                </svg>
              </span>
            </a>
          <?php } else if (isset($_SESSION["admin"])) { ?>
            <a href="php/pages-admin/admin_dashboard.php" class="sub-menu-link">
              <i class="fa-solid fa-chart-line"></i>
              <p>Dashboard</p>
              <span>
                <svg viewBox="0 0 19 20" height="20" width="19" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px">
                  <title>down</title>
                  <path fill="currentColor" d="M3.8,6.7l5.7,5.7l5.7-5.7l1.6,1.6l-7.3,7.2L2.2,8.3L3.8,6.7z"></path>
                </svg>
              </span>
            </a>
          <?php } ?>
          <a href="php/pages/logout.php" class="sub-menu-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Logout</p>
            <span>
              <svg viewBox="0 0 19 20" height="20" width="19" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px">
                <title>down</title>
                <path fill="currentColor" d="M3.8,6.7l5.7,5.7l5.7-5.7l1.6,1.6l-7.3,7.2L2.2,8.3L3.8,6.7z"></path>
              </svg>
            </span>
          </a>
        </div>
      </div>
      <div id="menu-btn" class="fas fa-bars col-1 col-s-2"></div>
    </div>
    <div class="overlay">
      <div class="box">
        <a href="php/pages/atraksi.php?Kategori=Alam">Alam</a>
        <a href="php/pages/atraksi.php?Kategori=Sejarah">Sejarah</a>
        <a href="php/pages/atraksi.php?Kategori=Budaya">Budaya</a>
        <a href="php/pages/atraksi.php?Kategori=Hiburan">Hiburan</a>
      </div>
    </div>
    <div class="main">
      <div class="hero">
        <div id="slide">
          <div class="item" style="background-image: url(assets/images/jogja1.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Menyelami Keberagaman Dalam Satu Destinasi Yang Istimewa
              </div>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/keraton.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Kota Budaya, Sejarah, dan Alam
              </div>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/malioboro.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Kota Malioboro dan Gudeg
              </div>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/jogja4.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Kota Damai dan Harmoni
              </div>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/jogja6.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Kota Cinta dan Toleransi
              </div>
            </div>
          </div>
          <div class="item" style="background-image: url(assets/images/batik.jpg)">
            <div class="content col-6 col-s-6">
              <div class="name">YOGYAKARTA</div>
              <div class="des">
                Kota Seni dan Budaya
              </div>
            </div>
          </div>
        </div>
        <div class="buttons">
          <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
          <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
      </div>
      <div class="hero2">
        <img src="assets/images/backgroundhero2.png" alt="gambar" id="backgroundhero2" />
        <div class="contenthero2">
          <h1>GIMANA SIH SEJARAH YOGYAKARTA?</h1>
          <div class="isihero2">
            <div class="gambarhero2">
              <img src="assets/images/gambarhero3.jpg " alt="gambar" id="gambarisihero2" />
            </div>
            <p id="textisihero2">
              Nama Yogyakarta terambil dari dua kata, yaitu Ayogya atau
              Ayodhya yang berarti "kedamaian" (atau tanpa perang, a "tidak",
              yogya merujuk pada yodya atau yudha, yang berarti "perang"), dan
              Karta yang berarti "baik".
              <br>
              <br>
              Berdirinya Kota Yogyakarta berawal dari adanya Perjanjian Gianti
              pada Tanggal 13 Februari 1755 yang ditandatangani Kompeni Belanda
              di bawah tanda tangan Gubernur Nicholas Hartingh atas nama Gubernur
              Jendral Jacob Mossel.
              <br>
              <br>
              Adapun daerah-daerah yang menjadi kekuasaannya adalah Mataram (Yogyakarta), Pojong,
              Sukowati, Bagelen, Kedu, Bumigede dan ditambah daerah mancanegara yaitu; Madiun, Magetan,
              Cirebon, Separuh Pacitan, Kartosuro, Kalangbret, Tulungagung, Mojokerto, Bojonegoro, Ngawen,
              Sela, Kuwu, Wonosari, Grobogan.
            </p>
          </div>
          <p>
            <b>Kota Yogyakarta</b> (Jawa: ꦔꦪꦺꦴꦒꦾꦏꦂꦠ, translit. Ngayogyakarta,
            pengucapan bahasa Jawa: [kuʈɔ ŋajogjɔ'kart̪ɔ], atau dikenal oleh
            masyarakat setempat dengan sebutan nama Yogya atau Jogja) adalah
            ibu kota daerah istimewa sekaligus pusat pemerintahan dan
            perekonomian dari Daerah Istimewa Yogyakarta, Indonesia. Kota ini
            adalah kota besar yang mempertahankan konsep tradisional dan
            budaya Jawa.
            <br>
            Menurut Undang - Undang Nomor 22 Tahun 1948, <b>Kepala dan Wakil Kepala Daerah Istimewa diangkat
              oleh Presiden dari keturunan keluarga yang berkuasa di daerah itu </b>,
            pada zaman sebelum Republik Indonesia, dan yang masih menguasai daerahnya;
            dengan syarat-syarat kecakapan, kejujuran, dan kesetiaan, dan dengan mengingat
            adat istiadat di daerah itu
          </p>
        </div>
      </div>
    </div>
    <div class="footer col-12">
      <p id="judulfooter">Tentang Kami</p>
      <div class="gambarfooter col-4">
        <img src="assets/images/logo/enigma1.png" alt="gambarfooter" id="enigma1" />
        <!-- <img src="assets/images/Logo/enigma2.png" alt="gambarfooter" id="enigma2" /> -->
      </div>
      <div class="desctengah col-4">
        <p>Enigma</p>
        <br>
        <p>Noor Akhnafal Aban (22523179)</p>
        <p>Hardy Febryan (22523239)</p>
        <p>Muhammad Daffa Ramadhan (22523024)</p>
        <p>Hiro Rajendra M (22523112)</p>
      </div>
      <div class="desckanan col-4">
        <p>Kontak : admin@enigma.com</p>
        <p>Instagram : @enigma
      </div>

    </div>
  </div>
  <script src="js/index.js" async></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>