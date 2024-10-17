<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-red-500">Write a Review for {{ $game->game_name }}</h1>

        <form action="{{ route('reviews.store', $game->id) }}" method="POST" class="max-w-lg mx-auto bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            @csrf

            <!-- Rating -->
            <div class="mb-4">
                <label for="rating" class="block text-sm font-bold mb-2">Rating (1-5):</label>
                <input type="number" name="rating" id="rating" min="1" max="5" value="{{ old('rating') }}" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded">
                @error('rating')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Review Text -->
            <div class="mb-4">
                <label for="review" class="block text-sm font-bold mb-2">Review:</label>
                <textarea name="review" id="review" rows="5" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded">{{ old('review') }}</textarea>
                @error('review')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</x-layout>
