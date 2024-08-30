<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="../../lib/sweet.js"></script>
</head>
<body>

<?php
    include "koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user = $_POST['username'];
		$pass = $_POST['password'];
	
		// Mencari username di database
		$sql = $pdo->prepare("SELECT * FROM login WHERE username = :username");
		$sql->bindParam(':username', $user);
		$sql->execute();
		$user_data = $sql->fetch(PDO::FETCH_ASSOC);
	
		// Jika username ditemukan, verifikasi password
		if ($user_data && password_verify($pass, $user_data['password'])) {
			session_start();
			$_SESSION['ceklog'] = $user_data['username'];
	
			echo "<script>swal({
				type: 'success',
				title: 'Login Sukses!',
				showConfirmButton: false,
				backdrop: 'rgba(0,0,123,0.5)',
			});
			window.setTimeout(function(){
				window.location.replace('../beranda');
			}, 1500);</script>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Login Gagal! Username atau password salah.',
				showConfirmButton: false,
				backdrop: 'rgba(123,0,0,0.5)',
			});
			window.setTimeout(function(){
				window.location.replace('../');
			}, 1500);</script>";
		}
	}
	?>

</body>
</html>
