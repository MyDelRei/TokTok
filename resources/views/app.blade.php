<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Management')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    @vite('resources/css/app.css')

    <!-- Custom Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caesar+Dressing&family=Joti+One&family=Noto+Sans+Khmer:wght@100..900&family=Preahvihear&family=Siemreap&display=swap');

        .siemreap-regular {
            font-family: "Siemreap", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        ::selection {
            background: #0b3e00ff; /* highlight */
            color: #fff;           /* text */
        }
        ::-moz-selection { /* Firefox */
            background: #0b3e00ff;
            color: #fff;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @php $user = session('user'); @endphp

        {{-- Conditional Navbar --}}
        @if($user && $user->role === 'admin')
            @include('partials.admin-navbar')
        @elseif($user && $user->role === 'member')
            @include('partials.member-navbar')
        @endif
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @vite('resources/js/app.js')
    @stack('scripts')

    {{-- SweetAlert --}}
    @include('sweetalert::alert')
    @yield('script')

</body>
</html>
