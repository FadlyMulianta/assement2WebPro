<?php
include 'dbskin.php';

$succesMsg = "";
$errMsg = "";

if (isset($_POST['submit'])) {
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $katasandi = $_POST['katasandi'];
    $hashedPassword = md5($katasandi);

    // Validasi data sederhana (misalnya, cek panjang password)

    $sql = "INSERT INTO user (namadepan, namabelakang, email, nohp, katasandi) 
            VALUES ('$namadepan', '$namabelakang', '$email', '$nohp', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        $succesMsg = "Daftar akun ".$namadepan. " BERHASIL, silahkan login!";
    } else {
        $errMsg = "Penambahan data user GAGAL! " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/signupp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Daftar</title>
</head>

<body>
    <main>
        <section>
            <div class="regis">
                <div class="gambar">
                    <div>
                        <img src="./gambar/Desain tanpa judul.png" alt="">
                        
                    </div>
                    <div class="a-login">
                        <h2>Welcome to <br>SKIN EXPERT </h2>

                        <a class="linklogin" href="login.php">
                            <h2>→ LOGIN ←</h2>
                        </a>
                    </div>
                </div>


                <div class="form">
                    <div class="form-judul">

                        <div class="a-regis">
                            <h1> Daftar Akun Kamu Disini </h1>
                        </div>
                        <!-- Tampilkan notifikasi -->

                    </div>
                    <form action="" method="post">
                        <div class="form-grid">
                            <div class="form-input">
                                <div>
                                    <label for="username">Nama Depan</label>
                                    <input type="text" name="namadepan" placeholder="masukkan nama depan" required><br>
                                    <label for="username">Nomor Hp</label>
                                    <input type="tel" name="nohp" placeholder="masukkan nomor hp" required><br>
                                    <label for="username">Kata Sandi</label>
                                    <input type="password" name="katasandi" placeholder="masukkan Kata Sandi" required><br>
                                </div>
                            </div>
                            <div class="form-input">
                                <div>
                                    <label for="username">Nama Belakang</label>
                                    <input type="text" name="namabelakang" placeholder="masukkan nama belakang"><br>
                                    <label for="username">Email</label><br>
                                    <input type="email" name="email" placeholder="masukkan email" required><br>
                                    <label for="username">Ulangi Kata Sandi </label>
                                    <input type="password" placeholder="Ulangi Kata Sandi" required><br>
                                </div><br>

                            </div>

                        </div>
                        <i><?php echo $succesMsg ?></i><br>
                        <input class="button" type="submit" name="submit" value="Daftar">
                    </form>

                </div>



            </div>

        </section>

    </main>
</body>

</html>