<?php
include('Verify.php');

$userObj = new Verify();

if (isset($_POST['submit'])) {
    $userObj->login($_POST);
}

?>

<html>

<head>
    <title>PHP MySql OOP CRUD Example Tutorial</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="form">
        <h1>Log In</h1>
        <form action="Index.php" method="post">
            <input type="text" name="user_email" placeholder="Please Enter Email" required />
            <br />
            <input type="password" name="user_password" placeholder="Please Enter Password" required />
            <br />
            <input type="submit" name="submit" value="Login" />
        </form>
        <p>Not registered yet?<a href="Register.php"> Register Here</a></p>
    </div>
</body>

</html>