<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/4f2d7302b1.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-custom h-screen w-full overflow-hidden">

    <div>
        @yield('content')
    </div>
    
<script src="https://sdk.scdn.co/spotify-player.js"></script>
<script type="text/javascript" async src="https://tenor.com/embed.js"></script>
</body>

</html>