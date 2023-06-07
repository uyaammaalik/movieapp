@extends('layouts.main')

@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-5 md:px-20 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                class="w-96">
            <div class="ml-0 mt-5 md:mt-0 md:ml-24">
                <h2 class="text-2xl md:text-4xl font-semibold">
                    {{ $movie['title'] }}
                </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span><i class="fa-regular fa-star w-4 h-4 fill-current text-orange-500"></i></span>
                    <span class="ml-2">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8 text-justify">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex flex-col md:flex-row mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-gray-400 text-sm">{{ $crew['job'] }}</div>
                                </div>
                            @else
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <div x-data="{ modal: false }">
                {{--  Modal button  --}}
                @if (is_array($movie['videos']['results']) && count($movie['videos']['results']) > 0)
                    <div class="mt-12">

                        <button @click="modal=true"
                            class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4
                        hover:bg-orange-600 transition ease-in-out duration-150">
                            <i class="fa-solid fa-play"></i> <span class="ml-4">Play Trailer</span>
                        </button>
                    </div>
                @endif

                {{--  Modal for youtube  --}}
                <div x-show="modal" style="background-color:rgba(0,0,0,.5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded w-11/12 lg:w-3/4 mx-auto">
                            <div class="flex justify-end pr-2 pt-1 lg:pr-4 lg:pt-2">
                                <button @click="modal=false" class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>
                            <div class="modal-body px-2 py-2 lg:px-8 lg:py-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                                    <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                        src="http://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                        style="border:0;" allow="autoplay; encrypted-media;" allowfullscreen></iframe>
                                    {{--  <video class="responsive-iframe absolute top-0 left-0 w-full h-full">
                                            <source
                                                src="http://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                                type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                        </video>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>{{-- end of info --}}

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-5 md:px-20 py-4">
            <h2 class="text-4xl font-semibold">
                Cast
            </h2>
            <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}"
                                    alt="{{ $cast['name'] }}" alt="parasite"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span>{{ $cast['character'] }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                    @break
                @endif
            @endforeach



        </div>
    </div>

</div>{{-- end of Cast --}}

<div class="movie-pic border-b border-gray-800" x-data="{ imageshow: false, image: '' }">
    <div class="container mx-auto px-5 md:px-20 py-4">
        <h2 class="text-4xl font-semibold">
            Images
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($movie['images']['backdrops'] as $image)
                @if ($loop->index < 9)
                    <a @click.stop="
                            imageshow=true
                            image='{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'"
                        class="mt-8" href="#">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="poster"
                            class="w-100">
                    </a>
                @else
                @break
            @endif
        @endforeach
    </div>
</div>

{{--  modal for images  --}}
<div x-show="imageshow" style="background-color:rgba(0,0,0,.5);"
    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded w-11/12 lg:w-3/4 mx-auto">
            <div class="flex justify-end pr-2 pt-1 lg:pr-4 lg:pt-2">
                <button @click="imageshow=false" class="text-3xl leading-none hover:text-gray-300">&times;
                </button>
            </div>
            <div class="modal-body px-2 py-2 lg:px-8 lg:py-8">
                <img :src="image" alt="poster">
            </div>
        </div>
    </div>
</div>
</div>{{-- end of Images --}}
</div>
@endsection
