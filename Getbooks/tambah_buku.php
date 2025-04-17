<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['user_level'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Proses form tambah buku
if(isset($_POST['tambah_buku'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $bahasa = $_POST['bahasa'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    
    // Dalam implementasi nyata, ini akan menyimpan ke database
    $success = true; // Simulasi sukses
    
    if($success) {
        $message = "Buku berhasil ditambahkan!";
        $message_type = "success";
    } else {
        $message = "Gagal menambahkan buku!";
        $message_type = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - GetBooks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>GetBooks</h1>
            <p>Halo, <?php echo $_SESSION['username']; ?> (Admin)</p>
        </div>
    </header>
    
    <nav>
        <div class="container">
            <ul>
                <li><a href="dashboard_admin.php">Dashboard</a></li>
                <li><a href="tambah_buku.php">Tambah Buku</a></li>
                <li><a href="daftar_buku.php">Daftar Buku</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <section>
            <h2>Tambah Buku Baru</h2>
            
            <?php if(isset($message)): ?>
                <div class="alert <?php echo $message_type; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <form action="" method="post" class="book-form">
                <div class="form-group">
                    <label for="judul">Judul Buku:</label>
                    <input type="text" id="judul" name="judul" required>
                </div>
                
                <div class="form-group">
                    <label for="pengarang">Pengarang:</label>
                    <input type="text" id="pengarang" name="pengarang" required>
                </div>
                
                <div class="form-group">
                    <label for="stok">Jumlah Stok:</label>
                    <input type="number" id="stok" name="stok" min="1" required>
                </div>
                
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="fiksi">Fiksi</option>
                        <option value="non-fiksi">Non-Fiksi</option>
                        <option value="sains">Sains</option>
                        <option value="sejarah">Sejarah</option>
                        <option value="biografi">Biografi</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Bahasa:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="bahasa" value="indonesia" checked> Indonesia</label>
                        <label><input type="radio" name="bahasa" value="inggris"> Inggris</label>
                        <label><input type="radio" name="bahasa" value="lainnya"> Lainnya</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Buku:</label>
                    <textarea id="deskripsi" name="deskripsi" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Non-Aktif</option>
                        <option value="dalam-perbaikan">Dalam Perbaikan</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="gambar">Gambar Buku:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                    <small>Format: JPG/PNG, maksimal 2MB</small>
                </div>
                
                <div class="form-group">
                    <label><input type="checkbox" name="best_seller" value="1"> Best Seller</label>
                    <label><input type="checkbox" name="new_release" value="1"> New Release</label>
                </div>
                
                <button type="submit" name="tambah_buku" class="btn">Tambah Buku</button>
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