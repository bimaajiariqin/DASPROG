<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//kalau tidak ada id di query string
if(!isset($_GET['id'])){
    header('location:view.php');
}
$id_event= $_GET['id'];


//mengambil data pengguna berdasarkan id
$result = mysqli_query($mysqli,"SELECT * FROM event WHERE id_event=$id_event");

while($event_data = mysqli_fetch_array($result))
{
$id_event = $_GET['id'];
$nama_event = $event_data['nama_event']; 
$hari = $event_data['hari'];
$tanggal =$event_data['tanggal'];
$lokasi = $event_data['lokasi'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <header> 
        <h3>Formulir Edit Event</h3>
    </header>
    <form method="POST" action="proses_edit_event.php">
        <table>
            <tr>
                <td>Nama Event</td>
                <td><input type="text" name="nama_event" value="<?php echo $nama_event;?>"></td>
                </tr>
                <tr>
                <td>Hari</td>
                <td><input type="text" name="hari" value="<?php echo $hari;?>"></td>
                </tr>
                <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $tanggal;?>"></td>
                </tr>
                <tr>
                <td>Lokasi</td>
                <td><input type="text" name="lokasi" value="<?php echo $lokasi;?>"></td>
                </tr>
            <tr>
                <td><input type="hidden" name="id_event" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>