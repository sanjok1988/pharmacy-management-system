
@extends('layouts.master')
@section('content')
<div class="box-header">
        @if(isset($page))
        <h3 class="box-title">Users List</h3>
        @endif
        <a class="btn btn-success btn-sm pull-right" title="Create New" href="{{ route('user.create')}}" ><i class="fa fa-plus"></i> Create New</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
                   
                             </span>
                            <table id="table" class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                        @if(count($data)>0)
                                        @foreach($data as $value)
                                      <tr>
                                        <td>{{$value->id }}</td> 
                                        <td>{{$value->name }}</td>
                                
                                        <td>{{ $value->email }}</td>       
                                        <td>{{ $value->created_at }}</td>
                                       
                                       
                                        <td>
                                            <a href="{{ route('user.edit', $value->id)}}" class="btn btn-outline-primary" alt="@lang('words.edit')"> <i class="fa fa-pencil"></i></a>
                                
                                            <a href="{{ route('user.delete', $value->id)}}" class="btn btn-outline-danger" alt="@lang('words.delete')"><i class="fa fa-trash"></i></a>
                                        </td>
                                      </tr>    
                                      @endforeach    
                                      @endif      
                                    </tbody>
                            </table>
    
        <!-- end container-fluid -->
    </div>

@endsection
@section('script')
    <script>
        jQuery(function($) {
            $.noConflict();

            $('.table').DataTable({
               
            });
        });
    </script>
   
@endsection