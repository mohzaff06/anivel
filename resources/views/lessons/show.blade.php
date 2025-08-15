<x-layout>
    <div class="bg-gradient-to-b from-purple-900/60 to-slate-900 relative overflow-hidden">
        <!-- Animated blobs for background -->
        <div class="fixed inset-0 w-full h-full overflow-hidden opacity-20 pointer-events-none">
            <div class="absolute top-[10%] left-[5%] w-[30vw] h-[30vw] max-w-[400px] max-h-[400px] bg-purple-600 rounded-full filter blur-3xl animate-float-blob"></div>
            <div class="absolute top-[60%] right-[10%] w-[25vw] h-[25vw] max-w-[300px] max-h-[300px] bg-blue-600 rounded-full filter blur-3xl animate-float-blob animation-delay-2000"></div>
            <div class="absolute top-[40%] left-[20%] w-[15vw] h-[15vw] max-w-[200px] max-h-[200px] bg-pink-500 rounded-full filter blur-3xl animate-pulse-blob animation-delay-1000"></div>
        </div>

        <!-- Header -->
        <x-header :primaryColor="'purple'" />

        <!-- Lesson Hero Section -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight animate-fadeIn">
                            {{ $lesson->title }}
                        </h1>
                        <div class="mt-3 flex items-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-purple-600/30 to-blue-600/30 text-purple-200 backdrop-blur-sm animate-fadeIn animation-delay-500">
                                {{ $lesson->level->name }} Level
                            </span>
                            <span class="ml-4 text-gray-300 text-sm animate-fadeIn animation-delay-500">
                                <time datetime="{{ $lesson->created_at->format('Y-m-d') }}">
                                    {{ $lesson->created_at->format('M d, Y') }}
                                </time>
                            </span>
                        </div>
                    </div>

                    @can('admin')
                    <div class="mt-4 md:mt-0 animate-fadeIn animation-delay-1000">
                        <a href="{{ route('lessons.edit', $lesson) }}{{ $adminKey }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Lesson
                        </a>
                    </div>
                    @endcan
                </div>

                <p class="mt-6 text-xl text-gray-300 animate-slideUp">
                    {{ $lesson->description }}
                </p>
            </div>
        </div>
    </div>

    <!-- Lesson Content -->
    <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden animate-fadeIn animation-delay-1000">
            @if ($lesson->thumbnail)
            <div class="w-full h-64 md:h-80 overflow-hidden">
                <img src="{{ asset('storage/' . $lesson->thumbnail) }}" alt="{{ $lesson->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-in-out hover:scale-105">
            </div>
            @endif

            <div class="p-6 md:p-8 prose prose-lg dark:prose-invert max-w-none">
                {!! Str::markdown($lesson->content) !!}
            </div>

            <!-- Related Lessons -->
            @if ($relatedLessons->count() > 0)
            <div class="border-t border-gray-200 dark:border-gray-700 p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Lessons</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($relatedLessons as $relatedLesson)
                    <a href="{{ route('lessons.show', $relatedLesson) }}" class="block group">
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="p-4 flex space-x-4">
                                @if ($relatedLesson->thumbnail)
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $relatedLesson->thumbnail) }}" alt="{{ $relatedLesson->title }}" class="w-20 h-20 object-cover rounded">
                                </div>
                                @endif
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-300">{{ $relatedLesson->title }}</h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 line-clamp-2">{{ $relatedLesson->description }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Back to lessons button -->
        <div class="mt-8 text-center">
            <a href="{{ route('lessons.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 animate-pulse-blob">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                All Lessons
            </a>
        </div>
    </div>
</x-layout>
