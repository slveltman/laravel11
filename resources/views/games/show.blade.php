<x-layout>
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold mb-4">{{ $game->gameName }}</h1>
                    <p class="text-lg font-semibold">Price: ${{ number_format($game->price, 2) }}</p>
                    <p class="text-lg font-semibold">Rating: {{ $game->rating }}</p>
                </div>
            </div>
            <h2 class="text-xl font-bold mb-2">Description</h2>
            <p class="mb-4">{{ $game->description }}</p>
            <td class="border px-4 py-2">
                <!-- Edit Button -->
                <a href="{{ route('games.edit', $game->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
            </td>
            <td class="border px-4 py-2">
                <br>
                <!-- Delete buttons -->
            <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>

            <a href="{{ route('games.index') }}" class="text-blue-500 hover:underline">Back to Games List</a>
            <br>
            <a href="{{route('review.show', $game->id )}}" class="text-blue-500 hover:underline">reviews</a>
        </div>
</x-layout>
