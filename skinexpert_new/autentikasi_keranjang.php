<?php
session_start();
include 'dbskin.php';

if (isset($_POST['submit-keranjang'])) {
    $id_produk = $_POST['id_produk'];
    $email = 'imam@test.com'; // Ensure user is logged in
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
    header("Location: beranda.php");
    exit();
}

?>