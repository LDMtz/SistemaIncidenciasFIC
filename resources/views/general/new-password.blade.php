<x-app-layout>
    <div class="flex w-full flex-col">
        <div class="flex justify-between items-center mx-6 lg:mx-10">
            <div class="flex items-center gap-x-2">
                <h1 class="font-roboto font-black sm:text-2xl text-xl">Usuario</h1>
                <i class="fa-solid fa-angle-right"></i>
                <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Contraseña</h2>
            </div>

            <a href="{{ route('home') }}" 
            class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                <i class="fa-solid fa-arrow-left text-sm"></i>
                <span>Volver</span>
            </a>
        </div>

        <div class="flex-1 flex items-center justify-center px-4">
            <div class="rounded-lg light:shadow-lg border-2 dark:border-slate-700 light:border-slate-300 p-4 sm:p-5 dark:bg-slate-900 light:bg-white">
                <h2 class="font-montserrat text-lg md:text-xl font-bold text-text-1 text-center mb-5">Actualizar contraseña</h2>

                <form action="{{route('clave.actualizar',auth()->id())}}" method="POST">
                        @csrf
                        @method('PATCH')
                    <div class="grid grid-cols-1 min-w-70 md:grid-cols-2 gap-2 md:gap-3 text-sm md:text-base text-text-1">
                        <!-- Actual contraseña -->
                        <div class="md:col-span-2">
                            <label class="text-main-3 block">Actual contraseña</label>
                            <input name="actual" type="password" autocomplete="off" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                            @error('actual') 
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nueva contraseña -->
                        <div>
                            <label class="text-main-3 block">Nueva contraseña</label>
                            <input name="nueva" type="password" autocomplete="off"
                                class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                            <span class="text-xs block h-[1.25rem] mt-1">
                                @error('nueva')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </span>
                        </div>

                        <!-- Confirmar nueva contraseña -->
                        <div class="mt-auto">
                            <label class="text-main-3 block">Confirmar nueva contraseña</label>
                            <input name="nueva_confirmation" autocomplete="off" type="password"
                                class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                            <span class="text-xs block h-[1.25rem] mt-1">
                                @error('nueva_confirmation')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </span>
                        </div>

                        <!-- Botón Editar -->
                        <div class="md:col-span-2 flex justify-center mt-2">
                            <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded-lg cursor-pointer">
                                <i class="fa-solid fa-arrows-rotate text-sm"></i>
                                <span class="text-sm">Actualizar</span>
                            </button>
                        </div>
                    
                    </div>
                </form>
                
            </div>


        </div>
    </div>
</x-app-layout>

