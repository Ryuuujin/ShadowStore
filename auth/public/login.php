<?php
session_start();
include('../../config/db.php');  // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and if the password matches
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['username'] = $user['username'];
        header("Location: ../../home.php"); // Redirect to dashboard or homepage
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../../css/form.css">
</head>
<body>
    <div class="container">
    <a href="../../home.php" class="back-button">Kembali</a>
        <h2>Masuk</h2>
        <p>Masuk dengan akun yang telah Kamu daftarkan.</p>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Kata sandi" required>
                <span class="toggle-password"></span>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="remember-me" name="remember">
                <label for="remember-me">Ingat akun ku</label>
            </div>
            <a href="#" class="forgot-password">Lupa kata sandi mu?</a>

            <div class="recaptcha">
                <!-- Add Google reCAPTCHA here -->
                <div class="g-recaptcha" data-sitekey="your-site-key"></div>
            </div>

            <button type="submit" class="btn-login">Masuk</button>

            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <p>Belum memiliki akun? <a href="register.php">Daftar</a></p>
        </form>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
