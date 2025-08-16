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
            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1511512578047-dfb367046420?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Level Design Fundamentals"
                description="Learn the core principles that make up effective and engaging level design."
                level="Beginner"
                levelColor="blue"
                duration="15 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1515630278313-cc1915e7efa4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Spatial Storytelling"
                description="Use environmental design to tell stories and guide players through your levels."
                level="Beginner"
                levelColor="blue"
                duration="20 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1609921141835-710b7fa6e438?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Level Flow and Pacing"
                description="Create smooth player journeys with well-designed flow and carefully considered pacing."
                level="Intermediate"
                levelColor="purple"
                duration="25 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Environmental Design"
                description="Craft immersive and believable environments that enhance gameplay and player experience."
                level="Intermediate"
                levelColor="purple"
                duration="30 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1525909002-1b05e0c869d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Level Optimization"
                description="Learn techniques to optimize your levels for performance without sacrificing visual quality."
                level="Advanced"
                levelColor="pink"
                duration="35 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1555680202-c86f0e12f086?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Game Mechanics Integration"
                description="Seamlessly integrate gameplay mechanics into your level designs for enhanced player engagement."
                level="Intermediate"
                levelColor="purple"
                duration="28 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1500462918059-b1a0cb512f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Lighting Techniques"
                description="Master the art of lighting to create mood, guide players, and enhance the visual quality of your levels."
                level="Intermediate"
                levelColor="purple"
                duration="22 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Level Prototyping"
                description="Learn how to quickly prototype and iterate on level designs to test gameplay concepts."
                level="Beginner"
                levelColor="blue"
                duration="18 min"
            />


            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1601987177651-8edfe6c20009?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Level Aesthetics"
                description="Develop a consistent and appealing visual style for your game levels across different environments."
                level="Intermediate"
                levelColor="purple"
                duration="24 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1531403009284-440f080d1e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Puzzle Design"
                description="Create engaging and satisfying puzzles that challenge players without causing frustration."
                level="Advanced"
                levelColor="pink"
                duration="32 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Combat Spaces"
                description="Design combat arenas and encounter spaces that create dynamic and interesting gameplay moments."
                level="Advanced"
                levelColor="pink"
                duration="28 min"
            />

            <x-lesson-card
                primaryColor="blue"
                image="https://images.unsplash.com/photo-1563089145-599997674d42?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                title="Open World Design"
                description="Learn strategies for designing engaging open worlds with points of interest and meaningful exploration."
                level="Advanced"
                levelColor="pink"
                duration="40 min"
            />

            <!-- Add pagination controls -->
            <!--<xpagination primaryColor="blue" :currentPage="1" :totalPages="3" />-->
        </div>
    </div>


    <!-- Footer -->
    <x-footer primaryColor="blue" />
</x-layout>
