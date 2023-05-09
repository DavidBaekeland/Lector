import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let userModalLink = document.getElementById('register-modal-link');

let userModal = document.getElementById('register-modal');

userModalLink.addEventListener('click', (e) => {
    userModal.classList.remove('none')
});


