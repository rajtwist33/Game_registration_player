@extends('backend.layouts.main')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @include('backend.nepalidatepicker_css')
@endsection
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-body">
                                <form action="{{ route('admin.change_profile') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="">Upload Profile Image</label>
                                    <input required type="file" name="profile" class="form-control">
                                    <button type="submit" class="btn btn-sm btn-success m-2"> Upload</button>
                                </form>

                                <form action="{{ route('admin.change_logo') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="">Upload Logo Image</label>
                                    <input required type="file" name="logo" class="form-control">
                                    <button type="submit" class="btn btn-sm btn-success m-2"> Upload</button>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-body">
                                 <form action="{{ route('admin.change_user') }}" method="post"
                                    >
                                    @csrf
                                    <label for="">Company Name</label>
                                    <input type="text" name="company_name" value="{{Auth::user()->company_name}}"  class="form-control">
                                    <label for="">User Name</label>
                                    <input type="text" name="name" value="{{Auth::user()->name}}"  class="form-control">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                                    <button type="submit" class="btn btn-sm btn-success m-2"> Chage Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-body">
                                @include('backend.message.success')
                                <form action="{{ route('admin.setting.store') }}" method="post">
                                    @csrf
                                    <label for="">Current Password</label>
                                    <input type="text" name="current_password" class="form-control"
                                        value="{{ old('current_password') }}">
                                    <label for="">New Password</label>
                                    <input type="text" name="new_password" class="form-control"
                                        value="{{ old('new_password') }}">
                                    <label for="">Conform Password</label>
                                    <input type="text" name="new_confirm_password" class="form-control"
                                        value="{{ old('new_confirm_password') }}">
                                    <button type="submit" class="btn btn-success mt-2">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    @include('backend.nepalidatepicker_js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        setTimeout(function() {
            $('#initalHidden').fadeOut('fast');
        }, 3000);
    </script>
@endsection
