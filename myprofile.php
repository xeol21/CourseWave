<?php
session_start(); // Start the session (if not already started)

// Check if the user is logged in (you may need to adjust this condition based on your authentication mechanism)
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $mysqli = new mysqli("localhost", "root", "", "coursewave");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch user details from tblreg based on the logged-in username
    $sql = "SELECT * FROM tblreg WHERE username = '$username'";
    $result = $mysqli->query($sql);

    // Check if a user with the given username exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display user details
        $email = $row['username'];
        $sname = $row['sname'];
        $bod = $row['bod'];
        $gender = $row['gender'];
        $city = $row['city'];
        $state = $row['state'];
        $mno = $row['mno']; 
        $img = $row['img'];

       // Fetch second last login and logout times for the current user
      $sql_log = "SELECT logintime, logout FROM studentlog WHERE username = '$username' ORDER BY logintime DESC LIMIT 1,1";
      $result_log = $mysqli->query($sql_log);

      $second_last_login = "";
      $second_last_logout = "";

      if ($result_log->num_rows > 0) {
          $row_log = $result_log->fetch_assoc();
          $second_last_login = $row_log['logintime'];
          $second_last_logout = $row_log['logout'];
      // Convert logout time to AM/PM format
      $second_last_login = date("Y-m-d h:i:s A", strtotime($second_last_login));
    $second_last_logout = date("Y-m-d h:i:s A", strtotime($second_last_logout));
  }
        // Close the database connection
        $mysqli->close();
    } else {
        // Handle the case where the user does not exist
        echo "User not found.";
        // Optionally, redirect the user to a login page or display an error message.
    }
} else {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/coursefavicon.png">
  <title>My Profile</title>
  <link rel="stylesheet" href="css/regstyle.css">
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
}

.profile-info {
  display: flex;
  align-items: center;
}

.profile-picture img {
  width: 180px;
  height: 180px;
  border-radius: 50%;
  margin-right: 100px;
  margin-left: 70px;

}

.personal-info {
  flex: 1;
}

.personal-info h2 {
  margin-top: 0;
}

.profile-footer {
  text-align: center;
  margin-top: 20px;
}

.edit-profile-btn {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

.edit-profile-btn:hover {
  background-color: #0056b3;
}

h2 {
   color:#0056b3;
}

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
<body>
  <div class="container">
    <div class="title">My Profile<button type="button" class="btn-close" aria-label="Close">&#10006;</button>
</div> <br><br>
    <div class="profile-info">
      <div class="profile-picture">
        <img src="image/<?php echo $img; ?>" alt="Profile Picture">
        <p style='margin-left: 30px;'><b>Last Login: </b><?php echo $second_last_login !== "" ? $second_last_login : "N/A"; ?></p>
        <p style='margin-left: 22px;'><b>Last Logout: </b><?php echo $second_last_logout !== "" ? $second_last_logout : "N/A"; ?></p>
      </div>
      <div class="personal-info">
        <h2><?php echo $username?></h2><br>
        <p>Name: <?php echo $sname?></p><br>
        <p>Birth Date: <?php echo $bod?></p><br>
        <p>Gender: <?php echo $gender?></p><br>
        <p>City: <?php echo $city?></p><br>
        <p>State: <?php echo $state?></p><br>
        <p>Mobile No: <?php echo $mno?></p><br>

      </div>
    </div><br>
    <div class="profile-footer">
      <a href="editpro.php" class="edit-profile-btn">Edit Profile</a>
    </div>
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
