<x-app-layout>
    <div class="flex w-full">

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">

            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-x-2">
                    <h1 class="font-roboto font-black sm:text-2xl text-xl">Usuario</h1>
                    <i class="fa-solid fa-angle-right"></i>
                    <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Perfil de usuario</h2>
                </div>

                <a href="{{ route('home') }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <!-- Contendor perfil -->
            <div class="flex justify-center items-start">
                <div class="rounded-xl w-full max-w-lg">
                    <div class="">

                        <form action="{{route('usuarios.perfil.actualizar', $usuario->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <!-- Header -->
                            <div class="flex items-center gap-8 mb-6 pb-6 border-b border-main-3/20">
                                <!-- Foto -->
                                <div class="relative group">
                                    <div class="w-18 h-18 lg:w-20 lg:h-20 rounded-lg border-2 overflow-hidden border-main-3/40 shadow-lg group-hover:border-main-3">
                                        <img id="fotoPreview" src="{{ $usuario->foto ? asset('storage/' . $usuario->foto) : asset('images/default-profile.jpg') }}"
                                            draggable="false" class="w-full h-full object-cover" />
                                    </div>
                                    <input type="file" name="foto" id="subirFoto" accept=".jpg,.jpeg,.png" class="hidden" />
                                    <button onclick="document.getElementById('subirFoto').click()" type="button"
                                            class="absolute -bottom-3 -right-3 w-9 h-9 lg:w-10 lg:h-10 flex items-center justify-center rounded-xl cursor-pointer bg-blue-500 border-3 border-bg-main hover:scale-110 shadow-lg group">
                                        <i class="fa-regular fa-pen-to-square text-base text-text-1"></i>
                                    </button>
                                </div>

                                <!-- Datos del usuario -->
                                <div class="flex-1">
                                    <h2 class="font-montserrat text-md lg:text-xl font-bold text-text-1 mb-2">
                                        {{$usuario['nombres']}} {{$usuario['apellidos']}}
                                    </h2>
                                    <div class="inline-flex items-center gap-2 px-3 py-1 lg:px-4 lg:py-2 bg-main-1/20 rounded-lg border border-main-3/30">
                                        <i class="fa-solid fa-circle text-main-3 text-xs"></i>
                                        <span class="text-main-3 font-semibold text-[0.70rem] lg:text-sm uppercase">{{$usuario['rol']['nombre']}}</span>
                                    </div>
                                </div>
                            </div>

                            @error('foto') 
                                <div class="mb-6 p-3 lg:p-4 bg-red-500/10 border border-red-500/30 rounded-lg">
                                    <span class="text-red-400 text-sm flex items-center gap-2">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror

                            <!-- Inputs -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 text-sm lg:text-base p-0.5">
                                
                                <!-- Correo -->
                                <div class="lg:col-span-2">
                                    <label class="text-main-3 font-semibold mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-envelope text-sm"></i>
                                        Correo electrónico
                                    </label>
                                    <div class="relative">
                                        <input name="email" type="text" value="{{$usuario['email']}}" 
                                        class="text-text-2 w-full bg-main-7/50 border border-main-3/30 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-main-2 focus:border-transparent" 
                                        readonly/>
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div>
                                    <label class="text-main-3 font-semibold mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-user text-sm"></i>
                                        Apellidos
                                    </label>
                                    <input name="apellidos" type="text" value="{{$usuario['apellidos']}}" 
                                    class="bg-main-7/50 border border-main-3/30 px-3 py-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-main-2 focus:border-transparent text-text-1 hover:border-main-3/60" />
                                    @error('apellidos') 
                                        <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Nombre -->
                                <div>
                                    <label class="text-main-3 font-semibold mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-id-card text-sm"></i>
                                        Nombres
                                    </label>
                                    <input name="nombres" type="text" value="{{$usuario['nombres']}}" 
                                    class="bg-main-7/50 border border-main-3/30 px-3 py-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-main-2 focus:border-transparent text-text-1 hover:border-main-3/60" />
                                    @error('nombres') 
                                        <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Teléfono -->
                                <div>
                                    <label class="text-main-3 font-semibold mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-phone text-sm"></i>
                                        Teléfono
                                    </label>
                                    <input name="telefono" type="text" value="{{$usuario['telefono']}}" 
                                    class="bg-main-7/50 border border-main-3/30 px-3 py-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-main-2 focus:border-transparent text-text-1 hover:border-main-3/60" />
                                    @error('telefono') 
                                        <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Rol (Oculto) -->
                                <div class="hidden">
                                    <input id="rolShow" type="text" value="{{$usuario['rol']['nombre']}}" readonly />
                                </div>

                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3 lg:gap-6 mt-8 pt-6 border-t border-main-3/20">
                                <button type="submit" 
                                class="flex-1 text-sm font-montserrat inline-flex items-center justify-center gap-3 px-6 py-3 bg-main-1 text-white rounded-lg font-semibold shadow-lg hover:shadow-xl hover:scale-103">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Guardar cambios</span>
                                </button>
                                
                                <a href="{{route('clave.nueva')}}" 
                                class="flex-1 text-sm inline-flex items-center justify-center gap-3 px-6 py-3 bg-main-5/50 hover:bg-main-5 text-main-3 hover:text-text-1 rounded-lg font-semibold border border-main-3/30 hover:border-main-3">
                                    <i class="fa-solid fa-key"></i>
                                    <span>Cambiar contraseña</span>
                                </a>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>
    const inputFoto = document.getElementById('subirFoto');
    const preview = document.getElementById('fotoPreview');

    inputFoto.addEventListener('change', function (e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>