<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        Course::create($request->all());

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Course deleted successfully.');
    }

    public function enrolledCourses()
    {
        $user = auth()->user();
        $courses = $user->enrollments->pluck('course');
        return view('courses.enrolled', compact('courses'));
    }

}
