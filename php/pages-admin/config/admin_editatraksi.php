<?php
// include database connection file
include_once("../../connect.php");
$id = $judul = $isi = $kategori = $tautan = $gambar = $idlokasi = "";
$errors = array();
$flag = false;
// Getting id from url
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id'])) {
        $errors["id"] = "ID is required";
    } else {
        $id = test_input($_POST['id']);
        $id = mysqli_real_escape_string($conn, $id);
    }

    if (empty($_POST["judul"])) {
        $errors["judul"] = "Judul is required";
    } else {
        $judul = test_input($_POST["judul"]);
    }

    if (empty($_POST["isi"])) {
        $errors["isi"] = "Isi Deskripsi is required";
    } else {
        $isi = test_input($_POST["isi"]);
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
        $direktori = "../../../assets/images/atraksi/";
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
    $sql = "UPDATE atraksi SET Judul=?,Isi=?,Kategori=?, Tautan=?, Gambar=?, IDLokasi=? WHERE IDAtraksi= ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssii", $judul, $isi, $kategori, $tautan, $gambar, $idlokasi, $id);
        // query kedua untuk menghapus file/gambar di folder local
        $sql = "SELECT * FROM atraksi WHERE IDAtraksi= ?";
        if ($prepare = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($prepare, "i", $id);
            mysqli_stmt_execute($prepare);
            $result = mysqli_stmt_get_result($prepare);
            if (mysqli_num_rows($result) > 0) {
                $jalankan = mysqli_fetch_array($result);
                $hapus_foto = unlink("../../../assets/images/atraksi/$jalankan[Gambar]");
            } else {
                header("Location: error");
                exit();
            }
        }
        if (mysqli_stmt_execute($stmt)) {
            move_uploaded_file($tmp_dir, $item_foto);
            // Redirect to homepage to display updated user in list
            header("Location: ../admin_atraksi.php");
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
    $result = mysqli_query($conn, "SELECT * FROM atraksi WHERE IDAtraksi=$id");
    while ($user_data = mysqli_fetch_array($result)) {
        $judul = $user_data['Judul'];
        $isi = $user_data['Isi'];
        $kategori = $user_data['Kategori'];
        $tautan = $user_data['Tautan'];
        $gambar = $user_data['Gambar'];
        $idlokasi = $user_data['IDLokasi'];
    }
}
?>
<html>

<head>
    <title>Edit Artikel Atraksi</title>
    <link rel="stylesheet" href="../../../css/pages-admin/config/admin_editatraksi.css">
</head>

<body>
    <a href="../admin_atraksi.php">Back</a>
    <br /><br />
    <form name="update_atraksi" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . htmlspecialchars($_SERVER["QUERY_STRING"]); ?>" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td>Judul</td>
                <td>
                    <input type="text" name="judul" value="<?= $judul ?>">
                    <?php
                    // Display error message for 'judul' if exists
                    if (isset($errors['judul'])) {
                        echo "<br> <span style='color: red;'>* {$errors["judul"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="isi" id="isi" cols="30" rows="10"><?= $isi ?></textarea>
                    <?php
                    // Display error message for 'isi' if exists
                    if (isset($errors['isi'])) {
                        echo "<br> <span style='color: red;'>* {$errors["isi"]}</span>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <input type="text" name="kategori" value="<?= $kategori ?>">
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
                    <img src="../../../assets/images/atraksi/<?= $gambar ?>" alt="">
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
                <td><input type="hidden" name="id" value=<?= $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>