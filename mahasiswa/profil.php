<?php
// ======================================================
// mahasiswa/profil.php
// ======================================================
include '../includes/header.php';
include '../includes/sidebar.php';
include '../includes/navbar.php';

if ($_SESSION['role'] != 'mahasiswa') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_SESSION['id'];

$q = mysqli_query($conn,"
    SELECT users.*, roles.nama_role
    FROM users
    JOIN roles ON users.role_id = roles.id
    WHERE users.id='$id'
");

$user = mysqli_fetch_assoc($q);
?>

<div class="card">
    <h2>Profil Saya</h2>

    <table class="table">
        <tr>
            <th width="30%">Nama Lengkap</th>
            <td><?= $user['nama_lengkap']; ?></td>
        </tr>

        <tr>
            <th>Username</th>
            <td><?= $user['username']; ?></td>
        </tr>

        <tr>
            <th>Role</th>
            <td><?= ucfirst($user['nama_role']); ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td><?= ucfirst($user['status']); ?></td>
        </tr>

        <tr>
            <th>Last Login</th>
            <td><?= $user['last_login']; ?></td>
        </tr>

        <tr>
            <th>Dibuat</th>
            <td><?= $user['created_at']; ?></td>
        </tr>
    </table>
</div>

<?php include '../includes/footer.php'; ?>