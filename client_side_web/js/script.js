'use strict';

// Make Password Visual
let passInput = document.querySelector('.pass-input');
let eye = document.querySelector('.visual-password');

eye.addEventListener('click', function() {
    if (passInput.classList.toggle('hide')) {
        passInput.type = 'text';
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
    }
    else {
        passInput.type = 'password';
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
    }
});