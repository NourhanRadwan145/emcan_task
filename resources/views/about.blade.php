@extends('layouts.app')

@section('content')
<div >
    <img class="about" src="{{ asset('images/about.png') }}" alt="Logo">
</div>
<div class="container">
    <h1>About Us</h1>

    <p>This is a Learning Management System (LMS) built using Laravel for the junior Laravel developer position task at Emcan Solutions. The system allows users to manage courses, lessons, and enrollments with role-based access control.</p>
</div>
@endsection
