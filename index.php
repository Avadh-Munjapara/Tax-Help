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
    <script>
      function calculate_tax() {
        let edu_expense = parseFloat(
          document.getElementById("edu_expense").value
        );
        let medical_al = parseFloat(
          document.getElementById("medical_al").value
        );
        let house_rent_al = parseFloat(
          document.getElementById("house_rent_al").value
        );
        let other_al = parseFloat(document.getElementById("other_al").value);
        let basic_salary = parseFloat(
          document.getElementById("basic_salary").value
        );
        let other_income = parseFloat(
          document.getElementById("other_income").value
        );
        let professional_tax = parseFloat(
          document.getElementById("professional_tax").value
        );
        let amount = parseFloat(document.getElementById("amount").value);
        let sec_no = document.getElementById("sec_no").value;
        let name = document.getElementById("name").value;
        let para = document.getElementById("para");
        let gross_salary = medical_al + house_rent_al + other_al + basic_salary;
        let gross_total_income = gross_salary + other_income;

        let g_p_f = 0.12 * basic_salary;
        let std_deduction = 50000;
        if (edu_expense > 150000) {
          edu_expense = 150000;
        }
        let total_deduction =
          edu_expense + g_p_f + professional_tax + std_deduction + amount;
        let net_income = gross_total_income - total_deduction;

        let tax_on_income = 0;

        if (net_income < 300000) {
          tax_on_income = 0;
        } else if (net_income >= 300000 && net_income < 600000) {
          tax_on_income = net_income * 0.05;
        } else if (net_income >= 600000 && net_income < 900000) {
          tax_on_income = 15000 + (net_income - 600000) * 0.1;
        } else if (net_income >= 900000 && net_income < 1200000) {
          tax_on_income = 45000 + (net_income - 900000) * 0.15;
        } else if (net_income >= 1200000 && net_income < 1500000) {
          tax_on_income = 90000 + (net_income - 1200000) * 0.2;
        } else if (net_income >= 1500000) {
          tax_on_income = 150000 + (net_income - 1500000) * 0.3;
        }
        let health_edu_cess = 0.04 * tax_on_income;
        let total_tax = tax_on_income + health_edu_cess;
        console.log("Education Expense:", edu_expense);
        console.log("Medical Allowance:", medical_al);
        console.log("House Rent Allowance:", house_rent_al);
        console.log("Other Allowance:", other_al);
        console.log("Basic Salary:", basic_salary);
        console.log("Other Income:", other_income);
        console.log("Professional Tax:", professional_tax);
        console.log("Amount:", amount);
        console.log("Section Number:", sec_no);
        console.log("Name:", name);
        console.log("Gross Salary:", gross_salary);
        console.log("Gross Total Income:", gross_total_income);
        console.log("Gross Provident Fund:", g_p_f);
        console.log("Standard Deduction:", std_deduction);
        console.log("Total Deduction:", total_deduction);
        console.log("Net Income:", net_income);
        console.log("Tax on Income:", tax_on_income);
        console.log("Health & Education Cess:", health_edu_cess);
        console.log("Total Tax:", total_tax);
        para.innerHTML = total_tax;
      }
    </script>
  </body>
</html>
'; } else { header("location : login.php"); }
