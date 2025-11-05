<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['fullname'])){
header("location:dashboard.php");
}



$connection = new mysqli('localhost', 'root', '', 'revision', 3306);
if ($connection->connect_error) {
    die("Database connection failed");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    // var_dump($email);
    $password = md5($_POST['password']);

    // Check if user exists
    $query = "SELECT * FROM auth WHERE email='$email'";
    $res = mysqli_query($connection, $query);
    // var_dump($res);
    $num = mysqli_num_rows($res);
    if ($num == 0) {
        echo "<script>alert('email is not registered')</script>";
        exit();
    }
    $row = mysqli_fetch_assoc($res);
    //md5()

    if ($row['password'] != $password) {

        echo "<script>alert('incorrect password')</script>";
        exit();
    }
    if ($row['is_verified'] == 0) {
        echo "<script>alert('email is not verified.please verify your email')</script>";
        exit();
    }
    echo "<script>alert('Login successfull!')</script>";
    
    $_SESSION['user_id'] = base64_encode($row['id']);
    $_SESSION['fullname'] = base64_encode($row['fullname']);
    $_COOKIE['user_id']= base64_encode($row['id']);
    $_COOKIE['fullname']= base64_encode($row['fullname']);
  
   echo  $_SESSION['user_id'];
   echo $_SESSION['fullname'];
    // header("location:dashboard.php");
   
} else {
}
?>