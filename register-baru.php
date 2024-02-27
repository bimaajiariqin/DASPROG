<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
</head>
<body>

    <?php include "service/koneksi-db.php";
    session_start();

    $register_message ="";

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST["register"])){
        $nama = $_POST["username1"]; 
        $username = $_POST["username2"]; 
        $password = $_POST["password"];
        $email = $_POST["email"]; 

        try {
             $sql = "INSERT INTO user (nama, username, password, email) VALUES ('$nama', '$username', '$password', '$email')";

        if ($db->query($sql)) {
            $register_message = "Daftar akun berhasil";
        }else {
            $register_message = "Daftar akun gagal";
        }
        }catch (mysqli_sql_exception) {
            $register_message = "Akun sudah digunakan";
        }
        $db->close();

       
    }
    
    
    ?>
    
    <h3>Daftar Akun</h3>
    <i><?= $register_message ?></i>
    <form action="" name="register-baru.php" method="POST">
        <input type="text" placeholder="Nama" name="username1">
        <input type="text" placeholder="Username" name="username2">
        <input type="password" placeholder="Password" name="password">
        <input type="text" placeholder="Email" name="email">
        <button type="submit" name="register">Daftar Sekarang</button>

    </form>


</body>
</html>