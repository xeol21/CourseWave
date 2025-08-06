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

<?php
// Define the getEmojiForRating function
function getEmojiForRating($rating) {
    switch ($rating) {
        case "Very bad":
            return "🤬";
        case "Bad":
            return "🙁";
        case "Okay":
            return "😶";
        case "Good":
            return "😁";
        case "Very good":
            return "😍";
        default:
            return "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedbacks</title> 
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
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            font-weight: bold;
        }

/* Add animation for the emoji */
@keyframes spinAnimation {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        td:nth-child(2) {
            font-size: 50px; /* Increased font size for emoji */
            color: #ff4081; /* Custom color for cute style */
            position: relative;
            display: inline-block; /* Ensure the element occupies only its content area */
            animation: spinAnimation 2s linear infinite; /* Add spin animation */
            transform-origin: center; /* Set transform origin to center */
        }


        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
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
    <br>
 <h1> Student's Feedback</h1>
 <br>
 <!-- Form for selecting Rate -->
 <form method="POST">
    <label for="ftype">Select Rate Type:</label>
    <select name="ftype" id="ftype">
    <option value='' readonly>Select rate</option>
    <option value=''>All</option>
        <?php
            require("connect.php");
            $query = "SELECT DISTINCT ftype FROM feedback";
            $result = mysqli_query($mysql, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['ftype'] . "'>" . $row['ftype'] . "</option>";
                }
            }
        ?>
    </select>
    <button class="export-btn" type="submit">Filter</button>
    <button id='exportButton'onclick='exportToExcel()' class='btn btn-primary export-btn'>Export to Excel</button>
</form>

 <?php
require("connect.php");

// Set the number of records per page
$recordsPerPage = 4;

// Determine the current page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $recordsPerPage;
// Check if a specific rate is selected
if(isset($_POST['ftype']) && !empty($_POST['ftype'])) {
    $selected_rate = $_POST['ftype'];
    // Query to fetch feedbacks for the selected rate
    $q = "SELECT * FROM feedback WHERE ftype='$selected_rate' LIMIT $offset, $recordsPerPage";
} else {
    // Query to fetch all feedbacks
    $q = "SELECT * FROM feedback LIMIT $offset, $recordsPerPage";
}
 $result=mysqli_query($mysql,$q) or die("Query Failed!!!");
 if(mysqli_num_rows($result)>0){
 echo "<table id='feedTable' border=5 cellspacing=10 cellpadding=10>";
 echo"<caption>
 All Feedbacks 
</caption>";
 echo "<tr>
 <th scope='col'>Username</th>
 <th scope='col'>Rate</th>
 <th scope='col'>Description</th>
 <th scope='col'>Upload Time</th>

 </tr>";
 while($r=mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>$r[1]</td>";
    echo "<td>" . getEmojiForRating($r[2]) . "</td>"; // Replace the text with emoji
    echo "<td>$r[3]</td>";
    echo "<td>$r[4]</td>";
    echo "</tr>";
}
 echo "</table>";

 // Display pagination links
 if(isset($selected_username) && !empty($selected_username)) {
    $qTotal = "SELECT COUNT(*) as total FROM feedback WHERE username='$selected_username'";
} else {
    $qTotal = "SELECT COUNT(*) as total FROM feedback";
}
 $resultTotal = mysqli_query($mysql, $qTotal);
 $rowTotal = mysqli_fetch_assoc($resultTotal);
 $totalRecords = $rowTotal['total'];

 $totalPages = ceil($totalRecords / $recordsPerPage);

 echo "<div class='pagination'>";
 for ($i = 1; $i <= $totalPages; $i++) {
     echo "<li class='" . ($i == $page ? 'current' : '') . "'><a href='adfeedbacks.php?page=$i'>$i</a> ";
 }
 echo "</div>";
 }
 
?>

<br><br>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

<script>
function exportToExcel() {
    // Get the content of the table
    var tableContent = getTableContent();

    // Insert headings in the first row of the content
    tableContent.unshift(["Username", "Rate", "Description", "Upload Time"]);

    // Convert table content to Excel format
    var ws = XLSX.utils.aoa_to_sheet(tableContent);

    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Save the workbook as an Excel file
    XLSX.writeFile(wb, 'Feedbacks.xlsx');
}

function getTableContent() {
    var table = document.getElementById("feedTable");
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
