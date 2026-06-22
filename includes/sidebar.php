<?php
$role = $_SESSION['role'] ?? 'guest';
$current_page = basename($_SERVER['PHP_SELF']);

function menu_active($file, $current_page) {
    return $file === $current_page ? 'active' : '';
}
?>

<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-mark">
            <i class="fas fa-shield-alt"></i>
        </div>
        <div>
            <strong>RBAC Secure</strong>
            <span>Access Control</span>
        </div>
    </div>

    <button class="menu-toggle" type="button" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
        <span>Menu Navigasi</span>
    </button>

    <nav class="menu-list" id="menuList" aria-label="Navigasi utama">
        <p class="menu-label">Workspace</p>
        <ul>
            <?php if($role == 'admin'): ?>
                <li><a class="<?= menu_active('dashboard.php', $current_page); ?>" href="../admin/dashboard.php"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a></li>
                <li><a class="<?= menu_active('user.php', $current_page); ?>" href="../admin/user.php"><i class="fas fa-users"></i><span>Manajemen User</span></a></li>
                <li><a class="<?= menu_active('role.php', $current_page); ?>" href="../admin/role.php"><i class="fas fa-user-shield"></i><span>Manajemen Role</span></a></li>
                <li><a class="<?= menu_active('permission.php', $current_page); ?>" href="../admin/permission.php"><i class="fas fa-key"></i><span>Permission</span></a></li>
                <li><a class="<?= menu_active('ganti_password.php', $current_page); ?>" href="../admin/ganti_password.php"><i class="fas fa-lock"></i><span>Ganti Password</span></a></li>
            <?php elseif($role == 'dosen'): ?>
                <li><a class="<?= menu_active('dashboard.php', $current_page); ?>" href="../dosen/dashboard.php"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a></li>
                <li><a class="<?= menu_active('mahasiswa.php', $current_page); ?>" href="../dosen/mahasiswa.php"><i class="fas fa-user-graduate"></i><span>Data Mahasiswa</span></a></li>
                <li><a class="<?= menu_active('input_nilai.php', $current_page); ?>" href="../dosen/input_nilai.php"><i class="fas fa-pen-to-square"></i><span>Input Nilai</span></a></li>
                <li><a class="<?= menu_active('ganti_password.php', $current_page); ?>" href="../dosen/ganti_password.php"><i class="fas fa-lock"></i><span>Ganti Password</span></a></li>
            <?php elseif($role == 'mahasiswa'): ?>
                <li><a class="<?= menu_active('dashboard.php', $current_page); ?>" href="../mahasiswa/dashboard.php"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a></li>
                <li><a class="<?= menu_active('nilai.php', $current_page); ?>" href="../mahasiswa/nilai.php"><i class="fas fa-chart-line"></i><span>Nilai Saya</span></a></li>
                <li><a class="<?= menu_active('profil.php', $current_page); ?>" href="../mahasiswa/profil.php"><i class="fas fa-id-card"></i><span>Profil Saya</span></a></li>
                <li><a class="<?= menu_active('ganti_password.php', $current_page); ?>" href="../mahasiswa/ganti_password.php"><i class="fas fa-lock"></i><span>Ganti Password</span></a></li>
            <?php endif; ?>
        </ul>

        <div class="sidebar-user">
            <div class="avatar"><?= strtoupper(substr($_SESSION['nama'] ?? 'U', 0, 1)); ?></div>
            <div>
                <strong><?= htmlspecialchars($_SESSION['nama'] ?? 'User'); ?></strong>
                <span><?= htmlspecialchars(ucfirst($role)); ?></span>
            </div>
        </div>

        <a class="logout-link" href="../auth/logout.php" onclick="return confirm('Yakin ingin logout?')">
            <i class="fas fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </nav>
</aside>

<script>
function toggleMenu() {
    document.getElementById("menuList").classList.toggle("show");
}
</script>
