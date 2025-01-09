<?php
include './asset/dbskin.php';

$succesMsg = "";
$errMsg = "";

if (isset($_POST['submit'])) {
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];
    $emailadmin = $_POST['emailadmin'];
    $kodeadmin = $_POST['kodeadmin'];
    $katasandi = $_POST['katasandi'];
    $hashedPassword = md5($katasandi);

    // Validasi data sederhana (misalnya, cek panjang password)

    $sql = "INSERT INTO admin (namadepan, namabelakang, nohp, emailadmin, kodeadmin, katasandi) 
            VALUES ('$namadepan', '$namabelakang','$nohp', '$emailadmin','$kodeadmin', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        $succesMsg = "Daftar akun " . $namadepan . " BERHASIL, silahkan login!";
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
    <!-- <link rel="stylesheet" href="./asset/signupp.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Daftar</title>
    <style>
        * {
            font-family: "Poppins", serif;
            margin: 0;
            padding: 0;
            /* background-color: #f5f5f5; */
        }


        main {
            background-image: url(./gambar/backround.png);
            width: 100%;
            background-position: center;
            background-size: cover;
            opacity: 0;
            animation: fade-in 1.5s ease-in forwards;

        }

        @keyframes fade-in {
            to {
                opacity: 1;
            }
        }






        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
        }

        /* section{
    background-color: antiquewhite;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

} */

        .regis {
            height: 49rem;
            justify-items: center;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;

        }



        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* justify-items: center; */
        }




        .gambar img {
            width: 50%;
        }

        .form {
            margin-right: 5rem;
            text-align: center;
            justify-items: center;

        }

        .form-judul {
            /* background-color: antiquewhite; */
            display: flex;
            justify-content: center;
            width: 20rem;
        }



        .form-judul h1 {
            font-size: 30px;

            font-weight: bolder;

            color: var(--primary-color);

        }

        .a-regis {
            transform: translateY(-100%);
            /* Memulai gambar di luar layar (atas) */
            animation: slide-down 1s ease-out forwards;
        }

        @keyframes slide-down {
            to {
                transform: translateY(0);
                /* Gambar kembali ke posisi semula */
            }
        }


        .form-input {

            /* background-color: aqua; */
            display: flex;
            align-items: center;
            margin-top: 2rem;

        }

        .form-input input {
            background-color: rgb(235, 235, 235);
            border: none;
            font-size: 16px;
            padding-left: 2rem;
            padding-right: 2rem;
            border-radius: 1rem;
            width: 13rem;
            height: 3rem;
            /* margin-top: 1rem; */
            margin-bottom: 1.5rem;
        }



        .form-input input:focus {
            background-color: white;
            border: 1px solid var(--primary-color);
            outline: none;
            /* Efek menyala */
        }

        .form-input input::placeholder {
            font-size: 12px;
            color: black;

        }

        .button {
            justify-items: center;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-color-secondary);
            background-color: var(--primary-color);
            border-radius: 30px;
            width: 7rem;
            height: 2.5rem;
            margin-top: 1.5rem;
            transform: translateY(100%);
            /* Memulai gambar di luar layar (bawah) */
            animation: slide-up 1s ease-out forwards;

        }

        @keyframes slide-up {
            to {
                transform: translateY(0);
                /* Gambar kembali ke posisi semula */
            }
        }

        .button:focus {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }


        .gambar {
            /* background-color: #1C3F60; */
            /* justify-content: space-between; */
            display: grid;
            /* justify-items: center; */
            grid-template-columns: 1fr 1fr;
            /* font-size: 25px; */
            /* text-align: center; */
        }


        .gambar img {

            margin-left: 5rem;
            width: 65%;
            transform: translateX(-100%);
            animation: slide-in 1s forwards;
        }

        @keyframes slide-in {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .login {
            margin-top: 1rem;
            display: flex;
        }

        .a-login {
            /* background-color: #1C3F60; */
            padding-right: 5rem;
            margin-top: 3rem;
            font-size: 30px;
            text-align: center;
        }

        .a-login h2 {
            /* white-space: nowrap;  */
            overflow: hidden;
            animation: typing 1s steps(18), blink 0.5s step-end infinite alternate;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }




        .linklogin {
            margin-left: 0.2rem;

            color: var(--primary-color);
            /* text-decoration: none; */
            font-size: 10px;
        }

        
    </style>
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
                        <h2>Welcome to <br>SKINEXPERT </h2>
                        <a class="linklogin" href="admin_login.php">
                            <h2>→ LOGIN ←</h2>
                        </a>
                    </div>
                </div>


                <div class="form">
                    <div class="form-judul">

                        <div class="a-regis">
                            <h1> Daftar Akun Admin Disini </h1>
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
                                    <input type="tel" name="nohp" placeholder="masukkan nomor hp" required><br><br>

                                    <label for="username">Kode Unik Admin : skin2</label><br><br>

                                    <br><label for="username">Kata Sandi</label>
                                    <input type="password" name="katasandi" placeholder="masukkan Kata Sandi" required><br>
                                </div>
                            </div>
                            <div class="form-input">
                                <div>
                                    <label for="username">Nama Belakang</label>
                                    <input type="text" name="namabelakang" placeholder="masukkan nama belakang"><br>

                                    <label for="username">Email Admin</label><br>
                                    <input type="email" name="emailadmin" placeholder="masukkan email" required><br>

                                    <label for="username">Masukkan kode unik admin</label><br>
                                    <input type="text" name="kodeadmin" placeholder="masukkan kode admin" required><br>

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