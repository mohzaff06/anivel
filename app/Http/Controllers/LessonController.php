<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index(string $category)
    {
        $lessons = Lesson::where('category', $category)->get();
        return view( $category, compact('lessons'));
    }

    public function create()
    {
        return view('lessons.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|in:levels,animation',
            'video' => 'nullable|string|url',
            'thumbnail' => 'nullable|image',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $lesson = Lesson::create($validated);
        $link = '/' . $validated['category'] . '/' . $lesson->id . app('adminKey');
        return redirect($link)->with('success', 'Lesson created successfully!');
    }

    public function show(string $category, Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(string $category, Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request,string $category, Lesson $lesson)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|in:levels,animation',
            'video' => 'nullable|string|url',
            'thumbnail' => 'nullable|image',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($lesson->thumbnail) {
                Storage::disk('public')->delete($lesson->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($lesson->image) {
                Storage::disk('public')->delete($lesson->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $lesson->update($validated);

        $link = '/' . $validated['category'] . '/' . $lesson->id . app('adminKey');
        return redirect($link)->with('success', 'Lesson Updated successfully!');
    }

    public function destroy(string $category, Lesson $lesson)
    {

        if ($lesson->thumbnail) {
            Storage::disk('public')->delete($lesson->thumbnail);
        }
        if ($lesson->image) {
            Storage::disk('public')->delete($lesson->image);
        }

        $lesson->delete();

        return redirect('/' . $category . app('adminKey'))
            ->with('success', 'Lesson deleted successfully!');
    }
}
