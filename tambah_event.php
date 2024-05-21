<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

require 'function_tambah_event.php';

if(isset($_POST['event'])){

    if(event($_POST)> 0){
        echo "<script>
        alert('Event Baru Berhasil Ditambahkan!')</script>";
    }
    else{
        echo mysqli_error($mysqli );
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register Event</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Tambah Event</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama Event</label>
                    <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Masukkan Nama Event" required>
                </div>
                <div class="form-group">
                    <label for="username">Hari</label>
                    <input type="text" class="form-control" id="hari" name="hari" placeholder="Masukkan Hari"required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Password"required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi"required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Harga</label>
                    <input type="decimal" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga"required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Tickets Available</label>
                    <input type="text" class="form-control" id="tickets_available" name="tickets_available" placeholder="Masukkan tickets vailable"required>
                </div>
                
                <button name="event" type="submit" class="btn btn-primary">Tambah</button>


            </form>
        </div>
    </div>
</div>

</body>
</html>