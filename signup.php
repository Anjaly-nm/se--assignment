<?php
if(isset($_POST['submit'])){
    include "connection.php";

    $username = isset($_POST['user']) ? $_POST['user'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $cpassword = isset($_POST['cpass']) ? $_POST['cpass'] : '';


    $sql = "select * from users where username='$username'";
    $result = mysqli_query($conn,$sql);
    $count_user = mysqli_num_rows($result);

    $sql = "select * from users where email='$email'";
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if($count_user==0 || $count_email==0){
        if($password==$cpassword){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "insert into users(username, email, password) values('$username','$email','$hash')";
            $result = mysqli_query($conn,$sql);
        }

    }
    else{
        echo '<script>
        alert("password do not match!!!");
        window.location.href="signup.php"
        </script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BeautyBliss.com</title>

    <title>Bootstrap demo</title>

    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php
        include "navbar3.php";
    ?>
    <div id="form">
        <h1>Signup</h1>
        <form name="form" action="signup.php" method="POST">
            <label>Enter Username</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email</label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Enter Password</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Retype Password </label>
            <input type="cpassword" id="cpass" name="cpass" required><br><br>
            <input type="submit" id="btn" value="signup" name="submit"/>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>