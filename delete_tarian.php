<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
    $id_tarian=$_GET["id"];

    $result= mysqli_query($mysqli, "DELETE FROM tarian WHERE id_tarian=$id_tarian");
    header("location:view_tarian.php")

?>