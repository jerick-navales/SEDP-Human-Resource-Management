/* /Assets/Js/login.js */

function checkScreenSize() {
    const username = document.getElementById('username').value;
    const isAdmin = username.toLowerCase() === 'admin'; 
    if (isAdmin && window.innerWidth <= 768) {
        document.getElementById('admin-login-message').style.display = 'block';
        return false;
    }
    return true;
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
