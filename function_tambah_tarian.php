<?php
function tarian ($data){

    $foto =$data['foto'];
    $nama_tarian =$data['nama_tarian'];
    $deskripsi_tarian =$data['deskripsi_tarian'];


$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//sudah ada username 
$result = mysqli_query($mysqli," SELECT * FROM tarian WHERE foto= '$foto' ");

if(mysqli_fetch_assoc($result )){

    echo "<script>
    alert('Username Sudah Ada!')</script>";

    return false;

}

// Memeriksa apakah koneksi berhasil
if ($mysqli->connect_error) {
    die('Koneksi Gagal: ' . $mysqli->connect_error);
}


$query = "INSERT INTO tarian VALUES ('','$foto','$nama_tarian','$deskripsi_tarian')";
if ($mysqli->query($query)) {
    header("location:view_tarian.php");

} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();

}
?>