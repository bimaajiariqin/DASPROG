<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
    $id_transaksi=$_GET["id"];

    $result= mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi=$id_transaksi");
    header("location:view_transaksi.php")

?>