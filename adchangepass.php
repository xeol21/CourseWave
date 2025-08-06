<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: adlogin.php'); // Redirect to login page if not logged in
    exit();
}
// Include database connection
$mysql=mysqli_connect("localhost","root","","coursewave") or die("could not connect database");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve user's current password from the database
    $username = $_SESSION['username'];
    $sql = "SELECT password FROM adlogin WHERE username = '$username'";
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
        $sql_update = "UPDATE adlogin SET password = '$new_password' WHERE username = '$username'";
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
 
    <title>Change password</title>
    <link rel="icon" href="image/coursefavicon.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 600px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #ffffff;
            font-size: 20px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .close-button:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span class="close-button" onclick="closeForm()">X</span>    
    <h3>Change Password</h3>
        <label for="Password">Old Password</label>
        <input type="password" placeholder="Password" name="old_password" id="old_password">
        <label for="Password">New Password</label>
        <input type="password" placeholder="Password" name="new_password" id="new_password">
        <label for="password">Confirm Password</label>
        <input type="password" placeholder="Password" name="confirm_password" id="confirm_password">
        <button name="change">Change Password</button>
<br><br>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <?php if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    </form>
    <!-- Script to close the form and redirect to addashboard.php when clicking the close button -->
    <script>
        function closeForm() {
            window.location.href = 'addashboard.php';
        }
    </script>
</body>
</html>


  
