<?php
// include database connection file
include_once("../../connect.php");
// Get id from URL to delete that user
$id = $_GET['id'];
// Delete user row from table based on given id
$sql = "DELETE FROM hiddengem WHERE IDGem = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}
$result = mysqli_query($conn, $sql);
// After delete redirect to Dashboard, so that latest user list will be displayed .
header("Location: ../admin_hiddengem.php");
