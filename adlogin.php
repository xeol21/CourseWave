<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form </title>
  <style>
    /* login css */
   /* login css */
   *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url(image/bg.jpg) no-repeat;
  background-size: cover;
  background-position: center;
}
.wrapper{
  width: 420px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(9px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
}
.wrapper h1{
  font-size: 40px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  
  margin: 30px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 20px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: #fff;
}
.input-box i{
  position: absolute;
  right: 20px;
  top: 30%;
  transform: translate(-50%);
  font-size: 20px;

}
.wrapper .remember-forgot{
  display: flex;
  justify-content: space-between;
  font-size: 15.5px;
  margin: -15px 0 15px;
}
.remember-forgot label input{
  accent-color: #fff;
  margin-right: 3px;

}
.remember-forgot a{
  color: #fff;
  text-decoration: none;

}
.remember-forgot a:hover{
  text-decoration: underline;
}
.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 20px;
  color: #333;
  font-weight: 600;
}
.wrapper .register-link{
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;

}
.register-link p a{
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover{
  text-decoration: underline;

}
  </style>
    <link rel="icon" href="image/coursefavicon.png">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="post">
      <h1>Admin Login</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="pwd" placeholder="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <a href="adforgotpwd.php">Forgot Password</a>
      </div>
      <button type="submit" name="btnsub" class="btn">Login</button>
   
    </form>
  </div>
</body>
</html>
<?php
session_start(); // Start the session

if(isset($_POST['btnsub'])){
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
    $mysql=mysqli_connect("localhost","root","","coursewave") or die("Could Not connect..!!");
    $q="select * from adlogin where username='$username' and password='$pwd'";
    $res= mysqli_query($mysql,$q);
    if(mysqli_fetch_array($res)>0){
      // Store the username in the session
      $_SESSION['username'] = $username;
    header("location:addashboard.php");
    exit();
    }
else{
    echo "<script>
        alert('You are not valid user!please try again!!!...');
    </script>";
    }
}
?>
