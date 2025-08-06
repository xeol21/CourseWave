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
        $sname = $row['sname'];
        $bod = $row['bod'];
        $gender = $row['gender'];
        $city = $row['city'];
        $state = $row['state'];
        $mno = $row['mno']; 
        $adm_date = $row['adm_date'];
        $img = $row['img'];

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

// Handle form submission
if(isset($_REQUEST['btnedit'])){
    $sname = $_REQUEST['sname'];
    $username = $_REQUEST['username'];
    $bod = $_REQUEST['bod'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['city']; // This seems incorrect, should be $_REQUEST['state']
    $mno = $_REQUEST['mno'];
    $gender = $_REQUEST['gender'];
    $adm_date = $_REQUEST['adm_date'];
    $img = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];

    $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could not connect..!!");
    
    // Escape user inputs for security
    $sname = mysqli_real_escape_string($mysql, $sname);
    $username = mysqli_real_escape_string($mysql, $username);
    $bod = mysqli_real_escape_string($mysql, $bod);
    $city = mysqli_real_escape_string($mysql, $city);
    $state = mysqli_real_escape_string($mysql, $state);
    $mno = mysqli_real_escape_string($mysql, $mno);
    $adm_date = mysqli_real_escape_string($mysql, $adm_date);
  
    // Create the uploads directory if it doesn't exist
    $upload_dir = "uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Attempt to update data in the database
    $q = "UPDATE tblreg SET sname='$sname', bod='$bod', city='$city',state='$state', mno='$mno', gender='$gender', adm_date='$adm_date'";
    
    // Update the profile picture only if a new image is selected
    if(isset($_FILES['img']) && !empty($_FILES['img']['name'])){
        $q .= ", img='$img'";
    }

    $q .= " WHERE username='$username'";

    $res = mysqli_query($mysql, $q);
    
    if($res){
        // Move uploaded file to destination directory
        if(isset($_FILES['img']) && !empty($_FILES['img']['name'])){
            $target_file = $upload_dir . basename($img);
            if(move_uploaded_file($temp, $target_file)){
                // Redirect to success page
                header("location: myprofile.php");
                exit();
            } else {
                die("File upload failed");
            }
        } else {
            // Redirect to success page
            header("location: myprofile.php");
            exit();
        }
    } else {
        die("Update failed: " . mysqli_error($mysql));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Edit Profile </title>
    <link rel="icon" href="image/coursefavicon.png">

    <style>
      #profile-pic {
        margin-left:40px;
        width: 120px; /* Set a fixed width */
        height: auto; /* Maintain aspect ratio */
        max-height: 130px; /* Set a maximum height if needed */
        border-radius: 5px; /* Apply border-radius if desired */
        border:outset;
        border-color:grey;
    }
    .center1 {
          margin-left: 35%;
          margin-right: auto;
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
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="stylesheet" href="css/coursecrud.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <div class="title">Edit Profile<button type="button" class="btn-close" aria-label="Close">&#10006;</button></div>
    <div class="content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="center1">
        <div class="card">
            <img src="image/<?php echo $img; ?>" id="profile-pic" >
            <label for="input-file">Add Image</label>
            <input type="file" name="img" accept="image/jpg, image/jpeg, image/png" id="input-file" >
        </div>
      </div>
          <div class="input-box">
          <span class="details">Student Full Name</span>
            <input type="text" name="sname" placeholder=" " value="<?php echo $sname; ?>" required>
            </div>
            <div class="input-box">
           <span class="details">Username</span>
            <input type="text" name="username" placeholder=" "  value="<?php echo $username; ?>" readonly>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="bod"  value="<?php echo $bod; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="gender" required>
              <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male </option>
              <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
              <option value="Other" <?php if($gender == 'Other') echo 'selected'; ?>>Other</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name="city" placeholder=" " value="<?php echo $city; ?>" readonly>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="state" placeholder=" " value="<?php echo $state; ?>" readonly>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="mno" placeholder=" " value="<?php echo $mno; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Admission Date</span>
            <input type="date" name="adm_date" value="<?php echo $adm_date; ?>" readonly>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="btnedit" value="Done">
        </div>
      </form>
    </div>
  </div>
 <script>
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    inputFile.onchange = function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0]);
    }

  </script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'index.php'; // Redirect to course.php
        });
</script>
