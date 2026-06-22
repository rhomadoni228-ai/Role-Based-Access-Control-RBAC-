<?php
// ======================================================
// auth/proses_login.php
// BLOKIR BERTINGKAT TOTAL (3x,5x,7x)
// hitungan terus lanjut: 1,2,3,4,5,6,7...
// ======================================================

require_once '../config/koneksi.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

// =======================================
// CEK BLOKIR
// =======================================
if(isset($_SESSION['blokir_sampai'])){

    if(time() < $_SESSION['blokir_sampai']){

        $sisa = $_SESSION['blokir_sampai'] - time();

        header("Location: login.php?pesan=blokir&detik=".$sisa);
        exit;

    }else{
        unset($_SESSION['blokir_sampai']);
    }
}

// =======================================
// INPUT
// =======================================
$username = trim($_POST['username']);
$password = trim($_POST['password']);

$ip = $_SERVER['REMOTE_ADDR'];

// =======================================
// CEK USER
// =======================================
$query = mysqli_query($conn,"
SELECT users.*, roles.nama_role
FROM users
JOIN roles ON users.role_id = roles.id
WHERE username='$username'
AND users.status='aktif'
LIMIT 1
");

$data = mysqli_fetch_assoc($query);

// =======================================
// LOGIN BERHASIL
// =======================================
if($data && password_verify($password,$data['password'])){

    $_SESSION['login'] = true;
    $_SESSION['id']    = $data['id'];
    $_SESSION['nama']  = $data['nama_lengkap'];
    $_SESSION['role']  = $data['nama_role'];

    // reset hitungan jika berhasil
    $_SESSION['gagal_login'] = 0;
    unset($_SESSION['blokir_sampai']);

    if($data['nama_role']=='admin'){
        header("Location: ../admin/dashboard.php");
    }elseif($data['nama_role']=='dosen'){
        header("Location: ../dosen/dashboard.php");
    }else{
        header("Location: ../mahasiswa/dashboard.php");
    }
    exit;
}

// =======================================
// LOGIN GAGAL
// =======================================
if(!isset($_SESSION['gagal_login'])){
    $_SESSION['gagal_login'] = 0;
}

// terus naik 1,2,3,4,5,6,7
$_SESSION['gagal_login']++;

$gagal = $_SESSION['gagal_login'];

// =======================================
// BLOKIR BERTINGKAT
// =======================================

// salah ke 7+
if($gagal >= 7){

    $_SESSION['blokir_sampai'] = time() + 300; // 5 menit

    header("Location: login.php?pesan=blokir&detik=300");
    exit;
}

// salah ke 5 atau 6
if($gagal >= 5){

    $_SESSION['blokir_sampai'] = time() + 60; // 1 menit

    header("Location: login.php?pesan=blokir&detik=60");
    exit;
}

// salah ke 3 atau 4
if($gagal >= 3){

    $_SESSION['blokir_sampai'] = time() + 10; // 10 detik

    header("Location: login.php?pesan=blokir&detik=10");
    exit;
}

// salah 1 / 2
header("Location: login.php?pesan=gagal");
exit;
?>