<?php
// ================= admin/tambah_user.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if(isset($_POST['simpan'])){
$nama=clean($_POST['nama']);
$user=clean($_POST['username']);
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
$role=$_POST['role_id'];

mysqli_query($conn,"
INSERT INTO users(nama_lengkap,username,password,role_id)
VALUES('$nama','$user','$pass','$role')
");

echo "<script>alert('User berhasil ditambah');window.location='user.php';</script>";
}

$role=mysqli_query($conn,"SELECT * FROM roles");
?>

<div class="card">
<h2>Tambah User</h2>

<form method="POST">
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="form-group">
<label>Role</label>
<select name="role_id" class="form-control">
<?php while($r=mysqli_fetch_assoc($role)): ?>
<option value="<?= $r['id']; ?>"><?= $r['nama_role']; ?></option>
<?php endwhile; ?>
</select>
</div>

<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>