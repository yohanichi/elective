@extends('layouts.app')

@section('title', 'Programs')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="card-title">Programs</h2>
            <a href="{{ route('programs.create') }}" class="btn btn-primary">Add New Program</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Title</th>
                <th>Years</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($programs as $program)
            <tr>
                <td>{{ $program->program_id }}</td>
                <td>{{ $program->code }}</td>
                <td>{{ $program->title }}</td>
                <td>{{ $program->years }}</td>
                <td class="actions">
                    <a href="{{ route('programs.edit', $program) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form method="POST" action="{{ route('programs.destroy', $program) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No programs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">← Back to Home</a>
    </div>
</div>
@endsection