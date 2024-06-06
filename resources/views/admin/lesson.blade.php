@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $lesson->title }}</h1>
        <p>{{ $lesson->content }}</p>
        <a href="{{ route('lessons.edit', [$lesson->id]) }}" class="btn btn-primary">Edit Lesson</a>
        <form action="{{ route('lessons.destroy', [$lesson]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lesson?')">Delete</button>
        </form>
    </div>
@endsection
