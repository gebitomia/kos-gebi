<?php
require_once "view/header.php";

// Mengambil data dari tabel kamar dan stokkamar
$sql = "SELECT k.idkamar, k.tipe, k.harga, s.stok 
        FROM kamar k 
        INNER JOIN stokkamar s ON k.idkamar = s.idkamar";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- Hero Section Begin -->
<section class="hero-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="hero-text">
					<h1>Welcome <?php echo $nama; ?></h1>
					<p>Kost bapa dede waiheru adalah situs Kost terbaik di kota ambon kecamatan waiheru
						ini adalah kamar kost dan fasilitasnya lumayan lengkap
					</p>
					<a href="kamar" class="primary-btn">Temukan Sekarang</a>
				</div>
			</div>
			<div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
				<div class="booking-form">
					<h3>Silahkan Pesan Kost Anda</h3>
					<form method="post" action="kamar" name="opsi">
						<div class="check-date">
							<label for="in">Tanggal Masuk:</label>
							<input type="text" name="cekin" class="date-input" id="in" autocomplete="off" required>
							<i class="icon_calendar"></i>
						</div>
						<div class="check-date">
							<label for="out">Tanggal Keluar:</label>
							<input type="text" name="cekout" class="date-input" id="out" autocomplete="off" required>
							<i class="icon_calendar"></i>
						</div>
						<div class="select-option">
							<label for="kamar">Kamar Kos:</label>
							<select name="tipe" id="kamar" required="required">
								<option selected="selected" disabled="disabled">-Pilih-</option>
								<?php foreach ($rooms as $room) : ?>
									<option value="<?php echo 'Rp ' . number_format($room['harga'], 0, ',', '.'); ?>" <?php echo $room['stok'] == 0 ? 'disabled' : ''; ?>>
										<?php echo $room['tipe']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="select-option">
							<label for="harga">Total Harga:</label>
							<input type="text" name="harga" id="harga" disabled autocomplete="off" style="width: 100%; height: 40px; border-color: white;">
							<input type="hidden" name="tipex" style="width: 100%; height: 40px; border-color: white;">
						</div>
						<button type="submit" name="ok" id="tombol">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="../img/hero/hero-1.jpg"></div>
		<div class="hs-item set-bg" data-setbg="../img/hero/hero-2.jpg"></div>
		<div class="hs-item set-bg" data-setbg="../img/hero/hero-3.jpg"></div>
	</div>
</section>
<!-- Hero Section End -->


<!-- Tentang Kami Section Begin -->
<section class="aboutus-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-text">
					<div class="section-title">
						<span>Tentang Kami</span>
						<h2>Kamar Kost <br /> Bapa Dede
						</h2>
					</div>
					<p class="f-para">Ekost bapa dede adalah situs kost online terbaik. Kami sangat bersemangat tentang
						pengunjung kami. Setiap hari, kami menginspirasi dan menjangkau jutaan pengunjung yang mengunjungi atau mendatangi.</p>
					<p class="s-para">Jadi, ketika datang untuk memesan kamar kost kami
						Lingkungan kost kami juga sangat ramah dan mempunyai rumah dan pepohonan yang sempurna, kami siap membantu Anda.</p>
					<a href="kamar" class="primary-btn about-btn">Pesan sekarang >></a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-pic">
					<div class="row">
						<div class="col-sm-6">
							<img src="../img/about/about-1.jpg" alt="">
						</div>
						<div class="col-sm-6">
							<img src="../img/about/about-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Tentang Kami Section End -->

<!-- Services Section End -->
<section class="services-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<span>Apa yang kami lakukan</span>
					<h2>Temukan Layanan Kami</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="service-item">
					<i class="flaticon-036-parking"></i>
					<h4>Tempat Parkir</h4>
					<p>Untuk kenyamanan dan keamanan kendaraan Anda, kami menyediakan fasilitas tempat parkir yang luas dan aman di area depan kost.</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="service-item">
					<i class="flaticon-024-towel"></i>
					<h4>Laundry</h4>
					<p>Kami menyediakan layanan laundry yang praktis dan efisien bagi penghuni kost. Dengan layanan laundry kami, Anda tidak perlu repot mencuci pakaian sendiri.</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="service-item">
					<i class="flaticon-044-clock-1"></i>
					<h4>CCTV 24 Jam</h4>
					<p>Keamanan Anda adalah prioritas kami. Kost kami dilengkapi dengan sistem CCTV 24 jam yang terpasang di area strategis untuk memastikan keamanan dan ketenangan.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
	<div class="container-fluid">
		<div class="hp-room-items">
			<div class="row">
				<?php foreach ($rooms as $room) : ?>
					<?php if ($room['idkamar'] == '01') : ?>
						<div class="col-lg-3 col-md-6">
							<div class="hp-room-item set-bg" data-setbg="../img/room/room-b1.jpg">
								<div class="hr-text">
									<h3>Kamar <?= htmlspecialchars($room['idkamar']) ?></h3>
									<h2>Rp.<?= number_format($room['harga'] * 31, 0, ',', '.') ?><span>/Bulan</span></h2>
									<table>
										<tbody>
											<tr>
												<td class=" r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bed"></i></td>
												<td>: Tempat Tidur</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-house-signal"></i></td>
												<td>: Free Wifi</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bath"></i></td>
												<td>: Kamar Mandi Dalam</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-square-parking"></i></td>
												<td>: Tempat Parkir</td>
											</tr>
										</tbody>
									</table>
									<a href="kamar" class="primary-btn">Selengkapnya >></a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>


				<?php foreach ($rooms as $room) : ?>
					<?php if ($room['idkamar'] == '02') : ?>
						<div class="col-lg-3 col-md-6">
							<div class="hp-room-item set-bg" data-setbg="../img/room/room-b2.jpg">
								<div class="hr-text">
									<h3>Kamar <?= htmlspecialchars($room['idkamar']) ?></h3>
									<h2>Rp.<?= number_format($room['harga'] * 31, 0, ',', '.') ?><span>/Bulan</span></h2>
									<table>
										<tbody>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bed"></i></td>
												<td>: Tempat Tidur</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-house-signal"></i></td>
												<td>: Free Wifi</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bath"></i></td>
												<td>: Kamar Mandi Dalam</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-square-parking"></i></td>
												<td>: Tempat Parkir</td>
											</tr>
										</tbody>
									</table>
									<a href="kamar" class="primary-btn">Selengkapnya >></a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>


				<?php foreach ($rooms as $room) : ?>
					<?php if ($room['idkamar'] == '03') : ?>
						<div class="col-lg-3 col-md-6">
							<div class="hp-room-item set-bg" data-setbg="../img/room/room-b3.jpg">
								<div class="hr-text">
									<h3>Kamar <?= htmlspecialchars($room['idkamar']) ?></h3>
									<h2>Rp.<?= number_format($room['harga'] * 31, 0, ',', '.') ?><span>/Bulan</span></h2>
									<table>
										<tbody>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bed"></i></td>
												<td>: Tempat Tidur</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-house-signal"></i></td>
												<td>: Free Wifi</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bath"></i></td>
												<td>: Kamar Mandi Dalam</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-square-parking"></i></td>
												<td>: Tempat Parkir</td>
											</tr>
										</tbody>
									</table>
									<a href="kamar" class="primary-btn">Selengkapnya >></a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php foreach ($rooms as $room) : ?>
					<?php if ($room['idkamar'] == '04') : ?>
						<div class="col-lg-3 col-md-6">
							<div class="hp-room-item set-bg" data-setbg="../img/room/room-b4.jpg">
								<div class="hr-text">
									<h3>Kamar <?= htmlspecialchars($room['idkamar']) ?></h3>
									<h2>Rp.<?= number_format($room['harga'] * 31, 0, ',', '.') ?><span>/Bulan</span></h2>
									<table>
										<tbody>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bed"></i></td>
												<td>: Tempat Tidur</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-house-signal"></i></td>
												<td>: Free Wifi</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-bath"></i></td>
												<td>: Kamar Mandi Dalam</td>
											</tr>
											<tr>
												<td class="r-o"><i class="fa-solid fa-square-check" style="padding-right: 10px; color:#dfa974;"></i><i class="fa-solid fa-square-parking"></i></td>
												<td>: Tempat Parkir</td>
											</tr>
										</tbody>
									</table>
									<a href="kamar" class="primary-btn">Selengkapnya >></a>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- Home Room Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg">
				<div class="contact-text">
					<h2>Info Kontak</h2>
					<p>Kami selalu siap membantu Anda! Jika Anda memiliki pertanyaan, membutuhkan informasi lebih lanjut, atau ingin berbicara dengan kami mengenai layanan yang kami tawarkan, jangan ragu untuk menghubungi kami melalui cara-cara berikut:</p>
					<table>
						<tbody>
							<tr>
								<td class="c-o">Alamat</td>
								<td>: Jl. Waiheru Asrama Blok B, Ambon, Maluku, Kode Pos 12345</td>
							</tr>
							<tr>
								<td class="c-o">Telp/WA</td>
								<td>: +62 813-4300-9779</td>
							</tr>
							<tr>
								<td class="c-o">Email</td>
								<td>: gebitomia@gmail.com</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg">
				<!-- pesan komplain -->
				<form action="kontak" class="contact-form needs-validation" novalidate>
					<div class=" row">
						<div class="col-lg-12">
							<textarea style="height: 200px;" class="form-control" id="validationCustom03" placeholder="Silahkan isi pesan komplainnya di halaman kontak aja yaah :)..." required></textarea>
							<div class="invalid-feedback">
								Tolong di isi pesannya!
							</div>
							<div class="valid-feedback">
								Bagus sekali!
							</div>
							<button type="submit">Kirim</button>
						</div>
					</div>
				</form>
				<!-- akhir pesan komplain -->

			</div>
		</div>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18352.31731214629!2d128.15955598715814!3d-3.696065299999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce8454347818b%3A0xd507f40415dcaa71!2sKampus%20STIKOM%20Ambon!5e1!3m2!1sen!2sid!4v1722367639599!5m2!1sen!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</section>
<!-- Contact Section End -->


<?php
require_once "view/footer.php"
?>