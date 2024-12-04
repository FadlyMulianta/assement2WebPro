<?php
include "dbskin.php";

$id_produk = $_GET["id_produk"];

$sqlStatement = "SELECT * FROM produk WHERE id_produk='$id_produk'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

$sqlStatement = "DELETE FROM produk WHERE id_produk='$id_produk'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {
    unlink("./gambar/" . $row['gambar_produk']);
    $succesMsg = "Penghapusan data Produk dengan nama " . $row['nama_produk'] . " berhasil";
    header("location:main_admin.php?successMsg=$succesMsg");
}


mysqli_close($conn);
