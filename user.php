<?php
include "./asset/dbskin.php";
$sqlStatement = "SELECT * FROM user";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./asset/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <a href="main_admin.php">Daftar Produk</a>
        <a href="user.php">User</a>
        <a href="toko.php">Daftar Toko</a>
        <a href="iklan.php">Iklan</a>
        <a href="logout_admin.php">Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">

        <span class="open-sidebar">
            <img class="logo" src="./gambar/Desain tanpa judul.png" alt="">
            <div class="logo-text">
                SKINEXPERT
            </div>
        </span>

        <div class="row mt-4 mb-4 ">

            <a class="btn btn-primary" href="add_user.php"> Tambah User</a>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">

                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Gambar User</th>
                <th>Aksi</th>

            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $user) {
                ?>
                    <tr>
                        <td align="center"><?= $user["namadepan"] ?></td>
                        <td align="center"><?= $user["namabelakang"] ?></td>

                        <td align="center"><?= $user["email"] ?></td>
                        <td align="center"><?= $user["nohp"] ?></td>
                        <td align="center"><img src="./Profil/gambar/<?= $user["gambar_user"] ?>" alt="gambar_user" width="50"></td>

                        <td align="center">
                            <a href="edit_user.php?email=<?= $user['email'] ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="hapus_user.php?email=<?= $user['email'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>



    </div>


</body>

</html>