$page_title = 'Dashboard Mahasiswa | RBAC Secure System';
$page_heading = 'Dashboard Mahasiswa';

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

<section class="dashboard-hero">
    <div>
        <span class="hero-badge">Panel Mahasiswa</span>
        <h2>Selamat datang, <?= htmlspecialchars($_SESSION['nama']); ?></h2>
        <p>Lihat ringkasan akademik, nilai mata kuliah, dan informasi profil Anda.</p>
    </div>
    <div class="hero-icon">
        <i class="fas fa-user-graduate"></i>
    </div>
</section>

<section class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-book-open"></i></div>
        <div>
            <span>Mata Kuliah Dinilai</span>
            <strong><?= $d['total']; ?></strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-user-check"></i></div>
        <div>
            <span>Status Akses</span>
            <strong>Aktif</strong>
        </div>
    </div>
</section>

<section class="card action-panel">
    <div>
        <h3>Akses Cepat</h3>
        <p>Buka nilai akademik dan data profil pribadi Anda.</p>
    </div>
    <div class="action-buttons">
        <a href="nilai.php" class="btn btn-primary"><i class="fas fa-chart-line"></i> Lihat Nilai</a>
        <a href="profil.php" class="btn btn-success"><i class="fas fa-id-card"></i> Profil Saya</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
