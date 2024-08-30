// Fungsi untuk validasi password
function validatePassword() {
    const password = document.getElementById('passbaru').value;
    const confirmPassword = document.getElementById('konfirmasi').value;
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
        passwordHelp.style.color = 'green';
        passwordHelp.textContent = 'Password memenuhi kriteria.';
    }

    if (password !== confirmPassword) {
        swal({
            title: 'Konfirmasi Password Salah!',
            text: 'Konfirmasi password tidak sesuai dengan password baru.',
            type: 'error',
            showConfirmButton: true,
        });
        return false;
    }

    return true;
}


