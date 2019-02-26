
@extends('layouts.master')
@section('content')
<div class="box-header">
        @if(isset($page))
        <h3 class="box-title">Product Category List</h3>
        @endif
        <a class="btn btn-success btn-sm pull-right" title="Create New" href="{{ route('category.create')}}" ><i class="fa fa-plus"></i> Create New</a>
      </div>
      <!-- /.box-header -->
                        <div class="box-body">
                                <table class="table table-bordered table-striped table-sm">
                                
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