<?php
// ================= admin/tambah_permission.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if(isset($_POST['simpan'])){
$nama=clean($_POST['nama_permission']);
mysqli_query($conn,"
INSERT INTO permissions(nama_permission)
VALUES('$nama')
");
header("Location:permission.php");
}
?>

<div class="card">
<h2>Tambah Permission</h2>

<form method="POST">
<input type="text" name="nama_permission" class="form-control"><br>
<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>