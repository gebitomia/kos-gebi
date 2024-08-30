<?php
	require_once "view/header.php";
?>

<div class="edit-profile-background">
    <div class="container">
        <div class="edit-profile-container">
            <h2>Edit Profil</h2>
            <div class="edit-profile-picture-container">
                <img id="editProfilePicturePreview" src="../simpangambar/<?php 
				if ($foto != '') {
					echo $foto;
				}
				else {
					echo 'profil.png';
				}
			?>" alt="Profil" class="rounded-circle">
            </div>
            <form method="post" action="../fungsi/edit" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="editUsername" class="col-sm-4 col-form-label" style="text-align:left;">Username</label>
                    <div class="col-sm-8">
						<input type="hidden" name="tid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" id="editUsername" name="tuser" value="<?php echo $username ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editEmail" class="col-sm-4 col-form-label" style="text-align:left;">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="editEmail" name="temail" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editNamaLengkap" class="col-sm-4 col-form-label" style="text-align:left;">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="editNamaLengkap" name="tnama" value="<?php echo $nama ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editNoTelepon" class="col-sm-4 col-form-label" style="text-align:left;">No Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="editNoTelepon" name="ttelepon" value="<?php echo $telepon ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editAlamat" class="col-sm-4 col-form-label" style="text-align:left;">Alamat</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="editAlamat" name="talamat" rows="3"><?php echo $alamat ?></textarea>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="editAlamat" class="col-sm-4 col-form-label" style="text-align:left;">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="editAlamat" name="tfoto" rows="3"></input>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning btn-block">UPDATE</button>
            </form>
        </div>
    </div>
</div>


<?php
	require_once "view/footer.php"
?>