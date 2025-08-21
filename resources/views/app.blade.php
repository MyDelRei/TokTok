<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

@include('sweetalert::alert') 

@php $user = session('user'); @endphp
@if($user && $user->role === 'admin')
    @include('partials.admin-navbar')
@elseif($user && $user->role === 'member')
    @include('partials.member-navbar')
@endif


</body>
</html>
