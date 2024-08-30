<?php
session_start();
require_once "fungsi/koneksi.php";

if (isset($_SESSION['user'])) {
	echo "<script>window.location.replace('user/');</script>";
	exit(); // Pastikan untuk keluar setelah pengalihan
} else {
	unset($_SESSION['user']);
}
?>

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
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-free-6.6.0-web/css/all.min.css">
	<link rel="stylesheet" href="css/flaticon.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/daftar.css" type="text/css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" src="lib/sweet.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header Hp -->
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
				<div class="flag-dropdown"></div>
				<a href="login" id="tomboll" class="bk-btn">Masuk</a>
			</div>
			<a href="daftar" id="tombol2" class="bk-btn">Daftar</a>
		</div>
		<nav class="mainmenu mobile-menu">
			<ul>
				<li class="active"><a href="index">Beranda</a></li>
				<li><a href="tentangkami">Tentang kami</a></li>
				<li><a href="kamar">Kamar</a></li>
				<li><a href="kontak">Kontak</a></li>
			</ul>
		</nav>
		<div id="mobile-menu-wrap"></div>
		<ul class="top-widget">
			<li><i class="fa fa-phone"></i>+62 813-4300-9779</li>
			<li><i class="fa fa-envelope"></i> gebitomia@gmail.com</li>
		</ul>
	</div>
	<!-- Header Hp End -->





	
	<!-- Header Laptop/Desktop -->
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
						<div class="tn-right"></div>
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
								<img src="img/logo.png" alt="">
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
									<li><a href="kontak">Kontak</a></li>
									<a href="login" class="bk-btn" style="padding-right: 5px; display: inline-block;font-size: 10px;font-weight: 400; padding: 8px 10px 8px;background: #dfa974;color: #ffffff;text-transform: uppercase;letter-spacing: 2px;">Masuk</a>
									<a href="daftar" class="bk-btn" style="padding-right: 5px; display: inline-block;font-size: 10px;font-weight: 400; padding: 8px 10px 8px;background: #dfa974;color: #ffffff;text-transform: uppercase;letter-spacing: 2px;">Daftar</a>
								</ul>
							</nav>
							<!-- <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header laptop/desktop End -->