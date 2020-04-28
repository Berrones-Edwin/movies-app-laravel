@extends('layout.layout')


@section('content')


<div class="container mx-auto px-4 pt-16">

    <div class="popular-actors">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Actores Populares </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularActors as $actor)
                <div class="actor mt-8">
                    <a href="{{ route('actors.show', $actor['id']) }}">
                        <img src="{{ $actor['profile_path'] }}" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> <!-- end popular-actors -->
    <!-- Pagination -->
    <div class="flex justify-between mt-16">
        @if ($previous)
            <a href="/actors/page/{{ $previous }}">Previous</a>
        @else
            <div></div>
        @endif
        @if ($next)
            <a href="/actors/page/{{ $next }}">Next</a>
        @else
            <div></div>
        @endif
    </div> 
    <!-- END Pagination -->

</div>  
@endsection