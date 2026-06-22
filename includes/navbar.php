<?php
// Asumsikan session sudah dimulai dan berisi: $_SESSION['role'], $_SESSION['nama']
?>

<div class="main">

<!-- TOP NAVBAR MODERN V2 -->
<div class="navbar-modern">

    <div class="nav-left">
        <div class="logo-area">
            <i class="fas fa-shield-haltered"></i>
            <div class="brand-text">
                <span class="brand-title">Sistem Keamanan Data</span>
                <span class="brand-sub">RBAC – Role Based Access Control</span>
            </div>
        </div>
    </div>

    <div class="nav-right">
        <div class="user-info">
            <div class="role-indicator">
                <i class="fas fa-user-tag"></i>
                <span><?= ucfirst($_SESSION['role']); ?></span>
            </div>
            <div class="user-name">
                <i class="fas fa-user-circle"></i> <?= $_SESSION['nama']; ?>
            </div>
            <div class="clock-wrapper">
                <i class="far fa-clock"></i>
                <span id="liveClock">--:--:--</span>
            </div>
        </div>
    </div>

</div>

<div class="content">
    <!-- ... konten halaman Anda ... -->
</div>

<!-- Style untuk navbar modern -->
<style>
    /* ========== NAVBAR MODERN ========== */
    .navbar-modern {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(8px);
        padding: 0.75rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
        border-bottom: 1px solid rgba(37, 99, 235, 0.15);
        box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 99;
        flex-wrap: wrap;
    }

    /* Bagian kiri (logo + teks) */
    .logo-area {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .logo-area i {
        font-size: 32px;
        color: #2563eb;
        background: linear-gradient(145deg, #1e3a8a, #3b82f6);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }
    .brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.3;
    }
    .brand-title {
        font-size: 1.25rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1e293b, #2563eb);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        letter-spacing: -0.3px;
    }
    .brand-sub {
        font-size: 0.7rem;
        color: #5b6e8c;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    /* Bagian kanan (user info) */
    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f8fafd;
        padding: 0.4rem 1rem;
        border-radius: 60px;
        transition: all 0.2s;
        border: 1px solid #eef2ff;
    }
    .user-info:hover {
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border-color: #cbd5e1;
    }
    .role-indicator {
        background: #2563eb;
        padding: 5px 12px;
        border-radius: 30px;
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.3px;
    }
    .role-indicator i {
        font-size: 0.7rem;
    }
    .user-name {
        font-weight: 600;
        font-size: 0.85rem;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 6px;
        border-left: 1px solid #e2e8f0;
        padding-left: 12px;
    }
    .user-name i {
        color: #3b6eff;
        font-size: 1rem;
    }
    .clock-wrapper {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #eef2ff;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 500;
        font-family: monospace;
        color: #1e3a8a;
    }
    .clock-wrapper i {
        font-size: 0.7rem;
        color: #2563eb;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar-modern {
            padding: 0.8rem 1rem;
            flex-direction: column;
            align-items: stretch;
        }
        .logo-area {
            justify-content: space-between;
        }
        .user-info {
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            border-radius: 20px;
        }
        .role-indicator, .clock-wrapper {
            padding: 4px 10px;
            font-size: 0.65rem;
        }
        .user-name {
            font-size: 0.8rem;
            border-left: none;
            padding-left: 0;
        }
        .brand-title {
            font-size: 1rem;
        }
        .brand-sub {
            font-size: 0.6rem;
        }
    }

    @media (max-width: 480px) {
        .user-info {
            flex-direction: column;
            align-items: flex-start;
            background: transparent;
            padding: 0;
            gap: 6px;
        }
        .role-indicator, .clock-wrapper, .user-name {
            background: #f8fafd;
            padding: 4px 12px;
            border-radius: 30px;
            width: fit-content;
        }
        .clock-wrapper {
            background: #eef2ff;
        }
    }
</style>

<!-- Script Jam Live -->
<script>
function updateLiveClock() {
    const now = new Date();
    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');
    document.getElementById("liveClock").innerText = `${jam}:${menit}:${detik}`;
}
setInterval(updateLiveClock, 1000);
updateLiveClock();
</script>

<!-- Pastikan Font Awesome 6 sudah di-load (bisa di head atau di sini) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">