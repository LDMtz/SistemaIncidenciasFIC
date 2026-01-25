<!-- Modal Logout -->
<div id="logoutModal" class="hidden">
    <div tabindex="-1" class="fixed inset-0 z-50 flex justify-center items-center bg-black/50">
        <div class="relative p-4 w-full max-w-md h-auto rounded-lg shadow bg-gray-800 m-10">
            <div class="relative p-4 text-center">
                <div class="w-12 h-12 rounded-full bg-orange-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <i class="fa-solid fa-exclamation text-orange-400 text-xl"></i>
                </div>
                <p class="mb-4 text-lg font-semibold text-text-1">¿Estás seguro que quieres cerrar sesión?</p>
                <div class="mt-6 flex justify-center gap-4">
                    <!-- Botón cancelar -->
                    <button onclick="closeModal('logoutModal')" type="button" class="px-4 py-2 bg-gray-700 text-white hover:bg-gray-600 rounded">
                        No
                    </button>

                    <!-- Botón cerrar sesión -->
                    <form method="GET" action="{{ route('to_logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">
                            Sí, cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>