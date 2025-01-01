<?php
session_start();
include_once '../asset/dbskin.php';

// Pastikan email ada dalam sesi
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Email tidak ditemukan dalam sesi. Silakan login kembali.');</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email']; // Gunakan email dari sesi
    $katasandi_lama = $_POST['katasandi_lama'];
    $katasandi_baru = $_POST['katasandi_baru'];
    $konfirmasi_katasandi = $_POST['konfirmasi_katasandi'];

    // Periksa apakah kata sandi baru dan konfirmasi cocok
    if ($katasandi_baru !== $konfirmasi_katasandi) {
        echo "<script>alert('Konfirmasi kata sandi baru tidak cocok.'); window.history.back();</script>";
        exit;
    }

    // Periksa kata sandi lama
    $query = "SELECT katasandi FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!$hashed_password) {
        echo "<script>alert('Email tidak ditemukan.'); window.history.back();</script>";
        exit;
    }

    // Hash kata sandi lama yang dimasukkan oleh pengguna menggunakan MD5
    $hashed_input_password = md5($katasandi_lama);

    if ($hashed_input_password !== $hashed_password) {
        echo "<script>alert('Kata sandi lama salah.'); window.history.back();</script>";
        exit;
    }

    // Hash kata sandi baru sebelum disimpan menggunakan MD5
    $new_hashed_password = md5($katasandi_baru);
    $query = "UPDATE user SET katasandi = ? WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $new_hashed_password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Kata sandi berhasil diperbarui.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi nanti.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Metode tidak valid.'); window.history.back();</script>";
}
?>
