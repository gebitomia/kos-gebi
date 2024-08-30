<?php
require_once "view/header.php";

if (isset($_GET['id'])) {
    $idkamar = $_GET['id'];

    // Mengambil data kamar berdasarkan id
    $sqlxy = $pdo->prepare("SELECT * FROM kamar WHERE idkamar = ?");
    $sqlxy->execute([$idkamar]);
    $dataxy = $sqlxy->fetch();

    if ($dataxy) {
        $idkamarxy = $dataxy['idkamar'];
        $tipexy = $dataxy['tipe'];
        $jumlahxy = $dataxy['jumlah'];
        $gambarxy = $dataxy['gambar'];
        $hargaxy = $dataxy['harga'];
        $hargafxy = number_format($hargaxy, 0, ',', '.');
        $deskripsi = $dataxy['deskripsi'];
        $fasilitas = $dataxy['fasilitas'];

        $sqlyx = $pdo->prepare("SELECT * FROM stokkamar WHERE idkamar = ?");
        $sqlyx->execute([$idkamar]);
        $datayx = $sqlyx->fetch();
        $stokyx = $datayx['stok'];

        $hargaBulanan = $hargaxy * 31;
        $hargaFormatted = number_format($hargaBulanan, 0, ",", ".");

        // Mengubah string fasilitas menjadi array
        $fasilitasArray = explode(', ', $fasilitas);
        $allFacilities = ['Tempat Tidur', 'Kamar Mandi Dalam', 'WiFi', 'Air', 'Dapur Mini'];
    }
}

date_default_timezone_set("Asia/Makassar");

$today = new DateTime();
$tglpesan = $today->format('Y-m-d H:i:s');
$today->add(new DateInterval('PT5H'));
$jamex = $today->format('Y-m-d H:i:s');
?>

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Pesan Kamar</h2>
                    <div class="bt-option">
                        <a href="index.php">Beranda</a>
                        <span>Pesan Kamar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <?php if (isset($dataxy) && $dataxy) : ?>
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="../simpangambar/<?php echo htmlspecialchars($gambarxy); ?>" alt="Room Image" class="img-thumbnail" style="cursor: pointer; width: 100%; height: 300px;" onclick="showImageFullScreen(this.src)">
                        <div class="rd-text">
                            <div class="rd-title" style="position: relative; display: flex; align-items: center; justify-content: space-between;">
                                <h3 style="margin: 0;"><?php echo htmlspecialchars($tipexy); ?></h3>
                                <button class="availability-btn <?php echo ($stokyx > 0) ? 'available' : 'not-available'; ?>" style="border-radius: 5px; <?php echo ($stokyx > 0) ? 'background-color: #28a745; color: white;' : 'background-color: #dc3545; color: white;'; ?>">
                                    <?php echo ($stokyx > 0) ? 'Tersedia' : 'Tidak Tersedia'; ?>
                                </button>
                            </div>
                            <h2>Rp. <?php echo $hargaFormatted; ?><span>/Per Bulan</span></h2>
                            <table>
                                <tbody>
                                    <?php foreach ($allFacilities as $facility) { ?>
                                        <tr>
                                            <td class="r-o" style="width:170px;"><?php echo $facility; ?></td>
                                            <td>
                                                <?php if (in_array($facility, $fasilitasArray)) { ?>
                                                    : <i class="fa-solid fa-circle-check" style="font-size: 25px; color: #28a745; margin-left: 20px;"></i>
                                                <?php } else { ?>
                                                    : <i class="fa-solid fa-circle-xmark" style="font-size: 25px; color: #dc3545; margin-left: 20px;"></i>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <p class="f-para">Deskripsi Kamar:</br></br><?php echo htmlspecialchars($deskripsi); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Pesan Sekarang</h3>
                        <form method="post" action="../fungsi/prosespesan.php" name="cekstok">
                            <div class="select-option">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" name="nama" id="nama" readonly style="width: 100%; height: 45px; border: 0.1px solid #ccc; border-radius: 4px; padding: 8px; font-size:16px;" value="<?php echo $nama; ?>" required <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                            </div>
                            <div class="select-option">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" readonly style="width: 100%; height: 45px; border: 0.1px solid #ccc; border-radius: 4px; padding: 8px; font-size:16px;" value="<?php echo $alamat; ?>" required <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                            </div>
                            <div class="select-option">
                                <label for="telepon">No. Telepon:</label>
                                <input type="text" name="telepon" id="telepon" readonly style="width: 100%; height: 45px; border: 0.1px solid #ccc; border-radius: 4px; padding: 8px; font-size:16px;" value="<?php echo $telepon; ?>" required <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                            </div>
                            <div class="select-option">
                                <label for="kamar">Kamar Kos:</label>
                                <select name="tipe" id="kamar" required disabled>
                                    <option value="<?php echo htmlspecialchars($tipexy); ?>" selected><?php echo htmlspecialchars($tipexy); ?></option>
                                </select>
                                <input type="hidden" name="tipex" value="<?php echo htmlspecialchars($tipexy); ?>">
                                <input type="hidden" name="idkamar" value="<?php echo htmlspecialchars($idkamarxy); ?>">
                                <input type="hidden" name="harga" value="<?php echo htmlspecialchars($hargaxy); ?>">
                                <input type="hidden" name="jumlah" value="1">
                                <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                            </div>
                            <div class="check-date">
                                <label for="in">Tanggal Masuk:</label>
                                <input type="text" name="cekin" class="date-input" id="in" autocomplete="off" required onchange="hitung()" <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                                <i class=" icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="out">Tanggal Keluar:</label>
                                <input type="text" name="cekout" class="date-input" id="out" autocomplete="off" required onchange="hitung()" <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                                <i class=" icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="lama">Lama Menginap:</label>
                                <input type="text" name="lama" id="lama" readonly style="width: 100%; height: 45px; border: 0.1px solid #ccc; border-radius: 4px; padding: 8px; font-size:16px" <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                            </div>
                            <div class="select-option">
                                <label for="total">Total Biaya:</label>
                                <input type="text" name="total" id="total" readonly style="width: 100%; height: 45px; border: 0.1px solid #ccc; border-radius: 4px; padding: 8px; font-size:16px" <?php if ($stokyx <= 0) echo 'disabled'; ?>>
                            </div>
                            <button type="submit" name="ok" id="tombol" <?php if ($stokyx <= 0) echo 'disabled style="background-color: grey; cursor: not-allowed;"'; ?>>Pesan</button>
                            <input type="hidden" name="tglpesan" value="<?php echo $tglpesan; ?>">
                            <input type="hidden" name="batasbayar" value="<?php echo $jamex; ?>">
                        </form>
                        <?php if ($stokyx <= 0) : ?>
                            <p class="text-danger mt-3">Maaf, stok kamar tidak tersedia. Anda tidak dapat melanjutkan pemesanan.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Fullscreen Image Viewer -->
                <div id="fullscreenImageViewer" onclick="closeImageFullScreen()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;">
                    <img id="fullscreenImage" src="" alt="Fullscreen Image" style="max-width:90%; max-height:90%;">
                </div>
            <?php else : ?>
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        Kamar tidak ditemukan atau stok tidak tersedia.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once "view/footer.php"; ?>

<script>
    function hitung() {
        var tglin = document.getElementById('in').value;
        var tglout = document.getElementById('out').value;
        var harga = <?php echo $hargaxy; ?>;
        var date1 = new Date(tglin);
        var date2 = new Date(tglout);
        var timeDifference = date2.getTime() - date1.getTime();
        var daysDifference = timeDifference / (1000 * 3600 * 24);

        if (daysDifference > 0) {
            document.getElementById('lama').value = daysDifference + " Hari";
            document.getElementById('total').value = "Rp " + (daysDifference * harga).toLocaleString('id-ID');
        } else {
            document.getElementById('lama').value = "";
            document.getElementById('total').value = "";
            alert("Tanggal check-out harus lebih besar dari tanggal check-in");
        }
    }

    function showImageFullScreen(src) {
        document.getElementById('fullscreenImage').src = src;
        document.getElementById('fullscreenImageViewer').style.display = 'flex';
    }

    function closeImageFullScreen() {
        document.getElementById('fullscreenImageViewer').style.display = 'none';
    }
</script>
