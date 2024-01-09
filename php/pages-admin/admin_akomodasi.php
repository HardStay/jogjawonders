<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Font stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../css/pages-admin/admin_akomodasi.css">
</head>

<body>
    <?php
    session_start();
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $status1 = $id_mitra = $kategori1 = $lokasi1 = "";

    // Query mitra


    $akomodasi_query = "SELECT * FROM akomodasi WHERE Status LIKE '%%'";
    $akomodasi = mysqli_query($conn, $akomodasi_query);


    $mitra = "SELECT IDMitra, NamaMitra FROM mitra WHERE Status ='Approved'";
    $mitra_ID_Nama = mysqli_query($conn, $mitra);

    $status_query = "SELECT Status FROM akomodasi GROUP BY Status";
    $status = mysqli_query($conn, $status_query);

    $kategori_query = "SELECT Kategori FROM akomodasi GROUP BY Kategori";
    $kategori = mysqli_query($conn, $kategori_query);

    $lokasi_query = "SELECT IDLokasi, Kota FROM lokasi GROUP BY Kota";
    $lokasi = mysqli_query($conn, $lokasi_query);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["status"])) {
            $status1 = test_input($_POST["status"]);
            $akomodasi_query = "SELECT * FROM akomodasi WHERE Status LIKE '%$status1%'";
        }
        if (!empty($_POST["mitra"]) or $_POST["mitra"] == 0) {
            $id_mitra = test_input($_POST["mitra"]);
            $akomodasi_query .= " AND IDMitra = '$id_mitra'";
        }
        if (!empty($_POST["kategori"])) {
            $kategori1 = test_input($_POST["kategori"]);
            $akomodasi_query .= " AND Kategori = '$kategori1'";
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

    ?>

    <div class="container">
        <div class="nav col-2">
            <div class="nav-header">
                <a href="../../index.php">
                    <div class="a-logo">
                        <img src="../../assets/images/logo/jogjawonderswhite.png" alt="gambar logo" />
                        <?php if (isset($_SESSION["admin"])) { ?>
                            <h4><?= $_SESSION["admin"] ?></h4>
                        <?php } ?>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bxs-dashboard'></i>
                <a href="admin_dashboard.php">
                    <div class="a">
                        <h5>Dashboard</h5>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bx-book-open'></i>
                <a href="admin_atraksi.php">
                    <div class="a">
                        <h5>Atraksi</h5>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bxs-hotel'></i>
                <a href="admin_akomodasi.php">
                    <div class="a">
                        <h5>Akomodasi</h5>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bxs-diamond'></i>
                <a href="admin_hiddengem.php">
                    <div class="a">
                        <h5>Hidden Gem</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="dashboard col-10">
            <div class="dashboard-content col-12">
                <div class="col-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="form1" method="post" class="filter-orderby">
                        <select name="mitra" id="mitraSelect">
                            <option value="">Mitra</option>
                            <?php
                            // menampilkan data mitra di dropdown
                            while ($row = mysqli_fetch_assoc($mitra_ID_Nama)) :
                            ?>
                                <option value="<?= $row["IDMitra"] ?>">
                                    <?= $row["IDMitra"] ?> -
                                    <?= $row["NamaMitra"] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                        <select name="lokasi" id="lokasiSelect">
                            <option value="">Lokasi</option>
                            <?php
                            // menampilkan data lokasi di dropdown
                            while ($row = mysqli_fetch_assoc($lokasi)) :
                            ?>
                                <option value="<?= $row["Kota"] ?>"><?= $row["Kota"] ?></option>
                            <?php endwhile ?>
                        </select>
                        <select name="status" id="statusSelect">
                            <option value="">Status</option>
                            <?php
                            // menampilkan data lokasi di dropdown
                            while ($row = mysqli_fetch_assoc($status)) :
                            ?>
                                <option value="<?= $row["Status"] ?>"><?= $row["Status"] ?></option>
                            <?php endwhile ?>
                        </select>
                        <select name="kategori" id="kategoriSelect">
                            <option value="">Kategori</option>
                            <?php
                            // menampilkan data lokasi di dropdown
                            while ($row = mysqli_fetch_assoc($kategori)) :
                            ?>
                                <option value="<?= $row["Kategori"] ?>"><?= $row["Kategori"] ?></option>
                            <?php endwhile ?>
                        </select>
                        <input type="submit" value="Terapkan" id="submit" name="submit">
                    </form>
                </div>
                <div class="list-akomodasi">
                    <?php
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($akomodasi)) :
                    ?>
                        <div class="card col-12">
                            <div class="img-card">
                                <img src="../../assets/images/akomodasi/<?= $row["Gambar"] ?>" alt="">
                            </div>
                            <div class="description">
                                <h2 class="Nama-akomodasi">
                                    <?= $row["Nama"] ?>
                                </h2>
                                <div class="tools">
                                    <a href="<?= "config/admin_editakomodasi.php?id=" . $row["IDAkomodasi"] ?>">Edit</a>
                                    <a href="<?= "config/admin_deleteakomodasi.php?id=" . $row["IDAkomodasi"] ?>" id="delete">Delete</a>
                                </div>

                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>