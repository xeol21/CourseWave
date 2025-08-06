<?php
require("connect.php"); // Include the database connection script

// Define the SQL query to delete old logs
$query = "DELETE FROM studentlog WHERE logintime < DATE_SUB(NOW(), INTERVAL 4 DAY)";

// Execute the query
$result = mysqli_query($mysql, $query);

// Check if the deletion was successful
if ($result) {
    echo "Old logs deleted successfully!";
} else {
    echo "Error deleting old logs: " . mysqli_error($mysql);
}

// Close the database connection
mysqli_close($mysql);
?>
