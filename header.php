<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="header.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
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

        
    </style>
</head>

<body>
    <header>
        <nav>
            <div>
                <section>
                    <div class="logo">
                        <img class="img" src="../gambar/Desain tanpa judul.png" alt="">
                        <div class="logo-text">
                            <a href="../beranda/beranda.php"> SKINEXPERT </a>
                        </div>
                        <div class="logo-text-flex">
                            <div class="logo-text-link"><a href="../beranda/beranda.php" id="beranda">Beranda</a></div>
                            <div class="logo-text-link"><a href="scan.php" id="scan">Scan Ai</a></div>
                            <div class="logo-text-link"><a href="../pilih-dokter/pilihdokter.php" id="konsultasi">Konsultasi</a></div>
                            <div class="logo-text-link"><a href="../produk/produk.php" id="skincare">SkinCare</a></div>
                        </div>

                    </div>
                </section>
            </div>

            <div>
                <section>
                    <div class=" ikon-post">
                        <div class="ikon">
                            <a href="">
                                <img src="../ikon/search.png" alt="">
                            </a>
                            <a href="">
                                <img src="../ikon/icons8-menu-64.png" alt="">
                            </a>
                            <a href="">
                                <img src="../ikon/icons8-notification-64.png" alt="">
                            </a>
                            <a href="../chat/chat.php">
                                <img src="../ikon/chattt.png" alt="">
                            </a>
                            <a href="../keranjang/keranjang.php" id="keranjang-link">
                                <img id="keranjang" src="../ikon/shopping-cart (1).png" alt="">
                            </a>

                            <a href="" id="user-icon">
                                <img src="../ikon/user.png" alt="">
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
            <li><a href="../profil/profil.php">Profil Saya</a></li>
            <li><a href="#">Detail Pesanan</a></li>
            <li><a href="hasilAi.html">Hasil Scan AI</a></li>
            <li><a href="../Setting/setting.php">Settings</a></li>
            <li><a href="../regis-login/logout.php">Logout</a></li>
        </ul>

    </div>

    <!-- Overlay -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userIcon = document.querySelector('a[href=""] > img[src="../ikon/user.png"]');
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
        } else if (currentUrl.includes("produk.php")) {
            document.getElementById("skincare").classList.add("active");
        } 
    </script>
    


</body>

</html>