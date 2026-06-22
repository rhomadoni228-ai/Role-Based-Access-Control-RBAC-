<?php
// ================= admin/tambah_role.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if(isset($_POST['simpan'])){
$nama=clean($_POST['nama_role']);
mysqli_query($conn,"INSERT INTO roles(nama_role) VALUES('$nama')");
header("Location:role.php");
}
?>

<div class="card">
<h2>Tambah Role</h2>

<form method="POST">
<input type="text" name="nama_role" class="form-control" required><br>
<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>