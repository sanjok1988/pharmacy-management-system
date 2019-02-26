@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>View  Vacancy </h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="company_name">News Category</label>
                                    @foreach($categories as $category)
                                        <div class="custom-control custom-checkbox">
                                            <input disabled type="checkbox" id="defaultChecked2" class="minimal" name="category[]" value="{{$category->name}}">
                                            @if($category->display_name==$news->category)
                                                checked
                                            @endif
                                            <label for="defaultChecked2">{{$category->display_name}}</label>
                                        </div>
                                    @endforeach
                                @if ($errors->has('company_name')) <p class="help-block m-b-none">{{ $errors->first('company_name') }}</p> @endif
                            </div>
                            <div class="form-group">
                                <label for="details">Title</label>
                                <input disabled type="text"  value="{{$news->title}}"  name="position" class="form-control" id=""  >
                            </div>

                            <div class="form-group">
                                <label for="details">News Content</label>
                                <input disabled type="text"  value="{{$news->content}}" name="working_time"class="form-control" id="">
                            </div>

                            <div class="form-group">
                                <label for="company">Height Light</label>
                                <input disabled type="text"  value="{{$news->highlights}}" name="number_of_vacancies"class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label>Author*</label>
                                <div>
                                    <input  disabled type="text"  value="{{$news->author}}" id="employee_form" name="employee_form" class="form-control"   >
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <div>
                                    <input  disabled type="text" value="{{$news->lang}}"  id="salary" name="salary" class="form-control"  >
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">


                            <div class="form-group">
                                <label>Select Language</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input disabled type="radio" class="custom-control-input" id="defaultInline1" name="lang" value="en" checked>
                                        <label class="custom-control-label" for="defaultInline1">English</label>
                                    </div>
                                    <!-- Default inline 2-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input disabled type="radio" class="custom-control-input" id="defaultInline2" name="lang" value="jp">
                                        <label class="custom-control-label" for="defaultInline2">Japanese</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example">Image</label>
                                <input disabled type="text"  value="{{$news->image}}" name="example" class="form-control"   id="example" >
                            </div>
                            <div class="form-group">
                                <label for="details">Linkk</label>
                                <input disabled type="text" value="{{$news->link}}" name="insurance"class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="details">Publish Date</label>
                                <input disabled type="text" value="{{$news->publish_date}}" name="job_description"class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label for="company">Views</label>
                                <input disabled type="text"  value="{{$news->views}}" name="holiday_type"class="form-control" id="" >
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <input disabled type="text" value="{{$news->status}}" id="location" name="location" class="form-control"   >
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- end container -->
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        },3000);
    });
</script>