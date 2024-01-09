<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rich Hotel</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/pages/articleakomodasi.css">
</head>

<body>
    <?php
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_akomodasi = $_GET["id"];
    $sql = "SELECT * FROM akomodasi WHERE IDAkomodasi = '$id_akomodasi'";
    $result = mysqli_query($conn, $sql);

    // $sql = "SELECT Gambar, Judul FROM atraksi";
    // $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
    ?>
            <div class="container">
                <?php include "../navbar.php"; ?>
                <div class="container-image col-12 col-s-12 col-x-12">
                    <div class="image col-12 col-s-12 col-x-12" style="background: url('../../assets/images/akomodasi/<?= $data["Gambar"] ?>') no-repeat;background-size: cover;background-position: center;padding: 7rem;">
                    </div>
                </div>
                <div class="judul">
                    <h1><?= $data["Nama"] ?></h1>
                </div>
                <div>
                    <div class="col-1">
                        <p>&nbsp;</p>
                    </div>
                    <div class="desc col-10">
                        <div>
                            <h2>Tentang <?= $data["Nama"] ?></h2>
                            <p><?= $data["Deskripsi"] ?></p>

                            <?php
                            $id_lokasi = $data["IDLokasi"];
                            $sqls = "SELECT Nama_Jalan FROM lokasi WHERE IDLokasi = '$id_lokasi'";
                            $results = mysqli_query($conn, $sqls);
                            if (mysqli_num_rows($results) > 0) {
                                while ($datas = mysqli_fetch_array($results)) {
                            ?>

                                    <div class="lokasi">
                                        <h2>Lokasi <?= $data["Nama"] ?></h2>
                                        <p><?= $data["Nama"] ?> beralamat di <?= $datas["Nama_Jalan"] ?></p>
                                    </div>

                            <?php
                                }
                            }
                            ?>

                            <div class="fasilitas">
                                <h2>Fasilitas</h2>
                                <p><?= $data["Fasilitas"] ?></p>
                                <p>Harga kamar di sini dibanderol dengan nominal <?= $data["Rentang_Harga"] ?> per malam</p>
                            </div>

                            <div class="gambar">
                                <img src="../../assets/images/akomodasi/<?= $data["Gambar"] ?>" alt="<?= $data["Gambar"] ?>" id="imagedesc" height="700">
                            </div>
                            <div class="card col-12">
                                <div class="tiket">
                                    <p>Nikmati liburan yang tak terlupakan ke Yogyakarta. Liburan Anda akan dijamin menyenangkan dan berkesan!</p>
                                    <br>
                                    <a href="<?= $data["Tautan"] ?>">Pesan Kamar</a>
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