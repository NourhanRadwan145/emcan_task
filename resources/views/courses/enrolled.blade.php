@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <img class="about img-fluid" src="{{ asset('images/course.jpg') }}" alt="Logo">
    </div>
    <div class="container">
        <h1 class="text-center mb-4">My Enrolled Courses</h1>
        <div class="row">
            @forelse ($courses as $course)
                <div class="col-md-6 mb-4" style="display:flex;justify-content:center;" >
                    <div class="card h-100" >
                        <img style="max-width:100%; height:auto;" class="card-img-top" src="{{ $course->image }}" alt="Course Image" style="max-height: 500px; width: 60%; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title"><a href="{{ route('courses.show', $course) }}">{{ $course->title }}</a></h3>
                        </div>
                    </div>
                </div>
                <br>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">You are not enrolled in any courses.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
