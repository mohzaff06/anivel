<a href='/{{$lesson->category}}/{{$lesson->id}}{{$adminKey}}' class="group bg-slate-800/50 rounded-xl overflow-hidden border border-white/5 hover:border-{{ $primaryColor ?? 'purple' }}-500/30 transition-all duration-300 hover:shadow-glow">
    <div class="aspect-video w-full overflow-hidden bg-slate-900">
        @if(isset($lesson->thumbnail))
        <img src="{{ asset('storage/' . $lesson->thumbnail) }}" alt="{{ $lesson->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="relative w-full overflow-hidden rounded-xl bg-gradient-to-br from-purple-900/40 to-blue-900/40 border border-white/10">
                <div class="aspect-[16/9] flex items-center justify-center">
                    <!-- subtle animated blob background -->
                    <div class="absolute -inset-10 opacity-20 blur-3xl animate-pulse bg-gradient-to-r from-purple-600 via-pink-500 to-blue-600"></div>
                    <!-- icon in front -->
                    <svg class="relative z-10 w-14 h-14 text-white/70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5h16v14H4zM4 15l4-4 3 3 5-5 4 4"/>
                    </svg>
                </div>
            </div>
        @endif
    </div>
    <div class="p-5">
        <!--<div class="flex items-center justify-between mb-3">
            <span class="text-xs font-medium text-{{ $levelColor ?? 'purple' }}-400 bg-{{ $levelColor ?? 'purple' }}-400/10 px-2.5 py-0.5 rounded-full">{{ $level }}</span>
            <span class="text-xs text-gray-400">{{ $duration }}</span>
        </div>
        -->
        <h3 class="text-lg font-semibold text-white group-hover:text-{{ $primaryColor ?? 'purple' }}-400 transition-colors duration-300">{{ $lesson->title }}</h3>
        <p class="mt-2 text-sm text-gray-400 line-clamp-2">{{ $lesson->description }}</p>
    </div>
</a>
