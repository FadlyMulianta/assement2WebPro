<?php
include 'dbskin.php'; // Koneksi database

// Proses hapus produk individual
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_keranjang'])) {
    // Ambil ID keranjang dari POST
    $id_keranjang = $_POST['id_keranjang'];

    // Query hapus produk dari keranjang
    $deleteQuery = "DELETE FROM keranjang WHERE id_keranjang = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, 'i', $id_keranjang);

    if (mysqli_stmt_execute($stmt)) {
        // Berhasil dihapus, redirect kembali ke halaman keranjang
        header('Location: keranjang.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Proses hapus semua produk
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_all'])) {
    // Ambil email pengguna dari session atau variabel yang sesuai
    $email = 'imam@test.com'; // Gantilah dengan email dari session, misalnya: $_SESSION['email']

    // Query untuk menghapus semua produk dalam keranjang berdasarkan email
    $deleteAllQuery = "DELETE FROM keranjang WHERE email = ?";
    $stmt = mysqli_prepare($conn, $deleteAllQuery);
    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect ke halaman keranjang setelah menghapus semua produk
        header('Location: keranjang.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
