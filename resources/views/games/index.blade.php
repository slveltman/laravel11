<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-red-600">Board Games Collection</h1>

        <div class="flex flex-wrap justify-center">
            @foreach ($games as $game)
                <div class="bg-gray-100 m-4 p-4 rounded-lg shadow-lg flex flex-col items-center w-60">
                    <a href="{{ route('games.show', $game->id) }}" class="text-red-600 hover:underline mb-2 text-lg font-bold">
                        {{ $game->gameName }}
                    </a>
                    <img src="{{ asset('images/' . $game->image) }}" alt="{{ $game->gameName }}" class="h-32 w-32 rounded mb-2">
                    <div class="text-green-600 font-semibold">${{ number_format($game->price, 2) }}</div>
                    <div class="text-gray-700">{{ Str::limit($game->description, 50, '...') }}</div>
                    <div class="text-yellow-600 font-semibold mt-2">{{ $game->rating }}</div>
                </div>
            @endforeach
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

        </div>
    </div>
</x-layout>
