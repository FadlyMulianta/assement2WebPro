<?php
session_start();
include_once '../asset/dbskin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];

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
