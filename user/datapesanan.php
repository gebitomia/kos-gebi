<?php
require_once "view/header.php";
?>
<style>
	#rekening {
		background-image: url('../gambar/background.png');
		background-size: cover;
		background-position: center;
		padding: 20px;
		border-radius: 8px;
		background-color: #F5E3C7; /* Coklat Muda */
	}

	#rekening h3 {
		font-weight: bold;
		color: #8B4513; /* Coklat Tua */
	}

	#rekening table {
		width: 100%;
	}

	#rekening img {
		max-height: 50px;
	}

	#rekening td {
		font-size: 1.2rem;
		vertical-align: middle;
		color: #8B4513; /* Coklat Tua */
	}

	.border-right {
		border-right: 2px solid #A0522D !important; /* Dark Brown */
	}

	@media (max-width: 768px) {
		#rekening td {
			font-size: 1rem;
		}

		#rekening img {
			max-height: 40px;
		}

		#rekening .text-right,
		#rekening .text-left {
			text-align: center !important;
		}

		#rekening .border-right {
			border-right: none !important;
			border-bottom: 2px solid #A0522D !important; /* Dark Brown */
		}

		#rekening tr td {
			display: block;
			width: 100%;
			margin-bottom: 15px;
		}
	}
</style>

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text">
					<h2>Data Pesanan</h2>
					<div class="bt-option">
						<a href="index">Beranda</a>
						<a href="kamar">Kamar</a>
						<span>Data Pesananan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mt-4">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div id="rekening" class="text-center">
				<h3 class="text-white bg-primary py-2">Rekening Ekost bapa dede</h3>
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td class="align-middle text-right">
								<img src="../gambar/mandiri.png" alt="Mandiri" class="img-fluid">
							</td>
							<td class="align-middle text-left text-danger border-right">0000-00-000000-000</td>
							<td class="align-middle text-right">
								<img src="../gambar/bca.jpg" alt="BCA" class="img-fluid">
							</td>
							<td class="align-middle text-left text-danger">1111-11-111111-111</td>
						</tr>
						<tr>
							<td class="align-middle text-right">
								<img src="../gambar/bni.png" alt="BNI" class="img-fluid">
							</td>
							<td class="align-middle text-left text-danger border-right">2222-22-222222-222</td>
							<td class="align-middle text-right">
								<img src="../gambar/bri.png" alt="BRI" class="img-fluid">
							</td>
							<td class="align-middle text-left text-danger">3333-33-333333-333</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Rooms Section Begin -->
<section class="rooms-section spad">
	<div class="container">
		<div class="row">
			<?php
			$sqlx = $pdo->prepare("SELECT * FROM pemesanan WHERE idtamu = ? ORDER BY idpesan DESC");
			$sqlx->execute([$id]);
			while ($datax = $sqlx->fetch()) {
				$idpesan = $datax['idpesan'];
				$tglpesan = $datax['tglpesan'];
				$batasbayar = $datax['batasbayar'];
				$idkamar = $datax['idkamar'];
				$tipe = $datax['tipe'];
				$harga = $datax['harga'];
				$jumlah = $datax['jumlah'];
				$namax = $datax['nama'];
				$alamat = $datax['alamat'];
				$telepon = $datax['telepon'];
				$tglmasuk = $datax['tglmasuk'];
				$tglkeluar = $datax['tglkeluar'];
				$lamahari = $datax['lamahari'];
				$totalbayar = $datax['totalbayar'];
				$status = $datax['status'];

				$tglpesann = date('d/m/Y', strtotime($tglpesan));
				$tglmasukk = date('d/m/Y', strtotime($tglmasuk));
				$tglkeluarr = date('d/m/Y', strtotime($tglkeluar));
				$batasbayarr = date('d/m/Y', strtotime($batasbayar));
				$batasjam = date('H:i:s', strtotime($batasbayar));

				$hargaa = number_format($harga, 0, ",", ".");
				$angka = number_format($totalbayar, 0, ",", ".");
			?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="room-item">
						<div class="ri-text">
							<table style="width: 100%;">
								<tbody>
									<tr align="center">
										<td colspan="2" style="font-weight: bold;">Kode Transaksi: <?php echo $idpesan ?>
											<input type="hidden" name="idd" value="<?php echo $idpesan ?>">
										</td>
									</tr>
									<tr align="center">
										<td colspan="2">
											<?php
											$sqly = $pdo->query("SELECT * FROM kamar WHERE idkamar=$idkamar");
											while ($datay = $sqly->fetch()) {
												$gambary = $datay['gambar'];
											?>
												<img src="../simpangambar/<?php echo $gambary ?>" class="img-fluid" alt="Gambar Kamar">
											<?php
											}
											?>
										</td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Tanggal Pesan</td>
										<td>: <?php echo $tglpesann ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Tipe Kamar</td>
										<td>: <?php echo $tipe ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Nama Lengkap</td>
										<td>: <?php echo $namax ?>
											<input type="hidden" name="namax" value="<?php echo $namax ?>">
										</td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Alamat</td>
										<td>: <?php echo $alamat ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold;">No.Tlp</td>
										<td>:<?php echo $telepon ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Tanggal Masuk</td>
										<td>: <?php echo $tglmasukk ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Tanggal Keluar</td>
										<td>: <?php echo $tglkeluarr ?></td>
									</tr>
									<tr>
										<td class="r-o" style="font-weight: bold; margin-left:10px">Lama Menginap</td>
										<td>: <?php echo $lamahari ?> Hari</td>
									</tr>
									<tr style="background: #A0522D;" align="center"> <!-- Dark Brown -->
										<td style="color: white; font-weight: bold;">Total Bayar</td>
										<td style="color: white; font-weight: bold;">Rp. <?php echo $angka ?>
											<input type="hidden" name="total" value="<?php echo $totalbayar ?>">
											</td>
									</tr>
									<tr>
										<?php
										if ($status == "Berhasil") {
											echo '<td colspan="2" align="center" style="background: #228B22;color: white; font-weight: bold;">Status Transaksi :'; // Hijau Tua
										} else if ($status == "Pending...") {
											echo '<td colspan="2" align="center" style="background: #DAA520;color: black; font-weight: bold;">Status Transaksi :'; // Emas Gelap
										} else {
											echo '<td colspan="2" align="center" style="background: #8B0000;color: white; font-weight: bold;">Status Transaksi :'; // Merah Tua
										}
										date_default_timezone_set("Asia/Makassar");
										$tglsekarang = date('Y-m-d H:i:s');
										if ($tglsekarang > $batasbayar && $status == "Pending...") {
											echo "Dibatalkan";

											// Update status pesanan
											$updatestatus = $pdo->prepare("UPDATE pemesanan SET status='Dibatalkan' WHERE idpesan = ?");
											$updatestatus->execute([$idpesan]);

											// Menambahkan stok kamar kembali
											$sqlUpdateStok = $pdo->prepare("UPDATE stokkamar SET stok = LEAST(stok + 1, 1) WHERE idkamar = ?");
											$sqlUpdateStok->execute([$idkamar]);
										} else {
											echo $status;
											if ($status == "Pending...") {
												$sqly = $pdo->query("SELECT * FROM pembayaran WHERE idpesan='$idpesan'");
$datay = $sqly->fetch();

if ($datay) {
    $idbayar = $datay['idpesan'];
    if ($idbayar == $idpesan) {
        echo "<br><p style='background: yellow; color: black; font-weight: bold;'>Menunggu Verifikasi Pembayaran</p>";
    }
} else {
    echo "<br>Menunggu Proses Pembayaran<br>
          <p style='background:#A0522D; color: white; font-weight: bold;'>Segera Lakukan Pembayaran Sebelum :</p>
          <p style='background:#A0522D; color: white; font-weight: bold;'>Tanggal : $batasbayarr <br>Jam : $batasjam</p>
          Jika Tidak Transaksi Anda Dibatalkan<br>";
    ?>
    <a href="bayar.php?id=<?php echo $idpesan ?>"><button id="bbayar" style="width:150px;background:#6B8E23;color:white;font-weight:bold;padding:4px;border:2px solid white; margin-bottom: 1px;">Konfirmasi Pembayaran</button></a>
										<?php
												}
											}
										}
										?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- Rooms Section End -->

<?php
require_once "view/footer.php";
?>
