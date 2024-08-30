<?php
require_once "view/header.php"; // Memuat header
include "fungsi/koneksi.php"; // Menghubungkan ke database

// Ambil ID tamu dari URL
$idtamu = $_GET['idtamu'];

// Pastikan ID tamu adalah angka
if (!is_numeric($idtamu)) {
    die("<script>alert('ID tamu tidak valid!'); window.location.href = 'datauser';</script>");
}

// Query untuk mengambil data tamu
$sql = $pdo->prepare("SELECT * FROM tamu WHERE idtamu = ?");
$sql->execute([$idtamu]);
$caridata = $sql->fetch();

if ($caridata) {
    // Jika data ditemukan, simpan dalam variabel
    $idtamu = $caridata['idtamu'];
    $username = $caridata['username'];
    $email = $caridata['email'];
    $nama = $caridata['nama'];
    $alamat = $caridata['alamat'];
    $telepon = $caridata['telepon'];
    $password = $caridata['password'];
} else {
    // Jika data tidak ditemukan, beri pesan dan alihkan pengguna
    die("<script>alert('Data tidak ditemukan!'); window.location.href = 'datauser';</script>");
}
?>

<div class="content-wrapper">
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Data</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Data User >> Edit Data User</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Data User</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form method="post" action="fungsi/prosesedituser.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>ID User</label>
                                <input class="form-control" type="text" placeholder="Masukkan Id User" name="idtamu" value="<?php echo htmlspecialchars($idtamu); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="Masukkan Username" name="editusername" value="<?php echo htmlspecialchars($username); ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" placeholder="email@gmail.com" name="editemail" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" placeholder="Nama Lengkap" name="editnama" value="<?php echo htmlspecialchars($nama); ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Alamat Lengkap" name="editalamat" style="height:100px;"><?php echo htmlspecialchars($alamat); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="editpassword" value="<?php echo htmlspecialchars($password); ?>">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="datauser"><input type="button" class="btn btn-danger" value="Batal"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
require_once "view/footer.php";
?>
