@props(['type', 'content','centered' => false, 'extraClasses' => ''])

<td class="px-3 py-1 {{ $type === 'field_user' ? 'max-w-[10rem]' : '' }} {{ $centered ? 'text-center' : '' }} {{ $extraClasses }}">
    @switch($type)
        @case('special_user')
            <div class="flex items-center space-x-3">
                <img draggable="false" class="w-8 h-8 rounded-full object-cover" src="{{ $content['foto'] ? asset('storage/' . $content['foto']) : asset('images/default-profile.jpg') }}">
                <div class="leading-tight overflow-hidden">
                    <p class="font-semibold text-text-1 whitespace-nowrap text-ellipsis overflow-hidden">
                        {{ $content['name'] }}
                    </p>
                    <p class="text-xs text-ellipsis whitespace-nowrap overflow-hidden">
                        {{ $content['email'] }}
                    </p>
                </div>
            </div>
        @break

        @case('state')
            <!-- Celda de estado, recibe un bool -->
            @if($content)
                <!-- Si el estado es 'true' -->
                <label class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold light:bg-green-400/60 dark:bg-green-900/70">
                    <span class="w-2 h-2 mr-2 rounded-full bg-green-500"></span>
                    <span class="dark:text-green-400 light:text-green-600">Activo</span>
                </label>
            @else
                <!-- Si el estado es 'false' -->
                <label class="inline-flex items-center px-2 py-1 rounded-full text-xs  font-semibold light:bg-red-400/60 dark:bg-red-900/70">
                    <span class="w-2 h-2 mr-2 rounded-full bg-red-500"></span>
                    <span class="dark:text-red-400 light:text-red-600">Inactivo</span>
                </label>
            @endif
        @break

        @case('role')
            @switch($content)
                @case(1)
                    <div class="inline-block rounded-md border px-2 py-0.5 border-violet-500 dark:bg-violet-950 light:bg-violet-200">
                        <span class="font-montserrat font-semibold text-violet-500 text-xs">
                            Administrador
                        </span>
                    </div>
                @break
                @case(2)
                    <div class="inline-block rounded-md border px-2 py-0.5 border-blue-500 dark:bg-blue-950 light:bg-blue-200">
                        <span class="font-montserrat font-semibold text-blue-500 text-xs">
                            Encargado
                        </span>
                    </div>
                @break
                @case(3)
                    <div class="inline-block rounded-md border px-2 py-0.5 border-green-500 dark:bg-green-950 light:bg-green-200">
                        <span class="font-montserrat font-semibold text-green-500 text-xs">
                            Común
                        </span>
                    </div>
                @break
                @default
                    <span>Desconocido</span>
            @endswitch
        @break

        @case('actions-modal')
            <div class="text-base space-x-3">
                <!-- Ver -->
                <button onclick="verElemento({{ $content['id'] }})" class="text-violet-500 hover:text-violet-400 transition-colors duration-100 cursor-pointer">
                    <i class="fa-solid fa-eye"></i>
                </button>
                <!-- Editar -->
                <button onclick="editarElemento({{ $content['id'] }})" class="text-blue-500 hover:text-blue-400 transition-colors duration-100 cursor-pointer">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <!-- Eliminar -->
                <button onclick="borrarElemento({{$content['id']}})" class="text-red-500 hover:text-red-400 transition-colors duration-100 cursor-pointer">
                    <i class="fa-solid fa-trash-can"></i>
                </button>

            </div>
        @break

        @case('severidad')
            @switch($content)
                @case("Sugerencia") <span class="text-green-400">{{$content}}</span> @break
                @case("Baja") <span class="text-blue-400">{{$content}}</span> @break
                @case("Media") <span class="text-yellow-400">{{$content}}</span> @break
                @case("Alta") <span class="text-orange-400">{{$content}}</span> @break
                @case("Crítica") <span class="text-red-400">{{$content}}</span> @break
                @default <span>{{$content}}</span>
            @endswitch
        @break

        @default
            <!-- Celda normal con texto o valor -->
            {{ $content }}
            
    @endswitch
</td>