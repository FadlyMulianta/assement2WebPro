<?php
include '../asset/dbskin.php';

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
    <link rel="stylesheet" href="./asset/signupp.css">
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
            background-image: url(../gambar/backround.png);
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
            /* margin-top: 10rem; */
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
            margin-top: 3rem;
            margin-right: 5rem;
            text-align: center;
            justify-items: center;

        }

        .form-judul {
            /* background-color: antiquewhite; */
            display: flex;
            justify-content: center;
            width: 20rem;
            /* margin-bottom: 1.5rem; */
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
            margin-left: 1rem;
            margin-right: 1rem;

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
            margin-bottom: 1rem;
        }



        .form-input input:focus {
            background-color: white;
            border: 1px solid var(--primary-color);
            outline: none;
            /* Efek menyala */
        }

        .form-input input::placeholder {
            font-size: 15px;
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
            margin-top: 1rem;
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
            justify-content: center;
            margin-top: 4rem;
            display: flex;
            margin-bottom: 2rem;
        }

        .a-login {
            /* background-color: #1C3F60; */
            padding-right: 5rem;
            margin-top: 3rem;
            font-size: 30px;
            text-align: center;
        }

        .a-login h3 {
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

            padding-left: 0.1rem;
            padding-right: 0.5rem;
            margin-left: 0.2rem;

            color: var(--primary-color);
            /* text-decoration: none; */
            font-size: 20px;
        }

        /* .linklogin:hover {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        } */

        .linklogin h6 {
            font-style: italic;
        }





        /* Untuk perangkat dengan lebar layar kurang dari 768px (tablet dan ponsel) */
        /* Untuk perangkat dengan lebar layar kurang dari 768px (tablet dan ponsel) */
        @media screen and (max-width: 768px) {
            .regis {
                grid-template-columns: 1fr;
                /* Ubah menjadi satu kolom */
                height: auto;
                /* Sesuaikan tinggi agar fleksibel */
            }

            .form {
                margin-top: 1rem;
                margin-right: 1rem;
                margin-left: 1rem;
            }

            .form-input {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .form-input input {
                width: 100%;
                /* Gunakan 100% lebar layar */
                margin-left: 0;
                margin-right: 0;
                font-size: 14px;
                /* Sesuaikan ukuran font */
                height: 2.5rem;
            }

            .button {
                width: 100%;
                /* Tombol memenuhi lebar kontainer */
                font-size: 18px;
                height: 2.5rem;
            }

            .gambar img {
                width: 10%;
                /* Gambar lebih kecil agar sesuai layar */
                margin-left: auto;
                margin-right: auto;
            }

            .a-login h3 {
                font-size: 20px;
                /* Ukuran teks lebih kecil untuk layar tablet */
                margin-top: 0.5rem;
                margin-bottom: 0.5rem;
            }

            .linklogin {
                font-size: 18px;
                /* Sesuaikan ukuran teks link */
            }
        }

        /* Untuk perangkat dengan lebar layar kurang dari 480px (ponsel kecil) */
        @media screen and (max-width: 480px) {

            main {
                background-image: none;



            }

            .regis {
                /* margin-top: 10rem; */
                height: 49rem;
                
                display: grid;
                grid-template-columns: 1fr;
                

            }

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                justify-self: center;
                justify-items: center;
            }

            .form {
                margin-top: 1rem;
                margin-right: 10rem;


            }

            .form-input {

                /* background-color: aqua; */
                display: grid;
                grid-template-columns: 1fr 1fr;
                align-items: center;

                /* margin-left: 0rem; */
                margin-left: 1rem;

            }

            .form-input input {
                background-color: rgb(235, 235, 235);
                border: none;
                font-size: 16px;
                padding-left: 1rem;
                padding-right: 1rem;
                border-radius: 1rem;
                width: 10rem;
                height: 3rem;
                /* margin-top: 1rem; */
                /* margin-bottom: 1rem; */
            }

            .button {
                margin-right: 1rem;
                margin-top: 1rem;
                transform: translateY(100%);
                /* Memulai gambar di luar layar (bawah) */
                animation: slide-up 1s ease-out forwards;

            }

            .form-judul h1 {
                font-size: 24px;
                /* Perkecil ukuran font untuk ponsel kecil */
            }

            .form-input input {
                font-size: 14px;
                /* Perkecil teks input */
                height: 2.5rem;
            }

            .button {
                height: 2rem;
                /* Perkecil tombol */
                font-size: 16px;
            }

            .linklogin {
                font-size: 16px;
                /* Sesuaikan ukuran teks link */
            }

            .gambar img {
                /* justify-self: first baseline; */
                display: none;
                width: 5rem;
                margin-left: 0rem;
                padding: 0rem;
                /* Gambar memenuhi lebar layar */
            }

            .gambar {
                margin: 0rem;
                padding: 0rem;
                width: 10%;
                /* Sesuaikan tinggi agar fleksibel */
                /* display: grid;
                grid-template-columns: 1fr; */

                /* Satu kolom untuk gambar */
            }

            .a-login {
                /* background-color: #1C3F60; */
                padding-right: 0rem;
                margin-top: 0rem;
            }

            .a-login h2 {

                font-size: 18px;
                /* Ukuran teks lebih kecil untuk layar ponsel */
                margin-top: 0.3rem;
                margin-bottom: 0.3rem;
            }
        }
    </style>
</head>

<body>
    <main>
        <section>
            <div class="regis">
                <div class="gambar">
                    <div class="img">
                        <img src="../gambar/Desain tanpa judul.png" alt="">

                    </div>
                    <div class="a-login">
                        <h2>Welcome to <br>SKIN EXPERT </h2>
                    </div>
                </div>


                <div class="form">
                    <div class="form-judul">

                        <div class="a-regis">
                            <h1> Daftar Akun Kamu Disini</h1>
                        </div>
                        <!-- Tampilkan notifikasi -->

                    </div>

                    <form action="" method="post">
                        <div class="form-grid">
                            <div class="form-input">
                                <div>
                                    <!-- <label for="username">Nama Depan</label> -->
                                    <input type="text" name="namadepan" placeholder="Nama Depan" required><br><br>
                                    <!-- <label for="username">Nomor Hp</label> -->
                                    <input type="tel" name="nohp" placeholder="Nomor Hp" required><br><br>
                                    <!-- <label for="username">Kata Sandi</label> -->
                                    <input type="password" name="katasandi" placeholder="Kata Sandi" required><br><br>
                                </div>
                            </div>
                            <div class="form-input">
                                <div>
                                    <!-- <label for="username">Nama Belakang</label> -->
                                    <input type="text" name="namabelakang" placeholder="Nama Belakang"><br><br>
                                    <!-- <label for="username">Email</label><br> -->
                                    <input type="email" name="email" placeholder="email" required><br><br>
                                    <!-- <label for="username">Ulangi Kata Sandi </label> -->
                                    <input type="password" placeholder="Kata Sandi" required><br><br>
                                </div><br>

                            </div>

                        </div>
                        <i><?php echo $succesMsg ?></i><br>
                        <input class="button" type="submit" name="submit" value="Daftar">
                        <div class="login">
                            <h4>anda sudah punya akun?</h4>
                            <a class="linklogin" href="../regis-login/login.php">
                                <h6>LOGIN SEKARANG</h6>
                            </a>
                        </div>
                    </form>

                </div>



            </div>

        </section>

    </main>
</body>

</html>