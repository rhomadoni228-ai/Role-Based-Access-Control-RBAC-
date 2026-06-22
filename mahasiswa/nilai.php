<?php
// ======================================================
// mahasiswa/nilai.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'mahasiswa') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_SESSION['id'];

$data = mysqli_query($conn,"
    SELECT *
    FROM nilai
    WHERE user_id='$id'
    ORDER BY id DESC
");
?>

<div class="card">
    <h2>Data Nilai Saya</h2>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
            <th>Tanggal</th>
        </tr>

        <?php
        $no = 1;
        while($row = mysqli_fetch_assoc($data)):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['mata_kuliah']; ?></td>
            <td><?= $row['nilai_angka']; ?></td>
            <td><?= $row['nilai_huruf']; ?></td>
            <td><?= $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>

<?php include '../includes/footer.php'; ?>