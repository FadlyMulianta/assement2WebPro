<?php
session_start();
include_once '../asset/dbskin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];

    // Proses upload gambar
    if (!empty($_FILES['gambar_user']['name'])) {
        $gambar_user = basename($_FILES['gambar_user']['name']);
        $target_dir = "../profil/gambar/";
        $target_file = $target_dir . $gambar_user;

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($_FILES['gambar_user']['tmp_name'], $target_file)) {
            $query = "UPDATE user SET gambar_user = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $gambar_user, $email);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Gagal mengupload gambar";
            exit;
        }
    }

    // Update data user di database
    $query = "UPDATE user SET namadepan = ?, namabelakang = ?, nohp = ? WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $namadepan, $namabelakang, $nohp, $email);

    if ($stmt->execute()) {
        echo "Profil berhasil diperbarui";
    } else {
        echo "Terjadi kesalahan, coba lagi nanti";
    }

    $stmt->close();
    $conn->close();
    header("Location: setting.php");
} else {
    echo "Metode tidak valid";
}
?>
