@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{ $course->title }}</h1>
            <br>
            <img class="img-fluid" style="height:300px; width:500px" src="{{ $course->image }}" alt="Course Image">
            <p>{{ $course->description }}</p>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Lessons</h2>
            @forelse($course->lessons as $lesson)
                <div class="lesson mb-4">
                <ul>
                    <li>
                    <a href="{{ route('lessons.show', $lesson) }}">{{ $lesson->title }}</a>
                    </li>
                    </ul>

                </div>
                @empty
                <li class="list-group-item">No lessons found.</li>
            @endforelse
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @auth
                @if ($course->enrollments()->where('user_id', Auth::id())->exists())
                    <button class="btn btn-secondary" disabled>You are already enrolled in this course</button>
                @else
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Enroll in this Course</button>
                    </form>
                @endif
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to enroll in this course.</p>
            @endauth
        </div>
    </div>
</div>
@endsection
