<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Contact & Chat</title>
    <style>
        /* body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", serif; */
        /* display: flex; */
        /* flex-direction: column;
            height: 100vh; */
        /* } */

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        .side {
            background-color: var(--primary-color);
            padding: 0.5rem;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }


        .container {
            margin-left: 5rem;
            margin-right: 6.5rem;
            display: flex;
            flex: 1;
            margin-bottom: 5rem;
        }

        .sidebar {
            width: 50px;
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .hamburger {
            width: 30px;
            height: 30px;
            margin-top: 10px;
            background: url('hamburger-icon.png') no-repeat center center;
            background-size: contain;
            cursor: pointer;
        }

        .main {
            flex: 1;
            display: flex;
        }

        .main-contacts {
            width: 25%;
            border-right: 1px solid #ccc;
            overflow-y: auto;
        }

        .main-chat {
            width: 50%;
            padding: 1rem;
            overflow-y: auto;
        }

        /* .main-contacts header {
            background-color: ;
            padding: 0.5rem;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        } */

        .main-contacts  h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.5rem;
            color: var(--secondary-color);
        }

        .main-contacts .search-bar {
            width: 100%;
            display: flex;
            align-items: center
        }

        .main-contacts  .search-bar input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .main-contacts .contact-list {
            display: flex;
            flex-direction: column;
            margin: 1rem;
        }

        .main-contacts .contact {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }


        .main-contacts .contact-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .main-contacts .contact-name {
            font-size: 1rem;
            font-weight: bold;
        }

        .kolom-chat {
            display: flex;
            flex-direction: column;
            height: 100%;
            background-color: #f9f9f9;
            width: 100%;
        }

        .chat-header {
            display: flex;
            align-items: center;
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chat-header .back-button {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .chat-header .chat-contact-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .chat-header .chat-contact-name {
            font-size: 1.2rem;
            margin: 0;
        }

        .chat-body {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
        }

        .chat-footer {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            background-color: #ffffff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .chat-footer .chat-input {
            flex: 1;
            padding: 0.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            margin-right: 0.5rem;
        }

        .chat-footer .send-button {
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .chat-footer .send-button:hover {
            border: 1px solid var(--primary-color);
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <?php include '../header.php';  ?>
    <div class="container">
        <!-- <aside class="sidebar">
            <img src="assets/hamburgermenu.svg" alt="Hamburger Menu" class="hamburger" title="Menu">
        </aside> -->

        <div class="main">
            <section class="main-contacts">
                <div class="side">
                    <h2>Contact</h2>
                    <div class="search-bar">
                        <input type="text" placeholder="Search contacts...">
                    </div>
                </div>
                <div class="contact-list">
                    <div class="contact">
                        <img src="../gambar/dokter1.jpg" alt="Contact 1" class="contact-img">
                        <span class="contact-name">Dr.John Doe</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter2.jpg" alt="Contact 2" class="contact-img">
                        <span class="contact-name">Dr.Jane Smith</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter3.jpg" alt="Contact 3" class="contact-img">
                        <span class="contact-name">Dr.Michael Johnson</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter4.jpg" alt="Contact 3" class="contact-img">
                        <span class="contact-name">Dr.Vincent</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter1.jpg" alt="Contact 3" class="contact-img">
                        <span class="contact-name">Dr.Ah Long</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter1.jpg" alt="Contact 3" class="contact-img">
                        <span class="contact-name">Dr.Lalisa Jaws</span>
                    </div>
                    <div class="contact">
                        <img src="../gambar/dokter1.jpg" alt="Contact 3" class="contact-img">
                        <span class="contact-name">Dr.darrisa Rowed</span>
                    </div>
                    <!-- Tambahkan lebih banyak kontak di sini -->
                </div>
            </section>
            <div class="kolom-chat">
                <div class="chat-header">
                    <img src="../gambar/dokter1.jpg" alt="Contact Image" class="chat-contact-img">
                    <h3 class="chat-contact-name">Dr. John Doe</h3>
                </div>
                <div class="chat-body">
                    <!-- Isi chat akan ditambahkan di sini -->
                </div>
                <footer class="chat-footer">
                    <!-- Input untuk mengetik pesan -->
                    <input type="text" placeholder="Type a message..." class="chat-input">
                    <button class="send-button">Kirim</button>
                </footer>
            </div>
        </div>
    </div>
    <?php include "../footer.php" ?>

</body>

</html>