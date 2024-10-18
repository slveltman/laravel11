<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-red-500">Edit Game: {{ $game->gameName }}</h1>

        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="gameName" class="block text-gray-300">Game Name</label>
                <input type="text" name="gameName" id="gameName" value="{{ $game->gameName }}" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-300">Price</label>
                <input type="text" name="price" id="price" value="{{ $game->price }}" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-300">Description</label>
                <textarea name="description" id="description" class="w-full p-2 rounded bg-gray-700 text-white">{{ $game->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="rating" class="block text-gray-300">Rating</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5" value="{{ $game->rating }}" class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Update Game</button>
        </form>
    </div>
</x-layout>
