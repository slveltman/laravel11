<x-layout>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Game Name</th>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm ">Price</th>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">Rating</th>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">edit</th>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">delete</th>
            <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm">publish</th>



        </tr>
        </thead>
        <tbody class="text-gray-700">
        @foreach ($games as $game)
            <tr>
                <td class="w-1/4 py-3 px-4">{{ $game->gameName }}</td>
                <td class="w-1/4 py-3 px-4">${{($game->price) }}</td>
                <td class="w-1/4 py-3 px-4">{{ $game->rating }}</td>
                <td><a href="{{ route('games.edit', ['game' => $game->id]) }}" class="text-blue-600 hover:text-yellow-400">edit</a></td>
                <td>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </td>
                <td>
                <form action="{{ route('admin.GameStatus', $game->id) }}" method="POST">
                    @csrf
                    <button type="submit"  class="btn px-4 py-2 font-bold text-white rounded {{ $game->is_active ? 'bg-green-500 hover:bg-green-700' : 'bg-red-500 hover:bg-red-700' }}">
                        {{ $game->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
