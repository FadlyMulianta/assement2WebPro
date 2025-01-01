<?php
session_start();
include '../asset/dbskin.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: ../regis-login/login.php'); // Redirect ke halaman login jika belum login
    exit;
}

// Ambil email pengguna dari sesi
$email = $_SESSION['email'];

// Query untuk mengambil data pengguna berdasarkan email
$query = "
    SELECT namadepan, namabelakang, email, nohp, gambar_user
    FROM user
    WHERE email = '$email'
";

$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Ambil data pengguna
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    <title>Profilku</title>
    <style>
         body {
            font-family: "Poppins", serif;
            margin: 0;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 120px); /* Mengurangi tinggi header */
            width: 100%;
        }
        .container {
            text-align: center;
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .close-icon {
            position: absolute;
            top: 20px;
            left: 40px;
            width: 52px;
            cursor: pointer;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info div {
            margin: 10px 0;
            font-size: 18px;
        }
        .profile-info div:not(:last-child) {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1a3b5d;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: #0f2c4a;
        }
    </style>
</head>
<body>
    <?php include '../header.php'; ?>
    <main>
        <div class="container">
            <h2 style="color: #1a3b5d;">Profilku</h2>

            <!-- Tampilkan gambar profil pengguna -->
            <img 
                alt="Foto profil" 
                class="profile-pic" 
                src="gambar/<?php echo htmlspecialchars($user['gambar_user']); ?>" 
            />

            <!-- Informasi profil -->
            <div class="profile-info">
                <div><?php echo htmlspecialchars($user['namadepan']) . ' ' . htmlspecialchars($user['namabelakang']); ?></div>
                <div>Email: <?php echo htmlspecialchars($user['email']); ?></div>
                <div>Nomor HP: <?php echo htmlspecialchars($user['nohp']); ?></div>
            </div>

            <!-- Tombol logout -->
            <form method="POST" action="../regis-login/logout.php">
                <button class="logout-button" type="submit">Logout</button>
            </form>
        </div>
    </main>
</body>
</html>
