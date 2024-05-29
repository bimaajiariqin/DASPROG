<?php
// Koneksi ke database
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Mendapatkan data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$id_event = $_POST['id_event'];
$jumlah_pembelian = $_POST['jumlah_pembelian'];

// Validasi data form
if (empty($username) || empty($email) || empty($id_event) || empty($jumlah_pembelian) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Input tidak valid.";
    $mysqli->close();
    exit();
}

// Memeriksa apakah pengguna sudah ada apa belum
$sql = $mysqli->prepare("SELECT id, username FROM user WHERE email = ?");
$sql->bind_param("s", $email);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $id_user = $user['id'];
    // Menggunakan username dari database
    $username = $user['username'];
} else {
    $sql->close();
    $mysqli->close();
    // Alihkan ke halaman login jika pengguna tidak ditemukan
    header("Location: index.php");
    exit();
}
$sql->close();

// Mendapatkan detail acara dan id_tarian
$sql = $mysqli->prepare("SELECT harga, stok, id_tarian FROM event WHERE id_event = ?");
$sql->bind_param("i", $id_event);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows === 0) {
    echo "Acara tidak ditemukan.";
    $sql->close();
    $mysqli->close();
    exit();
}

$event = $result->fetch_assoc();
$harga = $event['harga'];
$stok = $event['stok'];
$id_tarian = $event['id_tarian'];

if ($stok < $jumlah_pembelian) {
    echo "Stok tiket tidak mencukupi.";
    $sql->close();
    $mysqli->close();
    exit();
}

$total = $harga * $jumlah_pembelian;
$sql->close();

// Mengurangi stok tiket
$sql = $mysqli->prepare("UPDATE event SET stok = stok - ? WHERE id_event = ?");
$sql->bind_param("ii", $jumlah_pembelian, $id_event);
if (!$sql->execute()) {
    echo "Kesalahan: " . $sql->error;
    $sql->close();
    $mysqli->close();
    exit();
}
$sql->close();

// Menyisipkan transaksi menggunakan prepared statements
$sql = $mysqli->prepare("INSERT INTO transaksi (id_user, id_event, id_tarian, jumlah_pembelian, total) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("iiiii", $id_user, $id_event, $id_tarian, $jumlah_pembelian, $total);
if ($sql->execute()) {
    // Alihkan ke halaman pembayaran
    header("Location: pembayaran.php?transaksi_id=" . $mysqli->insert_id);
    $sql->close();
    $mysqli->close();
    exit();
} else {
    echo "Kesalahan: " . $sql->error;
}

$sql->close();
$mysqli->close();
?>
