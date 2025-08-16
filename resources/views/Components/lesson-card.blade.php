<div class="group bg-slate-800/50 rounded-xl overflow-hidden border border-white/5 hover:border-{{ $primaryColor ?? 'purple' }}-500/30 transition-all duration-300 hover:shadow-glow">
    <div class="aspect-video w-full overflow-hidden bg-slate-900">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
    </div>
    <div class="p-5">
        <!--<div class="flex items-center justify-between mb-3">
            <span class="text-xs font-medium text-{{ $levelColor ?? 'purple' }}-400 bg-{{ $levelColor ?? 'purple' }}-400/10 px-2.5 py-0.5 rounded-full">{{ $level }}</span>
            <span class="text-xs text-gray-400">{{ $duration }}</span>
        </div>
        -->
        <h3 class="text-lg font-semibold text-white group-hover:text-{{ $primaryColor ?? 'purple' }}-400 transition-colors duration-300">{{ $title }}</h3>
        <p class="mt-2 text-sm text-gray-400 line-clamp-2">{{ $description }}</p>
    </div>
</div>
