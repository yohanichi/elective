@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card" style="max-width: 400px; margin: 2rem auto;">
    <div class="card-header text-center">
        <h2 class="card-title">Login</h2>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </div>
    </form>
</div>
@endsection