<?php
$connection = new mysqli('localhost', 'root', '', 'revision', 3306);
if ($connection->connect_error) {
  echo "there is an error in connecting to database";
  die();
} else {
  echo "database is connecting";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];


  $password =  md5($_POST['password']);
  $emailaddress = $_POST['emailaddress'];



  $sql = "insert into forms(username,password,emailaddress)values('$username','$password',$emailaddress)";
  $result = mysqli_query($connection, $sql);
  if ($result == true) {
    echo "<script>alert('data is inserted')</script>";
  } else {
    "<script>alert('data is not inserted')</script>";
  }
}






?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="login-page">
    <div class="form">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="$_POST" class="register-form">
        <input type="text" placeholder="name" />
        <input type="password" placeholder="password" />
        <input type="text" placeholder="email address" />
        <button>create</button>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      </form>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="$_POST" class="login-form">
        <input type="text" placeholder="username" />
        <input type="password" placeholder="password" />
        <input type="text" placeholder="email address" />
        <button>login</button>
        <p class="message">Not registered? <a href="">Create an account</a></p>
      </form>
    </div>
  </div>
</body>
<script src="index.js"></script>

</html>