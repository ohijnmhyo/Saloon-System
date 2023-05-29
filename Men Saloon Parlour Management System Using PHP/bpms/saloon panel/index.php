<?php
session_start();
error_reporting(0);
error_reporting(E_ALL);

include('include/dbconnection.php');

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pasword = ($_POST['password']);
    $query = mysqli_query($con, "select ID from tblsalon where  UserName='$user' && Password='$pasword' ");
    $ret = mysqli_fetch_array($query);
    // var_dump($ret);
    if ($ret > 0) {
        echo '<script>alert("Account Login Successful")</script>';
        $_SESSION['bpmsaid'] = $ret['ID'];

        header('location:blank.php');
    } else {
        $msg = "Invalid Details.";
        echo '<script>alert("Invalid Details.")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
    <div class="box">

        <form role="form" method="post" action="">


            <h2>Welcome to Saloon Panel Login</h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Userame</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>

            <input type="submit" name="login" value="Login">
            <a href="../index.php" class="button">Go Back to the home page</a>
        </form>


    </div>
</body>

</html>