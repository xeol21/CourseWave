  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

     <!-- Boxicons CSS -->
 <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>



<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/style.css">

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

    </style>
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
                <li class="nav-item custom-nav-item"><a href="addashboard.php" class="nav-link">Home</a></li>
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
        <?php
        if(isset($_POST['Logout'])){
            session_destroy();
            header("location:main.php");
        }
        ?>
    </nav>
    <!-- End navigation -->
