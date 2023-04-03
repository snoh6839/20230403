<?php
function execute_query($sql, $params) {
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
    
    $stmt = $obj_con->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll();

    $obj_con = null;
    
    return $result;
}

$sql = "INSERT INTO departments(
    dept_no,
    dept_name
)
    VALUES(
    :dept_no,
    :dept_name
    )";
$params = array(":dept_no" => "d011", ":dept_name" => "PHP풀스택");

$result = execute_query($sql, $params);


?>