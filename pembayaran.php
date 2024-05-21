<?php
// Get transaction ID
$id_transaksi = $_GET['transaksi_id']; // Ensure this matches your form input name

// Validate and sanitize the input
if (!filter_var($id_transaksi, FILTER_VALIDATE_INT)) {
    die("Invalid transaction ID.");
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'web_tarian');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT t.total, u.username, e.nama_event, tar.nama_tarian
        FROM transaksi t
        JOIN user u ON t.id_user = u.id
        JOIN event e ON t.id_event = e.id_event
        JOIN tarian tar ON t.id_tarian = tar.id_tarian
        WHERE t.id_transaksi = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_transaksi);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $transaksi = $result->fetch_assoc();
} else {
    echo "Transaksi tidak ditemukan.";
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
<style>
    /* style.css */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    max-width: 100%;
}

h1 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

p {
    color: #666;
    font-size: 16px;
    margin: 10px 0;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 14px;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
select {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>
    <div class="container">
        <h1>Pembayaran</h1>
        <p>Username: <?= htmlspecialchars($transaksi['username']) ?></p>
        <p>Event: <?= htmlspecialchars($transaksi['nama_event']) ?></p>
        <p>Tarian: <?= htmlspecialchars($transaksi['nama_tarian']) ?></p>
        <p>Total Harga: Rp<?= number_format($transaksi['total'], 2, ',', '.')  ?></p>
        
        <form action="function_pembayaran.php" method="POST">
            <input type="hidden" name="id_transaksi" value="<?= htmlspecialchars($id_transaksi) ?>">
            <label for="payment_method">Metode Pembayaran:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
            </select>

            <label for="payment_details">Detail Pembayaran:</label>
            <input type="text" id="payment_details" name="payment_details" placeholder="Nomor Kartu / Rekening" required>

            <button type="submit">Bayar</button>
        </form>
    </div>
</body>
</html>
