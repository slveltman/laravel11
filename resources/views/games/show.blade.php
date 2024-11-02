<x-layout>
{{--    game details--}}
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-lg mx-auto bg-gray-200 rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold mb-4 text-red-600 text-center">{{ $game->gameName }}</h1>
            <p class="text-lg font-semibold text-gray-800 text-center">Price: ${{ number_format($game->price, 2) }}</p>
            <p class="text-lg font-semibold text-gray-800 text-center">Rating: {{ $game->rating }}</p>

            <h2 class="text-xl font-bold mb-2 text-red-500 mt-4">Description</h2>
            <p class="mb-4 text-gray-700">{{ $game->description }}</p>
            <h2 class="text-xl font-bold mb-2 text-red-500 mt-4">made by</h2>
            <p class="bg-gray-300 p-4 rounded-lg shadow-md my-4">{{$game->user->name }}</p>
{{--            edit and delete button for admin en user how made it--}}
            @if (auth()->check() && auth()->id() == $game->user_id)
            @auth()
            <div class="flex justify-center mb-4">
                <a href="{{ route('games.edit', $game->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            </div>
            @endauth
            @endif
        {{--reviews--}}
            <h2 class="text-xl font-bold mt-6 text-red-500">Reviews</h2>

            @if($game->reviews->isEmpty())
                <p class="text-gray-800 text-center">No reviews yet for this game.</p>
            @else
                @foreach ($game->reviews as $review)
                    <div class="bg-gray-300 p-4 rounded-lg shadow-md my-4"> <!-- Review card -->
                        <p class="font-semibold text-red-600">Rating: {{ $review->rating }} / 5</p>
                        <p class="text-gray-800">{{ $review->review }}</p>
                        <p class="text-sm text-gray-600">Reviewed by User: {{ $review->user->name }} on {{ $review->created_at->format('F d, Y') }}</p>
                    </div>
                @endforeach
            @endif

            <a href="{{ route('games.index') }}" class="text-blue-500 hover:underline block text-center mt-4">Back to Games List</a>
        </div>
    </div>
</x-layout>
