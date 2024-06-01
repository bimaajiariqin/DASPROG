<?php
session_start();
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

// Membuat koneksi
$conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan pengguna sudah login
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $payment_method = $_POST['payment_method'];
    $payment_details = $_POST['payment_details'];

    // Tentukan status berdasarkan rincian pembayaran
    $status = ($payment_method && $payment_details) ? "paid" : "pending";

    // Perbarui status transaksi dan rincian pembayaran
    $sql = "UPDATE transaksi SET status = ?, payment_method = ?, payment_details = ? WHERE id_transaksi = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error dalam menyiapkan pernyataan: " . $conn->error);
    }
    $stmt->bind_param("sssi", $status, $payment_method, $payment_details, $id_transaksi);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    header("Location: pro.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
