<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="image/coursefavicon.png">
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="stylesheet" href="css/coursecrud.css">
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
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 96%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            height: 150px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn{
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .btn:hover{
            background-color: #0056b3;

        }
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
.user-details .input-box1 input,
.user-details .input-box1 textarea {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box1 input:focus,
.user-details .input-box1 input:valid,
.user-details .input-box1 textarea:focus,
.user-details .input-box1 textarea:valid{
  border-color: #9b59b6;
}
    </style>
</head>
<body>

<div class="container">
<div class="title">Contact Us<button type="button" class="btn-close" aria-label="Close">&#10006;</button></div>
<div class="content">
    <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="user-details"> 
    <div class="input-box1">   
    <input type="text" name="username" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <div class="button">
        <input type="submit" name="submit" ></button> <br><br><br>
</div>    
    </div>
        </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to show SweetAlert success message
    function showSuccessMessage() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Message sent successfully!',
            confirmButtonText: 'OK'
        });
    }
     // Check if the form was submitted successfully and show SweetAlert message
     <?php
    if(isset($_POST['submit'])) {
        echo 'showSuccessMessage();';
    }
    ?>
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'index.php'; // Redirect to course.php
        });
</script>
<?php
if(isset($_POST['submit'])){
    // Create a database connection
    $mysqli = new mysqli("localhost", "root", "", "coursewave");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Form data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL query to insert data into the table
    $sql_insert_data = "INSERT INTO contact (username, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query to insert data
    if ($mysqli->query($sql_insert_data) === TRUE) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "Error: " . $sql_insert_data . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>

</body>
</html>

