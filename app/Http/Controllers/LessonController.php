<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('level')->latest()->paginate(12);
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $this->authorize('admin');
        $levels = Level::all();
        return view('lessons.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'level_id' => 'required|exists:levels,id',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $lesson = Lesson::create($validated);

        return redirect()->route('lessons.show', $lesson)
            ->with('success', 'Lesson created successfully!');
    }

    public function show(Lesson $lesson)
    {
        // Get related lessons (same level, excluding current lesson)
        $relatedLessons = Lesson::where('level_id', $lesson->level_id)
            ->where('id', '!=', $lesson->id)
            ->take(4)
            ->get();

        return view('lessons.show', compact('lesson', 'relatedLessons'));
    }

    public function edit(Lesson $lesson)
    {
        $this->authorize('admin');
        $levels = Level::all();
        return view('lessons.edit', compact('lesson', 'levels'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $this->authorize('admin');

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'level_id' => 'required|exists:levels,id',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($lesson->thumbnail) {
                Storage::disk('public')->delete($lesson->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $lesson->update($validated);

        return redirect()->route('lessons.show', $lesson)
            ->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Lesson $lesson)
    {
        $this->authorize('admin');

        // Delete thumbnail if exists
        if ($lesson->thumbnail) {
            Storage::disk('public')->delete($lesson->thumbnail);
        }

        $lesson->delete();

        return redirect()->route('lessons.index')
            ->with('success', 'Lesson deleted successfully!');
    }
}
