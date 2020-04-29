<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\TvsViewModel;
use App\ViewModels\TvViewModel;

class TVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $popularTv = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/tv/popular')
                    ->json()['results'];

        $tvTopRated = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/tv/top_rated')
                        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/genre/tv/list')
                    ->json()['genres'];

        $viewModel = new TvsViewModel(
            $popularTv,
            $tvTopRated,
            $genres
        );
        return view('tv.index',$viewModel);

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

        $tvshow = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel = new TvViewModel($tvshow);

        return view('tv.show', $viewModel);
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
}
