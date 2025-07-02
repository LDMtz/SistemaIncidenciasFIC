<x-app-layout>
    <div class="flex justify-center items-center w-full mx-6">
        <div class="font-montserrat bg-main-6 border-1 border-main-1 p-10 rounded-lg">
            <h1 class="text-center text-2xl font-bold text-text-1 mb-6">INICIO DE SESIÓN</h1>
            <h2 class="text-center text-base text-main-4 mb-8">¡Bienvenido de nuevo!</h2>

            <form action="{{route('to_login')}}" method="POST">
                @csrf
                @method('POST')
                <label for="correo" class="text-main-3 text-md font-semibold">Correo electrónico:</label>
                <div class="relative mb-6">
                    <i class="fa-solid fa-circle-user absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="correo" type="email" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="clave" class="text-main-3 text-md font-semibold">Contraseña:</label>
                <div class="relative ">
                    <i class="fa-solid fa-key absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="clave" type="password" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <!-- Mostrar errores -->
                @if ($errors->any())
                    <div class="flex justify-center items-center text-red-500 text-sm mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="flex flex-col items-center justify-center mt-10 gap-20">
                    <button class="bg-main-5 border border-main-4 text-main-3 light:text-amber-700 rounded-lg py-1 px-4 hover:bg-main-2 hover:text-text-1 hover:border-main-2">
                        Iniciar sesión
                    </button>

                    <label class="text-main-3 font-semibold flex flex-wrap justify-center items-center text-sm gap-x-2">
                        <span>¿No tienes cuenta?</span> 
                        <a href="{{route('comun.usuarios.crear')}}" class="underline font-normal text-main-4 hover:text-text-1 hover:cursor-pointer">
                            Regístrate aquí
                        </a>
                    </label>
                </div>

            </form>
            
        </div>
    </div>
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>