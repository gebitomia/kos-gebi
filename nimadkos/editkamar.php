<?php
require_once "view/header.php"; // Memuat header

include "fungsi/koneksi.php"; // Menghubungkan ke database

// Ambil ID kamar dari URL
$id = $_GET['id'];

// Query untuk mengambil data kamar
$sql = $pdo->query("SELECT * FROM kamar WHERE idkamar = '$id'");
$data = $sql->fetch();

$tipe = $data['tipe'];
$jumlah = $data['jumlah'];
$harga = $data['harga'];
$gambar = $data['gambar'];
$fasilitas = explode(', ', $data['fasilitas']); // Mengambil fasilitas sebagai array
?>
<div class="content-wrapper">

<!-- START PAGE CONTENT-->
<div class="page-heading">
        <h1 class="page-title">Data</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Data Kamar >> Edit Data Kamar</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Data Kamar</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form method="post" action="fungsi/prosesedit.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>ID Kamar</label>
                                    <input class="form-control" type="text" placeholder="Masukkan Id Kamar" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Tipe</label>
                                    <select name="edittipe" class="form-control" required>
										<option value="<?php echo htmlspecialchars($tipe); ?>" selected><?php echo htmlspecialchars($tipe); ?></option>
                                        <option>Kamar 1</option>
                                        <option>Kamar 2</option>
                                        <option>Kamar 3</option>
                                        <option>Kamar 4</option>
                                        <option>Kamar 5</option>
                                        <option>Kamar 6</option>
                                        <option>Kamar 7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" placeholder="Masukkan Jumlah Kamar" name="editjumlah" value="<?php echo htmlspecialchars($jumlah); ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input class="form-control" type="number" placeholder="Harga Kamar" name="editharga" value="<?php echo htmlspecialchars($harga); ?>">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input class="form-control" type="file" name="editgambar">
                            </div>
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="check-list">
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Tempat Tidur"<?php echo in_array('Tempat Tidur', $fasilitas) ? 'checked' : ''; ?>>
                                                <span class="input-span"></span>Tempat Tidur
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam" <?php echo in_array('Kamar Mandi Dalam', $fasilitas) ? 'checked' : ''; ?>>
                                                <span class="input-span"></span>Kamar Mandi Dalam
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="WiFi"  <?php echo in_array('WiFi', $fasilitas) ? 'checked' : ''; ?>>
                                                <span class="input-span"></span>WiFi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="check-list">
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Air"  <?php echo in_array('Air', $fasilitas) ? 'checked' : ''; ?>>
                                                <span class="input-span"></span>Air
                                            </label>
                                            <label class="ui-checkbox ui-checkbox-success">
                                                <input type="checkbox" name="fasilitas[]" value="Dapur Mini"  <?php echo in_array('Dapur Mini', $fasilitas) ? 'checked' : ''; ?>>
                                                <span class="input-span"></span>Dapur Mini
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi Kamar" name="deskripsi" style="height:200px;"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
								<a href="datakamar"><input type="button" class="btn btn-danger" value="Batal"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php
require_once "view/footer.php";
?>