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

    // If a new image is uploaded
    if (!empty($gambar_produk['name'])) {
        // Generate a unique name for the image to avoid overwriting existing files
        $photoName = time() . '_' . $gambar_produk['name'];
        move_uploaded_file($gambar_produk['tmp_name'], './gambar/' . $photoName);

        // Update the database with the new image name
        $sqlStatement = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok', deskripsi_produk='$deskripsi_produk', nama_toko='$nama_toko', gambar_produk='$photoName' WHERE id_produk='$id_produk'";
    } else {
        // If no new image is uploaded, keep the existing image
        $photoName = $row["gambar_produk"];
        $sqlStatement = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok', deskripsi_produk='$deskripsi_produk', nama_toko='$nama_toko' WHERE id_produk='$id_produk'";
    }

    // Execute the query
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Pengubahan data produk " . $nama_produk . " berhasil";
        header("location:main_admin.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Pengubahan data produk " . $nama_produk . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

/** Cari produk */
$id_produk = $_GET['id_produk'];
$sqlStatement = "SELECT * FROM produk WHERE id_produk='$id_produk'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <a href="main_admin.php">Daftar Produk</a>
        <a href="">User</a>
        <a href="#settings">Daftar Toko</a>
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
                <h4>Update Product Data</h4>
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
                    <label for="id_produk" class="col-form-label">Id Produk</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="id_produk" name="id_produk" disabled value="<?= $row["id_produk"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nama_produk" class="col-form-label">Nama Produk</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $row["nama_produk"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="harga" class="col-form-label">Harga</label>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $row["harga"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="stok" class="col-form-label">Stok</label>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $row["stok"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="deskripsi_produk" class="col-form-label">Deskripsi Produk</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="<?= $row["deskripsi_produk"] ?>" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nama_toko" class="col-form-label">Nama Toko</label>
                </div>
                <div class="col-auto">
                    <select name="nama_toko" id="nama_toko" class="form-select">
                        <?php
                        foreach ($dttoko as $key => $toko) {
                            $toko['id_toko'] == $row['id_toko'] ? $selected = "selected" : $selected = "";
                        ?>
                            <option value="<?= $toko['nama_toko'] ?>" <?= $selected ?>><?= $toko['nama_toko'] ?></option>

                        <?php
                        }

                        ?>


                    </select>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="gambar_produk" class="col-form-label">Gambar Produk</label>
                </div>
                <div class="col-auto">
                    <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                    <?php
                    if (!empty($row["gambar_produk"])) {
                    ?>
                        <img src="./gambar/<?= $row["gambar_produk"] ?>" alt="Current Product Image" width="150">
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="mt-4 row">
                <div class="col-auto">
                    <input type="hidden" name="id_produk" value="<?= $row["id_produk"] ?>">
                    <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="Ulangi">
                </div>
            </div>
        </form>
        <div class="row mt-4 mb-4 ">

            <a class="btn btn-warning" href="main_admin.php">Kembali</a>
        </div>

    </div>
</body>

</html>