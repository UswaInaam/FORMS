<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['fullname'])) {
    echo $_SESSION['user_id'];
    echo "<script>alert('Welcome to the Dashboard')</script>";
} else {
    echo "<script>alert('please login to accesss the dashboard')</script>";
    header("location:main.php");
}

// session_destroy();
// if(isset($_SESSION['logout'])){
//     echo"<script>alert('logout successfully!')</script>";

// }
// header("location:main.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>

<body>
    <form class="forms_form" action="main.php" method="post">
        <input type="submit" value="Logout" class="forms_buttons-action">
    </form>
</body>

</html>