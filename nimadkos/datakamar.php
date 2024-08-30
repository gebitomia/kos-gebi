<?php
	require_once "view/header.php";
?>

<div class="content-wrapper">
	<!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Data</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data Kamar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
		<div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Kamar</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
								<th>ID Kamar</th>
								<th>Gambar</th>
								<th>Tipe</th>
								<th>Jumlah</th>
								<th>Harga/hari</th>
								<th>Fasilitas</th>
								<th>Deskripsi</th>
								<th style="width:50px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							include"fungsi/koneksi.php";
							$sql = $pdo->query("SELECT * FROM kamar");
							while($data = $sql->fetch()){
								$gambar = $data['gambar'];
								$id = $data['idkamar'];
								$tipe = $data['tipe'];
								$jumlah = $data['jumlah'];
								$harga = $data['harga'];
								$gambar = $data['gambar'];
								$fasilitas = $data['fasilitas'];
								$deskripsi = $data['deskripsi'];
								$bts = 25;
								$tpak = strlen($tipe);
								if($tpak > $bts) {
									$tp = substr($tipe, 0, $bts) . '...';
								}
								else {
									$tp = $tipe;
								}

								$angka = number_format($harga,0,",",".");
							?>
                            <tr>
								<td><a href='#'><?php echo $id ?></a></td>
								<td>
								<img src="../simpangambar/<?php echo $gambar ?>" width="50px" height="50px"/>
								</td>
								<td><?php echo $tipe; ?></td>
								<td><?php echo $jumlah; ?></td>
								<td>Rp.<?php echo $angka ?></td>
								<td><?php echo $fasilitas; ?></td>
								<td><?php echo $deskripsi; ?></td>
                                <td>
									<a href="editkamar?id=<?php echo $id ?>"><button class="btn btn-primary btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil font-14"></i>
                                    </button></a>

                                    <a href="fungsi/hapuskamar?id=<?php echo $id ?>" onclick="return confirm('Anda akan menghapus?')">
                                    <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash font-14"></i>
                                    </button></a>
                                </td>
                            </tr>
						<?php
							}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>


<?php
	require_once "view/footer.php"
?>