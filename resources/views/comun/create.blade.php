<x-app-layout>
    <div class="flex justify-center items-center w-full">
        <div class="font-montserrat bg-main-6 border-1 border-main-1 p-10 rounded-lg">
            <h1 class="text-center text-2xl font-bold text-text-1 mb-6">CREAR CUENTA</h1>

            <form action="" method="POST">
                @csrf
                @method('post')

                <label for="" class="text-main-3 text-md font-semibold">Apellidos:</label>
                <div class="relative mb-2">
                    <i class="fa-solid fa-id-card absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="text" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="" class="text-main-3 text-md font-semibold">Nombre(s):</label>
                <div class="relative mb-2">
                    <i class="fa-solid fa-circle-user absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="text" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="" class="text-main-3 text-md font-semibold">Correo electrónico:</label>
                <div class="relative mb-2">
                    <i class="fa-solid fa-at absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="email" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="" class="text-main-3 text-md font-semibold">Número de teléfono:</label>
                <div class="relative mb-2">
                    <i class="fa-solid fa-phone absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="text" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="" class="text-main-3 text-md font-semibold">Contraseña:</label>
                <div class="relative mb-2">
                    <i class="fa-solid fa-key absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="password" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>

                <label for="" class="text-main-3 text-md font-semibold">Repetir contraseña:</label>
                <div class="relative">
                    <i class="fa-solid fa-key absolute left-2 top-1/2 transform -translate-y-1/2 text-main-2"></i>
                    <input name="" type="password" autocomplete="off" class="py-1 text-sm border-1 rounded-lg pl-8 border-main-2 bg-main-7 focus:outline-none focus:border-main-4 w-full">
                </div>
                
                <div class="flex flex-col items-center justify-center mt-6 gap-4">
                    <button class="bg-main-5 border border-main-4 text-main-3 rounded-lg py-1 px-4 hover:bg-main-2 hover:text-text-1 hover:border-main-2">
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