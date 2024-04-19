<?php
session_start();
include("database.php");
if (!isset($_SESSION["username"])) {
  header("location: login.php");
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = $_SESSION["username"];
  $result = pg_query($conn, "select * from Teacher where uname='$uname'");
  if (pg_num_rows($result) == 0) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mname = $_POST["mname"];
    $joining_date = $_POST["joining_date"];
    $contact_no = $_POST["contact_no"];
    $hno = $_POST["hno"];
    $street = $_POST["street"];
    $pincode = $_POST["pincode"];
    pg_query($conn, "INSERT INTO Teacher (uname,f_name, l_name, m_name, joining_date, contact_no, h_no, street, pin_code) 
                              VALUES ('$uname','$fname', '$lname', '$mname', '$joining_date', '$contact_no', '$hno', '$street', '$pincode')");
    echo "New re  cord inserted successfully.";
    echo "<a href='index.php'>click here to go to main page</a>";
  } else {
    echo " user is alreay registerd";
    echo "<a href='index.php'>click here to go to main page</a>";
  }
  pg_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Teacher Information Form</title>
  <link rel="stylesheet" href="profile_fill.css"> 
</head>

<body background="background.jpg">
<div class="both">  
<div class="header">
    <h1>TAX-Help</h1>
    <div class="header-links">
      <a href="mailto:">Contact Us</a>
    </div>
  </div>
  <div> <h1>Teacher Information Form</h1> </div>
</div>
<div class="content">
<form class="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" required><br><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" required><br><br>
    
    <label for="mname">Middle Name:</label>
    <input type="text" id="mname" name="mname" required><br><br>

    <label for="joining_date">Joining Date:</label>
    <input type="date" id="joining_date" name="joining_date" required><br><br>

    <label for="contact_no">Contact Number:</label>
    <input type="tel" id="contact_no" name="contact_no" required onkeyup="val_m()"><br><br>

    <span id="mbl" style="display:none"></span>
<script>
  function val_m(){
    let mobile=document.getElementById("contact_no").value;
    let mobile_no=/^([+]\d{2})?\d{10}$/
    if(!mobile_no.test(mobile)){
      let mbl=document.getElementById("mbl");
      mbl.setAttribute("display","block");
      mbl.innerHTML="contact number must be 10 digits long";
    }
  }
</script>
    <label for="hno">House Number:</label>
    <input type="text" id="hno" name="hno" required><br><br>
    
    <label for="street">Street:</label>
    <input type="text" id="street" name="street" required><br><br>

    <label for="pincode">Pin Code:</label>
    <input type="number" id="pincode" name="pincode" required><br><br>

    
    <div class="btn"> <input type="submit" value="Submit"> </div>
    
  </div>
  <p id="para"></p>
    <div class="footer">
      <p>&copy; 2024 TAX-Help. All rights reserved.</p>
    </div>
  </form>
</body>

</html>