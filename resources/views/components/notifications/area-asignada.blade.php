@php
    $user = \App\Models\User::find($notification->data['user_id']);
@endphp

<!-- Cambio de rol -->
<div class="rounded-md w-full max-w-3xl overflow-hidden light:shadow-md mb-3 opacity-100 scale-100">
    <!-- header -->
    <div onclick="" class="noti-header flex flex-wrap items-start px-3 py-2 sm:px-4 sm:py-3 light:bg-gray-200 dark:bg-slate-700 cursor-pointer">
        <div class="flex flex-1 min-w-0 mr-3">
            <div class="mr-2 flex items-start pt-[3px]">
                <i class="{{$notification->data['icono']}} text-text-1 text-xs sm:text-sm leading-none"></i>
            </div>
            <p class="font-semibold text-xs sm:text-sm leading-snug">
                {{$notification->data['titulo']}}
            </p>
        </div>

        <!-- Tiempo -->
        <span class="text-xs text-text-1/50 font-semibold flex items-center gap-1 ml-auto">
            @if (!$notification->read_at)
                <span class="inline-block w-2 h-2 bg-blue-400 rounded-full"></span>
            @endif
            {{ $notification->created_at->diffForHumans() }}
        </span>
    </div>
    <!-- Body -->
    <div class="noti-header hidden flex-col items-start gap-3 text-xs sm:text-sm text-text-1 px-3 py-2 sm:px-4 sm:py-3 light:bg-gray-300 dark:bg-slate-800">
        <div class="flex gap-3">
            <img src="{{ $user?->foto ? asset('storage/' . $user->foto) : asset('images/default-profile.jpg') }}" alt="avatar" class="w-6 h-6 sm:w-8 sm:h-8 rounded-full object-cover">
            <p>
                El administrador 
                <span class="font-semibold">
                    @if ($user?->apellidos)
                        {{$user->apellidos . ' ' .$user->nombres}}
                    @else
                        "usuario eliminado"
                    @endif
                </span>
                te asignó el área: <span class="font-semibold text-main-3">{{$notification->data['area']}}</span>.
            </p>
        </div>

        <!-- Botones -->
        <div class="flex justify-end gap-2 text-[0.65rem] sm:text-xs ">
            @if (!$notification->read_at)
                <form action="{{ route('notificaciones.leer', $notification->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="flex items-center gap-1 border-1
                            dark:text-green-400 dark:border-green-400 dark:hover:bg-green-800 dark:hover:text-white
                            light:text-green-700 light:border-green-700 light:hover:bg-green-500 light:hover:text-white 
                            px-3 py-[0.15rem] sm:px-4 sm:py-1 rounded-lg">
                        <i class="fa-solid fa-check"></i>Leída
                    </button>
                </form>
            @endif

            
            <form action="{{ route('notificaciones.eliminar', $notification->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="flex items-center gap-1 border-1 
                    dark:text-red-400 dark:border-red-400 dark:hover:bg-red-800 dark:hover:text-white 
                    light:text-red-700 light:border-red-700 light:hover:bg-red-500 light:hover:text-white
                    px-3 py-[0.15rem] sm:px-4 sm:py-1 rounded-lg">
                    <i class="fa-solid fa-xmark"></i> Borrar
                </button>
            </form>

        </div>
    </div>
</div>