<?php
include 'dbskin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_keranjang = $_POST['id_keranjang'];
    $action = $_POST['action'];

    // Validasi ID
    if (!is_numeric($id_keranjang)) {
        die("Invalid request");
    }

    // Ambil jumlah saat ini dari database
    $query = "SELECT jumlah FROM keranjang WHERE id_keranjang = $id_keranjang";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Item not found");
    }

    $jumlah = $row['jumlah'];

    // Perbarui kuantitas berdasarkan aksi
    if ($action === 'increase') {
        $jumlah++;
    } elseif ($action === 'decrease' && $jumlah > 1) {
        $jumlah--;
    }

    // Simpan pembaruan ke database
    $updateQuery = "UPDATE keranjang SET jumlah = $jumlah WHERE id_keranjang = $id_keranjang";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: keranjang.php"); // Kembali ke halaman keranjang
        exit();
    } else {
        die("Update failed: " . mysqli_error($conn));
    }
}
?>
