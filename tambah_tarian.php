<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

require 'function_tambah_tarian.php';

if(isset($_POST['tarian'])){

    if(tarian($_POST)> 0){
        echo "<script>
        alert('Tarian Baru Berhasil Ditambahkan!')</script>";
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
            <h1>Tambah Tarian</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="text" class="form-control" id="foto" name="foto" placeholder="Masukkan Nama Foto" required>
                </div>
                <div class="form-group">
                    <label for="nama_tarian">Nama Tarian</label>
                    <input type="text" class="form-control" id="nama_tarian" name="nama_tarian" placeholder="Masukkan Nama Tarian"required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_tarian">Deskripsi Tarian</label>
                    <input type="text" class="form-control" id="deskripsi_tarian" name="deskripsi_tarian" placeholder="Masukkan Deskripsi Tarian"required>
                </div>
                
                <button name="tarian" type="submit" class="btn btn-primary">Tambah</button>


            </form>
        </div>
    </div>
</div>

</body>
</html>