@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">The Best Online Learning Platform</h1>
    <p class="lead">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elit.</p>
</div>
<!-- Search Form -->
<form action="{{ route('search.results') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search for courses...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<div class="container">
    <h2 class="text-center my-4">Popular Courses</h2>
    <br>
    <div class="row">
        @foreach($courses as $course)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img src="{{ $course->image }}" class="card-img-top fixed-width-img1" alt="Course Image">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        @endforeach
    </div>

</div>
@endsection
