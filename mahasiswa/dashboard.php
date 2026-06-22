<?php
// ======================================================
// mahasiswa/dashboard.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'mahasiswa') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_SESSION['id'];

$q = mysqli_query($conn,"
    SELECT COUNT(*) as total
    FROM nilai
    WHERE user_id='$id'
");
$d = mysqli_fetch_assoc($q);
?>

<div class="card">
    <h2>Dashboard Mahasiswa</h2>
    <p>Selamat datang <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="card">
    <h4>Informasi Akademik</h4>
    <p>Total Mata Kuliah Dinilai :
        <b><?= $d['total']; ?></b>
    </p>
</div>

<div class="card">
    <h4>Akses Cepat</h4>
    <p>
        <a href="nilai.php" class="btn btn-primary">Lihat Nilai</a>
        <a href="profil.php" class="btn btn-success">Profil Saya</a>
    </p>
</div>

<?php include '../includes/footer.php'; ?>