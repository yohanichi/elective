@extends('layouts.app')

@section('title', 'Programs')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title">Programs</h2>
                <p style="color: #718096; margin-top: 0.5rem; font-size: 0.95rem;">Manage academic programs</p>
            </div>
            @if(Auth::user()->canManageSubjectsPrograms())
            <a href="{{ route('programs.create') }}" class="btn btn-primary">Add New Program</a>
            @endif
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                @php
                  $sortField = request('sort', 'program_id');
                  $sortOrder = request('order', 'asc');
                  $nextOrder = $sortOrder === 'asc' ? 'desc' : 'asc';
                  $getSortUrl = fn($field) => route('programs.index', ['sort' => $field, 'order' => ($sortField === $field ? $nextOrder : 'asc')]);
                  $getSortIndicator = fn($field) => ($sortField === $field) ? ' ' . ($sortOrder === 'asc' ? '↑' : '↓') : '';
                @endphp
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('program_id') }}" style="text-decoration: none; color: inherit;">ID{{ $getSortIndicator('program_id') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('code') }}" style="text-decoration: none; color: inherit;">Code{{ $getSortIndicator('code') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('title') }}" style="text-decoration: none; color: inherit;">Title{{ $getSortIndicator('title') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('years') }}" style="text-decoration: none; color: inherit;">Years{{ $getSortIndicator('years') }}</a></th>
                @if(Auth::user()->canManageSubjectsPrograms())
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($programs as $program)
            <tr>
                <td>{{ $program->program_id }}</td>
                <td><strong>{{ $program->code }}</strong></td>
                <td>{{ $program->title }}</td>
                <td>{{ $program->years }}</td>
                @if(Auth::user()->canManageSubjectsPrograms())
                <td class="actions" style="display: flex; gap: 0.5rem; align-items: center;">
                    <a href="{{ route('programs.edit', $program) }}" class="btn btn-secondary btn-sm" style="white-space: nowrap;">Edit</a>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ Auth::user()->canManageSubjectsPrograms() ? '5' : '4' }}" class="text-center" style="padding: 2rem; color: #a0aec0;">No programs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 2.5rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</div>
@endsection