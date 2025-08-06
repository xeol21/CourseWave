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
 <title>Students LOGS</title>
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
    margin: 20px auto;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid transparent; /* Hide default borders */
}

th {
    background: linear-gradient(45deg, #3498db, #2c3e50);
    color: #fff;
    text-transform: uppercase;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1); /* Add bottom border */
}

td {
    background-color: #ecf0f1;
    color: #333;
}

/* Rounded corners for first and last cells */
tr:first-child th:first-child {
    border-top-left-radius: 10px;
}

tr:first-child th:last-child {
    border-top-right-radius: 10px;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 10px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 10px;
}

/* Hover effect for table rows */
tr:hover {
    background-color: #f5f5f5;
    transform: scale(1.02);
    transition: transform 0.2s ease-in-out;
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

    form {
    margin-bottom: 20px; /* Adjust margin as needed */
}

/* CSS for label */
label {
    font-weight: bold;
    margin-right: 10px; /* Adjust margin as needed */
}

/* CSS for select dropdown */
select {
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 10px; /* Adjust margin as needed */
}

/* CSS for button */
.export-btn {
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    background-color: #007bff; /* Blue theme */
    color: #fff; /* White text */
    border: none;
    cursor: pointer;
}

/* CSS for button on hover */
.export-btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

 </style>
</head>

<div>

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

</div>

<body>
<center>
 <h1> Students LOGS</h1>
 <br>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

 <?php
require("connect.php");

// Set the number of records per page
$recordsPerPage = 25;

// Determine the current page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $recordsPerPage;

// Fetch distinct usernames
$qUsernames = "SELECT DISTINCT username FROM studentlog";
$resultUsernames = mysqli_query($mysql, $qUsernames) or die("Query Failed!!!");

// Check if a specific username is selected for sorting
$selectedUsername = isset($_GET['username']) ? $_GET['username'] : '';
$sortBy = "logid DESC"; // Default sorting order

// Construct the SQL query based on the selected username
if (!empty($selectedUsername)) {
    $selectedUsername = mysqli_real_escape_string($mysql, $selectedUsername);
    $sortBy = "username='$selectedUsername', logid DESC";
}

// Construct the SQL query
$q = "SELECT * FROM studentlog";
if (!empty($selectedUsername)) {
    $selectedUsername = mysqli_real_escape_string($mysql, $selectedUsername);
    $q .= " WHERE username = '$selectedUsername'";
}
$q .= " ORDER BY $sortBy LIMIT $offset, $recordsPerPage";
 $result=mysqli_query($mysql,$q) or die("Query Failed!!!");
 if(mysqli_num_rows($result)>0){
    echo "<br>";

  // Dropdown for selecting username for sorting
  echo "<div>";
  echo "<form action='adstudlog.php' method='GET'>";
  echo "<label for='username'>Sort by Username:</label>";
  echo "<select name='username' id='username'>";
  echo "<option value=''>Select Username</option>";
  while ($row = mysqli_fetch_assoc($resultUsernames)) {
      $selected = ($selectedUsername == $row['username']) ? "selected" : "";
      echo "<option value='" . $row['username'] . "' $selected>" . $row['username'] . "</option>";
  }
    echo "</select>";
    echo "<button class='export-btn' type='submit'>Sort</button>";
    echo "</form>";
    echo "</div>";
    echo"<button id='exportButton'onclick='exportToExcel()' class='btn btn-primary export-btn'>Export to Excel</button>";
    echo "<table id='logTable'border=5 cellspacing=10 cellpadding=10>";
    echo"<caption>Log Details</caption>";
    echo "<tr>
    <th scope='col'>log ID</th>
    <th scope='col'>Student</th>
    <th scope='col'>Login Time</th>
    <th scope='col'>Logout Time</th>


 </tr>";
 while($r=mysqli_fetch_array($result)){
     // Convert login and logout times to AM/PM format
     $login_time = date("Y-m-d h:i:s A", strtotime($r[2]));
     $logout_time = date("Y-m-d h:i:s A", strtotime($r[3]));
 //print_r($r); 
 echo "<tr> 
 <td>$r[0]</td>
 <td>$r[1]</td>
 <td>$login_time</td>
 <td>$logout_time</td>

 </tr>";
 }
 echo "</table>";

 
 // Display pagination links
 $qTotal = "SELECT COUNT(*) as total FROM studentlog";
 $resultTotal = mysqli_query($mysql, $qTotal);
 $rowTotal = mysqli_fetch_assoc($resultTotal);
 $totalRecords = $rowTotal['total'];

 $totalPages = ceil($totalRecords / $recordsPerPage);

 echo "<div class='pagination'>";
 for ($i = 1; $i <= $totalPages; $i++) {
     echo "<li class='" . ($i == $page ? 'current' : '') . "'><a href='adstudlog.php?page=$i'>$i</a> ";
 }
 echo "</div>";
 echo "<br>";
 }
?>
<button id="clearLogsButton" class="btn btn-danger" onclick="clearLogs()">Clear Logs</button>

</center>
<script>
function clearLogs() {
    if (confirm("Are you sure you want to delete old logs?")) {
        // Send an AJAX request to execute the PHP script
        $.ajax({
            type: "POST",
            url: "clear_logs.php", // PHP script to handle deletion
            success: function(response) {
                // Reload the page after successful deletion
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("An error occurred while deleting logs: " + error);
            }
        });
    }
}
</script>
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
function exportToExcel() {
    // Get the content of the table
    var tableContent = getTableContent();

    // Insert headings in the first row of the content
    tableContent.unshift(["log ID", "Student", "Login Time", "Logout Time"]);

    // Convert table content to Excel format
    var ws = XLSX.utils.aoa_to_sheet(tableContent);

    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Save the workbook as an Excel file
    XLSX.writeFile(wb, 'StudentLogs.xlsx');
}

function getTableContent() {
    var table = document.getElementById("logTable");
    var rows = table.querySelectorAll("tr");
    var content = [];

    for (var i = 0; i < rows.length; i++) {
        var row = [];
        var cells = rows[i].querySelectorAll("td");

        for (var j = 0; j < cells.length; j++) {
            // Only add content to the row if it's not an empty cell
            if (cells[j].innerText.trim() !== "") {
                row.push(cells[j].innerText.trim());
            }
        }

        // Pad the row with empty cells if needed to match the column count
        while (row.length < 4) {
            row.push("");
        }

        content.push(row);
    }

    return content;
}
</script>
</body>
</html>