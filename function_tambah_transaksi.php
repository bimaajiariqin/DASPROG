<?php
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

$mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id_event = $_POST['id_event'];
    $id_tarian = $_POST['id_tarian'];
    $jumlah_pembelian = $_POST['jumlah_pembelian'];
    $total = $_POST['total'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    // Check if the user with the given username and email exists
    $query_user = "SELECT id FROM user WHERE username = '$username' AND email = '$email'";
    $result_user = mysqli_query($mysqli, $query_user);
    
    if (mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_array($result_user);
        $id_user = $user['id'];
    } else {
        // Display an error message if the username and email combination does not exist
        die("Error: Username and email combination not found. <a href='tambah_transaksi.php'>Go back</a>");
    }

    $query = "INSERT INTO transaksi (id_user, id_event, id_tarian, jumlah_pembelian, total, tanggal_pembayaran) VALUES ('$id_user', '$id_event', '$id_tarian', '$jumlah_pembelian', '$total', '$tanggal_pembayaran')";

    if (mysqli_query($mysqli, $query)) {
        header("Location: view_transaksi.php");
    exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}