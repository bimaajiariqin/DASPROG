<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
$id = $_GET["id"];

// Hapus catatan terkait dalam tabel transaksi
mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_user='$id'");

// Sekarang hapus user
$result = mysqli_query($mysqli, "DELETE FROM user WHERE id='$id'");

header("location:view.php");
?>
