<?php
// include database connection file
include_once("../../connect.php");
$id = $judul = $tautan = $idlokasi = "";
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
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($errors) && $flag) {
    $sql = "UPDATE hiddengem SET Judul=?, IDLokasi=?, Tautan=? WHERE IDGem=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sisi", $judul, $idlokasi, $tautan, $id);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to homepage to display updated user in list
            header("Location: ../admin_hiddengem.php");
            exit();
        } else {
            // Handle kesalahan eksekusi jika diperlukan
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
        // Tutup pernyataan yang telah dipersiapkan
        mysqli_stmt_close($stmt);
    } else {
        // Handle kesalahan persiapan pernyataan jika diperlukan
        echo "Error preparing statement: " . mysqli_error($conn);
    }
    // $result = mysqli_query($conn, $sql);
} else {
    // Display selected user data based on id
    // Fetch user data based on id
    $result = mysqli_query($conn, "SELECT * FROM hiddengem WHERE IDGem=$id");
    while ($user_data = mysqli_fetch_array($result)) {
        $judul = $user_data['Judul'];
        $tautan = $user_data['Tautan'];
        $idlokasi = $user_data['IDLokasi'];
    }
}
?>
<html>

<head>
    <title>Edit Hidden Gem</title>
    <link rel="stylesheet" href="../../../css/pages-admin/config/admin_editgem.css">
</head>

<body>
    <a href="../admin_hiddengem.php">Back</a>
    <br /><br />
    <form name="update_gem" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?' . htmlspecialchars($_SERVER["QUERY_STRING"]); ?>">
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