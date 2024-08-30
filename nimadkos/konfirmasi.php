<?php
	require_once "view/header.php";
?>
<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Konfirmasi Pesananan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Konfirmasi Pesananan</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
		<div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Konfirmasi Pesananan</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
								<th>Kode Pesan</th>
								<th>Tgl Pesan</th>
								<th>Tipe</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Tgl Masuk</th>
								<th>Tgl Keluar</th>
								<th>Lama Hari</th>
								<th>Total</th>
								<th style="width:50px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$sql = $pdo->query("SELECT * FROM pemesanan ORDER BY idpesan DESC");
								while ($datax = $sql->fetch()) {
								$idpesan = $datax['idpesan'];
								$tglpesan = $datax['tglpesan'];
								$batasbayar = $datax['batasbayar'];
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
								$batasbayarr = date('d/m/Y H:i:s', strtotime($batasbayar));
								$batasjam = date('H:i:s', strtotime($batasbayar));

								$hargaa = number_format($harga,0,",",".");
								$angka = number_format($totalbayar,0,",",".");

								if ($status == 'Pending...') {
							?>
                            <tr>
								<td><a href='#'><?php echo $idpesan ?></a></td>
								<td><?php echo $tglpesann ?></td>
								<td><?php echo $tipe ?></td>
								<td><?php echo $namax ?></td>
								<td><?php echo $telepon ?></td>
								<td><?php echo $tglmasukk ?></td>
								<td><?php echo $tglkeluarr ?></td>
								<td><?php echo $lamahari ?> hari</td>
								<td>Rp.<?php echo $angka ?></td>
                                <td>
									<a href="fungsi/proseskonfirmasi?id=<?php echo $idpesan ?>"><button class="btn btn-success btn-xs m-r-50" data-toggle="tooltip" data-original-title="Konfirmasi">
									<i class="fa fa-check"></i>
                                    </button></a>

                                    <a href="fungsi/prosesbatal?id=<?php echo $idpesan ?>" onclick="return confirm('Anda Yakin Di Batalkan?')">
                                    <button class="btn btn-danger btn-xs m-l-50" data-toggle="tooltip" data-original-title="Batal"><i class="fa fa-times"></i>
                                    </button></a>
                                </td>
                            </tr>
						<?php
							}
						} ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
<?php
	require_once "view/footer.php"
?>