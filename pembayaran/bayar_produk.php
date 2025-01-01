<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Mengatur layout flex untuk elemen main */
        main {
            display: flex;
            justify-content: space-between; /* Menyebar kolom ke kiri dan kanan */
            gap: 10px; /* Mengatur jarak antara kolom */
            padding: 20px;
        }

        /* Mengatur tampilan kolom kiri */
        .left-column {
            width: 75%; /* Lebar kolom kiri */
            padding: 10px;
            border: 2px solid black; /* Garis pembatas */
        }

        .alamat {
            padding: 10px;
            border: 1px solid black;
        }

        /* Form untuk input alamat */
        .form-alamat {
            padding: 10px;
            border: 1px solid black;
            display: flex;
            flex-direction: column; /* Mengatur input secara vertikal */
            gap: 10px; /* Jarak antar input */
        }

        .form-alamat input, .form-alamat textarea, .form-alamat select {
            padding: 8px;
            font-size: 14px;
            width: 100%; /* Mengatur lebar input penuh */
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-alamat label {
            font-weight: bold;
        }

        /* Mengatur tampilan kolom kanan *//* Mengatur tampilan kolom kanan */
        .right-column {
            width: 25%; /* Lebar kolom kanan */
            padding: 10px;
            border: 2px solid black; /* Garis pembatas */
        }

        /* Mengatur layout produk agar gambar dan teks berada di samping */
        .produk {
            gap: 15px; /* Memberikan jarak antar elemen */
            border: 1px solid black;
        }

        .gambar-produk {
            display: flex; /* Menyusun elemen gambar dan nama produk secara horizontal */
            align-items: center; /* Menyusun elemen vertikal di tengah */
            gap: 10px; /* Memberikan jarak antar elemen */
            padding: 10px;
        }

        .produk h4 {
            margin: 0; /* Menghilangkan margin default */;
            border: 1px solid black;
        }

        .detail-produk h4 {
            border: 1px solid black;
        }

        .nama-produk {
            display: flex; /* Menyusun elemen nama produk dan harga secara horizontal */
            flex-direction: column; /* Menempatkan nama produk dan harga secara vertikal */
            gap: 5px; /* Menambahkan jarak antar teks */
        }

        .nama-produk p {
            margin: 0; /* Menghilangkan margin default */
        }

        /* Menambahkan jumlah produk di sebelah kanan nama produk dan harga */
        .jumlah-produk {
            font-weight: bold; /* Memberikan penekanan pada jumlah produk */
            margin-left: 10px; /* Memberikan jarak antara jumlah dan harga */
        }

        .produk img {
            width: 100px; /* Atur ukuran gambar */
            height: auto;
        }

        .metode-pembayaran {
            padding: 10px;
            border: 1px solid black;
            margin-top: 10px;
            background-color:rgb(255, 255, 255); /* Memberikan warna latar belakang untuk area pembayaran */
        }

        .payment-methods {
            padding: 10px;
            border: 1px solid black;
        }

        .method {
            display: flex;
            align-items: center;
            gap: 15px; /* Menambah jarak antara gambar dan teks */
            margin-bottom: 15px; /* Menambah jarak antar metode pembayaran */
        }

        .method img {
            width: 50px; /* Ukuran gambar lebih kecil dan konsisten */
            height: auto;
        }

        .method p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .saldo {
            font-size: 14px;
            color: #555;
        }

        .saldo h5 {
            font-weight: bold;
            color: #333;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .hidden {
            display: none;
        }

        #bank-options, #gopay-form, #dana-form, #ovo-form {
            margin-top: 10px;
        }


        .bayar {
            /* border: 1px solid black; */
            display: flex;
            justify-content: center; /* Menempatkan tombol di tengah secara horizontal */
            align-items: center; /* Menjaga tombol di tengah secara vertikal */
            height: 100px; /* Memberikan ketinggian untuk memastikan posisi vertikal */
        }

        .pay-btn {
            padding: 10px 20px;
            background-color: #1C3F60;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .pay-btn a {
            color: white;
        }

        .pay-btn:hover {
            background-color: #6a9ded;
            color: white;
        }

        .a-btn {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include '../header.php'; ?>

    <main>
        <!-- Kolom Kiri untuk Alamat Produk dan Formulir Alamat -->
        <div class="left-column">
            <div class="alamat">
                <h3>Alamat Pengiriman</h3>
            </div>
            <!-- Formulir untuk input alamat -->
            <div class="form-alamat">
                <label for="nama-penerima">Nama Penerima</label>
                <input type="text" id="nama-penerima" name="nama-penerima" placeholder="Masukkan nama penerima" required>

                <label for="provinsi">Provinsi</label>
                <select id="provinsi" name="provinsi" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Papua">Papua</option>
                    <!-- Tambahkan lebih banyak provinsi sesuai kebutuhan -->
                </select>

                <label for="kota">Kota</label>
                <select id="kota" name="kota" required>
                    <option value="">Pilih Kota</option>
                </select>

                <label for="kode-pos">Kode Pos</label>
                <input type="text" id="kode-pos" name="kode-pos" placeholder="Masukkan kode pos" required>

                <label for="alamat-lengkap">Alamat Lengkap</label>
                <textarea id="alamat-lengkap" name="alamat-lengkap" rows="4" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>

            <div class="metode-pembayaran">
                <h3>Metode Pembayaran</h3>
            </div>

            <div class="payment-methods">
                <!-- Transfer Bank -->
                <div class="method MBanking">
                    <img src="https://storage.googleapis.com/a1aa/image/u2uqkKY9gUIwGhjrghkqjo7aGREANwECXvQ5S7QLIKoEIX9E.jpg" alt="MBanking logo">
                    <div>
                        <p>MBanking</p>
                        <div class="saldo">
                            <div>Saldo Anda</div>
                            <h5>Rp. ***</h5>
                        </div>
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
                
                <!-- GoPay -->
                <div class="method GoPay">
                    <img src="https://storage.googleapis.com/a1aa/image/u2uqkKY9gUIwGhjrghkqjo7aGREANwECXvQ5S7QLIKoEIX9E.jpg" alt="Gopay logo">
                    <div>
                        <p>GoPay</p>
                        <div class="saldo">
                            <div>Saldo Anda</div>
                            <h5>Rp. ***</h5>
                        </div>
                    </div>
                    <input type="radio" name="payment" id="gopay-option">
                    <div id="gopay-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="gopay-number">
                        <input type="password" placeholder="Kode Kunci" id="gopay-key">
                    </div>
                </div>
                
                <!-- DANA -->
                <div class="method DANA">
                    <img src="https://storage.googleapis.com/a1aa/image/kXaN1yWyA4qbH1h7Vu6FwkZsHesFpQVDMNoEB9rKp9WUBy6JA.jpg" alt="Dana logo">
                    <div>
                        <p>DANA</p>
                        <div class="saldo">
                            <div>Saldo Anda</div>
                            <h5>Rp. ***</h5>
                        </div>
                    </div>
                    <input type="radio" name="payment" id="dana-option">
                    <div id="dana-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="dana-number">
                        <input type="password" placeholder="Kode Kunci" id="dana-key">
                    </div>
                </div>
                
                <!-- OVO -->
                <div class="method OVO">
                    <img src="https://storage.googleapis.com/a1aa/image/6nsGnS0f653gKarP5y0enbTUOuAAQ1gzxP8r8kimitomCk1TA.jpg" alt="Ovo logo">
                    <div>
                        <p>OVO</p>
                        <div class="saldo">
                            <div>Saldo Anda</div>
                            <h5>Rp. ***</h5>
                        </div>
                    </div>
                    <input type="radio" name="payment" id="ovo-option">
                    <div id="ovo-form" class="hidden">
                        <p>Masukkan Nomor dan Kode Kunci</p>
                        <input type="text" placeholder="Nomor" id="ovo-number">
                        <input type="password" placeholder="Kode Kunci" id="ovo-key">
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan untuk Detail Produk -->
        <div class="right-column">
            <div class="detail-produk">
                <h3>Detail Produk</h3>
                <div class="produk">
                    <h4>NAMA TOKO</h4>
                    <div class="gambar-produk">
                        <img src="../gambar/fotor-ai-2024112820111.jpg" alt="gambar produk">
                        <div class="nama-produk">
                            <p>NAMA PRODUK</p>
                            <p>HARGA</p>
                        </div>
                        <!-- Menambahkan jumlah produk di sini -->
                        <span class="jumlah-produk">x1</span>
                    </div>
                </div>

                <h4>TOTAL: Total Harga</h4>
            </div>
        </div>
    </main>
    
    <div class="bayar">
        <button class="pay-btn">
            <a class="a-btn" href="./notif_bayar_produk_berhasil.php">Bayar</a>
        </button>
    </div>

    <script>
        // Data kota berdasarkan provinsi
        const kotaOptions = {
            "DKI Jakarta": ["Jakarta Selatan", "Jakarta Barat", "Jakarta Timur", "Jakarta Utara"],
            "Jawa Barat": ["Bandung", "Bogor", "Depok", "Bekasi"],
            "Jawa Tengah": ["Semarang", "Solo", "Yogyakarta", "Salatiga"],
            "Jawa Timur": ["Surabaya", "Malang", "Madiun", "Jember"],
            "Bali": ["Denpasar", "Badung", "Gianyar", "Buleleng"],
            "Sumatera Utara": ["Medan", "Pematangsiantar", "Binjai", "Sibolga"],
            "Kalimantan Selatan": ["Banjarmasin", "Banjarbaru", "Martapura", "Pelaihari"],
            "Sulawesi Selatan": ["Makassar", "Palopo", "Parepare", "Gowa"],
            "Papua": ["Jayapura", "Merauke", "Timika", "Sorong"]
        };

        // Fungsi untuk memperbarui dropdown kota berdasarkan provinsi yang dipilih
        document.getElementById("provinsi").addEventListener("change", function() {
            const provinsi = this.value;
            const kotaSelect = document.getElementById("kota");
            kotaSelect.innerHTML = "<option value=''>Pilih Kota</option>"; // Reset opsi kota

            if (provinsi && kotaOptions[provinsi]) {
                const cities = kotaOptions[provinsi];
                cities.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    kotaSelect.appendChild(option);
                });
            }
        });

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
