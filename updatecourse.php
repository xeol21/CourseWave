<?php
 if(isset($_GET['cid'])){
 $cid=$_GET['cid'];
 require("connect.php");
 $q="select * from course where cid='$cid'";
 $result=mysqli_query($mysql,$q);
 $r=mysqli_fetch_array($result);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/coursefavicon.png">

    <title>Update Course Details</title>

    <style>
        body{
        color: #222;
        background-image: radial-gradient(farthest-side, #afc8f9 90%, #fff0), radial-gradient(farthest-side, #ddc1fb 90%, #fff0), radial-gradient(circle at 0 0, #d5e0fa, #e5d5f6) !important;
        background-size: 7rem 7rem, 6rem 6rem, auto;
        background-position: 30% 10%, 80% 90%, 0;
        background-repeat: no-repeat;
        backdrop-filter: blur(50px);
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        h1{
        font-size: 24px;
        text-shadow: -1px -1px #eee, 1px 1px #888, -3px 0 4px #000;
        font-family:"Segoe print", Arial, Helvetica, sans-serif;
        color:#ccc;
        padding:16px;
        font-weight:lighter;
        -moz-box-shadow: 2px 2px 6px #888;  
        -webkit-box-shadow: 2px 2px 6px #888;  
        box-shadow:2px 2px 6px #888;  
        text-align:center;
        display:inline;
        line-height:92px;
        background-image:url(image/book.jpg);
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button{
        padding: 12px 40px;
        border-radius: 8px;
        box-shadow: 2px 2px 2px 1px rgb(131, 131, 219) ;
        border: 1px solid gray;
        font-size: 15px;
        color: black;
        }

        button:hover{
        background-color: skyblue;
        color: rgb(246, 244, 248);
        }


</style>
</head>
<body>
<center>
        <h1>Update Course Details</h1>
                <form action="updatecourse.php?cid=<?php echo $cid; ?>" method="post">
                <table align="center" cellspacing="10" cellpadding="10" border="5">
                    <tr>
                    <!-- <input type="hidden" name="cid" value="<?php echo $r['cid']; ?>"> -->
                    <td>Course Name </td>
                    <td><input type="text" name="cname" required value="<?php echo $r['cname']; ?>"></td>
                    </tr>
                    <tr>
                    <td>Description </td>
                    <td><input type="text" name="cdesc" required value="<?php echo $r['cdesc']; ?>"></td>
                    </tr>
                    <tr>
                    <td>Price </td>
                    <td><input type="text" name="price" required value="<?php echo $r['price']; ?>"></td>
                    </tr>
                    <tr>
                    <td>Credit </td>
                    <td><input type="text" name="credit" required value="<?php echo $r['credit']; ?>"></td>
                    </tr>
                    <tr>
                    <td>Status </td>
                    <td><input type="text" name="cstatus" required value="<?php echo $r['cstatus']; ?>"></td>
                    </tr>
                    <tr>
                    <td> 
                    <button type="submit" name="update">Save</button>
                    </td>
                    <td><a href="courses.php"> <button type="button" name="back">Back</button></a></td> 
                    </tr>
            </table>
            </br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    </center>

</body>
</html>

<?php
 if(isset($_REQUEST['update'])){
 $cname=$_REQUEST['cname'];
 $cdesc=$_REQUEST['cdesc'];
 $price=$_REQUEST['price'];
 $credit=$_REQUEST['credit'];
 $cstatus=$_REQUEST['cstatus'];
 require("connect.php");
 $q="update course set cname='$cname',cdesc='$cdesc',price='$price',credit='$credit',cstatus='$cstatus' 
where cid='$cid'";
 if(mysqli_query($mysql,$q)){
    echo "<script>
      alert('Course Updated successfully!');
      // Redirect to courses.php after the alert
      window.location.href = 'courses.php';
      </script>";
 }
 else
 die("Errror!!!".mysqli_error($mysql));
 }
?>
