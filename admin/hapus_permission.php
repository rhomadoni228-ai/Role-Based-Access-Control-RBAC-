<?php
// ================= admin/hapus_permission.php =================
include '../includes/header.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM permissions WHERE id='$id'");
header("Location:permission.php");
?>