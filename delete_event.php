<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
    $id_event=$_GET["id"];

    $result= mysqli_query($mysqli, "DELETE FROM event WHERE id_event=$id_event");
    header("location:view_event.php")

?>