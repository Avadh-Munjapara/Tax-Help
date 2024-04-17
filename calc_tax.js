let edu_expense = document.getElementById("edu_expene");
let medical_al = document.getElementById("medical_al");
let house_rent_al = document.getElementById("house_rent_al");
let other_al = document.getElementById("other_al");
let basic_salary = document.getElementById("basic_salary");
let other_income = document.getElementById("other_income");
let professional_tax = document.getElementById("professional_tax");
let amount = document.getElementById("amount");
let sec_no = document.getElementById("sec_no");
let name = document.getElementById("name");

let gross_salary = medical_al + house_rent_al + other_al + basic_salary;
let gross_total_income = gross_salary + other_income;

let g_p_f = 0.12 * basic_salary;
let std_deduction = 50000;
let total_deduction = g_p_f + professional_tax + std_deduction + amount;
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

