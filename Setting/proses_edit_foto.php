<?php
session_start();
include_once '../asset/dbskin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Proses upload gambar
    if (!empty($_FILES['gambar_user']['name'])) {
        $gambar_user = basename($_FILES['gambar_user']['name']);
        $target_dir = "../gambar/";
        $target_file = $target_dir . $gambar_user;

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($_FILES['gambar_user']['tmp_name'], $target_file)) {
            $query = "UPDATE user SET gambar_user = ? WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $gambar_user, $email);
            $stmt->execute();
            $stmt->close();
            echo "Foto profil berhasil diperbarui";
        } else {
            echo "Gagal mengupload gambar";
            exit;
        }
    }

    $conn->close();
    header("Location: setting.php");
} else {
    echo "Metode tidak valid";
}
?>
