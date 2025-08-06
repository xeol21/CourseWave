<style>
    /* Background CSS for modal */
    .modal-content {
            background-color: #f8f9fa; /* Light gray background color */
            border-radius: 10px; /* Add border radius for rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
        }
    /* Modal header styling */
    .modal-header {
            background-color: #007bff; /* Header background color */
            color: #fff; /* Header text color */
            border-bottom: none; /* Remove bottom border */
            border-radius: 10px 10px 0 0; /* Add border radius for rounded top corners */
        }
        /* Modal body and footer styling */
        .modal-body,
        .modal-footer {
            background-color: #f8f9fa; /* Light gray background color */
        }

    /* Modal title styling */
    .modal-title {
        font-weight: bold; /* Make title bold */
    }

    /* Modal body styling */
    .modal-body {
        padding: 20px; /* Add padding to the body */
    }

    /* Course image styling */
    .course-image {
        width: 100%; /* Ensure image fills its container */
        border-radius: 5px; /* Add border radius for rounded corners */
        transition: transform 0.3s ease; /* Add smooth transition */
    }

    /* Course name styling */
    .course-name {
        font-size: 1.5rem; /* Increase font size */
        margin-top: 10px; /* Add margin to separate from image */
    }

    /* Course description styling */
    .course-description {
        margin-top: 10px; /* Add margin to separate from name */
    }

    /* Price styling */
    .course-price {
        font-weight: bold; /* Make price bold */
    }

    /* Status styling */
    .course-status {
        font-style: italic; /* Make status italic */
        color: #6c757d; /* Status text color */
    }

  /* Instructor details styling */
.instructor-details {
    margin-top: 20px; /* Add margin to separate from course details */
    border-top: 4px solid #dee2e6; /* Add border at the top */
    padding-top: 20px; /* Add padding at the top */
    /* Add 3D effect using border and box-shadow */
    border-top-color: #ccc;
    border-bottom: 1px solid #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

    /* Instructor name styling */
    .instructor-name {
        font-weight: bold; /* Make name bold */
        margin-top: 10px; /* Add margin to separate from image */
    }

    /* Instructor title styling */
    .instructor-title {
        font-style: italic; /* Make title italic */
    }

    /* Instructor bio styling */
    .instructor-bio {
        margin-top: 10px; /* Add margin to separate from title */
    }

    /* Instructor image styling */
    .instructor-image {
        width: 70%; /* Set width */
        border-radius: 20%; /* Make image round */
        margin-left: 40px; 
        margin-right: 20px; /* Add margin to separate from text */
        transition: transform 0.3s ease; /* Add smooth transition */
    }

    /* Hover effect on course image */
    .course-image:hover {
        transform: scale(1.1); /* Scale up image on hover */
    }

    /* Hover effect on instructor image */
    .instructor-image:hover {
        transform: scale(1.1); /* Scale up image on hover */
    }

    /* Close button styling */
.btn-close {
    color: #fff; /* Close button text color */
    opacity: 0.8; /* Reduce opacity for less prominent appearance */
    transition: opacity 0.3s ease; /* Add transition for smooth effect */
}

/* Hover effect on close button */
.btn-close:hover {
    opacity: 5; /* Increase opacity on hover */
}
</style>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<?php

// Include necessary files and establish database connection
require("connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];

    // Fetch course details from the database based on the submitted course ID
    $query = "SELECT c.*, i.name AS instructor_name, i.title AS instructor_title, i.bio AS instructor_bio, i.image AS instructor_image FROM course c LEFT JOIN instructors i ON c.instructor_id = i.instructor_id WHERE c.cid = '$courseId'";
    $result = mysqli_query($mysql, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $course = mysqli_fetch_assoc($result);
        // Output course details in a modal
?>
        <!-- Modal structure -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseModalLabel">Course Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="course-image img-fluid mb-2" src="image/<?php echo $course['cimg']; ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <h5 class="course-name"><?php echo $course['cname']; ?></h5>
                        <p class="course-description"><?php echo $course['cdesc']; ?></p>
                        <p class="course-price">Price: ₹<?php echo $course['price']; ?></p>
                        <p class="course-status">Status: <?php echo ($course['cstatus'] === 'available') ? 'Available' : 'Unavailable'; ?></p>
                        <!-- "See More" button to reveal instructor details -->
                        <button class="btn btn-primary" id="seeMoreBtn">See More</button>
                    </div>
                </div>
                <div class="row instructor-details" style="display: none;">
                    <div class="col-md-4">
                        <?php if (!empty($course['instructor_image'])) : ?>
                            <img class="instructor-image" src="image/<?php echo $course['instructor_image']; ?>" alt="Instructor Image">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <h6 class="instructor-name">Instructor: <?php echo $course['instructor_name']; ?></h6>
                        <p class="instructor-title">Title: <?php echo $course['instructor_title']; ?></p>
                        <p class="instructor-bio">Bio: <?php echo $course['instructor_bio']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        // Trigger modal display using JavaScript
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#courseModal').modal('show');

        // Handle "See More" button click to reveal instructor details
        $('#seeMoreBtn').on('click', function() {
            $('.instructor-details').slideDown(); // Show instructor details
            $(this).hide(); // Hide the "See More" button
        });

        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'course.php'; // Redirect to course.php
        });
    });
</script>
<?php
    } else {
        echo "Course not found!";
    }
} else {
    echo "Invalid request!";
}
?>
