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
// Default status filter
$statusFilter = isset($_POST['status']) ? $_POST['status'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Courses</title>
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
    .navbar-brand img {
        margin-right: 5px !important;
        margin-left: 5px !important;
    }
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
td:nth-child(-n+3) {
    text-align: center;
    padding: 5px; /* Adjust padding as needed */
}

/* Style for image buttons in the first three columns */
td:nth-child(-n+3) img {
    width: 30px; /* Set width of images */
    height: 30px; /* Set height of images */
    border-radius: 5px; /* Add border radius for rounded corners */
    cursor: pointer; /* Change cursor to pointer on hover */
    transition: transform 0.2s ease, box-shadow 0.2s ease; /* Add smooth transition effect */
    border: 1px solid #ccc; /* Add border */
    background-color: #f0f0f0; /* Add background color */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
}

td:nth-child(-n+3) img:hover {
    transform: scale(1.1); /* Scale up image slightly on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
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

    /* Button styles */
    .export-btn {
            background-color: #007bff; /* Blue theme */
            color: #fff; /* White text */
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius:10px;
        }

        .export-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        /* CSS for form */
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
                <li class="nav-item custom-nav-item">
                  <form method="POST">
                  <button name="Logout" class="logout-btn">Logout</button>
                  </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End navigation -->

</body>


<body>
<center> <br>
<h1> Courses </h1>
<form method="POST">
    <label for="status">Filter by Status:</label>
    <select name="status" id="status">
        <option value="">All</option>
        <option value="Available">Available</option>
        <option value="Unavailable">Unavailable</option>
    </select>
    <button class="export-btn"type="submit">Filter</button>
</form>
<?php
require("connect.php");

// Set the number of records per page
$recordsPerPage = 7;

// Determine the current page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $recordsPerPage;

// Construct the SQL query based on the status filter
$q = "SELECT * FROM course";
if (!empty($statusFilter)) {
    $q .= " WHERE cstatus = '$statusFilter'";
}
$q .= " LIMIT $offset, $recordsPerPage";

$result = mysqli_query($mysql, $q) or die("Query Failed!!!");
if (mysqli_num_rows($result) > 0) {
    echo "<table id='courseTable' border=5 cellspacing=10 cellpadding=10>";
    echo "<caption>All Courses</caption>";
    echo "<tr>
        <th scope='col'></th>
        <th scope='col'></th>
        <th scope='col'></th>
        <th scope='col'>Course Name</th>
        <th scope='col'>Description</th>
        <th scope='col'>Price</th>
        <th scope='col'>Credit</th>
        <th scope='col'>Status</th>
        <th scope='col'></th>
    </tr>";

    while ($r = mysqli_fetch_array($result)) {
        echo "<tr>
            <td scope='row'><a href='addcourse.php'><center><img src='image/add.png' height='30px' width='30px'></center></a></td>
            <td scope='row'><a href='updatecourse.php?cid=$r[0]'><center><img src='image/pencil.png' height='50px' width='50px'></center></a></td>
            <td scope='row'><a href='deletecourse.php?cid=$r[0]'><center><img src='image/trash.png' height='50px' width='50px'></center></a></td>
            <td>$r[1]</td>
            <td>$r[2]</td>
            <td>$r[3]</td>
            <td>$r[4]</td>
            <td>$r[5]</td>
            <td> <center><img src='image/$r[6]' height='100px' width='100px'></center></td>
        </tr>";
    }

    echo "</table>";

    // Display pagination links
    $qTotal = "SELECT COUNT(*) as total FROM course";
    $resultTotal = mysqli_query($mysql, $qTotal);
    $rowTotal = mysqli_fetch_assoc($resultTotal);
    $totalRecords = $rowTotal['total'];

    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='" . ($i == $page ? 'current' : '') . "'><a href='courses.php?page=$i'>$i</a> ";
    }
    echo "</div>";
}
?>

</center>

<div style="text-align: center; margin-top: 20px;">
        <button class="export-btn" onclick="exportToExcel()">Export to Excel</button>
        <button class="export-btn" onclick="exportToPDF()">Export to PDF</button>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
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
    tableContent.unshift(["Course Name", "Description", "Price", "Credit","Status"]);

    // Convert table content to Excel format
    var ws = XLSX.utils.aoa_to_sheet(tableContent);

    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Save the workbook as an Excel file
    XLSX.writeFile(wb, 'Courses.xlsx');
}

function getTableContent() {
    var table = document.getElementById("courseTable");
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

function exportToPDF() {
        var element = document.querySelector('table');

        // Define options for the PDF generation
        var options = {
            margin: 1,
            filename: 'Courses.pdf',
            image: {type: 'jpeg', quality: 100},
            html2canvas: {scale: 2},
            jsPDF: {unit: 'in', format: 'Tabloid', orientation: 'landscape'}
        };

        // Generate PDF
        html2pdf().from(element).set(options).save();
    }
</script>
</body>
</html>

