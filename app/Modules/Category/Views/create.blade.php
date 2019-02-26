@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>Add Category </h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <form  method="post" class="" action="{{ route('storeCategory') }}" enctype='multipart/form-data' >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="" placeholder="name" required>
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Display name</label>
                                    <input type="text" name="display_name" class="form-control" id="" placeholder="display name">
                                    <small class="text-danger">{{ $errors->first('display_name') }}</small>
                                </div>
                                <div class="form-group m-b-50 ">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Create</button>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection