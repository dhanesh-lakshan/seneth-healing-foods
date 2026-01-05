<?php
include('connection.php'); // Ensure correct DB connection file
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete record
    $sql = "DELETE FROM enquiries WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Record deleted successfully!";
        header("Location: Manage_order.php"); // Redirect back
        exit();
    } else {
        $_SESSION['error'] = "Failed to delete record.";
        header("Location: Manage_order.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: Manage_order.php");
    exit();
}
?>
