<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen font-sans antialiased">
    <div class="fixed top-0 left-0 w-full h-full -z-10">
        <div class="absolute top-0 z-[-2] h-screen w-screen bg-white bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(224,122,95,0.3),rgba(255,255,255,0))]"></div>
    </div>
    @livewire('navbar')
    @livewireScripts
</body>
</html>