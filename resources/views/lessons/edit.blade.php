<x-layout>
    <x-hero-section
        primaryColor="blue"
        secondaryColor="purple"
        :title="'Edit <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500">Lesson</span>'"
        description="Update your animation lesson content, making it even better for your audience."
    />

    <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('lessons.update', $lesson) }}{{ $adminKey }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" required
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="4" required
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $lesson->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lesson Content</label>
                        <textarea name="content" id="content" rows="8" required
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('content', $lesson->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="level_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Level</label>
                        <select name="level_id" id="level_id" required
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select a level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ old('level_id', $lesson->level_id) == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Thumbnail Image (Leave empty to keep current image)</label>
                        @if ($lesson->thumbnail)
                            <div class="mt-2 mb-4">
                                <img src="{{ asset('storage/' . $lesson->thumbnail) }}" alt="Current thumbnail" class="w-32 h-32 object-cover rounded-lg">
                            </div>
                        @endif
                        <input type="file" name="thumbnail" id="thumbnail"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('lessons.show', $lesson) }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 animate-float-blob">
                            Update Lesson
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
