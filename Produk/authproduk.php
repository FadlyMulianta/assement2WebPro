<?php
session_start();
include '../asset/dbskin.php';

if (isset($_POST['submit-keranjang'])) {
    $id_produk = $_POST['id_produk'];

    
    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['email'])) {
        header('Location: login.php'); // Redirect ke halaman login jika belum login
        exit;
    }

    // Ambil email pengguna dari sesi
    $email = $_SESSION['email'];
    $jumlah = 1; // Default quantity

    // Check if the product is already in the cart
    $checkQuery = "SELECT * FROM keranjang WHERE id_produk = '$id_produk' AND email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If it exists, update the quantity
        $updateQuery = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_produk = '$id_produk' AND email = '$email'";
        mysqli_query($conn, $updateQuery);
    } else {
        // If it doesn't exist, insert it into the cart
        $insertQuery = "INSERT INTO keranjang (id_produk, email, jumlah) VALUES ('$id_produk', '$email', '$jumlah')";
        mysqli_query($conn, $insertQuery);
    }

    // Redirect to the cart page or previous page
    header("Location: produk.php");
    exit();
}

?>