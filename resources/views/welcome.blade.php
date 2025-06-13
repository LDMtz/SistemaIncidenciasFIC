<x-app-layout>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- sidebar.html -->
<aside class="sidebar expanded" id="sidebar">
  <div class="sidebar-header">
    <img src="favicon.ico" alt="Logo" class="logo" id="toggle-expand"/>
  <h3 class="sidebar-title">SECRETARÍA <br>ACADÉMICA</h3>
  <button class="fas fa-arrow-circle-left icon back-btn" id="toggle-collapse"></button>
  </button> 
 </div>

<nav class="menu">
  <a href="#" class="active"><i class="fas fa-house icon"></i><span>Inicio</span></a>
  <a href="#"><i class="fas fa-user icon"></i><span>Usuarios</span></a>
  <a href="#"><i class="fas fa-folder icon"></i><span>Reportes</span></a>
  <a href="#"><i class="fas fa-file-alt icon"></i><span>Informes</span></a>
  <a href="#"><i class="fas fa-layer-group icon"></i><span>Áreas</span></a>
</nav>


  <div class="toggle-mode">
    <i class="fas fa-moon icon"></i><span>Oscuro</span>
    <label class="switch">
      <input type="checkbox" checked>
      <span class="slider"></span>
    </label>
  </div>
</aside>
<script>
  const sidebar = document.getElementById('sidebar');
  const collapseBtn = document.getElementById('toggle-collapse');
  const expandBtn = document.getElementById('toggle-expand');

  collapseBtn.addEventListener('click', () => {
    sidebar.classList.remove('expanded');
    sidebar.classList.add('collapsed');
  });

  expandBtn.addEventListener('click', () => {
    if (sidebar.classList.contains('collapsed')) {
      sidebar.classList.remove('collapsed');
      sidebar.classList.add('expanded');
    }
  });
</script>


</x-app-layout>