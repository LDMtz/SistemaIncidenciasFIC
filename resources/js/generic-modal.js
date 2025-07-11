window.openModal = function(id) {
    const modal = document.getElementById(id);
    if (modal) {
        document.body.classList.add('overflow-hidden');
        modal.classList.remove('hidden');
    }
};

window.closeModal = function(id) {
    const modal = document.getElementById(id);
    if (modal) {
        document.body.classList.remove('overflow-hidden');
        modal.classList.add('hidden');
    }
};