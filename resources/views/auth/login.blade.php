@extends('layouts.app')

@section('content')
    <h1>Login</h1>
    <div >
        <img class="login" src="{{ asset('images/login.png') }}" alt="Logo">
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
@endsection
