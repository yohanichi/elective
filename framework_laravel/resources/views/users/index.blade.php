@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title">Users</h2>
                <p style="color: #718096; margin-top: 0.5rem; font-size: 0.95rem;">Manage system users and permissions</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                @php
                  $sortField = request('sort', 'id');
                  $sortOrder = request('order', 'asc');
                  $nextOrder = $sortOrder === 'asc' ? 'desc' : 'asc';
                  $getSortUrl = fn($field) => route('users.index', ['sort' => $field, 'order' => ($sortField === $field ? $nextOrder : 'asc')]);
                  $getSortIndicator = fn($field) => ($sortField === $field) ? ' ' . ($sortOrder === 'asc' ? '↑' : '↓') : '';
                @endphp
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('id') }}" style="text-decoration: none; color: inherit;">ID{{ $getSortIndicator('id') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('username') }}" style="text-decoration: none; color: inherit;">Username{{ $getSortIndicator('username') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('account_type') }}" style="text-decoration: none; color: inherit;">Role{{ $getSortIndicator('account_type') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('created_on') }}" style="text-decoration: none; color: inherit;">Created On{{ $getSortIndicator('created_on') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('created_by') }}" style="text-decoration: none; color: inherit;">Created By{{ $getSortIndicator('created_by') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('updated_on') }}" style="text-decoration: none; color: inherit;">Updated On{{ $getSortIndicator('updated_on') }}</a></th>
                <th style="cursor: pointer;"><a href="{{ $getSortUrl('updated_by') }}" style="text-decoration: none; color: inherit;">Updated By{{ $getSortIndicator('updated_by') }}</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><strong>{{ $user->username }}</strong></td>
                <td><span style="display: inline-block; padding: 0.35rem 0.75rem; background: #edf2f7; border-radius: 6px; font-size: 0.85rem; font-weight: 500; color: #4a5568;">{{ ucfirst($user->account_type) }}</span></td>
                <td>{{ $user->created_on ? $user->created_on->format('M d, Y') : 'N/A' }}</td>
                <td>{{ $user->createdBy ? $user->createdBy->username : 'N/A' }}</td>
                <td>{{ $user->updated_on ? $user->updated_on->format('M d, Y') : 'N/A' }}</td>
                <td>{{ $user->updatedBy ? $user->updatedBy->username : 'N/A' }}</td>
                <td class="actions" style="display: flex; gap: 0.5rem; align-items: center;">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm" style="white-space: nowrap;">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center" style="padding: 2rem; color: #a0aec0;">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 2.5rem;">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</div>
@endsection