@extends('layouts.app')

@section('content')
    <div >
    <img class="about" src="{{ asset('images/course.jpg') }}" alt="Logo">
    </div>
    <div class="container">
        <h1>My Enrolled Courses</h1>
        <ul class="list-group">
            @forelse ($courses as $course)
                <a href="{{ route('courses.show', $course) }}"><h1>{{ $course->title }}</h1></a>
                <img style="height:300px; width:500px" src="{{ $course->image }}" class="card-img-top" alt="Course Image">
            @empty
                <li class="list-group-item">You are not enrolled in any courses.</li>
            @endforelse
        </ul>
    </div>

@endsection
