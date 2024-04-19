<?php
session_start();
echo $_SESSION["username"];
if (isset($_SESSION["username"])) {
  echo '
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Income Tax Calculator</title>
    <style>
    body{
      background-size: cover;
    }
    h1{
      text-align: center;
    }
    .footer {
      width: 100%;
      height: 100px;
      background-color: rgb(24, 27, 46);
      color: white;
      text-align: center;
      align-content: center;
    }
    .header{
      background-color: rgb(24, 27, 46);
      color: white;
      text-align: center;
      position: relative;
      padding-bottom: 30px;
    }
    .both{
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .header-links {
      float: right;
      /* Aligns the links to the right */
      padding: 0.5rem 1rem;
      /* Adds some padding around the links */
    }
    .header-links a {
      color: white;
      /* Sets the text color to white */
      text-decoration: none;
      /* Removes underline from links */
      margin-left: 2rem;
      /* Adds space between the links */
    }
    .header-links a:hover {
      text-decoration: underline;
    }
    .profile-icon {
      position: absolute;
      left: 10px; 
      bottom: 25px;
      width: 50px; 
      height: 50px; 
      border-radius: 50%; /* Makes the image round */
  }
    .profile-link {
      position: absolute;
      left: 10px; /* Align with the profile icon */
      bottom: 0; /* Position below the profile icon */
      color: white; /* Match the header text color */
      text-decoration: none; /* Optional: removes the underline */
      padding-top: 60px;
    }
    .center{
      word-spacing: 5px;
      align-content: center;
      align-items: center;
      margin-left: 42%;
      margin-right: auto;
    }
    .btn{
      display: flex;
      justify-content: center;
    }
    </style>
    </head>

  <body background="background.jpg">
      <div class="both">
        <div class="header">
            <h1>Tax Help</h1>
            <img src="icon.png" alt="Profile Picture" class="profile-icon">
            <a href="profile.php" class="profile-link">Profile</a>
            <div class="header-links">
            <a href="mailto:">Contact Us</a>
            </div>
        </div>
        </div>
        <h1>Income Tax Calculator</h1><br />
      <form action="db_query.php" method="POST" class="center">
        <label for="edu_expense">Education Expense:</label>
        <input
          type="text"
          id="edu_expense"
          name="edu_expense"
          required
        /><br /><br />

      <label for="medical_al">Medical Allowance:</label>
      <input
        type="number"
        id="medical_al"
        name="medical_al"
        required
      /><br /><br />

      <label for="house_rent_al">House Rent Allowance:</label>
      <input
        type="number"
        id="house_rent_al"
        name="house_rent_al"
        required
      /><br /><br />

      <label for="other_al">Other Allowance:</label>
      <input type="number" id="other_al" name="other_al" required /><br /><br />

      <label for="basic_salary">Basic Salary:</label>
      <input
        type="number"
        id="basic_salary"
        name="basic_salary"
        required
      /><br /><br />

      <label for="other_income">Other Income:</label>
      <input
        type="number"
        id="other_income"
        name="other_income"
        required
      /><br /><br />

      <label for="professional_tax">Professional Tax:</label>
      <input type="text" id="professional_tax" name="professional_tax" /><br /><br>

      <label for="amount">Amount:</label>
      <input type="text" id="amount" name="amount" /><br /><br>

      <label for="sec_no">Section Number:</label>
      <input type="text" id="sec_no" name="sec_no" /><br /><br>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" /><br /><br>
      <p id="para"></p>
      </form>
      <div class="btn">
        <input type="submit" value="Submit" /> 
      </div>
      <br>
    <form action="logout.php" method="post">
      <div class="btn">
        <input type="submit" name="logout" value="logout" />
      </div>
    </form>
    <div class="btn">
      <button class="view" onclick="calculate_tax()"> click here to see tax </button> <br>
    </div>
    <script src="calc_tax.js"> </script>
    </div>
    <br>
    <div class="footer">
        <p>&copy; Tax Help. All rights reserved.</p>
    </div>
  </body>
</html>
'; } else { header("location : login.php"); }
