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
                            @if(isset($lesson->category))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-purple-600/30 to-blue-600/30 text-purple-200 backdrop-blur-sm animate-fadeIn animation-delay-500">
                                {{ ucfirst($lesson->category) }}
                            </span>
                            @endif
                                <span class="ml-4 text-gray-300 text-sm animate-fadeIn animation-delay-500">
                                <time datetime="{{ $lesson->created_at->format('Y-m-d') }}">
                                    {{ $lesson->created_at->format('M d, Y') }}
                                </time>
                            </span>
                        </div>
                    </div>

                    @can('admin')
                    <div class="mt-4 md:mt-0 animate-fadeIn animation-delay-1000 flex gap-4">
                        <a href="/{{$lesson->category}}/{{$lesson->id}}/edit{{ $adminKey }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <button type="submit" form="delete-form" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1
                                1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                        <form id="delete-form"
                              action="/{{ $lesson->category }}/{{ $lesson->id }}{{ $adminKey }}"
                              method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
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
            @if ($lesson->video)
            <div class="w-full aspect-video overflow-hidden">
                @php
                    $videoUrl = $lesson->video;
                    // Check if it's a YouTube URL
                    if (strpos($videoUrl, 'youtube.com') !== false) {
                        // Extract video ID from YouTube URL
                        preg_match('/[\?\&]v=([^\?\&]+)/', $videoUrl, $matches);
                        if (isset($matches[1])) {
                            $videoUrl = 'https://www.youtube.com/embed/' . $matches[1];
                        }
                    } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                        // Handle youtu.be short links
                        $parts = parse_url($videoUrl);
                        if (isset($parts['path'])) {
                            $videoId = trim($parts['path'], '/');
                            $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
                        }
                    }
                @endphp
                <iframe src="{{ $videoUrl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
            </div>
            @elseif ($lesson->image)
            <div class="w-full  overflow-hidden relative group"> <!-- h-64 md:h-80 -->
                <img src="{{ asset('storage/' . $lesson->image) }}" alt="{{ $lesson->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-xl">Lesson Image</span>
                </div>
            </div>
            @elseif ($lesson->thumbnail)
            <div class="w-full overflow-hidden relative group"><!-- h-64 md:h-80 -->
                <img src="{{ asset('storage/' . $lesson->thumbnail) }}" alt="{{ $lesson->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span class="text-white text-xl">Lesson Thumbnail</span>
                </div>
            </div>
            @endif

            <div class="whitespace-pre-line p-6 md:p-8 prose prose-lg dark:prose-invert max-w-none">
                {!! Str::markdown($lesson->content) !!}
            </div>

            <!-- Content Info -->
            <div class="border-t border-gray-200 dark:border-gray-700 p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Lesson Information</h2>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Description</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $lesson->description }}</p>
                    </div>
                    @if(isset($lesson->category))
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Category</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ ucfirst($lesson->category) }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Back to lessons button -->
        <div class="mt-8 text-center">
            <a href="/{{ isset($lesson->category) ? $lesson->category . $adminKey : 'lessons' . $adminKey}}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 animate-pulse-blob">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to {{ isset($lesson->category) ? ucfirst($lesson->category) : 'Lessons' }}
            </a>
        </div>
    </div>
</x-layout>
