<?php
include 'dbskin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_keranjang = $_POST['id_keranjang'];
    $action = $_POST['action'];

    // Validasi ID
    if (!is_numeric($id_keranjang)) {
        die("Invalid request: ID keranjang harus berupa angka.");
    }

    // Ambil data jumlah, stok, dan id_produk dari database
    $query = "
        SELECT k.jumlah, p.stok, k.id_produk 
        FROM keranjang k 
        JOIN produk p ON k.id_produk = p.id_produk 
        WHERE k.id_keranjang = $id_keranjang
    ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("Data keranjang tidak ditemukan.");
    }

    $jumlah = $row['jumlah'];
    $stok = $row['stok'];
    $id_produk = $row['id_produk'];

    // Logika untuk menambah atau mengurangi jumlah item
    if ($action === 'increase') {
        if ($stok > 0) {
            $new_jumlah = $jumlah + 1;
            $new_stok = $stok - 1;
        } else {
            // die("Stok produk tidak mencukupi.");
            $new_jumlah = $jumlah;
            $new_stok = $stok ;
            
        }
    } elseif ($action === 'decrease') {
        if ($jumlah > 1) {
            $new_jumlah = $jumlah - 1;
            $new_stok = $stok + 1;
        } else {
            // Jika jumlah sudah 1, jangan ubah jumlahnya, tetap 1
            $new_jumlah = 1;
            $new_stok = $stok + 0;
        }
    } else {
        die("Aksi tidak valid.");
    }

    // Update jumlah di keranjang dan stok produk
    $update_keranjang = "
        UPDATE keranjang 
        SET jumlah = $new_jumlah 
        WHERE id_keranjang = $id_keranjang
    ";
    $update_stok = "
        UPDATE produk 
        SET stok = $new_stok 
        WHERE id_produk = $id_produk
    ";

    // Eksekusi query dan validasi keberhasilan
    $keranjang_updated = mysqli_query($conn, $update_keranjang);
    $stok_updated = mysqli_query($conn, $update_stok);

    if ($keranjang_updated && $stok_updated) {
        header('Location: keranjang.php');
        exit;
    } else {
        die("Gagal memperbarui data: " . mysqli_error($conn));
    }
}
?>
