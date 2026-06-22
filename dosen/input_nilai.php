<?php
// ======================================================
// dosen/input_nilai.php
// FINAL : INPUT + EDIT + HAPUS TANPA PINDAH HALAMAN
// ======================================================

include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'dosen') {
    header("Location: ../auth/login.php");
    exit;
}

/* ===============================
   HAPUS DATA
=============================== */
if(isset($_GET['hapus'])){

    $id = (int)$_GET['hapus'];

    mysqli_query($conn,"
    DELETE FROM nilai
    WHERE id='$id'
    ");

    echo "<script>
    alert('Data nilai berhasil dihapus');
    window.location='input_nilai.php';
    </script>";
}

/* ===============================
   SIMPAN BARU
=============================== */
if(isset($_POST['simpan'])){

    $user_id      = $_POST['user_id'];
    $mata_kuliah  = clean($_POST['mata_kuliah']);
    $nilai_angka  = $_POST['nilai_angka'];

    if ($nilai_angka >= 85) $huruf="A";
    elseif ($nilai_angka >= 75) $huruf="B";
    elseif ($nilai_angka >= 65) $huruf="C";
    elseif ($nilai_angka >= 50) $huruf="D";
    else $huruf="E";

    mysqli_query($conn,"
    INSERT INTO nilai(user_id,mata_kuliah,nilai_angka,nilai_huruf)
    VALUES('$user_id','$mata_kuliah','$nilai_angka','$huruf')
    ");

    echo "<script>
    alert('Nilai berhasil disimpan');
    window.location='input_nilai.php';
    </script>";
}

/* ===============================
   UPDATE
=============================== */
if(isset($_POST['update'])){

    $id           = $_POST['id'];
    $user_id      = $_POST['user_id'];
    $mata_kuliah  = clean($_POST['mata_kuliah']);
    $nilai_angka  = $_POST['nilai_angka'];

    if ($nilai_angka >= 85) $huruf="A";
    elseif ($nilai_angka >= 75) $huruf="B";
    elseif ($nilai_angka >= 65) $huruf="C";
    elseif ($nilai_angka >= 50) $huruf="D";
    else $huruf="E";

    mysqli_query($conn,"
    UPDATE nilai SET
    user_id='$user_id',
    mata_kuliah='$mata_kuliah',
    nilai_angka='$nilai_angka',
    nilai_huruf='$huruf'
    WHERE id='$id'
    ");

    echo "<script>
    alert('Nilai berhasil diupdate');
    window.location='input_nilai.php';
    </script>";
}

/* ===============================
   DATA EDIT
=============================== */
$edit = null;

if(isset($_GET['edit'])){

    $id = (int)$_GET['edit'];

    $q = mysqli_query($conn,"
    SELECT * FROM nilai
    WHERE id='$id'
    ");

    $edit = mysqli_fetch_assoc($q);
}

/* ===============================
   MAHASISWA
=============================== */
$mhs = mysqli_query($conn,"
SELECT id,nama_lengkap
FROM users
WHERE role_id='3'
ORDER BY nama_lengkap ASC
");

/* ===============================
   DATA NILAI
=============================== */
$nilai = mysqli_query($conn,"
SELECT nilai.*, users.nama_lengkap
FROM nilai
JOIN users ON nilai.user_id = users.id
ORDER BY nilai.id DESC
");
?>

<!-- ================= FORM ================= -->
<div class="card">

<h2>📝 Input Nilai Mahasiswa</h2>
<br>

<form method="POST">

<?php if($edit){ ?>
<input type="hidden" name="id" value="<?= $edit['id']; ?>">
<?php } ?>

<div class="form-group">
<label>Pilih Mahasiswa</label>

<select name="user_id" class="form-control" required>

<option value="">-- pilih mahasiswa --</option>

<?php while($d=mysqli_fetch_assoc($mhs)){ ?>

<option value="<?= $d['id']; ?>"
<?php if($edit && $edit['user_id']==$d['id']) echo 'selected'; ?>>

<?= $d['nama_lengkap']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">
<label>Mata Kuliah</label>

<select name="mata_kuliah" class="form-control" required>

<?php
$mk = [
'Basis Data',
'Pemrograman Web',
'Keamanan Informasi',
'Algoritma',
'Jaringan Komputer',
'Sistem Operasi',
'Big Data',
'Data Mining'
];

foreach($mk as $m){
?>

<option value="<?= $m; ?>"
<?php if($edit && $edit['mata_kuliah']==$m) echo 'selected'; ?>>

<?= $m; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">
<label>Nilai Angka</label>

<input type="number"
name="nilai_angka"
class="form-control"
min="0"
max="100"
required
value="<?= $edit ? $edit['nilai_angka'] : ''; ?>">

</div>

<?php if($edit){ ?>

<button type="submit"
name="update"
class="btn btn-primary">

✏️ Update Nilai

</button>

<a href="input_nilai.php"
class="btn btn-danger">

Batal

</a>

<?php }else{ ?>

<button type="submit"
name="simpan"
class="btn btn-success">

💾 Simpan Nilai

</button>

<?php } ?>

</form>

</div>

<!-- ================= TABEL ================= -->
<div class="card">

<h2>📋 Data Nilai Mahasiswa</h2>
<br>

<table class="table">

<tr>
<th>No</th>
<th>Nama</th>
<th>Mata Kuliah</th>
<th>Nilai</th>
<th>Huruf</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
while($row=mysqli_fetch_assoc($nilai)){
?>

<tr>

<td><?= $no++; ?></td>
<td><?= $row['nama_lengkap']; ?></td>
<td><?= $row['mata_kuliah']; ?></td>
<td><?= $row['nilai_angka']; ?></td>
<td><?= $row['nilai_huruf']; ?></td>

<td>

<a href="input_nilai.php?edit=<?= $row['id']; ?>"
class="btn btn-primary">
Edit
</a>

<a href="input_nilai.php?hapus=<?= $row['id']; ?>"
class="btn btn-danger"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include '../includes/footer.php'; ?>