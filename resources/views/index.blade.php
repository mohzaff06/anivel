<x-layout>
    <div class="relative flex flex-col items-center justify-center min-h-screen w-full px-4 py-12 overflow-hidden">
        <!-- Animated background elements -->
        <div class="fixed inset-0 w-full h-full overflow-hidden opacity-25 pointer-events-none">
            <div class="absolute -top-[10%] -left-[10%] w-[50vw] h-[50vw] max-w-[500px] max-h-[500px] bg-purple-600 rounded-full filter blur-3xl animate-blob"></div>
            <div class="absolute top-[40%] -right-[5%] w-[40vw] h-[40vw] max-w-[400px] max-h-[400px] bg-blue-600 rounded-full filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-[10%] left-[30%] w-[45vw] h-[45vw] max-w-[450px] max-h-[450px] bg-pink-600 rounded-full filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>



        <!-- Main content -->
        <div class="relative z-10 w-full max-w-6xl mx-auto space-y-16">
            <!-- Hero title with animation -->
            <div class="text-center space-y-4">
                <h1 class="text-5xl md:text-7xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-blue-500 drop-shadow-lg transform transition-all duration-500 hover:scale-105">
                    Douhaym
                </h1>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">Choose your path to digital expression and innovation</p>
            </div>

            <!-- Cards container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
                <!-- Animation Card -->
                <a href="/animation" class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-900/40 to-blue-900/40 backdrop-blur-sm p-1 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-purple-500/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative h-full flex flex-col p-6 border border-white/10 rounded-xl overflow-hidden">
                        <div class="flex-1 flex flex-col items-center justify-center p-6 text-center space-y-4">
                            <div class="w-24 h-24 rounded-full bg-purple-500/20 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-white group-hover:text-purple-300 transition-colors">Animation Studio</h2>
                            <p class="text-gray-300 group-hover:text-white transition-colors">Create stunning animations with our intuitive tools and effects</p>
                        </div>
                        <div class="w-full py-4 text-center bg-white/5 rounded-lg mt-auto">
                            <span class="inline-flex items-center text-lg font-medium text-purple-300 group-hover:text-white transition-colors">
                                Get Started
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Levels Card -->
                <a href="/levels" class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-pink-900/40 to-blue-900/40 backdrop-blur-sm p-1 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-pink-500/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-pink-500/20 to-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative h-full flex flex-col p-6 border border-white/10 rounded-xl overflow-hidden">
                        <div class="flex-1 flex flex-col items-center justify-center p-6 text-center space-y-4">
                            <div class="w-24 h-24 rounded-full bg-pink-500/20 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-white group-hover:text-pink-300 transition-colors">Level Designer</h2>
                            <p class="text-gray-300 group-hover:text-white transition-colors">Build immersive levels and environments with powerful design tools</p>
                        </div>
                        <div class="w-full py-4 text-center bg-white/5 rounded-lg mt-auto">
                            <span class="inline-flex items-center text-lg font-medium text-pink-300 group-hover:text-white transition-colors">
                                Explore Levels
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-layout>
