@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>{{ trans('Users::words.title')}}</h4>
            </div>
            <div class="row"  style="height:50px;">
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <span class="float-right mb-12 mr-12">

                    <a class="btn btn-primary waves-effect waves-light" title="Create Vacancy" href="{{ route('createUser') }}"><i class="fa fa-plus"></i> {{ trans('Users::words.addNew')}}</a>
                             </span>
                            <table id="table" class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>{{ trans('Users::words.sn')}}</th>
                                    <th>{{ trans('Users::words.name')}}</th>
                                    <th>{{ trans('Users::words.email')}}</th>
                                    <th>{{ trans('Users::words.created_at')}}</th>
                                    <th>{{ trans('Users::words.actions')}}</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>

@endsection
@section('script')
    <script>
        jQuery(function($) {
            $.noConflict();

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                buttons: [
                    'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                ],
                ajax: '{!! route('users.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                jQuery(".alert").fadeOut(1500);
            },3000);
        });
    </script>
@endsection