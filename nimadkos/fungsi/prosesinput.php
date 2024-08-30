<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="../../lib/sweet.js"></script>
</head>

<body>


    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include "koneksi.php";

    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $fasilitas = isset($_POST['fasilitas']) ? implode(", ", $_POST['fasilitas']) : '';
    $deskripsi = $_POST['deskripsi'];

    try {
        $pdo->beginTransaction();

        $sqlsimpan = $pdo->prepare("INSERT INTO kamar (idkamar, tipe, jumlah, harga, gambar, fasilitas, deskripsi) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sqlsimpan->execute([$id, $tipe, $jumlah, $harga, $gambar, $fasilitas, $deskripsi]);

        $sqlsimpan2 = $pdo->prepare("INSERT INTO stokkamar (idkamar, tipe, stok) VALUES (?, ?, ?)");
        $sqlsimpan2->execute([$id, $tipe, $jumlah]);

        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../simpangambar/" . $_FILES['gambar']['name']);

        $pdo->commit();

        echo "<script>
        swal({
            type: 'success',
            title: 'Simpan Data Kamar Berhasil!',
            showConfirmButton: false,
            backdrop: 'rgba(0,0,123,0.5)',
        });
        window.setTimeout(function () {
            window.location.replace('../datakamar');
        }, 1500);
    </script>";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "<script>
        swal({
            type: 'error',
            title: 'Simpan Data Kamar Gagal!',
            text: '" . addslashes($e->getMessage()) . "',
            showConfirmButton: true,
            backdrop: 'rgba(123,0,0,0.5)',
        });
        window.setTimeout(function () {
            window.location.replace('../inputkamar');
        }, 1500);
    </script>";
    }
