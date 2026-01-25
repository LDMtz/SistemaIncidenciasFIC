@props(['rounded' => true, 'shadow' => true,'extraClasses' => '']) <!-- True por default -->

<div class="relative overflow-x-auto {{ $rounded ? 'rounded-lg' : '' }} {{ $shadow ? '' : '' }} {{$extraClasses}}">
    <table class="w-full font-roboto">
        <thead class="border-b text-xs text-left bg-slate-700 text-slate-400 border-slate-400">
            <tr class="whitespace-nowrap">
                {{ $headTable ?? '' }}
            </tr>
        </thead>
        <tbody class="bg-slate-800 text-slate-400">
                {{ $bodyTable ?? '' }}
        </tbody>
        <tfoot class="bg-slate-800 text-slate-400">
            <tr>
                {{ $footTable ?? '' }}
            </tr>
        </tfoot>
    </table>
</div>