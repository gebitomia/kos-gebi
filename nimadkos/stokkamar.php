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
            <li class="breadcrumb-item">Stok Kamar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
		<div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Stok Kamar</div>
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
								<th>Stok</th>
								<th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							include"fungsi/koneksi.php";
							$sql = $pdo->query("SELECT * FROM stokkamar");
							while($data = $sql->fetch()){
								$id = $data['idkamar'];
								$tipe = $data['tipe'];
								$stok = $data['stok'];

								$bts = 25;
								$tpak = strlen($tipe);
								if($tpak > $bts) {
									$tp = substr($tipe, 0, $bts) . '...';
								}
								else {
									$tp = $tipe;
								}

							$sql2 = $pdo->query("SELECT * FROM kamar WHERE idkamar=$id");
							while($data2 = $sql2->fetch()){
								$gambar = $data2['gambar'];
						?>
                            <tr>
								<td><a href='#'><?php echo $id ?></a></td>
								<td>
								<img src="../simpangambar/<?php echo $gambar ?>" width="50px" height="50px"/>
								</td>
								<td><?php echo $tipe; ?></td>
								<td><?php echo $stok; ?></td>
                                <td>
									<a href="editstok?id=<?php echo $id ?>"><button class="btn btn-primary btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="fa fa-pencil font-14"></i>
                                    </button></a>

                                    <a href="fungsi/hapusstok?id=<?php echo $id ?>" onclick="return confirm('Anda akan menghapus?')">
                                    <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Hapus"><i class="fa fa-trash font-14"></i>
                                    </button></a>
                                </td>
                            </tr>
						<?php
							}
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