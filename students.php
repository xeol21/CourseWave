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
 <title>Students</title>
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

  /* Pagination styles */
  .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: #fff;
        background-color: #505050;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        margin: 0 5px;
    }

    .pagination a:hover {
        background-color: #333;
    }

    .pagination .current {
        background-color: #333;
        color: #fff;
        font-weight: bold;
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
    <?php
    require("connect.php");

    // Set the number of records per page
    $recordsPerPage = 4;

    // Determine the current page
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $recordsPerPage;

    $q="SELECT * FROM tblreg ORDER BY sname LIMIT $offset, $recordsPerPage";
    $result=mysqli_query($mysql,$q) or die("Query Failed!!!");
    
    if(mysqli_num_rows($result)>0){
        echo "<table id='studentTable' border=5 cellspacing=10 cellpadding=10>";
        echo"<caption>All Students</caption>";
        echo "
        <tr>
        <th scope='col' onclick='sortTable(0)'>Student Name <span id='sortIcon'>&#9650;</span></th>
        <th scope='col' onclick='sortTable(1)'>Birthdate</th>
        <th scope='col' onclick='sortTable(2)'>Gender</th>
        <th scope='col' onclick='sortTable(3)'>City</th>
        <th scope='col' onclick='sortTable(4)'>State</th>
        <th scope='col' onclick='sortTable(5)'>Contact No</th>
        <th scope='col' onclick='sortTable(6)'>Admission Date</th>
        <th scope='col'></th>
        </tr>";

        while ($r = mysqli_fetch_array($result)) {
            echo "<tr> 
            <td>$r[3]</td>
            <td>$r[4]</td>
            <td>$r[5]</td>
            <td>$r[6]</td>
            <td>$r[7]</td>
            <td>$r[8]</td>
            <td>$r[9]</td>
            <td> <center><img src='image/$r[10]' height='100px' width='100px'></center></td>
            </tr>";
        }
        echo "</table>";

        // Display pagination links
    $qTotal = "SELECT COUNT(*) as total FROM tblreg";
    $resultTotal = mysqli_query($mysql, $qTotal);
    $rowTotal = mysqli_fetch_assoc($resultTotal);
    $totalRecords = $rowTotal['total'];

    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='" . ($i == $page ? 'current' : '') . "'><a href='students.php?page=$i'>$i</a> ";
    }
    echo "</div>";
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
