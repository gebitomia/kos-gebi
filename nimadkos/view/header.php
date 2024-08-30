<?php
session_start();
require_once "fungsi/koneksi.php";
if (!isset($_SESSION['ceklog'])) {
?>
	<html>

	<head>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>

	<body>
		<script>
			Swal.fire({
				title: 'Oops...?',
				text: 'Silahkan Login Terlebih Dahulu!',
				icon: 'warning',
				backdrop: 'rgba(123,0,0,0.5)',
				showConfirmButton: false,
				timer: 2000
			}).then(() => {
				window.location.replace('index.php');
			});
		</script>
	</body>

	</html>
<?php
	exit(); // Menghentikan eksekusi jika pengguna belum login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin ekost Waiheru</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
	<link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand">Admin
                        <span class="brand-tip">Kost</span>
                    </span>
                    <span class="brand-mini">AK</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="fungsi/proseskeluar"><i
                                    class="fa fa-power-off"></i>Keluar</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">Ekost Waiheru</div><small>Administrator</small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="beranda"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="inputkamar"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Input Kamar</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Data</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="datakamar">Data Kamar</a>
                            </li>
                            <li>
                                <a href="stokkamar">Stok Kamar</a>
                            </li>
                            <li>
                                <a href="datauser">Data User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="databayar"><i class="sidebar-item-icon fa fa-money"></i>
                            <span class="nav-label">Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="konfirmasi"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Konfirmasi Pesananan</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Transaksi</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="transaksiberhasil">Transaksi Sukses</a>
                            </li>
                            <li>
                                <a href="transaksibatal">Transaksi Batal</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="kontak"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Kontak</span>
                        </a>
                    </li>
                    <li>
                        <a href="fungsi/proseskeluar"><i class="sidebar-item-icon fa fa-power-off"></i>
                            <span class="nav-label">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->