<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>
	<?php
	require_once "../fungsi/koneksi.php";
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$tglpesan = $_POST['tglpesan'];
		$batasbayar = $_POST['batasbayar'];
		$idkamar = $_POST['idkamar'];
		$tipe = $_POST['tipex'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['jumlah'];
		$idtamu = $_POST['user_id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$tglmasuk = $_POST['cekin'];
		$tglkeluar = $_POST['cekout'];
		$lamahari = $_POST['lama'];
		$totalbayar = $_POST['total'];

		// Extract number of days from "lama"
		$days = (int)filter_var($lamahari, FILTER_SANITIZE_NUMBER_INT);

		// Remove formatting from totalbayar
		$totalbayar = filter_var($totalbayar, FILTER_SANITIZE_NUMBER_INT);

		$status = "Pending...";

		try {
			// Mengurangi stok kamar
			$sqlUpdateStok = $pdo->prepare("UPDATE stokkamar SET stok = stok - 1 WHERE idkamar = ?");
			$sqlUpdateStok->execute([$idkamar]);
			$sql = $pdo->prepare("INSERT INTO pemesanan (tglpesan, batasbayar, idkamar, tipe, harga, jumlah, idtamu, nama, alamat, telepon, tglmasuk, tglkeluar, lamahari, totalbayar, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$sql->execute([$tglpesan, $batasbayar, $idkamar, $tipe, $harga, $jumlah, $idtamu, $nama, $alamat, $telepon, $tglmasuk, $tglkeluar, $days, $totalbayar, $status]);

			echo "<script>
            swal({
                title: 'Pesanan Berhasil!',
                text: 'Silahkan lakukan pembayaran sebelum batas waktu yang ditentukan.',
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.href = '../user/datapesanan';
            });
        </script>";
		} catch (PDOException $e) {
			echo "<script>
            swal({
                title: 'Pesanan Gagal!',
                text: 'Terjadi kesalahan dalam melakukan pemesanan. Silahkan coba lagi.',
                type: 'error',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.href = '../user/pemesanan?id=$idkamar';
            });
        </script>";
		}
	}
	?>




</body>

</html>