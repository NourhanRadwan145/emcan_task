@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">The Best Online Learning Platform</h1>
    <p class="lead">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elit.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Read More</a>
    <a class="btn btn-success btn-lg" href="#" role="button">Join Now</a>
</div>
<div class="container">
    <h2 class="text-center my-4">Popular Courses</h2>
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <p class="card-text">${{ $course->price }}</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                        <a href="#" class="btn btn-success">Join Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
