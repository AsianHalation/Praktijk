<?php
session_start(); // Ensure session is started for using $_SESSION

if (isset($_GET['dinerID'])) {
    $id = $_GET['dinerID'];

    try {
        // Reuse the existing database connection
        require_once '../includes/db.php'; // Update this path as needed

        // Use a prepared statement to delete the record
        $stmt = $conn->prepare("DELETE FROM diner WHERE dinerID = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Bloons!');</script>";
        } else {
            echo "<script>alert('Jesse');</script>";
        }

        // Redirect back to the index page
        header('location: ../website/print.php');
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        $_SESSION['message'] = "Database error: " . $e->getMessage();
        header('location: ../website/print.php');
        exit();
    }
} else {
    //geen ID header
    header('location: ../website/print.php');
    exit();
}


?>