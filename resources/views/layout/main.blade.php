<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources\css\app.css', 'resources\js\app.js'])
    <title>{{ $title ?? 'Soon.it' }}</title>
</head>

<body>
    <header>
        <x-navBar />
    </header>
    <div class="min-vh-100">
        {{ $slot }}
    </div>
</body>

</html>
