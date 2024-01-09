<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candi Prambanan</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/pages/articleatraksi.css">
</head>

<body>
    <?php
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_atraksi = $_GET["id"];
    $sql = "SELECT atraksi.*, lokasi.Kode_Pos
            FROM atraksi
            INNER JOIN lokasi ON atraksi.IDLokasi = lokasi.IDLokasi
            WHERE atraksi.IDAtraksi = $id_atraksi";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
    ?>
            <div class="container">
                <?php include "../navbar.php"; ?>
                <div class="container-image col-12 col-s-12 col-x-12">
                    <div class="image col-12 col-s-12 col-x-12" style="background: url(' ../../assets/images/atraksi/<?= $data["Gambar"] ?>') no-repeat;background-size: cover;background-position: center;padding: 7rem;">
                    </div>
                </div>
                <div class="judul">
                    <h1><?= $data["Judul"] ?></h1>
                    <div class="kategori">
                        <p><?= $data["Kategori"] ?></p>
                    </div>
                </div>
                <div>
                    <div class="col-1">
                        <p>&nbsp;</p>
                    </div>
                    <div class="isi col-10">
                        <div>
                            <h2>Apa itu <?= $data["Judul"] ?>?</h2>
                            <p><?= $data["Isi"] ?></p>
                            <br>

                            <!-- <h2>Lokasi Candi Prambanan</h2>
                            <p>Candi Prambanan terletak di Desa Prambanan, Kecamatan Prambanan, Kabupaten Sleman, Provinsi Daerah Istimewa Yogyakarta. Kompleks candi ini dapat dicapai dengan kendaraan pribadi atau kendaraan umum.</p>
                            <p>Jika Anda menggunakan kendaraan pribadi, Anda dapat mengambil Jalan Raya Solo-Yogyakarta. Dari pusat kota Yogyakarta, kompleks candi ini berjarak sekitar 17 kilometer.</p>
                            <p>Jika Anda menggunakan kendaraan umum, Anda dapat naik bus TransJogja dari terminal Tirtonadi atau terminal Jombor. Turun di halte Candi Prambanan.</p> -->

                            <!-- <h2>Jam Operasional Candi Prambanan</h2>
                            <p>Candi Prambanan buka setiap hari dari pukul 06.00 hingga 17.00 WIB.</p>
                            <p>Harga tiket masuk Candi Prambanan adalah sebagai berikut:</p> -->
                        </div>
                        <div>
                            <p>Tanggal publikasi : <?= $data["TanggalPublikasi"] ?></p>
                        </div>
                        <div>
                            <img src="../../assets/images/atraksi/<?= $data["Gambar"] ?>" alt="<?= $data["Gambar"] ?>" id="imagedesc">
                        </div>
                        <?php
                        $idlokasi = $data["IDLokasi"];
                        $kodepos = $data["Kode_Pos"];
                        $sql = "SELECT * 
                            FROM hiddengem 
                            INNER JOIN lokasi ON hiddengem.IDLokasi = lokasi.IDLokasi
                            WHERE lokasi.Kode_Pos = $kodepos";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($datas = mysqli_fetch_array($result)) {
                        ?>
                                <div class="hiddengem">
                                    <h3>Ada Hidden Gem dekat tempat ini lohh !!!</h3>
                                    <div class="listhidden">
                                        <a href="<?= $datas["Tautan"] ?>">
                                            <?= $datas["Judul"] ?>
                                        </a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>


                        <div class="card col-12">
                            <div class="tiket">
                                <p>Nikmati liburan yang tak terlupakan ke Yogyakarta. Liburan Anda akan dijamin menyenangkan dan berkesan!</p>
                                <br>
                                <a href="<?= $data["Tautan"] ?>">Beli Tiket</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <p></p>
                    </div>
                    </main>
                </div>
            </div>
            </div>
    <?php
        }
    } else {
        echo "0 results";
    }

    // mysqli_close($conn);
    ?>
    <script src="../../js/navbar.js" async></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>