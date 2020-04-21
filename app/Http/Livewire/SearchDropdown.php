<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;


class SearchDropdown extends Component
{
    public $search="";

    public function render()
    {
        $searchMovies=[];
        if(strlen($this->search)>=2){
            $searchMovies = Http::withToken( config('services.tmdb.token') )
                                ->get( config('services.tmdb.base_url') ."search/movie?query={$this->search}" )
                                ->json()['results'];
            // dump($searchMovies);

        
        }
        return view('livewire.search-dropdown',[
            "searchMovies" => collect($searchMovies)->take(7)
        ]);
    }
}
