<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $popularMovies = Http::withToken( config('services.tmdb.token') )
                            ->get( config('services.tmdb.base_url') ."movie/popular" )
                            ->json()['results'];

        $nowPlayingMovies = Http::withToken( config('services.tmdb.token') )
                            ->get( config('services.tmdb.base_url') ."movie/now_playing" )
                            ->json()['results'];

        $genres = $this->getGenresMovies();   

        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres
        );
        return view('movies.index',$viewModel);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $movie = Http::withToken( config('services.tmdb.token') )
                            ->get( config('services.tmdb.base_url') ."/movie/{$id}?append_to_response=credits,videos,images" )
                            ->json();
        // dd($movie);

        $viewModel = new MovieViewModel(
            $movie
        );
        return view('movies.show',$viewModel);
    }

   

    public function getGenresMovies(){
        $genres =  [
            [
                "id" => 28,
                "name"=> "Acción"
            ],
            [
                "id" => 12,
                "name"=> "Aventura"
            ],
            [
                "id" => 16,
                "name"=> "Animación"
            ],
            [
                "id" => 35,
                "name"=> "Comedia"
            ],
            [
                "id" => 80,
                "name"=> "Crimen"
            ],
            [
                "id" => 99,
                "name"=> "Documental"
            ],
            [
                "id" => 18,
                "name"=> "Drama"
            ],
            [
                "id" => 10751,
                "name"=> "Familia"
            ],
            [
                "id" => 14,
                "name"=> "Fantasía"
            ],
            [
                "id" => 36,
                "name"=> "Historia"
            ],
            [
                "id" => 27,
                "name"=> "Terror"
            ],
            [
                "id" => 10402,
                "name"=> "Música"
            ],
            [
                "id" => 9648,
                "name"=> "Misterio"
            ],
            [
                "id" => 10749,
                "name"=> "Romance"
            ],
            [
                "id" => 878,
                "name"=> "Ciencia ficción"
            ],
            [
                "id" => 10770,
                "name"=> "Película de TV"
            ],
            [
                "id" => 53,
                "name"=> "Suspenso"
            ],
            [
                "id" => 10752,
                "name"=> "Bélica"
            ],
            [
                "id" => 37,
                "name"=> "Oeste"
            ]
        ];
        return $genres;
    }
}
