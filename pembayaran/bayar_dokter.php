<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <!-- <link rel="stylesheet" href="bayar_dokter.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        * {
            overscroll-behavior: none;
        }

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        body {
            font-family: "Poppins", serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .header {
            width: 100%;
            margin: 0 auto;
            /* Ini akan memastikan header terpusat */
        }


        .ikon-x i {
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }

        .hidden {
            display: none;
        }


        .main {
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .title h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .biaya {
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid var(--primary-color);
            /* background-color: #f3f3f3; */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .profile-img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .total-tagihan {
            margin-left: auto;
            text-align: right;
        }

        .payment-method {
            display: grid;
            gap: 15px;
        }

        .method {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #dbe2ef;
            border-radius: 10px;
            background-color: var(--back-color);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .method:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .method img {
            width: 30px;
            height: 30px;
        }

        .saldo {
            margin-left: auto;
            text-align: right;
        }


        .bayar-cancel {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 1rem;
            margin-bottom: 4rem;
        }

        .pay-btn {
            padding: 10px 120px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            background-color: var(--primary-color);

        }

        .cancel-btn {
            padding: 10px 110px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;

            background-color: red;

        }

        .pay-btn p {
            color: white;

        }
        .cancel-btn p {
            color: white;

        }

        .pay-btn:focus {
            background-color: white;
            color: white;
            border: 1px solid var(--primary-color);
        }

        .pay-btn:focus p {
            color: var(--primary-color);
        }

        .a-btn {

            text-decoration: none;
            color: var(--text-color);
        }
    </style>
</head>

<body>


    <!-- header  -->

    <?php include '../header.php'; ?>



    <!-- main  -->
    <main class="main">
        <div class="container">
            <div class="title">
                <h3>Metode Pembayaran</h3>
            </div>

            <div class="biaya">
                <img src="../gambar/dokter1.jpg"
                    alt="Profile picture of Dr. Richard" class="profile-img">
                <div>
                    <p>Dr. Richard</p>
                    <p>Jl. Kb. Jukut No.7, Babakan...</p>
                </div>
                <div class="total-tagihan">
                    <p>Total Tagihan</p>
                    <h5>Rp. 100.000</h5>
                </div>
            </div>

            <section class="payment-method">
                <div class="method MBanking">
                    <img src="https://storage.googleapis.com/a1aa/image/u2uqkKY9gUIwGhjrghkqjo7aGREANwECXvQ5S7QLIKoEIX9E.jpg" alt="MBanking logo">
                    <p>MBanking</p>
                    <div class="saldo">
                        <div>Saldo Anda</div>
                        <h5>Rp. 100.000</h5>
                    </div>
                    <input type="radio" name="payment" id="mbanking-option">
                    <div id="bank-options" class="hidden">
                        <p>Pilih Bank:</p>
                        <select name="banks" id="bank-list">
                            <option value="bca">BCA</option>
                            <option value="bni">BNI</option>
                            <option value="bri">BRI</option>
                            <option value="mandiri">Mandiri</option>
                        </select>
                    </div>
                </div>

                <div class="method GoPay">
                    <img src="https://storage.googleapis.com/a1aa/image/u2uqkKY9gUIwGhjrghkqjo7aGREANwECXvQ5S7QLIKoEIX9E.jpg" alt="Gopay logo">
                    <p>GoPay</p>
                    <div class="saldo">
                        <div>Saldo Anda</div>
                        <h5>Rp. 100.000</h5>
                    </div>
                    <input type="radio" name="payment" id="gopay-option">
                    <div id="gopay-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="gopay-number">
                        <input type="password" placeholder="Kode Kunci" id="gopay-key">
                    </div>
                </div>

                <div class="method DANA">
                    <img src="https://storage.googleapis.com/a1aa/image/kXaN1yWyA4qbH1h7Vu6FwkZsHesFpQVDMNoEB9rKp9WUBy6JA.jpg" alt="Dana logo">
                    <p>DANA</p>
                    <div class="saldo">
                        <div>Saldo Anda</div>
                        <h5>Rp. 240.000</h5>
                    </div>
                    <input type="radio" name="payment" id="dana-option">
                    <div id="dana-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="dana-number">
                        <input type="password" placeholder="Kode Kunci" id="dana-key">
                    </div>
                </div>

                <div class="method OVO">
                    <img src="https://storage.googleapis.com/a1aa/image/6nsGnS0f653gKarP5y0enbTUOuAAQ1gzxP8r8kimitomCk1TA.jpg" alt="Ovo logo">
                    <p>OVO</p>
                    <div class="saldo">
                        <div>Saldo Anda</div>
                        <h5>Rp. 53.000</h5>
                    </div>
                    <input type="radio" name="payment" id="ovo-option">
                    <div id="ovo-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="ovo-number">
                        <input type="password" placeholder="Kode Kunci" id="ovo-key">
                    </div>
                </div>
                <div class="bayar-cancel">

                    <form method="post" action="../pilih-dokter/pilihdokter.php">
                        <button type="submit" class="cancel-btn">
    
                            <div class="a-btn">
                                <p>Kembali</p>
                            </div>
    
                        </button>
                    </form>
                    <form method="post" action="./notif_bayar_dokter_berhasil.php">
                        <button type="submit" class="pay-btn">
    
                            <div class="a-btn">
                                <p>Bayar</p>
                            </div>
    
                        </button>
                    </form>
                </div>
                    
            </section>
        </div>
    </main>

    <!-- footer  -->



    <script>
        function togglePaymentForm(paymentMethod) {
            const forms = document.querySelectorAll('.method div[id$="-form"], .method div[id="bank-options"]');
            forms.forEach((form) => form.classList.add('hidden'));

            if (paymentMethod === "mbanking") {
                const selectedForm = document.getElementById('bank-options');
                if (selectedForm) {
                    selectedForm.classList.remove('hidden');
                }
            } else if (paymentMethod === "gopay") {
                const selectedForm = document.getElementById('gopay-form');
                if (selectedForm) {
                    selectedForm.classList.remove('hidden');
                }
            } else if (paymentMethod === "dana") {
                const selectedForm = document.getElementById('dana-form');
                if (selectedForm) {
                    selectedForm.classList.remove('hidden');
                }
            } else if (paymentMethod === "ovo") {
                const selectedForm = document.getElementById('ovo-form');
                if (selectedForm) {
                    selectedForm.classList.remove('hidden');
                }
            }
        }

        document.querySelectorAll('input[name="payment"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                togglePaymentForm(this.id.replace('-option', ''));
            });
        });
    </script>

    <?php include "../footer.php" ?>
</body>

</html>