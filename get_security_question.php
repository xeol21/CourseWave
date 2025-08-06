<?php
// Include your database connection file here
$mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could Not connect..!!");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    // Perform a SQL query to select the user's security question
    $query = "SELECT sque FROM tblreg WHERE username = '$username'";
    $result = mysqli_query($mysql, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $securityQuestion = $row['sque'];
            echo $securityQuestion;
        } else {
            echo "Username not found";
        }
    } else {
        echo "Error: " . mysqli_error($mysql);
    }
}
?>
