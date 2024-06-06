<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('title', 'like', "%$query%")
                         ->orWhere('description', 'like', "%$query%")
                         ->get();

        return view('search.results', compact('courses'));
    }
}
