<?php
include "dbskin.php";

$email = $_POST['email'];
$katasandi = $_POST['katasandi'];

$sqlStatement = "SELECT * FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);
// print_r($row);

if ($row == "") { //username tidak ditemukan
    $errMsg = "Akun tidak terdaftar, Silahkan daftarkan akun anda!";
    header("location:login.php?errorMsg=$errMsg");
} else { //username ditemukan
    if (md5($katasandi) == $row['katasandi']) { //username dan password match
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $row['email'];
        header("location:beranda.php");
        exit(); 
    } else {
        $errMsg = "Password salah!";
        header("location:login.php?errorMsg=$errMsg");
    }
}
