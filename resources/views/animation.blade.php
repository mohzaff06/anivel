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
            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1580809361436-42a7ec5c4525?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Animation Principles"
                description="Learn the fundamental principles that govern all types of animation, from traditional to digital."
                level="Beginner"
                levelColor="purple"
                duration="12 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1536240478700-b869070f9279?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Character Design"
                description="Create compelling characters with personality and appeal for your animations."
                level="Beginner"
                levelColor="purple"
                duration="18 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Timing and Spacing"
                description="Master the crucial concepts of timing and spacing to create realistic and appealing motion."
                level="Intermediate"
                levelColor="blue"
                duration="15 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1558655146-d09347e92766?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Walk Cycles"
                description="Create convincing walk cycles for your characters with proper weight and rhythm."
                level="Intermediate"
                levelColor="blue"
                duration="22 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1608306448197-e83633f1261c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Facial Animation"
                description="Learn techniques for creating expressive and emotive facial animations."
                level="Intermediate"
                levelColor="blue"
                duration="20 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1626785774573-4b799315345d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Storyboarding"
                description="Plan your animation effectively with storyboards that communicate your ideas clearly."
                level="Beginner"
                levelColor="purple"
                duration="14 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1633167606207-d840b5070fc2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="2D Effects Animation"
                description="Create compelling 2D effects like fire, water, smoke, and explosions for your animations."
                level="Advanced"
                levelColor="pink"
                duration="25 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1621600411688-4be93c2c1208?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Rigging Characters"
                description="Learn how to create efficient character rigs for smoother animation workflows."
                level="Intermediate"
                levelColor="blue"
                duration="30 min"
            />



            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="3D Character Animation"
                description="Master the techniques of 3D character animation using industry-standard software."
                level="Advanced"
                levelColor="pink"
                duration="35 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1581090700227-1e37b190418e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Motion Graphics"
                description="Create dynamic motion graphics animations for intros, titles, and explainer videos."
                level="Intermediate"
                levelColor="blue"
                duration="28 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Animation for Games"
                description="Learn specific techniques for creating game-ready animations with optimization in mind."
                level="Advanced"
                levelColor="pink"
                duration="40 min"
            />

            <x-lesson-card
                primaryColor="purple"
                image="https://images.unsplash.com/photo-1520697768239-bbb468e68fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Stop Motion"
                description="Create charming stop motion animations using everyday objects and simple camera setups."
                level="Beginner"
                levelColor="purple"
                duration="22 min"
            />

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
