<?php
session_start();
include("database.php");
echo $_SESSION["username"];
if(!isset($_SESSION["username"])){
  header("location: login.php");
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname=$_SESSION["username"];
    $result=pg_query($conn,"select * from Teacher where uname='$uname'");
    if(pg_num_rows($result)==0){
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $mname = $_POST["mname"];
      $joining_date = $_POST["joining_date"];
      $contact_no = $_POST["contact_no"];
      $hno = $_POST["hno"];
      $street = $_POST["street"];
      $pincode = $_POST["pincode"];
      pg_query($conn,"INSERT INTO Teacher (uname,f_name, l_name, m_name, joining_date, contact_no, h_no, street, pin_code) 
                              VALUES ('$uname','$fname', '$lname', '$mname', '$joining_date', '$contact_no', '$hno', '$street', '$pincode')");
      echo "New re  cord inserted successfully.";
      echo"<a href='index.php'>click here to go to main page</a>";
    }
    else{
      echo " user is alreay registerd";
      echo"<a href='index.php'>click here to go to main page</a>";
    }
    pg_close($conn);
} 
?>
<!DOCTYPE html>
  <html>
  <head>
    <title>Teacher Information Form</title>
  </head>
  <body>
    <h2>Teacher Information Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname" required><br><br>
  
      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname" required><br><br>
  
      <label for="mname">Middle Name:</label>
      <input type="text" id="mname" name="mname" required><br><br>
  
      <label for="joining_date">Joining Date:</label>
      <input type="date" id="joining_date" name="joining_date" required><br><br>
  
      <label for="contact_no">Contact Number:</label>
      <input type="tel" id="contact_no" name="contact_no" required><br><br>
  
      <label for="hno">House Number:</label>
      <input type="text" id="hno" name="hno" required><br><br>
  
      <label for="street">Street:</label>
      <input type="text" id="street" name="street" required><br><br>
  
      <label for="pincode">Pin Code:</label>
      <input type="number" id="pincode" name="pincode" required><br><br>
  
      <input type="submit" value="Submit">
    </form>
  </body>
  </html>
  

 
