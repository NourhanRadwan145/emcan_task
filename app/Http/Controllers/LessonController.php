<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $course->lessons()->create($request->all());

        return redirect()->route('courses.show', $course->id)
                         ->with('success', 'Lesson created successfully.');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $lesson->update($request->all());

        return redirect()->route('courses.show', $course->id)
                         ->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('courses.show', $course->id)
                         ->with('success', 'Lesson deleted successfully.');
    }
}
