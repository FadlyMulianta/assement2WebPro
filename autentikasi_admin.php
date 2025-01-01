<?php
include "./asset/dbskin.php";

$emailadmin = $_POST['email'];
$kodeadmin = $_POST['kodeadmin'];
$katasandi = $_POST['katasandi'];

$sqlStatement = "SELECT * FROM admin WHERE emailadmin='$emailadmin'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);
// print_r($row);

if ($row == "") { //username tidak ditemukan
    $errMsg = "Akun tidak terdaftar, Silahkan daftarkan akun anda!";
    header("location:admin_login.php?errorMsg=$errMsg");
} else { //username ditemukan
    if (md5($katasandi) == $row['katasandi'] && $row['kodeadmin'] == $kodeadmin) { //username dan password match
        session_start();
        $_SESSION['emailadmin'] = $row['emailadmin'];
        header("location:main_admin.php");
    } else {
        $errMsg = "Password/Kode Admin Salah!";
        header("location:admin_login.php?errorMsg=$errMsg");
    }
}
