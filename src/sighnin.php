<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign IN</title>
     <link rel="stylesheet" href="style.css">  
</head> 
<body>
     <div class="login-page">
    <div class="form">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="register-form">
        <input type="text" placeholder="name" name="name" />
        <input type="password" placeholder="password" name="password" />
        <input type="text" placeholder="emailaddress"  name="emailaddress"/>
        <input type="submit" value="Create">
        <p class="message">Already registered? <a href="./login.php">Sign In</a></p>
      </form>
    </div>
     </div>
</body>
</html>