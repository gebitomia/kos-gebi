<?php
include "fungsi/koneksi.php";
session_start();
if (isset($_SESSION['ceklog'])) {
    echo "<script>window.location.replace('beranda.php')</script>";
} else {
    unset($_SESSION['ceklog']);
?>

    <html>

    <head>
        <title>Login Admin</title>
        <link rel="stylesheet" href="css/logstyle.css" type="text/css" />
    </head>

    <body>

        <div class="background">
            <div class="login-container">
                <div class="login-box">
                    <form method="post" action="fungsi/proseslogin">
                        <h2>Masuk</br>Halaman Admin</h2>
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" autocomplete="off" required>
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
                    <p>Belum punya akun? <a href="#">Daftar</a></p>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
}
?>