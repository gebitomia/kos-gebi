<?php require_once "view/header.php"; ?>

<div id="preloder">
	<div class="loader"></div>
</div>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Kamar</h2>
                    <div class="bt-option">
                        <a href="index">Beranda</a>
                        <span>Kamar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php
            $sql = $pdo->query("SELECT * FROM kamar");
            while ($data = $sql->fetch()) {
                $id = $data['idkamar'];
                $tipe = $data['tipe'];
                $jumlah = $data['jumlah'];
                $harga = $data['harga'];
                $gambar = $data['gambar'];
                $fasilitas = $data['fasilitas'];

                // Menghitung harga bulanan
                $hargaBulanan = $harga * 31;
                $hargaFormatted = number_format($hargaBulanan, 0, ",", ".");

                $sqly = $pdo->query("SELECT * FROM stokkamar WHERE idkamar=$id");
                while ($datay = $sqly->fetch()) {
                    $stok = $datay['stok'];
                    $availability = ($stok > 0) ? 'Tersedia' : 'Tidak Tersedia';
                    $availabilityClass = ($stok > 0) ? 'available' : 'not-available';

                    // Mengubah string fasilitas menjadi array
                    $fasilitasArray = explode(', ', $fasilitas);

                    // Fasilitas yang tersedia
                    $allFacilities = ['Tempat Tidur', 'Kamar Mandi Dalam', 'WiFi', 'Air', 'Dapur Mini'];
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item" style="border: 1px solid #e99f55;">
                            <img src="./simpangambar/<?php echo $gambar ?>" alt="Room Image">
                            <div class="ri-text">
                                <h4><?php echo $tipe; ?>
                                    <button class="availability-btn <?php echo $availabilityClass; ?>" style="margin-left: 60px;">
                                        <?php echo $availability; ?>
                                    </button>
                                </h4>
                                <h3>Rp. <?php echo $hargaFormatted; ?><span>/Per Bulan</span></h3>
                                <table>
                                    <tbody>
                                        <?php foreach ($allFacilities as $facility) { ?>
                                            <tr>
                                                <td class="r-o"><?php echo $facility; ?></td>
                                                <td>
                                                    <?php if (in_array($facility, $fasilitasArray)) { ?>
                                                        : <i class="fa-solid fa-circle-check" style="font-size: 25px; color: #28a745; margin-left: 20px;"></i>
                                                    <?php } else { ?>
                                                        : <i class="fa-solid fa-window-minimize" style="font-size: 25px; color: #dc3545; margin-left: 20px;"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="kamardetail.php?id=<?php echo $id; ?>" class="primary-btn">Detail Kamar >></a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php require_once "view/footer.php"; ?>