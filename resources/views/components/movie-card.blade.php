@inject('carbon', 'Carbon\Carbon')
<div>
    <div class="mt-8">
        <a href="{{ route('movies.movie', $movies['id']) }}">
            <img src="{{ $movies['poster_path'] }}" alt="{{ $movies['title'] }}"
                class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.movie', $movies['id']) }}"
                class="text-md md:text-lg mt-2 hover:text-gray-300">{{ $movies['title'] }}</a>
            <div class="flex items-center text-gray-400 text-xs md:text-sm">
                <span><i class="fa-regular fa-star w-4 h-4 fill-current text-orange-500"></i></span>
                <span class="ml-2">{{ $movies['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movies['release_date'] }}</span>
            </div>
            <div class="text-gray-400 text-xs md:text-sm">
                {{ $movies['genres'] }}
            </div>
        </div>
    </div>
</div>
