<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MITRA</title>

    <!-- Font stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../css/pages-mitra/mitra_dashboard.css">
</head>

<body>
    <?php
    session_start();
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $user_id = $_SESSION["user_id"];
    $approved_akomodasi = "SELECT Nama, Kategori, Status FROM akomodasi WHERE Status='Approved' AND IDMitra = $user_id";
    $pending_akomodasi = "SELECT Nama, Kategori, Status FROM akomodasi WHERE Status!='Approved' AND IDMitra = $user_id";
    $approved = mysqli_query($conn, $approved_akomodasi);
    $pending = mysqli_query($conn, $pending_akomodasi);

    ?>

    <div class="container">
        <div class="nav col-2">
            <div class="nav-header">
                <a href="../../index.php">
                    <div class="a-logo">
                        <img src="../../assets/images/logo/jogjawonderswhite.png" alt="gambar logo" />
                        <?php if (isset($_SESSION["user"])) { ?>
                            <h4><?= $_SESSION["user"] ?></h4>
                        <?php } ?>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bxs-dashboard'></i>
                <a href="mitra_dashboard.php">
                    <div class="a">
                        <h5>Dashboard</h5>
                    </div>
                </a>
            </div>
            <div class="menu">
                <i class='bx bxs-hotel'></i>
                <a href="mitra_akomodasi.php">
                    <div class="a">
                        <h5>Akomodasi</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="dashboard col-10">
            <div class="dashboard-content col-12">
                <div class="pending">
                    <div class="title2 col-12">
                        <h4>Pengajuan Akomodasi</h4>
                    </div>
                    <table class="table-mitra-pending">
                        <tr>
                            <th class="NamaAkomodasi">Nama Akomodasi</th>
                            <th class="Kategori">Kategori</th>
                            <th class="Status">Status</th>
                        <tr>
                            <?php
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($pending)) :
                            ?>
                        <tr>
                            <td class="NamaAkomodasi">
                                <?= $row["Nama"] ?>
                            </td>
                            <td class="Kategori">
                                <?= $row["Kategori"] ?>
                            </td>
                            <td class="Status">
                                <?= $row["Status"] ?>
                            </td>
                        </tr>
                    <?php endwhile ?>
                    </table>
                </div>
                <div class="mitra-list col-12">
                    <div class="title1 col-12">
                        <h4>Daftar Akomodasi</h4>
                    </div>
                    <table class="table-mitra-validated">
                        <tr>
                            <th class="NamaAkomodasi">Nama Akomodasi</th>
                            <th class="Kategori">Kategori</th>
                            <th class="Status">Status</th>
                        <tr>
                            <?php
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($approved)) :
                            ?>
                        <tr>
                            <td class="NamaAkomodasi">
                                <?= $row["Nama"] ?>
                            </td>
                            <td class="Kategori">
                                <?= $row["Kategori"] ?>
                            </td>
                            <td class="Status">
                                <?= $row["Status"] ?>
                            </td>
                        </tr>
                    <?php endwhile ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script>
    </script>
</body>

</html>