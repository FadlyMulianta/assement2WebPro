<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h4 {
            color: #6a9ded;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        #consultation-btn {
            background-color: #6a9ded;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        #consultation-btn:hover {
            background-color: #6a9ded;
        }

        .icon {
            font-size: 48px;
            color: #6a9ded;
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="fas fa-check-circle icon"></i>
        <h4>Pembayaran Berhasil</h4>
        <p>Terima kasih! Pembayaran Anda telah berhasil. Silakan tunggu barang anda terkirim :).</p>
        <button id="consultation-btn">
            <a href="../beranda/beranda.php" style="color: white; text-decoration: none;">Kembali</a>
        </button>
    </div>
</body>
</html>
