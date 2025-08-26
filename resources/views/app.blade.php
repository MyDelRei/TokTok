<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Management')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('partials.admin-navbar')
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @vite('resources/js/app.js')
    @stack('scripts')
    @include('sweetalert::alert')
</body>
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
