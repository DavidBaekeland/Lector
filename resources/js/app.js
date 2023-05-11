import './bootstrap';
import './chat';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let userModalLink = document.getElementById('register-modal-link');

let userModal = document.getElementById('register-modal');

if (userModal) {
    userModalLink.addEventListener('click', (e) => {
        userModal.classList.remove('none')
    });
}
