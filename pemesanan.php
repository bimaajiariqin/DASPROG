<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
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

        input, select {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .error-message {
            color: #d63031;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan Tiket</h1>
        <form action="function_pemesanan.php" method="POST">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="event">Acara:</label>
            <select id="event" name="id_event" required>
                <!-- Pilihan acara akan diisi secara dinamis menggunakan PHP -->
                <?php
                // Koneksi ke database
                $conn = new mysqli('localhost', 'root', '', 'web_tarian');
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $sql = "SELECT id_event, nama_event FROM event";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id_event']}'>{$row['nama_event']}</option>";
                    }
                }

                // Ambil id_tarian dari tabel tarian
                $tarian_sql = "SELECT id_tarian FROM tarian LIMIT 1"; // Asumsi menggunakan id_tarian pertama
                $tarian_result = $conn->query($tarian_sql);
                $id_tarian = '';
                if ($tarian_result->num_rows > 0) {
                    $tarian_row = $tarian_result->fetch_assoc();
                    $id_tarian = $tarian_row['id_tarian'];
                }

                $conn->close();
                ?>
            </select>

            <label for="quantity">Jumlah Pembelian:</label>
            <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" min="1" max="5" required>

            <input type="hidden" name="id_tarian" value="<?php echo $id_tarian; ?>">

            <input type="submit" value="Pesan">
        </form>
    </div>
</body>
</html>
