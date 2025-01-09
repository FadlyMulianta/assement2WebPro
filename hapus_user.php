<?php
include "./asset/dbskin.php";

$email = $_GET["email"];

$sqlStatement = "SELECT * FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);


$sqlStatement = "DELETE FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {
    unlink("./gambar/" . $row['gambar_user']);
    $succesMsg = "Penghapusan data Produk dengan nama " . $row['namadepan'] . " berhasil";
    header("location:main_admin.php?successMsg=$succesMsg");
}


mysqli_close($conn);
