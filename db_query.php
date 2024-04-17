<?php
session_start();
include("database.php");
if(isset($_SESSION["username"])){
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
}

?>  