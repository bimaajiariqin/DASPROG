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
            transition: border-color 1s ease;
        }

        input[type="submit"] {
            background-color: #0056b3;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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

        a.btn {
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

        a.btn:hover {
            background-color: #0056b3;
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
            <input type="text" id="event" name="event_name" value="<?php echo isset($_GET['nama_event']) ? htmlspecialchars($_GET['nama_event']) : ''; ?>" readonly>

            <input type="hidden" name="id_event" value="<?php echo isset($_GET['event_id']) ? intval($_GET['event_id']) : ''; ?>">

            <label for="quantity">Jumlah Pembelian:</label>
            <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" min="1" max="10" required>

            <input type="submit" value="Pesan">
        </form>
        <a href="event.php" class="btn">Kembali</a>
    </div>
</body>
</html>
