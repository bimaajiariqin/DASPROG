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
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id_transaksi'])) {
    die("No transaction ID provided.");
}

$id_transaksi = $_GET['id_transaksi'];

// Fetch transaction details
$sql = "SELECT id_transaksi, status FROM transaksi WHERE id_transaksi = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("i", $id_transaksi);
$stmt->execute();
$result = $stmt->get_result();

$transaction = $result->fetch_assoc();
if (!$transaction) {
    die("Transaction not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaction Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #343a40;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5 px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Transaction Status</h1>
        <form action="update_status.php" method="POST">
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="paid" <?php echo ($transaction['status'] == 'paid') ? 'selected' : ''; ?>>Paid</option>
                </select>
            </div>
            <div class="form-group">
                     <label for="payment_method">Payment Method:</label>
                     <select name="payment_method" id="payment_method">
                     <option value="credit_card">Credit Card</option>
                     <option value="ewallet">E-Wallet</option>
                     <option value="transfer_bank">Transfer Bank</option>
                </select>
            </div>

            <div class="form-group">
                     <label for="payment_details">Payment Details:</label>
                     <input type="text" name="payment_details" id="payment_details">
            </div>

            <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
            <button type="submit" class="btn">Update</button>
        </form>
        <a href="pro.php">Kembali</a>
    </div>
</body>
</html>

