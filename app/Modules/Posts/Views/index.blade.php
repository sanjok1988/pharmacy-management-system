@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row paypasa-heading">
                <h4>{{ trans('News::words.newsTitle')}}</h4>
            </div>
            <div class="row"  style="height: 50px;">
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
                                <a class="btn btn-primary waves-effect waves-light" title="Create News" href="{{ route('createNews') }}"><i class="fa fa-plus"></i> {{ trans('News::words.addNew')}}</a>
                             </span>



                            <table id="table" class="table table-bordered table-hover news-table " >
                                <thead>
                                <tr>
                                    <th>{{ trans('News::words.sn')}}</th>
                                    <th>{{ trans('News::words.title')}}</th>
                                    <th>{{ trans('News::words.category')}}</th>
                                    <th>{{ trans('News::words.actions')}}</th>
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
                ajax: '{!! route('news.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'category', name: 'category' },
                 
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