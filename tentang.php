<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url("pexels-onisam-2916337.jpg");
      background-size: cover;
      background-position: center;
    }
    
    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      max-width: 1200px;
      margin: 20px auto;
    }

    .box {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
      transition: transform 1s, box-shadow 0.5s;
      max-width: 300px;
      margin: 10px;
      display: flex;
      flex-direction: column;
    }

    .box:hover {
      transform: translateY(-30px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .box img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    .box h3 {
      margin: 20px 0 10px;
      font-size: 1.5em;
      color: #333;
    }

    .box p {
      padding: 0 20px;
      font-size: 1rem;
      color: #666;
      flex-grow: 1;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin: 20px;
      background-color: #007BFF;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .back-button {
      margin-top: 25px;
    }
  </style>
</head>
<body>
  <div class="row">
    <?php
    
      // isi nama host, username mysql, dan password mysql anda
      $databasehost = "localhost";
      $databasename = "web_tarian";
      $databaseusername = "root";
      $databasepassword = "";
      
      // Membuat koneksi
      $mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

      $result = mysqli_query($mysqli, "SELECT * FROM tarian") or die (mysqli_error());

      while ($data = mysqli_fetch_array($result)) {
    ?>
      <div class="box">
        <img src="<?php echo $data['foto'] ?>">
        <h3><?php echo $data['nama_tarian']; ?></h3>
        <p><?php echo $data['deskripsi_tarian']; ?></p>
        <div class="button"></div>
        <a href="event.php" class="btn">Dapatkan Tiket</a>
      </div>
    <?php } ?>
  </div>
  <div class="back-button">
    <a href="tugas-sms-1.php" class="btn">Kembali</a>
  </div>
</body>
</html>
