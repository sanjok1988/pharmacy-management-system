@extends('layouts.master')
@section('content')
<div class="box-header">
        @if(isset($page))
        <h3 class="box-title">Product List</h3>
        @endif
        <a class="btn btn-success btn-sm pull-right" title="Create New" href="{{ route('product.create')}}" ><i class="fa fa-plus"></i> Create New</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
<table class="table table-bordered table-striped table-sm">
    <thead>
      <tr>
        <th>ID</th>                
        <th>Name</th>        
                 
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if(count($data)>0)
        @foreach($data as $value)
      <tr>
          <td>{{ $value->id }}</td>
        <td>{{$value->name }}</td>

        <td>Active</td>
        <td>
          
          <span class="badge badge-success" >{{ ($value->status == "available")?"Available":"Unavailable" }}</span>
         
        </td>
        <td>
            <a href="{{ route('product.edit', $value->id)}}" class="btn btn-outline-primary" alt="@lang('words.edit')"> <i class="fa fa-pencil"></i></a>

            <a href="{{ route('product.delete', $value->id)}}" class="btn btn-outline-danger" alt="@lang('words.delete')"><i class="fa fa-trash"></i></a>
        </td>
      </tr>    
      @endforeach    
      @endif      
    </tbody>
  </table>

  {!! $data->render() !!}
</div>
@endsection