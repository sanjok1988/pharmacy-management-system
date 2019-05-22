@extends('layouts.master')
@section('content')
<div class="box-header">
       
        <h3 class="box-title">Order List</h3>
    
       
      </div>
      <!-- /.box-header -->
      <div class="box-body">
<table class="table table-bordered table-striped table-sm">
    <thead>
      <tr>
        <th>Product Name</th>                
             
        <th>Price</th>
        <th>Qty</th>   
        <th>Total</th>
        <th>User Email</th>                
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @if(count($data)>0)
        @foreach($data as $value)
      <tr>
        <td>{{$value->product_name }}</td>
        <td>{{$value->price }}</td>
        <td>{{ $value->qty }}</td>       
        <td>{{ $value->price * $value->qty }}</td>
        <td>{{ $value->email }}</td>
       
        <td>
          
          <span class="badge badge-warning" >{{ ($value->status == "pending")?"Pending":"Closed" }}</span>
         
        </td>
        <td>
           @if($value->status == "pending")

            <a href="{{ route('orders.closed', ['id'=>$value->id])}}" class="btn btn-success" alt=""><i class="fa fa-money"></i> close</a> 
            @else
            <a href="{{ route('orders.closed', ['id'=>$value->id])}}" class="btn btn-warning" alt=""><i class="fa fa-cash"></i> pending</a> 
            @endif
        </td>
      </tr>    
      @endforeach    
      @endif      
    </tbody>
  </table>

  {!! $data->render() !!}
</div>
@endsection