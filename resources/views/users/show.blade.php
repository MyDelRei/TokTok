@extends('app')

@section('title', 'show user detail')

@section('content')
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">User Detail</h1>

        <div class="space-y-3">
            <p><strong>Name:</strong> {{ $user->full_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Role:</strong>
                <span class="px-2 py-1 rounded text-sm
                {{ $user->role === 'admin' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }}">
                {{ ucfirst($user->role) }}
            </span>
            </p>
        </div>

        <div class="mt-6">
            <a href="{{ route('users.edit', $user) }}"
               class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">Edit</a>
            <a href="{{ route('users.userList') }}"
               class="ml-2 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">Back</a>
        </div>
    </div>
@endsection
