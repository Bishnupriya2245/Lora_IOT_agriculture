<?php
if($_POST){
    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "db1";
        $username=$_POST['username'];
        $password=$_POST['password'];
    $conn= mysqli_connect($host,$user,$pass,$db);
      $query="SELECT * from  user where username='$username' and  password='$password' ";
      $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
      session_start();
      $_SESSION['db1']='true';
      header('location:index.php');
    }
    else{
       echo '<p align="center" style="color:red;padding:20px;margin:20px;font-size:20px;">wrong username or password</p>';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Your Crop Details Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- for background -->
  <div class="background"></div>

  <!-- for form container -->
  <div class="container">
    <h2>Login</h2>
    <form method="POST">

      <div class="form-item">
        <span class="material-icons-outlined">
          account_circle
        </span>
        <input type="text" name="username" id="user" placeholder="Email or Username">
      </div>

      <div class="form-item">
        <span class="material-icons-outlined">
          lock
        </span>
        <input type="password" name="password" id="pass" placeholder="password">
      </div>

      <button type="submit">LOGIN</button>

    
</body>
</html>