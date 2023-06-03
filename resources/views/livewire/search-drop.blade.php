<div class="relative mt-3 md:mt-0">

    <div wire:loading class="spinner right-0 mt-4 mr-4"></div>
    <input wire:model.debounce.500ms="search" type="text" name="" id=""
        class="bg-gray-800 rounded-full w-64 px-4 py-1" placeholder="Search">
    @if (strlen($search) > 0)


        <div class="absolute rounded text-sm bg-gray-800 w-64 mt-2">

            <ul>
                @if ($searchResults->count() > 0)
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movies.movie', $result['id']) }}"
                                class="py-3 px-3 block hover:bg-gray-700  flex items-center">
                                @if ($result['poster_path'])
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $result['poster_path'] }}"
                                        alt="poster" class="w-8">
                                @else
                                    <img src="https://placehold.co/400x600" alt="poster" class="w-8">
                                @endif

                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="border-b border-gray-700">
                        <span class="py-3 px-3 block hover:bg-gray-700">
                            No Results
                        </span>
                    </li>
                @endif



            </ul>
        </div>
    @endif
</div>
