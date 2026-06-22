<?php
// ======================================================
// dosen/edit_nilai.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'dosen') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];

$q = mysqli_query($conn,"
    SELECT nilai.*, users.nama_lengkap
    FROM nilai
    JOIN users ON nilai.user_id = users.id
    WHERE nilai.id='$id'
");

$data = mysqli_fetch_assoc($q);

// update
if (isset($_POST['update'])) {

    $mk    = clean($_POST['mata_kuliah']);
    $angka = $_POST['nilai_angka'];

    if ($angka >= 85) $huruf = "A";
    elseif ($angka >= 75) $huruf = "B";
    elseif ($angka >= 65) $huruf = "C";
    elseif ($angka >= 50) $huruf = "D";
    else $huruf = "E";

    mysqli_query($conn,"
        UPDATE nilai SET
        mata_kuliah='$mk',
        nilai_angka='$angka',
        nilai_huruf='$huruf'
        WHERE id='$id'
    ");

    echo "<script>
        alert('Nilai berhasil diupdate');
        window.location='dashboard.php';
    </script>";
}
?>

<div class="card">
    <h2>Edit Nilai</h2>

    <form method="POST">

        <div class="form-group">
            <label>Mahasiswa</label>
            <input type="text"
                   class="form-control"
                   value="<?= $data['nama_lengkap']; ?>"
                   readonly>
        </div>

        <div class="form-group">
            <label>Mata Kuliah</label>
            <input type="text"
                   name="mata_kuliah"
                   class="form-control"
                   value="<?= $data['mata_kuliah']; ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Nilai Angka</label>
            <input type="number"
                   name="nilai_angka"
                   class="form-control"
                   value="<?= $data['nilai_angka']; ?>"
                   required>
        </div>

        <button type="submit"
                name="update"
                class="btn btn-primary">
            Update
        </button>

    </form>
</div>

<?php include '../includes/footer.php'; ?>