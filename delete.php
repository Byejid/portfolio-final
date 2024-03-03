<?php
// Connect to your database
$conn = mysqli_connect("localhost:3306", "root", "", "test");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if message ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare a delete statement
    $sql = "DELETE FROM messages WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // Record deleted successfully
        echo "Record deleted successfully";
        header("Location: admin.php?insertion=success");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No message ID provided";
}

mysqli_close($conn);
?>
