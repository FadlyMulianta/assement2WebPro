<?php
include 'dbskin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_keranjang = $_POST['id_keranjang'];
    $action = $_POST['action'];

    // Validasi ID
    if (!is_numeric($id_keranjang)) {
        die("Invalid request");
    }

    



    

$query = "
        SELECT k.jumlah, p.stok, k.id_produk 
        FROM keranjang k 
        JOIN produk p ON k.id_produk = p.id_produk 
        WHERE k.id_keranjang = $id_keranjang
    ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("Data keranjang tidak ditemukan.");
    }

    $jumlah = $row['jumlah'];
    $stok = $row['stok'];
    $id_produk = $row['id_produk'];

    if ($action === 'increase' && $stok > 0) {
        // Tambah jumlah produk di keranjang
        $new_jumlah = $jumlah + 1;
        $new_stok = $stok - 1;

        // Update keranjang dan stok produk
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

        if (mysqli_query($conn, $update_keranjang) && mysqli_query($conn, $update_stok)) {
            header('Location: keranjang.php');
            exit;
        } else {
            die("Gagal memperbarui keranjang: " . mysqli_error($conn));
        }
    } elseif ($action === 'decrease' && $jumlah > 1) {
        // Kurangi jumlah produk di keranjang
        $new_jumlah = $jumlah - 1;
        $new_stok = $stok + 1;

        // Update keranjang dan stok produk
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

        if (mysqli_query($conn, $update_keranjang) && mysqli_query($conn, $update_stok)) {
            header('Location: keranjang.php');
            exit;
        } else {
            die("Gagal memperbarui keranjang: " . mysqli_error($conn));
        }
    } else {
        die("Aksi tidak valid atau stok habis.");
    }
}
?>







?>
