@extends('frontend.layout.main')
@section('main')
    <div class="container-fluid mt-4 mb-4">
        <a href="{{url('/')}}" class="btn btn-dark">Home Page</a>
        @include('frontend.pages.alert')
        <div class="row ">
            <h1 class="text-center">Game Name: {{ $data->game_name }} </h1>
            <strong class="text-center">Age: {{ $data->age_description }}</strong>
            <span class="text-center"> <strong>Description: </strong>({{ $data->description }})</span>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>Register Player </h2>

                    <form action="{{ route('submit_from') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Player Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age</label>
                            <input type="text" name="age" value="{{old('age')}}" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <input type="hidden" name="game_id" value="{{ $data->id }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
