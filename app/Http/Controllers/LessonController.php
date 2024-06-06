<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    public function index()
    {
        $lesson = Lesson::paginate();
        return view('lessons.index', compact('lesson'));
    }

    public function show(String $id)
    {
        $lesson = Lesson::find($id);
        return view('admin.lesson', compact('lesson'));
    }

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request)
    {
        $course_title = $request->course;
        $course = Course::where('title', $course_title)->first();

        if ($course) {
            $courseId = $course->id;
        }
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $course->lessons()->create($request->all());

        return redirect()->route('admin.course',['course'=>$course])->with('success', 'Lesson created successfully.');
    }

    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request,Lesson $lesson)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $lesson->update($request->all());

        return redirect()->route('admin.lesson', compact('lesson'))
                         ->with('success', 'Lesson updated successfully.');
    }



    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $course_id= $lesson->course_id;
        $course = Course::where('id', $course_id)->first();

        return redirect()->route('admin.course', compact('course'))
                         ->with('success', 'Lesson deleted successfully.');
    }
}
