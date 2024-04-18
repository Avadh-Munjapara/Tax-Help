<?php
session_start();
if (isset($_SESSION["username"])) {
  echo '
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Income Tax Calculator</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body background="background.jpg">
  <div class="both">
  <div class="header">
            <h2>TAX-Help</h2>
            <div class="header-links">
                <a href="mailto:">Contact Us</a>
            </div>
            <div class="nam">user : '
             .$_SESSION["username"].
           ' </div>
        </div>
        <div>
    <h1>Income Tax Calculator</h1>
    </div></div>
    <br />
    <div class="content">
    <form class="center" action="db_query.php" method="POST">
    
          <label for="edu_expense">Education Expense:</label>
      
          <input
          align="center"
          type="text"
          id="edu_expense"
          name="edu_expense"
          required
      >
          <label for="medical_al">Medical Allowance:</label>

       
          <input
          type="number"
          id="medical_al"
          name="medical_al"
          required
     >
          <label for="house_rent_al">House Rent Allowance:</label>
     
          <input
          type="number"
          id="house_rent_al"
          name="house_rent_al"
          required
     >
          <label for="other_al">Other Allowance:</label>
     
          <input type="number" id="other_al" name="other_al" required />


      
          <label for="basic_salary">Basic Salary:</label>

          <input
          type="number"
          id="basic_salary"
          name="basic_salary"
          required
 >
          <label for="other_income">Other Income:</label>

      
          <input
          type="number"
          id="other_income"
          name="other_income"
          required
      >
    

    
          <label for="professional_tax">Professional Tax:</label>
          <input type="text" id="professional_tax" name="professional_tax" />


          <label for="amount">Amount:</label>
      
          <input type="text" id="amount" name="amount" />

       
          <label for="sec_no">Section Number:</label>
       
          <input type="text" id="sec_no" name="sec_no" />

     
          <label for="name">Name:</label>
    
          <input type="text" id="name" name="name" />


      <p id="para"></p>
      <div class="btn"> <input type="submit" value="Submit" /><br>
      </form>

      <div class="btn"><button class="view" onclick="calculate_tax()">
      click here to see tax
      </button> </div>
      <script src="calc_tax.js"> </script>

      <form action="logout.php" method="post">
      <div class="btn">
      <input type="submit" name="logout" value="logout" /> 
      </div><br>
      </form>
     
      </div>
      <div class="footer">
        <p>&copy; 2024 TAX-Help. All rights reserved.</p>
      </div>
  </body>
</html>
';
} else {
  header("location : login.php");
}
