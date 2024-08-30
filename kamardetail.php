<?php require_once "view/header.php"; ?>
<style>
    @media (max-width: 768px) {
        .room-details-item img {
            width: 100%;
            height: auto;
        }

        .rd-title {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .rd-title h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .availability-btn {
            font-size: 0.9em;
            padding: 5px 10px;
            margin-left: 0;
        }
    }
</style>
<div id="preloder">
	<div class="loader"></div>
</div>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Detail Kamar</h2>
                    <div class="bt-option">
                        <a href="index">Beranda</a>
                        <span><a href="kamar">Kamar</a>Detail Kamar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $idkamar = $_GET['id'];
                $sql = $pdo->prepare("SELECT * FROM kamar WHERE idkamar = ?");
                $sql->execute([$idkamar]);
                $data = $sql->fetch();

                if ($data) {
                    $tipe = $data['tipe'];
                    $jumlah = $data['jumlah'];
                    $hargaHarian = $data['harga'];
                    $hargaBulanan = $hargaHarian * 31;
                    $gambar = $data['gambar'];
                    $fasilitas = $data['fasilitas'];
                    $deskripsi = $data['deskripsi'];

                    $hargaBulananFormatted = number_format($hargaBulanan, 0, ",", ".");

                    $sqly = $pdo->prepare("SELECT * FROM stokkamar WHERE idkamar = ?");
                    $sqly->execute([$idkamar]);
                    $datay = $sqly->fetch();

                    if ($datay) {
                        $stok = $datay['stok'];
                        $availability = ($stok > 0) ? 'Tersedia' : 'Tidak Tersedia';
                        $availabilityClass = ($stok > 0) ? 'available' : 'not-available';

                        // Mengubah string fasilitas menjadi array
                        $fasilitasArray = explode(', ', $fasilitas);

                        // Fasilitas yang tersedia
                        $allFacilities = ['Tempat Tidur', 'Kamar Mandi Dalam', 'WiFi', 'Air', 'Dapur Mini'];
            ?>
                        <div class="col-lg-8">
                            <div class="room-details-item">
                                <!-- Thumbnail image with custom JS for fullscreen -->
                                <img src="./simpangambar/<?php echo $gambar ?>" alt="Room Image" class="img-thumbnail" style="cursor: pointer; width: 100%; height: auto;" onclick="showImageFullScreen(this.src)">
                                <div class="rd-text">
                                    <div class="rd-title" style="position: relative; display: flex; align-items: center; justify-content: space-between;">
                                        <h3 style="margin: 0;"><?php echo $tipe; ?></h3>
                                        <button class="availability-btn <?php echo $availabilityClass; ?>" style="border-radius: 5px; <?php echo ($availabilityClass == 'available') ? 'background-color: #28a745; color: white;' : 'background-color: #dc3545; color: white;'; ?>">
                                            <?php echo $availability; ?>
                                        </button>
                                    </div>
                                    <h2>Rp. <?php echo $hargaBulananFormatted; ?><span>/Per Bulan</span></h2>
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
                                    <p class="f-para">Deskripsi Kamar :</br></br><?php echo $deskripsi; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="room-booking">
                                <h3>Pesan sekarang</h3>
                                <form method="post" action="user/pemesanan" name="opsi" id="bookingForm">
                                    <div class="check-date">
                                        <label for="in">Tanggal Masuk:</label>
                                        <input type="text" name="cekin" class="date-input" id="in" autocomplete="off" required <?php echo $stok == 0 ? 'disabled' : ''; ?>>
                                        <i class="icon_calendar"></i>
                                    </div>
                                    <div class="check-date">
                                        <label for="out">Tanggal Keluar:</label>
                                        <input type="text" name="cekout" class="date-input" id="out" autocomplete="off" required <?php echo $stok == 0 ? 'disabled' : ''; ?>>
                                        <i class="icon_calendar"></i>
                                    </div>
                                    <div class="select-option">
                                        <label for="kamar">Kamar Kos:</label>
                                        <select name="tipe" id="kamar" required onchange="updatePrice()" <?php echo $stok == 0 ? 'disabled' : ''; ?>>
                                            <option selected="selected" disabled="disabled">-Pilih-</option>
                                            <option value="<?php echo $hargaBulanan; ?>"><?php echo $tipe; ?></option>
                                        </select>
                                    </div>
                                    <div class="select-option">
                                        <label for="harga">Total Harga:</label>
                                        <input type="text" name="harga" id="harga" disabled autocomplete="off" style="width: 100%; height: 40px; border-color: white;">
                                        <input type="hidden" name="tipex" style="width: 100%; height: 40px; border-color: white;">
                                    </div>
                                    <button type="submit" name="ok" id="tombol" <?php echo $stok == 0 ? 'disabled' : ''; ?>>Pesan</button>
                                </form>
                            </div>
                        </div>

                        <!-- Fullscreen Image Viewer -->
                        <div id="fullscreenImageViewer" onclick="closeImageFullScreen()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;">
                            <img id="fullscreenImage" src="" alt="Fullscreen Image" style="max-width:90%; max-height:90%;">
                        </div>

            <?php
                    } else {
                        echo "Data stok kamar tidak ditemukan.";
                    }
                } else {
                    echo "Data kamar tidak ditemukan.";
                }
            } else {
                echo "ID kamar tidak disediakan.";
            }
            ?>
        </div>
    </div>
</section>
<!-- Room Details Section End -->

<?php require_once "view/footer.php"; ?>

<!-- Custom JS -->
<script>
    function updatePrice() {
        var select = document.getElementById("kamar");
        var price = select.options[select.selectedIndex].value;
        var formattedPrice = "Rp " + parseInt(price).toLocaleString('id-ID', {
            minimumFractionDigits: 0
        });
        document.getElementById("harga").value = formattedPrice;
        document.getElementsByName("tipex")[0].value = price;
    }

    function showImageFullScreen(src) {
        document.getElementById('fullscreenImage').src = src;
        document.getElementById('fullscreenImageViewer').style.display = 'flex';
    }

    function closeImageFullScreen() {
        document.getElementById('fullscreenImageViewer').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        updatePrice(); // Update the price on page load in case there is a pre-selected value
    });
</script>