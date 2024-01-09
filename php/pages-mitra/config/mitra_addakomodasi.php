<?php
// include database connection file
session_start();
include_once("../../connect.php");
$nama = $deskripsi = $fasilitas = $kategori = $idlokasi = $tautan = $gambar = $harga = "";
$status = "Pending";
$user_id = $_SESSION["user_id"];
$errors = array();
$flag = false;
$direktori = "../../../assets/images/akomodasi/";
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$uploadOk = 1;
$targetFile = "";
$imgExt = "";


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// }

if (isset($_POST["submit"])) {
    if (empty($_POST["nama"])) {
        $errors["nama"] = "Nama Akomodasi is required";
    } else {
        $nama = test_input($_POST["nama"]);
    }

    if (empty($_POST["deskripsi"])) {
        $errors["deskripsi"] = "Isi Deskripsi is required";
    } else {
        $deskripsi = test_input($_POST["deskripsi"]);
    }

    if (empty($_POST["fasilitas"])) {
        $errors["fasilitas"] = "Fasilitas is required";
    } else {
        $fasilitas = test_input($_POST["fasilitas"]);
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

    if (empty($_POST["idlokasi"])) {
        $errors["idlokasi"] = "Lokasi is required";
    } else {
        $idlokasi = test_input($_POST["idlokasi"]);
    }

    if (empty($_POST["harga"])) {
        $errors["harga"] = "Harga is required";
    } else {
        $harga = test_input($_POST["harga"]);
    }

    $flag = true;

    if (isset($_FILES["gambar"]["tmp_name"])) {
        $targetFile = $direktori . basename($_FILES["gambar"]["name"]);
        $imgExt = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (in_array($imgExt, $valid_extensions)) {
            $gambar = $_FILES["gambar"]["name"];

            // Check if image file is a real image or fake image
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "Invalid file extension.";
        }
    } else {
        echo "disini";
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($errors) && $flag) {

    // Insert user data into table
    $sql = "INSERT INTO akomodasi (Nama, Deskripsi, Fasilitas, Kategori, IDLokasi, Tautan, Gambar, IDMitra, Status, Rentang_Harga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ssssississ", $nama, $deskripsi, $fasilitas, $kategori, $idlokasi, $tautan, $gambar, $user_id, $status, $harga);
        mysqli_stmt_execute($stmt);
    } else {
        die("Something went wrong");
    }
    // Redirect to homepage to display updated user in list
    header("Location: ../mitra_akomodasi.php");
}
?>
<html>

<head>
    <title>Add Akomodasi</title>
    <link rel="stylesheet" href="../../../css/pages-mitra/config/mitra_addakomodasi.css">
</head>

<body>
    <a href="../mitra_akomodasi.php">Back</a>
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
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $deskripsi ?></textarea>
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
                            <option value="<?= $data["Kategori"] ?>" <?= ($data["Kategori"] == $idlokasi) ? 'selected' : ''; ?>><?= $data["Kategori"] ?></option>
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
                    <img src="../../../assets/images/atraksi/<?= $gambar ?>" alt="gambar">

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
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>