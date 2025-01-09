<?php

$auth = $conn;

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Hanya panggil session_start jika sesi belum dimulai
}

function checkLogin() {
    if (!isset($_SESSION['email'])) {
        header('Location: ../regis-login/login.php'); // Redirect ke halaman login jika belum login
        exit;
    }
}

function getUserImage($auth) {
    $email = $_SESSION['email'];

    $query = "SELECT gambar_user FROM user WHERE email = '$email'";

    $hasil = mysqli_query($auth, $query);

    if (!$hasil) {
        die("Query failed: " . mysqli_error($auth));
    }

    $data = mysqli_fetch_assoc($hasil);

    return $data['gambar_user'] ?? null;
}
?>
