@extends('app')

@section('title', 'Login')

@section('content')
<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <label class="text-2xl bg-indigo-600">User ID:</label>
    <input type="text" name="user_id" value="{{ old('user_id') }}" class="border border-slate-200 rounded-full" required>
    <button type="submit">Login</button>
</form>
@endsection
