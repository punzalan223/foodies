<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/foods/Burger_3D.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Foodies' }}</title>
</head>
<body class="min-h-screen font-sans antialiased">
    @livewire('navbar')
    {{ $slot }}
</body>
</html>