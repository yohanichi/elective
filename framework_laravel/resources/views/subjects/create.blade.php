@extends('layouts.app')

@section('title', 'Add Subject')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h2 class="card-title">Add New Subject</h2>
    </div>

    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf

        <div class="form-group">
            <label for="code">Subject Code *</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="title">Subject Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="unit">Units *</label>
            <input type="number" id="unit" name="unit" value="{{ old('unit') }}" min="1" required>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Subject</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection