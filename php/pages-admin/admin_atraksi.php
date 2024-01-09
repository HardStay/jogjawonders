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

    <link rel="stylesheet" href="../../css/pages-admin/admin_atraksi.css">
</head>

<body>
    <?php
    session_start();
    include "../connect.php";
    // Check if the "Kategori" parameter is set in the URL
    $kategori = isset($_GET["Kategori"]) ? $_GET["Kategori"] : "";
    if ($kategori == "Alam") {
        $sql = "SELECT Gambar, Judul, IDAtraksi FROM atraksi WHERE Kategori = 'Alam'";
    } else if ($kategori == "Sejarah") {
        $sql = "SELECT Gambar, Judul, IDAtraksi FROM atraksi WHERE Kategori = 'Sejarah'";
    } else if ($kategori == "Budaya") {
        $sql = "SELECT Gambar, Judul, IDAtraksi FROM atraksi WHERE Kategori = 'Budaya'";
    } else if ($kategori == "Hiburan") {
        $sql = "SELECT Gambar, Judul, IDAtraksi FROM atraksi WHERE Kategori = 'Hiburan'";
    } else {
        $sql = "SELECT Gambar, Judul, IDAtraksi FROM atraksi";
    }
    $result = mysqli_query($conn, $sql);
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
                <div class="add-atraksi">
                    <a href="config/admin_addatraksi.php">Add</a>
                </div>
                <div class="nav-katalog col-12">
                    <div class="alam">
                        <a href="admin_atraksi.php?Kategori=Alam">Alam</a>
                    </div>
                    <div class="hiburan">
                        <a href="admin_atraksi.php?Kategori=Hiburan">Hiburan</a>
                    </div>
                    <div class="sejarah">
                        <a href="admin_atraksi.php?Kategori=Sejarah">Sejarah</a>
                    </div>
                    <div class="budaya">
                        <a href="admin_atraksi.php?Kategori=Budaya">Budaya</a>
                    </div>
                </div>

                <!-- LOAD ARTIKEL -->
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div class="katalog col-12">
                        <?php
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) :
                        ?>
                            <div class="card col-12">
                                <div class="img-card">
                                    <img src="../../assets/images/atraksi/<?= $row["Gambar"] ?>" alt="">
                                </div>
                                <div class="description">
                                    <h2 class="description-judul">
                                        <?= $row["Judul"] ?>
                                    </h2>
                                    <div class="tools">
                                        <a href="<?= "config/admin_editatraksi.php?id=" . $row["IDAtraksi"] ?>">Edit</a>
                                        <a href="<?= "config/admin_deleteatraksi.php?id=" . $row["IDAtraksi"] ?>" id="delete">Delete</a>
                                    </div>

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
        </div>
    </div>
    </div>
</body>

</html>