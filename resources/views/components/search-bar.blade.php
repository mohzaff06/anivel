<div class="sticky top-0 z-20 bg-slate-900/80 backdrop-blur-lg border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" id="{{ $searchId ?? 'searchInput' }}" placeholder="{{ $placeholder ?? 'Search...' }}" class="block w-full pl-10 pr-3 py-2 border border-white/10 rounded-lg bg-white/5 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-{{ $primaryColor ?? 'purple' }}-500 focus:border-transparent">
            </div>
            <!--<div class="flex space-x-4 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 no-scrollbar">
                <button class="px-4 py-2 rounded-full bg-{{ $primaryColor ?? 'purple' }}-600 text-white font-medium text-sm whitespace-nowrap">All Lessons</button>
                {{ $slot }}
            </div>-->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('{{ $searchId ?? 'searchInput' }}');

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Add actual search functionality here
            console.log('Searching for:', searchTerm);
        });
    });
</script>
