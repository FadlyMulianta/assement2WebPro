<?php
session_start();
include '../asset/dbskin.php';



$sqlStatement = "SELECT * FROM produk  ";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

$banner = "SELECT * FROM banner_iklan";
$qbanner = mysqli_query($conn, $banner);
$rbanner = mysqli_fetch_all($qbanner, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skincare Store</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
    }

    main {
      padding: 0 5rem;
    }

    body {
      background-color: #f1f1f6;
    }





    .banner img {
      width: 100%;
      height: auto;
    }


    .gambar-iklan {
      margin-top: 20px;
      display: flex;
      overflow: hidden;
      width: 100%;
      background-color: #f4f4f4;
      /* Warna latar belakang opsional */
      position: relative;
      height: 300px;
      /* Sesuaikan dengan kebutuhan */
      border-radius: 10px;
    }

    .scroll {
      display: flex;
      animation: scroll 18s linear infinite;
      will-change: transform;
    }

    .scrolbanner {
      flex-shrink: 0;
      width: 100%;
      /* Pastikan setiap banner memenuhi lebar container */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .scrolbanner img {
      width: 90%;
      height: auto;
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-150%);
      }
    }


    .produk {
        margin-left: 2;
        margin-top: 1rem;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        gap: 1.5rem;
    }

    .produk-grid {
        /* margin-top: 5rem; */
        /* padding: 1rem; */
        background-color: var(--back-color);
        display: grid;
        grid-template-rows: 1fr 1fr;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .produk-grid:hover {
        transform: translateY(-20px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);

    }

    .produk-gambar {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .produk-gambar img {
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .produk-detail {

        background-color: var(--back-color);
        /* padding-top: 3rem; */
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        /* margin-left: 3.1rem;
  margin-right: 3.1rem; */
        /* padding-bottom: rem; */
        /* text-align: center; */
    }

    .produk-detail-container {
        margin-left: 10px;
        margin-top: 10px;


    }

    .produk-nama-container {
        margin-bottom: 5px;
    }

    .produk-nama {
        text-transform: uppercase;
        color: var(--primary-color);
        font-size: 15px;
        font-weight: 600;
    }

    .toko {
        gap: 5px;
        display: flex;
        margin-top: 5px;
        /* margin-bottom: 3rem; */
    }

    .toko :where(img) {
        width: 10%;
    }

    .like {
        margin-left: 3px;
        width: 8%;
    }

    .lokasi {
        width: 10%;
    }

    .toko p {

        font-weight: 400;
        font-size: 14px;
    }

    .tombol-beli {
        margin-top: 15px;
        /* margin-left: 5rem;
        margin-right: 5rem; */
        border-radius: 5px;
        font-size: 1rem;
        /* margin-top: 2rem; */
        text-align: center;
    }

    .tombol-keranjang {
        border-radius: 5px;
        background-color: var(--primary-color);
        color: white;

        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-right: 2.6rem;
        padding-left: 2.6rem;
        font-weight: 500;
        font-size: 1rem;

    }
    button {
            border: none;
            cursor: pointer;
            background: none;
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

    .button-container {
      margin: 10px 10px 10px 0px;
            display: flex;
            gap: 10px;
        }
    .button {
        padding: 12px;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 10px;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }
    .orange {
        background-color: #f9a825;
    }
    .green {
        background-color: #43a047;
    }
    .magenta {
        background-color: #d81b60;
    }
    .teal {
        background-color: #00838f;
    }
    /* Hover effects */
    .button:hover {
        background-color: #555;
    }
    .orange:hover {
        background-color: #ff9800;
    }
    .green:hover {
        background-color: #66bb6a;
    }
    .magenta:hover {
        background-color: #ec407a;
    }
    .teal:hover {
        background-color: #00acc1;
    }
  </style>
</head>

<body>
  <?php include '../header.php'; ?>

  <main>
    <div class="gambar-iklan">
      <div class="scroll">
        <?php foreach ($rbanner as $gambar): ?>
          <div class="scrolbanner">
            <img src="banner/<?= $gambar['gambar_banner'] ?>" alt="Banner">
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="button-container">
        <div class="button orange">Headlamp & Senter Camping</div>
        <div class="button green">Botol Minum</div>
        <div class="button magenta">Gulungan Pancing</div>
        <div class="button teal">Mirip yang kamu cek</div>
    </div>


    <div class="produk">
      <?php foreach ($data as $key => $produk) { ?>
        <div class="produk-grid">
          <div class="produk-gambar">
            <a href="../Detail Produk/detailproduk.php?id=<?= $produk['id_produk'] ?>">
              <img src="../gambar/<?= $produk['gambar_produk'] ?>" alt="gambar produk">
            </a>
          </div>
          <div class="produk-detail">
            <div class="produk-detail-container">
              <div class="produk-nama-container">
                <p class="produk-nama"><?= $produk['nama_produk'] ?></p>
                <h3>Rp <?= number_format($produk['harga'], 2, ',', '.'); ?></h3>
              </div>
              <div class="toko">
                <img src="../ikon/store.png" alt="">
                <p><?= $produk['nama_toko'] ?></p>
              </div>
              <div class="toko">
                <img class="lokasi" src="../ikon/location.png" width="8%" alt="">
                <p>Bandung</p>
              </div>
              <div class="toko">
                <img class="like" src="../ikon/like.png" width="8%" alt="">
                <p>87% | 67rb+ Beli</p>
              </div>
            </div>
            <div class="tombol-beli">
              <form method="POST" action="authproduk.php">
                <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                <button class="tombol-keranjang" type="submit" name="submit-keranjang">
                  <p>+ Keranjang</p>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
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