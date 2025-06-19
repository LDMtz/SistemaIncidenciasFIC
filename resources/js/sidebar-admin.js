  const sidebar = document.getElementById('sidebar');
  const collapseBtn = document.getElementById('toggle-collapse');
  const expandBtn = document.getElementById('toggle-expand');
  const sidebarTexts = document.querySelectorAll('.sidebar-text');
  const sidebarTitle = document.querySelector('.sidebar-title');
  const sidebarCollapseBtn = document.querySelector('.sidebar-collapse-btn');
  const menuItems = document.querySelectorAll('.menu-item');
  const themeToggleItem = document.querySelector('.theme-toggle-item');
  const themeText = document.getElementById('theme-text');

  collapseBtn.addEventListener('click', () => {
    // Reducir ancho del sidebar
    sidebar.style.width = '4rem';
    sidebar.classList.add('collapsed');

    // Ocultar textos de menú
    sidebarTexts.forEach(el => {
      el.style.width = '0';
      el.style.opacity = '0';
      el.style.marginLeft = '0';
    });
    // Ocultar título y botón de collapse
    sidebarTitle.style.width = '0';
    sidebarTitle.style.opacity = '0';
    sidebarTitle.style.marginLeft = '0';
    sidebarCollapseBtn.style.width = '0';
    sidebarCollapseBtn.style.opacity = '0';
    sidebarCollapseBtn.style.marginLeft = '0';

    // Quitar la clase de hover que añade el borde
    menuItems.forEach(a => {
      a.classList.remove('hover:border-main-2');
    });

    // Ocultar toggle theme
    if (themeToggleItem) {
      themeToggleItem.style.width = '0';
      themeToggleItem.style.opacity = '0';
      themeToggleItem.style.marginLeft = '0';
    }

    themeText.classList.add('hidden');
  });

  expandBtn.addEventListener('click', () => {
    if (sidebar.style.width === '4rem') {
      // Restaurar ancho
      sidebar.style.width = '13rem';
      sidebar.classList.remove('collapsed');

      // Mostrar textos de menú
      sidebarTexts.forEach(el => {
        el.style.width = '';
        el.style.opacity = '';
        el.style.marginLeft = '';
      });
      // Mostrar título y botón collapse
      sidebarTitle.style.width = '';
      sidebarTitle.style.opacity = '';
      sidebarTitle.style.marginLeft = '';
      sidebarCollapseBtn.style.width = '';
      sidebarCollapseBtn.style.opacity = '';
      sidebarCollapseBtn.style.marginLeft = '';

      // Volver a añadir la clase de hover para el borde
      menuItems.forEach(a => {
        a.classList.add('hover:border-main-2');
      });

      // Mostrar toggle theme
      if (themeToggleItem) {
        themeToggleItem.style.width = '';
        themeToggleItem.style.opacity = '';
        themeToggleItem.style.marginLeft = '';
      }

      themeText.classList.remove('hidden');
    }
  });

  //toggle theme
  document.addEventListener('DOMContentLoaded', () => {
    const themeToggles = document.querySelectorAll('.theme-toggle-sidebar');
    const body = document.body;

    function updateIcons(isDark, container) {
        const moonIcon = container.querySelector('.icon-moon-sidebar');
        const sunIcon = container.querySelector('.icon-sun-sidebar');

        if (moonIcon && sunIcon) {
            moonIcon.classList.toggle('show-element', isDark);
            moonIcon.classList.toggle('hide-element', !isDark);

            sunIcon.classList.toggle('show-element', !isDark);
            sunIcon.classList.toggle('hide-element', isDark);
        }
    }

    function syncAllToggles(isDark) {
        themeToggles.forEach(t => (t.checked = isDark));
    }

    // Estado inicial
    const savedTheme = localStorage.getItem('theme');
    const isDarkInitial = savedTheme === 'dark';
    if (savedTheme) {
        body.setAttribute('data-theme', savedTheme);
    }

    // Actualiza todos los toggles y sus íconos locales
    themeToggles.forEach(toggle => {
        toggle.checked = isDarkInitial;
        const sidebar = toggle.closest('.sidebar');
        if (sidebar) {
            updateIcons(isDarkInitial, sidebar);
        }

        toggle.addEventListener('change', () => {
            const isDark = toggle.checked;
            const theme = isDark ? 'dark' : 'light';
            body.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            syncAllToggles(isDark);

            // Actualizar íconos solo dentro de cada sidebar
            themeToggles.forEach(t => {
                const s = t.closest('.sidebar');
                if (s) updateIcons(isDark, s);
            });
        });
    });
});