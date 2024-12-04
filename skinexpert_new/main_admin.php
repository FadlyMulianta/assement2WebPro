<?php

include 'dbskin.php';

$sqlStatement = "SELECT * FROM produk";
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
    <title>Document</title>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <a href="main_admin.php">Daftar Produk</a>
        <a href="">User</a>
        <a href="#settings">Daftar Toko</a>
        <a href="#logout">Logout</a>
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

            <a class="btn btn-primary" href="add_produk.php"> Tambah Produk</a>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">
                <th>Id</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Nama Toko</th>
                <th>Gambar Produk</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $produk) {
                ?>
                    <tr>
                        <td align="center"><?= $produk["id_produk"] ?></td>
                        <td align="center"><?= $produk["nama_produk"] ?></td>
                        <td><?= $produk["deskripsi_produk"] ?></td>
                        <td align="center"><?= $produk["harga"] ?></td>
                        <td align="center"><?= $produk["stok"] ?></td>
                        <td align="center"><?= $produk["nama_toko"] ?></td>
                        <td align="center"><img src="./gambar/<?= $produk["gambar_produk"] ?>" alt="gambar_produk" width="50"></td>
                        <td align="center">
                            <a href="edit_produk.php?id_produk=<?= $produk['id_produk'] ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="hapus_produk.php?id_produk=<?= $produk['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>



    </div>

    <!-- JavaScript 
    
</body>
</html>