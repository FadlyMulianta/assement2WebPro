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
        background-color: #f0f4f8;
        margin-left: 10px;
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
        text-align: center;
        width: 100%;
        padding: 3% 0;
      }

      .close-icon {
        position: absolute;
        top: 20px;
        left: 40px;
        width: 52px;
        cursor: pointer;
      }

      .profile-pic-container {
        position: relative;
        display: inline-block;
      }

      .profile-pic {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
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
        margin-top: 20px;
      }

      .profile-info div {
        margin: 10px 0;
        font-size: 18px;
      }

      .profile-info div:not(:last-child) {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
      }

      .form-group {
        margin-bottom: 0px;
      }

      .form-group label {
        font-weight: bold;
        margin-bottom: 10px;
        display: inline-block;
      }

      .form-group input {
        width: 30%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }

      .file-input {
        display: none; /* Menyembunyikan input file */
      }

      .btn-submit {
        background-color: #1a3b5d;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }

      .btn-submit:hover {
        background-color: #2d5a85;
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
          <div class="container-profile">
            <h2 style="color: #1a3b5d;">Edit Profil</h2>

            <!-- Form untuk mengubah informasi profil -->
            <form id="edit-profil-form" action="proses_edit_profil.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="gambar_user">Gambar Profil:</label><br>
                <div class="profile-pic-container">
                  <img 
                    id="profile-pic"
                    alt="Foto profil" 
                    class="profile-pic" 
                    src="../Profil/gambar/<?php echo htmlspecialchars($user['gambar_user']); ?>"
                    onclick="document.getElementById('gambar_user').click();" 
                  />
                  <div class="edit-icon">
                    <i class="fas fa-edit"></i>
                  </div>
                </div>
                <input type="file" id="gambar_user" name="gambar_user" class="file-input" style="display: none;" onchange="previewImage(event);"><br><br>
              </div>
              <div class="form-group">
                <label for="namadepan">Nama Depan:</label><br>
                <input type="text" id="namadepan" name="namadepan" value="<?php echo htmlspecialchars($user['namadepan']); ?>"><br><br>
              </div>
              <div class="form-group">
                <label for="namabelakang">Nama Belakang:</label><br>
                <input type="text" id="namabelakang" name="namabelakang" value="<?php echo htmlspecialchars($user['namabelakang']); ?>"><br><br>
              </div>
              <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br><br>
              </div>
              <div class="form-group">
                <label for="nohp">Nomor HP:</label><br>
                <input type="text" id="nohp" name="nohp" value="<?php echo htmlspecialchars($user['nohp']); ?>"><br><br>
              </div>
              <button type="submit" class="btn-submit">Simpan Profil</button>
            </form>

            <h2 style="color: #1a3b5d; margin-top: 20px;">Ubah Kata Sandi</h2>
            <!-- Form untuk mengubah kata sandi -->
            <form action="proses_edit_katasandi.php" method="post">
              <div class="form-group">
                <label for="katasandi_lama">Kata Sandi Lama:</label><br>
                <input type="password" id="katasandi_lama" name="katasandi_lama"><br><br>
              </div>
              <div class="form-group">
                <label for="katasandi_baru">Kata Sandi Baru:</label><br>
                <input type="password" id="katasandi_baru" name="katasandi_baru"><br><br>
              </div>
              <div class="form-group">
                <label for="konfirmasi_katasandi">Konfirmasi Kata Sandi Baru:</label><br>
                <input type="password" id="konfirmasi_katasandi" name="konfirmasi_katasandi"><br><br>
              </div>
              <button type="submit" class="btn-submit">Ubah Kata Sandi</button>
            </form>
          </div>
        </div>




          <div id="bahasa" class="tab-content">
            <h2>Bahasa</h2>
            <p>Pilih bahasa yang Anda gunakan:</p>
            <select>
              <option value="id">Bahasa Indonesia</option>
              <option value="en">English</option>
              <!-- Tambahkan opsi bahasa lainnya di sini -->
            </select>
          </div>
          <div id="wishlist" class="tab-content">
            <h2>Wishlist</h2>
            <p>Ini adalah daftar wishlist Anda:</p>
            <ul>
              <li>Produk A</li>
              <li>Produk B</li>
              <!-- Tambahkan produk lainnya di sini -->
            </ul>
          </div>
          <div id="notifikasi" class="tab-content">
            <h2>Notifikasi</h2>
            <p>Pengaturan notifikasi Anda:</p>
            <form>
              <input type="checkbox" id="emailNotif" name="emailNotif">
              <label for="emailNotif">Notifikasi melalui email</label><br><br>
              <input type="checkbox" id="smsNotif" name="smsNotif">
              <label for="smsNotif">Notifikasi melalui SMS</label><br><br>
              <button type="submit">Simpan Pengaturan</button>
            </form>
          </div>
          <div id="bantuan" class="tab-content">
            <h2>Bantuan</h2>
            <p>Bagaimana kami bisa membantu Anda?</p>
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

    </script>
</body>

</html>
