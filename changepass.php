<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Include database connection
$mysql=mysqli_connect("localhost","root","","coursewave") or die("Could Not connect..!!");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve user's current password from the database
    $username = $_SESSION['username'];
    $sql = "SELECT password FROM tblreg WHERE username = '$username'";
    $result = mysqli_query($mysql, $sql); // Added $mysql as the first argument
    $row = mysqli_fetch_assoc($result);
    $current_password = $row['password'];

    // Verify old password
    if ($old_password != $current_password) {
        $error = "Incorrect old password.";
    } elseif ($new_password != $confirm_password) {
        $error = "New password and confirm password do not match.";
    } else {
        // Update password in the database
        $sql_update = "UPDATE tblreg SET password = '$new_password' WHERE username = '$username'";
        if (mysqli_query($mysql, $sql_update)) {
            $success = "Password changed successfully.";
        } else {
            $error = "Error updating password: " . mysqli_error($mysql);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
        <link rel="stylesheet" href="css/regstyle.css">
        <link rel="icon" href="image/coursefavicon.png">
        <style>
/* Close button styling */
.btn-close {
    position: absolute;
    top: 1px;
    right: 1px;
    background-color: #ffffff; /* Button background color */
    border: 1px solid #ccc; /* Button border */
    border-radius: 30%; /* Make it a circle */
    font-size: 24px;
    cursor: pointer;
    color: #333; /* Button color */
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease; /* Add transition effect */
    padding: 5px; /* Add padding for better clickability */
    width: 33px; /* Set width */
    height: 35px; /* Set height */
    line-height: 1; /* Ensure text is centered vertically */
    text-align: center; /* Center the 'X' horizontally */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
}

.btn-close:hover {
    background-color: #cd98eb; /* Change background color on hover */
    border-color: #999; /* Change border color on hover */
    color: #000; /* Change text color on hover */
}

        </style>
</head>
<body>
<div class="container">
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <?php if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
  <div class="title">Change Password
  <button type="button" class="btn-close" aria-label="Close">&#10006;</button>
  </div><br>
    <div class="content">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Old Password</span>
            <input type="password" name="old_password" id="old_password" placeholder="Enter your password" required>
            <span class="details">New Password</span>
            <input type="password" name="new_password" id="new_password" placeholder="Enter your password" required>
          </div>
          
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your password" required>
            <div class="button">
          <input type="submit" name="change" value="Change Password">
            </div>
        </div>
    </div>

</form>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'index.php'; // Redirect to course.php
        });
</script>