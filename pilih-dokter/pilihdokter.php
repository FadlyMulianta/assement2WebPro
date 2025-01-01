<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Doctor Consultation</title>
    <!-- <link rel="stylesheet" href="./asset/dokter.css"> -->

    <style>
        * {
            font-family: "Poppins", serif;
            padding: 0;
            margin: 0;
            overscroll-behavior: none;
        }

        main {
            padding-left: 5rem;
            padding-right: 5rem;
        }

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }



        .container {
            margin-right: 5rem;
            margin-left: 5rem;
            margin-bottom: 5rem;
        }

        .content {
            display: flex;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .filter {
            position: fixed;
            width: 25%;
            background-color: var(--back-color);
            padding: 20px;
            border-radius: 10px;
        }

        .filter h3 {
            margin-bottom: 15px;
        }

        .filter label {
            display: block;
            margin: 10px 0 5px;
        }

        .filter input,
        .filter button {
            width: 100%;
            padding: 4px;
            border: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .filter button {
            margin-top: 3rem;
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .doctor-list {
            margin-left: 32%;
            width: 100%;
        }

        .doctor-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var();
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;

        }

        .doctor-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .doctor-card-info {
            display: flex;
        }




        .doctor-info h4 {
            margin-bottom: 5px;
            font-size: 18px;
        }

        .doctor-info p {
            font-size: 14px;
            color: #555;
        }

        .availability {
            color: #333;
            font-weight: bold;
        }

        .rating {
            margin-left: rem;
        }

        .rating span {
            font-size: 14px;
        }

        .doctor-info button {
            background-color: #1C3F60;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php include '../header.php'; ?>

    <div class="container">

        <div class="content">
            <div class="filter">
                <h3>FILTER</h3>
                <label>Ulasan Dokter:</label>
                <input type="text" placeholder=" ">
                <label>Biaya Konsultasi:</label>
                <input type="text" placeholder=" ">
                <label>Waktu Tersedia:</label>
                <input type="text" placeholder=" ">
                <button>Cari</button>
            </div>
            <div class="doctor-list">
                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter1.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>
                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <b>
                                    <p>ULASAN DOKTER</p>
                                </b>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter2.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <b>
                                    <p>ULASAN DOKTER</p>
                                </b>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter3.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <p><b>ULASAN DOKTER</b></p>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter3.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <p><b>ULASAN DOKTER</b></p>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter3.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <p><b>ULASAN DOKTER</b></p>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="doctor-card">
                    <div class="doctor-card-info">
                        <div>
                            <img src="../gambar/dokter3.jpg" alt="Dr. Richard">
                        </div>
                        <div>
                            <h4>Dr. Richard</h4>
                            <p>Jl. Kb. Jukut No.7, Babakan..</p>
                            <p class="availability">Tersedia hari ini</p>

                        </div>
                    </div>

                    <div>
                        <div class="doctor-info">
                            <div class="rating">
                                <p><b>ULASAN DOKTER</b></p>
                                <span>⭐ 4,5/5 (130)</span>
                                <p>Biaya konsultasi<br>Rp 100.000</p>
                                <button>Konsultasi</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include "../footer.php" ?>
</body>

</html>