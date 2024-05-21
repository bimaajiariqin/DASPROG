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
        <th>ID Transaksi</th>
        <th>Username</th> 
        <th>Email</th>
        <th>Nama Event</th>
        <th>Nama Tarian</th>
        <th>Jumlah Pembelian</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Tanggal Pembayaran</th>
        <th>Hapus</th>
        <th>Edit</th>
    </tr>

<?php
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

$mysqli = mysqli_connect($databasehost,$databaseusername , $databasepassword, $databasename);

$query = "SELECT transaksi.id_transaksi, user.username, user.email,event.nama_event, tarian.nama_tarian, transaksi.jumlah_pembelian, event.harga, transaksi.total, transaksi.tanggal_pembayaran 
FROM transaksi 
INNER JOIN user ON transaksi.id_user = user.id 
INNER JOIN event ON transaksi.id_event = event.id_event
INNER JOIN tarian ON transaksi.id_tarian = tarian.id_tarian ";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$nomor = 1; // Inisialisasi variabel nomor
while ($data = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $data["id_transaksi"]; ?></td>
        <td><?php echo $data["username"]; ?></td>
        <td><?php echo $data["email"]; ?></td>
        <td><?php echo $data["nama_event"]; ?></td>
        <td><?php echo $data["nama_tarian"]; ?></td>
        <td><?php echo $data["jumlah_pembelian"]; ?></td>
        <td><?php echo $data["harga"]; ?></td>
        <td><?php echo $data["total"]; ?></td>
        <td><?php echo $data["tanggal_pembayaran"]; ?></td>
        <td><span><a href='delete_transaksi.php?id=<?php echo $data["id_transaksi"]; ?>'>Hapus</a></span></td>
        <td><span><a href='edit_transaksi.php?id=<?php echo $data["id_transaksi"]; ?>'>Edit</a></span></td>
    </tr>
    <?php
}
?>

</table>

<a href="tambah_transaksi.php">Tambah Transaksi</a>
<br>
<a href="lpadmin.php">Kembali</a>

</body>
</html>
