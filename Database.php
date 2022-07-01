<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "php_oop";
    public $conn;

    // database connection
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->conn;
            // echo "Connected successfully";
        }
    }

    public function insertData($post)
    {
        $customers_name = $this->conn->real_escape_string($_POST['customers_name']);
        $customers_email = $this->conn->real_escape_string($_POST['customers_email']);
        $customers_salary = $this->conn->real_escape_string($_POST['customers_salary']);
        $query = "INSERT INTO tbl_customers (customers_name, customers_email, customers_salary) VALUES ('$customers_name', '$customers_email', '$customers_salary'))";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location:Index.php?msg1=insert");
        } else {
            echo ("Registration Failed Try again!");
        }
    }

    public function selectData()
    {
        $query = "SELECT * FROM tbl_customers";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Data Found";
        }
    }

    public function selectDataById($id)
    {
        $query = "SELECT * FROM tbl_customers WHERE customers_id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc());
            return $row;
        } else {
            echo "No Data Found";
        }
    }

    public function updateData($postData)
    {
        $customers_name = $this->conn->real_escape_string($_POST['ucustomers_name']);
        $customers_email = $this->conn->real_escape_string($_POST['ucustomers_email']);
        $customers_salary = $this->conn->real_escape_string($_POST['ucustomers_salary']);
        $id = $this->conn->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE tbl_customers SET customers_name = '$customers_name', customers_email = '$customers_email', customers_salary = '$customers_salary' WHERE customers_id = '$id'";
            $sql = $this->conn->query($query);
            if ($query == true) {
                header("Location:Index.php?msg2=update");
            } else {
                echo "Update Failed Try again!";
            }
        }
    }
}
