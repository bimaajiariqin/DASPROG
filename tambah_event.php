<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>
    <style>
        /* CSS untuk tata letak form */
        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Tambah Event Baru</h2>

<form action="tambah_event.php" method="post">
    <label for="nama_event">Nama Event:</label>
    <input type="text" id="nama_event" name="nama_event" required>

    <label for="hari">Hari:</label>
    <input type="text" id="hari" name="hari" required>

    <label for="tanggal">Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" required>

    <label for="lokasi">Lokasi:</label>
    <input type="text" id="lokasi" name="lokasi" required>

    <label for="harga">Harga:</label>
    <input type="number" id="harga" name="harga" required>

    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" required>

    <label for="id_tarian">Tarian:</label>
    <select id="id_tarian" name="id_tarian" required>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
        if ($mysqli->connect_error) {
            die("Koneksi gagal: " . $mysqli->connect_error);
        }
        $result = $mysqli->query("SELECT id_tarian, nama_tarian FROM tarian");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_tarian'] . "'>" . $row['nama_tarian'] . "</option>";
        }
        $mysqli->close();
        ?>
    </select>

    <input type="submit" value="Tambah Event">
</form>

<a href="lpadmin.php">Kembali</a>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    $nama_event = $mysqli->real_escape_string($_POST["nama_event"]);
    $hari = $mysqli->real_escape_string($_POST["hari"]);
    $tanggal = $mysqli->real_escape_string($_POST["tanggal"]);
    $lokasi = $mysqli->real_escape_string($_POST["lokasi"]);
    $harga = $mysqli->real_escape_string($_POST["harga"]);
    $stok = $mysqli->real_escape_string($_POST["stok"]);
    $id_tarian = $mysqli->real_escape_string($_POST["id_tarian"]);

    $sql = "INSERT INTO event (nama_event, hari, tanggal, lokasi, harga, stok, id_tarian) VALUES ('$nama_event', '$hari', '$tanggal', '$lokasi', '$harga', '$stok', '$id_tarian')";

    if ($mysqli->query($sql) === TRUE) {
        header("location: view_event.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
