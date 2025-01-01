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

while ($row = mysqli_fetch_assoc($result)) {
    $keranjang[$row['nama_toko']][] = $row;
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
            padding-bottom: 10rem;
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
            margin-right: 7rem;
        }


        .keranjang {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 2rem;
            margin-right: 2rem;
        }


        .keranjang-produk-detail {
            padding-bottom: 3rem;
            border-bottom: 0.5px solid #ccc;
            margin-bottom: 3rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            /* gap: 1rem; */
        }

        .keranjang-produk-gambar {
            width: 80%;
            margin-right: 4rem;
        }

        .nama-toko {
            display: flex;
            margin-bottom: 1rem;

        }

        .nama-toko :where(a) {
            text-decoration: none;
            color: var(--primary-color);
        }

        .nama-toko :where(img) {
            margin-top: 0.9rem;
            width: 2%;
            height: 10%;
            margin-left: 0.3rem;
        }

        .judul-produk {
            justify-self: left;
            font-weight: bold;
            margin-bottom: 1.5rem;

        }

        .harga-produk {
            margin-right: 3rem;
            justify-self: end;
            align-items: end;
        }

        .harga-produk p {
            color: #1C3F60;
            font-weight: bold;
            margin-bottom: 6.5rem;

        }

        .tombol-hapus {
            justify-self: end;
            display: flex;
            right: 0;
            background-color: white;
            border: 1px solid #b7b7b7;
            border-radius: 20px;
            padding-right: 1rem;
            padding-left: 1rem;
            padding-bottom: 0.3rem;
            padding-top: 0.3rem;
            color: black;
            text-decoration: none;
            font-weight: bold;
        }

        .tombol-hapus:hover {
            background-color: red;
            color: white;
        }

        .quantity-control {
            margin-top: 2rem;
            display: flex;
            align-items: center;
            border: 1px solid #b7b7b7;
            border-radius: 20px;
            /* overflow: hidden; */
            width: 100px;
            height: 30px;
            margin-top: 3.4rem;
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



        .checkbox {
            /* position: fixed; */
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;

        }

        .checkbox-container {
            display: flex;
        }

        .product-checkbox {
            margin-right: 0.7rem;
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
            margin-left: 5rem;
        }

        .border {
            border: 1px solid #b7b7b7;
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
    </style>
</head>

<body>
    <?php include '../header.php'; ?>

    <main>
        <section>
            <div class="keranjang">
                <div class="keranjang-produk">
                    <table>
                        <?php if (!empty($keranjang)) { ?>
                            <?php foreach ($keranjang as $nama_toko => $produk_list) { ?>
                                <!-- Tampilkan Nama Toko -->
                                <tr>

                                    <td colspan="3" class="nama-toko">
                                        <a href="">
                                            <h2><?php echo $nama_toko; ?></h2>
                                        </a>

                                        <img src="../ikon/next.png" alt="">
                                    </td>
                                </tr>

                                <!-- Tampilkan Produk untuk Toko Ini -->
                                <?php foreach ($produk_list as $row) {
                                    $total_harga += $row['harga'] * $row['jumlah'];
                                ?>
                                    <tr>
                                        <td>
                                            <div class="keranjang-produk-detail">
                                                <div class="checkbox-container">
                                                    <input type="checkbox" name="selected_products[]" value="<?php echo $row['id_keranjang']; ?>" class="product-checkbox">
                                                    <img class="keranjang-produk-gambar" src="../gambar/<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                                                </div>
                                                <div>
                                                    <div class="judul-produk">
                                                        <h3><?php echo $row['nama_produk']; ?></h3>
                                                    </div>
                                                    <p>Stok: <?php echo $row['stok']; ?></p>
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
                                                </div>
                                                <div class="harga-produk">
                                                    <p>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                                                    <form method="POST" action="../keranjang/delete_cart.php">
                                                        <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                        <button type="submit" class="tombol-hapus">Hapus</button>
                                                    </form>
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

                <div class="keranjang-harga">
                    <div class="border">

                        <div class="total">
                            <div class="checkbox">
                                <div class="pilih">
                                    <a href="">Pilih Semua</a>
                                </div>
                                <div class="pilih">
                                    <a href="../keranjang/delete_cart.php?delete_all=true">Hapus Semua</a>
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
    </script>

    <?php include '../footer.php'; ?>
</body>
