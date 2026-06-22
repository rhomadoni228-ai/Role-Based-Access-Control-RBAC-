<?php
// ======================================================
// auth/logout.php
// ======================================================

// jalankan session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// hapus semua session
$_SESSION = [];

// hapus cookie session jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// destroy session
session_destroy();

// kembali ke login
header("Location: login.php?logout=1");
exit;
?>