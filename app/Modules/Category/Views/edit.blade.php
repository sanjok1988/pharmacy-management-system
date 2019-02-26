@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>Edit Category </h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <form  method="post"  class="" action="{{ route('updateCategory',['id'=>$category->id]) }}"  enctype='multipart/form-data' >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="" value="{{$category->name}}" placeholder="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Display name</label>
                                    <input type="text" name="display_name" value="{{$category->display_name}}" class="form-control" id="" placeholder="display name">
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