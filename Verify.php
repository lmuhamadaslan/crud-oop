<?php
include('Database.php');

class Verify extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($post)
    {
        // check if user already exists
        $password = md5($post['user_password']);
        $query = "SELECT * FROM tbl_user WHERE user_email = '$post[user_email]'";
        $check = $this->conn->query($query);
        if ($check) {
            if ($check->num_rows > 0) {
                // header('Location:Register.php?msg=user_exists');
                echo "User Already Exists";
            } else {
                // insert data to database
                $query = "INSERT INTO tbl_user (user_firstName, user_name, user_email, user_password)
            VALUES ('$post[user_firstName]', '$post[user_name]', '$post[user_email]', '$password')";
                $sql = $this->conn->query($query);
                if ($sql == true) {
                    header("Location:Register.php?msg=register_success");
                } else {
                    echo ("Registration Failed Try again!");
                }
            }
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

    public function login($post)
    {
        $password = md5($post['user_password']);
        $query = "SELECT * FROM tbl_user WHERE user_email = '$post[user_email]' AND user_password = '$password'";
        $sql = $this->conn->query($query);
        $data = mysqli_fetch_array($sql);
        if ($sql->num_rows == 1) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $data['user_id'];
            header("Location:Dashboard.php?msg=login_success");
        } else {
            echo "Email or Password is incorrect";
        }
    }

    // public function fullName($id)
    // {
    //     $query = "SELECT * FROM tbl_user WHERE user_id = '$id'";
    //     $sql = $this->conn->query($query);
    //     $row = mysqli_fetch_array($sql);
    //     return $row['user_firstName'];
    // }

    public function session()
    {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
    }

    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
}
