<?php
    include("database.php");
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link  rel="stylesheet" href="profile.css">
</head>
<body background="background.jpg">
    <div class="header">
        <div class="imgcont">
          <img src="icon.png" alt="Profile Picture" class="profile-icon">
          <a href="index.php" class="profile-link"><?php echo $_SESSION["username"]?></a>
        </div>
        <h1 class="heading">TAX-Help</h1>
        <div class="header-links">
        <a href="mailto:">Contact Us</a>
        </div>
    </div>
    <div class="info">
    <h1 class="headin">Your Tax Information</h1>
    <?php

$username=$_SESSION["username"];
$result=pg_query($conn,"select * from Teacher where uname='$username'");
    $rw=pg_fetch_object($result);
    $teacher_id=$rw->teacher_id;
    $rt=pg_query($conn,"select annual_income.basic_salary,annual_income.gross_salary,annual_income.other_income,annual_income.gross_total_income,sal_deduction.total_deduction ,tax.net_income,tax.tax_on_income,tax.health_edu_cess,tax.total_tax  from annual_income natural join deductions natural join sal_deduction natural join tax where teacher_id='$teacher_id' ;");
        $row = pg_fetch_object($rt);
        $basic_salary = $row->basic_salary;
$gross_salary = $row->gross_salary;
$other_income = $row->other_income;
$gross_total_income = $row->gross_total_income;
$total_deduction = $row->total_deduction;
$net_income = $row->net_income;
$tax_on_income = $row->tax_on_income;
$health_edu_cess = $row->health_edu_cess;
$total_tax = $row->total_tax
    ?>

    <div class="container">
        <div class="income">Income</div>
        <div class="basic_salary">Basic salary :<?php echo $basic_salary ?>
</div>
        <div class="gross_salary">Gross salary :<?php echo $gross_salary ?>
</div>
        <div class="other_income">Other income :<?php echo $other_income ?>
</div>
        <div class="gross_total_income">Gross total income :<?php echo $gross_total_income ?>
</div>
        <div class="deductions">total deduction</div>
        <div class="total_deduction"><?php echo $total_deduction ?>
</div>
        <div class="netincome">Net income</div>
        <div class="net_income"><?php echo $net_income ?></div>
        <div class="tax">Tax</div>
        <div class="tax_on_income">Tax on income :<?php echo $tax_on_income ?>
</div>
        <div class="health_edu_cess">Health & education cess :<?php echo $health_edu_cess ?>
</div>
        <div class="ttax">Total Tax</div>
        <div class="total_tax"><?php echo $total_tax ?>
</div>
    </div>
    
    </div>
        <div class="footer">
            <p>&copy; Tax Help. All rights reserved.</p>
        </div>
</body>
</html>