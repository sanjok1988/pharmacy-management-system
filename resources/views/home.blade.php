@extends('layouts.master')

@section('content')
<div class="box-header">
    @if(isset($page))
    <h3 class="box-title">{{ ucfirst("dashboard") }} </h3>
    @endif
   
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      
        <div class="card-body">
           

            You are logged in!
        </div>
    </div>
        
</div>
@endsection
