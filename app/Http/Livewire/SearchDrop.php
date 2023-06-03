<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDrop extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) > 3) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];
        }


        //dump($searchResults);
        return view('livewire.search-drop', [
            'searchResults'=>collect($searchResults)->take(8),
        ]);
    }
}
