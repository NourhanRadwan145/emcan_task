@extends('layouts.app')

@section('content')
    <h1>Create Lesson for {{ $course->title }}</h1>
    <form action="{{ route('courses.lessons.store', $course->id) }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Content</label>
            <textarea name="content" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
