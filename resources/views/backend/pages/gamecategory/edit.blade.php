@extends('backend.layouts.main')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><a href="{{ route('admin.gamecategory.index') }}" class="btn btn-dark"> <i
                            class="bi bi-arrow-left-short"></i> Back</a> </h3>
            </div>
            @include('backend.message.success')
            <form action="{{ route('admin.gamecategory.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Game Name</label>
                                <input type="text" name="game_name" value="{{ $data_lists->game_name }}"
                                    class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Age Description</label>
                                <input type="text" name="age_description" value="{{ $data_lists->age_description }}"
                                    class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Gender</label>
                                <select class="form-control" name="gender_id" id="exampleFormControlSelect1">
                                    <option value="{{ $data_lists->gender->id }}" select>
                                        {{ $data_lists->gender->name }}</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Description</label>
                                <textarea class="form-control" placeholder="write a description here" id="floatingTextarea2" style="height: 100px"
                                    name="description">{{ $data_lists->description }}</textarea>
                            </div>
                            <input type="hidden" value="{{ $data_lists->id }}" name="data_id">
                        </div>
                    </div>
                </div>
                <div class="card-footer mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("document").ready(function() {
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Write Somethings !',
                    tabsize: 2,
                    height: 100
                });
            });
            setTimeout(function() {
                $('#initalHidden').fadeOut('fast');
            }, 3000);
            $(document).ready(function() {
                $('.selectoption').select2();
            });
        });
    </script>
@endsection
