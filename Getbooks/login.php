<?php
session_start();

// Data login sementara (tanpa database)
$users = [
    'admin' => ['password' => 'admin123', 'level' => 'admin'],
    'staff1' => ['password' => 'staff123', 'level' => 'staff'],
    'user1' => ['password' => 'user123', 'level' => 'user']
];

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username])) {
        if ($password == $users[$username]['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['user_level'] = $users[$username]['level'];
            header("Location: dashboard_" . $users[$username]['level'] . ".php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GetBooks</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <li><a href="#services">Services</a></li>
                        <li><a href="login.php" class="active">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="login-wrapper">
        <section class="login-form">
            <h2>Login ke Akun Anda</h2>

            <?php if (isset($error)): ?>
                <div class="alert error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" name="login" class="btn">Login</button>
            </form>

            <p>Belum punya akun? Hubungi admin untuk mendaftar.</p>
        </section>
    </main>
</body>

</html>