<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("location: adlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/coursefavicon.png">

    <title>Manage News </title>
    <style>

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
        margin-left:25px;
        width: 150px; /* Set a fixed width */
        height: auto; /* Maintain aspect ratio */
        max-height: 150px; /* Set a maximum height if needed */
        border-radius: 5px; /* Apply border-radius if desired */
        border:outset;
        border-color:grey;
    }
</style>
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="stylesheet" href="css/coursecrud.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <div class="title"> Publish News</div>
    <div class="content">
      <form action="#" method="post" enctype="multipart/form-data">
      <div class="center1">
      <div class="card">
            <img src="image/news.png" id="profile-pic">
            <label for="input-file">Add Image</label>
            <input type="file" name="nimg" accept="image/jpg, image/jpeg, image/png" id="input-file"  width="200px" height="100px" required>
          </div>
      </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">News Title</span>
            <input type="text" name="ntitle" placeholder="Enter news title" required>
          </div>
          <div class="input-box">
            <span class="details">Description</span>
            <input type="text" name="ndesc" placeholder="Enter details" required>
          </div>
          <div class="input-box">
            <span class="details">Publishing Date</span>
            <input type="date" name="pdate" required>
          </div>
          <div class="centerb">
        <div class="button"> 
          <input type="submit" name="btnpub" value="Publish">
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
</body>
</html>

<?php
require("connect.php");
if(isset($_REQUEST['btnpub'])){
  $ntitle=$_REQUEST['ntitle'];
  $ndesc=$_REQUEST['ndesc'];
  $pdate=$_REQUEST['pdate'];
  $nimg=$_FILES['nimg']['name'];
  $tmp=$_FILES['nimg']['tmp_name'];
  $q="insert into news
  values(null,'$ntitle','$ndesc','$pdate','$nimg')";
  $res= mysqli_query($mysql,$q);
  if($res){
    if( move_uploaded_file("$tmp","./img".$nimg)){
    header("location:news.php");
  }
}
  else{
  die ("Insertion failed".mysqli_error($mysql));
  }
  }
?>