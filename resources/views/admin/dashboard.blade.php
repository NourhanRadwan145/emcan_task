<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="mb-3">
            <h2>Manage Courses</h2>
            <button type="submit" class="btn btn-danger">
                <a href="{{ route('courses.create') }}" class="text-white text-decoration-none">Create Course</a>
            </button>
            <br>
            <div class="row mt-3 justify-content-center">
                @forelse ($courses as $course)
                    <div class="col-12 col-mdst-6 col-lg-6 mb-4" style="display:flex;justify-content:center;">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid fixed-width-img" style="height: 200px; object-fit: cover;" src="{{ $course->image }}" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="{{ route('admin.course', $course) }}">{{ $course->title }}</a>
                                </h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">No courses found.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
