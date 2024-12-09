<?php
session_start();
include('../../config/db.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data safely
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : '';

    try {
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Set success message
        $_SESSION['success'] = "Registrasi Berhasil, Harap Lakukan Login.";
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../css/form.css">
</head>
<body>
    <div class="container">
    <a href="../../home.php" class="back-button">Kembali</a>
        <h2>Daftar</h2>
        <p>Masukkan informasi pendaftaran yang valid.</p>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="full-name">Nama Lengkap</label>
                <input type="text" id="full-name" name="full_name" placeholder="Nama lengkap" required>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" placeholder="Alamat email" required>
            </div>
            <div class="input-group">
                <label for="whatsapp">Nomor WhatsApp</label>
                <div class="whatsapp-input">
                    <span>+62</span>
                    <input type="text" id="whatsapp" name="whatsapp" placeholder="895XXXXXXX" required>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Kata sandi" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Konfirmasi Kata Sandi</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Konfirmasi kata sandi" required>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Saya setuju dengan <a href="#">Syarat dan Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>.</label>
            </div>
            <div class="recaptcha">
                <!-- Google reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="your-site-key"></div>
            </div>
            <button type="submit" class="btn-register">Daftar</button>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
