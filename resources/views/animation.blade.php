<x-layout>
    <x-hero-section
        primaryColor="purple"
        secondaryColor="blue"
        title='Master <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-blue-500\">Animation</span> Techniques'
        description="Explore our comprehensive animation tutorials, from basic principles to advanced techniques. Learn how to bring your ideas to life through the art of animation."
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
        <!-- Section title -->
        <!--<div class="mb-12">
            <h2 class="text-3xl font-bold text-white">Animation Lessons</h2>
            <p class="mt-2 text-gray-400">Browse our collection of 25+ animation tutorials</p>
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
            <!--<xpagination primaryColor="purple" :currentPage="1" :totalPages="3" />-->
        </div>
    </div>



    <!-- Footer -->
    <x-footer primaryColor="purple" />

    <!-- Add JavaScript for search functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchLessons');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                // Add actual search functionality here
                console.log('Searching for:', searchTerm);
            });
        });
    </script>
</x-layout>
