<?php
// ================= admin/permission.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$data=mysqli_query($conn,"SELECT * FROM permissions");
?>

<div class="card">
<h2>Permission</h2>
<a href="tambah_permission.php" class="btn btn-success">Tambah Permission</a>

<table class="table">
<tr><th>No</th><th>Permission</th><th>Aksi</th></tr>

<?php $no=1; while($d=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama_permission']; ?></td>
<td>
<a href="edit_permission.php?id=<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
<a href="hapus_permission.php?id=<?= $d['id']; ?>" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>

<?php include '../includes/footer.php'; ?>