<?php
session_start();
include 'dbskin.php';

$email = 'imam@test.com'; // For testing purposes

// Query to join the 'keranjang' table and 'produk' table to get the details
$query = "
    SELECT k.id_keranjang, k.id_produk, k.jumlah, p.nama_produk, p.harga, p.stok, p.gambar_produk, p.nama_toko 
    FROM keranjang k
    JOIN produk p ON k.id_produk = p.id_produk
    WHERE k.email = '$email'
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$total_harga = 0;
?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="keranjang.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                            <div class="logo-text-link"> <a href="">Scan Ai</a></div>
                            <div class="logo-text-link"> <a href="../pilih dokter/pilihdokter.html">Konsultasi</a></div>
                            <div class="logo-text-link"> <a href="">SkinCare</a></div>
                        </div>


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
                                <img src="./ikon/icons8-notification-64.png" alt="">
                            </a>
                            <a href="">
                                <img src="./ikon/chat.png" alt="">
                            </a>
                            <a href="">
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

    <main>
        <section>
            <div class="keranjang">
                <div class="keranjang-produk">
                    <table>
                        <tbody>
                            <?php 
                            if (mysqli_num_rows($result) > 0): 
                                while ($row = mysqli_fetch_assoc($result)): 
                                    $total_harga += $row['harga'] * $row['jumlah'];?>
                                <tr>
                                    <td>
                                        <div class="keranjang-produk-detail">
                                            <!-- Gambar produk -->
                                            <img 
                                                class="keranjang-produk-gambar" 
                                                src="./gambar/<?php echo $row['gambar_produk']; ?>" 
                                                alt="<?php echo $row['nama_produk']; ?>"
                                            >
                                            <div>
                                                <!-- Nama produk -->
                                                <div class="judul-produk">
                                                    <h3><?php echo $row['nama_produk']; ?></h3>
                                                </div>
                                                <!-- Nama toko -->
                                                <p><?php echo $row['nama_toko']; ?></p>
                                                <!-- Stok -->
                                                <p>Stok: <?php echo $row['stok']; ?></p>
                                                <!-- Kontrol jumlah -->
                                                <div class="quantity-control">
                                                    <!-- Tombol - -->
                                                    <form method="POST" action="update_cart.php" style="display:inline;">
                                                        <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                        <input type="hidden" name="action" value="decrease">
                                                        <button type="submit" class="quantity-btn-decrease">-</button>
                                                    </form>
                                                    <!-- Jumlah Produk -->
                                                    <input 
                                                        type="text" 
                                                        class="quantity" 
                                                        value="<?php echo $row['jumlah']; ?>" 
                                                        readonly
                                                    >
                                                    <!-- Tombol + -->
                                                    <form method="POST" action="update_cart.php" style="display:inline;">
                                                        <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                        <input type="hidden" name="action" value="increase">
                                                        <button type="submit" class="quantity-btn-increase">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Harga produk -->
                                            <div class="harga-produk">
                                                <p>Rp <?php echo number_format($row['harga'] * $row['jumlah'], 2, ',', '.'); ?></p>
                                                <form method="POST" action="delete_cart.php">
                                                    <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                    <button type="submit" class="tombol-hapus">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php 
                                endwhile;
                            else: ?>
                                <!-- Jika keranjang kosong -->
                                <tr>
                                    <td colspan="3">Keranjang Anda kosong.</td>
                                </tr>
                            <?php 
                            endif; ?>
                        </tbody>
                    </table>
                </div>



                <div class="keranjang-harga">
                    <div class="border">

                        <div class="total">
                            <div class="checkbox">
                                <div class="pilih">
                                    <a href="">Pilih Semua</a>
                                </div>
                                <div class="pilih">
                                    <a href="delete_cart.php?delete_all=true">Hapus Semua</a>
                                </div>
                                <div class="pilih">
                                    <a href="">Favorite</a>
                                </div>

                            </div>
                            <div class="rincian">
                                <h3>Ringkasan Belanja Anda</h3>
                            </div>
                        </div>
                        <div class="grid-total-harga-semua">
                            <div class="total-produk-semua">
                                <h1>Total :</h1>
                            </div>
                            <div class="total-harga-semua">
                                <h1>Rp <?php echo number_format($total_harga, 2, ',', '.'); ?> </h1>
                            </div>
                        </div>
                        <div class="voucher">
                            <div>
                                <input class="voucher-input" type="text" placeholder="Masukkan Kode Voucher">
                            </div>
                            <div class="total-harga-semua">
                                <button class="terapkan">Terapkan</button>
                            </div>
                        </div>

                        <div class="bayar">
                            <button class="btn-bayar">Lanjutkan Ke Pembayaran</button>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const quantityControls = document.querySelectorAll(".quantity-control");

            quantityControls.forEach((control) => {
                const decreaseBtn = control.querySelector(".quantity-btn-decrease");
                const increaseBtn = control.querySelector(".quantity-btn-increase");
                const quantityInput = control.querySelector(".quantity");

                decreaseBtn.addEventListener("click", () => {
                    let value = parseInt(quantityInput.value, 10);
                    if (value > 1) {
                        quantityInput.value = value - 1;
                    }
                });

                increaseBtn.addEventListener("click", () => {
                    let value = parseInt(quantityInput.value, 10);
                    quantityInput.value = value + 1;
                });
            });
        });
    </script>
</body>

</html>