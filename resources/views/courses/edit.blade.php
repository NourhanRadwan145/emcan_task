@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Course</h1>

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $course->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image Link</label>
                <input type="text" name="image" id="image" class="form-control" value="{{$course->image}}">
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
@endsection
