<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
<div class="header col-12">
    <div class="gambarlogo col-1 col-s-2">
        <a href="../../index.php"><img src="../../assets/images/logo/jogjawondersblack.png" alt="gambar logo" /></a>
    </div>
    <div class="links1 col-6 col-s-12">
        <button class="navbar navbar1 col-s-12">Atraksi</button>
        <button class="navbar navbar2 col-s-12"><a href="akomodasi.php">Akomodasi</a></button>
        <button class="navbar navbar3 col-s-12"><a href="https://drive.google.com/file/d/1xetGLfhVgFizcOqJ43_SF9Nl0AXw_4L7/view">Panduan</a></button>
    </div>
    <div class=" links2 col-4 col-s-8">
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
                <a href="login.php" id="login">Jadi Partner</a>
            </div>
        <?php } ?>
        <div class="gambarlink col-2 col-s-1">
            <a href=""><img src="../../assets/icons/instagramblack.png" alt="gambar instagram" id="gambarinstagram" /></a>
            <a href=""><img src="../../assets/icons/tiktokblack.png" alt="gambar tiktok" id="gambartiktok" /></a>
        </div>
        <!-- <div class="languange col-2 col-s-2">
            <select name="bahasa" id="bahasa">
                <option value="indonesia">ID</option>
                <option value="english">EN</option>
            </select>
        </div> -->
    </div>
    <div id="google_translate_element_position" class="hidden-sm hidden-xs">
        <div id="google_translate_element"></div>
    </div>
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <?php if (isset($_SESSION["user"])) { ?>
                <a href="../pages-mitra/mitra_dashboard.php" class="sub-menu-link">
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
                <a href="../pages-admin/admin_dashboard.php" class="sub-menu-link">
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
            <a href="logout.php" class="sub-menu-link">
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
        <a href="atraksi.php?Kategori=Alam">Alam</a>
        <a href="atraksi.php?Kategori=Sejarah">Sejarah</a>
        <a href="atraksi.php?Kategori=Budaya">Budaya</a>
        <a href="atraksi.php?Kategori=Hiburan">Hiburan</a>
    </div>
</div>
<!-- <script src="../js/navbar.js"></script> -->