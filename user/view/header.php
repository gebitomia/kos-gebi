<?php
session_start();
require_once "../fungsi/koneksi.php";

if (!isset($_SESSION['user'])) {
	//unset($_SESSION['user']);
	//echo "<script>window.location.replace('../fungsi/load.php')</script>";
?>
	<html>

	<head>
		<title></title>
		<script type="text/javascript" src="../lib/sweet.js"></script>
	</head>

	<body>
		<script>
			swal({
				title: 'Oops...?',
				text: 'Silahkan Login Terlebih Dahulu!',
				showConfirmButton: false,
				type: 'warning',
				backdrop: 'rgba(123,0,0,1)',
			});
			window.setTimeout(function() {
				window.location.replace('../login');
			}, 2000);
		</script>;
	</body>

	</html>
<?php
}

$ambil = $_SESSION['user'];
$sql = $pdo->query("SELECT * FROM tamu WHERE idtamu='$ambil'");
$data = $sql->fetch();
$id = $data['idtamu'];
$username = $data['username'];
$email = $data['email'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$password = $data['password'];
$nama = $data['nama'];
$foto = $data['foto'];

$bts = 22;
$nmak = strlen($nama);
if ($nmak > $bts) {
	$nm = substr($nama, 0, $bts) . '...';
} else {
	$nm = $nama;
}

?>
<main>
	<!DOCTYPE html>
	<html lang="zxx">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sistem Informasi Kos-Kosan Gebi Tomia</title>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

		<!-- Css Styles -->
		<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
		<link rel="stylesheet" href="../css/fontawesome-free-6.6.0-web/css/all.min.css" type="text/css">
		<link rel="stylesheet" href="../css/flaticon.css" type="text/css">
		<link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
		<link rel="stylesheet" href="../css/nice-select.css" type="text/css">
		<link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
		<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
		<link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
		<link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/profil.css" type="text/css">
		<script type="text/javascript" src="../lib/sweet.js"></script>
	</head>

	<body>
		<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Offcanvas Menu Section Begin -->
		<div class="offcanvas-menu-overlay"></div>
		<div class="canvas-open">
			<i class="icon_menu"></i>
		</div>
		<div class="offcanvas-menu-wrapper">
			<div class="canvas-close">
				<i class="icon_close"></i>
			</div>
			<div class="header-configure-area">
				<div class="language-option">
					<img src="../simpangambar/<?php
												if ($foto != '') {
													echo $foto;
												} else {
													echo 'profil.png';
												}
												?>" alt="">
					<span><?php echo $nama; ?> <i class="fa fa-angle-down"></i></span>
					<div class="flag-dropdown">
						<ul>
							<li><a href="profil" id="tomboll"><i class="fa-solid fa-user" style="margin-right: 10px;"></i>Profil</a></li>
							<li><a href="../fungsi/proseskeluar.php" id="tombol2"><i class="fa-solid fa-right-from-bracket" style="margin-right: 5px;"></i>Keluar</a></li>
						</ul>
					</div>
				</div>
			</div>
			<nav class="mainmenu mobile-menu">
				<ul>
					<li class="active"><a href="index">Beranda</a></li>
					<li><a href="tentangkami">Tentang kami</a></li>
					<li><a href="kamar">Kamar</a></li>
					<li><a href="datapesanan">Data Pesnanan</a></li>
					<li><a href="Kontak">Kontak</a></li>
				</ul>
			</nav>
			<div id="mobile-menu-wrap"></div>
			<ul class="top-widget">
				<li><i class="fa fa-phone"></i>+62 813-4300-9779</li>
				<li><i class="fa fa-envelope"></i> gebitomia@gmail.com</li>
			</ul>
		</div>
		<!-- Offcanvas Menu Section End -->

		<!-- Header Section Begin -->
		<header class="header-section">
			<div class="top-nav">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<ul class="tn-left">
								<li><i class="fa fa-phone"></i>+62 813-4300-9779</li>
								<li><i class="fa fa-envelope"></i> gebitomia@gmail.com</li>
							</ul>
						</div>
						<div class="col-lg-6">
							<div class="tn-right">
								<div class="top-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
									<a href="https://wa.me/6281343009779?text=Halo%20Admin%20Kost,%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda" target="_blank"><i class="fa fa-whatsapp"></i></a>
								</div>
								<div class="language-option">
									<!-- <img src="../gambar/horisonkdi.png" alt="">
									<span>
										<center> -->
									<img src="../simpangambar/<?php
																if ($foto != '') {
																	echo $foto;
																} else {
																	echo 'profil.png';
																}
																?>" alt="">
									<span><?php echo $nama; ?> <i class=" fa fa-angle-down"></i>
									</span>
									<div class="flag-dropdown">
										<ul>
										<li><a href="profil" id="tomboll"><i class="fa-solid fa-user" style="margin-right: 10px;"></i>Profil</a></li>
										<li><a href="../fungsi/proseskeluar.php" id="tombol2"><i class="fa-solid fa-right-from-bracket" style="margin-right: 5px;"></i>Keluar</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="menu-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
							<div class="logo">
								<a href="index">
									<img src="../img/logo.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="nav-menu">
								<nav class="mainmenu">
									<ul>
										<li class="active"><a href="index">Beranda</a></li>
										<li><a href="tentangkami">Tentang kami</a></li>
										<li><a href="kamar">Kamar</a></li>
										<li><a href="datapesanan">Data Pesananan</a></li>
										<li><a href="Kontak">Kontak</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->

		<!-- Include your content here -->