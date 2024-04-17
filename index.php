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
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1>Income Tax Calculator</h1>
    <br />
    <form action="db_query.php" method="POST">
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
      <input type="text" id="professional_tax" name="professional_tax" /><br />

      <label for="amount">Amount:</label>
      <input type="text" id="amount" name="amount" /><br />

      <label for="sec_no">Section Number:</label>
      <input type="text" id="sec_no" name="sec_no" /><br />

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" /><br />
      <p id="para"></p>
      <input type="submit" value="Submit" />
    </form>
    <form action="logout.php" method="post">
      <div class="btn">
        <input type="submit" name="logout" value="logout" />
      </div>
    </form>
    <button class="view" onclick="calculate_tax()">
      click here to see tax
    </button>
    <script src="calc_tax.js"> </script>
  </body>
</html>
'; } else { header("location : login.php"); }
