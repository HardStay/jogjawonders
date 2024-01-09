<?php
// include database connection file
include_once("../../connect.php");
$id_akomodasi = $id = $nama = $isi = $kategori = $fasilitas = $tautan = $gambar = $idlokasi = $status = $harga = "";
$errors = array();
$flag = false;
// Getting id from url

$id = isset($_GET["id"]) ? $_GET["id"] : "";;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id'])) {
        $errors["id"] = "ID is required";
    } else {
        $id_akomodasi = test_input($_POST['id']);
        $id_akomodasi = mysqli_real_escape_string($conn, $id_akomodasi);
    }

    if (empty($_POST["nama"])) {
        $errors["nama"] = "Nama Akmodasi is required";
    } else {
        $nama = test_input($_POST["nama"]);
    }

    if (empty($_POST["deskripsi"])) {
        $errors["deskripsi"] = "Isi Deskripsi is required";
    } else {
        $isi = test_input($_POST["deskripsi"]);
    }

    if (empty($_POST["kategori"])) {
        $errors["kategori"] = "Kategori is required";
    } else {
        $kategori = test_input($_POST["kategori"]);
    }

    if (empty($_POST["tautan"])) {
        $errors["tautan"] = "Tautan is required";
    } else {
        $tautan = test_input($_POST["tautan"]);
    }

    if (empty($_FILES["gambar"]["tmp_name"])) {
        $errors["gambar"] = "Gambar is required";
    } else {
        $direktori = "../../../assets/images/akomodasi/";
        $imgFile = $_FILES['gambar']['name'];
        $tmp_dir = $_FILES['gambar']['tmp_name'];
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        $item_foto = $direktori . basename($imgFile);
        if (!empty($_FILES['gambar']['tmp_name'])) {
            if (in_array($imgExt, $valid_extensions)) {
                $gambar = $imgFile;
            }
        }
    }

    if (empty($_POST["idlokasi"])) {
        $errors["idlokasi"] = "Lokasi is required";
    } else {
        $idlokasi = test_input($_POST["idlokasi"]);
    }

    $fasilitas = test_input($_POST["fasilitas"]);
    $status = test_input($_POST["status"]);
    $harga = test_input($_POST["harga"]);

    $flag = true;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($errors) && $flag) {
    $sql = "UPDATE akomodasi SET Nama=?, Deskripsi=?, Fasilitas=?,Kategori=?, Tautan=?, Gambar=?, IDLokasi=?, Status=?, Rentang_Harga=? WHERE IDAkomodasi= ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssissi", $nama, $isi, $fasilitas, $kategori, $tautan, $gambar, $idlokasi, $status, $harga, $id_akomodasi);
        // query kedua untuk menghapus file/gambar di folder local
        $sql = "SELECT * FROM akomodasi WHERE IDAkomodasi= ?";
        if ($prepare = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($prepare, "i", $id_akomodasi);
            mysqli_stmt_execute($prepare);
            $result = mysqli_stmt_get_result($prepare);
            if (mysqli_num_rows($result) > 0) {
                $jalankan = mysqli_fetch_array($result);
                $hapus_foto = unlink("../../../assets/images/akomodasi/$jalankan[Gambar]");
            } else {
                header("Location: error");
                exit();
            }
        }
        if (mysqli_stmt_execute($stmt)) {
            move_uploaded_file($tmp_dir, $item_foto);
            // Redirect to homepage to display updated user in list
            header("Location: ../admin_akomodasi.php");
            exit();
        } else {
            // Handle kesalahan eksekusi jika diperlukan
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
        // Tutup pernyataan yang telah dipersiapkan
        mysqli_stmt_close($stmt);
    }
    // $result = mysqli_query($conn, $sql);

} else {
    // Display selected user data based on id
    // Fetch user data based on id
    $result = mysqli_query($conn, "SELECT * FROM akomodasi WHERE IDAkomodasi='$id'");
    while ($user_data = mysqli_fetch_array($result)) {
        $nama = $user_data['Nama'];
        $isi = $user_data['Deskripsi'];
        $fasilitas = $user_data['Fasilitas'];
        $kategori = $user_data['Kategori'];
        $tautan = $user_data['Tautan'];
        $gambar = $user_data['Gambar'];
        $idlokasi = $user_data['IDLokasi'];
        $status = $user_data['Status'];
        $harga = $user_data['Rentang_Harga'];
    }
}
?>
<html>

<head>
    <title>Edit Artikel Akomodasi</title>
    <link rel="stylesheet" href="../../../css/pages-admin/config/admin_editatraksi.css">
</head>

<body>
    <a href="../admin_akomodasi.php">Back</a>
    <br /><br />
    <form name="add_akomodasi" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td>Nama Akomodasi</td>
                <td>
                    <input type="text" name="nama" value="<?= $nama ?>">
                    <?php
                    // Display error message for 'nama' if exists
                    if (isset($errors['nama'])) {
                        echo "<br> <span style='color: red;'>* {$errors["nama"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $isi ?></textarea>
                    <?php
                    // Display error message for 'deskripsi' if exists
                    if (isset($errors['deskripsi'])) {
                        echo "<br> <span style='color: red;'>* {$errors["deskripsi"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Fasilitas</td>
                <td>
                    <input type="text" name="fasilitas" value="<?= $fasilitas ?>">
                    <?php
                    // Display error message for 'fasilitas' if exists
                    if (isset($errors['fasilitas'])) {
                        echo "<br> <span style='color: red;'>* {$errors["fasilitas"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori">
                        <option>---</option>
                        <?php
                        $sql_kategori = "SELECT Kategori FROM akomodasi GROUP BY Kategori";
                        $query_kategori = mysqli_query($conn, $sql_kategori) or die(mysqli_error($conn));
                        while ($data = mysqli_fetch_array($query_kategori)) :
                        ?>
                            <option value="<?= $data["Kategori"] ?>" <?= ($data["Kategori"] == $kategori) ? 'selected' : ''; ?>><?= $data["Kategori"] ?></option>
                        <?php endwhile ?>
                    </select>
                    <?php
                    // Display error message for 'kategori' if exists
                    if (isset($errors['kategori'])) {
                        echo "<br> <span style='color: red;'>* {$errors["kategori"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tautan</td>
                <td>
                    <input type="text" name="tautan" value="<?= $tautan ?>">
                    <?php
                    // Display error message for 'tautan' if exists
                    if (isset($errors['tautan'])) {
                        echo "<br> <span style='color: red;'>* {$errors["tautan"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>File Gambar</td>
                <td>
                    <input type="file" name="gambar" id="gambar">
                    <?php
                    // Display error message for 'gambar' if exists
                    if (isset($errors['gambar'])) {
                        echo "<br> <span style='color: red;'>* {$errors["gambar"]}</span>";
                    }
                    ?>
                    <br>
                    <img src="../../../assets/images/akomodasi/<?= $gambar ?>" alt="gambar">

                </td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>
                    <select name="idlokasi">
                        <option>---</option>
                        <?php
                        $sql_lokasi = "SELECT IDLokasi, Nama_Jalan FROM lokasi";
                        $query_lokasi = mysqli_query($conn, $sql_lokasi) or die(mysqli_error($conn));
                        while ($data = mysqli_fetch_array($query_lokasi)) :
                        ?>
                            <option value="<?= $data["IDLokasi"] ?>" <?= ($data["IDLokasi"] == $idlokasi) ? 'selected' : ''; ?>><?= $data["Nama_Jalan"] . " - " . $data["IDLokasi"] ?></option>
                        <?php endwhile ?>
                    </select>
                    <?php
                    // Display error message for 'Lokasi' if exists
                    if (isset($errors['idlokasi'])) {
                        echo "<br> <span style='color: red;'>* {$errors["idlokasi"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option>---</option>
                        <?php
                        $sql_lokasi = "SELECT Status FROM akomodasi GROUP BY Status";
                        $query_lokasi = mysqli_query($conn, $sql_lokasi) or die(mysqli_error($conn));
                        while ($data = mysqli_fetch_array($query_lokasi)) :
                        ?>
                            <option value="<?= $data["Status"] ?>" <?= ($data["Status"] == $status) ? 'selected' : ''; ?>><?= $data["Status"] ?></option>
                        <?php endwhile ?>
                    </select>
                    <?php
                    // Display error message for 'Lokasi' if exists
                    if (isset($errors['status'])) {
                        echo "<br> <span style='color: red;'>* {$errors["status"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <select name="harga">
                        <option>---</option>
                        <?php
                        $sql_lokasi = "SELECT Rentang_Harga FROM akomodasi GROUP BY Rentang_Harga";
                        $query_lokasi = mysqli_query($conn, $sql_lokasi) or die(mysqli_error($conn));
                        while ($data = mysqli_fetch_array($query_lokasi)) :
                        ?>
                            <option value="<?= $data["Rentang_Harga"] ?>" <?= ($data["Rentang_Harga"] == $harga) ? 'selected' : ''; ?>><?= $data["Rentang_Harga"] ?></option>
                        <?php endwhile ?>
                    </select>
                    <?php
                    // Display error message for 'Lokasi' if exists
                    if (isset($errors['harga'])) {
                        echo "<br> <span style='color: red;'>* {$errors["harga"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="id" value="<?= $id ?>" hidden>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>