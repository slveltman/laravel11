<x-layout>
{{--<form action="{{route('games.store')}}" method="post">--}}
{{--    <div>--}}
{{--        <x-input-label for="Name"> name</x-input-label>--}}
{{--        <x-text-input name="gamenName" id="Name"></x-text-input>--}}
{{--    </div>--}}
{{--    <x-primary-button type="submit">submit</x-primary-button>--}}
{{--</form>--}}

        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold text-center mb-6 text-red-500">Add a New Board Game</h1>

            <!-- Form Start -->
            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-gray-100 p-8 rounded-lg shadow-lg">
                @csrf

                <!-- Game Name -->
                <div class="mb-4">
                    <label for="gameName" class="block text-gray-700 text-sm font-bold mb-2">Game Name:</label>
                    <input type="text" id="gameName" name="gameName" required
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-red-500"
                           placeholder="Enter the name of the game">
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" required
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-red-500"
                           placeholder="Enter the price">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-red-500"
                              placeholder="Enter a description of the game"></textarea>
                </div>

                <!-- Rating -->
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating out of 10:</label>
                    <input type="text" id="rating" name="rating" required
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-red-500"
                           placeholder="Enter the rating (e.g., 5)">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">
                        Add Game
                    </button>
                </div>
            </form>
        </div>

</x-layout>
