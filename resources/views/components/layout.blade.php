<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overzicht Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-gray-200 p-4 flex justify-between items-center shadow-md">
    <div class="space-x-4">
        <a href="{{ route('games.index') }}" class="text-red-600 hover:text-red-800">Overzicht</a>
        <a href="/welcome" class="text-red-600 hover:text-red-800">Home</a>
    </div>
</nav>
{{ $slot }}
</body>
</html>
