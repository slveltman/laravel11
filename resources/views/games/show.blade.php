<x-layout>
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold mb-4">{{ $game->gameName }}</h1>
            <div class="flex items-center mb-6">
                <img src="{{ asset('images/' . $game->image) }}" alt="{{ $game->gameName }}" class="h-48 mr-4 border border-gray-300 rounded-lg">
                <div>
                    <p class="text-lg font-semibold">Price: ${{ number_format($game->price, 2) }}</p>
                    <p class="text-lg font-semibold">Rating: {{ $game->rating }}</p>
                </div>
            </div>
            <h2 class="text-xl font-bold mb-2">Description</h2>
            <p class="mb-4">{{ $game->description }}</p>
            <a href="{{ route('games.index') }}" class="text-blue-500 hover:underline">Back to Games List</a>
        </div>
</x-layout>
