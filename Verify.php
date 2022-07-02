<?php
include('Database.php');

class Verify extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($user_firstName, $user_name, $user_email, $user_password)
    {
        $user_password = md5($user_password);
        $query = "SELECT FROM tbl_users WHERE user_email = '$user_email'";
        $check = $this->conn->query($query);
        if ($check->num_rows > 0) {
            header("Location:Register.php?msg=email_exists");
        } else {
            $query = "INSERT INTO tbl_user (user_firstName, user_name, user_email, user_email, user_password)
            VALUES ('$user_firstName', '$user_name', '$user_email', '$user_email', '$user_password')";
            $sql = $this->conn->query($query);
            if ($sql == true) {
                header("Location:Register.php?msg=insert_success");
            } else {
                echo ("Registration Failed Try again!");
            }
        }
    }
}
