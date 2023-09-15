@extends('frontend.layout.main')
@section('main')
    <div class="container">
        <div class="row justify-content-evenly">
            @foreach ($gamecategories as $game)
                <div class="col-md-4 col-lg-5 col-12 m-4">
                    <a href="{{ route('form', $game->id) }}">
                        <div class="card  " style="width: auto; height:18rem;">
                            <h3 class="text-center text-primary p-3"> {{ $game->game_name }}</h3>
                            <div class="card-body">
                                <strong>Gender: <span>{{ $game->gender->name }}</span></strong><br>
                                <strong>Age : <span>{{ $game->age_description }}</span></strong><br>
                                <strong>Description : </strong>
                                <p class="card-text">{{ $game->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
