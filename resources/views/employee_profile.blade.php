@extends('layouts.master')
@section('content')
<?php $dt = \Carbon\Carbon::now();?>
<div class="container">
    <div class="row">
        
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-md-4">                
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Total Attendance</h5>
                        <h3>{{ count($records) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Total Leave</h5>
                        <h3>{{ $dt->day - count($records)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Total Days Of Month</h5>
                            <h3>{{ \Carbon\Carbon::parse($dt->format('Y-m-d'))->daysInMonth }}</h3>
                        <p>{{ $_SERVER['REMOTE_ADDR'] }}</p>{{getUserIP()}}
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card">
                <div class="card-header">Attendance Board<span class="pull-right"><b>Today:</b> {{ \Carbon\Carbon::now()->toDayDateTimeString() }}</span></div>

                <div class="card-body">
                    <center>
                    <h5>Press Button For Attendance</h5>
                    <a href="{{ route('employee.signin') }}" class="btn btn-success">Sign-In</a>
                    <a href="{{ route('employee.signout') }}" class="btn btn-danger">Sign-Out</a>
                    </center>
                    
                </div>
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sign In</th>
                            <th scope="col">Sign Out</th>
                            <th scope="col">Status</th>
                            <th scope="col">Note</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($records)>0)
                            <?php $i=0; ?>
                            @foreach($records as $data)
                            <?php $i++; ?>
                          <tr>
                            <th scope="row">{{ $i }}</th>
                          <td>{{ $data->time_in }}</td>
                            <td>{{ $data->time_out }}</td>
                            <td>{{ "Late" }}</td>
                            <td>{{ $data->note }}</td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
            </div>
        </div>
    </div>
</div>
@endsection