<?php
$role = $_SESSION['role'] ?? 'guest';
$nama = $_SESSION['nama'] ?? 'User';
?>

<main class="main">
    <header class="topbar">
        <div>
            <p class="eyebrow">Sistem Keamanan Data</p>
            <h1><?= htmlspecialchars($page_heading ?? 'Role Based Access Control'); ?></h1>
        </div>

        <div class="topbar-actions">
            <div class="status-pill">
                <i class="fas fa-user-tag"></i>
                <span><?= htmlspecialchars(ucfirst($role)); ?></span>
            </div>
            <div class="status-pill muted">
                <i class="far fa-clock"></i>
                <span id="liveClock">--:--:--</span>
            </div>
            <div class="profile-chip">
                <span><?= htmlspecialchars($nama); ?></span>
                <div class="avatar small"><?= strtoupper(substr($nama, 0, 1)); ?></div>
            </div>
        </div>
    </header>

    <section class="content">

<script>
function updateLiveClock() {
    const now = new Date();
    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');
    const clock = document.getElementById("liveClock");
    if (clock) clock.innerText = `${jam}:${menit}:${detik}`;
}
setInterval(updateLiveClock, 1000);
updateLiveClock();
</script>
