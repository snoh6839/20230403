<?php

$mysqli = new mysqli("localhost", "root", "root506", "employees", 3306);

$stmt = $mysqli -> prepare(" SELECT emp_no, salary  FROM salaries Where to_date = ? AND salary >= ? ORDER BY salary DESC LIMIT ? ");

$to_dateE = "9999-01-01";
$salaryPay = 50000;
$limitNum = 5;

$stmt->bind_param('sii', $to_dateE, $salaryPay, $limitNum);
$stmt->execute();
$stmt->bind_result($emp_no_col, $salary_col);

while ($stmt->fetch()) {
    echo "emp_no: $emp_no_col salary: $salary_col \n";
}

$stmt->close();

?>