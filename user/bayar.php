<?php
require_once "view/header.php";

$ambilx = $_GET['id'];

$sqlx = $pdo->query("SELECT * FROM pemesanan WHERE idpesan='$ambilx'");
$datax = $sqlx->fetch();
$idpesan = $datax['idpesan'];
$nama = $datax['nama'];
$total = $datax['totalbayar'];
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Konfirmasi Pembayaran</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="../fungsi/prosesbayar" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtid">ID Pemesanan</label>
                            <input type="text" class="form-control" id="txtid" name="txtid" readonly value="<?php echo $idpesan ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtnama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="txtnama" name="txtnama" readonly value="<?php echo $nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtjumlah">Jumlah Bayar</label>
                            <input type="text" class="form-control" id="txtjumlah" name="txtjumlah" readonly value="<?php echo $total ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtbank">Bank</label>
                            <select name="txtbank" id="txtbank" class="form-control" required>
                                <option value="" hidden>-Pilih Bank-</option>
                                <option>Mandiri</option>
                                <option>BCA</option>
                                <option>BNI</option>
                                <option>BRI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtnorek">No. Rekening</label>
                            <input type="text" class="form-control" id="txtnorek" name="txtnorek" required>
                        </div>
                        <div class="form-group">
                            <label for="txtnamarek">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" id="txtnamarek" name="txtnamarek" required>
                        </div>
                        <div class="form-group">
                            <label for="txtgambar">Upload Bukti Transfer</label>
                            <input type="file" class="form-control-file" id="txtgambar" name="txtgambar" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "view/footer.php";
?>
