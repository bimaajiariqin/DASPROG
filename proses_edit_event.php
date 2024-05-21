<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');


//cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    $id = $_POST['id_event'];
    $nama_event = $_POST['nama_event']; 
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $lokasi= $_POST['lokasi'];
    $harga= $_POST['harga'];
    $tickets_available= $_POST['tickets_available'];
    echo $harga;
    
    
    //buat query update
    $result = mysqli_query($mysqli, "UPDATE event SET nama_event='$nama_event', hari='$hari', tanggal='$tanggal', lokasi='$lokasi', harga='$harga', tickets_available='$tickets_available' WHERE id_event=$id");
    header('location:view_event.php');
} else {
    die("Akses dilarang...");
}
?>