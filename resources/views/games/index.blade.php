<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-red-500">Board Games Collection</h1>

        <table class="min-w-full table-auto bg-gray-800 text-white rounded-lg shadow-lg">
            <thead>
            <tr class="bg-gray-700">
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-200">Game Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-200">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-200">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-200">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-200">Rating</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($games as $game)
                <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-700 transition-all">
                    <td class="border px-4 py-2">
                        <a href="{{ route('games.show', $game->id) }}" class="text-blue-500 hover:underline">
                            {{ $game->gameName }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('images/' . $game->image) }}" alt="{{ $game->gameName }}" class="h-16 w-16 rounded">
                    </td>
                    <td class="px-6 py-4 text-green-400 font-semibold">${{ number_format($game->price, 2) }}</td>
                    <td class="px-6 py-4 text-gray-300">{{ Str::limit($game->description, 50, '...') }}</td>
                    <td class="px-6 py-4 text-yellow-400 font-semibold">{{ $game->rating }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
