@extends('backend.layouts.main')
@section('style')
@endsection
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><a href="{{ route('admin.category.index') }}" class="btn btn-dark"> <i
                            class="bi bi-arrow-left-short"></i> Back</a> </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" value="{{  $data_lists->name }}"
                                id="exampleInputEmail1" readonly>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write Somethings !',
                tabsize: 2,
                height: 100,

            });

        });
    </script>
@endsection
