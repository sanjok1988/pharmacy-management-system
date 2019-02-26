@extends('layouts.app') 
@section('content')
{{ App::setLocale('jp') }}
<section class="content">  
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">table</h3>
                <a class="btn btn-success btn-sm pull-right" title="Create New" href={{url('/admin/vacancy/create')}}>Add new vacancy</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   
                    {!! $dataTable->table() !!}

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endsection