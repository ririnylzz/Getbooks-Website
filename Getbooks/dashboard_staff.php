<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user_level'] != 'staff') {
    header("Location: login.php");
    exit();
}

// Data peminjaman sementara
$peminjaman = [
    ['id' => 1, 'judul_buku' => 'Laskar Pelangi', 'peminjam' => 'user1', 'tanggal_pinjam' => '2023-05-01', 'status' => 'Menunggu Verifikasi'],
    ['id' => 2, 'judul_buku' => 'Bumi Manusia', 'peminjam' => 'user2', 'tanggal_pinjam' => '2023-05-02', 'status' => 'Disetujui'],
    ['id' => 3, 'judul_buku' => 'Harry Potter', 'peminjam' => 'user3', 'tanggal_pinjam' => '2023-05-03', 'status' => 'Ditolak']
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staff - GetBooks</title>
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
                    <li><a href="dashboard_staff.php" class="active">Dashboard</a></li>
                    <li><a href="daftar_buku.php">Daftar Buku</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="headline-inline">
                <h2 class="inline-heading">Dashboard Staff</h2>
            </div>
            <p class="highlight-text">Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>! Di sini kamu bisa memverifikasi peminjaman buku dan memantau aktivitas perpustakaan.</p>
        </section>

        <section>
            <h3 class="section-title">Daftar Peminjaman Terbaru</h3>
            <div class="books-container">
                <?php foreach ($peminjaman as $pinjam): ?>
                    <div class="book-card">
                        <div class="book-card-content">
                            <h3><?php echo $pinjam['judul_buku']; ?></h3>
                            <p class="book-author">Peminjam: <?php echo $pinjam['peminjam']; ?></p>
                            <p class="book-desc">Tanggal Pinjam: <?php echo $pinjam['tanggal_pinjam']; ?></p>
                            <div class="book-info">
                                <span class="book-status <?php echo strtolower(str_replace(' ', '-', $pinjam['status'])); ?>">
                                    <?php echo $pinjam['status']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> GetBooks - All Rights Reserved</p>
        </div>
    </footer>

</body>

</html>