//Sidebar MOBILE
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('mobile-sidebar-toggle');
    const mobileSidebar = document.getElementById('mobile-sidebar');

    if (toggleBtn && mobileSidebar) {
        // Mostrar/ocultar sidebar con transición
        toggleBtn.addEventListener('click', () => {
            mobileSidebar.classList.toggle('-translate-x-full'); // se quita o se pone
        });

        // Cerrar al hacer clic fuera del sidebar
        document.addEventListener('click', (e) => {
            const clickedInsideSidebar = mobileSidebar.contains(e.target);
            const clickedToggleButton = toggleBtn.contains(e.target);

            if (!clickedInsideSidebar && !clickedToggleButton && !mobileSidebar.classList.contains('-translate-x-full')) {
                mobileSidebar.classList.add('-translate-x-full');
            }
        });
    }
});

// Dropdown header
const dropdownButton = document.getElementById('dropdownHeaderDefaultButton');
const dropdownMenu = document.getElementById('dropdown-header');
const chevronDownIcon = document.getElementById('chevronDownIconHeader');
const chevronUpIcon = document.getElementById('chevronUpIconHeader');

if (dropdownButton && dropdownMenu && chevronDownIcon && chevronUpIcon) {
    dropdownButton.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');

        chevronDownIcon.classList.toggle('hide-element');
        chevronDownIcon.classList.toggle('show-element');

        chevronUpIcon.classList.toggle('hide-element');
        chevronUpIcon.classList.toggle('show-element');
    });

    document.addEventListener('click', function (event) {
        if (
        !event.target.closest('#dropdownHeaderDefaultButton') &&
        !event.target.closest('#dropdown-header')
        ) {
        dropdownMenu.classList.add('hidden');

        chevronDownIcon.classList.remove('hide-element');
        chevronDownIcon.classList.add('show-element');

        chevronUpIcon.classList.remove('show-element');
        chevronUpIcon.classList.add('hide-element');
        }
    });
}