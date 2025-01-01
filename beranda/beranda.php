<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../regis-login/login.php");
    exit();
}

include '../asset/dbskin.php';

$sqlStatement = "SELECT * FROM produk LIMIT 4 ";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./asset/beranda.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Beranda</title>


    <style>
        * {
            overscroll-behavior: none;
            font-family: "Poppins", serif;
            padding: 0;
            margin: 0;
        }




        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        /* ==================================================== */
        /* heade */
        header {
            padding: 0 100px;
            z-index: 99999;
            background-color: white
        }

        header {
            position: sticky;
            top: 0;
        }

        nav {
            padding-top: 1rem;
            padding-bottom: 0.5rem;
            /* padding-left: 5rem;
    padding-right: 4rem;      */
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .popup {
            display: none;
            position: fixed;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 15px;
            z-index: 100000;
            top: 50px;
            right: 0;
        }

        .popup ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .popup ul li {
            padding: 10px 20px;
        }

        .popup ul li a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .popup ul li a:hover {
            background-color: #f0f0f0;
        }


        .logo {

            /* background-color: yellowgreen; */
            display: flex;

        }

        .img {
            width: 6%;

        }

        .logo-text {
            font-weight: bolder;
            display: flex;
            margin-top: 0.3rem;
            /* align-items: center; */
            font-size: 20px;
            text-decoration: none;
            color: black;
        }

        .logo-text a {
            text-decoration: none;
            color: black;
        }

        .logo-text-flex {
            display: flex;
            margin-left: 2rem;
        }

        .logo-text-link {
            margin-left: 2rem;
            display: flex;
            margin-top: 0.5rem;
            /* align-items: center; */
            font-size: 16px;
        }

        .logo-text-link a:hover {
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: underline;
        }

        .logo-text-link a {
            text-decoration: none;
            color: black;
            transition: color 0.3s, text-decoration 0.3s;
            /* Smooth effect */
        }

        .logo-text-link a.active {
            font-weight: bold;
            text-decoration: underline;
            color: var(--primary-color);
        }



        .ikon {
            margin-top: 0.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            /* background-color: aqua; */

        }

        .ikon img {
            justify-content: center;
            width: 50%;
        }




        /* ========================================= */







        .iklan {
            margin-top: 1rem;
            margin-bottom: 8rem;
        }

        .gambar-iklan {
            display: flex;
            overflow: hidden;
        }

        .scroll {
            /* justify-content: center; */
            padding: 1rem;
            flex-shrink: 0;
            /* Pastikan gambar proporsional dengan tinggi kontainer */
            animation: scroll 18s linear infinite;
            /* align-items: center; */
        }

        .scroll img {
            width: 98%;
            aspect-ratio: 19 / 7;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-300%);
            }
        }

        .dokter {
            margin-bottom: 8rem;
            padding-left: 5rem;
            padding-right: 5rem;
        }

        .dokter-judul {
            /* padding-top: 2rem; */
            padding-bottom: 2rem;
            font-size: 30px;
            text-align: center;
        }

        .dokter-judul h1 {

            color: var(--primary-color);
        }

        .dokter-judul p {
            font-size: 20px;
        }

        .dokter-gambar {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1.5rem;
        }

        .gambar-grid-1 {
            border-radius: 10px;
            background-color: var(--back-color);

            /* background-color: var(--primary-color); */
            display: grid;
            gap: 1rem;
        }

        .gambar-grid-1-1 {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .gambar-grid-1-1 img {
            width: 65%;
            border-radius: 50%;
        }

        .info-dokter-besar {
            margin-top: 2rem;
        }

        .gambar-grid-1 h1 {
            text-align: center;
        }

        .gambar-grid-1 p {
            text-align: center;
        }

        .gambar-grid-2 {
            /* background-color: bisque; */
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 1.5rem;
        }

        .gambar-grid-2 img {
            /* background-color: aqua; */
            /* align-items: center ; */
            width: 50%;
            margin-right: 1.5rem;
            border-radius: 50%;
        }

        .gambar {
            border-radius: 10px;
            position: relative;
            padding: 1rem;
            background-color: var(--back-color);
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        button {
            border: none;
            cursor: pointer;
            background: none;
        }

        .tombol-konsultasi {
            position: absolute;
            bottom: -50px;
            left: 56%;
            transform: translateX(22%);
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            opacity: 0;
        }

        .tombol-konsultasi-besar {

            text-decoration: none;
            text-align: center;
            margin-left: 35%;
            margin-right: 35%;
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 2rem;
            transition: all 0.3s ease-in-out;
            transform: translateX(0%);
            bottom: -100px;
            opacity: 0;
        }
        button:hover .tombol-konsultasi-besar {
            bottom: 200px;
            opacity: 1;
        }

        button:hover .tombol-konsultasi {
            bottom: 65px;
            opacity: 1;
        }


        .info-dokter-besar :where(a) {
            text-decoration: none;
        }

        .info-dokter h1 {
            font-size: 20px;
        }

        .info-dokter p {
            padding-bottom: 3rem;
            /* font-size: 0.5rem; */
        }












        .produk {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 1.5rem;
        }

        .produk-grid {
            /* margin-top: 5rem; */
            /* padding: 1rem; */
            display: grid;
            grid-template-rows: 1fr 1fr;
            justify-content: center;
        }

        .produk-gambar {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .produk-gambar img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .produk-detail {

            background-color: var(--back-color);
            padding-top: 3rem;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            /* margin-left: 3.1rem;
    margin-right: 3.1rem; */
            /* padding-bottom: rem; */
            text-align: center;
        }

        .produk-detail h1 {
            color: var(--primary-color);
            font-size: 25px;
        }

        .toko {
            margin-top: 2rem;
            margin-bottom: 3rem;
        }

        .toko p {
            font-weight: 500;
            font-size: 20px;
        }

        .tombol-beli {
            margin-left: 5rem;
            margin-right: 5rem;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 2rem;
        }

        .tombol-keranjang {
            border-radius: 5px;
            background-color: var(--primary-color);
            color: white;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-right: 1.5rem;
            padding-left: 1.5rem;
            font-weight: 500;
            font-size: 1rem;
            color: white;
        }



        .lihat-semua-top {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .lihat-semua {
            border: 1px solid var(--primary-color);
            display: flex;
            justify-content: center;
            padding: 0.5rem;
            align-items: center;
            margin-left: 44%;
            margin-right: 44%;
            text-decoration: none;
            border-radius: 2rem;
        }



        .lihat-semua h4 {
            color: var(--primary-color);
            margin-right: 2px;
        }



        .lihat-semua img {
            width: 20px;
        }
    </style>
</head>

<body>

    <?php include '../header.php';  ?>


    <main>
        <section class="iklan">
            <div class="dokter-judul">
                <h1>SELAMAT DATANG DI SKINEXPERT</h1>
                <p>~ Website Konsultasi Terbaik ~</p>
            </div>
            <div class="gambar-iklan">
                <div class="scroll">
                    <img src="../ikon/preview.webp" alt="">
                </div>
                <div class="scroll">
                    <img src="../gambar/fotor-ai-2024112820111.jpg" alt="">
                </div>
                <div class="scroll">
                    <img src="../gambar/fotor-ai-2024112820214.jpg" alt="">
                </div>

                <div class="scroll">
                    <img src="../ikon/preview.webp" alt="iklan">
                </div>
                <div class="scroll">
                    <img src="../ikon/preview.webp" alt="iklan">
                </div>
                <div class="scroll">
                    <img src="../ikon/preview.webp" alt="iklan">
                </div>

            </div>
        </section>

        <section class="dokter">
            <div class="dokter-judul">
                <h1>Daftar Dokter Konsultasi</h1>
                <p>~ Temukan Dokter Favorite Anda ~</p>
            </div>
            <div class="dokter-gambar">
                <div class="gambar-grid-1">
                    <button>
                        <div class="gambar-grid-1-1">
                            <img src="../gambar/dokter1.jpg" alt="dokter">
                        </div>
                        <div class="info-dokter-besar">
                            <h1>Dr. Nama Dokter</h1>
                            <p>jl. sukanogiri no. 1 gang 1</p>
                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi-besar">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                </div>

                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img src="../gambar/dokter2.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr. Nama Dokter</h1>
                                <p>jl. sukanogiri no. 1 gang 1</p>
                            </div>

                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    <button>
                        <div class="gambar">
                            <img src="../gambar/dokter3.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr. Nama Dokter</h1>
                                <p>jl. sukanogiri no. 1 gang 1</p>
                            </div>
                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>


                </div>
                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img src="../gambar/dokter4.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr. Nama Dokter</h1>
                                <p>jl. sukanogiri no. 1 gang 1</p>
                            </div>
                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                    <button>
                        <div class="gambar">
                            <img src="../gambar/dokter5.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr. Nama Dokter</h1>
                                <p>jl. sukanogiri no. 1 gang 1</p>
                            </div>
                            <a href="../pembayaran/bayar_dokter.php">
                                <div class="tombol-konsultasi">
                                    <p>Konsultasi</p>
                                </div>
                            </a>
                        </div>
                    </button>
                </div>
            </div>
            <div class="lihat-semua-top">
                <a class="lihat-semua" href="../pilih-dokter/pilihdokter.php">
                    <div>
                        <h4>Semua Dokter</h4>
                    </div>
                    <img src="../ikon/next.png" alt="">
                </a>
            </div>

        </section>

        <section class="dokter">


            <div class="dokter-judul">
                <h1>Rekomendasi SkinCare</h1>
                <p>~ Skincare Terbaik Untuk Anda ~</p>
            </div>
            <div class="produk">
                <?php
                shuffle($data);
                foreach ($data as $key => $produk) { 
                    ?>

                    <div class="produk-grid">
                        <div class="produk-gambar">

                            <img src="../gambar/<?= $produk['gambar_produk'] ?>" alt="gambar produk">

                        </div>
                        <div class="produk-detail">
                            <h1><?= $produk['nama_produk'] ?></h1>
                            <h3>Rp <?php echo number_format($produk['harga'], 2, ',', '.'); ?></h3>
                            <div class="toko">
                                <p> <?= $produk['nama_toko'] ?></p>
                                <!-- <p> ★ 4,5/5 (130)</p> -->
                            </div>
                            <a href="">
                                <div class="tombol-beli">
                                    <form method="POST" action="../keranjang/autentikasi_keranjang.php">
                                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                        <button class="tombol-keranjang" type="submit" name="submit-keranjang">
                                            <p>Keranjang</p>
                                        </button>
                                    </form>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <!-- <div class="produk-grid">
                    <div class="produk-gambar">
                        <img src="./gambar/produk3.jpg" alt="">
                    </div>
                    <div class="produk-detail">
                        <h1>Moisturizer Ipsum</h1>
                        <div class="toko">
                            <p>Toko ipsum</p>
                            <p> ★ 4,5/5 (130)</p>
                        </div>
                        <a href="">
                            <div class="tombol-beli">
                                <button type="submit" name="submit-keranjang">
                                    <p class="tombol-keranjang">keranjang</p>
                                </button>
                            </div>
                        </a>
                    </div>
                </div> -->
            <!-- <div class="produk-grid">
                    <div class="produk-gambar">
                        <img src="./gambar/produk2.jpg" alt="">
                        
                    </div>
                    <div class="produk-detail">
                        <h1>Serum Azhara</h1>
                        <div class="toko">
                            <p>Toko Azhara</p>
                            <p> ★ 4,5/5 (130)</p>
                        </div>
                        <a href="">
                            <div class="tombol-beli">
                                <button type="submit" name="submit-keranjang">
                                    <p class="tombol-keranjang">keranjang</p>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="produk-grid">
                    <div class="produk-gambar">
                        <img src="./gambar/produk4.jpg" alt="">
                        
                    </div>
                    <div class="produk-detail">
                        <h1>Fashwash Robilika</h1>
                        <div class="toko">
                            <p>Toko Robilika</p>
                            <p> ★ 4,5/5 (130)</p>
                        </div>
                        <a href="">
                            <div class="tombol-beli">
                                <button type="submit" name="submit-keranjang">
                                    <p class="tombol-keranjang">keranjang</p>
                                </button>
                            </div>
                        </a>
                    </div>
                </div> -->

            <div class="lihat-semua-top">
                <a class="lihat-semua" href="../produk/produk.php">
                    <div>
                        <h4>Semua Produk</h4>
                    </div>
                    <img src="../ikon/next.png" alt="">
                </a>
            </div>
        </section>

    </main>

    <?php include "../footer.php" ?>

</body>

</html>