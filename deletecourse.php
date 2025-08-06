<?php
if(isset($_GET['cid'])){
    $cid=$_GET['cid'];
require("connect.php");
$q = "delete from course where cid='$cid'";
if(mysqli_query($mysql, $q)) {
header("location:courses.php");
} else {
die("Deletion Failed!!! " . mysqli_error($mysql));
}
}
?>
