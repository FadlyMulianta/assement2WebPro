<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Doctor Consultation</title>
    <!-- <link rel="stylesheet" href="./asset/dokter.css"> -->

    <style>
        * {
            font-family: "Poppins", serif;
            padding: 0;
            margin: 0;
            overscroll-behavior: none;
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



        .container {
            margin-top: 0.5rem;
            margin-right: 7rem;
            margin-left: 6rem;
            margin-bottom: 3rem;
        }

        .content {

            display: flex;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .filter {
            top: 6.3rem;
            position: fixed;
            width: 25%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

        }

        .filter h3 {
            margin-bottom: 15px;
        }



        .input-filter,
        .filter button {
            width: 100%;
            padding: 10px;
            border: none;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: rgb(235, 235, 235);
            /* margin-bottom: 2rem;  */

        }

        .price-range :where(p) {
            font-size: 15px;
        }


        .filter input:focus {
            background-color: white;
            border: 1px solid var(--primary-color);
            outline: none;
            /* Efek menyala */
        }

        .filter button {
            margin-top: 2rem;
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .filter ::placeholder {
            color: black;
        }

        .doctor-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-left: 31%;

        }



        /* .doctor-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        } */

        .doctor-card-info {
            display: flex;
        }




        .doctor-info h4 {
            margin-bottom: 5px;
            font-size: 18px;
        }

        .doctor-info p {
            font-size: 14px;
            color: #555;
        }

        .availability {
            color: #333;
            font-weight: bold;
        }

        .rating {
            margin-left: rem;
        }

        .rating span {
            font-size: 14px;
        }

        .doctor-info button {
            background-color: #1C3F60;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
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
    </style>
</head>

<body>

    <?php include '../header.php'; ?>

    <div class="container">

        <div class="content">
            <div class="filter">
                <h3>FILTER</h3>
                <!-- <label>Ulasan Dokter:</label> -->
                <input type="text" placeholder="Masukkan Nama Dokter " class="input-filter">
                <!-- <label>Biaya Konsultasi:</label> 
                 div
                 -->
                <div class="price-range" style="margin-bottom: 10px;">
                    <p><b>Jenis Kelamin :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>Laki - Laki</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>Perempuan</p>
                        </label>
                    </form>

                </div>
                <div class="price-range" style="margin-bottom: 10px;">
                    <p><b>Harga :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>Rp0 - Rp100.000</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>Rp100.000+</p>
                        </label>
                    </form>

                </div>
                <div class="price-range">
                    <p><b>Pengalaman :</b></p>
                    <form style="display: flex;">
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;" checked>
                            <p>semua</p>
                        </label>
                        <label style="display: flex; margin-right: 10px;">
                            <input type="radio" name="price_range" value="0-100000" style="margin-right: 5px;">
                            <p>1 - 5 Tahun</p>
                        </label>
                        <label style="display: flex;">
                            <input type="radio" name="price_range" value="100000+" style="margin-right: 5px;">
                            <p>5 Tahun+</p>
                        </label>
                    </form>

                </div>


                <button>Cari</button>
            </div>
            <div class="doctor-list">
                <div class="doctor-card">
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
        </div>
    </div>
    <script>
        window.addEventListener('scroll', function() {
            const keranjang = document.querySelector('.filter');
            const footer = document.querySelector('#footer');

            const footerRect = footer.getBoundingClientRect();
            const keranjangHeight = keranjang.offsetHeight;

            // Jika elemen footer terlihat, posisikan keranjang di atas footer
            if (footerRect.top < window.innerHeight) {
                keranjang.style.position = 'absolute';
                keranjang.style.top = `${window.scrollY + footerRect.top - keranjangHeight - 313}px`;
            } else {
                keranjang.style.position = 'fixed';
                keranjang.style.top = '6.3rem';
            }
        });
    </script>
    <?php include "../footer.php" ?>
</body>

</html>