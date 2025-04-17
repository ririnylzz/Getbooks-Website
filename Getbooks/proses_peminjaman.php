<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['user_level'] != 'user') {
    header("Location: login.php");
    exit();
}

// Data buku sementara
$buku = [
    1 => ['judul' => 'Laskar Pelangi', 'pengarang' => 'Andrea Hirata'],
    2 => ['judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer'],
    3 => ['judul' => 'Harry Potter', 'pengarang' => 'J.K. Rowling'],
    4 => ['judul' => 'The Hobbit', 'pengarang' => 'J.R.R. Tolkien'],
    5 => ['judul' => 'Negeri 5 Menara', 'pengarang' => 'Ahmad Fuadi']
];

// Ambil data buku jika ada parameter book_id
$selected_book = null;
if(isset($_GET['book_id']) && isset($buku[$_GET['book_id']])) {
    $selected_book = $buku[$_GET['book_id']];
}

// Proses form peminjaman
if(isset($_POST['pinjam_buku'])) {
    $book_id = $_POST['book_id'];
    $durasi = $_POST['durasi'];
    $catatan = $_POST['catatan'];
    
    // Dalam implementasi nyata, ini akan menyimpan data peminjaman
    $success = true; // Simulasi sukses
    
    if($success) {
        $message = "Peminjaman buku berhasil diajukan! Silakan tunggu verifikasi staff.";
        $message_type = "success";
    } else {
        $message = "Gagal mengajukan peminjaman!";
        $message_type = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - GetBooks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>GetBooks</h1>
            <p>Halo, <?php echo $_SESSION['username']; ?></p>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <ul>
                <li><a href="dashboard_user.php">Dashboard</a></li>
                <li><a href="daftar_buku.php">Daftar Buku</a></li>
                <li><a href="proses_peminjaman.php">Pinjam Buku</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <section>
            <h2>Form Peminjaman Buku</h2>
            
            <?php if(isset($message)): ?>
                <div class="alert <?php echo $message_type; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <form action="" method="post" class="borrow-form">
                <div class="form-group">
                    <label for="book_id">Buku yang Dipinjam:</label>
                    <select id="book_id" name="book_id" required>
                        <option value="">Pilih Buku</option>
                        <?php foreach($buku as $id => $book): ?>
                            <option value="<?php echo $id; ?>" <?php echo ($selected_book && $id == $_GET['book_id']) ? 'selected' : ''; ?>>
                                <?php echo $book['judul']; ?> (<?php echo $book['pengarang']; ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="durasi">Durasi Peminjaman:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="durasi" value="3" checked> 3 Hari</label>
                        <label><input type="radio" name="durasi" value="7"> 7 Hari</label>
                        <label><input type="radio" name="durasi" value="14"> 14 Hari</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="catatan">Catatan (opsional):</label>
                    <textarea id="catatan" name="catatan"></textarea>
                </div>
                
                <div class="form-group">
                    <label><input type="checkbox" name="setuju" required> Saya setuju dengan syarat dan ketentuan peminjaman</label>
                </div>
                
                <button type="submit" name="pinjam_buku" class="btn">Ajukan Peminjaman</button>
            </form>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 GetBooks</p>
        </div>
    </footer>
</body>
</html>