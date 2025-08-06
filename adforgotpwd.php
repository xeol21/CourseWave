<?php
// Include your database connection file here
$mysql=mysqli_connect("localhost","root","","coursewave") or die("Could Not connect..!!");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $sque_answer = $_POST['sque_answer'];

    // Check if username exists in the database
    // Perform a SQL query to select the user's security question and answer
    $query = "SELECT adque, adans FROM adlogin WHERE username = '$username'";
    // Execute the query and fetch the result
    // Assuming $mysql is your database connection
    $result = mysqli_query($mysql, $query);

    // Check if query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Verify security answer
        if ($row) {
            if ($row['adans'] == $sque_answer) {
                // Security answer matches, allow the user to reset password
                // Redirect the user to the reset password page or display a password reset form
                header("Location: adresetpwd.php?username=$username");
                exit();
            } else {
                // Incorrect security answer
                echo '<script>document.getElementById("security_error").textContent = "Incorrect answer to security question.";</script>';
            }
        } else {
            // Username not found
            echo '<script>document.getElementById("security_error").textContent = "Username not found.";</script>';
        }
    } else {
        // Query failed
        echo "Error: " . mysqli_error($mysql);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="image/coursefavicon.png">

<title>Forgot Password</title>
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
</style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>

    <form action="adforgotpwd.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" oninput="getSecurityQuestion()" required>
        <br><br>
        <label for="security_question">Security Question:</label>
        <input type="text" id="security_question" name="security_question" readonly>
        <br><br>
        <label for="sque_answer">Answer to Security Question:</label>
        <input type="password" id="sque_answer" name="sque_answer" required>
        <br><br>
        <span id="security_error" class="error"></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
<script>
function getSecurityQuestion() {
    var username = document.getElementById("username").value;

    // Make sure the username is not empty
    if (username.trim() !== "") {
        // Fetch the security question using PHP
        fetch('adget_security_question.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'username=' + encodeURIComponent(username),
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() !== "") {
                // Display the security question
                document.getElementById("security_question").value = data;
                document.getElementById("security_error").textContent = "";
            } else {
                // Clear the security question and display an error
                document.getElementById("security_question").value = "";
                document.getElementById("security_error").textContent = "Username not found";
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    } else {
        // Clear the security question if the username is empty
        document.getElementById("security_question").value = "";
    }
}
</script>
</body>
</html>

