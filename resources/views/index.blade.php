@extends('layouts.main')

@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <div class="container mx-auto px-5 md:px-20 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Popular Movies
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $pmovie)
                    <x-movie-card :movies="$pmovie" :genres="$genres" />
                @endforeach
            </div>
        </div> {{-- end of popular movies --}}

        <div class="now-playing mt-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Now Playing
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlaying as $nmovie)
                    <x-movie-card :movies="$nmovie" :genres="$genres" />
                @endforeach
            </div>{{-- end of Now playing --}}
        </div>
    </div>
@endsection
