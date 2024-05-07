<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');


//cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email= $_POST['email'];
    $role = $_POST['role'];
    
    
    //buat query update
    $result = mysqli_query($mysqli, "UPDATE user SET nama='$nama', username='$username', password='$password', email='$email', role='$role' WHERE id=$id");
    header('location:view.php');
} else {
    die("Akses dilarang...");
}
?>