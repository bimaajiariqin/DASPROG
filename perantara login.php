<?php

session_start();
include 'koneksi.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$login = mysqli_query($mysqli, "select * from user where username='$username' and password='$password");
$cek = mysqli_num_rows($login);

if($cek>0){

    $data = "mysqli_fetch_assoch"($login);
    //cek jika user login sebagai admin
    if($data['role']=="admin"){


        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        //alihkan ke halaman dashboard admin
        header("location:user/tugas-sms-1.php");

    //cek jika user login sebagai user        
    }else if($data['role']=="user"){
        //buat session login dan username   
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        //alihkan ke halaman dashboard user
        header("location:user/tugas-sms-1.php");

    }else{

        //alihkan ke halaman user kembali
        header("location:tugas-sms-1.php");
    }
}else{
    header("location:tugas-sms-1.php?pesan=gagal");
}
?>