<x-app-layout>

<!-- Sidebar -->
<aside id="sidebar" class=" w-54 h-auto bg-main-6 rounded-xl text-text-1 transition-all duration-100 ease-in-out overflow-hidden">
  <!-- Header -->
  <div class="flex items-center justify-between p-4 border-b border-main-3">
    <div class="flex items-center gap-2">
      <img src="favicon.ico" alt="Logo" id="toggle-expand" class="w-8 h-8 cursor-pointer" />
      <h3 class="text-m font-semibold leading-tight sidebar-title ml-4">SECRETARÍA <br> ACADÉMICA</h3>
    </div>
    <button id="toggle-collapse" class="text-white text-xl hover:text-text-2 sidebar-collapse-btn">
      <i class="fas fa-arrow-circle-left"></i>
    </button>
  </div>

  <!-- Menu -->
  <nav class="flex flex-col p-4 gap-2">

  <!-- El chorizero de código es para que se vea de otro color el texto, iconos, cambie el fondo al pasar el mouse y en la orilla se pinte otro cachito de diferente color -->
  <!-- hover:bg-main-7 le da el color al fondo, before:bg-main-2 le da el color al cachito del final, hover:text-main-2 le cambia el color al texto y iconos. Y así sucesivamente -->
    <a href="#" class="relative flex items-center gap-3 px-3 py-2 hover:bg-main-7 rounded 
     before:content-[''] before:absolute before:right-0 before:top-0 before:h-full 
     before:w-1 before:bg-main-2 before:opacity-0 hover:before:opacity-100 transition-all duration-100 hover:text-main-2">
      <i class="fas fa-house"></i><span class="sidebar-text">Inicio</span>
    </a>
    <a href="#" class="relative flex items-center gap-3 px-3 py-2 hover:bg-main-7 rounded 
     before:content-[''] before:absolute before:right-0 before:top-0 before:h-full 
     before:w-1 before:bg-main-2 before:opacity-0 hover:before:opacity-100 transition-all duration-100 hover:text-main-2">
      <i class="fas fa-user"></i><span class="sidebar-text">Usuarios</span>
    </a>
    <a href="#" class="relative flex items-center gap-3 px-3 py-2 hover:bg-main-7 rounded 
     before:content-[''] before:absolute before:right-0 before:top-0 before:h-full 
     before:w-1 before:bg-main-2 before:opacity-0 hover:before:opacity-100 transition-all duration-100 hover:text-main-2">
      <i class="fas fa-folder"></i><span class="sidebar-text">Reportes</span>
    </a>
    <a href="#" class="relative flex items-center gap-3 px-3 py-2 hover:bg-main-7 rounded 
     before:content-[''] before:absolute before:right-0 before:top-0 before:h-full 
     before:w-1 before:bg-main-2 before:opacity-0 hover:before:opacity-100 transition-all duration-100 hover:text-main-2">
      <i class="fas fa-file-alt"></i><span class="sidebar-text">Informes</span>
    </a>
    
    <a href="#" class="relative flex items-center gap-3 px-3 py-2 hover:bg-main-7 rounded 
     before:content-[''] before:absolute before:right-0 before:top-0 before:h-full 
     before:w-1 before:bg-main-2 before:opacity-0 hover:before:opacity-100 transition-all duration-100 hover:text-main-2">
      <i class="fas fa-layer-group"></i><span class="sidebar-text">Áreas</span>
    </a>
  </nav>


</aside>

<script>
  const sidebar = document.getElementById('sidebar');
  const collapseBtn = document.getElementById('toggle-collapse');
  const expandBtn = document.getElementById('toggle-expand');

  const sidebarTexts = document.querySelectorAll('.sidebar-text');
  const sidebarTitle = document.querySelector('.sidebar-title');
  const sidebarCollapseBtn = document.querySelector('.sidebar-collapse-btn');

  collapseBtn.addEventListener('click', () => {
    sidebar.classList.remove('w-54');
    sidebar.classList.add('w-16');
    sidebarTexts.forEach(el => el.classList.add('hidden'));
    sidebarTitle.classList.add('hidden');
    sidebarCollapseBtn.classList.add('hidden');
  });

  expandBtn.addEventListener('click', () => {
    if (sidebar.classList.contains('w-16')) {
      sidebar.classList.remove('w-16');
      sidebar.classList.add('w-54');
      sidebarTexts.forEach(el => el.classList.remove('hidden'));
      sidebarTitle.classList.remove('hidden');
      sidebarCollapseBtn.classList.remove('hidden');
    }
  });
</script>
</x-app-layout>