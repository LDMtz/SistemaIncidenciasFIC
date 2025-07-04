//Ver elemento para generalizar, pero elemento es "usuario" en este caso
function verElemento(id) {
    openModal('show-user-modal');

    const usuarioLoading = document.getElementById('usuario-loading-show');
    const usuarioDetalles = document.getElementById('usuario-detalles-show');

    // Mostrar el spinner, ocultar detalles
    usuarioLoading.classList.remove('hidden');
    usuarioDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/usuarios/${id}`)
    .then(res => res.json())
    .then(data => {

        // Llenar datos
        if(data.foto){
            document.getElementById('fotoShow').src = '/storage/' + data.foto;
        } else{
            document.getElementById('fotoShow').src = '/images/default-profile.jpg';
        }

        if(data.estado){
            document.getElementById('estadoActivoShow').style.display = 'inline-flex';
            document.getElementById('estadoInactivoShow').style.display = 'none';
        } else{
            document.getElementById('estadoActivoShow').style.display = 'none';
            document.getElementById('estadoInactivoShow').style.display = 'inline-flex';
        }

        if (data.created_at) {
            const [fecha, tiempoConResto] = data.created_at.split('T'); // 1. Separa en ["2025-06-20", "08:40:39.000000Z"]
            const tiempo = tiempoConResto.replace('Z', '').split('.')[0]; // 2. Quita la "Z" y los microsegundos dejando solo "08:40:39"
            const horaMin = tiempo.substring(0, 5);
            document.getElementById('fechaCreacionShow').value = fecha;
            document.getElementById('horaCreacionShow').value = horaMin;
        } else {
            document.getElementById('fechaCreacionShow').value = 'Sin fecha';
            document.getElementById('horaCreacionShow').value = 'Sin hora';
        }                

        document.getElementById('nombreCompletoShow').textContent  = data.apellidos + ' ' + data.nombres;
        document.getElementById('correoHeaderShow').textContent  = data.email;
        document.getElementById('apellidosShow').value = data.apellidos;
        document.getElementById('nombresShow').value = data.nombres;
        document.getElementById('emailShow').value = data.email;
        document.getElementById('telefonoShow').value = data.telefono;
        document.getElementById('rolShow').value = data.rol.nombre;

        // Ocultar spinner, mostrar contenido
        usuarioLoading.classList.add('hidden');
        usuarioDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar usuario:', error);
        usuarioLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}

function editarElemento(id) {
    openModal('edit-user-modal');

    const usuarioLoading = document.getElementById('usuario-loading-edit');
    const usuarioDetalles = document.getElementById('usuario-detalles-edit');

    // Mostrar el spinner, ocultar detalles
    usuarioLoading.classList.remove('hidden');
    usuarioDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/usuarios/modificar/${id}`)
    .then(res => res.json())
    .then(data => {

        //Asignamos el action al form
        const form = document.getElementById('formEditUsuario');
        form.setAttribute('action', `${rutaActualizarUsuario}/${data.id}`);

        // Llenar datos

        if(data.foto){
            document.getElementById('fotoEdit').src = '/storage/' + data.foto;
        } else{
            document.getElementById('fotoEdit').src = '/images/default-profile.jpg';
        }

        if(data.estado){
            document.getElementById('estadoActivoEdit').style.display = 'inline-flex';
            document.getElementById('estadoInactivoEdit').style.display = 'none';
        } else{
            document.getElementById('estadoActivoEdit').style.display = 'none';
            document.getElementById('estadoInactivoEdit').style.display = 'inline-flex';
        }

        if (data.created_at) {
            const fecha = data.created_at.split('T')[0].trim(); // 1. Separa en ["2025-06-20", "08:40:39.000000Z"]
            document.getElementById('fechaCreacionEdit').value = fecha;
        } else {
            document.getElementById('fechaCreacionEdit').value = 'Sin fecha';
        }

        document.getElementById('nombreCompletoEdit').textContent  = data.apellidos + ' ' + data.nombres;
        document.getElementById('correoHeaderEdit').textContent  = data.email;
        document.getElementById('apellidosEdit').value = data.apellidos;
        document.getElementById('nombresEdit').value = data.nombres;
        document.getElementById('emailEdit').value = data.email;
        document.getElementById('telefonoEdit').value = data.telefono;

        document.getElementById('rolSelectEdit').value = data.rol_id;
        document.getElementById('estadoSelectEdit').value = data.estado ? '1' : '0';

        // Ocultar spinner, mostrar contenido
        usuarioLoading.classList.add('hidden');
        usuarioDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar usuario:', error);
        usuarioLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}


// Registrar funciones globales
window.verElemento = verElemento;
window.editarElemento = editarElemento;