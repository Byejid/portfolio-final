<?php
// Database connection
include("database.php");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch data
$sql = "SELECT * FROM Academic_Information";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Information</title>
    <!-- Link to your external CSS file -->
    <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
    <?php
    // Check if records exist
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Exam</th><th>Board</th><th>Passing Year</th><th>Result</th></tr>";
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["Exam"] . "</td>";
            echo "<td>" . $row["Board"] . "</td>";
            echo "<td>" . $row["Passing_Year"] . "</td>";
            echo "<td>" . $row["Result"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
    ?>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
