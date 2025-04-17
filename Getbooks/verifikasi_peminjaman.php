<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['user_level'] != 'staff') {
    header("Location: login.php");
    exit();
}

// Data peminjaman yang perlu diverifikasi
$peminjaman = [
    ['id' => 1, 'judul_buku' => 'Laskar Pelangi', 'peminjam' => 'user1', 'tanggal_pinjam' => '2023-05-01', 'durasi' => 7, 'catatan' => 'Untuk bahan penelitian'],
    ['id' => 2, 'judul_buku' => 'Bumi Manusia', 'peminjam' => 'user2', 'tanggal_pinjam' => '2023-05-02', 'durasi' => 3, 'catatan' => ''],
    ['id' => 3, 'judul_buku' => 'Harry Potter', 'peminjam' => 'user3', 'tanggal_pinjam' => '2023-05-03', 'durasi' => 14, 'catatan' => 'Buku untuk anak saya']
];

// Proses verifikasi
if(isset($_POST['verifikasi'])) {
    $peminjaman_id = $_POST['peminjaman_id'];
    $status = $_POST['status'];
    $catatan_staff = $_POST['catatan_staff'];
    
    // Dalam implementasi nyata, ini akan mengupdate status peminjaman
    $success = true; // Simulasi sukses
    
    if($success) {
        $message = "Peminjaman berhasil diverifikasi!";
        $message_type = "success";
    } else {
        $message = "Gagal memverifikasi peminjaman!";
        $message_type = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Peminjaman - GetBooks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>GetBooks</h1>
            <p>Halo, <?php echo $_SESSION['username']; ?> (Staff)</p>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <ul>
                <li><a href="dashboard_staff.php">Dashboard</a></li>
                <li><a href="verifikasi_peminjaman.php">Verifikasi Peminjaman</a></li>
                <li><a href="daftar_buku.php">Daftar Buku</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <section>
            <h2>Verifikasi Peminjaman Buku</h2>
            
            <?php if(isset($message)): ?>
                <div class="alert <?php echo $message_type; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <div class="verification-list">
                <?php foreach($peminjaman as $pinjam): ?>
                <form action="" method="post" class="verification-form">
                    <input type="hidden" name="peminjaman_id" value="<?php echo $pinjam['id']; ?>">
                    
                    <div class="form-group">
                        <label>Judul Buku:</label>
                        <p><strong><?php echo $pinjam['judul_buku']; ?></strong></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Peminjam:</label>
                        <p><?php echo $pinjam['peminjam']; ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Pinjam:</label>
                        <p><?php echo $pinjam['tanggal_pinjam']; ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Durasi:</label>
                        <p><?php echo $pinjam['durasi']; ?> Hari</p>
                    </div>
                    
                    <div class="form-group">
                        <label>Catatan Peminjam:</label>
                        <p><?php echo empty($pinjam['catatan']) ? '-' : $pinjam['catatan']; ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status Verifikasi:</label>
                        <select id="status" name="status" required>
                            <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="catatan_staff">Catatan Staff:</label>
                        <textarea id="catatan_staff" name="catatan_staff"></textarea>
                    </div>
                    
                    <button type="submit" name="verifikasi" class="btn">Simpan Verifikasi</button>
                </form>
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