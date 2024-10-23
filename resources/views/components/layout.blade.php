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
<body class="bg-gray-300">
<nav class="bg-gray-200 p-4 flex justify-between items-center shadow-md">
    <div class="space-x-4">
        <a href="{{ route('games.index') }}" class="text-red-600 hover:text-red-800">Home</a>
        <a href="{{ route('games.index') }}" class="text-red-600 hover:text-red-800">Overview</a>
        @auth
            <a href="{{route("games.create" )}}" class="text-red-600 hover:text-red-800">Create</a>

        @endauth
        <a href="{{ route('login') }}" class="text-red-600 hover:text-red-800">Login</a>
        <a href="{{ route('register') }}" class="text-red-600 hover:text-red-800">Register</a>
        @auth()
            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.index') }}" class="text-red-600 hover:text-red-800">Admin Page</a>
            @endif
        @endauth

    </div>
</nav>
{{ $slot }}
</body>
</html>
