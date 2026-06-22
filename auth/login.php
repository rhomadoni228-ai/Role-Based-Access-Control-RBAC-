<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: ../index.php");
    exit;
}

$pesan = $_GET['pesan'] ?? '';
$detik = isset($_GET['detik']) ? (int)$_GET['detik'] : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | RBAC Secure System</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
:root{
  --primary:#2563eb;
  --teal:#0f766e;
  --amber:#f59e0b;
  --ink:#0f172a;
  --muted:#64748b;
  --line:#e2e8f0;
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  min-height:100vh;
  display:grid;
  place-items:center;
  padding:28px;
  color:var(--ink);
  font-family:"Inter", Arial, Helvetica, sans-serif;
  background:
    radial-gradient(circle at 18% 22%, rgba(37,99,235,.22), transparent 23rem),
    radial-gradient(circle at 86% 78%, rgba(15,118,110,.18), transparent 22rem),
    linear-gradient(135deg, #eef6ff 0%, #f8fafc 45%, #f3f7fb 100%);
}
.auth-shell{
  width:min(1080px, 100%);
  display:grid;
  grid-template-columns:1.05fr .95fr;
  overflow:hidden;
  border:1px solid rgba(226,232,240,.9);
  border-radius:18px;
  background:rgba(255,255,255,.88);
  box-shadow:0 28px 80px rgba(15,23,42,.16);
  backdrop-filter:blur(18px);
}
.auth-hero{
  position:relative;
  min-height:620px;
  padding:44px;
  color:#fff;
  background:
    linear-gradient(160deg, rgba(15,23,42,.96), rgba(30,64,175,.9)),
    url("../assets/css/img/unwaha.jpg") center/cover;
}
.auth-hero::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg, rgba(15,23,42,.04), rgba(15,23,42,.72));
}
.hero-content{
  position:relative;
  z-index:1;
  height:100%;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  gap:36px;
}
.brand-row{
  display:flex;
  align-items:center;
  gap:13px;
}
.brand-icon{
  width:48px;
  height:48px;
  display:grid;
  place-items:center;
  border-radius:12px;
  background:#fff;
  color:var(--primary);
}
.brand-row strong{display:block;font-size:19px}
.brand-row span{display:block;color:#cbd5e1;font-size:13px;margin-top:3px}
.hero-copy h1{
  max-width:560px;
  font-size:44px;
  line-height:1.08;
  letter-spacing:0;
  margin-bottom:18px;
}
.hero-copy p{
  max-width:560px;
  color:#dbeafe;
  font-size:16px;
  line-height:1.75;
}
.feature-grid{
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  gap:12px;
}
.feature{
  min-height:96px;
  padding:16px;
  border:1px solid rgba(255,255,255,.16);
  border-radius:12px;
  background:rgba(255,255,255,.1);
}
.feature i{color:#93c5fd;margin-bottom:10px}
.feature strong{display:block;font-size:13px;margin-bottom:4px}
.feature span{display:block;color:#cbd5e1;font-size:12px;line-height:1.5}
.auth-panel{
  display:flex;
  align-items:center;
  justify-content:center;
  padding:44px;
  background:linear-gradient(180deg, rgba(255,255,255,.95), rgba(248,250,252,.95));
}
.login-card{width:100%;max-width:430px}
.logo-img{
  width:76px;
  height:76px;
  display:block;
  object-fit:contain;
  border:1px solid var(--line);
  border-radius:16px;
  padding:6px;
  margin-bottom:22px;
  background:#fff;
  box-shadow:0 14px 32px rgba(15,23,42,.1);
}
.login-card h2{
  font-size:30px;
  line-height:1.15;
  margin-bottom:8px;
}
.login-card .sub{
  color:var(--muted);
  line-height:1.65;
  margin-bottom:24px;
}
.alert-modern{
  display:flex;
  gap:11px;
  align-items:flex-start;
  padding:13px 14px;
  border-radius:10px;
  margin-bottom:18px;
  font-size:13px;
  font-weight:700;
  line-height:1.5;
}
.alert-error{background:#fee2e2;color:#991b1b;border:1px solid #fecaca}
.alert-lock{background:#fef3c7;color:#92400e;border:1px solid #fde68a}
.alert-success{background:#dcfce7;color:#166534;border:1px solid #bbf7d0}
.input-group{margin-bottom:16px}
.input-label{
  display:flex;
  align-items:center;
  gap:8px;
  margin-bottom:8px;
  color:#334155;
  font-size:13px;
  font-weight:800;
}
.input-label i{color:var(--primary)}
.input-field{
  width:100%;
  min-height:48px;
  padding:12px 13px;
  border:1px solid #cbd5e1;
  border-radius:10px;
  outline:none;
  color:var(--ink);
  background:#fff;
  font:inherit;
  font-weight:600;
  transition:.16s ease;
}
.input-field:focus{
  border-color:var(--primary);
  box-shadow:0 0 0 4px rgba(37,99,235,.12);
}
.checkbox-wrapper{
  display:flex;
  align-items:center;
  gap:9px;
  margin:10px 0 22px;
  color:#475569;
  font-size:13px;
  font-weight:700;
  cursor:pointer;
}
.checkbox-wrapper input{
  width:17px;
  height:17px;
  accent-color:var(--primary);
}
.login-btn{
  width:100%;
  min-height:50px;
  display:flex;
  align-items:center;
  justify-content:center;
  gap:10px;
  border:0;
  border-radius:10px;
  color:#fff;
  background:linear-gradient(135deg, var(--primary), var(--teal));
  box-shadow:0 16px 34px rgba(37,99,235,.24);
  cursor:pointer;
  font:inherit;
  font-weight:800;
  transition:.18s ease;
}
.login-btn:hover:not(:disabled){
  transform:translateY(-1px);
  box-shadow:0 18px 38px rgba(37,99,235,.3);
}
.login-btn:disabled{
  opacity:.65;
  cursor:not-allowed;
}
.form-lock{
  opacity:.62;
  pointer-events:none;
}
.help-link{
  display:flex;
  align-items:center;
  justify-content:center;
  gap:8px;
  margin-top:20px;
  color:var(--muted);
  font-size:12px;
  font-weight:700;
}
#timer{
  display:inline-block;
  min-width:32px;
  padding:1px 7px;
  border-radius:999px;
  color:#78350f;
  background:#fde68a;
  text-align:center;
  font-family:"Courier New", monospace;
}
@media(max-width:900px){
  body{padding:16px}
  .auth-shell{grid-template-columns:1fr}
  .auth-hero{min-height:auto;padding:28px}
  .hero-copy h1{font-size:32px}
  .feature-grid{grid-template-columns:1fr}
  .auth-panel{padding:28px}
}
</style>
</head>
<body>
<div class="auth-shell">
  <section class="auth-hero">
    <div class="hero-content">
      <div class="brand-row">
        <div class="brand-icon"><i class="fas fa-shield-alt"></i></div>
        <div>
          <strong>RBAC Secure System</strong>
          <span>Autentikasi dan otorisasi aplikasi</span>
        </div>
      </div>

      <div class="hero-copy">
        <h1>Portal akses modern untuk admin, dosen, dan mahasiswa.</h1>
        <p>Sistem ini mengatur hak akses pengguna berdasarkan role, menjaga proses login, dan membatasi fitur sesuai kewenangan setiap akun.</p>
      </div>

      <div class="feature-grid">
        <div class="feature">
          <i class="fas fa-user-lock"></i>
          <strong>Autentikasi</strong>
          <span>Login aman dengan password terenkripsi.</span>
        </div>
        <div class="feature">
          <i class="fas fa-users-gear"></i>
          <strong>Otorisasi</strong>
          <span>Akses menu mengikuti role pengguna.</span>
        </div>
        <div class="feature">
          <i class="fas fa-chart-line"></i>
          <strong>Dashboard</strong>
          <span>Informasi penting tampil ringkas.</span>
        </div>
      </div>
    </div>
  </section>

  <section class="auth-panel">
    <div class="login-card">
      <img src="../assets/css/img/unwaha.jpg" alt="Logo UNWAHA" class="logo-img" onerror="this.style.display='none'">
      <h2>Masuk ke Sistem</h2>
      <p class="sub">Gunakan nama pengguna dan password yang sudah tersedia untuk membuka dashboard sesuai role akun.</p>

      <?php if($pesan == 'gagal'): ?>
        <div class="alert-modern alert-error">
          <i class="fas fa-circle-exclamation"></i>
          <span>Username atau password yang Anda masukkan salah.</span>
        </div>
      <?php endif; ?>

      <?php if($pesan == 'blokir'): ?>
        <div class="alert-modern alert-lock">
          <i class="fas fa-hourglass-half"></i>
          <span>Terlalu banyak percobaan gagal. Silakan tunggu <strong><span id="timer"><?= $detik; ?></span> detik</strong> sebelum mencoba lagi.</span>
        </div>
      <?php endif; ?>

      <?php if(isset($_GET['logout'])): ?>
        <div class="alert-modern alert-success">
          <i class="fas fa-check-circle"></i>
          <span>Anda berhasil keluar dari sistem.</span>
        </div>
      <?php endif; ?>

      <form action="proses_login.php" method="POST" <?= $pesan == 'blokir' ? 'class="form-lock"' : ''; ?>>
        <div class="input-group">
          <label class="input-label" for="username"><i class="fas fa-user"></i> Nama Pengguna</label>
          <input type="text" name="username" id="username" class="input-field" placeholder="Masukkan username" autocomplete="username" required>
        </div>

        <div class="input-group">
          <label class="input-label" for="passwordField"><i class="fas fa-lock"></i> Password</label>
          <input type="password" name="password" id="passwordField" class="input-field" placeholder="Masukkan password" autocomplete="current-password" required>
        </div>

        <label class="checkbox-wrapper">
          <input type="checkbox" onclick="togglePasswordVisibility()">
          <span>Tampilkan password</span>
        </label>

        <button type="submit" class="login-btn" <?= $pesan == 'blokir' ? 'disabled' : ''; ?>>
          <i class="fas fa-arrow-right-to-bracket"></i>
          <span>Masuk Dashboard</span>
        </button>
      </form>

      <div class="help-link">
        <i class="fas fa-circle-info"></i>
        <span>Hubungi administrator jika akses bermasalah.</span>
      </div>
    </div>
  </section>
</div>

<script>
function togglePasswordVisibility() {
  const passInput = document.getElementById('passwordField');
  passInput.type = passInput.type === 'password' ? 'text' : 'password';
}

<?php if($pesan == 'blokir' && $detik > 0): ?>
let remaining = <?= $detik; ?>;
const timerSpan = document.getElementById('timer');
if (timerSpan) {
  const countdown = setInterval(function() {
    remaining--;
    timerSpan.innerText = remaining;
    if (remaining <= 0) {
      clearInterval(countdown);
      window.location.href = "login.php";
    }
  }, 1000);
}
<?php endif; ?>
</script>
</body>
</html>
