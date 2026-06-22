<?php
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../auth/cek_login.php';

$page_title = $page_title ?? 'RBAC Secure System';
$asset_version = filemtime(__DIR__ . '/../assets/css/style.css');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= htmlspecialchars($page_title); ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style.css?v=<?= $asset_version; ?>">
</head>
<body>
<div class="app-shell">
