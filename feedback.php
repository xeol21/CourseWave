<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit;
}
// Retrieve username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="icon" href="image/coursefavicon.png">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>

textarea {
  border: none;
  resize: none;
  width: 100%;
  padding: 0.2rem;
  color: inherit;
  font-family: inherit;
  line-height: 1.6;
  border-radius: 0.2rem;
  box-shadow: inset 2px 2px 8px rgba(0, 0, 0, 0.3), inset -2px -2px 8px rgba(255, 255, 255, 0.8);
  background-color: rgba(255, 255, 255, 0.3);
}
textarea::placeholder {
  color: #aaa;
  font-size:16px;
}
textarea:focus {
  outline-color: #5382DD;
}
.btn{
  height: 45px;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.btn:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }

  body {
  margin: 0;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  font-family: sans-serif;
}

h1,
p {
  margin: 0;
  padding: 0;
  line-height: 1.5;
}

.app {
  width: 90%;
  max-width: 500px;
  margin: 0 auto;
}
.container1 {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.item {
  width: 90px;
  height: 90px;
  display: flex;
  justify-content: center;
  align-items: center;
  user-select: none;
}
.radio {
  display: none;
}
.radio ~ span {
  font-size: 3rem;
  filter: grayscale(100);
  cursor: pointer;
  transition: 0.3s;
}

.radio:checked ~ span {
  filter: grayscale(0);
  font-size: 4rem;
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
</style>
</head>
<body>
<div class="container"> 
  <div class="title">Rate your experience<button type="button" class="btn-close" aria-label="Close">&#10006;</button></div><br>
  <div class="content">We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.</div> <br>
  <form method="post" action="feedback.php" enctype="multipart/form-data">
  <div class="app">
  <div class="container1">
    <div class="item">
      <label for="0">
      <input class="radio" type="radio" name="feedbackType" id="0" value="Very bad">
      <span>🤬</span>
    </label>
    </div>

    <div class="item">
      <label for="1">
      <input class="radio" type="radio" name="feedbackType" id="1" value="Bad">
      <span>🙁</span>
    </label>
    </div>

    <div class="item">
      <label for="2">
      <input class="radio" type="radio" name="feedbackType" id="2" value="Okay">
      <span>😶</span>
    </label>
    </div>

    <div class="item">
      <label for="3">
      <input class="radio" type="radio" name="feedbackType" id="3" value="Good">
      <span>😁</span>
    </label>
    </div>

    <div class="item">
      <label for="4">
      <input class="radio" type="radio" name="feedbackType" id="4" value="Very good">
      <span>😍</span>
    </label>
    </div>

  </div>
</div>
  
  <textarea cols="24" rows="6" placeholder="Tell us about your experience!" name="feedback"></textarea>
        <div class="button"> 
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'index.php'; // Redirect to course.php
        });
</script>
</body>
</html>


<?php
// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $feedbackContent = $_POST['feedback'];
    $feedbackType = $_POST['feedbackType']; // Retrieve the selected radio button value
    
    // Current date and time
    date_default_timezone_set('Asia/Kolkata');
    $feedbackDate = date("Y-m-d h:i");

    // Database connection
    $mysqli=mysqli_connect("localhost","root","","coursewave") or die("could not connect database");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // SQL query to insert feedback into the table
    $sql = "INSERT INTO feedback (feedid,username,ftype, fcontent, fdate) VALUES (null,'$username','$feedbackType', '$feedbackContent', '$feedbackDate')";

    if ($mysqli->query($sql) === TRUE) {
       // feedback successful, trigger SweetAlert notification
       echo"<script>
       Swal.fire({
           icon: 'success',
           title: 'Feedback is Sent Successfully!',
           text: 'Thank you for your Feedback.',
           showConfirmButton: false,
           timer: 3000
       }).then(function() {
        // Redirect to index.php after the user clicks OK
        window.location.href = 'index.php';
    });
   </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
?>