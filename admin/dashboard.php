<?php
// ================= admin/dashboard.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if($_SESSION['role']!='admin'){ header("Location:../auth/login.php"); exit; }

$u = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM users"));
$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM roles"));
$p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM permissions"));
?>

<div class="card">
<h2>Dashboard Admin</h2>
<p>Selamat datang <b><?= $_SESSION['nama']; ?></b></p>
</div>

<div class="card">
<p>Total User : <b><?= $u['total']; ?></b></p>
<p>Total Role : <b><?= $r['total']; ?></b></p>
<p>Total Permission : <b><?= $p['total']; ?></b></p>
</div>

<?php include '../includes/footer.php'; ?>