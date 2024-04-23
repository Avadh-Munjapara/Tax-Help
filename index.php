<?php
session_start();
error_reporting(0);
ini_set('display_errors',0);
if (isset($_SESSION["username"])) {
  echo '
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Income Tax Calculator</title>
    <style>
    *{
      margin:0;
      padding:0;
      box-sizing: border-box;
    }
    body{
      background-size: cover;
    }
    .header{
      background-color: rgb(24, 27, 46);
      color: white;
      display: flex;
      height: 6rem;
      justify-content: space-between;
      align-items: center;
    }
    .headin{
      margin-top:2rem;
      margin-bottom:1rem;
    }
    .imgcont{
      display: flex;
      flex-direction: column;
      margin-left: 1rem;
    }
    .header-links {
      margin-right: 1rem;
      margin-top: 1.9rem;
    }
    .header-links a {
      color: white;
      text-decoration: none;
      margin-left: 2rem;
    }
    .header-links a:hover {
      text-decoration: underline;
    }
    .profile-icon { 
      width: 2rem; 
      height: 2rem; 
      margin-top: 1rem;
      margin-bottom: 0.3rem;
      border-radius: 50%; 
  }
    .profile-link {
      bottom: 0; 
      color: white; 
      text-decoration: none; 
    }
    h1{
      text-align: center;
    }
    .footer {
      width: 100%;
      height: 100px;
      background-color: rgb(24, 27, 46);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }
   
    .center{
      word-spacing: 5px;
      align-content: center;
      align-items: center;
      margin-left: 42%;
      margin-right: auto;
    }
    .sub{
      margin-top: 0.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;  
    }
    .btns{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .lg{
      margin-bottom: 1rem;
    }
    /* .tc{
      display: grid;
      grid-template-columns: 100px 100px;
      grid-template-rows: ;
    }
    .tc input{

    } */
    </style>
    </head>

  <body background="background.jpg">
        <div class="header">
            <div class="imgcont">
              <img src="icon.png" alt="Profile Picture" class="profile-icon">
              <a href="profile.php" class="profile-link">'.$_SESSION["username"].'</a>
            </div>
            <h1 class="heading">TAX-Help</h1>
            <div class="header-links">
            <a href="mailto:">Contact Us</a>
            </div>
        </div>
        <h1 class="headin">Income Tax Calculator</h1><br />
        <div class="tc">
          <form action="index.php" method="POST" class="center">
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
           <input type="text" id="professional_tax" name="professional_tax" value=1400 readonly /><br /><br>
    
           <label for="amount">Amount:</label>
           <input type="text" id="amount" name="amount" /><br /><br>
    
           <label for="sec_no">Section Number:</label>
           <input type="text" id="sec_no" name="sec_no" /><br /><br>
    
           <label for="name">Name:</label>
           <input type="text" id="name" name="name" /><br /><br>
           <p id="para"></p>
          
            <input type="submit" value="Submit" /> 
           
           </form>
        </div>
        
    
       <br>
       <div class="btns">
        <form action="logout.php" method="post">
          <div class="btn">
            <input type="submit" class="lg" name="logout" value="logout" />
          </div>
        </form>
        <div class="btn">
          <button class="view" onclick="calculate_tax()"> click here to see tax </button> <br>
        </div>
        <script src="calc_tax.js"> </script>
        <br>
     </div>
    
    <div class="footer">
        <p>&copy; Tax Help. All rights reserved.</p>
    </div>
  </body>
</html>
'; } else { header("location : login.php"); }
include("database.php");
    $username=$_SESSION["username"];
$result=pg_query($conn,"select * from Teacher where uname='$username'");
if((pg_num_rows($result)>0)){
    $row=pg_fetch_object($result);
    $teacher_id=$row->teacher_id;
    echo $teacher_id;
    $edu_expense=$_POST["edu_expense"];
    $medical_al = $_POST["medical_al"];
$house_rent_al = $_POST["house_rent_al"];
$other_al = $_POST["other_al"];
$basic_salary = $_POST["basic_salary"];
$other_income = $_POST["other_income"];
$professional_tax = $_POST["professional_tax"];
$amount = $_POST["amount"];
$sec_no = $_POST["sec_no"];
$name = $_POST["name"];
pg_query($conn,"INSERT INTO dependent_child (teacher_id, edu_expense) VALUES ('$teacher_id', '$edu_expense');");
pg_query($conn, "INSERT INTO annual_income (teacher_id, medical_al, house_rent_al, other_al, basic_salary, other_income) 
VALUES ('$teacher_id', '$medical_al', '$house_rent_al', '$other_al', '$basic_salary', '$other_income');");
$result1=pg_query($conn,"select * from annual_income where teacher_id='$teacher_id'");
if((pg_num_rows($result1)>0)){
    $row=pg_fetch_object($result1);
    $income_id=$row->income_id;
}
pg_query($conn,"INSERT INTO sal_deduction (teacher_id, income_id, proffessional_tax)
VALUES ('$teacher_id', '$income_id', '$professional_tax')");
pg_query($conn,"INSERT INTO deductions (teacher_id, amount, sec_no, name)
VALUES ('$teacher_id', '$amount', '$sec_no', '$name')");
pg_query($conn,"INSERT INTO tax (teacher_id, income_id)
VALUES ('$teacher_id','$income_id' )");

}

?>  