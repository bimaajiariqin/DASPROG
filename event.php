<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background: url("pexels-capung-purnomo-2609952.jpg");
            background-size: cover;
            background-position: center;
        }

        .badan {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: url("pexels-capung-purnomo-2609952.jpg");
            background-size: cover;
            background-position: center;
        }

        h1 {
            text-align: center;
            color: white;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            width: 80%;
            max-width: 400px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-form input[type="submit"] {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.5s;
        }

        .search-form input[type="submit"]:hover {
            background: #0056b3;
        }

        .event-card {
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            transition: transform 1s;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .event-card h2 {
            margin-top: 0;
            color: #333;
        }

        .event-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .event-details div {
            flex: 1 1 45%;
            margin-bottom: 10px;
        }

        .event-details div strong {
            display: block;
            color: #555;
        }

        .event-details div span {
            color: #777;
        }

        .btn-daftar, .pencet {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            transition: background 1s;
        }

        .btn-daftar:hover, .pencet:hover {
            background: #0056b3;
        }

        .pencet {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="badan">
        <h1>Jadwal Event</h1>
        
        <form class="search-form" method="GET" action="">
            <input type="text" name="search" placeholder="Cari Nama Tarian...">
            <input type="submit" value="Cari">
        </form>

        <?php
        $nomor = 1;
        $mysqli = new mysqli('localhost', 'root', '', 'web_tarian');

        $search_query = "";
        if (isset($_GET['search'])) {
            $search_query = $mysqli->real_escape_string($_GET['search']);
        }

        $query_mysql = mysqli_query($mysqli, "
            SELECT event.*, tarian.nama_tarian 
            FROM event 
            JOIN tarian ON event.id_tarian = tarian.id_tarian
            WHERE tarian.nama_tarian LIKE '%$search_query%'
        ") or die(mysqli_error($mysqli));

        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <div class="event-card">
            <h2><?php echo $data["nama_event"]; ?></h2>
            <div class="event-details">
                <div>
                    <strong>Nama Tarian:</strong>
                    <span><?php echo $data["nama_tarian"]; ?></span>
                </div>
                <div>
                    <strong>Hari:</strong>
                    <span><?php echo $data["hari"]; ?></span>
                </div>
                <div>
                    <strong>Tanggal:</strong>
                    <span><?php echo $data["tanggal"]; ?></span>
                </div>
                <div>
                    <strong>Lokasi:</strong>
                    <span><?php echo $data["lokasi"]; ?></span>
                </div>
                <div>
                    <strong>Harga:</strong>
                    <span><?php echo $data["harga"]; ?></span>
                </div>
                <div>
                    <strong>Stok Tiket:</strong>
                    <span><?php echo $data["stok"]; ?></span>
                </div>
                
            </div>
            <a href="pemesanan.php?event_id=<?php echo $data["id_event"]; ?>&nama_event=<?php echo urlencode($data["nama_event"]); ?>" class="btn-daftar">Info Pemesanan</a>
        </div>
        <?php } ?>
        <a href="tugas-sms-1.php" class="pencet">Kembali</a>
    </section>
</body>
</html>
