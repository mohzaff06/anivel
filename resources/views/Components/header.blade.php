<header class="relative z-10 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-{{ $primaryColor ?? 'purple' }}-400 to-pink-500">AniVel</span>
                </a>
                <nav class="ml-10 space-x-6 hidden md:flex">
                    <a href="/" class="{{ request()->is('/') ? 'text-white font-medium border-b-2 border-'.(($primaryColor ?? 'purple').'-500').' pb-1' : 'text-gray-300 hover:text-white transition-colors' }}">Home</a>
                    <a href="/animation" class="{{ request()->is('animation') ? 'text-white font-medium border-b-2 border-'.(($primaryColor ?? 'purple').'-500').' pb-1' : 'text-gray-300 hover:text-white transition-colors' }}">Animation</a>
                    <a href="/levels" class="{{ request()->is('levels') ? 'text-white font-medium border-b-2 border-'.(($primaryColor ?? 'purple').'-500').' pb-1' : 'text-gray-300 hover:text-white transition-colors' }}">Levels</a>
                </nav>
            </div>
            <div>
                <button class="md:hidden text-white" id="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-white/10 transition-all duration-300">
            <nav class="flex flex-col space-y-4">
                <a href="/" class="{{ request()->is('/') ? 'text-white font-medium' : 'text-gray-300' }} py-2">Home</a>
                <a href="/animation" class="{{ request()->is('animation') ? 'text-white font-medium' : 'text-gray-300' }} py-2">Animation</a>
                <a href="/levels" class="{{ request()->is('levels') ? 'text-white font-medium' : 'text-gray-300' }} py-2">Levels</a>
            </nav>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</header>
