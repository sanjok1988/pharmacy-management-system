@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>{{ trans('Category::words.categoryTitle')}}</h4>
            </div>
            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Successful！</strong> {{ Session::get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <span class="float-right mb-12 mr-12">

                         <a class="btn btn-primary waves-effect waves-light" title="Create Category" href="{{ route('createCategory') }}"><i class="fa fa-plus"></i> {{ trans('Category::words.addNew')}}</a>
                             </span>
                            <table id="table" class="table table-bordered table-hover " >
                                <thead>
                                <tr>
                                    <th>{{ trans('Category::words.sn')}}</th>
                                    <th>{{ trans('Category::words.displayName')}}</th>
                                    <th>{{ trans('Category::words.actions')}}</th>
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
                ajax: '{!! route('category.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'display_name', name: 'display_name' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection