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

<!-- Add this line to include Bootstrap Icons library -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

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
        .card-body {
    font-size: 14px; /* Adjust the font size as needed */
}

.card-title{
    font-size: 21px; /* Adjust the font size as needed */

}
.card-text {
    font-size: 16px; /* Adjust the font size as needed */
}


 /* Modern style for greeting, welcome message, and tagline */
.greeting-section {
    text-align: center;
    margin-top: 40px;
}

.greeting {
    font-size: 2.5rem; /* Increase font size */
    margin-bottom: 5px;
    color: #fff; /* Set font color */
    font-weight: 700; /* Set font weight to bold */
    animation: slideInDown 1s ease; /* Add animation */
}

.welcome-message {
    font-size: 2rem; /* Increase font size */
    margin-bottom: 20px;
    color: #fff; /* Set font color */
    font-weight: 500; /* Set font weight to semi-bold */
    animation: slideInUp 1s ease; /* Add animation */
}

.tagline {
    font-size: 1.2rem; /* Increase font size */
    color: #ccc; /* Set font color */
    animation: fadeIn 1s ease; /* Add animation */
}

/* Keyframes for animation */
@keyframes slideInDown {
    0% {
        transform: translateY(-100%);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideInUp {
    0% {
        transform: translateY(100%);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}


.count-box {
    background-color: #f8f9fa; /* Background color */
    border: 3px solid #dee2e6; /* Border color */
    border-radius: 10px; /* Border radius */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Box shadow */
    transition: all 0.3s ease; /* Transition effect */
    overflow: hidden; /* Ensure that content doesn't overflow */
}

.count-box:hover {
    transform: translateY(-5px); /* Move the box up on hover */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Increase box shadow on hover */
}

.count-box:hover:nth-child(1) {
    background-color: #b3daff; /* Light blue shade for first box */
}

.count-box:hover:nth-child(2) {
    background-color: #99ccff; /* Light blue shade for second box */
}

.count-box:hover:nth-child(3) {
    background-color: #80bfff; /* Light blue shade for third box */
}

.count-box .card-body {
    padding: 30px; /* Padding inside the card body */
    transition: all 0.3s ease; /* Transition effect */
}

.count-box .card-title {
    margin-bottom: 20px; /* Bottom margin for the title */
    font-size: 30px; /* Font size for the title */
    transition: all 0.3s ease; /* Transition effect */
}

.count-box .card-subtitle {
    font-size: 25px; /* Font size for the count number */
    color: #007bff; /* Text color for the count number */
    transition: all 0.3s ease; /* Transition effect */
}

.count-box .card-subtitle span {
    font-weight: bold; /* Bold font for the count number */
    transition: all 0.3s ease; /* Transition effect */
}

.count-box .card-text {
    font-size: 16px; /* Font size for the description */
    transition: all 0.3s ease; /* Transition effect */
}

/* Modern style for h1 tag */
.header-title {
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
.header-title::before {
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
.header-title:hover::before {
    transform: scaleX(1); /* Scale up the underline to show on hover */
}

/* Add shadow effect */
.header-title {
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

.header-title:hover {
    animation: pulse 1s infinite; /* Apply pulse animation on hover */
}

/* CSS for the slideshow container */
.slideshow-container {
    width: 500px;
    height: 500px;
    position: relative;
    overflow: hidden;
}

/* CSS for the slides */
.mySlides {
    display: none;
}

/* CSS for the fade animation effect */
.fade {
    animation-name: fade;
    animation-duration: 2s; /* Adjust animation duration as needed */
}

/* Keyframes for fade animation */
@keyframes fade {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
.news-info {
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background */
        border-radius: 10px; /* Add rounded corners */
        margin-top: -50px; /* Adjust position to overlap with the image */
        position: relative; /* Position relative to the image */
        text-align: left; /* Align text to the left */
    }

    .news-info h2 {
        font-size: 24px; /* Set the font size for the title */
        margin-bottom: 10px; /* Add some space below the title */
        font-weight: bold; /* Make the title bold */
    }

    .news-info p {
        font-size: 16px; /* Set the font size for the description and date */
        line-height: 1.5; /* Add some spacing between lines */
        margin-bottom: 10px; /* Add some space below paragraphs */
    }

    .social-icon {
  font-size: 30px; /* Adjust the icon size as needed */
  transition: all 0.3s ease-in-out; /* Add smooth transition effect */
}

/* Hover effect */
.social-icon:hover {
  transform: scale(1.2); /* Scale the icon on hover */
}

/* Instagram hover effect */
.foot-ig:hover .bi-instagram {
  color: #bc2a8d; /* Change color on hover */
}

/* WhatsApp hover effect */
.foot-whatsapp:hover .bi-whatsapp {
  color: #25D366; /* Change color on hover */
}

/* Twitter hover effect */
.foot-twitter:hover .bi-twitter {
  color: #57a1eb; /* Change color on hover to sky blue */
}

/* GitHub hover effect */
.foot-github:hover .bi-github {
  color: #6e5494; /* Change color on hover to purple */
}

/* Spotify hover effect */
.foot-spotify:hover .bi-spotify {
  color: #1DB954; /* Change color on hover to purple */
}
    </style>

    <title>CourseWave</title>
</head>
<body>


 <!-- Start navigation -->
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
                <li class="nav-item custom-nav-item"><a href="contactus.php" class="nav-link">Contact US</a></li>
                <li class="nav-item custom-nav-item"><a href="changepass.php" class="nav-link">Change Password</a></li>
                <li class="nav-item custom-nav-item">
                  <form method="POST">
                  <button name="Logout" class="logout-btn">Logout</button>
                  </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End navigation -->


    <!-- start video background -->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/banvid.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
        <?php
        // Get the current hour
        date_default_timezone_set('Asia/Kolkata');
        $currentHour = date("G");

        // Display a greeting message based on the time of the day
        if ($currentHour >= 5 && $currentHour < 12) {
            $greeting = "Good morning";
        } elseif ($currentHour >= 12 && $currentHour < 17) {
            $greeting = "Good afternoon";
        } elseif ($currentHour >= 17 && $currentHour < 20) {
            $greeting = "Good evening";
        } else {
            $greeting = "Good night";
        }
        ?>
        <!-- Greeting Section -->
<div class="greeting-section">
    <h1 class="greeting">Hello, <?php echo $greeting; ?>, <?php echo $username; ?>!</h1>
    <h2 class="welcome-message">Welcome to CourseWave</h2>
    <p class="tagline">Learn and Implement</p>
</div>
        </div>
    </div>
    <!-- end video background -->



    <!--start text banner  -->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fa-solid fa-indian-rupee-sign mr-3"></i> Money Back Guarantee*</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-comment mr-3"></i> Reliable Feedbacks</h5>
            </div>
        </div>
    </div>
    <!--end text banner  -->
    <br>
<!-- Placeholder for counts -->

<?php
require("connect.php"); // Assuming this file contains your database connection

// Count of students
$q1 = "SELECT COUNT(*) AS student_count FROM tblreg";
$result1 = mysqli_query($mysql, $q1) or die("Query Failed!!!");
$row1 = mysqli_fetch_assoc($result1);
$student_count = $row1['student_count'];

// Count of courses
$q2 = "SELECT COUNT(*) AS course_count FROM course";
$result2 = mysqli_query($mysql, $q2) or die("Query Failed!!!");
$row2 = mysqli_fetch_assoc($result2);
$course_count = $row2['course_count'];

// Count of feedbacks
$q3 = "SELECT COUNT(*) AS feedback_count FROM feedback";
$result3 = mysqli_query($mysql, $q3) or die("Query Failed!!!");
$row3 = mysqli_fetch_assoc($result3);
$feedback_count = $row3['feedback_count'];
?>

<br><br><br><h1 class="header-title">Education Analytics Dashboard</h1>

<div id="counts-container" class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="count-box animated fadeInLeft">
                <div class="card-body">
                    <h5 class="card-title">Happy Students</h5>
                    <div class="count-info">
                        <span class="card-subtitle"><i class="fas fa-smile"></i> <span id="happy-students-count">0</span></span>
                        <p class="card-text">Number of students satisfied with our courses.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="count-box animated fadeInUp">
                <div class="card-body">
                    <h5 class="card-title">Available Courses</h5>
                    <div class="count-info">
                        <span class="card-subtitle"><i class="fas fa-book"></i> <span id="courses-count">0</span></span>
                        <p class="card-text">Total number of courses available for learning.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="count-box animated fadeInRight">
                <div class="card-body">
                    <h5 class="card-title">Daily Feedbacks</h5>
                    <div class="count-info">
                        <span class="card-subtitle"><i class="fas fa-comment"></i> <span id="feedbacks-count">0</span></span>
                        <p class="card-text">Number of feedbacks received from students .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php mysqli_close($mysql); // Close the database connection ?>

<script>
    // Function to animate counting effect
    function animateCount(target, count) {
        let currentCount = 0;
        const increment = Math.ceil(count / 150); // Adjust animation speed here

        const interval = setInterval(() => {
            currentCount += increment;
            if (currentCount >= count) {
                clearInterval(interval);
                currentCount = count;
            }
            target.textContent = currentCount;
        }, 150); // Adjust animation speed here
    }

    // Get the count elements
    const happyStudentsCount = document.getElementById('happy-students-count');
    const coursesCount = document.getElementById('courses-count');
    const feedbacksCount = document.getElementById('feedbacks-count');

    // Set the actual counts
    const actualHappyStudentsCount = <?php echo $student_count; ?>;
    const actualCoursesCount = <?php echo $course_count; ?>;
    const actualFeedbacksCount = <?php echo $feedback_count; ?>;

    // Animate the counting effect
    animateCount(happyStudentsCount, actualHappyStudentsCount);
    animateCount(coursesCount, actualCoursesCount);
    animateCount(feedbacksCount, actualFeedbacksCount);
</script>

<!-- Placeholder for counts ends -->

    <!--start news slider  -->
    <br><br><br>
    <div class="container mt-5">
    <h1 class="header-title"><p>Latest News</p><h1>
<div class="slideshow-container" >
<?php
    // Fetch the latest 4 courses from the course table
    $mysql=mysqli_connect("localhost","root","","coursewave") or die("could not connect database");

    $newsQuery = "SELECT * FROM news ORDER BY nid DESC LIMIT 4";
    $newsResult = mysqli_query($mysql, $newsQuery);
    
    $slideIndex = 0;
    
    if (mysqli_num_rows($newsResult) > 0) {
        while ($newsRow = mysqli_fetch_assoc($newsResult)) {
            $slideIndex++;
            ?>
        <div class="mySlides fade">
            <div class="numbertext"><?php echo $slideIndex; ?> / 4</div>
            <img src="image/<?php echo $newsRow['nimg']; ?>" style="width: 100%; max-height: 400px; overflow: hidden;">
        <!-- Display additional information such as title, description, and date -->
        <div class="news-info">
            <br>
                    <h2><?php echo $newsRow['ntitle']; ?></h2>
                    <p><?php echo $newsRow['ndesc']; ?></p>
                    <p>Published Date: <?php echo $newsRow['pdate']; ?></p>
                </div>
        </div>
<?php
    }
} else {
    // If no news articles are available, you can display a default slide or a message
?>
    <div class="mySlides fade">
        <div class="numbertext">1 / 1</div>
        <img src="image/image.jpg" style="width: 100%; max-height: 400px; overflow: hidden; margin-bottom: 10px;" alt="Default News">
        <!-- Add any additional content or text for your default slide -->
    </div>
<?php
}
?>
</div>
<div style="text-align:center">
<?php
    // Add dots for each slide
    for ($i = 0; $i < 4; $i++) {
        echo '<span class="dot"></span>';
    }
    ?>
</div>
<script>
// JavaScript for slideshow functionality
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

</script>
</div>
<br>
    <!--end news slider  -->

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

    ?>
<!-- start the courses -->
    
<div class="container mt-5">
        <h1 class="header-title">All Courses</h1>
        <?php
        require("connect.php");

       // Fetch courses excluding those already enrolled by the user
    $q = "SELECT * FROM course WHERE cname NOT IN (SELECT course FROM fees WHERE username = '$username') LIMIT 6";
    $result = mysqli_query($mysql, $q) or die("Query Failed!!!");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

        <div class="card-deck mt-4">
                <div class="card">
                    <img src="image/<?php echo $row['cimg']; ?>" class="card-img-top" width="300" height="200" alt="<?php echo $row['cname']; ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cname']; ?></h5>
                            <p class="card-text"><?php echo $row['cdesc']; ?></p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small>&#8377 <?php echo $row['price']; ?></small></p>
                            <?php
                            if (isCourseAvailable($row['cstatus'])) {

                            if (isEnrolled($username, $row['cname'], $mysql)) {
                                echo '<button class="btn btn-success text-white font-weight-bolder float-right" disabled>Enrolled</button>';
                            } else {
                                echo '<a class="btn btn-primary text-white font-weight-bolder float-right" href="pyment.php?course=' . $row['cname'] . '&price=' . $row['price'] . '">Enroll</a>';
                            }
                        }else{
                            echo '<button class="btn btn-secondary text-white font-weight-bolder float-right" disabled>Unavailable</button>';
                        }
                            ?>                        
                            </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No courses available</p>";
        }
        ?>
    </div>
 <!-- end the courses-->
    <div class="container mt-5">
        <div class="text-center m-2">
            <a class="btn btn-danger btn-sm" href="course.php">View All Courses</a>
        </div>
    </div>
</br>


<!-- Start PHP code to fetch feedbacks and associated images -->
<?php
    $mysqli=mysqli_connect("localhost","root","","coursewave") or die("could not connect database");
    // Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch the last 5 feedbacks with associated images
$sql = "SELECT f.fcontent, f.fdate, r.img, r.username
        FROM feedback AS f
        INNER JOIN tblreg AS r ON f.username = r.username
        ORDER BY f.fdate DESC
        LIMIT 5";
$result = $mysqli->query($sql);

// Close connection
$mysqli->close();
?>
<!-- End PHP code -->

 <!-- start feedback sidebar -->
 <h2 class="text-center mb-4">Student's Feedback</h2>
 <section class="container1">
      <div class="testimonial1 mySwiper">
        <div class="testi-content swiper-wrapper">
        <?php
            while ($row = $result->fetch_assoc()) {
                echo '<div class="slide swiper-slide">';
                echo '<img src="image/' . $row["img"] . '" alt="" class="image" />';
                echo '<p>' . $row["fcontent"] . '</p>';
                echo '<i class="bx bxs-quote-alt-left quote-icon"></i>';
                echo '<div class="details">';
                echo '<span class="name">' . $row["username"] . '</span>';
                echo '<span class="job">' . $row["fdate"] . '</span>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="swiper-button-next nav-btn1"></div>
        <div class="swiper-button-prev nav-btn1"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>



    <!-- Swiper JS -->
    <script src="js/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="js/script.js"></script>
<!-- end feedback sidebar -->
<iframe
src="https://www.chatbase.co/chatbot-iframe/ubVCvc1TPj7E9eyaMtF0J"
title="CourseGenie"
width="0%"
style="height: 0%; min-height: 0px"
frameborder="0"
></iframe>


<script>
window.embeddedChatbotConfig = {
chatbotId: "ubVCvc1TPj7E9eyaMtF0J",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="ubVCvc1TPj7E9eyaMtF0J"
domain="www.chatbase.co"
defer>
</script>
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="studaboutus.php">About Us</a>
                    <a class="btn btn-link" href="contactus.php">Contact Us</a>
                    <a class="btn btn-link" href="learnmstud.php">Learn More</a>
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
                <div class="col-4 foot-ig">
                        <!-- Add your social media icons and links here -->
                        <a href="https://www.instagram.com/x_.oel3/" class="text-light social-icon"><i class="bi bi-instagram"></i></a>
                    </div>
                    <div class="col-4 foot-twitter">
                        <a href="https://twitter.com/x_oel3" class="text-light social-icon"><i class="bi bi-twitter"></i></a>
                    </div>
                    <div class="col-4 foot-github">
                        <!-- GitHub icon linked to your GitHub profile -->
                        <a href="https://github.com/xeol21" target="_blank" class="text-light social-icon"><i class="bi bi-github"></i></a>
                    </div>
                    <div class="col-4 foot-whatsapp">
                        <!-- WhatsApp icon linked to your WhatsApp profile with pre-filled message -->
                        <a href="https://wa.me/+918799363780" target="_blank" class="text-light social-icon"><i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                <div class="col-4 foot-spotify">
                        <a href="https://open.spotify.com/playlist/6jP6pSQBxUYiWZa27Om3r4?si=abd87a9d14044db5" target="_blank" class="text-light social-icon"><i class="bi bi-spotify"></i></a>
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
</body>
</html>