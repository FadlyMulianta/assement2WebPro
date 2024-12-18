<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
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
    
</body>
</html>