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

    .navbar-brand img {
        margin-right: 5px !important;
        margin-left: 5px !important;
    }

    .columns {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .columns td {
        padding: 10px;
        text-align: center;
    }

    #feedback_chart_div, #tblreg_chart_div, #course_chart_div, #city_chart_div, #state_chart_div {
        border: 5px solid #ccc;
        margin: 10px;
        padding: 10px;
        background-color: #f8f8f8; /* Light background color */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Box shadow for 3D effect */
        border-radius: 10px; /* Rounded corners for a modern look */
    }

    .chart-container {
        width: 45%; /* Adjust the width as needed */
        display: inline-block;
        vertical-align: top;
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
.admin-dashboard-heading {
        font-size: 36px; /* Adjust font size as needed */
        margin-top: 50px; /* Adjust margin-top as needed */
        color: #ffffff; /* Text color */
        text-align: center; /* Center align the text */
        text-transform: uppercase; /* Convert text to uppercase */
        font-weight: bold; /* Make the text bold */
        padding: 20px; /* Add padding for better visibility */
        background-color: #4e54c8; /* Background color */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add box shadow */
        border-radius: 10px; /* Add border radius for rounded corners */
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
/* Modern style for h1 tag */
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

    <title>CourseWave</title>
</head>
<body>


 <!-- Start navigation -->
 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
        <img src="image/coursewave-high-resolution-logo-transparent (1).png" width="110" height="auto"></a>
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
                <li class="nav-item custom-nav-item"><a href="adchangepass.php" class="nav-link">Change Password</a></li>
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

        <h1 class="greeting"><?php echo $greeting; ?>,<?php echo $username; ?>.</h1>
        <h2 class="welcome-message">Welcome Back.</h2>

    </div>
</div>
<!-- end video background -->

<br><h1 class="text-center admin-dashboard-heading">Admin Dashboard</h1>

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


<br><br><br><h1 class="header-title"> Analytics Overview</h1>

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


<!-- Chart banner-->

<br><br><br><h1 class="header-title">Statistics Overview</h1>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Fetch data for feedback chart
            var xhr1 = new XMLHttpRequest();
            xhr1.open('GET', 'get_chart_data.php?chart=feedback', true);
            xhr1.send();
            xhr1.onload = function() {
                if (xhr1.status == 200) {
                    var feedbackData = JSON.parse(xhr1.responseText);
                    drawFeedbackChart(feedbackData);
                }
            };

            // Fetch data for tblreg chart
            var xhr2 = new XMLHttpRequest();
            xhr2.open('GET', 'get_chart_data.php?chart=tblreg', true);
            xhr2.send();
            xhr2.onload = function() {
                if (xhr2.status == 200) {
                    var tblregData = JSON.parse(xhr2.responseText);
                    drawTblregChart(tblregData);
                }
            };

            // Fetch data for course chart
            var xhr3 = new XMLHttpRequest();
            xhr3.open('GET', 'get_chart_data.php?chart=course', true);
            xhr3.send();
            xhr3.onload = function() {
                if (xhr3.status == 200) {
                    var courseData = JSON.parse(xhr3.responseText);
                    drawCourseChart(courseData);
                }
            };

            // Fetch data for city chart
            var xhr4 = new XMLHttpRequest();
            xhr4.open('GET', 'get_chart_data.php?chart=city', true);
            xhr4.send();
            xhr4.onload = function() {
                if (xhr4.status == 200) {
                    var cityData = JSON.parse(xhr4.responseText);
                    drawCityChart(cityData);
                }
            };

            // Fetch data for state chart
            var xhr5 = new XMLHttpRequest();
            xhr5.open('GET', 'get_chart_data.php?chart=state', true);
            xhr5.send();
            xhr5.onload = function() {
                if (xhr5.status == 200) {
                    var stateData = JSON.parse(xhr5.responseText);
                    drawStateChart(stateData);
                }
            };
        }

        function drawFeedbackChart(feedbackData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Content');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < feedbackData.length; i++) {
                dataArray.push([feedbackData[i].ftype, parseInt(feedbackData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Feedback Content Distribution',
                is3D: true,
                width: 450,
                height: 300
                
            };

            var chart = new google.visualization.PieChart(document.getElementById('feedback_chart_div'));
            chart.draw(data, options);
        }

        function drawTblregChart(tblregData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Gender');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < tblregData.length; i++) {
                dataArray.push([tblregData[i].gender, parseInt(tblregData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Gender Distribution in Registration',
                is3D: true,
                width: 450,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('tblreg_chart_div'));
            chart.draw(data, options);
        }

        function drawCourseChart(courseData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Course Name');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < courseData.length; i++) {
                dataArray.push([courseData[i].course, parseInt(courseData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'Course Enrollment Distribution',
                is3D: true,
                width: 450,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('course_chart_div'));
            chart.draw(data, options);
        }

        function drawCityChart(cityData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'City');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < cityData.length; i++) {
                dataArray.push([cityData[i].city, parseInt(cityData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'City Distribution of Registered Students',
                is3D: true,
                width: 450,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('city_chart_div'));
            chart.draw(data, options);
        }

        function drawStateChart(stateData) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'State');
            data.addColumn('number', 'Count');

            // Convert JSON data to array
            var dataArray = [];
            for (var i = 0; i < stateData.length; i++) {
                dataArray.push([stateData[i].state, parseInt(stateData[i].count)]);
            }
            data.addRows(dataArray);

            var options = {
                title: 'State Distribution of Registered Students',
                is3D: true,
                width: 450,
                height: 300
            };

            var chart = new google.visualization.PieChart(document.getElementById('state_chart_div'));
            chart.draw(data, options);
        }
    </script>
<center>
    <div class="chart-container">
        <div id="feedback_chart_div"></div>
    </div>
    <div class="chart-container">
        <div id="tblreg_chart_div"></div>
    </div>
</center>

<center>
    <div class="chart-container">
        <div id="course_chart_div"></div>
    </div>
    <div class="chart-container">
        <div id="city_chart_div"></div>
    </div>
</center>

<center>
    <div class="chart-container">
        <div id="state_chart_div" ></div>
    </div>
</center>


    <!-- End Chart banner-->
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 wow fadeIn" data-wow-delay="0.1s">                
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Copyright 2024,CourseWave.All Right Reseverd</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="#">Home</a>
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
</body>
</html>