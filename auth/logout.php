<?php
session_start();
session_unset(); // Hapus semua sesi
session_destroy(); // Hancurkan sesi
header("Location: ../../index.php"); // Redirect ke halaman utama
exit();
?>