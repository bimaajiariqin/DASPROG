<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title>
    <style>
        /* CSS untuk tata letak tabel */
table {
  width: 50%;
  border-collapse: collapse;
  margin-bottom: 20px; /* jarak dari bawah tabel */
}

th, td {
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2; /* warna latar belakang untuk header */
}

tr:nth-child(even) {
  background-color: #f2f2f2; /* warna latar belakang untuk baris genap */
}

/* CSS untuk tautan */
a {
  text-decoration: none; /* menghapus garis bawah standar pada tautan */
  color: #007bff; /* warna tautan */
}

a:hover {
  text-decoration: underline; /* efek garis bawah saat tautan dihover */
}

    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>password</th>
            <th>email</th>
            <th>role</th>
            <th>hapus</th>
            <th>edit</th>
        </tr>
    


<?php

$nomor=1;

$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

$query_mysql=mysqli_query($mysqli, "SELECT * FROM user ") or die (mysqli_error());

while($data= mysqli_fetch_array($query_mysql)){
?>

<tr>
    <td><?php echo $nomor++;?></td>
    <td><?php echo $data["nama"];?></td>
    <td><?php echo $data["password"];?></td>
    <td><?php echo $data["email"];?></td>
    <td><?php echo $data["role"];?></td>
    <td><span><a href='delete.php?id=<?php echo $data["id"];?>'>Hapus</a></span></td>
    <td><span><a href='view edit.php?id=<?php echo $data["id"];?>'>Edit</a></span></td>
    <?php
    }?>

</tr>
</table>
<a href="index.php">Kembali</a>
</body>
</html>