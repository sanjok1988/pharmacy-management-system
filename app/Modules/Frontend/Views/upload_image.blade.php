
@extends('Frontend::master')
@section('content')
    
    <div class="product">
        <div class="container ">
            <div class="spec ">
                <h4>Upload Image For Prescription</h4>
                <br>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="tab-head center " >
                    
                        <form role="form" method="POST" action="{{ route('upload')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="pid" value="{{ request()->id }}">
                            <div class="form-group">
                            <input type="file" name="image" >
                            </div>
                            <input type="submit" name="submit" value="Upload" class="btn btn-success">
                        </form>
            
                </div>
     
        </div>
	</div>
    @endsection
    @section('js')
    <script src="{{ asset('front/vue/index.js') }}"></script>
    @endsection
    @section('css')
    <style>
    .center {
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
      }
      </style>
    @stop