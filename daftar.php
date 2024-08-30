<?php
require_once "view/header.php";

if(isset($_POST['submit'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Validasi username
    $sqlUser = $pdo->prepare("SELECT * FROM tamu WHERE username = ?");
    $sqlUser->execute([$user]);
    if ($sqlUser->rowCount() > 0) {
        echo "<script>
            swal({
                type: 'error',
                title: 'Maaf, Username sudah digunakan!',
                showConfirmButton: true,
                backdrop: 'rgba(123,0,0,0.5)',
            });
            
            window.setTimeout(function(){
            window.location.replace('daftar');
        } ,1500);
        </script>";
        exit();
    }

    // Validasi email
    $sqlEmail = $pdo->prepare("SELECT * FROM tamu WHERE email = ?");
    $sqlEmail->execute([$email]);
    if ($sqlEmail->rowCount() > 0) {
        echo "<script>
            swal({
                type: 'error',
                title: 'Maaf, Email sudah digunakan!',
                showConfirmButton: true,
                backdrop: 'rgba(123,0,0,0.5)',
            });
            
          window.setTimeout(function(){
            window.location.replace('daftar');
        } ,1500);
        </script>";
        exit();
    }

    // Validasi nomor telepon
    if (!preg_match('/^08[0-9]{9,11}$/', $telepon)) {
        echo "<script>
            swal({
                type: 'error',
                title: 'Maaf, No Telp tidak masuk dalam kriteria!',
                text: 'Nomor telepon harus diawali dengan 08 dan memiliki panjang 11-13 digit.',
                showConfirmButton: true,
                backdrop: 'rgba(123,0,0,0.5)',
            });
          window.setTimeout(function(){
            window.location.replace('daftar');
        } ,1500);
        </script>";
        exit();
    }

    // Menggunakan password_hash untuk meng-hash password dengan algoritma BCRYPT
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    // Menyimpan data ke dalam database
    $sqlsimpan = $pdo->query("INSERT INTO tamu VALUES('', '$user', '$email', '$nama', '$alamat', '$telepon', '$pass', '')");

    // Menampilkan pesan sukses dengan SweetAlert
    echo "<script>
        swal({
            type: 'success',
            title: 'Registrasi Sukses!',
            showConfirmButton: false,
            backdrop: 'rgba(0,0,123,0.5)',
        });
        window.setTimeout(function(){
            window.location.replace('login');
        } ,1500);
    </script>";
}
?>

<div class="backgroundd">
    <div class="login-containerr">
        <div class="login-boxx">
            <form method="post" action="daftar" onsubmit="return validatePassword();">
                <h2>Daftar</h2>
                
                <div class="form-row">
                    <div class="input-groupp">
                        <label for="user">Username</label>
                        <input type="text" id="user" name="user" placeholder="Masukkan username" autocomplete="off" required autofocus>
                    </div>
                    <div class="input-groupp">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email yang valid" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-groupp">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama lengkap anda" autocomplete="off" required>
                    </div>
                    <div class="input-groupp">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-groupp">
                        <label for="telepon">Telepon</label>
                        <input type="text" id="telepon" name="telepon" placeholder="No.tlp dengan awalan 08" autocomplete="off" required>
                    </div>
                    <div class="input-groupp">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="pass" autocomplete="off" required>
                        <small id="passwordHelp" class="form-text text-muted"></small>
                    </div>
                </div>

                <button name="submit" type="submit" class="button-style">Daftar</button>
            </form>
            <p>Sudah punya akun? <a href="login">Masuk</a></p>
        </div>
    </div>
</div>

<script>
// Fungsi untuk validasi password
function validatePassword() {
    const password = document.getElementById('password').value;
    const passwordHelp = document.getElementById('passwordHelp');

    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumbers = /\d/.test(password);
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>\-_+=\\\/'; ]/.test(password);

    if (password.length < minLength || !hasUpperCase || !hasLowerCase || !hasNumbers || !hasSpecialChar) {
        passwordHelp.style.color = 'red';
        passwordHelp.textContent = 'Password tidak memenuhi kriteria.';
        return false;
    } else {
        passwordHelp.style.color = 'white';
        passwordHelp.textContent = 'Password memenuhi kriteria.';
    }

    return true;
}
</script>

<?php
require_once "view/footer.php";
?>
