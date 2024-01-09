<?php
// include database connection file
include_once("../../connect.php");
$judul = $isi = $tanggal = $kategori = $tautan = $gambar = $idlokasi = "";
$errors = array();
$flag = false;
$direktori = "../../../assets/images/atraksi/";
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
$uploadOk = 1;
$targetFile = "";
$imgExt = "";


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// }

if (isset($_POST["submit"])) {
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

    if (empty($_POST["tanggal"])) {
        $errors["tanggal"] = "Tanggal Publikasi is required";
    } else {
        $tanggal = test_input($_POST["tanggal"]);
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
    $sql = "INSERT INTO atraksi (Judul, Isi, TanggalPublikasi, Kategori, Tautan, Gambar, IDLokasi) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $judul, $isi, $tanggal, $kategori, $tautan, $gambar, $idlokasi);
        mysqli_stmt_execute($stmt);
    } else {
        die("Something went wrong");
    }
    // Redirect to homepage to display updated user in list
    header("Location: ../admin_atraksi.php");
}
?>
<html>

<head>
    <title>Add Artikel Atraksi</title>
    <link rel="stylesheet" href="../../../css/pages-admin/config/admin_addatraksi.css">
</head>

<body>
    <a href="../admin_atraksi.php">Back</a>
    <br /><br />
    <form name="add_atraksi" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
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
                <td>Tanggal Publikasi</td>
                <td>
                    <input type="date" name="tanggal" value="<?= $tanggal ?>">
                    <?php
                    // Display error message for 'tanggal' if exists
                    if (isset($errors['tanggal'])) {
                        echo "<br> <span style='color: red;'>* {$errors["tanggal"]}</span>";
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
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>