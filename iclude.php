<?php
include_once("./pdoinsert.php");
$sql = "SELECT dept_no, dept_name FROM departments where dept_no = :dept_no";
$params = array(":dept_no" => "d002");

$result = execute_query($sql, $params);

// var_dump($result);

foreach ($result as $val) {
    echo "dept_no : " . $val["dept_no"] . " dept_name : " . $val["dept_name"];
}
?>