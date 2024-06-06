<!-- create.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Lesson for {{ $course->title }}</h1>

        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" id="course" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Lesson Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Lesson Content</label>
                <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Lesson</button>
        </form>
    </div>
@endsection
