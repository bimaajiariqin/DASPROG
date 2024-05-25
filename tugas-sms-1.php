<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Kebudayaan Jawa Timur</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000000;
            color: #ffffff;
            font-family: "Poppins", sans-serif;
        }

        a {
            text-decoration: none;
        }

        header {
            width: 100%;
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            background: url("pexels-dio-hasbi-saniskoro-1009949.jpg");
            background-size: cover;
            background-position: center;
        }

        header:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 60vh;
            bottom: 0;
            left: 0;
            background: linear-gradient(to top, #000000, rgba(0, 0, 0, 0));
        }

        nav,
        .header-bottom {
            display: flex;
            justify-content: space-between;
            padding: 2rem;
            position: relative;
        }

        .logo a {
            color: #ffffff;
            font-size: 2rem;
        }

        .btn-sign-up {
            padding: 0.5rem 0.5rem;
            background: #333333;
            color: #ffffff;
            font-weight: 500;
            border-radius: 10px;
            transition: .3s;
        }

        .btn-sign-up:hover {
            background: #ffffff;
            color: #333333;
        }

        .header-title {
            margin: auto auto;
            font-size: 5rem;
            position: relative;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .today-date {
            font-size: 2rem;
            font-weight: 500;
        }

        .today-date span {
            font-size: 1.5rem;
        }

        .navigation {
            display: flex;
            list-style: none;
            width: 350px;
            justify-content: space-between;
            align-items: center;
        }

        .navigation li a {
            color: #ffffff;
        }

        /* Section Styling */
        section {
            background-color: #000000;
            padding: 50px 0;
            text-align: center;
        }

        section h1 {
            margin-bottom: 30px;
        }

        /* Popular Dances Section */
        .dances-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .dance {
            background-color: #333333;
            padding: 20px;
            border-radius: 10px;
        }

        .dance img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* Contact Section */
        .contact-section form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-section input,
        .contact-section textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #333333;
            color: #ffffff;
        }

        .contact-section button {
            padding: 10px 20px;
            background-color: #444444;
            color: #ffffff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .contact-section button:hover {
            background-color: #666666;
        }

        footer {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <!--header-->
    <header>
        <nav>
            <h1 class="logo">
                <a href="#">JATIM</a>
            </h1>
            <a href="index.php" class="btn-sign-up">LogIn</a>
        </nav>
        <div class="header-title">TRAJA <br>
        </div>
        <div class="header-bottom">
            <a class="today-date">21 <span>/ 11</span></a>
            <div id="sevices" class="services">
                <ul class="navigation">
                    <li><a href="tugas-sms-1.php">Beranda</a></li>
                    <li><a href="tentang.php">Tentang</a></li>
                    <li><a href="event.php">Penampilan Tari</a></li>
                    <li><a href="pro.php">Profil</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section>
        <div class="container">
            <h1>Temukan Informasi Tarian Jawa Timur Di Website ini!</h1>
        </div>
    </section>

    <!-- Popular Dances Section -->
    <section>
        <div class="container">
            <h2>Tarian Paling Populer di Jawa Timur</h2>
            <div class="dances-grid">
                <div class="dance">
                    <img src="Reog Ponorogo.jpeg" alt="Tarian 1">
                    <h3>Reog Ponorogo</h3>
                    <p>Reog[1] (aksara Jawa: ꦫꦺꦪꦺꦴꦒ꧀, Réyog) merupakan tarian tradisional dari Ponorogo, Jawa Timur dalam arena terbuka yang berfungsi sebagai hiburan rakyat,
                       mengandung unsur magis, penari utama adalah orang berkepala singa dengan hiasan bulu merak, dengan berat topeng mencapai 50-60 kg.
                       Ditambah beberapa penari bertopeng dan berkuda lumping dan Reog asli dari Indonesia.</p>
                </div>
                <div class="dance">
                    <img src="tari remo.jpeg" alt="Tarian 2">
                    <h3>Tari Remo</h3>
                    <p>Tari Remo berasal dari Kabupaten Jombang, Jawa Timur. Tarian ini diciptakan oleh seniman Jombang yang dikenal dengan Cak Mo yang pernah menjadi Gemblak dari sebuah Grup Reog di Ponorogo.
                       karena kemarau yang panjang membuat cak Mo mencari pemasukan dari sumber lainnya, bermodalkan keahlian menari.</p>
                </div>
                <div class="dance">
                    <img src="anyep.jpeg" alt="Tarian 3">
                    <h3>Tari Gandrung Sewu</h3>
                    <p>Gandrung Sewu (bahasa Jawa: ꦒꦤ꧀ꦝꦿꦸꦁ​​ꦱꦺꦮꦸ, Osing: Gandrong Sewu,'Seribu Gandrung') merupakan gelaran festival tahunan tari Gandrung kolosal di Kabupaten Banyuwangi, Jawa Timur,
                       yang merupakan salah satu bagian Banyuwangi Festival. Acara ini diadakan sejak tahun 2012, yang pada awalnya digelar untuk mengenalkan kebudayaan Banyuwangi khususnya Gandrung ke khalayak luas. Pada saat ini Gandrung Sewu sudah
                        menjadi ikon pariwisata budaya Banyuwangi. Acara ini diadakan setiap tahun sekali di Pantai Boom, yang berlatarkan selat Bali.</p>
                </div>
            </div>
        </div>
    </section>

   <!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <h2>Feedback for our website</h2>
        <p>Masukan untuk Website kita agar menjadi baik kedepan nya.</p>
        <form action="masukan.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</section>

    <!-- Footer -->
    <footer>
        <p>&copy; <b>2023 Landing Page Kebudayaan Indonesia</b></p>
    </footer>
</body>
</html>
