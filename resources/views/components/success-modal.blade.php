<!-- Modal Success -->
@if(session('success'))
    <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex justify-center items-center bg-black/50">
        <div id="successModalContent" class="relative p-4 w-full max-w-md h-auto rounded-lg shadow dark:bg-gray-800 light:bg-gray-100 m-10">
            <div class="relative p-4 text-center">
                <div class="w-12 h-12 rounded-full dark:bg-green-900 light:bg-green-600 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <i class="fa-solid fa-check dark:text-green-400 light:text-green-100 text-xl"></i>
                </div>
                <p class="mb-4 text-lg font-semibold text-text-1">{{ session('success') }}</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('successModal');
        const modalContent = document.getElementById('successModalContent');

        //Cerrar automáticamente después de 1 segundo
        setTimeout(() => {
            modal?.remove();
        }, 2000);

        //Cerrar si se hace clic fuera del modal
        modal.addEventListener('click', (e) => {
            if (!modalContent.contains(e.target)) {
                modal.remove();
            }
        });
    });
    </script>
@endif

