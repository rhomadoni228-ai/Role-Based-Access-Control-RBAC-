<?php
// ======================================================
// auth/login.php
// PROFESSIONAL LOGIN PAGE - MODERN & RESPONSIVE
// ======================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: ../index.php");
    exit;
}

$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
$detik = isset($_GET['detik']) ? (int)$_GET['detik'] : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Login | Sistem Administrasi</title>

<!-- Google Fonts + Font Awesome 6 (Professional Icons) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0B1120 0%, #19233C 50%, #2A3A5E 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    position: relative;
  }

  /* decorative background elements */
  body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 50%, rgba(66, 153, 225, 0.15) 0%, rgba(0,0,0,0) 60%);
    pointer-events: none;
  }

  /* main card */
  .login-card {
    max-width: 460px;
    width: 100%;
    background: rgba(255, 255, 255, 0.97);
    backdrop-filter: blur(2px);
    border-radius: 2rem;
    box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.35), 0 1px 2px rgba(0,0,0,0.05);
    overflow: hidden;
    transition: transform 0.2s ease;
  }

  .login-card:hover {
    transform: translateY(-3px);
  }

  /* logo area professional */
  .logo-container {
    background: linear-gradient(115deg, #F8FAFF 0%, #FFFFFF 100%);
    padding: 2rem 1.5rem 1rem 1.5rem;
    text-align: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  }

  /* styling logo gambar */
  .logo-img {
    width: 85px;
    height: 85px;
    object-fit: contain;
    border-radius: 24px;
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
    background: white;
    padding: 4px;
    transition: transform 0.2s ease;
  }

  .logo-img:hover {
    transform: scale(1.02);
  }

  .brand-title {
    font-size: 1.9rem;
    font-weight: 700;
    letter-spacing: -0.3px;
    background: linear-gradient(135deg, #1E2A47, #2D3A64);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    margin-bottom: 0.25rem;
  }

  .brand-sub {
    font-size: 0.85rem;
    color: #5b6e8c;
    font-weight: 500;
    margin-top: 0.25rem;
  }

  /* form area */
  .form-wrapper {
    padding: 2rem 1.8rem 2rem 1.8rem;
  }

  /* alert custom styles */
  .alert-modern {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0.9rem 1.2rem;
    border-radius: 1rem;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
    font-weight: 500;
    backdrop-filter: blur(2px);
  }

  .alert-modern i {
    font-size: 1.3rem;
  }

  .alert-error {
    background: #FEF2F2;
    border-left: 4px solid #DC2626;
    color: #991B1B;
  }

  .alert-lock {
    background: #FFFBEB;
    border-left: 4px solid #F59E0B;
    color: #92400E;
  }

  .alert-success {
    background: #ECFDF5;
    border-left: 4px solid #10B981;
    color: #065F46;
  }

  /* input groups */
  .input-group {
    margin-bottom: 1.6rem;
  }

  .input-label {
    display: block;
    font-weight: 600;
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
    color: #1f2a48;
    letter-spacing: -0.2px;
  }

  .input-label i {
    width: 20px;
    color: #3b6eff;
    margin-right: 6px;
  }

  .input-field {
    width: 100%;
    padding: 0.9rem 1rem;
    font-size: 0.95rem;
    font-family: 'Inter', monospace;
    border: 1.5px solid #E2E8F0;
    border-radius: 1rem;
    background-color: #FEFEFE;
    transition: all 0.2s;
    outline: none;
    font-weight: 500;
  }

  .input-field:focus {
    border-color: #3b6eff;
    box-shadow: 0 0 0 3px rgba(59, 110, 255, 0.2);
  }

  /* checkbox custom */
  .checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 1.8rem;
    font-size: 0.85rem;
    font-weight: 500;
    color: #2d3d66;
    cursor: pointer;
  }

  .checkbox-wrapper input {
    width: 18px;
    height: 18px;
    accent-color: #2563eb;
    cursor: pointer;
  }

  /* login button */
  .login-btn {
    background: linear-gradient(95deg, #1e3a8a, #2563eb);
    width: 100%;
    border: none;
    padding: 0.9rem;
    border-radius: 1.2rem;
    font-weight: 700;
    font-size: 1rem;
    font-family: 'Inter', sans-serif;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 5px 12px rgba(37, 99, 235, 0.25);
  }

  .login-btn:hover:not(:disabled) {
    background: linear-gradient(95deg, #153175, #1e56e0);
    transform: scale(0.98);
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
  }

  .login-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
  }

  /* disabled form state (blokir) */
  .form-lock {
    opacity: 0.6;
    pointer-events: none;
    filter: blur(0.6px);
  }

  /* footer link */
  .help-link {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.75rem;
    color: #617394;
  }

  .help-link a {
    color: #2c5fef;
    text-decoration: none;
    font-weight: 600;
  }

  .help-link a:hover {
    text-decoration: underline;
  }

  /* timer highlight */
  #timer {
    font-weight: 800;
    background: #FDE68A;
    padding: 0 6px;
    border-radius: 40px;
    display: inline-block;
    font-family: monospace;
  }

  @media (max-width: 480px) {
    .form-wrapper {
      padding: 1.5rem;
    }
    .login-card {
      border-radius: 1.5rem;
    }
    .logo-img {
      width: 70px;
      height: 70px;
    }
    .brand-title {
      font-size: 1.6rem;
    }
  }
</style>
</head>
<body>

<div class="login-card">
  <div class="logo-container">
    <!-- Logo UNWAHA dengan styling sempurna -->
    <img src="../assets/img/unwaha.jpg"
         alt="Logo UNWAHA"
         class="logo-img"
         onerror="this.onerror=null; this.src='https://placehold.co/85x85?text=Logo'">
    <div class="brand-title">Sistem Akses</div>
    <div class="brand-sub">Portal Administrasi Terpadu</div>
  </div>

  <div class="form-wrapper">
    <!-- Notifikasi dinamis -->
    <?php if($pesan == 'gagal'): ?>
      <div class="alert-modern alert-error">
        <i class="fas fa-circle-exclamation"></i>
        <span>Username atau Password yang Anda masukkan salah.</span>
      </div>
    <?php endif; ?>

    <?php if($pesan == 'blokir'): ?>
      <div class="alert-modern alert-lock">
        <i class="fas fa-hourglass-half"></i>
        <span>Terlalu banyak percobaan gagal. Silakan tunggu <strong><span id="timer"><?php echo $detik; ?></span> detik</strong> sebelum mencoba lagi.</span>
      </div>
    <?php endif; ?>

    <?php if(isset($_GET['logout'])): ?>
      <div class="alert-modern alert-success">
        <i class="fas fa-check-circle"></i>
        <span>Anda telah berhasil keluar dari sistem.</span>
      </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form action="proses_login.php" method="POST" <?php if($pesan == 'blokir') echo 'class="form-lock"'; ?>>
      <div class="input-group">
        <div class="input-label">
          <i class="fas fa-user"></i> Nama Pengguna
        </div>
        <input type="text" name="username" class="input-field" placeholder="admin / staff" autocomplete="username" required>
      </div>

      <div class="input-group">
        <div class="input-label">
          <i class="fas fa-lock"></i> Kata Sandi
        </div>
        <input type="password" name="password" id="passwordField" class="input-field" placeholder="••••••••" autocomplete="current-password" required>
      </div>

      <label class="checkbox-wrapper">
        <input type="checkbox" onclick="togglePasswordVisibility()"> 
        <span><i class="far fa-eye"></i> Tampilkan kata sandi</span>
      </label>

      <button type="submit" class="login-btn" <?php if($pesan == 'blokir') echo 'disabled'; ?>>
        <i class="fas fa-arrow-right-to-bracket"></i> MASUK KE DASHBOARD
      </button>
    </form>

    <div class="help-link">
      <i class="fas fa-headset"></i> Butuh bantuan? <a href="#">Hubungi Administrator</a>
    </div>
  </div>
</div>

<script>
  // fungsi toggle password
  function togglePasswordVisibility() {
    const passInput = document.getElementById('passwordField');
    if (passInput.type === 'password') {
      passInput.type = 'text';
    } else {
      passInput.type = 'password';
    }
  }

  // Timer countdown otomatis jika dalam status blokir
  <?php if($pesan == 'blokir' && $detik > 0): ?>
    let remaining = <?php echo $detik; ?>;
    const timerSpan = document.getElementById('timer');
    if (timerSpan) {
      const countdown = setInterval(function() {
        remaining--;
        if (timerSpan) timerSpan.innerText = remaining;
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