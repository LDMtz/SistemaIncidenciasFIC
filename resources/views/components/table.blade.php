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
                {{ $footTable ?? '' }}
            </tr>
        </tfoot>
    </table>
</div>