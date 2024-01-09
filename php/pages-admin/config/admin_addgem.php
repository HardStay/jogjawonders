<?php
// include database connection file
include_once("../../connect.php");
$judul = $tautan = $idlokasi = "";
$errors = array();
$flag = false;

if (isset($_POST["submit"])) {
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

    // Insert user data into table
    $sql = "INSERT INTO hiddengem (Judul, IDLokasi, Tautan) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "sis", $judul, $idlokasi, $tautan);
        mysqli_stmt_execute($stmt);
    } else {
        die("Something went wrong");
    }
    // Redirect to homepage to display updated user in list
    header("Location: ../admin_hiddengem.php");
}
?>
<html>

<head>
    <title>Add Hidden Gem</title>
    <link rel="stylesheet" href="../../../css/pages-admin/config/admin_addgem.css">
</head>

<body>
    <a href="../admin_hiddengem.php">Back</a>
    <br /><br />
    <form name="add_gem" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>