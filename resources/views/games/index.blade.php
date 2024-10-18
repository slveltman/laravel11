<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-red-600">Board Games Collection</h1>
        <!-- Search form -->
        <form method="GET" action="{{ route('games.index') }}" class="mb-4">
            <input type="text" name="search" class="w-full p-2 rounded bg-gray-100" placeholder="Search games...">
            <button type="submit" class="bg-red-500 text-white p-2 rounded mt-2">Search</button>
            <a href="{{ route('games.index') }}">reset</a>

        <!-- Filter Dropdown -->

            <label for="sort_by" class="block text-gray-700">Sort by:</label>
            <select name="sort_by" id="sort_by" onchange="this.form.submit()" class="bg-gray-200 p-2 rounded">
                <option value="">Default</option>
                <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="rating_asc" {{ request('sort_by') == 'rating_asc' ? 'selected' : '' }}>Rating: Low to High</option>
                <option value="rating_desc" {{ request('sort_by') == 'rating_desc' ? 'selected' : '' }}>Rating: High to Low</option>
            </select>
            <!-- Price Filter Dropdown -->
            <select name="price_filter" onchange="this.form.submit()" class="bg-gray-200 p-2 rounded">
                <option value="">Filter by Price</option>
                <option value="under_30" {{ request('price_filter') == 'under_30' ? 'selected' : '' }}>Under €30</option>
                <option value="over_30" {{ request('price_filter') == 'over_30' ? 'selected' : '' }}>€30 and Above</option>
            </select>
            <!-- Rating Filter Dropdown -->
            <select name="rating_filter" onchange="this.form.submit()" class="bg-gray-200 p-2 rounded">
                <option value="">Filter by Rating</option>
                <option value="over_3.5" {{ request('rating_filter') == 'over_3.5' ? 'selected' : '' }}>Over 3.5</option>
                <option value="under_3.5" {{request('rating_filter') == 'under_3.5' ? 'selected' : ''}}>Under 3.5</option>
            </select>
        </form>

        <div class="flex flex-wrap justify-center">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
                @foreach ($games as $game)
                <div class="bg-gray-100 m-4 p-4 rounded-lg shadow-lg flex flex-col items-center w-60">
                    <a href="{{ route('games.show', $game->id) }}" class="text-red-600 hover:underline mb-2 text-lg font-bold">
                        {{ $game->gameName }}
                    </a>
                    <div class="text-green-600 font-semibold">${{ number_format($game->price, 2) }}</div>
                    <div class="text-gray-700">{{ Str::limit($game->description, 50, '...') }}</div>
                    <div class="text-yellow-600 font-semibold mt-2">{{ $game->rating }}/5</div>
                    <a href="{{ route('review.create', ['game' => $game->id]) }}" class="text-blue-500 hover:underline">Schrijf een review</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
