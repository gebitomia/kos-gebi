<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script type="text/javascript" src="../../lib/sweet.js"></script>
</head>

<body>

	<?php
	include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $idtamu = $_POST['idtamu'];
    $username = $_POST['editusername'];
    $email = $_POST['editemail'];
    $nama = $_POST['editnama'];
    $alamat = $_POST['editalamat'];
    $password = $_POST['editpassword'];

    // Hash password jika diubah
    $sqlGetPassword = $pdo->prepare("SELECT password FROM tamu WHERE idtamu = ?");
    $sqlGetPassword->execute([$idtamu]);
    $existingPassword = $sqlGetPassword->fetchColumn();

    if ($password !== $existingPassword) {
        $password = password_hash($password, PASSWORD_BCRYPT);
    }

    // Query untuk memperbarui data pengguna
    $sqlUpdate = $pdo->prepare("UPDATE tamu SET username = ?, email = ?, nama = ?, alamat = ?, password = ? WHERE idtamu = ?");
    $updated = $sqlUpdate->execute([$username, $email, $nama, $alamat, $password, $idtamu]);

    if ($updated) {
        echo "<script>
            swal({
                type: 'success',
                title: 'Data berhasil diperbarui!',
                showConfirmButton: true,
                backdrop: 'rgba(0,123,0,0.5)',
            }).then(function() {
                window.location.href = '../ datauser.php';
            });
        </script>";
    } else {
        echo "<script>
            swal({
                type: 'error',
                title: 'Terjadi kesalahan, data tidak diperbarui!',
                showConfirmButton: true,
                backdrop: 'rgba(123,0,0,0.5)',
            }).then(function() {
                window.history.back();
            });
        </script>";
    }
} else {
    echo "<script>
        swal({
            type: 'error',
            title: 'Akses tidak diizinkan!',
            showConfirmButton: true,
            backdrop: 'rgba(123,0,0,0.5)',
        }).then(function() {
            window.history.back();
        });
    </script>";
}
?>
