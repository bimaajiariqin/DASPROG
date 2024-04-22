<?php
$mysqli = new mysqli('localhost', 'root', '', 'web_tarian');
    $id=$_GET["id"];

    $result= mysqli_query($mysqli, "UPDATE FROM user WHERE id='$id'");
    header("location:view.php")

?>