@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="card-title">Subjects</h2>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add New Subject</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Title</th>
                <th>Units</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subjects as $subject)
            <tr>
                <td>{{ $subject->subject_id }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->title }}</td>
                <td>{{ $subject->unit }}</td>
                <td class="actions">
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form method="POST" action="{{ route('subjects.destroy', $subject) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No subjects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Home</a>
    </div>
</div>
@endsection