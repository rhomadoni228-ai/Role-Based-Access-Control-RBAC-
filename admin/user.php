<?php
// ======================================================
// admin/user.php
// REALTIME USER ONLINE + AUTO REFRESH MODERN
// ======================================================

include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

// semua user
$data = mysqli_query($conn,"
SELECT users.*, roles.nama_role
FROM users
JOIN roles ON users.role_id = roles.id
ORDER BY users.id DESC
");

// terbaru login
$terbaru = mysqli_query($conn,"
SELECT users.nama_lengkap, users.username, roles.nama_role, users.last_login
FROM users
JOIN roles ON users.role_id = roles.id
WHERE users.last_login IS NOT NULL
ORDER BY users.last_login DESC
LIMIT 5
");

// hitung online (aktif 5 menit terakhir)
$online = mysqli_query($conn,"
SELECT COUNT(*) as total
FROM users
WHERE last_login >= NOW() - INTERVAL 5 MINUTE
");

$o = mysqli_fetch_assoc($online);
?>

<div class="card">

<h2>👤 Manajemen User</h2>

<p>
🟢 User Online Sekarang :
<strong><?= $o['total']; ?></strong>
</p>

<p id="refreshInfo">
🔄 Auto refresh tiap 10 detik
</p>

</div>

<!-- TERBARU LOGIN -->
<div class="card">

<h3>🟢 User Terbaru Login</h3>
<br>

<table class="table">
<tr>
<th>Nama</th>
<th>Username</th>
<th>Role</th>
<th>Last Login</th>
</tr>

<?php while($r=mysqli_fetch_assoc($terbaru)){ ?>
<tr>
<td><?= $r['nama_lengkap']; ?></td>
<td><?= $r['username']; ?></td>
<td><?= ucfirst($r['nama_role']); ?></td>
<td><?= $r['last_login']; ?></td>
</tr>
<?php } ?>

</table>

</div>

<!-- DATA USER -->
<div class="card">

<h3>📋 Semua User</h3>
<br>

<table class="table">

<tr>
<th>No</th>
<th>Nama</th>
<th>Username</th>
<th>Role</th>
<th>Status</th>
<th>Online</th>
<th>Last Login</th>
</tr>

<?php
$no=1;
while($row=mysqli_fetch_assoc($data)){

$aktif = '-';

if($row['last_login'] != NULL){

    $selisih = strtotime(date('Y-m-d H:i:s')) - strtotime($row['last_login']);

    if($selisih <= 300){
        $aktif = "<span style='color:green;font-weight:bold;'>🟢 Online</span>";
    }else{
        $aktif = "<span style='color:red;'>🔴 Offline</span>";
    }
}
?>

<tr>
<td><?= $no++; ?></td>
<td><?= $row['nama_lengkap']; ?></td>
<td><?= $row['username']; ?></td>
<td><?= ucfirst($row['nama_role']); ?></td>
<td><?= ucfirst($row['status']); ?></td>
<td><?= $aktif; ?></td>
<td><?= $row['last_login'] ? $row['last_login'] : '-'; ?></td>
</tr>

<?php } ?>

</table>

</div>

<script>
// auto refresh modern
setTimeout(function(){
    location.reload();
},10000);
</script>

<?php include '../includes/footer.php'; ?>