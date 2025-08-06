<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/coursefavicon.png">

    <title>Student Enrollment Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .invoice-box {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            background-color: #fff;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
            border: 1px solid #ddd;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 10px;
            background-color: #f5f5f5;
        }

        .invoice-box table tr.top table td.title {
            font-size: 24px;
            line-height: 32px;
            color: #333;
            font-weight: bold;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 10px;
            background-color: #f5f5f5;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
        .invoice-box table tr.additional-info td {
            background: #f5f5f5;
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
        .btn-close {
    top: 1px;
    right: 1px;
    background-color: #ffffff; /* Button background color */
    border: 1px solid #ccc; /* Button border */
    border-radius: 30%; /* Make it a circle */
    font-size: 24px;
    cursor: pointer;
    color: #333; /* Button color */
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease; /* Add transition effect */
    padding: 5px; /* Add padding for better clickability */
    width: 33px; /* Set width */
    height: 35px; /* Set height */
    line-height: 1; /* Ensure text is centered vertically */
    text-align: center; /* Center the 'X' horizontally */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
}

.btn-close:hover {
    background-color: #0056b3; /* Change background color on hover */
    border-color: #999; /* Change border color on hover */
    color: #000; /* Change text color on hover */
    transform: scale(1.1);
}
    </style>
</head>
<body>
    <div class="invoice-box">
        <?php
        $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could Not connect..!!");
       
        // Fetch data for the selected row
        $username = $_GET['username'];
        $erdate = $_GET['erdate'];
        $course = $_GET['course'];
        $price = $_GET['price'];

        $sql = "SELECT tblreg.sname, tblreg.mno, tblreg.adm_date, tblreg.img, tblreg.bod, tblreg.gender, tblreg.city,tblreg.state, fees.erdate, fees.course, course.credit
                FROM fees
                LEFT JOIN tblreg ON fees.username = tblreg.username
                LEFT JOIN course ON fees.course = course.cname
                WHERE fees.username = '$username' AND fees.erdate = '$erdate' AND fees.course = '$course' AND fees.price = '$price'";    
        
        $result = mysqli_query($mysql, $sql) or die("Query Failed!!!");

        if ($result->num_rows > 0) {
            // Output data of selected row
            echo "<table cellpadding='0' cellspacing='0' border='5'>";
            echo "<tr class='top'>
                    <td colspan='11'>
                        <table>
                            <tr>
                                <td class='title'>
                                <center>Student Enrollment Report</center></td>
                                <td><center><button type='button' class='btn-close' aria-label='Close'>&#10006;</button></center></td>
                            </tr>
                        </table>
                    </td>
                </tr>";
            echo "<tr class='information'>
                    <td colspan='11'>
                        <table>
                            <tr>
                                <td>Username: $username</td>
                                <td>Enroll Date: $erdate</td>
                                <td>Course: $course</td>
                                <td>Price: $price</td>
                            </tr>
                        </table>
                    </td>
                </tr>";
            echo "<tr class='heading'>
                    <td>Student Photo</td>
                    <td>Student Name</td>
                    <td>Contact No.</td>
                    <td>Admission Date</td>
                    <td>Enroll Date</td>
                    <td>Course Name</td>
                    <td>Credit</td>
                    <td>Date of Birth</td>
                    <td>Gender</td>
                    <td>City</td>
                    <td>State</td>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                $imagePath = 'image/' . $row["img"]; // Update this path

                echo "<tr class='item'>
                        <td><img src='" . $imagePath . "' height='100px' width='100px'></td>                        
                        <td>" . $row["sname"] . "</td>
                        <td>" . $row["mno"] . "</td>
                        <td>" . $row["adm_date"] . "</td>
                        <td>" . $row["erdate"] . "</td>
                        <td>" . $row["course"] . "</td>
                        <td>" . $row["credit"] . "</td>
                        <td>" . $row["bod"] . "</td>
                        <td>" . $row["gender"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["state"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No results found</td></tr>";
        }
        ?>
        </table>
    </div>

    <!-- Buttons for exporting to PDF and Excel -->
    <div style="text-align: center; margin-top: 20px;">
        <button class="export-btn" onclick="exportToPDF()">Export to PDF</button>
    </div>

    <!-- JavaScript libraries for PDF and Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <script>
function exportToPDF() {
    var element = document.querySelector('.invoice-box');

    // Define options for the PDF generation
    var options = {
        margin:       1,
        filename:     'student_enrollment_report.pdf',
        image:        { type: 'jpeg', quality: 100 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    // Generate PDF
    html2pdf().from(element).set(options).save();
}
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'adenroll.php'; // Redirect to course.php
        });
</script>
</body>
</html>
