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

            <div class="card-header">
                <a href="{{ route('admin.gamecategory.create') }}" class=" btn btn-light text-dark "> Add Game Category</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="40%" class="text-center">Game Name</th>
                                <th width="30%" class="text-center">Age Description</th>
                                <th width="30%" class="text-center">Gender</th>
                                <th width="30%" class="text-center"> Description</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.gamecategory.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        "className": "text-center",
                        data: 'game_name',
                        name: 'game_name'
                    },
                    {
                        "className": "text-center",
                        data: 'age_description',
                        name: 'age_description'
                    },
                    {
                        "className": "text-center",
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        "className": "text-center",
                        data: 'description',
                        name: 'description'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
        setTimeout(function() {
            $('#initalHidden').fadeOut('fast');
        }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
