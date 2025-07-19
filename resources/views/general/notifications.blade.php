<x-app-layout>
    <div class="flex w-full">

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-x-2">
                    <h1 class="font-roboto font-black sm:text-2xl text-xl">Usuario</h1>
                    <i class="fa-solid fa-angle-right"></i>
                    <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Notificaciones</h2>
                </div>

                <a href="{{ route('home') }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <div class="flex flex-1 items-center justify-center mt-4">
                <div class="w-full max-w-3xl rounded-xl border border-text-1 p-4 sm:p-5 light:shadow dark:bg-slate-900 light:bg-white">
                    
                    <!-- Header -->
                    <div class="flex flex-wrap justify-between items-center text-text-1 text-sm font-semibold border-b border-text-1 pb-3">
                        <div class="flex gap-x-4">
                            <a href="{{ route('notificaciones.index', ['tipo' => 'todas']) }}" class="hover:underline underline-offset-4 text-xs sm:text-sm {{ $tipo === 'todas' ? 'text-main-3' : '' }}">Todas</a>
                            <a href="{{ route('notificaciones.index', ['tipo' => 'nuevas']) }}" >
                                <span class="hover:underline underline-offset-4 text-xs sm:text-sm {{ $tipo === 'nuevas' ? 'text-main-3' : '' }}">Nuevas</span>
                                @if (auth()->user()->unreadNotifications->count())
                                     <span class="ml-1 bg-red-600 text-white text-[0.65rem] sm:text-[0.70rem] font-semibold px-1 rounded-full">
                                        {{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </a>
                        </div>

                        <div class="flex gap-x-4 sm:mt-0">
                            <form action="{{ route('notificaciones.leer.todas') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="flex items-center gap-x-1 text-xs sm:text-sm border-b border-transparent hover:border-text-1 cursor-pointer">
                                    <i class="fa-solid fa-list-check text-xs sm:text-sm"></i>
                                    <span class="hidden sm:block">Marcar todas como leídas</span>
                                </button>
                            </form>

                            <form action="{{ route('notificaciones.eliminar.todas') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center gap-x-1 text-xs sm:text-sm border-b border-transparent hover:border-text-1 cursor-pointer">
                                    <i class="fa-solid fa-trash text-xs sm:text-sm"></i>
                                    <span class="hidden sm:block">Borrar todas</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Notificaciones -->
                    <div class="custom-scroll mt-4 h-[calc(100vh-20rem)] overflow-y-auto">
                        @forelse ($notificaciones as $notification)
                            <x-notification-item :notification="$notification" />
                        @empty
                            @if ($tipo === 'todas')
                                <p class="text-center text-xs sm:text-sm font-semibold text-text-1">Sin notificaciones</p>
                            @else
                                <p class="text-center text-xs sm:text-sm font-semibold text-text-1">No tienes nuevas notificaciones</p>
                            @endif
                        @endforelse

                    </div>

                </div>
            </div>
            

        </div>

    </div>
@push('scripts')
    @vite('resources/js/notifications-section-scripts.js')
@endpush
</x-app-layout>