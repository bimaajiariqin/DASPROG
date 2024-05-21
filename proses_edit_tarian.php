<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');


//cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    $id_tarian = $_POST['id_tarian'];
    $foto = $_POST['foto']; 
    $nama_tarian = $_POST['nama_tarian'];
    $deskripsi_tarian = $_POST['deskripsi_tarian'];


    
    
    //buat query update
    $result = mysqli_query($mysqli, "UPDATE tarian SET foto='$foto', nama_tarian='$nama_tarian', deskripsi_tarian='$deskripsi_tarian' WHERE id_tarian=$id_tarian");
    header('location:view_tarian.php');
} else {
    die("Akses dilarang...");
}
?>