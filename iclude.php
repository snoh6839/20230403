<?php
include_once("./dbconnectfunc.php");
$sql = "SELECT floor(AVG(salary)) FROM salaries WHERE to_date = '9999-01-01'";


$result = dbconn_query($sql);

// var_dump($result);


foreach ($result as $val) {
    echo "평균 연봉 : " . $val["floor(AVG(salary))"];
}

include_once("./pdoinsert.php");

// $sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
//         VALUES (:emp_no,:birth_date,:first_name,:last_name,:gender,:hire_date)";
// $inparams = array(":emp_no" => 500001, ":birth_date" => '1996-12-23', ":first_name" => 'Subin', ":last_name" => 'Noh', ":gender" => 'F', ":hire_date" => '2023-03-14');

// $result = execute_query($sql, $inparams);

// $sql = "UPDATE employees SET first_name=:first_name, last_name=:last_name WHERE emp_no = 500001";
// $inparams = array(":first_name" => '길동', ":last_name" => '홍');
// $result = execute_query($sql, $inparams);

// $sql = "DELETE FROM employees  WHERE emp_no = :emp_no";
// $inparams = array(":emp_no" => 500001);
// $result = execute_query($sql, $inparams);
?>