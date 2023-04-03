<?php
function execute_query($sql, $inparams) {
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
    $stmt->execute($inparams);
    $result = $obj_con->commit();

    $obj_con = null;
    
    return $result;
}

// $sql = "SELECT dept_no, dept_name FROM departments where dept_no = ':dept_no' and dept_name = ':dept_name'";
// $params = array(":dept_no" => "d011", ":dept_name" => "PHP풀스택");

// $result = execute_query($sql, $params);

//
// class Database {
//     private $db_host = "localhost";
//     private $db_user = "root";
//     private $db_password = "root506";
//     private $db_name = "employees";
//     private $db_charset = "utf8mb4";
//     private $db_option = array(
//         PDO::ATTR_EMULATE_PREPARES => false,
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//     );
//     private $obj_con;

//     public function __construct() {
//         $this->obj_con = new PDO(
//             "mysql:host={$this->db_host};dbname={$this->db_name};charset={$this->db_charset}",
//             $this->db_user,
//             $this->db_password,
//             $this->db_option
//         );
//     }

//     public function execute_query($sql, $params) {
//         $stmt = $this->obj_con->prepare($sql);
//         $stmt->execute($params);
//         $result = $stmt->fetchAll();
//         return $result;
//     }

//     public function __destruct() {
//         $this->obj_con = null;
//     }
// }

// $db = new Database();
// $sql = "SELECT e.emp_no, e.birth_date, s.salary
//         FROM employees e
//         INNER JOIN salaries s
//         ON e.emp_no = s.emp_no
//         WHERE (e.emp_no = :emp1 or e.emp_no = :emp2)
//         AND s.to_date = '9999-01-01'";
// $params = array(":emp1" => 10001, ":emp2" => 10002);
// $result = $db->execute_query($sql, $params);

// foreach ($result as $val) {
//     echo "emp_no : " . $val["emp_no"] . " " . "birth_date : " . $val["birth_date"] . " " . "salary : " . $val["salary"] . "\n";
// }

?>
