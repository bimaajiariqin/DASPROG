<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Ambil nama acara dan ID acara jika tersedia
$event_name = isset($_GET['nama_event']) ? htmlspecialchars($_GET['nama_event']) : '';
$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <style>
        /* CSS untuk halaman pemesanan tiket */

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 350px;
    margin: 50px auto; /* membuat form berada di tengah */
}

h1 {
    margin-bottom: 30px;
    color: #333;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"],
input[type="email"],
input[type="number"] {
    width: calc(100% - 16px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

input[type="submit"] {
    background-color: #0056b3;
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #004080;
}

input:focus {
    outline: none;
    border-color: #4CAF50;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: red;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #b30000;
}

input[type="submit"] {
    width: 100%;
    margin-bottom: 10px; 
}

.btn {
    
    margin-top: 10px; 
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan Tiket</h1>
        <form action="function_pemesanan.php" method="POST">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>

            <label for="event">Acara:</label>
            <input type="text" id="event" name="event_name" value="<?php echo $event_name; ?>" readonly>

            <input type="hidden" name="id_event" value="<?php echo $event_id; ?>">

            <label for="quantity">Jumlah Pembelian:</label>
            <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" min="1" max="10" required>

            <input type="submit" value="Pesan">
        </form>
        <a href="event.php" class="btn">Kembali</a>
    </div>
</body>
</html>
