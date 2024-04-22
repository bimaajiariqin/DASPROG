<?php
function register ($data){

    $nama =$data['nama'];
    $username =$data['username'];
    $password =$data['password'];
    $role=$data['role'];
    $email=$data['email'];

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//sudah ada username 
$result = mysqli_query($mysqli," SELECT * FROM user WHERE username= '$username' ");

if(mysqli_fetch_assoc($result )){

    echo "<script>
    alert('Username Sudah Ada!')</script>";

    return false;

}

// Memeriksa apakah koneksi berhasil
if ($mysqli->connect_error) {
    die('Koneksi Gagal: ' . $mysqli->connect_error);
}


$query = "INSERT INTO user VALUES ('','$nama','$username','$password','$role','$email')";
if ($mysqli->query($query)) {
    header("location:index.php");

} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();

}
?>