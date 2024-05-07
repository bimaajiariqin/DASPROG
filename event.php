<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIP LAST</title>
    <style>
        /* Style for table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Style for button */
.btn-daftar {
    display: inline-block;
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-daftar:hover {
    background-color: #45a049;
}

/* Style for back button */
.pencet {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.pencet:hover {
    background-color: #d32f2f;
}

/* Body style */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.badan {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

    </style>
</head>
<body >
      <section class="badan" >  <h1>Jadwal Event</h1>
      <body>
    <table border="1" >
        <tr>
            <th >No</th>
            <th>Nama Event</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Info Selengkapnya</th>
        </tr>
    


<?php

$nomor=1;

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

$query_mysql=mysqli_query($mysqli, "SELECT * FROM event ") or die (mysqli_error());

while($data= mysqli_fetch_array($query_mysql)){
?>

<tr>
    <td><?php echo $nomor++;?></td>
    <td><?php echo $data["nama_event"];?></td>
    <td><?php echo $data["hari"];?></td>
    <td><?php echo $data["tanggal"];?></td>
    <td><?php echo $data["lokasi"];?></td>
    <td><a href="pemesanan.php?event_id=<?php echo $data["id_event"]; ?>" class="btn-daftar">Info Selengkapnya</a></td>
    <?php }?>

</tr>
</table>
<div>
<a href="tugas-sms-1.php" class="pencet">Kembali</a>
  </div> 
</section>
 </body>