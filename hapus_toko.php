<?php
include "./asset/dbskin.php";

$id_toko = $_GET["id_toko"];

$sqlStatement = "SELECT * FROM toko WHERE id_toko='$id_toko'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);



$sqlStatement = "DELETE FROM toko WHERE id_toko='$id_toko'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {

    $succesMsg = "Penghapusan data Produk dengan nama " . $row['nama_toko'] . " berhasil";
    header("location:main_admin.php?successMsg=$succesMsg");
}


mysqli_close($conn);
