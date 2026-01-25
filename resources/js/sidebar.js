  const sidebar = document.getElementById('sidebar');
  const collapseBtn = document.getElementById('toggle-collapse');
  const expandBtn = document.getElementById('toggle-expand');
  const sidebarTexts = document.querySelectorAll('.sidebar-text');
  const sidebarTitle = document.querySelector('.sidebar-title');
  const sidebarCollapseBtn = document.querySelector('.sidebar-collapse-btn');
  const menuItems = document.querySelectorAll('.menu-item');

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
  });

  expandBtn.addEventListener('click', () => {
    if (sidebar.style.width === '4rem') {
      // Restaurar ancho
      sidebar.style.width = '14rem';
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
    }
  });