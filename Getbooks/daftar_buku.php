<?php
session_start();

// Data buku sementara
$buku = [
    ['id' => 1, 'judul' => 'Pulang', 'pengarang' => 'Leila S. Chudori', 'stok' => 5, 'gambar' => 'pulang.jpg', 'deskripsi' => 'Pulang adalah sebuah drama keluarga, persahabatan, cinta, dan pengkhianatan berlatar belakang tiga peristiwa bersejarah: Indonesia 30 September 1965, Prancis Mei 1968, dan Indonesia Mei 1998.'],
    ['id' => 2, 'judul' => 'Kronik Penculikan Aktivis dan Kekerasan Negara 1998', 'pengarang' => 'Muhidin M. Dahlan', 'stok' => 3, 'gambar' => 'kronik-penculikan.png', 'deskripsi' => 'Reformasi adalah episode sejarah Indonesia yang mengantarkan kita sampai di titik saat ini. Buku ini mengajak pembaca untuk berhenti di titik tahun 1998, tahun dengan puncak-puncak kekerasan politik yang masif.'],
    ['id' => 3, 'judul' => 'Laut Bercerita', 'pengarang' => 'Leila S. Chudori', 'stok' => 7, 'gambar' => 'Laut-Bercerita.jpg', 'deskripsi' => 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.'],
    ['id' => 4, 'judul' => 'Dari Dalam Kubur', 'pengarang' => 'Soe Tjen Marching', 'stok' => 4, 'gambar' => 'daridalam-kubur.jpg', 'deskripsi' => 'Novel “Dari Dalam Kubur” dimulai dengan cerita seorang perempuan bernama Karla, gadis yang selama tumbuh besar di Surabaya mengalami banyak kebingungan mengenai identitas etnisnya. Dari cerita Karla, kita dapat menemukan bagaimana sentimen rasis muncul di percakapan sehari-hari dan berangsur menggembung menjadi berita-berita penjarahan toko-toko.'],
    ['id' => 5, 'judul' => 'Namaku Alam', 'pengarang' => 'Leila S. Chudori', 'stok' => 6, 'gambar' => 'namaku-alam.jpg', 'deskripsi' => 'Novel Namaku Alam karya Leila S. Chudori bercerita tentang kehidupan Segara Alam, seorang anak mantan tahanan politik (tapol) pada era Orde Baru.'],
    ['id' => 6, 'judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer', 'stok' => 2, 'gambar' => 'bumi-manusia.jpeg', 'deskripsi' => 'Bumi Manusia menggambarkan pergulatan hidup Minke, seorang pemuda pribumi cerdas dan kritis yang belajar di sekolah Belanda di era kolonialisme.'],
    ['id' => 7, 'judul' => 'Madilog Tan Malaka', 'pengarang' => 'Tan Malaka', 'stok' => 7, 'gambar' => 'tanmalaka.jpg', 'deskripsi' => 'Madilog Tan Malaka : Materialisme, Dialektika & Logika membahas tentang pandangan Tan Malaka terhadap Materialisme, Dialektika, dan Logika yang ditulis oleh Tan Malaka, filsuf asal Indonesia dan juga pejuang kemerdekaan.']
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - GetBooks</title>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="daftar_buku.php">Collection</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div style="height: 80px;"></div>
    <main class="container">
        <section>
            <h2>Daftar Buku Tersedia</h2>

            <div class="book-controls">
                <div class="search-box">
                    <input type="text" placeholder="Cari judul atau pengarang...">
                </div>
                <div class="filter-section">
                    <select class="filter-select">
                        <option>Semua Kategori</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Sains</option>
                        <option>Sejarah</option>
                    </select>
                    <select class="filter-select">
                        <option>Urutkan</option>
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>A-Z</option>
                        <option>Z-A</option>
                    </select>
                </div>
            </div>

            <div class="books-container">
                <?php foreach ($buku as $book): ?>
                    <div class="book-card">
                        <img src="<?php echo $book['gambar']; ?>" alt="<?php echo $book['judul']; ?>">
                        <div class="book-card-content">
                            <h3><?php echo $book['judul']; ?></h3>
                            <p class="book-author">Oleh: <?php echo $book['pengarang']; ?></p>
                            <p class="book-desc"><?php echo $book['deskripsi']; ?></p>
                            <div class="book-info">
                                <span>Stok: <?php echo $book['stok']; ?></span>
                                <span class="book-status <?php echo ($book['stok'] > 0) ? 'available' : 'unavailable'; ?>">
                                    <?php echo ($book['stok'] > 0) ? 'Tersedia' : 'Habis'; ?>
                                </span>
                            </div>
                            <?php if (isset($_SESSION['username']) && $_SESSION['user_level'] == 'user' && $book['stok'] > 0): ?>
                                <a href="proses_peminjaman.php?book_id=<?php echo $book['id']; ?>" class="btn">Pinjam Buku</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 GetBooks</p>
        </div>
    </footer>
</body>

</html>