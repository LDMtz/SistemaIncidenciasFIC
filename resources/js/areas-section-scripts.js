//Para el contador de encargados seleccionados en la seccion "Nueva área"
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="encargados[]"]');
    const countSpan = document.getElementById('encargado-count');

    function updateCount() {
        const selected = Array.from(checkboxes).filter(cb => cb.checked).length;
        countSpan.textContent = selected;
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateCount);
    });

    // Por si alguno ya viene marcado al renderizar la página
    updateCount();
});

// --------------------------------------------------------------------------
//Ver elemento para generalizar, pero elemento es "Área" en este caso
function verElemento(id) {
    openModal('show-area-modal');

    const areaLoading = document.getElementById('area-loading-show');
    const areaDetalles = document.getElementById('area-detalles-show');

    // Mostrar el spinner, ocultar detalles
    areaLoading.classList.remove('hidden');
    areaDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/areas/${id}`)
    .then(res => res.json())
    .then(data => {
        //LLenar datos
        document.getElementById('nombreAreaShow').value  = data.nombre;
        document.getElementById('numEncargadosShow').value  = data.encargados_count;

        if(data.estado){
            document.getElementById('estadoActivoShow').style.display = 'inline-flex';
            document.getElementById('estadoInactivoShow').style.display = 'none';
        } else{
            document.getElementById('estadoActivoShow').style.display = 'none';
            document.getElementById('estadoInactivoShow').style.display = 'inline-flex';
        }

        if (data.created_at) {
            const fecha = data.created_at.split('T')[0].trim(); // 1. Separa en ["2025-06-20", "08:40:39.000000Z"]
            document.getElementById('fechaCreacionShow').value = fecha;
        } else {
            document.getElementById('fechaCreacionShow').value = 'Sin fecha';
        }

        //Cargamos los encargados
        const tablaContenedor = document.getElementById('contenedorTablaShow');
        const tbody = tablaContenedor.querySelector('tbody');
        tbody.innerHTML = ''; //Limpiar contenido anterior

        if (data.encargados.length === 0) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');

            td.colSpan = 1; // Ajusta según el número de columnas que tenga tu tabla
            td.className = 'text-center text-sm dark:text-slate-400 light:text-slate-500 py-2';
            td.textContent = 'Sin encargados disponibles.';

            tr.appendChild(td);
            tbody.appendChild(tr);
        } else {
            data.encargados.forEach(encargado => {
                const tr = document.createElement('tr');
                tr.className = 'text-sm border-b-1 last:border-b-0 whitespace-nowrap';

                const td = document.createElement('td');
                td.className = 'px-3';
                td.textContent = `${encargado.apellidos} ${encargado.nombres}`;

                tr.appendChild(td);
                tbody.appendChild(tr);
            });
        }

        // Ocultar spinner, mostrar contenido
        areaLoading.classList.add('hidden');
        areaDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar área:', error);
        areaLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}

function editarElemento(id) {
    openModal('edit-area-modal');

    const areaLoading = document.getElementById('area-loading-edit');
    const areaDetalles = document.getElementById('area-detalles-edit');

    // Mostrar el spinner, ocultar detalles
    areaLoading.classList.remove('hidden');
    areaDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/areas/modificar/${id}`)
    .then(res => res.json())
    .then(data => {

        //Asignamos el action al form
        const form = document.getElementById('formEditArea');
        form.setAttribute('action', `/admin/areas/actualizar/${data.id}`);

        //LLenar datos
        document.getElementById('nombreAreaEdit').value  = data.nombre;
        document.getElementById('numEncargadosEdit').value  = data.encargados_count;
        document.getElementById('estadoSelectEdit').value = data.estado ? '1' : '0';

        //Llenar inputs

        if(data.estado){
            document.getElementById('estadoActivoEdit').style.display = 'inline-flex';
            document.getElementById('estadoInactivoEdit').style.display = 'none';
        } else{
            document.getElementById('estadoActivoEdit').style.display = 'none';
            document.getElementById('estadoInactivoEdit').style.display = 'inline-flex';
        }

        //Cargamos la tabla con los encargados y los seleccionados
        const tablaContenedor = document.getElementById('contenedorTablaEdit');
        const tbody = tablaContenedor.querySelector('tbody');
        tbody.innerHTML = ''; //Limpiar contenido anterior

        // Crear un Set con los IDs de los encargados ya asignados
        const encargadosSelIds = new Set(data.encargados_sel.map(e => e.id));

        // Agregar las filas
        data.encargados_disp.forEach(encargado => {
            const tr = document.createElement('tr');
            tr.className = 'text-sm border-b-1 last:border-b-0 whitespace-nowrap';

            // Columna del checkbox
            const tdCheckbox = document.createElement('td');
            tdCheckbox.className = 'px-3';

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'encargados[]';
            checkbox.value = encargado.id;
            checkbox.checked = encargadosSelIds.has(encargado.id);

            tdCheckbox.appendChild(checkbox);
            tr.appendChild(tdCheckbox);

            // Columna del nombre
            const tdNombre = document.createElement('td');
            tdNombre.className = 'px-3';
            tdNombre.textContent = `${encargado.apellidos} ${encargado.nombres}`;
            tr.appendChild(tdNombre);

            tbody.appendChild(tr);
        });

        // Función para actualizar el número de encargados seleccionados
        function actualizarContador() {
            const seleccionados = tablaContenedor.querySelectorAll('input[name="encargados[]"]:checked');
            document.getElementById('numEncargadosEdit').value = seleccionados.length;
        }

        // Escuchar cambios en los checkboxes
        tablaContenedor.addEventListener('change', (event) => {
            if (event.target && event.target.matches('input[name="encargados[]"]')) {
                actualizarContador();
            }
        });

        // Ocultar spinner, mostrar contenido
        areaLoading.classList.add('hidden');
        areaDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar el área:', error);
        areaLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}

function verEncargado(id){
    openModal('show-encargado-modal');

    const encargadoLoading = document.getElementById('encargado-loading-show');
    const encargadoDetalles = document.getElementById('encargado-detalles-show');

    // Mostrar el spinner, ocultar detalles
    encargadoLoading.classList.remove('hidden');
    encargadoDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/areas/usuario/${id}`)
    .then(res => res.json())
    .then(data => {
        //LLenar datos
        document.getElementById('nombreShowEncargado').textContent  = data.nombre;
        document.getElementById('correoShowEncargado').textContent  = data.email;
        document.getElementById('countAreasEncargado').textContent = data.areas_count + ' ' + (data.areas_count === 1 ? 'área' : 'áreas');

        if(data.foto){
            document.getElementById('fotoShowEncargado').src = '/storage/' + data.foto;
        } else{
            document.getElementById('fotoShowEncargado').src = '/images/default-profile.jpg';
        }

        if(data.estado){
            document.getElementById('estadoActivoShowEncargado').style.display = 'inline-flex';
            document.getElementById('estadoInactivoShowEncargado').style.display = 'none';
        } else{
            document.getElementById('estadoActivoShowEncargado').style.display = 'none';
            document.getElementById('estadoInactivoShowEncargado').style.display = 'inline-flex';
        }

        
        //Cargamos los encargados
        const tablaContenedor = document.getElementById('contenedorTablaShowEncargado');
        const tbody = tablaContenedor.querySelector('tbody');
        tbody.innerHTML = ''; //Limpiar contenido anterior

        data.areas.forEach(area => {
            const tr = document.createElement('tr');
            tr.className = 'text-sm border-b-1 last:border-b-0 whitespace-nowrap';

            const td = document.createElement('td');
            td.className = 'px-3';
            td.textContent = `${area.nombre}`;

            tr.appendChild(td);
            tbody.appendChild(tr);
        });

        // Ocultar spinner, mostrar contenido
        encargadoLoading.classList.add('hidden');
        encargadoDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar al encargado:', error);
        areaLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
    
}

function borrarElemento(id) {
    const form = document.getElementById('formDeleteModal');
    form.action = `/admin/areas/eliminar/${id}`;
    openModal('genericDeleteModal');
}

// Registrar funciones globales
window.verElemento = verElemento;
window.editarElemento = editarElemento;
window.borrarElemento = borrarElemento;
window.verEncargado = verEncargado;