<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "coursewave");

// Check connection
if($mysqli->connect_errno){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Determine which chart data to fetch based on the 'chart' parameter
$chart = isset($_GET['chart']) ? $_GET['chart'] : '';

// Query to get data from the table based on the chart parameter
if ($chart == 'feedback') {
    $query = "SELECT ftype, COUNT(*) as count FROM feedback GROUP BY ftype";
} elseif ($chart == 'tblreg') {
    $query = "SELECT gender, COUNT(*) as count FROM tblreg GROUP BY gender";
} elseif ($chart == 'course') {
    $query = "SELECT course, COUNT(DISTINCT username) as count FROM fees GROUP BY course";
}elseif ($chart == 'city') {
        $query = "SELECT city, COUNT(*) as count FROM tblreg GROUP BY city";
} elseif ($chart == 'state') {
        $query = "SELECT state, COUNT(*) as count FROM tblreg GROUP BY state";
} else {
    die("Invalid chart parameter");
}

// Execute query
$result = $mysqli->query($query);

// Initialize array to store data
$data = array();

// Fetch and store data in associative array
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close connection
$mysqli->close();

// Encode data as JSON and output
echo json_encode($data);
?>