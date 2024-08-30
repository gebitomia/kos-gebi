<?php
require_once "view/header.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari user berdasarkan username
    $sqll = $pdo->prepare("SELECT * FROM tamu WHERE username = ?");
    $sqll->execute([$username]);
    $akses1 = $sqll->fetch();

    // Jika user ditemukan, verifikasi password
    if ($akses1 && password_verify($password, $akses1['password'])) {
        $_SESSION['user'] = $akses1['idtamu'];
        echo "<script>
            swal({
                type: 'success',
                title: 'Login Sukses!',
                showConfirmButton: false,
                backdrop: 'rgba(0,0,123,0.5)',
            });
            setTimeout(function() {
                window.location.href = 'user/';
            }, 1500);
        </script>";
    } else {
        echo "<script>
            swal({
                type: 'error',
                title: 'Login Gagal! </br> Username / Password Salah',
                showConfirmButton: false,
                backdrop: 'rgba(123,0,0,0.5)',
            });
            setTimeout(function() {
                window.location.href = 'login';
            }, 1500);
        </script>";
    }
    exit();
}
?>


<div class="background">
    <div class="login-container">
        <div class="login-box">
            <form method="post" action="login" id="loginForm">
                <h2>Masuk</h2>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required autofocus>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required>
                </div>
                <div class="actions">
                    <label>
                        <input type="checkbox" name="remember"> Ingatkan saya
                    </label>
                </div>
                <button name="submit" type="submit" class="button-style">Masuk</button>
            </form>
            <p>Belum punya akun? <a href="daftar">Daftar</a></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fokus pada input username saat halaman dimuat
        document.getElementById('username').focus();

        // Menangani peristiwa keydown untuk input username
        document.getElementById('username').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Mencegah submit form
                document.getElementById('password').focus(); // Pindah fokus ke password
            }
        });

        // Menangani peristiwa keydown untuk input password
        document.getElementById('password').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                document.getElementById('submit').focus(); // Submit form
            }
        });
    });
</script>


<?php
require_once "view/footer.php";
?>
