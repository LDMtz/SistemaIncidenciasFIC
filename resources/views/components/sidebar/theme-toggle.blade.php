@props(['screen'])

@if($screen == 'desktop')
    <div class="p-2 relative border-t dark:border-bg-logo light:border-bg-header pt-3 mt-auto">
        <i class="icon-moon-sidebar fa-solid fa-moon align-middle inline-block w-6 text-center"></i>
        <i class="icon-sun-sidebar fa-solid fa-sun align-middle inline-block w-6 text-center"></i>
        <span id="theme-text" class="ml-4 sidebar-text">Tema</span>
        <label class="theme-toggle-item cursor-pointer absolute right-2 top-1/2 -translate-y-1/2 transition duration-300">
            <input type="checkbox" class="theme-toggle-sidebar sr-only peer" checked>
            <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
        </label>
    </div>
@elseif ($screen == 'mobile')
    <div class="p-3 relative">
        <i class="icon-moon-sidebar fa-solid fa-moon align-middle inline-block w-6 text-center"></i>
        <i class="icon-sun-sidebar fa-solid fa-sun align-middle inline-block w-6 text-center"></i>
        <span id="theme-text" class="ml-4 sidebar-text">Tema</span>
        <label class="theme-toggle-item cursor-pointer absolute right-2 top-1/2 -translate-y-1/2 transition duration-300">
            <input type="checkbox" class="theme-toggle-sidebar sr-only peer" checked>
            <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
        </label>
    </div>
@endif