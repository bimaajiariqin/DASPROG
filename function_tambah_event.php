<?php
function event ($data){

    $nama_event =$data['nama_event'];
    $hari =$data['hari'];
    $tanggal =$data['tanggal'];
    $lokasi=$data['lokasi'];
    $harga=$data['harga'];
    $stok=$data['stok'];

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//sudah ada username 
$result = mysqli_query($mysqli," SELECT * FROM event WHERE nama_event= '$nama_event' ");

if(mysqli_fetch_assoc($result )){

    echo "<script>
    alert('Username Sudah Ada!')</script>";

    return false;

}

// Memeriksa apakah koneksi berhasil
if ($mysqli->connect_error) {
    die('Koneksi Gagal: ' . $mysqli->connect_error);
}


$query = "INSERT INTO event VALUES ('','$nama_event','$hari','$tanggal','$lokasi','$harga', '$stok')";
if ($mysqli->query($query)) {
    header("location:view_event.php");

} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();

}
?>