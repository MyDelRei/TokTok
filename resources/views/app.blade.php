<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Caesar+Dressing&family=Joti+One&family=Noto+Sans+Khmer:wght@100..900&family=Preahvihear&family=Siemreap&display=swap');
    .siemreap-regular {
        font-family: "Siemreap", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
    ::selection {
        background: #0b3e00ff; /* blue highlight */
        color: #fff;         /* white text */
    }

    /* For WebKit browsers (Safari/Chrome older versions) */
    ::-moz-selection { /* Firefox */
        background: #0b3e00ff;
        color: #fff;
    }

</style>
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
