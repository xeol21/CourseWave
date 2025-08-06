<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("location: adlogin.php");
    exit();
}
if(isset($_REQUEST['btnadd'])){
  $cname=$_REQUEST['cname'];
  $cdesc=$_REQUEST['cdesc'];
  $price=$_REQUEST['price'];
  $credit=$_REQUEST['credit'];
  $cstatus=$_REQUEST['cstatus'];
  $image=$_FILES['image']['name'];
  $tmp=$_FILES['image']['tmp_name'];
  $mysql=mysqli_connect("localhost","root","","coursewave") or die("Could Not connect..!!");
  $q="insert into course values(null,'$cname','$cdesc','$price','$credit','$cstatus','$image')";
  $res= mysqli_query($mysql,$q);
  if($res){
    if(move_uploaded_file("$tmp","./img".$image)){
      echo "<script>
      alert('Course added successfully!');
      // Redirect to courses.php after the alert
      window.location.href = 'courses.php';
      </script>";
    }
  }
  else{
    die ("Insertion failed".mysqli_error($mysql));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="image/coursefavicon.png">

<head>
    <meta charset="UTF-8">  
    <title>Manage Courses </title>
    <style>
      .btn {
  background-color: #9b59b6;
  color: white;
  padding: 10px;
  border: none;
  width: 100%;
  border-radius: 4px;
  cursor: pointer;
  font-size: 20px;
}
        .center {
          margin-left: 12%;
          margin-right: auto;
        }
        .center1 {
          margin-left: 35%;
          margin-right: auto;
        }
        .centerb {
          width: 70%;
          margin-left: 15%;
          margin-right: auto;
        }
        #profile-pic {
        margin-left:35px;
        width: 130px; /* Set a fixed width */
        height: auto; /* Maintain aspect ratio */
        max-height: 130px; /* Set a maximum height if needed */
        border-radius: 5px; /* Apply border-radius if desired */
        border:outset;
        border-color:grey;
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
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="stylesheet" href="css/coursecrud.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <div class="title"> Add Course <button type="button" class="btn-close" aria-label="Close">&#10006;</button></div>
    <div class="content">
      <form action="#" method="post" enctype="multipart/form-data">
      <div class="center1">
      <div class="card">
            <img src="image/course.png" id="profile-pic">
            <label for="input-file">Add Image</label><input type="file" name="image" accept="image/jpg, image/jpeg, image/png" id="input-file"  required>
          </div>
      </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Course Name</span>
            <input type="text" name="cname" placeholder="Enter course name" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" name="cdesc" placeholder="Enter details" required>
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <input type="text" name="price" placeholder="Enter price" required>
          </div>
          <div class="input-box">
            <span class="details">Credit</span>
            <input type="text" name="credit" placeholder="Enter credit" required>
          </div>
          <div class="custom-select">
            <span class="details">Status</span>
            <select name="cstatus" id="cstatus">
            <option value="">Choose Status</option>
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>
              <?php
                foreach($status as $t){
                echo "<option>$t</option>";
                }
              ?>
            </select>
          </div>
          <div class="centerb">
        <div class="button"> 
          <input type="submit" name="btnadd" value="Add Course">
        </div>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'courses.php'; // Redirect to course.php
        });
</script>
</body>
</html>
