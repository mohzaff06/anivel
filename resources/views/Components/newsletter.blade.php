<div class="bg-gradient-to-r from-{{ $primaryColor ?? 'purple' }}-900/30 to-{{ $secondaryColor ?? 'blue' }}-900/30 border-y border-white/10 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">
            <div class="md:w-1/2">
                <h2 class="text-2xl font-bold text-white">{{ $title ?? 'Stay updated with new lessons' }}</h2>
                <p class="mt-3 text-gray-300">{{ $description ?? 'Get notified when we publish new tutorials, tips and techniques.' }}</p>
            </div>
            <div class="md:w-1/2">
                <form class="flex">
                    <input type="email" placeholder="Enter your email" class="flex-1 min-w-0 px-4 py-3 rounded-l-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-{{ $primaryColor ?? 'purple' }}-500">
                    <button type="submit" class="px-6 py-3 rounded-r-lg bg-{{ $primaryColor ?? 'purple' }}-600 text-white font-medium hover:bg-{{ $primaryColor ?? 'purple' }}-700 transition-colors">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
