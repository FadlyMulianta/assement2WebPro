<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./asset/loginn.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login Page</title>

    <style>
        * {
            font-family: "Poppins", serif;
            margin: 0;
            padding: 0;
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

        section {
            background-image: url(../gambar/backround2.png);
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


        .login {
            height: 48rem;
            justify-items: center;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
        }

        .form {
            margin-top: 2rem;
            /* margin-left: 3rem; */
            text-align: center;
            justify-items: center;

        }

        .form-judul {
            /* background-color: antiquewhite; */
            display: flex;
            justify-content: center;
            width: 20rem;
        }



        .form-judul h2 {
            font-size: 30px;
            color: var(--primary-color);
            transform: translateY(-100%);
            /* Memulai gambar di luar layar (atas) */
            animation: slide-down 1s ease-out forwards;
        }



        .form-judul a:hover {
            color: var(--primary-color);

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
            width: 20rem;
            height: 3rem;
            margin: 1rem;
        }

        .lupa {
            margin-right: 1.5rem;
            text-align: right;

        }

        .lupa a {
            color: var(--primary-color);
            font-size: 12px;
        }



        .form-input input:focus {
            background-color: white;
            border: 1px solid var(--primary-color);
            outline: none;
            /* Efek menyala */
        }

        .form-input input::placeholder {
            font-size: 16px;
            color: black;

        }

        .form-input button {
            font-size: 20px;
            font-weight: bolder;
            color: var(--text-color-secondary);
            background-color: var(--primary-color);

            border-radius: 30px;
            width: 7rem;
            height: 2.5rem;
            margin-top: 1rem;
            margin-bottom: 3rem;
        }

        .form-input button:focus {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .gambar {
            text-align: center;
            display: grid;
            align-items: center;
            grid-template-columns: 1fr 1fr;
            /* justify-content: center; */


        }

        .gambar img {
            margin-left: 2rem;
            width: 70%;
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

        .a-regis {
            text-align: center;
            margin-right: 8rem;
            font-size: 30px;

        }

        .a-regis h2 {
            font-size: 60px;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 1.3s steps(18), blink 0.5s step-end infinite alternate;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        .regis {
            margin-top: 4rem;
            display: flex;
            transform: translateY(-200%);

            animation: slide-up 1s ease-out forwards;
        }



        .linkregis {


            padding-left: 0.3rem;
            padding-right: 0.5rem;
            font-style: italic;
            margin-left: 0.2rem;
            color: var(--primary-color);

            font-size: 20px;
            transform: translateY(-100%);
            animation: slide-up 1s ease-out forwards;

        }

        /* .linkregis:hover {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }

        .linkregis h6 {
            font-style: italic;


        } */

        @keyframes slide-down {
            to {
                transform: translateY(0);
                /* Gambar kembali ke posisi semula */
            }
        }

        .btn-ikon {
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


        .ikon {
            display: flex;
            justify-content: space-evenly;
        }

        .ikon img {
            width: 3rem;
            transition: transform 0.3s ease;
            /* margin: 1rem; */
        }

        .ikon img:hover {
            transform: scale(1.2);
        }


        /* Untuk perangkat dengan lebar layar kurang dari 768px (tablet dan ponsel) */
        @media screen and (max-width: 768px) {
            .login {
                grid-template-columns: 1fr;
                /* Satu kolom untuk layout */
                height: auto;
                /* Tinggi disesuaikan */
            }

            .form {
                margin-top: 1rem;
                margin-left: 1rem;
                margin-right: 1rem;
            }

            .form-judul {
                width: 100%;
                /* Lebar penuh */
            }

            .form-judul h2 {
                font-size: 24px;
                /* Ukuran lebih kecil */
            }

            .form-input {
                flex-direction: column;
                /* Input dan tombol dalam kolom */
                align-items: stretch;
                margin-top: 1rem;
            }

            .form-input input {
                width: 100%;
                /* Lebar penuh layar */
                font-size: 14px;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .form-input button {
                width: 100%;
                /* Tombol memenuhi lebar */
                font-size: 16px;
            }

            .lupa {
                margin-right: 0;
                text-align: left;
                /* Lupa password ke kiri */
                font-size: 12px;
            }

            .gambar {
                grid-template-columns: 1fr;
                /* Gambar jadi satu kolom */
                margin-top: 2rem;
            }

            .gambar img {
                width: 90%;
                /* Gambar lebih kecil */
                margin-left: auto;
                margin-right: auto;
            }

            .linkregis {
                font-size: 16px;
                /* Ukuran font lebih kecil */
                margin-left: 0;
                text-align: center;
            }

            .ikon {
                justify-content: center;
                /* Ikon di tengah */
            }

            .ikon img {
                width: 2.5rem;
                /* Ikon lebih kecil */
            }
        }

        /* Untuk perangkat dengan lebar layar kurang dari 480px (ponsel kecil) */
        @media screen and (max-width: 480px) {
            .form-judul h2 {
                font-size: 20px;
                /* Lebih kecil untuk layar kecil */
            }

            .form-input input {
                font-size: 12px;
                /* Ukuran font input lebih kecil */
                padding: 0.5rem;
                /* Padding lebih kecil */
            }

            .form-input button {
                height: 2rem;
                /* Tinggi tombol lebih kecil */
                font-size: 14px;
            }

            .linkregis {
                font-size: 14px;
                /* Teks lebih kecil */
            }

            .ikon img {
                width: 2rem;
                /* Ikon lebih kecil */
            }
        }
    </style>
</head>

<body>
    <main>
        <section>
            <div class="login">
                <div class="form">
                    <div class="form-judul">
                        <h2>Haii, Senang Bisa Bertemu Kembali</h2>
                    </div>
                    <?php
                    if (isset($_GET['errorMsg'])) {
                    ?>
                        <div class="" role="alert">
                            <?= $_GET['errorMsg'] ?>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="form-input">
                        <form method="post" action="../regis-login/autentikasi.php">
                            <input name="email" type="email" placeholder="Email" required><br>
                            <input name="katasandi" type="password" placeholder="Kata Sandi" required>
                            <div class="lupa">
                                <a href="#"><i>Lupa Kata Sandi?</i></a>
                            </div>
                            <div class="btn-ikon">
                                <button type="submit" name="button">LOGIN</button>
                                <div class="ikon">
                                    <img src="../ikon/icons8-facebook-64.png" alt="Facebook Icon">
                                    <img src="../ikon/icons8-google-64.png" alt="Google Icon">
                                    <img src="../ikon/icons8-twitter-64.png" alt="Twitter Icon">
                                    <img src="../ikon/icons8-whatsapp-64 (1).png" alt="WhatsApp Icon">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="regis">
                        <h4>anda belum punya akun?</h4>
                        <a href="../regis-login/signup.php" class="linkregis">
                            <h6> DAFTAR SEKARANG</h6>
                        </a>
                    </div>
                </div>

                <div class="gambar">
                    <img src="../gambar/Desain tanpa judul.png" alt="SkinExpert Logo">
                    <div class="a-regis">
                        <h2>SKINEXPERT</h2>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>