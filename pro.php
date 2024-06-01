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

$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Query to fetch user ID based on session email
$user_id_query = "SELECT id FROM user WHERE email = ?";
$stmt = $conn->prepare($user_id_query);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$id_user = $user['id'];
$stmt->close();

// Query to fetch transaction and product data
$sql = "SELECT transaksi.id_transaksi, event.nama_event, tarian.nama_tarian, event.harga, transaksi.jumlah_pembelian, transaksi.total, transaksi.tanggal_pembayaran, transaksi.status 
FROM transaksi 
JOIN event ON transaksi.id_event = event.id_event 
JOIN tarian ON transaksi.id_tarian = tarian.id_tarian
WHERE transaksi.id_user = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("i", $id_user); // Bind parameter id_user
$stmt->execute();
$result = $stmt->get_result();

$transactions = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
} else {
    $transactions = null; // If there's an error in fetching results, set it to null
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna dan Riwayat Pemesanan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #343a40;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #343a40;
            font-size: 32px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-info, .order-history {
            margin-bottom: 40px;
        }

        .profile-info label, .order-history label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #495057;
        }

        .profile-info p, .order-history p {
            margin-top: 0;
            padding: 12px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            color: #495057;
            font-size: 16px;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 350px;
            color: #343a40;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-top: 0;
            color: #007bff;
            font-size: 22px;
        }

        .card p {
            margin: 10px 0;
            color: #495057;
            font-size: 16px;
        }

        .btn-update {
            background-color: #28a745;
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-update:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .no-transactions {
            text-align: center;
            font-size: 18px;
            color: #343a40;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 10px;
            margin-top: 20px;
        }

        .header {
            width: 100%;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px 15px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            color: #343a40;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .footer {
            width: 100%;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0 0 15px 15px;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
            color: #343a40;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .card {
                max-width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            .header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Profil Pengguna dan Riwayat Pemesanan</h1>
    </div>
    <div class="container">
        <div class="profile-info">
            <label for="username">Username:</label>
            <p><?php echo htmlspecialchars($username); ?></p>
        </div>
        <div class="profile-info">
            <label for="email">Email:</label>
            <p><?php echo htmlspecialchars($email); ?></p>
        </div>
        <div class="btn-container">
            <a href="tugas-sms-1.php" class="btn">Kembali ke Halaman Utama</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
        
        <div class="card-container">
            <?php if (isset($transactions) && count($transactions) > 0): ?>
                <?php foreach ($transactions as $transaction): ?>
                    <div class="card">
                        <h3><?php echo htmlspecialchars($transaction['nama_event']); ?></h3>
                        <p><strong>Nama Tarian:</strong> <?php echo htmlspecialchars($transaction['nama_tarian']); ?></p>
                        <p><strong>Harga:</strong> <?php echo htmlspecialchars($transaction['harga']); ?></p>
                        <p><strong>Jumlah Pembelian:</strong> <?php echo htmlspecialchars($transaction['jumlah_pembelian']); ?></p>
                        <p><strong>Total:</strong> <?php echo 'Rp ' . number_format($transaction['total'], 2, ',', '.'); ?></p>
                        <p><strong>Tanggal Pembayaran:</strong> <?php echo htmlspecialchars($transaction['tanggal_pembayaran']); ?></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($transaction['status']); ?></p>
                        <?php if ($transaction['status'] == 'pending'): ?>
                            <a href="update_status_form.php?id_transaksi=<?php echo htmlspecialchars($transaction['id_transaksi']); ?>" class="btn-update">Update to Paid</a>
                        <?php else: ?>
                            <p>Status sudah bayar</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-transactions">
                    Tidak ada transaksi yang ditemukan.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 - Web Tarian</p>
    </div>
</body>
</html>
