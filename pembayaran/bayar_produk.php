<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            /* padding: 20px; */
            background-color: #f1f1f6;
        }

        .container {
            margin-top: 2rem;
            display: flex;
            /* grid-template-columns: 2fr 1fr; */
            gap: 10px;

            /* margin: auto; */
        }

        .summary {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            position: fixed;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
            margin-left: 6rem;
        }

        .payment-method {
            margin-bottom: 2rem;

        }

        .address {
            margin-left: 39%;
            max-width: 2000px;
            background-color: #ffffff;
            border-radius: 10px;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
        }

        .alamat {
            padding: 55px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 1rem;
            border-radius: 10px;
        }

        .alamat-lain {
            margin-top: 1rem;
            background-color: var(--primary-color);
            color: white;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
        }

        .barang {
            padding: 55px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 3rem;
            border-radius: 10px;

        }

        .address h3,
        .summary h3 {
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .address p {
            line-height: 1.5;
            color: var(--text-color);
        }

        .payment-method {
            display: grid;
            gap: 15px;
        }

        .method {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .method img {
            width: 50%;
            /* height: auto; */
        }

        .method p {
            margin: 0;
        }

        /* Hover effect */
        .method:hover {
            background-color: #f0f8ff;
            border-color: #007bff;
        }

        /* Selected effect */
        .method.selected {
            background-color: var(--back-color);
            color: black;
            border-color: #0056b3;
        }

        .method.wrong {
            background-color: #ffcccc;
            border-color: #ff0000;
            color: #900;
        }

        .method img {
            width: 30px;
            height: 30px;
        }

        .details {
            margin-top: 20px;
        }

        .harga {
            display: flex;
            justify-content: space-between;
        }

        .harga-kanan {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
            ;
        }

        .details p {
            margin-bottom: 10px;
        }



        .summary h4 {
            margin-bottom: 20px;
        }

        .summary .total {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            text-align: center;
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #163349;
        }

        .note {
            text-align: left;
            font-size: 12px;
            color: gray;
            margin-top: 10px;
        }

        .insurance {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #e9f7f9;
            border: 1px dashed #3ac4c9;
            border-radius: 8px;
        }

        .insurance span {
            font-size: 14px;
            color: #3ac4c9;
        }



        .checkout-container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .item-container {
            display: grid;
            grid-template-columns: 80px 1fr 100px;
            gap: 20px;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .item-container:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .item-image img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .item-details p {
            margin: 0;
            color: #555;
        }

        .item-details .item-title {
            font-weight: bold;
            color: #333;
        }

        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .item-actions p {
            margin: 0;
            color: #333;
        }

        .regular-section {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px;
            font-size: 14px;
            margin-top: 10px;
        }

        .notes {
            margin-top: 10px;
        }

        .notes input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
        }

        regular-section {
            margin-bottom: 20px;
        }

        .regular-section strong {
            font-size: 18px;
        }

        .dropdown {
            margin-top: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .delivery-info {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <!-- Address Section -->
        <div class="summary">
            <div class="payment-method">
                <div class="method" onclick="selectMethod(this, false)">
                    <img src="../gambar/Desain tanpa judul.png" alt="BCA">
                    <p>Saldo SkinExpert</p>
                </div>

                <div class="method" onclick="selectMethod(this, false)">
                    <img src="../gambar/Logo BCA_Biru.png" alt="GoPay">
                    <p>BCA Virtual Account</p>
                </div>

                <div class="method" onclick="selectMethod(this, false)">
                    <img src="../gambar/logo dana.png" alt="GoPay">
                    <p>Dana</p>
                </div>
                <script>
                    function selectMethod(selected, isWrong) {
                        // Remove "selected" and "wrong" classes from all methods
                        document.querySelectorAll('.method').forEach((method) => {
                            method.classList.remove('selected', 'wrong');
                        });

                        if (isWrong) {
                            // Add "wrong" class to the clicked method
                            selected.classList.add('wrong');
                        } else {
                            // Add "selected" class to the clicked method
                            selected.classList.add('selected');
                        }
                    }
                </script>
                <button class="alamat-lain">Pilih Metode Pembayaran Lainnya</button>
            </div>
            <h3>Ringkasan Pembayaran</h3>
            <div class="details">
                <div class="harga">
                    <p>Total Harga (4 Barang): </p>
                    <p>Rp 2.999.999</p>
                </div>
                <div class="harga">
                    <p>Ongkos Kiriman: </p>
                    <p>Rp 2.999.999</p>
                </div>
                <div class="harga">
                    <p>Asuransi Pengiriman: </p>
                    <p>Rp 2.999.999</p>
                </div>

                <hr>
                <div class="harga">
                    <p class="total">Total tagihan: </p>
                    <p class="harga-kanan">Rp 3.160.899</p>
                </div>

            </div>
            <a href="#" class="btn">Bayar Sekarang</a>
            <p class="note">Dengan melanjutkan pembayaran, kamu menyetujui S&K yang berlaku.</p>
        </div>
        <div class="address">
            <div class="alamat">
                <h3>Alamat Pengiriman</h3>
                <p><strong>Fadly Agus Mulianta</strong></p>
                <p>Jl. Sukabirus Gg. Akil 2, Citeureup, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
                <p>6289518857296</p>
                <button class="alamat-lain">Pilih Alamat Lain</button>
            </div>
            <div class="barang">
                <div class="checkout-container">
                    <div class="item-container">

                        <div class="item-image">
                            <img src="../gambar/produk1.jpg" alt="">
                        </div>
                        <div class="item-details">
                            <p class="item-title">serum x wardahh</p>
                            <p>Toko Fadly</p>
                            <p><input type="checkbox"> Ganti rugi jika rusak/kecurian (Rp30.000)</p>
                        </div>
                        <div class="item-actions">
                            <p>1 x Rp2.999.999</p>
                        </div>
                    </div>
                    <div class="item-container">

                        <div class="item-image">
                            <img src="../gambar/produk4.jpg" alt="">
                        </div>
                        <div class="item-details">
                            <p class="item-title">serum ipsum</p>
                            <p>Toko Fadly</p>
                            <p><input type="checkbox"> Ganti rugi jika rusak/kecurian (Rp30.000)</p>
                        </div>
                        <div class="item-actions">
                            <p>1 x Rp2.999.999</p>
                        </div>
                    </div>
                    <div class="item-container">

                        <div class="item-image">
                            <img src="../gambar/produk3.jpg" alt="">
                        </div>
                        <div class="item-details">
                            <p class="item-title">serum lorem</p>
                            <p>Toko Tegar</p>
                            <p><input type="checkbox"> Ganti rugi jika rusak/kecurian (Rp30.000)</p>
                        </div>
                        <div class="item-actions">
                            <p>1 x Rp2.999.999</p>
                        </div>
                    </div>
                    <div class="item-container">

                        <div class="item-image">
                            <img src="../gambar/produk2.jpg" alt="">
                        </div>
                        <div class="item-details">
                            <p class="item-title">faswash</p>
                            <p>Toko Fadil M</p>
                            <p><input type="checkbox"> Ganti rugi jika rusak/kecurian (Rp30.000)</p>
                        </div>
                        <div class="item-actions">
                            <p>1 x Rp2.999.999</p>
                        </div>
                    </div>

                    <div class="regular-section">
                        <p><strong>Reguler</strong></p>
                        <div class="dropdown">
                            <select id="shipping-options" onchange="updateDeliveryInfo()">
                                <option value="jnt">J&T (Rp140.000) - Estimasi tiba 8 - 9 Jan</option>
                                <option value="jne">JNE (Rp150.000) - Estimasi tiba 7 - 8 Jan</option>
                                <option value="sicepat">SiCepat (Rp130.000) - Estimasi tiba 9 - 10 Jan</option>
                                <option value="anteraja">Anteraja (Rp145.000) - Estimasi tiba 8 - 9 Jan</option>
                            </select>
                        </div>
                        <div id="delivery-info" class="delivery-info">
                            <p>J&T (Rp140.000)</p>
                            <p>Estimasi tiba 8 - 9 Jan</p>
                            <p>Dilindungi <a href="#">Asuransi Pengiriman</a> (Rp18.900)</p>
                        </div>
                    </div>
                </div>

                <script>
                    function updateDeliveryInfo() {
                        const select = document.getElementById("shipping-options");
                        const info = document.getElementById("delivery-info");

                        const options = {
                            jnt: {
                                cost: "Rp140.000",
                                estimate: "8 - 9 Jan",
                            },
                            jne: {
                                cost: "Rp150.000",
                                estimate: "7 - 8 Jan",
                            },
                            sicepat: {
                                cost: "Rp130.000",
                                estimate: "9 - 10 Jan",
                            },
                            anteraja: {
                                cost: "Rp145.000",
                                estimate: "8 - 9 Jan",
                            },
                        };

                        const selectedOption = options[select.value];

                        info.innerHTML = `
                <p>${select.options[select.selectedIndex].text.split(" - ")[0]}</p>
                <p>Estimasi tiba ${selectedOption.estimate}</p>
                <p>Dilindungi <a href="#">Asuransi Pengiriman</a> (Rp18.900)</p>
            `;
                    }
                </script>
            </div>


        </div>
    </div>

    <!-- Payment Summary Section -->

    </div>


</body>

</html>