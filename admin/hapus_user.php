<?php
// ================= admin/hapus_user.php =================
include '../includes/header.php';

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
header("Location:user.php");
?>