<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

if(isset($_POST["login"])){

    $username= $_POST["username"];
    $password= $_POST["password"];

    $result = mysqli_query($mysqli," SELECT * FROM user WHERE username= '$username' AND password='$password'");

    //cek username
    if( mysqli_num_rows($result )>0){
    $row =mysqli_fetch_assoc($result );
    if($row['role']=="Admin"){


        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'Admin';
        //alihkan ke halaman dashboard admin
        header("location:view.php");

    //cek jika user login sebagai user        
    }
    else if($row['role']=="User"){
        //buat session login dan username   
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'User';
        //alihkan ke halaman dashboard user
        header("location:tugas-sms-1.php");

    }else{

        //alihkan ke halaman user kembali
        header("location:index.php");
    }
}


    $error=true;
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>halaman Login</title>
        <style>
            /* login.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-image: url('background.jpg');
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  width: 300px;
  max-width: 90%;
  text-align: center;
}

h1 {
  color: #333;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

input[type="text"],
input[type="password"] {
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

.forgot {
  color: #333;
  text-decoration: none;
  margin-top: 10px;
  display: inline-block;
}

.forgot:hover {
  text-decoration: underline;
}

.error-message {
  color: red;
  font-style: italic;
  margin-top: 10px;
}

        </style>
    
    </head>
    <body>
        <div class="container">
            <h1>LOGIN</h1><br>
            <form action="" method="post">
                <input type="text" id="password" name="username" placeholder="username">
                <input type="password" id="username" name="password"placeholder="password">
                <?php if(isset($error)):?>
                <p align="center" style="color : red; font-style:italic;">Password / Username Njenengan Salah</p>
                <?php endif;?>       
                <button type="submit"  name="login">Login</button>
            </form>
         <div>
           <a class="forgot" href="register.php">Register</a>    
            </div>
        </div>
    </body>    
</html>