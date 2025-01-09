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

// Query untuk mengambil data pengguna berdasarkan email
$query = "
    SELECT namadepan, namabelakang, email, nohp, gambar_user
    FROM user
    WHERE email = '$email'
";

$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// Ambil data pengguna
$user = mysqli_fetch_assoc($result);

$sqlStatement = "SELECT * FROM produk  ";
$test = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($test, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>General Setting</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;


      background-color: #f1f1f6;

    }

    header {
      background-color: white;
      color: white;
      padding: 25px 150px;
    }

    main {
      margin-top: 50px;
      padding: 0 5rem;
    }

    nav {
      display: flex;
      align-items: center;
    }

    .menu-icon img {
      width: 40px;
      cursor: pointer;
      margin-right: 25px;
    }

    .navbar h1 {
      color: black;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 200px;
      background-color: #fff;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 20px;
      margin: 0;
    }

    .sidebar ul li {
      margin-bottom: 20px;
      font-size: 16px;
      color: #333;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: inherit;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }

    .sidebar ul li a:hover {
      background-color: #f0f0f0;
    }

    .content {
      flex-grow: 1;
      background-color: white;
      margin-left: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .tab {
      width: 100%;
      height: 10px;
      background-color: #1e3a5f;
      border-radius: 5px 5px 0 0;
      margin-bottom: 20px;
    }

    /* Edit Profile */
    
    .container-profile {
      display: flex;
      align-items: flex-start;
      padding: 1% 0;
    }



    .profile-pic-container {
        display: inline-block;
        position: relative;
        width: 258px;
        height: 258px;
        padding: 16px;
        background-color: white;
        border-radius: 8px;
        box-shadow: rgba(141, 150, 170, 0.4) 0px 1px 4px;
        text-align: center; /* Center the reset password button */
 /* Ensure the image is cropped to fit the container */
    }

    .profile-pic {
        width: 100%;
        height: 100%;
        object-fit: cover; /* This will ensure the image covers the container while being cropped */
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        border-radius: 0; /* Make the image square */
    }

    .profile-pic-container:hover .profile-pic {
        opacity: 0.5;
        background-color: rgba(128, 128, 128, 0.5);
    }

    .edit-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .profile-pic-container:hover .edit-icon {
        opacity: 1;
    }

    .edit-icon i {
        font-size: 20px;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        margin-left: 5%;
    }

    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px; /* Reduce the space between form groups */
    }

    .form-group label {
        font-weight: bold;
        flex: 1;
/* Make the label take up 1 part of the available space */

    }

    #edit-profil-form {
      padding-top: 5%;
      width: 90%;
    }

    .form-group input {
      flex: 2;
        width: 100%; /* Make the input field take up 2 parts of the available space */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .btn-submit {
        background-color: #1a3b5d;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto; /* Center the submit button */
    }

    .btn-change-password {
        background-color: transparent;
        color: #1a3b5d;
        padding: 10px 20px;
        border: 2px solid #1a3b5d;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        margin-top: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto; /* Center the reset password button */
    }

    .btn-change-password:hover {
        background-color: #1a3b5d;
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }





    .checkbox-flex {

      border-bottom: 1px solid #ccc;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      justify-content: space-between;
    }

    .checkbox {
      width: 15px;
      /* Lebar checkbox */
      height: 15px;
    }

    .checkbox-flex :where(label) {
      font-size: 15px;
    }

    .tab-content {
      margin-left: 4rem;
      margin-right: 4rem;
    }

    .judulbesar {
      color: #1a3b5d;
      margin-top: 2rem;
    }

    .subjudul {
      margin-top: 2rem;
      margin-bottom: 0.5rem;
    }

    .btn-submit {
      background-color: #1a3b5d;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-bottom: 4rem;
      margin-top: 80px;
    }

    .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* Use auto-fill and minmax for responsive columns */
    gap: 10px; /* Reduce the gap between cards */
    padding: 20px 0; /* Reduce padding */
    margin-bottom: 2rem; /* Reduce bottom margin */
    }

    .product-card {
        background-color: #dbe2ef;
        text-align: left;
        border-radius: 0 0 15px 15px;
        padding: 10px; /* Add padding to the card */
        font-size: 12px; /* Reduce the font size */
    }

    .product-card img {
        width: 100%;
        height: auto;
    }

    .product-card h3 {
        color: #112D4E;
        font-size: 12px; /* Reduce font size */
        font-weight: normal;
        margin: 5px 0 10px 0; /* Adjust margins */
    }

    .product-card p {
        color: #112D4E;
        font-weight: bold;
        margin: 5px 0;
        font-size: 16px; /* Reduce font size */
    }

    .product-card ul {
        padding: 0 0 0 10px; /* Adjust padding */
    }

    .product-card ul li {
        margin: 5px 0;
        color: #112D4E;
        font-size: 12px; /* Reduce font size */
    }

    .product-card a {
        text-decoration: none;
    }

    .product-card ul li::marker {
        font-weight: bold;
    }

    .product-card h3,
    .product-card p,
    .product-card ul li {
        margin-left: 5px; /* Adjust left margin */
    }

  </style>
</head>

<body>
  <?php include '../header.php'; ?>
  <main>
    <div class="container">
      <div class="sidebar">
        <div class="tab"></div>
        <ul>
          <li><a href="#edit-profil" onclick="showContent('edit-profil')">Edit Profil</a></li>
          <li><a href="#bahasa" onclick="showContent('bahasa')">Bahasa</a></li>
          <li><a href="#wishlist" onclick="showContent('wishlist')">Wishlist</a></li>
          <li><a href="#notifikasi" onclick="showContent('notifikasi')">Notifikasi</a></li>
          <li><a href="#bantuan" onclick="showContent('bantuan')">Bantuan</a></li>
          <li><a href="#logout" onclick="showContent('logout')">Logout</a></li>
        </ul>
      </div>
      <div class="content">
        <div id="edit-profil" class="tab-content">
          <h2 style="color: #1a3b5d; margin-top: 2%;">Edit Profil</h2>
          <div class="container-profile">
            <form id="edit-profil-foto" action="proses_edit_foto.php" method="post" enctype="multipart/form-data">
                <div class="profile-pic-container">
                    <img id="profile-pic" alt="Foto profil" class="profile-pic" src="../gambar/<?php echo htmlspecialchars($user['gambar_user']); ?>" onclick="document.getElementById('gambar_user').click();" />
                    <div class="edit-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <input type="file" id="gambar_user" name="gambar_user" class="file-input" style="display: none;" onchange="submitForm();">
                    <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                  </div>
                  <button class="btn-change-password" id="openModalBtn">Ubah Kata Sandi</button>
            </form>

              <div class="profile-info">
                  <form id="edit-profil-form" action="proses_edit_profil.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="namadepan">Nama Depan</label>
                          <input type="text" id="namadepan" name="namadepan" value="<?php echo htmlspecialchars($user['namadepan']); ?>">
                      </div>
                      <div class="form-group">
                          <label for="namabelakang">Nama Belakang</label>
                          <input type="text" id="namabelakang" name="namabelakang" value="<?php echo htmlspecialchars($user['namabelakang']); ?>">
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                      </div>
                      <div class="form-group">
                          <label for="nohp">Nomor HP</label>
                          <input type="text" id="nohp" name="nohp" value="<?php echo htmlspecialchars($user['nohp']); ?>">
                      </div>
                      <button type="submit" class="btn-submit">Simpan Profil</button>
                  </form>
                  

                  <!-- The Modal -->
                  <div id="myModal" class="modal">
                      <div class="modal-content">
                          <span class="close">&times;</span>
                          <h2 style="color: #1a3b5d; margin-top: 20px;">Ubah Kata Sandi</h2>
                          <form action="proses_edit_katasandi.php" method="post">
                              <div class="form-group">
                                  <label for="katasandi_lama">Kata Sandi Lama:</label>
                                  <input type="password" id="katasandi_lama" name="katasandi_lama">
                              </div>
                              <div class="form-group">
                                  <label for="katasandi_baru">Kata Sandi Baru:</label>
                                  <input type="password" id="katasandi_baru" name="katasandi_baru">
                              </div>
                              <div class="form-group">
                                  <label for="konfirmasi_katasandi">Konfirmasi Kata Sandi Baru:</label>
                                  <input type="password" id="konfirmasi_katasandi" name="konfirmasi_katasandi">
                              </div>
                              <button type="submit" class="btn-submit">Ubah Kata Sandi</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>




        <div id="bahasa" class="tab-content">
          <h1 class="judulbesar">Bahasa</h1>
          <h3 class="subjudul">Pilih Bahasa </h3>

          <div class="checkbox-flex">
            <label for="emailNotif">Bahasa Indonesia</label><br><br>
            <input type="radio" id="emailNotif" name="emailNotif" class="checkbox" checked>

          </div>
          <div class="checkbox-flex">
            <label for="emailNotif">Bahasa Inggris</label><br><br>
            <input type="radio" id="emailNotif" name="emailNotif" class="checkbox" >

          </div>
          <div class="checkbox-flex">
            <label for="emailNotif">Bahasa Mandarin</label><br><br>
            <input type="radio" id="emailNotif" name="emailNotif" class="checkbox" >

          </div>
          <div class="checkbox-flex">
            <label for="emailNotif">Bahasa Korea</label><br><br>
            <input type="radio" id="emailNotif" name="emailNotif" class="checkbox" >

          </div>
        </div>
        <div id="wishlist" class="tab-content">
          <h1 class="judulbesar">Wishlist</h1>
          <div class="product-grid">
            <?php foreach ($data as $key => $produk) { ?>
              <div class="product-card">
                <a href="../Detail Produk/detailproduk.php?id=<?= $produk['id_produk'] ?>">
                  <img src="../gambar/<?= $produk['gambar_produk'] ?>" alt="gambar produk" />
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
        </div>

        <div id="notifikasi" class="tab-content">
          <h1 class="judulbesar">Notifikasi</h1>
          <h3 class="subjudul">Pengaturan Notifikasi Pembelian Produk</h3>
          <form>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Pesanan Diproses</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Pesanan Dikirim</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Pesanan Selesai</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Dari Kurir</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <h3 class="subjudul">Pengaturan Notifikasi Dokter</h3>

            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Konsultasi Diterima</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Konsultasi Selesai</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Pesan Dari Dokter</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Produk Rekomedasi dari Dokter</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>
            <h3 class="subjudul">Pengaturan Notifikasi Promo</h3>

            <div class="checkbox-flex">
              <label for="emailNotif">Notifikasi Promo Terbaru</label><br><br>
              <input type="checkbox" id="emailNotif" name="emailNotif" class="checkbox" checked>

            </div>

            <button type="submit" class="btn-submit">Simpan Pengaturan</button>
          </form>
        </div>
        <div id="bantuan" class="tab-content">
          <h1 class="judulbesar">Bantuan</h1>
          <h3 class="subjudul">Bagaimana kami bisa membantu Anda?</h3>
          <a href=""></a>
          <!-- Tambahkan konten bantuan di sini -->
        </div>
        <div id="logout" class="tab-content">
          <h2>Logout</h2>
          <form method="POST" action="../regis-login/logout.php">
            <button class="logout-button" type="submit" onclick="logout()">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    function showContent(tabId) {
      var tabs = document.querySelectorAll('.tab-content');
      tabs.forEach(function(tab) {
        tab.style.display = 'none';
      });

      document.getElementById(tabId).style.display = 'block';
    }

    // Tampilkan konten pertama secara default
    showContent('edit-profil');

    function logout() {
      // Tambahkan logika logout di sini
      alert("Anda telah logout");
    }

    function previewImage(event) {
      const input = event.target;
      const reader = new FileReader();

      reader.onload = function() {
        const dataURL = reader.result;
        const output = document.getElementById('profile-pic');
        output.src = dataURL;
      };

      reader.readAsDataURL(input.files[0]);
    }

    // POPUP Reset Password
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function submitForm() {
        document.getElementById('edit-profil-foto').submit();
    }


    document.getElementById('openModalBtn').addEventListener('click', function(event) {
        event.preventDefault();
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });



  </script>
</body>

</html>