<?php
// ================= admin/role.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$data=mysqli_query($conn,"SELECT * FROM roles");
?>

<div class="card">
<h2>Manajemen Role</h2>
<a href="tambah_role.php" class="btn btn-success">Tambah Role</a>

<table class="table">
<tr><th>No</th><th>Nama Role</th><th>Aksi</th></tr>
<?php $no=1; while($d=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama_role']; ?></td>
<td>
<a href="edit_role.php?id=<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
<a href="hapus_role.php?id=<?= $d['id']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>

<?php include '../includes/footer.php'; ?>