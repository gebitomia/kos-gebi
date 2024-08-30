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
            <li class="breadcrumb-item">Stok Kamar >> Edit Stok Kamar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Stok Kamar</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
					<?php
						include "fungsi/koneksi.php";
						$ambil = $_GET['id'];
						$sql = $pdo->query("SELECT * FROM stokkamar WHERE idkamar='$ambil'");
						$data = $sql->fetch();
						$id = $data['idkamar'];
						$tipe = $data['tipe'];
						$stok = $data['stok'];
					?>
                        <form method="post" action="fungsi/proseseditstok" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>ID Kamar</label>
                                    <input class="form-control" type="text" name="id" value="<?php echo $id ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tipe Kamar</label>
                                <input class="form-control" type="text" name="edittipe" value="<?php echo $tipe ?>" readonly> 
                            </div>
                            <div class="form-group">
                                <label>Stok Kamar</label>
                                <input class="form-control" type="number" placeholder="Harga Kamar"  name="editstok" value="<?php echo $stok ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
								<a href="stokkamar"><input type="button" class="btn btn-danger" value="Batal"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php
	require_once "view/footer.php"
?>