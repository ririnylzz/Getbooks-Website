<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

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

// Data peminjaman user
$peminjaman_user = [
    ['id' => 1, 'judul_buku' => 'Laskar Pelangi', 'tanggal_pinjam' => '2023-05-01', 'status' => 'Menunggu Verifikasi'],
    ['id' => 2, 'judul_buku' => 'Bumi Manusia', 'tanggal_pinjam' => '2023-04-15', 'status' => 'Sudah Dikembalikan']
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna - GetBooks</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="sticky-header">
        <div class="container navbar">
            <a href="#" class="logo">
                <i class="fas fa-book"></i>
                <h1>GetBooks</h1>
            </a>
            <nav class="main-nav">
                <ul>
                    <li><a href="daftar_buku.php">Daftar Buku</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div style="height: 100px;"></div>
    <main class="container">
        <section class="dashboard-section">
            <h2>Dashboard Pengguna</h2>
            <p>Selamat datang di GetBooks. Anda dapat meminjam buku dan melihat status peminjaman Anda.</p>

            <h2 class="section-title">Daftar Buku Tersedia</h2>
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
                            <a href="proses_peminjaman.php?book_id=<?php echo $book['id']; ?>" class="btn">Pinjam Buku</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h4 class="section-title">Peminjaman Anda</h4>
            <?php if (empty($peminjaman_user)): ?>
                <p>Anda belum meminjam buku apapun.</p>
            <?php else: ?>
                <div class="borrow-list">
                    <?php foreach ($peminjaman_user as $pinjam): ?>
                        <div class="borrow-card <?php echo strtolower(str_replace(' ', '-', $pinjam['status'])); ?>">
                            <h4><?php echo $pinjam['judul_buku']; ?></h4>
                            <p><strong>Tanggal Pinjam:</strong> <?php echo $pinjam['tanggal_pinjam']; ?></p>
                            <p><strong>Status:</strong> <span class="status"><?php echo $pinjam['status']; ?></span></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <span class="status">
                <?php
                echo $pinjam['status'] === 'Menunggu Verifikasi' ? '⏳ ' : '✅ ';
                echo $pinjam['status'];
                ?>
            </span>


            <a href="proses_peminjaman.php" class="btn">Pinjam Buku Baru</a>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> GetBooks</p>
        </div>
    </footer>
</body>

</html>