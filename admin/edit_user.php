<?php
// ================= admin/edit_user.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$id=$_GET['id'];
$q=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$d=mysqli_fetch_assoc($q);

if(isset($_POST['update'])){
$nama=clean($_POST['nama']);
$user=clean($_POST['username']);
$role=$_POST['role_id'];
$status=$_POST['status'];

mysqli_query($conn,"
UPDATE users SET
nama_lengkap='$nama',
username='$user',
role_id='$role',
status='$status'
WHERE id='$id'
");

echo "<script>alert('User diupdate');window.location='user.php';</script>";
}

$role=mysqli_query($conn,"SELECT * FROM roles");
?>

<div class="card">
<h2>Edit User</h2>

<form method="POST">
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="<?= $d['nama_lengkap']; ?>">
</div>

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" value="<?= $d['username']; ?>">
</div>

<div class="form-group">
<label>Role</label>
<select name="role_id" class="form-control">
<?php while($r=mysqli_fetch_assoc($role)): ?>
<option value="<?= $r['id']; ?>" <?= $d['role_id']==$r['id']?'selected':''; ?>>
<?= $r['nama_role']; ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control">
<option value="aktif">aktif</option>
<option value="nonaktif">nonaktif</option>
</select>
</div>

<button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>