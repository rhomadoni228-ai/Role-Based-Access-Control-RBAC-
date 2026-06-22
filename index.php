<?php
// ======================================================
// index.php
// Redirect otomatis
// ======================================================
session_start();

if (isset($_SESSION['login'])) {

    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    }

    if ($_SESSION['role'] == 'dosen') {
        header("Location: dosen/dashboard.php");
        exit;
    }

    if ($_SESSION['role'] == 'mahasiswa') {
        header("Location: mahasiswa/dashboard.php");
        exit;
    }
}

header("Location: auth/login.php");
exit;
?>