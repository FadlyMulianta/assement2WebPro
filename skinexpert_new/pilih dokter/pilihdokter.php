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

        main {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }



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
            z-index: 1000;
            top: 50px;
            /* Adjust this value to position the popup */
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

        .container {
            margin-right: 5rem;
            margin-left: 5rem;
        }

        .content {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .filter {
            width: 25%;
            background-color: var(--back-color);
            padding: 20px;
            border-radius: 10px;
        }

        .filter h3 {
            margin-bottom: 15px;
        }

        .filter label {
            display: block;
            margin: 10px 0 5px;
        }

        .filter input,
        .filter button {
            width: 100%;
            padding: 4px;
            border: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .filter button {
            margin-top: 3rem;
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .doctor-list {
            width: 100%;
        }

        .doctor-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var();
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;

        }

        .doctor-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

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
    </style>
</head>

<body>

    <header>
        <nav>
            <div>
                <section>
                    <div class="logo">
                        <img class="img" src="./gambar/Desain tanpa judul.png" alt="">
                        <div class="logo-text">
                            <a href="beranda.php"> SKINEXPERT </a>
                        </div>
                        <div class="logo-text-flex">
                            <div class="logo-text-link"><a href="beranda.php" id="beranda">Beranda</a></div>
                            <div class="logo-text-link"><a href="scan.php" id="scan">Scan Ai</a></div>
                            <div class="logo-text-link"><a href="pilihdokter.php" id="konsultasi">Konsultasi</a></div>
                            <div class="logo-text-link"><a href="skincare.php" id="skincare">SkinCare</a></div>
                        </div>
                        <script>
                            // Ambil URL halaman saat ini
                            const currentUrl = window.location.pathname;

                            // Cek URL untuk menambahkan class "active" pada menu yang sesuai
                            if (currentUrl.includes("beranda.php")) {
                                document.getElementById("beranda").classList.add("active");
                            } else if (currentUrl.includes("scan.php")) {
                                document.getElementById("scan").classList.add("active");
                            } else if (currentUrl.includes("pilihdokter.php")) {
                                document.getElementById("konsultasi").classList.add("active");
                            } else if (currentUrl.includes("skincare.php")) {
                                document.getElementById("skincare").classList.add("active");
                            }
                        </script>



                    </div>

                </section>

            </div>

            <div>
                <section>
                    <div class=" ikon-post">
                        <div class="ikon">
                            <a href="">
                                <img src="./ikon/search.png" alt="">
                            </a>
                            <a href="">
                                <img src="./ikon/icons8-menu-64.png" alt="">
                            </a>
                            <a href="">
                                <img src="./ikon/icons8-notification-64.png" alt="">
                            </a>
                            <a href="">
                                <img src="./ikon/chat.png" alt="">
                            </a>
                            <a href="keranjang.php">
                                <img src="./ikon/shopping-cart (1).png" alt="">
                            </a>
                            <a href="" id="user-icon">
                                <img src="./ikon/user.png" alt="">
                            </a>
                        </div>

                    </div>

                </section>
            </div>



        </nav>

    </header>

    <!-- Pop-up Modal -->
    <div class="popup" id="userPopup">
        <ul>
            <li><a href="login.php">Sign Up/Sign In</a></li>
            <li><a href="#">Detail Pesanan</a></li>
            <li><a href="hasilAi.html">Hasil Scan AI</a></li>
            <li><a href="../Setting/index.html">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
            
    </div>

    <!-- Overlay -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userIcon = document.querySelector('a[href=""] > img[src="./ikon/user.png"]');
            const popup = document.getElementById("userPopup");

            userIcon.parentElement.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default anchor click behavior
                event.stopPropagation(); // Stop click event from propagating to document
                const rect = userIcon.getBoundingClientRect();
                popup.style.top = rect.bottom + "px";
                popup.style.left = rect.left + "px";
                popup.style.display = popup.style.display === "block" ? "none" : "block";
            });

            document.addEventListener("click", function(event) {
                if (!userIcon.contains(event.target) && !popup.contains(event.target)) {
                    popup.style.display = "none";
                }
            });

            popup.addEventListener("click", function(event) {
                event.stopPropagation(); // Prevent click event from closing the popup
            });
        });
    </script>





    <div class="container">

        <div class="content">
            <div class="filter">
                <h3>FILTER</h3>
                <label>Ulasan Dokter:</label>
                <input type="text" placeholder=" ">
                <label>Biaya Konsultasi:</label>
                <input type="text" placeholder=" ">
                <label>Waktu Tersedia:</label>
                <input type="text" placeholder=" ">
                <button>Cari</button>
            </div>

            <div class="doctor-list">
                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/orrii-removebg.png" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>
                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <b>
                                    <p>ULASAN DOKTER</p>
                                </b>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/orrii-removebg.png" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <b>
                                    <p>ULASAN DOKTER</p>
                                </b>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/orrii-removebg.png" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <p><b>ULASAN DOKTER</b></p>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>