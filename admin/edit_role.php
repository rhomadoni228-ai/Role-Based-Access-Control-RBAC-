<?php
// ================= admin/edit_role.php =================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$id=$_GET['id'];
$q=mysqli_query($conn,"SELECT * FROM roles WHERE id='$id'");
$d=mysqli_fetch_assoc($q);

if(isset($_POST['update'])){
$nama=clean($_POST['nama_role']);
mysqli_query($conn,"UPDATE roles SET nama_role='$nama' WHERE id='$id'");
header("Location:role.php");
}
?>

<div class="card">
<h2>Edit Role</h2>

<form method="POST">
<input type="text" name="nama_role" class="form-control"
value="<?= $d['nama_role']; ?>"><br>
<button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>

<?php include '../includes/footer.php'; ?>