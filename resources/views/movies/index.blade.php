@extends('layout.layout')


@section('content')


<div class="container mx-auto px-4 pt-16">

    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Películas más top </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            
            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie"  />
            @endforeach
        </div>
    </div> <!-- end popular-movies -->

    <div class="now-playing-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Ahora en cines</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
           
            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie"  />
            @endforeach
        </div>
    </div> <!-- end playing-movies -->
    
</div>  
@endsection