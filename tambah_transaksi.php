<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
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

$query_event = "SELECT * FROM event";
$result_event = mysqli_query($mysqli, $query_event);

$query_tarian = "SELECT * FROM tarian";
$result_tarian = mysqli_query($mysqli, $query_tarian);
?>

<h2>Tambah Transaksi</h2>

<form action="function_tambah_transaksi.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" required>

    <label for="id_event">Nama Event:</label>
    <select name="id_event" id="id_event">
        <?php while ($event = mysqli_fetch_array($result_event)) { ?>
            <option value="<?php echo $event['id_event']; ?>"><?php echo $event['nama_event']; ?></option>
        <?php } ?>
    </select>

    <label for="id_tarian">Nama Tarian:</label>
    <select name="id_tarian" id="id_tarian">
        <?php while ($tarian = mysqli_fetch_array($result_tarian)) { ?>
            <option value="<?php echo $tarian['id_tarian']; ?>"><?php echo $tarian['nama_tarian']; ?></option>
        <?php } ?>
    </select>

    <label for="jumlah_pembelian">Jumlah Pembelian:</label>
    <input type="number" name="jumlah_pembelian" id="jumlah_pembelian" required>

    <label for="total">Total:</label>
    <input type="number" name="total" id="total" required>

    <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
    <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" required>

    <input type="submit" value="Tambah Transaksi">
</form>

<br>
<a href="view_transaksi.php">Kembali</a>

</body>
</html>
