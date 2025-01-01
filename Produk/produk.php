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

        

        

        .banner img {
          width: 100%;
          height: auto;
        }


        .gambar-iklan {
          display: flex;
          overflow: hidden;
          width: 100%;
          background-color: #f4f4f4; /* Warna latar belakang opsional */
          position: relative;
          height: 300px; /* Sesuaikan dengan kebutuhan */
        }

        .scroll {
          display: flex;
          animation: scroll 18s linear infinite;
          will-change: transform;
        }

        .scrolbanner {
          flex-shrink: 0;
          width: 100%; /* Pastikan setiap banner memenuhi lebar container */
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


        .product-grid {
          display: grid;
          grid-template-columns: repeat(6, 1fr);
          gap: 50px;
          padding: 50px 0;
          margin-bottom: 5rem;
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
          color: #112D4E;
          font-size: 14px;
          font-weight: normal;
          margin: 5px 0 15px 0;
        }

        .product-card p {
          color: #112D4E;
          font-weight: bold;
          margin: 5px 0;
          font-size: 20px;
        }

        .product-card ul {
          padding: 0 0 0 16px;
        }

        .product-card ul li {
          margin: 5px 0;
          color: #112D4E;
        }

        .product-card a {
          text-decoration: none;
        }
        .product-card ul li::marker {
          font-weight: bold;  
        }
        .product-card h3, .product-card p, .product-card ul li {
          margin-left: 10px;
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
          top: 50px; /* Adjust this value to position the popup */
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
    <div class="gambar-iklan">
      <div class="scroll">
          <?php foreach ($rbanner as $gambar): ?>
              <div class="scrolbanner">
                  <img src="banner/<?= $gambar['gambar_banner'] ?>" alt="Banner">
              </div>
          <?php endforeach; ?>
      </div>
    </div>

        
      <div class="product-grid">
        <?php foreach ($data as $key => $produk) { ?>
        <div class="product-card">
          <a href="../Detail Produk/detailproduk.php?id=<?= $produk['id_produk'] ?>">
            <img src="../gambar/<?= $produk['gambar_produk'] ?>" alt="gambar produk"/>
            <h3><?= $produk['nama_produk'] ?></h3>
            <p>Rp <?php echo number_format($produk['harga'], 2, ',', '.'); ?></p>
            <ul>
              <li>Lorem ipsum</li>
              <li>Lorem ipsum</li>
            </ul>
          </a>
        </div>
        <?php } ?>
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
    
    <?php include '../footer.php'; ?>
    
    
  </body>
</html>
