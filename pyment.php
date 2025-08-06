<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
// Retrieve course name and price from URL parameters
$courseName = isset($_GET['course']) ? $_GET['course'] : '';
$coursePrice = isset($_GET['price']) ? $_GET['price'] : '';
 // Retrieve the username of the logged-in user
 $username = $_SESSION['username'];

 // Check if the user has made a payment before
 $mysql = mysqli_connect("localhost", "root", "", "coursewave") or die("Could Not connect..!!");
 $checkPaymentQuery = "SELECT * FROM fees WHERE username = '$username' LIMIT 1";
 $result = $mysql->query($checkPaymentQuery);

 if ($result->num_rows > 0) {
     // User has made a payment before, fetch the details
     $paymentDetails = $result->fetch_assoc();

     // Assign payment details to variables
     $cardName = $paymentDetails['cardnm'];
     $cardNumber = $paymentDetails['cardno'];
     $expMonth = $paymentDetails['expmon'];
     $expYear = $paymentDetails['expyr'];
     $cvv = $paymentDetails['cvv'];
 } else {
     // User has not made a payment before, initialize variables
     $cardName = '';
     $cardNumber = '';
     $expMonth = '';
     $expYear = '';
     $cvv = '';
 }

} else {
    // If the user is not logged in, you might want to handle this case (redirect, show an error, etc.)
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="image/coursefavicon.png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=date] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<script>
        function formatCreditCardNumber() {
            var ccnumInput = document.getElementById("ccnum");
            var ccnumValue = ccnumInput.value.replace(/\s+/g, ''); // Remove existing spaces
            var formattedCCNum = '';
            
            // Remove non-digits and limit to 16 digits
            var digitsOnly = ccnumValue.replace(/\D/g, '').slice(0, 16);

            for (var i = 0; i < digitsOnly.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedCCNum += '-';
                }
                formattedCCNum += digitsOnly[i];
            }

            ccnumInput.value = formattedCCNum.trim();
        }
    </script>
</head>
<body>
<h2>Payment Here!!</h2>
<div class="row">
  <div class="col-75">
    <!-- <div class="container"> -->
      <form id="paymentForm"action="pyment.php" method="post" enctype="multipart/form-data">
          <div class="col-50">
          <div class="container">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <div class="row">
              <div class="col-50">
            <label for="cname">Course Name</label>
            <input type="text" id="crname" name="coursenm" value="<?php echo $courseName; ?>" readonly>
        </div>
            <div class="col-50">
            <label for="cname">Price</label>
            <input type="text" id="price" name="cprice" value="<?php echo $coursePrice; ?>" readonly>
            </div>
            </div>
            <div class="row">
              <div class="col-50">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe"  value="<?php echo $cardName; ?>" required>
            </div>
            <div class="col-50">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" pattern="^\d{4}-\d{4}-\d{4}-\d{4}$" title="Please enter a valid 16-digit credit card number" placeholder="1111-2222-3333-4444" oninput="formatCreditCardNumber()" value="<?php echo $cardNumber; ?>" required>
            </div>
</div>
          <div class="row">
          <div class="col-50">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly required>
</div>
              <div class="col-50">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" value="<?php echo $expMonth; ?>" required>
</div>
</div>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2024" value="<?php echo $expYear; ?>" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" pattern="\d{3}" title="Please enter a valid 3-digit CVV" placeholder="352" value="<?php echo $cvv; ?>" required>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="btnpay" value="Pay" class="btn">
        <a href="index.php"><button type="button" class="btn">Back</button></a>
      </form>
    </div>
  </div>
</div>

</body>
</html>


<?php
// Check if form is submitted
if(isset($_POST['btnpay'])) {
    // Retrieve form data
    $cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $date = $_POST['date'];
    $expMonth = $_POST['expmonth'];
    $expYear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $courseName = $_POST['coursenm'];
    $price = $_POST['cprice'];

    $mysql=mysqli_connect("localhost","root","","coursewave") or die("Could Not connect..!!");
    // SQL query to insert data into table
    $sql = "INSERT INTO fees (username,cardnm, cardno,erdate, expmon, expyr, cvv, course, price)
            VALUES ('$username','$cardName', '$cardNumber','$date', '$expMonth', '$expYear', '$cvv', '$courseName', '$price')";

    if ($mysql->query($sql) === TRUE) {
      // Payment successful, trigger SweetAlert notification
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Payment Successful!',
        text: 'Thank you for your payment.',
        showConfirmButton: false,
        timer: 10000
      });
    </script>";

    } else {
        echo "Error: " . $sql . "<br>" . $mysql->error;
    }

}
?>
