<?php
session_start();
include '../asset/dbskin.php';

$email = 'imam@test.com'; // For testing purposes

// Query to join the 'keranjang' table and 'produk' table to get the details
$query = "
    SELECT k.id_keranjang, k.id_produk, k.jumlah, p.nama_produk, p.harga, p.stok, p.gambar_produk, p.nama_toko 
    FROM keranjang k
    JOIN produk p ON k.id_produk = p.id_produk
    WHERE k.email = '$email'
";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$total_harga = 0;


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
            /* padding: 1px; */
            color: var(--primary-color);
            font-weight: bold;
        }

        .logo-text-link a {
            text-decoration: none;
            color: black;
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
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0):
                                while ($row = mysqli_fetch_assoc($result)):
                                    $total_harga += $row['harga'] * $row['jumlah']; ?>
                                    <tr>
                                        <td>
                                            <div class="keranjang-produk-detail">
                                                <!-- Gambar produk -->
                                                <img
                                                    class="keranjang-produk-gambar"
                                                    src="../gambar/<?php echo $row['gambar_produk']; ?>"
                                                    alt="<?php echo $row['nama_produk']; ?>">
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
                                                        <form method="POST" action="../keranjang/update_cart.php" style="display:inline;">
                                                            <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                            <input type="hidden" name="action" value="decrease">
                                                            <button type="submit" class="quantity-btn-decrease">-</button>
                                                        </form>
                                                        <!-- Jumlah Produk -->
                                                        <div>

                                                        </div>
                                                        <input
                                                            type="text"
                                                            class="quantity"
                                                            value="<?php echo $row['jumlah']; ?>"
                                                            readonly>
                                                        <!-- Tombol + -->
                                                        <form method="POST" action="../keranjang/update_cart.php" style="display:inline;">
                                                            <input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">
                                                            <input type="hidden" name="action" value="increase">
                                                            <button type="submit" class="quantity-btn-increase">+</button>
                                                        </form>


                                                    </div>
                                                </div>
                                                <!-- Harga produk -->
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

    <?php include "../footer.php" ?>
</body>

</html>