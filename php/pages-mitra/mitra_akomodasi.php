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

    <link rel="stylesheet" href="../../css/pages-mitra/mitra_akomodasi.css">
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
    $akomodasi_query = "SELECT * FROM akomodasi WHERE Status LIKE '%%' AND IDMitra = $user_id";
    $akomodasi = mysqli_query($conn, $akomodasi_query);

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
                <div class="add-atraksi">
                    <a href="config/mitra_addakomodasi.php">Add</a>
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