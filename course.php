<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("location: login.php");
    exit();
}
    if(isset($_POST['Logout'])){
        // Log the logout date and time in the studentlog table
        date_default_timezone_set('Asia/Kolkata');
        $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("could not connect database");
        $logoutTime = date("Y-m-d h:i:s");
        // Fetch the user's login date and time from the studentlog table
    $loginQuery = "SELECT logid FROM studentlog ORDER BY logid DESC LIMIT 1";
    $loginResult = mysqli_query($mysql, $loginQuery);

    if ($loginRow = mysqli_fetch_assoc($loginResult)) {
        $loginId = $loginRow['logid'];

        // Update the existing record with logout time
        $updateQuery = "UPDATE studentlog SET logout = '$logoutTime' WHERE logid = $loginId";
        mysqli_query($mysql, $updateQuery) or die(mysqli_error($mysql));
    }

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

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!--feedback-->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'>
    
    <style>
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
        /* Modern style for h1 tag */
h1 {
    font-family: 'Ubuntu', sans-serif; /* Use Google Font */
    font-weight: 700; /* Set font weight to bold */
    font-size: 3rem; /* Set font size */
    color: #007bff; /* Set font color */
    text-transform: uppercase; /* Transform text to uppercase */
    text-align: center; /* Center-align the text */
    margin-top: 50px; /* Add some top margin for spacing */
    margin-bottom: 30px; /* Add some bottom margin for spacing */
    position: relative; /* Set position relative for absolute positioning of pseudo-element */
    letter-spacing: 2px; /* Add letter spacing for better readability */
}

/* Add underline effect on hover */
h1::before {
    content: ''; /* Add empty content for pseudo-element */
    position: absolute; /* Set position absolute to position the pseudo-element */
    bottom: -5px; /* Position the pseudo-element slightly below the text */
    left: 0; /* Position the pseudo-element starting from the left */
    width: 100%; /* Set width to cover the entire width of the text */
    height: 2px; /* Set height for the underline */
    background-color: #007bff; /* Set color of the underline */
    transform: scaleX(0); /* Initially scale the underline to 0 to hide it */
    transition: transform 0.3s ease; /* Add transition for smooth effect */
}

/* Scale up the underline on hover */
h1:hover::before {
    transform: scaleX(1); /* Scale up the underline to show on hover */
}

/* Add shadow effect */
h1 {
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Add shadow effect */
}

/* Add pulse effect */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

h1:hover {
    animation: pulse 1s infinite; /* Apply pulse animation on hover */
}

       /* Search bar styles */
.input-group {
    margin-bottom: 20px;
    position: relative;
}

.form-control {
    border-radius: 30px;
    border-color: #ced4da;
    box-shadow: none;
    padding: 10px 20px; /* Adjust padding for better appearance */
    transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Add transition for smooth effect */
    background-color: #f8f9fa; /* Set background color */
}

.form-control:focus {
    border-color: #007bff; /* Change border color on focus */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Add shadow on focus */
}
    /* Search button specific styles */
.btn-search {
    border: none;
    border-radius: 30px;
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.btn-search:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

.btn-search:focus {
    outline: none;
}

.btn-search:active {
    transform: translateY(0);
    box-shadow: none;
}


    /* Search icon styles */
    .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        cursor: pointer;
    }

    .card {
    height: 480px; /* Adjust the height as needed */
}

/* Styles for instructor name */
.instructor-name {
    font-weight: bold;
    margin-bottom: 8px; /* Increase space below the name */
    color: #2c3e50; /* Dark blue color */
}

/* Styles for instructor title */
.instructor-title {
    font-style: italic;
    font-weight: 400;
    color: #7f8c8d; /* Light gray color */
    font-size: 0.9em;
    margin-left: 2.5em;
    opacity: 0.8;
    transition: opacity 0.3s ease;
    margin-top: -3px; /* Adjust spacing with name */
}

/* Hover effect */
.instructor-title:hover {
    opacity: 1;
}
.small-avatar {
    width: 2em;
    border-radius: 200px;
    outline: 2px solid white;
    margin-right: 0.4em;
}

    </style>
    <title>Courses</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"></a>
        <img src="image/coursewave-high-resolution-logo-transparent (1).png" width="110" height="auto">
        <span class="navbar-text">Learn and Implement</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="myprofile.php" class="nav-link">My Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="feedback.php" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="contactus.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item custom-nav-item"><a href="changepass.php" class="nav-link">Change Password</a></li>
                <li class="nav-item custom-nav-item">
                  <form method="POST">
                  <button name="Logout" class="logout-btn">Logout</button>
                  </form>
                </li>
            </ul>
        </div>
    </nav>
    
<!-- start courses -->
<div class="container mt-5">
        <h1 class="text-center">All Courses</h1>
        <!-- Search bar -->
    <form id="searchForm" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control rounded-pill py-2" placeholder="Search for a course" name="search"> <br>
            <button type="submit" class="btn btn-search rounded-pill py-2 px-4 ms-2">Search</button>
        </div>
    </form>
        <?php
        // Function to check if the user is enrolled in a specific course
            function isEnrolled($username, $courseName, $mysql)
            {
                $query = "SELECT * FROM fees WHERE username = '$username' AND course = '$courseName'";
                $result = mysqli_query($mysql, $query);
                return mysqli_num_rows($result) > 0;
            }

            // Function to check if the course is available
            function isCourseAvailable($courseStatus)
            {
                return strtolower($courseStatus) === 'available';
            }

        require("connect.php");

        // Fetch search query
    $search = isset($_GET['search']) ? $_GET['search'] : '';
// Query for fetching courses with instructor details
$q = "SELECT * from course";

    // Append search condition if search query is provided
    if (!empty($search)) {
        $q .= " WHERE cname LIKE '%$search%'";
    }

    $result = mysqli_query($mysql, $q) or die("Query Failed!!!");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

        <!--start courses -->
        <div class="card-deck mt-4">
                <div class="card">
                    <img src="image/<?php echo $row['cimg']; ?>" class="card-img-top" width="300" height="200" alt="<?php echo $row['cname']; ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cname']; ?></h5>
                            <p class="card-text"><?php echo $row['cdesc']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price:<small> &#8377 <?php echo $row['price']; ?></small></p>
                            <?php
                            if (isCourseAvailable($row['cstatus'])) {
                            if (isEnrolled($username, $row['cname'], $mysql)) {
                                echo '<button class="btn btn-success text-white font-weight-bolder float-right" disabled>Enrolled</button>';
                                echo '<a href="unenroll.php?course=' . $row['cname'] . '" class="btn btn-danger text-white font-weight-bolder float-right" style="margin-left: 140px;"><i class="fas fa-minus"></i></a>';
                            } else {
                                echo '<a class="btn btn-primary text-white font-weight-bolder float-right " href="pyment.php?course=' . $row['cname'] . '&price=' . $row['price'] . '">Enroll</a>';
                            }
                        }else{
                            echo '<button class="btn btn-secondary text-white font-weight-bolder float-right" disabled>Unavailable</button>';
                        }
                            ?>                            
                            </div>
                            <form method="POST" action="get_course_details.php">
            <input type="hidden" name="course_id" value="<?php echo $row['cid']; ?>">
            <button type="submit" class="btn btn-link btn-course-details">View Details</button>
        </form>
                    </div>               
                 </div>
                <?php
            }
        } else {
            echo "<p>No courses available</p>";
        }
        // If no search query provided, display all courses
    if (empty($search)) {
        $q = "SELECT * FROM course";
        $result = mysqli_query($mysql, $q) or die("Query Failed!!!");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display all courses as before
            }
        } else {
            echo "<p>No courses available</p>";
        }
    }
        ?>
    </div>
</br>
 <!-- end courses-->
<br>
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="studaboutus.php">About Us</a>
                    <a class="btn btn-link" href="contactus.php">Contact Us</a>
                    <a class="btn btn-link" href="learnmstud.php">Learn More</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <h3><p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, surat , India</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>CourseWave@123.com</p></h3>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/a.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/b.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/c.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/d.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/e.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="image/f.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Follow Us</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <!-- Add your social media icons and links here -->
                        <a href="https://www.instagram.com/x_.oel3/" class="text-light"><i class="bi bi-instagram"></i></a>
                    </div>
                    <div class="col-4">
                        <a href="https://twitter.com/x_oel3" class="text-light"><i class="bi bi-twitter"></i></a>
                    </div>
                    <div class="col-4">
                        <!-- GitHub icon linked to your GitHub profile -->
                        <a href="https://github.com/xeol21" target="_blank" class="text-light"><i class="bi bi-github"></i></a>
                    </div>
                    <div class="col-4">
                        <!-- WhatsApp icon linked to your WhatsApp profile with pre-filled message -->
                        <a href="https://wa.me/+918799363780" target="_blank" class="text-light"><i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Copyright 2024,CourseWave.All Right Reseverd</a>
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
    // Remove the search query parameter from the URL after page load
    window.addEventListener('load', function() {
        var url = window.location.href;
        var index = url.indexOf('?');
        if (index !== -1) {
            var newUrl = url.substring(0, index);
            window.history.replaceState({}, document.title, newUrl);
        }
    });
</script>
</body>
</html>