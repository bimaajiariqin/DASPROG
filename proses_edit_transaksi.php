<?php
$databasehost = "localhost";
$databasename = "web_tarian";
$databaseusername = "root";
$databasepassword = "";

$mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $username = $_POST['username'];
    $id_event = $_POST['id_event'];
    $id_tarian = $_POST['id_tarian'];
    $jumlah_pembelian = $_POST['jumlah_pembelian'];
    $total = $_POST['total'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    // Get user ID based on username
    $query_user = "SELECT id FROM user WHERE username = '$username'";
    $result_user = mysqli_query($mysqli, $query_user);
    
    if (mysqli_num_rows($result_user) > 0) {
        $user = mysqli_fetch_array($result_user);
        $id_user = $user['id'];
    } else {
        // If the username doesn't exist, create a new user record (optional)
        $query_insert_user = "INSERT INTO user (username, email) VALUES ('$username', '')";
        if (mysqli_query($mysqli, $query_insert_user)) {
            $id_user = mysqli_insert_id($mysqli);
        } else {
            die("Error: " . mysqli_error($mysqli));
        }
    }

    $query = "UPDATE transaksi 
              SET id_user = '$id_user', id_event = '$id_event', id_tarian = '$id_tarian', jumlah_pembelian = '$jumlah_pembelian', total = '$total', tanggal_pembayaran = '$tanggal_pembayaran' 
              WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($mysqli, $query)) {
        header("Location: view_transaksi.php");
    exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>
