<div class="relative overflow-x-auto rounded-lg light:shadow-md light:shadow-slate-950/25">
    <table class="w-full font-roboto">
        <thead class="border-b text-xs text-left dark:bg-slate-700 light:bg-slate-50 dark:text-slate-400 light:text-slate-500 dark:border-slate-400 light:border-slate-500">
            <tr class="whitespace-nowrap">
                {{ $headTable ?? '' }}
            </tr>
        </thead>
        <tbody class="dark:bg-slate-800 dark:text-slate-400 light:bg-white light:text-slate-500">
                {{ $bodyTable ?? '' }}
        </tbody>
        <tfoot class="dark:bg-slate-800 dark:text-slate-400 light:bg-white light:text-slate-500">
            <tr>
                <td colspan="6">
                    <div class="flex justify-between items-center px-5 py-1.5 text-xs">
                        <div>Mostrando <span class="font-black">1</span><span class="font-black">-</span><span class="font-black">5</span> de <span>45</span></div>
                        <div class="flex items-center space-x-1">
                            <button class="px-2 py-1 rounded dark:hover:bg-slate-600 light:hover:bg-slate-200">&lt;</button>
                            <button class="px-2 py-1 rounded dark:hover:bg-slate-600 light:hover:bg-slate-200">1</button>
                            <button class="px-2 py-1 dark:bg-slate-900 light:bg-slate-400 text-text-1 rounded">2</button>
                            <button class="px-2 py-1 rounded dark:hover:bg-slate-600 light:hover:bg-slate-200">3</button>
                            <button class="px-2 py-1 rounded dark:hover:bg-slate-600 light:hover:bg-slate-200">&gt;</button>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>