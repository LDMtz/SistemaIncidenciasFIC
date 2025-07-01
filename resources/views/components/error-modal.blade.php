@if(session('error'))
    <div id="errorModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex justify-center items-center bg-black/50">
        <div id="errorModalContent" class="relative p-4 w-full max-w-md h-auto rounded-lg shadow dark:bg-gray-800 light:bg-gray-100 m-10">
            <div class="relative p-4 text-center">
                <div class="w-12 h-12 rounded-full dark:bg-red-900 light:bg-red-600 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <i class="fa-solid fa-xmark dark:text-red-400 light:text-red-100 text-xl"></i>
                </div>
                <p class="mb-4 text-lg font-semibold text-text-1">{{ session('error') }}</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('errorModal');
        const modalContent = document.getElementById('errorModalContent');

        setTimeout(() => {
            modal?.remove();
        }, 2500);

        modal.addEventListener('click', (e) => {
            if (!modalContent.contains(e.target)) {
                modal.remove();
            }
        });
    });
    </script>
@endif