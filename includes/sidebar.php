<?php
$role = $_SESSION['role'] ?? 'guest';
?>

<style>
/* ========== SIDEBAR MODERN ========== */
.sidebar {
    width: 280px;
    background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
    backdrop-filter: blur(2px);
    color: #f1f5f9;
    padding: 1.8rem 1.2rem;
    box-shadow: 6px 0 20px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
    transition: all 0.3s ease;
    z-index: 100;
}

/* scrollbar */
.sidebar::-webkit-scrollbar {
    width: 4px;
}
.sidebar::-webkit-scrollbar-track {
    background: #1e293b;
}
.sidebar::-webkit-scrollbar-thumb {
    background: #3b82f6;
    border-radius: 10px;
}

.brand {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
.brand h3 {
    font-size: 1.7rem;
    font-weight: 800;
    background: linear-gradient(135deg, #fff, #93c5fd);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    margin-bottom: 0.3rem;
    letter-spacing: -0.3px;
}
.brand small {
    color: #94a3b8;
    font-size: 0.7rem;
    font-weight: 500;
}

/* menu title */
.menu-title {
    color: #94a3b8;
    font-size: 0.7rem;
    letter-spacing: 1px;
    margin: 1.5rem 0 0.8rem 0.5rem;
    text-transform: uppercase;
    font-weight: 600;
}

/* menu list */
.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar ul li {
    margin-bottom: 0.5rem;
}
.sidebar ul li a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #cbd5e6;
    text-decoration: none;
    padding: 0.7rem 1rem;
    border-radius: 14px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.2s;
}
.sidebar ul li a i {
    width: 24px;
    font-size: 1.2rem;
    text-align: center;
}
.sidebar ul li a:hover {
    background: rgba(59, 130, 246, 0.3);
    color: white;
    transform: translateX(4px);
}
.sidebar ul li a.active {
    background: #2563eb;
    color: white;
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
}
.sidebar ul li.logout {
    margin-top: 1.5rem;
    padding-top: 0.8rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.sidebar ul li.logout a {
    background: rgba(220, 38, 38, 0.2);
    color: #fecaca;
}
.sidebar ul li.logout a:hover {
    background: #dc2626;
    color: white;
    transform: translateX(4px);
}

/* toggle button mobile */
.menu-toggle {
    display: none;
    width: 100%;
    background: #2563eb;
    border: none;
    color: white;
    padding: 0.8rem;
    border-radius: 14px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: 0.2s;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.menu-toggle:hover {
    background: #1d4ed8;
}

/* responsive */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 1rem;
    }
    .menu-toggle {
        display: flex;
    }
    .menu-list {
        display: none;
    }
    .menu-list.show {
        display: block;
    }
    .brand h3 {
        font-size: 1.4rem;
    }
}
</style>

<div class="sidebar">
    <div class="brand">
        <h3>RBAC MENU</h3>
        <small>Secure Access Panel</small>
    </div>

    <button class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i> Menu Navigasi
    </button>

    <div class="menu-list" id="menuList">
        <div class="menu-title">Main Menu</div>
        <ul>
            <?php if($role == 'admin'): ?>
                <li><a href="../admin/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="../admin/user.php"><i class="fas fa-users"></i> Manajemen User</a></li>
                <li><a href="../admin/role.php"><i class="fas fa-shield-alt"></i> Manajemen Role</a></li>
                <li><a href="../admin/permission.php"><i class="fas fa-key"></i> Permission</a></li>
                <li><a href="../admin/ganti_password.php"><i class="fas fa-lock"></i> Ganti Password</a></li>
            <?php elseif($role == 'dosen'): ?>
                <li><a href="../dosen/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="../dosen/mahasiswa.php"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a></li>
                <li><a href="../dosen/input_nilai.php"><i class="fas fa-edit"></i> Input Nilai</a></li>
                <li><a href="../dosen/ganti_password.php"><i class="fas fa-lock"></i> Ganti Password</a></li>
            <?php elseif($role == 'mahasiswa'): ?>
                <li><a href="../mahasiswa/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="../mahasiswa/nilai.php"><i class="fas fa-chart-line"></i> Nilai Saya</a></li>
                <li><a href="../mahasiswa/profil.php"><i class="fas fa-id-card"></i> Profil Saya</a></li>
                <li><a href="../mahasiswa/ganti_password.php"><i class="fas fa-lock"></i> Ganti Password</a></li>
            <?php endif; ?>
            <li class="logout">
                <a href="../auth/logout.php" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
function toggleMenu() {
    document.getElementById("menuList").classList.toggle("show");
}
</script>