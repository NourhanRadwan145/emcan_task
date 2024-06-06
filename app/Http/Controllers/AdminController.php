<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $courses = Course::all();
        $lessons = Lesson::all();

        return view('admin.dashboard', compact('users', 'courses', 'lessons'));
    }
}
