<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="image/coursefavicon.png">
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
    <title>CourseWave</title>
    <style>
         .card-body {
    font-size: 14px; /* Adjust the font size as needed */
}

.card-title{
    font-size: 16px; /* Adjust the font size as needed */

}
.card-text {
    font-size: 13px; /* Adjust the font size as needed */
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

body{margin-top:20px;
background:#eee;
}
.single_advisor_profile {
    position: relative;
    margin-bottom: 50px;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    z-index: 1;
    border-radius: 15px;
    -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
    box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
}
.single_advisor_profile .advisor_thumb {
    position: relative;
    z-index: 1;
    border-radius: 15px 15px 0 0;
    margin: 0 auto;
    padding: 30px 30px 0 30px;
    background-color: #3f43fd;
    overflow: hidden;
}
.single_advisor_profile .advisor_thumb::after {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    position: absolute;
    width: 150%;
    height: 80px;
    bottom: -45px;
    left: -25%;
    content: "";
    background-color: #ffffff;
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
}
@media only screen and (max-width: 575px) {
    .single_advisor_profile .advisor_thumb::after {
        height: 160px;
        bottom: -90px;
    }
}
.single_advisor_profile .advisor_thumb .social-info {
    position: absolute;
    z-index: 1;
    width: 100%;
    bottom: 0;
    right: 30px;
    text-align: right;
}
.single_advisor_profile .advisor_thumb .social-info a {
    font-size: 14px;
    color: #020710;
    padding: 0 5px;
}
.single_advisor_profile .advisor_thumb .social-info a:hover,
.single_advisor_profile .advisor_thumb .social-info a:focus {
    color: #3f43fd;
}
.single_advisor_profile .advisor_thumb .social-info a:last-child {
    padding-right: 0;
}
.single_advisor_profile .single_advisor_details_info {
    position: relative;
    z-index: 1;
    padding: 30px;
    text-align: right;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    border-radius: 0 0 15px 15px;
    background-color: #ffffff;
}
.single_advisor_profile .single_advisor_details_info::after {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    position: absolute;
    z-index: 1;
    width: 50px;
    height: 3px;
    background-color: #3f43fd;
    content: "";
    top: 12px;
    right: 30px;
}
.single_advisor_profile .single_advisor_details_info h6 {
    margin-bottom: 0.25rem;
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .single_advisor_profile .single_advisor_details_info h6 {
        font-size: 14px;
    }
}
.single_advisor_profile .single_advisor_details_info p {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    margin-bottom: 0;
    font-size: 14px;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
    .single_advisor_profile .single_advisor_details_info p {
        font-size: 12px;
    }
}
.single_advisor_profile:hover .advisor_thumb::after,
.single_advisor_profile:focus .advisor_thumb::after {
    background-color: #070a57;
}
.single_advisor_profile:hover .advisor_thumb .social-info a,
.single_advisor_profile:focus .advisor_thumb .social-info a {
    color: #ffffff;
}
.single_advisor_profile:hover .advisor_thumb .social-info a:hover,
.single_advisor_profile:hover .advisor_thumb .social-info a:focus,
.single_advisor_profile:focus .advisor_thumb .social-info a:hover,
.single_advisor_profile:focus .advisor_thumb .social-info a:focus {
    color: #ffffff;
}
.single_advisor_profile:hover .single_advisor_details_info,
.single_advisor_profile:focus .single_advisor_details_info {
    background-color: #070a57;
}
.single_advisor_profile:hover .single_advisor_details_info::after,
.single_advisor_profile:focus .single_advisor_details_info::after {
    background-color: #ffffff;
}
.single_advisor_profile:hover .single_advisor_details_info h6,
.single_advisor_profile:focus .single_advisor_details_info h6 {
    color: #ffffff;
}
.single_advisor_profile:hover .single_advisor_details_info p,
.single_advisor_profile:focus .single_advisor_details_info p {
    color: #ffffff;
}

body {
    margin: 0;
    padding: 0;
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
.modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
            display: none; /* Hide by default */
        }

        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: none; /* Hide by default */
        }
        .header-title {
    font-family: 'Ubuntu', sans-serif; /* Use Google Font */
    font-weight: 700; /* Set font weight to bold */
    font-size: 2rem; /* Set font size */
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
    </style>
</head>
<body>

 <!-- Start navigation -->
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"></a>
        <img src="image/coursewave-high-resolution-logo-transparent (1).png" width="100" height="auto">
        <span class="navbar-text">Learn and Implement</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item"><a href="signup.php" class="nav-link">Sign Up</a></li>
                <li class="nav-item custom-nav-item"><a href="adlogin.php" class="nav-link">Admin Login</a></li>
                <li class="nav-item custom-nav-item"><a href="login.php" class="nav-link">Student Login</a></li>
                
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
            <h1 class="my-content">Welcome to CourseWave</h1>
            <small class="my-content">Learn and Implement</small><br>
        </div>
    </div>
    <!-- end video background -->

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
<!-- Placeholder for counts -->
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
<!-- Placeholder for counts ends -->


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

    <!-- start the courses -->
    
<div class="container mt-5">
        <br><br><h1 class="header-title">All Courses</h1>
        <?php
        require("connect.php");

        $q = "SELECT * FROM course";
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
                    // Check if the user is logged in
                    if (isset($_SESSION['username'])) {
                        // User is logged in, show enrollment button
                        echo '<a href="pyment.php?course=' . $row['cname'] . '&price=' . $row['price'] . '" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>';
                    } else {
                        // User is not logged in, show signup button
                        echo '<a href="signup.php" class="btn btn-primary text-white font-weight-bolder float-right" style="padding: 5px 15px; font-size: 13px;">Signup to Enroll</a>';
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
</br>
 <!-- end the courses-->
<br>

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
 <br><br><br><h2 class="text-center mb-4 header-title">Our Student's Feedbacks</h2>
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


<div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
            <!-- Section Heading-->
            <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
              <h3 class="header-title">Our Creative <span> Team</span></h3>
              <br>
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Advisor-->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
              <!-- Team Thumb-->
              <div class="advisor_thumb"><img src="image/inst6.jpg" alt="">
                <!-- Social Info-->
                <div class="social-info"></div>
              </div>
              <!-- Team Details-->
              <div class="single_advisor_details_info">
                <h6>Sarah Adams</h6>
                <p class="designation">Cybersecurity Instructor</p>
              </div>
            </div>
          </div>
          <!-- Single Advisor-->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
              <!-- Team Thumb-->
              <div class="advisor_thumb"><img src="image/inst5.jpg" alt="">
                <!-- Social Info-->
                <div class="social-info"></div>
              </div>
              <!-- Team Details-->
              <div class="single_advisor_details_info">
                <h6>Ashley Roberts</h6>
                <p class="designation">UI/UX Designer</p>
              </div>
            </div>
          </div>
          <!-- Single Advisor-->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
              <!-- Team Thumb-->
              <div class="advisor_thumb"><img src="image/inst3.jpg" alt="">
                <!-- Social Info-->
                <div class="social-info"></div>
              </div>
              <!-- Team Details-->
              <div class="single_advisor_details_info">
                <h6>Daniel Lee</h6>
                <p class="designation">Web Developer</p>
              </div>
            </div>
          </div>
          <!-- Single Advisor-->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
              <!-- Team Thumb-->
              <div class="advisor_thumb"><img src="image/inst4.jpg" alt="">
                <!-- Social Info-->
                <div class="social-info"></div>
              </div>
              <!-- Team Details-->
              <div class="single_advisor_details_info">
                <h6>Kevin Yoo</h6>
                <p class="designation">Marketing Manager</p>
              </div>
            </div>
          </div>
        </div>
      </div>
<iframe src="https://www.chatbase.co/chatbot-iframe/ubVCvc1TPj7E9eyaMtF0J"
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
                    <a class="btn btn-link" href="aboutus.php">About Us</a>
                    <a class="btn btn-link" href="guestcontactus.php">Contact Us</a>
                    <a class="btn btn-link" href="Learnmore.php">Learn More</a>
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
                        <a href="https://wa.me/+918799363780" target="_blank" class="text-light social-icon"><i class="bi bi-whatsapp"></i></a>
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