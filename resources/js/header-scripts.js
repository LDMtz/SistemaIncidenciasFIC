
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const iconMoon = document.getElementById('icon-moon');
    const iconSun = document.getElementById('icon-sun');

    function updateIcons(isDark) {
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