<?php
include("koneksi_edit.php");

//cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $email = $_POST['email']; 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    
    //buat query update
    $result = mysqli_query($mysqli, "UPDATE user SET email='$email', username='$username', password='$password',role='$role' WHERE id=$id");
    header('location:view edit.php');
} else {
    die("Akses dilarang...");
}
?>