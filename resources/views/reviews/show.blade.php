<x-layout>
    <div class="flex flex-wrap justify-center">
        @foreach ($reviews as $review)
            <div class="bg-gray-100 m-4 p-4 rounded-lg shadow-lg flex flex-col items-center w-60">
                <div class="text-gray-700">{{ ($review->review) }}</div>
                <div class="text-yellow-600 font-semibold mt-2">{{ $review->rating }}</div>
            </div>
        @endforeach
    </div>
</x-layout>
