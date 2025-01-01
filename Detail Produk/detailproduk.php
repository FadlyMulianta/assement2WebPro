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
    <link rel="stylesheet" href="detailproduk.css" />
  </head>
  <body>
    
    <?php include '../header.php'; ?>  

    <main>
      <div class="main-content">
        <img src="../gambar/<?= $produk['gambar_produk']; ?>" alt="<?= $produk['nama_produk']; ?>" alt="Product Image"  />
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
        <form method="POST" action="../keranjang/autentikasi_keranjang.php">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
            <button class="add-to-cart" type="submit" name="submit-keranjang">Tambahkan Keranjang</button>
        </form>
        <button class="buy-now">Beli Sekarang</button>
      </div>
    </main>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const userIcon = document.querySelector('a[href=""] > img[src="../assets/user.png"]');
        const popup = document.getElementById("userPopup");
        
        userIcon.parentElement.addEventListener("click", function (event) {
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
        
        document.addEventListener("click", function (event) {
          if (!userIcon.contains(event.target) && !popup.contains(event.target)) {
            popup.style.display = "none";
          }
        });
        
        popup.addEventListener("click", function (event) {
          event.stopPropagation(); // Prevent click event from closing the popup
        });
      });
    </script>
    

  </body>
</html>
