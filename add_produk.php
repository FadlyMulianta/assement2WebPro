<?php
include "./asset/dbskin.php";
if (isset($_POST['btnSimpan'])) {
    $id_produk = $_POST["id_produk"];
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $deskripsi_produk = $_POST["deskripsi_produk"];
    $nama_toko = $_POST["nama_toko"];
    $gambar_produk = $_FILES['gambar_produk'];
    if (!empty($gambar_produk['name'])) {
        $photoName = time() . '_' . $gambar_produk['name'];
        move_uploaded_file($gambar_produk['tmp_name'], './gambar/' . $photoName);
    } else {
        $photoName = "";
    }



    $sqlStatement = "INSERT INTO produk ( nama_produk, harga, stok, deskripsi_produk, gambar_produk, nama_toko,id_kategori) VALUES ( '$nama_produk', '$harga', '$stok', '$deskripsi_produk', '$photoName', '$nama_toko',1)";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Penambahan data mahasiswa dengan NIM " . $nama_produk . " berhasil";
        header("location:main_admin.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Penambahan data mahasiswa dengan NIM " . $nama_produk . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
/**
 * load data di tabel study_program
 */
// $sqlStatement = "SELECT * FROM study_program";
// $query = mysqli_query($conn, $sqlStatement);
// $dtprodi = mysqli_fetch_all($query, MYSQLI_ASSOC);
// print_r($dtprodi);
$sqlStatement = "SELECT * FROM toko";
$query = mysqli_query($conn, $sqlStatement);
$dttoko = mysqli_fetch_all($query, MYSQLI_ASSOC);
mysqli_close($conn);


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
        <a href="lodout_admin.php">Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">

        <span class="open-sidebar">
            <img class="logo" src="../gambar/Desain tanpa judul.png" alt="">
            <div class="logo-text">
                SKINEXPERT
            </div>
        </span>


        <div class="row mt-3 mb-4">
            <div class="col-md-6">
                <h4>Tambah Produk</h4>
            </div>
        </div>
        <?php
        if (isset($errMsg)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $errMsg ?>
            </div>
        <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data">

            <div v class="mb-1 row">
                <div class="col-auto">
                    <input type="hidden" class="form-control" name="id_produk" placeholder="Nama Produk">
                </div>
            </div>
            <div v class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Nama Produk</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required>
                </div>
            </div>

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Harga Produk</label>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" name="harga" placeholder="Harga Produk" required>
                </div>
            </div>

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Stok Produk</label>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" name="stok" placeholder="Stok Produk" required>
                </div>
            </div>

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Deskripsi Produk</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="deskripsi_produk" placeholder="Deskripsi Produk" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Nama Toko</label>
                </div>
                <div class="col-auto">
                    <select name="nama_toko" id="nama_toko" class="form-select" required>
                        <?php
                        foreach ($dttoko as $key => $toko) {
                    
                        ?>
                            <option value="<?= $toko['nama_toko'] ?>" ><?= $toko['nama_toko'] ?></option>

                        <?php
                        }

                        ?>

                    </select>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="foto" class="col-form-label">Gambar Produk</label>
                </div>
                <div class="col-auto">
                    <input type="file" class="form-control" id="foto" name="gambar_produk">
                </div>
            </div>


            <div class="mt-4 row">
                <div class="col-auto">
                    <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="Ulangi">

                </div>
            </div>
        </form>
        <div class="row mt-4 mb-4 ">

            <a class="btn btn-warning" href="main_admin.php">Kembali</a>
        </div>



    </div>