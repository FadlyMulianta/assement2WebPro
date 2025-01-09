<?php
include "./asset/dbskin.php";

if (isset($_POST['btnSimpan'])) {
    $id_toko = $_POST["id_toko"];
    $nama_toko = $_POST["nama_toko"];
    $alamat_toko = $_POST["alamat_toko"];
    $kontak_toko = $_POST["kontak_toko"];


    // If a new image is uploaded
    $sqlStatement = "update toko set nama_toko='$nama_toko',alamat_toko='$alamat_toko',kontak_toko='$kontak_toko' where id_toko='$id_toko'";

    // Execute the query
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Pengubahan data produk " . $nama_toko . " berhasil";
        header("location:main_admin.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Pengubahan data produk " . $nama_toko . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

/** Cari produk */
$id_toko = $_GET['id_toko'];
$sqlStatement = "SELECT * FROM toko WHERE id_toko='$id_toko'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);


// $sqlStatement = "SELECT * FROM toko ";
// $query = mysqli_query($conn, $sqlStatement);
// $dttoko = mysqli_fetch_all($query, MYSQLI_ASSOC);
// $row = mysqli_fetch_assoc($query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./asset/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <a href="main_admin.php">Daftar Produk</a>
        <a href="user.php">User</a>
        <a href="toko.php">Daftar Toko</a>
        <a href="iklan.php">Iklan</a>
        <a href="logout_admin.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <span class="open-sidebar">
            <img class="logo" src="./gambar/Desain tanpa judul.png" alt="">
            <div class="logo-text">
                SKINEXPERT
            </div>
        </span>

        <div class="row mt-3 mb-4">
            <div class="col-md-6">
                <h4>Edit Data Toko</h4>
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
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="id_produk" class="col-form-label">Id Toko</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="id_toko" name="id_toko" disabled value="<?= $row["id_toko"] ?>" required>
                </div>
            </div>

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nama_produk" class="col-form-label">Nama Toko</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?= $row["nama_toko"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="" class="col-form-label">Alamat Toko</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="<?= $row["alamat_toko"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="stok" class="col-form-label">Kontak Toko</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="kontak_toko" name="kontak_toko" value="<?= $row["kontak_toko"] ?>" required>
                </div>
            </div>


            <div class="mt-4 row">
                <div class="col-auto">
                    <input type="hidden" name="id_toko" value="<?= $row["id_toko"] ?>">
                    <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="Ulangi">
                </div>
            </div>
        </form>
        <div class="row mt-4 mb-4 ">

            <a class="btn btn-warning" href="toko.php">Kembali</a>
        </div>

    </div>
</body>

</html>