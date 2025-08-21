@extends('app')

@section('title', 'Admin Dashboard')

@section('content')

<h1>Admin Dashboard</h1>
<a href="{{ route('logout') }}">Logout</a>

@endsection
