<?php
// ======================================================
// dosen/mahasiswa.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'dosen') {
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_query($conn,"
    SELECT *
    FROM users
    WHERE role_id='3'
    ORDER BY id DESC
");
?>

<div class="card">
    <h2>Data Mahasiswa</h2>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Status</th>
            <th>Last Login</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_lengkap']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['last_login']; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</div>

<?php include '../includes/footer.php'; ?>