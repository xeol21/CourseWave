<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

require("connect.php");

if (isset($_GET['course'])) {
    $username = $_SESSION['username'];
    $courseName = $_GET['course'];

    // Query to delete enrollment record
    $query = "DELETE FROM fees WHERE username = '$username' AND course = '$courseName'";
    mysqli_query($mysql, $query) or die("Query Failed!!!");

    // Redirect back to the course page
    header("location: course.php");
    exit();
} else {
    // Redirect if course parameter is not provided
    header("location: course.php");
    exit();
}
?>
