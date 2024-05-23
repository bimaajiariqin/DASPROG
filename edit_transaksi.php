<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <style>
        /* CSS for form layout */
        form {
            width: 50%;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

$mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $query = "SELECT transaksi.*, user.username, user.email, event.nama_event, tarian.nama_tarian 
              FROM transaksi 
              INNER JOIN user ON transaksi.id_user = user.id 
              INNER JOIN event ON transaksi.id_event = event.id_event
              INNER JOIN tarian ON transaksi.id_tarian = tarian.id_tarian 
              WHERE id_transaksi = $id_transaksi";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($result);

    $query_event = "SELECT * FROM event";
    $result_event = mysqli_query($mysqli, $query_event);

    $query_tarian = "SELECT * FROM tarian";
    $result_tarian = mysqli_query($mysqli, $query_tarian);
}
?>

<h2>Edit Transaksi</h2>

<form action="proses_edit_transaksi.php" method="post">
    <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" required>

    <label for="id_event">Nama Event:</label>
    <select name="id_event" id="id_event">
        <?php while ($event = mysqli_fetch_array($result_event)) { ?>
            <option value="<?php echo $event['id_event']; ?>" <?php if ($event['id_event'] == $data['id_event']) echo 'selected'; ?>><?php echo $event['nama_event']; ?></option>
        <?php } ?>
    </select>

    <label for="id_tarian">Nama Tarian:</label>
    <select name="id_tarian" id="id_tarian">
        <?php while ($tarian = mysqli_fetch_array($result_tarian)) { ?>
            <option value="<?php echo $tarian['id_tarian']; ?>" <?php if ($tarian['id_tarian'] == $data['id_tarian']) echo 'selected'; ?>><?php echo $tarian['nama_tarian']; ?></option>
        <?php } ?>
    </select>

    <label for="jumlah_pembelian">Jumlah Pembelian:</label>
    <input type="number" name="jumlah_pembelian" id="jumlah_pembelian" value="<?php echo $data['jumlah_pembelian']; ?>" required>

    <label for="total">Total:</label>
    <input type="number" name="total" id="total" value="<?php echo $data['total']; ?>" required>

    <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
    <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" value="<?php echo $data['tanggal_pembayaran']; ?>" required>

    <input type="submit" value="Update Transaksi">
</form>

<br>
<a href="view_transaksi.php">Kembali</a>

</body>
</html>
