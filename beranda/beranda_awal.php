<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../regis-login/login.php");
    exit();
}

include '../asset/dbskin.php';

$sqlStatement = "SELECT * FROM produk LIMIT 6 ";
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

        body {
            background-color: #f1f1f6;
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
            margin-bottom: 5rem;
            padding-left: 5rem;
            padding-right: 5rem;
        }

        .dokter-judul {
            /* padding-top: 2rem; */
            padding-bottom: 2rem;
            font-size: 30px;
            text-align: center;
        }

        .judul-awal {
            margin-top: 15rem;
            font-size: 3rem;
        }

        .dokter-judul-1 {
            margin-top: 2rem;
        }

        .dokter-judul h1 {

            color: var(--primary-color);
        }

        .dokter-judul h2 {

            color: white;
        }

        .dokter-judul h6 {

            color: white;
        }

        .dokter-judul a {
            font-size: 20px;
            color: white;
        }

        .kebawah {
            display: inline-block;
            animation: turunNaik 2s infinite ease-in-out;
            margin-top: 12rem;
        }

        @keyframes turunNaik {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(30px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .dokter-judul p {
            font-size: 20px;
        }

        .dokter-gambar {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
        }

        .gambar-grid-1 {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            background-color: var(--back-color);

            /* background-color: var(--primary-color); */
            display: grid;
            gap: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .gambar-grid-1:hover {

            transform: translateY(-20px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

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
            gap: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .gambar-dokter {
            /* background-color: aqua; */
            /* align-items: center ; */
            width: 50%;
            margin-right: 1.5rem;
            border-radius: 10px;
        }



        .gambar {
            transition: all 0.3s ease;
            border-radius: 10px;
            position: relative;
            padding: 1rem;
            background-color: var(--back-color);
            display: flex;
            /* align-items: center; */

            overflow: hidden;
        }

        .gambar:hover {

            transform: translateY(-20px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

        }


        button {
            border: none;
            cursor: pointer;
            background: none;
        }

        .tombol-konsultasi {
            position: absolute;
            bottom: 20px;
            left: 48%;
            transform: translateX(22%);
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 2.7rem 0.5rem 2.7rem;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            opacity: 1;
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
            bottom: 20px;
            opacity: 1;
        }


        .info-dokter-besar :where(a) {
            text-decoration: none;
        }

        .info-dokter h1 {
            font-size: 20px;
            text-align: left;
        }

        .info-dokter {
            /* padding-bottom: 3rem; */
            /* font-size: 0.5rem; */
            margin-top: 0.3rem;
        }












        .produk {
            margin-left: 2;
            margin-top: 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            gap: 1.5rem;
        }

        .produk-grid {
            /* margin-top: 5rem; */
            /* padding: 1rem; */
            background-color: var(--back-color);
            display: grid;
            grid-template-rows: 1fr 1fr;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .produk-grid:hover {
            transform: translateY(-20px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

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
            /* padding-top: 3rem; */
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            /* margin-left: 3.1rem;
    margin-right: 3.1rem; */
            /* padding-bottom: rem; */
            /* text-align: center; */
        }

        .produk-detail-container {
            margin-left: 10px;
            margin-top: 10px;


        }

        .produk-nama-container {
            margin-bottom: 5px;
        }

        .produk-nama {
            text-transform: uppercase;
            color: var(--primary-color);
            font-size: 15px;
            font-weight: 600;
        }

        .toko {
            gap: 5px;
            display: flex;
            margin-top: 5px;
            /* margin-bottom: 3rem; */
        }

        .toko :where(img) {
            width: 10%;
        }

        .like {
            margin-left: 3px;
            width: 8%;
        }

        .lokasi {
            width: 10%;
        }

        .toko p {

            font-weight: 400;
            font-size: 14px;
        }

        .tombol-beli {
            margin-top: 15px;
            /* margin-left: 5rem;
            margin-right: 5rem; */
            border-radius: 5px;
            font-size: 1rem;
            /* margin-top: 2rem; */
            text-align: center;
        }

        .tombol-keranjang {
            border-radius: 5px;
            background-color: var(--primary-color);
            color: white;

            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-right: 2.6rem;
            padding-left: 2.6rem;
            font-weight: 500;
            font-size: 1rem;

        }



        .lihat-semua-top {
            margin-top: 2rem;
            /* margin-bottom: 2rem; */
        }

        .lihat-semua {
            background-color: white;
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



        .video {

            justify-self: center;
            position: absolute;
            z-index: -1;
            width: 100%;
            /* padding-top: 1.5rem; */

            filter: brightness(0.7);
            /* Mengurangi kecerahan */


        }

        .carousel {
            position: relative;
            width: 100%;
            max-width: 1500px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
        }

        .carousel img {
            width: 100%;
            display: block;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border: none;
            border-radius: 50%;
            background-color: #ccc;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-indicators .active {
            background-color: #000;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 2rem;
            color: #000;
            cursor: pointer;
            z-index: 1;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }
    </style>
</head>

<body>

    <?php include '../header_awal.php';  ?>

    <div class="iklan-video">
        <video autoplay muted loop class="video">
            <source src="../video/welcomeee.mp4" type="">
        </video>

    </div>

    <main>
        <section class="iklan">
            <div class="dokter-judul">
                <h2 class="judul-awal">SELAMAT DATANG DI SKINEXPERT</h2>
                <h6>~ Website Konsultasi Terbaik Dan Produk Skincare Terlengkap ~</h6>
                <!-- <a href="">Cek Selengkapnya</a> -->
                <div class="kebawah">

                    <img src="../ikon/triple-down-chevron.png" alt="">
                </div>
            </div>
            <!-- <div class="gambar-iklan">
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

            </div> -->
        </section>

        <section class="dokter">
            <div class="dokter-judul">
                <h1 class="dokter-judul-1">Daftar Dokter Konsultasi</h1>
                <p>~ Temukan Dokter Favorite Anda ~</p>
            </div>
            <div>
            </div>
            <div class="dokter-gambar">
                <div class="gambar-grid-2">
                    <button>
                        <div class="gambar">
                            <img class="gambar-dokter" src="../gambar/dokter1.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.John Doe</h1>
                                <h1>Rp 150.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 4 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Bandung</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>95% | 1rb+ Pasien</p>
                                </div>
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
                            <img class="gambar-dokter" src="../gambar/dokter3.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Jane Smith</h1>
                                <h1>Rp 50.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 1 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Medan</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>85% | 2rb+ Pasien</p>
                                </div>
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
                            <img class="gambar-dokter" src="../gambar/dokter2.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Michael John</h1>
                                <h1>Rp 70.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 2 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Madiun</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>92% | 950 Pasien</p>
                                </div>
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
                            <img class="gambar-dokter" src="../gambar/dokter6.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Vincent</h1>
                                <h1>Rp 200.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 6 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Jakarta</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>98% | 1rb+ Pasien</p>
                                </div>
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
                            <img class="gambar-dokter" src="../gambar/dokter4.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Ah Long</h1>
                                <h1>Rp 500.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 10 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Papua</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>91% | 5rb+ Pasien</p>
                                </div>
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
                            <img class="gambar-dokter" src="../gambar/dokter5.jpg" alt="">
                            <div class="info-dokter">
                                <h1>Dr.Lalisa Ja</h1>
                                <h1>Rp 125.000</h1>

                                <div class="toko">
                                    <img class="lokasi" src="../ikon/work.png" alt="">
                                    <p> 3 tahun Kerja</p>
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png" alt="">
                                    <p>Lampung</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png" alt="">
                                    <p>89% | 1rb+ Pasien</p>
                                </div>
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


            <div id="customCarousel" class="carousel">
                <div class="carousel-indicators">
                    <button data-slide="0" class="active" aria-label="Slide 1"></button>
                    <button data-slide="1" aria-label="Slide 2"></button>
                    <button data-slide="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../gambar/banner1 prooo.jpg" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../gambar/baneer pro 2.jpg" alt="Slide 2">
                    </div>
                    <div class="carousel-item active">
                        <img src="../gambar/banner1 prooo.jpg" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../gambar/baneer pro 2.jpg" alt="Slide 2">
                    </div>

                </div>
                <div>
                    <button class="carousel-control-prev" aria-label="Previous Slide">
                        <div>
                            <img class="" src="../ikon/chevron kiri.png" alt="" style="width: 70%; ">
                        </div>
                    </button>
                    <button class=" carousel-control-next" aria-label="Next Slide">
                        <div>
                            <img src="../ikon/chevron kanan.png" alt="" style="width: 70%;">
                        </div>
                    </button>
                </div>
            </div>
            <br><br>
            <div class="dokter-judul">
                <h1>Rekomendasi SkinCare</h1>
                <p>~ Skincare Terbaik Untuk Anda ~</p>

            </div>

            <div class="produk">
                <?php

                foreach ($data as $key => $produk) {
                ?>

                    <div class="produk-grid">
                        <div class="produk-gambar">

                            <img src="../gambar/<?= $produk['gambar_produk'] ?>" alt="gambar produk">

                        </div>
                        <div class="produk-detail">
                            <div class="produk-detail-container">
                                <div class="produk-nama-container">

                                    <p class="produk-nama"><?= $produk['nama_produk'] ?></p>
                                    <h3>Rp <?php echo number_format($produk['harga'], 2, ',', '.'); ?></h3>
                                </div>
                                <div class="toko">
                                    <img src="../ikon/store.png" alt="">
                                    <p> <?= $produk['nama_toko'] ?></p>
                                    <!-- <p> ★ 4,5/5 (130)</p> -->
                                </div>
                                <div class="toko">
                                    <img class="lokasi" src="../ikon/location.png " width="8%" alt="">
                                    <p>Bandung</p>
                                </div>
                                <div class="toko">
                                    <img class="like" src="../ikon/like.png " width="8%" alt="">
                                    <p>87% | 67rb+ Beli </p>
                                </div>
                            </div>

                            <div class="tombol-beli">
                                <form method="POST" action="../keranjang/autentikasi_keranjang.php">
                                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                    <button class="tombol-keranjang" type="submit" name="submit-keranjang">
                                        <p>+ Keranjang</p>
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

        <script>
            const carousel = document.querySelector('#customCarousel');
            const slides = carousel.querySelectorAll('.carousel-item');
            const indicators = carousel.querySelectorAll('.carousel-indicators button');
            const prevButton = carousel.querySelector('.carousel-control-prev');
            const nextButton = carousel.querySelector('.carousel-control-next');

            let currentSlide = 0;
            let autoScrollInterval = 5000; // Waktu bergulir otomatis (5 detik)

            function updateCarousel(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle('active', i === index);
                });
                carousel.querySelector('.carousel-inner').style.transform = `translateX(-${index * 100}%)`;
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarousel(currentSlide);
            }

            // Tambahkan navigasi manual
            prevButton.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateCarousel(currentSlide);
            });

            nextButton.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarousel(currentSlide);
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateCarousel(currentSlide);
                });
            });

            // Aktifkan scroll otomatis
            setInterval(nextSlide, autoScrollInterval);
        </script>

    </main>

    <?php include "../footer.php" ?>

</body>

</html>