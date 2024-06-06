@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Search Results</h2>
    <br>
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img  style="height:300px; width:500px" src="{{ $course->image }}" src="{{ $course->image }}" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
