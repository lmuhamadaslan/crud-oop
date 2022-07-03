<?php

include('Verify.php');

$userObj = new Verify();

if (isset($_POST['submit'])) {
    $userObj->register($_POST);
}

?>

<html>

<head>
    <title>PHP MySql OOP CRUD Example Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    if (isset($_GET['msg']) == 'register_success') {
        echo '<div class="alert alert-success">
        <strong>Success!</strong> Registration Successful.
        </div>';
    }
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form action="Register.php" method="post">
            <input type="text" name="user_firstName" placeholder="Please Enter Name" required />
            <br />
            <input type="text" name="user name" placeholder="Please Enter Userame" required />
            <br />
            <input type="text" name="user_email" placeholder="Please Enter Email" required />
            <br />
            <input type="password" name="user_password" placeholder="Please Enter Password" required />
            <br />
            <input type="submit" name="submit" value="Register" />
        </form>
        <p>Alredy Registered?<a href="Index.php"> Login Here</a></p>
    </div>
</body>

</html>