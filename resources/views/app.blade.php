<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>

@include('sweetalert::alert') <!-- 👈 SweetAlert must be inside body -->

@yield('content')

<h1 class="text-2xl">this is tailwind</h1>

</body>
</html>
