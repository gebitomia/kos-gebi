<?php
	require_once "view/header.php";
?>
<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Pembayaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
		<div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Pembayaran</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
								<th>Kode</th>
								<th>Nama</th>
								<th>Jumlah</th>
								<th>Bank</th>
								<th>No Rekening</th>
								<th>Nama Pemilik Rekening</th>
								<th>Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							$sql = $pdo->query("SELECT * FROM pembayaran");
							while ($caridata = $sql->fetch()) {
							$id = $caridata['idpesan'];
							$nama = $caridata['nama'];
							$jumlah = $caridata['jumlah'];
							$bank = $caridata['bank'];
							$norek = $caridata['norek'];
							$namarek = $caridata['namarek'];
							$gambar = $caridata['gambar'];
						?>
                            <tr>
								<td><a href='#'><?php echo $id ?></a></td>
								<td><?php echo $nama; ?></td>
								<td><?php echo $jumlah; ?></td>
								<td><?php echo $bank ?></td>
								<td><?php echo $norek; ?></td>
								<td><?php echo $namarek; ?></td>
								<td><a href="../simpangambar/<?php echo $gambar ?>" target="_blank"><img src="../simpangambar/<?php echo $gambar ?>" width="50px" height="50px"/></a></td>
                            </tr>
						<?php
							}
						?>
                        </tbody>
                    </table>
					<center>
					<a href="laporan-pembayaran" target="_blank"><button id="laporan" class="btn btn-success">Cetak Laporan</button></a>
					</center>
                </div>
            </div>
		</div>

<?php
	require_once "view/footer.php"
?>