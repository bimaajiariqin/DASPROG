<?php
function register ($data){

    $nama =$data['nama'];
    $password =$data['password'];
    $username =$data['username'];
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


$query = "INSERT INTO user VALUES ('$nama','$password','$username','','$email')";
if ($mysqli->query($query)) {
    header("location: tugas-sms-1.php");

} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();

}
?>