<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

use Carbon\Carbon;

class TvViewModel extends ViewModel
{
    public $tv;
    public function __construct($tv)
    {
        $this->tv = $tv;
    }

    public function tv()
    {
        return collect($this->tv)->merge([
            'poster_path' => $this->tv['poster_path'] ? 'https://image.tmdb.org/t/p/w500/'.$this->tv['poster_path']
                                                         : 'https://via.placeholder.com/500x750',
            'vote_average' => $this->tv['vote_average'] * 10 . '%',
            'first_air_date' => Carbon::parse($this->tv['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tv['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tv['credits']['crew'])->take(2),
            'cast' => collect($this->tv['credits']['cast'])->take(5)->map(function($cast){

                return collect($cast)->merge([
                    'profile_path' =>  $cast['profile_path'] ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
                                                             : 'https://via.placeholder.com/300x450',
                ]);
            }),
            'images' => collect($this->tv['images']['backdrops'])->take(9)
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits' ,
            'videos', 'images', 'crew', 'cast', 'images', 'created_by'
        ]);
    }
}
