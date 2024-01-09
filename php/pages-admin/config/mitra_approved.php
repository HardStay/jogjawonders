<?php

include "../../connect.php";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Validate and sanitize the input
$mitraID = isset($_GET['IDMitra']) ? (int) $_GET['IDMitra'] : 0;

if ($mitraID > 0) {
    // Use prepared statement to prevent SQL injection
    $update_status = "UPDATE mitra SET `Status`='Approved' WHERE IDMitra = ?";

    $stmt = mysqli_prepare($conn, $update_status);
    mysqli_stmt_bind_param($stmt, "i", $mitraID);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid IDMitra value";
}

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../admin_dashboard.php");

// Close the connection
mysqli_close($conn);

?>
?>