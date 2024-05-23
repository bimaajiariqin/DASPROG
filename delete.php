<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$id = $mysqli->real_escape_string($_GET["id"]);

$delete_event = "DELETE FROM event WHERE id_event='$id'";
if ($mysqli->query($delete_event) === TRUE) {
    header("Location: view_event.php");
    exit();
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
