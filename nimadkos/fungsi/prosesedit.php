<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script type="text/javascript" src="../../lib/sweet.js"></script>
</head>

<body>

<?php
include "koneksi.php";

// Ambil data dari form
$id = $_POST['id'];
$tipe = $_POST['edittipe'];
$jumlah = $_POST['editjumlah'];
$harga = $_POST['editharga'];
$fasilitas = isset($_POST['fasilitas']) ? implode(', ', $_POST['fasilitas']) : '';
$gambar = $_FILES['editgambar']['name'];
$deskripsi = $_POST['deskripsi'];

// Persiapkan query UPDATE
$sql = "UPDATE kamar SET tipe = :tipe, jumlah = :jumlah, harga = :harga, fasilitas = :fasilitas, deskripsi = :deskripsi";

// Jika ada gambar baru, tambahkan ke query dan pindahkan file
if (!empty($gambar)) {
    $target_dir = "../../simpangambar/";
    $target_file = $target_dir . basename($_FILES["editgambar"]["name"]);
    move_uploaded_file($_FILES["editgambar"]["tmp_name"], $target_file);
    $sql .= ", gambar = :gambar";
}

$sql .= " WHERE idkamar = :id";

// Persiapkan statement
$stmt = $pdo->prepare($sql);

// Bind parameter
$stmt->bindParam(':tipe', $tipe);
$stmt->bindParam(':jumlah', $jumlah);
$stmt->bindParam(':harga', $harga);
$stmt->bindParam(':fasilitas', $fasilitas);
$stmt->bindParam(':deskripsi', $deskripsi);
$stmt->bindParam(':id', $id);
if (!empty($gambar)) {
    $stmt->bindParam(':gambar', $gambar);
}

// Eksekusi query
try {
    $stmt->execute();
    echo "<script>
        swal({
            type: 'success',
            title: 'Data kamar berhasil diperbarui!',
            showConfirmButton: false,
            timer: 1500
        });
        window.setTimeout(function() {
            window.location.replace('../datakamar.php');
        }, 1500);
    </script>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>