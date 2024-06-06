@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="mb-3">
            <h2>Manage Courses</h2>
            <button type="submit" class="btn btn-danger"><a href="{{ route('courses.create') }}">Create Course</a></button>
            <br>
            @forelse ($courses as $course)
            <div class="row">
                <div class="col-12 text-center">
                    <h1>{{ $course->title }}</h1>
                    <img class="img-fluid" style="height:300px; width:500px" src="{{ $course->image }}" alt="Course Image">
                    <p>{{ $course->description }}</p>
            </div>
        </div>
                    <div class="float-right">
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                            </form>
                        </div>
                <br>
                @empty
                    <li class="list-group-item">No courses found.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
