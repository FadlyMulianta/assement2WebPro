<?php
include "./asset/dbskin.php";
if (isset($_POST['btnSimpan'])) {
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    
    
    $gambar_user = $_FILES['gambar_user'];

    if (!empty($gambar_user['name'])) {
        $photoName = time() . '_' . $gambar_user['name'];
        move_uploaded_file($gambar_user['tmp_name'], './gambar/' . $photoName);
        $sqlStatement = "UPDATE user SET namadepan='$namadepan', namabelakang='$namabelakang', email='$email', nohp='$nohp',  gambar_user='$photoName' WHERE email='$email'";
    } else {
        $photoName = $row["gambar_user"];
        $sqlStatement = "UPDATE user SET namadepan='$namadepan', namabelakang='$namabelakang', email='$email', nohp='$nohp' WHERE email='$email'";
    }


    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Penambahan data mahasiswa dengan NIM " . $namadepan . " berhasil";
        header("location:main_admin.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Penambahan data mahasiswa dengan NIM " . $namadepan . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

$email = $_GET['email'];
$sqlStatement = "SELECT * FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);
/**
 * load data di tabel study_program
 */
// $sqlStatement = "SELECT * FROM study_program";
// $query = mysqli_query($conn, $sqlStatement);
// $dtprodi = mysqli_fetch_all($query, MYSQLI_ASSOC);
// print_r($dtprodi);

// $sqlStatement = "SELECT * FROM toko";
// $query = mysqli_query($conn, $sqlStatement);
// $dttoko = mysqli_fetch_all($query, MYSQLI_ASSOC);
// mysqli_close($conn);


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
        <a href="toko.php">Daftar Toko</a>
        <a href="iklan.php">Iklan</a>
        <a href="logout_admin.php">Logout</a>
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
                <h4>Edit User</h4>
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
                <div class="col-2">
                    <label for="nim" class="col-form-label">Nama Depan</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="namadepan" placeholder="Nama Depan" value="<?= $row["namadepan"] ?>" required>
                </div>
            </div>

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Nama Belakang</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="namabelakang" placeholder="Nama Belakang" value="<?= $row["namabelakang"] ?>" required>
                </div>
            </div>

            <div v class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Email</label>
                </div>
                <div class="col-auto">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $row["email"] ?>" disabled>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">No Hp</label>
                </div>
                <div class="col-auto">
                    <input type="number" class="form-control" name="nohp" placeholder="No Hp" value="<?= $row["nohp"] ?>" required>
                </div>
            </div>

            <!-- <div class="mb-1 row">
                <div class="col-2">
                    <label for="nim" class="col-form-label">Kata Sandi</label>
                </div>
                <div class="col-auto">
                    <input type="password" class="form-control" name="katasandi" placeholder="Kata Sandi" value="<?= $row["katasandi"] ?>" required>
                </div>
            </div> -->

            <div class="mb-1 row">
                <div class="col-2">
                    <label for="foto" class="col-form-label">Gambar User</label>
                </div>
                <div class="col-auto">
                    <input type="file" class="form-control" id="foto" name="gambar_user">
                    <?php
                    if (!empty($row["gambar_user"])) {
                    ?>
                        <img src="./gambar/<?= $row["gambar_user"] ?>" alt="Current Product Image" width="150">
                    <?php
                    }
                    ?>
                </div>
            </div>


            <div class="mt-4 row">
                <div class="col-auto">
                    <input type="hidden" name="email" value="<?= $row["email"] ?>">
                    <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
                    <input type="reset" class="btn btn-danger" value="Ulangi">

                </div>
            </div>
        </form>
        <div class="row mt-4 mb-4 ">

            <a class="btn btn-warning" href="user.php">Kembali</a>
        </div>



    </div>