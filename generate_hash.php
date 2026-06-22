<?php
// ======================================================
// generate_hash.php
// Buat hash password bcrypt
// ======================================================

echo "<h2>Generate Hash Password</h2>";

echo "<b>admin123</b><br>";
echo password_hash("admin123", PASSWORD_DEFAULT);

echo "<hr>";

echo "<b>dosen123</b><br>";
echo password_hash("dosen123", PASSWORD_DEFAULT);

echo "<hr>";

echo "<b>mhs123</b><br>";
echo password_hash("mhs123", PASSWORD_DEFAULT);
?>