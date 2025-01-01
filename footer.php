<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Footer</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Reset default margin dan padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: Arial, sans-serif; */
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;

        }

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
        }



        /* Footer Styling */
        .footer {

            z-index: 100000000;
            background-color: var(--primary-color);
            color: #fff;
            padding: 20px 0;

        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;

            padding: 10px 20px;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }

        .footer-section h2 {
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 2px solid #777;
            display: inline-block;
        }

        .footer-section p,
        .footer-section a {
            font-size: 14px;
            color: #ddd;
            text-decoration: none;
            line-height: 1.5;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 5px;
        }

        .footer-section ul li a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 10px;
            border-top: 1px solid #777;
            padding-top: 10px;
            font-size: 12px;
            color: #ccc;
        }

        .social {
            display: flex;
            /* justify-content: center; */
        }

        .social :where(img) {
            filter: brightness(100);
            margin-right: 20px;
            transition: transform 0.3s ease;
        }

        .social :where(img):hover {
            filter: brightness(200);
            transform: scale(1.2);

        }
    </style>
</head>

<body>
    <!-- Konten utama halaman -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h2>Tentang Kami</h2>
                <div>

                    <img src="../gambar/Desain tanpa judul.png" alt="" width="100">
                </div>
                <p>
                    Website ini adalah jasa yang menyediakan <br> layanan konsultasi terbaik untuk Anda.
                </p>
            </div>
            <div class="footer-section links">
                <h2>Tautan Cepat</h2>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Konsultasi</a></li>
                    <li><a href="#">Skin Care</a></li>
                    <li><a href="#">Tentang</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h2>Kontak</h2>
                <p>Email: SkinExpert@gmail.com</p>
                <p>Telepon: +62 812 3456 7890</p><br>
                <h2>Ikuti Kami</h2>
                <div class="social">
                    <a href="#"><img src="../ikon/icons8-facebook-64.png" alt="" width="30"></a>
                    <a href="#"><img src="../ikon/icons8-instagram-logo-64.png" alt="" width="30"></a>
                    <a href="#"><img src="../ikon/icons8-twitter-64.png" alt="" width="30"></a>
                    <a href="#"><img src="../ikon/icons8-whatsapp-64 (1).png" alt="" width="30"></a>

                </div>

            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 | Dibuat oleh Tim SkinExpert
        </div>
    </footer>
</body>

</html>