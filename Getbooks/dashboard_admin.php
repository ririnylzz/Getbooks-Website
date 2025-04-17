<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user_level'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Data buku sementara
if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [
        [
            'id' => 1,
            'judul' => 'Pulang',
            'pengarang' => 'Leila S. Chudori',
            'stok' => 5,
            'kategori' => 'Fiksi',
            'status' => 'tersedia'
        ],
        [
            'id' => 2,
            'judul' => 'Kronik Penculikan Aktivis dan Kekerasan Negara 1998',
            'pengarang' => 'Muhidin M. Dahlan',
            'stok' => 3,
            'kategori' => 'Non-Fiksi',
            'status' => 'tersedia'
        ],
        [
            'id' => 3,
            'judul' => 'Laut Bercerita',
            'pengarang' => 'Leila S. Chudori',
            'stok' => 7,
            'kategori' => 'Fiksi',
            'status' => 'tersedia'
        ],
        [
            'id' => 4,
            'judul' => 'Dari Dalam Kubur',
            'pengarang' => 'Soe Tjen Marching',
            'stok' => 4,
            'kategori' => 'Non-Fiksi',
            'status' => 'dipinjam'
        ],
        [
            'id' => 5,
            'judul' => 'Namaku Alam',
            'pengarang' => 'Leila S. Chudori',
            'stok' => 6,
            'kategori' => 'Fiksi',
            'status' => 'tersedia'
        ],
        [
            'id' => 6,
            'judul' => 'Bumi Manusia',
            'pengarang' => 'Pramoedya Ananta Toer',
            'stok' => 2,
            'kategori' => 'Fiksi',
            'status' => 'dipinjam'
        ],
        [
            'id' => 7,
            'judul' => 'Madilog Tan Malaka',
            'pengarang' => 'Tan Malaka',
            'stok' => 7,
            'kategori' => 'Non-Fiksi',
            'status' => 'tersedia'
        ],
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = (int) $_POST['stok'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];

    $newId = count($_SESSION['buku']) + 1;

    $_SESSION['buku'][] = [
        'id' => $newId,
        'judul' => $judul,
        'pengarang' => $pengarang,
        'stok' => $stok,
        'kategori' => $kategori,
        'status' => $status
    ];

    $message = "Buku berhasil ditambahkan!";
}

$buku = $_SESSION['buku'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - GetBooks</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <!-- <header>
        <div class="container">
            <h1>GetBooks</h1>
            <p>Halo, <?php echo $_SESSION['username']; ?> (Admin)</p>
        </div>
    </header> -->
    <header class="sticky-header">
        <div class="container">
            <div class="navbar">
                <a href="dashboard_admin.php" class="logo">
                    <i class="fas fa-book-open"></i>
                    <h1>GetBooks</h1>
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="dashboard_admin.php" class="active">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container">
        <section>
            <h2>Dashboard Admin</h2>
            <p>Selamat datang di panel admin GetBooks. Anda dapat mengelola koleksi buku sementara.</p>

            <?php if (isset($message)) : ?>
                <div class="alert success"><?php echo $message; ?></div>
            <?php endif; ?>

            <h3 class="section-title">Tambah Buku</h3>
            <form action="" method="post">
                <label>Judul:</label><br>
                <input type="text" name="judul" required><br><br>

                <label>Pengarang:</label><br>
                <input type="text" name="pengarang" required><br><br>

                <label>Stok:</label><br>
                <input type="number" name="stok" min="1" required><br><br>
                <label for="kategori">Kategori</label>
                
                <label for="kategori">Kategori:</label><br>
                <select id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Sains">Sains</option>
                    <option value="Fiksi">Fiksi</option>
                    <option value="Non-Fiksi">Non-Fiksi</option>
                    <option value="Pelajaran">Pelajaran</option>
                </select><br><br>

                <label>Status:</label><br>
                <div class="radio-group">
                    <label><input type="radio" name="status" value="tersedia" checked> Tersedia</label>
                    <label><input type="radio" name="status" value="dipinjam"> Dipinjam</label>
                </div><br><br>

                    <button type="submit">Tambah Buku</button>
            </form>

            <h2 class="section-title">Daftar Buku</h2>
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($buku as $i => $item): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($item['judul']) ?></td>
                        <td><?= htmlspecialchars($item['pengarang']) ?></td>
                        <td><?= $item['stok'] ?></td>
                        <td><?= isset($item['kategori']) ? htmlspecialchars($item['kategori']) : '-' ?></td>
                        <td><?= isset($item['status']) ? htmlspecialchars($item['status']) : '-' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 GetBooks</p>
        </div>
    </footer>
</body>

</html>