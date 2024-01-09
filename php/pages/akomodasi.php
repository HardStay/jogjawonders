<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akomodasi</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/pages/akomodasi.css">
</head>

<body>
    <?php
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = "SELECT Gambar, Nama FROM akomodasi";
    // $result = mysqli_query($conn, $sql);

    $kategori1 = $lokasi1 = "";

    $akomodasi_query = "SELECT Gambar, Nama, IDAkomodasi FROM akomodasi WHERE Kategori LIKE '%%'";
    $akomodasi = mysqli_query($conn, $akomodasi_query);

    $kategori_query = "SELECT Kategori FROM akomodasi GROUP BY Kategori";
    $kategori = mysqli_query($conn, $kategori_query);

    $lokasi_query = "SELECT IDLokasi, Kota FROM lokasi GROUP BY Kota";
    $lokasi = mysqli_query($conn, $lokasi_query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["kategori"])) {
            $kategori1 = test_input($_POST["kategori"]);
            $akomodasi_query = "SELECT Gambar, Nama, IDAkomodasi FROM akomodasi WHERE Kategori LIKE '%$kategori1%'";
        }
        if (!empty($_POST["lokasi"])) {
            $lokasi1 = test_input($_POST["lokasi"]);
            $akomodasi_query .= " AND IDLokasi IN (SELECT IDLokasi FROM lokasi WHERE Kota = '$lokasi1')";
        }
        $akomodasi = mysqli_query($conn, $akomodasi_query);
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (mysqli_num_rows($akomodasi) > 0) {
    ?>
        <div class="container">
            <?php include "../navbar.php"; ?>
            <div class="container-image col-12 col-s-12">
                <div class="image">
                    <h1>H O T E L</h1>
                </div>
            </div>
            <div class="filter">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <select name="lokasi" id="lokasi">
                            <option value="">Pilih Lokasi</option>
                            <?php
                            // menampilkan data lokasi di dropdown
                            while ($row = mysqli_fetch_assoc($lokasi)) :
                            ?>
                                <option value="<?= $row["Kota"] ?>"><?= $row["Kota"] ?></option>
                            <?php endwhile ?>
                        </select>
                        </td>
                    </div>
                    <div>
                        <select name="kategori" id="kategori">
                            <option value="">Jenis Akomodasi</option>
                            <?php
                            // menampilkan data lokasi di dropdown
                            while ($row = mysqli_fetch_assoc($kategori)) :
                            ?>
                                <option value="<?= $row["Kategori"] ?>"><?= $row["Kategori"] ?></option>
                            <?php endwhile ?>
                        </select>
                        </td>
                    </div>
                    <div>
                        <input type="submit" value="Terapkan" id="terapkan" name="submit">
                    </div>
                </form>
            </div>
            <div class="container-katalog col-12">
                <div class="katalog col-12">
                    <?php
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($akomodasi)) :
                    ?>
                        <div class="card col-12">
                            <img src="../../assets/images/akomodasi/<?= $row["Gambar"] ?>" alt="">
                            <div class="description">
                                <h2 class="description-judul"><?= $row["Nama"] ?></h2>
                                <a href="<?= "articleakomodasi.php?id=" . $row["IDAkomodasi"] ?>">Selengkapnya</a>
                            </div>
                        </div>
                    <?php endwhile ?>
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