@extends('layouts.app')

@section('content')
    <h1>Create Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Image</label>
            <input type="text" name="image" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
