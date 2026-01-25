function openImageModal(imageSrc) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        
        modalImage.src = imageSrc;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Prevenir scroll del body
        document.body.style.overflow = 'hidden';
    }

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    
    // Restaurar scroll del body
    document.body.style.overflow = 'auto';
}


// Registrar funciones globales
window.openImageModal = openImageModal;
window.closeImageModal = closeImageModal;