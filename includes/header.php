<?php
// ======================================================
// includes/header.php
// FINAL MODERN HEADER + RESPONSIVE
// ======================================================

require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../auth/cek_login.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>RBAC Secure System</title>

<link rel="stylesheet" href="../assets/css/style.css">

<style>
:root{
    --primary:#2563eb;
    --dark:#111827;
    --light:#f8fafc;
    --text:#1e293b;
}

*{
    box-sizing:border-box;
}

body{
    margin:0;
    padding:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#eef2f7;
    color:var(--text);
}

/* Layout utama */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* Konten kanan */
.main{
    flex:1;
    display:flex;
    flex-direction:column;
    min-width:0;
}

/* Top Header */
.top-header{
    background:#ffffff;
    padding:14px 24px;
    border-bottom:1px solid #e5e7eb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 8px rgba(0,0,0,.03);
    position:sticky;
    top:0;
    z-index:99;
}

.top-header .title{
    font-size:20px;
    font-weight:700;
    color:var(--primary);
}

.top-header .user-info{
    font-size:14px;
    color:#64748b;
}

/* Content Area */
.content{
    padding:25px;
}

/* Card modern */
.card{
    background:#fff;
    border-radius:16px;
    padding:22px;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
    margin-bottom:20px;
}

/* Mobile */
@media(max-width:768px){

    .wrapper{
        flex-direction:column;
    }

    .top-header{
        padding:12px 15px;
        flex-direction:column;
        align-items:flex-start;
        gap:6px;
    }

    .top-header .title{
        font-size:18px;
    }

    .content{
        padding:15px;
    }
}
</style>

</head>
<body>

<div class="wrapper">