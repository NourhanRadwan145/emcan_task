<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
   
    public function enroll($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        // Check if the user is already enrolled in the course
        if ($course->enrollments()->where('user_id', $user->id)->exists()) {
            return redirect()->route('courses.index')->with('error', 'You are already enrolled in this course.');
        }

        // Enroll the user in the course
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Successfully enrolled in the course.');
    }
}
