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

    <link rel="stylesheet" href="../../css/pages-admin/admin_dashboard.css">
</head>

<body>
    <?php
    session_start();
    include "../connect.php";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $approved_mitra = "SELECT IDMitra, NamaMitra, KontakMitra, UsernameMitra, EmailMitra, PasswordMitra FROM mitra WHERE Status='Approved'";
    $pending_mitra = "SELECT IDMitra, NamaMitra, KontakMitra, UsernameMitra, EmailMitra, PasswordMitra FROM mitra WHERE Status!='Approved'";
    $approved = mysqli_query($conn, $approved_mitra);
    $pending = mysqli_query($conn, $pending_mitra);
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
                <div class="mitra-list col-12">
                    <div class="title1 col-12">
                        <h4>Daftar Mitra</h4>
                    </div>
                    <table class="table-mitra-validated">
                        <tr>
                            <th class="IDMitra">ID</th>
                            <th class="NamaMitra">Nama</th>
                            <th class="KontakMitra">Kontak</th>
                            <th class="UsernameMitra">Username</th>
                            <th class="EmailMitra">Email</th>
                            <th class="PasswordMitra">Password</th>
                            <th></th>
                        <tr>
                            <?php
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($approved)) :
                            ?>
                        <tr>
                            <td class="IDMitra">
                                <?= $row["IDMitra"] ?>
                            </td>
                            <td class="NamaMitra">
                                <?= $row["NamaMitra"] ?>
                            </td>
                            <td class="KontakMitra">
                                <?= $row["KontakMitra"] ?>
                            </td>
                            <td class="UsernameMitra">
                                <?= $row["UsernameMitra"] ?>
                            </td>
                            <td class="EmailMitra">
                                <?= $row["EmailMitra"] ?>
                            </td>
                            <td class="PasswordMitra">
                                <?= $row["PasswordMitra"] ?>
                            </td>
                            <td class="mitra-config">
                                <a class="x" href="<?= 'config/mitra_delete.php?IDMitra=' . $row['IDMitra'] ?>"><i class='bx bxs-message-square-x'></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                    </table>
                </div>
                <div class="pending">
                    <div class="title2 col-12">
                        <h4>Pengajuan mitra</h4>
                    </div>
                    <table class="table-mitra-pending">
                        <tr>
                            <th class="IDMitra">ID</th>
                            <th class="NamaMitra">Nama</th>
                            <th class="KontakMitra">Kontak</th>
                            <th class="UsernameMitra">Username</th>
                            <th class="EmailMitra">Email</th>
                            <th class="PasswordMitra">Password</th>
                            <th></th>
                        <tr>
                            <?php
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($pending)) :
                            ?>
                        <tr>
                            <td class="IDMitra">
                                <?= $row["IDMitra"] ?>
                            </td>
                            <td class="NamaMitra">
                                <?= $row["NamaMitra"] ?>
                            </td>
                            <td class="KontakMitra">
                                <?= $row["KontakMitra"] ?>
                            </td>
                            <td class="UsernameMitra">
                                <?= $row["UsernameMitra"] ?>
                            </td>
                            <td class="EmailMitra">
                                <?= $row["EmailMitra"] ?>
                            </td>
                            <td class="PasswordMitra">
                                <?= $row["PasswordMitra"] ?>
                            </td>
                            <td class="mitra-config">
                                <a class="check" href="config/mitra_approved.php?IDMitra=<?= $row['IDMitra'] ?>"><i class='bx bxs-message-square-check'></i></a><br>
                                <a class="x" href="config/mitra_delete.php?IDMitra=<?= $row['IDMitra'] ?>"><i class='bx bxs-message-square-x'></i></a>
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