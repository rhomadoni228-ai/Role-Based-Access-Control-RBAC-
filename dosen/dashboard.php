$page_title = 'Dashboard Dosen | RBAC Secure System';
$page_heading = 'Dashboard Dosen';

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

<section class="dashboard-hero">
    <div>
        <span class="hero-badge">Panel Dosen</span>
        <h2>Selamat datang, <?= htmlspecialchars($_SESSION['nama']); ?></h2>
        <p>Kelola data mahasiswa dan input nilai akademik melalui panel akses dosen.</p>
    </div>
    <div class="hero-icon">
        <i class="fas fa-chalkboard-user"></i>
    </div>
</section>

<section class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-user-graduate"></i></div>
        <div>
            <span>Total Mahasiswa</span>
            <strong><?= $mhs['total']; ?></strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-clipboard-check"></i></div>
        <div>
            <span>Total Data Nilai</span>
            <strong><?= $nilai['total']; ?></strong>
        </div>
    </div>
</section>

<section class="card action-panel">
    <div>
        <h3>Akses Cepat</h3>
        <p>Buka fitur yang paling sering digunakan untuk aktivitas akademik.</p>
    </div>
    <div class="action-buttons">
        <a href="mahasiswa.php" class="btn btn-primary"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a>
        <a href="input_nilai.php" class="btn btn-success"><i class="fas fa-pen-to-square"></i> Input Nilai</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
