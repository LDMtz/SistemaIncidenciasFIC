<x-app-layout>
    <div class="flex w-full">
        <x-sidebar-admin/>

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">

            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-x-2">
                    <h1 class="font-roboto font-black sm:text-2xl text-xl">Usuarios</h1>
                    <i class="fa-solid fa-angle-right"></i>
                    <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Perfil de usuario</h2>
                </div>

                <a href="{{ url()->previous() }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-white border-b border-transparent hover:border-white">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <!-- Card -->
            <div class="flex justify-center items-center ">
                <div class="rounded-lg shadow-lg w-full max-w-md overflow-hidden border-2 
                     dark:border-slate-700 light:border-slate-300 dark:bg-slate-800 light:bg-slate-50">
                    <div class="p-6 max-w-2xl w-full mx-auto">

                        <h2 class="font-montserrat text-lg md:text-xl font-bold text-text-1 text-center mb-2">Datos del usuario</h2>
                        <form action="{{route('usuarios.perfil.actualizar', $usuario->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="flex justify-center mb-5 md:mb-10 relative">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" draggable="false" class="w-22 h-22 md:w-28 md:h-28 rounded-full border-3 
                                    dark:border-slate-500 light:border-slate-600">
                                <input type="file" name="foto" id="subirFoto" accept="image/*" class="hidden" />
                                <button onclick="document.getElementById('subirFoto').click()" type="button"
                                        class="absolute bottom-0 w-8 h-8 md:w-10 md:h-10 transform translate-y-1/2 
                                        flex items-center justify-center rounded-full border-4 cursor-pointer
                                        light:bg-slate-300 light:border-slate-50 light:hover:bg-slate-400
                                        dark:bg-slate-700 dark:border-slate-800 dark:hover:bg-slate-600 group">
                                    <i class="fa-regular fa-pen-to-square text-xs md:text-base
                                        dark:text-slate-500 dark:group-hover:text-slate-400
                                        light:text-slate-400 light:group-hover:text-slate-600">
                                    </i>
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 text-[0.70rem] md:text-sm text-text-1">
                                <!-- Correo -->
                                <div class="md:col-span-2">
                                    <label class="text-main-3 block" >Correo</label>
                                    <div class="relative w-full">
                                        <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-text-1/40"></i>
                                        <input name="email" type="text" value="{{$usuario['email']}}" class="text-text-1/40 w-full bg-transparent border light:border-slate-400 dark:border-slate-600 pl-8 py-1.5 md:py-2 rounded focus:outline-none focus:ring-0" readonly/>
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div>
                                    <label class="text-main-3 block">Apellidos</label>
                                    <input name="apellidos" type="text" value="{{$usuario['apellidos']}}" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                                    @error('apellidos') 
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Nombre -->
                                <div class="mt-auto">
                                    <label class="text-main-3 block">Nombres</label>
                                    <input name="nombres" type="text" value="{{$usuario['nombres']}}" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                                    @error('nombres') 
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Teléfono -->
                                <div>
                                    <label class="text-main-3 block">Teléfono</label>
                                    <input name="telefono" type="text" value="{{$usuario['telefono']}}" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                                    @error('telefono') 
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Rol -->
                                <div>
                                    <label class="text-main-3 block ">Rol</label>
                                    <input id="rolShow" type="text" value="{{$usuario['rol']['nombre']}}" class="text-text-1/40 bg-transparent border light:border-slate-400 dark:border-slate-600 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0" readonly />
                                </div>

                                <!-- Botón Editar -->
                                <div class="md:col-span-2 flex justify-center mt-2">
                                    <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded-lg cursor-pointer">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        <span class="text-sm">Editar</span>
                                    </button>
                                </div>

                            </div>

                        </form>
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>