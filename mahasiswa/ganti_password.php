<?php
// ======================================================
// admin/ganti_password.php
// DOSEN & MAHASISWA SAMA (copy file ini)
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

$id = $_SESSION['id'];

if(isset($_POST['simpan'])){

    $lama  = $_POST['lama'];
    $baru  = $_POST['baru'];
    $ulang = $_POST['ulang'];

    $q = mysqli_query($conn,"SELECT password FROM users WHERE id='$id'");
    $d = mysqli_fetch_assoc($q);

    if(!password_verify($lama, $d['password'])){
        echo "<script>alert('Password lama salah');</script>";
    }elseif($baru != $ulang){
        echo "<script>alert('Konfirmasi password tidak cocok');</script>";
    }else{

        $hash = password_hash($baru, PASSWORD_DEFAULT);

        mysqli_query($conn,"
        UPDATE users SET password='$hash'
        WHERE id='$id'
        ");

        echo "<script>alert('Password berhasil diubah');</script>";
    }
}
?>

<div class="card">
<h2>Ganti Password</h2>

<form method="POST">

<div class="form-group">
<label>Password Lama</label>
<input type="password" id="lama" name="lama"
class="form-control" required>
</div>

<div class="form-group">
<label>Password Baru</label>
<input type="password" id="baru" name="baru"
class="form-control" required>
</div>

<div class="form-group">
<label>Ulangi Password Baru</label>
<input type="password" id="ulang" name="ulang"
class="form-control" required>
</div>

<div class="form-group">
<input type="checkbox" onclick="lihatPassword()">
 Lihat Password
</div>

<button type="submit" name="simpan"
class="btn btn-primary">
Simpan
</button>

</form>
</div>

<script>
function lihatPassword(){

    var a = document.getElementById("lama");
    var b = document.getElementById("baru");
    var c = document.getElementById("ulang");

    if(a.type === "password"){
        a.type = "text";
        b.type = "text";
        c.type = "text";
    }else{
        a.type = "password";
        b.type = "password";
        c.type = "password";
    }
}
</script>

<?php include '../includes/footer.php'; ?>