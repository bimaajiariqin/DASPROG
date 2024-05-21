<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

//kalau tidak ada id di query string
if(!isset($_GET['id'])){
    header('location:view_tarian.php');
}
$id_tarian= $_GET['id'];


//mengambil data pengguna berdasarkan id
$result = mysqli_query($mysqli,"SELECT * FROm tarian WHERE id_tarian=$id_tarian");

while($tarian_data = mysqli_fetch_array($result))
{
$id_tarian = $_GET['id'];
$foto = $tarian_data['foto']; 
$nama_tarian = $tarian_data['nama_tarian'];
$deskripsi_tarian = $tarian_data['deskripsi_tarian'];  
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
        <h3>Formulir Edit Tarian</h3>
    </header>
    <form method="POST" action="proses_edit_tarian.php">
        <table>
            <tr>
                <td>Foto</td>
                <td><input type="text" name="foto" value="<?php echo $foto;?>"></td>
                </tr>
                <tr>
                <td>Nama Tarian</td>
                <td><input type="text" name="nama_tarian" value="<?php echo $nama_tarian;?>"></td>
                </tr>
                <tr>
                <td>Deskrpsi Tarian</td>
                <td><input type="text" name="deskrpsi_tarian" value="<?php echo $deskrpsi_tarian;?>"></td>
                </tr>

            <tr>
                <td><input type="hidden" name="id_tarian" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>