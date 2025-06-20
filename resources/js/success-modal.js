document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('successModal');
    const modalContent = document.getElementById('successModalContent');

    //Cerrar automáticamente después de 1 segundo
    setTimeout(() => {
        modal?.remove();
    }, 2000);

    //Cerrar si se hace clic fuera del modal
    modal.addEventListener('click', (e) => {
        if (!modalContent.contains(e.target)) {
            modal.remove();
        }
    });
});