<?php
// isi nama host, username mysql, dan password mysql anda
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

// Membuat koneksi
$mysqli = mysqli_connect($databasehost,$databaseusername , $databasepassword, $databasename);

// Cek koneksi
if ($mysqli){
  echo "koneksi database berhasil.<br/>";
}else{
  echo "Koneksi gagal.<br/>";
}
?>