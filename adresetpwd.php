
<?php
// Include your database connection file here
$mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could Not connect..!!");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    // Redirect if the request method is not GET
    header("Location: adlogin.php");
    exit();
}

// Fetch the username from the URL parameter
$username = $_GET['username'];

// Query to select the user's password based on the username
$query = "SELECT password FROM adlogin WHERE username = '$username'";
$result = mysqli_query($mysql, $query);

// Check if query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        // Store the user's password
        $user_password = $row['password'];
    } else {
        // Handle if username not found
        echo "Username not found.";
        exit();
    }
} else {
    // Handle query failure
    echo "Error: " . mysqli_error($mysql);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link rel="icon" href="image/coursefavicon.png">

<style>
   body{
  min-height: 100vh;
  padding: 0.5rem;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #222;
  font-size: 0.24rem;
  font-family: "Space Grotesk", sans-serif;
  background-image: radial-gradient(farthest-side, #afc8f9 90%, #fff0), radial-gradient(farthest-side, #ddc1fb 90%, #fff0), radial-gradient(circle at 0 0, #d5e0fa, #e5d5f6) !important;
  background-size: 7rem 7rem, 6rem 6rem, auto;
  background-position: 30% 10%, 80% 90%, 0;
  background-repeat: no-repeat;
  backdrop-filter: blur(50px);
}
    .container {
        max-width: 400px;
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        gap: 0.3rem;
        border-radius: 0.25rem;
        box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.2);
        background-color: rgba(255, 255, 255, 0.5);
        z-index: 1;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
         font-size: 0.99rem;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 0.90rem;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-top: 5px; /* Adjust margin as needed */
        font-size: 0.9rem; /* Adjust font size as needed */
    }

    /* CSS for button */
.export-btn {
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    background-color: #007bff; /* Blue theme */
    color: #fff; /* White text */
    border: none;
    cursor: pointer;
}

/* CSS for button on hover */
.export-btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
</style>
</head>
<body>

<div class="container">
    <h2>User Password</h2>

<form action="adresetpwd.php" method="post">
    <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
    <label for="user_password">Password:</label>
    <input type="text" id="user_password" name="user_password" value="<?php echo $user_password; ?>" readonly>
    <br>
    <button class="export-btn" type="button" onclick="redirectToLogin()">Back to Login</button>
</form>

</div>
<script>
    function redirectToLogin() {
        // Redirect to login.php
        window.location.href = "adlogin.php";
    }
</script>
</body>
</html>

