<!DOCTYPE html>
<html lang="en">
<?php
include "../connect.php";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_GET["Kategori"] == "Alam") {
    $sql = "SELECT atraksi.*, lokasi.Kode_Pos
    FROM atraksi
    INNER JOIN lokasi ON atraksi.IDLokasi = lokasi.IDLokasi
    WHERE atraksi.Kategori = 'Alam'";
} else if ($_GET["Kategori"] == "Sejarah") {
    $sql = "SELECT atraksi.*, lokasi.Kode_Pos
    FROM atraksi
    INNER JOIN lokasi ON atraksi.IDLokasi = lokasi.IDLokasi
    WHERE atraksi.Kategori = 'Sejarah'";
} else if ($_GET["Kategori"] == "Budaya") {
    $sql = "SELECT atraksi.*, lokasi.Kode_Pos
    FROM atraksi
    INNER JOIN lokasi ON atraksi.IDLokasi = lokasi.IDLokasi
    WHERE atraksi.Kategori = 'Budaya'";
} else if ($_GET["Kategori"] == "Hiburan") {
    $sql = "SELECT atraksi.*, lokasi.Kode_Pos
    FROM atraksi
    INNER JOIN lokasi ON atraksi.IDLokasi = lokasi.IDLokasi
    WHERE atraksi.Kategori = 'Hiburan'";
}
$result = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET["Kategori"] ?></title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/pages/atraksi.css">
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="container">
            <?php include "../navbar.php"; ?>
            <div class="container-image col-12 col-s-12">
                <div class="image">
                    <h1>Nikmati Wisata Alam</h1>
                </div>
            </div>
            <div class="container-katalog col-12">
                <div class="katalog col-12">
                    <?php
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <div class="card col-12">
                            <img src="../../assets/images/atraksi/<?= $row["Gambar"] ?>" alt="gambar">
                            <div class="description">
                                <h2 class="description-judul"><?= $row["Judul"] ?></h2>
                                <?php
                                $id_atraksi = $row["IDAtraksi"];
                                $kodepos = $row["Kode_Pos"];
                                $sqls = "SELECT * 
                                        FROM hiddengem 
                                        INNER JOIN lokasi ON hiddengem.IDLokasi = lokasi.IDLokasi
                                        WHERE lokasi.Kode_Pos = $kodepos";
                                $results = mysqli_query($conn, $sqls);
                                $count = mysqli_num_rows($results) > 0 ? "Ada " . mysqli_num_rows($results) . " Hidden Gem Disini" : "";
                                ?>
                                <span id="counter"><?= $count ?></span>
                                <a href="<?= "articleatraksi.php?id=" . $row["IDAtraksi"] ?>">Selengkapnya</a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
    <script src="../../js/navbar.js" async></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>