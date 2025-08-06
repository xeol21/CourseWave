<?php
if(isset($_GET['nid'])){
    $nid=$_GET['nid'];
require("connect.php");
$q = "delete from news where nid='$nid'";
if(mysqli_query($mysql, $q)) {
header("location:news.php");
} else {
die("Deletion Failed!!! " . mysqli_error($mysql));
}
}
?>
