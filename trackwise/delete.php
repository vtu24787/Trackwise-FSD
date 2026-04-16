<?php
include 'db.php'; // database connection

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);   // get id from URL

    // 👉 WRITE YOUR SQL HERE
    $sql = "DELETE FROM expenses WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php"); // go back after delete
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No ID received";
}
?>