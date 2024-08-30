<?php
require_once "koneksi.php";

// Data user yang akan ditambahkan
$username = 'Nimadkos';  
$password = 'Admin1234-'; 

// Hash password menggunakan password_hash dengan algoritma BCRYPT
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Menyimpan user baru ke dalam database
$sql = "INSERT INTO login (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashed_password);

if($stmt->execute()) {
    echo "User berhasil ditambahkan!";
} else {
    echo "Terjadi kesalahan saat menambahkan user.";
}
?>
