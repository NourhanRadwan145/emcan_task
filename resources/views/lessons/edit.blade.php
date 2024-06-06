@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('lessons.update', $lesson) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $lesson->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Lesson</button>
        </form>
    </div>
@endsection
