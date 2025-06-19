document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle-header');
    const body = document.body;
    const iconMoon = document.getElementById('icon-moon-header');
    const iconSun = document.getElementById('icon-sun-header');

    if (!themeToggle) return; 

    function updateIcons(isDark) {
        if (!iconMoon || !iconSun) return;

        if (isDark) {
            iconMoon.classList.add('show-element');
            iconMoon.classList.remove('hide-element');
            iconSun.classList.add('hide-element');
            iconSun.classList.remove('show-element');
        } else {
            iconMoon.classList.add('hide-element');
            iconMoon.classList.remove('show-element');
            iconSun.classList.add('show-element');
            iconSun.classList.remove('hide-element');
        }
    }

    // Cargar tema guardado
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        const isDark = savedTheme === 'dark';
        body.setAttribute('data-theme', savedTheme);
        themeToggle.checked = isDark;
        updateIcons(isDark);
    } else {
        updateIcons(themeToggle.checked); // estado inicial por defecto
    }

    // Cambiar tema al hacer toggle
    themeToggle.addEventListener('change', () => {
        const isDark = themeToggle.checked;
        const theme = isDark ? 'dark' : 'light';
        body.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        updateIcons(isDark);
    });
});


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
