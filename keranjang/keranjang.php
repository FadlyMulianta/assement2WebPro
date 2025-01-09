<?php
session_start();
include '../asset/dbskin.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: ../regis-login/login.php'); // Redirect ke halaman login jika belum login
    exit;
}

// Ambil email pengguna dari sesi
$email = $_SESSION['email'];

// Query untuk mendapatkan data keranjang dan produk
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

// Mengelompokkan produk berdasarkan nama toko
$keranjang = [];
$total_harga = 0;
$total_jumlah = 0; // Variabel untuk menghitung jumlah total produk

while ($row = mysqli_fetch_assoc($result)) {
    $keranjang[$row['nama_toko']][] = $row;
    $total_jumlah += $row['jumlah'];  // Menambahkan jumlah produk ke total
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="keranjang.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        * {
            font-family: "Poppins", serif;
            padding: 0;
            margin: 0;
            overscroll-behavior: none;
        }

        main {
            padding-bottom: 2rem;
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





        /* ======================================================================== */
        main {
            margin-top: 2rem;
            margin-left: 5rem;
            margin-right: 5rem;
        }

        body {
            background-color: #f1f1f6;
        }


        .keranjang {
            display: flex;
            grid-template-columns: 1fr 1fr;
            /* gap: 1rem; */
            /* margin-top: 1rem; */
            margin-bottom: 1rem;
            margin-left: 1rem;
            margin-right: 2rem;
        }


        .keranjang-produk-detail {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            /* padding: 2rem; */
            border-bottom: 2px solid #ccc;
            margin-bottom: 0.2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* gap: 1rem; */
        }

        .keranjang-produk-gambar {
            /* padding: 10px; */
            padding: 8px;
            margin-top: 6px;
            width: 25%;
            height: 90%;
            /* height: 40%; */

            /* margin-right: 4rem; */
        }

        .nama-toko {
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white; */
            display: flex;
            /* margin-bottom: 1rem; */

        }

        .nama-toko :where(a) {
            text-decoration: none;
            color: var(--primary-color);
        }

        .back {
            margin-top: 0.5rem;
            width: 2%;
            height: 10%;
            margin-left: 0.3rem;
        }

        .judul-produk {
            /* margin-bottom: 2.5rem; */
            justify-self: left;
            font-weight: bold;
            /* margin-bottom: 1.5rem; */

        }

        .harga-produk {

            justify-content: right;

            /* margin-top: 1.5rem; */
            margin-right: 2rem;
            justify-self: end;
            align-items: end;
        }

        .harga-produk p {
            color: #1C3F60;
            font-weight: bold;
            margin-top: 1rem;
            justify-self: right;
            font-size: 20px;
            /* margin-bottom: 6.5rem; */

        }

        .harga-produk-container {
            display: flex;
            margin-top: 2rem;
            /* margin-left: 1rem; */
        }

        .tombol-hapus {
            justify-self: end;
            display: flex;
            right: 0;
            background-color: white;
            border: none;
            /* border: 1px solid #b7b7b7; */
            
            
            text-decoration: none;
            font-weight: bold;
            margin-left: 1.5rem;
            cursor: pointer;
        }

        .tombol-favorit {
            justify-self: end;
            display: flex;
            right: 0;
            background-color: white;
            border: none;
            
            color: black;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 10px;
            margin-left: 1.5rem;
            cursor: pointer;
        }

        

        

        .quantity-control {
            /* margin-top: 2rem; */
            justify-self: end;
            display: flex;
            align-items: center;
            border: 1px solid #b7b7b7;
            border-radius: 20px;
            /* overflow: hidden; */
            width: 100px;
            height: 30px;
            margin-bottom: 10px;


            /* margin-top: 3.4rem; */
        }


        .quantity-btn-decrease {
            background-color: transparent;
            border: none;
            width: 30px;
            height: 100%;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .quantity-btn-increase {
            background-color: transparent;
            border: none;
            width: 30px;
            height: 100%;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }


        .quantity-btn-decrease:hover,
        .quantity-btn-increase:hover {
            background-color: #f0f0f0;
        }

        .quantity {
            border: none;
            width: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            outline: none;
        }

        .love {
            justify-self: end;
        }


        .checkbox {
            /* position: fixed; */
            display: flex;
            justify-content: space-between;

        }

        .checkbox-container {
            display: flex;
            /* text-align: center; */

        }

        .product-checkbox {
            margin-right: 0.7rem;
            margin-left: 2rem;
        }

        .total {

            text-decoration: none;
        }

        .pilih {
            margin-top: 2rem;
            /* margin-left: 3rem; */
            text-align: center;
        }

        .pilih a {
            /* position: fixed; */
            text-decoration: none;
            color: black;
            border-radius: 20px;
            padding: 10px 20px;
        }


        .keranjang-harga {
            border-radius: 10px;
            background-color: white;
            position: fixed;
            margin-right: 5rem;
            top: 6.3rem;
        }

        .keranjang-produk {
            border-radius: 10px;
            /* padding: 10px; */

            margin-left: 35%;
        }


        .border {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;

        }

        .rincian {

            /* position: fixed;  */
            margin-top: 2rem;
            margin-left: 3rem;
        }

        .grid-total-harga {
            margin-left: 3rem;
            margin-top: 0.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid var(--primary-color);
            margin-right: 3rem;
            padding-bottom: 2rem;


        }

        .grid-total-harga-semua {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;

        }

        .total-produk {

            /* position: fixed; */
            text-align: left;
        }

        .total-harga {
            /* position: fixed; */
            text-align: right;
        }

        .total-produk-semua {
            margin-left: 3rem;
            font-size: 20px;
        }

        .total-harga-semua {
            margin-top: 0.5rem;
            margin-right: 3rem;
            text-align: right;
            font-size: 15px;
        }

        .voucher {
            margin-top: 0.5rem;
            margin-left: 3rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .voucher-input {

            border: 1px solid #b7b7b7;
            border-radius: 10px;
            padding-right: 1rem;
            padding-left: 1rem;
            padding-bottom: 0.3rem;
            padding-top: 0.3rem;
            color: black;
            text-decoration: none;
            margin-top: 0.8rem;
            /* font-weight: bold; */
        }

        .terapkan {
            background-color: #1C3F60;

            /* margin-top: 0.5rem; */
            margin-left: 3rem;
            text-align: center;
            text-decoration: none;
            color: white;
            border-radius: 20px;
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
            padding-right: 1rem;
            padding-left: 1rem;
            /* padding: 10px 20px; */
        }

        .bayar {
            margin-top: 4rem;
            justify-self: center;
        }

        .btn-bayar {
            background-color: #1C3F60;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            margin-bottom: 2rem;
            cursor: pointer;
        }

        .judul-container {
            margin-top: 1rem;
            margin-left: 1rem;

            /* margin-top: 1.5rem; */
        }

        .pilih-container {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            background-color: white;
            margin-bottom: 0.5rem;

        }

        #aksiContainer button {
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }


    </style>
</head>

<body>
    <?php include '../header.php'; ?>

    <main>
        <section>
            <div class="keranjang">
                <div class="keranjang-harga">
                    <div class="border">

                        <div class="total">

                            <div class="rincian">
                                <h3>Ringkasan Belanja Anda</h3>
                            </div>
                        </div>
                        <div class="grid-total-harga-semua">
                            <div class="total-produk-semua">
                                <h1>Total :</h1>
                            </div>
                            <div class="total-harga-semua">
                                <h1><span id="subtotal"><?php echo number_format($total_harga, 2, ',', '.'); ?></span></h1>
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
                            <form method="post" action="../pembayaran/bayar_produk.php">

                                <button class="btn-bayar">Lanjutkan Ke Pembayaran</button>

                            </form>

                        </div>


                    </div>
                </div>
                <div class="keranjang-produk">
                    <div class="pilih-container">
                        <div style="display: flex; padding: 1rem;">
                            <input id="pilihSemuaCheckbox" style="margin-right: 10px; margin-left: 1rem;" type="checkbox">
                            <p style=" font-weight: 600; margin-right: 29.5rem;">Pilih Semua (<?php echo $total_jumlah; ?>)</p>
                        </div>
                        <div id="aksiContainer" style="display: none; padding: 1rem; ">
                            <a href="../keranjang/delete_cart.php?delete_all=true" id="hapusSemua" style="margin-right: 10px; color: red; font-weight: 600; text-decoration: none;">Hapus</a>
                            <a id="favorit" style="color: rgb(255, 0, 144); font-weight: 600;">Favorit</a>
                        </div>
                    </div>
                    <script>
                        document.getElementById('pilihSemuaCheckbox').addEventListener('change', function() {
                            const aksiContainer = document.getElementById('aksiContainer');
                            if (this.checked) {
                                aksiContainer.style.display = 'block'; // Tampilkan aksi
                            } else {
                                aksiContainer.style.display = 'none'; // Sembunyikan aksi
                            }
                        });
                    </script>
                    <table>
                        <?php if (!empty($keranjang)) { ?>
                            <?php foreach ($keranjang as $nama_toko => $produk_list) { ?>
                                <!-- Tampilkan Nama Toko -->
                                <tr>

                                    <td colspan="3" class="nama-toko">
                                        <a href="" style="display: flex;">
                                            <img src="../ikon/store.png" alt="" style="width: 1.8rem;" >
                                            <h3><?php echo $nama_toko; ?></h3>
                                        </a>

                                        <!-- <img src="../ikon/next.png" alt="" class="back"> -->
                                    </td>
                                </tr>

                                <!-- Tampilkan Produk untuk Toko Ini -->
                                <?php foreach ($produk_list as $row) {
                                    $total_harga += $row['harga'] * $row['jumlah'];
                                ?>
                                    <tr id="last-product">
                                        <td>
                                            <div class="keranjang-produk-detail">
                                                <div class="checkbox-container">
                                                    <input type="checkbox" name="selected_products[]" value="<?php echo $row['id_keranjang']; ?>" class="product-checkbox">
                                                    <img class="keranjang-produk-gambar" src="../gambar/<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                                                    <div class="judul-container">
                                                        <div class="judul-produk">
                                                            <h3><?php echo $row['nama_produk']; ?></h3>
                                                        </div>
                                                        <p>Stok: <?php echo $row['stok']; ?></p>

                                                    </div>
                                                </div>
                                                <div class="harga-produk">
                                                    <p>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                                                    <div class="harga-produk-container">

                                                        <div class="quantity-control">
                                                            <form method="POST" action="../keranjang/update_cart.php" style="display:inline;">
                                                                <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                                <input type="hidden" name="action" value="decrease">
                                                                <button type="submit" class="quantity-btn-decrease">-</button>
                                                            </form>
                                                            <input type="text" class="quantity" value="<?php echo $row['jumlah']; ?>" min="1" max="<?php echo $row['stok']; ?>" data-stok="<?php echo $row['stok']; ?>" readonly>
                                                            <form method="POST" action="../keranjang/update_cart.php" style="display:inline;">
                                                                <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                                <input type="hidden" name="action" value="increase">
                                                                <button type="submit" class="quantity-btn-increase">+</button>
                                                            </form>
                                                        </div>

                                                        <div>

                                                            <form method="POST">

                                                                <button type="submit" class="tombol-favorit">
                                                                    <img src="../ikon/love.png" alt="" style="width: 1.5rem;">
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div>

                                                            <form method="POST" action="../keranjang/delete_cart.php">
                                                                <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                                <button type="submit" class="tombol-hapus">
                                                                    <img src="../ikon/delete.png" alt="" style="width: 1.5rem;">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3">Keranjang Anda kosong.</td>
                            </tr>
                        <?php } ?>
                    </table>

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
                const maxStock = parseInt(quantityInput.getAttribute("data-stok"), 10);

                decreaseBtn.addEventListener("click", (event) => {
                    let value = parseInt(quantityInput.value, 10);
                    if (value > 1) {
                        quantityInput.value = value - 1;
                    }
                });

                increaseBtn.addEventListener("click", (event) => {
                    let value = parseInt(quantityInput.value, 10);
                    if (maxStock == 0) {
                        alert("Jumlah produk melebihi stok yang tersedia.");
                        return; // Hentikan eksekusi
                    }
                    quantityInput.value = value + 1;
                });
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const checkboxes = document.querySelectorAll(".product-checkbox");
            const subtotalElement = document.getElementById("subtotal");

            // Update subtotal when checkbox is clicked
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", updateSubtotal);
            });

            function updateSubtotal() {
                let subtotal = 0;

                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        const row = checkbox.closest("tr");
                        const priceElement = row.querySelector(".harga-produk p");
                        const price = parseFloat(priceElement.textContent.replace("Rp", "").replace(/\./g, "").trim());
                        const quantityInput = row.querySelector(".quantity");
                        const quantity = parseInt(quantityInput.value, 10);

                        subtotal += price * quantity;
                    }
                });

                subtotalElement.textContent = subtotal.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
            }
        });


        window.addEventListener('scroll', function() {
            const keranjang = document.querySelector('.keranjang-harga');
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

    <?php include '../footer.php'; ?>
</body>