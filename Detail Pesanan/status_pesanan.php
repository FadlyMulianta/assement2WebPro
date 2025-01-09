<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <style>
        /* Gaya untuk menu utama */
        .main-menu {
            padding: 10px;
            background-color: #f0f0f0;
            box-shadow: inset 0 0 0 5px #fff;
        }

        .main-menu ul {
            list-style-type: none;
            display: flex;
            gap: 15px;
            padding: 0;
            margin: 0;
            justify-content: center;
        }

        .main-menu li {
            cursor: pointer;
            padding: 20px 50px 10px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .main-menu li:hover {
            transform: translateY(-5px);
        }

        .main-menu a {
            color: black;
            font-weight: bold;
        }

        .main-menu a:hover {
            color: #007BFF;
            text-decoration: none;
        }

        /* Gaya untuk daftar pesanan */
        .order-container {
            margin: 20px auto;
            max-width: 95%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .order-item {
            display: flex;
            gap: 20px;
            align-items: center;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            min-height: 150px; /* Tinggi minimum untuk setiap item */
            box-sizing: border-box;
        }

        .order-item img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
        }

        .order-details {
            font-size: 16px;
            flex: 1;
            padding-right: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Jaga agar elemen tertata dengan rapi */
        }

        .order-details a {
            text-decoration: none;
            color: rgb(134, 134, 134);
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .order-details a:hover {
            color: #007BFF;
            transform: translateY(-3px);
        }

        .order-status {
            font-size: 16px;
            font-weight: bold;
        }

        .status-diproses {
            color: gold;
        }

        .status-dikirim {
            color: blue;
        }

        .status-selesai {
            color: green;
        }

        .status-dibatalkan {
            padding-left: 20px;
            color: red;
        }

        /* Gaya untuk modal */
        .modal {
            display: none; /* Tersembunyi secara default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
        }

        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .modal-close {
            float: right;
            cursor: pointer;
            font-size: 18px;
            color: red;
        }

        .modal-close:hover {
            color: darkred;
        }

        /* Gaya untuk tombol scroll ke atas */
        .scroll-top-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .scroll-top-btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="main-menu">
        <ul>
            <li><a href="../Detail Pesanan/riwayat_pesanan.php">Riwayat Pesanan</a></li>
            <li><a href="#home">Status Pesanan</a></li>
            <li><a href="../Detail Pesanan/pesanan_selesai.php">Pesanan Selesai</a></li>
            <li><a href="../Detail Pesanan/pesanan_batal.php">Dibatalkan</a></li>
        </ul>
    </div>

    <!-- Daftar Pesanan -->
    <div class="order-container">
        <h2>Daftar Pesanan</h2>
        <div class="order-item">
            <img src="../gambar/1735718697_produk2.jpg" alt="gambar">
            <div class="order-details">
                <p><strong>Nama Produk:</strong> Skincare A</p>
                <p><strong>Harga:</strong> Rp 1.000.000</p>
                <p><strong>Deskripsi:</strong> 500 ml</p>
                <p><strong>Tanggal Pesanan:</strong> 5 Januari 2025</p>
                <a href="#" class="detail-link" data-id="1">Detail produk ></a>
            </div>
            <div class="order-status status-diproses">Proses</div>
        </div>
        <div class="order-item">
            <img src="../gambar/1735718697_produk2.jpg" alt="gambar">
            <div class="order-details">
                <p><strong>Nama Produk:</strong> Skincare A</p>
                <p><strong>Harga:</strong> Rp 1.000.000</p>
                <p><strong>Deskripsi:</strong> 500 ml</p>
                <p><strong>Tanggal Pesanan:</strong> 5 Januari 2025</p>
                <a href="#" class="detail-link" data-id="1">Detail produk ></a>
            </div>
            <div class="order-status status-dikirim">Dikirim</div>
        </div>
        <div class="order-item">
            <img src="../gambar/1735718697_produk2.jpg" alt="gambar">
            <div class="order-details">
                <p><strong>Nama Produk:</strong> Skincare A</p>
                <p><strong>Harga:</strong> Rp 1.000.000</p>
                <p><strong>Deskripsi:</strong> 500 ml</p>
                <p><strong>Tanggal Pesanan:</strong> 5 Januari 2025</p>
                <a href="#" class="detail-link" data-id="1">Detail produk ></a>
            </div>
            <div class="order-status status-diproses">Proses</div>
        </div>
        <div class="order-item">
            <img src="../gambar/1735718697_produk2.jpg" alt="gambar">
            <div class="order-details">
                <p><strong>Nama Produk:</strong> Skincare A</p>
                <p><strong>Harga:</strong> Rp 1.000.000</p>
                <p><strong>Deskripsi:</strong> 500 ml</p>
                <p><strong>Tanggal Pesanan:</strong> 5 Januari 2025</p>
                <a href="#" class="detail-link" data-id="1">Detail produk ></a>
            </div>
            <div class="order-status status-dikirim">Dikirim</div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="product-detail-modal">
        <div class="modal-content">
            <span class="modal-close" id="close-modal">&times;</span>
            <div class="modal-header">Detail Produk</div>
            <div class="modal-body" id="modal-body">
                <!-- Konten detail produk akan dimuat di sini -->
            </div>
        </div>
    </div>

    <?php include "../footer.php" ?>

    <!-- Tombol Scroll Ke Atas -->
    <button class="scroll-top-btn" id="scrollTopBtn">&#8593;</button>

    <script>
        // Data produk
        const productDetails = {
            1: {
                name: "Skincare A",
                price: "Rp 1.000.000",
                description: "500 ml",
                orderDate: "5 Januari 2025",
                additionalInfo: "Produk ini cocok untuk semua jenis kulit."
            }
        };

        // Element DOM
        const detailLinks = document.querySelectorAll('.detail-link');
        const modal = document.getElementById('product-detail-modal');
        const modalBody = document.getElementById('modal-body');
        const closeModal = document.getElementById('close-modal');
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        // Event Listener untuk detail produk
        detailLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const productId = link.getAttribute('data-id');
                const product = productDetails[productId];
                if (product) {
                    modalBody.innerHTML = `
                        <p><strong>Nama Produk:</strong> ${product.name}</p>
                        <p><strong>Harga:</strong> ${product.price}</p>
                        <p><strong>Deskripsi:</strong> ${product.description}</p>
                        <p><strong>Tanggal Pesanan:</strong> ${product.orderDate}</p>
                        <p><strong>Informasi Tambahan:</strong> ${product.additionalInfo}</p>
                    `;
                    modal.style.display = 'flex';
                }
            });
        });

        // Event Listener untuk menutup modal
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Menutup modal ketika area luar diklik
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Scroll ke atas
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Menampilkan tombol scroll saat scroll ke bawah
        window.addEventListener('scroll', () => {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollTopBtn.style.display = 'block';
            } else {
                scrollTopBtn.style.display = 'none';
            }
        });
    </script>
</body>
</html>
