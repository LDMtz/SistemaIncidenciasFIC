<x-app-layout>
    <div class="flex justify-center items-center w-full">
        <div class="font-montserrat bg-main-6 border-1 border-main-1 p-10 rounded-lg">
            <h1 class="text-center text-2xl font-bold text-text-1 mb-6">CREAR CUENTA</h1>

            <form action="{{ route('usuarios.guardar') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-4">
                    <label for="apellidos" class="text-main-3 text-md font-semibold">Apellidos:</label>
                    <div class="relative mb-2">
                        <i class="fa-solid fa-id-card absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="apellidos" value="{{ old('apellidos') }}" type="text" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('apellidos')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="nombres" class="text-main-3 text-md font-semibold">Nombre(s):</label>
                    <div class="relative mb-2">
                        <i class="fa-solid fa-circle-user absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="nombres" value="{{ old('nombres') }}" type="text" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('nombres')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="correo" class="text-main-3 text-md font-semibold">Correo electrónico:</label>
                    <div class="relative mb-2">
                        <i class="fa-solid fa-at absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="correo" value="{{ old('correo') }}" type="email" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('correo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="telefono" class="text-main-3 text-md font-semibold">Número de teléfono:</label>
                    <div class="relative mb-2">
                        <i class="fa-solid fa-phone absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="telefono" value="{{ old('telefono') }}" type="text" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('telefono')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="clave" class="text-main-3 text-md font-semibold">Contraseña:</label>
                    <div class="relative mb-2">
                        <i class="fa-solid fa-key absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="clave" type="password" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('clave')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="clave_confirmation" class="text-main-3 text-md font-semibold">Repetir contraseña:</label>
                    <div class="relative">
                        <i class="fa-solid fa-key absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                        <input name="clave_confirmation" type="password" required autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                    </div>
                    @error('clave_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <input hidden name="rol" type="number" value="3"></input>

                <div class="flex flex-col items-center justify-center mt-6 gap-4">
                    <button class="bg-main-5 border border-main-4 light:text-amber-700 text-main-3 rounded-lg py-1 px-4 hover:bg-main-2 hover:text-text-1 hover:border-main-2">
                        Registrase
                    </button>

                    <label class="text-main-3 font-semibold flex flex-wrap justify-center items-center text-sm gap-x-2">
                        <span>¿Ya tienes cuenta?</span> 
                        <a href="{{route('login')}}" class="underline font-normal text-main-4 hover:text-text-1 hover:cursor-pointer">
                            Incia sesión aquí
                        </a>
                    </label>
                </div>

            </form>
            
        </div>
    </div>
</x-app-layout>