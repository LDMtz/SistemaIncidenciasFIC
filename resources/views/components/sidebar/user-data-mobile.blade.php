<div class="flex items-center gap-3 px-1 pb-3 border-b dark:border-bg-logo light:border-bg-header">
    @auth
        @php $usuario = Auth::user(); @endphp
    <div class="w-9 h-9 rounded-full overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ $usuario->foto ? asset('storage/' . $usuario->foto) : asset('images/default-profile.jpg') }}">
    </div>
    <div class="leading-tight flex-1 min-w-0">
        <p class="font-roboto font-bold text-base text-text-1 truncate">{{ $usuario->apellidos . ' ' .  $usuario->nombres}}</p>
        <p class="font-montserrat font-normal text-xs text-text-1/80">{{ $usuario->rol->nombre}}</p>
    </div>
    @endauth
</div>