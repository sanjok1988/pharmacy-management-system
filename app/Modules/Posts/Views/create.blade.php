@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>@lang('News::words.add_news')</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">                            

                            <form  method="post" class="" action="{{ route('storeNews') }}" enctype='multipart/form-data' >
                                <div class="form-group">
                                    <label> @lang('News::words.select_language')</label>
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline1" name="lang" value="en" checked>
                                            <label class="custom-control-label" for="defaultInline1"> @lang('News::words.english')</label>
                                        </div>
                                        <!-- Default inline 2-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline2" name="lang" value="jp">
                                            <label class="custom-control-label" for="defaultInline2">@lang('News::words.japanese')</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>@lang('News::words.news_title') *</label>
                                    <div>
                                        <input type="text" id="title" name="title" class="form-control"  placeholder="title" required>
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                    </div>

                                </div>
                               
                                <div class="form-group">
                                    
                                    <label>@lang('News::words.news_content')</label>
                                    <div>
                                        <textarea id="editor"  type="text" name="content" class="form-control" rows="15"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>@lang('News::words.highlights')</label>
                                    <div>
                                        <textarea type="text"  class="form-control"  name="highlights" placeholder="Highlight"></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('News::words.news_category')</label>


                                        @foreach($categories as $data)
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" id="defaultChecked2" class="minimal" name="category[]" value="{{$data->id}}" >
                                            <label for="defaultChecked2">{{$data->display_name}}</label>
                                            </div>
                                        @endforeach

                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="minimal" id="defaultChecked2" name="category[]" value="featured">
                                            <label for="defaultChecked2">@lang('News::words.featured_news')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('News::words.publish_date')</label>
                                        <div>
                                            <input type="date" name="publish_date" class="form-control"  placeholder="Publish Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('News::words.author')</label>
                                        <div>
                                            <input type="text" class="form-control"  name="author" placeholder="author">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Icon</label>
                               
                                        <div class="file-field">
                                                <div class="btn btn-default btn-sm float-left waves-effect waves-light">                            
                                                
                                             
                                                <div class="upload-btn-wrapper">
                                                <button id="upload" class="btn">Upload a file</button>
                                                <input type="file" name="image" id="myimg"/>
                                                </div>

                                                </div>
                                        </div>
                                        <img id="preview" src="#" alt="Choose File" style="width: 100px" hidden/>
                                        <span ><a onclick="cancel(event)" href="" style="color:black" id="cancel" hidden><i class="fa fa-close">Remove</i></a></span>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group m-b-50 ">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light float-right">@lang('News::words.create')</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
  

@endsection

@section('script')
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

<script>
 CKEDITOR.replace( 'editor' );

    $(function(){      
        
        $("#myimg").change(function(e) {
            e.preventDefault();
            $('#preview').removeAttr('hidden');
            $("#cancel").removeAttr("hidden");
            $("#upload").attr("hidden", true);
        readURL(this);
        });
    });

    function cancel(e) {
        e.preventDefault();
      
        $('#preview').removeAttr('src');
        $('#preview').attr('hidden', true);
        $("#cancel").attr("hidden", true);
        $("#upload").removeAttr("hidden");
        
    }
    function readURL(input) {

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        }
    }

        
</script>
@endsection