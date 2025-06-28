<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>

    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen bg-indigo-900">
    <main class="flex flex-col h-screen justify-center items-center">
        {{ $slot }}
    </main>
</body>
</html>