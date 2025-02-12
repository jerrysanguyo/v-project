<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swipe to Unlock</title>
    @if (Request::is('passcode'))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pass.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/slider.js', 'resources/js/dateTime.js'])
    @endif
</head>

<body class="bg-custom h-screen w-full">

    <div>
        @yield('content')
    </div>
</body>

</html>