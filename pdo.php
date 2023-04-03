<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "root506";
$db_name = "employees";
$db_charset = "utf8mb4";
$db_dns = "mysql:host=".$db_host.";dbname=". $db_name.";charset=". $db_charset;
$db_option =
    array(
        PDO::ATTR_EMULATE_PREPARES    => false ,
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION ,
        PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC 
    );

$obj_con = new PDO( $db_dns, $db_user, $db_password, $db_option );
$sql =
"SELECT e.emp_no, e.birth_date, s.salary
FROM employees e
INNER JOIN salaries s
ON e.emp_no = s.emp_no
WHERE (e.emp_no = :emp1 or e.emp_no = :emp2)
AND s.to_date = '9999-01-01'
";

$arr_prepare = 
array (
    ":emp1" => 10001
    , ":emp2" => 10002
);
$stmt = $obj_con->prepare($sql);
$stmt->execute( $arr_prepare );
$result = $stmt->fetchAll();

// var_dump($result);

foreach ( $result as $val ) {
    echo "emp_no : " . $val["emp_no"] ." " . "birth_date : " . $val["birth_date"]. " " . "salary : ".$val["salary"]."\n";
}

$obj_con = null;
?>