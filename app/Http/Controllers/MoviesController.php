<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        // dd($popularMovies);
        return view('index',compact('popularMovies', 'nowPlayingMovies' ,'genres'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getGenresMovies(){
        $listGenres =  [
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

        $genres = collect($listGenres)->mapWithKeys(function($genre){
            return [ $genre['id'] => $genre['name'] ];
        });

        return $genres;
    }
}
