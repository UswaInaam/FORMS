<?php
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;



$connection = new mysqli('localhost', 'root', '', 'revision', 3306);
if ($connection->connect_error) {
    echo "there is an error in connecting to database";
    die();
} else {
    echo "database is connecting";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fullname'];


    $password =  md5($_POST['password']);
    $email = $_POST['email'];
    $query = "Select email from auth where email='$email'";
    $res = mysqli_query($connection, $query);
    $num = mysqli_num_rows($res);
    if ($num > 0) {
        echo "<script>alert('email already registered')</script>";
        exit();
        header("Location:main.php");
    }
    $token = bin2hex(random_bytes(8));


    $sql = "insert into auth(fullname,password,email,token)values('$fullname','$password','$email','$token')";
    $result = mysqli_query($connection, $sql);
    if ($result == true) {
        echo "<script>alert('data is inserted')</script>";
    } else {
        echo "<script>alert('data is not inserted')</script>";
        exit();
    }
    $mail = new PHPMailer();
    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "uswainam267@gmail.com";
        $mail->Password = "";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->setFrom("uswainam@267gmail.com", "Uswa Inaam");
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Verify your email";
        $mail->Body = "Click the link to verify your email: <a href='http://localhost/FORMS/src/verify.php?token=$token'>Verify Email</a>";
        $mail->send();
        echo "<script>alert('verification link has been sent to your email')</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error:{$e->getMessage()}')</script>";
    }
}
?>
