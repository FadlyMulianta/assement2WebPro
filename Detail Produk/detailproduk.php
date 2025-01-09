<?php
include '../asset/dbskin.php';

$sqlStatement = "SELECT * FROM produk  ";
$code = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($code, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
  $id_produk = intval($_GET['id']);

  // Query untuk mendapatkan detail produk
  $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
  $result = mysqli_query($conn, $query);

  // Periksa apakah produk ditemukan
  if ($result && mysqli_num_rows($result) > 0) {
    $produk = mysqli_fetch_assoc($result);
  } else {
    die("Produk tidak ditemukan.");
  }
} else {
  die("ID produk tidak disediakan.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skincare Store</title>
  <!-- <link rel="stylesheet" href="detailproduk.css" /> -->
  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      

      
        background-color: #f1f1f6;
      
    }

    main {
      margin-left: 5rem;
      margin-right: 5rem;
    }





    .main-content {
      text-align: center;
      padding: 40px 20px 0;
      background-color: #fff;
    }

    .main-content img {
      width: 20%;
      height: 20%;
    }

    .main-content h1 {
      font-size: 26px;
      color: #1a1a1a;
      margin: 20px 0 10px;
    }

    .main-content h2 {
      font-size: 22px;
      color: #1a1a1a;
      margin: 0 0 20px;
    }

    .main-content p {
      font-size: 14px;
      color: #666;
      margin: 0 20% 20px;
      text-align: center;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 50px;

      /* padding: 0 0 50px; */
    }

    .product-card {
      background-color: #dbe2ef;
      text-align: left;
      border-radius: 0 0 15px 15px;
    }

    .product-card img {
      width: 100%;
      height: auto;
    }

    .product-card h3 {
      color: #112d4e;
      font-size: 14px;
      font-weight: normal;
      margin: 5px 0 15px 0;
    }

    .product-card p {
      color: #112d4e;
      font-weight: bold;
      margin: 5px 0;
      font-size: 20px;
    }

    .product-card ul {
      padding: 0 0 0 16px;
    }

    .product-card ul li {
      margin: 5px 0;
    }

    .product-card ul li::marker {
      font-weight: bold;
    }

    .product-card h3,
    .product-card p,
    .product-card ul li {
      margin-left: 10px;
    }

    .product-card a {
      text-decoration: none;
      color: #112D4E;
    }

    .buttons {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 4rem;
      margin-bottom: 5rem;
    }

    .buttons button {
      border: none;
      width: 100%;
      padding: 10px 50px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .buttons .add-to-cart {
      border-radius: 15px 0 0 15px;
      background-color: #fff;
      color: #1a1a1a;
      border: 2px solid #1c3f60;
    }

    .buttons .buy-now {
      padding: 10px 80px;
      border-radius: 0 15px 15px 0;
      background-color: #1c3f60;
      color: #fff;
      border: 2px solid #1c3f60;
    }

    .buttons .add-to-cart:hover {
      background-color: #1c3f60;
      color: #fff;
    }

    .buttons .buy-now:hover {
      opacity: 0.8;
    }

    /* PopUp */
    .popup {
      display: none;
      position: fixed;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
      border-radius: 15px;
      z-index: 1000;
      top: 50px;
      /* Adjust this value to position the popup */
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
  </style>
</head>

<body>

  <?php include '../header.php'; ?>

  <main>
    <div class="main-content">
      <img src="../gambar/<?= $produk['gambar_produk']; ?>" alt="<?= $produk['nama_produk']; ?>" alt="Product Image" />
      <h1><?= $produk['nama_produk']; ?></h1>
      <h2>Rp <?= number_format($produk['harga'], 2, ',', '.'); ?></h2>
      <hr />
      <p>
        <?= $produk['deskripsi_produk']; ?>
      </p>
      <hr />
    </div>
    <br />
    <div class="product-grid">
      <?php
      shuffle($data); // Acak urutan data
      $counter = 0; // Inisialisasi penghitung produk
      foreach ($data as $key => $barang) {
        if ($counter >= 6) break; // Hentikan setelah 5 produk
        $counter++;
      ?>
        <div class="product-card">
          <a href="../Detail Produk/detailproduk.php?id=<?= $barang['id_produk'] ?>">
            <img src="../gambar/<?= $barang['gambar_produk'] ?>" alt="gambar produk" />
            <h3><?= $barang['nama_produk'] ?></h3>
            <p>Rp <?= number_format($barang['harga'], 2, ',', '.'); ?></p>
            <ul>
              <li>Lorem ipsum</li>
              <li>Lorem ipsum</li>
            </ul>
          </a>
        </div>
      <?php } ?>
    </div>

    <div class="buttons">
      <div>

        <form method="POST" action="../keranjang/autentikasi_keranjang.php">
          <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
          <button class="add-to-cart" type="submit" name="submit-keranjang">Tambahkan Keranjang</button>
        </form>
      </div>
      <div>

        <button class="buy-now">Beli Sekarang</button>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const userIcon = document.querySelector('a[href=""] > img[src="../assets/user.png"]');
      const popup = document.getElementById("userPopup");

      userIcon.parentElement.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default anchor click behavior
        event.stopPropagation(); // Stop click event from propagating to document

        const rect = userIcon.getBoundingClientRect();
        let topPosition = rect.bottom;
        let leftPosition = rect.left + (rect.width / 2) - (popup.offsetWidth / 2);

        // Check if popup is going out of the viewport and adjust
        if (leftPosition < 0) {
          leftPosition = 10; // padding from the left edge
        }
        if (leftPosition + popup.offsetWidth > window.innerWidth) {
          leftPosition = window.innerWidth - popup.offsetWidth - 10; // padding from the right edge
        }

        popup.style.top = topPosition + "px";
        popup.style.left = leftPosition + "px";
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
  <?php include '../footer.php'; ?>

</body>

</html>