<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="image/coursefavicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
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
    </style>
</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" name="submit" >Submit</button> <br><br><br>
        <a href="main.php"><button type="button" class="btn">Back</button></a>

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
<?php
if(isset($_POST['submit'])){
    // Create a database connection
    $mysqli = new mysqli("localhost", "root", "", "coursewave");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Form data
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL query to insert data into the table
    $sql_insert_data = "INSERT INTO guestcontact (email, subject, message) VALUES ('$email', '$subject', '$message')";

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