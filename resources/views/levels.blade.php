<x-layout>
    <!-- Hero section with background -->
    <x-hero-section
        primaryColor="blue"
        secondaryColor="pink"
        blobPosition1="top-[15%] left-[10%]"
        blobPosition2="top-[55%] right-[5%]"
        title='Level <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500">Design</span> Mastery'
        description="Learn how to craft immersive and engaging levels for games and virtual environments. From basic layouts to complex game mechanics."
    />

    <!-- Search and filter section -->
    <!--<xsearch-bar
        primaryColor="blue"
        searchId="searchLevels"
        placeholder="Search level design lessons...">
        <button class="px-4 py-2 rounded-full bg-slate-800 text-gray-300 hover:bg-slate-700 font-medium text-sm whitespace-nowrap">Layouts</button>
        <button class="px-4 py-2 rounded-full bg-slate-800 text-gray-300 hover:bg-slate-700 font-medium text-sm whitespace-nowrap">Game Mechanics</button>
        <button class="px-4 py-2 rounded-full bg-slate-800 text-gray-300 hover:bg-slate-700 font-medium text-sm whitespace-nowrap">Environment</button>
    </xsearch-bar>-->

    <!-- Lessons grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Section title
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-white">Level Design Lessons</h2>
            <p class="mt-2 text-gray-400">Browse our collection of 25+ level design tutorials</p>
        </div>-->

        <!-- Lessons grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($lessons as $lesson)
                <x-lesson-card
                    primaryColor="purple"
                    :$lesson
                    level="Beginner"
                    levelColor="purple"
                    duration="22 min"
                />
            @endforeach

            <!-- Add pagination controls -->
            <!--<xpagination primaryColor="blue" :currentPage="1" :totalPages="3" />-->
        </div>
    </div>


    <!-- Footer -->
    <x-footer primaryColor="blue" />
</x-layout>
