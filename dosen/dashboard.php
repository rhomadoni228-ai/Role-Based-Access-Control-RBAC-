<?php
// ======================================================
// dosen/dashboard.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'dosen') {
    header("Location: ../auth/login.php");
    exit;
}

$q1 = mysqli_query($conn,"SELECT COUNT(*) as total FROM users WHERE role_id='3'");
$mhs = mysqli_fetch_assoc($q1);

$q2 = mysqli_query($conn,"SELECT COUNT(*) as total FROM nilai");
$nilai = mysqli_fetch_assoc($q2);
?>

<div class="card">
    <h2>Dashboard Dosen</h2>
    <p>Selamat datang <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="card">
    <h4>Statistik</h4>
    <p>Total Mahasiswa : <b><?= $mhs['total']; ?></b></p>
    <p>Total Data Nilai : <b><?= $nilai['total']; ?></b></p>
</div>

<div class="card">
    <a href="mahasiswa.php" class="btn btn-primary">Data Mahasiswa</a>
    <a href="input_nilai.php" class="btn btn-success">Input Nilai</a>
</div>

<?php include '../includes/footer.php'; ?>