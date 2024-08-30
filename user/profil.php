<?php
	require_once "view/header.php";

if (isset($_POST['gantipass'])) {
    $idp = $_POST['tid'];
    $lama = md5($_POST['passlama']);
    $baru = md5($_POST['passbaru']);
    
    // Validasi password lama di server
    $caripassword = $pdo->query("SELECT * FROM tamu WHERE password='$lama'");
    $cekpassword = $caripassword->rowCount();

    if ($cekpassword == 0) {
        echo "<script>
            swal({
                title: 'Password Lama Salah!',
                text: 'Password lama yang Anda masukkan salah.',
                type: 'error',
                showConfirmButton: false,
                timer: 5000
            }).then(function() {
                window.location.href='#gantipassword';
            });
        </script>";
    } else {
        // Update password baru
        $pdo->query("UPDATE tamu SET password='$baru' WHERE idtamu='$idp'");
        echo "<script>
            swal({
                title: 'Password Berhasil Diganti!',
                text: 'Password Anda telah berhasil diganti.',
                type: 'success',
                showConfirmButton: false,
                timer: 5000
            }).then(function() {
                window.location.href='profil';
            });
        </script>";
    }
}
?>

	


<div class="profile-background">
    <div class="container">
        <div class="profile-container">
            <h2>Profil</h2>
            <img src="../simpangambar/<?php 
                if ($foto != '') {
                    echo $foto;
                }
                else {
                    echo 'profil.png';
                }
            ?>" alt="Profil" width="120" height="120">
            <table class="profile-info-table">
                <tr>
                    <td class="label">Username</td>
                    <td class="value">:<?php echo $username; ?></td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="value">:<?php echo $email; ?></td>
                </tr>
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="value">:<?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td class="label">No Telepon</td>
                    <td class="value">:<?php echo $telepon; ?></td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="value">:<?php echo $alamat; ?></td>
                </tr>
            </table>
            <div class="profile-buttons">
                <a href="editprofil" class="btn btn-warning">EDIT PROFIL</a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#gantipasswordModal">GANTI PASSWORD</a>
            </div>
        </div>
    </div>
</div>



<!-- Modal Ganti Password -->
<div class="modal fade" id="gantipasswordModal" tabindex="-1" role="dialog" aria-labelledby="gantipasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gantipasswordModalLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="profil" onsubmit="return validatePassword()">
          <div class="form-group">
            <label for="passlama">Password Lama</label>
            <input type="password" class="form-control" id="passlama" name="passlama" required>
          </div>
          <div class="form-group">
            <label for="passbaru">Password Baru</label>
            <input type="password" class="form-control" id="passbaru" name="passbaru" palcholder="Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, angka, dan simbol." required>
            <small id="passwordHelp" class="form-text text-muted">Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, angka, dan simbol.</small>
          </div>
          <div class="form-group">
            <label for="konfirmasi">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" required>
          </div>
          <input type="hidden" name="tid" value="<?php echo $id; ?>">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="gantipass" class="btn btn-primary">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<?php
	require_once "view/footer.php"
?>