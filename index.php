<?php

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

if(isset($_POST["login"])){

    $username= $_POST["username"];
    $password= $_POST["password"];

    $result = mysqli_query($mysqli," SELECT * FROM user WHERE username= '$username' AND password='$password'");

    //cek username
    if( mysqli_num_rows($result ) === 1){
    $row =mysqli_fetch_assoc($result );
        header("location: tugas-sms-1.php");
        echo "<script>
        alert('Salamat Datang!')</script>";
        exit;
}


    $error=true;
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>LogIn</title>
        <link rel="stylesheet" href="login.css">
    
    </head>
    <body>
        <div class="container">
            <h1>LogIn</h1><br>
            <form action="" method="post">
                <input type="text" id="password" name="username" placeholder="Username">
                <input type="password" id="username" name="password"placeholder="Password">
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