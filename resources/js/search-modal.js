// Obtener los elementos
const openModalSearchBtn = document.getElementById('open-modal-search');
const closeModalSearchBtn = document.getElementById('close-modal-search');
const modalSearch = document.getElementById('search-modal');

// Abrir el modal
openModalSearchBtn.addEventListener('click', (e) => {
    e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
    modalSearch.classList.remove('hidden'); // Quitar la clase `hidden` para mostrar el modal
});

// Cerrar el modal
closeModalSearchBtn.addEventListener('click', () => {
    modalSearch.classList.add('hidden'); // Agregar la clase `hidden` para ocultar el modal
});