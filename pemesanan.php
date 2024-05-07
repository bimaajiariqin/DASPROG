

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Tiket</title>
    <style>
        /* style.css */

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

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.seat-selection {
    display: grid;
    grid-template-columns: repeat(12, 40px); /* 5 kolom */
    grid-gap: 10px;
}

input[type="checkbox"] {
    display: none;
}

label {
    display: block;
    width: 40px;
    height: 40px;
    background-color: #ddd;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
}

input[type="checkbox"]:checked + label {
    background-color: #4CAF50;
    color: white;
}

button[type="submit"] {
  background-color: #4CAF50; /* Warna latar hijau */
  color: white; /* Warna teks putih */
  padding: 10px 20px; /* Ukuran padding */
  font-size: 16px; /* Ukuran teks */
  border: none; /* Tanpa border */
  cursor: pointer; /* Mengubah kursor saat hover */
  border-radius: 5px; /* Membuat sudut melengkung */
}

button[type="submit"]:hover {
  background-color: #45a049; /* Warna latar saat hover */
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

button {
        float: right; /* float kanan */
    }

.pencet:hover {
    background-color: #d32f2f;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan</h1>
        <form action="proses_pemilihan.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Pilih:</label>
                <div class="seat-selection">
                    <?php
                    // Generate seat options dynamically
                    $total_seats = 60; // Jumlah total kursi
                    for ($i = 1; $i <= $total_seats; $i++) {
                        echo '<input type="checkbox" id="seat'.$i.'" name="selected_seats[]" value="'.$i.'">';
                        echo '<label for="seat'.$i.'">'.$i.'</label>';
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="event_id" value="<?php echo $_GET['event_id']; ?>">
            <button type="submit">Pesan</button>
        </form>
        <div>
<a href="event.php" class="pencet">Kembali</a>
  </div> 
    </div>

</body>
</html>
