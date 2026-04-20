@extends('layouts.app')

@section('title', 'Add Program')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Add New Program</h2>
    </div>

    <form method="POST" action="{{ route('programs.store') }}">
        @csrf

        <div class="form-group">
            <label for="code">Program Code *</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="title">Program Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="years">Years *</label>
            <input type="number" id="years" name="years" value="{{ old('years') }}" min="1" required>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Program</button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection