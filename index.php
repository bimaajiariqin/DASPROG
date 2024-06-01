<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

if(isset($_POST["login"])){

    $email= $_POST["email"];
    $password= $_POST["password"];

    $result = mysqli_query($mysqli," SELECT * FROM user WHERE email= '$email' AND password='$password'");

    //cek username
    if(mysqli_num_rows($result ) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['role']=="Admin"){
            $_SESSION['username'] = $row['username']; // Set sesi username
            $_SESSION['email'] = $email; // Set sesi email
            $_SESSION['role'] = 'Admin';
            //alihkan ke halaman dashboard admin
            header("location: lpadmin.php");
            exit();
        } else if($row['role']=="User"){
            //buat session login dan username   
            $_SESSION['username'] = $row['username']; // Set sesi username
            $_SESSION['email'] = $email; // Set sesi email
            $_SESSION['role'] = 'User';
            //alihkan ke halaman dashboard user
            header("location: tugas-sms-1.php");
            exit();
        }
    } else {
        $error=true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
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
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 320px;
            max-width: 90%;
            text-align: center;
        }

        h1 {
            color: #444;
            margin-bottom: 25px;
            font-size: 1.8em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .forgot {
            color: #007bff;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
            font-size: 0.9em;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-style: italic;
            margin-top: 10px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1><br>
        <form action="" method="post">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Password">
            <?php if(isset($error)):?>
            <p class="error-message">Password / Username Njenengan Salah</p>
            <?php endif;?>       
            <button type="submit" name="login">Login</button>
        </form>
        <div>
            <a class="forgot" href="register.php">Register</a>    
        </div>
    </div>
</body>
</html>
