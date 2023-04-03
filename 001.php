class QueryExecutor {
  private $dbc;

  function __construct($host, $username, $password, $database, $port) {
    $this->dbc = mysqli_connect($host, $username, $password, $database, $port);
  }

  function execute_query($sql) {
    $result = mysqli_query($this->dbc, $sql);

    if (mysqli_num_rows($result) > 0) {
      $rows = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }

      mysqli_free_result($result);

      return $rows;
    } else {
      return 0;
    }
  }

  function __destruct() {
    mysqli_close($this->dbc);
  }
}

// 클래스 사용 예시
$queryExecutor = new QueryExecutor("localhost", "root", "root506", "employees", 3306);
$sql = "SELECT emp_no, concat(last_name, ' ' , first_name) as full_name, gender, birth_date FROM employees Where emp_no <= 10005;";
$result = $queryExecutor->execute_query($sql);

if ($result) {
  foreach ($result as $row) {
    echo "emp_no: " . $row["emp_no"] . " full_name: " . $row["full_name"] . " gender: " . $row["gender"] . " birth_date: " . $row["birth_date"] . "\n";
  }
} else {
  echo "0 results";
}
