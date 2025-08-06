<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("location: adlogin.php");
    exit();
}
if(isset($_POST['Logout'])){
    session_destroy();
    header("location:main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>News</title>
 <link rel="icon" href="image/coursefavicon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
 
 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="css/all.min.css">
 
 <!-- Swiper CSS -->
 <link rel="stylesheet" href="css/swiper-bundle.min.css" />
 
 <!-- Boxicons CSS -->
 <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
 
 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
 
 <!-- Custom CSS -->
 <link rel="stylesheet" href="css/style.css">
 <style>
    body {
        color: #222;
        background-image: radial-gradient(farthest-side, #afc8f9 90%, #fff0), radial-gradient(farthest-side, #ddc1fb 90%, #fff0), radial-gradient(circle at 0 0, #d5e0fa, #e5d5f6) !important;
        background-size: 7rem 7rem, 6rem 6rem, auto;
        background-position: 30% 10%, 80% 90%, 0;
        background-repeat: no-repeat;
        backdrop-filter: blur(50px);
    }
    .logout-btn {
            background-color: transparent;
            border: none;
            font-size: 1em;
            color: #fff;
            cursor: pointer;
            margin-left: 5px;
            margin-right: 5px;
            margin-top:5px;
            border-radius: 10px;
            padding:2px 3px;
            text-align: center;
        }
        caption {
            text-align:center;
  }

                /* Add these styles for the table */
                table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px; /* Adjust the margin as needed */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #505050;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Add specific style for the last column */
td:last-child {
    text-align: center;
    padding: 5px; /* Adjust padding as needed */
}

/* Style for images inside the last column */
td:last-child img {
    max-width: 100px; /* Limit maximum width of images */
    max-height: 100px; /* Limit maximum height of images */
    border-radius: 10px; /* Add rounded corners to images */
    border: 3px solid #fff; /* Border around the images */
    margin: 0 auto; /* Center the images */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add a subtle shadow effect */
    transition: transform 0.3s ease; /* Add a smooth transition effect */
}

/* Hover effect for images */
td:last-child img:hover {
    transform: scale(1.1); /* Scale the image up on hover */
}

     /* Add specific style for the first three columns */
td:nth-child(-n+2) {
    text-align: center;
    padding: 5px; /* Adjust padding as needed */
}

/* Style for image buttons in the first three columns */
td:nth-child(-n+2) img {
    width: 30px; /* Set width of images */
    height: 30px; /* Set height of images */
    border-radius: 5px; /* Add border radius for rounded corners */
    cursor: pointer; /* Change cursor to pointer on hover */
    transition: transform 0.2s ease, box-shadow 0.2s ease; /* Add smooth transition effect */
    border: 1px solid #ccc; /* Add border */
    background-color: #f0f0f0; /* Add background color */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
}

td:nth-child(-n+2) img:hover {
    transform: scale(1.1); /* Scale up image slightly on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

.navbar-brand img {
        margin-right: 5px !important;
        margin-left: 5px !important;
    }

 </style>

</head>
<body>

<!-- Start navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
    <img src="image/coursewave-high-resolution-logo-transparent (1).png" width="110" height="auto"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-nav">
            <li class="nav-item custom-nav-item"><a href="addashboard.php" class="nav-link">Home</a></li>
            <li class="nav-item custom-nav-item"><a href="instructor.php" class="nav-link">Instructors</a></li>
            <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Manage Course</a></li>
            <li class="nav-item custom-nav-item"><a href="students.php" class="nav-link">Students</a></li>
            <li class="nav-item custom-nav-item"><a href="adstudlog.php" class="nav-link">Student Logs</a></li>
            <li class="nav-item custom-nav-item"><a href="adenroll.php" class="nav-link">View Enroll</a></li>
            <li class="nav-item custom-nav-item"><a href="news.php" class="nav-link">Manage News</a></li>
            <li class="nav-item custom-nav-item"><a href="adcontactus.php" class="nav-link">View Contacts</a></li>
            <li class="nav-item custom-nav-item"><a href="adfeedbacks.php" class="nav-link">View Feedback</a></li>
            <li class="nav-item custom-nav-item">
                <form method="POST">
                <button name="Logout" class="logout-btn">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- End navigation -->

<center>
 <h1> Manage News</h1>
 <?php
require("connect.php");
$q="select * from news";
 $result=mysqli_query($mysql,$q) or die("Query Failed!!!");
 if(mysqli_num_rows($result)>0){
 echo "<table border=5 cellspacing=10 cellpadding=10>";
 echo"<caption>All News</caption>";
 echo "<tr>
 <th scope='col'></th>
 <th scope='col'></th>
 <th scope='col'>News Title</th>
 <th scope='col'>Description</th>
 <th scope='col'>Publishing Date</th>
 <th scope='col'></th>
 </tr>";
 while($r=mysqli_fetch_array($result)){
 //print_r($r); 
 echo "<tr> 
 <td scope='row'><a href='addnews.php'><img src='image/add.png' height='30px' width='30px'></a></td>
 <td scope='row'><a href='deletenews.php?nid=$r[0]'><img src='image/trash.png' height='30px' width='30px'></a></td>
 <td>$r[1]</td>
 <td>$r[2]</td>
 <td>$r[3]</td>
 <td><img src='image/$r[4]' height='100px' width='100px'></td>
 </tr>";
 }
 echo "</table>";
 
 }
?>
</center>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 wow fadeIn" data-wow-delay="0.1s">                
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Copyright 2024,CourseWave.All Right Reseverd</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="addashboard.php">Home</a>
                        </div>
                    </div>
                  </br>
                    <br>
                     <!-- Back to Top -->
                    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">Back To Top<i class="bi bi-arrow-up"></i></a>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<!-- jQuery and Bootstrap JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome JS -->
<script src="js/all.min.js"></script>

<script>
    var sortOrder = 1;

    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("studentTable");
        switching = true;

        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                var xText = x.innerText || x.textContent;
                var yText = y.innerText || y.textContent;

                if (sortOrder === 1) {
                    if (xText.toLowerCase() > yText.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (xText.toLowerCase() < yText.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }

        // Toggle the sort order and update the sort icon
        sortOrder = 1 - sortOrder;
        var sortIcon = document.getElementById("sortIcon");
        sortIcon.innerHTML = sortOrder === 1 ? "&#9650;" : "&#9660;";
    }
</script>
</body>
</html>