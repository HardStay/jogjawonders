<?php
// include database connection file
include_once("../../connect.php");
// Get id from URL to delete that user
$id = $_GET['id'];
// Delete user row from table based on given id
$sql = "DELETE FROM atraksi WHERE IDAtraksi = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);

    //Query kedua untuk mengrow atau unlink
    $sql = "SELECT * FROM atraksi WHERE IDAtraksi= ?";
    if ($prepare = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($prepare, "i", $id);
        mysqli_stmt_execute($prepare);
        $result = mysqli_stmt_get_result($prepare);
        if (mysqli_num_rows($result) > 0) {
            $jalankan = mysqli_fetch_array($result);
            $hapus_foto = unlink("../../../assets/images/atraksi/$jalankan[Gambar]");
        } else {
            header("location: error");
            exit();
        }
    }
    mysqli_stmt_execute($stmt);
}
$result = mysqli_query($conn, $sql);
// After delete redirect to Dashboard, so that latest user list will be displayed .
header("Location: ../admin_atraksi.php");
