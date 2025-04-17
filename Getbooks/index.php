<?php
session_start();
if (isset($_SESSION['user_level'])) {
    header("Location: dashboard_" . $_SESSION['user_level'] . ".php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetBooks - Best Books of the Month</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="sticky-header">
        <div class="container">
            <div class="navbar">
                <a href="index.php" class="logo">
                    <i class="fas fa-book-open"></i>
                    <h1>GetBooks</h1>
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="daftar_buku.php">Collection</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" main class="container">
        <section class="book-showcase">
            <div class="book-content">
                <div class="headline-inline">
                    <h2 class="inline-heading">Books Open Worlds</h2>
                    <h3 class="inline-subheading">— GetBooks brings them to you.</h3>
                </div>
                <p class="highlight-text">Discover stories, ideas, and inspiration in every page.</p>
                <a href="daftar_buku.php" class="btn">Lihat Koleksi</a>
            </div>
            <div class="book-image">
                <img src="home.png" alt="books">
            </div>
        </section>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="about-container">
            <div class="about-image">
                <img src="perpus.jpg" alt="Perpustakaan Modern">
            </div>
            <div class="about-content">
                <h2 class="section-title">Effortless Book Lending</h2>
                <With>
                    <p>
                        GetBooks adalah platform peminjaman buku digital yang dirancang untuk memudahkan mahasiswa dan civitas akademika dalam mengakses berbagai koleksi buku tanpa harus datang langsung ke perpustakaan fisik.
                    </p>
                    <p>
                        Melalui GetBooks, Anda bisa dengan mudah meminjam buku secara online, melacak tenggat pengembalian, hingga mengajukan perpanjangan masa pinjam hanya dalam beberapa klik. Selain itu, sistem kami memungkinkan Anda mengecek ketersediaan buku secara real-time, kapan pun dan di mana pun.
                    </p>
                    <p>
                        Kami percaya bahwa akses terhadap pengetahuan seharusnya tidak terbatas ruang dan waktu. Karena itu, GetBooks hadir sebagai solusi praktis dan fleksibel untuk memenuhi kebutuhan baca Anda.
                    </p>
            </div>
        </div>
    </section>

    <section class="services-section" id="services">
        <div class="container">
            <h2 class="section-title">What We Offer</h2>

            <div class="services-grid">
                <!-- Layanan 1 -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="borrow-book.jpg" alt="Peminjaman Buku">
                    </div>
                    <div class="service-content">
                        <h3>Peminjaman Buku</h3>
                        <p>Pinjam buku secara online dengan proses mudah dan cepat. Pilih buku yang tersedia dan ajukan peminjaman.</p>
                    </div>
                </div>

                <!-- Layanan 2 -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="return-book.jpg" alt="Pengembalian Buku">
                    </div>
                    <div class="service-content">
                        <h3>Pengembalian Buku</h3>
                        <p>Kembalikan buku dengan mudah melalui sistem kami. Cek riwayat peminjaman dan status pengembalian.</p>
                    </div>
                </div>

                <!-- Layanan 3 -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="search-book.jpg" alt="Katalog Online">
                    </div>
                    <div class="service-content">
                        <h3>Katalog Online</h3>
                        <p>Cari dan temukan buku yang tersedia di perpustakaan kami dengan fitur pencarian canggih.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="featured-books">
        <div class="container">
            <h2 class="section-title">Featured Books</h2>
            <p class="section-subtitle">Koleksi buku terbaik bulan ini</p>

            <div class="book-highlight">
                <div class="book-text">
                    <h3>Kronik Penculikan Aktivis dan Kekerasan negara 1998</h3>
                    <p>Buku ini merekam jejak kelam sejarah Indonesia menjelang Reformasi 1998, ketika aktivis-aktivis diculik dan kekerasan negara mencapai puncaknya. Sebuah refleksi penting tentang perjuangan, keberanian, dan suara yang dibungkam.</p>
                    <p>Pinjam bukunya sekarang dan temukan fakta sejarah yang terlupakan.</p>
                    <a href="daftar_buku.php" class="btn">View Collection</a>
                </div>
                <div class="book-image">
                    <img src="kronik-penculikan.png" alt="Kronik Penculikan Aktivis dan Kekerasan negara 1998">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-section">
                <h3>GetBooks</h3>
                <hr>
                <p>Platform peminjaman buku digital untuk dunia pendidikan yang inovatif dan terpercaya.</p>
            </div>
            <div class="footer-section">
                <h3>Menu</h3>
                <hr>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="tentang.php">Tentang Kami</a></li>
                    <li><a href="layanan.php">Layanan</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <hr>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Perpustakaan No. 123, Kota</p>
                <p><i class="fas fa-envelope"></i> info@getbooks.ac.id</p>
                <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 GetBooks. All Rights Reserved.</p>
        </div>
    </footer>