<?php

include "../../connect.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Validasi dan ambil nilai IDMitra dari parameter GET
$mitraID = $_GET['IDMitra'];
$akomodasi_mitra = "SELECT ";
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM mitra WHERE IDMitra=$mitraID");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../admin_dashboard.php");

// Tutup koneksi
mysqli_close($conn);

?>