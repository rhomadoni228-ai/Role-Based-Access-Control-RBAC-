<?php
// ================= admin/hapus_role.php =================
include '../includes/header.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM roles WHERE id='$id'");
header("Location:role.php");
?>