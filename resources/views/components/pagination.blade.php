<div class="col-span-full flex justify-center mt-8">
    <div class="flex space-x-2">
        @for ($i = 1; $i <= ($totalPages ?? 3); $i++)
            <button class="w-10 h-10 rounded-lg {{ $i == ($currentPage ?? 1) ? 'bg-'.$primaryColor.'-600' : 'bg-slate-800 hover:bg-slate-700' }} text-white flex items-center justify-center">
                {{ $i }}
            </button>
        @endfor
        @if (($totalPages ?? 3) > 3)
            <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
        @endif
    </div>
</div>
