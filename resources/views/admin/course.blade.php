@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <h1 class="text-center">{{ $course->title }}</h1>
                <p class="text-center">{{ $course->description }}</p>
                <div class="text-center">
                    <img src="{{ $course->image }}" alt="Course Image" class="img-fluid" style="max-height:300px; max-width:100%;">
                </div>
                <hr>
                <h2 class="text-center">Lessons</h2>
                <br>
                <div class="list-group">
                    @forelse($lessons as $lesson)
                    <ul>
                    <li>
                    <a href="{{ route('admin.lesson', $lesson) }}">{{ $lesson->title }}</a>
                    </li>
                    </ul>
                    @empty
                        <div class="alert alert-info text-center">No lessons found.</div>
                    @endforelse
                </div>
                <br>
                <div class="text-center mt-4">
                    <a href="{{ route('lessons.create') }}" class="btn btn-primary">Add New Lesson</a>
                </div>
            </div>
        </div>
    </div>
@endsection
