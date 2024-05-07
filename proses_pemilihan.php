<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }

        .info {
            font-size: 16px;
            margin-top: 20px;
        }

        .payment-info {
            margin-top: 30px;
        }

        .payment-info h2 {
            margin-bottom: 10px;
            color: #4CAF50;
        }
        /* Style for back button */
.pencet {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.pencet:hover {
    background-color: #d32f2f;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Proses Pemesanan</h1>
        <p>Terima kasih telah memesan!</p>
        <div class="info">
            <p>Berikut adalah detail pemesanan Anda:</p>
            <ul>
                <li><strong>Nama:</strong> <?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?></li>
                <li><strong>Email:</strong> <?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?></li>
                <li><strong>Kursi yang dipilih:</strong>
                    <ul>
                        <?php
                        if(isset($_POST['selected_seats']) && !empty($_POST['selected_seats'])) {
                            foreach($_POST['selected_seats'] as $seat) {
                                echo '<li>Kursi '.$seat.'</li>';
                            }
                        } else {
                            echo '<li>Tidak ada kursi yang dipilih</li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        
        <!-- Informasi Pembayaran -->
        <div class="payment-info">
            <h2>Informasi Pembayaran</h2>
            <p>Total Harga: Rp <?php echo count($_POST['selected_seats']) * 100000; ?></p>
            <p>Silakan melakukan pembayaran melalui transfer ke rekening berikut:</p>
            <p><strong>Bank ABC</strong></p>
            <p>No Rekening: 123456789</p>
            <p>Atas Nama: Ndak Tau</p>
            <p>Jumlah yang harus dibayarkan: <strong>Rp <?php echo count($_POST['selected_seats']) * 100000; ?></strong></p>
            <p>Setelah melakukan pembayaran, mohon konfirmasi ke nomor WhatsApp 08123456789 dengan format: [Nama Anda]_[Jumlah yang dibayarkan].</p>
        </div>
        <div>
<a href="pendaftaran.php" class="pencet">Kembali</a>
  </div> 
    </div>
</body>
</html>
