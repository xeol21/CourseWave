<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register </title>
     <!-- Include SweetAlert CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="icon" href="image/coursefavicon.png">
    <style>
      #profile-pic {
        margin-left:35px;
        width: 130px; /* Set a fixed width */
        height: auto; /* Maintain aspect ratio */
        max-height: 130px; /* Set a maximum height if needed */
        border-radius: 5px; /* Apply border-radius if desired */
        border:outset;
        border-color:grey;
    }
    .center1 {
          margin-left: 35%;
          margin-right: auto;
        }
        /* Close button styling */
.btn-close {
    position: absolute;
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
    background-color: #cd98eb; /* Change background color on hover */
    border-color: #999; /* Change border color on hover */
    color: #000; /* Change text color on hover */
}
    </style>
    <link rel="stylesheet" href="css/regstyle.css">
    <link rel="stylesheet" href="css/coursecrud.css">
</head>
<body>
  <div class="container">
    <div class="title">Registration<button type="button" class="btn-close" aria-label="Close">&#10006;</button></div>
    <div class="content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="center1">
        <div class="card">
            <img src="image/pfp.png" id="profile-pic" >
            <label for="input-file">Add Image</label>
            <input type="file" name="img" accept="image/jpg, image/jpeg, image/png" id="input-file"  required>
        </div>
      </div>
          <div class="input-box">
          <span class="details">Student Full Name</span>
            <input type="text" name="sname" id="student-name" placeholder="Enter your full name" required>
            <span id="name-error" style="color: red; display: none;">Please enter the data in text or characters</span>  
          </div>
            <div class="input-box">
           <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" name="bod" required>
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <select name="city" required>
              <option value="Surat">Surat</option>
              <option value="Ahmedabad">Ahmedabad</option>
              <option value="Rajkot ">Rajkot </option>
              <option value="Anand ">Anand </option>
              <option value="Mehsana ">Mehsana </option>
              <option value="Bharuch ">Bharuch </option>
              <option value="Nadiad ">Nadiad </option>
              <option value="Navsari ">Navsari </option>
              <option value="Panaji ">Panaji </option>
              <option value="Margao ">Margao </option>
              <option value="Vasco-Mormugao ">Vasco-Mormugao </option>
              <option value="Mapusa ">Mapusa </option>
              <option value="Ponda ">Ponda </option>
              <option value="Bicholim ">Bicholim </option>
              <option value="Valpoi ">Valpoi </option>
              <option value="Thiruvananthapuram ">Thiruvananthapuram </option>
              <option value="Kozhikode ">Kozhikode </option>
              <option value="Kollam ">Kollam </option>
              <option value="Kochi ">Kochi </option>
              <option value="Kannur ">Kannur </option>
              <option value="Thrissur ">Thrissur </option>
              <option value="Kottayam ">Kottayam </option>
              <option value="Mumbai ">Mumbai </option>
              <option value="Pune ">Pune </option>
              <option value="Nagpur ">Nagpur </option>
              <option value="Nasik ">Nasik </option>
              <option value="Kolhapur ">Kolhapur </option>
              <option value="Aurangabad ">Aurangabad </option>
              <option value="Sangli ">Sangli </option>
              <option value="Chandigarh ">Chandigarh </option>
              <option value="Faridabad ">Faridabad </option>
              <option value="Gurgaon ">Gurgaon </option>
              <option value="Sonipat ">Sonipat </option>
              <option value="Panipat ">Panipat </option>
              <option value="Palwal ">Palwal </option>
              <option value="Patna ">Patna </option>
              <option value="Nalanda ">Nalanda </option>
              <option value="Bhagalpur ">Bhagalpur </option>
              <option value="Muzaffarpur ">Muzaffarpur </option>
              <option value="Gaya ">Gaya </option>
              <option value="Motihari ">Motihari </option>
              <option value="Bhopal ">Bhopal </option>
              <option value="Indore ">Indore </option>
              <option value="Gwalior ">Gwalior </option>
              <option value="Jabalpur ">Jabalpur </option>
              <option value="Ujjain ">Ujjain </option>
              <option value="Dewas ">Dewas </option>
              <option value="Lucknow ">Lucknow </option>
              <option value="Kanpur ">Kanpur </option>
              <option value="Ghaziabad ">Ghaziabad </option>
              <option value="Agra ">Agra </option>
              <option value="Meerut ">Meerut </option>
              <option value="Noida ">Noida </option>
              <option value="Varanasi ">Varanasi </option>
              <option value="Bareilly ">Bareilly </option>
              <option value="Other">Other </option>

            </select>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <select name="state" required>
              <option value="Gujarat">Gujarat</option>
              <option value="Goa">Goa</option>
              <option value="Kerala">Kerala</option>
              <option value="Maharashtra">Maharashtra	</option>
              <option value="Haryana">Haryana</option>
              <option value="Bihar">Bihar</option>
              <option value="Madhya Pradesh	">Madhya Pradesh	</option>
              <option value="Utter Pradesh">Utter Pradesh</option>
              <option value="Assam">Other</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="mno" id="contact-number" placeholder="Enter your contact number" required>
            <span id="contact-error" style="color: red;"></span>          
          </div>
          <div class="input-box">
            <span class="details">Admission Date</span>
            <input type="date" name="adm_date" value="<?php echo date('Y-m-d'); ?>" readonly required>
          </div>
          <div class="input-box">
            <span class="details">Security Question</span>
            <input type="text" name="sque" placeholder="Enter security question" required>
          </div>
          <div class="input-box">
            <span class="details">Answer</span>
            <input type="password" name="ans" placeholder="Enter security key" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="btnreg" value="Register">
        </div>
      </form>
    </div>
  </div>
 <script>
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    inputFile.onchange = function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0]);
    }

  </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // Function to show SweetAlert success message
    function showSuccessMessage() {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Registration successful!',
        confirmButtonText: 'OK'
      });
    }
  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // Handle close button click
        $('.btn-close').on('click', function() {
            window.location.href = 'main.php'; // Redirect to course.php
        });
</script>
<script>
        // Function to validate student's full name input
        document.getElementById("student-name").oninput = function() {
            var nameInput = this.value;
            var namePattern = /^[a-zA-Z\s]*$/; // Pattern to match only alphabets and spaces

            if (!namePattern.test(nameInput)) {
                document.getElementById("name-error").style.display = "inline"; // Show error message
            } else {
                document.getElementById("name-error").style.display = "none"; // Hide error message
            }
        };
    </script>
    <script>
    document.getElementById('contact-number').addEventListener('input', function(e) {
        var contactNumber = e.target.value.trim();
        var contactError = document.getElementById('contact-error');

        // Check if the entered value is a valid 10-digit number
        if (!/^\d{10}$/.test(contactNumber)) {
            contactError.textContent = "Please enter a valid 10-digit number";
        } else {
            contactError.textContent = ""; // Clear the error message if input is valid
        }
    });
</script>
</body>
</html>

<?php
    if(isset($_REQUEST['btnreg'])){
        $sname = $_REQUEST['sname'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $bod = $_REQUEST['bod'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $mno = $_REQUEST['mno'];
        $gender = $_REQUEST['gender'];
        $adm_date = $_REQUEST['adm_date'];
        $img = $_FILES['img']['name'];
        $temp = $_FILES['img']['tmp_name'];
        $sque = $_REQUEST['sque'];
        $ans = $_REQUEST['ans'];
        $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could not connect..!!");

        // Check if any of the provided fields already exist in the database
    $check_query = "SELECT * FROM tblreg WHERE sname='$sname' OR username='$username' OR password='$password' OR mno='$mno'";
    $check_result = mysqli_query($mysql, $check_query);

    // If any record exists with the provided information, prevent insertion
    if(mysqli_num_rows($check_result) > 0){
        echo "<script>alert('One or more fields already exist in the database. Please provide unique information.'); window.location.href = 'signup.php';</script>";
        exit();
    }
         // Password validation regex
         $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d|[!#%])[A-Za-z\d!#%@]{10,}$/";

         // Check if password matches the pattern
         if (!preg_match($passwordPattern, $password)) {
             $passwordError = "Password should contain at least one uppercase letter, one lowercase letter, one number or symbol (!, #,@ or %), and be at least 10 characters long.";
             // Redirect back to signup page with error message
             echo "<script>alert('$passwordError'); window.location.href = 'signup.php';</script>";
             exit();
         }

        $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could not connect..!!");
        
        // Escape user inputs for security
        $sname = mysqli_real_escape_string($mysql, $sname);
        $username = mysqli_real_escape_string($mysql, $username);
        $password = mysqli_real_escape_string($mysql, $password);
        $bod = mysqli_real_escape_string($mysql, $bod);
        $city = mysqli_real_escape_string($mysql, $city);
        $state = mysqli_real_escape_string($mysql, $state);
        $mno = mysqli_real_escape_string($mysql, $mno);
        $adm_date = mysqli_real_escape_string($mysql, $adm_date);
        $sque = mysqli_real_escape_string($mysql, $sque);
        $ans = mysqli_real_escape_string($mysql, $ans);

        
        // Create the uploads directory if it doesn't exist
        $upload_dir = "uploads/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Attempt to insert data into the database
        $q = "INSERT INTO tblreg (sname, username, password, bod, city,state, mno,gender, adm_date, img,sque,ans) VALUES ('$sname', '$username', '$password', '$bod', '$city','$state', '$mno','$gender', '$adm_date', '$img','$sque','$ans')";
        $res = mysqli_query($mysql, $q);
        
        if($res){
            // Move uploaded file to destination directory
            $target_file = $upload_dir . basename($img);
            if(move_uploaded_file($temp, $target_file)){
                // Show SweetAlert success message
                echo '<script>';
                echo 'showSuccessMessage();'; // Call the function to display success message
                echo 'setTimeout(function() { window.location.href = "login.php"; }, 3000);'; // Redirect after 3 seconds
                echo '</script>';
                exit();
            } else {
                die("File upload failed");
            }
        } else {
            die("Insertion failed: " . mysqli_error($mysql));
        }
    }
?>