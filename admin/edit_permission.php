<?php
// ================= admin/edit_permission.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$id=$_GET['id'];
$q=mysqli_query($conn,"SELECT * FROM permissions WHERE id='$id'");
$d=mysqli_fetch_assoc($q);

if(isset($_POST['update'])){
$nama=clean($_POST['nama_permission']);
mysqli_query($conn,"
UPDATE permissions
SET nama_permission='$nama'
WHERE id='$id'
");
header("Location:permission.php");
}
?>

<div class="card">
<h2>Edit Permission</h2>

<form method="POST">
<input type="text" name="nama_permission"
class="form-control"
value="<?= $d['nama_permission']; ?>"><br>

<button type="submit" name="update"
class="btn btn-primary">Update</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>