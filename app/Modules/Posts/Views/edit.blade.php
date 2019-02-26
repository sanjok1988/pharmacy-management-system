@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>@lang('News::words.edit')</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <form  method="post" class="" action="{{ route('updateNews',['id'=>$news->id]) }}" enctype='multipart/form-data' >
                                <div class="form-group">
                                    <label> @lang('News::words.select_language')</label>
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline1" name="lang" value="en" <?=($news->lang == 'en')?'checked':'';?>>
                                            <label class="custom-control-label" for="defaultInline1">English</label>
                                        </div>
                                        <!-- Default inline 2-->
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="defaultInline2" name="lang" value="jp" <?=($news->lang == 'jp')?'checked':'';?>>
                                            <label class="custom-control-label" for="defaultInline2">Japanese</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('News::words.news_title') *</label>
                                    <div>
                                        <input type="text"  value="{{ $news->title }}" id="title" name="title" class="form-control"  placeholder="title" required>
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>@lang('News::words.news_content')</label>
                                    <div>
                                        <textarea id="editor"  type="text"  name="content" class="form-control" rows="5" >{{ $news->content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('News::words.highlights')</label>
                                    <div>
                                        <textarea type="text"  class="form-control"  name="highlights" placeholder="Highlight">{{ $news->highlights }}</textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('News::words.news_category')</label>
                                        @foreach($categories as $category)
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" id="defaultChecked2" class="minimal" name="category[]" value="{{$category->name}}" <?=($category->name==$news->category)
                                                ?'checked':'';?>>
                                               
                                                <label for="defaultChecked2">{{$category->display_name}}</label>
                                            </div>
                                        @endforeach
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="minimal" id="defaultChecked2" name="category[]" value="featured">
                                            <label for="defaultChecked2">Featured News</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('News::words.publish_date')</label>
                                        <div>
                                            <input type="date" name="publish_date" value="{{ $news->publish_date }}" class="form-control"  placeholder="Publish Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('News::words.author')</label>
                                        <div>
                                            <input type="text" value="{{ $news->author }}" class="form-control"  name="author" placeholder="Author">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('News::words.image')</label>
                                        <!-- <div class="form-group">

                                                    <input type="file" class="form-control-file " id="exampleFormControlFile1">
                                                </div> -->
                                        <div class="file-field">
                                            <div class="btn btn-secondary btn-sm float-left waves-effect waves-light">
                                               
                                                <input name="image" type="file" multiple="" id="myimg">
                                                @if($news->image) 
                                                    <img id="preview" src="{{ asset('uploads/'.$news->image) }}" alt="Choose File" style="width: 100px"/>
                                                    <span ><a onclick="cancel(event)" href="" style="color:azure" id="cancel"><i class="fa fa-close"></i></a></span>
                                                @else
                                                <img id="preview" src="#" alt="Choose File" style="width: 100px"/>
                                                <span ><a onclick="cancel(event)" href="" style="color:azure" id="cancel" hidden><i class="fa fa-close"></i></a></span>
                                                @endif
                                                
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate"  value="" name="image" type="text" placeholder="Upload one or more files">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group m-b-50 ">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light float-right">@lang('News::words.update')</button>
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
            $("#cancel").removeAttr("hidden");
        readURL(this);
        });
    });

    function cancel(e) {
        e.preventDefault();
        $('#preview').removeAttr('src');
        
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