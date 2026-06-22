$page_title = 'Dashboard Admin | RBAC Secure System';
$page_heading = 'Dashboard Admin';

include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if($_SESSION['role']!='admin'){ header("Location:../auth/login.php"); exit; }

$u = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM users"));
$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM roles"));
$p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM permissions"));
?>

<section class="dashboard-hero">
    <div>
        <span class="hero-badge">Panel Administrator</span>
        <h2>Selamat datang, <?= htmlspecialchars($_SESSION['nama']); ?></h2>
        <p>Pantau pengguna, role, dan permission dari satu dashboard administrasi.</p>
    </div>
    <div class="hero-icon">
        <i class="fas fa-user-shield"></i>
    </div>
</section>

<section class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-users"></i></div>
        <div>
            <span>Total User</span>
            <strong><?= $u['total']; ?></strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-id-badge"></i></div>
        <div>
            <span>Total Role</span>
            <strong><?= $r['total']; ?></strong>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon amber"><i class="fas fa-key"></i></div>
        <div>
            <span>Total Permission</span>
            <strong><?= $p['total']; ?></strong>
        </div>
    </div>
</section>

<section class="card action-panel">
    <div>
        <h3>Akses Cepat</h3>
        <p>Kelola komponen utama sistem otorisasi dengan cepat.</p>
    </div>
    <div class="action-buttons">
        <a href="user.php" class="btn btn-primary"><i class="fas fa-users"></i> Manajemen User</a>
        <a href="role.php" class="btn btn-success"><i class="fas fa-user-shield"></i> Manajemen Role</a>
        <a href="permission.php" class="btn btn-warning"><i class="fas fa-key"></i> Permission</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
